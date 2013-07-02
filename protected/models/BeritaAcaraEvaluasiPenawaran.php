<?php

/**
 * This is the model class for table "berita_acara_evaluasi_penawaran".
 *
 * The followings are the available columns in table 'berita_acara_evaluasi_penawaran':
 * @property string $id_dokumen
 * @property string $nomor
 * @property string $pemenang
 * @property string $alamat
 * @property string $NPWP
 * @property integer $nilai
 * @property string $pemenang_2
 * @property string $alamat_2
 * @property string $NPWP_2
 * @property integer $nilai_2
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
			array('id_dokumen, nomor, pemenang, alamat, NPWP, nilai, pemenang_2, alamat_2, NPWP_2, nilai_2', 'required'),
			array('nilai, nilai_2', 'numerical', 'integerOnly'=>true),
			array('id_dokumen', 'length', 'max'=>32),
			array('nomor', 'length', 'max'=>50),
			array('pemenang, NPWP, pemenang_2, NPWP_2', 'length', 'max'=>100),
			array('alamat, alamat_2', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_dokumen, nomor, pemenang, alamat, NPWP, nilai, pemenang_2, alamat_2, NPWP_2, nilai_2', 'safe', 'on'=>'search'),
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
			'pemenang' => 'Pemenang',
			'alamat' => 'Alamat',
			'NPWP' => 'Npwp',
			'nilai' => 'Nilai',
			'pemenang_2' => 'Pemenang 2',
			'alamat_2' => 'Alamat 2',
			'NPWP_2' => 'Npwp 2',
			'nilai_2' => 'Nilai 2',
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
		$criteria->compare('pemenang',$this->pemenang,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('NPWP',$this->NPWP,true);
		$criteria->compare('nilai',$this->nilai);
		$criteria->compare('pemenang_2',$this->pemenang_2,true);
		$criteria->compare('alamat_2',$this->alamat_2,true);
		$criteria->compare('NPWP_2',$this->NPWP_2,true);
		$criteria->compare('nilai_2',$this->nilai_2);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}