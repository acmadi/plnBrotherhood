<?php

/**
 * This is the model class for table "penerima_pengadaan".
 *
 * The followings are the available columns in table 'penerima_pengadaan':
 * @property string $id_penerima
 * @property string $perusahaan
 * @property string $id_pengadaan
 * @property string $alamat
 * @property string $npwp
 * @property string $nilai
 * @property string $biaya
 * @property string $undangan_prakualifikasi
 * @property string $pendaftaran_pelelangan
 * @property string $pengambilan_lelang
 * @property string $penyampaian_lelang
 * @property string $evaluasi_kualifikasi
 * @property string $pengambilan_dokumen
 * @property string $ba_aanwijzing
 * @property string $pembukaan_penawaran_1
 * @property string $evaluasi_penawaran_1
 * @property string $pembukaan_penawaran_2
 * @property string $evaluasi_penawaran_2
 * @property string $negosiasi_klarifikasi
 * @property string $usulan_pemenang
 * @property string $penetapan_pemenang
 *
 * The followings are the available model relations:
 * @property Pengadaan $idPengadaan
 */
class PenerimaPengadaan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PenerimaPengadaan the static model class
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
		return 'penerima_pengadaan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('perusahaan, id_pengadaan', 'required'),
			array('perusahaan', 'length', 'max'=>100),
			array('id_pengadaan, nilai', 'length', 'max'=>255),
			array('alamat, npwp, biaya, undangan_prakualifikasi, pendaftaran_pelelangan, pengambilan_lelang, penyampaian_lelang, evaluasi_kualifikasi, pengambilan_dokumen, ba_aanwijzing, pembukaan_penawaran_1, evaluasi_penawaran_1, pembukaan_penawaran_2, evaluasi_penawaran_2, negosiasi_klarifikasi, usulan_pemenang, penetapan_pemenang', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_penerima, perusahaan, id_pengadaan, alamat, npwp, nilai, biaya, undangan_prakualifikasi, pendaftaran_pelelangan, pengambilan_lelang, penyampaian_lelang, evaluasi_kualifikasi, pengambilan_dokumen, ba_aanwijzing, pembukaan_penawaran_1, evaluasi_penawaran_1, pembukaan_penawaran_2, evaluasi_penawaran_2, negosiasi_klarifikasi, usulan_pemenang, penetapan_pemenang', 'safe', 'on'=>'search'),
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
			'idPengadaan' => array(self::BELONGS_TO, 'Pengadaan', 'id_pengadaan'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_penerima' => 'Id Penerima',
			'perusahaan' => 'Perusahaan',
			'id_pengadaan' => 'Id Pengadaan',
			'alamat' => 'Alamat',
			'npwp' => 'Npwp',
			'nilai' => 'Nilai',
			'biaya' => 'Biaya',
			'undangan_prakualifikasi' => 'Undangan Prakualifikasi',
			'pendaftaran_pelelangan' => 'Pendaftaran Pelelangan',
			'pengambilan_lelang' => 'Pengambilan Lelang',
			'penyampaian_lelang' => 'Penyampaian Lelang',
			'evaluasi_kualifikasi' => 'Evaluasi Kualifikasi',
			'pengambilan_dokumen' => 'Pengambilan Dokumen',
			'ba_aanwijzing' => 'Ba Aanwijzing',
			'pembukaan_penawaran_1' => 'Pembukaan Penawaran 1',
			'evaluasi_penawaran_1' => 'Evaluasi Penawaran 1',
			'pembukaan_penawaran_2' => 'Pembukaan Penawaran 2',
			'evaluasi_penawaran_2' => 'Evaluasi Penawaran 2',
			'negosiasi_klarifikasi' => 'Negosiasi Klarifikasi',
			'usulan_pemenang' => 'Usulan Pemenang',
			'penetapan_pemenang' => 'Penetapan Pemenang',
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

		$criteria->compare('id_penerima',$this->id_penerima,true);
		$criteria->compare('perusahaan',$this->perusahaan,true);
		$criteria->compare('id_pengadaan',$this->id_pengadaan,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('npwp',$this->npwp,true);
		$criteria->compare('nilai',$this->nilai,true);
		$criteria->compare('biaya',$this->biaya,true);
		$criteria->compare('undangan_prakualifikasi',$this->undangan_prakualifikasi,true);
		$criteria->compare('pendaftaran_pelelangan',$this->pendaftaran_pelelangan,true);
		$criteria->compare('pengambilan_lelang',$this->pengambilan_lelang,true);
		$criteria->compare('penyampaian_lelang',$this->penyampaian_lelang,true);
		$criteria->compare('evaluasi_kualifikasi',$this->evaluasi_kualifikasi,true);
		$criteria->compare('pengambilan_dokumen',$this->pengambilan_dokumen,true);
		$criteria->compare('ba_aanwijzing',$this->ba_aanwijzing,true);
		$criteria->compare('pembukaan_penawaran_1',$this->pembukaan_penawaran_1,true);
		$criteria->compare('evaluasi_penawaran_1',$this->evaluasi_penawaran_1,true);
		$criteria->compare('pembukaan_penawaran_2',$this->pembukaan_penawaran_2,true);
		$criteria->compare('evaluasi_penawaran_2',$this->evaluasi_penawaran_2,true);
		$criteria->compare('negosiasi_klarifikasi',$this->negosiasi_klarifikasi,true);
		$criteria->compare('usulan_pemenang',$this->usulan_pemenang,true);
		$criteria->compare('penetapan_pemenang',$this->penetapan_pemenang,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}