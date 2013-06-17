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
			if (Kdivmum::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				$this->render('detailpengadaan');
			}
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
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				$this->render('generator');
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
				
				$SUPDP= new SuratUndanganPengambilanDokumenPengadaan;
				$SUPDP->id_dokumen=$Dokumen0->id_dokumen;
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['SuratUndanganPengambilanDokumenPengadaan']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SUPDP->attributes=$_POST['SuratUndanganPengambilanDokumenPengadaan'];
					$valid=$Dokumen0->validate();
					$valid=$SUPDP->validate();
					if($valid){
						if($Pengadaan->save(false))
						{	
							if($Dokumen0->save(false)){
								if($SUPDP->save(false)){
									$this->redirect(array('generator','id'=>$Dokumen0->id_pengadaan));
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
				
				$Dokumenx= new Dokumen;
				$SUPDPx= new SuratUndanganPengambilanDokumenPengadaan;
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['SuratUndanganPengambilanDokumenPengadaan']))
				{
					$Dokumenx->attributes=$_POST['Dokumen'];
					$SUPDPx->attributes=$_POST['SuratUndanganPengambilanDokumenPengadaan'];
					$Dokumen0->tanggal=$Dokumenx->tanggal;
					$SUPDP->nomor=$SUPDPx->nomor;
					$SUPDP->sifat=$SUPDPx->sifat;
					$SUPDP->perihal=$SUPDPx->perihal;
					$SUPDP->tanggal_pengambilan=$SUPDPx->tanggal_undangan;
					$SUPDP->waktu_pengambilan=$SUPDPx->waktu_pengambilan;
					$SUPDP->tempat_pengambilan=$SUPDPx->tempat_pengambilan;
					if($Pengadaan->save(false))
					{	
						if($Dokumen0->save(false)){
							if($SUPDP->save(false)){
								$this->redirect(array('generator','id'=>$Dokumen0->id_pengadaan));
							}
						}
					}
				}

				$this->render('editpengambilandokumenpengadaan',array(
					'SUPDPx'=>$SUPDPx,'Dokumenx'=>$Dokumenx,
				));
			}
		}
	}
	
	public function actionAanwijzing()
	{	
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				
				$Dokumen0= new Dokumen;
				$criteria=new CDbcriteria;
				$criteria->select='max(id_dokumen) AS maxId';
				$row = $Dokumen0->model()->find($criteria);
				$somevariable = $row['maxId'];
				$Dokumen0->id_dokumen=$somevariable+1;
				$Dokumen0->nama_dokumen='Surat Undangan Anwijzing';
				$Dokumen0->tempat='Jakarta';
				$Dokumen0->status_upload='Belum Selesai';
				
				$Dokumen1=new Dokumen;
				$Dokumen1->id_dokumen=$somevariable+2;
				$Dokumen1->nama_dokumen='Berita Acara Anwijzing';
				$Dokumen1->tempat='Jakarta';
				$Dokumen1->status_upload='Belum Selesai';
				
				$Dokumen2=new Dokumen;
				$Dokumen2->id_dokumen=$somevariable+3;
				$Dokumen2->nama_dokumen='Daftar Hadir Anwijzing';
				$Dokumen2->tempat='Jakarta';
				$Dokumen2->status_upload='Belum Selesai';
				
				$SUP= new SuratUndanganPenjelasan;
				$SUP->id_dokumen=$Dokumen0->id_dokumen;
				
				$BAP= new BeritaAcaraPenjelasan;
				$BAP->id_dokumen=$Dokumen0->id_dokumen;
				
				$DH= new DaftarHadir;
				$DH->id_dokumen=$Dokumen0->id_dokumen;
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['SuratUndanganPenjelasan']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SUP->attributes=$_POST['SuratUndanganPenjelasan'];
					$BAP->attributes=$_POST['BeritaAcaraPenjelasan'];
					$Pengadaan = Pengadaan::model()->findByPk($Dokumen0->id_pengadaan);
					$Pengadaan->status ='Penawaran dan Evaluasi';
					$Dokumen1->id_pengadaan=$Dokumen0->id_pengadaan;
					$Dokumen2->id_pengadaan=$Dokumen0->id_pengadaan;
					$SUP->nama_pengadaan=$Pengadaan->nama_pengadaan;
					$SUP->id_panitia=$Pengadaan->id_panitia;
					$BAP->id_panitia=$Pengadaan->id_panitia;
					$valid=$SUP->validate();
					if($valid){
						$Dokumen2->tanggal=$SUP->tanggal_undangan;						
						$Dokumen1->tanggal=$SUP->tanggal_undangan;
						$DH->jam=$SUP->waktu;
						$DH->tempat_hadir=$SUP->tempat;
						$DH->acara="Aanwijzing";
						$valid=$BAP->validate()&&$DH->validate();
						if($Pengadaan->save(false))
						{	
							if($Dokumen0->save(false)&&$Dokumen1->save(false)&&$Dokumen2->save(false)){
								if($SUP->save(false)&&$BAP->save(false)&&$DH->save(false)){
									$this->redirect(array('generator','id'=>$Dokumen0->id_pengadaan));
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
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				
				$Dokumenx= new Dokumen;
				
				$SUPx= new SuratUndanganPenjelasan;
				
				$BAPx= new BeritaAcaraPenjelasan;
				
				$DH= new DaftarHadir;
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['SuratUndanganPenjelasan']))
				{
					$Dokumenx->attributes=$_POST['Dokumen'];
					$SUPx->attributes=$_POST['SuratUndanganPenjelasan'];
					$BAPx->attributes=$_POST['BeritaAcaraPenjelasan'];
					$Pengadaan = Pengadaan::model()->findByPk($Dokumenx->id_pengadaan);
					$Dokumen0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Aanwijzing"');
					$Dokumen0->tanggal=$Dokumenx->tanggal;	
					$Dokumen1=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Aanwijzing"');
					$Dokumen1->tanggal=$SUPx->tanggal_undangan;	
					$Dokumen2=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Daftar Hadir Aanwijzing"');
					$Dokumen2->tanggal=$SUPx->tanggal_undangan;	
					$SUP=SuratUndanganPenjelasan::model()->findByPk($Dokumen0->id_dokumen);
					$SUP->nomor=$SUPx->nomor;
					$SUP->sifat=$SUPx->sifat;
					$SUP->perihal=$SUPx->perihal;
					$SUP->tanggal_undangan=$SUPx->tanggal_undangan;
					$SUP->waktu=$SUPx->waktu;
					$SUP->tempat=$SUPx->tempat;
					$BAP=BeritaAcaraPenjelasan::model()->findByPk($Dokumen1->id_dokumen);
					$BAP->nomor=$BAPx->nomor;
					$DH=DaftarHadir::model()->findByPk($Dokumen2->id_dokumen);
					$DH->jam=$SUPx->waktu;
					$DH->tempat_hadir=$SUPx->tempat;
					if($Pengadaan->save(false))
					{	
						if($Dokumen0->save(false)&&$Dokumen1->save(false)&&$Dokumen2->save(false)){
							if($SUP->save(false)&&$BAP->save(false)&&$DH->save(false)){
								$this->redirect(array('generator','id'=>$Dokumen0->id_pengadaan));
							}
						}
					}
				}

				$this->render('editaanwijzing',array(
					'SUPx'=>$SUPx,'Dokumenx'=>$Dokumenx,'BAPx'=>$BAPx,
				));

			}
		}
	}
	
	public function actionCheckpoint3()
	{	
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				
				$Pengadaan= new Pengadaan;
				$criteria=new CDbcriteria;
				$criteria->select='max(id_pengadaan) AS maxId';
				$row = $Pengadaan->model()->find($criteria);
				$somevariable = $row['maxId'];
				$Pengadaan->id_pengadaan=$somevariable;
				
				$Dokumen0= new Dokumen;
				$criteria=new CDbcriteria;
				$criteria->select='max(id_dokumen) AS maxId';
				$row = $Dokumen0->model()->find($criteria);
				$somevariable = $row['maxId'];
				$Dokumen0->id_dokumen=$somevariable+1;
				$Dokumen0->id_pengadaan=$Pengadaan->id_pengadaan;
				$Dokumen0->nama_dokumen='RKS';
				$Dokumen0->tempat='Jakarta';
				$Dokumen0->status_upload='Belum Selesai';
				
				$RKS= new Rks;
				$RKS->id_dokumen=$Dokumen0->id_dokumen;
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['Rks']))
				{
					$RKS->attributes=$_POST['Rks'];
					$Pengadaan->attributes=$_POST['Pengadaan'];
					$Pengadaan = Pengadaan::model()->findByPk($Dokumen0->id_pengadaan);
					$Pengadaan->status ='Pengambilan Dokumen Pengadaan';
							
					if($RKS->save(false))
					{	
						$Dokumen0->save(false);
						$Pengadaan->save(false);
						$this->redirect(array('generator','id'=>$Dokumen0->id_pengadaan));
					}
				}

				$this->render('checkpoint3',array(
					'Rks'=>$RKS,'Pengadaan'=>$Pengadaan,'Dokumen0'=>$Dokumen0,
				));
			}
		}
	}
	
	public function actionCheckpoint4()
	{	
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				$this->render('checkpoint4');
			}
		}
		
		/*if (Yii::app()->user->name == 'panitia'|| Yii::app()->user->name == 'jo') {
			$this->render('checkpoint4');
		}*/
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
	
	public function actionCheckpoint6()
	{	
		if (Yii::app()->user->name == 'panitia'|| Yii::app()->user->name == 'jo') {
			$this->render('checkpoint6');
		}
	}
	
	public function actionCheckpoint7()
	{	
		if (Yii::app()->user->name == 'panitia'|| Yii::app()->user->name == 'jo') {
			$this->render('checkpoint7');
		}
	}
	
	public function actionDetilpengadaanhistory()
	{
		$this->render('detilpengadaanhistory');
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
			
			$Dokumen0= new Dokumen;
			$criteria=new CDbcriteria;
			$criteria->select='max(id_dokumen) AS maxId';
			$row = $Dokumen0->model()->find($criteria);
			$somevariable = $row['maxId'];
			$Dokumen0->id_dokumen=$somevariable+1;
			$Dokumen0->id_pengadaan=$Pengadaan->id_pengadaan;
			$Dokumen0->nama_dokumen='Nota Dinas Permintaan';
			$Dokumen0->status_upload='Belum Selesai';
			
			$Dokumen1= new Dokumen;
			$Dokumen1->id_dokumen=$somevariable+2;
			$Dokumen1->id_pengadaan=$Pengadaan->id_pengadaan;
			$Dokumen1->nama_dokumen='Nota Dinas Perintah Pengadaan';
			$Dokumen1->tempat='Jakarta';
			$Dokumen1->status_upload='Belum Selesai';
			
			$Dokumen2= new Dokumen;
			$Dokumen2->id_dokumen=$somevariable+3;
			$Dokumen2->id_pengadaan=$Pengadaan->id_pengadaan;
			$Dokumen2->nama_dokumen='TOR';
			$Dokumen2->status_upload='Belum Selesai';
			
			$Dokumen3= new Dokumen;
			$Dokumen3->id_dokumen=$somevariable+4;
			$Dokumen3->id_pengadaan=$Pengadaan->id_pengadaan;
			$Dokumen3->nama_dokumen='RAB';
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
				$valid=$Pengadaan->validate();
				
				// $TOR->attributes=$_POST['Tor'];
				// $RAB->attributes=$_POST['Rab'];
				
				if($valid){
					$Dokumen1->tanggal=$Pengadaan->tanggal_masuk;
					$Panitia=Panitia::model()->findByPk($Pengadaan->id_panitia);
					if($Panitia->jenis_panitia=='Pejabat'){
						$NDPP->kepada='Sdr '.$Panitia->nama_panitia;
					} else {
						$NDPP->kepada='Sdr '.(User::model()->findByPk(Anggota::model()->find('id_panitia='.$Panitia->id_panitia)->username)->nama).' Ketua '.($Panitia->nama_panitia).' Pengadaan Barang / Jasa';
					}
					$valid=$valid&&$NDP->validate();
					if($valid){
						$NDPP->nota_dinas_permintaan=$NDP->nomor;
						$valid=$valid&&$NDPP->validate();
						if($valid){
							if($Pengadaan->save(false)) {
								if($Dokumen0->save(false)&&$Dokumen1->save(false)&&$Dokumen2->save(false)&&$Dokumen3->save(false)){
									if($NDP->save(false)&&$NDPP->save(false)/*&&$TOR->save(false)&&$RAB->save(false)*/){
										$this->redirect(array('docx/download', 'id'=>$NDPP->id_dokumen));
									}
								}
							}
						}
					}
				}
			}

			$this->render('tambahpengadaan',array(
				'Pengadaan'=>$Pengadaan,'NDP'=>$NDP,'NDPP'=>$NDPP,
			));
		}
	}
	
	public function actionUploader()
	{
		$this->render('uploader');
	}
}