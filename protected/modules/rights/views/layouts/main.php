<?php $this->beginContent(Rights::module()->appLayout); 

$this->menu=array(
	array('url'=>url('/user/admin'), 'label'=>UserModule::t('Manage User'),'active'=>activeMenu('/admin',$this),),
	array('url'=>url('/rights'), 'label'=>'Permisos','active'=>activeMenu('/rights',$this),),
);

?>

<div id="rights" class="container row-fluid" >
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

	<div class="span9-fluid">

		<?php if( $this->id!=='install' ): ?>

			<div id="menu">

				<?php $this->renderPartial('/_menu'); ?>

			</div>

		<?php endif; ?>

		<?php $this->renderPartial('/_flash'); ?>

		<?php echo $content; ?>

	</div><!-- content -->

</div>

<?php $this->endContent(); ?>