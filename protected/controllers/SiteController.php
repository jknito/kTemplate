<?php

class SiteController extends RController
{
	/**
	 * Permisos a la acciones
	 */
	public function filters()
	{
		return array(
			'rights',
		);
	}

	public $layout='//layouts/site';


        /**
         * para presentar el menu
         */
	public function actionMenu()
	{
		$this->render('menu');
	}

        /**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}
}