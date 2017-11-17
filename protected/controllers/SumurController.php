<?php

class SumurController extends Controller
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
	public $modelKota;
	
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
				'actions'=>array('index','view','tambah', 'detail', 'search', 'cetak','buatExcel'),
				'users'=>array('*'),
			),
 
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('add','update','create','setKot'),
				'users'=>array_merge($user['superAdmin'], $user['admin']),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','tambah'),
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
		$modelmanfaat = $this->loadModelW($id);
		$modelteknis = $this->loadModelG($id);
		$modelteknisWa = $this->loadModelP($id);
		$modelteknisGa = $this->loadModelM($id);
		$modelteknisPat = $this->loadModelN($id);
		$modelInfoMa = $this->loadModelInfo($id);
		
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
	
	public function actionDetail($id)
	{
		$model = $this->loadModel($id);
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			//'model'=>$model,
		));	
	}
	
	public function actionGetExportFile()
	{
		Yii::app()->request->sendFile('export.csv',Yii::app()->user->getState('export'));
		Yii::app()->user->clearState('export');
	}
	
	public function actionExport()
	{
		$fp = fopen('php://temp', 'w');
	 
		/* 
		 * Write a header of csv file
		 */
		$headers = array(
			'd_date',
			'client.clientFirstName',
			'client.clientLastName',
			'd_time',
		);
		$row = array();
		foreach($headers as $header) {
			$row[] = MODEL::model()->getAttributeLabel($header);
		}
		fputcsv($fp,$row);
	 
		/*
		 * Init dataProvider for first page
		 */
		$model=new MODEL('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MODEL'])) {
			$model->attributes=$_GET['MODEL'];
		}
		$dp = $model->search();
	 
		/*
		 * Get models, write to a file, then change page and re-init DataProvider
		 * with next page and repeat writing again
		 */
		while($models = $dp->getData()) {
			foreach($models as $model) {
				$row = array();
				foreach($headers as $head) {
					$row[] = CHtml::value($model,$head);
				}
				fputcsv($fp,$row);
			}
	 
			unset($model,$dp,$pg);
			$model=new MODEL('search');
			$model->unsetAttributes();  // clear any default values
			if(isset($_GET['MODEL']))
				$model->attributes=$_GET['MODEL'];
	 
			$dp = $model->search();
			$nextPage = $dp->getPagination()->getCurrentPage()+1;
			$dp->getPagination()->setCurrentPage($nextPage);
		}
	 
		/*
		 * save csv content to a Session
		 */
		rewind($fp);
		Yii::app()->user->setState('export',stream_get_contents($fp));
		fclose($fp);
	}
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
		
		if(isset($_POST['Sumur']))
		{
			$model->attributes=$_POST['Sumur'];
			$model->Tanggal = time();
			if($model->save()) {
				$this->redirect(array('//sumur/view','id'=>$model->ID));
			}
		}
		
		$modelmanfaat= $this->loadModelW($id);
		if(isset($_POST['ManfaatSumur'])){
			$this->_mapPath = Yii::app()->params->baseMapPath;
			$this->_mapPath1 = Yii::app()->params->baseMapPath;
			$modelmanfaat->attributes=$_POST['ManfaatSumur'];
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
					$myUpload1->saveAs($this->_mapPath . '/Sumur/Catch/'. $myUpload1->getName());
				}
				if (!empty($myUpload2)) {
					$this->_mapPath1 .= '/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin();
					$myUpload2->saveAs($this->_mapPath1 . '/Sumur/Catch/'. $myUpload2->getName());
				}
			}
			$this->redirect(array('//sumur/view','id'=>$modelmanfaat->ID));
		}
			
		$modelteknis= $this->loadModelG($id);
			if(isset($_POST['TeknisSumur'])){
				$modelteknis->attributes=$_POST['TeknisSumur'];
				if($modelteknis->save()) {
					$this->redirect(array('//sumur/view','id'=>$modelteknis->ID));
				}
			}
		
		$modelteknisWa= $this->loadModelP($id);
			if(isset($_POST['TeknisWaSumur'])){
				$modelteknisWa->attributes=$_POST['TeknisWaSumur'];
				if($modelteknisWa->save()) {
					$this->redirect(array('//sumur/view','id'=>$modelteknisWa->ID));
				}
			}
			
		$modelteknisGa= $this->loadModelM($id);
			if(isset($_POST['TeknisGaSumur'])){
				$modelteknisGa->attributes=$_POST['TeknisGaSumur'];
				if($modelteknisGa->save()) {
					$this->redirect(array('//sumur/view','id'=>$modelteknisGa->ID));
				}
			}
		
		$modelteknisPat= $this->loadModelN($id);
			if(isset($_POST['KondisiSumur'])){
				$modelteknisPat->attributes=$_POST['KondisiSumur'];
				if($modelteknisPat->save()) {
					$this->redirect(array('//sumur/view','id'=>$modelteknisPat->ID));
				}
			}
		
		$modelInfoMa= $this->loadModelInfo($id);
			if(isset($_POST['InfoSumur'])){
				$modelInfoMa->attributes=$_POST['InfoSumur'];
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
						$myUpload3->saveAs($this->_mapPath2 . '/Sumur/Foto/'. $myUpload3->getName());
					}
					if (!empty($myUpload4)) {
						$this->_mapPath3 .= '/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin();
						$myUpload4->saveAs($this->_mapPath3 . '/Sumur/Foto/'. $myUpload4->getName());
					}
					if (!empty($myUpload5)) {
						$this->_mapPath4 .= '/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin();
						$myUpload5->saveAs($this->_mapPath4 . '/Sumur/Foto/'. $myUpload5->getName());
					}
					if (!empty($myUpload6)) {
						$this->_mapPath5 .= '/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin();
						$myUpload6->saveAs($this->_mapPath5 . '/Sumur/Foto/'. $myUpload6->getName());
					}
					if (!empty($myUpload7)) {
						$this->_mapPath6 .= '/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin();
						$myUpload7->saveAs($this->_mapPath6 . '/Sumur/Foto/'. $myUpload7->getName());
					}
					if (!empty($myUpload8)) {
						$this->_mapPath7 .= '/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin();
						$myUpload8->saveAs($this->_mapPath7 . '/Sumur/File/'. $myUpload8->getName());
					}
					if (!empty($myUpload9)) {
						$this->_mapPath7 .= '/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin();
						var_dump($myUpload9->getName());
						$myUpload9->saveAs($this->_mapPath7 . '/Sumur/Video/'. $myUpload9->getName());
					}

				}
				$this->redirect(array('//sumur/view','id'=>$modelInfoMa->ID));
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

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{	
		
		$model=new Sumur('search');
		$model->unsetAttributes();
		
		if(isset($_GET['Sumur']))
			$model->attributes=$_GET['Sumur'];
		if(Yii::app()->request->getParam('export')) {
			$this->actionExport();
			Yii::app()->end();
		}
		$this->render('index',array(
			//'dataProvider'=>$dataProvider,
			'model'=>$model,
		));
	}
	
	public function actionCetak()
    {
		//Sumur::exportXls();
		$daftarku=$_POST['NamaSumur'];
		Sumur::exportXls();
		echo "<title>Cetak Data Sumur</title>";
		echo "<div class='grid-view'>";
		echo "<table class='items table table-striped table-bordered table-condensed'><tr><strong>";
		echo "<th>No</th>";
		echo "<th>Nama Sumur</th>";
		echo "<th>Kab/Kota</th>";
		echo "<th>Kecamatan</th>";
		echo "<th>Desa</th>";
		echo "<th>Tahun Bangun</th>";
		echo "<th>Jiwa</th>";
		echo "<th>Debit (l/dtk)</th>";
		echo "<th>Kondisi Sumur</th>";
		echo "</strong></tr>";

        foreach ($daftarku as $nomor=>$nilai)
        {
			$model=$this->loadModel($nilai);
			$modelteknisWa= $this->loadModelP($nilai);
			$modelteknis= $this->loadModelG($nilai);
			$modelmanfaat= $this->loadModelW($nilai);
			$modelteknisPat= $this->loadModelN($nilai);
			$modelteknisGa= $this->loadModelM($nilai);

			if($modelteknis->ID == $nilai){
				
				echo "<tr>";
				echo "<td '>".$nilai."</td>";
				echo "<td>".$modelteknis->nama_sumur."</td>";
				echo "<td>".$model->kota."</td>";
				echo "<td>".$model->kecamatan."</td>";
				echo "<td>".$model->desa."</td>";
				echo "<td>".$modelteknisGa->tahun_bangun."</td>";
				echo "<td>".$modelmanfaat->jiwa."</td>";
				echo "<td>".$modelmanfaat->debit."</td>";
				echo "<td>".$modelteknisPat->sumur."</td>";
				echo "</tr>";
			}

		}
		echo "</table></div>";
		echo "<script>window.print();</script>";
		echo "<script>window.close();</script>";
	}

	
	public function actionBuatExcel()
    {
         $objPHPExcel=Yii::createComponent('application.extensions.PHPExcel.PHPExcel');
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'Ini di A No 1 ya')
                    ->setCellValue('B2', 'kalau ini B 2')
                    ->setCellValue('C1', 'Ini di C1')
                    ->setCellValue('D2', 'Terakhir di D 2');
        // Redirect output to a client’s web browser (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="contoh01.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        unset($objPHPExcel);
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

	public function actionTambah()
	{
		$model=new Sumur;
		$modelmanfaat= new ManfaatSumur;
		$modelteknis= new TeknisSumur;
		$modelteknisWa= new TeknisWaSumur;
		$modelteknisGa= new TeknisGaSumur;
		$modelteknisPat= new KondisiSumur;
		$modelInfoMa= new InfoSumur;
		//$modelKota= new Kota;
		
		
		
		if(isset($_POST['Sumur']))
		{

			//$provinsi = $_GET["provinsi"];
			
			//$modelKota->attributes=$_POST['Kota'];
			$model->attributes=$_POST['Sumur'];
			$model->Tanggal = time();
			if($model->save()) {
				$modelmanfaat->ID_IDBalaiWa = $model->ID_IDBalai;
				$modelmanfaat->NoDataWa = $model->NoData;
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
				
				$modelmanfaat->save();
				$modelteknis->save();
				$modelteknisWa->save();
				$modelteknisGa->save();
				$modelteknisPat->save();
				$modelInfoMa->save();
				$this->redirect(array('//sumur/update','id'=>$model->ID));	
			}
			

		}

		if(isset($_POST['ManfaatSumur'])){
			$modelmanfaat->attributes=$_POST['ManfaatSumur'];
			$this->_mapPath = Yii::app()->params->baseMapPath;
			$this->_mapPath1 = Yii::app()->params->baseMapPath;
			$modelmanfaat->attributes=$_POST['ManfaatSumur'];
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
				$myUpload1->saveAs($this->_mapPath . '/Sumur/Catch/'. $myUpload1->getName());
			}
			if (!empty($myUpload2)) {
				$this->_mapPath1 .= '/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin();
				$myUpload2->saveAs($this->_mapPath1 . '/Sumur/Catch/'. $myUpload2->getName());
			}
			$this->redirect(array('//sumur/update','id'=>$modelmanfaat->ID));
		}

		if(isset($_POST['TeknisSumur'])){
			$modelteknis->attributes=$_POST['TeknisSumur'];
			if($modelteknis->save()) {
				$this->redirect(array('//sumur/view','id'=>$modelteknis->ID));
			}
		}
			
		if(isset($_POST['TeknisWaSumur'])){
			$modelteknisWa->attributes=$_POST['TeknisWaSumur'];
			if($modelteknisWa->save()) {
				$this->redirect(array('//sumur/view','id'=>$modelteknisWa->ID));
			}
		}
		
		if(isset($_POST['TeknisGaSumur'])){
			$modelteknisGa->attributes=$_POST['TeknisGaSumur'];
			if($modelteknisGa->save()) {
				$this->redirect(array('//sumur/view','id'=>$modelteknisGa->ID));
			}
		}
		
		if(isset($_POST['KondisiSumur'])){
			$modelteknisPat->attributes=$_POST['KondisiSumur'];
			if($modelteknisPat->save()) {
				$this->redirect(array('//sumur/view','id'=>$modelteknisPat->ID));
			}
		}
			
		if(isset($_POST['InfoSumur'])){
			$modelInfoMa->attributes=$_POST['InfoSumur'];
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
				$myUpload3->saveAs($this->_mapPath2 . '/Sumur/Foto/'. $myUpload3->getName());
			}
			if (!empty($myUpload4)) {
				$this->_mapPath3 .= '/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin();
				$myUpload4->saveAs($this->_mapPath3 . '/Sumur/Foto/'. $myUpload4->getName());
			}
			if (!empty($myUpload5)) {
				$this->_mapPath4 .= '/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin();
				$myUpload5->saveAs($this->_mapPath4 . '/Sumur/Foto/'. $myUpload5->getName());
			}
			if (!empty($myUpload6)) {
				$this->_mapPath5 .= '/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin();
				$myUpload6->saveAs($this->_mapPath5 . '/Sumur/Foto/'. $myUpload6->getName());
			}
			if (!empty($myUpload7)) {
				$this->_mapPath6 .= '/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin();
				$myUpload7->saveAs($this->_mapPath6 . '/Sumur/Foto/'. $myUpload7->getName());
			}
			if (!empty($myUpload8)) {
				$this->_mapPath7 .= '/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin();
				$myUpload8->saveAs($this->_mapPath7 . '/Sumur/File/'. $myUpload8->getName());
			}
			if (!empty($myUpload9)) {
				$this->_mapPath7 .= '/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin();
				$myUpload9->saveAs($this->_mapPath7 . '/Sumur/Video/'. $myUpload9->getName());
			}
			$this->redirect(array('//sumur/view','id'=>$modelInfoMa->ID));

		}
		
		$this->render('tambah',array(
			'model'=>$model,
			'modelmanfaat'=>$modelmanfaat,
			'modelteknis'=>$modelteknis,
			'modelteknisWa'=>$modelteknisWa,
			'modelteknisGa'=>$modelteknisGa,
			'modelteknisPat'=>$modelteknisPat,
			'modelInfoMa'=>$modelInfoMa,
			//'modelKota'=>$modelKota,
			));		
		}	
	/**
	 * Manages all models.
	 */



	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Sumur::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	public function loadModelW($id)
	{
		$modelmanfaat=ManfaatSumur::model()->findByPk($id);
		if($modelmanfaat===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $modelmanfaat;
	}	
	public function loadModelG($id)
	{
		$modelteknis=TeknisSumur::model()->findByPk($id);
		if($modelteknis===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $modelteknis;
	}
	public function loadModelP($id)
	{
		$modelteknisWa=TeknisWaSumur::model()->findByPk($id);
		if($modelteknisWa===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $modelteknisWa;
	}
	public function loadModelM($id)
	{
		$modelteknisGa=TeknisGaSumur::model()->findByPk($id);
		if($modelteknisGa===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $modelteknisGa;
	}
	public function loadModelN($id)
	{
		$modelteknisPat=KondisiSumur::model()->findByPk($id);
		if($modelteknisPat===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $modelteknisPat;
	}
	
	public function loadModelInfo($id)
	{
		$modelInfoMa=InfoSumur::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='Sumur-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
