<?php

class PegawaiController extends Controller
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

	
	public function actions()
	{
		return array(
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
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
				'actions'=>array('add','update','create'),
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

	public function actionFoto($id)
	{
		$model = $this->loadModel($id);

			if ($model->Foto) {
				$data = file_get_contents(Yii::app()->params->baseMapPath . "/pegawai/" . $model->Foto);
				$this->forceDownload($model->Foto, $data);
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


	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionAdd()
	{
		$model=new Pegawai;
		
		if(isset($_POST['Pegawai']))
		{
			$model->attributes=$_POST['Pegawai'];
			//$file1 = CUploadedFile::getInstance($model, 'Foto');
			$model->Foto = CUploadedFile::getInstance($model,'Foto');	
			//$model->Tanggal = time();
			
			//if (!empty($file1))
			//	$model->Foto = $myUpload->getName();
			//else
			//	$model->Foto =  $imgName();
			if($model->save()) {
				$this->_mapPath = Yii::app()->params->baseMapPath;
				$model->Foto->saveAs($this->_mapPath . '/pegawai/'. $model->Foto->getName());
						
				//if (!empty($myUpload)) {
					//$this->_mapPath = Yii::app()->request->baseUrl;
					//$file1->saveAs($this->_mapPath . $file1->getName());
					//$model->Foto = $file1->getName();
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

		$imgName = $model->Foto;

		if(isset($_POST['Pegawai']))
		{
			$model->attributes=$_POST['Pegawai'];

			$file1 = CUploadedFile::getInstance($model, 'Foto');	

			$this->_mapPath = Yii::app()->params->baseMapPath;

			if (!empty($file1))
				$model->Foto = $file1->getName();
			else
				$model->Foto = $imgName;

			if($model->save()) {
				$this->_mapPath .= '/pegawai';

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
		
				
		$model=new Pegawai('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pegawai']))
		$model->attributes=$_GET['Pegawai'];
		$dataTree=array(
			array(
				'text'=>'Grampa', //must using 'text' key to show the text
				'children'=>array(//using 'children' key to indicate there are children
					array(
						'text'=>'Father',
						'children'=>array(
							array('text'=>'me'),
							array('text'=>'big sis'),
							array('text'=>'little brother'),
						)
					),
					array(
						'text'=>'Uncle',
						'children'=>array(
							array('text'=>'Ben'),
							array('text'=>'Sally'),
						)
					),
					array(
						'text'=>'Aunt',
					)
				)
			)
		);
		
		/*if (isset(Yii::app()->user->hakAkses) AND Yii::app()->user->hakAkses == User::USER_ADMIN)
			$criteria->compare('Administrator', Yii::app()->user->name);*/
		//if (isset(Yii::app()->user->hakAkses) AND Yii::app()->user->hakAkses == User::USER_ADMIN)
		//	$urlFoto->compare('Foto', Yii::app()->request->baseUrl . "data/pegawai" . $model->Foto);
		$dataProvider=new CActiveDataProvider('Pegawai');	
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'model'=>$model,
			'dataTree'=>$dataTree,

		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Pegawai('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pegawai']))
			$model->attributes=$_GET['Pegawai'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	public function actionCreate()
    {
        $model=new Event;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if(isset($_POST['Event']))
        {
            $model->attributes=$_POST['Event'];
            
        }

            $this->render('create',array(
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
		$model=Pegawai::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='Pegawai-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function getTabularFormTabs($form, $model)
    {
        $tabs = array();
        $count = 0;

        foreach (array('en'=>'English', 'fi'=>'Finnish', 'sv'=>'Swedish') as $locale => $language)
        {
            $tabs[] = array(
                'active'=>$count++ === 0,
                'label'=>$language,
                'content'=>$this->renderPartial('_tabular', array(
                    'form'=>$form,
                    'model'=>$model,
                    'locale'=>$locale,
                    'language'=>$language,
                ), true),
            );
        }

        return $tabs;
    }
	public function actionTreeView() {
	
	$dataTree=array(
		array(
			'text'=>'Grampa', //must using 'text' key to show the text
			'children'=>array(//using 'children' key to indicate there are children
				array(
					'text'=>'Father',
					'children'=>array(
						array('text'=>'me'),
						array('text'=>'big sis'),
						array('text'=>'little brother'),
					)
				),
				array(
					'text'=>'Uncle',
					'children'=>array(
						array('text'=>'Ben'),
						array('text'=>'Sally'),
					)
				),
				array(
					'text'=>'Aunt',
				)
			)
		)
	);

	$this->render('tree_view', array('dataTree'=>$dataTree));
	}
}
