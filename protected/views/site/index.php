<div class="catalog">
    <? if(!empty($data)):?>
        <? foreach($data as $key=>$value):?>
            <div class="box">
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
    <? endif;?>
</div>
<div class="about">
    <?= $article?$article->Text:'';?>
</div>
