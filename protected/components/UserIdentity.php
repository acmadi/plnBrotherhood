<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
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
		// kode lokal

		if (Admin::model()->exists('username = "' . $this->username . '"')) {
			$user = Admin::model()->findByAttributes(array('username'=>$this->username));
			if (sha1($this->password) == $user->password) {
				Yii::app()->user->setState('role', 'admin');
				$this->errorCode = self::ERROR_NONE;	
			} else {
				$this->errorCode=self::ERROR_PASSWORD_INVALID;
			}
		} else if (Anggota::model()->exists('username = "' . $this->username . '"')) {
			$user = Anggota::model()->findByAttributes(array('username'=>$this->username));
			if (sha1($this->password) == $user->password) {
				Yii::app()->user->setState('role', 'anggota');
				$this->errorCode = self::ERROR_NONE;	
			} else {
				$this->errorCode=self::ERROR_PASSWORD_INVALID;
			}
		} else if (Panitia::model()->exists('username = "' . $this->username . '" and jenis_panitia = "Pejabat"')) {
			$user = Panitia::model()->findByAttributes(array('username'=>$this->username));
			if (sha1($this->password) == $user->password) {
				Yii::app()->user->setState('role', 'anggota');
				$this->errorCode = self::ERROR_NONE;	
			} else {
				$this->errorCode=self::ERROR_PASSWORD_INVALID;
			}
		} else if (Divisi::model()->exists('username = "' . $this->username . '"')) {
			$user = Divisi::model()->findByAttributes(array('username'=>$this->username));
			if (sha1($this->password) == $user->password) {
				Yii::app()->user->setState('role', 'divisi');
				$this->errorCode = self::ERROR_NONE;	
			} else {
				$this->errorCode=self::ERROR_PASSWORD_INVALID;
			}
		} else if (Kdivmum::model()->exists('username = "' . $this->username . '"')) {
			$user = Kdivmum::model()->findByAttributes(array('username'=>$this->username));
			if (sha1($this->password) == $user->password) {
				Yii::app()->user->setState('role', 'kdivmum');
				$this->errorCode = self::ERROR_NONE;	
			} else {
				$this->errorCode=self::ERROR_PASSWORD_INVALID;
			}
		} else {
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		}


		// kode server

		// if (Admin::model()->exists('username = "' . $this->username . '"')) {
		// 	$user = Admin::model()->findByAttributes(array('username'=>$this->username));
		// 	if (sha1($this->password) == $user->password) {
		// 		Yii::app()->user->setState('role', 'admin');
		// 		$this->errorCode = self::ERROR_NONE;	
		// 	} else {
		// 		$this->errorCode=self::ERROR_PASSWORD_INVALID;
		// 	}
		// } else if (Anggota::model()->exists('username = "' . $this->username . '"')) {
		// 	$options = Yii::app()->params['ldap'];
		// 	$connection = ldap_connect($options['host']);
		// 	ldap_set_option($connection, LDAP_OPT_PROTOCOL_VERSION, 3);
		// 	ldap_set_option($connection, LDAP_OPT_REFERRALS, 0);
		// 	if ($connection) {
		// 		try {
		// 			$bind = @ldap_bind($connection, $options['domain'] . '\\' . $this->username, $this->password);
		// 			if (!$bind) {
		// 				$this->errorCode = self::ERROR_PASSWORD_INVALID;
		// 			} else {
		// 				Yii::app()->user->setState('role', 'anggota');
		// 				$this->errorCode = self::ERROR_NONE;
		// 			}
		// 		} catch (Exception $e) {
		// 			$this->errorCode = self::ERROR_UNKNOWN_IDENTITY;
		// 		}
		// 		ldap_close($connection);
		// 	}
		// } else if (Divisi::model()->exists('username = "' . $this->username . '"')) {
		// 	$user = Divisi::model()->findByAttributes(array('username'=>$this->username));
		// 	if (sha1($this->password) == $user->password) {
		// 		Yii::app()->user->setState('role', 'divisi');
		// 		$this->errorCode = self::ERROR_NONE;	
		// 	} else {
		// 		$this->errorCode=self::ERROR_PASSWORD_INVALID;
		// 	}
		// } else if (Kdivmum::model()->exists('username = "' . $this->username . '"')) {
		// 	$options = Yii::app()->params['ldap'];
		// 	$connection = ldap_connect($options['host']);
		// 	ldap_set_option($connection, LDAP_OPT_PROTOCOL_VERSION, 3);
		// 	ldap_set_option($connection, LDAP_OPT_REFERRALS, 0);
		// 	if ($connection) {
		// 		try {
		// 			$bind = @ldap_bind($connection, $options['domain'] . '\\' . $this->username, $this->password);
		// 			if (!$bind) {
		// 				$this->errorCode = self::ERROR_PASSWORD_INVALID;
		// 			} else {
		// 				Yii::app()->user->setState('role', 'kdivmum');
		// 				$this->errorCode = self::ERROR_NONE;
		// 			}
		// 		} catch (Exception $e) {
		// 			$this->errorCode = self::ERROR_UNKNOWN_IDENTITY;
		// 		}
		// 		ldap_close($connection);
		// 	}
		// } else {
		// 	$this->errorCode = self::ERROR_USERNAME_INVALID;
		// }

		return !$this->errorCode;
	}
}