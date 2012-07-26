<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'parametro-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'well'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model); ?>
	<div>
		<?php echo $form->labelEx($model,'escenario'); ?>
		<?php echo $form->textField($model,'escenario',array('size'=>50,'maxlength'=>50,'ktype'=>'varchar(50)')); ?>
		<?php echo $form->error($model,'escenario'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'parametro'); ?>
		<?php echo $form->textField($model,'parametro',array('size'=>60,'maxlength'=>250,'ktype'=>'varchar(250)')); ?>
		<?php echo $form->error($model,'parametro'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'valor'); ?>
		<?php echo $form->textField($model,'valor',array('size'=>60,'maxlength'=>250,'ktype'=>'varchar(250)')); ?>
		<?php echo $form->error($model,'valor'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'referencia_1'); ?>
		<?php echo $form->textField($model,'referencia_1',array('size'=>60,'maxlength'=>250,'ktype'=>'varchar(250)')); ?>
		<?php echo $form->error($model,'referencia_1'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'referencia_2'); ?>
		<?php echo $form->textField($model,'referencia_2',array('size'=>60,'maxlength'=>250,'ktype'=>'varchar(250)')); ?>
		<?php echo $form->error($model,'referencia_2'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'referencia_3'); ?>
		<?php echo $form->textArea($model,'referencia_3',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'referencia_3'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'comentario'); ?>
		<?php echo $form->textArea($model,'comentario',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'comentario'); ?>
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
