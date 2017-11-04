<?php

class TeknisGaPermukaan extends CActiveRecord
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
		return 't_permukaan5';
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
			array('ID_IDBalaiMa, NoDataMa', 'length', 'max'=>13),
			array('tahun_bangun, rehab, rencana_rehab, nama_lembaga, legalitas, tahun_berdiri, perizinan, no_kontrak, status_kelola, status_operasi, keterangan', 'length', 'max'=>100),
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
			'admin'=>array(self::BELONGS_TO, 'User', 'ID_IDBalaiMa'),
			'balai'=>array(self::BELONGS_TO, 'UnitKerja', 'ID_IDBalaiMa'),
			'permukaan'=>array(self::BELONGS_TO, 'Permukaan', 'ID_IDBalaiMa'),
			'manfaat'=>array(self::BELONGS_TO, 'ManfaatPermukaan', 'ID_IDBalaiMa'),
			'teknissat'=>array(self::BELONGS_TO, 'TeknisPermukaan', 'ID_IDBalaiMa'),
			'teknisdua'=>array(self::BELONGS_TO, 'TeknisWaPermukaan', 'ID_IDBalaiMa'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'ID_IDBalaiMa' => 'ID Balai',
			'NoDataMa' => 'Data Ke', 
			'tahun_bangun' => 'Tahun Pembangunan',
			'rehab' => 'Rehabilitasi',
			'rencana_rehab' => 'Rencana Rehab',
			'nama_lembaga' => 'Nama Lembaga',
			'legalitas' => 'Legalitas Badan Hukum',
			'tahun_berdiri' => 'Tahun Berdiri',
			'perizinan' => 'Perizinan',
			'no_kontrak' => 'No. Kontrak Ketua/Operator',
			'status_kelola' => 'Status Serah Terima',
			'tatus_operasi' => 'Status Beroperasi',
			'keterangan' => 'Keterangan',
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
		$criteria->order = 'ID_IDBalaiMa';

		$lastDataSumur =self::model()->find(
			$criteria
		);

		if (isset($lastDataSumur->ID_IDBalaiMa))
			return $lastDataSumur->ID_IDBalaiMa + 1;
		else
			return 1;
	}	
	public static function getAvailableNoData()
	{
		$criteria = new CDbCriteria;
		if (isset(Yii::app()->user->uid)) {
			
			$criteria->compare('ID_IDBalaiMa', Yii::app()->user->uid);
			$criteria->limit = 1;
			$criteria->order = 'NoDataMa DESC';

			$lastNoData =self::model()->find(
				$criteria
			);

			if (isset($lastNoData->NoDataMa))
				return $lastNoData->NoDataMa + 1;
			else
				return 1;
		}
	}
	public static function getNoDataByAdmin()
	{
		if (isset(Yii::app()->user->uid)) {
			$id = Yii::app()->user->uid;
			$command = Yii::app()->db->createCommand("SELECT * FROM t_permukaan5 WHERE ID_IDBalaiMa='$id'");
			
			$query = $command->query();
			
			$data = $query->read();
			
			return $data['NoDataMa'];	
			} else {
				return '';
			}
	}
	
}
?>