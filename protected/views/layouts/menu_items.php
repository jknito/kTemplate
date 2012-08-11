<?php
$user = UserInfo::singleton();

$itemsForFile = array();
if($user->isGuest())
	return;

$itemsForFile = array(
	array(	'label'=>'Admin', 
			'url'=>url('/user/admin'),
			'visible'=>$user->isAdmin())
);

$data = Yii::app()->getModule('menu')->getCategorias($user);
//$data = array();
//dd($data);
foreach ($data as $value) {
	array_push($itemsForFile,
	array(	'label'=>$value->nombre, 
			'url'=>url('/site/menu',array('id'=>$value->id)),
			//'visible'=>$user->haveRol()
		));
}