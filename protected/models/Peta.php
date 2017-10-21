<?php

/**
 * This is the model class for table "t_peta".
 *
 * The followings are the available columns in table 't_peta':
 * @property integer $ID
 * @property integer $ID_Admin
 * @property integer $Tanggal
 * @property string $NamaPeta
 * @property string $File
 * @property string $Tipe
 * @property integer $Status
 */
class Peta extends CActiveRecord
{
	const petaKHDTK = 'Peta KHDTK';

	const statusDraft = 'Draft';
	const statusPublished = 'Published';

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Peta the static model class
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
		return 't_peta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Administrator, Tanggal, NamaPeta, Status', 'required'),
			array('Tanggal', 'numerical', 'integerOnly'=>true),
			array('FilePeta1, FilePeta2', 'file', 'types'=>array('dbf', 'shp'), 'allowEmpty'=>true),
			array('Jenis', 'length', 'max'=>13),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, Administrator, Tanggal, NamaPeta, Status', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID Peta',
			'Administrator' => 'Administrator',
			'Tanggal' => 'Tanggal',
			'NamaPeta' => 'Nama Peta',
			'Status' => 'Status',
			'FilePeta1' => 'File Peta (SHP)',
			'FilePeta2' => 'File Peta (DBF)',
			'Jenis'=>'Jenis Peta (Geometris)',
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
		//$criteria->compare('Administrator',$this->Administrator, true);
		//$criteria->compare('Tanggal',$this->Tanggal,true);
		$criteria->compare('NamaPeta',$this->NamaPeta,true);
		/*$criteria->compare('FilePeta1',$this->FilePeta1,true);
		$criteria->compare('FilePeta2',$this->FilePeta2,true);
		$criteria->compare('FilePeta3',$this->FilePeta3,true);

		$criteria->compare('Jenis',$this->Jenis,true);
		$criteria->compare('Status',$this->Status);

		$criteria->compare('Keterangan',$this->Keterangan,true);
		*/
		if (Yii::app()->user->hakAkses == User::USER_ADMIN) {
			$criteria->compare('Administrator', Yii::app()->user->name);
		}

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'Tanggal DESC',
			),
		));
	}

}