<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'menu-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'well'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model); ?>
	<div>
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>100,'ktype'=>'varchar(100)')); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'tipo'); ?>
		<?php 
		echo $form->dropDownList($model,'tipo',array(''=>'','C'=>'Categoria','G'=>'Grupo','O'=>'Opcion'),
		array(
			'size'=>1,
			'maxlength'=>1,
			'ktype'=>'varchar(1)',
			'ajax'=>array(
				'type'=>'POST',
				'url'=>url('menu/menu/padres'),
				'update'=>'#Menu_menu_id'
			),
		)); ?>
		<?php //echo $form->textField($model,'tipo',array('size'=>1,'maxlength'=>1,'ktype'=>'varchar(1)')); ?>
		<?php echo $form->error($model,'tipo'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'ruta'); ?>
		<?php echo $form->textField($model,'ruta',array('size'=>60,'maxlength'=>1024,'ktype'=>'varchar(1024)')); ?>
		<?php echo $form->error($model,'ruta'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'apertura'); ?>
		<?php echo $form->textField($model,'apertura',array('size'=>1,'maxlength'=>1,'ktype'=>'varchar(1)')); ?>
		<?php echo $form->error($model,'apertura'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo CHtml::activeDropDownList($model,'status',array("1"=>"Activo","2"=>"Inactivo")); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'menu_id'); ?>
		<?php
		$data=array();
		if($model->tipo == "G"){
    		$data = Menu::model()->findAll('status = 1 and tipo = "C"');
    		$data=CHtml::listData($data,'id','nombre');
		    //foreach($data as $value=>$name)
		    //{
		    //    echo CHtml::tag('option',
		    //               array('value'=>$value),CHtml::encode($name),true);
		    //}
		    //echo CHtml::dropDownList("Menu_menu_id","",$data);
    	}
		if($model->tipo == "O"){
    		$cmd = db()->createCommand(
    		"
SELECT m1.nombre categoria, m2.id, m2.nombre, m2.tipo
FROM menu m1, menu m2
WHERE m2.menu_id = m1.id
AND m2.tipo = 'G'
"
    		);
    		$data=$cmd->queryAll();
		    $data=CHtml::listData($data,'id','nombre','categoria');

		    //echo CHtml::dropDownList("Menu_menu_id","",$data);
    	}
		//$data = Menu::model()->findAll('status = 1 and tipo in ("C","G")');
		//array_unshift($data, new Menu);
		//$data = CHtml::listData($data,'id','nombre');
		echo $form->dropDownList($model,'menu_id',$data); ?>
		<?php //echo $form->textField($model,'menu_id',array('ktype'=>'int(11)','rel'=>'tooltip')); ?>
		<?php echo $form->error($model,'menu_id'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'orden'); ?>
		<?php echo $form->textField($model,'orden',array('ktype'=>'int(11)','rel'=>'tooltip')); ?>
		<?php echo $form->error($model,'orden'); ?>
	</div>

	<div>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>
