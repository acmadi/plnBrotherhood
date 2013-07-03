<?php

/**
 * This is the model class for table "nota_dinas_permintaan_tor_rab".
 *
 * The followings are the available columns in table 'nota_dinas_permintaan_tor_rab':
 * @property string $id_dokumen
 * @property string $nomor
 * @property string $divisi_peminta
 * @property string $permintaan
 * @property string $nama_pengadaan
 * @property string $nota_dinas_permintaan
 * @property string $tanggal_nota_dinas_permintaan
 * @property string $perihal_permintaan
 *
 * The followings are the available model relations:
 * @property Dokumen $idDokumen
 */
class NotaDinasPermintaanTorRab extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return NotaDinasPermintaanTorRab the static model class
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
		return 'nota_dinas_permintaan_tor_rab';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_dokumen, nomor, divisi_peminta, permintaan, nama_pengadaan, nota_dinas_permintaan, tanggal_nota_dinas_permintaan, perihal_permintaan', 'required'),
			array('id_dokumen, nota_dinas_permintaan', 'length', 'max'=>100),
			array('nomor, divisi_peminta, permintaan, nama_pengadaan, perihal_permintaan', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_dokumen, nomor, divisi_peminta, permintaan, nama_pengadaan, nota_dinas_permintaan, tanggal_nota_dinas_permintaan, perihal_permintaan', 'safe', 'on'=>'search'),
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
			'divisi_peminta' => 'Divisi Peminta',
			'permintaan' => 'Permintaan',
			'nama_pengadaan' => 'Nama Pengadaan',
			'nota_dinas_permintaan' => 'Nota Dinas Permintaan',
			'tanggal_nota_dinas_permintaan' => 'Tanggal Nota Dinas Permintaan',
			'perihal_permintaan' => 'Perihal Permintaan',
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
		$criteria->compare('divisi_peminta',$this->divisi_peminta,true);
		$criteria->compare('permintaan',$this->permintaan,true);
		$criteria->compare('nama_pengadaan',$this->nama_pengadaan,true);
		$criteria->compare('nota_dinas_permintaan',$this->nota_dinas_permintaan,true);
		$criteria->compare('tanggal_nota_dinas_permintaan',$this->tanggal_nota_dinas_permintaan,true);
		$criteria->compare('perihal_permintaan',$this->perihal_permintaan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}