<?php
$this->breadcrumbs=array(
	'Cantons'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->tituloPagina = " Modificar Cantons";

$this->menu=array(
	array('template'=>'<h2>Cantons&nbsp;</h2>',),
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Ver', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>