<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    private $_id;
    public $_hakAkses;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		/*$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);*/

        $username=strtolower($this->username);

        $user=User::model()->find('LOWER(Nama)=?',array($username));

        if($user===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if(!$user->validatePassword($this->password))
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else
        {
            $this->_id=$user->ID_User;

            $this->setState('hakAkses', $user->HakAkses);
            $this->setState('uid', $user->ID_User);
            $this->setState('username',$user->Nama);

            $this->errorCode=self::ERROR_NONE;
        }

        return $this->errorCode==self::ERROR_NONE;
	}
}
