<?php
$this->breadcrumbs=array(
	'Parametros'=>array('index'),
	$model->id,
);

$this->tituloPagina = "Ver Parametros";

$this->menu=array(
	array('template'=>'<h2>Parametros&nbsp;</h2>',),
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
		'escenario',
		'parametro',
		'valor',
		'referencia_1',
		'referencia_2',
		'referencia_3',
		'comentario',
array(
        	'label'=>'Status',
        	'value'=>($model->status==1 ? "Activo":"Inactivo"),
        ),	),
)); ?>
