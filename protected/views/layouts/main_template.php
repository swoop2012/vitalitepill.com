<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
    <title><?= $this->pageTitle;?></title>
    <link href="/css/style.css" rel="stylesheet" type="text/css" />
    <? Yii::app()->clientScript->registerCoreScript('jquery');?>
    <!--[if IE]><script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <script type="text/javascript" src="/js/script.js"></script>
</head>
<body>

<div class="page">

<div class="top">

    <div class="panel">
        <p>
            <span>Мы осуществляем прием заказов 24 часа в сутки</span>
            <a class="facebook" href="#"></a>
            <a class="twitter" href="#"></a>
            <a class="vk" href="#"></a>
            <a class="ok" href="#"></a>
            <a class="google" href="#"></a>
        </p>
    </div>

    <header id="header">

        <div class="logo"><a href="/"><img alt="" src="/images/logo.png" width="210" height="56"></a></div>

        <div class="phone">
            <h5>КЛИЕНТСКАЯ СЛУЖБА:</h5>
            <p><?= GetArray::getRandomPhone('idWebmaster');?></p>
            <? $wmid = GetArray::getWmid();
            if (!empty($wmid)):?>
                <span>Внимание! Обязательно назовите ваш добавочный номер: <b><?= $wmid;?></b></span>
            <? endif;?>
        </div>

        <div id="basketContainer">
            <?php $this->drawBasket();?>

        </div>


    </header>

</div>

<nav id="nav">
    <ul>
        <li><a href="/">Каталог продукции</a></li>
        <li><a href="<?php echo $this->createUrl('article/detail',array('id'=>3));?>">Доставка и оплата</a></li>
        <li><a href="<?php echo $this->createUrl('article/detail',array('id'=>4));?>">Вопросы-ответы</a></li>
        <li><a href="<?= $this->createUrl('/site/contact');?>">Написать нам</a></li>
    </ul>
</nav>

<div class="container">

    <div class="services ">

        <div class="ser quality">
            <h4>КАЧЕСТВЕННЫЕ ПРЕПАРАТЫ</h4>
            <p>Мы продаем только качественные препараты, имеющие все необходимые сертификаты.</p>
        </div>

        <div class="ser cheap">
            <h4>У НАС ДЕШЕВЛЕ</h4>
            <p>Наши цены в 2—3 раза ниже,
                чем в городских аптеках, так как мы работаем по принципу интернет-торговли.</p>
        </div>

        <div class="ser easy">
            <h4>ЭТО УДОБНО</h4>
            <p>Моментальный заказ на сайте или по телефону. Доставка в анонимной упаковке. Никто не знает что внутри, даже курьер.</p>
        </div>

    </div>

    <div class="content">

        <div class="middle">
            <?= $content;?>
        </div>

        <div class="right">

            <h3 class="title">Проверенные<br>препараты</h3>
            <ul class="tested">
                <li><a href="<?php echo $this->createUrl('product/index',array('id'=>11));?>"><img src="/images/mini_product1.png" alt=""/>Дженерик Виагра</a></li>
                <li><a href="<?php echo $this->createUrl('product/index',array('id'=>4));?>"><img src="/images/mini_product2.png" alt=""/>Дженерик Сиалис</a></li>
                <li><a href="<?php echo $this->createUrl('product/index',array('id'=>14));?>"><img src="/images/mini_product3.png" alt=""/>Дапоксетин</a></li>
                <li><a href="<?php echo $this->createUrl('product/index',array('id'=>15));?>"><img src="/images/mini_product4.png" alt=""/>Super P-Force</a></li>
                <li><a href="<?php echo $this->createUrl('product/index',array('id'=>17));?>"><img src="/images/mini_product5.png" alt=""/>Набор «Классический»</a></li>
            </ul>

            <div class="delivery">
                <h3 class="title">ДОСТАВКА</h3>
                <? if(!empty($this->delivery)):?>
                    <? foreach($this->delivery as $delivery):?>
                        <p><span><?= $delivery['Name'];?>:</span><br><?= $delivery['Instruction'];?>.</p>
                    <? endforeach;?>
                <? endif;?>
            </div>
<?php /*
            <h3 class="title">ВОПРОСЫ И ОТВЕТЫ</h3>
            <ul class="faq">

                <li><a href="#">Психологические причины импотенции</a></li>
                <li><a href="#">Механизм действия Виагры</a></li>
                <li><a href="#">История Виагры</a></li>
                <li><a href="#">Продление полового акта</a></li>
                <li><a href="#">Дозировки</a></li>
            </ul>
*/ ?>
        </div>

    </div>

</div>

<div class="bottom">
    <ul>
        <li><a href="/">Каталог продукции</a></li>
        <li><a href="<?php echo $this->createUrl('article/detail',array('id'=>3));?>">Доставка и оплата</a></li>
        <li><a href="<?php echo $this->createUrl('article/detail',array('id'=>4));?>">Вопросы-ответы</a></li>
        <li><a href="<?= $this->createUrl('/site/contact');?>">Написать нам</a></li>
    </ul>
</div>

<footer id="footer">© 2008—2013 ООО «Виталайт». Все права защищены. Использование материалов сайта возможно лишь с согласия правообладателя.</footer>

</div>

</body>
</html>