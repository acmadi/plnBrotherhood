<?php

/**
 * This is the model class for table "pengadaan".
 *
 * The followings are the available columns in table 'pengadaan':
 * @property string $id_pengadaan
 * @property string $divisi_peminta
 * @property string $nama_pengadaan
 * @property string $nama_penyedia
 * @property string $tanggal_masuk
 * @property string $tanggal_selesai
 * @property string $status
 * @property string $biaya
 * @property string $kode_panitia
 * @property string $metode_pengadaan
 * @property string $metode_penawaran
 * @property string $jenis_kualifikasi
 * @property string $perihal_pengadaan
 *
 * The followings are the available model relations:
 * @property BeritaAcaraEvaluasiPenawaran[] $beritaAcaraEvaluasiPenawarans
 * @property BeritaAcaraEvaluasiPenawaran[] $beritaAcaraEvaluasiPenawarans1
 * @property BeritaAcaraNegosiasiKlarifikasi[] $beritaAcaraNegosiasiKlarifikasis
 * @property BeritaAcaraPembukaanPenawaran[] $beritaAcaraPembukaanPenawarans
 * @property BeritaAcaraPenjelasan[] $beritaAcaraPenjelasans
 * @property Dokumen[] $dokumens
 * @property NotaDinasPemberitahuanPemenang[] $notaDinasPemberitahuanPemenangs
 * @property NotaDinasPenetapanPemenang[] $notaDinasPenetapanPemenangs
 * @property NotaDinasPenetapanPemenang[] $notaDinasPenetapanPemenangs1
 * @property NotaDinasUsulanPemenang[] $notaDinasUsulanPemenangs
 * @property PaktaIntegritasPanitia1[] $paktaIntegritasPanitia1s
 * @property PaktaIntegritasPenyedia[] $paktaIntegritasPenyedias
 * @property Panitia $kodePanitia
 * @property SuratPemberitahuanPengadaan[] $suratPemberitahuanPengadaans
 * @property SuratPernyataanMinat[] $suratPernyataanMinats
 * @property SuratUndanganNegosiasiKlarifikasi[] $suratUndanganNegosiasiKlarifikasis
 * @property SuratUndanganPembukaanPenawaran[] $suratUndanganPembukaanPenawarans
 * @property SuratUndanganPembukaanPenawaran[] $suratUndanganPembukaanPenawarans1
 * @property SuratUndanganPengambilanDokumenPengadaan[] $suratUndanganPengambilanDokumenPengadaans
 * @property SuratUndanganPenjelasan[] $suratUndanganPenjelasans
 * @property SuratUndanganPenjelasan[] $suratUndanganPenjelasans1
 */
