<?php
header("Content-type: text/html; charset=utf-8");
require(dirname(__FILE__) . '/framework/YiiBase.php');
class Yii extends YiiBase {
    /**
     * @static
     * @return CWebApplication
     */
    public static function app()
    {
        return parent::app();
    }
}
$config=dirname(__FILE__).'/protected/config/main.php';
$app = Yii::createWebApplication($config)->run();

