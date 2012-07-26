<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('escenario')); ?>:</b>
	<?php echo CHtml::encode($data->escenario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parametro')); ?>:</b>
	<?php echo CHtml::encode($data->parametro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('valor')); ?>:</b>
	<?php echo CHtml::encode($data->valor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('referencia_1')); ?>:</b>
	<?php echo CHtml::encode($data->referencia_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('referencia_2')); ?>:</b>
	<?php echo CHtml::encode($data->referencia_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('referencia_3')); ?>:</b>
	<?php echo CHtml::encode($data->referencia_3); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('comentario')); ?>:</b>
	<?php echo CHtml::encode($data->comentario); ?>
	<br />

	*/ ?>

</div>