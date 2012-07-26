<?php $this->beginContent('//layouts/main'); ?>
<?php if ( isset($this->menu)) { ?>
<div class="row-fluid">
	<?php
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'nav nav-pills'),
		));
	?>
</div>
<?php } ?>
<div class="row-fluid">
<div class="span12-fluid">
	<?php echo $content; ?>
</div>
</div>
<?php $this->endContent(); ?>