<?php

class SistemBakuController extends Controller
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
	public $modelbar;
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
				'actions'=>array('index','view','search','tambah','listbaku'),
				'users'=>array('*'),
			),

			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('add','update','create','bali'),
				'users'=>array_merge($user['superAdmin'], $user['admin']),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','bali', 'tambah'),
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
				$data = file_get_contents(Yii::app()->params->baseMapPath . "/airbaku/" . $model->Link);
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

		// Generate the server Albums
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			//'model'=>$model,
		));
	}

	private $_mapPath;
	public $modelteknis;

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionAdd()
	{
		$model=new SistemBaku;

		if(isset($_POST['SistemBaku']))
		{
			$model->attributes=$_POST['SistemBaku'];
			if($model->save()) {
				//$this->render('saved');
				$this->redirect(array('view','id'=>$model->ID));
			}
		}
		
		$this->render('add',array(
			'model'=>$model,
		));		
	}
	public function actionDataTeknis()
	{
		$modelbar= new SumurW;

			if(isset($_POST['SumurW'])){
				$modelbar->attributes=$_POST['SumurW'];
				if($modelbar->save()) {
					$this->redirect(array('//sistembaku/view','id'=>$modelbar->no_sumur));
				}
			}
		
		$this->render('datateknis',array(
			'modelbar'=>$modelbar,
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
		
		if(isset($_POST['SistemBaku']))
		{
			$model->attributes=$_POST['SistemBaku'];

			if($model->save()) {

				$this->redirect(array('view','id'=>$model->ID));
			}
		}
		$this->render('tambah',array(
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
		
		//$datacompare = User::lookupIDUsers();
		$model=new SistemBaku('search');
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['SistemBaku']))
			//$columnsLabels = $model->attributes=$_GET['SistemBaku'];
			$model->attributes=$_GET['SistemBaku'];
			$criteria=new CDbCriteria;

		//if (isset(Yii::app()->user->hakAkses) AND Yii::app()->user->hakAkses == User::USER_ADMIN)
		//	$criteria->compare('Administrator', Yii::app()->user->name);

		$dataProvider=new CActiveDataProvider('SistemBaku', array(
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
	
	public function actionListbaku()
	{	
		$dataProvider=new CActiveDataProvider('SistemBaku', array(
			'sort'=>array(
				//'defaultOrder'=>'Tanggal DESC',
			),
		));
		$this->render('listbaku',array(
			//'model'=>$model,
			'dataProvider'=>$dataProvider,
		));
	}
	
	public function actionTambah()
	{
		$model=new SistemBaku;
		$modelbar= new SumurW;
		$modelteknis= new SumurG;
		if(isset($_POST['SistemBaku']))
		{
			$model->attributes=$_POST['SistemBaku'];

			if($model->save()) {
				$this->redirect(array('view','id'=>$model->ID));
			}

		}
		//$modelbar= new SumurW;

			if(isset($_POST['SumurW'])){
				$modelbar->attributes=$_POST['SumurW'];
				if($modelbar->save()) {
					$this->redirect(array('//sumurw/view','id'=>$modelbar->ID));
				}
			}

			if(isset($_POST['SumurG'])){
				$modelteknis->attributes=$_POST['SumurG'];
				if($modelteknis->save()) {
					$this->redirect(array('//sumurg/view','id'=>$modelteknis->ID));
				}
			}
		$this->render('tambah',array(
			'model'=>$model,
			'modelbar'=>$modelbar,
			'modelteknis'=>$modelteknis,
		));		
	}	
	
	

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new SistemBaku('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SistemBaku']))
			$model->attributes=$_GET['SistemBaku'];

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
		$model=SistemBaku::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadModelW($id)
	{
		$modelbar=SumurW::model()->findByPk($id);
		if($modelbar===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $modelbar;
	}	
	
	public function loadModelG($id)
	{
		$modelteknis=SumurG::model()->findByPk($id);
		if($modelteknis===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $modelteknis;
	}
	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='SistemBaku-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
