<?php

/**
 * This is the model class for table "t_unitkerja".
 *
 * The followings are the available columns in table 't_unitkerja':
 * @property string $ID_UnitKerja
 * @property string $NamaUnitKerja
 * @property string $ID_Admin
 * @property string $website
 * @property string $Lokasi
 */
class Slideimage extends CActiveRecord
{
	const statusDraft = 'Draft';
	const statusPublished = 'Published';
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UnitKerja the static model class
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
		return 't_gbr';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, judul_gambar, nama_file, status', 'required'),
			array('id', 'length', 'max'=>25),
			array('judul_gambar', 'nama_file', 'length', 'max'=>255),
			array('status','max'=>2),
			array('Gambar',
				  'file', 'types'=>array(
						'jpg','jpeg','png','gif','bmp',
					
				  ),
				  'allowEmpty'=>true,
			),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, judul_gambar', 'safe', 'on'=>'search'),
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
			'admin'=>array(self::BELONGS_TO, 'User', 'id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'id gambar',
			'judul_gambar' => 'Judul/Keterangan',
			'status' => 'Status terbit'
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

		$criteria->compare('judul_gambar',$this->judul_gambar);
		$criteria->compare('id',$this->id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function getUkArea($id)
	{
		$command = Yii::app()->db->createCommand("SELECT * FROM t_gbr WHERE id='$id'");
		
		$query = $command->query();
		
		$data = $query->read();
		
		return $data['area'];
	}

	// mendapatkan ID_User yang tersedia
	public static function getAvailableSlideimageId()
	{
		$criteria = new CDbCriteria;
		$criteria->limit = 1;
		$criteria->order = 'id DESC';

		$lastUnitKerja =self::model()->find(
			$criteria
		);

		if (isset($lastUnitKerja->id))
			return $lastUnitKerja->id + 1;
		else
			return 1;
	}

	/**
	 * Mendapatkan semua administrator
	 */
	public static function lookupSlideimage()
	{
		$gambarslide = self::model()->findAll();

		$_items = array();
		foreach ($gambarslide as $gbrs) 
		{
			$_items[$gbrs->id] = $gbrs->id;
		}

		return $_items;
	}


}
