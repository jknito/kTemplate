<?php
$this->breadcrumbs=array(
	'Cantons'=>array('index'),
	$model->id,
);

$this->tituloPagina = "Ver Cantons";

$this->menu=array(
	array('template'=>'<h2>Cantons&nbsp;</h2>',),
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Modificar', 'url'=>array('update', 'id'=>$model->id)),
);
?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions'=>array(
		'class' =>'table table-bordered table-striped table-condensed',
		),
	'attributes'=>array(
		'id',
		'paisNombre',
		'provinciaNombre',
		'nombre',
		'codigo',
array(
        	'label'=>'Status',
        	'value'=>($model->status==1 ? "Activo":"Inactivo"),
        ),	),
)); ?>
