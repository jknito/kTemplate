<?php
$this->breadcrumbs=array(
	'Provincias'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('template'=>'<h2>Provincias&nbsp;</h2>',),
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('provincia-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<style type="text/css">
.filters td input { width: 90%; margin-bottom:0px;}
.filters td select { width: auto; margin-bottom:0px;}
</style>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'provincia-grid',
	'dataProvider'=>$model->search(),
	'itemsCssClass'=>'table table-bordered table-striped table-condensed',
	'pagerCssClass'=>'pagination pagination-centered',
	'pager'=>array(
		'header'=>false,
	),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'paisNombre',
		'codigo',
		'nombre',
        array( 'class'=>'CDataColumn',
        	'id'=>'status',
        	'header'=>'Status',
        	'value'=>'$data->status==1 ? "Activo":"Inactivo"',
        	'filter'=>CHtml::activeDropDownList($model,"status",array(""=>"","1"=>"Activo","2"=>"Inactivo")),
        ),
				array(
			'class'=>'CButtonColumn',
			'template'=>'{view} {update}',
			'buttons'=>array(
				'view' => array(
				    'label'=>'<i class="icon-search"></i>',
				    'imageUrl'=>false,  // image URL of the button. If not set or false, a text link is used
				    'options'=>array('title'=>'Ver'), // HTML options for the button tag
				),
				'update' => array(
				    'label'=>'<i class="icon-edit"></i>',
				    'imageUrl'=>false,  // image URL of the button. If not set or false, a text link is used
				    'options'=>array('title'=>'Editar'), // HTML options for the button tag
				)
			),
		),
	),
	'pager'=>array('class'=>'KLinkPager'),
)); ?>
