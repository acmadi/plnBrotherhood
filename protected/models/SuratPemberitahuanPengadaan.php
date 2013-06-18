<?php

/**
 * This is the model class for table "surat_pemberitahuan_pengadaan".
 *
 * The followings are the available columns in table 'surat_pemberitahuan_pengadaan':
 * @property string $id_dokumen
 * @property string $nomor
 * @property string $id_panitia
 * @property string $perihal
 * @property string $lingkup_kerja
 * @property string $tanggal_penawaran
 * @property string $waktu_kerja
 *
 * The followings are the available model relations:
 * @property Dokumen $idDokumen
 * @property Pengadaan $idPanitia
 */
class SuratPemberitahuanPengadaan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SuratPemberitahuanPengadaan the static model class
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
		return 'surat_pemberitahuan_pengadaan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_dokumen, nomor, id_panitia, perihal, lingkup_kerja, tanggal_penawaran, waktu_kerja', 'required'),
			array('id_dokumen, lingkup_kerja', 'length', 'max'=>32),
			array('nomor, waktu_kerja', 'length', 'max'=>20),
			array('id_panitia', 'length', 'max'=>11),
			array('perihal', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_dokumen, nomor, id_panitia, perihal, lingkup_kerja, tanggal_penawaran, waktu_kerja', 'safe', 'on'=>'search'),
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
			'id_panitia' => 'Id Panitia',
			'perihal' => 'Perihal',
			'lingkup_kerja' => 'Lingkup Kerja',
			'tanggal_penawaran' => 'Tanggal Penawaran',
			'waktu_kerja' => 'Waktu Kerja',
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
		$criteria->compare('id_panitia',$this->id_panitia,true);
		$criteria->compare('perihal',$this->perihal,true);
		$criteria->compare('lingkup_kerja',$this->lingkup_kerja,true);
		$criteria->compare('tanggal_penawaran',$this->tanggal_penawaran,true);
		$criteria->compare('waktu_kerja',$this->waktu_kerja,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}