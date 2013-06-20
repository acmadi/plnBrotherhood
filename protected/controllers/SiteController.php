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
		// renders the view file 'protected/views/site/history.php'
		// using the default layout 'protected/views/layouts/main.php'
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			$this->render('detaildokumen');
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
				if(Pengadaan::model()->findByPk($id)->status=="Penunjukan Panitia"){
					$this->redirect(array('site/penunjukanpanitia','id'=>$id));
				}
				if(Pengadaan::model()->findByPk($id)->status=="Kualifikasi"){
					if(Pengadaan::model()->findByPk($id)->jenis_kualifikasi=="Pra Kualifikasi"){
						$this->redirect(array('site/prakualifikasi','id'=>$id));
					}
					if(Pengadaan::model()->findByPk($id)->jenis_kualifikasi=="Pasca Kualifikasi"){
						$this->redirect(array('site/pascakualifikasi','id'=>$id));
					}
				}
				if(Pengadaan::model()->findByPk($id)->status=="Pengambilan Dokumen Pengadaan"){
					$this->redirect(array('site/pengambilandokumenpengadaan','id'=>$id));
				}
				if(Pengadaan::model()->findByPk($id)->status=="Aanwijzing"){
					$this->redirect(array('site/aanwijzing','id'=>$id));
				}
				if(Pengadaan::model()->findByPk($id)->status=="Penawaran dan Evaluasi"){
					if(Pengadaan::model()->findByPk($id)->metode_penawaran=="Satu Sampul"){
						$this->redirect(array('site/penawaranevaluasisatusampul','id'=>$id));
					}
					if(Pengadaan::model()->findByPk($id)->metode_penawaran=="Dua Sampul"){
						$this->redirect(array('site/penawaranevaluasiduasampul','id'=>$id));
					}
					if(Pengadaan::model()->findByPk($id)->metode_penawaran=="Dua Tahap"){
						$this->redirect(array('site/penawaranevaluasiduatahap','id'=>$id));
					}
				}
				if(Pengadaan::model()->findByPk($id)->status=="Negosiasi dan Klarifikasi"){
					$this->redirect(array('site/penunjukanpanitia','id'=>$id));
				}
				if(Pengadaan::model()->findByPk($id)->status=="Penentuan Pemenang"){
					$this->redirect(array('site/penunjukanpanitia','id'=>$id));
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
	
	public function actionPenunjukanpanitia()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				
				$Pengadaan=Pengadaan::model()->findByPk($id);
				$Pengadaan->status ='Kualifikasi';
				
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
									$this->redirect(array('editpenunjukanpanitia','id'=>$Dokumen0->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('penunjukanpanitia',array(
					'Rks'=>$RKS,'Pengadaan'=>$Pengadaan,'Dokumen1'=>$Dokumen1,
				));
			}
		}
	}
	
	public function actionEditPenunjukanpanitia()
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
									$this->redirect(array('editpenunjukanpanitia','id'=>$Dokumen0->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('editpenunjukanpanitia',array(
					'Rks'=>$RKS,'Pengadaan'=>$Pengadaan,'Dokumen1'=>$Dokumen1,'PAP1'=>$PAP1,
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
				$Pengadaan->status= "Pengambilan Dokumen Pengadaan";
				
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
				$Dokumen1->tempat='-';
				$Dokumen1->id_pengadaan=$id;
				
				$Dokumen2= new Dokumen;
				$Dokumen2->id_dokumen=$somevariable+3;
				$Dokumen2->nama_dokumen='Surat Pemberitahuan Pengadaan';
				$Dokumen2->tempat='Jakarta';
				$Dokumen2->status_upload='Belum Selesai';
				$Dokumen2->id_pengadaan=$id;
				
				$Dokumen3= new Dokumen;
				$Dokumen3->id_dokumen=$somevariable+4;
				$Dokumen3->nama_dokumen='Surat Pernyataan Minat';
				$Dokumen3->tempat='-';
				$Dokumen3->status_upload='Belum Selesai';
				$Dokumen3->id_pengadaan=$id;
				
				$Dokumen4= new Dokumen;
				$Dokumen4->id_dokumen=$somevariable+5;
				$Dokumen4->nama_dokumen='Form Isian Kualifikasi';
				$Dokumen4->tempat='-';
				$Dokumen4->status_upload='Belum Selesai';
				$Dokumen4->id_pengadaan=$id;
				
				$A=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "RKS"'); 
				$A1=Rks::model()->findByPk($A->id_dokumen);
				$X0= new SuratUndanganPrakualifikasi;
				$X0->id_dokumen=$Dokumen0->id_dokumen;
				
				$X1= new PaktaIntegritasPenyedia;
				$X1->id_dokumen=$Dokumen1->id_dokumen;
				
				$X2= new SuratPemberitahuanPengadaan;
				$X2->id_dokumen=$Dokumen2->id_dokumen;
				$X2->id_panitia=$Pengadaan->id_panitia;
				$X2->perihal= 'Pemberitahuan '.$Pengadaan->nama_pengadaan;
				$X2->nomor='Nomor RKS : '.$A1->nomor;
				
				$X3= new SuratPernyataanMinat;
				$X3->id_dokumen=$Dokumen3->id_dokumen;
				
				$X4= new FormIsianKualifikasi;
				$X4->id_dokumen=$Dokumen4->id_dokumen;
				
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['SuratPemberitahuanPengadaan']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$X2->attributes=$_POST['SuratPemberitahuanPengadaan'];
					$valid=$Dokumen0->validate();
					$valid=$valid&&$X2->validate();
					if($valid){
						$Dokumen1->tanggal=$Dokumen0->tanggal;
						$Dokumen2->tanggal=$Dokumen0->tanggal;
						$Dokumen3->tanggal=$Dokumen0->tanggal;
						$Dokumen4->tanggal=$Dokumen0->tanggal;
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
					'Dokumen0'=>$Dokumen0,'X2'=>$X2,
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
				$Dokumen2= Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Pemberitahuan Pengadaan"');
				$Dokumen3= Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Pernyataan Minat"');
				$Dokumen4= Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Form Isian Kualifikasi"');
		
				$X0= SuratUndanganPrakualifikasi::model()->findByPk($Dokumen0->id_dokumen);
				$X1= PaktaIntegritasPenyedia::model()->findByPk($Dokumen1->id_dokumen);
				$X2= SuratPemberitahuanPengadaan::model()->findByPk($Dokumen2->id_dokumen);
				$X3= SuratPernyataanMinat::model()->findByPk($Dokumen3->id_dokumen);
				$X4= FormIsianKualifikasi::model()->findByPk($Dokumen4->id_dokumen);
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['SuratPemberitahuanPengadaan']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$X2->attributes=$_POST['SuratPemberitahuanPengadaan'];
					$valid=$Dokumen0->validate();
					$valid=$valid&&$X2->validate();
					if($valid){
						$Dokumen1->tanggal=$Dokumen0->tanggal;
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

				$this->render('editprakualifikasi',array(
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
				$Pengadaan->status= "Pengambilan Dokumen Pengadaan";
				
				$Dokumen0= new Dokumen;
				$criteria=new CDbcriteria;
				$criteria->select='max(id_dokumen) AS maxId';
				$row = $Dokumen0->model()->find($criteria);
				$somevariable = $row['maxId'];
				$Dokumen0->id_dokumen=$somevariable+1;
				$Dokumen0->nama_dokumen='Pakta Integritas Penyedia';
				$Dokumen0->status_upload='Belum Selesai';
				$Dokumen0->tempat='-';
				$Dokumen0->id_pengadaan=$id;
				
				$Dokumen1= new Dokumen;
				$Dokumen1->id_dokumen=$somevariable+2;
				$Dokumen1->nama_dokumen='Surat Pemberitahuan Pengadaan';
				$Dokumen1->tempat='Jakarta';
				$Dokumen1->status_upload='Belum Selesai';
				$Dokumen1->id_pengadaan=$id;
				
				$Dokumen2= new Dokumen;
				$Dokumen2->id_dokumen=$somevariable+3;
				$Dokumen2->nama_dokumen='Surat Pernyataan Minat';
				$Dokumen2->tempat='-';
				$Dokumen2->status_upload='Belum Selesai';
				$Dokumen2->id_pengadaan=$id;
				
				$Dokumen3= new Dokumen;
				$Dokumen3->id_dokumen=$somevariable+4;
				$Dokumen3->nama_dokumen='Form Isian Kualifikasi';
				$Dokumen3->tempat='-';
				$Dokumen3->status_upload='Belum Selesai';
				$Dokumen3->id_pengadaan=$id;
				
				$A=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "RKS"'); 
				$A1=Rks::model()->findByPk($A->id_dokumen);
				
				$X0= new PaktaIntegritasPenyedia;
				$X0->id_dokumen=$Dokumen0->id_dokumen;
				
				$X1= new SuratPemberitahuanPengadaan;
				$X1->id_dokumen=$Dokumen1->id_dokumen;
				$X1->id_panitia=$Pengadaan->id_panitia;
				$X1->perihal= 'Pemberitahuan '.$Pengadaan->nama_pengadaan;
				$X1->nomor='Nomor RKS : '.$A1->nomor;
				
				$X2= new SuratPernyataanMinat;
				$X2->id_dokumen=$Dokumen2->id_dokumen;
				
				$X3= new FormIsianKualifikasi;
				$X3->id_dokumen=$Dokumen3->id_dokumen;
				
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['SuratPemberitahuanPengadaan']))
				{
					$Dokumen1->attributes=$_POST['Dokumen'];
					$X1->attributes=$_POST['SuratPemberitahuanPengadaan'];
					$valid=$Dokumen1->validate();
					$valid=$valid&&$X1->validate();
					if($valid){
						if($Pengadaan->save(false))
						{	
							if($Dokumen0->save(false)&&$Dokumen1->save(false)&&$Dokumen2->save(false)&&$Dokumen3->save(false)){
								if($X0->save(false)&&$X1->save(false)&&$X2->save(false)&&$X3->save(false)){
									$this->redirect(array('editpascakualifikasi','id'=>$Dokumen0->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('pascakualifikasi',array(
					'Dokumen1'=>$Dokumen1,'X1'=>$X1,
				));
			}
		}
	}
	
	public function actionEditPascakualifikasi()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				
				$Pengadaan=Pengadaan::model()->findByPk($id);
				
				$Dokumen1= Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Pakta Integritas Penyedia"');
				$Dokumen2= Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Pemberitahuan Pengadaan"');
				$Dokumen3= Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Pernyataan Minat"');
				$Dokumen4= Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Form Isian Kualifikasi"');
		
				$X1= PaktaIntegritasPenyedia::model()->findByPk($Dokumen1->id_dokumen);
				$X2= SuratPemberitahuanPengadaan::model()->findByPk($Dokumen2->id_dokumen);
				$X3= SuratPernyataanMinat::model()->findByPk($Dokumen3->id_dokumen);
				$X4= FormIsianKualifikasi::model()->findByPk($Dokumen4->id_dokumen);
				
				$Dokumen0= Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Pemberitahuan Pengadaan"');
				$X0= SuratPemberitahuanPengadaan::model()->findByPk($Dokumen0->id_dokumen);	
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['SuratPemberitahuanPengadaan']))
				{
					$Dokumen2->attributes=$_POST['Dokumen'];
					$X2->attributes=$_POST['SuratPemberitahuanPengadaan'];
					$valid=$Dokumen2->validate();
					$valid=$valid&&$X2->validate();
					if($valid){
						if($Pengadaan->save(false))
						{	
							if($Dokumen2->save(false)){
								if($X2->save(false)){
									$this->redirect(array('editpascakualifikasi','id'=>$Dokumen0->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('editpascakualifikasi',array(
					'Dokumen2'=>$Dokumen2,'X1'=>$X1,'X2'=>$X2,'X3'=>$X3,'X4'=>$X4,
				));
			}
		}
	}
	
	public function actionPengambilandokumenpengadaan()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				
				$Pengadaan=Pengadaan::model()->findByPk($id);
				$Pengadaan->status="Aanwijzing";
				
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
				
				$A=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Pemberitahuan Pengadaan"'); 
				$A1=SuratPemberitahuanPengadaan::model()->findByPk($A->id_dokumen);
				
				$SUPDP= new SuratUndanganPengambilanDokumenPengadaan;
				$SUPDP->id_dokumen=$Dokumen0->id_dokumen;
				$SUPDP->perihal= 'Undangan Pengambilan Dokumen RKS dari '.$Pengadaan->nama_pengadaan;
				$SUPDP->nomor="Nomor Surat Pemberitahuan Pengadaan : ".$A1->nomor;
				
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
									$this->redirect(array('editpengambilandokumenpengadaan','id'=>$Dokumen0->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('pengambilandokumenpengadaan',array(
					'SUPDP'=>$SUPDP,'Dokumen0'=>$Dokumen0,
				));
			}
		}
	}
	
	public function actionEditPengambilandokumenpengadaan()
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
									$this->redirect(array('editpengambilandokumenpengadaan','id'=>$Dokumen0->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('editpengambilandokumenpengadaan',array(
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
				$Pengadaan->status ='Penawaran dan Evaluasi';
				
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
				
				$Dokumen1=new Dokumen;
				$Dokumen1->id_dokumen=$somevariable+2;
				$Dokumen1->nama_dokumen='Berita Acara Aanwijzing';
				$Dokumen1->tempat='Jakarta';
				$Dokumen1->status_upload='Belum Selesai';
				$Dokumen1->id_pengadaan=$id;
				
				$Dokumen2=new Dokumen;
				$Dokumen2->id_dokumen=$somevariable+3;
				$Dokumen2->nama_dokumen='Daftar Hadir Aanwijzing';
				$Dokumen2->tempat='Jakarta';
				$Dokumen2->status_upload='Belum Selesai';
				$Dokumen2->id_pengadaan=$id;
				
				$A=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pengambilan Dokumen Pengadaan"'); 
				$A1=SuratUndanganPengambilanDokumenPengadaan::model()->findByPk($A->id_dokumen);
				
				$SUP= new SuratUndanganPenjelasan;
				$SUP->id_dokumen=$Dokumen0->id_dokumen;
				$SUP->id_panitia=$Pengadaan->id_panitia;
				$SUP->perihal= 'Undangan Aanwijzing '.$Pengadaan->nama_pengadaan;
				$SUP->nomor= 'Nomor Undangan Pengambilan Dokumen Pengadaan : '.$A1->nomor;
				
				$BAP= new BeritaAcaraPenjelasan;
				$BAP->id_dokumen=$Dokumen1->id_dokumen;
				$BAP->id_panitia=$Pengadaan->id_panitia;
				$BAP->nomor= 'Nomor Undangan Pengambilan Dokumen Pengadaan : '.$A1->nomor;
				
				$DH= new DaftarHadir;
				$DH->id_dokumen=$Dokumen2->id_dokumen;
				$DH->acara="Aanwijzing";
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['SuratUndanganPenjelasan']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SUP->attributes=$_POST['SuratUndanganPenjelasan'];
					$BAP->attributes=$_POST['BeritaAcaraPenjelasan'];
					$valid=$SUP->validate();
					$valid=$valid&&$Dokumen0->validate();
					if($valid){
						$Dokumen2->tanggal=$SUP->tanggal_undangan;						
						$Dokumen1->tanggal=$SUP->tanggal_undangan;
						$DH->jam=$SUP->waktu;
						$DH->tempat_hadir=$SUP->tempat;
						$valid=$BAP->validate()&&$DH->validate();
						if($valid){
						if($Pengadaan->save(false))
							{	
								if($Dokumen0->save(false)&&$Dokumen1->save(false)&&$Dokumen2->save(false)){
									if($SUP->save(false)&&$BAP->save(false)&&$DH->save(false)){
										$this->redirect(array('editaanwijzing','id'=>$Dokumen0->id_pengadaan));
									}
								}
							}
						}
					}
				}

				$this->render('aanwijzing',array(
					'SUP'=>$SUP,'Dokumen0'=>$Dokumen0,'BAP'=>$BAP,
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
				$Dokumen1=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Aanwijzing"');
				$Dokumen2=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Daftar Hadir Aanwijzing"');
				
				$SUP=SuratUndanganPenjelasan::model()->findByPk($Dokumen0->id_dokumen);
				$BAP=BeritaAcaraPenjelasan::model()->findByPk($Dokumen1->id_dokumen);
				$DH=DaftarHadir::model()->findByPk($Dokumen2->id_dokumen);
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['SuratUndanganPenjelasan']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SUP->attributes=$_POST['SuratUndanganPenjelasan'];
					$BAP->attributes=$_POST['BeritaAcaraPenjelasan'];
					$valid=$SUP->validate();
					$valid=$valid&&$Dokumen0->validate();
					if($valid){
						$Dokumen2->tanggal=$SUP->tanggal_undangan;						
						$Dokumen1->tanggal=$SUP->tanggal_undangan;
						$DH->jam=$SUP->waktu;
						$DH->tempat_hadir=$SUP->tempat;
						$valid=$BAP->validate()&&$DH->validate();
						if($valid){
						if($Pengadaan->save(false))
							{	
								if($Dokumen0->save(false)&&$Dokumen1->save(false)&&$Dokumen2->save(false)){
									if($SUP->save(false)&&$BAP->save(false)&&$DH->save(false)){
										$this->redirect(array('editaanwijzing','id'=>$Dokumen0->id_pengadaan));
									}
								}
							}
						}
					}
				}

				$this->render('editaanwijzing',array(
					'SUP'=>$SUP,'Dokumen0'=>$Dokumen0,'BAP'=>$BAP,'DH'=>$DH
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
	
	public function actionPenawaranevaluasisatusampul()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				$Pengadaan=Pengadaan::model()->findByPk($id);
				$Pengadaan->status ='Negosiasi dan Klarifikasi';
				
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
				
				$Dokumen1=new Dokumen;
				$Dokumen1->id_dokumen=$somevariable+2;
				$Dokumen1->nama_dokumen='Berita Acara Pembukaan Penawaran';
				$Dokumen1->tempat='Jakarta';
				$Dokumen1->status_upload='Belum Selesai';
				$Dokumen1->id_pengadaan=$id;
				
				$Dokumen2=new Dokumen;
				$Dokumen2->id_dokumen=$somevariable+3;
				$Dokumen2->nama_dokumen='Daftar Hadir Pembukaan Penawaran';
				$Dokumen2->tempat='Jakarta';
				$Dokumen2->status_upload='Belum Selesai';
				$Dokumen2->id_pengadaan=$id;
				
				$Dokumen3=new Dokumen;
				$Dokumen3->id_dokumen=$somevariable+4;
				$Dokumen3->nama_dokumen='Berita Acara Evaluasi Penawaran';
				$Dokumen3->tempat='Jakarta';
				$Dokumen3->status_upload='Belum Selesai';
				$Dokumen3->id_pengadaan=$id;
				
				$A=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "RKS"'); 
				$A1=RKS::model()->findByPk($A->id_dokumen);
				
				$SUPP= new SuratUndanganPembukaanPenawaran;
				$SUPP->id_dokumen=$Dokumen0->id_dokumen;
				$SUPP->id_panitia=$Pengadaan->id_panitia;
				$SUPP->perihal= 'Undangan Pembukaan Penawaran '.$Pengadaan->nama_pengadaan;
				
				$BAPP= new BeritaAcaraPembukaanPenawaran;
				$BAPP->id_dokumen=$Dokumen1->id_dokumen;
				$BAPP->id_panitia=$Pengadaan->id_panitia;
				
				$DH= new DaftarHadir;
				$DH->id_dokumen=$Dokumen2->id_dokumen;
				$DH->acara="Pembukaan Penawaran";
				
				$BAEP= new BeritaAcaraEvaluasiPenawaran;
				$BAEP->id_dokumen=$Dokumen3->id_dokumen;
				$BAEP->id_panitia=$Pengadaan->id_panitia;
				$BAEP->no_RKS=$A1->nomor;
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);
				
				if(isset($_POST['SuratUndanganPembukaanPenawaran']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SUPP->attributes=$_POST['SuratUndanganPembukaanPenawaran'];
					$BAPP->attributes=$_POST['BeritaAcaraPembukaanPenawaran'];
					$BAEP->attributes=$_POST['BeritaAcaraEvaluasiPenawaran'];
					$valid=$SUPP->validate();
					$valid=$valid&&$Dokumen0->validate();
					if($valid){
						$Dokumen2->tanggal=$SUPP->tanggal_undangan;						
						$Dokumen1->tanggal=$SUPP->tanggal_undangan;
						$DH->jam=$SUPP->waktu;
						$DH->tempat_hadir=$SUPP->tempat;
						$valid=$BAPP->validate()&&$DH->validate();
						if($Pengadaan->save(false))
						{	
							if($Dokumen0->save(false)&&$Dokumen1->save(false)&&$Dokumen2->save(false)&&$Dokumen3->save(false)){
								if($SUPP->save(false)&&$BAPP->save(false)&&$DH->save(false)&&$BAEP->save(false)){
									$this->redirect(array('editpenawaranevaluasisatusampul','id'=>$Dokumen0->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('penawaranevaluasisatusampul',array(
					'SUPP'=>$SUPP,'Dokumen0'=>$Dokumen0,'BAPP'=>$BAPP,'BAEP'=>$BAEP,
				));
			}
		}
	}
	
	public function actionEditPenawaranevaluasisatusampul()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				
				$Dokumen0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pembukaan Penawaran"');
				$Dokumen1=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran"');
				$Dokumen2=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Daftar Hadir Pembukaan Penawaran"');
				$Dokumen3=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Evaluasi Penawaran"');
				
				$SUPP=SuratUndanganPembukaanPenawaran::model()->findByPk($Dokumen0->id_dokumen);
				$BAPP=BeritaAcaraPembukaanPenawaran::model()->findByPk($Dokumen1->id_dokumen);
				$DH=DaftarHadir::model()->findByPk($Dokumen2->id_dokumen);
				$BAEP=BeritaAcaraEvaluasiPenawaran::model()->findByPk($Dokumen3->id_dokumen);
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['SuratUndanganPembukaanPenawaran']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SUPP->attributes=$_POST['SuratUndanganPembukaanPenawaran'];
					$BAPP->attributes=$_POST['BeritaAcaraPembukaanPenawaran'];
					$BAEP->attributes=$_POST['BeritaAcaraEvaluasiPenawaran'];
					$valid=$SUPP->validate();
					if($valid){
						$Dokumen2->tanggal=$SUPP->tanggal_undangan;						
						$Dokumen1->tanggal=$SUPP->tanggal_undangan;
						$DH->jam=$SUPP->waktu;
						$DH->tempat_hadir=$SUPP->tempat;
						$valid=$BAPP->validate()&&$DH->validate();
						if($Pengadaan->save(false))
						{	
							if($Dokumen0->save(false)&&$Dokumen1->save(false)&&$Dokumen2->save(false)&&$Dokumen3->save(false)){
								if($SUPP->save(false)&&$BAPP->save(false)&&$DH->save(false)&&$BAEP->save(false)){
									$this->redirect(array('editpenawaranevaluasisatusampul','id'=>$Dokumen0->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('editpenawaranevaluasisatusampul',array(
					'SUPP'=>$SUPP,'Dokumen0'=>$Dokumen0,'BAPP'=>$BAPP,'DH'=>$DH,'BAEP'=>$BAEP,
				));

			}
		}
	}
	
	public function actionPenawaranevaluasiduasampul()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				
				$Pengadaan=Pengadaan::model()->findByPk($id);
				$Pengadaan->status ='Negosiasi dan Klarifikasi';
				
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
				
				$Dokumen1=new Dokumen;
				$Dokumen1->id_dokumen=$somevariable+2;
				$Dokumen1->nama_dokumen='Berita Acara Pembukaan Penawaran Sampul Satu';
				$Dokumen1->tempat='Jakarta';
				$Dokumen1->status_upload='Belum Selesai';
				$Dokumen1->id_pengadaan=$id;
				
				$Dokumen2=new Dokumen;
				$Dokumen2->id_dokumen=$somevariable+3;
				$Dokumen2->nama_dokumen='Daftar Hadir Pembukaan Penawaran Sampul Satu';
				$Dokumen2->tempat='Jakarta';
				$Dokumen2->status_upload='Belum Selesai';
				$Dokumen2->id_pengadaan=$id;
				
				$Dokumen3=new Dokumen;
				$Dokumen3->id_dokumen=$somevariable+4;
				$Dokumen3->nama_dokumen='Berita Acara Evaluasi Penawaran Sampul Satu';
				$Dokumen3->tempat='Jakarta';
				$Dokumen3->status_upload='Belum Selesai';
				$Dokumen3->id_pengadaan=$id;
				
				$A=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "RKS"'); 
				$A1=RKS::model()->findByPk($A->id_dokumen);
				
				$SUPP= new SuratUndanganPembukaanPenawaran;
				$SUPP->id_dokumen=$Dokumen0->id_dokumen;
				$SUPP->id_panitia=$Pengadaan->id_panitia;
				$SUPP->perihal= 'Undangan Pembukaan Penawaran Sampul Satu '.$Pengadaan->nama_pengadaan;
				
				$BAPP= new BeritaAcaraPembukaanPenawaran;
				$BAPP->id_dokumen=$Dokumen1->id_dokumen;
				$BAPP->id_panitia=$Pengadaan->id_panitia;
				
				$DH= new DaftarHadir;
				$DH->id_dokumen=$Dokumen2->id_dokumen;
				$DH->acara="Pembukaan Penawaran";
				
				$BAEP= new BeritaAcaraEvaluasiPenawaran;
				$BAEP->id_dokumen=$Dokumen3->id_dokumen;
				$BAEP->id_panitia=$Pengadaan->id_panitia;
				$BAEP->no_RKS=$A1->nomor;
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['SuratUndanganPembukaanPenawaran']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SUPP->attributes=$_POST['SuratUndanganPembukaanPenawaran'];
					$BAPP->attributes=$_POST['BeritaAcaraPembukaanPenawaran'];
					$BAEP->attributes=$_POST['BeritaAcaraEvaluasiPenawaran'];
					$valid=$SUPP->validate();
					$valid=$valid&&$Dokumen0->validate();
					if($valid){
						$Dokumen2->tanggal=$SUPP->tanggal_undangan;						
						$Dokumen1->tanggal=$SUPP->tanggal_undangan;
						$DH->jam=$SUPP->waktu;
						$DH->tempat_hadir=$SUPP->tempat;
						$valid=$BAPP->validate()&&$DH->validate();
						if($Pengadaan->save(false))
						{	
							if($Dokumen0->save(false)&&$Dokumen1->save(false)&&$Dokumen2->save(false)&&$Dokumen3->save(false)){
								if($SUPP->save(false)&&$BAPP->save(false)&&$DH->save(false)&&$BAEP->save(false)){
									$this->redirect(array('editpenawaranevaluasiduasampul','id'=>$Dokumen0->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('penawaranevaluasiduasampul',array(
					'SUPP'=>$SUPP,'Dokumen0'=>$Dokumen0,'BAPP'=>$BAPP,'BAEP'=>$BAEP,
				));
			}
		}
	}
	
	public function actionEditPenawaranevaluasiduasampul()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				$Pengadaan = Pengadaan::model()->findByPk($id);
				
				$Dokumen0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pembukaan Penawaran Sampul Satu"');
				$Dokumen1=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran Sampul Satu"');
				$Dokumen2=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Daftar Hadir Pembukaan Penawaran Sampul Satu"');
				$Dokumen3=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Evaluasi Penawaran Sampul Satu"');
				
				$SUPP=SuratUndanganPembukaanPenawaran::model()->findByPk($Dokumen0->id_dokumen);
				$BAPP=BeritaAcaraPembukaanPenawaran::model()->findByPk($Dokumen1->id_dokumen);
				$DH=DaftarHadir::model()->findByPk($Dokumen2->id_dokumen);
				$BAEP=BeritaAcaraEvaluasiPenawaran::model()->findByPk($Dokumen3->id_dokumen);
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['SuratUndanganPembukaanPenawaran']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SUPP->attributes=$_POST['SuratUndanganPembukaanPenawaran'];
					$BAPP->attributes=$_POST['BeritaAcaraPembukaanPenawaran'];
					$BAEP->attributes=$_POST['BeritaAcaraEvaluasiPenawaran'];
					$valid=$SUPP->validate();
					$valid=$valid&&$Dokumen0->validate();
					if($valid){
						$Dokumen2->tanggal=$SUPP->tanggal_undangan;						
						$Dokumen1->tanggal=$SUPP->tanggal_undangan;
						$DH->jam=$SUPP->waktu;
						$DH->tempat_hadir=$SUPP->tempat;
						$valid=$BAPP->validate()&&$DH->validate();
						if($Pengadaan->save(false))
						{	
							if($Dokumen0->save(false)&&$Dokumen1->save(false)&&$Dokumen2->save(false)&&$Dokumen3->save(false)){
								if($SUPP->save(false)&&$BAPP->save(false)&&$DH->save(false)&&$BAEP->save(false)){
									$this->redirect(array('editpenawaranevaluasiduasampul','id'=>$Dokumen0->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('editpenawaranevaluasiduasampul',array(
					'SUPP'=>$SUPP,'Dokumen0'=>$Dokumen0,'BAPP'=>$BAPP,'BAEP'=>$BAEP,
				));

			}
		}
	}
	
	public function actionPenawaranevaluasiduatahap()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				
				$Pengadaan=Pengadaan::model()->findByPk($id);
				$Pengadaan->status ='Negosiasi dan Klarifikasi';
				
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
				
				$Dokumen1=new Dokumen;
				$Dokumen1->id_dokumen=$somevariable+2;
				$Dokumen1->nama_dokumen='Berita Acara Pembukaan Penawaran Tahap Satu';
				$Dokumen1->tempat='Jakarta';
				$Dokumen1->status_upload='Belum Selesai';
				$Dokumen1->id_pengadaan=$id;
				
				$Dokumen2=new Dokumen;
				$Dokumen2->id_dokumen=$somevariable+3;
				$Dokumen2->nama_dokumen='Daftar Hadir Pembukaan Penawaran Tahap Satu';
				$Dokumen2->tempat='Jakarta';
				$Dokumen2->status_upload='Belum Selesai';
				$Dokumen2->id_pengadaan=$id;
				
				$Dokumen3=new Dokumen;
				$Dokumen3->id_dokumen=$somevariable+4;
				$Dokumen3->nama_dokumen='Berita Acara Evaluasi Penawaran Tahap Satu';
				$Dokumen3->tempat='Jakarta';
				$Dokumen3->status_upload='Belum Selesai';
				$Dokumen3->id_pengadaan=$id;
				
				$A=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "RKS"'); 
				$A1=RKS::model()->findByPk($A->id_dokumen);
				
				$SUPP= new SuratUndanganPembukaanPenawaran;
				$SUPP->id_dokumen=$Dokumen0->id_dokumen;
				$SUPP->id_panitia=$Pengadaan->id_panitia;
				$SUPP->perihal= 'Undangan Pembukaan Penawaran Tahap Satu '.$Pengadaan->nama_pengadaan;
				
				$BAPP= new BeritaAcaraPembukaanPenawaran;
				$BAPP->id_dokumen=$Dokumen1->id_dokumen;
				$BAPP->id_panitia=$Pengadaan->id_panitia;
				
				$DH= new DaftarHadir;
				$DH->id_dokumen=$Dokumen2->id_dokumen;
				$DH->acara="Pembukaan Penawaran Tahap Satu";
				
				$BAEP= new BeritaAcaraEvaluasiPenawaran;
				$BAEP->id_dokumen=$Dokumen3->id_dokumen;
				$BAEP->id_panitia=$Pengadaan->id_panitia;
				$BAEP->no_RKS=$A1->nomor;
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['SuratUndanganPembukaanPenawaran']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SUPP->attributes=$_POST['SuratUndanganPembukaanPenawaran'];
					$BAPP->attributes=$_POST['BeritaAcaraPembukaanPenawaran'];
					$BAEP->attributes=$_POST['BeritaAcaraEvaluasiPenawaran'];
					$valid=$SUPP->validate();
					$valid=$valid&&$Dokumen0->validate();
					if($valid){
						$Dokumen2->tanggal=$SUPP->tanggal_undangan;						
						$Dokumen1->tanggal=$SUPP->tanggal_undangan;
						$DH->jam=$SUPP->waktu;
						$DH->tempat_hadir=$SUPP->tempat;
						$valid=$BAPP->validate()&&$DH->validate();
						if($Pengadaan->save(false))
						{	
							if($Dokumen0->save(false)&&$Dokumen1->save(false)&&$Dokumen2->save(false)&&$Dokumen3->save(false)){
								if($SUPP->save(false)&&$BAPP->save(false)&&$DH->save(false)&&$BAEP->save(false)){
									$this->redirect(array('editpenawaranevaluasiduatahap','id'=>$Dokumen0->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('penawaranevaluasiduatahap',array(
					'SUPP'=>$SUPP,'Dokumen0'=>$Dokumen0,'BAPP'=>$BAPP,'BAEP'=>$BAEP,
				));
			}
		}
	}
	
	public function actionEditPenawaranevaluasiduatahap()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				$Pengadaan = Pengadaan::model()->findByPk($id);
				
				$Dokumen0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pembukaan Penawaran Tahap Satu"');
				$Dokumen1=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran Tahap Satu"');
				$Dokumen2=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Daftar Hadir Pembukaan Penawaran Tahap Satu"');
				$Dokumen3=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Evaluasi Penawaran Tahap Satu"');
				
				$SUPP=SuratUndanganPembukaanPenawaran::model()->findByPk($Dokumen0->id_dokumen);
				$BAPP=BeritaAcaraPembukaanPenawaran::model()->findByPk($Dokumen1->id_dokumen);
				$DH=DaftarHadir::model()->findByPk($Dokumen2->id_dokumen);
				$BAEP=BeritaAcaraEvaluasiPenawaran::model()->findByPk($Dokumen3->id_dokumen);
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['SuratUndanganPembukaanPenawaran']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SUPP->attributes=$_POST['SuratUndanganPembukaanPenawaran'];
					$BAPP->attributes=$_POST['BeritaAcaraPembukaanPenawaran'];
					$BAEP->attributes=$_POST['BeritaAcaraEvaluasiPenawaran'];
					$valid=$SUPP->validate();
					$valid=$valid&&$Dokumen0->validate();
					if($valid){
						$Dokumen2->tanggal=$SUPP->tanggal_undangan;						
						$Dokumen1->tanggal=$SUPP->tanggal_undangan;
						$DH->jam=$SUPP->waktu;
						$DH->tempat_hadir=$SUPP->tempat;
						$valid=$BAPP->validate()&&$DH->validate();
						if($Pengadaan->save(false))
						{	
							if($Dokumen0->save(false)&&$Dokumen1->save(false)&&$Dokumen2->save(false)&&$Dokumen3->save(false)){
								if($SUPP->save(false)&&$BAPP->save(false)&&$DH->save(false)&&$BAEP->save(false)){
									$this->redirect(array('editpenawaranevaluasiduatahap','id'=>$Dokumen0->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('editpenawaranevaluasiduatahap',array(
					'SUPP'=>$SUPP,'Dokumen0'=>$Dokumen0,'BAPP'=>$BAPP,'BAEP'=>$BAEP,
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
			$Pengadaan->status="Penunjukan Panitia";
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
											$this->redirect(array('detaildokumen', 'id'=>$NDPP->id_dokumen));
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
	
	public function actionUploader()
	{
		$this->render('uploader');
	}
}