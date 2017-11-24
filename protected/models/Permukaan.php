<?php

class Permukaan extends CActiveRecord
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
		return 't_permukaan1';
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
			array('nama_das,nama_sistem, nama_ws, NamaBalai, kriteria, data_dasar, nama_objek, tahun_data', 'length', 'max'=>100),
			array('provinsi, kota, kecamatan, desa, status', 'length', 'max'=>100),
			array('bujur_timur, lintang_selatan', 'length', 'max'=>20),
			array('elevasi', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('provinsi, kota, kecamatan, desa, nama_das, manfaat_jiwa, debit_liter, nama_prov, 
				n_prov, kondisi_sungai, nama_sungai, nama_lembaga, nama_objek, tahun_bangun, status_aset', 
			'safe', 'on'=>'search'),
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
			'madasar'=>array(self::BELONGS_TO, 'Permukaan', 'ID'),
			'manfaat'=>array(self::BELONGS_TO, 'ManfaatPermukaan', 'ID'),
			'teknissat'=>array(self::BELONGS_TO, 'TeknisPermukaan', 'ID'),
			'teknisdua'=>array(self::BELONGS_TO, 'TeknisWaPermukaan', 'ID'),
			'teknisga'=>array(self::BELONGS_TO, 'TeknisGaPermukaan', 'ID'),
			'kondisi'=>array(self::BELONGS_TO, 'KondisiPermukaan', 'ID'),
			'info'=>array(self::BELONGS_TO, 'InfoPermukaan', 'ID'),
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
			'elevasi' => 'Elevasi Sumur (mdpl)',
			'bujur_timur' => 'Bujur Timur',
			'lintang_selatan' => 'Lintang Selatan',
			'tahun_data' => 'Tahun Data',
			'status'=>'Status Pekerjaan',
			'manfaat_jiwa'=>'Manfaat Jiwa',
			'nama_prov'=>'Nama Kabupaten',
			'n_prov' =>'id prov',
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
			//'teknisdua'=>array('select'=>'status_aset'),
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
		$criteria->compare('kotas.id_prov',$this->nama_prov, true);
		$criteria->compare('kotas.provinsi',$this->n_prov, true);


		$criteria->compare('nama_sistem',$this->nama_sistem, true);
		$criteria->compare('nama_ws',$this->nama_ws, true);		
		$criteria->compare('nama_objek',$this->nama_objek, true);	
		$criteria->compare('provinsi',$this->provinsi, true);
		$criteria->compare('kota',$this->kota, true);
		$criteria->compare('kecamatan',$this->kecamatan, true);
		$criteria->compare('desa',$this->desa, true);
		$criteria->compare('kodefikasi',$this->kodefikasi, true);

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
			$command = Yii::app()->db->createCommand("SELECT * FROM t_permukaan1 WHERE ID_IDBalai='$id'");
			
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
		$command=$connection->createCommand("SELECT SUM($column) FROM t_permukaan2 where id in ($ids)");
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
				->setCellValue('E2', 'Nama Sungai')
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
				->setCellValue('E2', 'Nama Sungai')
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
			header('Content-Disposition: attachment;filename="Air Baku (Sungai) - '.UnitKerja::getNamaUnitKerjaByAdmin().'.xlsx"');
		}else if(isset(Yii::app()->user->hakAkses) AND Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN){
			header('Content-Disposition: attachment;filename="Air Baku (Sungai) se-Indonesia.xlsx"');
		}else if(Yii::app()->user->isGuest){
			header('Content-Disposition: attachment;filename="Air Baku (Sungai).xlsx"');
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
}
?>