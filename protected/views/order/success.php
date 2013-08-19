<div class="main order">
    <h1>Заказ №<?=$order['orderNumber'];?></h1>
    <div class="pp-confirm">
	<div class="text">
        <p>Ваш заказ принят. Спасибо.</p>
		<p>Мы доставим ваш заказ: <?=$delivery->Name;?></p>
        <? if(!empty($order['newPromo'])):?>
        <h3>Ваш персональный промо-код: <?=$order['newPromo'];?></h3>
		<p>У нас действуют накопительные промо-коды. Уже при следующем заказе указав ваш промо-код вы получите скидку — 5%. После 2-го заказа скидка будет увеличена до — 10%.</p>
        <? endif;?>
        <h3>Как оплатить <b><?=$payment->Name;?></b></h3>
        <?=$payment->Description;?>
        <h3>Ваш заказ</h3>
		<p>Полное ФИО: <?=$order['form']['fullName'];?><br>
            Номер телефона: <?=$order['form']['phone'];?><br>
            E-mail: <?=$order['form']['email'];?><br>
            <? if($order['form']['typeDelivery']==1):?>
            Город, область: <?=$order['form']['cityRegion'];?><br>
            Индекс: <?=$order['form']['index'];?><br>
            <? endif;?>
            Адрес: <?=$order['form']['address'];?><br>
            Комментарий к заказу: <?=$order['form']['comment'];?><br>
        </p>
        <p class="top-title">Ваш заказ:</p>
</div>
        <div class="basket-top">
            <p class="tit">Товар:</p>
            <p class="num">Количество:</p>
            <p>Стоимость:</p>
        </div>

        <? if(!empty($order['subproducts'])):?>
            <? foreach($order['subproducts'] as $product):?>
                <div class="basket product">
                    <p class="basket-title"><?= $product['Name'];?><br><span><?= $product['CountIn'].' '.$product['Size'];?></span></p>
                    <p class="basket-col"><?= $product['Count'];?></p>
                    <p class="basket-price"><span><?= round($product['Count']*$product['Price']);?></span> руб.</p>
                    <input type="hidden" value="<?= $product['Price'];?>" class="price">
                </div>
            <? endforeach;?>
        <? endif;?>


        <div class="basket delivery-block">
            <p class="basket-title">Доставка: <?=$delivery->Name;?><br><span></span></p>
            <p class="basket-col">1</p>
            <p class="basket-price"><span><?= Calculate::DiscountDelivery($order['totalSum'],$delivery->Price,$delivery->FreeIf);?></span> руб.</p>
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
            <b class="basket-total">Итого к оплате:<br><span><?=($order['totalSum']+Calculate::DiscountDelivery($order['totalSum'],$delivery->Price,$delivery->FreeIf));?> руб.</span></b>
        </div>

    </div>
</div>