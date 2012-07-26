<?php
$this->breadcrumbs=array(
	'Parametros',
);

$this->menu=array(
	array('template'=>'<h2>Parametros&nbsp;</h2>',),
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Administrar', 'url'=>array('admin')),
);
?>

<?php // $this->widget('zii.widgets.CListView', array(
	//'dataProvider'=>$dataProvider,
	//'itemView'=>'_view',
//)); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'parametro-grid',
	'dataProvider'=>$dataProvider,
	'itemsCssClass'=>'table table-bordered table-striped table-condensed',
	'pagerCssClass'=>'pagination pagination-centered',
	'pager'=>array(
		'header'=>false,
	),
	'columns'=>array(
		'id',
		'escenario',
		'parametro',
		'valor',
		'referencia_1',
		//'referencia_2',
		/*
		'referencia_3',
		'comentario',*/
array( 'class'=>'CDataColumn',
        	'name'=>'status',
        	'header'=>'Status',
        	'value'=>'$data->status==1 ? "Activo":"Inactivo"',
        ),
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}',
			'buttons'=>array(
				'view' => array(
				    'label'=>'<i class="icon-search"></i>',
				    'imageUrl'=>false,  // image URL of the button. If not set or false, a text link is used
				    'options'=>array('title'=>'Ver'), // HTML options for the button tag
				)
			),
		),
	),
	'pager'=>array('class'=>'KLinkPager'),
)); ?>
