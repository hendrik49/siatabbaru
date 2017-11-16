<?php

class ManfaatHujan extends CActiveRecord
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
		return 't_hujan2';
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
			array('sistem, jenis_pompa, tahun_pengadaan', 'length', 'max'=>100),
			array('head_pompa, listrik, genset, solar_cell, lain_lain', 'length', 'max'=>13),
			array('kecamatan1, desa1', 'length', 'max'=>100),
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
			'hujan'=>array(self::BELONGS_TO, 'Hujan', 'ID_IDBalaiWa'),
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
			'kecamatan1'=>'Layanan Air Baku Kecamatan',
			'desa1'=>'Layanan Air Baku Desa',
			'sistem' => 'Sistem Kerja Pompa',
			'jenis_pompa' => 'Jenis Pompa',
			'head_pompa' => 'Head Pompa',
			'listrik' => 'Listrik (kVA)',
			'genset' => 'Genset (kVA)',
			'solar_cell' => 'Solar Cell (kVA)',
			'lain_lain' => 'Lain-lain',
			'tahun_pengadaan' => 'Tahun Pengadaan',
			'catchment_area'=>'Catchment Area (SHP)',
			'catchment_area1'=>'Catchment Area (DBF)',
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
			$command = Yii::app()->db->createCommand("SELECT * FROM t_hujan2 WHERE ID_IDBalaiWa='$id'");
			
			$query = $command->query();
			
			$data = $query->read();
			
			return $data['NoDataWa'];	
			} else {
				return '';
			}
	}
}
?>