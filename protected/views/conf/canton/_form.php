<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'canton-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'well'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model); ?>
	<div>
		<?php echo $form->labelEx($model,'pais_id'); ?>
		<?php echo $form->textField($model,'pais_id',array('ktype'=>'int(11)','rel'=>'tooltip','readonly'=>'readonly','class'=>'input-mini')); ?>
		<?php 
		$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
			'model'=>$model,
			'attribute'=>'paisNombre',
			'sourceUrl'=>url('/conf/general/paises'),
			'options'=>array(
				'minLength'=>0,
				'select'=>'js:function(event,ui){
					$("#Canton_pais_id").val(ui.item.id);
				}',
				'change'=>'js:function(event,ui){
					if(!ui.item){
						$("#Canton_pais_id").val("");
						$("#Canton_paisNombre").val("");
					}
				}'
			),
		));
		?>
		<?php echo $form->error($model,'pais_id'); ?>
	</div>
	<div>
		<?php echo $form->labelEx($model,'provincia_id'); ?>
		<?php echo $form->textField($model,'provincia_id',array('ktype'=>'int(11)','rel'=>'tooltip','readonly'=>'readonly','class'=>'input-mini')); ?>
		<?php 
		$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
			'model'=>$model,
			'attribute'=>'provinciaNombre',
			'sourceUrl'=>'js:function(request,response){$.getJSON("'.url('/conf/general/provincias').'",{pais:$("#Canton_pais_id").val(),term:request.term},function(data){ response(data)})}',
			'options'=>array(
				'minLength'=>0,
				'select'=>'js:function(event,ui){
					$("#Canton_provincia_id").val(ui.item.id);
				}',
				'change'=>'js:function(event,ui){
					if(!ui.item){
						$("#Canton_provincia_id").val("");
						$("#Canton_provinciaNombre").val("");
					}
				}'
			),
		));
		?>
		<?php echo $form->error($model,'provincia_id'); ?>
	</div>
	<div>
		<?php echo $form->labelEx($model,'codigo'); ?>
		<?php echo $form->textField($model,'codigo',array('size'=>50,'maxlength'=>50,'ktype'=>'varchar(50)')); ?>
		<?php echo $form->error($model,'codigo'); ?>
	</div>
	<div>
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>100,'ktype'=>'varchar(100)')); ?>
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
