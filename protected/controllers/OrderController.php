<?php
class OrderController extends  Controller{
    public $layout = 'nobasket';
    public function filters(){
        return array(
            array(
                'application.filters.YXssFilter',
                'clean'   => '*',
                'tags'    => 'strict',
                'actions' => 'index'
            ),
            'ajaxOnly +setParam',
        );
    }
    public function actionIndex(){
        if(!Settings::getValue('ValidateKey'))
            throw new CHttpException('404','На данный момент функция оформления заказа недоступна');
        Yii::app()->clientScript->registerScript('order',"$('.main.order').orderProcess({submitLink:'a.order'});",CClientScript::POS_READY);
        $this->pageTitle='Заказ';
        $this->setParams();
        $orderForm = Yii::app()->request->getPost('OrderForm');
        $type = !empty($orderForm)?$orderForm['typeDelivery']:1;
        $model = new OrderForm('delivery'.$type);
        $this->performAjaxValidation($model);
        $promo = Yii::app()->request->getPost('promo');
        if(isset($_POST['OrderForm']))
        {
            $model->attributes = $_POST['OrderForm'];
            if($model->validate())
                $this->success($model);
        }
        Order::clearOrder();
        if(!empty($promo)){

                $data = Curl::getContent($this->domain.'api/validatePromo?key='.$this->key.'&promo='.$promo);
                $discount = CJSON::decode($data);

                if(isset($discount['Discount']))
                {
                    $discount['Promo'] = $promo;
                    Order::setPromo($discount);
                }

        }
        Order::calculateTotal();
        $order = Order::getOrder();
        $basket = Basket::getBasket();
        if(empty($basket))
            $this->redirect('/');
        $bonus = $this->getBonus($order['totalSum']);
        $delivery = OfferDelivery::model()->with('payment_api')->findAll('t.Active=:active',array(':active'=>1));
        $this->render('index',compact('model','delivery','order','basket','bonus'));
    }

    public function actionSetParam(){
        $request = Yii::app()->request;
        Order::setParam($request->getPost('type'),$request->getPost('id'));
    }
    private function success($model){
        $order = Order::getOrder();
        $basket = Basket::getBasket();
        $order['form'] = $model->attributes;
        $order['form']['userReferer'] = Yii::app()->session['referer'];
        $order['form']['idSubAccount'] = (int) Cookie::get('subaccountid');
        $order['form']['idWebmaster'] = (int) Cookie::get('wmid');
        $order['form']['userIp'] = Yii::app()->request->userHostAddress;

        $order['subproducts'] = $basket;
        $order['orderNumber'] = mt_rand(10,99).'-'.mt_rand(10000,99999);
        Order::setOrder($order);
        $data_string = CJSON::encode($order);

        if(!Settings::getValue('debug_mode')){
            $result = Curl::sendJSON($this->domain.'api/writeOrder?key='.$this->key,$data_string);
            $promo = CJSON::decode($result);
            if(isset($promo['newPromo']))
                Order::setParam('newPromo',$promo['newPromo']);
            else{
                $cache = new OrderCache();
                $cache->orderString = $data_string;
                $cache->save(false);
            }
        }
        Basket::clearBasket();
        $this->redirect($this->createUrl('success'));
    }

    public function actionSuccess(){
        $this->pageTitle='Заказ';
        $order = Order::getOrder();
        if(empty($order)||!isset($order['payment'])||!isset($order['delivery'])||!isset($order['totalSum']))
            $this->redirect('/');
        if(!Settings::getValue('debug_mode')){
        Order::clearOrder();
        }
        $bonus = $this->getBonus($order['totalSum']);
        $payment = $this->loadModel('OfferPayment',$order['payment']);
        $delivery = $this->loadModel('OfferDelivery',$order['delivery']);
        $this->render('success',compact('order','delivery','payment','bonus'));
    }
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax'])) {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    private function getBonus($sumOrder){
        $bonus = OfferBonus::model()->find(array(
            'select'=>'id,Bonus',
            'condition'=>'t.ConditionSum <:sumOrder',
            'order'=>'t.ConditionSum DESC',
            'limit'=>1,
            'params'=>array(':sumOrder'=>$sumOrder)));
        return $bonus;
    }
}