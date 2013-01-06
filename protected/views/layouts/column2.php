<?php $this->beginContent('//layouts/main'); ?>
<?php if ( isset($this->tituloPagina)) { ?>
<div class="row-fluid">
	<h2><?= $this->tituloPagina;?></h2>
</div>
<?php } ?>
<div class="row">
<div class="span3">
	<div class="tabbable tabs-left">
	<?php
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'nav nav-tabs'),
		));
	?>
	</div>
</div>
<div class="span9-fluid">
    <?php echo $content; ?>
</div>
</div>
<?php $this->endContent(); ?>