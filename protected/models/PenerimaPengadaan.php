<?php

/**
 * This is the model class for table "penerima_pengadaan".
 *
 * The followings are the available columns in table 'penerima_pengadaan':
 * @property string $perusahaan
 * @property string $status
 * @property string $id_pengadaan
 * @property string $alamat
 * @property string $npwp
 *
 * The followings are the available model relations:
 * @property Pengadaan $idPengadaan
 */
class PenerimaPengadaan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PenerimaPengadaan the static model class
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
		return 'penerima_pengadaan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('perusahaan, status, id_pengadaan', 'required'),
			array('perusahaan, alamat, npwp', 'length', 'max'=>256),
			array('status', 'length', 'max'=>20),
			array('id_pengadaan', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('perusahaan, status, id_pengadaan, alamat, npwp', 'safe', 'on'=>'search'),
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
			'idPengadaan' => array(self::BELONGS_TO, 'Pengadaan', 'id_pengadaan'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'perusahaan' => 'Perusahaan',
			'status' => 'Status',
			'id_pengadaan' => 'Id Pengadaan',
			'alamat' => 'Alamat',
			'npwp' => 'Npwp',
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

		$criteria->compare('perusahaan',$this->perusahaan,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('id_pengadaan',$this->id_pengadaan,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('npwp',$this->npwp,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}