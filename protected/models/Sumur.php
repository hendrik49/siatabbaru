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
			array('Tanggal, manfaat_jiwa, debit_liter', 'numerical', 'integerOnly'=>true),
			/* ------------Data Numerical Control------------*/
			array('ID_IDBalai, NoData, kodefikasi', 'length', 'max'=>15),
			/* ------------Data Dasar & Administrasi------------*/
			array('nama_das, nama_ws, nama_cat', 'length', 'max'=>100),
			array('provinsi, kota, kecamatan, desa, status, info_gambar', 'length', 'max'=>100),
			array('bujur_timur, lintang_selatan', 'length', 'max'=>20),
			array('elevasi_sumur', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('provinsi, nama_das, kota, kecamatan, 
			manfaat_jiwa, debit_liter, Nama_sumur, nama_prov, n_prov, kondisi_sumur,nama_lembaga, tahun_bangun, status_aset', 
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
			'kotas'=>array(self::BELONGS_TO, 'Kota', 'provinsi'),
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
			'nama_prov'=>'Nama Kabupaten',
			'n_prov' =>'id prov',
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
			'kotas'=>array('select'=>'id_prov, provinsi'),
		);
		$criteria->compare('manfaat.jiwa',$this->manfaat_jiwa, true);
		$criteria->compare('manfaat.debit',$this->debit_liter, true);
		$criteria->compare('teknissat.nama_sumur',$this->Nama_sumur, true);
		$criteria->compare('kondisi.sumur',$this->kondisi_sumur, true);
		$criteria->compare('teknisdua.status_aset',$this->status_aset, true);
		$criteria->compare('teknisga.tahun_bangun',$this->tahun_bangun, true);
		$criteria->compare('teknisga.nama_lembaga',$this->nama_lembaga, true);
		$criteria->compare('kotas.id_prov',$this->nama_prov, true);
		$criteria->compare('kotas.provinsi',$this->n_prov, true);
		//$criteria->compare('nama_das',$this->nama_das, true);
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
						'Nama_sumur'=>array('asc'=>'teknissat.nama_sumur', 'desc'=>'teknissat.nama_sumur'),
						'kondisi_sumur'=>array('asc'=>'kondisi.sumur', 'desc'=>'kondisi.sumur'),
						'tahun_bangun'=>array('asc'=>'teknisga.tahun_bangun', 'desc'=>'teknisga.tahun_bangun'),
						'nama_prov'=>array('asc'=>'kotas.id_prov', 'desc'=>'kotas.id_prov'),
						
						'*',
					),
				),
				'pagination' => array(
					'pageSize' => 6,
				),

			));		
		}
	}
	
	public function getSearch()
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
		return $criteria;

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
		$datadatas = self::model()->search()->getData();
		$ii = 1;
        $objPHPExcel=Yii::createComponent('application.extensions.PHPExcel');
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'No')
                    ->setCellValue('B1', 'Kodefikasi')
                    ->setCellValue('C1', 'Nama CAT')
					->setCellValue('D1', 'Nama Das')
					->setCellValue('E1', 'Nama WS')
					->setCellValue('F1', 'Provinsi')
                    ->setCellValue('G1', 'Kota/ Kabupaten')
                    ->setCellValue('H1', 'Kecamatan')
					->setCellValue('I1', 'Desa')
					->setCellValue('J1', 'LS')
					->setCellValue('K1', 'BT')
                    ->setCellValue('L1', 'Elevasi Sumur');
	/*	foreach ($datadatas as $urut){	
					->setCellValue('A'$ii, $urut->NoData)
					->setCellValue('B'$ii, $urut->kodefikasi)
					->setCellValue('C'$ii, $urut->nama_cat)
					->setCellValue('D'$ii, $urut->nama_das)
					->setCellValue('E'$ii, $urut->nama_ws)
					->setCellValue('F'$ii, $urut->provinsi)
					->setCellValue('G'$ii, $urut->kota)
					->setCellValue('H'$ii, $urut->kecamatan)
					->setCellValue('I'$ii, $urut->desa)
					->setCellValue('J'$ii, $urut->lintang_selatan)
					->setCellValue('K'$ii, $urut->bujur_timur)
					->setCellValue('L'$ii, $urut->elevasi_sumur)
		}

	*/
        // Redirect output to a client’s web browser (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="contohkita.xlsx"');
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

}
?>