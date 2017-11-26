<?php

class Peraturan extends CActiveRecord
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
		return 't_peraturan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NamaPeraturan, NoPeraturan, status, Tanggal, Link', 'required'),
			array('Tanggal', 'numerical', 'integerOnly'=>true),
				array('Link',
				  'file', 'types'=>array(
						'pdf',
					
				  ),
				  'allowEmpty'=>true,
			),	
			array('Kategori, NamaPeraturan, NoPeraturan, status, Link', 'length', 'max'=>255),
			array('status', 'length', 'max'=>2),
			array('ID, Kategori, NamaPeraturan, status, Tanggal, Link, Deskripsi', 'safe', 'on'=>'search'),
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
			'NoPeraturan' => 'No Peraturan',
			'NamaPeraturan' => 'Nama Peraturan',
			'status' => 'Status Terbit',
			'Tanggal' => 'Tanggal',
			'Link' => 'Link File',
			'Deskripsi' => 'Deskripsi',
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
		$criteria->compare('NoPeraturan',$this->NoPeraturan,true);
		$criteria->compare('NamaPeraturan',$this->NamaPeraturan,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('Tanggal',$this->Tanggal);
		$criteria->compare('Link',$this->Link,true);
		$criteria->compare('Deskripsi',$this->Deskripsi,true);


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
}