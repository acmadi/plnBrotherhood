<?php

/**
 * This is the model class for table "pengadaan".
 *
 * The followings are the available columns in table 'pengadaan':
 * @property string $id_pengadaan
 * @property string $nama_pengadaan
 * @property string $divisi_peminta
 * @property string $jenis_pengadaan
 * @property string $nama_penyedia
 * @property string $tanggal_masuk
 * @property string $tanggal_selesai
 * @property string $status
 * @property string $biaya
 * @property string $id_panitia
 * @property string $metode_pengadaan
 * @property string $metode_penawaran
 * @property string $jenis_kualifikasi
 *
 * The followings are the available model relations:
 * @property Dokumen[] $dokumens
 * @property PenerimaPengadaan[] $penerimaPengadaans
 * @property Divisi $divisiPeminta
 * @property Panitia $idPanitia
 */
class Pengadaan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pengadaan the static model class
	 */
	 
	public $sisahari;
	public $pic;
	public $ndpermintaan;
	public $statusgan;
	public $progressgan;
		
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pengadaan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_pengadaan, nama_pengadaan, divisi_peminta, jenis_pengadaan, nama_penyedia, tanggal_masuk, tanggal_selesai, status, biaya, id_panitia, metode_pengadaan, metode_penawaran, jenis_kualifikasi', 'required'),
			array('id_pengadaan', 'length', 'max'=>32),
			array('nama_pengadaan, jenis_pengadaan, nama_penyedia, status, metode_pengadaan, metode_penawaran, jenis_kualifikasi', 'length', 'max'=>256),
			array('divisi_peminta', 'length', 'max'=>20),
			array('biaya', 'length', 'max'=>255),
			array('id_panitia', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('progressgan,sisahari,statusgan,ndpermintaan,pic,id_pengadaan, nama_pengadaan, divisi_peminta, jenis_pengadaan, nama_penyedia, tanggal_masuk, tanggal_selesai, status, biaya, id_panitia, metode_pengadaan, metode_penawaran, jenis_kualifikasi', 'safe', 'on'=>'search'),
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
			'dokumens' => array(self::HAS_MANY, 'Dokumen', 'id_pengadaan'),
			'penerimaPengadaans' => array(self::HAS_MANY, 'PenerimaPengadaan', 'id_pengadaan'),
			'divisiPeminta' => array(self::BELONGS_TO, 'Divisi', 'divisi_peminta'),
			'idPanitia' => array(self::BELONGS_TO, 'Panitia', 'id_panitia'),
			'notaDinasPerintahPengadaan' => array(self::HAS_ONE, 'NotaDinasPerintahPengadaan', array('id_dokumen'=>'id_dokumen'), 'through'=>'dokumens'),
			'notaDinasPermintaan' => array(self::HAS_ONE, 'NotaDinasPermintaan', array('id_dokumen'=>'id_dokumen'), 'through'=>'dokumens'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_pengadaan' => 'Id Pengadaan',
			'nama_pengadaan' => 'Nama Pengadaan',
			'divisi_peminta' => 'User',
			'jenis_pengadaan' => 'Jenis Pengadaan',
			'nama_penyedia' => 'Nama Penyedia',
			'tanggal_masuk' => 'Tanggal Masuk',
			'tanggal_selesai' => 'Tanggal Selesai',
			'status' => 'Status',
			'biaya' => 'Biaya',
			'id_panitia' => 'Id Panitia',
			'metode_pengadaan' => 'Metode Pengadaan',
			'metode_penawaran' => 'Metode Penawaran',
			'jenis_kualifikasi' => 'Jenis Kualifikasi',
			'pic'=>'PIC',
			'ndpermintaan'=>'No ND Permintaan',
			'sisahari'=>'Sisa Hari',
			'statusgan'=>'Status',
			'progressgan'=>'Progres',
//              'dapatkanStatus()'=>'Status',
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

		$criteria->compare('id_pengadaan',$this->id_pengadaan,true);
		$criteria->compare('nama_pengadaan',$this->nama_pengadaan,true);
		$criteria->compare('divisi_peminta',$this->divisi_peminta,true);
		$criteria->compare('jenis_pengadaan',$this->jenis_pengadaan,true);
		$criteria->compare('nama_penyedia',$this->nama_penyedia,true);
		$criteria->compare('tanggal_masuk',$this->tanggal_masuk,true);
		$criteria->compare('tanggal_selesai',$this->tanggal_selesai,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('biaya',$this->biaya,true);
		$criteria->compare('id_panitia',$this->id_panitia,true);
		$criteria->compare('metode_pengadaan',$this->metode_pengadaan,true);
		$criteria->compare('metode_penawaran',$this->metode_penawaran,true);
		$criteria->compare('jenis_kualifikasi',$this->jenis_kualifikasi,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function searchDashboard()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		
		$sort = new CSort();
		$sort->attributes = array(
			'nama_pengadaan'=>array(
			  'asc'=>'nama_pengadaan',
			  'desc'=>'nama_pengadaan desc',
			),
			'User'=>array(
			  'asc'=>'divisi_peminta',
			  'desc'=>'divisi_peminta desc',
			),
			'statusgan'=>array(
			  'asc'=>'ABS(status)',
			  'desc'=>'ABS(status) desc',                            
			),
			'progressgan'=>array(
			  'asc'=>'ABS(status)',
			  'desc'=>'ABS(status) desc',
			),       
			'pic'=>array(
			  'asc'=>'idPanitia.nama_panitia',
			  'desc'=>'idPanitia.nama_panitia desc',
			),                           
			// 'sisahari'=>array(
			  // 'asc'=>'status+status',
			  // 'desc'=>'sisahari desc',
			// ),
			'*',
		);
		
		$criteria=new CDbCriteria;

		$criteria->together=true;
//                $criteria->with = array("idPanitia","notaDinasPerintahPengadaan");                
		$criteria->with = array("idPanitia");    
                
		$criteria->compare('id_pengadaan',$this->id_pengadaan,true);
		$criteria->compare('nama_pengadaan',$this->nama_pengadaan,true);
		$criteria->compare('divisi_peminta',$this->divisi_peminta,true);
		$criteria->compare('jenis_pengadaan',$this->jenis_pengadaan,true);
		$criteria->compare('nama_penyedia',$this->nama_penyedia,true);
		$criteria->compare('tanggal_masuk',$this->tanggal_masuk,true);
		$criteria->compare('tanggal_selesai',$this->tanggal_selesai,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('biaya',$this->biaya,true);
		$criteria->compare('id_panitia',$this->id_panitia,true);
		$criteria->compare('metode_pengadaan',$this->metode_pengadaan,true);
		$criteria->compare('metode_penawaran',$this->metode_penawaran,true);
		$criteria->compare('jenis_kualifikasi',$this->jenis_kualifikasi,true);
                
		$criteria->compare('idPanitia.nama_panitia',$this->pic,true);
//                $criteria->compare('notaDinasPerintahPengadaan.nota_dinas_permintaan',$this->ndpermintaan,true);                           //withnya blm ditambah
//                $criteria->compare($this->sisahari(),$this->sisahari,true);
				
		// $criteria->compare('sisahari',$this->sisaHari(),true);
		$criteria->addcondition("status!='-1'");
		$criteria->addcondition("status!='100'");													//------jo-------------search yg ngga selesai doang----------------------		
 
		// $criteria->order = 'ABS(status)';
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
		));
	}
	
	public function searchKontrak()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		
		$sort = new CSort();
		$sort->attributes = array(
			'nama_pengadaan'=>array(
			  'asc'=>'nama_pengadaan',
			  'desc'=>'nama_pengadaan desc',
			),
			'User'=>array(
			  'asc'=>'divisi_peminta',
			  'desc'=>'divisi_peminta desc',
			),
			'statusgan'=>array(
			  'asc'=>'ABS(status)',
			  'desc'=>'ABS(status) desc',                            
			),
			'progressgan'=>array(
			  'asc'=>'ABS(status)',
			  'desc'=>'ABS(status) desc',
			),       
			'pic'=>array(
			  'asc'=>'idPanitia.nama_panitia',
			  'desc'=>'idPanitia.nama_panitia desc',
			),
                                       
			// 'sisahari'=>array(
			  // 'asc'=>'status+status',
			  // 'desc'=>'sisahari desc',
			// ),
			'*',
		);
		
		$criteria=new CDbCriteria;

		$criteria->together=true;
//                $criteria->with = array("idPanitia","notaDinasPerintahPengadaan");                
		$criteria->with = array("idPanitia");    
                
		$criteria->compare('id_pengadaan',$this->id_pengadaan,true);
		$criteria->compare('nama_pengadaan',$this->nama_pengadaan,true);
		$criteria->compare('divisi_peminta',$this->divisi_peminta,true);
		$criteria->compare('jenis_pengadaan',$this->jenis_pengadaan,true);
		$criteria->compare('nama_penyedia',$this->nama_penyedia,true);
		$criteria->compare('tanggal_masuk',$this->tanggal_masuk,true);
		$criteria->compare('tanggal_selesai',$this->tanggal_selesai,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('biaya',$this->biaya,true);
		$criteria->compare('id_panitia',$this->id_panitia,true);
		$criteria->compare('metode_pengadaan',$this->metode_pengadaan,true);
		$criteria->compare('metode_penawaran',$this->metode_penawaran,true);
		$criteria->compare('jenis_kualifikasi',$this->jenis_kualifikasi,true);
                
		$criteria->compare('idPanitia.nama_panitia',$this->pic,true);
//                $criteria->compare('notaDinasPerintahPengadaan.nota_dinas_permintaan',$this->ndpermintaan,true);                           //withnya blm ditambah
//                $criteria->compare($this->sisahari(),$this->sisahari,true);
				
		// $criteria->compare('sisahari',$this->sisaHari(),true);
		$criteria->addcondition("status='37' || status='38' || status='39'");		
 
		// $criteria->order = 'ABS(status)';
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
		));
	}
	
	public function searchPermintaan()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		
		$sort = new CSort();
		$sort->attributes = array(
			'nama_pengadaan'=>array(
			  'asc'=>'nama_pengadaan',
			  'desc'=>'nama_pengadaan desc',
			),
			'User'=>array(
			  'asc'=>'divisi_peminta',
			  'desc'=>'divisi_peminta desc',
			),
//                        'ndpermintaan'=>array(
//			  'asc'=>'notaDinasPerintahPengadaan.nota_dinas_permintaan',
//			  'desc'=>'notaDinasPerintahPengadaan.nota_dinas_permintaan desc',
//			),
			'*',
		);
		
		$criteria=new CDbCriteria;

		$criteria->together=true;
