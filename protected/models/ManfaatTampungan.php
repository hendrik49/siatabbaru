<?php

class ManfaatTampungan extends CActiveRecord
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
		return 't_tampungan2';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('ID_IDBalaiWa', 'required'),
			//array('Tanggal', 'numerical', 'integerOnly'=>true),
			array('ID_IDBalaiWa, NoDataWa, debit, jiwa', 'length', 'max'=>13),
			array('catchment_area, catchment_area1', 'file', 'types'=>array('dbf', 'shp', 'sbx', 'sbn', 'prj'), 'allowEmpty'=>true),
			
			array('jiwa, debit, status_airbaku, nama_sungai, tadah_awal, luas_dta, tadah_saatini, 
			suplesi_awal, suplesi_saatini, kecamatan1, kecamatan2, desa1, 
			desa2, kapasitas_tampung', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('', 'safe', 'on'=>'search'),
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
			'admin'=>array(self::BELONGS_TO, 'User', 'ID_IDBalaiWa'),
			'balai'=>array(self::BELONGS_TO, 'UnitKerja', 'ID_IDBalaiWa'),
			'tampungan'=>array(self::BELONGS_TO, 'Tampungan', 'ID_IDBalaiWa'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'ID_IDBalaiWa' => 'ID Balai',
			'NoDataWa'=>'Data Ke',
			'jiwa'=>'Manfaat (Jumlah Jiwa)',
			'debit'=>'Debit (Liter/Detik)',
			'tadah_awal'=>'Tadah Hujan Awal',
			'tadah_saatini'=>'Tadah Hujan Saat ini',
			'suplesi_awal'=>'Suplesi Hujan Awal',
			'suplesi_saatini'=>'Suplesi Hujan Saat ini',
			'kecamatan1'=>'Layanan Air Baku Kecamatan',
			'kecamatan2'=>'Layanan Irigasi Kecamatan',
			'desa1'=>'Layanan Air Baku Desa',
			'desa2'=>'Layanan Irigasi Desa',
			'status_airbaku' => 'Status Air Baku',
			'nama_sungai'=>'Nama Sumber Air',
			'luas_dta'=>'Luas DTA (km2)',
			'kapasitas_tampung' => 'Kapasitas Tampungan (m3)',
			'catchment_area'=>'File Peta Catchment Area (SHP)',
			'catchment_area1'=>'File Peta Catchment Area (DBF)',
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
		$criteria->compare('jiwa',$this->jiwa);
		$criteria->compare('debit',$this->debit);		
		$criteria->compare('tadah_awal',$this->tadah_awal);
		$criteria->compare('tadah_saatini',$this->tadah_saatini);
		$criteria->compare('suplesi_awal',$this->suplesi_awal);
		$criteria->compare('suplesi_saatini',$this->suplesi_saatini);
		
		if (Yii::app()->user->ID == ID_Balai) {
			$criteria->compare('ID_Balai', Yii::app()->user->ID);
		}
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
		public static function getAvailableDataSumurId()
	{
		$criteria = new CDbCriteria;
		$criteria->limit = 1;
		$criteria->order = 'ID_IDBalaiWa';

		$lastDataSumur =self::model()->find(
			$criteria
		);

		if (isset($lastDataSumur->ID_IDBalaiWa))
			return $lastDataSumur->ID_IDBalaiWa + 1;
		else
			return 1;
	}	
	public static function getAvailableNoData()
	{$criteria = new CDbCriteria;
		if (isset(Yii::app()->user->uid)) {
			
			$criteria->compare('ID_IDBalaiWa', Yii::app()->user->uid);
			$criteria->limit = 1;
			$criteria->order = 'NoDataWa DESC';

			$lastNoData =self::model()->find(
				$criteria
			);

			if (isset($lastNoData->NoDataWa))
				return $lastNoData->NoDataWa + 1;
			else
				return 1;
		}
	}
	public static function getNoDataByAdmin()
	{
		if (isset(Yii::app()->user->uid)) {
			$id = Yii::app()->user->uid;
			$command = Yii::app()->db->createCommand("SELECT * FROM t_tampungan2 WHERE ID_IDBalaiWa='$id'");
			
			$query = $command->query();
			
			$data = $query->read();
			
			return $data['NoDataWa'];	
			} else {
				return '';
			}
	}
}
?>