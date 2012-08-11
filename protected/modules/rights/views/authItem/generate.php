<?php $this->breadcrumbs = array(
	'Rights'=>Rights::getBaseUrl(),
	Rights::t('core', 'Generate items'),
); ?>
<script>
function fnShowActions(path){
    $('[path="'+path+'"]').toggle();
}
</script>
<div id="generator" class="row-fluid">
<div class="span12">

	<h2><?php echo Rights::t('core', 'Generate items'); ?></h2>

	<p><?php echo Rights::t('core', 'Please select which items you wish to generate.'); ?></p>

	<div>

		<?php $form=$this->beginWidget('CActiveForm'); ?>

			<div>

				<table class="table table-bordered table-striped table-condensed">

					<tbody>

						<tr class="application-heading-row">
							<th colspan="4"><?php echo Rights::t('core', 'Application'); ?></th>
						</tr>

						<?php $this->renderPartial('_generateItems', array(
							'model'=>$model,
							'form'=>$form,
							'items'=>$items,
							'existingItems'=>$existingItems,
							'displayModuleHeadingRow'=>true,
							'basePathLength'=>strlen(Yii::app()->basePath),
						)); ?>

					</tbody>

				</table>

			</div>

			<div class="row">

   				<?php echo CHtml::link(Rights::t('core', 'Select all'), '#', array(
   					'onclick'=>"jQuery('.generate-item-table').find(':checkbox').attr('checked', 'checked'); return false;",
   					'class'=>'selectAllLink')); ?>
   				/
				<?php echo CHtml::link(Rights::t('core', 'Select none'), '#', array(
					'onclick'=>"jQuery('.generate-item-table').find(':checkbox').removeAttr('checked'); return false;",
					'class'=>'selectNoneLink')); ?>

			</div>

   			<div class="row">

				<?php echo CHtml::submitButton(Rights::t('core', 'Generate')); ?>

			</div>

		<?php $this->endWidget(); ?>

	</div>
</div>
</div>