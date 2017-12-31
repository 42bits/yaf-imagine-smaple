<?php
date_default_timezone_set('PRC');
define('DEBUG',true);
define('APP_PATH',realpath(dirname(__FILE__).'/../'));
define('APP_PUBLIC',realpath(dirname(__FILE__).'/'));
if(DEBUG){
    ini_set('display_errors','On');
    ini_set('error_reporting','2047');
}else{
    ini_set('display_errors','Off');
}
$app = new Yaf\Application(APP_PATH.'/conf/application.ini',ini_get('yaf.environ'));
$app->bootstrap()->run();