//                $criteria->with = array("idPanitia","notaDinasPerintahPengadaan");                
		$criteria->with = array("idPanitia");    
                
		$criteria->compare('id_pengadaan',$this->id_pengadaan,true);
		$criteria->compare('nama_pengadaan',$this->nama_pengadaan,true);
		$criteria->compare('divisi_peminta',$this->divisi_peminta,true);
		$criteria->compare('jenis_pengadaan',$this->jenis_pengadaan,true);
		$criteria->compare('nama_penyedia',$this->nama_penyedia,true);
		$criteria->compare('tanggal_masuk',$this->tanggal_masuk,true);
		$criteria->compare('tanggal_selesai',$this->tanggal_selesai,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('biaya',$this->biaya,true);
		$criteria->compare('id_panitia',$this->id_panitia,true);
		$criteria->compare('metode_pengadaan',$this->metode_pengadaan,true);
		$criteria->compare('metode_penawaran',$this->metode_penawaran,true);
		$criteria->compare('jenis_kualifikasi',$this->jenis_kualifikasi,true);
                
		$criteria->compare('idPanitia.nama_panitia',$this->pic,true);
		$criteria->addcondition("status='-1'");
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
		));
	}
	
	public function searchPermintaanDivisi()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		
		$sort = new CSort();
		$sort->attributes = array(
			'nama_pengadaan'=>array(
			  'asc'=>'nama_pengadaan',
			  'desc'=>'nama_pengadaan desc',
			),
			'User'=>array(
			  'asc'=>'divisi_peminta',
			  'desc'=>'divisi_peminta desc',
			),
//                        'ndpermintaan'=>array(
//			  'asc'=>'notaDinasPerintahPengadaan.nota_dinas_permintaan',
//			  'desc'=>'notaDinasPerintahPengadaan.nota_dinas_permintaan desc',
//			),
			'*',
		);
		
		$usern = UserDivisi::model()->findByPk(Yii::app()->user->name)->divisi;
		
		$criteria=new CDbCriteria;

		$criteria->together=true;               
		$criteria->with = array("idPanitia");    
                
		$criteria->compare('id_pengadaan',$this->id_pengadaan,true);
		$criteria->compare('nama_pengadaan',$this->nama_pengadaan,true);
		$criteria->compare('divisi_peminta',$this->divisi_peminta,true);
		$criteria->compare('jenis_pengadaan',$this->jenis_pengadaan,true);
		$criteria->compare('nama_penyedia',$this->nama_penyedia,true);
		$criteria->compare('tanggal_masuk',$this->tanggal_masuk,true);
		$criteria->compare('tanggal_selesai',$this->tanggal_selesai,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('biaya',$this->biaya,true);
		$criteria->compare('id_panitia',$this->id_panitia,true);
		$criteria->compare('metode_pengadaan',$this->metode_pengadaan,true);
		$criteria->compare('metode_penawaran',$this->metode_penawaran,true);
		$criteria->compare('jenis_kualifikasi',$this->jenis_kualifikasi,true);
                
		$criteria->compare('idPanitia.nama_panitia',$this->pic,true);
		$criteria->addcondition("status='-1'");
		$criteria->addcondition('divisi_peminta = "' . $usern . '"');
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
		));
	}
	
	public function searchBuatHistory()																//--jo--------------------------------
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$sort = new CSort();
		$sort->attributes = array(
			'nama_pengadaan'=>array(
			  'asc'=>'nama_pengadaan',
			  'desc'=>'nama_pengadaan desc',
			),
			'User'=>array(
			  'asc'=>'divisi_peminta',
			  'desc'=>'divisi_peminta desc',
			),
			'pic'=>array(
			  'asc'=>'idPanitia.nama_panitia',
			  'desc'=>'idPanitia.nama_panitia desc',
			),
			'*',
		);
		
		$criteria=new CDbCriteria;

		$criteria->together=true;
		$criteria->with = array("idPanitia");    

		$criteria->compare('id_pengadaan',$this->id_pengadaan,true);
		$criteria->compare('divisi_peminta',$this->divisi_peminta,true);
		$criteria->compare('nama_pengadaan',$this->nama_pengadaan,true);
		$criteria->compare('nama_penyedia',$this->nama_penyedia,true);
		$criteria->compare('tanggal_masuk',$this->tanggal_masuk,true);
		$criteria->compare('tanggal_selesai',$this->tanggal_selesai,true);
		$criteria->compare('biaya',$this->biaya,true);
		$criteria->compare('id_panitia',$this->id_panitia,true);
		$criteria->compare('metode_pengadaan',$this->metode_pengadaan,true);
		$criteria->compare('metode_penawaran',$this->metode_penawaran,true);
		$criteria->compare('jenis_kualifikasi',$this->jenis_kualifikasi,true);
		
		$criteria->compare('idPanitia.nama_panitia',$this->pic,true);

		$criteria->addcondition("status='100' or status ='99'");	
		// $criteria->addcondition("status='99'");	

		// $criteria->order = 'nama_pengadaan';
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
		));
	}

	public function searchBuatPanitia()															//jo---msh ada bug: yg status selesai msh ditampilin
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$sort = new CSort();
		$sort->attributes = array(
			'nama_pengadaan'=>array(
			  'asc'=>'nama_pengadaan',
			  'desc'=>'nama_pengadaan desc',
			),
			'statusgan'=>array(
			  'asc'=>'ABS(status)',
			  'desc'=>'ABS(status) desc',                            
			),
            'progressgan'=>array(
			  'asc'=>'ABS(status)',
			  'desc'=>'ABS(status) desc',
			),                 
			'User'=>array(
			  'asc'=>'divisi_peminta',
			  'desc'=>'divisi_peminta desc',
			),
			// 'sisahari'=>array(
			  // 'asc'=>'Pengadaan.sisaHari()',
			  // 'desc'=>'sisahari desc',
			// ),
			'*',
		);
		
		$criteria=new CDbCriteria;				
                
		$usern = Yii::app()->user->name;
		// $modelUser = Anggota::model()->with('pengadaan')->findAll('username="' . $usern . '"' );
		$modelUser = Anggota::model()->findAll('username="' . $usern . '"' );
		
		for($i=0;$i<count($modelUser);$i++){
			$idpan[$i] = $modelUser[$i]->id_panitia;
		}

		$criteria->compare('id_pengadaan',$this->id_pengadaan,true);
		$criteria->compare('divisi_peminta',$this->divisi_peminta,true);
		$criteria->compare('nama_pengadaan',$this->nama_pengadaan,true);
		$criteria->compare('nama_penyedia',$this->nama_penyedia,true);
		$criteria->compare('tanggal_masuk',$this->tanggal_masuk,true);
		$criteria->compare('tanggal_selesai',$this->tanggal_selesai,true);
		$criteria->compare('biaya',$this->biaya,true);
		$criteria->compare('id_panitia',$this->id_panitia,true);
		$criteria->compare('metode_pengadaan',$this->metode_pengadaan,true);
		$criteria->compare('metode_penawaran',$this->metode_penawaran,true);
		$criteria->compare('jenis_kualifikasi',$this->jenis_kualifikasi,true);
		// $criteria->condition = "status!='Selesai'";													//-------------------search yg ngga selesai doang----------------------		
		
		$strDummy = "id_panitia=$idpan[0]";
		for($j=1;$j<count($idpan);$j++){			
			$strDummy = "status!='100' &&" . "id_panitia=$idpan[$j]" . "||" . $strDummy;			
		};
		// $criteria->condition = "id_panitia=$idpan[0] || id_panitia=$idpan[1]";
		$strDummy = $strDummy . "&& status!='100'";
		$criteria->addcondition($strDummy);
		
		// $criteria->order = 'ABS(status)';
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
		));
	}	
	
	public function searchBuatDivisi()															//jo---msh ada bug: yg status selesai msh ditampilin
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$sort = new CSort();
		$sort->attributes = array(
			'nama_pengadaan'=>array(
			  'asc'=>'nama_pengadaan',
			  'desc'=>'nama_pengadaan desc',
			),
			'statusgan'=>array(
			  'asc'=>'ABS(status)',
			  'desc'=>'ABS(status) desc',                            
			),
            'progressgan'=>array(
			  'asc'=>'ABS(status)',
			  'desc'=>'ABS(status) desc',
			),  
			// 'sisahari'=>array(
			  // 'asc'=>'Pengadaan.sisaHari()',
			  // 'desc'=>'sisahari desc',
			// ),
			'*',
		);
		
		$criteria=new CDbCriteria;				
		$usern = UserDivisi::model()->findByPk(Yii::app()->user->name)->divisi;
		
		$criteria->compare('id_pengadaan',$this->id_pengadaan,true);
		$criteria->compare('divisi_peminta',$this->divisi_peminta,true);
		$criteria->compare('nama_pengadaan',$this->nama_pengadaan,true);
		$criteria->compare('nama_penyedia',$this->nama_penyedia,true);
		$criteria->compare('tanggal_masuk',$this->tanggal_masuk,true);
		$criteria->compare('tanggal_selesai',$this->tanggal_selesai,true);
		$criteria->compare('biaya',$this->biaya,true);
		$criteria->compare('id_panitia',$this->id_panitia,true);
		$criteria->compare('metode_pengadaan',$this->metode_pengadaan,true);
		$criteria->compare('metode_penawaran',$this->metode_penawaran,true);
		$criteria->compare('jenis_kualifikasi',$this->jenis_kualifikasi,true);
		$criteria->addcondition('divisi_peminta = "' . $usern . '"');
		$criteria->addcondition("status!='-1'");
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
		));
	}
	
	public function searchStatistikDivisi($div, $chart)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria=new CDbCriteria;

		$criteria->together=true;
