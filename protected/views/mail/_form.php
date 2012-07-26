<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'mail-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'well'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model); ?>
	<div>
		<?php echo $form->labelEx($model,'referencia'); ?>
		<?php if($model->isNewRecord): ?>
			<?php echo $form->textField($model,'referencia',array('size'=>60,'maxlength'=>250,'ktype'=>'varchar(250)')); ?>
		<?php else: ?>
			<table class="table table-bordered span3" style="background-color: white"><tr><td>
			<?php echo $model->referencia; ?>
			</td></tr></table>
		<?php endif ?>
		<?php echo $form->error($model,'referencia'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'tipo'); ?>
		<?php if($model->isNewRecord): ?>
			<?php echo $form->textField($model,'tipo',array('size'=>60,'maxlength'=>250,'ktype'=>'varchar(250)')); ?>
		<?php else: ?>
			<table class="table table-bordered span3" style="background-color: white"><tr><td>
			<?php echo $model->tipo; ?>
			</td></tr></table>
		<?php endif ?>
		<?php echo $form->error($model,'tipo'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'to'); ?>
		<?php if($model->isNewRecord): ?>
			<?php echo $form->textArea($model,'to',array('rows'=>1, 'cols'=>50)); ?>
		<?php else: ?>
			<table class="table table-bordered span3" style="background-color: white"><tr><td>
			<?php echo $model->to; ?>
			</td></tr></table>
		<?php endif ?>
		<?php echo $form->error($model,'to'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'cc'); ?>
		<?php if($model->isNewRecord): ?>
			<?php echo $form->textArea($model,'cc',array('rows'=>1, 'cols'=>50)); ?>
		<?php else: ?>
			<table class="table table-bordered span3" style="background-color: white"><tr><td>
			<?php echo $model->cc; ?>
			</td></tr></table>
		<?php endif ?>
		<?php echo $form->error($model,'cc'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'bcc'); ?>
		<?php if($model->isNewRecord): ?>
			<?php echo $form->textArea($model,'bcc',array('rows'=>1, 'cols'=>50)); ?>
		<?php else: ?>
			<table class="table table-bordered span3" style="background-color: white"><tr><td>
			<?php echo $model->bcc; ?>
			</td></tr></table>
		<?php endif ?>
		<?php echo $form->error($model,'bcc'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'subject'); ?>
		<?php if($model->isNewRecord): ?>
			<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>1000,'ktype'=>'varchar(1000)')); ?>
		<?php else: ?>
			<table class="table table-bordered span3" style="background-color: white"><tr><td>
			<?php echo $model->subject; ?>
			</td></tr></table>
		<?php endif ?>
		<?php echo $form->error($model,'subject'); ?>
	</div>

	<div>
		<?php if( ! $model->isNewRecord): ?>
			<?php echo $form->labelEx($model,'attach'); ?>
			<table class="table table-bordered span3" style="background-color: white"><tr><td>
			<?php echo $model->attach; ?>
			</td></tr></table>
		<?php endif ?>
		<?php //echo $form->error($model,'attach'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'body'); ?>
		<?php if( $model->isNewRecord): ?>
			<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
		<?php else: ?>
			<table class="table table-bordered span3" style="background-color: white"><tr><td>
			<?php echo $model->body; ?>
			</td></tr></table>
		<?php endif ?>
		<?php echo $form->error($model,'body'); ?>
	</div>

	<div>
		<?php //echo $form->labelEx($model,'registro'); ?>
		<?php //echo $form->textField($model,'registro',array('ktype'=>'datetime','rel'=>'tooltip')); ?>
		<?php //echo $form->error($model,'registro'); ?>
	</div>

	<div>
		<?php //echo $form->labelEx($model,'envio'); ?>
		<?php //echo $form->textField($model,'envio',array('ktype'=>'datetime','rel'=>'tooltip')); ?>
		<?php //echo $form->error($model,'envio'); ?>
	</div>

	<div>
		<?php if( ! $model->isNewRecord): ?>
			<?php echo $form->labelEx($model,'status'); ?>
			<?php echo CHtml::activeDropDownList($model,'status',array("1"=>"Activo","2"=>"Inactivo")); ?>
			<?php echo $form->error($model,'status'); ?>
		<?php endif ?>
	</div>

	<div>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Send' : 'Guardar', array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>
