<?php

class Hujan extends CActiveRecord
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
	public $saringan;
	public $info_gambar;
	public $status_aset;
	public $tahun_bangun;
	public $nama_prov;
	public $n_prov;
	public $curah_hujan;
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_hujan1';
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
			array('ID_IDBalai, NoData, kodefikasi', 'length', 'max'=>16),
			/* ------------Data Dasar & Administrasi------------*/
			array('nama_das,nama_sistem, nama_ws, nama_cat, data_dasar, nama_objek, tahun_data', 'length', 'max'=>100),
			array('provinsi, kota, kecamatan, desa, NamaBalai, kriteria, status', 'length', 'max'=>100),
			array('bujur_timur, lintang_selatan', 'length', 'max'=>20),
			array('elevasi', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('nama_das,nama_sistem, nama_ws, nama_cat, data_dasar, curah_hujan, tahun_data, provinsi,
			 kota, kecamatan, desa, 
			 tahun_bangun, manfaat_jiwa, debit_liter, nama_lembaga, saringan', 'safe', 'on'=>'search'),
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
			'madasar'=>array(self::BELONGS_TO, 'Hujan', 'ID'),
			'manfaat'=>array(self::BELONGS_TO, 'ManfaatHujan', 'ID'),
			'teknissat'=>array(self::BELONGS_TO, 'TeknisHujan', 'ID'),
			'kondisi'=>array(self::BELONGS_TO, 'KondisiHujan', 'ID'),
			'teknisga'=>array(self::BELONGS_TO, 'TeknisGaHujan', 'ID'),
			'info'=>array(self::BELONGS_TO, 'InfoHujan', 'ID'),
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
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria=new CDbCriteria;
		$criteria->with= array(
			'admin'=>array('select'=>'Nama'),
			'info'=>array('select'=>'foto1'),
			'manfaat'=>array('select'=>'jiwa, debit'),
			'teknissat'=>array('select'=>'curah_hujan'),
			//'teknisdua'=>array('select'=>'status_aset'),
			'teknisga'=>array('select'=>'tahun_bangun, nama_lembaga'),
			'kondisi'=>array('select'=>'saringan'),
			//'kotas'=>array('select'=>'id_prov, provinsi'),
		);
		$criteria->compare('manfaat.jiwa',$this->manfaat_jiwa, true);
		$criteria->compare('manfaat.debit',$this->debit_liter, true);
		$criteria->compare('kondisi.saringan',$this->saringan, true);
		$criteria->compare('teknissat.curah_hujan',$this->curah_hujan, true);
		$criteria->compare('teknisga.tahun_bangun',$this->tahun_bangun, true);
		$criteria->compare('teknisga.nama_lembaga',$this->nama_lembaga, true);

		$criteria->compare('nama_das',$this->nama_das, true);
		$criteria->compare('nama_sistem',$this->nama_sistem, true);
		$criteria->compare('nama_ws',$this->nama_ws,true);		
		$criteria->compare('provinsi',$this->provinsi,true);
		$criteria->compare('kota',$this->kota,true);
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
						'saringan'=>array('asc'=>'kondisi.saringan', 'desc'=>'kondisi.saringan'),
						'curah_hujan'=>array('asc'=>'teknissat.curah_hujan', 'desc'=>'teknissat.curah_hujan'),
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
						'saringan'=>array('asc'=>'kondisi.saringan', 'desc'=>'kondisi.saringan'),
						'tahun_bangun'=>array('asc'=>'teknisga.tahun_bangun', 'desc'=>'teknisga.tahun_bangun'),
						'curah_hujan'=>array('asc'=>'teknissat.curah_hujan', 'desc'=>'teknissat.curah_hujan'),
						
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
	{$criteria = new CDbCriteria;
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
			$command = Yii::app()->db->createCommand("SELECT * FROM t_hujan1 WHERE ID_IDBalai='$id'");
			
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
		$command=$connection->createCommand("SELECT SUM($column) FROM t_hujan2 where id in ($ids)");
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
				//->setCellValue('E2', 'Nama Sungai')
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
				//->setCellValue('E'.$ii, $urut->manfaat->nama_sungai)
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
				//->setCellValue('E2', 'Nama Sungai')
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
				//->setCellValue('E'.$ii, $urut->manfaat->nama_sungai)
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
			header('Content-Disposition: attachment;filename="Air Baku (Hujan) - '.UnitKerja::getNamaUnitKerjaByAdmin().'.xlsx"');
		}else if(isset(Yii::app()->user->hakAkses) AND Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN){
			header('Content-Disposition: attachment;filename="Air Baku (Hujan) se-Indonesia.xlsx"');
		}else if(Yii::app()->user->isGuest){
			header('Content-Disposition: attachment;filename="Air Baku (Hujan).xlsx"');
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
				$hujan = new Hujan;
				$c=-1;
				$hujan->ID_IDBalai=2;
				$hujan->NoData= $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$hujan->data_dasar= $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$hujan->nama_sistem= $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();					
				$hujan->nama_objek= $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();		
				$hujan->tahun_data= $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$hujan->kodefikasi= $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();					
				$hujan->nama_das= $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();					
				$hujan->nama_ws= $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$hujan->provinsi= $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$hujan->kota= $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$hujan->kecamatan= $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$hujan->desa= $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$hujan->bujur_timur= $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$hujan->lintang_selatan= $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$hujan->elevasi= $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$hujan->status= "Rencana";
				$hujan->nama_cat="";
				$hujan->save();
				
				$mhujan = new ManfaatHujan;
				$mhujan->ID=$hujan->ID;
				$mhujan->ID_IDBalaiWa=2;
				$mhujan->NoDataWa=$hujan->NoData;
				$mhujan->jiwa=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();			
				$mhujan->debit=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();	
				$mhujan->kecamatan1=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();		
				$mhujan->desa1=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();		
				$mhujan->sistem=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$mhujan->jenis_pompa=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$mhujan->head_pompa=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$mhujan->tahun_pengadaan=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();				
				$mhujan->listrik=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$mhujan->genset=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$mhujan->solar_cell=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$mhujan->lain_lain=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$mhujan->catchment_area="";
				$mhujan->catchment_area1="";
				$mhujan->save();

				$thujan = new TeknisHujan;

				
				$thujan->ID=$hujan->ID;
				$thujan->ID_IDBalaiGa=2;
				$thujan->NoDataGa=$hujan->NoData;
				$thujan->curah_hujan=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$thujan->durasi_hujan=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$thujan->luas_atap=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$thujan->debit_andalan=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$thujan->debit_awal=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$thujan->debit_idle=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				++$c;++$c;
				$thujan->status_aset=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue()
									+$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue()
									+$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue()
									+$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$thujan->jumlah_bangunan=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$thujan->luas_bangunan=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$thujan->kapasitas_tampung=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$thujan->jenis_penampung=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$thujan->bahan=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$thujan->jenis_saringan=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$thujan->pj_airbaku=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$thujan->hidran_umum=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$thujan->save();

				$tghujan = new TeknisGaHujan;

				$tghujan->ID=$hujan->ID;
				$tghujan->ID_IDBalaiPat=2;
				$tghujan->NoDataPat=$hujan->NoData;		
				$tghujan->tahun_bangun=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tghujan->rehab=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tghujan->rencana_rehab=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tghujan->nama_lembaga=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tghujan->legalitas=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tghujan->tahun_berdiri=$tghujan->tahun_bangun;
				$tghujan->keaktifan=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tghujan->no_kontrak=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tghujan->status_kelola=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tghujan->status_operasi=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tghujan->keterangan=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tghujan->save();


				$tdhujan = new KondisiHujan;
				
				$tdhujan->ID=$hujan->ID;
				$tdhujan->ID_IDBalaiMa=2;
				$tdhujan->NoDataMa=$hujan->NoData;
				$tdhujan->saringan=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tdhujan->ket_saringan=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				
				$tdhujan->reservoar=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tdhujan->ket_reservoar=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				
				$tdhujan->pompa=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tdhujan->ket_pompa=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();

				$tdhujan->rumah_pompa=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tdhujan->ket_rumah_pompa=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				
				$tdhujan->hidran_umum=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tdhujan->ket_hidran_umum=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				
				$tdhujan->saluran_airbaku=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tdhujan->ket_saluran_airbaku=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				
				$tdhujan->saluran_irigasi=$tdhujan->saluran_airbaku;
				$tdhujan->ket_saluran_irigasi=$tdhujan->ket_saluran_airbaku;
				
				$tdhujan->box_pembagi="";
				$tdhujan->ket_box_pembagi="";
				
				$tdhujan->springkler="";
				$tdhujan->ket_springkler="";
				
				$tdhujan->penggerak=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();	
				$tdhujan->ket_penggerak=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				
				$tdhujan->save();

				
				$ihujan = new InfoHujan;
				$ihujan->ID=$hujan->ID;
				$ihujan->ID_IDBalaiNam=2;
				$ihujan->NoDataNam=$hujan->NoData;

				$ihujan->baku_mutuair=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();	
				$ihujan->konduktivitas=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();	
				$ihujan->nilai_storativitas=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();	
				$ihujan->nilai_tranmisivitas=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();	
				$ihujan->instansi_pembangun=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();	
				$ihujan->sumber_pendanaan=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();					
				$ihujan->dokumen_pendukung=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();	

				$ihujan->foto1="";
				$ihujan->foto2="";
				$ihujan->foto3="";
				$ihujan->foto4="";
				$ihujan->foto5="";
				$ihujan->video="";
				$ihujan->save();

			}
		}else{
			echo json_encode($_FILES);
		}
	}
	public static function updateKondisi(){
		$datadatas = self::model()->findAll();
		$ii = 0;
		$countkondisi = new KondisiHujan;
		$datas= array();
		$jumlah_nilai = 0;
		$valid_data = 0;
		foreach ($datadatas as $dkondisi){
			$nilai = 0; $ii++;
			if(Yii::app()->user->uid == $dkondisi->ID_IDBalai){
				
				if(($dkondisi->kondisi->saringan != "")){
					$datasumur = $dkondisi->kondisi->saringan;
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
					
					$datahidran_umum = $dkondisi->kondisi->hidran_umum;
					switch ($datahidran_umum) { 
						case "Rusak Ringan":
							$nilai = $nilai + ((29.7) * 0.5); 
							break;
						case "Rusak Berat":
							$nilai = $nilai + 0; 
							break;
						default:
							$nilai = $nilai + (29.7); 
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
					
					$jumlah_nilai = $jumlah_nilai + $nilai;
					if($nilai > 90){
						KondisiHujan::model()->updateByPk($ii, array('kinerja'=>'Baik'));	
					}else if($nilai > 60 and $nilai <= 90){				
						KondisiHujan::model()->updateByPk($ii, array('kinerja'=>'Rusak Ringan'));	
					}else{
						KondisiHujan::model()->updateByPk($ii, array('kinerja'=>'Rusak Berat'));		
					}			
				}
			}	
		}
		Yii::app()->user->setFlash('success', '<strong>Update Selasai!</strong> Anda dapat mengecek hasil perhitungan dikolom Kondisi.');	
	}

}
?>