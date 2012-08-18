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
		$cmd->where('status = 1 and upper(nombre) like :pais', array(':pais'=>strtoupper('%'.request()->getParam('term').'%')));

		$paises = $cmd->queryAll();

		header('Content-type: application/json');
		echo CJavaScript::jsonEncode($paises);
		app()->end(); 
	}	
	public function actionProvincias(){
		
		$cmd = cmd();
		$cmd->select('id, nombre as value, nombre as label');
		$cmd->from('provincia');
		$cmd->where('status = 1 and pais_id = :pais and upper(nombre) like :provincia', array(':pais'=>request()->getParam('pais'),':provincia'=>strtoupper('%'.request()->getParam('term').'%')));

		$paises = $cmd->queryAll();

		header('Content-type: application/json');
		echo CJavaScript::jsonEncode($paises);
		app()->end(); 
	}	
}