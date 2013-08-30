<?php
if ( !extension_loaded('pdo_sqlite') ) {
    echo 'Необходимо подключить расширение pdo_sqlite';
    exit;
}
if ( !extension_loaded('curl') ) {
    echo 'Необходимо подключить расширение curl';
    exit;
}
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

