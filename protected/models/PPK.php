<?php

class PPK extends CActiveRecord
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
		return 't_ppk';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Nama, Alamat, Golongan', 'required'),
			//array('Tanggal', 'numerical', 'integerOnly'=>true),
			array('Nama, Email, Golongan, Dokumen', 'length', 'max'=>60),
			array('Alamat, Foto', 'length', 'max'=>255),
			array('NoTelp', 'length', 'max'=>14),
			array('NIP', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Nama, Email, Golongan, NoTelp, NIP', 'safe', 'on'=>'search'),
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
		);
	}
	
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'Nama' => 'Nama Satker',
			'NIP' => 'Nomor Induk Satker',
			'Alamat' => 'Alamat',
			'Email' => 'E-mail',
			'NoTelp' => 'Nomor Telepon',
			'Dokumen' => 'Dokumen SK',
			'Foto' => 'Foto Profil',
			'Golongan' => 'Golongan / Jabatan',
			
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
		$criteria->compare('Nama',$this->Nama,true);
		$criteria->compare('Alamat',$this->Alamat,true);
		$criteria->compare('Golongan',$this->Golongan,true);
		$criteria->compare('NIP',$this->NIP);
		$criteria->compare('Dokumen',$this->Dokumen);
		$criteria->compare('Foto',$this->Foto);
		$criteria->compare('Email',$this->Email);
		
		if (Yii::app()->user->hakAkses == User::USER_ADMIN) {
			$criteria->compare('Administrator', Yii::app()->user->name);
		}
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => array(
				'pageSize' => 5,
		   	),
			'sort'=>array(
				'defaultOrder'=>'Tanggal DESC',
			)
		));
	}
	
	public static function getLinkFoto()
	{
		$datafoto = self::model()->findAll();
		$_items = array();
		//$linkfoto = array();
		foreach ($datafoto as $dfot) 
		{
			
			$_items[$dfot->ID] = Yii::app()->request->baseUrl.'/data/PPK/'.$dfot->Foto;
			//$linkfoto = Yii::app()->request->baseUrl.'/data/PPK/' . $_items[$dfot];
		}
		//
		
		return $_items;
	}	
	
}

class TestForm extends CFormModel
{
	public $textField;
	public $password;
	public $textarea;
	public $dropdown;
	public $multiDropdown;
	public $checkbox;
	public $checkboxes;
	public $inlineCheckboxes;
	public $radioButton;
	public $radioButtons;
	public $inlineRadioButtons;
	public $fileField;
	public $uneditable;
	public $disabled;
	public $prepend;
	public $append;
	public $disabledCheckbox;
	public $captcha;
}