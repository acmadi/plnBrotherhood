<?php

/**
 * This is the model class for table "pengadaan".
 *
 * The followings are the available columns in table 'pengadaan':
 * @property string $id_pengadaan
 * @property string $nama_pengadaan
 * @property string $divisi_peminta
 * @property string $jenis_pengadaan
 * @property string $nama_penyedia
 * @property string $tanggal_masuk
 * @property string $tanggal_selesai
 * @property string $status
 * @property string $biaya
 * @property string $id_panitia
 * @property string $metode_pengadaan
 * @property string $metode_penawaran
 * @property string $jenis_kualifikasi
 *
 * The followings are the available model relations:
 * @property BeritaAcaraEvaluasiPenawaran[] $beritaAcaraEvaluasiPenawarans
 * @property BeritaAcaraNegosiasiKlarifikasi[] $beritaAcaraNegosiasiKlarifikasis
 * @property BeritaAcaraPembukaanPenawaran[] $beritaAcaraPembukaanPenawarans
 * @property BeritaAcaraPenjelasan[] $beritaAcaraPenjelasans
 * @property Dokumen[] $dokumens
 * @property NotaDinasPemberitahuanPemenang[] $notaDinasPemberitahuanPemenangs
 * @property NotaDinasPenetapanPemenang[] $notaDinasPenetapanPemenangs
 * @property NotaDinasPenetapanPemenang[] $notaDinasPenetapanPemenangs1
 * @property NotaDinasUsulanPemenang[] $notaDinasUsulanPemenangs
 * @property PaktaIntegritasPanitia1[] $paktaIntegritasPanitia1s
 * @property Divisi $divisiPeminta
 * @property Panitia $idPanitia
 * @property SuratPemberitahuanPengadaan[] $suratPemberitahuanPengadaans
 * @property SuratUndanganPembukaanPenawaran[] $suratUndanganPembukaanPenawarans
 * @property SuratUndanganPenjelasan[] $suratUndanganPenjelasans
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
			array('id_pengadaan, nama_pengadaan, divisi_peminta, jenis_pengadaan, nama_penyedia, tanggal_masuk, tanggal_selesai, status, biaya, id_panitia, metode_pengadaan, metode_penawaran, jenis_kualifikasi', 'required'),
			array('id_pengadaan, divisi_peminta, jenis_pengadaan, nama_penyedia, status, metode_pengadaan, metode_penawaran, jenis_kualifikasi', 'length', 'max'=>32),
			array('nama_pengadaan', 'length', 'max'=>100),
			array('biaya', 'length', 'max'=>20),
			array('id_panitia', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_pengadaan, nama_pengadaan, divisi_peminta, jenis_pengadaan, nama_penyedia, tanggal_masuk, tanggal_selesai, status, biaya, id_panitia, metode_pengadaan, metode_penawaran, jenis_kualifikasi', 'safe', 'on'=>'search'),
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
			'beritaAcaraEvaluasiPenawarans' => array(self::HAS_MANY, 'BeritaAcaraEvaluasiPenawaran', 'id_panitia'),
			'beritaAcaraNegosiasiKlarifikasis' => array(self::HAS_MANY, 'BeritaAcaraNegosiasiKlarifikasi', 'id_panitia'),
			'beritaAcaraPembukaanPenawarans' => array(self::HAS_MANY, 'BeritaAcaraPembukaanPenawaran', 'id_panitia'),
			'beritaAcaraPenjelasans' => array(self::HAS_MANY, 'BeritaAcaraPenjelasan', 'id_panitia'),
			'dokumens' => array(self::HAS_MANY, 'Dokumen', 'id_pengadaan'),
			'notaDinasPerintahPengadaan' => array(self::HAS_ONE, 'NotaDinasPerintahPengadaan', array('id_dokumen'=>'id_dokumen'), 'through'=>'dokumens'),
			'notaDinasPemberitahuanPemenangs' => array(self::HAS_MANY, 'NotaDinasPemberitahuanPemenang', 'nama_penyedia'),
			'notaDinasPenetapanPemenangs' => array(self::HAS_MANY, 'NotaDinasPenetapanPemenang', 'nama_penyedia'),
			'notaDinasPenetapanPemenangs1' => array(self::HAS_MANY, 'NotaDinasPenetapanPemenang', 'kepada'),
			'notaDinasUsulanPemenangs' => array(self::HAS_MANY, 'NotaDinasUsulanPemenang', 'nama_penyedia'),
			'paktaIntegritasPanitia1s' => array(self::HAS_MANY, 'PaktaIntegritasPanitia1', 'id_panitia'),
			'divisiPeminta' => array(self::BELONGS_TO, 'Divisi', 'divisi_peminta'),
			'idPanitia' => array(self::BELONGS_TO, 'Panitia', 'id_panitia'),
			'suratPemberitahuanPengadaans' => array(self::HAS_MANY, 'SuratPemberitahuanPengadaan', 'id_panitia'),
			'suratUndanganPembukaanPenawarans' => array(self::HAS_MANY, 'SuratUndanganPembukaanPenawaran', 'id_panitia'),
			'suratUndanganPenjelasans' => array(self::HAS_MANY, 'SuratUndanganPenjelasan', 'id_panitia'),
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
			'divisi_peminta' => 'Divisi Peminta',
			'jenis_pengadaan' => 'Jenis Pengadaan',
			'nama_penyedia' => 'Nama Penyedia',
			'tanggal_masuk' => 'Tanggal Masuk',
			'tanggal_selesai' => 'Tanggal Selesai',
			'status' => 'Status',
			'biaya' => 'Biaya',
			'id_panitia' => 'Id Panitia',
			'metode_pengadaan' => 'Metode Pengadaan',
			'metode_penawaran' => 'Metode Penawaran',
			'jenis_kualifikasi' => 'Jenis Kualifikasi',
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
		
		$sort = new CSort();
		$sort->attributes = array(
			'nama_pengadaan'=>array(
			  'asc'=>'nama_pengadaan',
			  'desc'=>'nama_pengadaan desc',
			),
			'User'=>array(
			  'asc'=>'divisi_peminta',
			  'desc'=>'divisi_peminta desc',
			),
			'Status'=>array(
			  'asc'=>'ABS(status)',
			  'desc'=>'ABS(status) desc',
			),
                        'Progress'=>array(
			  'asc'=>'ABS(status)',
			  'desc'=>'ABS(status) desc',
			),       
			'PIC'=>array(
			  'asc'=>'idPanitia.nama_panitia',
			  'desc'=>'idPanitia.nama_panitia desc',
			),
			'Sisa Hari'=>array(
			  'asc'=>'nama_pengadaan',
			  'desc'=>'$this->sisaHari($this->id_pengadaan) desc',
			),
			'*',
		);
		
		$criteria=new CDbCriteria;

                $criteria->with = array("idPanitia");
                
		$criteria->compare('id_pengadaan',$this->id_pengadaan,true);
		$criteria->compare('nama_pengadaan',$this->nama_pengadaan,true);
		$criteria->compare('divisi_peminta',$this->divisi_peminta,true);
		$criteria->compare('jenis_pengadaan',$this->jenis_pengadaan,true);
		$criteria->compare('nama_penyedia',$this->nama_penyedia,true);
		$criteria->compare('tanggal_masuk',$this->tanggal_masuk,true);
		$criteria->compare('tanggal_selesai',$this->tanggal_selesai,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('biaya',$this->biaya,true);
		$criteria->compare('id_panitia',$this->id_panitia,true);
		$criteria->compare('metode_pengadaan',$this->metode_pengadaan,true);
		$criteria->compare('metode_penawaran',$this->metode_penawaran,true);
		$criteria->compare('jenis_kualifikasi',$this->jenis_kualifikasi,true);
		
		// $criteria->compare('notaDinasPerintahPengadaan.nota_dinas_permintaan',$this->notaDinasPerintahPengadaan->nota_dinas_permintaan,true);			
				
		$criteria->condition = "status!='100'";													//------jo-------------search yg ngga selesai doang----------------------		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
		));
	}
	
	public function searchBuatHistory()																//--jo--------------------------------
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$sort = new CSort();
		$sort->attributes = array(
			'nama_pengadaan'=>array(
			  'asc'=>'nama_pengadaan',
			  'desc'=>'nama_pengadaan desc',
			),
			'User'=>array(
			  'asc'=>'divisi_peminta',
			  'desc'=>'divisi_peminta desc',
			),
			'PIC'=>array(
			  'asc'=>'idPanitia.nama_panitia',
			  'desc'=>'idPanitia.nama_panitia desc',
			),
		);
		
		$criteria=new CDbCriteria;

		$criteria->with = "idPanitia";

		$criteria->compare('id_pengadaan',$this->id_pengadaan,true);
		$criteria->compare('divisi_peminta',$this->divisi_peminta,true);
		$criteria->compare('nama_pengadaan',$this->nama_pengadaan,true);
		$criteria->compare('nama_penyedia',$this->nama_penyedia,true);
		$criteria->compare('tanggal_masuk',$this->tanggal_masuk,true);
		$criteria->compare('tanggal_selesai',$this->tanggal_selesai,true);
		$criteria->compare('biaya',$this->biaya,true);
		$criteria->compare('id_panitia',$this->id_panitia,true);
		$criteria->compare('metode_pengadaan',$this->metode_pengadaan,true);
		$criteria->compare('metode_penawaran',$this->metode_penawaran,true);
		$criteria->compare('jenis_kualifikasi',$this->jenis_kualifikasi,true);
		$criteria->condition = "status='100'";	

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
		));
	}

	public function searchBuatPanitia()															//jo---msh ada bug: yg status selesai msh ditampilin
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$sort = new CSort();
		$sort->attributes = array(
			'nama_pengadaan'=>array(
			  'asc'=>'nama_pengadaan',
			  'desc'=>'nama_pengadaan desc',
			),
			'Status'=>array(
			  'asc'=>'ABS(status)',
			  'desc'=>'ABS(status) desc',
			),
                        'Progress'=>array(
			  'asc'=>'ABS(status)',
			  'desc'=>'ABS(status) desc',
			),                       
			'User'=>array(
			  'asc'=>'divisi_peminta',
			  'desc'=>'divisi_peminta desc',
			),
			'Sisa Hari'=>array(
			  'asc'=>'$this->sisaHari($this->id_pengadaan)',
			  'desc'=>'sisaHari(id_pengadaan) desc',
			),
		);
		
		$criteria=new CDbCriteria;				
                
		$usern = Yii::app()->user->name;
		// $modelUser = Anggota::model()->with('pengadaan')->findAll('username="' . $usern . '"' );
		$modelUser = Anggota::model()->findAll('username="' . $usern . '"' );
		
		for($i=0;$i<count($modelUser);$i++){
			$idpan[$i] = $modelUser[$i]->id_panitia;
		};

		$criteria->compare('id_pengadaan',$this->id_pengadaan,true);
		$criteria->compare('divisi_peminta',$this->divisi_peminta,true);
		$criteria->compare('nama_pengadaan',$this->nama_pengadaan,true);
		$criteria->compare('nama_penyedia',$this->nama_penyedia,true);
		$criteria->compare('tanggal_masuk',$this->tanggal_masuk,true);
		$criteria->compare('tanggal_selesai',$this->tanggal_selesai,true);
		$criteria->compare('biaya',$this->biaya,true);
		$criteria->compare('id_panitia',$this->id_panitia,true);
		$criteria->compare('metode_pengadaan',$this->metode_pengadaan,true);
		$criteria->compare('metode_penawaran',$this->metode_penawaran,true);
		$criteria->compare('jenis_kualifikasi',$this->jenis_kualifikasi,true);
		// $criteria->condition = "status!='Selesai'";													//-------------------search yg ngga selesai doang----------------------		
		
		$strDummy = "id_panitia=$idpan[0]";
		for($j=1;$j<count($idpan);$j++){			
			$strDummy = "status!='100' &&" . "id_panitia=$idpan[$j]" . "||" . $strDummy;			
		};
		// $criteria->condition = "id_panitia=$idpan[0] || id_panitia=$idpan[1]";
		$strDummy = $strDummy . "&& status!='100'";
		$criteria->condition = $strDummy ;											
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
		));
	}	
	
	public function sisaHari($id){								//jo----------------------------
		if($this->status == '100'){
			return "-";
		}else{
			date_default_timezone_set ('Asia/Jakarta');
			
			$string1 = date('Y-m-d H:i:s');
			$jmlday1 = strtotime($string1);
			
			$string2 = $this->tanggal_masuk;		
			$jmlday2 = strtotime($string2);
			
			return($this->findByPk($id)->notaDinasPerintahPengadaan->targetSPK_kontrak-floor(($jmlday1-$jmlday2)/3600/24));
		}
	}

	public function progressPengadaan(){					//jo---------------------------
		
		if($this->status == '1'){
			return 0/24;
		}
		else if($this->status == '2'){
			return 100/24;
		}
		else if($this->status == '3'){
			return 200/24;
		}
		else if($this->status == '4'){
			return 300/24;
		}
		else if($this->status == '5'){
			return 400/24;
		}
		else if($this->status == '6' ){
			return 500/24;
		}
		else if($this->status == '7'){
			return 600/24;
		}
		else if($this->status == '8'){
			return 700/24;
		}
		else if($this->status == '9'){
			return 800/24;
		}
		else if($this->status == '10'){
			return 900/24;
		}
		else if($this->status == '11'){
			return 1000/24;
		}
		else if($this->status == '12'){
			return 1100/24;
		}
		else if($this->status == '13' ){
			return 1200/24;
		}
		else if($this->status == '14'){
			return 1300/24;
		}
		else if($this->status == '15'){
			return 1400/24;
		}
		else if($this->status == '16'){
			return 1500/24;
		}
		else if($this->status == '17'){
			return 1600/24;
		}
		else if($this->status == '18'){
			return 1700/24;
		}
		else if($this->status == '19'){
			return 1800/24;
		}
		else if($this->status == '20' ){
			return 1900/24;
		}
		else if($this->status == '21'){
			return 2000/24;
		}
		else if($this->status == '22'){
			return 2100/24;
		}
		else if($this->status == '23'){
			return 2200/24;
		}
		else if($this->status == '24'){
			return 2300/24;
		}		
		else if($this->status == '100'){
			return 2400/24;
		}
		else{
			return 0;
		}
	}
	
	public function dapatkanStatus(){
		if($this->status == '1'){
			return 'Penunjukan Panitia';
		}
		else if($this->status == '2' || $this->status == '3'){
			return 'Pembuatan Dokumen Pengadaan';
		}
		else if($this->status == '4'){
			return 'Kualifikasi';
		}		
		else if($this->status == '5' || $this->status == '6'){
			return 'Pengambilan Dokumen Pengadaan';
		}
		else if($this->status == '8' || $this->status == '7'){
			return 'Aanwijzing';
		}
		else if($this->status == '10' || $this->status == '9' || $this->status == '11'){
			return 'Penawaran';
		}
		else if($this->status == '12'){
			return 'Evaluasi';
		}
		else if($this->status == '13' || $this->status == '14' || $this->status == '15'){
			return 'Penawaran 2';
		}
		else if($this->status == '16'){
			return 'Evaluasi 2';
		}
		else if($this->status == '17' || $this->status == '18'){
			return 'Klarifikasi dan Negosiasi';
		}
		else if($this->status == '19' || $this->status == '20' || $this->status == '21' || $this->status == '22' || $this->status == '23'){
			return 'Penentuan Pemenang';
		}
		else if($this->status == '24'){
			return 'Kontrak';
		}
		else if($this->status == '100'){
			return 'Selesai';
		}				
	}
	
	public $maxId; //aidil---variabel untuk mencari nilai maksimum
}