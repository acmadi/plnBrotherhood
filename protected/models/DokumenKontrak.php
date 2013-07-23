<?php

/**
 * This is the model class for table "dokumen_kontrak".
 *
 * The followings are the available columns in table 'dokumen_kontrak':
 * @property string $id_dokumen
 * @property string $nomor
 * @property string $tanggal_selesai
 * @property integer $nilai_kontrak
 * @property string $nama_direktur
 *
 * The followings are the available model relations:
 * @property Dokumen $idDokumen
 */
class DokumenKontrak extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DokumenKontrak the static model class
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
		return 'dokumen_kontrak';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_dokumen, nomor, tanggal_selesai, nilai_kontrak', 'required'),
			array('nilai_kontrak', 'numerical', 'integerOnly'=>true),
			array('id_dokumen', 'length', 'max'=>32),
			array('nomor', 'length', 'max'=>256),
			array('nama_direktur', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_dokumen, nomor, tanggal_selesai, nilai_kontrak, nama_direktur', 'safe', 'on'=>'search'),
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
			'nomor' => 'Nomor',
			'tanggal_selesai' => 'Tanggal Selesai',
			'nilai_kontrak' => 'Nilai Kontrak',
			'nama_direktur' => 'Nama Direktur',
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
		$criteria->compare('nomor',$this->nomor,true);
		$criteria->compare('tanggal_selesai',$this->tanggal_selesai,true);
		$criteria->compare('nilai_kontrak',$this->nilai_kontrak);
		$criteria->compare('nama_direktur',$this->nama_direktur,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}