//                $criteria->with = array("idPanitia","notaDinasPerintahPengadaan");                
		$criteria->with = array("idPanitia");    
                
		$criteria->compare('nama_pengadaan',$this->nama_pengadaan,true);

		$criteria->addcondition('divisi_peminta = "' . $div . '"');
		$criteria->addcondition('status != "-1"');

		switch ($chart) {
			case '1' : {
				$criteria->addcondition('status != "100"');
				$criteria->addcondition('status != "99"');
				break;
			}
			case '2' : {
				$criteria->addcondition('status = "100"');
				break;
			}
			case '3' : {
				$criteria->addcondition('status = "99"');
				break;
			}
		}
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function searchStatistikPanitia($pan, $chart)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria=new CDbCriteria;

		$criteria->together=true;
//                $criteria->with = array("idPanitia","notaDinasPerintahPengadaan");                
		$criteria->with = array("idPanitia");    
                
		$criteria->compare('nama_pengadaan',$this->nama_pengadaan,true);

		$criteria->addcondition('t.id_panitia = "' . $pan . '"');
		$criteria->addcondition('status != "-1"');

		switch ($chart) {
			case '1' : {
				$criteria->addcondition('status != "100"');
				$criteria->addcondition('status != "99"');
				break;
			}
			case '2' : {
				$criteria->addcondition('status = "100"');
				break;
			}
			case '3' : {
				$criteria->addcondition('status = "99"');
				break;
			}
		}
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function searchStatistikMetodePengadaan($detail, $chart)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria=new CDbCriteria;

		$criteria->together=true;
