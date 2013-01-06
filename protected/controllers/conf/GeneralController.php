<?php

class GeneralController extends RController
{
	public function filters()
	{
		return array(
			'rights',
		);
	}
	/**
	 * Para consultas de los paises
	 */
	public function actionPaises(){
		
		$cmd = cmd();
		$cmd->select('id, nombre as value, nombre as label');
		$cmd->from('pais');
		$cmd->where('status = 1 and ( upper(nombre) like :pais or upper(codigo) like :pais )', array(':pais'=>strtoupper('%'.request()->getParam('term').'%')));

		$paises = $cmd->queryAll();

		header('Content-type: application/json');
		echo CJavaScript::jsonEncode($paises);
		app()->end(); 
	}	
	public function actionProvincias(){
		
		$cmd = cmd();
		$cmd->select('id, nombre as value, nombre as label');
		$cmd->from('provincia');
		$cmd->where('status = 1 and pais_id = :pais and ( upper(nombre) like :provincia or upper(codigo) like :provincia )', array(':pais'=>request()->getParam('pais'),':provincia'=>strtoupper('%'.request()->getParam('term').'%')));

		$paises = $cmd->queryAll();

		header('Content-type: application/json');
		echo CJavaScript::jsonEncode($paises);
		app()->end(); 
	}	
	public function actionCantones(){
		
		$cmd = cmd();
		$cmd->select('id, nombre as value, nombre as label');
		$cmd->from('canton');
		$cmd->where('status = 1 and provincia_id = :provincia and ( upper(nombre) like :canton or upper(codigo) like :canton )', array(':provincia'=>request()->getParam('provincia'),':canton'=>strtoupper('%'.request()->getParam('term').'%')));

		$cantones = $cmd->queryAll();

		header('Content-type: application/json');
		echo CJavaScript::jsonEncode($cantones);
		app()->end(); 
	}	
	public function actionParroquias(){
		
		$cmd = cmd();
		$cmd->select('id, nombre as value, nombre as label');
		$cmd->from('parroquia');
		$cmd->where('status = 1 and canton_id = :canton and ( upper(nombre) like :parroquia or upper(codigo) like :parroquia)', array(':canton'=>request()->getParam('canton'),':parroquia'=>strtoupper('%'.request()->getParam('term').'%')));

		$parroquias = $cmd->queryAll();

		header('Content-type: application/json');
		echo CJavaScript::jsonEncode($parroquias);
		app()->end(); 
	}	
	public function actionVehiculos(){
		
		$cmd = cmd();
		$cmd->select('id, placa as value, concat(placa,\' \', tipo) as label');
		$cmd->from('vehiculo');
		$cmd->where('status = 1 and ( upper(placa) like :placa or upper(tipo) like :tipo )', array(':placa'=>strtoupper('%'.request()->getParam('term').'%'),':tipo'=>strtoupper('%'.request()->getParam('term').'%')));

		$paises = $cmd->queryAll();

		header('Content-type: application/json');
		echo CJavaScript::jsonEncode($paises);
		app()->end(); 
	}	
	public function actionOlcs(){
		
		$cmd = cmd();
		$cmd->select('id, nombre as value, concat(codigo,\' \', nombre) as label');
		$cmd->from('olc');
		$cmd->where('status = 1 and ( upper(codigo) like :codigo or upper(nombre) like :nombre )', array(':codigo'=>strtoupper('%'.request()->getParam('term').'%'),':nombre'=>strtoupper('%'.request()->getParam('term').'%')));

		$paises = $cmd->queryAll();

		header('Content-type: application/json');
		echo CJavaScript::jsonEncode($paises);
		app()->end(); 
	}	
	public function actionChofers(){
		
		$cmd = cmd();
		$cmd->select('id, nombre as value, concat(licencia,\' \', nombre,\' \', apellido) as label');
		$cmd->from('chofer');
		$cmd->where('status = 1 and ( upper(licencia) like :term or upper(nombre) like :term or upper(apellido) like :term )', array(':term'=>strtoupper('%'.request()->getParam('term').'%')));

		$paises = $cmd->queryAll();

		header('Content-type: application/json');
		echo CJavaScript::jsonEncode($paises);
		app()->end(); 
	}
	public function actionAreasComercial(){
		
		$cmd = cmd();
		$cmd->select('id, concat(\'[\',codigo,\'] \', nombre) as value, concat(\'[\',codigo,\'] \', nombre) as label');
		$cmd->from('area_comercial');
		$cmd->where('status = 1 and ( upper(codigo) like :area or upper(nombre) like :area )', array(':area'=>strtoupper('%'.request()->getParam('term').'%'),));

		$datos = $cmd->queryAll();

		header('Content-type: application/json');
		echo CJavaScript::jsonEncode($datos);
		app()->end(); 
	}
	public function actionHorarios(){
		
		$cmd = cmd();
		$cmd->select('id, nombre as value, nombre as label');
		$cmd->from('horario');
		$cmd->where('status = 1 and upper(nombre) like :nombre', array(':nombre'=>strtoupper('%'.request()->getParam('term').'%'),));

		$datos = $cmd->queryAll();

		header('Content-type: application/json');
		echo CJavaScript::jsonEncode($datos);
		app()->end(); 
	}
	public function actionRutas(){
		
		$cmd = cmd();
		$cmd->select('id, concat(\'[\',codigo,\'] \', nombre) as value, concat(\'[\',codigo,\'] \', nombre) as label');
		$cmd->from('ruta');
		$cmd->where('status = 1 and ( upper(codigo) like :nombre or upper(nombre) like :nombre )', array(':nombre'=>strtoupper('%'.request()->getParam('term').'%'),));

		$datos = $cmd->queryAll();

		header('Content-type: application/json');
		echo CJavaScript::jsonEncode($datos);
		app()->end(); 
	}
	public function actionDistribuidores(){
		
		$cmd = cmd();
		$cmd->select('id, concat(\'[\',codigo,\'] \', nombre, \' \',apellido) as value, concat(\'[\',codigo,\'] \', nombre, \' \',apellido) as label');
		$cmd->from('distribuidor');
		$cmd->where('status = 1 and ( upper(codigo) like :term or upper(nombre) like :term or upper(apellido) like :term )', array(':term'=>strtoupper('%'.request()->getParam('term').'%'),));

		$datos = $cmd->queryAll();

		header('Content-type: application/json');
		echo CJavaScript::jsonEncode($datos);
		app()->end(); 
	}
	public function actionTeleoperadores(){
		
		$cmd = cmd();
		$cmd->text = " SELECT id, username AS label, username AS VALUE FROM users, authassignment
						WHERE users.id = authassignment.userid
						AND authassignment.itemname = 'Teleoperador'
						and users.status = 1";
		$datos = $cmd->queryAll();

		header('Content-type: application/json');
		echo CJavaScript::jsonEncode($datos);
		app()->end(); 
	}
}