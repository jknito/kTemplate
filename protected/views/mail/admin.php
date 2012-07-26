<?php
$this->breadcrumbs=array(
	'Mails'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('template'=>'<h2>Mails&nbsp;</h2>',),
	array('label'=>'Crear', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('mail-grid', {
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

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'mail-grid',
	'dataProvider'=>$model->search(),
	'itemsCssClass'=>'table table-bordered table-striped table-condensed',
	'pagerCssClass'=>'pagination pagination-centered',
	'pager'=>array(
		'header'=>false,
	),
	'filter'=>$model,
	'columns'=>array(
		'referencia',
        'tipo',
		'to',
		'cc',
		//'bcc',
		'subject',
		//'attach',
		//'body',
		'registro',
		'envio',
        /*array( 'class'=>'CDataColumn',
        	'id'=>'status',
        	'header'=>'Status',
        	'value'=>'$data->status==1 ? "Activo":"Inactivo"',
        	'filter'=>CHtml::activeDropDownList($model,"status",array(""=>"","1"=>"Activo","2"=>"Inactivo")),
        ),*/
        array( 'class'=>'CDataColumn',
        	'id'=>'reenvio',
        	'header'=>'Reenvio',
			'type'=>'raw',
        	'value'=>'CHtml::ajaxLink("Re enviar",url("/mail/send",array("id"=>$data->id)),array("success"=>"js:function(){location.reload();}","error"=>"js:function(response,status){alert(response.responseText);}","cache"=>"false"))',
        	//'filter'=>CHtml::activeDropDownList($model,"status",array(""=>"","1"=>"Activo","2"=>"Inactivo")),
			//'visible'=>'$data->status==1 ? true : false',
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
