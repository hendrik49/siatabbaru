<?php

class PetaController extends Controller
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
				'actions'=>array('kml','tematik', 'indexTematik', 'map1','map2', 'map3', 'view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','add','view','update'),
				'users'=>array_merge($user['admin'], $user['superAdmin']),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete'),
				'users'=>$user['superAdmin'],
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionKml()
	{
		$criteria=new CDbCriteria;
		//$criteria->compare('Tipe', 'KML');
		$dataProvider=new CActiveDataProvider('Peta', array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'Tanggal DESC',
			),
		));
		$this->render('kml/index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionIndexTematik()
	{

			$criteria=new CDbCriteria;
			//$criteria->addCondition("FilePeta2 <>''");
			$dataProvider=new CActiveDataProvider('Peta', array(
				'criteria'=>$criteria,
				'sort'=>array(
					'defaultOrder'=>'Tanggal DESC',
				),
			));
			$this->render('tematik/index',array(
				'dataProvider'=>$dataProvider,
			));
	
	}

	public function actionTematik($id)
	{

		$model = $this->loadModel($id);

		//if ((isset(Yii::app()->user->hakAkses) AND Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN OR $model->Administrator == Yii::app()->user->name)) {
			
			$metadata = null;
			if ($model->MetaData == 'B') {
				$metadata = MetaDataB::model()->findByPk($model->IDMetaData);
			}
			if ($model->MetaData == 'E')
			{
				$metadata = MetaDataE::model()->findBYPk($model->IDMetaData);
			}

			$this->render('/tematik/view',array(
				'model'=>$model,
				'metadata'=>$metadata,
			));
	
	}

	public function actionMap1($id)
	{
		$model = $this->loadModel($id);

		/*if (isset(Yii::app()->user->hakAkses) AND Yii::app()->user->hakAkses == User::USER_ADMIN)
		{
			throw new CHttpException(404,'Halaman tidak ditemukan.');
		} else if (isset(Yii::app()->user->hakAkses) AND Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN)
		{*/
			if ($model->Jenis <= 1)
				$folder = 'Cakupan wilayah kerja';
			else if ($model->Jenis == 2) {
				$metadata = MetadataB::model()->findByPk($model->IDMetaData);
				if ($metadata)
					$folder = 'Lokasi penelitian/'.$metadata->TahunPenelitian;
				else
					$folder = 'Lokasi penelitian';
			}
			else if ($model->Jenis >= 3 AND $model->Jenis <= 12)
				$folder = 'data peta';				
			else if ($model->Jenis >= 13 AND $model->Jenis <= 22)
				$folder = 'Hutan non penelitian';
			else if ($model->Jenis >= 23 AND $model->Jenis <= 30)
				$folder = 'Hasil penelitian';

			if ($model->FilePeta1) {
				$data = file_get_contents(Yii::app()->params->baseMapPath . "/Unit Kerja/" . $model->UnitKerja . '/'. $folder  . '/' . $model->FilePeta1);
				$this->forceDownload($model->FilePeta1, $data);
			} else 
				throw new CHttpException(404,'Halaman tidak ditemukan.');
		//}
	}

	public function actionMap2($id)
	{
		$model = $this->loadModel($id);

		/*if (isset(Yii::app()->user->hakAkses) AND Yii::app()->user->hakAkses == User::USER_ADMIN)
		//{
			throw new CHttpException(404,'Halaman tidak ditemukan.');
		} else *///if (isset(Yii::app()->user->hakAkses) AND Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN)
		//{

			if ($model->FilePeta2) {
				$data = file_get_contents(Yii::app()->params->baseMapPath . "/Unit Kerja/" . $model->UnitKerja . '/'. $folder  . '/' . $model->FilePeta2);
				$this->forceDownload($model->FilePeta2, $data);
			} else 
				throw new CHttpException(404,'Halaman tidak ditemukan.');
		//}
	}

	public function actionMap3($id)
	{
		$model = $this->loadModel($id);
			if ($model->FilePeta3) {
				$data = file_get_contents(Yii::app()->params->baseMapPath . "/Unit Kerja/" . $model->UnitKerja . '/'. $folder  . '/' . $model->FilePeta3);
				$this->forceDownload($model->FilePeta3, $data);
			} else 
				throw new CHttpException(404,'Halaman tidak ditemukan.');
		//}
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

		// Generate the server headers
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
		$model = $this->loadModel($id);

		//if ((isset(Yii::app()->user->hakAkses) AND Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN OR $model->Administrator == Yii::app()->user->name)) {
			
			$metadata = null;
			if ($model->MetaData == 'B') {
				$metadata = MetaDataB::model()->findByPk($model->IDMetaData);
			}
			if ($model->MetaData == 'E')
			{
				$metadata = MetaDataE::model()->findBYPk($model->IDMetaData);
			}

			$this->render('view',array(
				'model'=>$model,
				'metadata'=>$metadata,
			));
		/*} else {
			throw new CHttpException(404,'The requested page does not exist.');
		}*/
	}

	private $_mapPath;
	private $_mapPath1;
	private $_mapPath2;

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionAdd()
	{
		$model=new Peta;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Peta']))
		{
			$model->attributes=$_POST['Peta'];
			$this->_mapPath1 = Yii::app()->params->baseMapPath;
			$this->_mapPath2 = Yii::app()->params->baseMapPath;
			$file2 = CUploadedFile::getInstance($model,'FilePeta1');
			$file3 = CUploadedFile::getInstance($model,'FilePeta2');

			$model->Administrator = Yii::app()->user->name;
			$model->Tanggal = time();

			if (Yii::app()->user->hakAkses == User::USER_ADMIN) {
				$model->Status = Peta::statusDraft;
			}
			$model->UnitKerja = UnitKerja::getNamaUnitKerjaByAdmin(Yii::app()->user->uid);
			$this->_mapPath .= '/Unit Kerja/'.$model->UnitKerja;
			
			if (!empty($file2)){ $model->FilePeta1 = $file2->getName(); 
			}
			if (!empty($file3)){ $model->FilePeta2 = $file3->getName();
			}
			if($model->save()) {
						
			}
			if (!empty($file2)) {
				$this->_mapPath1 .= '/Unit Kerja/'.$model->UnitKerja;
				$file2->saveAs($this->_mapPath1 . '/Peta/'. $file2->getName());
			}
			if (!empty($file3)) {
				$this->_mapPath2 .= '/Unit Kerja/'.$model->UnitKerja;
				$file3->saveAs($this->_mapPath2 . '/Peta/'. $file3->getName());
			}
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
		$this->_mapPath = Yii::app()->params->baseMapPath;		
		$model=$this->loadModel($id);

		if ($model->Administrator != Yii::app()->user->name AND Yii::app()->user->hakAkses != User::USER_SUPER_ADMIN)
			throw new CHttpException(404,'The requested page does not exist.');			

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$imgName1 = $model->FilePeta1;
		$imgName2 = $model->FilePeta2;
		$imgName3 = $model->FilePeta3;
		
		$mapPathLama = Yii::app()->params->baseMapPath;
		$mapPathLama .= '/'.$model->UnitKerja;

		if(isset($_POST['Peta']))
		{
			$model->attributes=$_POST['Peta'];
			//die($model->FilePeta);
			$file1 = CUploadedFile::getInstance($model, 'FilePeta1');	
			$file2 = CUploadedFile::getInstance($model, 'FilePeta2');
			$file3 = CUploadedFile::getInstance($model, 'FilePeta3');

			if (!empty($file1))
				$model->FilePeta1 = $file1->getName();
			else
				$model->FilePeta1 = $imgName1;

			if (!empty($file2))
				$model->FilePeta2 = $file2->getName();
			else
				$model->FilePeta2 = $imgName2;

			if (!empty($file3))
				$model->FilePeta3 = $file3->getName();
			else
				$model->FilePeta3 = $imgName3;
				
			if($model->save()) {
				//die($model->FilePeta3 . '<br>' . $imgName3);
			//	$this->_mapPath .= '/'.$model->;
			//	$metadataB = MetaDataB::model()->findByAttributes(array('IDPeta'=>$model->ID));
			//	$metadataE = MetaDataE::model()->findByAttributes(array('IDPeta'=>$model->ID));

			/*	$tahun = '';

				if ($metadataB)
					$tahun = '/' . $metadataB->TahunPenelitian . '/';

				if (!empty($file1))
					$file1->saveAs($this->_mapPath . $tahun .'/'. $file1->getName());
				

				if (!empty($file2))
					$file2->saveAs($this->_mapPath . $tahun .'/'. $file2->getName());
				

				if (!empty($file3))
					$file3->saveAs($this->_mapPath . $tahun.'/'. $file3->getName());
	


				if ($metadataB OR $metadataE) {
					if ($model->Jenis == 2)
						$this->redirect(array('metadataB/update/', 'id'=>$model->IDMetaData));
				
					if ($model->Jenis >= 23 AND $model->Jenis <= 30) 
						$this->redirect(array('metadataE/update/', 'id'=>$model->IDMetaData));	

				} else {
					if ($model->Jenis == 2)
						$this->redirect(array('metadataB/add/', 'id'=>$model->ID));
				
					if ($model->Jenis >= 23 AND $model->Jenis <= 30) 
						$this->redirect(array('metadataE/add/', 'id'=>$model->ID));						
				}
				$this->redirect(array('view','id'=>$model->ID));
*/
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
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
		$model=new Peta('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Peta']))
			$model->attributes=$_GET['Peta'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Peta('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Peta']))
			$model->attributes=$_GET['Peta'];

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
		$model=Peta::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='peta-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
