<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>20,'maxlength'=>20,'ktype'=>'bigint(20)')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipo'); ?>
		<?php echo $form->textField($model,'tipo',array('size'=>60,'maxlength'=>250,'ktype'=>'varchar(250)')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'to'); ?>
		<?php echo $form->textArea($model,'to',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cc'); ?>
		<?php echo $form->textArea($model,'cc',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bcc'); ?>
		<?php echo $form->textArea($model,'bcc',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'subject'); ?>
		<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>1000,'ktype'=>'varchar(1000)')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'attach'); ?>
		<?php echo $form->textArea($model,'attach',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'body'); ?>
		<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'registro'); ?>
		<?php echo $form->textField($model,'registro',array('ktype'=>'datetime','rel'=>'tooltip')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'envio'); ?>
		<?php echo $form->textField($model,'envio',array('ktype'=>'datetime','rel'=>'tooltip')); ?>
	</div>

	<div>
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->