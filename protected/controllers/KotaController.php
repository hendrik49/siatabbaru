<?php

class KotaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */

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
				'users'=>array('*'),
			),

			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('add','update', 'setKot'),
				'users'=>array_merge($user['superAdmin'], $user['admin']),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>$user['superAdmin'],
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	private $_mapPath;

	public function actionLink($id)
	{
		$model = $this->loadModel($id);

			if ($model->Link) {
				$data = file_get_contents(Yii::app()->params->baseMapPath . "/images/Kota/" . $model->Link);
				$this->forceDownload($model->Link, $data);
			} else 
				throw new CHttpException(404,'Halaman tidak ditemukan.');
		
	}
	

	

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

	private $path;
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionAdd()
	{
		$model=new Kota;
		//if(isset($_POST['Kota']))
		//{
			//$model->attributes=$_POST['Kota'];

		//}
		$this->render('add',array(
			'model'=>$model,
		));
	}

	public function actionSetkot()
	{	 
	   	$data=Kota::model()->findAll('provinsi=:provinsi',
		array(':provinsi'=>(string) $_POST['provinsi']));
		$data=CHtml::listData($data,'kab','kab');
		foreach($data as $value=>$name)
		{
		echo CHtml::tag('option',array('value'=>$value),CHtml::encode($name),true);
		}  
	}
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		//if ($model->Administrator != Yii::app()->user->name AND (Yii::app()->user->hakAkses != User::USER_SUPER_ADMIN))
		//	throw new CHttpException(404,'Halaman tidak ditemukan.');
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		$imgName = $model->Link;

		if(isset($_POST['Kota']))
		{
			$model->attributes=$_POST['Kota'];

			$file1 = CUploadedFile::getInstance($model, 'Link');	

			$this->_mapPath = Yii::app()->params->baseMapPath;

			if (!empty($file1))
				$model->Link = $file1->getName();
			else
				$model->Link = $imgName;

			if($model->save()) {
				$this->_mapPath .= '/SlideImage';

				if (!empty($file1))
					$file1->saveAs($this->_mapPath .'/'. $file1->getName());
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
		$criteria=new CDbCriteria;

		$rawData = array();
		for ($i = 0; $i < 8; $i++)
			$rawData[] = array('id'=>$i + 1);

		$listDataProvider1 = new CArrayDataProvider($rawData);
		
		$dataProvider=new CActiveDataProvider('Kota', array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'Tanggal DESC',
			),
			'pagination' => array(
				'pageSize' => 8,
			),
		));

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'listDataProvider1'=>$listDataProvider1,
		));
	}
	
	public function actionGalleri()
	{
		$this->render('galleri');
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Kota('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Kota']))
			$model->attributes=$_GET['Kota'];

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
		$model=Kota::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='Kota-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
