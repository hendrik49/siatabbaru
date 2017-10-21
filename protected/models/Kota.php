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
class Kota extends CActiveRecord
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
		return 't_kab_kota';
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
			'no' => 'ID Kota',
			'kode' => 'kode Kab/ Kota',
			'kab' => 'Nama Kab/ Kota',
			'provinsi' => 'Provinsi',
			
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

		$criteria->compare('no',$this->no,true);
		$criteria->compare('kode',$this->kode,true);
		$criteria->compare('kab',$this->kab,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	/**
	 * Mendapatkan semua kode kota
	 */
	public static function lookupKota()
	{
		$kotas = self::model()->findAll();

		$_items = array();
		foreach ($kotas as $kota) 
		{
			$_items[$kota->kab] = $kota->kab;
		}

		return $_items;
	}

	public static function lookupKode()
	{
		$kotas = self::model()->findAll();

		$_items = array();
		foreach ($kotas as $kota) 
		{
			$_items[$kota->no] = $kota->kode;
		}

		return $_items;
	}	
	
	public static function lookupProvinsi()
	{
		$kotas = self::model()->findAll();
		$_items = array();
		foreach ($kotas as $kota) 
		{
			$data = Unitkerja::getProvByAdmin();
			if($kota->provinsi == $data){
				$_items[$kota->kab] = $kota->kab;
			}
		}	
		return $_items;
		
	}	
	public static function lookupKode1()
	{
		$kotas = self::model()->findAll();
		$_items = array();
		foreach ($kotas as $kota) 
		{
			$data = Unitkerja::getProvByAdmin();
			if($kota->provinsi == $data){
				$_items['kab'];
			}
		}	
		//return $_items;
		
	}

	public static function getKodeById()
	{
		if (isset(Yii::app()->user->uid)) {
			$id = Yii::app()->user->uid;
			$data = Unitkerja::getProvByAdmin();
			$command = Yii::app()->db->createCommand("SELECT * FROM t_kab_kota WHERE provinsi='$data'");
			
			$query = $command->query();
			
			$data = $query->read();
			
			return $data['kab'];	
			} else {
				return '';
			}
	}
}
