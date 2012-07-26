<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('ktype'=>'int(11)','rel'=>'tooltip')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'escenario'); ?>
		<?php echo $form->textField($model,'escenario',array('size'=>50,'maxlength'=>50,'ktype'=>'varchar(50)')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'parametro'); ?>
		<?php echo $form->textField($model,'parametro',array('size'=>60,'maxlength'=>250,'ktype'=>'varchar(250)')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'valor'); ?>
		<?php echo $form->textField($model,'valor',array('size'=>60,'maxlength'=>250,'ktype'=>'varchar(250)')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'referencia_1'); ?>
		<?php echo $form->textField($model,'referencia_1',array('size'=>60,'maxlength'=>250,'ktype'=>'varchar(250)')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'referencia_2'); ?>
		<?php echo $form->textField($model,'referencia_2',array('size'=>60,'maxlength'=>250,'ktype'=>'varchar(250)')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'referencia_3'); ?>
		<?php echo $form->textField($model,'referencia_3',array('size'=>60,'maxlength'=>250,'ktype'=>'varchar(250)')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comentario'); ?>
		<?php echo $form->textArea($model,'comentario',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div>
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->