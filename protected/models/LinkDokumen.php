<?php

/**
 * This is the model class for table "link_dokumen".
 *
 * The followings are the available columns in table 'link_dokumen':
 * @property string $id_link
 * @property string $id_dokumen
 * @property string $waktu_upload
 * @property string $tanggal_upload
 * @property string $pengunggah
 * @property integer $nomor_link
 *
 * The followings are the available model relations:
 * @property Dokumen $idDokumen
 * @property User $pengunggah0
 */
class LinkDokumen extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LinkDokumen the static model class
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
		return 'link_dokumen';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_link, id_dokumen', 'required'),
			array('nomor_link', 'numerical', 'integerOnly'=>true),
			array('id_link, id_dokumen, pengunggah', 'length', 'max'=>32),
			array('waktu_upload, tanggal_upload', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_link, id_dokumen, waktu_upload, tanggal_upload, pengunggah, nomor_link', 'safe', 'on'=>'search'),
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
			'pengunggah0' => array(self::BELONGS_TO, 'User', 'pengunggah'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_link' => 'Id Link',
			'id_dokumen' => 'Id Dokumen',
			'waktu_upload' => 'Waktu Upload',
			'tanggal_upload' => 'Tanggal Upload',
			'pengunggah' => 'Pengunggah',
			'nomor_link' => 'Nomor Link',
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

		$criteria->compare('id_link',$this->id_link,true);
		$criteria->compare('id_dokumen',$this->id_dokumen,true);
		$criteria->compare('waktu_upload',$this->waktu_upload,true);
		$criteria->compare('tanggal_upload',$this->tanggal_upload,true);
		$criteria->compare('pengunggah',$this->pengunggah,true);
		$criteria->compare('nomor_link',$this->nomor_link);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function inputData($id, $user)
	{
		date_default_timezone_set("Asia/Jakarta");
		$date = date_create();
		$sec = time() + (7*3600);
		$hours = ($sec / 3600) % 24;
		$minutes = ($sec / 60) % 60;
		$seconds = $sec % 60;
		$waktu_upload = $hours . ':' . $minutes . ':' . $seconds;

		$updatedModel = new LinkDokumen;
		$updatedModel->id_link=$this->count()+1;
		$updatedModel->id_dokumen=$id;
		$updatedModel->waktu_upload=$waktu_upload;
		$updatedModel->tanggal_upload=date("Y-m-d");
		$updatedModel->pengunggah=$user;
		$updatedModel->nomor_link=$this->count('id_dokumen ="' . $id . '"')+1;
		$updatedModel->save();
	}
}