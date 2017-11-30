<?php

class MataAir extends CActiveRecord
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
	public $broncaptering;
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
		return 't_mataair1';
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
			/* ------------Data Numerical Control------------*/
			array('ID_IDBalai, NoData, kodefikasi', 'length', 'max'=>100),
			/* ------------Data Dasar & Administrasi------------*/
			array('nama_das,nama_sistem, nama_ws, nama_cat, kriteria, NamaBalai, data_dasar, nama_objek, tahun_data', 'length', 'max'=>300),
			array('provinsi, kota, kecamatan, desa, status', 'length', 'max'=>300),
			array('bujur_timur, lintang_selatan', 'length', 'max'=>100),
			array('elevasi', 'length', 'max'=>100),
			/* ------------Search Semua Data Tabel------------*/
			array('nama_das, nama_sistem, nama_ws, nama_cat, provinsi, kota, kecamatan, desa,
				tahun_bangun, debit_liter, manfaat_jiwa, broncaptering', 'safe', 'on'=>'search'),
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
			'madasar'=>array(self::BELONGS_TO, 'MataAir', 'ID'),
			'manfaat'=>array(self::BELONGS_TO, 'ManfaatMA', 'ID'),
			'teknissat'=>array(self::BELONGS_TO, 'TeknisMA', 'ID'),
			'teknisdua'=>array(self::BELONGS_TO, 'TeknisWaMA', 'ID'),
			'teknisga'=>array(self::BELONGS_TO, 'TeknisGaMA', 'ID'),
			'kondisi'=>array(self::BELONGS_TO, 'KondisiMA', 'ID'),
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
			'nama_cat' => 'Nama CAT',
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
			//'info'=>array('select'=>'foto1'),
			'manfaat'=>array('select'=>'jiwa, debit, tadah_saatini, suplesi_saatini'),
			//'teknissat'=>array('select'=>'nama_objek'),
			//'teknisdua'=>array('select'=>'status_aset'),
			'teknisga'=>array('select'=>'tahun_bangun, nama_lembaga'),
			'kondisi'=>array('select'=>'broncaptering'),
			//'kotas'=>array('select'=>'id_prov, provinsi'),
		);

		$criteria->compare('manfaat.jiwa',$this->manfaat_jiwa, true);
		$criteria->compare('manfaat.debit',$this->debit_liter, true);
		//$criteria->compare('manfaat.nama_sungai',$this->nama_sungai, true);
		$criteria->compare('kondisi.broncaptering',$this->broncaptering, true);
		//$criteria->compare('teknisdua.status_aset',$this->status_aset, true);
		$criteria->compare('teknisga.tahun_bangun',$this->tahun_bangun, true);

		$criteria->compare('nama_das',$this->nama_das, true);
		$criteria->compare('nama_objek',$this->nama_objek, true);
		$criteria->compare('nama_ws',$this->nama_ws, true);	
		$criteria->compare('nama_sistem',$this->nama_sistem, true);		
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
						//'nama_sungai'=>array('asc'=>'manfaat.nama_sungai', 'desc'=>'manfaat.nama_sungai'),
						'broncaptering'=>array('asc'=>'kondisi.broncaptering', 'desc'=>'kondisi.broncaptering'),
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
						//'nama_sungai'=>array('asc'=>'manfaat.nama_sungai', 'desc'=>'manfaat.nama_sungai'),
						'broncaptering'=>array('asc'=>'kondisi.broncaptering', 'desc'=>'kondisi.broncaptering'),
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
			$command = Yii::app()->db->createCommand("SELECT * FROM t_mataair1 WHERE ID_IDBalai='$id'");
			
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
			$command=$connection->createCommand("SELECT SUM($column) FROM t_mataair2 where id in ($ids)");
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
				->mergeCells('A1:K1')
				->setCellValue('A1', 'Data Dasar')
				->setCellValue('A2', 'No')
				->setCellValue('B2', 'Nama Objek')
				->setCellValue('C2', 'Nama Sistem,')
				->setCellValue('D2', 'Wilayah Sungai')
				->setCellValue('E2', 'Provinsi')
				->setCellValue('F2', 'Kota/ Kabupaten')
				->setCellValue('G2', 'Kecamatan')
				->setCellValue('H2', 'Desa')
				->setCellValue('I2', 'Manfaat Jiwa')
				->setCellValue('J2', 'Debit / Liter')
				->setCellValue('K2', 'tahun bangun');
			
			foreach ($datadatas as $urut){	
				$ii++;
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$ii, $urut->NoData)
				->setCellValue('B'.$ii, $urut->nama_objek)
				->setCellValue('C'.$ii, $urut->nama_sistem)
				->setCellValue('D'.$ii, $urut->nama_ws)
				->setCellValue('E'.$ii, $urut->provinsi)
				->setCellValue('F'.$ii, $urut->kota)
				->setCellValue('G'.$ii, $urut->kecamatan)
				->setCellValue('H'.$ii, $urut->desa)
				->setCellValue('I'.$ii, $urut->manfaat->jiwa)
				->setCellValue('J'.$ii, $urut->manfaat->debit)
				->setCellValue('K'.$ii, $urut->teknisga->tahun_bangun);
			}
		}else if(Yii::app()->user->isGuest){
			$datadatas = self::model()->findAll();
			$ii = 2;
			$objPHPExcel=Yii::createComponent('application.extensions.PHPExcel');
			$objPHPExcel->setActiveSheetIndex(0)
				->mergeCells('A1:K1')
				->setCellValue('A1', 'Data Dasar')
				->setCellValue('A2', 'No')
				->setCellValue('B2', 'Nama Objek')
				->setCellValue('C2', 'Nama Sistem,')
				->setCellValue('D2', 'Wilayah Sungai')
				->setCellValue('E2', 'Provinsi')
				->setCellValue('F2', 'Kota/ Kabupaten')
				->setCellValue('G2', 'Kecamatan')
				->setCellValue('H2', 'Desa')
				->setCellValue('I2', 'Manfaat Jiwa')
				->setCellValue('J2', 'Debit / Liter')
				->setCellValue('K2', 'tahun bangun');
			
			foreach ($datadatas as $urut){	
				$ii++;
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$ii, $urut->NoData)
				->setCellValue('B'.$ii, $urut->nama_objek)
				->setCellValue('C'.$ii, $urut->nama_sistem)
				->setCellValue('D'.$ii, $urut->nama_ws)
				->setCellValue('E'.$ii, $urut->provinsi)
				->setCellValue('F'.$ii, $urut->kota)
				->setCellValue('G'.$ii, $urut->kecamatan)
				->setCellValue('H'.$ii, $urut->desa)
				->setCellValue('I'.$ii, $urut->manfaat->jiwa)
				->setCellValue('J'.$ii, $urut->manfaat->debit)
				->setCellValue('K'.$ii, $urut->teknisga->tahun_bangun);
			}
		}

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset(Yii::app()->user->hakAkses) AND Yii::app()->user->hakAkses == User::USER_ADMIN){
			header('Content-Disposition: attachment;filename="Air Baku (Mata Air) - '.UnitKerja::getNamaUnitKerjaByAdmin().'.xlsx"');
		}else if(isset(Yii::app()->user->hakAkses) AND Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN){
			header('Content-Disposition: attachment;filename="Air Baku (Mata Air) se-Indonesia.xlsx"');
		}else if(Yii::app()->user->isGuest){
			header('Content-Disposition: attachment;filename="Air Baku (Mata Air).xlsx"');
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
				$permukaan = new MataAir;
				$c=-1;
				$permukaan->ID_IDBalai=2;
				$permukaan->NoData= $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$permukaan->data_dasar= $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$permukaan->nama_sistem= $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();					
				$permukaan->nama_objek= $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();		
				$permukaan->tahun_data= $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$permukaan->kodefikasi= $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();					
				$permukaan->nama_cat= $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();					
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
				$permukaan->kriteria="";
				$permukaan->save();
				
				$mpermukaan = new ManfaatMA;
				$mpermukaan->ID=$permukaan->ID;
				$mpermukaan->ID_IDBalaiWa=2;
				$mpermukaan->NoDataWa=$permukaan->NoData;
				$mpermukaan->jiwa=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();			
				$mpermukaan->debit=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();					
				$mpermukaan->kecamatan1=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();		
				$mpermukaan->desa1=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();		
				$mpermukaan->tadah_awal=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();		
				$mpermukaan->tadah_saatini=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();		
				$mpermukaan->suplesi_awal=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$mpermukaan->suplesi_saatini=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$mpermukaan->kecamatan2=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$mpermukaan->desa2=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();				
				$mpermukaan->catchment_area="";
				$mpermukaan->catchment_area1="";
				$mpermukaan->save();

				$tpermukaan = new TeknisMA;
				
				$tpermukaan->ID=$permukaan->ID;
				$tpermukaan->ID_IDBalaiGa=2;
				$tpermukaan->NoDataGa=$permukaan->NoData;
				$tpermukaan->nama_matair=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
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
				
				$twpermukaan = new TeknisWaMA;

				$twpermukaan->ID=$permukaan->ID;
				$twpermukaan->ID_IDBalaiPat=2;
				$twpermukaan->NoDataPat=$permukaan->NoData;
				$twpermukaan->status_aset=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue()+ $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue()+ $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();				
				$twpermukaan->luas_bangunan=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();	
				$twpermukaan->jumlah_bangunan=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();					
				$twpermukaan->pj_airbaku=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();								
				$twpermukaan->reservoar=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$twpermukaan->hidran_umum=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();	
				$twpermukaan->pj_irigasi=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();				
				$twpermukaan->sistem_jaringan=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();		
				$twpermukaan->jumlah_boxbagi=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();						
				$twpermukaan->jumlah_splingker=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();	
				$twpermukaan->mt1 =$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$twpermukaan->mt2 = $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$twpermukaan->mt3 = $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$twpermukaan->save();

				$tgpermukaan = new TeknisGaMA;

				$tgpermukaan->ID=$permukaan->ID;
				$tgpermukaan->ID_IDBalaiMa=2;
				$tgpermukaan->NoDataMa=$permukaan->NoData;
				$tgpermukaan->tahun_bangun=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tgpermukaan->rehab=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tgpermukaan->rencana_rehab=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tgpermukaan->nama_lembaga=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tgpermukaan->legalitas=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tgpermukaan->tahun_berdiri=$tgpermukaan->tahun_bangun;
				$tgpermukaan->keaktifan=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tgpermukaan->no_kontrak=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tgpermukaan->status_kelola=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tgpermukaan->status_operasi=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tgpermukaan->keterangan=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tgpermukaan->save();

				$tdpermukaan = new KondisiMA;
				
				$tdpermukaan->ID=$permukaan->ID;
				$tdpermukaan->ID_IDBalaiNam=2;
				$tdpermukaan->NoDataNam=$permukaan->NoData;

				$tdpermukaan->broncaptering=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tdpermukaan->ket_broncaptering=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();

				$tdpermukaan->reservoar=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tdpermukaan->ket_reservoar=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				
				$tdpermukaan->pompa=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tdpermukaan->ket_pompa=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();				

				$tdpermukaan->rumah_pompa=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tdpermukaan->ket_rumah_pompa=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				
				$tdpermukaan->hidran_umum=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tdpermukaan->ket_hidran_umum=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				
				$tdpermukaan->saluran_airbaku=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();	
				$tdpermukaan->ket_saluran_airbaku=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();

				$tdpermukaan->saluran_irigasi=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();	
				$tdpermukaan->ket_saluran_irigasi=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();

				$tdpermukaan->box_pembagi=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();	
				$tdpermukaan->ket_box_pembagi=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();

				$tdpermukaan->springkler=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();	
				$tdpermukaan->ket_springkler=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();

				$tdpermukaan->penggerak=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();	
				$tdpermukaan->ket_penggerak=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();


				$tdpermukaan->save();
				
				$ipermukaan = new InfoMA;
				$ipermukaan->ID=$permukaan->ID;
				$ipermukaan->ID_IDBalaiJu=2;
				$ipermukaan->NoDataJu=$permukaan->NoData;

				$ipermukaan->baku_mutuair=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$ipermukaan->konduktivitas=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$ipermukaan->nilai_storativitas=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$ipermukaan->nilai_tranmisivitas=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();

				$ipermukaan->instansi_pembangun=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$ipermukaan->sumber_pendanaan=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();				
				$ipermukaan->dokumen_pendukung=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();

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
		$countkondisi = new KondisiMA;
		$datas= array();
		$jumlah_nilai = 0;
		$valid_data = 0;
		foreach ($datadatas as $dkondisi){
			$nilai = 0; $ii++;
			if(Yii::app()->user->uid == $dkondisi->ID_IDBalai){
				
				if(($dkondisi->kondisi->broncaptering != "")){
					$datasumur = $dkondisi->kondisi->broncaptering;
					switch ($datasumur) { 
						case "Rusak Ringan":
							$nilai = $nilai + ((38.65/5) * 0.5); 
							break;
						case "Rusak Berat":
							$nilai = $nilai + 0; 
							break;
						default:
							$nilai = $nilai + (38.65/5); 
					}

					$datareservoar = $dkondisi->kondisi->reservoar;
					switch ($datareservoar) { 
						case "Rusak Ringan":
							$nilai = $nilai + ((38.65/5) * 0.5); 
							break;
						case "Rusak Berat":
							$nilai = $nilai + 0; 
							break;
						default:
							$nilai = $nilai + (38.65/5); 
					}

					$datapompa = $dkondisi->kondisi->pompa;
					switch ($datapompa) { 
						case "Rusak Ringan":
							$nilai = $nilai + ((38.65/5) * 0.5); 
							break;
						case "Rusak Berat":
							$nilai = $nilai + 0; 
							break;
						default:
							$nilai = $nilai + (38.65/5); 
					}
					
					$datarumah = $dkondisi->kondisi->rumah_pompa;
					switch ($datarumah) { 
						case "Rusak Ringan":
							$nilai = $nilai + ((38.65/5) * 0.5); 
							break;
						case "Rusak Berat":
							$nilai = $nilai + 0; 
							break;
						default:
							$nilai = $nilai + (38.65/5); 
					}

					$datapenggerak = $dkondisi->kondisi->penggerak;
					switch ($datapenggerak) { 
						case "Rusak Ringan":
							$nilai = $nilai + ((38.65/5) * 0.5); 
							break;
						case "Rusak Berat":
							$nilai = $nilai + 0; 
							break;
						default:
							$nilai = $nilai + (38.65/5); 
					}
					
					$databox_pembagi = $dkondisi->kondisi->box_pembagi;
					switch ($databox_pembagi) { 
						case "Rusak Ringan":
							$nilai = $nilai + ((29.7/2) * 0.5); 
							break;
						case "Rusak Berat":
							$nilai = $nilai + 0; 
							break;
						default:
							$nilai = $nilai + (29.7/2); 
					}
					$datahidran_umum = $dkondisi->kondisi->hidran_umum;
					switch ($datahidran_umum) { 
						case "Rusak Ringan":
							$nilai = $nilai + ((29.7/2) * 0.5); 
							break;
						case "Rusak Berat":
							$nilai = $nilai + 0; 
							break;
						default:
							$nilai = $nilai + (29.7/2); 
					}
					$datasaluran_airbaku = $dkondisi->kondisi->saluran_airbaku;
					switch ($datasaluran_airbaku) { 
						case "Rusak Ringan":
							$nilai = $nilai + ((31.65/3) * 0.5); 
							break;
						case "Rusak Berat":
							$nilai = $nilai + 0; 
							break;
						default:
							$nilai = $nilai + (31.65/3); 
					}
					$datasaluran_irigasi = $dkondisi->kondisi->saluran_irigasi;
					switch ($datasaluran_irigasi) { 
						case "Rusak Ringan":
							$nilai = $nilai + ((31.65/3) * 0.5); 
							break;
						case "Rusak Berat":
							$nilai = $nilai + 0; 
							break;
						default:
							$nilai = $nilai + (31.65/3); 
					}
					$dataspringkler = $dkondisi->kondisi->springkler;
					switch ($dataspringkler) { 
						case "Rusak Ringan":
							$nilai = $nilai + ((31.65/3) * 0.5); 
							break;
						case "Rusak Berat":
							$nilai = $nilai + 0; 
							break;
						default:
							$nilai = $nilai + (31.65/3); 
					}

					$jumlah_nilai = $jumlah_nilai + $nilai;
					if($nilai > 90){
						KondisiMA::model()->updateByPk($ii, array('kinerja'=>'Baik'));	
					}else if($nilai > 60 and $nilai <= 90){				
						KondisiMA::model()->updateByPk($ii, array('kinerja'=>'Rusak Ringan'));	
					}else{
						KondisiMA::model()->updateByPk($ii, array('kinerja'=>'Rusak Berat'));		
					}			
				}
			}	
		}
		Yii::app()->user->setFlash('success', '<strong>Update Selasai!</strong> Anda dapat mengecek hasil perhitungan dikolom Kondisi.');	
	}

}
?>