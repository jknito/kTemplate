<?php $this->beginContent(); 

$this->menu=array(
	array('url'=>url('/user/admin'), 'label'=>'Usuarios','active'=>false,),
	array('url'=>url('/rights'), 'label'=>'Permisos','active'=>false,),
	array('url'=>url('/menu'), 'label'=>'Menu','active'=>true,),
);

?>

<div class="container row-fluid" >
	<div class="span3-fluid">
		<div class="tabbable tabs-left">
		<?php
			$this->widget('zii.widgets.CMenu', array(
				'htmlOptions'=>array('class'=>'nav nav-tabs'),
				'items'=>$this->menu,
			));
		?>
		</div>
	</div>

	<div class="span9">
		<div class="row">
			<?php $this->widget('zii.widgets.CMenu', array(
	'htmlOptions'=>array('class'=>'nav nav-tabs'),
	'items'=>array(
		array(
			'label'=>'Permisos Menu',
			'url'=>array('default/'),
			'active'=>$this->id=='default',
		),
		array(
			'label'=>'Menues',
			'url'=>array('menu/index'),
			'active'=>$this->id=='menu',
		),
	)
));	

?>
		</div>
		<div class="row">

		<?php 
		//dd($this);
		echo $content; ?>
		</div>

	</div><!-- content -->

</div>

<?php $this->endContent(); ?>