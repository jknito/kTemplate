<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/../yii-1.1.10.r3566/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';
$globals=dirname(__FILE__).'/protected/globals.php';
$userfile=dirname(__FILE__).'/protected/user.php';
$parameters=dirname(__FILE__).'/protected/config/parameters.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($globals);
require_once($yii);
require_once($userfile);
require_once($parameters);

$app = Yii::createWebApplication($config);

// adding Zend Framework autoloader
//Yii::import('application.vendors.*');
//require "Zend/Loader/Autoloader.php";
//Yii::registerAutoloader(array('Zend_Loader_Autoloader','autoload'), true);
//require_once "PHPExcel/PHPExcel.php";
//require_once "PHPExcel/PHPExcel/Autoloader.php";
//Yii::registerAutoloader(array('PHPExcel_Autoloader','Load'), true);

$app->run();
