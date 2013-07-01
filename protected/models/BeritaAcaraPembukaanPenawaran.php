<?php

/**
 * This is the model class for table "berita_acara_pembukaan_penawaran".
 *
 * The followings are the available columns in table 'berita_acara_pembukaan_penawaran':
 * @property string $id_dokumen
 * @property string $nomor
 * @property integer $jumlah_penyedia_diundang
 * @property integer $jumlah_penyedia_dokumen_sah
 * @property integer $jumlah_penyedia_dokumen_tidak_sah
 * @property string $status_metode
 * @property string $id_panitia
 *
 * The followings are the available model relations:
 * @property Dokumen $idDokumen
 * @property Pengadaan $idPanitia
 */
class BeritaAcaraPembukaanPenawaran extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BeritaAcaraPembukaanPenawaran the static model class
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
		return 'berita_acara_pembukaan_penawaran';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_dokumen, nomor, jumlah_penyedia_diundang, jumlah_penyedia_dokumen_sah, jumlah_penyedia_dokumen_tidak_sah, status_metode', 'required'),
			array('jumlah_penyedia_diundang, jumlah_penyedia_dokumen_sah, jumlah_penyedia_dokumen_tidak_sah', 'numerical', 'integerOnly'=>true),
			array('id_dokumen', 'length', 'max'=>32),
			array('nomor', 'length', 'max'=>50),
			array('status_metode', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_dokumen, nomor, jumlah_penyedia_diundang, jumlah_penyedia_dokumen_sah, jumlah_penyedia_dokumen_tidak_sah, status_metode, id_panitia', 'safe', 'on'=>'search'),
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
			'jumlah_penyedia_diundang' => 'Jumlah Penyedia Diundang',
			'jumlah_penyedia_dokumen_sah' => 'Jumlah Penyedia Dokumen Sah',
			'jumlah_penyedia_dokumen_tidak_sah' => 'Jumlah Penyedia Dokumen Tidak Sah',
			'status_metode' => 'Status Metode',
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
		$criteria->compare('jumlah_penyedia_diundang',$this->jumlah_penyedia_diundang);
		$criteria->compare('jumlah_penyedia_dokumen_sah',$this->jumlah_penyedia_dokumen_sah);
		$criteria->compare('jumlah_penyedia_dokumen_tidak_sah',$this->jumlah_penyedia_dokumen_tidak_sah);
		$criteria->compare('status_metode',$this->status_metode,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}