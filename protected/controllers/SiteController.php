<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		// return array(
		// 	// captcha action renders the CAPTCHA image displayed on the contact page
		// 	'captcha'=>array(
		// 		'class'=>'CCaptchaAction',
		// 		'backColor'=>0xFFFFFF,
		// 	),
		// 	// page action renders "static" pages stored under 'protected/views/site/pages'
		// 	// They can be accessed via: index.php?r=site/page&view=FileName
		// 	'page'=>array(
		// 		'class'=>'CViewAction',
		// 	),
		// );
		return array(
			'coco'=>array(
				'class'=>'CocoAction',
			),
		);
	}

	public $defaultAction = 'dashboard';

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionDashboard()
	{
		// renders the view file 'protected/views/site/dashboard.php'
		// using the default layout 'protected/views/layouts/main.php'
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {		
			$model=new Pengadaan('search');
			$model->unsetAttributes();  // clear any default values
			if(isset($_GET['Pengadaan'])){
				$model->attributes=$_GET['Pengadaan'];
			}		
				
			$this->render('dashboard',array(
				'model'=>$model,
			));
		}
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionHistory()
	{
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {		
			$model=new Pengadaan('search');
			$model->unsetAttributes();  // clear any default values
			if(isset($_GET['Pengadaan'])){
				$model->attributes=$_GET['Pengadaan'];
			}		
			
		$this->render('history',array(
				'model'=>$model,
			));
		}
	}
		
        public function actionDokumenhistory(){
		
			if (Yii::app()->user->isGuest) {
				$this->redirect(array('site/login'));
			}
			else {		
				$model=new Pengadaan('search');
				$model->unsetAttributes();  // clear any default values
				if(isset($_GET['Pengadaan'])){
					$model->attributes=$_GET['Pengadaan'];
				}		
					
				$this->render('dokumenhistory',array(
					'model'=>$model,
				));
			}
         
        }
        
        public function actionDokumengenerator(){
			if (Yii::app()->user->isGuest) {
				$this->redirect(array('site/login'));
			}
			else {
				$model=new Dokumen('search');
				$model->unsetAttributes();  // clear any default values
				if(isset($_GET['Dokumen'])){
					$model->attributes=$_GET['Dokumen'];
				}
	            $this->render('dokumengenerator', array(
	            	'model'=>$model,
	            ));		
	        }
        }

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionDetailpengadaan()
	{
		// renders the view file 'protected/views/site/history.php'
		// using the default layout 'protected/views/layouts/main.php'
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			$model=new Dokumen('search');
			$model->unsetAttributes();  // clear any default values
			if(isset($_GET['Dokumen'])){
				$model->attributes=$_GET['Dokumen'];
			}
			$this->render('detailpengadaan', array(
				'model'=>$model,
			));
		}
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionDetaildokumen()
	{
		$user = Yii::app()->user->name;
		// renders the view file 'protected/views/site/history.php'
		// using the default layout 'protected/views/layouts/main.php'
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if(isset($_POST['Dokumen'])){
				$newLinkDokumen = new LinkDokumen;
				$tempDokumen = new Dokumen;
				
				$tempDokumen->attributes = $_POST['Dokumen'];
				$fileDokumen = CUploadedFile::getInstance($tempDokumen,'uploadedFile');
				$tempDokumen = Dokumen::model()->findByPk($tempDokumen->id_dokumen);
				$tempDokumen->uploadedFile = $fileDokumen;
				
				$tempDokumen->status_upload='Selesai';
				
				date_default_timezone_set("Asia/Jakarta");
				$secs = time() + (7*3600);
				$hours = $secs / 3600 % 24;
				$minutes = $secs / 60 % 60;
				$seconds = $secs % 60;
				$waktu_upload = $hours . ':' . $minutes . ':' . $seconds;				
				$pathinfo = pathinfo($tempDokumen->uploadedFile->getName());
				
				$newLinkDokumen->id_link=LinkDokumen::model()->count()+1;
				$newLinkDokumen->id_dokumen=$tempDokumen->id_dokumen;
				$newLinkDokumen->waktu_upload=$waktu_upload;
				$newLinkDokumen->tanggal_upload=date('Y-m-d');
				$newLinkDokumen->pengunggah=$user;
				$newLinkDokumen->nomor_link=LinkDokumen::model()->count('id_dokumen="' . $tempDokumen->id_dokumen . '"') + 1;
				$newLinkDokumen->format_dokumen=$pathinfo['extension'];
				$newLinkDokumen->save();
								
				$path = $_SERVER["DOCUMENT_ROOT"] . Yii::app()->request->baseUrl . '/uploads/' . $tempDokumen->id_pengadaan . '/' . $tempDokumen->id_dokumen . '/';
				@mkdir($path,0700,true);
				$namaFile = $newLinkDokumen->nomor_link;
				
				if($tempDokumen->save(false)){
					$tempDokumen->uploadedFile->saveAs($path . $namaFile . '.' . $pathinfo['extension']);
					}
			}
			$this->render('detaildokumen');
		}
	}
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionKontrak()
	{
		// renders the view file 'protected/views/site/history.php'
		// using the default layout 'protected/views/layouts/main.php'
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Kdivmum::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				$this->render('kontrak');
			}
		}
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionStatistik()
	{
		// renders the view file 'protected/views/site/history.php'
		// using the default layout 'protected/views/layouts/main.php'
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Kdivmum::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				$this->render('statistik');
			}
		}
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionGenerator()
	{
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				if(Pengadaan::model()->findByPk($id)->status=="1"){
					$this->redirect(array('site/rks','id'=>$id));
				}
				if(Pengadaan::model()->findByPk($id)->status=="2"){
					$this->redirect(array('site/hps','id'=>$id));
				}
				if(Pengadaan::model()->findByPk($id)->status=="3"){
					if(Pengadaan::model()->findByPk($id)->jenis_kualifikasi=="Pra Kualifikasi"){
						$this->redirect(array('site/prakualifikasi','id'=>$id));
					}
					if(Pengadaan::model()->findByPk($id)->jenis_kualifikasi=="Pasca Kualifikasi"){
						$this->redirect(array('site/pascakualifikasi','id'=>$id));
					}
				}
				if(Pengadaan::model()->findByPk($id)->status=="4"){
					$this->redirect(array('site/pengumumanpengadaan','id'=>$id));
				}
				if(Pengadaan::model()->findByPk($id)->status=="5"){
					$this->redirect(array('site/permintaanpenawaranharga','id'=>$id));
				}
				if(Pengadaan::model()->findByPk($id)->status=="6"){
					$this->redirect(array('site/aanwijzing','id'=>$id));
				}
				if(Pengadaan::model()->findByPk($id)->status=="7"){
					$this->redirect(array('site/beritaacaraaanwijzing','id'=>$id));
				}
				if(Pengadaan::model()->findByPk($id)->status=="8"){
					if(Pengadaan::model()->findByPk($id)->metode_penawaran=="Satu Sampul"){
						$this->redirect(array('site/suratundanganpembukaanpenawaran','id'=>$id));
					}
					if(Pengadaan::model()->findByPk($id)->metode_penawaran=="Dua Sampul"){
						$this->redirect(array('site/suratundanganpembukaanpenawaransampul1','id'=>$id));
					}
					if(Pengadaan::model()->findByPk($id)->metode_penawaran=="Dua Tahap"){
						$this->redirect(array('site/suratundanganpembukaanpenawarantahap1','id'=>$id));
					}
				}
				if(Pengadaan::model()->findByPk($id)->status=="9"){
					if(Pengadaan::model()->findByPk($id)->metode_penawaran=="Satu Sampul"){
						$this->redirect(array('site/beritaacarapembukaanpenawaran','id'=>$id));
					}
					if(Pengadaan::model()->findByPk($id)->metode_penawaran=="Dua Sampul"){
						$this->redirect(array('site/beritaacarapembukaanpenawaransampul1','id'=>$id));
					}
					if(Pengadaan::model()->findByPk($id)->metode_penawaran=="Dua Tahap"){
						$this->redirect(array('site/beritaacarapembukaanpenawarantahap1','id'=>$id));
					}
				}
				if(Pengadaan::model()->findByPk($id)->status=="10"){
					if(Pengadaan::model()->findByPk($id)->metode_penawaran=="Satu Sampul"){
						$this->redirect(array('site/beritaacaraevaluasipenawaran','id'=>$id));
					}
					if(Pengadaan::model()->findByPk($id)->metode_penawaran=="Dua Sampul"){
						$this->redirect(array('site/beritaacaraevaluasipenawaransampul1','id'=>$id));
					}
					if(Pengadaan::model()->findByPk($id)->metode_penawaran=="Dua Tahap"){
						$this->redirect(array('site/beritaacaraevaluasipenawarantahap1','id'=>$id));
					}
				}
				if(Pengadaan::model()->findByPk($id)->status=="14"){
					$this->redirect(array('site/suratundangannegosiasiklarifikasi','id'=>$id));
				}				
			}
		}
	}
	
	public function actionCheckpoint2()
	{	
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				$this->render('checkpoint2');
			}
		}
	}
	
	public function actionRks()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				
				$Pengadaan=Pengadaan::model()->findByPk($id);
				$Pengadaan->status ='2';
				
				$Dokumen0= new Dokumen;
				$criteria=new CDbcriteria;
				$criteria->select='max(id_dokumen) AS maxId';
				$row = $Dokumen0->model()->find($criteria);
				$somevariable = $row['maxId'];
				$Dokumen0->id_dokumen=$somevariable+1;
				$Dokumen0->id_pengadaan=$Pengadaan->id_pengadaan;
				$Dokumen0->nama_dokumen='Pakta Integritas Awal Panitia';
				$Dokumen0->tempat='Jakarta';
				$Dokumen0->status_upload='Belum Selesai';
				
				$Dokumen1= new Dokumen;
				$Dokumen1->id_dokumen=$somevariable+2;
				$Dokumen1->id_pengadaan=$Pengadaan->id_pengadaan;
				$Dokumen1->nama_dokumen='RKS';
				$Dokumen1->tempat='Jakarta';
				$Dokumen1->status_upload='Belum Selesai';
				
				$PAP1= new PaktaIntegritasPanitia1;
				$PAP1->id_dokumen=$Dokumen0->id_dokumen;
				$PAP1->id_panitia=$Pengadaan->id_panitia;
				
				$RKS= new Rks;
				$RKS->id_dokumen=$Dokumen1->id_dokumen;
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['Rks']))
				{
					$Pengadaan->attributes=$_POST['Pengadaan'];
					$Dokumen1->attributes=$_POST['Dokumen'];
					$RKS->attributes=$_POST['Rks'];
					
					$valid=$PAP1->validate()&&$RKS->validate();
					$valid=$valid&&$Dokumen1->validate();
					$Dokumen0->tanggal=$Dokumen1->tanggal;
					$valid=$valid&&$Dokumen0->validate();
					$valid=$valid&&$Pengadaan->validate();
					if($valid){		
						if($Pengadaan->save(false))
						{	
							if($Dokumen0->save(false)&&$Dokumen1->save(false)){
								if($PAP1->save(false)&&$RKS->save(false)){
									$this->redirect(array('editrks','id'=>$Dokumen0->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('rks',array(
					'Rks'=>$RKS,'Pengadaan'=>$Pengadaan,'Dokumen1'=>$Dokumen1,
				));
			}
		}
	}
	
	public function actionEditRks()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				
				$Pengadaan=Pengadaan::model()->findByPk($id);
				
				$Dokumen0= Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Pakta Integritas Awal Panitia"');
				$Dokumen1= Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "RKS"');
				
				$PAP1= PaktaIntegritasPanitia1::model()->findByPk($Dokumen0->id_dokumen);
				$RKS= Rks::model()->findByPk($Dokumen1->id_dokumen);
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['Rks']))
				{
					$Pengadaan->attributes=$_POST['Pengadaan'];
					$Dokumen1->attributes=$_POST['Dokumen'];
					$RKS->attributes=$_POST['Rks'];
					
					$valid=$RKS->validate();
					$valid=$valid&&$Dokumen1->validate();
					$Dokumen0->tanggal=$Dokumen1->tanggal;
					$valid=$valid&&$Dokumen0->validate();
					$valid=$valid&&$Pengadaan->validate();
					if($valid){						
						if($Pengadaan->save(false))
						{	
							if($Dokumen0->save(false)&&$Dokumen1->save(false)){
								if($RKS->save(false)){
									Yii::app()->user->setFlash('sukses','Data Telah Disimpan');
									$this->redirect(array('editrks','id'=>$Dokumen0->id_pengadaan,));
								}
							}
						}
					}
				}

				$this->render('rks',array(
					'Rks'=>$RKS,'Pengadaan'=>$Pengadaan,'Dokumen1'=>$Dokumen1,'PAP1'=>$PAP1,
				));
			}
		}
	}
	
	public function actionHps()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				
				$Pengadaan=Pengadaan::model()->findByPk($id);
				$Pengadaan->status ='3';
				
				$Dok= Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "RKS"');
				$RKS= Rks::model()->findByPk($Dok->id_dokumen);
				
				$Dokumen0= new Dokumen;
				$criteria=new CDbcriteria;
				$criteria->select='max(id_dokumen) AS maxId';
				$row = $Dokumen0->model()->find($criteria);
				$somevariable = $row['maxId'];
				$Dokumen0->id_dokumen=$somevariable+1;
				$Dokumen0->id_pengadaan=$Pengadaan->id_pengadaan;
				$Dokumen0->nama_dokumen='HPS';
				$Dokumen0->tempat='Jakarta';
				$Dokumen0->status_upload='Belum Selesai';
				
				$HPS= new Hps;
				$HPS->id_dokumen=$Dokumen0->id_dokumen;
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['Hps']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$HPS->attributes=$_POST['Hps'];
					$valid=$HPS->validate();
					$valid=$valid&&$Dokumen0->validate();
					if($valid){
						if($Pengadaan->save(false))
						{	
							if($Dokumen0->save(false)){
								if($HPS->save(false)){
									$this->redirect(array('edithps','id'=>$Dokumen0->id_pengadaan));
								}
							}
						}
						
					}
				}

				$this->render('hps',array(
					'Hps'=>$HPS,'Dokumen0'=>$Dokumen0,'Rks'=>$RKS,
				));
			}
		}
	}
	
	public function actionEditHps()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				
				$Pengadaan=Pengadaan::model()->findByPk($id);
				$Dok= Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "RKS"');
				$RKS= Rks::model()->findByPk($Dok->id_dokumen);
				
				$Dokumen0= Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "HPS"');
				
				$HPS= Hps::model()->findByPk($Dokumen0->id_dokumen);
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['Hps']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$HPS->attributes=$_POST['Hps'];
					
					$valid=$HPS->validate();;
					$valid=$valid&&$Dokumen0->validate();
					if($valid){						
						if($Pengadaan->save(false))
						{	
							if($Dokumen0->save(false)){
								if($HPS->save(false)){
									Yii::app()->user->setFlash('sukses','Data Telah Disimpan');
									$this->redirect(array('edithps','id'=>$Dokumen0->id_pengadaan,));
								}
							}
						}
					}
				}

				$this->render('hps',array(
					'Hps'=>$HPS,'Dokumen0'=>$Dokumen0,'Rks'=>$RKS
				));
			}
		}
	}
	
	public function actionPrakualifikasi()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				
				$Pengadaan=Pengadaan::model()->findByPk($id);
				$Pengadaan->status= "4";
				
				$Dokumen0= new Dokumen;
				$criteria=new CDbcriteria;
				$criteria->select='max(id_dokumen) AS maxId';
				$row = $Dokumen0->model()->find($criteria);
				$somevariable = $row['maxId'];
				$Dokumen0->id_dokumen=$somevariable+1;
				$Dokumen0->nama_dokumen='Surat Undangan Prakualifikasi';
				$Dokumen0->tempat='Jakarta';
				$Dokumen0->status_upload='Belum Selesai';
				$Dokumen0->id_pengadaan=$id;
				
				$Dokumen1= new Dokumen;
				$Dokumen1->id_dokumen=$somevariable+2;
				$Dokumen1->nama_dokumen='Pakta Integritas Penyedia';
				$Dokumen1->status_upload='Belum Selesai';
				$Dokumen1->tanggal='-';
				$Dokumen1->tempat='-';
				$Dokumen1->id_pengadaan=$id;
				
				$Dokumen2= new Dokumen;
				$Dokumen2->id_dokumen=$somevariable+3;
				$Dokumen2->nama_dokumen='Surat Pengantar Penawaran Harga';
				$Dokumen2->tanggal='-';
				$Dokumen2->tempat='Jakarta';
				$Dokumen2->status_upload='Belum Selesai';
				$Dokumen2->id_pengadaan=$id;
				
				$Dokumen3= new Dokumen;
				$Dokumen3->id_dokumen=$somevariable+4;
				$Dokumen3->nama_dokumen='Surat Pernyataan Minat';
				$Dokumen3->tanggal='-';
				$Dokumen3->tempat='-';
				$Dokumen3->status_upload='Belum Selesai';
				$Dokumen3->id_pengadaan=$id;
				
				$Dokumen4= new Dokumen;
				$Dokumen4->id_dokumen=$somevariable+5;
				$Dokumen4->nama_dokumen='Form Isian Kualifikasi';
				$Dokumen4->tanggal='-';
				$Dokumen4->tempat='-';
				$Dokumen4->status_upload='Belum Selesai';
				$Dokumen4->id_pengadaan=$id;
				
				$A=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "RKS"'); 
				$A1=Rks::model()->findByPk($A->id_dokumen);
				$X0= new SuratUndanganPrakualifikasi;
				$X0->id_dokumen=$Dokumen0->id_dokumen;
				
				$X1= new PaktaIntegritasPenyedia;
				$X1->id_dokumen=$Dokumen1->id_dokumen;
				
				$X2= new SuratPengantarPenawaranHarga;
				$X2->id_dokumen=$Dokumen2->id_dokumen;
				
				$X3= new SuratPernyataanMinat;
				$X3->id_dokumen=$Dokumen3->id_dokumen;
				
				$X4= new FormIsianKualifikasi;
				$X4->id_dokumen=$Dokumen4->id_dokumen;
				
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['Dokumen']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$valid=$Dokumen0->validate();
					if($valid){
						if($Pengadaan->save(false))
						{	
							if($Dokumen0->save(false)&&$Dokumen1->save(false)&&$Dokumen2->save(false)&&$Dokumen3->save(false)&&$Dokumen4->save(false)){
								if($X0->save(false)&&$X1->save(false)&&$X2->save(false)&&$X3->save(false)&&$X4->save(false)){
									$this->redirect(array('editprakualifikasi','id'=>$Dokumen0->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('prakualifikasi',array(
					'Dokumen0'=>$Dokumen0,'X0'=>$X0,'X1'=>$X1,'X2'=>$X2,'X3'=>$X3,'X4'=>$X4,
				));
			}
		}
	}
	
	public function actionEditPrakualifikasi()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				
				$Pengadaan=Pengadaan::model()->findByPk($id);
				
				$Dokumen0= Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Prakualifikasi"');
				$Dokumen1= Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Pakta Integritas Penyedia"');
				$Dokumen2= Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Pengantar Penawaran Harga"');
				$Dokumen3= Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Pernyataan Minat"');
				$Dokumen4= Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Form Isian Kualifikasi"');
		
				$X0= SuratUndanganPrakualifikasi::model()->findByPk($Dokumen0->id_dokumen);
				$X1= PaktaIntegritasPenyedia::model()->findByPk($Dokumen1->id_dokumen);
				$X2= SuratPengantarPenawaranHarga::model()->findByPk($Dokumen2->id_dokumen);
				$X3= SuratPernyataanMinat::model()->findByPk($Dokumen3->id_dokumen);
				$X4= FormIsianKualifikasi::model()->findByPk($Dokumen4->id_dokumen);
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['Dokumen']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$valid=$Dokumen0->validate();
					if($valid){
						if($Pengadaan->save(false))
						{	
							if($Dokumen0->save(false)){
								$this->redirect(array('editprakualifikasi','id'=>$Dokumen0->id_pengadaan));
							}
						}
					}
				}

				$this->render('prakualifikasi',array(
					'Dokumen0'=>$Dokumen0,'X0'=>$X0,'X1'=>$X1,'X2'=>$X2,'X3'=>$X3,'X4'=>$X4,
				));
			}
		}
	}
	
	public function actionPascakualifikasi()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				
				$Pengadaan=Pengadaan::model()->findByPk($id);
				if($Pengadaan->metode_pengadaan=='Pelelangan'){
					$Pengadaan->status= "4";
				} else if ($Pengadaan->metode_pengadaan=='Penunjukan Langsung'||$Pengadaan->metode_pengadaan=='Pemilihan Langsung') {
					$Pengadaan->status= "5";
				}
				
				$Dokumen0= new Dokumen;
				$criteria=new CDbcriteria;
				$criteria->select='max(id_dokumen) AS maxId';
				$row = $Dokumen0->model()->find($criteria);
				$somevariable = $row['maxId'];
				$Dokumen0->id_dokumen=$somevariable+1;
				$Dokumen0->nama_dokumen='Pakta Integritas Penyedia';
				$Dokumen0->status_upload='Belum Selesai';
				$Dokumen0->tanggal='-';
				$Dokumen0->tempat='-';
				$Dokumen0->id_pengadaan=$id;
				
				$Dokumen1= new Dokumen;
				$Dokumen1->id_dokumen=$somevariable+2;
				$Dokumen1->nama_dokumen='Surat Pengantar Penawaran Harga';
				$Dokumen1->tanggal='-';
				$Dokumen1->tempat='Jakarta';
				$Dokumen1->status_upload='Belum Selesai';
				$Dokumen1->id_pengadaan=$id;
				
				$Dokumen2= new Dokumen;
				$Dokumen2->id_dokumen=$somevariable+3;
				$Dokumen2->nama_dokumen='Surat Pernyataan Minat';
				$Dokumen2->tanggal='-';
				$Dokumen2->tempat='-';
				$Dokumen2->status_upload='Belum Selesai';
				$Dokumen2->id_pengadaan=$id;
				
				$Dokumen3= new Dokumen;
				$Dokumen3->id_dokumen=$somevariable+4;
				$Dokumen3->nama_dokumen='Form Isian Kualifikasi';
				$Dokumen3->tanggal='-';
				$Dokumen3->tempat='-';
				$Dokumen3->status_upload='Belum Selesai';
				$Dokumen3->id_pengadaan=$id;
				
				$X0= new PaktaIntegritasPenyedia;
				$X0->id_dokumen=$Dokumen0->id_dokumen;
				
				$X1= new SuratPengantarPenawaranHarga;
				$X1->id_dokumen=$Dokumen1->id_dokumen;
				
				$X2= new SuratPernyataanMinat;
				$X2->id_dokumen=$Dokumen2->id_dokumen;
				
				$X3= new FormIsianKualifikasi;
				$X3->id_dokumen=$Dokumen3->id_dokumen;
				
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);
				if($Pengadaan->save(false))
				{	
					if($Dokumen0->save(false)&&$Dokumen1->save(false)&&$Dokumen2->save(false)&&$Dokumen3->save(false)){
						if($X0->save(false)&&$X1->save(false)&&$X2->save(false)&&$X3->save(false)){
						}
					}
				}				
				$this->render('pascakualifikasi',array('X0'=>$X0,'X1'=>$X1,'X2'=>$X2,'X3'=>$X3));
			}
		}
	}
	
	public function actionPengumumanpengadaan()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				
				$Pengadaan=Pengadaan::model()->findByPk($id);
				$Pengadaan->status="6";
				
				$Dokumen0= new Dokumen;
				$criteria=new CDbcriteria;
				$criteria->select='max(id_dokumen) AS maxId';
				$row = $Dokumen0->model()->find($criteria);
				$somevariable = $row['maxId'];
				$Dokumen0->id_dokumen=$somevariable+1;
				$Dokumen0->nama_dokumen='Surat Undangan Pengambilan Dokumen Pengadaan';
				$Dokumen0->tempat='Jakarta';
				$Dokumen0->status_upload='Belum Selesai';
				$Dokumen0->id_pengadaan=$id;
				
				
				$SUPDP= new SuratUndanganPengambilanDokumenPengadaan;
				$SUPDP->id_dokumen=$Dokumen0->id_dokumen;
				$SUPDP->perihal= 'Undangan Pengambilan Dokumen RKS dari '.$Pengadaan->nama_pengadaan;
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['SuratUndanganPengambilanDokumenPengadaan']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SUPDP->attributes=$_POST['SuratUndanganPengambilanDokumenPengadaan'];
					$valid=$Dokumen0->validate();
					$valid=$valid&&$SUPDP->validate();
					if($valid){
						if($Pengadaan->save(false))
						{	
							if($Dokumen0->save(false)){
								if($SUPDP->save(false)){
									$this->redirect(array('editpengumumanpengadaan','id'=>$Dokumen0->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('pengumumanpengadaan',array(
					'SUPDP'=>$SUPDP,'Dokumen0'=>$Dokumen0,
				));
			}
		}
	}
	
	public function actionEditPengumumanpengadaan()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				
				$Pengadaan=Pengadaan::model()->findByPk($id);
				
				$Dokumen0= Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pengambilan Dokumen Pengadaan"');
				
				$SUPDP= SuratUndanganPengambilanDokumenPengadaan::model()->findByPk($Dokumen0->id_dokumen);
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['SuratUndanganPengambilanDokumenPengadaan']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SUPDP->attributes=$_POST['SuratUndanganPengambilanDokumenPengadaan'];
					$valid=$Dokumen0->validate();
					$valid=$valid&&$SUPDP->validate();
					if($valid){
						if($Pengadaan->save(false))
						{	
							if($Dokumen0->save(false)){
								if($SUPDP->save(false)){
									$this->redirect(array('editpengumumanpengadaan','id'=>$Dokumen0->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('pengumumanpengadaan',array(
					'SUPDP'=>$SUPDP,'Dokumen0'=>$Dokumen0,
				));
			}
		}
	}
	
	public function actionPermintaanpenawaranharga()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				
				$Pengadaan=Pengadaan::model()->findByPk($id);
				$Pengadaan->status="6";
				
				$Dokumen0= new Dokumen;
				$criteria=new CDbcriteria;
				$criteria->select='max(id_dokumen) AS maxId';
				$row = $Dokumen0->model()->find($criteria);
				$somevariable = $row['maxId'];
				$Dokumen0->id_dokumen=$somevariable+1;
				$Dokumen0->nama_dokumen='Surat Undangan Pengambilan Dokumen Pengadaan';
				$Dokumen0->tempat='Jakarta';
				$Dokumen0->status_upload='Belum Selesai';
				$Dokumen0->id_pengadaan=$id;
				
				
				$SUPDP= new SuratUndanganPengambilanDokumenPengadaan;
				$SUPDP->id_dokumen=$Dokumen0->id_dokumen;
				$SUPDP->perihal= 'Undangan Pengambilan Dokumen RKS dari '.$Pengadaan->nama_pengadaan;
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['SuratUndanganPengambilanDokumenPengadaan']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SUPDP->attributes=$_POST['SuratUndanganPengambilanDokumenPengadaan'];
					$valid=$Dokumen0->validate();
					$valid=$valid&&$SUPDP->validate();
					if($valid){
						if($Pengadaan->save(false))
						{	
							if($Dokumen0->save(false)){
								if($SUPDP->save(false)){
									$this->redirect(array('editpermintaanpenawaranharga','id'=>$Dokumen0->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('permintaanpenawaranharga',array(
					'SUPDP'=>$SUPDP,'Dokumen0'=>$Dokumen0,
				));
			}
		}
	}
	
	public function actionEditpermintaanpenawaranharga()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				
				$Pengadaan=Pengadaan::model()->findByPk($id);
				
				$Dokumen0= Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pengambilan Dokumen Pengadaan"');
				
				$SUPDP= SuratUndanganPengambilanDokumenPengadaan::model()->findByPk($Dokumen0->id_dokumen);
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['SuratUndanganPengambilanDokumenPengadaan']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SUPDP->attributes=$_POST['SuratUndanganPengambilanDokumenPengadaan'];
					$valid=$Dokumen0->validate();
					$valid=$valid&&$SUPDP->validate();
					if($valid){
						if($Pengadaan->save(false))
						{	
							if($Dokumen0->save(false)){
								if($SUPDP->save(false)){
									$this->redirect(array('editpermintaanpenawaranharga','id'=>$Dokumen0->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('permintaanpenawaranharga',array(
					'SUPDP'=>$SUPDP,'Dokumen0'=>$Dokumen0,
				));
			}
		}
	}
	
	public function actionAanwijzing()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				$Pengadaan->status ='7';
				
				$Dokumen0= new Dokumen;
				$criteria=new CDbcriteria;
				$criteria->select='max(id_dokumen) AS maxId';
				$row = $Dokumen0->model()->find($criteria);
				$somevariable = $row['maxId'];
				$Dokumen0->id_dokumen=$somevariable+1;
				$Dokumen0->nama_dokumen='Surat Undangan Aanwijzing';
				$Dokumen0->tempat='Jakarta';
				$Dokumen0->status_upload='Belum Selesai';
				$Dokumen0->id_pengadaan=$id;
				
				
				
				$A=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pengambilan Dokumen Pengadaan"'); 
				$A1=SuratUndanganPengambilanDokumenPengadaan::model()->findByPk($A->id_dokumen);
				
				$SUP= new SuratUndanganPenjelasan;
				$SUP->id_dokumen=$Dokumen0->id_dokumen;
				$SUP->id_panitia=$Pengadaan->id_panitia;
				$SUP->perihal= 'Undangan Aanwijzing '.$Pengadaan->nama_pengadaan;
				$SUP->nomor= 'Nomor Undangan Pengambilan Dokumen Pengadaan : '.$A1->nomor;
				
				
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['SuratUndanganPenjelasan']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SUP->attributes=$_POST['SuratUndanganPenjelasan'];
					
					$valid=$SUP->validate();
					$valid=$valid&&$Dokumen0->validate();
					if($valid){
						
						if($Pengadaan->save(false))
							{	
								if($Dokumen0->save(false)){
									if($SUP->save(false)){
										$this->redirect(array('editaanwijzing','id'=>$Dokumen0->id_pengadaan));
									}
								}
							}
						
					}
				}

				$this->render('aanwijzing',array(
					'SUP'=>$SUP,'Dokumen0'=>$Dokumen0,
				));

			}
		}
	}
	
	public function actionEditAanwijzing()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				
				$Dokumen0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Aanwijzing"');				
				
				$SUP=SuratUndanganPenjelasan::model()->findByPk($Dokumen0->id_dokumen);
				
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['SuratUndanganPenjelasan']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SUP->attributes=$_POST['SuratUndanganPenjelasan'];
					
					$valid=$SUP->validate();
					$valid=$valid&&$Dokumen0->validate();
					if($valid){
					
						if($Pengadaan->save(false))
							{	
								if($Dokumen0->save(false)){
									if($SUP->save(false)){
										$this->redirect(array('editaanwijzing','id'=>$Dokumen0->id_pengadaan));
									}
								}
							}
						
					}
				}

				$this->render('aanwijzing',array(
					'SUP'=>$SUP,'Dokumen0'=>$Dokumen0,
				));

			}
		}
	}
	
	public function actionBeritaAcaraAanwijzing()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				$Pengadaan->status ='8';
				
				$Dok0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Aanwijzing"');
				$SUP=SuratUndanganPenjelasan::model()->findByPk($Dok0->id_dokumen);
				
				$Dokumen1= new Dokumen;
				$criteria=new CDbcriteria;
				$criteria->select='max(id_dokumen) AS maxId';
				$row = $Dokumen1->model()->find($criteria);
				$somevariable = $row['maxId'];				
								
				$Dokumen1->id_dokumen=$somevariable+1;
				$Dokumen1->nama_dokumen='Berita Acara Aanwijzing';
				$Dokumen1->tempat='Jakarta';
				$Dokumen1->status_upload='Belum Selesai';
				$Dokumen1->id_pengadaan=$id;
				$Dokumen1->tanggal=$SUP->tanggal_undangan;
				
				$Dokumen2=new Dokumen;
				$Dokumen2->id_dokumen=$somevariable+2;
				$Dokumen2->nama_dokumen='Daftar Hadir Aanwijzing';
				$Dokumen2->tempat='Jakarta';
				$Dokumen2->status_upload='Belum Selesai';
				$Dokumen2->id_pengadaan=$id;
				$Dokumen2->tanggal=$SUP->tanggal_undangan;
				
				$A=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pengambilan Dokumen Pengadaan"'); 
				$A1=SuratUndanganPengambilanDokumenPengadaan::model()->findByPk($A->id_dokumen);
								
				
				$BAP= new BeritaAcaraPenjelasan;
				$BAP->id_dokumen=$Dokumen1->id_dokumen;
				$BAP->id_panitia=$Pengadaan->id_panitia;
				$BAP->nomor= 'Nomor Undangan Pengambilan Dokumen Pengadaan : '.$A1->nomor;
				
				$DH= new DaftarHadir;
				$DH->id_dokumen=$Dokumen2->id_dokumen;
				$DH->acara="Aanwijzing";
				$DH->jam=$SUP->waktu;
				$DH->tempat_hadir=$SUP->tempat;
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['BeritaAcaraPenjelasan']))
				{
					$BAP->attributes=$_POST['BeritaAcaraPenjelasan'];
					$valid=$BAP->validate();
					if($valid){
                        if($Pengadaan->save(false)){
							if($Dokumen1->save(false)&&$Dokumen2->save(false)){
								if($BAP->save(false)&&$DH->save(false)){
									$this->redirect(array('editberitaacaraaanwijzing','id'=>$Dokumen1->id_pengadaan));
								}
							}
                        }
					}
				}

				$this->render('beritaacaraaanwijzing',array(
					'BAP'=>$BAP,
				));

			}
		}
	}
	
	public function actionEditBeritaAcaraAanwijzing()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				
				
				$Dokumen1=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Aanwijzing"');
				$Dokumen2=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Daftar Hadir Aanwijzing"');
				
				
				$BAP=BeritaAcaraPenjelasan::model()->findByPk($Dokumen1->id_dokumen);
				$DH=DaftarHadir::model()->findByPk($Dokumen2->id_dokumen);
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['BeritaAcaraPenjelasan']))
				{
					// $Dokumen0->attributes=$_POST['Dokumen'];
					
					$BAP->attributes=$_POST['BeritaAcaraPenjelasan'];
					$valid=$BAP->validate();					
					if($valid){						
						if($BAP->save(false)&&$DH->save(false)){
							$this->redirect(array('editberitaacaraaanwijzing','id'=>$Dokumen1->id_pengadaan));
						}
						
					}
				}

				$this->render('beritaacaraaanwijzing',array(
					'BAP'=>$BAP,'DH'=>$DH
				));

			}
		}
	}
	
	public function actionCheckpoint5()
	{	
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				$this->render('checkpoint5');
			}
		}
	}
	
	public function actionSuratundanganpembukaanpenawaran()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				$Pengadaan=Pengadaan::model()->findByPk($id);
				$Pengadaan->status ='9';
				
				$Dokumen0= new Dokumen;
				$criteria=new CDbcriteria;
				$criteria->select='max(id_dokumen) AS maxId';
				$row = $Dokumen0->model()->find($criteria);
				$somevariable = $row['maxId'];
				$Dokumen0->id_dokumen=$somevariable+1;
				$Dokumen0->nama_dokumen='Surat Undangan Pembukaan Penawaran';
				$Dokumen0->tempat='Jakarta';
				$Dokumen0->status_upload='Belum Selesai';
				$Dokumen0->id_pengadaan=$id;
				
				$SUPP= new SuratUndanganPembukaanPenawaran;
				$SUPP->id_dokumen=$Dokumen0->id_dokumen;
				$SUPP->id_panitia=$Pengadaan->id_panitia;
				$SUPP->perihal= 'Undangan Pembukaan Penawaran '.$Pengadaan->nama_pengadaan;
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);
				
				if(isset($_POST['SuratUndanganPembukaanPenawaran']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SUPP->attributes=$_POST['SuratUndanganPembukaanPenawaran'];
					$valid=$SUPP->validate();
					$valid=$valid&&$Dokumen0->validate();
					if($valid){
						if($Pengadaan->save(false))
						{	
							if($Dokumen0->save(false)){
								if($SUPP->save(false)){
									$this->redirect(array('editsuratundanganpembukaanpenawaran','id'=>$Dokumen0->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('suratundanganpembukaanpenawaran',array(
					'SUPP'=>$SUPP,'Dokumen0'=>$Dokumen0,
				));
			}
		}
	}
	
	public function actionEditSuratundanganpembukaanpenawaran()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				
				$Dokumen0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pembukaan Penawaran"');
				
				$SUPP=SuratUndanganPembukaanPenawaran::model()->findByPk($Dokumen0->id_dokumen);
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['SuratUndanganPembukaanPenawaran']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SUPP->attributes=$_POST['SuratUndanganPembukaanPenawaran'];
					$valid=$SUPP->validate();
					if($valid){
						if($Pengadaan->save(false))
						{	
							if($Dokumen0->save(false)){
								if($SUPP->save(false)){
									$this->redirect(array('editsuratundanganpembukaanpenawaran','id'=>$Dokumen0->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('suratundanganpembukaanpenawaran',array(
					'SUPP'=>$SUPP,'Dokumen0'=>$Dokumen0,
				));

			}
		}
	}
	
	public function actionBeritaacarapembukaanpenawaran()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				$Pengadaan->status ='10';
				
				$Dok0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pembukaan Penawaran"');
				$SUPP=SuratUndanganPembukaanPenawaran::model()->findByPk($Dok0->id_dokumen);
				
				$Dokumen1= new Dokumen;
				$criteria=new CDbcriteria;
				$criteria->select='max(id_dokumen) AS maxId';
				$row = $Dokumen1->model()->find($criteria);
				$somevariable = $row['maxId'];				
								
				$Dokumen1->id_dokumen=$somevariable+1;
				$Dokumen1->nama_dokumen='Berita Acara Pembukaan Penawaran';
				$Dokumen1->tempat='Jakarta';
				$Dokumen1->status_upload='Belum Selesai';
				$Dokumen1->id_pengadaan=$id;
				$Dokumen1->tanggal=$SUPP->tanggal_undangan;
				
				$Dokumen2=new Dokumen;
				$Dokumen2->id_dokumen=$somevariable+2;
				$Dokumen2->nama_dokumen='Daftar Hadir Pembukaan Penawaran';
				$Dokumen2->tempat='Jakarta';
				$Dokumen2->status_upload='Belum Selesai';
				$Dokumen2->id_pengadaan=$id;
				$Dokumen2->tanggal=$SUPP->tanggal_undangan;
				
				$BAPP= new BeritaAcaraPembukaanPenawaran;
				$BAPP->id_dokumen=$Dokumen1->id_dokumen;
				$BAPP->id_panitia=$Pengadaan->id_panitia;
				
				$DH= new DaftarHadir;
				$DH->id_dokumen=$Dokumen2->id_dokumen;
				$DH->acara="Pembukaan Penawaran";
				$DH->jam=$SUPP->waktu;
				$DH->tempat_hadir=$SUPP->tempat;
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);
				
				if(isset($_POST['BeritaAcaraPembukaanPenawaran']))
				{
					$BAPP->attributes=$_POST['BeritaAcaraPembukaanPenawaran'];
					$valid=$BAPP->validate();
					if($valid){
						if($Pengadaan->save(false)){
							if($Dokumen1->save(false)&&$Dokumen2->save(false)){
								if($BAPP->save(false)&&$DH->save(false)){
									$this->redirect(array('editberitaacarapembukaanpenawaran','id'=>$Dokumen1->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('beritaacarapembukaanpenawaran',array(
					'BAPP'=>$BAPP,
				));
			}
		}
	}
	
	public function actionEditBeritaacarapembukaanpenawaran()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				
				$Dokumen1=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran"');
				$Dokumen2=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Daftar Hadir Pembukaan Penawaran"');
				
				$BAPP=BeritaAcaraPembukaanPenawaran::model()->findByPk($Dokumen1->id_dokumen);
				$DH=DaftarHadir::model()->findByPk($Dokumen2->id_dokumen);
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['BeritaAcaraPembukaanPenawaran']))
				{
					// $Dokumen0->attributes=$_POST['Dokumen'];
					
					$BAPP->attributes=$_POST['BeritaAcaraPembukaanPenawaran'];
					$valid=$BAPP->validate();					
					if($valid){						
						if($BAPP->save(false)&&$DH->save(false)){
							$this->redirect(array('editberitaacarapembukaanpenawaran','id'=>$Dokumen1->id_pengadaan));
						}
						
					}
				}

				$this->render('beritaacarapembukaanpenawaran',array(
					'BAPP'=>$BAPP,'DH'=>$DH,
				));

			}
		}
	}
	
	public function actionBeritaacaraevaluasipenawaran()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				$Pengadaan->status ='14';
				
				$Dok0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pembukaan Penawaran"');
				$SUPP=SuratUndanganPembukaanPenawaran::model()->findByPk($Dok0->id_dokumen);
				
				$Dokumen1= new Dokumen;
				$criteria=new CDbcriteria;
				$criteria->select='max(id_dokumen) AS maxId';
				$row = $Dokumen1->model()->find($criteria);
				$somevariable = $row['maxId'];				
								
				$Dokumen1->id_dokumen=$somevariable+1;
				$Dokumen1->nama_dokumen='Berita Acara Evaluasi Penawaran';
				$Dokumen1->tempat='Jakarta';
				$Dokumen1->status_upload='Belum Selesai';
				$Dokumen1->id_pengadaan=$id;
				
				$Dokumen2=new Dokumen;
				$Dokumen2->id_dokumen=$somevariable+2;
				$Dokumen2->nama_dokumen='Daftar Hadir Evaluasi Penawaran';
				$Dokumen2->tempat='Jakarta';
				$Dokumen2->status_upload='Belum Selesai';
				$Dokumen2->id_pengadaan=$id;
				
				$A=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "RKS"'); 
				$A1=RKS::model()->findByPk($A->id_dokumen);
				
				$BAEP= new BeritaAcaraEvaluasiPenawaran;
				$BAEP->id_dokumen=$Dokumen1->id_dokumen;
				$BAEP->id_panitia=$Pengadaan->id_panitia;
				$BAEP->no_RKS=$A1->nomor;
				
				$DH= new DaftarHadir;
				$DH->id_dokumen=$Dokumen2->id_dokumen;
				$DH->acara="Evaluasi Penawaran";
				$DH->jam=$SUPP->waktu;
				$DH->tempat_hadir=$SUPP->tempat;
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);
				
				if(isset($_POST['BeritaAcaraEvaluasiPenawaran']))
				{
					$Dokumen1->attributes=$_POST['Dokumen'];
					$BAEP->attributes=$_POST['BeritaAcaraEvaluasiPenawaran'];
					$valid=$BAEP->validate();
					if($valid){
						$Dokumen2->tanggal=$Dokumen1->tanggal;
						if($Pengadaan->save(false)){
							if($Dokumen1->save(false)&&$Dokumen2->save(false)){
								if($BAEP->save(false)&&$DH->save(false)){
									$this->redirect(array('editberitaacaraevaluasipenawaran','id'=>$Dokumen1->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('beritaacaraevaluasipenawaran',array(
					'BAEP'=>$BAEP,'Dokumen1'=>$Dokumen1,
				));
			}
		}
	}
	
	public function actionEditBeritaacaraevaluasipenawaran()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				
				$Dokumen1=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Evaluasi Penawaran"');
				$Dokumen2=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Daftar Hadir Evaluasi Penawaran"');
				
				$BAEP=BeritaAcaraEvaluasiPenawaran::model()->findByPk($Dokumen1->id_dokumen);
				$DH=DaftarHadir::model()->findByPk($Dokumen2->id_dokumen);
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['BeritaAcaraEvaluasiPenawaran']))
				{
					$Dokumen1->attributes=$_POST['Dokumen'];
					$BAEP->attributes=$_POST['BeritaAcaraEvaluasiPenawaran'];
					$valid=$BAEP->validate();
					if($valid){
						$Dokumen2->tanggal=$Dokumen1->tanggal;
						if($Pengadaan->save(false)){
							if($Dokumen1->save(false)&&$Dokumen2->save(false)){
								if($BAEP->save(false)&&$DH->save(false)){
									$this->redirect(array('editberitaacaraevaluasipenawaran','id'=>$Dokumen1->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('beritaacaraevaluasipenawaran',array(
					'BAEP'=>$BAEP,'Dokumen1'=>$Dokumen1,
				));

			}
		}
	}
	
	public function actionSuratundanganpembukaanpenawaransampul1()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				$Pengadaan=Pengadaan::model()->findByPk($id);
				$Pengadaan->status ='9';
				
				$Dokumen0= new Dokumen;
				$criteria=new CDbcriteria;
				$criteria->select='max(id_dokumen) AS maxId';
				$row = $Dokumen0->model()->find($criteria);
				$somevariable = $row['maxId'];
				$Dokumen0->id_dokumen=$somevariable+1;
				$Dokumen0->nama_dokumen='Surat Undangan Pembukaan Penawaran Sampul Satu';
				$Dokumen0->tempat='Jakarta';
				$Dokumen0->status_upload='Belum Selesai';
				$Dokumen0->id_pengadaan=$id;
				
				$SUPP= new SuratUndanganPembukaanPenawaran;
				$SUPP->id_dokumen=$Dokumen0->id_dokumen;
				$SUPP->id_panitia=$Pengadaan->id_panitia;
				$SUPP->perihal= 'Undangan Pembukaan Penawaran Sampul Satu '.$Pengadaan->nama_pengadaan;
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);
				
				if(isset($_POST['SuratUndanganPembukaanPenawaran']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SUPP->attributes=$_POST['SuratUndanganPembukaanPenawaran'];
					$valid=$SUPP->validate();
					$valid=$valid&&$Dokumen0->validate();
					if($valid){
						if($Pengadaan->save(false))
						{	
							if($Dokumen0->save(false)){
								if($SUPP->save(false)){
									$this->redirect(array('editsuratundanganpembukaanpenawaransampul1','id'=>$Dokumen0->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('suratundanganpembukaanpenawaransampul1',array(
					'SUPP'=>$SUPP,'Dokumen0'=>$Dokumen0,
				));
			}
		}
	}
	
	public function actionEditSuratundanganpembukaanpenawaransampul1()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				
				$Dokumen0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pembukaan Penawaran Sampul Satu"');
				
				$SUPP=SuratUndanganPembukaanPenawaran::model()->findByPk($Dokumen0->id_dokumen);
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['SuratUndanganPembukaanPenawaran']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SUPP->attributes=$_POST['SuratUndanganPembukaanPenawaran'];
					$valid=$SUPP->validate();
					if($valid){
						if($Pengadaan->save(false))
						{	
							if($Dokumen0->save(false)){
								if($SUPP->save(false)){
									$this->redirect(array('editsuratundanganpembukaanpenawaransampul1','id'=>$Dokumen0->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('suratundanganpembukaanpenawaransampul1',array(
					'SUPP'=>$SUPP,'Dokumen0'=>$Dokumen0,
				));

			}
		}
	}
	
	public function actionBeritaacarapembukaanpenawaransampul1()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				$Pengadaan->status ='10';
				
				$Dok0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pembukaan Penawaran Sampul Satu"');
				$SUPP=SuratUndanganPembukaanPenawaran::model()->findByPk($Dok0->id_dokumen);
				
				$Dokumen1= new Dokumen;
				$criteria=new CDbcriteria;
				$criteria->select='max(id_dokumen) AS maxId';
				$row = $Dokumen1->model()->find($criteria);
				$somevariable = $row['maxId'];				
								
				$Dokumen1->id_dokumen=$somevariable+1;
				$Dokumen1->nama_dokumen='Berita Acara Pembukaan Penawaran Sampul Satu';
				$Dokumen1->tempat='Jakarta';
				$Dokumen1->status_upload='Belum Selesai';
				$Dokumen1->id_pengadaan=$id;
				$Dokumen1->tanggal=$SUPP->tanggal_undangan;
				
				$Dokumen2=new Dokumen;
				$Dokumen2->id_dokumen=$somevariable+2;
				$Dokumen2->nama_dokumen='Daftar Hadir Pembukaan Penawaran Sampul Satu';
				$Dokumen2->tempat='Jakarta';
				$Dokumen2->status_upload='Belum Selesai';
				$Dokumen2->id_pengadaan=$id;
				$Dokumen2->tanggal=$SUPP->tanggal_undangan;
				
				$BAPP= new BeritaAcaraPembukaanPenawaran;
				$BAPP->id_dokumen=$Dokumen1->id_dokumen;
				$BAPP->id_panitia=$Pengadaan->id_panitia;
				
				$DH= new DaftarHadir;
				$DH->id_dokumen=$Dokumen2->id_dokumen;
				$DH->acara="Pembukaan Penawaran Sampul Satu";
				$DH->jam=$SUPP->waktu;
				$DH->tempat_hadir=$SUPP->tempat;
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);
				
				if(isset($_POST['BeritaAcaraPembukaanPenawaran']))
				{
					$BAPP->attributes=$_POST['BeritaAcaraPembukaanPenawaran'];
					$valid=$BAPP->validate();
					if($valid){
						if($Pengadaan->save(false)){
							if($Dokumen1->save(false)&&$Dokumen2->save(false)){
								if($BAPP->save(false)&&$DH->save(false)){
									$this->redirect(array('editberitaacarapembukaanpenawaransampul1','id'=>$Dokumen1->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('beritaacarapembukaanpenawaransampul1',array(
					'BAPP'=>$BAPP,
				));
			}
		}
	}
	
	public function actionEditBeritaacarapembukaanpenawaransampul1()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				
				$Dokumen1=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran Sampul Satu"');
				$Dokumen2=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Daftar Hadir Pembukaan Penawaran Sampul Satu"');
				
				$BAPP=BeritaAcaraPembukaanPenawaran::model()->findByPk($Dokumen1->id_dokumen);
				$DH=DaftarHadir::model()->findByPk($Dokumen2->id_dokumen);
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['BeritaAcaraPembukaanPenawaran']))
				{
					// $Dokumen0->attributes=$_POST['Dokumen'];
					
					$BAPP->attributes=$_POST['BeritaAcaraPembukaanPenawaran'];
					$valid=$BAPP->validate();					
					if($valid){						
						if($BAPP->save(false)&&$DH->save(false)){
							$this->redirect(array('editberitaacarapembukaanpenawaransampul1','id'=>$Dokumen1->id_pengadaan));
						}
						
					}
				}

				$this->render('beritaacarapembukaanpenawaransampul1',array(
					'BAPP'=>$BAPP,
				));

			}
		}
	}
	
	public function actionBeritaacaraevaluasipenawaransampul1()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				$Pengadaan->status ='11';
				
				$Dok0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pembukaan Penawaran Sampul Satu"');
				$SUPP=SuratUndanganPembukaanPenawaran::model()->findByPk($Dok0->id_dokumen);
				
				$Dokumen1= new Dokumen;
				$criteria=new CDbcriteria;
				$criteria->select='max(id_dokumen) AS maxId';
				$row = $Dokumen1->model()->find($criteria);
				$somevariable = $row['maxId'];				
								
				$Dokumen1->id_dokumen=$somevariable+1;
				$Dokumen1->nama_dokumen='Berita Acara Evaluasi Penawaran Sampul Satu';
				$Dokumen1->tempat='Jakarta';
				$Dokumen1->status_upload='Belum Selesai';
				$Dokumen1->id_pengadaan=$id;
				
				$Dokumen2=new Dokumen;
				$Dokumen2->id_dokumen=$somevariable+2;
				$Dokumen2->nama_dokumen='Daftar Hadir Evaluasi Penawaran Sampul Satu';
				$Dokumen2->tempat='Jakarta';
				$Dokumen2->status_upload='Belum Selesai';
				$Dokumen2->id_pengadaan=$id;
				
				$A=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "RKS"'); 
				$A1=RKS::model()->findByPk($A->id_dokumen);
				
				$BAEP= new BeritaAcaraEvaluasiPenawaran;
				$BAEP->id_dokumen=$Dokumen1->id_dokumen;
				$BAEP->id_panitia=$Pengadaan->id_panitia;
				$BAEP->no_RKS=$A1->nomor;
				
				$DH= new DaftarHadir;
				$DH->id_dokumen=$Dokumen2->id_dokumen;
				$DH->acara="Evaluasi Penawaran Sampul Satu";
				$DH->jam=$SUPP->waktu;
				$DH->tempat_hadir=$SUPP->tempat;
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);
				
				if(isset($_POST['BeritaAcaraEvaluasiPenawaran']))
				{
					$Dokumen1->attributes=$_POST['Dokumen'];
					$BAEP->attributes=$_POST['BeritaAcaraEvaluasiPenawaran'];
					$valid=$BAEP->validate();
					if($valid){
						$Dokumen2->tanggal=$Dokumen1->tanggal;
						if($Pengadaan->save(false)){
							if($Dokumen1->save(false)&&$Dokumen2->save(false)){
								if($BAEP->save(false)&&$DH->save(false)){
									$this->redirect(array('editberitaacaraevaluasipenawaransampul1','id'=>$Dokumen1->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('beritaacaraevaluasipenawaransampul1',array(
					'BAEP'=>$BAEP,'Dokumen1'=>$Dokumen1,
				));
			}
		}
	}
	
	public function actionEditBeritaacaraevaluasipenawaransampul1()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				
				$Dokumen1=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Evaluasi Penawaran Sampul Satu"');
				$Dokumen2=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Daftar Hadir Evaluasi Penawaran Sampul Satu"');
				
				$BAEP=BeritaAcaraEvaluasiPenawaran::model()->findByPk($Dokumen1->id_dokumen);
				$DH=DaftarHadir::model()->findByPk($Dokumen2->id_dokumen);
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['BeritaAcaraEvaluasiPenawaran']))
				{
					$Dokumen1->attributes=$_POST['Dokumen'];
					$BAEP->attributes=$_POST['BeritaAcaraEvaluasiPenawaran'];
					$valid=$BAEP->validate();
					if($valid){
						$Dokumen2->tanggal=$Dokumen1->tanggal;
						if($Pengadaan->save(false)){
							if($Dokumen1->save(false)&&$Dokumen2->save(false)){
								if($BAEP->save(false)&&$DH->save(false)){
									$this->redirect(array('editberitaacaraevaluasipenawaransampul1','id'=>$Dokumen1->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('beritaacaraevaluasipenawaransampul1',array(
					'BAEP'=>$BAEP,'Dokumen1'=>$Dokumen1,
				));

			}
		}
	}
	
	public function actionSuratundanganpembukaanpenawaransampul2()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				$Pengadaan=Pengadaan::model()->findByPk($id);
				$Pengadaan->status ='12';
				
				$Dokumen0= new Dokumen;
				$criteria=new CDbcriteria;
				$criteria->select='max(id_dokumen) AS maxId';
				$row = $Dokumen0->model()->find($criteria);
				$somevariable = $row['maxId'];
				$Dokumen0->id_dokumen=$somevariable+1;
				$Dokumen0->nama_dokumen='Surat Undangan Pembukaan Penawaran Sampul Dua';
				$Dokumen0->tempat='Jakarta';
				$Dokumen0->status_upload='Belum Selesai';
				$Dokumen0->id_pengadaan=$id;
				
				$SUPP= new SuratUndanganPembukaanPenawaran;
				$SUPP->id_dokumen=$Dokumen0->id_dokumen;
				$SUPP->id_panitia=$Pengadaan->id_panitia;
				$SUPP->perihal= 'Undangan Pembukaan Penawaran Sampul Dua '.$Pengadaan->nama_pengadaan;
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);
				
				if(isset($_POST['SuratUndanganPembukaanPenawaran']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SUPP->attributes=$_POST['SuratUndanganPembukaanPenawaran'];
					$valid=$SUPP->validate();
					$valid=$valid&&$Dokumen0->validate();
					if($valid){
						if($Pengadaan->save(false))
						{	
							if($Dokumen0->save(false)){
								if($SUPP->save(false)){
									$this->redirect(array('editsuratundanganpembukaanpenawaransampul2','id'=>$Dokumen0->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('suratundanganpembukaanpenawaransampul2',array(
					'SUPP'=>$SUPP,'Dokumen0'=>$Dokumen0,
				));
			}
		}
	}
	
	public function actionEditSuratundanganpembukaanpenawaransampul2()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				
				$Dokumen0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pembukaan Penawaran Sampul Dua"');
				
				$SUPP=SuratUndanganPembukaanPenawaran::model()->findByPk($Dokumen0->id_dokumen);
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['SuratUndanganPembukaanPenawaran']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SUPP->attributes=$_POST['SuratUndanganPembukaanPenawaran'];
					$valid=$SUPP->validate();
					if($valid){
						if($Pengadaan->save(false))
						{	
							if($Dokumen0->save(false)){
								if($SUPP->save(false)){
									$this->redirect(array('editsuratundanganpembukaanpenawaransampul2','id'=>$Dokumen0->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('suratundanganpembukaanpenawaransampul2',array(
					'SUPP'=>$SUPP,'Dokumen0'=>$Dokumen0,
				));

			}
		}
	}
	
	public function actionBeritaacarapembukaanpenawaransampul2()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				$Pengadaan->status ='13';
				
				$Dok0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pembukaan Penawaran Sampul Dua"');
				$SUPP=SuratUndanganPembukaanPenawaran::model()->findByPk($Dok0->id_dokumen);
				
				$Dokumen1= new Dokumen;
				$criteria=new CDbcriteria;
				$criteria->select='max(id_dokumen) AS maxId';
				$row = $Dokumen1->model()->find($criteria);
				$somevariable = $row['maxId'];				
								
				$Dokumen1->id_dokumen=$somevariable+1;
				$Dokumen1->nama_dokumen='Berita Acara Pembukaan Penawaran Sampul Dua';
				$Dokumen1->tempat='Jakarta';
				$Dokumen1->status_upload='Belum Selesai';
				$Dokumen1->id_pengadaan=$id;
				$Dokumen1->tanggal=$SUPP->tanggal_undangan;
				
				$Dokumen2=new Dokumen;
				$Dokumen2->id_dokumen=$somevariable+2;
				$Dokumen2->nama_dokumen='Daftar Hadir Pembukaan Penawaran Sampul Dua';
				$Dokumen2->tempat='Jakarta';
				$Dokumen2->status_upload='Belum Selesai';
				$Dokumen2->id_pengadaan=$id;
				$Dokumen2->tanggal=$SUPP->tanggal_undangan;
				
				$BAPP= new BeritaAcaraPembukaanPenawaran;
				$BAPP->id_dokumen=$Dokumen1->id_dokumen;
				$BAPP->id_panitia=$Pengadaan->id_panitia;
				
				$DH= new DaftarHadir;
				$DH->id_dokumen=$Dokumen2->id_dokumen;
				$DH->acara="Pembukaan Penawaran Sampul Dua";
				$DH->jam=$SUPP->waktu;
				$DH->tempat_hadir=$SUPP->tempat;
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);
				
				if(isset($_POST['BeritaAcaraPembukaanPenawaran']))
				{
					$BAPP->attributes=$_POST['BeritaAcaraPembukaanPenawaran'];
					$valid=$BAPP->validate();
					if($valid){
						if($Pengadaan->save(false)){
							if($Dokumen1->save(false)&&$Dokumen2->save(false)){
								if($BAPP->save(false)&&$DH->save(false)){
									$this->redirect(array('editberitaacarapembukaanpenawaransampul2','id'=>$Dokumen1->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('beritaacarapembukaanpenawaransampul2',array(
					'BAPP'=>$BAPP,
				));
			}
		}
	}
	
	public function actionEditBeritaacarapembukaanpenawaransampul2()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				
				$Dokumen1=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran Sampul Dua"');
				$Dokumen2=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Daftar Hadir Pembukaan Penawaran Sampul Dua"');
				
				$BAPP=BeritaAcaraPembukaanPenawaran::model()->findByPk($Dokumen1->id_dokumen);
				$DH=DaftarHadir::model()->findByPk($Dokumen2->id_dokumen);
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['BeritaAcaraPembukaanPenawaran']))
				{
					// $Dokumen0->attributes=$_POST['Dokumen'];
					
					$BAPP->attributes=$_POST['BeritaAcaraPembukaanPenawaran'];
					$valid=$BAPP->validate();					
					if($valid){						
						if($BAPP->save(false)&&$DH->save(false)){
							$this->redirect(array('editberitaacarapembukaanpenawaransampul2','id'=>$Dokumen1->id_pengadaan));
						}
						
					}
				}

				$this->render('beritaacarapembukaanpenawaransampul2',array(
					'BAPP'=>$BAPP,
				));

			}
		}
	}
	
	public function actionBeritaacaraevaluasipenawaransampul2()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				$Pengadaan->status ='14';
				
				$Dok0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pembukaan Penawaran Sampul Dua"');
				$SUPP=SuratUndanganPembukaanPenawaran::model()->findByPk($Dok0->id_dokumen);
				
				$Dokumen1= new Dokumen;
				$criteria=new CDbcriteria;
				$criteria->select='max(id_dokumen) AS maxId';
				$row = $Dokumen1->model()->find($criteria);
				$somevariable = $row['maxId'];				
								
				$Dokumen1->id_dokumen=$somevariable+1;
				$Dokumen1->nama_dokumen='Berita Acara Evaluasi Penawaran Sampul Dua';
				$Dokumen1->tempat='Jakarta';
				$Dokumen1->status_upload='Belum Selesai';
				$Dokumen1->id_pengadaan=$id;
				
				$Dokumen2=new Dokumen;
				$Dokumen2->id_dokumen=$somevariable+2;
				$Dokumen2->nama_dokumen='Daftar Hadir Evaluasi Penawaran Sampul Dua';
				$Dokumen2->tempat='Jakarta';
				$Dokumen2->status_upload='Belum Selesai';
				$Dokumen2->id_pengadaan=$id;
				
				$A=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "RKS"'); 
				$A1=RKS::model()->findByPk($A->id_dokumen);
				
				$BAEP= new BeritaAcaraEvaluasiPenawaran;
				$BAEP->id_dokumen=$Dokumen1->id_dokumen;
				$BAEP->id_panitia=$Pengadaan->id_panitia;
				$BAEP->no_RKS=$A1->nomor;
				
				$DH= new DaftarHadir;
				$DH->id_dokumen=$Dokumen2->id_dokumen;
				$DH->acara="Evaluasi Penawaran Sampul Dua";
				$DH->jam=$SUPP->waktu;
				$DH->tempat_hadir=$SUPP->tempat;
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);
				
				if(isset($_POST['BeritaAcaraEvaluasiPenawaran']))
				{
					$Dokumen1->attributes=$_POST['Dokumen'];
					$BAEP->attributes=$_POST['BeritaAcaraEvaluasiPenawaran'];
					$valid=$BAEP->validate();
					if($valid){
						$Dokumen2->tanggal=$Dokumen1->tanggal;
						if($Pengadaan->save(false)){
							if($Dokumen1->save(false)&&$Dokumen2->save(false)){
								if($BAEP->save(false)&&$DH->save(false)){
									$this->redirect(array('editberitaacaraevaluasipenawaransampul2','id'=>$Dokumen1->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('beritaacaraevaluasipenawaransampul2',array(
					'BAEP'=>$BAEP,'Dokumen1'=>$Dokumen1,
				));
			}
		}
	}
	
	public function actionEditBeritaacaraevaluasipenawaransampul2()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				
				$Dokumen1=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Evaluasi Penawaran Sampul Dua"');
				$Dokumen2=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Daftar Hadir Evaluasi Penawaran Sampul Dua"');
				
				$BAEP=BeritaAcaraEvaluasiPenawaran::model()->findByPk($Dokumen1->id_dokumen);
				$DH=DaftarHadir::model()->findByPk($Dokumen2->id_dokumen);
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['BeritaAcaraEvaluasiPenawaran']))
				{
					$Dokumen1->attributes=$_POST['Dokumen'];
					$BAEP->attributes=$_POST['BeritaAcaraEvaluasiPenawaran'];
					$valid=$BAEP->validate();
					if($valid){
						$Dokumen2->tanggal=$Dokumen1->tanggal;
						if($Pengadaan->save(false)){
							if($Dokumen1->save(false)&&$Dokumen2->save(false)){
								if($BAEP->save(false)&&$DH->save(false)){
									$this->redirect(array('editberitaacaraevaluasipenawaransampul2','id'=>$Dokumen1->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('beritaacaraevaluasipenawaransampul2',array(
					'BAEP'=>$BAEP,'Dokumen1'=>$Dokumen1,
				));

			}
		}
	}
	
	public function actionSuratundanganpembukaanpenawarantahap1()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				$Pengadaan=Pengadaan::model()->findByPk($id);
				$Pengadaan->status ='9';
				
				$Dokumen0= new Dokumen;
				$criteria=new CDbcriteria;
				$criteria->select='max(id_dokumen) AS maxId';
				$row = $Dokumen0->model()->find($criteria);
				$somevariable = $row['maxId'];
				$Dokumen0->id_dokumen=$somevariable+1;
				$Dokumen0->nama_dokumen='Surat Undangan Pembukaan Penawaran Tahap Satu';
				$Dokumen0->tempat='Jakarta';
				$Dokumen0->status_upload='Belum Selesai';
				$Dokumen0->id_pengadaan=$id;
				
				$SUPP= new SuratUndanganPembukaanPenawaran;
				$SUPP->id_dokumen=$Dokumen0->id_dokumen;
				$SUPP->id_panitia=$Pengadaan->id_panitia;
				$SUPP->perihal= 'Undangan Pembukaan Penawaran Tahap Satu '.$Pengadaan->nama_pengadaan;
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);
				
				if(isset($_POST['SuratUndanganPembukaanPenawaran']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SUPP->attributes=$_POST['SuratUndanganPembukaanPenawaran'];
					$valid=$SUPP->validate();
					$valid=$valid&&$Dokumen0->validate();
					if($valid){
						if($Pengadaan->save(false))
						{	
							if($Dokumen0->save(false)){
								if($SUPP->save(false)){
									$this->redirect(array('editsuratundanganpembukaanpenawarantahap1','id'=>$Dokumen0->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('suratundanganpembukaanpenawarantahap1',array(
					'SUPP'=>$SUPP,'Dokumen0'=>$Dokumen0,
				));
			}
		}
	}
	
	public function actionEditSuratundanganpembukaanpenawarantahap1()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				
				$Dokumen0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pembukaan Penawaran Tahap Satu"');
				
				$SUPP=SuratUndanganPembukaanPenawaran::model()->findByPk($Dokumen0->id_dokumen);
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['SuratUndanganPembukaanPenawaran']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SUPP->attributes=$_POST['SuratUndanganPembukaanPenawaran'];
					$valid=$SUPP->validate();
					if($valid){
						if($Pengadaan->save(false))
						{	
							if($Dokumen0->save(false)){
								if($SUPP->save(false)){
									$this->redirect(array('editsuratundanganpembukaanpenawarantahap1','id'=>$Dokumen0->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('suratundanganpembukaanpenawarantahap1',array(
					'SUPP'=>$SUPP,'Dokumen0'=>$Dokumen0,
				));

			}
		}
	}
	
	public function actionBeritaacarapembukaanpenawarantahap1()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				$Pengadaan->status ='10';
				
				$Dok0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pembukaan Penawaran Tahap Satu"');
				$SUPP=SuratUndanganPembukaanPenawaran::model()->findByPk($Dok0->id_dokumen);
				
				$Dokumen1= new Dokumen;
				$criteria=new CDbcriteria;
				$criteria->select='max(id_dokumen) AS maxId';
				$row = $Dokumen1->model()->find($criteria);
				$somevariable = $row['maxId'];				
								
				$Dokumen1->id_dokumen=$somevariable+1;
				$Dokumen1->nama_dokumen='Berita Acara Pembukaan Penawaran Tahap Satu';
				$Dokumen1->tempat='Jakarta';
				$Dokumen1->status_upload='Belum Selesai';
				$Dokumen1->id_pengadaan=$id;
				$Dokumen1->tanggal=$SUPP->tanggal_undangan;
				
				$Dokumen2=new Dokumen;
				$Dokumen2->id_dokumen=$somevariable+2;
				$Dokumen2->nama_dokumen='Daftar Hadir Pembukaan Penawaran Tahap Satu';
				$Dokumen2->tempat='Jakarta';
				$Dokumen2->status_upload='Belum Selesai';
				$Dokumen2->id_pengadaan=$id;
				$Dokumen2->tanggal=$SUPP->tanggal_undangan;
				
				$BAPP= new BeritaAcaraPembukaanPenawaran;
				$BAPP->id_dokumen=$Dokumen1->id_dokumen;
				$BAPP->id_panitia=$Pengadaan->id_panitia;
				
				$DH= new DaftarHadir;
				$DH->id_dokumen=$Dokumen2->id_dokumen;
				$DH->acara="Pembukaan Penawaran Tahap Satu";
				$DH->jam=$SUPP->waktu;
				$DH->tempat_hadir=$SUPP->tempat;
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);
				
				if(isset($_POST['BeritaAcaraPembukaanPenawaran']))
				{
					$BAPP->attributes=$_POST['BeritaAcaraPembukaanPenawaran'];
					$valid=$BAPP->validate();
					if($valid){
						if($Pengadaan->save(false)){
							if($Dokumen1->save(false)&&$Dokumen2->save(false)){
								if($BAPP->save(false)&&$DH->save(false)){
									$this->redirect(array('editberitaacarapembukaanpenawarantahap1','id'=>$Dokumen1->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('beritaacarapembukaanpenawarantahap1',array(
					'BAPP'=>$BAPP,
				));
			}
		}
	}
	
	public function actionEditBeritaacarapembukaanpenawarantahap1()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				
				$Dokumen1=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran Tahap Satu"');
				$Dokumen2=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Daftar Hadir Pembukaan Penawaran Tahap Satu"');
				
				$BAPP=BeritaAcaraPembukaanPenawaran::model()->findByPk($Dokumen1->id_dokumen);
				$DH=DaftarHadir::model()->findByPk($Dokumen2->id_dokumen);
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['BeritaAcaraPembukaanPenawaran']))
				{
					// $Dokumen0->attributes=$_POST['Dokumen'];
					
					$BAPP->attributes=$_POST['BeritaAcaraPembukaanPenawaran'];
					$valid=$BAPP->validate();					
					if($valid){						
						if($BAPP->save(false)&&$DH->save(false)){
							$this->redirect(array('editberitaacarapembukaanpenawarantahap1','id'=>$Dokumen1->id_pengadaan));
						}
						
					}
				}

				$this->render('beritaacarapembukaanpenawarantahap1',array(
					'BAPP'=>$BAPP,
				));

			}
		}
	}
	
	public function actionBeritaacaraevaluasipenawarantahap1()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				$Pengadaan->status ='11';
				
				$Dok0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pembukaan Penawaran Tahap Satu"');
				$SUPP=SuratUndanganPembukaanPenawaran::model()->findByPk($Dok0->id_dokumen);
				
				$Dokumen1= new Dokumen;
				$criteria=new CDbcriteria;
				$criteria->select='max(id_dokumen) AS maxId';
				$row = $Dokumen1->model()->find($criteria);
				$somevariable = $row['maxId'];				
								
				$Dokumen1->id_dokumen=$somevariable+1;
				$Dokumen1->nama_dokumen='Berita Acara Evaluasi Penawaran Tahap Satu';
				$Dokumen1->tempat='Jakarta';
				$Dokumen1->status_upload='Belum Selesai';
				$Dokumen1->id_pengadaan=$id;
				
				$Dokumen2=new Dokumen;
				$Dokumen2->id_dokumen=$somevariable+2;
				$Dokumen2->nama_dokumen='Daftar Hadir Evaluasi Penawaran Tahap Satu';
				$Dokumen2->tempat='Jakarta';
				$Dokumen2->status_upload='Belum Selesai';
				$Dokumen2->id_pengadaan=$id;
				
				$A=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "RKS"'); 
				$A1=RKS::model()->findByPk($A->id_dokumen);
				
				$BAEP= new BeritaAcaraEvaluasiPenawaran;
				$BAEP->id_dokumen=$Dokumen1->id_dokumen;
				$BAEP->id_panitia=$Pengadaan->id_panitia;
				$BAEP->no_RKS=$A1->nomor;
				
				$DH= new DaftarHadir;
				$DH->id_dokumen=$Dokumen2->id_dokumen;
				$DH->acara="Evaluasi Penawaran Tahap Satu";
				$DH->jam=$SUPP->waktu;
				$DH->tempat_hadir=$SUPP->tempat;
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);
				
				if(isset($_POST['BeritaAcaraEvaluasiPenawaran']))
				{
					$Dokumen1->attributes=$_POST['Dokumen'];
					$BAEP->attributes=$_POST['BeritaAcaraEvaluasiPenawaran'];
					$valid=$BAEP->validate();
					if($valid){
						$Dokumen2->tanggal=$Dokumen1->tanggal;
						if($Pengadaan->save(false)){
							if($Dokumen1->save(false)&&$Dokumen2->save(false)){
								if($BAEP->save(false)&&$DH->save(false)){
									$this->redirect(array('editberitaacaraevaluasipenawarantahap1','id'=>$Dokumen1->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('beritaacaraevaluasipenawarantahap1',array(
					'BAEP'=>$BAEP,'Dokumen1'=>$Dokumen1,
				));
			}
		}
	}
	
	public function actionEditBeritaacaraevaluasipenawarantahap1()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				
				$Dokumen1=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Evaluasi Penawaran Tahap Satu"');
				$Dokumen2=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Daftar Hadir Evaluasi Penawaran Tahap Satu"');
				
				$BAEP=BeritaAcaraEvaluasiPenawaran::model()->findByPk($Dokumen1->id_dokumen);
				$DH=DaftarHadir::model()->findByPk($Dokumen2->id_dokumen);
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['BeritaAcaraEvaluasiPenawaran']))
				{
					$Dokumen1->attributes=$_POST['Dokumen'];
					$BAEP->attributes=$_POST['BeritaAcaraEvaluasiPenawaran'];
					$valid=$BAEP->validate();
					if($valid){
						$Dokumen2->tanggal=$Dokumen1->tanggal;
						if($Pengadaan->save(false)){
							if($Dokumen1->save(false)&&$Dokumen2->save(false)){
								if($BAEP->save(false)&&$DH->save(false)){
									$this->redirect(array('editberitaacaraevaluasipenawarantahap1','id'=>$Dokumen1->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('beritaacaraevaluasipenawarantahap1',array(
					'BAEP'=>$BAEP,'Dokumen1'=>$Dokumen1,
				));

			}
		}
	}
	
	public function actionSuratundanganpembukaanpenawarantahap2()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				$Pengadaan=Pengadaan::model()->findByPk($id);
				$Pengadaan->status ='12';
				
				$Dokumen0= new Dokumen;
				$criteria=new CDbcriteria;
				$criteria->select='max(id_dokumen) AS maxId';
				$row = $Dokumen0->model()->find($criteria);
				$somevariable = $row['maxId'];
				$Dokumen0->id_dokumen=$somevariable+1;
				$Dokumen0->nama_dokumen='Surat Undangan Pembukaan Penawaran Tahap Dua';
				$Dokumen0->tempat='Jakarta';
				$Dokumen0->status_upload='Belum Selesai';
				$Dokumen0->id_pengadaan=$id;
				
				$SUPP= new SuratUndanganPembukaanPenawaran;
				$SUPP->id_dokumen=$Dokumen0->id_dokumen;
				$SUPP->id_panitia=$Pengadaan->id_panitia;
				$SUPP->perihal= 'Undangan Pembukaan Penawaran Tahap Dua '.$Pengadaan->nama_pengadaan;
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);
				
				if(isset($_POST['SuratUndanganPembukaanPenawaran']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SUPP->attributes=$_POST['SuratUndanganPembukaanPenawaran'];
					$valid=$SUPP->validate();
					$valid=$valid&&$Dokumen0->validate();
					if($valid){
						if($Pengadaan->save(false))
						{	
							if($Dokumen0->save(false)){
								if($SUPP->save(false)){
									$this->redirect(array('editsuratundanganpembukaanpenawarantahap2','id'=>$Dokumen0->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('suratundanganpembukaanpenawarantahap2',array(
					'SUPP'=>$SUPP,'Dokumen0'=>$Dokumen0,
				));
			}
		}
	}
	
	public function actionEditSuratundanganpembukaanpenawarantahap2()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				
				$Dokumen0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pembukaan Penawaran Tahap Dua"');
				
				$SUPP=SuratUndanganPembukaanPenawaran::model()->findByPk($Dokumen0->id_dokumen);
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['SuratUndanganPembukaanPenawaran']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SUPP->attributes=$_POST['SuratUndanganPembukaanPenawaran'];
					$valid=$SUPP->validate();
					if($valid){
						if($Pengadaan->save(false))
						{	
							if($Dokumen0->save(false)){
								if($SUPP->save(false)){
									$this->redirect(array('editsuratundanganpembukaanpenawarantahap2','id'=>$Dokumen0->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('suratundanganpembukaanpenawarantahap2',array(
					'SUPP'=>$SUPP,'Dokumen0'=>$Dokumen0,
				));

			}
		}
	}
	
	public function actionBeritaacarapembukaanpenawarantahap2()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				$Pengadaan->status ='13';
				
				$Dok0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pembukaan Penawaran Tahap Dua"');
				$SUPP=SuratUndanganPembukaanPenawaran::model()->findByPk($Dok0->id_dokumen);
				
				$Dokumen1= new Dokumen;
				$criteria=new CDbcriteria;
				$criteria->select='max(id_dokumen) AS maxId';
				$row = $Dokumen1->model()->find($criteria);
				$somevariable = $row['maxId'];				
								
				$Dokumen1->id_dokumen=$somevariable+1;
				$Dokumen1->nama_dokumen='Berita Acara Pembukaan Penawaran Tahap Dua';
				$Dokumen1->tempat='Jakarta';
				$Dokumen1->status_upload='Belum Selesai';
				$Dokumen1->id_pengadaan=$id;
				$Dokumen1->tanggal=$SUPP->tanggal_undangan;
				
				$Dokumen2=new Dokumen;
				$Dokumen2->id_dokumen=$somevariable+2;
				$Dokumen2->nama_dokumen='Daftar Hadir Pembukaan Penawaran Tahap Dua';
				$Dokumen2->tempat='Jakarta';
				$Dokumen2->status_upload='Belum Selesai';
				$Dokumen2->id_pengadaan=$id;
				$Dokumen2->tanggal=$SUPP->tanggal_undangan;
				
				$BAPP= new BeritaAcaraPembukaanPenawaran;
				$BAPP->id_dokumen=$Dokumen1->id_dokumen;
				$BAPP->id_panitia=$Pengadaan->id_panitia;
				
				$DH= new DaftarHadir;
				$DH->id_dokumen=$Dokumen2->id_dokumen;
				$DH->acara="Pembukaan Penawaran Tahap Dua";
				$DH->jam=$SUPP->waktu;
				$DH->tempat_hadir=$SUPP->tempat;
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);
				
				if(isset($_POST['BeritaAcaraPembukaanPenawaran']))
				{
					$BAPP->attributes=$_POST['BeritaAcaraPembukaanPenawaran'];
					$valid=$BAPP->validate();
					if($valid){
						if($Pengadaan->save(false)){
							if($Dokumen1->save(false)&&$Dokumen2->save(false)){
								if($BAPP->save(false)&&$DH->save(false)){
									$this->redirect(array('editberitaacarapembukaanpenawarantahap2','id'=>$Dokumen1->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('beritaacarapembukaanpenawarantahap2',array(
					'BAPP'=>$BAPP,
				));
			}
		}
	}
	
	public function actionEditBeritaacarapembukaanpenawarantahap2()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				
				$Dokumen1=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran Tahap Dua"');
				$Dokumen2=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Daftar Hadir Pembukaan Penawaran Tahap Dua"');
				
				$BAPP=BeritaAcaraPembukaanPenawaran::model()->findByPk($Dokumen1->id_dokumen);
				$DH=DaftarHadir::model()->findByPk($Dokumen2->id_dokumen);
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['BeritaAcaraPembukaanPenawaran']))
				{
					// $Dokumen0->attributes=$_POST['Dokumen'];
					
					$BAPP->attributes=$_POST['BeritaAcaraPembukaanPenawaran'];
					$valid=$BAPP->validate();					
					if($valid){						
						if($BAPP->save(false)&&$DH->save(false)){
							$this->redirect(array('editberitaacarapembukaanpenawarantahap2','id'=>$Dokumen1->id_pengadaan));
						}
						
					}
				}

				$this->render('beritaacarapembukaanpenawarantahap2',array(
					'BAPP'=>$BAPP,
				));

			}
		}
	}
	
	public function actionBeritaacaraevaluasipenawarantahap2()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				$Pengadaan->status ='14';
				
				$Dok0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pembukaan Penawaran Tahap Dua"');
				$SUPP=SuratUndanganPembukaanPenawaran::model()->findByPk($Dok0->id_dokumen);
				
				$Dokumen1= new Dokumen;
				$criteria=new CDbcriteria;
				$criteria->select='max(id_dokumen) AS maxId';
				$row = $Dokumen1->model()->find($criteria);
				$somevariable = $row['maxId'];				
								
				$Dokumen1->id_dokumen=$somevariable+1;
				$Dokumen1->nama_dokumen='Berita Acara Evaluasi Penawaran Tahap Dua';
				$Dokumen1->tempat='Jakarta';
				$Dokumen1->status_upload='Belum Selesai';
				$Dokumen1->id_pengadaan=$id;
				
				$Dokumen2=new Dokumen;
				$Dokumen2->id_dokumen=$somevariable+2;
				$Dokumen2->nama_dokumen='Daftar Hadir Evaluasi Penawaran Tahap Dua';
				$Dokumen2->tempat='Jakarta';
				$Dokumen2->status_upload='Belum Selesai';
				$Dokumen2->id_pengadaan=$id;
				
				$A=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "RKS"'); 
				$A1=RKS::model()->findByPk($A->id_dokumen);
				
				$BAEP= new BeritaAcaraEvaluasiPenawaran;
				$BAEP->id_dokumen=$Dokumen1->id_dokumen;
				$BAEP->id_panitia=$Pengadaan->id_panitia;
				$BAEP->no_RKS=$A1->nomor;
				
				$DH= new DaftarHadir;
				$DH->id_dokumen=$Dokumen2->id_dokumen;
				$DH->acara="Evaluasi Penawaran Tahap Dua";
				$DH->jam=$SUPP->waktu;
				$DH->tempat_hadir=$SUPP->tempat;
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);
				
				if(isset($_POST['BeritaAcaraEvaluasiPenawaran']))
				{
					$Dokumen1->attributes=$_POST['Dokumen'];
					$BAEP->attributes=$_POST['BeritaAcaraEvaluasiPenawaran'];
					$valid=$BAEP->validate();
					if($valid){
						$Dokumen2->tanggal=$Dokumen1->tanggal;
						if($Pengadaan->save(false)){
							if($Dokumen1->save(false)&&$Dokumen2->save(false)){
								if($BAEP->save(false)&&$DH->save(false)){
									$this->redirect(array('editberitaacaraevaluasipenawarantahap2','id'=>$Dokumen1->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('beritaacaraevaluasipenawarantahap2',array(
					'BAEP'=>$BAEP,'Dokumen1'=>$Dokumen1,
				));
			}
		}
	}
	
	public function actionEditBeritaacaraevaluasipenawarantahap2()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				
				$Dokumen1=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Evaluasi Penawaran Tahap Dua"');
				$Dokumen2=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Daftar Hadir Evaluasi Penawaran Tahap Dua"');
				
				$BAEP=BeritaAcaraEvaluasiPenawaran::model()->findByPk($Dokumen1->id_dokumen);
				$DH=DaftarHadir::model()->findByPk($Dokumen2->id_dokumen);
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['BeritaAcaraEvaluasiPenawaran']))
				{
					$Dokumen1->attributes=$_POST['Dokumen'];
					$BAEP->attributes=$_POST['BeritaAcaraEvaluasiPenawaran'];
					$valid=$BAEP->validate();
					if($valid){
						$Dokumen2->tanggal=$Dokumen1->tanggal;
						if($Pengadaan->save(false)){
							if($Dokumen1->save(false)&&$Dokumen2->save(false)){
								if($BAEP->save(false)&&$DH->save(false)){
									$this->redirect(array('editberitaacaraevaluasipenawarantahap2','id'=>$Dokumen1->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('beritaacaraevaluasipenawarantahap2',array(
					'BAEP'=>$BAEP,'Dokumen1'=>$Dokumen1,
				));

			}
		}
	}
	
	public function actionSuratundangannegosiasiklarifikasi()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				$Pengadaan->status ='15';
				
				$Dokumen0= new Dokumen;
				$criteria=new CDbcriteria;
				$criteria->select='max(id_dokumen) AS maxId';
				$row = $Dokumen0->model()->find($criteria);
				$somevariable = $row['maxId'];
				$Dokumen0->id_dokumen=$somevariable+1;
				$Dokumen0->nama_dokumen='Surat Undangan Negosiasi dan Klarifikasi';
				$Dokumen0->tempat='Jakarta';
				$Dokumen0->status_upload='Belum Selesai';
				$Dokumen0->id_pengadaan=$id;
				
				$SUNK= new SuratUndanganNegosiasiKlarifikasi;
				$SUNK->id_dokumen=$Dokumen0->id_dokumen;
				$SUNK->perihal= 'Undangan Negosiasi dan Klarifikasi '.$Pengadaan->nama_pengadaan;
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['SuratUndanganNegosiasiKlarifikasi']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SUNK->attributes=$_POST['SuratUndanganNegosiasiKlarifikasi'];
					$valid=$SUNK->validate();
					$valid=$valid&&$Dokumen0->validate();
					if($valid){
						if($Pengadaan->save(false))
						{	
							if($Dokumen0->save(false)){
								if($SUNK->save(false)){
									$this->redirect(array('editsuratundangannegosiasiklarifikasi','id'=>$Dokumen0->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('suratundangannegosiasiklarifikasi',array(
					'SUNK'=>$SUNK,'Dokumen0'=>$Dokumen0,
				));

			}
		}
	}
	
	public function actionEditSuratundangannegosiasiklarifikasi()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				
				$Dokumen0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Negosiasi dan Klarifikasi"');
				
				$SUNK=SuratUndanganNegosiasiKlarifikasi::model()->findByPk($Dokumen0->id_dokumen);
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['SuratUndanganNegosiasiKlarifikasi']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SUNK->attributes=$_POST['SuratUndanganNegosiasiKlarifikasi'];
					$valid=$SUNK->validate();
					$valid=$valid&&$Dokumen0->validate();
					if($valid){
						if($Pengadaan->save(false))
						{	
							if($Dokumen0->save(false)){
								if($SUNK->save(false)){
									$this->redirect(array('editsuratundangannegosiasiklarifikasi','id'=>$Dokumen0->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('suratundangannegosiasiklarifikasi',array(
					'SUNK'=>$SUNK,'Dokumen0'=>$Dokumen0,
				));

			}
		}
	}
	
	public function actionBeritaacaranegosiasiklarifikasi()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				$Pengadaan->status ='Penentuan Pemenang';
				
				$Dok0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Negosiasi dan Klarifikasi"');
				$SUNK=SuratUndanganNegosiasiKlarifikasi::model()->findByPk($Dok0->id_dokumen);
				
				$Dokumen1= new Dokumen;
				$criteria=new CDbcriteria;
				$criteria->select='max(id_dokumen) AS maxId';
				$row = $Dokumen1->model()->find($criteria);
				$somevariable = $row['maxId'];				
								
				$Dokumen1->id_dokumen=$somevariable+1;
				$Dokumen1->nama_dokumen='Berita Acara Negosiasi dan Klarifikasi';
				$Dokumen1->tempat='Jakarta';
				$Dokumen1->status_upload='Belum Selesai';
				$Dokumen1->id_pengadaan=$id;
				$Dokumen1->tanggal=$SUPP->tanggal_undangan;
				
				$Dokumen2=new Dokumen;
				$Dokumen2->id_dokumen=$somevariable+2;
				$Dokumen2->nama_dokumen='Daftar Hadir Negosiasi dan Klarifikasi';
				$Dokumen2->tempat='Jakarta';
				$Dokumen2->status_upload='Belum Selesai';
				$Dokumen2->id_pengadaan=$id;
				$Dokumen2->tanggal=$SUPP->tanggal_undangan;
				
				$BANK= new BeritaAcaraNegosiasiKlarifikasi;
				$BANK->id_dokumen=$Dokumen1->id_dokumen;
				$BANK->id_panitia=$Pengadaan->id_panitia;
				$BANK->surat_penawaran_harga='-';
				
				$DH= new DaftarHadir;
				$DH->id_dokumen=$Dokumen2->id_dokumen;
				$DH->acara="Negosiasi dan Klarifikasi";
				$DH->jam=$SUNK->waktu;
				$DH->tempat_hadir=$SUNK->tempat;
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);
				
				if(isset($_POST['BeritaAcaraNegosiasiKlarifikasi']))
				{
					$BANK->attributes=$_POST['BeritaAcaraNegosiasiKlarifikasi'];
					$valid=$BANK->validate();
					if($valid){
						if($Pengadaan->save(false)){
							if($Dokumen1->save(false)&&$Dokumen2->save(false)){
								if($BANK->save(false)&&$DH->save(false)){
									$this->redirect(array('editberitaacaranegosiasiklarifikasi','id'=>$Dokumen1->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('beritaacaranegosiasiklarifikasi',array(
					'BANK'=>$BANK,
				));
			}
		}
	}
	
	public function actionEditBeritaacaranegosiasiklarifikasi()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				
				$Dokumen1=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Negosiasi dan Klarifikasi"');
				$Dokumen2=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Daftar Hadir Negosiasi dan Klarifikasi"');
				
				$BANK=BeritaAcaraNegosiasiKlarifikasi::model()->findByPk($Dokumen1->id_dokumen);
				$DH=DaftarHadir::model()->findByPk($Dokumen2->id_dokumen);
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['BeritaAcaraNegosiasiKlarifikasi']))
				{
					// $Dokumen0->attributes=$_POST['Dokumen'];
					
					$BANK->attributes=$_POST['BeritaAcaraNegosiasiKlarifikasi'];
					$valid=$BANK->validate();					
					if($valid){						
						if($BANK->save(false)&&$DH->save(false)){
							$this->redirect(array('editberitaacaranegosiasiklarifikasi','id'=>$Dokumen1->id_pengadaan));
						}
						
					}
				}

				$this->render('beritaacaranegosiasiklarifikasi',array(
					'BANK'=>$BANK,
				));

			}
		}
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	// public function actionContact()
	// {
	// 	$model=new ContactForm;
	// 	if(isset($_POST['ContactForm']))
	// 	{
	// 		$model->attributes=$_POST['ContactForm'];
	// 		if($model->validate())
	// 		{
	// 			$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
	// 			$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
	// 			$headers="From: $name <{$model->email}>\r\n".
	// 				"Reply-To: {$model->email}\r\n".
	// 				"MIME-Version: 1.0\r\n".
	// 				"Content-type: text/plain; charset=UTF-8";

	// 			mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
	// 			Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
	// 			$this->refresh();
	// 		}
	// 	}
	// 	$this->render('contact',array('model'=>$model));
	// }

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	public function actionTambahpengadaan()
	{	
		if (Kdivmum::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
			$Pengadaan=new Pengadaan;
			$Pengadaan->status="1";
			$criteria=new CDbcriteria;
			$criteria->select='max(id_pengadaan) AS maxId';
			$row = $Pengadaan->model()->find($criteria);
			$somevariable = $row['maxId'];
			$Pengadaan->id_pengadaan=$somevariable+1;
			$Pengadaan->nama_penyedia='-';
			$Pengadaan->tanggal_selesai='-';
			$Pengadaan->biaya='-';
			$Pengadaan->metode_penawaran='-';
			$Pengadaan->jenis_kualifikasi='-';
			
			$Dokumen0= new Dokumen;
			$criteria=new CDbcriteria;
			$criteria->select='max(id_dokumen) AS maxId';
			$row = $Dokumen0->model()->find($criteria);
			$somevariable = $row['maxId'];
			$Dokumen0->id_dokumen=$somevariable+1;
			$Dokumen0->id_pengadaan=$Pengadaan->id_pengadaan;
			$Dokumen0->nama_dokumen='Nota Dinas Permintaan';
			$Dokumen0->tempat='Jakarta';
			$Dokumen0->status_upload='Belum Selesai';
			
			$Dokumen1= new Dokumen;
			$Dokumen1->id_dokumen=$somevariable+4;
			$Dokumen1->id_pengadaan=$Pengadaan->id_pengadaan;
			$Dokumen1->nama_dokumen='Nota Dinas Perintah Pengadaan';
			$Dokumen1->tempat='Jakarta';
			$Dokumen1->status_upload='Belum Selesai';
			
			$Dokumen2= new Dokumen;
			$Dokumen2->id_dokumen=$somevariable+2;
			$Dokumen2->id_pengadaan=$Pengadaan->id_pengadaan;
			$Dokumen2->nama_dokumen='TOR';
			$Dokumen2->tempat='Jakarta';
			$Dokumen2->status_upload='Belum Selesai';
			
			$Dokumen3= new Dokumen;
			$Dokumen3->id_dokumen=$somevariable+3;
			$Dokumen3->id_pengadaan=$Pengadaan->id_pengadaan;
			$Dokumen3->nama_dokumen='RAB';
			$Dokumen3->tempat='Jakarta';
			$Dokumen3->status_upload='Belum Selesai';
			
			$NDP= new NotaDinasPermintaan;
			$NDP->id_dokumen=$Dokumen0->id_dokumen;
			
			$NDPP= new NotaDinasPerintahPengadaan;
			$NDPP->id_dokumen=$Dokumen1->id_dokumen;
			$NDPP->RAB='Terlampir';
			$NDPP->TOR_RKS='Terlampir';
			
			$TOR= new Tor;
			$TOR->id_dokumen=$Dokumen2->id_dokumen;
			
			$RAB= new Rab;
			$RAB->id_dokumen=$Dokumen2->id_dokumen;

			//Uncomment the following line if AJAX validation is needed
			//$this->performAjaxValidation($model);

			if(isset($_POST['Pengadaan']))
			{
				$Pengadaan->attributes=$_POST['Pengadaan'];
				$NDP->attributes=$_POST['NotaDinasPermintaan'];
				$NDPP->attributes=$_POST['NotaDinasPerintahPengadaan'];
				$Dokumen0->attributes=$_POST['Dokumen'];
				$valid=$Pengadaan->validate()&&$Dokumen0->validate();
				
				// $TOR->attributes=$_POST['Tor'];
				// $RAB->attributes=$_POST['Rab'];
				
				if($valid){
					$Dokumen1->tanggal=$Pengadaan->tanggal_masuk;
					$Dokumen2->tanggal=$Dokumen0->tanggal;
					$Dokumen3->tanggal=$Dokumen0->tanggal;
					$Panitia=Panitia::model()->findByPk($Pengadaan->id_panitia);
					$NDPP->kepada=(User::model()->findByPk(Anggota::model()->find('id_panitia='.$Panitia->id_panitia)->username)->nama);
					$valid=$valid&&$NDP->validate();
					if($valid){
						$NDPP->nota_dinas_permintaan=$NDP->nomor;
						$valid=$valid&&$NDPP->validate();
						if($valid){
							if($Pengadaan->save(false)) {
								if($Dokumen0->save(false)&&$Dokumen1->save(false)&&$Dokumen2->save(false)&&$Dokumen3->save(false)){
									if($NDP->save(false)&&$NDPP->save(false)/*&&$TOR->save(false)&&$RAB->save(false)*/){
										if(isset($_POST['simpan'])){
											$this->redirect(array('dashboard'));
										}
										if(isset($_POST['simpanbuat'])){
											$this->redirect(array('docx/download', 'id'=>$NDPP->id_dokumen));
										}
									}
								}
							}
						}
					}
				}
			}

			$this->render('tambahpengadaan',array(
				'Pengadaan'=>$Pengadaan,'NDP'=>$NDP,'NDPP'=>$NDPP,'Dokumen0'=>$Dokumen0
			));
		}
	}
	
public function actionUploader(){
			$id = Yii::app()->getRequest()->getQuery('id');
			$user = Yii::app()->user->name;
			$objectpengadaan = Pengadaan::model()->find('id_pengadaan = "' . $id. '"');

			$metode_penawaran1='';
			$metode_penawaran2='';
			if($objectpengadaan->metode_penawaran=='Dua Tahap'){
				$metode_penawaran1='Tahap 1';
				$metode_penawaran2='Tahap 2';
			} else if ($objectpengadaan->metode_penawaran=='Dua Sampul'){
				$metode_penawaran1='Sampul 1';
				$metode_penawaran2='Sampul 2';
			}	
			
			$modelDok = array(Dokumen::model()->find('nama_dokumen="Pakta Integritas Awal Panitia" AND id_pengadaan="' . $id . '"'),
										 Dokumen::model()->find('nama_dokumen="RKS" AND id_pengadaan="' . $id . '"'),
										 Dokumen::model()->find('nama_dokumen="Surat Undangan Prakualifikasi" AND id_pengadaan="' . $id . '"'),
										 Dokumen::model()->find('nama_dokumen="Pakta Integritas Penyedia" AND id_pengadaan="' . $id . '"'),
										 Dokumen::model()->find('nama_dokumen="Surat Pemberitahuan Pengadaan" AND id_pengadaan="' . $id . '"'),
										 Dokumen::model()->find('nama_dokumen="Surat Pernyataan Minat" AND id_pengadaan="' . $id . '"'),
										 Dokumen::model()->find('nama_dokumen="Form Isian Kualifikasi" AND id_pengadaan="' . $id . '"'),
										 Dokumen::model()->find('nama_dokumen="Surat Undangan Pengambilan Dokumen Pengadaan" AND id_pengadaan="' . $id . '"'),
										 Dokumen::model()->find('nama_dokumen="Surat Undangan Aanwijzing" AND id_pengadaan="' . $id . '"'),
										 Dokumen::model()->find('nama_dokumen="Berita Acara Aanwijzing" AND id_pengadaan="' . $id . '"'),
										 Dokumen::model()->find('nama_dokumen="Daftar Hadir Aanwijzing" AND id_pengadaan="' . $id . '"'),
										 Dokumen::model()->find('nama_dokumen="Dokumen Penawaran" AND id_pengadaan="' . $id . '"'),
										 Dokumen::model()->find('nama_dokumen="Surat Undangan Pembukaan Penawaran ' . $metode_penawaran1 . '" AND id_pengadaan="' . $id . '"'),
										 Dokumen::model()->find('nama_dokumen="Surat Undangan Pembukaan Penawaran ' . $metode_penawaran2 . '" AND id_pengadaan="' . $id . '"'),
										 Dokumen::model()->find('nama_dokumen="Berita Acara Pembukaan Penawaran ' . $metode_penawaran1 . '" AND id_pengadaan="' . $id . '"'),
										 Dokumen::model()->find('nama_dokumen="Berita Acara Pembukaan Penawaran ' . $metode_penawaran2 . '" AND id_pengadaan="' . $id . '"'),
										 Dokumen::model()->find('nama_dokumen="Daftar Hadir Pembukaan Penawaran ' . $metode_penawaran1 . '" AND id_pengadaan="' . $id . '"'),
										 Dokumen::model()->find('nama_dokumen="Daftar Hadir Pembukaan Penawaran ' . $metode_penawaran2 . '" AND id_pengadaan="' . $id . '"'),
										 Dokumen::model()->find('nama_dokumen="Berita Acara Evaluasi Penawaran ' . $metode_penawaran1 . '" AND id_pengadaan="' . $id . '"'),
										 Dokumen::model()->find('nama_dokumen="Berita Acara Evaluasi Penawaran ' . $metode_penawaran2 . ' " AND id_pengadaan="' . $id . '"'),
										 Dokumen::model()->find('nama_dokumen="Surat Undangan Negosiasi dan Klarifikasi" AND id_pengadaan="' . $id . '"'),
										 Dokumen::model()->find('nama_dokumen="Berita Acara Negosiasi dan Klarifikasi" AND id_pengadaan="' . $id . '"'),
										 Dokumen::model()->find('nama_dokumen="Nota Dinas Usulan Pemenang" AND id_pengadaan="' . $id . '"'),
										 Dokumen::model()->find('nama_dokumen="Nota Dinas Penetapan Pemenang" AND id_pengadaan="' . $id . '"'),
										 Dokumen::model()->find('nama_dokumen="Nota Dinas Pemberitahuan Pemenang" AND id_pengadaan="' . $id . '"'),
										 Dokumen::model()->find('nama_dokumen="Pakta Integritas Akhir Panitia" AND id_pengadaan="' . $id . '"')
										);

			$modelDokKadiv = array(Dokumen::model()->find('nama_dokumen="Nota Dinas Permintaan" AND id_pengadaan="' . $id . '"'),
												Dokumen::model()->find('nama_dokumen="TOR" AND id_pengadaan="' . $id . '"'),
												Dokumen::model()->find('nama_dokumen="RAB" AND id_pengadaan="' . $id . '"'),
												Dokumen::model()->find('nama_dokumen="Nota Dinas Perintah Pengadaan" AND id_pengadaan="' . $id . '"')
										);
			
			$newDokumen = new Dokumen;
			$newLinkDokumen = new LinkDokumen;
				
			if(isset($_POST['Dokumen'])){
				$newDokumen->attributes=$_POST['Dokumen'];
				$fileDokumen = CUploadedFile::getInstance($newDokumen,'uploadedFile');				
				$newDokumen = Dokumen::model()->findByPk($newDokumen->id_dokumen);
				$newDokumen->uploadedFile=$fileDokumen;
				
				$newDokumen->status_upload='Selesai';
				
				date_default_timezone_set("Asia/Jakarta");
				$secs = time() + (7*3600);
				$hours = $secs / 3600 % 24;
				$minutes = $secs / 60 % 60;
				$seconds = $secs % 60;
				$waktu_upload = $hours . ':' . $minutes . ':' . $seconds;				
				$pathinfo = pathinfo($newDokumen->uploadedFile->getName());
				
				$newLinkDokumen->id_link=LinkDokumen::model()->count()+1;
				$newLinkDokumen->id_dokumen=$newDokumen->id_dokumen;
				$newLinkDokumen->waktu_upload=$waktu_upload;
				$newLinkDokumen->tanggal_upload=date('Y-m-d');
				$newLinkDokumen->pengunggah=$user;
				$newLinkDokumen->nomor_link=LinkDokumen::model()->count('id_dokumen="' . $newDokumen->id_dokumen . '"') + 1;
				$newLinkDokumen->format_dokumen=$pathinfo['extension'];
				$newLinkDokumen->save();
								
				$path = $_SERVER["DOCUMENT_ROOT"] . Yii::app()->request->baseUrl . '/uploads/' . $newDokumen->id_pengadaan . '/' . $newDokumen->id_dokumen . '/';
				@mkdir($path,0700,true);
				$namaFile = $newLinkDokumen->nomor_link;
				
				if($newDokumen->save(false)){
					$newDokumen->uploadedFile->saveAs($path . $namaFile . '.' . $pathinfo['extension']);
					}
	}
				$this->render('uploader',array('modelDok'=>$modelDok));
	}
}