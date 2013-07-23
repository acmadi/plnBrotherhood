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
		$role = 'none';
		$isAdmin = false;
		$asAdmin = false;

		// kode lokal
		
		if (Anggota::model()->exists('username = "' . $this->username . '" and status_user = "Aktif"')) {
			$user = Anggota::model()->findByAttributes(array('username'=>$this->username));
			if (sha1($this->password) == $user->password) {
				$role = 'anggota';
				$this->errorCode = self::ERROR_NONE;
			} else {
				$this->errorCode=self::ERROR_PASSWORD_INVALID;
			}
		} else if (UserDivisi::model()->exists('username = "' . $this->username . '"')) {
			$user = UserDivisi::model()->findByAttributes(array('username'=>$this->username));
			if (sha1($this->password) == $user->password) {
				$role = 'divisi';
				$this->errorCode = self::ERROR_NONE;
			} else {
				$this->errorCode=self::ERROR_PASSWORD_INVALID;
			}
		} else if (Kdivmum::model()->exists('username = "' . $this->username . '" and status_user = "Aktif"')) {
			$user = Kdivmum::model()->findByAttributes(array('username'=>$this->username));
			if (sha1($this->password) == $user->password) {
				$role = 'kdivmum';
				$this->errorCode = self::ERROR_NONE;
			} else {
				$this->errorCode=self::ERROR_PASSWORD_INVALID;
			}
		} else {
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		}

		// kode server
		
		// if (Anggota::model()->exists('username = "' . $this->username . '"')) {
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
		// 				$role = 'anggota';
		// 				$this->errorCode = self::ERROR_NONE;
		// 			}
		// 		} catch (Exception $e) {
		// 			$this->errorCode = self::ERROR_UNKNOWN_IDENTITY;
		// 		}
		// 		ldap_close($connection);
		// 	}
		// } else if (UserDivisi::model()->exists('username = "' . $this->username . '"')) {
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
		// 				$role = 'divisi';
		// 				$this->errorCode = self::ERROR_NONE;
		// 			}
		// 		} catch (Exception $e) {
		// 			$this->errorCode = self::ERROR_UNKNOWN_IDENTITY;
		// 		}
		// 		ldap_close($connection);
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
		// 				$role = 'kdivmum';
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

		if (Admin::model()->exists('username = "' . $this->username . '"')) {
			$isAdmin = true;
			if ($role == 'none') {
				$asAdmin = true;
			}
		}

		Yii::app()->user->setState('role', $role);
		Yii::app()->user->setState('isAdmin', $isAdmin);
		Yii::app()->user->setState('asAdmin', $asAdmin);

		return !$this->errorCode;
	}
}