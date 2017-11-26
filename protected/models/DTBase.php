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
			array('kode_satker, NamaSatker, kode_balai, NamaBalai, kode_provinsi, nama_lokasi, kode_kegiatan, nama_kegiatan, 
				kode_output, nama_output, vol_outcome, vol_output, sat_output, sat_outcome, apln', 'length', 'max'=>100),
			array('rpm, rmp, apln, Jumlah, kode_kabupaten, nama_kabkota, kewenangan, MYC, b_sp, tahun_mulai, tahun_selesai,
			kegiatan_prioritas, sasaran_kegiatan, tahun_ded, tahun_dok, tahun_pembebasan, kode_dukungan_bap, kode_dukungan_wps,
			prioritas_nasional, program_prioritas', 'length', 'max'=>100),
			array('file_','file','types'=>'xls', 'allowEmpty'=>true),
			
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('', 'safe', 'on'=>'search'),
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
			'NamaSatker' => 'Nama Satker',
			'NamaBalai' => 'Nama Balai',
			'nama_output' => 'Nama Output',
			'nama_paket' => 'Nama Paket',
			'vol_output' => 'Volume Output',
			'vol_outcome' => 'Volume Outcome',
			'sat_output' => 'Satuan Output',
			'sat_outcome' => 'Satuan Outcome',
			'rpm' => 'R P M',
			'rmp'=>'R M P',
			'apln' => 'A P L N',
			'Jumlah'=>'Jumlah',

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
		//$criteria->compare('kdsatker',$this->kdsatker);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
}
?>