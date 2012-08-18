<?php
$this->breadcrumbs=array(
	'Provincias'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->tituloPagina = " Modificar Provincias";

$this->menu=array(
	array('template'=>'<h2>Provincias&nbsp;</h2>',),
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Ver', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>