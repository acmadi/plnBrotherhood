<?php

/**
 * This is the model class for table "divisi".
 *
 * The followings are the available columns in table 'divisi':
 * @property string $username
 * @property string $jumlah_berlangsung
 * @property string $jumlah_selesai
 *
 * The followings are the available model relations:
 * @property User $username0
 * @property Pengadaan[] $pengadaans
 */
class Divisi extends CActiveRecord
{
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
			array('username, jumlah_berlangsung, jumlah_selesai', 'required'),
			array('username', 'length', 'max'=>20),
			array('jumlah_berlangsung, jumlah_selesai', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('username, jumlah_berlangsung, jumlah_selesai', 'safe', 'on'=>'search'),
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
			'username0' => array(self::BELONGS_TO, 'User', 'username'),
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
			'jumlah_berlangsung' => 'Jumlah Berlangsung',
			'jumlah_selesai' => 'Jumlah Selesai',
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
		$criteria->compare('jumlah_berlangsung',$this->jumlah_berlangsung,true);
		$criteria->compare('jumlah_selesai',$this->jumlah_selesai,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}