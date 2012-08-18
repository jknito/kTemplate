<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pais-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'well'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model); ?>
	<div>
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>100,'ktype'=>'varchar(100)')); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'codigo'); ?>
		<?php echo $form->textField($model,'codigo',array('size'=>50,'maxlength'=>50,'ktype'=>'varchar(50)')); ?>
		<?php echo $form->error($model,'codigo'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo CHtml::activeDropDownList($model,'status',array("1"=>"Activo","2"=>"Inactivo")); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>
