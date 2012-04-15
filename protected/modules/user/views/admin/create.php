<?php
$this->breadcrumbs=array(
	UserModule::t('Users')=>array('admin'),
	UserModule::t('Create'),
);
$this->menu=array(
	array('url'=>url('/user/admin'), 'label'=>UserModule::t('Manage User'),'active'=>activeMenu('/admin',$this),),
	array('url'=>url('/rights'), 'label'=>'Permisos','active'=>activeMenu('/rights',$this),),
);
?>
<?php 
	echo $this->renderPartial('_menu',array(
		'list'=> array(),
	));
	echo $this->renderPartial('_form', array('model'=>$model,'profile'=>$profile));
?>