class Pengadaan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pengadaan the static model class
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
		return 'pengadaan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('divisi_peminta, nama_pengadaan, tanggal_masuk, status, kode_panitia, metode_pengadaan, perihal_pengadaan', 'required'),
			array('divisi_peminta, nama_penyedia, status, metode_pengadaan, metode_penawaran, jenis_kualifikasi', 'length', 'max'=>32),
			array('nama_pengadaan, perihal_pengadaan', 'length', 'max'=>100),
			array('biaya', 'length', 'max'=>20),
			array('kode_panitia', 'length', 'max'=>10),
			array('tanggal_selesai', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_pengadaan, divisi_peminta, nama_pengadaan, nama_penyedia, tanggal_masuk, tanggal_selesai, status, biaya, kode_panitia, metode_pengadaan, metode_penawaran, jenis_kualifikasi, perihal_pengadaan', 'safe', 'on'=>'search'),
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
			'beritaAcaraEvaluasiPenawarans' => array(self::HAS_MANY, 'BeritaAcaraEvaluasiPenawaran', 'nama_pengadaan'),
			'beritaAcaraEvaluasiPenawarans1' => array(self::HAS_MANY, 'BeritaAcaraEvaluasiPenawaran', 'kode_panitia'),
			'beritaAcaraNegosiasiKlarifikasis' => array(self::HAS_MANY, 'BeritaAcaraNegosiasiKlarifikasi', 'kode_panitia'),
			'beritaAcaraPembukaanPenawarans' => array(self::HAS_MANY, 'BeritaAcaraPembukaanPenawaran', 'kode_panitia'),
			'beritaAcaraPenjelasans' => array(self::HAS_MANY, 'BeritaAcaraPenjelasan', 'kode_panitia'),
			'dokumens' => array(self::HAS_MANY, 'Dokumen', 'id_pengadaan'),
			'notaDinasPemberitahuanPemenangs' => array(self::HAS_MANY, 'NotaDinasPemberitahuanPemenang', 'nama_penyedia'),
			'notaDinasPenetapanPemenangs' => array(self::HAS_MANY, 'NotaDinasPenetapanPemenang', 'nama_penyedia'),
			'notaDinasPenetapanPemenangs1' => array(self::HAS_MANY, 'NotaDinasPenetapanPemenang', 'kepada'),
			'notaDinasUsulanPemenangs' => array(self::HAS_MANY, 'NotaDinasUsulanPemenang', 'nama_penyedia'),
			'paktaIntegritasPanitia1s' => array(self::HAS_MANY, 'PaktaIntegritasPanitia1', 'kode_panitia'),
			'paktaIntegritasPenyedias' => array(self::HAS_MANY, 'PaktaIntegritasPenyedia', 'nama_pengadaan'),
			'kodePanitia' => array(self::BELONGS_TO, 'Panitia', 'kode_panitia'),
			'suratPemberitahuanPengadaans' => array(self::HAS_MANY, 'SuratPemberitahuanPengadaan', 'kode_panitia'),
			'suratPernyataanMinats' => array(self::HAS_MANY, 'SuratPernyataanMinat', 'nama_pengadaan'),
			'suratUndanganNegosiasiKlarifikasis' => array(self::HAS_MANY, 'SuratUndanganNegosiasiKlarifikasi', 'nama_pengadaan'),
			'suratUndanganPembukaanPenawarans' => array(self::HAS_MANY, 'SuratUndanganPembukaanPenawaran', 'nama_pengadaan'),
			'suratUndanganPembukaanPenawarans1' => array(self::HAS_MANY, 'SuratUndanganPembukaanPenawaran', 'kode_panitia'),
			'suratUndanganPengambilanDokumenPengadaans' => array(self::HAS_MANY, 'SuratUndanganPengambilanDokumenPengadaan', 'nama_pengadaan'),
			'suratUndanganPenjelasans' => array(self::HAS_MANY, 'SuratUndanganPenjelasan', 'nama_pengadaan'),
			'suratUndanganPenjelasans1' => array(self::HAS_MANY, 'SuratUndanganPenjelasan', 'kode_panitia'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_pengadaan' => 'Id Pengadaan',
			'divisi_peminta' => 'Divisi Peminta',
			'nama_pengadaan' => 'Nama Pengadaan',
			'nama_penyedia' => 'Nama Penyedia',
			'tanggal_masuk' => 'Tanggal Masuk',
			'tanggal_selesai' => 'Tanggal Selesai',
			'status' => 'Status',
			'biaya' => 'Biaya',
			'kode_panitia' => 'Kode Panitia',
			'metode_pengadaan' => 'Metode Pengadaan',
			'metode_penawaran' => 'Metode Penawaran',
			'jenis_kualifikasi' => 'Jenis Kualifikasi',
			'perihal_pengadaan' => 'Perihal Pengadaan',
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

		$criteria->compare('id_pengadaan',$this->id_pengadaan,true);
		$criteria->compare('divisi_peminta',$this->divisi_peminta,true);
		$criteria->compare('nama_pengadaan',$this->nama_pengadaan,true);
		$criteria->compare('nama_penyedia',$this->nama_penyedia,true);
		$criteria->compare('tanggal_masuk',$this->tanggal_masuk,true);
		$criteria->compare('tanggal_selesai',$this->tanggal_selesai,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('biaya',$this->biaya,true);
		$criteria->compare('kode_panitia',$this->kode_panitia,true);
		$criteria->compare('metode_pengadaan',$this->metode_pengadaan,true);
		$criteria->compare('metode_penawaran',$this->metode_penawaran,true);
		$criteria->compare('jenis_kualifikasi',$this->jenis_kualifikasi,true);
		$criteria->compare('perihal_pengadaan',$this->perihal_pengadaan,true);
		$criteria->condition = "status!='Selesai'";													//-------------------search yg ngga selesai doang----------------------		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function searchBuatHistory()																//----------------------------------
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_pengadaan',$this->id_pengadaan,true);
		$criteria->compare('divisi_peminta',$this->divisi_peminta,true);
		$criteria->compare('nama_pengadaan',$this->nama_pengadaan,true);
		$criteria->compare('nama_penyedia',$this->nama_penyedia,true);
		$criteria->compare('tanggal_masuk',$this->tanggal_masuk,true);
		$criteria->compare('tanggal_selesai',$this->tanggal_selesai,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('biaya',$this->biaya,true);
		$criteria->compare('kode_panitia',$this->kode_panitia,true);
		$criteria->compare('metode_pengadaan',$this->metode_pengadaan,true);
		$criteria->compare('metode_penawaran',$this->metode_penawaran,true);
		$criteria->compare('jenis_kualifikasi',$this->jenis_kualifikasi,true);
		$criteria->compare('perihal_pengadaan',$this->perihal_pengadaan,true);
		$criteria->condition = "status='Selesai'";													

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public $maxId;
}