<?php $this->beginContent('//layouts/main'); ?>
<div class="row-fluid">
<?php
if ( isset($this->menu) && count($this->menu) != 0 ) { ?> 
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
<?php } ?>
<div class="span12-fluid">
    <?php echo $content; ?>
</div>
</div>
<?php $this->endContent(); ?>