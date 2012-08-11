<?php
$this->breadcrumbs=array(
	'Menus'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->tituloPagina = " Modificar Menus";

$menu=array(
	array('template'=>'<h2>Menus&nbsp;</h2>',),
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Ver', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Modificar', 'url'=>array('update', 'id'=>$model->id),'active'=>true),
);
?>
<div class="row"><div class="span9">
<?php $this->widget('zii.widgets.CMenu', array(
'items'=>$menu,
'htmlOptions'=>array('class'=>'nav nav-tabs'),
));
?></div></div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>