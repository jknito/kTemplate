<?php

defined('DS') or define('DS',DIRECTORY_SEPARATOR);

function db(){
    return Yii::app()->db;
}
function cmd(){
    return Yii::app()->db->createCommand();
}
function app(){
    return Yii::app();
}
function request(){
    return Yii::app()->request;
}
function cs(){
    return Yii::app()->getClientScript();
}
function url($route,$params=array(),$ampersand='&'){
    return Yii::app()->createUrl($route,$params,$ampersand);
}
function h($text){
    return htmlspecialchars($text,ENT_QUOTES,Yii::app()->charset);
}
function l($text, $url = '#', $htmlOptions = array()){
    return CHtml::link($text, $url, $htmlOptions);
}
function t($message, $category = 'stay', $params = array(), $source = null, $language = null){
    return Yii::t($category, $message, $params, $source, $language);
}
function bu($url=null){
    static $baseUrl;
    if ($baseUrl===null)
        $baseUrl=Yii::app()->getRequest()->getBaseUrl();
    return $url===null ? $baseUrl : $baseUrl.'/'.ltrim($url,'/');
}
function assets($imagen,$ruta='/images/'){
	$url = Yii::app()->assetManager->publish(Yii::app()->basePath.$ruta.$imagen);
	return $url;
}
?>