<?php

/**
 * This is the model class for table "surat_undangan_pengambilan_dokumen_pengadaan".
 *
 * The followings are the available columns in table 'surat_undangan_pengambilan_dokumen_pengadaan':
 * @property string $id_dokumen
 * @property string $nomor
 * @property string $perihal
 * @property string $tanggal_pengambilan
 * @property string $waktu_pengambilan
 * @property string $tempat_pengambilan
 *
 * The followings are the available model relations:
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
			array('id_dokumen, nomor, perihal, tanggal_pengambilan, waktu_pengambilan, tempat_pengambilan', 'required'),
			array('id_dokumen', 'length', 'max'=>32),
			array('nomor', 'length', 'max'=>50),
			array('perihal', 'length', 'max'=>100),
			array('tempat_pengambilan', 'length', 'max'=>256),
			array('waktu_pengambilan','check'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_dokumen, nomor, perihal, tanggal_pengambilan, waktu_pengambilan, tempat_pengambilan', 'safe', 'on'=>'search'),
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
			'perihal' => 'Perihal',
			'tanggal_pengambilan' => 'Tanggal Pengambilan',
			'waktu_pengambilan' => 'Waktu Pengambilan',
			'tempat_pengambilan' => 'Tempat Pengambilan',
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
		$criteria->compare('perihal',$this->perihal,true);
		$criteria->compare('tanggal_pengambilan',$this->tanggal_pengambilan,true);
		$criteria->compare('waktu_pengambilan',$this->waktu_pengambilan,true);
		$criteria->compare('tempat_pengambilan',$this->tempat_pengambilan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function Check($attribute,$params){		
		if(!preg_match("/(2[0-3]|[01][0-9]):[0-5][0-9]/", $this->attributes['waktu_pengambilan'])){
			$this->addError($attribute, 'Waktu tidak sesuai dengan format');
		}
	}
}