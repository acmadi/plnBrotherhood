<?php

/**
 * This is the model class for table "surat_undangan_pembukaan_penawaran".
 *
 * The followings are the available columns in table 'surat_undangan_pembukaan_penawaran':
 * @property string $id_dokumen
 * @property string $id_panitia
 * @property string $nomor
 * @property string $sifat
 * @property string $perihal
 * @property string $no_RKS
 * @property string $tanggal_undangan
 * @property string $waktu
 * @property string $tempat
 * @property string $surat_keputusan
 *
 * The followings are the available model relations:
 * @property Rks $noRKS
 * @property Dokumen $idDokumen
 * @property Pengadaan $idPanitia
 */
class SuratUndanganPembukaanPenawaran extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SuratUndanganPembukaanPenawaran the static model class
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
		return 'surat_undangan_pembukaan_penawaran';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_dokumen, id_panitia, nomor, sifat, perihal, no_RKS, tanggal_undangan, waktu, tempat, surat_keputusan', 'required'),
			array('id_dokumen', 'length', 'max'=>32),
			array('id_panitia', 'length', 'max'=>11),
			array('nomor, sifat, no_RKS, waktu, surat_keputusan', 'length', 'max'=>20),
			array('perihal, tempat', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_dokumen, id_panitia, nomor, sifat, perihal, no_RKS, tanggal_undangan, waktu, tempat, surat_keputusan', 'safe', 'on'=>'search'),
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
			'noRKS' => array(self::BELONGS_TO, 'Rks', 'no_RKS'),
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
			'id_panitia' => 'Id Panitia',
			'nomor' => 'Nomor',
			'sifat' => 'Sifat',
			'perihal' => 'Perihal',
			'no_RKS' => 'No Rks',
			'tanggal_undangan' => 'Tanggal Undangan',
			'waktu' => 'Waktu',
			'tempat' => 'Tempat',
			'surat_keputusan' => 'Surat Keputusan',
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
		$criteria->compare('id_panitia',$this->id_panitia,true);
		$criteria->compare('nomor',$this->nomor,true);
		$criteria->compare('sifat',$this->sifat,true);
		$criteria->compare('perihal',$this->perihal,true);
		$criteria->compare('no_RKS',$this->no_RKS,true);
		$criteria->compare('tanggal_undangan',$this->tanggal_undangan,true);
		$criteria->compare('waktu',$this->waktu,true);
		$criteria->compare('tempat',$this->tempat,true);
		$criteria->compare('surat_keputusan',$this->surat_keputusan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}