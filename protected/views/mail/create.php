<?php
$this->breadcrumbs=array(
	'Mails'=>array('index'),
	'Create',
);

$this->menu=array(
	array('template'=>'<h2>Mails&nbsp;</h2>',),
	array('label'=>'Administrar', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>