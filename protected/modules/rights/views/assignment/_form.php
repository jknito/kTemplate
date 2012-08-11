<div class="form">

<?php $form=$this->beginWidget('CActiveForm'); ?>
		<?php echo $form->dropDownList($model, 'itemname', $itemnameSelectOptions); ?>
		<?php echo CHtml::submitButton(Rights::t('core', 'Assign'),array('class'=>'btn btn-primary')); ?>
		<?php echo $form->error($model, 'itemname'); ?>
<?php $this->endWidget(); ?>

</div>