<?php

/**
 * This is the model class for table "surat_pengumuman_pelelangan".
 *
 * The followings are the available columns in table 'surat_pengumuman_pelelangan':
 * @property string $id_dokumen
 * @property string $nomor
 * @property string $cara_pendaftaran
 * @property string $syarat_mengikuti_lelang
 *
 * The followings are the available model relations:
 * @property Dokumen $idDokumen
 */
class SuratPengumumanPelelangan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SuratPengumumanPelelangan the static model class
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
		return 'surat_pengumuman_pelelangan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_dokumen, nomor, syarat_mengikuti_lelang', 'required'),
			array('id_dokumen', 'length', 'max'=>32),
			array('nomor, syarat_mengikuti_lelang', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_dokumen, nomor, syarat_mengikuti_lelang', 'safe', 'on'=>'search'),
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
			'syarat_mengikuti_lelang' => 'Syarat Mengikuti Lelang',
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
		$criteria->compare('syarat_mengikuti_lelang',$this->syarat_mengikuti_lelang,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}