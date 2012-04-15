<div class="row-fluid">
<div class="span12-fluid">
<?php 
$text = "Manage Users";
$this->widget('zii.widgets.CMenu',array(
    'htmlOptions'=>array('class'=>'nav nav-tabs'),
    'items'=>array(
        array('url'=>$this->createUrl('/user/admin'), 'label'=>UserModule::t('Manage User'), 'active'=>$this->action->id=='admin'),
        array('url'=>$this->createUrl('create'), 'label'=>UserModule::t('Create User'), 'active'=>$this->action->id=='create'),
    ),
));

?>
</div>
</div>