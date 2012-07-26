<?php
function kcore_parameters(){
    return array(
        'paths'=>array(
            'upload'=>dirname(__FILE__).DS.'..'.DS.'..'.DS.'uploads',
        ),
        'saveDateTime'=>'Y-m-d H-i-s',
        'saveDate'=>'Y-m-d H-i-s',
        'showDateTime'=>'Y-m-d H-i-s',
        'showDate'=>'Y-m-d',
        'showDateMysql'=>'%Y-%m-%d',
    );
}

/**
 * Returns the named application parameter.
 * This is the shortcut to Yii::app()->params[$name].
 */
function p($name,$scope=null)
{
    $k_parameters=kcore_parameters();
    if(isset($scope))
        return $k_parameters[$scope][$name];
    return $k_parameters[$name];
}
function pb($scope,$param)
{
    $parametro = Parametro::model()->findAllByAttributes(array(
		'escenario'=>$scope,
		'parametro'=>$param,
		'status'=>1,
	));
	if(count($parametro)>1)
		throw new CHttpException(404,"Se espera solo un registro con $scope - $param.");
	return $parametro[0];
}