<? Yii::app()->clientScript->registerScript('submit_letter',"
$('.form-tools a.order').click(function(e){
    e.preventDefault();
    $(this).parents('form').submit();
})
",CClientScript::POS_READY);?>
<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
    <h1><?php echo Yii::app()->user->getFlash('contact'); ?></h1>
</div>

<?php else: ?>

    <h1>Обратная связь</h1>
    <h2>Не забывайте указывать E-mail, на него будет отправлен ответ на ваше обращение!</h2>

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'contact-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
    )); ?>
	<?php $this->pageTitle='Написать нам'; ?>
    <div class="form">
        <?php echo $form->errorSummary($model); ?>
        <div class="form-l">
            <p>
                <label>Имя <span></span>:
                </label><br>
                <?= $form->textField($model,'name',array('class'=>'inp-m')); ?>
                <?= $form->error($model,'name'); ?>
            </p>

            <p>
                <label>E-mail :*<span></span></label><br>
                 <span>Для ответа на ваш порос.</span>
                <?= $form->textField($model,'email',array('class'=>'inp-m')); ?>
                <?= $form->error($model,'email'); ?>
            </p>

            <p>
                <label>Вопрос:</label><br>
                <?= $form->textArea($model,'body',array('class'=>'ta-b')); ?>
                <?php echo $form->error($model,'body'); ?>
            </p>

        </div>
    </div>
    <div class="form-tools">
        <p><span class="necessarily"><b>*</b> Звездочкой помечны поля, обязательные для заполнения</span>

            <a class="order" href="#" style='float:left;position: relative'>Отправить письмо</a></p>
    </div>
    <?php $this->endWidget(); ?>


<?php endif; ?>
