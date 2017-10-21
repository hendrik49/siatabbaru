<?php

class BeritaController extends Controller
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
				'actions'=>array('index','view', 'galleri'),
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

	public function actionLink($id)
	{
		$model = $this->loadModel($id);

			if ($model->Link) {
				$data = file_get_contents(Yii::app()->params->baseMapPath . "/images/Berita/" . $model->Link);
				$this->forceDownload($model->Link, $data);
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

		// Generate the server Beritas
		if (strpos($_SERVER['HTTP_USER_AGENT'], "MSIE") !== FALSE)
		{
			header('Content-Type: "'.$mime.'"');
			header('Content-Disposition: attachment; filename="'.$filename.'"');
			header('Expires: 0');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header("Content-Transfer-Encoding: binary");
			header('Pragma: public');
			header("Content-Length: ".strlen($data));
		}
		else
		{
			header('Content-Type: "'.$mime.'"');
			header('Content-Disposition: attachment; filename="'.$filename.'"');
			header("Content-Transfer-Encoding: binary");
			header('Expires: 0');
			header('Pragma: no-cache');
			header("Content-Length: ".strlen($data));
		}

		exit($data);
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

	private $_mapPath;


	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionAdd()
	{
		$model=new Berita;
		//$imgName = $model->Link;
		// Uncomment the following line if AJAX validation is needed
		//$this->performAjaxValidation($model);

		if(isset($_POST['Berita']))
		{
			$model->attributes=$_POST['Berita'];
			//$file1 = CUploadedFile::getInstance($model, 'Link');
			$model->Link = CUploadedFile::getInstance($model,'Link');	
			$model->Tanggal = time();
			
			//if (!empty($file1))
			//	$model->Link = $myUpload->getName();
			//else
			//	$model->Link =  $imgName();
			if($model->save()) {
				$this->_mapPath = Yii::app()->params->baseMapPath;
				$model->Link->saveAs($this->_mapPath . '/images/SlideImage/'. $model->Link->getName());
						
				//if (!empty($myUpload)) {
					//$this->_mapPath = Yii::app()->request->baseUrl;
					//$file1->saveAs($this->_mapPath . $file1->getName());
					//$model->Link = $file1->getName();
				//}	
				
			}$this->redirect(array('view','id'=>$model->ID));

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

		$imgName = $model->Link;

		if(isset($_POST['Berita']))
		{
			$model->attributes=$_POST['Berita'];

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
		
		$dataProvider=new CActiveDataProvider('Berita', array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'Tanggal DESC',
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
		$model=new Berita('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Berita']))
			$model->attributes=$_GET['Berita'];

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
		$model=Berita::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='Berita-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
