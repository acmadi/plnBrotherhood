<?php

/**
 * This is the model class for table "berita_acara_negosiasi_klarifikasi".
 *
 * The followings are the available columns in table 'berita_acara_negosiasi_klarifikasi':
 * @property string $id_dokumen
 * @property string $nomor
 * @property string $surat_penawaran_harga
 * @property string $hak_kewajiban_penyedia
 * @property string $id_panitia
 *
 * The followings are the available model relations:
 * @property Dokumen $idDokumen
 * @property Pengadaan $idPanitia
 */
class BeritaAcaraNegosiasiKlarifikasi extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BeritaAcaraNegosiasiKlarifikasi the static model class
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
		return 'berita_acara_negosiasi_klarifikasi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_dokumen, nomor, surat_penawaran_harga, hak_kewajiban_penyedia, id_panitia', 'required'),
			array('id_dokumen', 'length', 'max'=>32),
			array('nomor, surat_penawaran_harga, hak_kewajiban_penyedia', 'length', 'max'=>50),
			array('id_panitia', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_dokumen, nomor, surat_penawaran_harga, hak_kewajiban_penyedia, id_panitia', 'safe', 'on'=>'search'),
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
			'idPanitia' => array(self::BELONGS_TO, 'Pengadaan', 'id_panitia'),
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
			'surat_penawaran_harga' => 'Surat Penawaran Harga',
			'hak_kewajiban_penyedia' => 'Hak Kewajiban Penyedia',
			'id_panitia' => 'Id Panitia',
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
		$criteria->compare('surat_penawaran_harga',$this->surat_penawaran_harga,true);
		$criteria->compare('hak_kewajiban_penyedia',$this->hak_kewajiban_penyedia,true);
		$criteria->compare('id_panitia',$this->id_panitia,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}