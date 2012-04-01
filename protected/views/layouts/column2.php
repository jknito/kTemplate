<?php $this->beginContent('//layouts/main'); ?>
<div class="row-fluid">
<div class="span3-fluid">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Operations',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>
</div>
<div class="span9-fluid">
    <?php echo $content; ?>
</div>
</div>
<?php $this->endContent(); ?>