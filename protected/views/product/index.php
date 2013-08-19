<div class="main">

    <div class="description">

        <div class="img">
            <?= CHtml::image(Image::Check($model->PictureProduct1),'',array('width'=>102));?>
            <?= CHtml::image(Image::Check($model->PictureProduct2));?>
            <?= CHtml::image(Image::Check($model->PictureProduct3));?>
        </div>

        <div class="text">
            <h1><?= $model->Name;?></h1>
            <p><?= $model->ShortDescription;?>
        </div>

    </div>

    <div class="info">
        <?//= $model->ShortDescription;?>
        <?= $model->MiddleDescription;?>
    </div>

    <div class="set">
        <ul>
            <? if(!empty($model->subproduct)):?>
                    <? foreach($model->subproduct as $value):?>
                    <li data-id='<?= $value->id;?>'>
                        <h4><?= $value->Count;?> <?= $value->Measure;?></h4>
                        <b><?= $price = Calculate::getPrice($value->Price,$model->UpPrice);?>.—</b><br>
                        <span><?= Calculate::Devide($price, $value->Count);?> руб. за таблетку</span>
                        <?= CHtml::link('<span>в корзину</span>',$this->createUrl('addProduct'),array('class'=>'basket-link','onclick'=>'scrollWindow()'));?>
                    </li>
                    <? endforeach;?>
            <? endif;?>
        </ul>
        <? if(!empty($bonuses)):?>
            <p>
            <b>У нас вы получаете подарки!</b><br>
                <? foreach($bonuses as $bonus):?>
                    <span><?= $bonus->Bonus;?>:</span><br>
                    При сумме заказа от <?= round($bonus->ConditionSum);?> р.
                <? endforeach;?>
            </p>
        <? endif;?>
        <span>Накопительные скидки:</span><br>
        Оформив ваш первый заказ, вы получите персональный промо-код, используйте его при следующих заказах и накапливайте скидку.<br>
        от 1 заказа — Скидка 5%<br>от 5 заказов — Скидка 10%<br>от 10 заказов — Скидка 15%
    </div>

</div>

<? if(!empty($data)):?>
    <div class="recom">
        <h3 class="title">РЕКОМЕНДУЕМЫЕ ТОВАРЫ</h3>
        <? foreach($data as $key=>$value):?>
            <div class="box rec">
                <h4><?= CHtml::link($value->ShortName,$this->createUrl('/product/index',array('id'=>$value->id)),array('title'=>$value->ShortName));?></h4>
                <? if(isset($value->one_subproduct[0])):?>
                    <span><?= $value->one_subproduct[0]->Size;?></span>
                    <? $price = Calculate::getPrice($value->one_subproduct[0]->Price,$value->UpPrice);?>
                    <b>от <?= Calculate::Devide($price,$value->one_subproduct[0]->Count);?>.—</b>
                    <p><?= $value->ShortDescriptionMain;?></p>
                    <a class="add" href="<?= $this->createUrl('/product/index',array('id'=>$value->id));?>"><span>Купить</span></a>
                <? endif;?>
                <?= CHtml::link(CHtml::image(Image::Check($value->PictureMain)),$this->createUrl('/product/index',array('id'=>$value->id)));?>
            </div>
        <? endforeach;?>
    </div>
<? endif;?>


<div class="about des">
    <?= $model->Article;?>
</div>












