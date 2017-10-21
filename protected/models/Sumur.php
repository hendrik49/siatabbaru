<?php

class Sumur extends CActiveRecord
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
	
	public $manfaat_jiwa;
	public $debit_liter;
	public $Nama_sumur;
	public $nama_lembaga;
	public $kondisi_sumur;
	public $info_gambar;
	public $status_aset;
	public $tahun_bangun;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_sumur1';
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
			array('Tanggal', 'numerical', 'integerOnly'=>true),
			/* ------------Data Numerical Control------------*/
			array('ID_IDBalai, NoData, kodefikasi', 'length', 'max'=>13),
			/* ------------Data Dasar & Administrasi------------*/
			array('nama_das, nama_ws, nama_cat', 'length', 'max'=>100),
			array('provinsi, kota, kecamatan, desa, status, info_gambar', 'length', 'max'=>100),
			array('bujur_timur, lintang_selatan', 'length', 'max'=>20),
			array('elevasi_sumur', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('provinsi, nama_das, kota, kecamatan, 
			manfaat_jiwa, debit_liter, Nama_sumur, kondisi_sumur,nama_lembaga, tahun_bangun, status_aset', 
			'safe', 'on'=>'search'),
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
			'admin'=>array(self::BELONGS_TO, 'User', 'ID_IDBalai'),
			'balai'=>array(self::BELONGS_TO, 'UnitKerja', 'ID_IDBalai'),
			'kotas'=>array(self::BELONGS_TO, 'Kota', 'kota'),
			'info'=>array(self::BELONGS_TO, 'InfoSumur', 'ID'),
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
			'ID_IDBalai' => 'ID Balai',
			'NoData' => 'No',
			'kodefikasi'=>'Kodefikasi',
			'nama_das' => 'Nama DAS',
			'nama_ws' => 'Nama WS',
			'nama_cat' => 'Nama CAT',
			'provinsi' => 'Provinsi',
			'kota' => 'Kota/ Kabupaten',
			'kecamatan' => 'Kecamatan',
			'desa' => 'Desa/ Kelurahan',
			'elevasi_sumur' => 'Elevasi Sumur (mdpl)',
			'bujur_timur' => 'Bujur Timur',
			'lintang_selatan' => 'Lintang Selatan',
			'debit_liter'=>'Debit (l/dtk)',
			'status'=>'Status Pekerjaan',
			'manfaat_jiwa'=>'Jiwa',
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
		
		$criteria->with= array(
			'admin'=>array('select'=>'Nama'),
			'info'=>array('select'=>'foto1'),
			'manfaat'=>array('select'=>'jiwa, debit'),
			'teknissat'=>array('select'=>'nama_sumur'),
			'teknisdua'=>array('select'=>'status_aset'),
			'teknisga'=>array('select'=>'tahun_bangun, nama_lembaga'),
			'kondisi'=>array('select'=>'sumur'),
		);
		$criteria->compare('manfaat.jiwa',$this->manfaat_jiwa, true);
		$criteria->compare('manfaat.debit',$this->debit_liter, true);
		$criteria->compare('teknissat.nama_sumur',$this->Nama_sumur, true);
		$criteria->compare('kondisi.sumur',$this->kondisi_sumur, true);
		$criteria->compare('teknisdua.status_aset',$this->status_aset, true);
		$criteria->compare('teknisga.tahun_bangun',$this->tahun_bangun, true);
		$criteria->compare('teknisga.nama_lembaga',$this->nama_lembaga, true);
		//$criteria->compare('nama_das',$this->nama_das, true);
		$criteria->compare('nama_ws',$this->nama_ws,true);		
		$criteria->compare('provinsi',$this->provinsi,true);
		$criteria->compare('kota',$this->kota,true);
		$criteria->compare('kecamatan',$this->kecamatan, true);
		$criteria->compare('desa',$this->desa, true);
		
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'nama_ws DESC',
			),
			'sort'=>array(
				'attributes'=>array(
					'manfaat_jiwa'=>array('asc'=>'manfaat.jiwa','desc'=>'manfaat.jiwa'),
					'debit_liter'=>array('asc'=>'manfaat.debit', 'desc'=>'manfaat.debit'),
					'Nama_sumur'=>array('asc'=>'teknissat.nama_sumur', 'desc'=>'teknissat.nama_sumur'),
					'kondisi_sumur'=>array('asc'=>'kondisi.sumur', 'desc'=>'kondisi.sumur'),
					'tahun_bangun'=>array('asc'=>'teknisga.tahun_bangun', 'desc'=>'teknisga.tahun_bangun'),
					'*',
				),
			),

			'pagination' => array(
				'pageSize' => 5,
			),
		));
		
	}
	
		public static function getAvailableDataSumurId()
	{
		$criteria = new CDbCriteria;
		$criteria->limit = 1;
		$criteria->order = 'ID_IDBalai';

		$lastDataSumur =self::model()->find(
			$criteria
		);

		if (isset($lastDataSumur->ID_IDBalai))
			return $lastDataSumur->ID_IDBalai + 1;
		else
			return 1;
	}	
	public static function getAvailableNoData()
	{$criteria = new CDbCriteria;
		if (isset(Yii::app()->user->uid)) {
			
			$criteria->compare('ID_IDBalai', Yii::app()->user->uid);
			$criteria->limit = 1;
			$criteria->order = 'NoData DESC';

			$lastNoData =self::model()->find(
				$criteria
			);

			if (isset($lastNoData->NoData))
				return $lastNoData->NoData + 1;
			else
				return 1;
		}
	}
	public static function getNoDataByAdmin()
	{
		if (isset(Yii::app()->user->uid)) {
			$id = Yii::app()->user->uid;
			$command = Yii::app()->db->createCommand("SELECT * FROM t_sumur1 WHERE ID_IDBalai='$id'");
			
			$query = $command->query();
			
			$data = $query->read();
			
			return $data['NoData'];	
			} else {
				return '';
			}
	}	

	public static function getProvById()
	{
		if (isset(Yii::app()->user->uid)) {
			$id = Yii::app()->user->uid;
			$command = Yii::app()->db->createCommand("SELECT * FROM t_sumur1 WHERE ID_IDBalai='$id'");
			
			$query = $command->query();
			
			$data = $query->read();
			
			return $data['provinsi'];	
			} else {
				return '';
			}
	}

	public static function getKodeById()
	{
		if (isset(Yii::app()->user->uid)) {
			$id = Yii::app()->user->uid;
			$command = Yii::app()->db->createCommand("SELECT * FROM t_sumur1 WHERE ID_IDBalai='$id'");
			
			$query = $command->query();
			
			$data = $query->read();
			
			return $data['kota'];	
			} else {
				return '';
			}
	}


}
?>