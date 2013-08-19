<div class="main" id='basket-edit' data-link="/cart/change" data-del-link="/cart/delete">
    <h1>КОРЗИНА ТОВАРОВ</h1>

    <div class="basket-top">
        <p class="tit">Товар:</p>
        <p class="num">Количество:</p>
        <p>Стоимость:</p>
    </div>

    <? if(!empty($data)):?>
        <? foreach ($data as $key=>$value):?>
            <div class="basket product" data-id="<?= $key;?>">
                <p class="basket-title"><?= $value['Name'];?><br><span><?= $value['CountIn'].' '.$value['Measure']?></span></p>
                <p class="basket-number"><a class="plus" href="#">+</a><span><?= $value['Count'];?></span><a class="minus" href="#">-</a></p>
                <input type="hidden" class='price' value="<?= $value['Price'];?>"/>
                <p class="basket-price"><span><?= round($value['Price']*$value['Count']);?></span> руб.</p>

                <a title="Удалить" class="del" href="#">Удалить</a>
            </div>
        <? endforeach;?>
    <? endif;?>

    <div class="basket">
        <p class="basket-info">После первого заказа вы получите код, дающий<br>скидку 5% на все последующие заказы.</p>
        <b class="basket-total">Итого к оплате:<br><span><?= Basket::getTotalSum();?> руб.</span></b>
    </div>


    <div class="basket-order">
        <?= CHtml::beginForm(CHtml::normalizeUrl($this->createUrl('/order')));?>
        <p>Код на скидку:</p><input type="text" name='promo'>
        <a href="#">ОФОРМИТЬ ЗАКАЗ</a>
        <?= CHtml::endForm();?>
    </div>

</div>