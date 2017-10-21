<?php

class PencarianController extends Controller
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
				'actions'=>array('index','view','search'),
				'users'=>array('*'),
			),

			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('add','update'),
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
	/*
	public function actionLink($id)
	{
		$model = $this->loadModel($id);

			if ($model->Data) {
				$data = file_get_contents(Yii::app()->request->baseUrl . "/images/Gambar" . $model->Data);
				$this->forceDownload($model->Data, $data);
			} else 
				throw new CHttpException(404,'Halaman tidak ditemukan.');
		
	}


	function forceDownload($filename = '', $data = '')
	{
		if ($filename == '' OR $data == '')
		{
			return FALSE;
		}

		// Try to determine if the filename includes a file extension.
		// We need it in order to set the MIME type
		if (FALSE === strpos($filename, '.'))
		{
			return FALSE;
		}

		// Grab the file extension
		$x = explode('.', $filename);
		$extension = end($x);

		// Load the mime types
		@include(APPPATH.'config/mimes'.EXT);

		// Set a default mime if we can't find it
		if ( ! isset($mimes[$extension]))
		{
			$mime = 'application/octet-stream';
		}
		else
		{
			$mime = (is_array($mimes[$extension])) ? $mimes[$extension][0] : $mimes[$extension];
		}

		// Generate the server Pencarians
		if (strpos($_SERVER['HTTP_USER_AGENT'], "MSIE") !== FALSE)
		{
			Pencarian('Content-Type: "'.$mime.'"');
			Pencarian('Content-Disposition: attachment; filename="'.$filename.'"');
			Pencarian('Expires: 0');
			Pencarian('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			Pencarian("Content-Transfer-Encoding: binary");
			Pencarian('Pragma: public');
			Pencarian("Content-Length: ".strlen($data));
		}
		else
		{
			Pencarian('Content-Type: "'.$mime.'"');
			Pencarian('Content-Disposition: attachment; filename="'.$filename.'"');
			Pencarian("Content-Transfer-Encoding: binary");
			Pencarian('Expires: 0');
			Pencarian('Pragma: no-cache');
			Pencarian("Content-Length: ".strlen($data));
		}

		exit($data);
	}*/

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$model = $this->loadModel($id);
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			//'model'=>$model,
		));
	}

	private $_mapPath;


	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionAdd()
	{
		$model=new Pencarian;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Pencarian']))
		{
			$model->attributes=$_POST['Pencarian'];

			$model->Tanggal = time();

			if($model->save()) {
				//$this->render('saved');
				$this->redirect(array('view','id'=>$model->ID));
			}
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

		//if ($model->Administrator != Yii::app()->user->name AND (Yii::app()->user->hakAkses != User::USER_SUPER_ADMIN))
		//	throw new CHttpException(404,'Halaman tidak ditemukan.');
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Pencarian']))
		
			$model->attributes=$_POST['Pencarian'];
			
			if($model->save())
				$connection=Yii::app()->db;
				$command = $connection->createCommand("UPDATE t_berita SET Judul='$model->Judul' , Data='$model->Data' WHERE ID = '$id'");
				// Kon1='$model->Kon1' , Kon2='$model->Kon2' , Kon3='$model->Kon3' , Kon4='$model->Kon4' , JenSan1='$model->JenSan1' , //JenSan2='$model->JenSan2 , JenSan3='$model->JenSan3' , Hal='$model->Hal' , TmpSmph='$model->TmpSmph' , KdgTrnk='$model->KdgTrnk' , Ket='$model->Ket' , 

		$this->render('update',array(
			'model'=>$model,
			//'model'=>$this->loadModel($id),
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
		$model=new Pencarian('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pencarian']))
			$model->attributes=$_GET['Pencarian'];
		$criteria=new CDbCriteria;

		//if (isset(Yii::app()->user->hakAkses) AND Yii::app()->user->hakAkses == User::USER_ADMIN)
		//	$criteria->compare('Administrator', Yii::app()->user->name);

		$dataProvider=new CActiveDataProvider('Pencarian', array(
			'criteria'=>$criteria,
			'sort'=>array(
				//'defaultOrder'=>'Tanggal DESC',
			),
		));

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		//$model=new Pencarian('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pencarian']))
			$model->attributes=$_GET['Pencarian'];

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
		$model=Pencarian::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='Pencarian-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
