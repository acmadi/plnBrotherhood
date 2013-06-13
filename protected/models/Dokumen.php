<?php

/**
 * This is the model class for table "dokumen".
 *
 * The followings are the available columns in table 'dokumen':
 * @property string $id_dokumen
 * @property string $nama_dokumen
 * @property string $tanggal
 * @property string $tempat
 * @property string $id_pengadaan
 * @property string $status_upload
 * @property string $waktu_upload
 * @property string $pengunggah
 * @property string $link_penyimpanan
 *
 * The followings are the available model relations:
 * @property BeritaAcaraEvaluasiPenawaran $beritaAcaraEvaluasiPenawaran
 * @property BeritaAcaraNegosiasiKlarifikasi $beritaAcaraNegosiasiKlarifikasi
 * @property BeritaAcaraPembukaanPenawaran $beritaAcaraPembukaanPenawaran
 * @property BeritaAcaraPengadaanGagal $beritaAcaraPengadaanGagal
 * @property BeritaAcaraPenjelasan $beritaAcaraPenjelasan
 * @property DaftarHadir $daftarHadir
 * @property Pengadaan $idPengadaan
 * @property User $pengunggah0
 * @property DokumenPenawaran $dokumenPenawaran
 * @property FormIsianKualifikasi $formIsianKualifikasi
 * @property NotaDinasPemberitahuanPemenang $notaDinasPemberitahuanPemenang
 * @property NotaDinasPenetapanPemenang $notaDinasPenetapanPemenang
 * @property NotaDinasPerintahPengadaan $notaDinasPerintahPengadaan
 * @property NotaDinasPermintaan $notaDinasPermintaan
 * @property NotaDinasUsulanPemenang $notaDinasUsulanPemenang
 * @property PaktaIntegritasPanitia1 $paktaIntegritasPanitia1
 * @property PaktaIntegritasPenyedia $paktaIntegritasPenyedia
 * @property Rab $rab
 * @property Rks $rks
 * @property SuratPemberitahuanPengadaan $suratPemberitahuanPengadaan
 * @property SuratPernyataanMinat $suratPernyataanMinat
 * @property SuratUndanganNegosiasiKlarifikasi $suratUndanganNegosiasiKlarifikasi
 * @property SuratUndanganPembukaanPenawaran $suratUndanganPembukaanPenawaran
 * @property SuratUndanganPengambilanDokumenPengadaan $suratUndanganPengambilanDokumenPengadaan
 * @property SuratUndanganPenjelasan $suratUndanganPenjelasan
 * @property SuratUndanganPrakualifikasi $suratUndanganPrakualifikasi
 * @property Tor $tor
 */
