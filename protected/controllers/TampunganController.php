<?php

class TampunganController extends Controller
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
				'actions'=>array('index','view','search','tambah', 'detail', 'viewi', 'ewaduk','iwaduk'),
				'users'=>array('*'),
			),
 
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('add','update','setKot'),
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
		$model = $this->loadModelW($id);
		$model = $this->loadModelG($id);
		$model = $this->loadModelP($id);
		$model = $this->loadModelM($id);
		$model = $this->loadModelInfo($id);
		$this->render('detail',array(
			'model'=>$this->loadModel($id),
			'modelmanfaat'=>$this->loadModelW($id),
			'modelteknis'=>$this->loadModelG($id),
			'modelteknisWa'=>$this->loadModelP($id),
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

	public function actionSetkot()
	{	 
		$modelKota= new Kota;
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
		if(isset($_POST['Tampungan']))
		{
			
			$this->_mapPath = Yii::app()->params->baseMapPath;
			$model->attributes=$_POST['Tampungan'];
			if($model->save()) {
				$this->redirect(array('view','id'=>$model->ID));
			}
		}
		
		$modelmanfaat = $this->loadModelW($id);
		if(isset($_POST['ManfaatTampungan'])){
			$this->_mapPath = Yii::app()->params->baseMapPath;
			$this->_mapPath1 = Yii::app()->params->baseMapPath;
			$modelmanfaat->attributes=$_POST['ManfaatTampungan'];
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
					$myUpload1->saveAs($this->_mapPath . '/Tampungan/Catch/'. $myUpload1->getName());
				}
				if (!empty($myUpload2)) {
					$this->_mapPath1 .= '/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin();
					$myUpload2->saveAs($this->_mapPath1 . '/Tampungan/Catch/'. $myUpload2->getName());
				}
			}
			$this->redirect(array('//tampungan/view','id'=>$modelmanfaat->ID));
		}
			
		$modelteknis= $this->loadModelG($id);
			if(isset($_POST['TeknisTampungan'])){
				$modelteknis->attributes=$_POST['TeknisTampungan'];
				if($modelteknis->save()) {
					$this->redirect(array('//tampungan/view','id'=>$modelteknis->ID));
				}
			}
		
		$modelteknisWa= $this->loadModelP($id);
			if(isset($_POST['TeknisWaTampungan'])){
				$modelteknisWa->attributes=$_POST['TeknisWaTampungan'];
				if($modelteknisWa->save()) {
					$this->redirect(array('//tampungan/view','id'=>$modelteknisWa->ID));
				}
			}
			
		$modelteknisGa= $this->loadModelM($id);
			if(isset($_POST['TeknisGaTampungan'])){
				$modelteknisGa->attributes=$_POST['TeknisGaTampungan'];
				if($modelteknisGa->save()) {
					$this->redirect(array('//tampungan/view','id'=>$modelteknisGa->ID));
				}
			}
		
		$modelteknisPat= $this->loadModelN($id);
			if(isset($_POST['KondisiTampungan'])){
				$modelteknisPat->attributes=$_POST['KondisiTampungan'];
				if($modelteknisPat->save()) {
					$this->redirect(array('//tampungan/view','id'=>$modelteknisPat->ID));
				}
			}
		
		$modelInfoMa= $this->loadModelInfo($id);
		if(isset($_POST['InfoTampungan'])){
			$modelInfoMa->attributes=$_POST['InfoTampungan'];
			$this->_mapPath2 = Yii::app()->params->baseMapPath; $this->_mapPath3 = Yii::app()->params->baseMapPath;
			$this->_mapPath4 = Yii::app()->params->baseMapPath; $this->_mapPath5 = Yii::app()->params->baseMapPath;
			$this->_mapPath6 = Yii::app()->params->baseMapPath;
			$imgName2 = $modelInfoMa->foto1; $imgName3 = $modelInfoMa->foto2; 
			$imgName4 = $modelInfoMa->foto3; $imgName5 = $modelInfoMa->foto4;
			$imgName6 = $modelInfoMa->foto5; 
			$video = $modelInfoMa->video; 
			$myUpload3 = CUploadedFile::getInstance($modelInfoMa,'foto1');
			$myUpload4 = CUploadedFile::getInstance($modelInfoMa,'foto2');
			$myUpload5 = CUploadedFile::getInstance($modelInfoMa,'foto3');
			$myUpload6 = CUploadedFile::getInstance($modelInfoMa,'foto4');
			$myUpload7 = CUploadedFile::getInstance($modelInfoMa,'foto5');
			$myUpload8 = CUploadedFile::getInstance($modelInfoMa,'video');
			
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
			if (!empty($myUpload8)){ $modelInfoMa->video = $myUpload8->getName();
			}else{$modelInfoMa->video = $video;}		

			if($modelInfoMa->save()) {
				if (!empty($myUpload3)) {
					$this->_mapPath2 .= '/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin();
					$myUpload3->saveAs($this->_mapPath2 . '/Tampungan/Foto/'. $myUpload3->getName());
				}
				if (!empty($myUpload4)) {
					$this->_mapPath3 .= '/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin();
					$myUpload4->saveAs($this->_mapPath3 . '/Tampungan/Foto/'. $myUpload4->getName());
				}
				if (!empty($myUpload5)) {
					$this->_mapPath4 .= '/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin();
					$myUpload5->saveAs($this->_mapPath4 . '/Tampungan/Foto/'. $myUpload5->getName());
				}
				if (!empty($myUpload6)) {
					$this->_mapPath5 .= '/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin();
					$myUpload6->saveAs($this->_mapPath5 . '/Tampungan/Foto/'. $myUpload6->getName());
				}
				if (!empty($myUpload7)) {
					$this->_mapPath6 .= '/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin();
					$myUpload7->saveAs($this->_mapPath6 . '/Tampungan/Foto/'. $myUpload7->getName());
				}if (!empty($myUpload8)) {
					$this->_mapPath6 .= '/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin();
					$myUpload8->saveAs($this->_mapPath6 . '/Tampungan/Video/'. $myUpload8->getName());
				}
			}
			$this->redirect(array('//tampungan/view','id'=>$modelmanfaat->ID));
		}

		$this->render('tambah',array(
			'model'=>$model,
			'modelmanfaat'=>$modelmanfaat,
			'modelteknis'=>$modelteknis,
			'modelteknisWa'=>$modelteknisWa,
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
		$this->loadModelW($id)->delete();
		$this->loadModelG($id)->delete();
		$this->loadModelP($id)->delete();
		$this->loadModelM($id)->delete();
		$this->loadModelN($id)->delete();
		$this->loadModelInfo($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{	
		$model=new Tampungan('search');
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['Tampungan']))
			//$columnsLabels = $model->attributes=$_GET['Permukaan'];
			$model->attributes=$_GET['Tampungan'];
			$criteria=new CDbCriteria;

		$dataProvider=new CActiveDataProvider('Tampungan', array(
			'criteria'=>$criteria,
			'sort'=>array(
				//'defaultOrder'=>'Tanggal DESC',
			),
		));
			$this->render('index',array(
			//'dataProvider'=>$dataProvider,
			'model'=>$model,
		));
	}
		
	public function actionTambah()
	{
		
		$model=new Tampungan;
		$modelmanfaat= new ManfaatTampungan;
		$modelteknis= new TeknisTampungan;
		$modelteknisWa= new TeknisWaTampungan;
		$modelteknisGa= new TeknisGaTampungan;
		$modelteknisPat= new KondisiTampungan;
		$modelInfoMa= new InfoTampungan;

		if(isset($_POST['Tampungan']))
		{
			$model->attributes=$_POST['Tampungan'];

			if($model->save()) {
				$modelteknis->ID_IDBalaiGa = $model->ID_IDBalai;
				$modelteknis->NoDataGa = $model->NoData;
				$modelteknisWa->ID_IDBalaiPat = $model->ID_IDBalai;
				$modelteknisWa->NoDataPat = $model->NoData;
				$modelteknisGa->ID_IDBalaiMa = $model->ID_IDBalai;
				$modelteknisGa->NoDataMa = $model->NoData;
				$modelteknisPat->ID_IDBalaiNam = $model->ID_IDBalai;
				$modelteknisPat->NoDataNam = $model->NoData;
				$modelInfoMa->ID_IDBalaiJu = $model->ID_IDBalai;
				$modelInfoMa->NoDataJu = $model->NoData;
				$modelmanfaat->ID_IDBalaiWa = $model->ID_IDBalai;
				$modelmanfaat->NoDataWa = $model->NoData;

				$modelmanfaat->save();
				$modelteknis->save();
				$modelteknisWa->save();
				$modelteknisGa->save();
				$modelteknisPat->save();
				$modelInfoMa->save();					
			}
			$this->redirect(array('//tampungan/update','id'=>$model->ID));
		}

		if(isset($_POST['ManfaatTampungan'])){
			$this->_mapPath = Yii::app()->params->baseMapPath;
			$this->_mapPath1 = Yii::app()->params->baseMapPath;
			$modelmanfaat->attributes=$_POST['ManfaatTampungan'];
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
				$myUpload1->saveAs($this->_mapPath . '/Tampungan/Catch/'. $myUpload1->getName());
			}
			if (!empty($myUpload2)) {
				$this->_mapPath1 .= '/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin();
				$myUpload2->saveAs($this->_mapPath1 . '/Tampungan/Catch/'. $myUpload2->getName());
			}
			$this->redirect(array('//tampungan/update','id'=>$modelmanfaat->ID));
		}


		if(isset($_POST['TeknisTampungan'])){
			$modelteknis->attributes=$_POST['TeknisTampungan'];
			if($modelteknis->save()) {
				$this->redirect(array('//tampungan/viewt','id'=>$modelteknis->ID));
			}
		}
		if(isset($_POST['TeknisWaTampungan'])){
			$modelteknisWa->attributes=$_POST['TeknisWaTampungan'];
			if($modelteknisWa->save()) {
				$this->redirect(array('//tampungan/viewtw','id'=>$modelteknisWa->ID));
			}
		}
		if(isset($_POST['TeknisGaTampungan'])){
			$modelteknisGa->attributes=$_POST['TeknisGaTampungan'];
			if($modelteknisGa->save()) {
				$this->redirect(array('//tampungan/viewtg','id'=>$modelteknisGa->ID));
			}
		}
		if(isset($_POST['KondisiTampungan'])){
			$modelteknisPat->attributes=$_POST['KondisiTampungan'];
			if($modelteknisPat->save()) {
				$this->redirect(array('//tampungan/view','id'=>$modelteknisPat->ID));
			}
		}
		
		if(isset($_POST['InfoTampungan'])){
			$modelInfoMa->attributes=$_POST['InfoTampungan'];
			$this->_mapPath2 = Yii::app()->params->baseMapPath; $this->_mapPath3 = Yii::app()->params->baseMapPath;
			$this->_mapPath4 = Yii::app()->params->baseMapPath; $this->_mapPath5 = Yii::app()->params->baseMapPath;
			$this->_mapPath6 = Yii::app()->params->baseMapPath;
			/*$imgName2 = $modelInfoMa->foto1; $imgName3 = $modelInfoMa->foto2; 
			$imgName4 = $modelInfoMa->foto3; $imgName5 = $modelInfoMa->foto4;
			$imgName6 = $modelInfoMa->foto5; */
			$myUpload3 = CUploadedFile::getInstance($modelInfoMa,'foto1');
			$myUpload4 = CUploadedFile::getInstance($modelInfoMa,'foto2');
			$myUpload5 = CUploadedFile::getInstance($modelInfoMa,'foto3');
			$myUpload6 = CUploadedFile::getInstance($modelInfoMa,'foto4');
			$myUpload7 = CUploadedFile::getInstance($modelInfoMa,'foto5');
			$myUpload8 = CUploadedFile::getInstance($modelInfoMa,'video');
			
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
			if (!empty($myUpload8)){ $modelInfoMa->video = $myUpload8->getName();
			}//else{$modelInfoMa->foto5 = $imgName6;}		


			if($modelInfoMa->save()) {	}
			if (!empty($myUpload3)) {
				$this->_mapPath2 .= '/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin();
				$myUpload3->saveAs($this->_mapPath2 . '/Tampungan/Foto/'. $myUpload3->getName());
			}
			if (!empty($myUpload4)) {
				$this->_mapPath3 .= '/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin();
				$myUpload4->saveAs($this->_mapPath3 . '/Tampungan/Foto/'. $myUpload4->getName());
			}
			if (!empty($myUpload5)) {
				$this->_mapPath4 .= '/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin();
				$myUpload5->saveAs($this->_mapPath4 . '/Tampungan/Foto/'. $myUpload5->getName());
			}
			if (!empty($myUpload6)) {
				$this->_mapPath5 .= '/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin();
				$myUpload6->saveAs($this->_mapPath5 . '/Tampungan/Foto/'. $myUpload6->getName());
			}
			if (!empty($myUpload7)) {
				$this->_mapPath6 .= '/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin();
				$myUpload7->saveAs($this->_mapPath6 . '/Tampungan/Foto/'. $myUpload7->getName());
			}
			if (!empty($myUpload8)) {
				$this->_mapPath6 .= '/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin();
				$myUpload8->saveAs($this->_mapPath6 . '/Tampungan/Video/'. $myUpload8->getName());
			}
			$this->redirect(array('//tampungan/view','id'=>$modelInfoMa->ID));
		}

		$this->render('tambah',array(
			'model'=>$model,
			'modelmanfaat'=>$modelmanfaat,
			'modelteknis'=>$modelteknis,
			'modelteknisWa'=>$modelteknisWa,
			'modelteknisGa'=>$modelteknisGa,
			'modelteknisPat'=>$modelteknisPat,
			'modelInfoMa'=>$modelInfoMa,
			));		
		}	
	
	/**
		* Manages all models.
	**/
	public function actionAdmin()
	{
		$model=new Tampungan('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Tampungan']))
			$model->attributes=$_GET['Tampungan'];

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
		$model=Tampungan::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	public function loadModelW($id)
	{
		$modelmanfaat=ManfaatTampungan::model()->findByPk($id);
		if($modelmanfaat===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $modelmanfaat;
	}	
	public function loadModelG($id)
	{
		$modelteknis=TeknisTampungan::model()->findByPk($id);
		if($modelteknis===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $modelteknis;
	}
	public function loadModelP($id)
	{
		$modelteknisWa=TeknisWaTampungan::model()->findByPk($id);
		if($modelteknisWa===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $modelteknisWa;
	}
	public function loadModelM($id)
	{
		$modelteknisGa=TeknisGaTampungan::model()->findByPk($id);
		if($modelteknisGa===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $modelteknisGa;
	}
	public function loadModelN($id)
	{
		$modelteknisPat=KondisiTampungan::model()->findByPk($id);
		if($modelteknisPat===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $modelteknisPat;
	}
	public function loadModelInfo($id)
	{
		$modelInfoMa=InfoTampungan::model()->findByPk($id);
		if($modelInfoMa===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $modelInfoMa;
	}
	
	public function actionEwaduk()
    {
		if(isset($_POST['Tampungan'])){
			Tampungan::exportXls();
		}
	}	

	public function actionIwaduk()
    {
		if(isset($_POST['Tampungan'])){
			Tampungan::importXls($_FILES);
			$this->actionIndex();
		}
	}
	
	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='permukaan-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
