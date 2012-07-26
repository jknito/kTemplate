<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:</b>
	<?php echo CHtml::encode($data->tipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('to')); ?>:</b>
	<?php echo CHtml::encode($data->to); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cc')); ?>:</b>
	<?php echo CHtml::encode($data->cc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bcc')); ?>:</b>
	<?php echo CHtml::encode($data->bcc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subject')); ?>:</b>
	<?php echo CHtml::encode($data->subject); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('attach')); ?>:</b>
	<?php echo CHtml::encode($data->attach); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('body')); ?>:</b>
	<?php echo CHtml::encode($data->body); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('registro')); ?>:</b>
	<?php echo CHtml::encode($data->registro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('intentos')); ?>:</b>
	<?php echo CHtml::encode($data->intentos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('envio')); ?>:</b>
	<?php echo CHtml::encode($data->envio); ?>
	<br />

	*/ ?>

</div>