<?php

/**
 * This is the model class for table "panitia".
 *
 * The followings are the available columns in table 'panitia':
 * @property string $id_panitia
 * @property string $nama_panitia
 * @property string $SK_panitia
 * @property string $tanggal_sk
 * @property string $status_panitia
 * @property string $jenis_panitia
 *
 * The followings are the available model relations:
 * @property Anggota[] $anggotas
 * @property Pengadaan[] $pengadaans
 */
class Panitia extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Panitia the static model class
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
		return 'panitia';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama_panitia, SK_panitia, tanggal_sk, status_panitia, jenis_panitia', 'required'),
			array('nama_panitia, SK_panitia, status_panitia, jenis_panitia', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_panitia, nama_panitia, SK_panitia, tanggal_sk, status_panitia, jenis_panitia', 'safe', 'on'=>'search'),
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
			'anggotas' => array(self::HAS_MANY, 'Anggota', 'id_panitia'),
			'pengadaans' => array(self::HAS_MANY, 'Pengadaan', 'id_panitia'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_panitia' => 'Id Panitia',
			'nama_panitia' => 'Nama Panitia',
			'SK_panitia' => 'Sk Panitia',
			'tanggal_sk' => 'Tanggal Sk',
			'status_panitia' => 'Status Panitia',
			'jenis_panitia' => 'Jenis Panitia',
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

		$criteria->compare('id_panitia',$this->id_panitia,true);
		$criteria->compare('nama_panitia',$this->nama_panitia,true);
		$criteria->compare('SK_panitia',$this->SK_panitia,true);
		$criteria->compare('tanggal_sk',$this->tanggal_sk,true);
		$criteria->compare('status_panitia',$this->status_panitia,true);
		$criteria->compare('jenis_panitia',$this->jenis_panitia,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchPanitia()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_panitia',$this->id_panitia,true);
		$criteria->compare('nama_panitia',$this->nama_panitia,true);
		$criteria->compare('SK_panitia',$this->SK_panitia,true);
		$criteria->compare('tanggal_sk',$this->tanggal_sk,true);
		$criteria->compare('status_panitia',$this->status_panitia,true);
		$criteria->compare('jenis_panitia',$this->jenis_panitia,true);
		$criteria->addcondition('jenis_panitia = "Panitia"');
		$criteria->addcondition('status_panitia = "Aktif"');

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchPejabat()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_panitia',$this->id_panitia,true);
		$criteria->compare('nama_panitia',$this->nama_panitia,true);
		$criteria->compare('SK_panitia',$this->SK_panitia,true);
		$criteria->compare('tanggal_sk',$this->tanggal_sk,true);
		$criteria->compare('status_panitia',$this->status_panitia,true);
		$criteria->compare('jenis_panitia',$this->jenis_panitia,true);
		$criteria->addcondition('jenis_panitia = "Pejabat"');
		$criteria->addcondition('status_panitia = "Aktif"');

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}