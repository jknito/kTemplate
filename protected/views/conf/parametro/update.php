<?php
$this->breadcrumbs=array(
	'Parametros'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->tituloPagina = " Modificar Parametros";

$this->menu=array(
	array('template'=>'<h2>Parametros&nbsp;</h2>',),
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Ver', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>