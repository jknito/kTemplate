<?php

class MenuModule extends CWebModule
{

	//public $layout = 'menu.views.layouts.main';
	
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'menu.models.*',
			'menu.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
	
	public function getCategorias($user){
		if($user->isAdmin())
			$data = Menu::model()->findAll("status = 1 and tipo ='C'");
		else
			$data = Menu::model()->findAll("status = 1 and tipo ='C' and id in (select menu_id from authmenu where itemname in (select itemname from authassignment where userid = :user))", array(':user'=>$user->user()->id));
		return $data;
	}
	public function getMenues($user,$categoria){
		$sql = "
SELECT * FROM (
SELECT CONCAT(LPAD(m1.orden,5,'0'), LPAD(m2.orden,5,'0'), '00000') o, CONCAT('/',m1.nombre,'/',m2.nombre) AS path, m1.id categoria, m2.*
FROM menu m1, menu m2
WHERE m2.menu_id = m1.id
AND m2.tipo = 'G'
UNION
SELECT CONCAT(LPAD(m1.orden,5,'0'), LPAD(m2.orden,5,'0'), LPAD(m3.orden,5,'0')) o, CONCAT('/',m1.nombre,'/',m2.nombre,'/',m3.nombre) AS path, m1.id categoria, m3.*
FROM menu m1, menu m2, menu m3
WHERE m2.menu_id = m1.id
AND m3.menu_id = m2.id
AND m3.tipo = 'O') a
WHERE categoria = $categoria";
		if(! $user->isAdmin())
			$sql .= " AND id IN (SELECT menu_id FROM authmenu WHERE itemname IN (SELECT itemname FROM authassignment WHERE userid = ".$user->user()->id."))";
$sql .=" ORDER BY o, path";
		
		$cmd = db()->createCommand($sql);
		$data = $cmd->queryAll();
		return $data;
	}
}
