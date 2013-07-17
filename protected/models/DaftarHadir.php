<?php

/**
 * This is the model class for table "daftar_hadir".
 *
 * The followings are the available columns in table 'daftar_hadir':
 * @property string $id_dokumen
 * @property string $jam
 * @property string $tempat_hadir
 * @property string $acara
 *
 * The followings are the available model relations:
 * @property Dokumen $idDokumen
 */
class DaftarHadir extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DaftarHadir the static model class
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
		return 'daftar_hadir';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_dokumen, jam, tempat_hadir, acara', 'required','message'=>'{attribute} tidak boleh kosong'),
			array('id_dokumen', 'length', 'max'=>32),
			array('jam', 'length', 'max'=>10),
			array('tempat_hadir, acara', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_dokumen, jam, tempat_hadir, acara', 'safe', 'on'=>'search'),
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
			'idDokumen' => array(self::BELONGS_TO, 'Dokumen', 'id_dokumen'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_dokumen' => 'Id Dokumen',
			'jam' => 'Jam',
			'tempat_hadir' => 'Tempat Hadir',
			'acara' => 'Acara',
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

		$criteria->compare('id_dokumen',$this->id_dokumen,true);
		$criteria->compare('jam',$this->jam,true);
		$criteria->compare('tempat_hadir',$this->tempat_hadir,true);
		$criteria->compare('acara',$this->acara,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}