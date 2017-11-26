<?php

class SistemBaku extends CActiveRecord
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
		return 't_sistem_airbaku';
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
			array('ID_Balai_Sistem, ID_Sistem', 'length', 'max'=>13),
			array('Nama_Sistem', 'length', 'max'=>100),
			
			//array('Jenis_Sumur, Elevasi, Luas, Tinggi_Air', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Nama_Sistem', 'safe', 'on'=>'search'),
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
			'admin'=>array(self::BELONGS_TO, 'User', 'ID_Balai_Sistem'),
			'balai'=>array(self::BELONGS_TO, 'UnitKerja', 'ID_Balai_Sistem'),
			'sistembaku'=>array(self::BELONGS_TO, 'SistemBaku', 'ID_Balai_Sistem'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'ID_Balai_Sistem' => 'ID Balai',
			'Nama_Sistem'=>'Nama Sistem Air Baku ',
			'ID_Sistem'=>'No Sistem',
			
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
		$criteria->compare('Nama_Sistem',$this->Nama_Sistem);
		/*if (Yii::app()->user->ID == ID_IDBalai) {
			$criteria->compare('ID_IDBalai', Yii::app()->user->ID);
		}*/
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public static function getAvailableSistemId()
	{
		$criteria = new CDbCriteria;
		if (isset(Yii::app()->user->uid)) {
			$criteria->compare('ID_Balai_Sistem', Yii::app()->user->uid);
			$criteria->limit = 1;
			$criteria->order = 'ID_Sistem DESC';

			$lastNoData =self::model()->find(
				$criteria
			);

			if (isset($lastNoData->ID_Sistem))
				return $lastNoData->ID_Sistem + 1;
			else
				return 1;
		}
	}

	public static function lookupNamaSistem()
	{
		$namas = self::model()->findAll();
		$reror = "Data Belum diSet";
		$_items = array();
		foreach ($namas as $nama) 
		{
			if(isset(Yii::app()->user->hakAkses) AND Yii::app()->user->hakAkses == User::USER_ADMIN){
				if(Yii::app()->user->uid == $nama->ID_Balai_Sistem){
					$_items[$nama->Nama_Sistem] = $nama->Nama_Sistem;
				}else{$_items[1] = $reror;}
			}
			
		}

		return $_items;
	}

	
}
?>