<?php
$this->breadcrumbs=array(
	'Menus'=>array('index'),
	$model->id,
);

$this->tituloPagina = "Ver Menus";

$menu=array(
	array('template'=>'<h2>Menus&nbsp;</h2>',),
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Ver', 'url'=>array('view', 'id'=>$model->id),'active'=>true),
	array('label'=>'Modificar', 'url'=>array('update', 'id'=>$model->id)),
);
?>
<div class="row"><div class="span9">
<?php $this->widget('zii.widgets.CMenu', array(
'items'=>$menu,
'htmlOptions'=>array('class'=>'nav nav-tabs'),
));
?></div></div>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions'=>array(
		'class' =>'table table-bordered table-striped table-condensed',
		),
	'attributes'=>array(
		array(
        	'label'=>'Tipo',
        	'value'=>(empty($model->menu_id)? "":Menu::model()->findByPk($model->menu_id)->nombre." [".Menu::model()->findByPk($model->menu_id)->tipo."]"),
        ),
		'nombre',
		array(
        	'label'=>'Tipo',
        	'value'=>($model->tipo=='C' ? "Categoria":($model->status=='G' ? "Grupo":"Opcion")),
        ),
		'ruta',
		'apertura',
		array(
        	'label'=>'Status',
        	'value'=>($model->status==1 ? "Activo":"Inactivo"),
        ),
	),
)); ?>
