<?php

class AirTanah extends CActiveRecord
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
		return 't_sumur';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kota, kecamatan, desa, lintang_Selatan, bujur_timur', 'required'),
			//array('Tanggal', 'numerical', 'integerOnly'=>true),
			array('kode_bidang, kode_dasar, kode_infra, jenis_sumur', 'length', 'max'=>5),
			array('ID_Balai, No_Data', 'length', 'max'=>11),
			array('nama_das, nama_ws, provinsi, kota, kecamatan, desa, lintang_Selatan, bujur_timur, kelembagaan, Link', 'length', 'max'=>100),
			array('elevasi_sumur, airbaku_kk, airbaku_dt, irigasi,no_sumur, kedalaman_sumur, debit_pemompaan, tanah_dibebaskan,
			bangunan, jumlah_bangunan, status_asettanah, panjang_jaringan1, sistem_jaringan, panjang_jaringan2, jumlah_box, jumlah_splingker', 'length', 'max'=>10),
			array('jenis_pompa, status_serahterima, status', 'length', 'max'=>15),
			array('keterangan', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('nama_das, nama_ws, provinsi, kota, kecamatan, desa', 'safe', 'on'=>'search'),
			//array('ID_Balai, No_Data', 'safe', 'on'=>'search2'),
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
			//'admin'=>array(self::BELONGS_TO, 'User', 'ID_Balai'),
			//'balai'=>array(self::HAS_MANY, 'UnitKerja', 'ID_Balai', 'limit'=>'1' ),
			'balai'=>array(self::BELONGS_TO, 'UnitKerja', 'ID_Balai'),
			//'tags'=>array(self::MANY_MANY, 'Tag', 'post_tag(post_id, tag_id)', 'order'=>'name'),
		);
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'kode_bidang'=>'Kodefikasi',
			'kode_dasar'=>'Kode Dasar',
			'kode_infra'=>'Kode Infrastruktur',
			'No_Data' => 'Data ke ',
			'ID_Balai' => 'ID Balai',
			'nama_das' => 'Nama DAS',
			'nama_ws' => 'Kode WS',
			'provinsi' => 'Provinsi',
			'kota' => 'Kota/ Kabupaten',
			'kecamatan' => 'Kecamatan',
			'desa' => 'Desa/ Kelurahan',
			'lintang_Selatan' => 'Lintang Selatan',
			'bujur_timur' => 'Bujur Timur',
			'elevasi_sumur' => 'Elevasi Sumur (mdpl)',
			'airbaku_kk' => 'manfaat air baku KK',
			'airbaku_dt' => 'Manfaat air baku (I/dt)',
			'irigasi' => 'Irigasi (Ha)',
			//--------------------------------------------
			'no_sumur'=>'Kode Sumur',
			'kedalaman_sumur'=>'Kedalaman Sumur (m)',
			'jenis_sumur'=>'Jenis Sumur',
			'jenis_pompa'=>'Jenis Pompa',
			'debit_pemompaan'=>'Debit Pemompaan (I /dt)',
			'tanah_dibebaskan'=>'Tanah Yang Dibebaskan (m2)',
			'bangunan'=>'Bangunan (m2)',
			'jumlah_bangunan'=>'Jumlah Bangunan',
			'status_asettanah'=>'Status Aset Tanah',
			'panjang_jaringan1'=>'Panjang Jaringan Air Baku(m)',
			'box_pembagi'=>'Jumlah Box Pembagi',
			'Panjang_jaringan2'=>'Panjang Jaringan JIAT (m)',
			'sistem_jaringan'=>'Sistem Jaringan ',
			'jumlah_box'=>'Jumlah Box',
			'jumlah_splingker'=>'Jumlah Splingker',
			'tahun_pembangunan'=>'Tahun Pembangunan',
			'sedang_rehab'=>'Sedang Rehab/ Redrilling',
			'rencana_rehab'=>'Rencana Rehab / Redrilling',
			'kelembagaan'=>'Kelembagaan',
			'status_serahterima'=>'Status Serah Terima Kelola',
			'status'=>'Status',
			'keterangan'=>'Keterangan',
			'Link'=>'Progres 0%',
			'Foto2'=>'Progres 25%',
			'Foto3'=>'Progres 50%',
			
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
		$criteria->compare('nama_das',$this->nama_das);
		$criteria->compare('nama_ws',$this->nama_ws);		
		$criteria->compare('provinsi',$this->provinsi);
		$criteria->compare('kota',$this->kota);
		$criteria->compare('kecamatan',$this->kecamatan);
		$criteria->compare('desa',$this->desa);
		//---------------------------------------------------------
		$criteria->compare('no_sumur',$this->no_sumur);
		$criteria->compare('jenis_sumur',$this->jenis_sumur);		
		$criteria->compare('jenis_pompa',$this->jenis_pompa);
		$criteria->compare('tanah_dibebaskan',$this->tanah_dibebaskan);
		$criteria->compare('status_asettanah',$this->status_asettanah);
		$criteria->compare('sistem_jaringan',$this->sistem_jaringan);		
		
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
		public static function getAvailableDataSumurId()
	{
		$criteria = new CDbCriteria;
		$criteria->limit = 1;
		$criteria->order = 'ID_Balai';

		$lastDataSumur =self::model()->find(
			$criteria
		);

		if (isset($lastDataSumur->ID_Balai))
			return $lastDataSumur->ID_Balai + 1;
		else
			return 1;
	}
/*	public function search2()
 {
     $criteria=new CDbCriteria;


       //$criteria->with=array('balai');
       $criteria->compare('ID_Admin',$this->ID_Admin);
       $criteria->compare('NamaUnitKerja',$this->NamaUnitKerja,true);
       $criteria->compare('balai.ID_Admin',$this->ID_Admin,true);
       $criteria->compare('balai.NamaUnitKerja',$this->NamaUnitKerja,true);

       return new CActiveDataProvider(get_class($this), array(
         'criteria'=>$criteria,
         'sort'=>array(
           'attributes'=>array(
              'ID_Admin'=>array(
                 'asc'=>'balai.ID_Admin',
                 'desc'=>'balai.ID_Admin DESC',
              ),
              'NamaUnitKerja'=>array(
                 'asc'=>'balai.NamaUnitKerja',
                 'desc'=>'balai.NamaUnitKerja DESC',
              ),
              '*'
			  ,
          ),
        ),
    ));
 }*/
 
}	

?>	