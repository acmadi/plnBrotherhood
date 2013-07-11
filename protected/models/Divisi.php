<?php

/**
 * This is the model class for table "divisi".
 *
 * The followings are the available columns in table 'divisi':
 * @property string $username
 * @property string $nama_divisi
 * @property string $password
 *
 * The followings are the available model relations:
 * @property Pengadaan[] $pengadaans
 */
class Divisi extends CActiveRecord
{

	public $oldpass;
	public $newpass;
	public $confirmpass;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Divisi the static model class
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
		return 'divisi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, nama_divisi, password', 'required'),
			array('username', 'length', 'max'=>20),
			array('nama_divisi, password', 'length', 'max'=>256),
			array('oldpass, newpass, confirmpass', 'required'),
			array('oldpass', 'check'),
			array('confirmpass', 'check2'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('username, nama_divisi, password', 'safe', 'on'=>'search'),
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
			'pengadaans' => array(self::HAS_MANY, 'Pengadaan', 'divisi_peminta'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'username' => 'Username',
			'nama_divisi' => 'Nama Divisi',
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
		$criteria->compare('nama_divisi',$this->nama_divisi,true);
		$criteria->compare('password',$this->password,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function beforeSave()
	{
		if (parent::beforeSave() && !empty($this->newpass) && !empty($this->confirmpass)) {
			$this->password = sha1($this->newpass);
			return true;
		}
		else {
			return false;
		}
	}
}