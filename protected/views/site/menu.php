<?php 
$user = UserInfo::singleton();
$menu = Menu::model()->findByPk(request()->getParam("id"));
$this->pageTitle=Yii::app()->name." | Menu $menu->nombre"; 

$data = Yii::app()->getModule('menu')->getMenues($user,request()->getParam("id"));
//dd($data);
foreach ($data as $value) {
	if($value["tipo"] == "O"){
		$target = "_blank";
		if($value["apertura"] == "S")
			$target = "_self";
		echo CHtml::link($value["nombre"], $value["ruta"], array('target'=>$target));
		echo "<br/>";
	}else{
		echo "<h3>".$value["nombre"]."</h3>";
	}
}
?>