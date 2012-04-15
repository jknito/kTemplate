<?php
$user = UserInfo::singleton();

$itemsForFile = array();

$itemsForFile = array(        
	array(	'label'=>'Admin', 
			'url'=>url('/user/admin'),
			'visible'=>$user->isAdmin()),
);