<?php
$this->breadcrumbs=array(
	'Cantons'=>array('index'),
	'Create',
);

$this->menu=array(
	array('template'=>'<h2>Cantons&nbsp;</h2>',),
	array('label'=>'Listar', 'url'=>array('index')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>