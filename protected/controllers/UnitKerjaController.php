<?php


class UnitKerjaController extends Controller
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
	public $dataAdmin;
	public function accessRules()
	{
		$user = User::getUsers();

		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','search'),
				'users'=>array('*'),
				//'users'=>array_merge($user['superAdmin'], $user['admin']),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update'),
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionAdd()
	{
		$model=new UnitKerja;
		$this->_mapPath = Yii::app()->params->baseMapPath;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['UnitKerja']))
		{
			$model->attributes=$_POST['UnitKerja'];

			$myUpload = CUploadedFile::getInstance($model, 'Gambar');	

			if (!empty($myUpload))
				$model->Gambar = 'Gambar.' . $myUpload->getExtensionName();

			if($model->save()) {	
				if (!is_dir($this->_mapPath . '/Unit Kerja/'.$model->NamaUnitKerja))
				{
					// buat folder baru dengan nama ID Unit Kerja jika folder belum ada
					mkdir($this->_mapPath . '/Unit Kerja/'.$model->NamaUnitKerja, 0777);	
					mkdir($this->_mapPath . '/Unit Kerja/'.$model->NamaUnitKerja . '/Mata Air', 0777);
					mkdir($this->_mapPath . '/Unit Kerja/'.$model->NamaUnitKerja . '/Tampungan', 0777);
					mkdir($this->_mapPath . '/Unit Kerja/'.$model->NamaUnitKerja . '/Permukaan', 0777);
					mkdir($this->_mapPath . '/Unit Kerja/'.$model->NamaUnitKerja . '/Sumur', 0777);
					mkdir($this->_mapPath . '/Unit Kerja/'.$model->NamaUnitKerja . '/Hujan', 0777);
					mkdir($this->_mapPath . '/Unit Kerja/'.$model->NamaUnitKerja . '/Peta', 0777);
					mkdir($this->_mapPath . '/Unit Kerja/'.$model->NamaUnitKerja . '/Mata Air/Foto', 0777);
					mkdir($this->_mapPath . '/Unit Kerja/'.$model->NamaUnitKerja . '/Permukaan/Foto', 0777);
					mkdir($this->_mapPath . '/Unit Kerja/'.$model->NamaUnitKerja . '/Sumur/Foto', 0777);
					mkdir($this->_mapPath . '/Unit Kerja/'.$model->NamaUnitKerja . '/Hujan/Foto', 0777);
					mkdir($this->_mapPath . '/Unit Kerja/'.$model->NamaUnitKerja . '/Tampungan/Foto', 0777);
					mkdir($this->_mapPath . '/Unit Kerja/'.$model->NamaUnitKerja . '/Mata Air/File', 0777);
					mkdir($this->_mapPath . '/Unit Kerja/'.$model->NamaUnitKerja . '/Permukaan/File', 0777);
					mkdir($this->_mapPath . '/Unit Kerja/'.$model->NamaUnitKerja . '/Sumur/File', 0777);
					mkdir($this->_mapPath . '/Unit Kerja/'.$model->NamaUnitKerja . '/Hujan/File', 0777);
					mkdir($this->_mapPath . '/Unit Kerja/'.$model->NamaUnitKerja . '/Tampungan/File', 0777);
					mkdir($this->_mapPath . '/Unit Kerja/'.$model->NamaUnitKerja . '/Mata Air/Catch', 0777);
					mkdir($this->_mapPath . '/Unit Kerja/'.$model->NamaUnitKerja . '/Permukaan/Catch', 0777);
					mkdir($this->_mapPath . '/Unit Kerja/'.$model->NamaUnitKerja . '/Sumur/Catch', 0777);
					mkdir($this->_mapPath . '/Unit Kerja/'.$model->NamaUnitKerja . '/Hujan/Catch', 0777);
					mkdir($this->_mapPath . '/Unit Kerja/'.$model->NamaUnitKerja . '/Tampungan/Catch', 0777);
				} 
				if (!empty($myUpload)) {
					$this->_mapPath .= '/Unit Kerja/'.$model->NamaUnitKerja;
			
					$myUpload->saveAs($this->_mapPath .'/Gambar.' . $myUpload->getExtensionName());
				}	

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
			$tmpNamaUnitKerja = $model->NamaUnitKerja;

			$imgName = $model->Gambar;
		$this->_mapPath = Yii::app()->params->baseMapPath;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if (Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN OR $model->ID == UnitKerja::getUnitKerjaByAdmin())
		{


			if(isset($_POST['UnitKerja']))
			{
				$model->attributes=$_POST['UnitKerja'];

				$myUpload = CUploadedFile::getInstance($model, 'Gambar');	

				if (!empty($myUpload))
					$model->Gambar = 'Gambar.' . $myUpload->getExtensionName();
				else
					$model->Gambar = $imgName;

				if($model->save()) {
					if ($tmpNamaUnitKerja != $model->NamaUnitKerja) {
						rename($this->_mapPath . '/Unit Kerja/'.$tmpNamaUnitKerja, $this->_mapPath . '/Unit Kerja/'.$model->NamaUnitKerja);
					}
					if (!empty($myUpload)) {
						$this->_mapPath .= '/Unit Kerja/'.$model->NamaUnitKerja;
					}			

					$this->redirect(array('view','id'=>$model->ID));
				}
			}

			$this->render('update',array(
				'model'=>$model,
			));
			} 
			else {
				throw new CHttpException('','Anda tidak dapat mengubah data di unit kerja lain.');

		}
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
		//$dataAdmin=new User('search');
		$model=new UnitKerja('search');
		$model->unsetAttributes();  // clear any default values
		/*$criteria=new CDbCriteria;
		if(isset($_GET['search'])){
			$criteria->condition = "NamaUnitKerja LIKE :N OR Provinsi LIKE :P";
			$criteria->params = array(
              ':N' => trim( Yii::app()->request->getParam('search') ).'%', 
			  ':P' => trim( Yii::app()->request->getParam('search') ).'%'); 
			}
			*/
		if(isset($_GET['UnitKerja']))
			//$columnsLabels = $model->attributes=$_GET['Permukaan'];
			$model->attributes=$_GET['UnitKerja'];
			$criteria=new CDbCriteria;
			
		$dataProvider=new CActiveDataProvider('UnitKerja', array(
			'criteria'=>$criteria,
			'sort'=>array(
				//'defaultOrder'=>'Tanggal DESC',
			),
		));
		$this->render('index',array(
			//'dataAdmin'=>$dataAdmin,
			//'dataProvider'=>$dataProvider,
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new UnitKerja('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['UnitKerja']))
			$model->attributes=$_GET['UnitKerja'];

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
		$model=UnitKerja::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='UnitKerja-form')
		{
			echo CActiveForm::validate($model);

			
			Yii::app()->end();
		}
	}
}
