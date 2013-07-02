<?php

/**
 * This is the model class for table "rincian_rks".
 *
 * The followings are the available columns in table 'rincian_rks':
 * @property string $id_rincian
 * @property string $nama_rincian
 * @property string $id_dokumen
 *
 * The followings are the available model relations:
 * @property Rks $idDokumen
 */
class RincianRks extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RincianRks the static model class
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
		return 'rincian_rks';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama_rincian, id_dokumen', 'required'),
			array('nama_rincian', 'length', 'max'=>256),
			array('id_dokumen', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_rincian, nama_rincian, id_dokumen', 'safe', 'on'=>'search'),
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
			'idDokumen' => array(self::BELONGS_TO, 'Rks', 'id_dokumen'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_rincian' => 'Id Rincian',
			'nama_rincian' => 'Nama Rincian',
			'id_dokumen' => 'Id Dokumen',
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

		$criteria->compare('id_rincian',$this->id_rincian,true);
		$criteria->compare('nama_rincian',$this->nama_rincian,true);
		$criteria->compare('id_dokumen',$this->id_dokumen,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}