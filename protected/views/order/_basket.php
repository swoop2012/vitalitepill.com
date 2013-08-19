<p class="top-title">Ваш заказ:</p>

<div class="basket-top">
    <p class="tit">Товар:</p>
    <p class="num">Количество:</p>
    <p>Стоимость:</p>
</div>

<? if(!empty($basket)):?>
    <? foreach($basket as $product):?>
        <div class="basket product">
            <p class="basket-title"><?= $product['Name'];?><br><span><?= $product['CountIn'].' '.$product['Size'];?></span></p>
            <p class="basket-col"><?= $product['Count'];?></p>
            <p class="basket-price"><span><?= round($product['Count']*$product['Price']);?></span> руб.</p>
            <input type="hidden" value="<?= $product['Price'];?>" class="price">
        </div>
    <? endforeach;?>
<? endif;?>
<div class="basket delivery-block">
    <p class="basket-title">Доставка:<br><span></span></p>
    <p class="basket-col">1</p>
    <p class="basket-price"><span>0</span> руб.</p>
    <input type="hidden" value="0" class="price">
</div>

<? if(isset($order['Discount']['Discount'])&&$order['Discount']['Discount'] > 0):?>
    <div class="basket discount">
        <p class="basket-title">Скидка<br><span><?= $order['Discount']['Discount'];?></span></p>
        <p class="basket-col">1</p>
        <p class="basket-price"><span><?= round($order['discountSum']);?></span> руб.</p>
        <input type="hidden" value="<?= $order['discountSum'];?>" class="price">
    </div>
<? endif;?>
<? if(Order::checkDiscountProduct($order)):?>
    <div class="basket promo">
        <p class="basket-title">Промо-товар<br><span><?= $order['Discount']['NameProduct'];?></span></p>
        <p class="basket-col">1</p>
        <p class="basket-price"><span><?= round($order['Discount']['PromoPrice']);?></span> руб.</p>
        <input type="hidden" value="<?= round($order['Discount']['PromoPrice']);?>" class="price">
    </div>
<? endif;?>
<? if(!empty($bonus)):?>
    <div class="basket">
        <p class="basket-title">Бонусный товар:<br><span><?= isset($bonus['Bonus'])?$bonus['Bonus']:'';?></span></p>
        <p class="basket-col">1</p>
        <p class="basket-price"><span>0</span> руб.</p>
        <input type="hidden" value="0" class="price">
    </div>
<? endif;?>

<div class="basket">
    <p class="basket-info">После первого заказа вы получите код, дающий<br>скидку 5% на все последующие заказы.</p>
    <b class="basket-total">Итого к оплате:<br><span><?= $order['totalSum'];?> руб.</span></b>
</div>