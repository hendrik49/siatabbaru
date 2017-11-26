<?php

class Graph extends CActiveRecord
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
		return 't_kesling';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Judul, Desa, Puskes, Tanggal, Pammrt, Kon1, Kon3, RT, RW, Stat, JenSan1, JenSan2, JenSan3, JenSan4, JenSan5, Ctps, TmpSmph, TmpSmph2, Adsplrt', 'required'),
			array('Tanggal', 'numerical', 'integerOnly'=>true),
			array('Judul', 'length', 'max'=>255),
			array('RT, RW, Kon2, Kon3, Kon4', 'length', 'max'=>2),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, Judul, Desa, Puskes, Tanggal, Kon1, Kon3, JenSan1, JenSan2, JenSan3, JenSan4, JenSan5, Ctps, Adsplrt', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'Judul' => 'Nama Kepala Keluarga',
			//'Ket' => 'Ledeng/ Perpipaan',
			'Desa' => 'Desa/ Kelurahan',
			'Tanggal' => 'Tanggal',
			//'Data' => 'Air Kemasan',
			'RW' => 'Rukun Warga',
			'RT' => 'Rukun Tetangga',
			//'Ma' => 'Mata Air',
			'Stat' => 'Status Kepemilikan',
			'Kon1' => 'Jenis Sarana',
			//'Kon2' => 'Jumlah KK dalam Satu Rumah',
			'Kon3' => 'Jumlah Jiwa Laki-Laki',
			'Kon4' => 'Jumlah Jiwa Perempuan',
			'JenSan1' => 'Bagian Atas',
			'JenSan2' => 'Bagian Bawah',
			'JenSan3' => 'Status Kepemilikan',
			'JenSan4' => 'Kualitas Sarana',
			'JenSan5' => 'BABS',
			'Ctps' => 'Sarana Cuci Tangan Pakai Sabun',
			'Pammrt' => 'Pengelolaan Air Minum dan Makanan Rumah Tangga', 
			'TmpSmph' => 'Tempat Sampah', 
			'TmpSmph2' => 'Pembuangan Akhir',
			'Adsplrt' => 'Akses dan Sarana Pembuangan Limbah Rumah Tangga',
			'Puskes' => 'Puskesmas',
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
		$criteria->compare('Judul',$this->Judul,true);
		//$criteria->compare('Ket',$this->Ket,true);
		$criteria->compare('Desa',$this->Desa,true);
		$criteria->compare('Tanggal',$this->Tanggal);
		//$criteria->compare('Data',$this->Data);
		$criteria->compare('Kon1',$this->Kon1);
		//$criteria->compare('Kon2',$this->Kon2);
		$criteria->compare('Kon3',$this->Kon3);
		$criteria->compare('RT',$this->RT);
		$criteria->compare('RW',$this->RW);
		//$criteria->compare('Ma',$this->Ma);
		$criteria->compare('Stat',$this->Stat);
		$criteria->compare('Kon4',$this->Kon4);
		$criteria->compare('JenSan1',$this->JenSan1);
		$criteria->compare('JenSan2',$this->JenSan2);
		$criteria->compare('JenSan3',$this->JenSan3);
		$criteria->compare('JenSan4',$this->JenSan4);
		$criteria->compare('JenSan5',$this->JenSan5);
		$criteria->compare('Ctps',$this->Ctps);
		$criteria->compare('Pammrt',$this->Pammrt);
		$criteria->compare('TmpSmph',$this->TmpSmph);
		$criteria->compare('TmpSmph2',$this->TmpSmph2);
		$criteria->compare('Adsplrt',$this->Adsplrt);
		$criteria->compare('Puskes',$this->Puskes,true);
		
		
		if (Yii::app()->user->hakAkses == User::USER_ADMIN) {
			$criteria->compare('Administrator', Yii::app()->user->name);
		}
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
		
	
}