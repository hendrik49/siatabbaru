<?php

class Statistik extends CActiveRecord
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
			array('Judul, Desa, Tanggal, Kon1,  Kon3, JenSan1, JenSan2, JenSan3, TmpSmph', 'required'),
			array('Tanggal', 'numerical', 'integerOnly'=>true),
			array('Judul', 'length', 'max'=>255),
			array('Kon3, Kon4', 'length', 'max'=>2),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, Judul, Desa, Tanggal, Kon1, Kon3, JenSan1, JenSan2, JenSan3', 'safe', 'on'=>'search'),
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
			'Judul' => 'Nama Kartu Keluarga',
			//'Ket' => 'Keterangan',
			'Desa' => 'Desa/ Kelurahan',
			'Tanggal' => 'Tanggal',
			//'Data' => 'Fisik Rumah',
			'Kon1' => 'Bangunan',
			//'Kon2' => 'Jumlah KK dalam Satu Rumah',
			'Kon3' => 'Jumlah Jiwa Laki-Laki',
			'Kon4' => 'Jumlah Jiwa Perempuan',
			'JenSan1' => 'Air Bersih',
			'JenSan2' => 'Jaga',
			'JenSan3' => 'SPAL',
			//'Hal' => 'Halaman', 
			'TmpSmph' => 'Tempat Sampah', 
			//'KdgTrnk' => 'Kandang Ternak',
			
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
		//$criteria->compare('Data',$this->Data,true);
		$criteria->compare('Kon1',$this->Kon1);
		//$criteria->compare('Kon2',$this->Kon2);
		$criteria->compare('Kon3',$this->Kon3);
		$criteria->compare('Kon4',$this->Kon4);
		$criteria->compare('JenSan1',$this->JenSan1);
		$criteria->compare('JenSan2',$this->JenSan2);
		$criteria->compare('JenSan3',$this->JenSan3);
		//$criteria->compare('Hal',$this->Hal);
		$criteria->compare('TmpSmph',$this->TmpSmph);
		//$criteria->compare('KdgTrnk',$this->KdgTrnk);
		
		if (Yii::app()->user->hakAkses == User::USER_ADMIN) {
			$criteria->compare('Administrator', Yii::app()->user->name);
		}
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
		
	
}