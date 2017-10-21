<?php

class StatistikController extends Controller
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
				'actions'=>array('index','graph','asps','ctps','asplrt','pammrt','jsam','aspt','djsam','dctps','dasplrt','dpammrt','daspt','dasps'),
				'users'=>array('*'),
			),

			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update'),
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

		// Generate the server Statistiks
		if (strpos($_SERVER['HTTP_USER_AGENT'], "MSIE") !== FALSE)
		{
			Statistik('Content-Type: "'.$mime.'"');
			Statistik('Content-Disposition: attachment; filename="'.$filename.'"');
			Statistik('Expires: 0');
			Statistik('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			Statistik("Content-Transfer-Encoding: binary");
			Statistik('Pragma: public');
			Statistik("Content-Length: ".strlen($data));
		}
		else
		{
			Statistik('Content-Type: "'.$mime.'"');
			Statistik('Content-Disposition: attachment; filename="'.$filename.'"');
			Statistik("Content-Transfer-Encoding: binary");
			Statistik('Expires: 0');
			Statistik('Pragma: no-cache');
			Statistik("Content-Length: ".strlen($data));
		}

		exit($data);
	}*/

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionGraph()
	{
		$model=new Statistik;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Statistik']))
		{
			$model->attributes=$_POST['Statistik'];

			$model->Tanggal = time();
			
		}

		$this->render('graph',array(
			'model'=>$model,
		));
	}
	public function actionAsps()
	{
		$model=new Statistik;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Statistik']))
		{
			$model->attributes=$_POST['Statistik'];

			$model->Tanggal = time();
			
		}

		$this->render('asps',array(
			'model'=>$model,
		));
	}
	public function actionDasps()
	{
		$model=new Statistik;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Statistik']))
		{
			$model->attributes=$_POST['Statistik'];

			$model->Tanggal = time();
			
		}

		$this->render('dasps',array(
			'model'=>$model,
		));
	}
	
	public function actionCtps()
	{
		$model=new Statistik;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Statistik']))
		{
			$model->attributes=$_POST['Statistik'];

			$model->Tanggal = time();
			
		}

		$this->render('ctps',array(
			'model'=>$model,
		));
	}
	public function actionDctps()
	{
		$model=new Statistik;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Statistik']))
		{
			$model->attributes=$_POST['Statistik'];

			$model->Tanggal = time();
			
		}

		$this->render('dctps',array(
			'model'=>$model,
		));
	}
	
	public function actionJsam()
	{
		$model=new Statistik;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Statistik']))
		{
			$model->attributes=$_POST['Statistik'];

			$model->Tanggal = time();
			
		}

		$this->render('jsam',array(
			'model'=>$model,
		));
	}
	public function actionDjsam()
	{
		$model=new Statistik;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Statistik']))
		{
			$model->attributes=$_POST['Statistik'];

			$model->Tanggal = time();
			
		}

		$this->render('djsam',array(
			'model'=>$model,
		));
	}
	public function actionAspt()
	{
		$model=new Statistik;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Statistik']))
		{
			$model->attributes=$_POST['Statistik'];

			$model->Tanggal = time();
			
		}

		$this->render('aspt',array(
			'model'=>$model,
		));
	}
	public function actionDaspt()
	{
		$model=new Statistik;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Statistik']))
		{
			$model->attributes=$_POST['Statistik'];

			$model->Tanggal = time();
			
		}

		$this->render('daspt',array(
			'model'=>$model,
		));
	}
	public function actionAsplrt()
	{
		$model=new Statistik;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Statistik']))
		{
			$model->attributes=$_POST['Statistik'];

			$model->Tanggal = time();
			
		}

		$this->render('asplrt',array(
			'model'=>$model,
		));
	}
	public function actionDasplrt()
	{
		$model=new Statistik;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Statistik']))
		{
			$model->attributes=$_POST['Statistik'];

			$model->Tanggal = time();
			
		}

		$this->render('dasplrt',array(
			'model'=>$model,
		));
	}
	public function actionPammrt()
	{
		$model=new Statistik;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Statistik']))
		{
			$model->attributes=$_POST['Statistik'];

			$model->Tanggal = time();
			
		}

		$this->render('pammrt',array(
			'model'=>$model,
		));
	}
	public function actionDpammrt()
	{
		$model=new Statistik;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Statistik']))
		{
			$model->attributes=$_POST['Statistik'];

			$model->Tanggal = time();
			
		}

		$this->render('dpammrt',array(
			'model'=>$model,
		));
	}

	private $_mapPath;


	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	

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

		if(isset($_POST['Statistik']))
		
			$model->attributes=$_POST['Statistik'];
			
			if($model->save())
				$connection=Yii::app()->db;
				$command = $connection->createCommand("UPDATE t_berita SET Judul='$model->Judul' , Data='$model->Data' WHERE ID = '$id'");
				// Kon1='$model->Kon1' , Kon2='$model->Kon2' , Kon3='$model->Kon3' , Kon4='$model->Kon4' , JenSan1='$model->JenSan1' , JenSan2='$model->JenSan2 , JenSan3='$model->JenSan3' , Hal='$model->Hal' , TmpSmph='$model->TmpSmph' , KdgTrnk='$model->KdgTrnk' , Ket='$model->Ket' , 

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
		$model=new Statistik('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Statistik']))
			$model->attributes=$_GET['Statistik'];
		$criteria=new CDbCriteria;

		/*if (isset(Yii::app()->user->hakAkses) AND Yii::app()->user->hakAkses == User::USER_ADMIN)
			$criteria->compare('Administrator', Yii::app()->user->name);*/

		$dataProvider=new CActiveDataProvider('Statistik', array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'Tanggal DESC',
			),
		));

		$this->render('jsam',array(
			'dataProvider'=>$dataProvider,
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Statistik('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Statistik']))
			$model->attributes=$_GET['Statistik'];

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
		$model=Statistik::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='Statistik-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
