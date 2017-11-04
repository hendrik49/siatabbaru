<?php

/**
 * This is the model class for table "t_unitkerja".
 *
 * The followings are the available columns in table 't_unitkerja':
 * @property string $ID
 * @property string $NamaUnitKerja
 * @property string $ID_Admin
 * @property string $website
 * @property string $Lokasi
 */
class UnitKerja extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UnitKerja the static model class
	 */
	public $admin_search;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * @return string the associated database table name
	 */

	public function tableName()
	{
		return 't_unitkerja';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			//array('NamaUnitKerja', 'unique'),
			array('NamaUnitKerja, ID_Admin, AlamatUnitKerja, KodeProv, CakupanWilayahKerja,Lat, Lang', 'required'),
			array('ID_Admin', 'length', 'max'=>25),
			array('NamaUnitKerja, AlamatUnitKerja, Provinsi, CakupanWilayahKerja', 'length', 'max'=>255),
			array('Lat,Lang', 'length', 'max'=>100),
			array('KodeProv', 'length', 'max'=>13),
			array('Gambar',
				  'file', 'types'=>array(
						'jpg','jpeg','png','gif','bmp', 'PNG',
				  ),
				  'allowEmpty'=>true,
			),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, NamaUnitKerja,admin_search, ID_Admin, Provinsi, AlamatUnitKerja, KodeProv, CakupanWilayahKerja', 'safe', 'on'=>'search'),
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
			'admin'=>array(self::BELONGS_TO, 'User', 'ID_Admin'),
			//'balai'=>array(self::BELONGS_TO, 'UnitKerja', 'ID_Admin'),
		);
	}
public $ID_Balai,$Kode_Sumur;
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'balai.ID_Balai' => 'ID Balai',
			'NamaUnitKerja' => 'Nama Balai',
			'ID_Admin' => 'Balai',
			'AlamatUnitKerja' => 'Alamat Balai',
			'KodeProv' => 'Kode',
			'Provinsi' => 'Nama Provinsi',
			'CakupanWilayahKerja' => 'Cakupan Wilayah Sungai',
			'Lat' => 'Lintang',
			'Lang' => 'Bujur',
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
		$criteria->with= array('admin'=>array('select'=>'Nama'),
        );
		$criteria->compare('admin.Nama',$this->admin_search, true);
		
		//$criteria->compare('ID',$this->ID, true);
		//$criteria->compare('KodeProv',$this->NamaUnitKerja, true);

		/*
		$criteria->compare('NamaUnitKerja',$this->NamaUnitKerja, true);
		$criteria->join ="INNER JOIN t_user u ON  u.ID_User=ID_Admin";
		$criteria->compare('u.Nama',$this->ID_Admin,true); 
		*/

		//$criteria->compare('NamaUnitKerja',$this->Provinsi);
		//$criteria->compare('Provinsi',$this->NamaUnitKerja, true);

		/*$criteria->compare('NamaUnitKerja',$this->NamaUnitKerja, true);
		$criteria->compare('KodeProv',$this->KodeProv, true);
		$criteria->compare('Provinsi',$this->Provinsi, true);
		$criteria->compare('ID_Admin',$this->ID_Admin, true);
		$criteria->compare('AlamatUnitKerja',$this->AlamatUnitKerja, true);
		$criteria->compare('CakupanWilayahKerja',$this->CakupanWilayahKerja, true);*/

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'attributes'=>array(
					'admin_search'=>array(
						'asc'=>'admin.Nama',
						'desc'=>'admin.Nama',
					),
					'*',
				),
			),
		));
	}

	public static function getUkArea($id)
	{
		$command = Yii::app()->db->createCommand("SELECT * FROM t_unitkerja WHERE ID='$id'");
		
		$query = $command->query();
		
		$data = $query->read();
		
		return $data['area'];
	}

	// mendapatkan ID_User yang tersedia
	public static function getAvailableUnitKerjaId()
	{
		$criteria = new CDbCriteria;
		$criteria->limit = 1;
		$criteria->order = 'ID DESC';

		$lastUnitKerja =self::model()->find(
			$criteria
		);

		if (isset($lastUnitKerja->ID))
			return $lastUnitKerja->ID + 1;
		else
			return 1;
	}
	public static function getKodeProvByAdmin()
	{
		if (isset(Yii::app()->user->uid)) {
			$id = Yii::app()->user->uid;
			$command = Yii::app()->db->createCommand("SELECT * FROM t_unitkerja WHERE ID_Admin='$id'");
			
			$query = $command->query();
			
			$data = $query->read();
			
			return $data['KodeProv'];	
			} else {
				return '';
			}
	}
	public static function getNamaWS()
	{
		if (isset(Yii::app()->user->uid)) {
			$id = Yii::app()->user->uid;
			$command = Yii::app()->db->createCommand("SELECT * FROM t_unitkerja WHERE ID_Admin='$id'");
			
			$query = $command->query();
			
			$data = $query->read();
			
			return $data['CakupanWilayahKerja'];	
			} else {
				return '';
			}
	}
	
	public static function getProvByAdmin()
	{
		if (isset(Yii::app()->user->uid)) {
			$id = Yii::app()->user->uid;
			$command = Yii::app()->db->createCommand("SELECT * FROM t_unitkerja WHERE ID_Admin='$id'");
			
			$query = $command->query();
			
			$data = $query->read();
			
			return $data['Provinsi'];	
			} else {
				return '';
			}
	}
	/**
	 * Mendapatkan semua administrator
	 */
	public static function lookupUnitKerja()
	{
		$unitKerja = self::model()->findAll();

		$_items = array();
		foreach ($unitKerja as $uKer) 
		{
			$_items[$uKer->ID] = $uKer->NamaUnitKerja;
		}

		return $_items;
	}

	public static function getUnitKerjaByAdmin()
	{
		if (isset(Yii::app()->user->uid)) {
			$id = Yii::app()->user->uid;
			$command = Yii::app()->db->createCommand("SELECT * FROM t_unitkerja WHERE ID_Admin='$id'");
			
			$query = $command->query();
			
			$data = $query->read();
			
			return $data['ID'];	
			} else {
				return '';
			}
	}

	public static function getNamaUnitKerjaByAdmin()
	{
		if (isset(Yii::app()->user->uid)) {
			$id = Yii::app()->user->uid;
			$command = Yii::app()->db->createCommand("SELECT * FROM t_unitkerja WHERE ID_Admin='$id'");
			
			$query = $command->query();
			
			$data = $query->read();
			
			return $data['NamaUnitKerja'];	
		} else {
			return '';
		}
	}

}
