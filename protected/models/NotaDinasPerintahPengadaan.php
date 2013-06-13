<?php

/**
 * This is the model class for table "nota_dinas_perintah_pengadaan".
 *
 * The followings are the available columns in table 'nota_dinas_perintah_pengadaan':
 * @property string $id_dokumen
 * @property string $nota_dinas_permintaan
 * @property string $nomor
 * @property string $dari
 * @property string $kepada
 * @property string $perihal
 * @property string $RAB
 * @property string $TOR_RKS
 * @property integer $targetSPK_kontrak
 * @property string $sumber_dana
 * @property string $pagu_anggaran
 *
 * The followings are the available model relations:
 * @property NotaDinasPermintaan $notaDinasPermintaan
 * @property Dokumen $idDokumen
 */
class NotaDinasPerintahPengadaan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return NotaDinasPerintahPengadaan the static model class
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
		return 'nota_dinas_perintah_pengadaan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_dokumen, nota_dinas_permintaan, nomor, dari, kepada, perihal, RAB, TOR_RKS, targetSPK_kontrak, sumber_dana, pagu_anggaran', 'required'),
			array('targetSPK_kontrak', 'numerical', 'integerOnly'=>true),
			array('id_dokumen, TOR_RKS', 'length', 'max'=>32),
			array('nota_dinas_permintaan, nomor, dari, RAB, sumber_dana, pagu_anggaran', 'length', 'max'=>20),
			array('kepada, perihal', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_dokumen, nota_dinas_permintaan, nomor, dari, kepada, perihal, RAB, TOR_RKS, targetSPK_kontrak, sumber_dana, pagu_anggaran', 'safe', 'on'=>'search'),
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
			'notaDinasPermintaan' => array(self::BELONGS_TO, 'NotaDinasPermintaan', 'nota_dinas_permintaan'),
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
			'nota_dinas_permintaan' => 'Nota Dinas Permintaan',
			'nomor' => 'Nomor',
			'dari' => 'Dari',
			'kepada' => 'Kepada',
			'perihal' => 'Perihal',
			'RAB' => 'Rab',
			'TOR_RKS' => 'Tor Rks',
			'targetSPK_kontrak' => 'Target Spk Kontrak',
			'sumber_dana' => 'Sumber Dana',
			'pagu_anggaran' => 'Pagu Anggaran',
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
		$criteria->compare('nota_dinas_permintaan',$this->nota_dinas_permintaan,true);
		$criteria->compare('nomor',$this->nomor,true);
		$criteria->compare('dari',$this->dari,true);
		$criteria->compare('kepada',$this->kepada,true);
		$criteria->compare('perihal',$this->perihal,true);
		$criteria->compare('RAB',$this->RAB,true);
		$criteria->compare('TOR_RKS',$this->TOR_RKS,true);
		$criteria->compare('targetSPK_kontrak',$this->targetSPK_kontrak);
		$criteria->compare('sumber_dana',$this->sumber_dana,true);
		$criteria->compare('pagu_anggaran',$this->pagu_anggaran,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}