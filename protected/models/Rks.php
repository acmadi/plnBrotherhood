<?php

/**
 * This is the model class for table "rks".
 *
 * The followings are the available columns in table 'rks':
 * @property string $id_dokumen
 * @property string $nomor
 * @property string $tanggal_permintaan_penawaran
 * @property string $tanggal_penjelasan
 * @property string $waktu_penjelasan
 * @property string $tempat_penjelasan
 * @property string $tanggal_pemasukan_penawaran
 * @property string $waktu_pemasukan_penawaran
 * @property string $tempat_pemasukan_penawaran
 * @property string $tanggal_negosiasi
 * @property string $waktu_negosiasi
 * @property string $tempat_negosiasi
 * @property string $tanggal_penetapan_pemenang
 * @property string $waktu_penetapan_pemenang
 * @property string $tempat_penetapan_pemenang
 *
 * The followings are the available model relations:
 * @property BeritaAcaraEvaluasiPenawaran[] $beritaAcaraEvaluasiPenawarans
 * @property Dokumen $idDokumen
 */
class Rks extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Rks the static model class
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
		return 'rks';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_dokumen, nomor, tanggal_permintaan_penawaran, tanggal_penjelasan, waktu_penjelasan, tempat_penjelasan, tanggal_pemasukan_penawaran, waktu_pemasukan_penawaran, tempat_pemasukan_penawaran, tanggal_negosiasi, waktu_negosiasi, tempat_negosiasi, tanggal_penetapan_pemenang, waktu_penetapan_pemenang, tempat_penetapan_pemenang', 'required'),
			array('id_dokumen', 'length', 'max'=>32),
			array('nomor', 'length', 'max'=>50),
			array('waktu_penjelasan, waktu_pemasukan_penawaran, waktu_negosiasi, waktu_penetapan_pemenang', 'length', 'max'=>20),
			array('tempat_penjelasan, tempat_pemasukan_penawaran, tempat_negosiasi, tempat_penetapan_pemenang', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_dokumen, nomor, tanggal_permintaan_penawaran, tanggal_penjelasan, waktu_penjelasan, tempat_penjelasan, tanggal_pemasukan_penawaran, waktu_pemasukan_penawaran, tempat_pemasukan_penawaran, tanggal_negosiasi, waktu_negosiasi, tempat_negosiasi, tanggal_penetapan_pemenang, waktu_penetapan_pemenang, tempat_penetapan_pemenang', 'safe', 'on'=>'search'),
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
			'beritaAcaraEvaluasiPenawarans' => array(self::HAS_MANY, 'BeritaAcaraEvaluasiPenawaran', 'no_RKS'),
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
			'tanggal_permintaan_penawaran' => 'Tanggal Permintaan Penawaran',
			'tanggal_penjelasan' => 'Tanggal Penjelasan',
			'waktu_penjelasan' => 'Waktu Penjelasan',
			'tempat_penjelasan' => 'Tempat Penjelasan',
			'tanggal_pemasukan_penawaran' => 'Tanggal Pemasukan Penawaran',
			'waktu_pemasukan_penawaran' => 'Waktu Pemasukan Penawaran',
			'tempat_pemasukan_penawaran' => 'Tempat Pemasukan Penawaran',
			'tanggal_negosiasi' => 'Tanggal Negosiasi',
			'waktu_negosiasi' => 'Waktu Negosiasi',
			'tempat_negosiasi' => 'Tempat Negosiasi',
			'tanggal_penetapan_pemenang' => 'Tanggal Penetapan Pemenang',
			'waktu_penetapan_pemenang' => 'Waktu Penetapan Pemenang',
			'tempat_penetapan_pemenang' => 'Tempat Penetapan Pemenang',
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
		$criteria->compare('tanggal_permintaan_penawaran',$this->tanggal_permintaan_penawaran,true);
		$criteria->compare('tanggal_penjelasan',$this->tanggal_penjelasan,true);
		$criteria->compare('waktu_penjelasan',$this->waktu_penjelasan,true);
		$criteria->compare('tempat_penjelasan',$this->tempat_penjelasan,true);
		$criteria->compare('tanggal_pemasukan_penawaran',$this->tanggal_pemasukan_penawaran,true);
		$criteria->compare('waktu_pemasukan_penawaran',$this->waktu_pemasukan_penawaran,true);
		$criteria->compare('tempat_pemasukan_penawaran',$this->tempat_pemasukan_penawaran,true);
		$criteria->compare('tanggal_negosiasi',$this->tanggal_negosiasi,true);
		$criteria->compare('waktu_negosiasi',$this->waktu_negosiasi,true);
		$criteria->compare('tempat_negosiasi',$this->tempat_negosiasi,true);
		$criteria->compare('tanggal_penetapan_pemenang',$this->tanggal_penetapan_pemenang,true);
		$criteria->compare('waktu_penetapan_pemenang',$this->waktu_penetapan_pemenang,true);
		$criteria->compare('tempat_penetapan_pemenang',$this->tempat_penetapan_pemenang,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}