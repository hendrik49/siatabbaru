<?php

class VideoController extends Controller
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
				'actions'=>array('index','view', 'galleri','excel'),
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

	private $_mapPath;

	public function actionLink($id)
	{
		$model = $this->loadModel($id);

			if ($model->Link) {
				$data = file_get_contents(Yii::app()->params->baseMapPath . "/images/Video/" . $model->Link);
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

	public function actionExcel()
	{
		$model=new CobaExcel;
		if(isset($_POST['CobaExcel']))
		{
			$model->attributes=$_POST['CobaExcel'];
			$itu=CUploadedFile::getInstance($model,'filee');
			$path = Yii::app()->params->baseMapPath;
			$path= Yii::app()->params->baseMapPath . '/images/book1.xls';
			$itu->saveAs($path);
			$data = new excel_reader2($path);
			$id=array();
			$nama=array();
			for ($j = 2; $j <= $data->sheets[0]['numRows']; $j++) 
			{
				$id[$j]=$data->sheets[0]['cells'][$j][1];
				$nama[$j]=$data->sheets[0]['cells'][$j][2];
			}
		
			for($i=0;$i<count($id);$i++)
			{
				$model=new CobaExcel;

				$model->id=$id[$i];
				$model->nama=$keg[$i];
				$model->save();
                       }
                        unlink($path);
			$this->redirect(array('index'));
		}
		$this->render('excel',array('model'=>$model));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionAdd()
	{
		$model=new Video;
		//$imgName = $model->Link;
		// Uncomment the following line if AJAX validation is needed
		//$this->performAjaxValidation($model);

		if(isset($_POST['Video']))
		{
			$model->attributes=$_POST['Video'];
			//$file1 = CUploadedFile::getInstance($model, 'Link');
			$model->Link = CUploadedFile::getInstance($model,'Link');	
			
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

		if(isset($_POST['Video']))
		{
			$model->attributes=$_POST['Video'];

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
		
		$dataProvider=new CActiveDataProvider('Video', array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'video DESC',
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
		$model=new Video('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Video']))
			$model->attributes=$_GET['Video'];

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
		$model=Video::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='Video-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
