<? $form=$this->beginWidget('CActiveForm', array(
    'id'=>'order-form1',
    'enableAjaxValidation'=>true,
    'clientOptions' => array(
        'validateOnSubmit'=>true,
        'validateOnChange'=>true,
        'validateOnType'=>false,
    ),
    'htmlOptions'=>array('class'=>'tab'),
)); ?>
<?= $form->hiddenField($model,'typeDelivery',array('value'=>1));?>
    <div class="form">

        <div class="form-l">
            <p>
                <label>Полное ФИО <span>*</span>:
                </label><br>
                <?= $form->textField($model,'fullName',array('class'=>'inp-m')); ?>
                <?= $form->error($model,'fullName'); ?>
            </p>

            <p>
                <label>Телефон<span>*</span>:</label><br>
                <span>Вам позвонят из службы доставки<br>для подтверждения заказа.

                </span>
                <?= $form->textField($model,'phone',array('class'=>'inp-m')); ?>
                <?= $form->error($model,'phone'); ?>
            </p>

            <p>
                <label>Эл. почта:</label><br>
                <span>Для информирования о статусе заказа<br>и получения кодов на скидку.

                </span>
                <?= $form->textField($model,'email',array('class'=>'inp-m')); ?>
                <?= $form->error($model,'email'); ?>
            </p>

            <p>
                <label>Комментарии к заказу:</label><br>
                <?= $form->textArea($model,'comment',array('class'=>'ta-b')); ?>
            </p>

        </div>

        <div class="form-r">

            <p>
                <label>Город, область<span>*
                    </span>:</label><br>
                <?= $form->textField($model,'cityRegion',array('class'=>'inp-b')); ?>
                <?= $form->error($model,'cityRegion'); ?>
            </p>

            <p>
                <label>Индекс<span>*
                    </span>:</label><br>
                <?= $form->textField($model,'index',array('class'=>'inp-b')); ?>
                <?= $form->error($model,'index'); ?>
            </p>

            <p>
                <label>Адрес<span>*
                    </span>:</label><br>
                <span>Например: ул. Российская 1, кв. 1</span>
                <?= $form->textField($model,'address',array('class'=>'inp-b')); ?>
                <?= $form->error($model,'address'); ?>
            </p>

        </div>

    </div>

    <div class="form-tools">
        <p><b>Способ оплаты:</b> <span class="method-payment"></span><a class="return" href="#">Вернуться в каталог</a></p>
        <p><span class="necessarily"><b>*</b> Звездочкой помечны поля, обязательные для заполнения</span><a class="order" href="#">ОФОРМИТЬ ЗАКАЗ</a></p>
    </div>
<? $this->endWidget();?>

<? $form=$this->beginWidget('CActiveForm', array(
    'id'=>'order-form2',
    'enableAjaxValidation'=>true,
    'clientOptions' => array(
        'validateOnSubmit'=>true,
        'validateOnChange'=>true,
        'validateOnType'=>false,
    ),
    'htmlOptions'=>array('class'=>'tab'),
)); ?>
<?= $form->hiddenField($model,'typeDelivery',array('value'=>2));?>
    <div class="form">

        <div class="form-l">

            <p>
                <label>Имя <span>*</span>:
                </label><br>
                <?= $form->textField($model,'fullName',array('class'=>'inp-m')); ?>
                <?= $form->error($model,'fullName'); ?>
            </p>

            <p>
                <label>Телефон<span>*</span>:</label><br>
                <span>Вам позвонят из службы доставки<br>для подтверждения заказа.
                </span>
                <?= $form->textField($model,'phone',array('class'=>'inp-m')); ?>
                <?= $form->error($model,'phone'); ?>
            </p>

            <p>
                <label>Эл. почта:</label><br>
                <span>Для информирования о статусе заказа<br>и получения кодов на скидку.
                </span>
                <?= $form->textField($model,'email',array('class'=>'inp-m')); ?>
                <?= $form->error($model,'email'); ?>
            </p>

        </div>

        <div class="form-r">

            <p>
                <label>Адрес доставки<span>*
                    </span>:</label><br>
                <?= $form->textField($model,'address',array('class'=>'inp-b')); ?>
                <?= $form->error($model,'address'); ?>
            </p>

            <p>
                <label>Комментарии к заказу:</label><br>
                <?= $form->textArea($model,'comment',array('class'=>'ta-b')); ?>
            </p>

        </div>

    </div>

    <div class="form-tools">
        <p><b>Способ оплаты:</b> <span class="method-payment"></span><a class="return" href="/">Вернуться в каталог</a></p>
        <p><span class="necessarily"><b>*</b> Звездочкой помечны поля, обязательные для заполнения</span><a class="order" href="#">ОФОРМИТЬ ЗАКАЗ</a></p>
    </div>
<? $this->endWidget();?>
