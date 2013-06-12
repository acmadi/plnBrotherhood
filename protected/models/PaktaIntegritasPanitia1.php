<?php

/**
 * This is the model class for table "pakta_integritas_panitia_1".
 *
 * The followings are the available columns in table 'pakta_integritas_panitia_1':
 * @property string $id_dokumen
 * @property string $kode_panitia
 * @property string $nama
 *
 * The followings are the available model relations:
 * @property Pengadaan $nama0
 * @property Dokumen $idDokumen
 * @property Pengadaan $kodePanitia
 */
class PaktaIntegritasPanitia1 extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PaktaIntegritasPanitia1 the static model class
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
		return 'pakta_integritas_panitia_1';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_dokumen', 'required'),
			array('id_dokumen, nama', 'length', 'max'=>32),
			array('kode_panitia', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_dokumen, kode_panitia, nama', 'safe', 'on'=>'search'),
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
			'nama0' => array(self::BELONGS_TO, 'Pengadaan', 'nama'),
			'idDokumen' => array(self::BELONGS_TO, 'Dokumen', 'id_dokumen'),
			'kodePanitia' => array(self::BELONGS_TO, 'Pengadaan', 'kode_panitia'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_dokumen' => 'Id Dokumen',
			'kode_panitia' => 'Kode Panitia',
			'nama' => 'Nama',
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
		$criteria->compare('kode_panitia',$this->kode_panitia,true);
		$criteria->compare('nama',$this->nama,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}