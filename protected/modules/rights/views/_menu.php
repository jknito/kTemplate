<?php $this->widget('zii.widgets.CMenu', array(
	//'firstItemCssClass'=>'first',
	//'lastItemCssClass'=>'last',
	//'htmlOptions'=>array('class'=>'actions'),
	'htmlOptions'=>array('class'=>'nav nav-tabs'),
	'items'=>array(
		array(
			'label'=>Rights::t('core', 'Assignments'),
			'url'=>array('assignment/view'),
			'itemOptions'=>array('class'=>'item-assignments'),
			'active'=>$this->action->id=='view',
		),
		array(
			'label'=>Rights::t('core', 'Permissions'),
			'url'=>array('authItem/permissions'),
			'itemOptions'=>array('class'=>'item-permissions'),
			'active'=>$this->action->id=='permissions' || 
						$this->action->id=='generate',
		),
		array(
			'label'=>Rights::t('core', 'Roles'),
			'url'=>array('authItem/roles'),
			'itemOptions'=>array('class'=>'item-roles'),
			'active'=>$this->action->id=='roles',
		),
		// quito estos porque son conceptos que aun no entiendo
		// y explicar al usuario algo que ni yo mismo entiendo no es correcto
		/*
		array(
			'label'=>Rights::t('core', 'Tasks'),
			'url'=>array('authItem/tasks'),
			'itemOptions'=>array('class'=>'item-tasks'),
			'active'=>$this->action->id=='tasks',
		),
		array(
			'label'=>Rights::t('core', 'Operations'),
			'url'=>array('authItem/operations'),
			'itemOptions'=>array('class'=>'item-operations'),
			'active'=>$this->action->id=='operations',
		),
		*/
	)
));	

?>
<!--pre>
<?php print_r($this->action->controller->id); ?>
</pre-->