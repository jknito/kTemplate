<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php \$form=\$this->beginWidget('CActiveForm', array(
	'id'=>'".$this->class2id($this->modelClass)."-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'well'),
)); ?>\n"; ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo "<?php echo \$form->errorSummary(\$model); ?>\n"; ?>
<?php
foreach($this->tableSchema->columns as $column)
{
	if($column->autoIncrement)
		continue;
	if($column->name == 'status'){
?>
	<div>
		<?php echo "<?php echo ".$this->generateActiveLabel($this->modelClass,$column)."; ?>\n"; ?>
		<?php echo "<?php echo CHtml::activeDropDownList(\$model,'status',array(\"1\"=>\"Activo\",\"2\"=>\"Inactivo\")); ?>\n"; ?>
		<?php echo "<?php echo \$form->error(\$model,'{$column->name}'); ?>\n"; ?>
	</div>

<?php
}else{
?>
	<div>
		<?php echo "<?php echo ".$this->generateActiveLabel($this->modelClass,$column)."; ?>\n"; ?>
		<?php echo "<?php echo ".$this->generateActiveField($this->modelClass,$column)."; ?>\n"; ?>
		<?php echo "<?php echo \$form->error(\$model,'{$column->name}'); ?>\n"; ?>
	</div>

<?php
} //else
}//for
?>
	<div>
		<?php echo "<?php echo CHtml::submitButton(\$model->isNewRecord ? 'Crear' : 'Guardar', array('class'=>'btn btn-primary')); ?>\n"; ?>
	</div>

<?php echo "<?php \$this->endWidget(); ?>\n"; ?>