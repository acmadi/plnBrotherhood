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
 *
 * The followings are the available model relations:
 * @property BeritaAcaraEvaluasiPenawaran $beritaAcaraEvaluasiPenawaran
 * @property BeritaAcaraNegosiasiKlarifikasi $beritaAcaraNegosiasiKlarifikasi
 * @property BeritaAcaraPembukaanPenawaran $beritaAcaraPembukaanPenawaran
 * @property BeritaAcaraPengadaanGagal $beritaAcaraPengadaanGagal
 * @property BeritaAcaraPenjelasan $beritaAcaraPenjelasan
 * @property DaftarHadir $daftarHadir
 * @property Pengadaan $idPengadaan
 * @property DokumenPenawaran $dokumenPenawaran
 * @property FormIsianKualifikasi $formIsianKualifikasi
 * @property LinkDokumen[] $linkDokumens
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
			array('id_dokumen, nama_dokumen, id_pengadaan', 'required'),
			array('id_dokumen, id_pengadaan', 'length', 'max'=>32),
			array('nama_dokumen', 'length', 'max'=>50),
			array('tempat, status_upload', 'length', 'max'=>20),
			array('tanggal', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_dokumen, nama_dokumen, tanggal, tempat, id_pengadaan, status_upload', 'safe', 'on'=>'search'),
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
			'dokumenPenawaran' => array(self::HAS_ONE, 'DokumenPenawaran', 'id_dokumen'),
			'formIsianKualifikasi' => array(self::HAS_ONE, 'FormIsianKualifikasi', 'id_dokumen'),
			'linkDokumens' => array(self::HAS_MANY, 'LinkDokumen', 'id_dokumen'),
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

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function inputDatabase($id,$idPengadaan, $user,$uploadDir)
	{
		$criteria = new CDbCriteria();
		$criteria->addCondition("nama_dokumen=:nama_dokumen AND id_pengadaan=:id_pengadaan");
		$newModel = $this->find('nama_dokumen=:nama_dokumen AND id_pengadaan=:id_pengadaan',
		array(
			':nama_dokumen'=>$id,
			':id_pengadaan'=>$idPengadaan,
			));
			
		date_default_timezone_set("Asia/Jakarta");
		$date = date_create();
		$sec = time() + (7*3600);
		$hours = ($sec / 3600) % 24;
		$minutes = ($sec / 60) % 60;
		$seconds = $sec % 60;
		$waktu_upload = $hours . ':' . $minutes . ':' . $seconds;
		
		$newModel->tanggal=date("Y-m-d");
		$newModel->tempat=	'Jakarta';
		$newModel->status_upload='Selesai';
		$newModel->waktu_upload=$waktu_upload;
		$newModel->pengunggah=$user;
		$newModel->link_penyimpanan=$uploadDir;
		$newModel->save();
	}
	
	public function fileReceptor($fullFileName,$userdata)
	{

	}	
	
	public $maxId; //aidil---variabel untuk mencari nilai maksimum
}