<?php

/**
 * This is the model class for table "anggota".
 *
 * The followings are the available columns in table 'anggota':
 * @property string $username
 * @property string $NIP
 * @property string $email
 * @property string $kode_panitia
 *
 * The followings are the available model relations:
 * @property Panitia $kodePanitia
 * @property User $username0
 */
class Anggota extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Anggota the static model class
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
		return 'anggota';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, NIP, email, kode_panitia', 'required'),
			array('username', 'length', 'max'=>20),
			array('NIP, email', 'length', 'max'=>32),
			array('kode_panitia', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('username, NIP, email, kode_panitia', 'safe', 'on'=>'search'),
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
			'kodePanitia' => array(self::BELONGS_TO, 'Panitia', 'kode_panitia'),
			'username0' => array(self::BELONGS_TO, 'User', 'username'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'username' => 'Username',
			'NIP' => 'Nip',
			'email' => 'Email',
			'kode_panitia' => 'Kode Panitia',
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

		$criteria->compare('username',$this->username,true);
		$criteria->compare('NIP',$this->NIP,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('kode_panitia',$this->kode_panitia,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}