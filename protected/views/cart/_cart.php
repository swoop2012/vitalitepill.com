<?if($count):?>
    <div class="bask">
    <h5>корзина товаров:</h5>
    <p>Количество товаров: <b><?=$count?></b></p>
    <p><span>Общая сумма: </span><b><?=$sum?> руб.</b></p>
    <a href="<?=$this->createUrl('/cart/index')?>"<span>Перейти в корзину</span></a>
    </div>
<?endif?>