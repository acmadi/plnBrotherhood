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
	}

	public $defaultAction = 'dashboard';

	public function actionDashboard()
	{
		// renders the view file 'protected/views/site/dashboard.php'
		// using the default layout 'protected/views/layouts/main.php'
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Yii::app()->user->getState('asAdmin')) {
				$this->redirect(array('admin/dashboard'));
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
	}
	
	public function actionPermintaan()
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
			$this->render('permintaan',array(
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
		else if (Yii::app()->user->getState('role') == 'kdivmum'||Yii::app()->user->getState('role') == 'divisi') {
			$id= Yii::app()->getRequest()->getQuery('id');
			$Pengadaan=Pengadaan::model()->findByPk($id);
			$model=new Dokumen('search');
			$model->unsetAttributes();  // clear any default values
			if(isset($_GET['Dokumen'])){
				$model->attributes=$_GET['Dokumen'];
			}
			if(isset($_POST['Pengadaan'])){
				$Pengadaan->status ='99';
				if($Pengadaan->save(false)){
					$this->redirect(array('detailpengadaan','id'=>$id));
				}
			}
			$this->render('detailpengadaan', array(
				'model'=>$model,
			));
		} else {
			$this->redirect(array('terlarang'));
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
				
				// $criteria=new CDbcriteria;
				// $criteria->select='max(id_link) AS maxId';
				// $row = $newLinkDokumen->model()->find($criteria);
				// $id_link = $row['maxId'] + 1;
								
				$path = $_SERVER["DOCUMENT_ROOT"] . Yii::app()->request->baseUrl . '/uploads/' . $tempDokumen->id_pengadaan . '/' . $tempDokumen->id_dokumen . '/';
				@mkdir($path,0700,true);
				$namaFile = $newLinkDokumen->nomor_link;
				
				if ($tempDokumen->validate()) {
					if($tempDokumen->save(false)){
						$newLinkDokumen->id_link=LinkDokumen::model()->count() + 1;
						$newLinkDokumen->id_dokumen=$tempDokumen->id_dokumen;
						$newLinkDokumen->waktu_upload=$waktu_upload;
						$newLinkDokumen->tanggal_upload=date('Y-m-d');
						$newLinkDokumen->pengunggah=$user;
						$newLinkDokumen->nomor_link=LinkDokumen::model()->count('id_dokumen="' . $tempDokumen->id_dokumen . '"') + 1;
						$newLinkDokumen->nama_file=$pathinfo['filename'];
						$newLinkDokumen->format_dokumen=$pathinfo['extension'];
						$newLinkDokumen->save();

						$tempDokumen->uploadedFile->saveAs($path . $namaFile . '.' . $pathinfo['extension']);
					}
				}
			}
			$this->render('detaildokumen');
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
		if (!Yii::app()->user->isGuest) {
			$this->redirect(array('site/dashboard'));
		}
		else {
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
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	public function actionTambahpengadaan1()
	{	
		$user = Yii::app()->user->name;
		if (Yii::app()->user->getState('role') == 'kdivmum'||Yii::app()->user->getState('role') == 'divisi') {
			
			$Pengadaan=new Pengadaan;
			$Pengadaan->status="-1";
			$criteria=new CDbCriteria;
			$criteria->select='max(id_pengadaan) AS maxId';
			$row = $Pengadaan->model()->find($criteria);
			$somevariable = $row['maxId'];
			$Pengadaan->id_pengadaan=$somevariable+1;
			$Pengadaan->nama_penyedia='-';
			$Pengadaan->tanggal_selesai='-';
			$Pengadaan->id_panitia=-1;
			$Pengadaan->metode_pengadaan='-';
			$Pengadaan->biaya=0;
			$Pengadaan->metode_penawaran='-';
			$Pengadaan->jenis_kualifikasi='-';
			if(Yii::app()->user->getState('role') == 'divisi') {
				$Pengadaan->divisi_peminta=UserDivisi::model()->findByPk(Yii::app()->user->name)->divisi;
			}
			date_default_timezone_set("Asia/Jakarta");
			$Pengadaan->tanggal_masuk=date('d-m-Y');
			
			$Dokumen0= new Dokumen;
			$criteria=new CDbcriteria;
			$criteria->select='max(id_dokumen) AS maxId';
			$row = $Dokumen0->model()->find($criteria);
			$somevariable = $row['maxId'];
			$Dokumen0->id_dokumen=$somevariable+2;
			$Dokumen0->id_pengadaan=$Pengadaan->id_pengadaan;
			$Dokumen0->nama_dokumen='Nota Dinas Permintaan';
			$Dokumen0->tempat='Jakarta';
			$Dokumen0->status_upload='Belum Selesai';
			
			$Dokumen1= new Dokumen;
			$Dokumen1->id_dokumen=$somevariable+3;
			$Dokumen1->id_pengadaan=$Pengadaan->id_pengadaan;
			$Dokumen1->nama_dokumen='TOR';
			$Dokumen1->tempat='Jakarta';
			$Dokumen1->status_upload='Belum Selesai';
			
			$Dokumen2= new Dokumen;
			$Dokumen2->id_dokumen=$somevariable+4;
			$Dokumen2->id_pengadaan=$Pengadaan->id_pengadaan;
			$Dokumen2->nama_dokumen='RAB';
			$Dokumen2->tempat='Jakarta';
			$Dokumen2->status_upload='Belum Selesai';
			
			$DokumenL= new Dokumen;
			$DokumenL->id_dokumen=$somevariable+1;
			$DokumenL->id_pengadaan=$Pengadaan->id_pengadaan;
			$DokumenL->nama_dokumen='Dokumen Lain-lain';
			$DokumenL->tempat='Jakarta';
			$DokumenL->status_upload='Belum Selesai';
			
			$NDP= new NotaDinasPermintaan;
			$NDP->id_dokumen=$Dokumen0->id_dokumen;
			
			$TOR= new Tor;
			$TOR->id_dokumen=$Dokumen1->id_dokumen;
			
			$RAB= new Rab;
			$RAB->id_dokumen=$Dokumen2->id_dokumen;
				
			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);
			if(isset($_POST['Pengadaan']))
			{
				$Pengadaan->attributes=$_POST['Pengadaan'];
				$NDP->attributes=$_POST['NotaDinasPermintaan'];
				$Dokumen0->attributes=$_POST['Dokumen'];
				$Pengadaan->tanggal_masuk=date('Y-m-d',strtotime($Pengadaan->tanggal_masuk));
				$valid=$Pengadaan->validate()&&$Dokumen0->validate();
				if($valid){
					$NDP->perihal = $Pengadaan->nama_pengadaan;
					$Dokumen1->tanggal=$Dokumen0->tanggal;
					$Dokumen2->tanggal=$Dokumen0->tanggal;
					$valid=$valid&&$NDP->validate();
					if($valid){
						if($Pengadaan->save(false)) {
							if($Dokumen0->save(false)&&$Dokumen1->save(false)&&$Dokumen2->save(false)&&$DokumenL->save(false)){
								if($NDP->save(false)&&$TOR->save(false)&&$RAB->save(false)){
									$this->redirect(array('tambahpengadaan2','id'=>$Pengadaan->id_pengadaan));
								}
							}
						}
					}
				}
			}

			$this->render('tambahpengadaan1',array(
				'Pengadaan'=>$Pengadaan,'NDP'=>$NDP,'Dokumen0'=>$Dokumen0,'Dokumen1'=>$Dokumen1,'Dokumen2'=>$Dokumen2,
			));
		} else {
			$this->redirect(array('terlarang'));
		}
	}
	
	public function actionEditTambahPengadaan1()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		$user = Yii::app()->user->name;
		if (Yii::app()->user->getState('role') == 'kdivmum'||Yii::app()->user->getState('role') == 'divisi') {
			
			$Pengadaan= Pengadaan::model()->findByPk($id);
			
			$Dokumen0 = Dokumen::model()->find('id_pengadaan = '. $id. ' and nama_dokumen = "Nota Dinas Permintaan"');
			$Dokumen1 = Dokumen::model()->find('id_pengadaan = '. $id. ' and nama_dokumen = "TOR"');
			$Dokumen2 = Dokumen::model()->find('id_pengadaan = '. $id. ' and nama_dokumen = "RAB"');
			
			$NDP = NotaDinasPermintaan::model()->findByPk($Dokumen0->id_dokumen);
			
			$Pengadaan->tanggal_masuk=Tanggal::getTanggalStrip($Pengadaan->tanggal_masuk);
			$Dokumen0->tanggal=Tanggal::getTanggalStrip($Dokumen0->tanggal);
			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);
			if(isset($_POST['Pengadaan']))
			{
				$Pengadaan->attributes=$_POST['Pengadaan'];
				$NDP->attributes=$_POST['NotaDinasPermintaan'];
				$Dokumen0->attributes=$_POST['Dokumen'];
				$Pengadaan->tanggal_masuk=date('Y-m-d',strtotime($Pengadaan->tanggal_masuk));
				$valid=$Pengadaan->validate()&&$Dokumen0->validate();
				if($valid){
					$NDP->perihal = $Pengadaan->nama_pengadaan;
					$Dokumen1->tanggal=$Dokumen0->tanggal;
					$Dokumen2->tanggal=$Dokumen0->tanggal;
					$valid=$valid&&$NDP->validate();
					if($valid){
						if($Pengadaan->save(false)) {
							if($Dokumen0->save(false)&&$Dokumen1->save(false)&&$Dokumen2->save(false)){
								if($NDP->save(false)){
									//Mail::send(Kdivmum::model()->findByAttributes(array('jabatan'=>'KDIVMUM', 'status_user'=>'Aktif'))->email, 'Permintaan Pengadaan', 'Permintaan ' . $Pengadaan->nama_pengadaan);
									$this->redirect(array('tambahpengadaan2','id'=>$Pengadaan->id_pengadaan));
								}
							}
						}
					}
				}
			}

			$this->render('tambahpengadaan1',array(
				'Pengadaan'=>$Pengadaan,'NDP'=>$NDP,'Dokumen0'=>$Dokumen0,
			));
		} else {
			$this->redirect(array('terlarang'));
		}
	}
	
	public function actionTambahpengadaan2()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		$user = Yii::app()->user->name;
		if (Yii::app()->user->getState('role') == 'kdivmum'||Yii::app()->user->getState('role') == 'divisi') {
						
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
				
				// $criteria=new CDbcriteria;
				// $criteria->select='max(id_link) AS maxId';
				// $row = $newLinkDokumen->model()->find($criteria);
				// $id_link = $row['maxId'] + 1;
				
				$newLinkDokumen->id_link=LinkDokumen::model()->count() + 1;
				$newLinkDokumen->id_dokumen=$newDokumen->id_dokumen;
				$newLinkDokumen->waktu_upload=$waktu_upload;
				$newLinkDokumen->tanggal_upload=date('Y-m-d');
				$newLinkDokumen->pengunggah=$user;
				$newLinkDokumen->nomor_link=LinkDokumen::model()->count('id_dokumen="' . $newDokumen->id_dokumen . '"') + 1;
				$newLinkDokumen->nama_file=$pathinfo['filename'];
				$newLinkDokumen->format_dokumen=$pathinfo['extension'];
				$newLinkDokumen->save();
								
				$path = $_SERVER["DOCUMENT_ROOT"] . Yii::app()->request->baseUrl . '/uploads/' . $newDokumen->id_pengadaan . '/' . $newDokumen->id_dokumen . '/';
				@mkdir($path,0700,true);
				$namaFile = $newLinkDokumen->nomor_link;
				
				if($newDokumen->save(false)){
					$newDokumen->uploadedFile->saveAs($path . $namaFile . '.' . $pathinfo['extension']);
					}
			}
			$modelDok = array (
				Dokumen::model()->find('id_pengadaan = '. $id . ' and nama_dokumen = "Nota Dinas Permintaan"'),
				Dokumen::model()->find('id_pengadaan = '. $id . ' and nama_dokumen = "TOR"'),
				Dokumen::model()->find('id_pengadaan = '. $id . ' and nama_dokumen = "RAB"'),
			);

			$this->render('tambahpengadaan2',array('modelDok'=>$modelDok));
		} else {
			$this->redirect(array('terlarang'));
		}
	}
	
	public function actionNotadinaspermintaantorrab()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		$user = Yii::app()->user->name;
		if (Yii::app()->user->getState('role') == 'kdivmum') {
			
			$Pengadaan = Pengadaan::model()->findByPk($id);
			
			$Dokumen0= new Dokumen;
			$criteria=new CDbcriteria;
			$criteria->select='max(id_dokumen) AS maxId';
			$row = $Dokumen0->model()->find($criteria);
			$somevariable = $row['maxId'];
			$Dokumen0->id_dokumen=$somevariable+1;
			$Dokumen0->nama_dokumen='Nota Dinas Permintaan TOR/RAB';
			$Dokumen0->tempat='Jakarta';
			$Dokumen0->status_upload='Belum Selesai';
			$Dokumen0->id_pengadaan=$id;
			date_default_timezone_set("Asia/Jakarta");
			$Dokumen0->tanggal=date('d-m-Y');
			
			$NDPTR= new NotaDinasPermintaanTorRab;
			$NDPTR->id_dokumen=$Dokumen0->id_dokumen;
			
			//Uncomment the following line if AJAX validation is needed
			//$this->performAjaxValidation($model);

			if(isset($_POST['NotaDinasPermintaanTorRab']))
			{
				$Dokumen0->attributes=$_POST['Dokumen'];
				$NDPTR->attributes=$_POST['NotaDinasPermintaanTorRab'];
				$valid=$NDPTR->validate();
				$valid=$valid&&$Dokumen0->validate();
				if($valid){
					if($Dokumen0->save(false)){
						if($NDPTR->save(false)){
							$this->redirect(array('editnotadinaspermintaantorrab', 'id'=>$id));											
						}
					}
				}
			}

			$this->render('notadinaspermintaantorrab',array(
				'NDPTR'=>$NDPTR,'Dokumen0'=>$Dokumen0,
			));

		} else {
			$this->redirect(array('terlarang'));
		}
	}
	
	public function actionEditNotadinaspermintaantorrab()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		$user = Yii::app()->user->name;
		if (Yii::app()->user->getState('role') == 'kdivmum') {
			
			$Dokumen0 = Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "Nota Dinas Permintaan TOR/RAB"');
			$Dokumen0->tanggal=Tanggal::getTanggalStrip($Dokumen0->tanggal);
			$NDPTR = NotaDinasPermintaanTorRab::model()->findByPk($Dokumen0->id_dokumen);
			
			//Uncomment the following line if AJAX validation is needed
			//$this->performAjaxValidation($model);

			if(isset($_POST['NotaDinasPermintaanTorRab']))
			{
				$Dokumen0->attributes=$_POST['Dokumen'];
				$NDPTR->attributes=$_POST['NotaDinasPermintaanTorRab'];
				$valid=$NDPTR->validate();
				$valid=$valid&&$Dokumen0->validate();
				if($valid){
					if($Dokumen0->save(false)){
						if($NDPTR->save(false)){
							$this->redirect(array('editnotadinaspermintaantorrab', 'id'=>$id));											
						}
					}
				}
			}

			$this->render('notadinaspermintaantorrab',array(
				'NDPTR'=>$NDPTR,'Dokumen0'=>$Dokumen0,
			));

		} else {
			$this->redirect(array('terlarang'));
		}
	}
	
	public function actionTunjukPanitia()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		$user = Yii::app()->user->name;
		if (Yii::app()->user->getState('role') == 'kdivmum') {
			
			$Pengadaan = Pengadaan::model()->findByPk($id);
			$Pengadaan->status='0';
			
			$DokNDP= Dokumen::model()->find('id_pengadaan = ' .$id. ' and nama_dokumen = "Nota Dinas Permintaan"');
			$NDP= NotaDinasPermintaan::model()->findByPk($DokNDP->id_dokumen);
			
			$Dokumen0= new Dokumen;
			$criteria=new CDbcriteria;
			$criteria->select='max(id_dokumen) AS maxId';
			$row = $Dokumen0->model()->find($criteria);
			$somevariable = $row['maxId'];
			$Dokumen0->id_dokumen=$somevariable+1;
			$Dokumen0->id_pengadaan=$Pengadaan->id_pengadaan;
			$Dokumen0->nama_dokumen='Nota Dinas Perintah Pengadaan';
			$Dokumen0->tempat='Jakarta';
			$Dokumen0->status_upload='Belum Selesai';
			date_default_timezone_set("Asia/Jakarta");
			$Dokumen0->tanggal=date('d-m-Y');
			
			$NDPP= new NotaDinasPerintahPengadaan;
			$NDPP->id_dokumen=$Dokumen0->id_dokumen;
			$NDPP->pagu_anggaran = $NDP->nilai_biaya_rab;
			if($NDP->nilai_biaya_rab>500000000) {
				$NDPP->perihal='Penunjukan Panitia '.$Pengadaan->nama_pengadaan;
			} else {
				$NDPP->perihal='Penunjukan Pejabat '.$Pengadaan->nama_pengadaan;
			}
			
			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);
			if(isset($_POST['NotaDinasPerintahPengadaan']))
			{
				$Pengadaan->attributes=$_POST['Pengadaan'];
				$NDPP->attributes=$_POST['NotaDinasPerintahPengadaan'];
				$Dokumen0->attributes=$_POST['Dokumen'];
				$valid=$Pengadaan->validate()&&$Dokumen0->validate();
				if($valid){
					$Panitia=Panitia::model()->findByPk($Pengadaan->id_panitia);
					if($Panitia->jenis_panitia=="Panitia") {
						$NDPP->kepada=(Anggota::model()->find('id_panitia='.$Panitia->id_panitia. ' and jabatan = "Ketua"')->nama);
					} else {
						$NDPP->kepada=$Panitia->nama_panitia;
					}
					$valid=$valid&&$NDPP->validate();
					if($valid){
						if($Pengadaan->save(false)) {
							if($Dokumen0->save(false)){
								if($NDPP->save(false)){		
									$this->redirect(array('edittunjukpanitia','id'=>$id));
								}
							}
						}
					}
				}
			}

			$this->render('tunjukpanitia',array(
				'Pengadaan'=>$Pengadaan,'NDPP'=>$NDPP,'Dokumen0'=>$Dokumen0,'NDP'=>$NDP,
			));
		} else {
			$this->redirect(array('terlarang'));
		}
	}
	
	public function actionEditTunjukPanitia()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		$user = Yii::app()->user->name;
		if (Yii::app()->user->getState('role') == 'kdivmum') {
			
			$Pengadaan = Pengadaan::model()->findByPk($id);
			
			$Dokumen0= Dokumen::model()->find('id_pengadaan = ' .$id. ' and nama_dokumen = "Nota Dinas Perintah Pengadaan"');
			$NDPP= NotaDinasPerintahPengadaan::model()->findByPk($Dokumen0->id_dokumen);
			$Dokumen0->tanggal=Tanggal::getTanggalStrip($Dokumen0->tanggal);

			$DokNDP= Dokumen::model()->find('id_pengadaan = ' .$id. ' and nama_dokumen = "Nota Dinas Permintaan"');
			$NDP= NotaDinasPermintaan::model()->findByPk($DokNDP->id_dokumen);
			
			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);
			if(isset($_POST['NotaDinasPerintahPengadaan']))
			{
				$Pengadaan->attributes=$_POST['Pengadaan'];
				$NDPP->attributes=$_POST['NotaDinasPerintahPengadaan'];
				$Dokumen0->attributes=$_POST['Dokumen'];
				$valid=$Pengadaan->validate()&&$Dokumen0->validate();
				if($valid){
					$Panitia=Panitia::model()->findByPk($Pengadaan->id_panitia);
					$NDPP->kepada=(Anggota::model()->find('id_panitia='.$Panitia->id_panitia. ' and jabatan = "Ketua"')->nama);
					$valid=$valid&&$NDPP->validate();
					if($valid){
						if($Pengadaan->save(false)) {
							if($Dokumen0->save(false)){
								if($NDPP->save(false)){		
									$this->redirect(array('edittunjukpanitia','id'=>$id));
								}
							}
						}
					}
				}
			}

			$this->render('tunjukpanitia',array(
				'Pengadaan'=>$Pengadaan,'NDPP'=>$NDPP,'Dokumen0'=>$Dokumen0,'NDP'=>$NDP,
			));
		} else {
			$this->redirect(array('terlarang'));
		}
	}

	public function actionAkun()
	{
		if (Yii::app()->user->getState('role') == 'divisi') {
			$divisi = Divisi::model()->findByAttributes(array('username'=>Yii::app()->user->name));
			if (isset($_POST['Divisi'])) {
				$divisi->attributes = $_POST['Divisi'];
				if ($divisi->validate()) {
					if ($divisi->save(false)) {
						Yii::app()->user->setFlash('sukses','Data Telah Disimpan');
					}
				}
			}
			$this->render('akun', array(
				'divisi'=>$divisi,
			));
		}
	}
	
	public function actionTerlarang(){
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {				
			$this->render('terlarang');		
		}
	}
		
		
}