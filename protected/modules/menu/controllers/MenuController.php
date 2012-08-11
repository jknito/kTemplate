<?php

class MenuController extends RController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/column2';
	public $layout = 'menu.views.layouts.main';
	public $tituloPagina = null;

	/**
	 * Permisos a la acciones
	 */
	public function filters()
	{
		return array(
			'rights',
		);
	}

	/**
	 * @return array action filters
	 */
	/*
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}
	*/

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	
	/*
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	*/

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Menu;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Menu']))
		{
			$model->attributes=$_POST['Menu'];
			$model->status = 1;
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Menu']))
		{
			$model->attributes=$_POST['Menu'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionIndex()
	{
		$model=new Menu('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Menu']))
			$model->attributes=$_GET['Menu'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Menu::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='menu-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionAjaxFillTree()
    {
        // accept only AJAX request (comment this when debugging)
        if (!Yii::app()->request->isAjaxRequest) {
            exit();
        }
        // parse the user input
        $parentId = "NULL";
        if (isset($_GET['root']) && $_GET['root'] !== 'source') {
            $parentId = (int) substr($_GET['root'],5);
        }
        // read the data (this could be in a model)
        $children = Yii::app()->db->createCommand(
              " SELECT concat('menu-',m1.id) as id, concat('<a href=\"".url('/menu/menu/update')."/id/',m1.id,'\">',m1.nombre,'</a>') AS text, sum(m2.id IS NOT NULL) AS hasChildren, "
            . " m1.nombre, "
            . " m1.tipo, "
            . " m1.ruta, "
            . " m1.apertura, "
            . " m1.status, "
            . " m1.menu_id "
            . " FROM menu AS m1 LEFT JOIN menu AS m2 ON m1.id=m2.menu_id "
            . " WHERE m1.menu_id <=> $parentId "
            . " GROUP BY concat('menu-',m1.id), concat('<a href=#>',m1.nombre,'</a>'), "
            . " m1.nombre, "
            . " m1.tipo, "
            . " m1.ruta, "
            . " m1.apertura, "
            . " m1.status, "
            . " m1.menu_id "
            . " ORDER BY m1.orden, m1.nombre ASC"
        )->queryAll();
        //var_dump($children);
        echo str_replace(
            '"hasChildren":"0"',
            '"hasChildren":false',
            CTreeView::saveDataAsJson($children)
        );
    }

    public function actionPadres(){
		$model=new Menu;		
		if(isset($_POST['Menu']))
			$model->attributes=$_POST['Menu'];
		if($model->tipo == "C"){
			return;
		}
		if($model->tipo == "G"){
    		$data = Menu::model()->findAll('status = 1 and tipo = "C"');
    		$data=CHtml::listData($data,'id','nombre');
		    //foreach($data as $value=>$name)
		    //{
		    //    echo CHtml::tag('option',
		    //               array('value'=>$value),CHtml::encode($name),true);
		    //}
		    echo CHtml::dropDownList("Menu_menu_id","",$data);
    	}
		if($model->tipo == "O"){
    		$cmd = db()->createCommand(
    		"
SELECT m1.nombre categoria, m2.id, m2.nombre, m2.tipo
FROM menu m1, menu m2
WHERE m2.menu_id = m1.id
AND m2.tipo = 'G'
"
    		);
    		$data=$cmd->queryAll();
		    $data=CHtml::listData($data,'id','nombre','categoria');

		    echo CHtml::dropDownList("Menu_menu_id","",$data);
    	}
    }
}
