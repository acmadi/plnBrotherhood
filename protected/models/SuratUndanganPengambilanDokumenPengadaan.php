<?php

/**
 * This is the model class for table "surat_undangan_pengambilan_dokumen_pengadaan".
 *
 * The followings are the available columns in table 'surat_undangan_pengambilan_dokumen_pengadaan':
 * @property string $id_dokumen
 * @property string $nomor
 * @property string $sifat
 * @property string $perihal
 * @property string $nama_pengadaan
 *
 * The followings are the available model relations:
 * @property Pengadaan $namaPengadaan
 * @property Dokumen $idDokumen
 */
class SuratUndanganPengambilanDokumenPengadaan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SuratUndanganPengambilanDokumenPengadaan the static model class
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
		return 'surat_undangan_pengambilan_dokumen_pengadaan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_dokumen, nomor, sifat, perihal, nama_pengadaan', 'required'),
			array('id_dokumen, sifat', 'length', 'max'=>32),
			array('nomor', 'length', 'max'=>20),
			array('perihal, nama_pengadaan', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_dokumen, nomor, sifat, perihal, nama_pengadaan', 'safe', 'on'=>'search'),
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
			'namaPengadaan' => array(self::BELONGS_TO, 'Pengadaan', 'nama_pengadaan'),
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
			'sifat' => 'Sifat',
			'perihal' => 'Perihal',
			'nama_pengadaan' => 'Nama Pengadaan',
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
		$criteria->compare('sifat',$this->sifat,true);
		$criteria->compare('perihal',$this->perihal,true);
		$criteria->compare('nama_pengadaan',$this->nama_pengadaan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}