<?php
$this->breadcrumbs=array(
	'Menus'=>array('index'),
	'Manage',
);

$menu=array(
	array('template'=>'<h2>Menus&nbsp;</h2>',),
	array('label'=>'Listar', 'url'=>array('index'),'active'=>true),
	array('label'=>'Crear', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('menu-grid', {
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
<?php // echo CHtml::link('Busqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<div class="row"><div class="span9">
<?php $this->widget('zii.widgets.CMenu', array(
'items'=>$menu,
'htmlOptions'=>array('class'=>'nav nav-tabs'),
));
?></div></div>
<div class="row">
<div class="span2">
<?php
$this->widget('system.web.widgets.CTreeView',array(
	'url' => url('menu/menu/ajaxFillTree'),
	//'persist'=>'location',
	//'data'=>$dataArray,
	)
);
?>
</div>
<div class="span7">

<?php 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'menu-grid',
	'dataProvider'=>$model->search(),
	'itemsCssClass'=>'table table-bordered table-striped table-condensed',
	'pagerCssClass'=>'pagination pagination-centered',
	'pager'=>array(
		'header'=>false,
	),
	'filter'=>$model,
	'columns'=>array(
		array( 'id'=>'menu_id',
        	'header'=>'Menu',
        	'value'=>'empty($data->menu_id)? "" : Menu::model()->findByPk($data->menu_id)->nombre',
        	'filter'=>false,
        ),
		'nombre',
        array( 'class'=>'CDataColumn',
        	'id'=>'tipo',
        	'header'=>'Tipo',
        	'value'=>'$data->tipo=="C" ? "Categoria":($data->tipo=="G" ? "Grupo":"Opcion")',
        	'filter'=>CHtml::activeDropDownList($model,"tipo",array(""=>"","C"=>"Categoria","G"=>"Grupo","O"=>"Opcion")),
        ),
		'ruta',
		array( 'id'=>'apertura',
        	'header'=>'Apertura',
        	'value'=>'$data->apertura',
        	'filter'=>false,
        ),
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
));
 ?>
</div>
</div>