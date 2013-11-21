<div class="main order">
    <h1>Оформление заказа</h1>

    <div class="delivery-payment b-delivery">
        <b>Выберите способ доставки:</b>
        <ul>
        <? if(!empty($delivery)):?>
            <? $count = count($delivery);?>
            <? foreach($delivery as $key=>$value):?>
                <li data-id="<?= $value->id;?>" data-type="<?= $value->Type;?>" <?=($key+1)%3 == 0?'class="fl"':''?> data-price='<?= Calculate::DiscountDelivery($order['totalSum'],$value->Price,$value->FreeIf);?>' data-name='<?= $value->Name;?>'>
                    <input type="radio"><p><?= $value->Name;?>:</p><?= $value->Instruction;?><br>Стоимость: <?= round($value->Price);?> Р
                </li>
            <? endforeach;?>
        <? endif;?>
        </ul>
        <div class="clearfix"></div>
    </div>

    <div class="delivery-payment b-payment">
        <? if(!empty($delivery)):?>
            <? foreach($delivery as $value):?>
                <? if(!empty($value->payment_api)):?>
                    <div class="payment-select">
                        <b>Выберите способ оплаты:</b>
                        <ul>
                            <? $count = count($value->payment_api);?>
                            <? foreach($value->payment_api as $key=>$deliverypayment):?>
                                <li data-id="<?= $deliverypayment->id;?>" <?=($key+1)%3 == 0?'class="fl"':''?> data-name='<?= $deliverypayment->Name;?>'>
                                    <input type="radio"><p><?= $deliverypayment->Name;?>:</p><?= $deliverypayment->ShortDescription;?>
                                </li>
                            <? endforeach;?>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                <? endif;?>
            <? endforeach;?>
        <? endif;?>
    </div>
    <? $this->renderPartial('_basket',compact('order','basket','bonus'))?>
    <? $this->renderPartial('_form',compact('model'))?>
</div>





