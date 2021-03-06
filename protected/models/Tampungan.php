<?php

class Tampungan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Tematik the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public $manfaat_jiwa;
	public $debit_liter;
	public $nama_lembaga;
	public $kondisi_sungai;
	public $info_gambar;
	public $status_aset;
	public $tahun_bangun;
	public $nama_prov;
	public $n_prov;
	public $nama_sungai;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_tampungan1';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('', 'required'),
			//array('Tanggal', 'numerical', 'integerOnly'=>true),
			/* ------------Data Numerical Control------------'maxSize'=>5242880,*/
			array('ID_IDBalai, NoData, kodefikasi', 'length', 'max'=>16),
			/* ------------Data Dasar & Administrasi------------*/
			array('nama_das,nama_sistem, nama_ws, NamaBalai, kriteria, nama_cat, data_dasar, nama_objek, tahun_data', 'length', 'max'=>100),
			array('provinsi, kota, NamaBalai, kecamatan, desa, status', 'length', 'max'=>100),
			array('bujur_timur, lintang_selatan', 'length', 'max'=>20),
			array('elevasi', 'length', 'max'=>10),
			array('nama_das,nama_sistem, nama_ws, nama_cat, data_dasar, nama_objek,
					provinsi, kota, kecamatan, desa, tahun_bangun, nama_sungai,
					manfaat_jiwa, debit_liter, 
					', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'admin'=>array(self::BELONGS_TO, 'User', 'ID_IDBalai'),
			'balai'=>array(self::BELONGS_TO, 'UnitKerja', 'ID_IDBalai'),
			'kotas'=>array(self::BELONGS_TO, 'Kota', 'kota'),
			'madasar'=>array(self::BELONGS_TO, 'Tampungan', 'ID'),
			'manfaat'=>array(self::BELONGS_TO, 'ManfaatTampungan', 'ID'),
			'teknissat'=>array(self::BELONGS_TO, 'TeknisTampungan', 'ID'),
			'teknisdua'=>array(self::BELONGS_TO, 'TeknisWaTampungan', 'ID'),
			'teknisga'=>array(self::BELONGS_TO, 'TeknisGaTampungan', 'ID'),
			'kondisi'=>array(self::BELONGS_TO, 'KondisiTampungan', 'ID'),
			'info'=>array(self::BELONGS_TO, 'InfoTampungan', 'ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_IDBalai' => 'ID Balai',
			'NoData' => 'Data ke ',
			'kodefikasi'=>'Kodefikasi',
			'data_dasar'=>'Kelompok Data Dasar',
			'nama_das' => 'Nama DAS',
			'nama_ws' => 'Nama WS',
			//'nama_cat' => 'Nama CAT',
			'nama_sistem' => 'Nama Sistem Air Baku',
			'nama_objek' => 'Objek Sistem Air Baku',
			'provinsi' => 'Provinsi',
			'kota' => 'Kota/ Kabupaten',
			'kecamatan' => 'Kecamatan',
			'desa' => 'Desa/ Kelurahan',
			'elevasi' => 'Elevasi (mdpl)',
			'bujur_timur' => 'Bujur Timur',
			'lintang_selatan' => 'Lintang Selatan',
			'tahun_data' => 'Tahun Data',
			'status'=>'Status Pembangunan',
			
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria=new CDbCriteria;
		$criteria->with= array(
			'admin'=>array('select'=>'Nama'),
			'info'=>array('select'=>'foto1'),
			'manfaat'=>array('select'=>'jiwa, debit, nama_sungai'),
			//'teknissat'=>array('select'=>'nama_objek'),
			'teknisdua'=>array('select'=>'status_aset'),
			'teknisga'=>array('select'=>'tahun_bangun, nama_lembaga'),
			'kondisi'=>array('select'=>'kondisi_sungai'),
			//'kotas'=>array('select'=>'id_prov, provinsi'),
		);
		$criteria->compare('manfaat.jiwa',$this->manfaat_jiwa, true);
		$criteria->compare('manfaat.debit',$this->debit_liter, true);
		$criteria->compare('manfaat.nama_sungai',$this->nama_sungai, true);
		$criteria->compare('kondisi.kondisi_sungai',$this->kondisi_sungai, true);
		$criteria->compare('teknisdua.status_aset',$this->status_aset, true);
		$criteria->compare('teknisga.tahun_bangun',$this->tahun_bangun, true);
		$criteria->compare('teknisga.nama_lembaga',$this->nama_lembaga, true);
		//$criteria->compare('kotas.id_prov',$this->nama_prov, true);
		//$criteria->compare('kotas.provinsi',$this->n_prov, true);
		
		$criteria->compare('nama_objek',$this->nama_objek, true);
		$criteria->compare('nama_das',$this->nama_das, true);
		$criteria->compare('nama_ws',$this->nama_ws, true);		
		$criteria->compare('provinsi',$this->provinsi, true);
		$criteria->compare('kota',$this->kota, true);
		$criteria->compare('kecamatan',$this->kecamatan, true);
		$criteria->compare('desa',$this->desa, true);
		
		if (isset(Yii::app()->user->hakAkses) AND Yii::app()->user->hakAkses == User::USER_ADMIN){
			$criteria->compare('ID_IDBalai', Yii::app()->user->uid);
		
			return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
				'sort'=>array(
					'defaultOrder'=>'nama_ws DESC',
				),
				'sort'=>array(
					'attributes'=>array(
						'manfaat_jiwa'=>array('asc'=>'manfaat.jiwa','desc'=>'manfaat.jiwa'),
						'debit_liter'=>array('asc'=>'manfaat.debit', 'desc'=>'manfaat.debit'),
						'nama_sungai'=>array('asc'=>'manfaat.nama_sungai', 'desc'=>'manfaat.nama_sungai'),
						'kondisi_sungai'=>array('asc'=>'kondisi.kondisi_sungai', 'desc'=>'kondisi.kondisi_sungai'),
						'tahun_bangun'=>array('asc'=>'teknisga.tahun_bangun', 'desc'=>'teknisga.tahun_bangun'),
						'*',
					),
				),
				'pagination' => array(
					'pageSize' => 6,
				),
			));
		}else{			
			return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
				'sort'=>array(
					'defaultOrder'=>'nama_ws DESC',
				),
				'sort'=>array(
					'attributes'=>array(
						'manfaat_jiwa'=>array('asc'=>'manfaat.jiwa','desc'=>'manfaat.jiwa','value'=>'manfaat.jiwa'),
						'debit_liter'=>array('asc'=>'manfaat.debit', 'desc'=>'manfaat.debit','value'=>'manfaat.debit'),
						'nama_sungai'=>array('asc'=>'manfaat.nama_sungai', 'desc'=>'manfaat.nama_sungai'),
						'kondisi_sungai'=>array('asc'=>'kondisi.kondisi_sungai', 'desc'=>'kondisi.kondisi_sungai'),
						'tahun_bangun'=>array('asc'=>'teknisga.tahun_bangun', 'desc'=>'teknisga.tahun_bangun'),
						//'nama_prov'=>array('asc'=>'kotas.id_prov', 'desc'=>'kotas.id_prov'),
						'*',
					),
				),
				'pagination' => array(
					'pageSize' => 6,
				),

			));		
		}
	}
	
	public static function getAvailableDataMataairId()
	{
		$criteria = new CDbCriteria;
		$criteria->limit = 1;
		$criteria->order = 'ID_IDBalai';

		$lastDataSumur =self::model()->find(
			$criteria
		);

		if (isset($lastDataSumur->ID_IDBalai))
			return $lastDataSumur->ID_IDBalai + 1;
		else
			return 1;
	}	
	public static function getAvailableNoData()
	{
		$criteria = new CDbCriteria;
		if (isset(Yii::app()->user->uid)) {
			
			$criteria->compare('ID_IDBalai', Yii::app()->user->uid);
			$criteria->limit = 1;
			$criteria->order = 'NoData DESC';

			$lastNoData =self::model()->find(
				$criteria
			);

			if (isset($lastNoData->NoData))
				return $lastNoData->NoData + 1;
			else
				return 1;
		}
	}
	public static function getNoDataByAdmin()
	{
		if (isset(Yii::app()->user->uid)) {
			$id = Yii::app()->user->uid;
			$command = Yii::app()->db->createCommand("SELECT * FROM t_tampungan1 WHERE ID_IDBalai='$id'");
			
			$query = $command->query();
			
			$data = $query->read();
			
			return $data['NoData'];	
			} else {
				return '';
			}
	}	

	public function getTotals($column,$ids)	
	{
		if($ids){
		$ids = implode(",",$ids);
		
		$connection=Yii::app()->db;
		$command=$connection->createCommand("SELECT SUM($column) FROM t_tampungan2 where id in ($ids)");
		$amount = $command->queryScalar();
		return number_format($amount,0);
		}
		else 
		return '0';
	} 

	public static function exportXls()
    {
		if(isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_ADMIN OR Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN)){
			$datadatas = self::model()->findAll();
			$ii = 2;
			$objPHPExcel=Yii::createComponent('application.extensions.PHPExcel');
			$objPHPExcel->setActiveSheetIndex(0)
				->mergeCells('A1:M1')
				->setCellValue('A1', 'Data Dasar')
				->setCellValue('A2', 'No')
				->setCellValue('B2', 'Nama Objek')
				->setCellValue('C2', 'Nama Sistem,')
				->setCellValue('D2', 'Wilayah Sungai')
				->setCellValue('E2', 'Sumber Air')
				->setCellValue('F2', 'Provinsi')
				->setCellValue('G2', 'Kota/ Kabupaten')
				->setCellValue('H2', 'Kecamatan')
				->setCellValue('I2', 'Desa')
				->setCellValue('J2', 'Manfaat Jiwa')
				->setCellValue('K2', 'Debit / Liter')
				->setCellValue('L2', 'tahun bangun');
			
			foreach ($datadatas as $urut){	
				$ii++;
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$ii, $urut->NoData)
				->setCellValue('B'.$ii, $urut->nama_objek)
				->setCellValue('C'.$ii, $urut->nama_sistem)
				->setCellValue('D'.$ii, $urut->nama_ws)
				->setCellValue('E'.$ii, $urut->manfaat->nama_sungai)
				->setCellValue('F'.$ii, $urut->provinsi)
				->setCellValue('G'.$ii, $urut->kota)
				->setCellValue('H'.$ii, $urut->kecamatan)
				->setCellValue('I'.$ii, $urut->desa)
				->setCellValue('J'.$ii, $urut->manfaat->jiwa)
				->setCellValue('K'.$ii, $urut->manfaat->debit)
				->setCellValue('L'.$ii, $urut->teknisga->tahun_bangun);
			}
		}else if(Yii::app()->user->isGuest){
			$datadatas = self::model()->findAll();
			$ii = 2;
			$objPHPExcel=Yii::createComponent('application.extensions.PHPExcel');
			$objPHPExcel->setActiveSheetIndex(0)
				->mergeCells('A1:M1')
				->setCellValue('A1', 'Data Dasar')
				->setCellValue('A2', 'No')
				->setCellValue('B2', 'Nama Objek')
				->setCellValue('C2', 'Nama Sistem,')
				->setCellValue('D2', 'Wilayah Sungai')
				->setCellValue('E2', 'Sumber Air')
				->setCellValue('F2', 'Provinsi')
				->setCellValue('G2', 'Kota/ Kabupaten')
				->setCellValue('H2', 'Kecamatan')
				->setCellValue('I2', 'Desa')
				->setCellValue('J2', 'Manfaat Jiwa')
				->setCellValue('K2', 'Debit / Liter')
				->setCellValue('L2', 'tahun bangun');
			
			foreach ($datadatas as $urut){	
				$ii++;
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$ii, $urut->NoData)
				->setCellValue('B'.$ii, $urut->nama_objek)
				->setCellValue('C'.$ii, $urut->nama_sistem)
				->setCellValue('D'.$ii, $urut->nama_ws)
				->setCellValue('E'.$ii, $urut->manfaat->nama_sungai)
				->setCellValue('F'.$ii, $urut->provinsi)
				->setCellValue('G'.$ii, $urut->kota)
				->setCellValue('H'.$ii, $urut->kecamatan)
				->setCellValue('I'.$ii, $urut->desa)
				->setCellValue('J'.$ii, $urut->manfaat->jiwa)
				->setCellValue('K'.$ii, $urut->manfaat->debit)
				->setCellValue('L'.$ii, $urut->teknisga->tahun_bangun);
			}
		}

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset(Yii::app()->user->hakAkses) AND Yii::app()->user->hakAkses == User::USER_ADMIN){
			header('Content-Disposition: attachment;filename="Air Baku (Waduk, Danau, Embung, Setu) - '.UnitKerja::getNamaUnitKerjaByAdmin().'.xlsx"');
		}else if(isset(Yii::app()->user->hakAkses) AND Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN){
			header('Content-Disposition: attachment;filename="Air Baku (Waduk, Danau, Embung, Setu) se-Indonesia.xlsx"');
		}else if(Yii::app()->user->isGuest){
			header('Content-Disposition: attachment;filename="Air Baku (Waduk, Danau, Embung, Setu).xlsx"');
		}
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
	
	public static function importXls()
    {
		Yii::import('application.extensions.PHPExcel', true);
		$objReader = new PHPExcel_Reader_Excel5;
		if(isset($_FILES['inputatab'])){
			$objPHPExcel = $objReader->load($_FILES['inputatab']['tmp_name']);
			$objWorksheet = $objPHPExcel->getActiveSheet();
			$highestRow = $objWorksheet->getHighestRow(); // e.g. 10
			$highestColumn = $objWorksheet->getHighestColumn(); // e.g 'F'
			$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn); // e.g. 5
			
			for ($row = 9; $row <= $highestRow; ++$row) {
				$permukaan = new Tampungan;
				$c=-1;
				$permukaan->ID_IDBalai=2;
				$permukaan->NoData= $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$permukaan->data_dasar= $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$permukaan->nama_sistem= $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();					
				$permukaan->nama_objek= $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();		
				$permukaan->tahun_data= $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$permukaan->kodefikasi= $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();					
				$permukaan->nama_das= $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();					
				$permukaan->nama_ws= $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$permukaan->provinsi= $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$permukaan->kota= $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$permukaan->kecamatan= $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$permukaan->desa= $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$permukaan->bujur_timur= $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$permukaan->lintang_selatan= $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$permukaan->elevasi= $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$permukaan->status= "Rencana";
				$permukaan->save();
				
				$mpermukaan = new ManfaatTampungan;
				$mpermukaan->ID=$permukaan->ID;
				$mpermukaan->ID_IDBalaiWa=2;
				$mpermukaan->NoDataWa=$permukaan->NoData;
				$mpermukaan->jiwa=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();			
				$mpermukaan->debit=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();	
				$mpermukaan->status_airbaku=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();					
				$mpermukaan->kecamatan1=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();		
				$mpermukaan->kecamatan2="no desa";
				$mpermukaan->desa1=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();		
				$mpermukaan->desa2="no desa";
				$mpermukaan->nama_sungai=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$mpermukaan->luas_dta=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$mpermukaan->kapasitas_tampung=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();				
				$mpermukaan->catchment_area="";
				$mpermukaan->catchment_area1="";
				$mpermukaan->save();


				$tpermukaan = new TeknisTampungan;

				
				$tpermukaan->ID=$permukaan->ID;
				$tpermukaan->ID_IDBalaiGa=2;
				$tpermukaan->NoDataGa=$permukaan->NoData;
				$tpermukaan->sistem=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tpermukaan->jenis_pompa=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tpermukaan->head_pompa=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tpermukaan->tahun_pengadaan=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();				
				$tpermukaan->listrik=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tpermukaan->genset=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tpermukaan->solar_cell=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tpermukaan->lain_lain=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tpermukaan->debit_andal=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tpermukaan->debit_awal=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tpermukaan->his_ID=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tanggal=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tpermukaan->debit_idle=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tpermukaan->save();

				$twpermukaan = new TeknisWaTampungan;

				$twpermukaan->ID=$permukaan->ID;
				$twpermukaan->ID_IDBalaiPat=2;
				$twpermukaan->NoDataPat=$permukaan->NoData;
				$twpermukaan->jenis_intake=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$twpermukaan->pj_airbaku=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$twpermukaan->reservoar=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$twpermukaan->hidran_umum=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();				
				$twpermukaan->status_aset=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue()+ $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue()+ $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$twpermukaan->luas_bangunan=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();	
				$twpermukaan->jumlah_bangunan=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();	
				$twpermukaan->jumlah_boxbagi="";
				$twpermukaan->jumlah_splingker="";
				$twpermukaan->mt1 = "";
				$twpermukaan->mt2 = "";
				$twpermukaan->mt3 = "";
				$twpermukaan->save();

				$tgpermukaan = new TeknisGaTampungan;

				$tgpermukaan->ID=$permukaan->ID;
				$tgpermukaan->ID_IDBalaiMa=2;
				$tgpermukaan->NoDataMa=$permukaan->NoData;
				$tgpermukaan->tahun_bangun=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tgpermukaan->rehab=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tgpermukaan->rencana_rehab=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tgpermukaan->nama_lembaga=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tgpermukaan->legalitas=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tgpermukaan->tahun_berdiri=$tgpermukaan->tahun_bangun;
				$tgpermukaan->perizinan=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tgpermukaan->no_kontrak=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tgpermukaan->status_kelola=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tgpermukaan->status_operasi=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tgpermukaan->keterangan=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tgpermukaan->save();

				$tdpermukaan = new KondisiTampungan;
				
				$tdpermukaan->ID=$permukaan->ID;
				$tdpermukaan->ID_IDBalaiNam=2;
				$tdpermukaan->NoDataNam=$permukaan->NoData;
				$tdpermukaan->kondisi_sungai=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tdpermukaan->ket_kondisi_sungai=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				
				$tdpermukaan->kondisi_bangunan=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tdpermukaan->ket_kondisi_bangunan=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();				

				$tdpermukaan->kondisi_reservoir=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tdpermukaan->ket_kondisi_reservoir=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				
				$tdpermukaan->kondisi_pompa=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tdpermukaan->ket_kondisi_pompa=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				
				$tdpermukaan->kondisi_penggerak=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();	
				$tdpermukaan->ket_kondisi_penggerak=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				
				$tdpermukaan->instansi_pembangun=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tdpermukaan->sumber_pendanaan=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();				
				$tdpermukaan->dokumen_pendukung=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tdpermukaan->save();

				
				$ipermukaan = new InfoTampungan;
				$ipermukaan->ID=$permukaan->ID;
				$ipermukaan->ID_IDBalaiJu=2;
				$ipermukaan->NoDataJu=$permukaan->NoData;
				$ipermukaan->foto1="";
				$ipermukaan->foto2="";
				$ipermukaan->foto3="";
				$ipermukaan->foto4="";
				$ipermukaan->foto5="";
				$ipermukaan->video="";
				$ipermukaan->save();

			}
		}else{
			echo json_encode($_FILES);
		}
	}

	public static function updateKondisi(){
		$datadatas = self::model()->findAll();
		$ii = 0;
		$countkondisi = new KondisiTampungan;
		$datas= array();
		$jumlah_nilai = 0;
		$valid_data = 0;
		foreach ($datadatas as $dkondisi){
			$nilai = 0; $ii++;
			if(Yii::app()->user->uid == $dkondisi->ID_IDBalai){
				
				if(($dkondisi->kondisi->kondisi_sungai != "")){
					$datasumur = $dkondisi->kondisi->kondisi_sungai;
					switch ($datasumur) { 
						case "Rusak Ringan":
							$nilai = $nilai + ((100/5) * 0.5); 
							break;
						case "Rusak Berat":
							$nilai = $nilai + 0; 
							break;
						default:
							$nilai = $nilai + (100/5); 
					}

					$datareservoar = $dkondisi->kondisi->kondisi_reservoir;
					switch ($datareservoar) { 
						case "Rusak Ringan":
							$nilai = $nilai + ((100/5) * 0.5); 
							break;
						case "Rusak Berat":
							$nilai = $nilai + 0; 
							break;
						default:
							$nilai = $nilai + (100/5); 
					}

					$datapompa = $dkondisi->kondisi->kondisi_pompa;
					switch ($datapompa) { 
						case "Rusak Ringan":
							$nilai = $nilai + ((100/5) * 0.5); 
							break;
						case "Rusak Berat":
							$nilai = $nilai + 0; 
							break;
						default:
							$nilai = $nilai + (100/5); 
					}
					
					$datarumah = $dkondisi->kondisi->kondisi_bangunan;
					switch ($datarumah) { 
						case "Rusak Ringan":
							$nilai = $nilai + ((100/5) * 0.5); 
							break;
						case "Rusak Berat":
							$nilai = $nilai + 0; 
							break;
						default:
							$nilai = $nilai + (100/5); 
					}

					$datapenggerak = $dkondisi->kondisi->kondisi_penggerak;
					switch ($datapenggerak) { 
						case "Rusak Ringan":
							$nilai = $nilai + ((100/5) * 0.5); 
							break;
						case "Rusak Berat":
							$nilai = $nilai + 0; 
							break;
						default:
							$nilai = $nilai + (100/5); 
					}
					
					

					$jumlah_nilai = $jumlah_nilai + $nilai;
					if($nilai > 90){
						KondisiTampungan::model()->updateByPk($ii, array('kinerja'=>'Baik'));	
					}
					else if($nilai > 60 and $nilai <= 90){				
						KondisiTampungan::model()->updateByPk($ii, array('kinerja'=>'Rusak Ringan'));	
					}else{
						KondisiTampungan::model()->updateByPk($ii, array('kinerja'=>'Rusak Berat'));		
					}			
				}
			}	
		}
		Yii::app()->user->setFlash('success', '<strong>Update Selasai!</strong> Anda dapat mengecek hasil perhitungan dikolom Kondisi.');	
	}

}
?>