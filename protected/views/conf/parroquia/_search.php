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
		<?php echo $form->label($model,'canton_id'); ?>
		<?php echo $form->textField($model,'canton_id',array('ktype'=>'int(11)','rel'=>'tooltip')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>100,'ktype'=>'varchar(100)')); ?>
	</div>

	<div>
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->