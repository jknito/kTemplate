<?php
$this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Login");
$this->breadcrumbs=array(
	UserModule::t("Login"),
);
?>
<div class="row">
<div class="span4 offset4">
<?php echo CHtml::beginForm('','post',array('class'=>"well")); ?>
    <h1>Login</h1>
    <?php if(count($model->getErrors())!=0){ ?>
    <div class="alert alert-error"><a class="close" data-dismiss="alert">×</a>
    <?php echo CHtml::errorSummary($model); ?>
    </div>
    <?php } ?>
 
        <?php echo CHtml::activeLabel($model,'username'); ?>
        <?php echo CHtml::activeTextField($model,'username',array("class"=>"span3")) ?>
 
        <?php echo CHtml::activeLabel($model,'password'); ?>
        <?php echo CHtml::activePasswordField($model,'password',array("class"=>"span3")) ?>

        <label class="checkbox">
            <?php echo CHtml::activeCheckBox($model,'rememberMe'); ?>
            <?php echo CHtml::activeLabel($model,'rememberMe'); ?>
        </label>

        <?php echo CHtml::submitButton('Login',array("class"=>'btn btn-primary')); ?>

    <?php // echo CHtml::link('Lost Password?', Yii::app()->getModule('user')->recoveryUrl); ?>
    <?php // echo CHtml::link('Register', Yii::app()->getModule('user')->registrationUrl); ?>
<?php echo CHtml::endForm(); ?>
</div>
</div>