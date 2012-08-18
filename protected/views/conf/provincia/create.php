<?php
$this->breadcrumbs=array(
	'Provincias'=>array('index'),
	'Create',
);

$this->menu=array(
	array('template'=>'<h2>Provincias&nbsp;</h2>',),
	array('label'=>'Listar', 'url'=>array('index')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>