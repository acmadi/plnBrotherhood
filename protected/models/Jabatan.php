<?php

/**
 * This is the model class for table "jabatan".
 *
 * The followings are the available columns in table 'jabatan':
 * @property integer $id_jabatan
 * @property string $jabatan
 * @property string $kepanjangan
 * @property string $status
 *
 * The followings are the available model relations:
 * @property Kdivmum[] $kdivmums
 */
class Jabatan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Jabatan the static model class
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
		return 'jabatan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('jabatan, kepanjangan, status', 'required'),
			array('jabatan, status', 'length', 'max'=>50),
			array('kepanjangan', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_jabatan, jabatan, kepanjangan, status', 'safe', 'on'=>'search'),
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
			'kdivmums' => array(self::HAS_MANY, 'Kdivmum', 'id_jabatan'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_jabatan' => 'Id Jabatan',
			'jabatan' => 'Jabatan',
			'kepanjangan' => 'Kepanjangan',
			'status' => 'Status',
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

		$criteria->compare('id_jabatan',$this->id_jabatan);
		$criteria->compare('jabatan',$this->jabatan,true);
		$criteria->compare('kepanjangan',$this->kepanjangan,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchJabatan()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_jabatan',$this->id_jabatan);
		$criteria->compare('jabatan',$this->jabatan,true);
		$criteria->compare('kepanjangan',$this->kepanjangan,true);
		$criteria->compare('status',$this->status,true);
		$criteria->addcondition('status = "Aktif"');

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}