class Dokumen extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Dokumen the static model class
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
		return 'dokumen';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama_dokumen, id_pengadaan', 'required'),
			array('nama_dokumen', 'length', 'max'=>50),
			array('tempat', 'length', 'max'=>20),
			array('id_pengadaan, pengunggah', 'length', 'max'=>32),
			array('status_upload', 'length', 'max'=>10),
			array('link_penyimpanan', 'length', 'max'=>100),
			array('tanggal, waktu_upload', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_dokumen, nama_dokumen, tanggal, tempat, id_pengadaan, status_upload, waktu_upload, pengunggah, link_penyimpanan', 'safe', 'on'=>'search'),
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
			'beritaAcaraEvaluasiPenawaran' => array(self::HAS_ONE, 'BeritaAcaraEvaluasiPenawaran', 'id_dokumen'),
			'beritaAcaraNegosiasiKlarifikasi' => array(self::HAS_ONE, 'BeritaAcaraNegosiasiKlarifikasi', 'id_dokumen'),
			'beritaAcaraPembukaanPenawaran' => array(self::HAS_ONE, 'BeritaAcaraPembukaanPenawaran', 'id_dokumen'),
			'beritaAcaraPengadaanGagal' => array(self::HAS_ONE, 'BeritaAcaraPengadaanGagal', 'id_dokumen'),
			'beritaAcaraPenjelasan' => array(self::HAS_ONE, 'BeritaAcaraPenjelasan', 'id_dokumen'),
			'daftarHadir' => array(self::HAS_ONE, 'DaftarHadir', 'id_dokumen'),
			'idPengadaan' => array(self::BELONGS_TO, 'Pengadaan', 'id_pengadaan'),
			'pengunggah0' => array(self::BELONGS_TO, 'User', 'pengunggah'),
			'dokumenPenawaran' => array(self::HAS_ONE, 'DokumenPenawaran', 'id_dokumen'),
			'formIsianKualifikasi' => array(self::HAS_ONE, 'FormIsianKualifikasi', 'id_dokumen'),
			'notaDinasPemberitahuanPemenang' => array(self::HAS_ONE, 'NotaDinasPemberitahuanPemenang', 'id_dokumen'),
			'notaDinasPenetapanPemenang' => array(self::HAS_ONE, 'NotaDinasPenetapanPemenang', 'id_dokumen'),
			'notaDinasPerintahPengadaan' => array(self::HAS_ONE, 'NotaDinasPerintahPengadaan', 'id_dokumen'),
			'notaDinasPermintaan' => array(self::HAS_ONE, 'NotaDinasPermintaan', 'id_dokumen'),
			'notaDinasUsulanPemenang' => array(self::HAS_ONE, 'NotaDinasUsulanPemenang', 'id_dokumen'),
			'paktaIntegritasPanitia1' => array(self::HAS_ONE, 'PaktaIntegritasPanitia1', 'id_dokumen'),
			'paktaIntegritasPenyedia' => array(self::HAS_ONE, 'PaktaIntegritasPenyedia', 'id_dokumen'),
			'rab' => array(self::HAS_ONE, 'Rab', 'id_dokumen'),
			'rks' => array(self::HAS_ONE, 'Rks', 'id_dokumen'),
			'suratPemberitahuanPengadaan' => array(self::HAS_ONE, 'SuratPemberitahuanPengadaan', 'id_dokumen'),
			'suratPernyataanMinat' => array(self::HAS_ONE, 'SuratPernyataanMinat', 'id_dokumen'),
			'suratUndanganNegosiasiKlarifikasi' => array(self::HAS_ONE, 'SuratUndanganNegosiasiKlarifikasi', 'id_dokumen'),
			'suratUndanganPembukaanPenawaran' => array(self::HAS_ONE, 'SuratUndanganPembukaanPenawaran', 'id_dokumen'),
			'suratUndanganPengambilanDokumenPengadaan' => array(self::HAS_ONE, 'SuratUndanganPengambilanDokumenPengadaan', 'id_dokumen'),
			'suratUndanganPenjelasan' => array(self::HAS_ONE, 'SuratUndanganPenjelasan', 'id_dokumen'),
			'suratUndanganPrakualifikasi' => array(self::HAS_ONE, 'SuratUndanganPrakualifikasi', 'id_dokumen'),
			'tor' => array(self::HAS_ONE, 'Tor', 'id_dokumen'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_dokumen' => 'Id Dokumen',
			'nama_dokumen' => 'Nama Dokumen',
			'tanggal' => 'Tanggal',
			'tempat' => 'Tempat',
			'id_pengadaan' => 'Id Pengadaan',
			'status_upload' => 'Status Upload',
			'waktu_upload' => 'Waktu Upload',
			'pengunggah' => 'Pengunggah',
			'link_penyimpanan' => 'Link Penyimpanan',
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
		$criteria->compare('nama_dokumen',$this->nama_dokumen,true);
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('tempat',$this->tempat,true);
		$criteria->compare('id_pengadaan',$this->id_pengadaan,true);
		$criteria->compare('status_upload',$this->status_upload,true);
		$criteria->compare('waktu_upload',$this->waktu_upload,true);
		$criteria->compare('pengunggah',$this->pengunggah,true);
		$criteria->compare('link_penyimpanan',$this->link_penyimpanan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}