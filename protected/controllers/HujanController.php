<?php

class HujanController extends Controller
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
	
	public $modelmanfaat;
	public $modelteknis;
	public $modelteknisWa;
	public $modelteknisGa;
	public $modelteknisPat;
	public $modelInfoMa;
	
	private $_mapPath;
	private $_mapPath1;
	private $_mapPath2;
	private $_mapPath3;
	private $_mapPath4;
	private $_mapPath5;
	private $_mapPath6;
	private $_mapPath7;
	
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
				'actions'=>array('index','view','viewm','viewt','viewtg','viewts','viewk','search','tambah', 'detail', 'viewi','search'),
				'users'=>array('*'),
			),
 
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('add','update','create'),
				'users'=>array_merge($user['superAdmin'], $user['admin']),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','tambah', 'addm', 'addts', 'addtw', 'addtg','addtp', 'addinfo' ),
				'users'=>$user['superAdmin'],
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$model = $this->loadModel($id);
		$model = $this->loadModelW($id);
		$model = $this->loadModelG($id);
		//$model = $this->loadModelP($id);
		$model = $this->loadModelM($id);
		$model = $this->loadModelInfo($id);
		$this->render('detail',array(
			'model'=>$this->loadModel($id),
			'modelmanfaat'=>$this->loadModelW($id),
			'modelteknis'=>$this->loadModelG($id),
			//'modelteknisWa'=>$this->loadModelP($id),
			'modelteknisGa'=>$this->loadModelM($id),
			'modelteknisPat'=>$this->loadModelN($id),
			'modelInfoMa'=>$this->loadModelInfo($id),
		));
	}
	public function actionViewm($id)
	{
		$model = $this->loadModelW($id);
		$this->render('viewm',array(
			'model'=>$this->loadModelW($id),
			//'model'=>$model,
		));
	}
	public function actionViewt($id)
	{
		$model = $this->loadModelG($id);
		$this->render('viewt',array(
			'model'=>$this->loadModelG($id),
			//'model'=>$model,
		));
	}
	public function actionViewtw($id)
	{
		$model = $this->loadModelP($id);
		$this->render('viewtw',array(
			'model'=>$this->loadModelP($id),
			//'model'=>$model,
		));
	}
	public function actionViewtg($id)
	{
		$model = $this->loadModelM($id);
		$this->render('viewtg',array(
			'model'=>$this->loadModelM($id),
			//'model'=>$model,
		));
	}
	public function actionViewk($id)
	{
		$model = $this->loadModelN($id);
		$this->render('viewk',array(
			'model'=>$this->loadModelN($id),
			//'model'=>$model,
		));
	}
	
	public function actionViewi($id)
	{
		$model = $this->loadModelInfo($id);
		$this->render('viewi',array(
			'model'=>$this->loadModelInfo($id),
			//'model'=>$model,
		));
	}	
	public function actionDetail($id)
	{
		$model = $this->loadModel($id);
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			//'model'=>$model,
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
		
		if(isset($_POST['Hujan']))
		{
			$model->attributes=$_POST['Hujan'];
			if($model->save()) {
			}
			$this->redirect(array('view','id'=>$model->ID));
		}
		
		$modelmanfaat= $this->loadModelW($id);
			if(isset($_POST['ManfaatHujan'])){
				$modelmanfaat->attributes=$_POST['ManfaatHujan'];
				$this->_mapPath = Yii::app()->params->baseMapPath;
				$this->_mapPath1 = Yii::app()->params->baseMapPath;
				$imgName = $modelmanfaat->catchment_area;
				$imgName1 = $modelmanfaat->catchment_area1;
				$myUpload1 = CUploadedFile::getInstance($modelmanfaat, 'catchment_area');
				$myUpload2 = CUploadedFile::getInstance($modelmanfaat, 'catchment_area1');
				if ((!empty($myUpload1)) OR (!empty($myUpload2))){
					$modelmanfaat->catchment_area = $myUpload1->getName(); 
					$modelmanfaat->catchment_area1 = $myUpload2->getName();
				}else{
					$modelmanfaat->catchment_area = $imgName;
					$modelmanfaat->catchment_area1 = $imgName1;
				}
				if($modelmanfaat->save()) {  
					
					if (!empty($myUpload1)) {
						$this->_mapPath .= '/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin();
						$myUpload1->saveAs($this->_mapPath . '/Hujan/Catch/'. $myUpload1->getName());
					}
					if (!empty($myUpload2)) {
						$this->_mapPath1 .= '/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin();
						$myUpload2->saveAs($this->_mapPath1 . '/Hujan/Catch/'. $myUpload2->getName());
					}
				}
				$this->redirect(array('//hujan/view','id'=>$modelmanfaat->ID));
			}
			
		$modelteknis= $this->loadModelG($id);
			if(isset($_POST['TeknisHujan'])){
				$modelteknis->attributes=$_POST['TeknisHujan'];
				if($modelteknis->save()) {
					$this->redirect(array('//hujan/viewt','id'=>$modelteknis->ID));
				}
			}
		
		/*$modelteknisWa= $this->loadModelP($id);
			if(isset($_POST['TeknisWaHujan'])){
				$modelteknisWa->attributes=$_POST['TeknisWaHujan'];
				if($modelteknisWa->save()) {
					$this->redirect(array('//hujan/view','id'=>$modelteknisWa->ID));
				}
			}
		*/	
		$modelteknisGa= $this->loadModelM($id);
			if(isset($_POST['TeknisGaHujan'])){
				$modelteknisGa->attributes=$_POST['TeknisGaHujan'];
				if($modelteknisGa->save()) {
					$this->redirect(array('//hujan/viewtg','id'=>$modelteknisGa->ID));
				}
			}
		
		$modelteknisPat= $this->loadModelN($id);
			if(isset($_POST['KondisiHujan'])){
				$modelteknisPat->attributes=$_POST['KondisiHujan'];
				if($modelteknisPat->save()) {
					$this->redirect(array('//hujan/viewk','id'=>$modelteknisPat->ID));
				}
			}
		
			$modelInfoMa= $this->loadModelInfo($id);
			
			if(isset($_POST['InfoHujan'])){
				$modelInfoMa->attributes=$_POST['InfoHujan'];
				$this->_mapPath2 = Yii::app()->params->baseMapPath; $this->_mapPath3 = Yii::app()->params->baseMapPath;
				$this->_mapPath4 = Yii::app()->params->baseMapPath; $this->_mapPath5 = Yii::app()->params->baseMapPath;
				$this->_mapPath6 = Yii::app()->params->baseMapPath; $this->_mapPath7 = Yii::app()->params->baseMapPath;
				$imgName2 = $modelInfoMa->foto1; $imgName3 = $modelInfoMa->foto2; 
				$imgName4 = $modelInfoMa->foto3; $imgName5 = $modelInfoMa->foto4;
				$imgName6 = $modelInfoMa->foto5; $imgName7 = $modelInfoMa->dokumen_pendukung; 
				$video = $modelInfoMa->video;
	
				$myUpload3 = CUploadedFile::getInstance($modelInfoMa,'foto1');
				$myUpload4 = CUploadedFile::getInstance($modelInfoMa,'foto2');
				$myUpload5 = CUploadedFile::getInstance($modelInfoMa,'foto3');
				$myUpload6 = CUploadedFile::getInstance($modelInfoMa,'foto4');
				$myUpload7 = CUploadedFile::getInstance($modelInfoMa,'foto5');
				$myUpload8 = CUploadedFile::getInstance($modelInfoMa,'dokumen_pendukung');
				$myUpload9 = CUploadedFile::getInstance($modelInfoMa,'video');
				
				if (!empty($myUpload3)){ $modelInfoMa->foto1 = $myUpload3->getName(); 
				}else{$modelInfoMa->foto1 = $imgName2;}
				if (!empty($myUpload4)){ $modelInfoMa->foto2 = $myUpload4->getName();
				}else{$modelInfoMa->foto2 = $imgName3;}
				if (!empty($myUpload5)){ $modelInfoMa->foto3 = $myUpload5->getName();
				}else{$modelInfoMa->foto3 = $imgName4;}	
				if (!empty($myUpload6)){ $modelInfoMa->foto4 = $myUpload6->getName();
				}else{$modelInfoMa->foto4 = $imgName5;}		
				if (!empty($myUpload7)){ $modelInfoMa->foto5 = $myUpload7->getName();
				}else{$modelInfoMa->foto5 = $imgName6;}	
				if (!empty($myUpload8)){ $modelInfoMa->dokumen_pendukung = $myUpload8->getName();
				}else{$modelInfoMa->dokumen_pendukung = $imgName7;}	
				if (!empty($myUpload9)){ $modelInfoMa->video = $myUpload9->getName();
				}else{$modelInfoMa->video = $video;}			
	
	
				if($modelInfoMa->save()) {
					if (!empty($myUpload3)) {
						$this->_mapPath2 .= '/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin();
						$myUpload3->saveAs($this->_mapPath2 . '/Hujan/Foto/'. $myUpload3->getName());
					}
					if (!empty($myUpload4)) {
						$this->_mapPath3 .= '/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin();
						$myUpload4->saveAs($this->_mapPath3 . '/Hujan/Foto/'. $myUpload4->getName());
					}
					if (!empty($myUpload5)) {
						$this->_mapPath4 .= '/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin();
						$myUpload5->saveAs($this->_mapPath4 . '/Hujan/Foto/'. $myUpload5->getName());
					}
					if (!empty($myUpload6)) {
						$this->_mapPath5 .= '/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin();
						$myUpload6->saveAs($this->_mapPath5 . '/Hujan/Foto/'. $myUpload6->getName());
					}
					if (!empty($myUpload7)) {
						$this->_mapPath6 .= '/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin();
						$myUpload7->saveAs($this->_mapPath6 . '/Hujan/Foto/'. $myUpload7->getName());
					}
					if (!empty($myUpload8)) {
						$this->_mapPath7 .= '/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin();
						$myUpload8->saveAs($this->_mapPath7 . '/Hujan/File/'. $myUpload8->getName());
					}
					if (!empty($myUpload9)) {
						$this->_mapPath7 .= '/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin();
						$myUpload9->saveAs($this->_mapPath7 . '/Hujan/Video/'. $myUpload9->getName());
					}
				}	
			$this->redirect(array('//hujan/view','id'=>$modelInfoMa->ID));
			}

		$this->render('tambah',array(
			'model'=>$model,
			'modelmanfaat'=>$modelmanfaat,
			'modelteknis'=>$modelteknis,
			//'modelteknisWa'=>$modelteknisWa,
			'modelteknisGa'=>$modelteknisGa,
			'modelteknisPat'=>$modelteknisPat,
			'modelInfoMa'=>$modelInfoMa,
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
		$model=new Hujan('search');
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['Hujan']))
			//$columnsLabels = $model->attributes=$_GET['MataAir'];
			$model->attributes=$_GET['Hujan'];
			$criteria=new CDbCriteria;

		//if (isset(Yii::app()->user->hakAkses) AND Yii::app()->user->hakAkses == User::USER_ADMIN)
		//	$criteria->compare('Administrator', Yii::app()->user->name);

		$dataProvider=new CActiveDataProvider('Hujan', array(
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
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */	
	public function actionTambah()
	{
		$model=new Hujan;
		$modelmanfaat= new ManfaatHujan;
		$modelteknis= new TeknisHujan;
		//$modelteknisWa= new TeknisWaHujan;
		$modelteknisGa= new TeknisGaHujan;
		$modelteknisPat= new KondisiHujan;
		$modelInfoMa= new InfoHujan;
		if(isset($_POST['Hujan']))
		{
			$model->attributes=$_POST['Hujan'];
			if($model->save()) {
				$modelteknis->ID_IDBalaiGa = $model->ID_IDBalai;
				$modelteknis->NoDataGa = $model->NoData;
				$modelteknisGa->ID_IDBalaiPat = $model->ID_IDBalai;
				$modelteknisGa->NoDataPat = $model->NoData;
				$modelteknisPat->ID_IDBalaiMa = $model->ID_IDBalai;
				$modelteknisPat->NoDataMa = $model->NoData;
				$modelInfoMa->ID_IDBalaiNam = $model->ID_IDBalai;
				$modelInfoMa->NoDataNam = $model->NoData;
				$modelmanfaat->ID_IDBalaiWa = $model->ID_IDBalai;
				$modelmanfaat->NoDataWa = $model->NoData;

				$modelmanfaat->save();
				$modelteknis->save();
				//$modelteknisWa->save();
				$modelteknisGa->save();
				$modelteknisPat->save();
				$modelInfoMa->save();					
			}
			$this->redirect(array('//hujan/update','id'=>$model->ID));
		}

			if(isset($_POST['ManfaatHujan'])){
				$modelmanfaat->attributes=$_POST['ManfaatHujan'];
				$this->_mapPath = Yii::app()->params->baseMapPath;
				$this->_mapPath1 = Yii::app()->params->baseMapPath;
				/*$imgName = $modelmanfaat->catchment_area;
				$imgName1 = $modelmanfaat->catchment_area1;*/
				$myUpload1 = CUploadedFile::getInstance($modelmanfaat, 'catchment_area');
				$myUpload2 = CUploadedFile::getInstance($modelmanfaat, 'catchment_area1');
				if ((!empty($myUpload1)) OR (!empty($myUpload2))){
					$modelmanfaat->catchment_area = $myUpload1->getName(); 
					$modelmanfaat->catchment_area1 = $myUpload2->getName();
				}
				/*else{
					$modelmanfaat->catchment_area = $imgName;
					$modelmanfaat->catchment_area1 = $imgName1;
				}*/
				if($modelmanfaat->save()) {  }			
				if (!empty($myUpload1)) {
					$this->_mapPath .= '/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin();
					$myUpload1->saveAs($this->_mapPath . '/Hujan/Catch/'. $myUpload1->getName());
				}
				if (!empty($myUpload2)) {
					$this->_mapPath1 .= '/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin();
					$myUpload2->saveAs($this->_mapPath1 . '/Hujan/Catch/'. $myUpload2->getName());
				}
				$this->redirect(array('//hujan/update','id'=>$modelmanfaat->ID));
			}

			if(isset($_POST['TeknisHujan'])){
				$modelteknis->attributes=$_POST['TeknisHujan'];
				if($modelteknis->save()) {
					$this->redirect(array('//hujan/view','id'=>$modelteknis->ID));
				}
			}
			
			/*if(isset($_POST['TeknisWaHujan'])){
				$modelteknisWa->attributes=$_POST['TeknisWaHujan'];
				if($modelteknisWa->save()) {
					$this->redirect(array('//hujan/view','id'=>$modelteknisWa->ID));
				}
			}
			*/
			if(isset($_POST['TeknisGaHujan'])){
				$modelteknisGa->attributes=$_POST['TeknisGaHujan'];
				if($modelteknisGa->save()) {
					$this->redirect(array('//hujan/view','id'=>$modelteknisGa->ID));
				}
			}
			if(isset($_POST['KondisiHujan'])){
				$modelteknisPat->attributes=$_POST['KondisiHujan'];
				if($modelteknisPat->save()) {
					$this->redirect(array('//hujan/view','id'=>$modelteknisPat->ID));
				}
			}
			if(isset($_POST['InfoHujan'])){
				$modelInfoMa->attributes=$_POST['InfoHujan'];
				$this->_mapPath2 = Yii::app()->params->baseMapPath; $this->_mapPath3 = Yii::app()->params->baseMapPath;
				$this->_mapPath4 = Yii::app()->params->baseMapPath; $this->_mapPath5 = Yii::app()->params->baseMapPath;
				$this->_mapPath6 = Yii::app()->params->baseMapPath; $this->_mapPath7 = Yii::app()->params->baseMapPath;
				/*$imgName2 = $modelInfoMa->foto1; $imgName3 = $modelInfoMa->foto2; 
				$imgName4 = $modelInfoMa->foto3; $imgName5 = $modelInfoMa->foto4;
				$imgName6 = $modelInfoMa->foto5; */
				$myUpload3 = CUploadedFile::getInstance($modelInfoMa,'foto1');
				$myUpload4 = CUploadedFile::getInstance($modelInfoMa,'foto2');
				$myUpload5 = CUploadedFile::getInstance($modelInfoMa,'foto3');
				$myUpload6 = CUploadedFile::getInstance($modelInfoMa,'foto4');
				$myUpload7 = CUploadedFile::getInstance($modelInfoMa,'foto5');
				$myUpload8 = CUploadedFile::getInstance($modelInfoMa,'dokumen_pendukung');
				$myUpload9 = CUploadedFile::getInstance($modelInfoMa,'video');
				
				if (!empty($myUpload3)){ $modelInfoMa->foto1 = $myUpload3->getName(); 
				}//else{$modelInfoMa->foto1 = $imgName2;}
				if (!empty($myUpload4)){ $modelInfoMa->foto2 = $myUpload4->getName();
				}//else{$modelInfoMa->foto2 = $imgName3;}
				if (!empty($myUpload5)){ $modelInfoMa->foto3 = $myUpload5->getName();
				}//else{$modelInfoMa->foto3 = $imgName4;}	
				if (!empty($myUpload6)){ $modelInfoMa->foto4 = $myUpload6->getName();
				}//else{$modelInfoMa->foto4 = $imgName5;}		
				if (!empty($myUpload7)){ $modelInfoMa->foto5 = $myUpload7->getName();
				}//else{$modelInfoMa->foto5 = $imgName6;}		
				if (!empty($myUpload8)){ $modelInfoMa->dokumen_pendukung = $myUpload8->getName();
				}//else{$modelInfoMa->foto5 = $imgName7;}
				if (!empty($myUpload9)){ $modelInfoMa->video = $myUpload9->getName();
				}//else{$modelInfoMa->foto5 = $imgName7;}
	
				if($modelInfoMa->save()) {	}
				if (!empty($myUpload3)) {
					$this->_mapPath2 .= '/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin();
					$myUpload3->saveAs($this->_mapPath2 . '/Hujan/Foto/'. $myUpload3->getName());
				}
				if (!empty($myUpload4)) {
					$this->_mapPath3 .= '/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin();
					$myUpload4->saveAs($this->_mapPath3 . '/Hujan/Foto/'. $myUpload4->getName());
				}
				if (!empty($myUpload5)) {
					$this->_mapPath4 .= '/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin();
					$myUpload5->saveAs($this->_mapPath4 . '/Hujan/Foto/'. $myUpload5->getName());
				}
				if (!empty($myUpload6)) {
					$this->_mapPath5 .= '/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin();
					$myUpload6->saveAs($this->_mapPath5 . '/Hujan/Foto/'. $myUpload6->getName());
				}
				if (!empty($myUpload7)) {
					$this->_mapPath6 .= '/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin();
					$myUpload7->saveAs($this->_mapPath6 . '/Hujan Air/Foto/'. $myUpload7->getName());
				}
				if (!empty($myUpload8)) {
					$this->_mapPath7 .= '/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin();
					$myUpload8->saveAs($this->_mapPath7 . '/Hujan/File/'. $myUpload8->getName());
				}
				if (!empty($myUpload9)) {
					$this->_mapPath7 .= '/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin();
					$myUpload9->saveAs($this->_mapPath7 . '/Hujan/Video/'. $myUpload9->getName());
				}
			$this->redirect(array('//hujan/view','id'=>$modelInfoMa->ID));
			}
			
		$this->render('tambah',array(
			'model'=>$model,
			'modelmanfaat'=>$modelmanfaat,
			'modelteknis'=>$modelteknis,
			//'modelteknisWa'=>$modelteknisWa,
			'modelteknisGa'=>$modelteknisGa,
			'modelteknisPat'=>$modelteknisPat,
			'modelInfoMa'=>$modelInfoMa,
		));		
	}	
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Hujan('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Hujan']))
			$model->attributes=$_GET['Hujan'];

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
		$model=Hujan::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	public function loadModelW($id)
	{
		$modelmanfaat=ManfaatHujan::model()->findByPk($id);
		if($modelmanfaat===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $modelmanfaat;
	}	
	public function loadModelG($id)
	{
		$modelteknis=TeknisHujan::model()->findByPk($id);
		if($modelteknis===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $modelteknis;
	}
	public function loadModelP($id)
	{
		$modelteknisWa=TeknisWaHujan::model()->findByPk($id);
		if($modelteknisWa===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $modelteknisWa;
	}
	public function loadModelM($id)
	{
		$modelteknisGa=TeknisGaHujan::model()->findByPk($id);
		if($modelteknisGa===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $modelteknisGa;
	}
	public function loadModelN($id)
	{
		$modelteknisPat=KondisiHujan::model()->findByPk($id);
		if($modelteknisPat===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $modelteknisPat;
	}
	
	public function loadModelInfo($id)
	{
		$modelInfoMa=InfoHujan::model()->findByPk($id);
		if($modelInfoMa===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $modelInfoMa;
	}
	
	
	
	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='MataAir-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
