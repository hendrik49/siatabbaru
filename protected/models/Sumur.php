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
	public $nama_prov;
	public $n_prov;
	public $tadah_saatini;
	public $suplesi_saatini;


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
			array('manfaat_jiwa, debit_liter', 'numerical', 'integerOnly'=>true),
			/* ------------Data Numerical Control------------*/
			array('ID_IDBalai, NoData, kriteria, kodefikasi', 'length', 'max'=>15),
			/* ------------Data Dasar & Administrasi------------*/
			array('nama_das, nama_ws, nama_cat', 'length', 'max'=>100),
			array('provinsi, kota, kecamatan, NamaBalai desa, status, info_gambar', 'length', 'max'=>100),
			array('bujur_timur, lintang_selatan', 'length', 'max'=>20),
			array('elevasi_sumur', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('provinsi, nama_das, kota, kecamatan, manfaat_jiwa, debit_liter, Nama_sumur, 
				nama_prov, tadah_saatini, suplesi_saatini, n_prov, kondisi_sumur,nama_lembaga, 
				tahun_bangun, status_aset', 'safe', 'on'=>'search'),
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
			'kotas'=>array(self::BELONGS_TO, 'Kota', 'provinsi'),
			'info'=>array(self::BELONGS_TO, 'InfoSumur', 'ID'),
			'manfaat'=>array(self::BELONGS_TO, 'ManfaatSumur', 'ID'),
			'teknissat'=>array(self::BELONGS_TO, 'TeknisSumur', 'ID'),
			'teknisdua'=>array(self::BELONGS_TO, 'TeknisWaSumur', 'ID'),
			'teknisga'=>array(self::BELONGS_TO, 'TeknisGaSumur', 'ID'),
			'kondisi'=>array(self::BELONGS_TO, 'KondisiSumur', 'ID'),
			'info'=>array(self::BELONGS_TO, 'InfoSumur', 'ID'),
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
			'nama_ws' => 'WS',
			'nama_cat' => 'CAT',
			'provinsi' => 'Provinsi',
			'kota' => 'Kota/ Kabupaten',
			'kecamatan' => 'Kecamatan',
			'desa' => 'Desa/ Kelurahan',
			'elevasi_sumur' => 'Elevasi Sumur (mdpl)',
			'bujur_timur' => 'Bujur Timur',
			'lintang_selatan' => 'Lintang Selatan',
			'debit_liter'=>'Debit (l/dtk)',
			'status'=>'Status Pembangunan',
			'manfaat_jiwa'=>'Manfaat Jiwa',
			'nama_prov'=>'Nama Kabupaten',
			'n_prov' =>'id prov',
			'suplesi_saatini' => 'Suplesi (Ha)',
			'tadah_saatini'=>'Tadah Hujan (Ha)',
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
			'manfaat'=>array('select'=>'jiwa, debit, tadah_saatini, suplesi_saatini'),
			'teknissat'=>array('select'=>'nama_sumur'),
			'teknisdua'=>array('select'=>'status_aset'),
			'teknisga'=>array('select'=>'tahun_bangun, nama_lembaga'),
			'kondisi'=>array('select'=>'sumur'),
			//'kotas'=>array('select'=>'id_prov, provinsi'),
		);
		$criteria->compare('manfaat.jiwa',$this->manfaat_jiwa, true);
		$criteria->compare('manfaat.debit',$this->debit_liter, true);
		$criteria->compare('teknissat.nama_sumur',$this->Nama_sumur, true);
		$criteria->compare('manfaat.tadah_saatini',$this->tadah_saatini, true);
		$criteria->compare('manfaat.suplesi_saatini',$this->suplesi_saatini, true);
		$criteria->compare('kondisi.sumur',$this->kondisi_sumur, true);
		$criteria->compare('teknisdua.status_aset',$this->status_aset, true);
		$criteria->compare('teknisga.tahun_bangun',$this->tahun_bangun, true);
		$criteria->compare('teknisga.nama_lembaga',$this->nama_lembaga, true);
		//$criteria->compare('kotas.id_prov',$this->nama_prov, true);
		//$criteria->compare('kotas.provinsi',$this->n_prov, true);
		$criteria->compare('nama_das',$this->nama_das, true);
		$criteria->compare('nama_ws',$this->nama_ws,true);		
		$criteria->compare('provinsi',$this->provinsi,true);
		$criteria->compare('kota',$this->kota,true);
		$criteria->compare('kecamatan',$this->kecamatan, true);
		$criteria->compare('desa',$this->desa, true);

		if (isset(Yii::app()->user->hakAkses) AND Yii::app()->user->hakAkses == User::USER_ADMIN){
			$criteria->compare('ID_IDBalai', Yii::app()->user->uid);
		
			return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
				'sort'=>array(
					'defaultOrder'=>'nama_ws DESC',
				),
				'sort'=>array(
					'attributes'=>array(
						'manfaat_jiwa'=>array('asc'=>'manfaat.jiwa','desc'=>'manfaat.jiwa'),
						'debit_liter'=>array('asc'=>'manfaat.debit', 'desc'=>'manfaat.debit'),
						'tadah_saatini'=>array('asc'=>'manfaat.tadah_saatini','desc'=>'manfaat.tadah_saatini'),
						'suplesi_saatini'=>array('asc'=>'manfaat.suplesi_saatini', 'desc'=>'manfaat.suplesi_saatini'),
						'Nama_sumur'=>array('asc'=>'teknissat.nama_sumur', 'desc'=>'teknissat.nama_sumur'),
						'kondisi_sumur'=>array('asc'=>'kondisi.sumur', 'desc'=>'kondisi.sumur'),
						'tahun_bangun'=>array('asc'=>'teknisga.tahun_bangun', 'desc'=>'teknisga.tahun_bangun'),
						'*',
					),
				),
				'pagination' => array(
					'pageSize' => 6,
				),
			));
		}else{			
			return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
				'sort'=>array(
					'defaultOrder'=>'nama_ws DESC',
				),
				'sort'=>array(
					'attributes'=>array(
						'manfaat_jiwa'=>array('asc'=>'manfaat.jiwa','desc'=>'manfaat.jiwa','value'=>'manfaat.jiwa'),
						'debit_liter'=>array('asc'=>'manfaat.debit', 'desc'=>'manfaat.debit','value'=>'manfaat.debit'),
						'tadah_saatini'=>array('asc'=>'manfaat.tadah_saatini','desc'=>'manfaat.tadah_saatini'),
						'suplesi_saatini'=>array('asc'=>'manfaat.suplesi_saatini', 'desc'=>'manfaat.suplesi_saatini'),
						'Nama_sumur'=>array('asc'=>'teknissat.nama_sumur', 'desc'=>'teknissat.nama_sumur'),
						'kondisi_sumur'=>array('asc'=>'kondisi.sumur', 'desc'=>'kondisi.sumur'),
						'tahun_bangun'=>array('asc'=>'teknisga.tahun_bangun', 'desc'=>'teknisga.tahun_bangun'),
						'*',
					),
				),
				'pagination' => array(
					'pageSize' => 6,
				),
			));		
		}
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
	public static function getTotalJiwa()
	{
	
	//$criteria = new CDbCriteria;
	//$jiwas = self::model()->findAll();
	$jiwas = self::model()->search()->getData();
	$_total_jiwa= 0.0;
	foreach ($jiwas as $jiwa) 
		{
			if(isset(Yii::app()->user->hakAkses) AND Yii::app()->user->hakAkses == User::USER_ADMIN){
				if(Yii::app()->user->uid == $jiwa->ID_IDBalai){
					$_total_jiwa = $_total_jiwa + $jiwa->manfaat->jiwa;
				}
			}else{
				$_total_jiwa = $_total_jiwa + $jiwa->manfaat->jiwa;
			}
		}
	return number_format($_total_jiwa,0);
	}

	public function getTotal($records,$colname){        
        $total = 0.0;
		$nn = 0;
        if(count($records) > 0){
            foreach ($records as $record) {
				$total += $record->$colname;
				$nn++;	
            }
        }
		//return number_format($total,2);
		return number_format($nn,0);
		
    }
 
	public function getAvarage($column,$ids)	
	{
	if($ids){
	$ids = implode(",",$ids);
	
	$connection=Yii::app()->db;
	$command=$connection->createCommand("SELECT AVG($column) FROM t_sumur2 where id in ($ids)");
	$amount = $command->queryScalar();
	return number_format($amount,0);
	}
	else 
	return '0';
	} 
	
	public function getTotals($column,$ids)	
	{
	if($ids){
	$ids = implode(",",$ids);
	
	$connection=Yii::app()->db;
	$command=$connection->createCommand("SELECT SUM($column) FROM t_sumur2 where id in ($ids)");
	$amount = $command->queryScalar();
	return number_format($amount,0);
	}
	else 
	return '0';
	} 

	public static function exportXls()
    {
		if(isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_ADMIN OR Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN)){
			$datadatas = self::model()->findAll();
			$ii = 2;
			$objPHPExcel=Yii::createComponent('application.extensions.PHPExcel');
			$objPHPExcel->setActiveSheetIndex(0)
				->mergeCells('A1:M1')	
				->setCellValue('A1', 'Data Dasar')
				->setCellValue('A2', 'No')
				->setCellValue('B2', 'Kodefikasi')
				->setCellValue('C2', 'Nama CAT')
				->setCellValue('D2', 'Nama Das')
				->setCellValue('E2', 'Nama WS')
				->setCellValue('F2', 'Provinsi')
				->setCellValue('G2', 'Kota/ Kabupaten')
				->setCellValue('H2', 'Kecamatan')
				->setCellValue('I2', 'Desa')
				->setCellValue('J2', 'LS')
				->setCellValue('K2', 'BT')
				->setCellValue('L2', 'Elevasi Sumur')
				->setCellValue('M2', 'Status')

				->mergeCells('N1:U1')
				->setCellValue('N1', 'Manfaat Sumur')

				->setCellValue('N2', 'Manfaat Jiwa')
				->setCellValue('O2', 'Debit / Liter')
				->setCellValue('P2', 'tadah_awal')
				->setCellValue('Q2', 'tadah_saatini')
				->setCellValue('R2', 'suplesi_awal')
				->setCellValue('S2', 'suplesi_saatini')
				->setCellValue('T2', 'area kecamatan')
				->setCellValue('U2', 'area desa')
				
				->mergeCells('V1:AQ1')
				->setCellValue('V1', 'Teknis')

				->setCellValue('V2', 'nama sumur')
				->setCellValue('W2', 'kedalaman sumur')
				->setCellValue('X2', 'jenis sumur')
				->setCellValue('Y2', 'sistem')
				->setCellValue('Z2', 'jenis pompa')
				->setCellValue('AA2', 'head pompa')
				->setCellValue('AB2', 'tahun pengadaan')
				->setCellValue('AC2', 'listrik')
				->setCellValue('AD2', 'genset')

				->setCellValue('AE2', 'status aset')
				->setCellValue('AF2', 'luas bangunan')
				->setCellValue('AG2', 'jumlah bangunan')
				->setCellValue('AH2', 'reservoar')
				->setCellValue('AI2', 'hidran umum')
				->setCellValue('AJ2', 'pj air baku')
				->setCellValue('AK2', 'pj irigasi')
				->setCellValue('AL2', 'sistem jaringan')
				->setCellValue('AM2', 'jml boxbagi')
				->setCellValue('AN2', 'jml springkler')
				->setCellValue('AO2', 'musim tanam 1')
				->setCellValue('AP2', 'musim tanam 2')
				->setCellValue('AQ2', 'musim tanam 3')
				
				->mergeCells('AR1:BC1')
				->setCellValue('AR1', 'Kelembagaan')

				->setCellValue('AR2', 'tahun bangun')
				->setCellValue('AS2', 'rehab')
				->setCellValue('AT2', 'rencana rehab')
				->setCellValue('AU2', 'nama lembaga')
				->setCellValue('AV2', 'legalitas')
				->setCellValue('AW2', 'tahun berdiri')
				->setCellValue('AX2', 'keaktifan')
				->setCellValue('AY2', 'jumlah anggota')
				->setCellValue('AZ2', 'no kontrak')
				->setCellValue('BA2', 'status kelola')
				->setCellValue('BB2', 'status operasi')
				->setCellValue('BC2', 'keterangan')
				
				->mergeCells('BD1:BM1')
				->setCellValue('BD1', 'Informasi Tambahan')
				->setCellValue('BD2', 'kondisi sumur')
				->setCellValue('BE2', 'kondisi reservoar')
				->setCellValue('BF2', 'kondisi pompa')
				->setCellValue('BG2', 'kondisi rumah pompa')
				->setCellValue('BH2', 'kondisi hidran umum')
				->setCellValue('BI2', 'kondisi saluran air baku')
				->setCellValue('BJ2', 'kondisi saluran irigasi')
				->setCellValue('BK2', 'kondisi box pembagi')
				->setCellValue('BL2', 'kondisi springkler')
				->setCellValue('BM2', 'kondisi penggerak')
				
				->mergeCells('BN1:BS1')
				->setCellValue('BN1', 'Informasi Tambahan')
				->setCellValue('BN2', 'baku mutu air')
				->setCellValue('BO2', 'bonduktivitas')
				->setCellValue('BP2', 'nilai_storativitas')
				->setCellValue('BQ2', 'nilai_tranmisivitas')
				->setCellValue('BR2', 'sumber pendanaan')
				->setCellValue('BS2', 'instansi pembangun');
					
			foreach ($datadatas as $urut){	
				if(Yii::app()->user->uid == $urut->ID_IDBalai){
				$ii++;
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$ii, $urut->NoData)
					->setCellValue('B'.$ii, $urut->kodefikasi)
					->setCellValue('C'.$ii, $urut->nama_cat)
					->setCellValue('D'.$ii, $urut->nama_das)
					->setCellValue('E'.$ii, $urut->nama_ws)
					->setCellValue('F'.$ii, $urut->provinsi)
					->setCellValue('G'.$ii, $urut->kota)
					->setCellValue('H'.$ii, $urut->kecamatan)
					->setCellValue('I'.$ii, $urut->desa)
					->setCellValue('J'.$ii, $urut->lintang_selatan)
					->setCellValue('K'.$ii, $urut->bujur_timur)
					->setCellValue('L'.$ii, $urut->elevasi_sumur)
					->setCellValue('M'.$ii, $urut->status)
					
					->setCellValue('N'.$ii, $urut->manfaat->jiwa)
					->setCellValue('O'.$ii, $urut->manfaat->debit)
					->setCellValue('P'.$ii, $urut->manfaat->tadah_awal)
					->setCellValue('Q'.$ii, $urut->manfaat->tadah_saatini)
					->setCellValue('R'.$ii, $urut->manfaat->suplesi_awal)
					->setCellValue('S'.$ii, $urut->manfaat->suplesi_saatini)
					->setCellValue('T'.$ii, $urut->manfaat->kecamatan1)
					->setCellValue('U'.$ii, $urut->manfaat->desa1)
					
					->setCellValue('V'.$ii, $urut->teknissat->nama_sumur)
					->setCellValue('W'.$ii, $urut->teknissat->dalam_sumur)
					->setCellValue('X'.$ii, $urut->teknissat->jenis_sumur)
					->setCellValue('Y'.$ii, $urut->teknissat->sistem)
					->setCellValue('Z'.$ii, $urut->teknissat->jenis_pompa)
					->setCellValue('AA'.$ii, $urut->teknissat->head_pompa)
					->setCellValue('AB'.$ii, $urut->teknissat->tahun_pengadaan)
					->setCellValue('AC'.$ii, $urut->teknissat->listrik)
					->setCellValue('AD'.$ii, $urut->teknissat->genset)
					
					->setCellValue('AE'.$ii, $urut->teknisdua->status_aset)
					->setCellValue('AF'.$ii, $urut->teknisdua->luas_bangunan)
					->setCellValue('AG'.$ii, $urut->teknisdua->jumlah_bangunan)
					->setCellValue('AH'.$ii, $urut->teknisdua->reservoar)
					->setCellValue('AI'.$ii, $urut->teknisdua->hidran_umum)
					->setCellValue('AJ'.$ii, $urut->teknisdua->pj_airbaku)
					->setCellValue('AK'.$ii, $urut->teknisdua->pj_irigasi)
					->setCellValue('AL'.$ii, $urut->teknisdua->sistem_jaringan)
					->setCellValue('AM'.$ii, $urut->teknisdua->jumlah_boxbagi)
					->setCellValue('AN'.$ii, $urut->teknisdua->jumlah_splingker)
					->setCellValue('AO'.$ii, $urut->teknisdua->mt1)
					->setCellValue('AP'.$ii, $urut->teknisdua->mt2)
					->setCellValue('AQ'.$ii, $urut->teknisdua->mt3)
					
					->setCellValue('AR'.$ii, $urut->teknisga->tahun_bangun)
					->setCellValue('AS'.$ii, $urut->teknisga->rehab)
					->setCellValue('AT'.$ii, $urut->teknisga->rencana_rehab)
					->setCellValue('AU'.$ii, $urut->teknisga->nama_lembaga)
					->setCellValue('AV'.$ii, $urut->teknisga->legalitas)
					->setCellValue('AW'.$ii, $urut->teknisga->tahun_berdiri)
					->setCellValue('AX'.$ii, $urut->teknisga->keaktifan)
					->setCellValue('AY'.$ii, $urut->teknisga->jumlah_anggota)
					->setCellValue('AZ'.$ii, $urut->teknisga->no_kontrak)
					->setCellValue('BA'.$ii, $urut->teknisga->status_kelola)
					->setCellValue('BB'.$ii, $urut->teknisga->status_operasi)
					->setCellValue('BC'.$ii, $urut->teknisga->keterangan)
					
					->setCellValue('BD'.$ii, $urut->kondisi->sumur)
					->setCellValue('BE'.$ii, $urut->kondisi->reservoar)
					->setCellValue('BF'.$ii, $urut->kondisi->pompa)
					->setCellValue('BG'.$ii, $urut->kondisi->rumah_pompa)
					->setCellValue('BH'.$ii, $urut->kondisi->hidran_umum)
					->setCellValue('BI'.$ii, $urut->kondisi->saluran_airbaku)
					->setCellValue('BJ'.$ii, $urut->kondisi->saluran_irigasi)
					->setCellValue('BK'.$ii, $urut->kondisi->box_pembagi)
					->setCellValue('BL'.$ii, $urut->kondisi->springkler)
					->setCellValue('BM'.$ii, $urut->kondisi->penggerak)
					
					->setCellValue('BN'.$ii, $urut->info->baku_mutuair)
					->setCellValue('BO'.$ii, $urut->info->konduktivitas)
					->setCellValue('BP'.$ii, $urut->info->nilai_storativitas)
					->setCellValue('BQ'.$ii, $urut->info->nilai_tranmisivitas)
					->setCellValue('BR'.$ii, $urut->info->sumber_pendanaan)
					->setCellValue('BS'.$ii, $urut->info->instansi_pembangun);
				}else{
					$ii++;
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$ii, $urut->NoData)
						->setCellValue('B'.$ii, $urut->kodefikasi)
						->setCellValue('C'.$ii, $urut->nama_cat)
						->setCellValue('D'.$ii, $urut->nama_das)
						->setCellValue('E'.$ii, $urut->nama_ws)
						->setCellValue('F'.$ii, $urut->provinsi)
						->setCellValue('G'.$ii, $urut->kota)
						->setCellValue('H'.$ii, $urut->kecamatan)
						->setCellValue('I'.$ii, $urut->desa)
						->setCellValue('J'.$ii, $urut->lintang_selatan)
						->setCellValue('K'.$ii, $urut->bujur_timur)
						->setCellValue('L'.$ii, $urut->elevasi_sumur)
						->setCellValue('M'.$ii, $urut->status)
						
						->setCellValue('N'.$ii, $urut->manfaat->jiwa)
						->setCellValue('O'.$ii, $urut->manfaat->debit)
						->setCellValue('P'.$ii, $urut->manfaat->tadah_awal)
						->setCellValue('Q'.$ii, $urut->manfaat->tadah_saatini)
						->setCellValue('R'.$ii, $urut->manfaat->suplesi_awal)
						->setCellValue('S'.$ii, $urut->manfaat->suplesi_saatini)
						->setCellValue('T'.$ii, $urut->manfaat->kecamatan1)
						->setCellValue('U'.$ii, $urut->manfaat->desa1)
						
						->setCellValue('V'.$ii, $urut->teknissat->nama_sumur)
						->setCellValue('W'.$ii, $urut->teknissat->dalam_sumur)
						->setCellValue('X'.$ii, $urut->teknissat->jenis_sumur)
						->setCellValue('Y'.$ii, $urut->teknissat->sistem)
						->setCellValue('Z'.$ii, $urut->teknissat->jenis_pompa)
						->setCellValue('AA'.$ii, $urut->teknissat->head_pompa)
						->setCellValue('AB'.$ii, $urut->teknissat->tahun_pengadaan)
						->setCellValue('AC'.$ii, $urut->teknissat->listrik)
						->setCellValue('AD'.$ii, $urut->teknissat->genset)
						
						->setCellValue('AE'.$ii, $urut->teknisdua->status_aset)
						->setCellValue('AF'.$ii, $urut->teknisdua->luas_bangunan)
						->setCellValue('AG'.$ii, $urut->teknisdua->jumlah_bangunan)
						->setCellValue('AH'.$ii, $urut->teknisdua->reservoar)
						->setCellValue('AI'.$ii, $urut->teknisdua->hidran_umum)
						->setCellValue('AJ'.$ii, $urut->teknisdua->pj_airbaku)
						->setCellValue('AK'.$ii, $urut->teknisdua->pj_irigasi)
						->setCellValue('AL'.$ii, $urut->teknisdua->sistem_jaringan)
						->setCellValue('AM'.$ii, $urut->teknisdua->jumlah_boxbagi)
						->setCellValue('AN'.$ii, $urut->teknisdua->jumlah_splingker)
						->setCellValue('AO'.$ii, $urut->teknisdua->mt1)
						->setCellValue('AP'.$ii, $urut->teknisdua->mt2)
						->setCellValue('AQ'.$ii, $urut->teknisdua->mt3)
						
						->setCellValue('AR'.$ii, $urut->teknisga->tahun_bangun)
						->setCellValue('AS'.$ii, $urut->teknisga->rehab)
						->setCellValue('AT'.$ii, $urut->teknisga->rencana_rehab)
						->setCellValue('AU'.$ii, $urut->teknisga->nama_lembaga)
						->setCellValue('AV'.$ii, $urut->teknisga->legalitas)
						->setCellValue('AW'.$ii, $urut->teknisga->tahun_berdiri)
						->setCellValue('AX'.$ii, $urut->teknisga->keaktifan)
						->setCellValue('AY'.$ii, $urut->teknisga->jumlah_anggota)
						->setCellValue('AZ'.$ii, $urut->teknisga->no_kontrak)
						->setCellValue('BA'.$ii, $urut->teknisga->status_kelola)
						->setCellValue('BB'.$ii, $urut->teknisga->status_operasi)
						->setCellValue('BC'.$ii, $urut->teknisga->keterangan)
						
						->setCellValue('BD'.$ii, $urut->kondisi->sumur)
						->setCellValue('BE'.$ii, $urut->kondisi->reservoar)
						->setCellValue('BF'.$ii, $urut->kondisi->pompa)
						->setCellValue('BG'.$ii, $urut->kondisi->rumah_pompa)
						->setCellValue('BH'.$ii, $urut->kondisi->hidran_umum)
						->setCellValue('BI'.$ii, $urut->kondisi->saluran_airbaku)
						->setCellValue('BJ'.$ii, $urut->kondisi->saluran_irigasi)
						->setCellValue('BK'.$ii, $urut->kondisi->box_pembagi)
						->setCellValue('BL'.$ii, $urut->kondisi->springkler)
						->setCellValue('BM'.$ii, $urut->kondisi->penggerak)
						
						->setCellValue('BN'.$ii, $urut->info->baku_mutuair)
						->setCellValue('BO'.$ii, $urut->info->konduktivitas)
						->setCellValue('BP'.$ii, $urut->info->nilai_storativitas)
						->setCellValue('BQ'.$ii, $urut->info->nilai_tranmisivitas)
						->setCellValue('BR'.$ii, $urut->info->sumber_pendanaan)
						->setCellValue('BS'.$ii, $urut->info->instansi_pembangun);					
				}
			}
			// Redirect output to a client’s web browser (Excel2007)
		}else if(Yii::app()->user->isGuest){
			$datadatas = self::model()->findAll();
			$ii = 2;
			$objPHPExcel=Yii::createComponent('application.extensions.PHPExcel');
			$objPHPExcel->setActiveSheetIndex(0)
				->mergeCells('A1:M1')
				->setCellValue('A1', 'Data Dasar')
				->setCellValue('A2', 'Nama Sumur')
				->setCellValue('B2', 'No')
				->setCellValue('C2', 'Nama CAT')
				->setCellValue('D2', 'Nama Das')
				->setCellValue('E2', 'Nama WS')
				->setCellValue('F2', 'Provinsi')
				->setCellValue('G2', 'Kota/ Kabupaten')
				->setCellValue('H2', 'Kecamatan')
				->setCellValue('I2', 'Desa')
				->setCellValue('J2', 'Status')
				->setCellValue('K2', 'Manfaat Jiwa')
				->setCellValue('L2', 'Debit / Liter')
				->setCellValue('M2', 'tadah_saatini')
				->setCellValue('N2', 'suplesi_saatini')
				->setCellValue('O2', 'tahun bangun');
			
			foreach ($datadatas as $urut){	
				$ii++;
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$ii, $urut->NoData)
				->setCellValue('B'.$ii, $urut->teknissat->nama_sumur)
				->setCellValue('C'.$ii, $urut->nama_cat)
				->setCellValue('D'.$ii, $urut->nama_das)
				->setCellValue('E'.$ii, $urut->nama_ws)
				->setCellValue('F'.$ii, $urut->provinsi)
				->setCellValue('G'.$ii, $urut->kota)
				->setCellValue('H'.$ii, $urut->kecamatan)
				->setCellValue('I'.$ii, $urut->desa)
				->setCellValue('J'.$ii, $urut->status)
				->setCellValue('K'.$ii, $urut->manfaat->jiwa)
				->setCellValue('L'.$ii, $urut->manfaat->debit)
				->setCellValue('M'.$ii, $urut->manfaat->tadah_saatini)
				->setCellValue('N'.$ii, $urut->manfaat->suplesi_saatini)
				->setCellValue('O'.$ii, $urut->teknisga->tahun_bangun);
			}
		}


		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset(Yii::app()->user->hakAkses) AND Yii::app()->user->hakAkses == User::USER_ADMIN){
			header('Content-Disposition: attachment;filename="Air Tanah '.UnitKerja::getNamaUnitKerjaByAdmin().'.xlsx"');
		}else if(isset(Yii::app()->user->hakAkses) AND Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN){
			header('Content-Disposition: attachment;filename="Air Tanah se-Indonesia.xlsx"');
		}else if(Yii::app()->user->isGuest){
			header('Content-Disposition: attachment;filename="Air Tanah.xlsx"');
		}
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');
		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		unset($objPHPExcel);
	}

	public static function importXls()
    {
		Yii::import('application.extensions.PHPExcel', true);
		$objReader = new PHPExcel_Reader_Excel5;
		if(isset($_FILES['inputatab'])){
			$objPHPExcel = $objReader->load($_FILES['inputatab']['tmp_name']);
			$objWorksheet = $objPHPExcel->getActiveSheet();
			$highestRow = $objWorksheet->getHighestRow(); // e.g. 10
			$highestColumn = $objWorksheet->getHighestColumn(); // e.g 'F'
			$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn); // e.g. 5
			
			for ($row = 9; $row <= $highestRow; ++$row) {
				$sumur = new Sumur;
				$c=-1;
				$sumur->ID_IDBalai=Yii::app()->user->uid;
				$sumur->NamaBalai=Unitkerja::getNamaUnitKerjaByAdmin();
				$sumur->NoData= Sumur::getAvailableNoData();
				++$c;
				$sumur->kodefikasi= $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();					
				$sumur->nama_cat= $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$sumur->nama_das= $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();					
				$sumur->nama_ws= $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$sumur->provinsi= $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$sumur->kota= $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$sumur->kecamatan= $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$sumur->desa= $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$sumur->lintang_selatan= $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$sumur->bujur_timur= $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$sumur->elevasi_sumur= $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$sumur->status= $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$sumur->kriteria="Air Tanah";
				$sumur->save();
				
				$msumur = new ManfaatSumur;
				$msumur->ID=$sumur->ID;
				$msumur->ID_IDBalaiWa=Yii::app()->user->uid;
				$msumur->NoDataWa=$sumur->NoData;
				$msumur->jiwa=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();			
				$msumur->debit=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();						
				$msumur->kecamatan1=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();	
				$msumur->desa1=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();	
				$msumur->tadah_awal=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$msumur->tadah_saatini=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$msumur->suplesi_awal=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$msumur->suplesi_saatini=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$msumur->kecamatan2=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();		
				$msumur->desa2=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$msumur->catchment_area="";
				$msumur->catchment_area1="";
				$msumur->save();

				$tsumur = new TeknisSumur;
				
				$tsumur->ID=$sumur->ID;
				$tsumur->ID_IDBalaiGa=Yii::app()->user->uid;
				$tsumur->NoDataGa=$sumur->NoData;
				$tsumur->nama_sumur=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tsumur->dalam_sumur=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tsumur->jenis_sumur=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tsumur->sistem=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tsumur->jenis_pompa=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tsumur->head_pompa=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tsumur->tahun_pengadaan=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();				
				$tsumur->listrik=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tsumur->genset=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tsumur->solar_cell=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tsumur->lain_lain=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				//$tsumur->debit_andal=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tsumur->debit_awal=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tsumur->his_ID=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tanggal=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tsumur->debit_idle=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tsumur->save();

				$twsumur = new TeknisWaSumur;

				$twsumur->ID=$sumur->ID;
				$twsumur->ID_IDBalaiPat=Yii::app()->user->uid;
				$twsumur->NoDataPat=$sumur->NoData;
				$twsumur->status_aset=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue()+ $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue()+ $objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$twsumur->luas_bangunan=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();	
				$twsumur->jumlah_bangunan=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();					
				$twsumur->pj_airbaku=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$twsumur->reservoar=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$twsumur->hidran_umum=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();				
				$twsumur->pj_irigasi=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$twsumur->sistem_jaringan=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$twsumur->jumlah_boxbagi=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$twsumur->jumlah_splingker=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$twsumur->mt1=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$twsumur->mt2=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$twsumur->mt3=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$twsumur->save();

				$tgsumur = new TeknisGaSumur;

				$tgsumur->ID=$sumur->ID;
				$tgsumur->ID_IDBalaiMa=Yii::app()->user->uid;
				$tgsumur->NoDataMa=$sumur->NoData;
				$tgsumur->tahun_bangun=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tgsumur->rehab=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tgsumur->rencana_rehab=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tgsumur->nama_lembaga=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tgsumur->legalitas=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tgsumur->jumlah_anggota=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tgsumur->tahun_berdiri=$tgsumur->tahun_bangun;
				$tgsumur->keaktifan=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tgsumur->no_kontrak=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tgsumur->status_kelola=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tgsumur->status_operasi=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tgsumur->keterangan=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				$tgsumur->save();


				$tdsumur = new KondisiSumur;
				
				$tdsumur->ID=$sumur->ID;
				$tdsumur->ID_IDBalaiNam=Yii::app()->user->uid;
				$tdsumur->NoDataNam=$sumur->NoData;
				//$tdsumur->sumur=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				//$tdsumur->ket_broncaptering=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				
				//$tdsumur->reservoar=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				//$tdsumur->ket_reservoar=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				
				//$tdsumur->pompa=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				//$tdsumur->ket_pompa=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();

				//$tdsumur->rumah_pompa=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				//$tdsumur->ket_rumah_pompa=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				
				//$tdsumur->hidran_umum=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();	
				//$tdsumur->ket_hidran_umum=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				
				//$tdsumur->saluran_airbaku=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				//$tdsumur->ket_saluran_airbaku=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();

				//$tdsumur->saluran_irigasi=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				//$tdsumur->ket_saluran_irigasi=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();

				//$tdsumur->box_pembagi=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				//$tdsumur->ket_box_pembagi=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();

				//$tdsumur->springkler=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				//$tdsumur->ket_springkler=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();

				//$tdsumur->penggerak=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				//$tdsumur->ket_penggerak=$objWorksheet->getCellByColumnAndRow(++$c, $row)->getValue();
				
				$tdsumur->save();

				
				$isumur = new InfoSumur;
				$isumur->ID=$sumur->ID;
				$isumur->ID_IDBalaiJu=Yii::app()->user->uid;
				$isumur->NoDataJu=$sumur->NoData;
				$isumur->foto1="";
				$isumur->foto2="";
				$isumur->foto3="";
				$isumur->foto4="";
				$isumur->foto5="";
				$isumur->video="";
				$isumur->save();

			}
		}else{
			echo json_encode($_FILES);
		}
	}

	public static function updateSumur(){
		$datadatas = self::model()->findAll();
		$ii = 0;
		$countkondisi = new KondisiSumur;
		$datas= array();
		$jumlah_nilai = 0;
		$valid_data = 0;
		foreach ($datadatas as $dkondisi){
			$nilai = 0; $ii++;
			if(Yii::app()->user->uid == $dkondisi->ID_IDBalai){
				
				if(($dkondisi->kondisi->sumur != "")){
					$datasumur = $dkondisi->kondisi->sumur;
					switch ($datasumur) { 
						case "Rusak Ringan":
							$nilai = $nilai + ((38.65/5) * 0.5); 
							break;
						case "Rusak Berat":
							$nilai = $nilai + 0; 
							break;
						default:
							$nilai = $nilai + (38.65/5); 
					}

					$datareservoar = $dkondisi->kondisi->reservoar;
					switch ($datareservoar) { 
						case "Rusak Ringan":
							$nilai = $nilai + ((38.65/5) * 0.5); 
							break;
						case "Rusak Berat":
							$nilai = $nilai + 0; 
							break;
						default:
							$nilai = $nilai + (38.65/5); 
					}

					$datapompa = $dkondisi->kondisi->pompa;
					switch ($datapompa) { 
						case "Rusak Ringan":
							$nilai = $nilai + ((38.65/5) * 0.5); 
							break;
						case "Rusak Berat":
							$nilai = $nilai + 0; 
							break;
						default:
							$nilai = $nilai + (38.65/5); 
					}
					
					$datarumah = $dkondisi->kondisi->rumah_pompa;
					switch ($datarumah) { 
						case "Rusak Ringan":
							$nilai = $nilai + ((38.65/5) * 0.5); 
							break;
						case "Rusak Berat":
							$nilai = $nilai + 0; 
							break;
						default:
							$nilai = $nilai + (38.65/5); 
					}

					$datapenggerak = $dkondisi->kondisi->penggerak;
					switch ($datapenggerak) { 
						case "Rusak Ringan":
							$nilai = $nilai + ((38.65/5) * 0.5); 
							break;
						case "Rusak Berat":
							$nilai = $nilai + 0; 
							break;
						default:
							$nilai = $nilai + (38.65/5); 
					}
					
					$databox_pembagi = $dkondisi->kondisi->box_pembagi;
					switch ($databox_pembagi) { 
						case "Rusak Ringan":
							$nilai = $nilai + ((29.7/2) * 0.5); 
							break;
						case "Rusak Berat":
							$nilai = $nilai + 0; 
							break;
						default:
							$nilai = $nilai + (29.7/2); 
					}
					$datahidran_umum = $dkondisi->kondisi->hidran_umum;
					switch ($datahidran_umum) { 
						case "Rusak Ringan":
							$nilai = $nilai + ((29.7/2) * 0.5); 
							break;
						case "Rusak Berat":
							$nilai = $nilai + 0; 
							break;
						default:
							$nilai = $nilai + (29.7/2); 
					}
					$datasaluran_airbaku = $dkondisi->kondisi->saluran_airbaku;
					switch ($datasaluran_airbaku) { 
						case "Rusak Ringan":
							$nilai = $nilai + ((31.65/3) * 0.5); 
							break;
						case "Rusak Berat":
							$nilai = $nilai + 0; 
							break;
						default:
							$nilai = $nilai + (31.65/3); 
					}
					$datasaluran_irigasi = $dkondisi->kondisi->saluran_irigasi;
					switch ($datasaluran_irigasi) { 
						case "Rusak Ringan":
							$nilai = $nilai + ((31.65/3) * 0.5); 
							break;
						case "Rusak Berat":
							$nilai = $nilai + 0; 
							break;
						default:
							$nilai = $nilai + (31.65/3); 
					}
					$dataspringkler = $dkondisi->kondisi->springkler;
					switch ($dataspringkler) { 
						case "Rusak Ringan":
							$nilai = $nilai + ((31.65/3) * 0.5); 
							break;
						case "Rusak Berat":
							$nilai = $nilai + 0; 
							break;
						default:
							$nilai = $nilai + (31.65/3); 
					}

					$jumlah_nilai = $jumlah_nilai + $nilai;
					if($nilai > 90){
						KondisiSumur::model()->updateByPk($ii, array('kinerja'=>'Baik'));	
					}
					else if($nilai > 60 and $nilai <= 90){				
						KondisiSumur::model()->updateByPk($ii, array('kinerja'=>'Rusak Ringan'));	
					}else{
						KondisiSumur::model()->updateByPk($ii, array('kinerja'=>'Rusak Berat'));		
					}			
				}
			}	
		}
		Yii::app()->user->setFlash('success', '<strong>Update Selasai!</strong> Anda dapat mengecek hasil perhitungan dikolom Kondisi.');	
	}

}
?>