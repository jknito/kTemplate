<?php
$this->breadcrumbs=array(
	'Parametros'=>array('index'),
	'Create',
);

$this->menu=array(
	array('template'=>'<h2>Parametros&nbsp;</h2>',),
	array('label'=>'Listar', 'url'=>array('index')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>