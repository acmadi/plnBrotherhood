<?php

/**
 * This is the model class for table "rks".
 *
 * The followings are the available columns in table 'rks':
 * @property string $id_dokumen
 * @property string $nomor
 * @property string $tanggal_permintaan_penawaran
 * @property string $tanggal_penjelasan
 * @property string $waktu_penjelasan
 * @property string $tempat_penjelasan
 * @property string $tanggal_pemasukan_penawaran
 * @property string $tanggal_akhir_pemasukan_penawaran
 * @property string $waktu_pemasukan_penawaran
 * @property string $tempat_pemasukan_penawaran
 * @property string $tanggal_negosiasi
 * @property string $waktu_negosiasi
 * @property string $tempat_negosiasi
 * @property string $tanggal_penetapan_pemenang
 * @property string $waktu_penetapan_pemenang
 * @property string $tempat_penetapan_pemenang
 *
 * The followings are the available model relations:
 * @property BeritaAcaraEvaluasiPenawaran[] $beritaAcaraEvaluasiPenawarans
 * @property Dokumen $idDokumen
 */
class Rks extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Rks the static model class
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
		return 'rks';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_dokumen, nomor, tanggal_permintaan_penawaran, tanggal_penjelasan, waktu_penjelasan, tempat_penjelasan, tanggal_pemasukan_penawaran, tanggal_akhir_pemasukan_penawaran, waktu_pemasukan_penawaran, tempat_pemasukan_penawaran, tanggal_negosiasi, waktu_negosiasi, tempat_negosiasi, tanggal_penetapan_pemenang, waktu_penetapan_pemenang, tempat_penetapan_pemenang', 'required'),
			array('id_dokumen', 'length', 'max'=>32),
			array('nomor', 'length', 'max'=>50),
			array('tempat_penjelasan, tempat_pemasukan_penawaran, tempat_negosiasi, tempat_penetapan_pemenang', 'length', 'max'=>256),
			array('tanggal_penjelasan','check1'),
			array('tanggal_pemasukan_penawaran','check2'),
			array('tanggal_akhir_pemasukan_penawaran','check3'),
			array('tanggal_negosiasi','check4'),
			array('tanggal_penetapan_pemenang','check5'),
			array('waktu_penjelasan','check6'),
			array('waktu_pemasukan_penawaran','check7'),
			array('waktu_negosiasi','check8'),
			array('waktu_penetapan_pemenang','check9'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_dokumen, nomor, tanggal_permintaan_penawaran, tanggal_penjelasan, waktu_penjelasan, tempat_penjelasan, tanggal_pemasukan_penawaran, tanggal_akhir_pemasukan_penawaran, waktu_pemasukan_penawaran, tempat_pemasukan_penawaran, tanggal_negosiasi, waktu_negosiasi, tempat_negosiasi, tanggal_penetapan_pemenang, waktu_penetapan_pemenang, tempat_penetapan_pemenang', 'safe', 'on'=>'search'),
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
			'beritaAcaraEvaluasiPenawarans' => array(self::HAS_MANY, 'BeritaAcaraEvaluasiPenawaran', 'no_RKS'),
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
			'tanggal_permintaan_penawaran' => 'Tanggal Permintaan Penawaran',
			'tanggal_penjelasan' => 'Tanggal Penjelasan',
			'waktu_penjelasan' => 'Waktu Penjelasan',
			'tempat_penjelasan' => 'Tempat Penjelasan',
			'tanggal_pemasukan_penawaran' => 'Tanggal Pemasukan Penawaran',
			'tanggal_akhir_pemasukan_penawaran' => 'Tanggal Akhir Pemasukan Penawaran',
			'waktu_pemasukan_penawaran' => 'Waktu Pemasukan Penawaran',
			'tempat_pemasukan_penawaran' => 'Tempat Pemasukan Penawaran',
			'tanggal_negosiasi' => 'Tanggal Negosiasi',
			'waktu_negosiasi' => 'Waktu Negosiasi',
			'tempat_negosiasi' => 'Tempat Negosiasi',
			'tanggal_penetapan_pemenang' => 'Tanggal Penetapan Pemenang',
			'waktu_penetapan_pemenang' => 'Waktu Penetapan Pemenang',
			'tempat_penetapan_pemenang' => 'Tempat Penetapan Pemenang',
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
		$criteria->compare('tanggal_permintaan_penawaran',$this->tanggal_permintaan_penawaran,true);
		$criteria->compare('tanggal_penjelasan',$this->tanggal_penjelasan,true);
		$criteria->compare('waktu_penjelasan',$this->waktu_penjelasan,true);
		$criteria->compare('tempat_penjelasan',$this->tempat_penjelasan,true);
		$criteria->compare('tanggal_pemasukan_penawaran',$this->tanggal_pemasukan_penawaran,true);
		$criteria->compare('tanggal_akhir_pemasukan_penawaran',$this->tanggal_akhir_pemasukan_penawaran,true);
		$criteria->compare('waktu_pemasukan_penawaran',$this->waktu_pemasukan_penawaran,true);
		$criteria->compare('tempat_pemasukan_penawaran',$this->tempat_pemasukan_penawaran,true);
		$criteria->compare('tanggal_negosiasi',$this->tanggal_negosiasi,true);
		$criteria->compare('waktu_negosiasi',$this->waktu_negosiasi,true);
		$criteria->compare('tempat_negosiasi',$this->tempat_negosiasi,true);
		$criteria->compare('tanggal_penetapan_pemenang',$this->tanggal_penetapan_pemenang,true);
		$criteria->compare('waktu_penetapan_pemenang',$this->waktu_penetapan_pemenang,true);
		$criteria->compare('tempat_penetapan_pemenang',$this->tempat_penetapan_pemenang,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function Check1($attribute,$params){
		if($this->attributes['tanggal_permintaan_penawaran'] >= $this->attributes['tanggal_penjelasan']) {
			$this->addError($attribute, 'Tanggal penjelasan harus lebih besar dari tanggal permintaan penawaran');
		}
	}
	
	public function Check2($attribute,$params){
		if($this->attributes['tanggal_penjelasan'] >= $this->attributes['tanggal_pemasukan_penawaran']) {
			$this->addError($attribute, 'Tanggal awal pemasukan penawaran harus lebih besar dari tanggal penjelasan');
		}
	}
	
	public function Check3($attribute,$params){
		if($this->attributes['tanggal_pemasukan_penawaran'] >= $this->attributes['tanggal_akhir_pemasukan_penawaran']) {
			$this->addError($attribute, 'Tanggal akhir pemasukan penawaran harus lebih besar dari tanggal awal pemasukan penawaran');
		}
	}
	
	public function Check4($attribute,$params){
		if($this->attributes['tanggal_akhir_pemasukan_penawaran'] >= $this->attributes['tanggal_negosiasi']) {
			$this->addError($attribute, 'Tanggal negosiasi harus lebih besar dari tanggal akhir pemasukan penawaran');
		}
	}
	
	public function Check5($attribute,$params){
		if($this->attributes['tanggal_negosiasi'] >= $this->attributes['tanggal_penetapan_pemenang']) {
			$this->addError($attribute, 'Tanggal penetapan pemenang harus lebih besar dari tanggal negosiasi');
		}
	}
	
	public function Check6($attribute,$params){		
		if(!preg_match("/(2[0-3]|[01][0-9]):[0-5][0-9]/", $this->attributes['waktu_penjelasan'])){
			$this->addError($attribute, 'Waktu tidak sesuai dengan format');
		}
	}
	
	public function Check7($attribute,$params){		
		if(!preg_match("/(2[0-3]|[01][0-9]):[0-5][0-9]/", $this->attributes['waktu_pemasukan_penawaran'])){
			$this->addError($attribute, 'Waktu tidak sesuai dengan format');
		}
	}
	
	public function Check8($attribute,$params){		
		if(!preg_match("/(2[0-3]|[01][0-9]):[0-5][0-9]/", $this->attributes['waktu_negosiasi'])){
			$this->addError($attribute, 'Waktu tidak sesuai dengan format');
		}
	}
	
	public function Check9($attribute,$params){		
		if(!preg_match("/(2[0-3]|[01][0-9]):[0-5][0-9]/", $this->attributes['waktu_penetapan_pemenang'])){
			$this->addError($attribute, 'Waktu tidak sesuai dengan format');
		}
	}
	
	protected function beforeSave()
	{ 
		$this->tanggal_permintaan_penawaran=date('Y-m-d', strtotime($this->tanggal_permintaan_penawaran));
		$this->tanggal_penjelasan=date('Y-m-d', strtotime($this->tanggal_penjelasan));
		$this->tanggal_pemasukan_penawaran=date('Y-m-d', strtotime($this->tanggal_pemasukan_penawaran));
		$this->tanggal_akhir_pemasukan_penawaran=date('Y-m-d', strtotime($this->tanggal_akhir_pemasukan_penawaran));
		$this->tanggal_negosiasi=date('Y-m-d', strtotime($this->tanggal_negosiasi));
		$this->tanggal_penetapan_pemenang=date('Y-m-d', strtotime($this->tanggal_penetapan_pemenang));
		return TRUE;
	}

}