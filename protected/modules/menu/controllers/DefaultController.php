<?php

class DefaultController extends RController
{
	public $layout = 'menu.views.layouts.main';

	public function actionIndex()
	{
		//los datos
		$authmenu = new Authmenu;
		$data = $authmenu->asignar();
		//las columnas
		$columns = array(
			array(
    			'name'=>'id',
	    		'header'=>'ID',
    		),
			array(
    			'name'=>'path',
	    		'header'=>'Menu',
    		),
		);


		$cmd = db()->createCommand("SELECT * FROM authitem WHERE TYPE = 2 and name <> 'Admin'");
		$roles=$cmd->queryAll();
		$select = "";
		foreach ($roles as $rol) {
			//$select .= ", MAX(IF(itemname='".$rol['name']."', 1, 0)) ".$rol['name'];
    		$columns[] = array(
				'name'=>$rol['name'],
    			'header'=>$rol['name'],
    			'type'=>'raw',
    			'value'=>'MenuHelper::enlace($data,"'.$rol['name'].'")',
    		);
		}

		$this->render('index',array('data'=>$data,'columns'=>$columns));
	}

	public function actionProcess(){
        // accept only AJAX request (comment this when debugging)
        if (!Yii::app()->request->isAjaxRequest) {
			throw new CHttpException(404,'Solo se acepta ajax.');            
        }
        $rol = request()->getParam('rol');
        $menu = request()->getParam('menu');
        $accion = request()->getParam('action');

		$authmenu = Authmenu::model()->find('itemname = :rol and menu_id = :menu', array(':rol'=>$rol,':menu'=>$menu));
		
		if($accion == 'assign'){
			if(count($authmenu)>0){
				$accion='revoke';
			}else{
				$authmenu = new Authmenu;
				$authmenu->itemname = $rol;
				$authmenu->menu_id = $menu;
				$authmenu->save();
				$accion="revoke";
			}
		}else{
			$authmenu->delete();
			$accion = 'assign';
		}
		
		echo "$('#".$rol."-".$menu."').attr('class','$accion');";
	}
}