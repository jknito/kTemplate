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
		<?php echo $form->label($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>100,'ktype'=>'varchar(100)')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipo'); ?>
		<?php echo $form->textField($model,'tipo',array('size'=>1,'maxlength'=>1,'ktype'=>'varchar(1)')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ruta'); ?>
		<?php echo $form->textField($model,'ruta',array('size'=>60,'maxlength'=>1024,'ktype'=>'varchar(1024)')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'apertura'); ?>
		<?php echo $form->textField($model,'apertura',array('size'=>1,'maxlength'=>1,'ktype'=>'varchar(1)')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'menu_id'); ?>
		<?php echo $form->textField($model,'menu_id',array('ktype'=>'int(11)','rel'=>'tooltip')); ?>
	</div>

	<div>
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->