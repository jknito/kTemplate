<div class="row-fluid">
<div class="span12-fluid">
<?php
$this->breadcrumbs=array(
	(UserModule::t('Users'))=>array('admin'),
	$model->username=>array('view','id'=>$model->id),
	(UserModule::t('Update')),
);
$this->menu=array(
	array('url'=>url('/user/admin'), 'label'=>UserModule::t('Manage User'),'active'=>activeMenu('/admin',$this),),
	array('url'=>url('/rights'), 'label'=>'Permisos','active'=>activeMenu('/rights',$this),),
);
?>
<?php echo $this->renderPartial('_menu', array(
		'list'=> array(
			CHtml::link(UserModule::t('Create User'),array('create')),
			CHtml::link(UserModule::t('View User'),array('view','id'=>$model->id)),
		),
	)); 
?>

<h3><?php echo  'Update user:'." ".$model->username; ?></h3>

</div>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model,'profile'=>$profile)); ?>