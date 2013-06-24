<?php

/**
 * This is the model class for table "termin".
 *
 * The followings are the available columns in table 'termin':
 * @property string $id_termin
 * @property string $id_dokumen
 * @property integer $nomor_termin
 * @property string $tipe
 * @property string $nilai
 * @property string $user
 * @property string $deadline_termin
 * @property string $status_termin
 * @property string $link
 *
 * The followings are the available model relations:
 * @property User $user0
 * @property DokumenKontrak $idDokumen
 */
class Termin extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Termin the static model class
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
		return 'termin';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_termin, id_dokumen, nomor_termin, tipe, nilai, user, deadline_termin, status_termin, link', 'required'),
			array('nomor_termin', 'numerical', 'integerOnly'=>true),
			array('id_termin, id_dokumen, nilai, user', 'length', 'max'=>32),
			array('tipe, status_termin', 'length', 'max'=>20),
			array('link', 'length', 'max'=>1000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_termin, id_dokumen, nomor_termin, tipe, nilai, user, deadline_termin, status_termin, link', 'safe', 'on'=>'search'),
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
			'user0' => array(self::BELONGS_TO, 'User', 'user'),
			'idDokumen' => array(self::BELONGS_TO, 'DokumenKontrak', 'id_dokumen'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_termin' => 'Id Termin',
			'id_dokumen' => 'Id Dokumen',
			'nomor_termin' => 'Nomor Termin',
			'tipe' => 'Tipe',
			'nilai' => 'Nilai',
			'user' => 'User',
			'deadline_termin' => 'Deadline Termin',
			'status_termin' => 'Status Termin',
			'link' => 'Link',
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

		$criteria->compare('id_termin',$this->id_termin,true);
		$criteria->compare('id_dokumen',$this->id_dokumen,true);
		$criteria->compare('nomor_termin',$this->nomor_termin);
		$criteria->compare('tipe',$this->tipe,true);
		$criteria->compare('nilai',$this->nilai,true);
		$criteria->compare('user',$this->user,true);
		$criteria->compare('deadline_termin',$this->deadline_termin,true);
		$criteria->compare('status_termin',$this->status_termin,true);
		$criteria->compare('link',$this->link,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}