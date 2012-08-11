<?php
$this->breadcrumbs=array(
	UserModule::t('Users')=>array('admin'),
	UserModule::t('Manage'),
);

$this->menu=array(
	array('url'=>url('/user/admin'), 'label'=>'Usuarios','active'=>true,),
	array('url'=>url('/rights'), 'label'=>'Permisos','active'=>false,),
	array('url'=>url('/menu'), 'label'=>'Menu','active'=>false,),
);

?>
<?php echo $this->renderPartial('_menu', array(
		'list'=> array(),
	));
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
    //'htmlOptions'=>array(
    //    'class'=>'table table-bordered table-striped table-condensed',
    //),
    'itemsCssClass'=>'table table-bordered table-striped table-condensed',
	'columns'=>array(
		array(
			'name' => 'id',
			'type'=>'raw',
			'value' => 'CHtml::link(CHtml::encode($data->id),array("admin/update","id"=>$data->id))',
		),
		array(
			'name' => 'username',
			'type'=>'raw',
			'value' => 'CHtml::link(CHtml::encode($data->username),array("admin/view","id"=>$data->id))',
		),
		array(
			'name'=>'email',
			'type'=>'raw',
			'value'=>'CHtml::link(CHtml::encode($data->email), "mailto:".$data->email)',
		),
		array(
			'name' => 'createtime',
			'value' => 'date("d.m.Y H:i:s",$data->createtime)',
		),
		array(
			'name' => 'lastvisit',
			'value' => '(($data->lastvisit)?date("d.m.Y H:i:s",$data->lastvisit):UserModule::t("Not visited"))',
		),
		array(
			'name'=>'status',
			'value'=>'User::itemAlias("UserStatus",$data->status)',
		),
		array(
			'name'=>'superuser',
			'value'=>'User::itemAlias("AdminStatus",$data->superuser)',
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
