<?php

/**
 * This is the model class for table "penerima_pengadaan".
 *
 * The followings are the available columns in table 'penerima_pengadaan':
 * @property string $id_penerima
 * @property string $perusahaan
 * @property string $status
 * @property string $id_pengadaan
 * @property string $alamat
 * @property string $npwp
 * @property string $nilai
 * @property string $tahap
 * @property string $undangan_prakualifikasi
 * @property string $ba_evaluasi_prakualifikasi
 * @property string $undangan_pengambilan_dokumen
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
			array('status', 'length', 'max'=>20),
			array('id_pengadaan, nilai', 'length', 'max'=>255),
			array('alamat, npwp, tahap, undangan_prakualifikasi, ba_evaluasi_prakualifikasi, undangan_pengambilan_dokumen, ba_aanwijzing, pembukaan_penawaran_1, evaluasi_penawaran_1, pembukaan_penawaran_2, evaluasi_penawaran_2, negosiasi_klarifikasi, usulan_pemenang, penetapan_pemenang', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_penerima, perusahaan, status, id_pengadaan, alamat, npwp, nilai, tahap, undangan_prakualifikasi, ba_evaluasi_prakualifikasi, undangan_pengambilan_dokumen, ba_aanwijzing, pembukaan_penawaran_1, evaluasi_penawaran_1, pembukaan_penawaran_2, evaluasi_penawaran_2, negosiasi_klarifikasi, usulan_pemenang, penetapan_pemenang', 'safe', 'on'=>'search'),
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
			'status' => 'Status',
			'id_pengadaan' => 'Id Pengadaan',
			'alamat' => 'Alamat',
			'npwp' => 'Npwp',
			'nilai' => 'Nilai',
			'tahap' => 'Tahap',
			'undangan_prakualifikasi' => 'Undangan Prakualifikasi',
			'ba_evaluasi_prakualifikasi' => 'Ba Evaluasi Prakualifikasi',
			'undangan_pengambilan_dokumen' => 'Undangan Pengambilan Dokumen',
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
		$criteria->compare('status',$this->status,true);
		$criteria->compare('id_pengadaan',$this->id_pengadaan,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('npwp',$this->npwp,true);
		$criteria->compare('nilai',$this->nilai,true);
		$criteria->compare('tahap',$this->tahap,true);
		$criteria->compare('undangan_prakualifikasi',$this->undangan_prakualifikasi,true);
		$criteria->compare('ba_evaluasi_prakualifikasi',$this->ba_evaluasi_prakualifikasi,true);
		$criteria->compare('undangan_pengambilan_dokumen',$this->undangan_pengambilan_dokumen,true);
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