//                $criteria->with = array("idPanitia","notaDinasPerintahPengadaan");                
		$criteria->with = array("idPanitia");    
                
		$criteria->compare('nama_pengadaan',$this->nama_pengadaan,true);

		$criteria->addcondition('metode_pengadaan = "' . $detail . '"');
		$criteria->addcondition('status != "-1"');

		switch ($chart) {
			case '1' : {
				$criteria->addcondition('status != "100"');
				$criteria->addcondition('status != "99"');
				break;
			}
			case '2' : {
				$criteria->addcondition('status = "100"');
				break;
			}
			case '3' : {
				$criteria->addcondition('status = "99"');
				break;
			}
		}
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function sisaHari(){								//jo----------------------------
		// if($this->status == '100' || $this->status == '99'){
		if($this->status >= 33){
			return "-";
		}else{
			date_default_timezone_set ('Asia/Jakarta');
			
			$string1 = date('Y-m-d H:i:s');
			$jmlday1 = strtotime($string1);
			
			if ($this->findByPk($this->id_pengadaan)->notaDinasPerintahPengadaan == null) {
				return '-';
			} else {
				$string2 = $this->findByPk($this->id_pengadaan)->dokumens[4]->tanggal;
				$jmlday2 = strtotime($string2);
				return($this->findByPk($this->id_pengadaan)->notaDinasPerintahPengadaan->targetSPK_kontrak - floor(($jmlday1-$jmlday2)/3600/24));
			}
		}
	}

	public function progressPengadaan(){					//jo---------------------------
		
		if($this->status == '-1'){
			return 0/37;
		}
		else if($this->status == '0'){
			return 0/37;
		}
		else if($this->status == '1'){
			return 100/37;
		}
		else if($this->status == '2'){
			return 200/37;
		}
		else if($this->status == '3'){
			return 300/37;
		}
		else if($this->status == '4'){
			return 400/37;
		}
		else if($this->status == '5'){
			return 500/37;
		}
		else if($this->status == '6' ){
			return 600/37;
		}
		else if($this->status == '7'){
			return 700/37;
		}
		else if($this->status == '8'){
			return 800/37;
		}
		else if($this->status == '9'){
			return 900/37;
		}
		else if($this->status == '10'){
			return 1000/37;
		}
		else if($this->status == '11'){
			return 1100/37;
		}
		else if($this->status == '12'){
			return 1200/37;
		}
		else if($this->status == '13' ){
			return 1300/37;
		}
		else if($this->status == '14'){
			return 1400/37;
		}
		else if($this->status == '15'){
			return 1500/37;
		}
		else if($this->status == '16'){
			return 1600/37;
		}
		else if($this->status == '17'){
			return 1700/37;
		}
		else if($this->status == '18'){
			return 1800/37;
		}
		else if($this->status == '19'){
			return 1900/37;
		}
		else if($this->status == '20' ){
			return 2000/37;
		}
		else if($this->status == '21'){
			return 2100/37;
		}
		else if($this->status == '22'){
			return 2200/37;
		}
		else if($this->status == '23'){
			return 2300/37;
		}
		else if($this->status == '24'){
			return 2400/37;
		}		
		else if($this->status == '25'){
			return 2500/37;
		}		
		else if($this->status == '26'){
			return 2600/37;
		}		
		else if($this->status == '27'){
			return 2700/37;
		}		
		else if($this->status == '28'){
			return 2800/37;
		}
		else if($this->status == '29'){
			return 2900/37;
		}
		else if($this->status == '30'){
			return 3000/37;
		}
		else if($this->status == '31'){
			return 3100/37;
		}		
		else if($this->status == '32'){
			return 3200/37;
		}		
		else if($this->status == '33'){
			return 3300/37;
		}		
		else if($this->status == '34'){
			return 3400/37;
		}		
		else if($this->status == '35'){
			return 3500/37;
		}
		else if($this->status == '36'){
			return 3600/37;
		}		
		else if($this->status == '37'){
			return 3700/37;
		}		
		else if($this->status == '100' || $this->status == '99'){
			return 3700/37;
		}		
		
		else{
			return 0;
		}
	}
	
	public function dapatkanStatus(){
		if($this->status == '0'){
			return 'Penentuan Metode';
		}		
		else if($this->status == '1' || $this->status == '2' || $this->status == '3'){
			return 'Pembuatan Dokumen Pengadaan';
		}
		else if($this->status == '4' || $this->status == '5'|| $this->status == '6'|| $this->status == '7'|| $this->status == '8'|| $this->status == '9'|| $this->status == '10'|| $this->status == '11'|| $this->status == '12' || $this->status == '13' || $this->status == '14' || $this->status == '15'){
			return 'Prakualifikasi';
		}				
		else if($this->status == '16' || $this->status == '17' || $this->status == '18' || $this->status == '19'){
			return 'Pengumuman Pengadaan';
		}
		else if($this->status == '20' || $this->status == '21'){
			return 'Aanwijzing';
		}
		else if($this->status == '22' || $this->status == '23'){
			return 'Penawaran';
		}
		else if($this->status == '24' || $this->status == '25'){
			return 'Evaluasi';
		}
		else if($this->status == '26' || $this->status == '27'){
			return 'Penawaran 2';
		}
		else if($this->status == '28' || $this->status == '29'){
			return 'Evaluasi 2';
		}
		else if($this->status == '30' || $this->status == '31'){
			return 'Klarifikasi dan Negosiasi';
		}
		else if($this->status == '32' || $this->status == '33' || $this->status == '34' || $this->status == '35' || $this->status == '36'){
			return 'Penentuan Pemenang';
		}
		else if($this->status == '37' || $this->status == '38' || $this->status == '39'){
			return 'Kontrak';
		}
		else if($this->status == '99'){
			return 'Gagal';
		}
		else if($this->status == '100'){
			return 'Selesai';
		}				
	}
	
	protected function beforeSave()
	{ 
		$this->tanggal_masuk=date('Y-m-d', strtotime($this->tanggal_masuk));
		return TRUE;
	}
	
	public $maxId; //aidil---variabel untuk mencari nilai maksimum
}