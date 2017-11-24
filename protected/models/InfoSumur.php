<?php

class InfoSumur extends CActiveRecord
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
		return 't_sumur7';
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
			array('ID_IDBalaiJu, NoDataJu', 'length', 'max'=>13),
			array('foto1, foto2, foto3, foto4, foto5', 
				'file', 'types'=>'jpg, jpeg, gif, png, bmp',
				'allowEmpty'=>true),
				
			array('video', 'file', 'types'=>array('mp4', '3gp'), 'maxSize'=>1024 * 1024 * 20, 'tooLarge'=>'File has to be smaller than 20MB', 'allowEmpty'=>true),
			array('dokumen_pendukung', 'file', 'types'=>array('jpg', 'jpeg', 'png', 'pdf', 'xls', 'doc', 'xlsx'), 'allowEmpty'=>true),
			array('baku_mutuair, konduktivitas, nilai_storativitas, nilai_tranmisivitas, sumber_pendanaan, instansi_pembangun, dokumen_pendukung', 'length', 'max'=>100),
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
			'admin'=>array(self::BELONGS_TO, 'User', 'ID_IDBalaiJu'),
			'balai'=>array(self::BELONGS_TO, 'UnitKerja', 'ID_IDBalaiJu'),
			'sumur'=>array(self::BELONGS_TO, 'Sumur', 'ID'),
			'manfaat'=>array(self::BELONGS_TO, 'ManfaatSumur', 'ID'),
			'teknissat'=>array(self::BELONGS_TO, 'TeknisSumur', 'ID'),
			'teknisdua'=>array(self::BELONGS_TO, 'TeknisWaSumur', 'ID'),
			'teknisga'=>array(self::BELONGS_TO, 'TeknisGaSumur', 'ID'),
			'kondisi'=>array(self::BELONGS_TO, 'KondisiSumur', 'ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'ID_IDBalaiJu' => 'ID Balai',
			'NoDataJu' => 'Data Ke', 
			'baku_mutuair'=>'Baku Mutuair', 
			'konduktivitas'=>'Konduktivitas', 
			'nilai_storativitas'=>'Nilai Storativitas', 
			'nilai_tranmisivitas'=>'Nilai Tranmisivitas', 
			'sumber_pendanaan'=>'Sumber Pendanaan', 
			'instansi_pembangun'=>'Instansi Pembangun', 
			'dokumen_pendukung'=>'Dokumen Pendukung',
			'foto1' => 'Foto - 1',
			'foto2' => 'Foto - 2',
			'foto3' => 'Foto - 3',
			'foto4' => 'Foto - 4',
			'foto5' => 'Foto - 5',
			//'video' => 'Video',
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
		$criteria->compare('foto1',$this->foto1);
	
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public static function getAvailableDataSumurId()
	{
		$criteria = new CDbCriteria;
		$criteria->limit = 1;
		$criteria->order = 'ID_IDBalaiJu';

		$lastDataSumur =self::model()->find(
			$criteria
		);

		if (isset($lastDataSumur->ID_IDBalaiJu))
			return $lastDataSumur->ID_IDBalaiJu + 1;
		else
			return 1;
	}	
	public static function getAvailableNoData()
	{
		$criteria = new CDbCriteria;
		if (isset(Yii::app()->user->uid)) {
			
			$criteria->compare('ID_IDBalaiJu', Yii::app()->user->uid);
			$criteria->limit = 1;
			$criteria->order = 'NoDataJu DESC';

			$lastNoData =self::model()->find(
				$criteria
			);

			if (isset($lastNoData->NoDataJu))
				return $lastNoData->NoDataJu + 1;
			else
				return 1;
		}
	}
	
}
?>