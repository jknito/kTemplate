<?php
$user = UserInfo::singleton();

$itemsForFile = array();

$itemsForFile = array(        
	array(	'label'=>'Admin', 
			'url'=>url('/user/admin'),
			'visible'=>$user->isAdmin()),
	array(	'label'=>'Menu', 
			'url'=>url('/site/menu'),
			'visible'=>$user->haveRol()),
);