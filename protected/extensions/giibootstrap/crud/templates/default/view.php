<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php
echo "<?php\n";
$nameColumn=$this->guessNameColumn($this->tableSchema->columns);
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	\$model->{$nameColumn},
);\n";
?>

$this->tituloPagina = "Ver <?php echo $label; ?>";

$this->menu=array(
	array('template'=>'<h2><?php echo $label; ?>&nbsp;</h2>',),
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Modificar', 'url'=>array('update', 'id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>)),
	array('label'=>'Administrar', 'url'=>array('admin')),
);
?>
<?php echo "<?php"; ?> $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions'=>array(
		'class' =>'table table-bordered table-striped table-condensed',
		),
	'attributes'=>array(
<?php
foreach($this->tableSchema->columns as $column){
	if($column->name == 'status'){
        echo "array(
        	'label'=>'Status',
        	'value'=>(\$model->status==1 ? \"Activo\":\"Inactivo\"),
        ),";
		continue;
	}
	echo "\t\t'".$column->name."',\n";
}
?>
	),
)); ?>
