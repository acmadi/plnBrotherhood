<?php

/**
 * This is the model class for table "dokumen_prakualifikasi".
 *
 * The followings are the available columns in table 'dokumen_prakualifikasi':
 * @property string $id_dokumen
 * @property string $nomor
 * @property string $tujuan_pengadaan
 * @property string $tanggal_pemasukan1
 * @property string $tanggal_pemasukan2
 * @property string $waktu_pemasukan1
 * @property string $waktu_pemasukan2
 * @property string $tempat_pemasukan
 * @property string $tanggal_evaluasi
 * @property string $waktu_evaluasi
 * @property string $tempat_evaluasi
 * @property string $tanggal_penetapan
 * @property string $waktu_penetapan
 * @property string $tempat_penetapan
 * @property string $bidang_usaha
 * @property string $sub_bidang_usaha
 * @property string $kualifikasi_perusahaan
 *
 * The followings are the available model relations:
 * @property Dokumen $idDokumen
 */
class DokumenPrakualifikasi extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DokumenPrakualifikasi the static model class
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
		return 'dokumen_prakualifikasi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_dokumen, nomor, tujuan_pengadaan, tanggal_pemasukan1, tanggal_pemasukan2, waktu_pemasukan1, waktu_pemasukan2, tempat_pemasukan, tanggal_evaluasi, waktu_evaluasi, tempat_evaluasi, tanggal_penetapan, waktu_penetapan, tempat_penetapan, bidang_usaha, sub_bidang_usaha, kualifikasi_perusahaan', 'required'),
			array('id_dokumen', 'length', 'max'=>32),
			array('nomor', 'length', 'max'=>100),
			array('tujuan_pengadaan, tempat_pemasukan, tempat_evaluasi, tempat_penetapan, bidang_usaha, sub_bidang_usaha, kualifikasi_perusahaan', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_dokumen, nomor, tujuan_pengadaan, tanggal_pemasukan1, tanggal_pemasukan2, waktu_pemasukan1, waktu_pemasukan2, tempat_pemasukan, tanggal_evaluasi, waktu_evaluasi, tempat_evaluasi, tanggal_penetapan, waktu_penetapan, tempat_penetapan, bidang_usaha, sub_bidang_usaha, kualifikasi_perusahaan', 'safe', 'on'=>'search'),
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
			'tujuan_pengadaan' => 'Tujuan Pengadaan',
			'tanggal_pemasukan1' => 'Tanggal Pemasukan1',
			'tanggal_pemasukan2' => 'Tanggal Pemasukan2',
			'waktu_pemasukan1' => 'Waktu Pemasukan1',
			'waktu_pemasukan2' => 'Waktu Pemasukan2',
			'tempat_pemasukan' => 'Tempat Pemasukan',
			'tanggal_evaluasi' => 'Tanggal Evaluasi',
			'waktu_evaluasi' => 'Waktu Evaluasi',
			'tempat_evaluasi' => 'Tempat Evaluasi',
			'tanggal_penetapan' => 'Tanggal Penetapan',
			'waktu_penetapan' => 'Waktu Penetapan',
			'tempat_penetapan' => 'Tempat Penetapan',
			'bidang_usaha' => 'Bidang Usaha',
			'sub_bidang_usaha' => 'Sub Bidang Usaha',
			'kualifikasi_perusahaan' => 'Kualifikasi Perusahaan',
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
		$criteria->compare('tujuan_pengadaan',$this->tujuan_pengadaan,true);
		$criteria->compare('tanggal_pemasukan1',$this->tanggal_pemasukan1,true);
		$criteria->compare('tanggal_pemasukan2',$this->tanggal_pemasukan2,true);
		$criteria->compare('waktu_pemasukan1',$this->waktu_pemasukan1,true);
		$criteria->compare('waktu_pemasukan2',$this->waktu_pemasukan2,true);
		$criteria->compare('tempat_pemasukan',$this->tempat_pemasukan,true);
		$criteria->compare('tanggal_evaluasi',$this->tanggal_evaluasi,true);
		$criteria->compare('waktu_evaluasi',$this->waktu_evaluasi,true);
		$criteria->compare('tempat_evaluasi',$this->tempat_evaluasi,true);
		$criteria->compare('tanggal_penetapan',$this->tanggal_penetapan,true);
		$criteria->compare('waktu_penetapan',$this->waktu_penetapan,true);
		$criteria->compare('tempat_penetapan',$this->tempat_penetapan,true);
		$criteria->compare('bidang_usaha',$this->bidang_usaha,true);
		$criteria->compare('sub_bidang_usaha',$this->sub_bidang_usaha,true);
		$criteria->compare('kualifikasi_perusahaan',$this->kualifikasi_perusahaan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}