<?php

class InfoHujan extends CActiveRecord
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
		return 't_hujan6';
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
			array('foto1, foto2, foto3, foto4, foto5', 'file', 'types'=>array('jpg', 'jpeg', 'gif', 'png', 'bmp'), 'maxSize'=>1024 * 1024 * 20, 'tooLarge'=>'File has to be smaller than 20MB', 'allowEmpty'=>true),
			array('video', 'file', 'types'=>array('mp4', '3gp'),'maxSize'=>1024 * 1024 * 20, 'tooLarge'=>'File has to be smaller than 20MB', 'allowEmpty'=>true),						
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
			'admin'=>array(self::BELONGS_TO, 'User', 'ID_IDBalaiNam'),
			'balai'=>array(self::BELONGS_TO, 'UnitKerja', 'ID_IDBalaiNam'),
			'hujan'=>array(self::BELONGS_TO, 'Hujan', 'ID_IDBalaiNam'),
			'manfaat'=>array(self::BELONGS_TO, 'ManfaatHujan', 'ID_IDBalaiNam'),
			'teknissat'=>array(self::BELONGS_TO, 'TeknisHujan', 'ID_IDBalaiNam'),
			//'teknisdua'=>array(self::BELONGS_TO, 'TeknisWaMA', 'ID_IDBalaiNam'),
			'teknisga'=>array(self::BELONGS_TO, 'TeknisGaHujan', 'ID_IDBalaiNam'),
			'kondisi'=>array(self::BELONGS_TO, 'KondisiHujan', 'ID_IDBalaiNam'),
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
			'NoDataNam' => 'Data Ke', 
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
			'Video' => 'Video',			
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
	
}
?>