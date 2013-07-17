<?php

/**
 * This is the model class for table "berita_acara_evaluasi_penawaran".
 *
 * The followings are the available columns in table 'berita_acara_evaluasi_penawaran':
 * @property string $id_dokumen
 * @property string $nomor
 * @property string $waktu
 * @property string $tempat
 *
 * The followings are the available model relations:
 * @property Dokumen $idDokumen
 */
class BeritaAcaraEvaluasiPenawaran extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BeritaAcaraEvaluasiPenawaran the static model class
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
		return 'berita_acara_evaluasi_penawaran';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_dokumen, nomor, waktu, tempat', 'required'),
			array('id_dokumen', 'length', 'max'=>32),
			array('nomor, tempat', 'length', 'max'=>256),
			array('waktu', 'check'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_dokumen, nomor, waktu, tempat', 'safe', 'on'=>'search'),
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
			'waktu' => 'Waktu',
			'tempat' => 'Tempat',
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
		$criteria->compare('waktu',$this->waktu,true);
		$criteria->compare('tempat',$this->tempat,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function Check($attribute,$params){		
		if(!preg_match("/(2[0-3]|[01][0-9]):[0-5][0-9]/", $this->attributes['waktu'])){
			$this->addError($attribute, 'Waktu tidak sesuai dengan format');
		}
	}
}