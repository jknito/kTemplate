<?php 
$user = UserInfo::singleton();
$this->pageTitle=Yii::app()->name." | Menu"; ?>

<?php if ($user->haveRol('Admin')):?>
    <a href="<?php echo url('/conf/parametro')?>">Parametros</a><br/>
<?php endif ?>
<?php if ($user->haveRol('Admin')):?>
    <a href="<?php echo url('/tipos/tiposAdquisicion')?>">Tipos de Adquisicion</a><br/>
<?php endif ?>
<?php if ($user->haveRol('Admin')):?>
    <a href="<?php echo url('/mail/admin')?>">Mails</a><br/>
<?php endif ?>
<?php if ($user->haveRol()):?>
    <a href="<?php echo url('/obras')?>">Obras</a><br/>
<?php endif ?>
<?php if ($user->haveRol()):?>
    <a href="<?php echo url('/materialesEtapas')?>">Materiales y Etapas</a><br/>
<?php endif ?>
