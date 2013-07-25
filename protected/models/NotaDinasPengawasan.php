<?php

/**
 * This is the model class for table "nota_dinas_pengawasan".
 *
 * The followings are the available columns in table 'nota_dinas_pengawasan':
 * @property string $id_dokumen
 * @property string $nomor
 * @property string $nama_direksi
 * @property string $nip_direksi
 * @property string $jabatan_direksi
 * @property string $email_direksi
 * @property string $nama_pengawas
 * @property string $nip_pengawas
 * @property string $jabatan_pengawas
 * @property string $email_pengawas
 */
class NotaDinasPengawasan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return NotaDinasPengawasan the static model class
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
		return 'nota_dinas_pengawasan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_dokumen, nomor, nama_direksi, nip_direksi, jabatan_direksi, email_direksi, nama_pengawas, nip_pengawas, jabatan_pengawas, email_pengawas', 'required'),
			array('id_dokumen', 'length', 'max'=>32),
			array('nomor, nama_direksi, nip_direksi, jabatan_direksi, email_direksi, nama_pengawas, nip_pengawas, jabatan_pengawas, email_pengawas', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_dokumen, nomor, nama_direksi, nip_direksi, jabatan_direksi, email_direksi, nama_pengawas, nip_pengawas, jabatan_pengawas, email_pengawas', 'safe', 'on'=>'search'),
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
			'nama_direksi' => 'Nama Direksi',
			'nip_direksi' => 'Nip Direksi',
			'jabatan_direksi' => 'Jabatan Direksi',
			'email_direksi' => 'Email Direksi',
			'nama_pengawas' => 'Nama Pengawas',
			'nip_pengawas' => 'Nip Pengawas',
			'jabatan_pengawas' => 'Jabatan Pengawas',
			'email_pengawas' => 'Email Pengawas',
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
		$criteria->compare('nama_direksi',$this->nama_direksi,true);
		$criteria->compare('nip_direksi',$this->nip_direksi,true);
		$criteria->compare('jabatan_direksi',$this->jabatan_direksi,true);
		$criteria->compare('email_direksi',$this->email_direksi,true);
		$criteria->compare('nama_pengawas',$this->nama_pengawas,true);
		$criteria->compare('nip_pengawas',$this->nip_pengawas,true);
		$criteria->compare('jabatan_pengawas',$this->jabatan_pengawas,true);
		$criteria->compare('email_pengawas',$this->email_pengawas,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}