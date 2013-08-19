<?php
class CartController extends Controller{
    public $layout = 'nobasket';

    public function filters(){
	return array(
	    'ajaxOnly + change',
	);
    }

    public function actionIndex(){
    Yii::app()->clientScript->registerScript('basket',"$('#basket-edit').basket({submitLink:'.basket-order a'});",CClientScript::POS_READY);
    $this->pageTitle='Джойсон - Корзина';
	$this->setParams();
	$data = Basket::getBasket();
	$this->render('index',compact('data'));
    }

    public function actionChange(){
	$id = Yii::app()->request->getPost('id');
	$sign = Yii::app()->request->getPost('sign');
	if(!empty($id)&&!empty($sign))
	Basket::updateCount($id, $sign);
    }

    public function actionDelete(){
        $id = Yii::app()->request->getPost('id');
        if(!empty($id))
            Basket::deleteProduct($id);
    }
    public function actionClear(){
        Basket::clearBasket();
    }

    public function actionRedraw(){
        $this->drawBasket();
    }

}
?>
