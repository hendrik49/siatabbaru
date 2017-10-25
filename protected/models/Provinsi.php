<?php

/**
 * This is the model class for table "t_user".
 *
 * The followings are the available columns in table 't_user':
 * @property string $ID_User
 * @property string $Nama
 * @property string $Password
 * @property string $HakAkses
 */
class Provinsi extends CActiveRecord
{
	// definisikan tipe user / hak akses

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 't_provinsi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('Nama, Password, HakAkses', 'required'),
			//array('ID_User', 'length', 'max'=>25),
			//array('Nama, Password, HakAkses', 'length', 'max'=>255),
			//array('Nama', 'unique'),
			///array('Password', 'compare', 'compareAttribute'=>'Nama', 'operator'=>'!='),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			//array('ID_User, Nama, Password, HakAkses', 'safe', 'on'=>'search'),
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
			'No' => 'ID',
			'Kode_provinsi' => 'Kode Provinsi',
			'Nama_provinsi' => 'Nama Provinsi',

			
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

		$criteria->compare('No',$this->No,true);
		$criteria->compare('Kode_provinsi',$this->Kode_provinsi,true);
		$criteria->compare('Nama_provinsi',$this->Nama_provinsi,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	/**
	 * Mendapatkan semua kode kota
	 */
	public static function lookupKode()
	{
		$kotas = self::model()->findAll();

		$_items = array();
		foreach ($kotas as $kota) 
		{
			$_items[$kota->Kode_provinsi] = $kota->Kode_provinsi.' (' . $kota->Nama_provinsi . ')';
		}

		return $_items;
	}	
	
	public static function lookupProvinsi()
	{
		$kotas = self::model()->findAll();
		$_items = array();
		foreach ($kotas as $kota) 
		{
			$_items[$kota->Nama_provinsi] = $kota->Nama_provinsi.' (' . $kota->Nama_provinsi . ')';
		}	
		return $_items;
		
	}	

}
