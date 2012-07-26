<?php
$this->breadcrumbs=array(
	'Mails'=>array('index'),
	$model->id,
);

$this->tituloPagina = "Ver Mails";

$this->menu=array(
	array('template'=>'<h2>Mails&nbsp;</h2>',),
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Modificar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Administrar', 'url'=>array('admin')),
);
?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions'=>array(
		'class' =>'table table-bordered table-striped table-condensed',
		),
	'attributes'=>array(
		'referencia',
		'tipo',
		'to',
		'cc',
		'bcc',
		'subject',
		'attach',
		'body',
		'registro',
		'envio',
array(
        	'label'=>'Status',
        	'value'=>($model->status==1 ? "Activo":"Inactivo"),
        ),	),
)); ?>
