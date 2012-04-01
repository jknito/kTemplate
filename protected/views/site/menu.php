<?php $this->pageTitle=Yii::app()->name; ?>

<?php
if( Yii::app()->getModule('user')->isAdmin()){
?>
<div class="row-fluid">
<div class="span12">
<div class="page-header"><h1>Opciones administrativas</h1></div>
<a class="btn btn-large" href="<?=$this->createUrl('/user/admin')?>">
<img src="<?=$this->createUrl('/images/menu/24x24/user-admin.png')?>" />
Usuarios</a>
<a class="btn btn-large" href="<?=$this->createUrl('profileField/admin')?>">
<img src="<?=$this->createUrl('/images/menu/24x24/tag.png')?>" />
Campos en Perfil</a>
<a class="btn btn-large" href="<?=$this->createUrl('/rights')?>">
<img src="<?=$this->createUrl('/images/menu/24x24/users.png')?>" />
Permisos</a>
</div>
</div>

<?php } ?>
