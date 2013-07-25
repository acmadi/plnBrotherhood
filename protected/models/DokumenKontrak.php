<?php

/**
 * This is the model class for table "dokumen_kontrak".
 *
 * The followings are the available columns in table 'dokumen_kontrak':
 * @property string $id_dokumen
 * @property string $username
 * @property string $nomor
 * @property string $tanggal_mulai
 * @property string $tanggal_selesai
 * @property integer $jangka_waktu
 * @property string $nilai_kontrak
 * @property string $lokasi_file
 * @property string $no_rek
 * @property string $jenis_kontrak
 *
 * The followings are the available model relations:
 * @property Dokumen $idDokumen
 * @property UserKontrak $username0
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
			array('id_dokumen, username, nomor, tanggal_mulai, tanggal_selesai, jangka_waktu, nilai_kontrak, lokasi_file, no_rek, jenis_kontrak', 'required'),
			array('jangka_waktu', 'numerical', 'integerOnly'=>true),
			array('id_dokumen', 'length', 'max'=>32),
			array('username, nomor, lokasi_file, no_rek', 'length', 'max'=>256),
			array('nilai_kontrak', 'length', 'max'=>20),
			array('jenis_kontrak', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_dokumen, username, nomor, tanggal_mulai, tanggal_selesai, jangka_waktu, nilai_kontrak, lokasi_file, no_rek, jenis_kontrak', 'safe', 'on'=>'search'),
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
			'username0' => array(self::BELONGS_TO, 'UserKontrak', 'username'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_dokumen' => 'Id Dokumen',
			'username' => 'Username',
			'nomor' => 'Nomor',
			'tanggal_mulai' => 'Tanggal Mulai',
			'tanggal_selesai' => 'Tanggal Selesai',
			'jangka_waktu' => 'Jangka Waktu',
			'nilai_kontrak' => 'Nilai Kontrak',
			'lokasi_file' => 'Lokasi File',
			'no_rek' => 'No Rek',
			'jenis_kontrak' => 'Jenis Kontrak',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('nomor',$this->nomor,true);
		$criteria->compare('tanggal_mulai',$this->tanggal_mulai,true);
		$criteria->compare('tanggal_selesai',$this->tanggal_selesai,true);
		$criteria->compare('jangka_waktu',$this->jangka_waktu);
		$criteria->compare('nilai_kontrak',$this->nilai_kontrak,true);
		$criteria->compare('lokasi_file',$this->lokasi_file,true);
		$criteria->compare('no_rek',$this->no_rek,true);
		$criteria->compare('jenis_kontrak',$this->jenis_kontrak,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}