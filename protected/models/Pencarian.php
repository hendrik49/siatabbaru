<?php

class Pencarian extends CActiveRecord
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
		return 't_sumur';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('provinsi, no_sumur, nama_das', 'required'),
			//array('Tanggal', 'numerical', 'integerOnly'=>true),
			array('nama_das', 'length', 'max'=>255),
			array('no_sumur', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('no_sumur, provinsi,', 'safe', 'on'=>'search'),
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
			'nama_das' => 'Nama DAS',
			'nama_ws' => 'Kode WS',
			'provinsi' => 'Provinsi',
			'kota' => 'Kota/ Kabupaten',
			'kecamatan' => 'Kecamatan',
			'desa' => 'Desa/ Kelurahan',
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

		$criteria->compare('nama_das',$this->nama_das);
		$criteria->compare('nama_ws',$this->nama_ws);		
		$criteria->compare('provinsi',$this->provinsi);
		$criteria->compare('kota',$this->kota);
		$criteria->compare('kecamatan',$this->kecamatan);
		$criteria->compare('desa',$this->desa);

		
		//if (Yii::app()->user->hakAkses == User::USER_ADMIN) {
		//	$criteria->compare('Administrator', Yii::app()->user->name);
		//}
		
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
		
	
}