<?php

/**
 * This is the model class for table "pengadaan".
 *
 * The followings are the available columns in table 'pengadaan':
 * @property string $id_pengadaan
 * @property string $nama_pengadaan
 * @property string $nama_penyedia
 * @property string $tanggal_masuk
 * @property string $tanggal_selesai
 * @property string $status
 * @property string $biaya
 * @property string $nama
 * @property string $kode_panitia
 * @property string $metode_pengadaan
 * @property string $metode_penawaran
 * @property string $jenis_kualifikasi
 * @property string $deskripsi
 *
 * The followings are the available model relations:
 * @property BeritaAcaraEvaluasiPenawaran[] $beritaAcaraEvaluasiPenawarans
 * @property BeritaAcaraEvaluasiPenawaran[] $beritaAcaraEvaluasiPenawarans1
 * @property BeritaAcaraEvaluasiPenawaran[] $beritaAcaraEvaluasiPenawarans2
 * @property BeritaAcaraNegosiasiKlarifikasi[] $beritaAcaraNegosiasiKlarifikasis
 * @property BeritaAcaraNegosiasiKlarifikasi[] $beritaAcaraNegosiasiKlarifikasis1
 * @property BeritaAcaraPembukaanPenawaran[] $beritaAcaraPembukaanPenawarans
 * @property BeritaAcaraPembukaanPenawaran[] $beritaAcaraPembukaanPenawarans1
 * @property BeritaAcaraPenjelasan[] $beritaAcaraPenjelasans
 * @property BeritaAcaraPenjelasan[] $beritaAcaraPenjelasans1
 * @property Dokumen[] $dokumens
 * @property NotaDinasPemberitahuanPemenang[] $notaDinasPemberitahuanPemenangs
 * @property NotaDinasPenetapanPemenang[] $notaDinasPenetapanPemenangs
 * @property NotaDinasPenetapanPemenang[] $notaDinasPenetapanPemenangs1
 * @property NotaDinasUsulanPemenang[] $notaDinasUsulanPemenangs
 * @property PaktaIntegritasPanitia1[] $paktaIntegritasPanitia1s
 * @property PaktaIntegritasPanitia1[] $paktaIntegritasPanitia1s1
 * @property PaktaIntegritasPenyedia[] $paktaIntegritasPenyedias
 * @property Panitia $kodePanitia
 * @property User $nama0
 * @property SuratPemberitahuanPengadaan[] $suratPemberitahuanPengadaans
 * @property SuratPemberitahuanPengadaan[] $suratPemberitahuanPengadaans1
 * @property SuratPernyataanMinat[] $suratPernyataanMinats
 * @property SuratUndanganNegosiasiKlarifikasi[] $suratUndanganNegosiasiKlarifikasis
 * @property SuratUndanganPembukaanPenawaran[] $suratUndanganPembukaanPenawarans
 * @property SuratUndanganPembukaanPenawaran[] $suratUndanganPembukaanPenawarans1
 * @property SuratUndanganPembukaanPenawaran[] $suratUndanganPembukaanPenawarans2
 * @property SuratUndanganPengambilanDokumenPengadaan[] $suratUndanganPengambilanDokumenPengadaans
 * @property SuratUndanganPenjelasan[] $suratUndanganPenjelasans
 * @property SuratUndanganPenjelasan[] $suratUndanganPenjelasans1
 * @property SuratUndanganPenjelasan[] $suratUndanganPenjelasans2
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
			array('nama_pengadaan, tanggal_masuk, metode_pengadaan, deskripsi', 'required'), //------aidil---hapus id pengadaan dari required
			array('id_pengadaan, nama_penyedia, status, nama, metode_pengadaan, metode_penawaran, jenis_kualifikasi', 'length', 'max'=>32),
			array('nama_pengadaan, deskripsi', 'length', 'max'=>100),
			array('biaya', 'length', 'max'=>20),
			array('kode_panitia', 'length', 'max'=>10),
			array('tanggal_selesai', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_pengadaan, nama_pengadaan, nama_penyedia, tanggal_masuk, tanggal_selesai, status, biaya, nama, kode_panitia, metode_pengadaan, metode_penawaran, jenis_kualifikasi, deskripsi', 'safe', 'on'=>'search'),
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
			'beritaAcaraEvaluasiPenawarans2' => array(self::HAS_MANY, 'BeritaAcaraEvaluasiPenawaran', 'nama'),
			'beritaAcaraNegosiasiKlarifikasis' => array(self::HAS_MANY, 'BeritaAcaraNegosiasiKlarifikasi', 'kode_panitia'),
			'beritaAcaraNegosiasiKlarifikasis1' => array(self::HAS_MANY, 'BeritaAcaraNegosiasiKlarifikasi', 'nama'),
			'beritaAcaraPembukaanPenawarans' => array(self::HAS_MANY, 'BeritaAcaraPembukaanPenawaran', 'kode_panitia'),
			'beritaAcaraPembukaanPenawarans1' => array(self::HAS_MANY, 'BeritaAcaraPembukaanPenawaran', 'nama'),
			'beritaAcaraPenjelasans' => array(self::HAS_MANY, 'BeritaAcaraPenjelasan', 'nama'),
			'beritaAcaraPenjelasans1' => array(self::HAS_MANY, 'BeritaAcaraPenjelasan', 'kode_panitia'),
			'dokumens' => array(self::HAS_MANY, 'Dokumen', 'id_pengadaan'),
			'notaDinasPemberitahuanPemenangs' => array(self::HAS_MANY, 'NotaDinasPemberitahuanPemenang', 'nama_penyedia'),
			'notaDinasPenetapanPemenangs' => array(self::HAS_MANY, 'NotaDinasPenetapanPemenang', 'nama_penyedia'),
			'notaDinasPenetapanPemenangs1' => array(self::HAS_MANY, 'NotaDinasPenetapanPemenang', 'kepada'),
			'notaDinasUsulanPemenangs' => array(self::HAS_MANY, 'NotaDinasUsulanPemenang', 'nama_penyedia'),
			'paktaIntegritasPanitia1s' => array(self::HAS_MANY, 'PaktaIntegritasPanitia1', 'nama'),
			'paktaIntegritasPanitia1s1' => array(self::HAS_MANY, 'PaktaIntegritasPanitia1', 'kode_panitia'),
			'paktaIntegritasPenyedias' => array(self::HAS_MANY, 'PaktaIntegritasPenyedia', 'nama_pengadaan'),
			'kodePanitia' => array(self::BELONGS_TO, 'Panitia', 'kode_panitia'),
			'nama0' => array(self::BELONGS_TO, 'User', 'nama'),
			'suratPemberitahuanPengadaans' => array(self::HAS_MANY, 'SuratPemberitahuanPengadaan', 'nama'),
			'suratPemberitahuanPengadaans1' => array(self::HAS_MANY, 'SuratPemberitahuanPengadaan', 'kode_panitia'),
			'suratPernyataanMinats' => array(self::HAS_MANY, 'SuratPernyataanMinat', 'nama_pengadaan'),
			'suratUndanganNegosiasiKlarifikasis' => array(self::HAS_MANY, 'SuratUndanganNegosiasiKlarifikasi', 'nama_pengadaan'),
			'suratUndanganPembukaanPenawarans' => array(self::HAS_MANY, 'SuratUndanganPembukaanPenawaran', 'nama'),
			'suratUndanganPembukaanPenawarans1' => array(self::HAS_MANY, 'SuratUndanganPembukaanPenawaran', 'nama_pengadaan'),
			'suratUndanganPembukaanPenawarans2' => array(self::HAS_MANY, 'SuratUndanganPembukaanPenawaran', 'kode_panitia'),
			'suratUndanganPengambilanDokumenPengadaans' => array(self::HAS_MANY, 'SuratUndanganPengambilanDokumenPengadaan', 'nama_pengadaan'),
			'suratUndanganPenjelasans' => array(self::HAS_MANY, 'SuratUndanganPenjelasan', 'nama'),
			'suratUndanganPenjelasans1' => array(self::HAS_MANY, 'SuratUndanganPenjelasan', 'nama_pengadaan'),
			'suratUndanganPenjelasans2' => array(self::HAS_MANY, 'SuratUndanganPenjelasan', 'kode_panitia'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_pengadaan' => 'Id Pengadaan',
			'nama_pengadaan' => 'Nama Pengadaan',
			'nama_penyedia' => 'Nama Penyedia',
			'tanggal_masuk' => 'Tanggal Masuk',
			'tanggal_selesai' => 'Tanggal Selesai',
			'status' => 'Status',
			'biaya' => 'Biaya',
			'nama' => 'Nama',
			'kode_panitia' => 'Kode Panitia',
			'metode_pengadaan' => 'Metode Pengadaan',
			'metode_penawaran' => 'Metode Penawaran',
			'jenis_kualifikasi' => 'Jenis Kualifikasi',
			'deskripsi' => 'Deskripsi',
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
		$criteria->compare('nama_pengadaan',$this->nama_pengadaan,true);
		$criteria->compare('nama_penyedia',$this->nama_penyedia,true);
		$criteria->compare('tanggal_masuk',$this->tanggal_masuk,true);
		$criteria->compare('tanggal_selesai',$this->tanggal_selesai,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('biaya',$this->biaya,true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('kode_panitia',$this->kode_panitia,true);
		$criteria->compare('metode_pengadaan',$this->metode_pengadaan,true);
		$criteria->compare('metode_penawaran',$this->metode_penawaran,true);
		$criteria->compare('jenis_kualifikasi',$this->jenis_kualifikasi,true);
		$criteria->compare('deskripsi',$this->deskripsi,true);
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
		$criteria->compare('nama_pengadaan',$this->nama_pengadaan,true);
		$criteria->compare('nama_penyedia',$this->nama_penyedia,true);
		$criteria->compare('tanggal_masuk',$this->tanggal_masuk,true);
		$criteria->compare('tanggal_selesai',$this->tanggal_selesai,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('biaya',$this->biaya,true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('kode_panitia',$this->kode_panitia,true);
		$criteria->compare('metode_pengadaan',$this->metode_pengadaan,true);
		$criteria->compare('metode_penawaran',$this->metode_penawaran,true);
		$criteria->compare('jenis_kualifikasi',$this->jenis_kualifikasi,true);
		$criteria->compare('deskripsi',$this->deskripsi,true);
		$criteria->condition = "status='Selesai'";													

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
}