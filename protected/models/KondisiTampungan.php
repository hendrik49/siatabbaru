<?php

class KondisiTampungan extends CActiveRecord
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
		return 't_tampungan6';
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
			array('ID_IDBalaiNam, NoDataNam', 'length', 'max'=>13),
			array('kondisi_sungai, kondisi_reservoir, kondisi_pompa, kondisi_bangunan, kondisi_penggerak', 'length', 'max'=>100),
			array('ket_kondisi_sungai, ket_kondisi_reservoir, ket_kondisi_pompa, ket_kondisi_bangunan, ket_kondisi_penggerak', 'length', 'max'=>100),
			array('sumber_pendanaan, instansi_pembangun, dokumen_pendukung', 'length', 'max'=>255),
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
			'admin'=>array(self::BELONGS_TO, 'User', 'ID_IDBalaiNam'),
			'balai'=>array(self::BELONGS_TO, 'UnitKerja', 'ID_IDBalaiNam'),
			'tampungan'=>array(self::BELONGS_TO, 'Tampungan', 'ID_IDBalaiNam'),
			'manfaat'=>array(self::BELONGS_TO, 'ManfaatTampungan', 'ID_IDBalaiNam'),
			'teknissat'=>array(self::BELONGS_TO, 'TeknisTampungan', 'ID_IDBalaiNam'),
			'teknisdua'=>array(self::BELONGS_TO, 'TeknisWaTampungan', 'ID_IDBalaiNam'),
			'teknisga'=>array(self::BELONGS_TO, 'TeknisGaTampungan', 'ID_IDBalaiNam'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'ID_IDBalaiNam' => 'ID Balai',
			'NoDataMa' => 'Data Ke', 
			'kondisi_sungai' => 'Kondisi Sungai',
			'kondisi_reservoir' => 'Kondisi Reservoir',
			'kondisi_pompa' => 'Kondisi Pompa',
			'kondisi_bangunan' => 'Kondisi Bangunan',
			'kondisi_penggerak' => 'Pondisi Penggerak',

			'ket_kondisi_sungai' => '',
			'ket_kondisi_reservoir' => '',
			'ket_kondisi_pompa' => '',
			'ket_kondisi_bangunan' => '',
			'ket_kondisi_penggerak' => '',
			
			'sumber_pendanaan'=>'Sumber Pendanaan', 
			'instansi_pembangun' =>'Instansi Pembangun', 
			'dokumen_pendukung' =>'Dokumen Pendukung',
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
		$criteria->compare('nama_lembaga',$this->sistem);
		$criteria->compare('status_operasi',$this->jenis_pompa);		
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public static function getAvailableDataSumurId()
	{
		$criteria = new CDbCriteria;
		$criteria->limit = 1;
		$criteria->order = 'ID_IDBalaiNam';

		$lastDataSumur =self::model()->find(
			$criteria
		);

		if (isset($lastDataSumur->ID_IDBalaiNam))
			return $lastDataSumur->ID_IDBalaiNam + 1;
		else
			return 1;
	}	
	public static function getAvailableNoData()
	{
		$criteria = new CDbCriteria;
		if (isset(Yii::app()->user->uid)) {
			
			$criteria->compare('ID_IDBalaiNam', Yii::app()->user->uid);
			$criteria->limit = 1;
			$criteria->order = 'NoDataNam DESC';

			$lastNoData =self::model()->find(
				$criteria
			);

			if (isset($lastNoData->NoDataNam))
				return $lastNoData->NoDataNam + 1;
			else
				return 1;
		}
	}
	public static function getNoDataByAdmin()
	{
		if (isset(Yii::app()->user->uid)) {
			$id = Yii::app()->user->uid;
			$command = Yii::app()->db->createCommand("SELECT * FROM t_tampungan6 WHERE ID_IDBalaiNam='$id'");
			
			$query = $command->query();
			
			$data = $query->read();
			
			return $data['NoDataNam'];	
			} else {
				return '';
			}
	}	
}
?>