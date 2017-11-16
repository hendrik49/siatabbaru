<?php

class DTBase extends CActiveRecord
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
		return 't_db_perencanaan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Tanggal', 'required'),
			array('Tanggal', 'numerical', 'integerOnly'=>true),
			array('kdsatker, NamaSatker, NamaBalai, KdOutput, nmoutput, Kinerja, satm, vol1, st_outcome', 'length', 'max'=>100),
			array('vol2, rpm, rmp, apln, Jumlah, nmkabkota, kewenangan, jk2, b_sp, swakelola, RTRW, SIPPA
			Permohonan, RKP_Renstra, DokumenLH, DokumenkesiapanLahan, FS_SID_DED, KAK_RAB, Keterangan', 'length', 'max'=>100),
			array('file_','file','types'=>'xls', 'allowEmpty'=>true),
			array('Strategis', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('kdsatker, NamaSatker, NamaBalai, KdOutput, nmoutput, Kinerja, satm, vol1, SatuanOutcome', 'safe', 'on'=>'search'),
		);
	}

	public $file_excel;

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'admin'=>array(self::BELONGS_TO, 'User', 'ID_Admin'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'kdsatker' => 'kdsatker',
			'NamaSatker' => 'NamaSatker',
			'NamaBalai' => 'NamaBalai',
			'KdOutput' => 'KdOutput',
			'nmoutput' => 'nmoutput',
			'Kinerja' => 'Kinerja',
			'satm' => 'satm',
			'vol1' => 'vol1',
			'st_outcome' => 'satuan outcome',
			'Strategis' => 'Strategis',
			'file_'=>'Upload File Excel',

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

		$criteria->compare('ID',$this->ID);
		$criteria->compare('kdsatker',$this->kdsatker);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
}
?>