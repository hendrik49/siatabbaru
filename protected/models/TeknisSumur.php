<?php

class TeknisSumur extends CActiveRecord
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
		return 't_sumur3';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama_sumur', 'required'),
			array('ID_IDBalaiGa, NoDataGa', 'length', 'max'=>13),
			array('sistem, jenis_pompa, tahun_pengadaan, jenis_sumur', 'length', 'max'=>100),
			array('head_pompa, listrik, genset, solar_cell, lain_lain, debit_andal, debit_awal, his_ID, debit_idle, dalam_sumur', 'length', 'max'=>13),
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
			'admin'=>array(self::BELONGS_TO, 'User', 'ID_IDBalaiGa'),
			'balai'=>array(self::BELONGS_TO, 'UnitKerja', 'ID_IDBalaiGa'),
			'sumur'=>array(self::BELONGS_TO, 'Sumur', 'ID'),
			'manfaat'=>array(self::BELONGS_TO, 'ManfaatSumur', 'ID'),
			'teknissat'=>array(self::BELONGS_TO, 'TeknisSumur', 'ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'ID_IDBalaiGa' => 'ID Balai',
			'NoDataGa' => 'Data Ke', 
			'nama_sumur' => 'Nama/Kode Sumur',
			'dalam_sumur' => 'Kedalaman Sumur (m)',
			'jenis_sumur' => 'Jenis Sumur',
			
			'sistem' => 'Sistem Kerja Pompa',
			'jenis_pompa' => 'Jenis Pompa',
			'head_pompa' => 'Head Pompa',
			'listrik' => 'Listrik (kVA)',
			'genset' => 'Genset (kVA)',
			'solar_cell' => 'Solar Cell (kVA)',
			'lain_lain' => 'Lain-lain',
			'tahun_pengadaan' => 'Tahun Pengadaan',
			'debit_andal' => 'Debit Andalan (l/dtk)',
			'debit_awal' => 'Debit Pengambilan Awal (l/dtk)',
			'his_ID' => 'ID History',
			'debit_idle' => 'Debit Idle (l/dtk)',
			
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
		$criteria->compare('sistem',$this->sistem);
		$criteria->compare('jenis_pompa',$this->jenis_pompa);		
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public static function getAvailableDataSumurId()
	{
		$criteria = new CDbCriteria;
		$criteria->limit = 1;
		$criteria->order = 'ID_IDBalaiGa';

		$lastDataSumur =self::model()->find(
			$criteria
		);

		if (isset($lastDataSumur->ID_IDBalaiGa))
			return $lastDataSumur->ID_IDBalaiGa + 1;
		else
			return 1;
	}	
	public static function getAvailableNoData()
	{
		$criteria = new CDbCriteria;
		if (isset(Yii::app()->user->uid)) {
			
			$criteria->compare('ID_IDBalaiGa', Yii::app()->user->uid);
			$criteria->limit = 1;
			$criteria->order = 'NoDataGa DESC';

			$lastNoData =self::model()->find(
				$criteria
			);

			if (isset($lastNoData->NoDataGa))
				return $lastNoData->NoDataGa + 1;
			else
				return 1;
		}
	}
	public static function getNoDataByAdmin()
	{
		if (isset(Yii::app()->user->uid)) {
			$id = Yii::app()->user->uid;
			$command = Yii::app()->db->createCommand("SELECT * FROM t_sumur3 WHERE ID_IDBalaiGa='$id'");
			
			$query = $command->query();
			
			$data = $query->read();
			
			return $data['NoDataGa'];	
			} else {
				return '';
			}
	}	

	public static function DebitIdleKab()
	{
		$kotas = self::model()->findAll();
		$_items = array();
		foreach ($kotas as $kota) 
		{
			$data = Unitkerja::getProvByAdmin();
			if($kota->provinsi == $data){
				$_items[$kota->kode] = $kota->kode . ' (' . $kota->kab . ')';
			}
		}	
		return $_items;
		
	}

}
?>