<?php
$this->breadcrumbs=array(
	'Mails'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->tituloPagina = " Modificar Mails";

$this->menu=array(
	array('template'=>'<h2>Mails&nbsp;</h2>',),
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Ver', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>