<?php

class NeracaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		$user = User::getUsers();

		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array_merge($user['superAdmin'], $user['admin']),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update', 'add', 'setKot'),
				'users'=>array_merge($user['superAdmin'], $user['admin']),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('add','admin','delete'),
				'users'=>$user['superAdmin'],
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	private $_mapPath;

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$model = $this->loadModel($id);
		$this->render('view',array(
			'model'=> $this->loadModel($id),
		));
	}
	//public $modelSumur;
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionAdd()
	{
		$model=new Neraca;
	
		if(isset($_POST['Neraca']))
		{
			$model->attributes=$_POST['Neraca'];	
			$model->Tanggal = time();

			
			if($model->save()) {	}
	
			$this->redirect(array('view','id'=>$model->ID));
		}

		$this->render('add',array(
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
			if(isset($_POST['Neraca']))
			{
				$model->attributes=$_POST['Neraca'];
				if($model->save()) {
					$this->redirect(array('view','id'=>$model->ID));
				}
			}
		
			$this->render('update',array(
				'model'=>$model,
			));
	}
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model = new Neraca;
		$dataProvider=new CActiveDataProvider('Neraca');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'model'=>$model,
		));
	}
	
	
	public $modelkota;
	public function actionSetkot()
	{	 
		$modelKota= new Kota;
	   	$data=Kota::model()->findAll('provinsi=:provinsi',
		array(':provinsi'=>(string) $_POST['provinsi']));
		$data=CHtml::listData($data,'kab','kab');
		foreach($data as $value=>$name)
		{
		echo CHtml::tag('option',array('value'=>$value),CHtml::encode($name),true);
		}  
	}
	

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new DTBase('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['DTBase']))
			$model->attributes=$_GET['DTBase'];

		$this->render('admin',array(
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
		$model=Neraca::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='neraca-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
