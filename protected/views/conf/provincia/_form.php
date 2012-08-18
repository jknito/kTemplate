<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'provincia-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'well'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model); ?>
	<div>
		<?php echo $form->labelEx($model,'pais_id'); ?>
		<?php echo $form->textField($model,'pais_id',array('ktype'=>'int(11)','rel'=>'tooltip','disabled'=>'disabled','class'=>'input-mini')); ?>
		<?php 
		$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
			'model'=>$model,
			'attribute'=>'paisNombre',
			'sourceUrl'=>url('/conf/pais/'),
			'options'=>array(
				'minLength'=>0,
			),
		));
		?>
		<?php echo $form->error($model,'pais_id'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>100,'ktype'=>'varchar(100)','class'=>'span3')); ?>
		<?php echo $form->error($model,'nombre'); ?>
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
