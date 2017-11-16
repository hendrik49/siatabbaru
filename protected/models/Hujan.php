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
			array('nama_das,nama_sistem, nama_ws, nama_cat, data_dasar, nama_objek, tahun_data, provinsi, kota, kecamatan, desa', 'safe', 'on'=>'search'),
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
			'madasar'=>array(self::BELONGS_TO, 'Hujan', 'ID_IDBalai'),
			'manfaat'=>array(self::BELONGS_TO, 'ManfaatHujan', 'ID_IDBalai'),
			'teknissat'=>array(self::BELONGS_TO, 'TeknisHujan', 'ID_IDBalai'),
			'teknisdua'=>array(self::BELONGS_TO, 'TeknisWaHujan', 'ID_IDBalai'),
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
			'elevasi' => 'Elevasi Sumur (mdpl)',
			'bujur_timur' => 'Bujur Timur',
			'lintang_selatan' => 'Lintang Selatan',
			'tahun_data' => 'Tahun Data',
			'status'=>'Status Pekerjaan',
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

		$criteria=new CDbCriteria;
		$criteria->compare('nama_das',$this->nama_das, true);
		$criteria->compare('nama_sistem',$this->nama_sistem, true);
		$criteria->compare('nama_ws',$this->nama_ws,true);		
		$criteria->compare('provinsi',$this->provinsi,true);
		$criteria->compare('kota',$this->kota,true);
		$criteria->compare('kecamatan',$this->kecamatan);
		$criteria->compare('desa',$this->desa);
		//$criteria->compare('sumurw.kode_sumur',$this->sumurw.kode_sumur);
		//$criteria->compare('desa',$this->desa);
		/*if (Yii::app()->user->ID == ID_IDBalai) {
			$criteria->compare('ID_IDBalai', Yii::app()->user->ID);
		}*/
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
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
}
?>