<?php
$this->breadcrumbs=array(
	UserModule::t('Users')=>array('admin'),
	UserModule::t('Create'),
);
$this->menu=array(
	array('url'=>url('/user/admin'), 'label'=>'Usuarios','active'=>true,),
	array('url'=>url('/rights'), 'label'=>'Permisos','active'=>false,),
	array('url'=>url('/menu'), 'label'=>'Menu','active'=>false,),
);
?>
<?php 
	echo $this->renderPartial('_menu',array(
		'list'=> array(),
	));
	echo $this->renderPartial('_form', array('model'=>$model,'profile'=>$profile));
?>