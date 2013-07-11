<?php

/**
 * This is the model class for table "admin".
 *
 * The followings are the available columns in table 'admin':
 * @property string $username
 * @property string $nama
 * @property string $password
 */
class Admin extends CActiveRecord
{

	public $oldpass;
	public $newpass;
	public $confirmpass;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Admin the static model class
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
		return 'admin';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, nama, password', 'required'),
			array('username', 'length', 'max'=>20),
			array('nama, password', 'length', 'max'=>256),
			array('oldpass, newpass, confirmpass', 'required'),
			array('oldpass', 'check'),
			array('confirmpass', 'check2'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('username, nama, password', 'safe', 'on'=>'search'),
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
			'username' => 'Username',
			'nama' => 'Nama',
			'password' => 'Password',
		);
	}

	public function check($attribute, $params)
	{
		if (sha1($this->oldpass) != $this->attributes['password']) {
			$this->addError($attribute, 'Kata sandi tidak cocok');
		}
	}

	public function check2($attribute, $params)
	{
		if ($this->newpass != $this->confirmpass) {
			$this->addError($attribute, 'Kata sandi baru tidak cocok');
		}
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

		$criteria->compare('username',$this->username,true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('password',$this->password,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function beforeSave()
	{
		if (parent::beforeSave() && !empty($this->newpass) && !empty($this->confirmpass)) {
			Yii::app()->user->name = $this->username;
			$this->password = sha1($this->newpass);
			return true;
		}
		else {
			return false;
		}
	}
}