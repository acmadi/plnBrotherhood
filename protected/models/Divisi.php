<?php

/**
 * This is the model class for table "divisi".
 *
 * The followings are the available columns in table 'divisi':
 * @property string $id_divisi
 * @property string $nama_singkat
 * @property string $nama_divisi
 *
 * The followings are the available model relations:
 * @property Pengadaan[] $pengadaans
 * @property UserDivisi[] $userDivisis
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
			array('nama_singkat, nama_divisi', 'required'),
			array('nama_singkat, nama_divisi', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_divisi, nama_singkat, nama_divisi', 'safe', 'on'=>'search'),
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
			'userDivisis' => array(self::HAS_MANY, 'UserDivisi', 'divisi'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_divisi' => 'Id Divisi',
			'nama_singkat' => 'Nama Singkat',
			'nama_divisi' => 'Nama Divisi',
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

		$criteria->compare('id_divisi',$this->id_divisi,true);
		$criteria->compare('nama_singkat',$this->nama_singkat,true);
		$criteria->compare('nama_divisi',$this->nama_divisi,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}