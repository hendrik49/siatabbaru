<?php

class Video extends CActiveRecord
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
		return 't_video';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NamaVideo, Tanggal, Deskripsi', 'required'),
			array('Tanggal', 'numerical', 'integerOnly'=>true),
				array('Link',
				  'file', 'types'=>array(
						'mp4','3gp',
					
				  ), 'maxSize' => 1024 * 1024 * 5000, 'tooLarge'=>'File has to be smaller than 50MB',
				  'allowEmpty'=>true,
			),	
			
			array('Kategori, NamaVideo, Link, Youtube', 'length', 'max'=>255),
			array('ID, Kategori, NamaVideo, Tanggal, Link, Youtube, Deskripsi', 'safe', 'on'=>'search'),
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
			'Kategori' => 'Kategori',
			'NamaVideo' => 'Nama Video',
			'Tanggal' => 'Tanggal',
			'Link' => 'Nama File',
			'Deskripsi' => 'Deskripsi',
			'Youtube' => 'Link Youtube',
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
		$criteria->compare('Kategori',$this->Kategori);
		$criteria->compare('NamaVideo',$this->NamaVideo,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('Tanggal',$this->Tanggal);
		$criteria->compare('Link',$this->Link,true);
		$criteria->compare('Deskripsi',$this->Deskripsi);
		$criteria->compare('Youtube',$this->Youtube);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}