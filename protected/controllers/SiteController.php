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
	
	public function actionImg(){
		$img = imagecreatetruecolor(200,5);
		$img = CGridHelper::degrade($img,'h',array(0,255,0),array(255,255,0));
		header('Content-type: image/png');
		imagepng($img);
	}
	
	public function actionExcel(){
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('A1', 'Hello')
		->setCellValue('B2', 'world!')
		->setCellValue('C1', 'Hello')
		->setCellValue('D2', 'world!');

		$objPHPExcel->getActiveSheet()->setTitle('Simple');

		ob_end_clean();
		ob_start();

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="test.xls"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
	}
}