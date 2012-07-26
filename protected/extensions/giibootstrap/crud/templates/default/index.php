<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php
echo "<?php\n";
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label',
);\n";
?>

$this->menu=array(
	array('template'=>'<h2><?php echo $label; ?>&nbsp;</h2>',),
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Administrar', 'url'=>array('admin')),
);
?>

<?php echo "<?php //"; ?> $this->widget('zii.widgets.CListView', array(
	//'dataProvider'=>$dataProvider,
	//'itemView'=>'_view',
//)); ?>

<?php echo "<?php"; ?> $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid',
	'dataProvider'=>$dataProvider,
	'itemsCssClass'=>'table table-bordered table-striped table-condensed',
	'pagerCssClass'=>'pagination pagination-centered',
	'pager'=>array(
		'header'=>false,
	),
	'columns'=>array(
<?php
$count=0;
foreach($this->tableSchema->columns as $column)
{
	if($column->name == 'status'){
        echo "array( 'class'=>'CDataColumn',
        	'name'=>'status',
        	'header'=>'Status',
        	'value'=>'\$data->status==1 ? \"Activo\":\"Inactivo\"',
        ),";
		continue;
	}
	if(++$count==7)
		echo "\t\t/*\n";
	echo "\t\t'".$column->name."',\n";
}
if($count>=7)
	echo "\t\t*/\n";
?>
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
