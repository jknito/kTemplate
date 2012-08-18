<?php
$this->breadcrumbs=array(
	'Paises'=>array('index'),
	'Create',
);

$this->menu=array(
	array('template'=>'<h2>Paises&nbsp;</h2>',),
	array('label'=>'Listar', 'url'=>array('index')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>