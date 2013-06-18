<?php

/**
 * This is the model class for table "surat_pernyataan_minat".
 *
 * The followings are the available columns in table 'surat_pernyataan_minat':
 * @property string $id_dokumen
 * @property string $nama
 * @property string $jabatan
 * @property string $bertindak
 * @property string $alamat
 * @property string $telepon_fax
 * @property string $email
 * @property string $kantor_pusat_unit
 *
 * The followings are the available model relations:
 * @property Dokumen $idDokumen
 */
class SuratPernyataanMinat extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SuratPernyataanMinat the static model class
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
		return 'surat_pernyataan_minat';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_dokumen, nama, jabatan, bertindak, alamat, telepon_fax, email, kantor_pusat_unit', 'required'),
			array('id_dokumen', 'length', 'max'=>32),
			array('nama', 'length', 'max'=>50),
			array('jabatan, bertindak', 'length', 'max'=>30),
			array('alamat', 'length', 'max'=>100),
			array('telepon_fax, email, kantor_pusat_unit', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_dokumen, nama, jabatan, bertindak, alamat, telepon_fax, email, kantor_pusat_unit', 'safe', 'on'=>'search'),
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
			'nama' => 'Nama',
			'jabatan' => 'Jabatan',
			'bertindak' => 'Bertindak',
			'alamat' => 'Alamat',
			'telepon_fax' => 'Telepon Fax',
			'email' => 'Email',
			'kantor_pusat_unit' => 'Kantor Pusat Unit',
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
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('jabatan',$this->jabatan,true);
		$criteria->compare('bertindak',$this->bertindak,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('telepon_fax',$this->telepon_fax,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('kantor_pusat_unit',$this->kantor_pusat_unit,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}