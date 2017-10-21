<?php

class Neraca extends CActiveRecord
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
		return 't_neraca_air';
	}
	
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Tanggal', 'required'),
			array('Tanggal', 'numerical', 'integerOnly'=>true),
			array('Nrw, PopulasiKabKota, TargetJiwa, TotalABKabKota, JiwaTerlayani, JiwaBelumTerlayani, 
			KebutuhanAirBaku, JTOL, RencanaLayanan', 'length', 'max'=>13),
			array('Provinsi, NamaBalai, KabKota, kota', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Nrw, PopulasiKabKota, TargetJiwa, TotalABKabKota, JiwaTerlayani, JiwaBelumTerlayani, 
			KebutuhanAirBaku, JTOL, Provinsi, NamaBalai, KabKota', 'safe', 'on'=>'search'),
		);
	}


	public $file_excel;

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			//'admin'=>array(self::BELONGS_TO, 'User', 'ID_Admin'),
			'sumurdasar'=>array(self::BELONGS_TO, 'Sumur', 'NamaBalai'),
			'sumurmanfaat'=>array(self::BELONGS_TO, 'ManfaatSumur', 'NamaBalai'),
			'sumurteknis'=>array(self::BELONGS_TO, 'TeknisSumur', 'NamaBalai'),
			'sumurtekniss'=>array(self::BELONGS_TO, 'TeknisWaSumur', 'NamaBalai'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'Nrw' => 'Non Revenue Water',
			'PopulasiKabKota' => 'Jumlah Penduduk',
			'TargetJiwa' => 'Target Jiwa dilayani',
			'TotalABKabKota' => 'Kesediaan Air Baku',
			'JiwaTerlayani' => 'Penduduk Terlayani',
			'JiwaBelumTerlayani' => 'Penduduk Belum terlayani',
			'KebutuhanAirBaku' => 'Kebutuhan Air Baku',
			'JTOL' => 'Jiwa Tidak Perlu Layanan',
			'Provinsi' => 'Provinsi',
			'NamaBalai' => 'Nama Balai',
			'KabKota' => 'Kabupaten/Kota',
			'RencanaLayanan' => 'Rencana Layanan Air Baku',
			'kota' => 'Kabupaten/Kota',
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

		$criteria->compare('ID',$this->ID);
		$criteria->compare('Nrw',$this->Nrw);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
}
?>