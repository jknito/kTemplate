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
		$paises = Pais::model()->findAll('status = 1');
		/*
		$values = db()->createCommand()
			->selectDistinct('rubro id, rubro label, rubro value')
			->from(MaterialesRubros::model()->tableName())
			->where('status = 1 and obra_id = :obra_id and rubro like :term and LENGTH(IFNULL(rubro,\'\')) > 0 ', 
				array(':obra_id'=>$obra->id,':term'=>'%'.request()->getParam('term').'%'))
			->queryAll();
		*/
		$this->layout = null;
		header('Content-type: application/json');
		echo CJavaScript::jsonEncode($paises);
		Yii::app()->end(); 
	}	
}