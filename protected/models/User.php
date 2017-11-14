<?php

/**
 * This is the model class for table "t_user".
 *
 * The followings are the available columns in table 't_user':
 * @property string $ID_User
 * @property string $Nama
 * @property string $Password
 * @property string $HakAkses
 */
class User extends CActiveRecord
{
	// definisikan tipe user / hak akses
	const USER_SUPER_ADMIN = 'Super Administrator'; // super administrator
	const USER_ADMIN = 'Administrator'; // administrator biasa
	const USER_DEFAULT = 'User'; // user biasa / tidak login

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 't_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Nama, Password, HakAkses', 'required'),
			array('ID_User', 'length', 'max'=>25),
			array('Nama, Password, HakAkses', 'length', 'max'=>255),
			array('Nama', 'unique'),
			array('Password', 'compare', 'compareAttribute'=>'Nama', 'operator'=>'!='),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_User, Nama, Password, HakAkses', 'safe', 'on'=>'search'),
		);
	}

	public function validateUsernamePassword($attribute, $params)
	{

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
			'ID_User' => 'User ID (Automatic)',
			'Nama' => 'Nama / Username',
			'Password' => 'Password',
			'HakAkses' => 'Hak Akses',
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

		$criteria->compare('ID_User',$this->ID_User,true);
		$criteria->compare('Nama',$this->Nama,true);
		$criteria->compare('Password',$this->Password,true);
		$criteria->compare('HakAkses',$this->HakAkses,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Checks if the given password is correct.
	 * @param string the password to be validated
	 * @return boolean whether the password is valid
	 */
	public function validatePassword($password)
	{
		return $password===$this->Password;
	}

	// mendapatkan ID_User yang tersedia
	public static function getAvailableUserId()
	{
		$criteria = new CDbCriteria;
		$criteria->limit = 1;
		$criteria->order = 'ID_User DESC';

		$lastUser =self::model()->find(
			$criteria
		);

		if (isset($lastUser->ID_User))
			return $lastUser->ID_User + 1;
		else
			return 1;
	}

	/**
	 * Mendapatkan tipe-tipe user untuk ditampilkan oleh combobox hak akses
	 */
	public static function lookupHakAkses()
	{
		return array(
			self::USER_SUPER_ADMIN => self::USER_SUPER_ADMIN,
			self::USER_ADMIN => self::USER_ADMIN,
			//self::USER_DEFAULT => self::USER_DEFAULT,
		);
	}

	/**
	 * Mendapatkan semua administrator
	 */
	public static function lookupUsers()
	{
		$users = self::model()->findAll();

		$_items = array();
		foreach ($users as $user) 
		{
			$_items[$user->ID_User] = $user->Nama . ' (' . $user->HakAkses . ')';
		}

		return $_items;
	}

	public function getAccess($access)
	{
		if ($access == self::USER_SUPER_ADMIN)
			return 'Super Administrator';
		elseif ($access == self::USER_ADMIN)
			return 'Administrator';
	}

	public static function getUsers()
	{
		$dataReader = Yii::app()->db->createCommand("SELECT * FROM t_user")->query();

		$items = array();
		$items['admin'] = array();
		$items['superAdmin'] = array();

		foreach ($dataReader as $row)
		{
			if ($row['HakAkses'] == self::USER_SUPER_ADMIN)
				array_push($items['superAdmin'], $row['Nama']);
			elseif ($row['HakAkses'] == self::USER_ADMIN)
				array_push($items['admin'], $row['Nama']);

		}		
		return $items;		
	}
	
	public static function lookupIDUsers()
	{
		
		$users = self::model()->findAll();
		$_items = array();
		foreach ($users as $user) 
		{
			$_items[$user->ID_User] = $user->ID_User;
		}

		return $_items;
	}
}
