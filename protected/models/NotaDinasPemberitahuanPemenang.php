<?php

/**
 * This is the model class for table "nota_dinas_pemberitahuan_pemenang".
 *
 * The followings are the available columns in table 'nota_dinas_pemberitahuan_pemenang':
 * @property string $id_dokumen
 * @property string $nomor
 * @property string $dari
 * @property string $nama_penyedia
 * @property string $alamat
 * @property string $NPWP
 * @property string $biaya
 * @property string $waktu_pelaksanaan
 * @property string $tempat_penyerahan
 *
 * The followings are the available model relations:
 * @property Pengadaan $namaPenyedia
 * @property Dokumen $idDokumen
 */
class NotaDinasPemberitahuanPemenang extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return NotaDinasPemberitahuanPemenang the static model class
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
		return 'nota_dinas_pemberitahuan_pemenang';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_dokumen, nomor, dari, nama_penyedia, alamat, NPWP, biaya, waktu_pelaksanaan, tempat_penyerahan', 'required'),
			array('id_dokumen', 'length', 'max'=>32),
			array('nomor, dari', 'length', 'max'=>50),
			array('nama_penyedia, NPWP, biaya, tempat_penyerahan', 'length', 'max'=>20),
			array('alamat', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_dokumen, nomor, dari, nama_penyedia, alamat, NPWP, biaya, waktu_pelaksanaan, tempat_penyerahan', 'safe', 'on'=>'search'),
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
			'namaPenyedia' => array(self::BELONGS_TO, 'Pengadaan', 'nama_penyedia'),
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
			'dari' => 'Dari',
			'nama_penyedia' => 'Nama Penyedia',
			'alamat' => 'Alamat',
			'NPWP' => 'Npwp',
			'biaya' => 'Biaya',
			'waktu_pelaksanaan' => 'Waktu Pelaksanaan',
			'tempat_penyerahan' => 'Tempat Penyerahan',
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
		$criteria->compare('dari',$this->dari,true);
		$criteria->compare('nama_penyedia',$this->nama_penyedia,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('NPWP',$this->NPWP,true);
		$criteria->compare('biaya',$this->biaya,true);
		$criteria->compare('waktu_pelaksanaan',$this->waktu_pelaksanaan,true);
		$criteria->compare('tempat_penyerahan',$this->tempat_penyerahan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}