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
				$Dokumen0->nama_dokumen='Pakta Integritas Panitia 1';
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
					
					$Dokumen0->tanggal=$Dokumen1->tanggal;
	
					$valid=$Pengadaan->validate();
					$valid=$valid&&$Dokumen0->validate()&&$Dokumen1->validate();
					$valid=$valid&&$PAP1->validate()&&$RKS->validate();
							
					if($Pengadaan->save(false))
					{	
						if($Dokumen0->save(false)&&$Dokumen1->save(false)){
							if($PAP1->save(false)&&$RKS->save(false)){
								$this->redirect(array('generator','id'=>$Dokumen0->id_pengadaan));
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
				
				$Dokumen0= Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Pakta Integritas Panitia 1"');
				$Dokumen1= Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "RKS"');
				
				$RKS= Rks::model()->findByPk($Dokumen1->id_dokumen);
				
				$Pengadaanx= new Pengadaan;
				$Dokumenx= new Dokumen;		
				$RKSx= new Rks;
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['Rks']))
				{
					$Pengadaanx->attributes=$_POST['Pengadaan'];
					$Dokumenx->attributes=$_POST['Dokumen'];
					$RKSx->attributes=$_POST['Rks'];
					
					$Pengadaan->metode_penawaran=$Pengadaanx->metode_penawaran;
					$Pengadaan->jenis_kualifikasi=$Pengadaanx->jenis_kualifikasi;
					
					$Dokumen0->tanggal=$Dokumenx->tanggal;
					$Dokumen1->tanggal=$Dokumenx->tanggal;
					
					$RKS->nomor=$RKSx->nomor;
							
					if($Pengadaan->save(false))
					{	
						if($Dokumen0->save(false)&&$Dokumen1->save(false)){
							if($RKS->save(false)){
								$this->redirect(array('generator','id'=>$Dokumen0->id_pengadaan));
							}
						}
					}
				}

				$this->render('editpenunjukanpanitia',array(
					'Rksx'=>$RKSx,'Pengadaanx'=>$Pengadaanx,'Dokumenx'=>$Dokumenx,
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
				$Pengadaan->status="Pengambilan Dokumen Pengadaan";
				
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
				$Dokumen1->tempat='Jakarta';
				$Dokumen1->status_upload='Belum Selesai';
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
				$Dokumen3->tempat='Jakarta';
				$Dokumen3->status_upload='Belum Selesai';
				$Dokumen3->id_pengadaan=$id;
				
				$Dokumen4= new Dokumen;
				$Dokumen4->id_dokumen=$somevariable+4;
				$Dokumen4->nama_dokumen='Form Isian Kualifikasi';
				$Dokumen4->tempat='Jakarta';
				$Dokumen4->status_upload='Belum Selesai';
				$Dokumen4->id_pengadaan=$id;
				
				$X0= new SuratUndanganPrakualifikasi;
				$X1= new PaktaIntegritasPanitia;
				$X2= new SuratPemberitahuanPengadaan;
				$X3= new SuratPernyataanMinat;
				$X4= new FormIsianKualifikasi;
				
				$SUPDP->id_dokumen=$Dokumen0->id_dokumen;
				
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
									$this->redirect(array('generator','id'=>$Dokumen0->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('prakualifikasi',array(
					'SUPDP'=>$SUPDP,'Dokumen0'=>$Dokumen0,
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
				
				$SUPDP= new SuratUndanganPengambilanDokumenPengadaan;
				$SUPDP->id_dokumen=$Dokumen0->id_dokumen;
				
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
					$SUPDP->tanggal_pengambilan=$SUPDPx->tanggal_pengambilan;
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
				$Dokumen0->nama_dokumen='Surat Undangan Anwijzing';
				$Dokumen0->tempat='Jakarta';
				$Dokumen0->status_upload='Belum Selesai';
				$Dokumen0->id_pengadaan=$id;
				
				$Dokumen1=new Dokumen;
				$Dokumen1->id_dokumen=$somevariable+2;
				$Dokumen1->nama_dokumen='Berita Acara Anwijzing';
				$Dokumen1->tempat='Jakarta';
				$Dokumen1->status_upload='Belum Selesai';
				$Dokumen1->id_pengadaan=$id;
				
				$Dokumen2=new Dokumen;
				$Dokumen2->id_dokumen=$somevariable+3;
				$Dokumen2->nama_dokumen='Daftar Hadir Anwijzing';
				$Dokumen2->tempat='Jakarta';
				$Dokumen2->status_upload='Belum Selesai';
				$Dokumen2->id_pengadaan=$id;
				
				$SUP= new SuratUndanganPenjelasan;
				$SUP->id_dokumen=$Dokumen0->id_dokumen;
				$SUP->id_panitia=$Pengadaan->id_panitia;
				
				$BAP= new BeritaAcaraPenjelasan;
				$BAP->id_dokumen=$Dokumen0->id_dokumen;
				$BAP->id_panitia=$Pengadaan->id_panitia;
				
				$DH= new DaftarHadir;
				$DH->id_dokumen=$Dokumen0->id_dokumen;
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['SuratUndanganPenjelasan']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SUP->attributes=$_POST['SuratUndanganPenjelasan'];
					$BAP->attributes=$_POST['BeritaAcaraPenjelasan'];
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
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				$Pengadaan = Pengadaan::model()->findByPk($id);
				
				$Dokumen0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Aanwijzing"');
				$Dokumen1=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Aanwijzing"');
				$Dokumen2=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Daftar Hadir Aanwijzing"');
				
				$SUP=SuratUndanganPenjelasan::model()->findByPk($Dokumen0->id_dokumen);
				$BAP=BeritaAcaraPenjelasan::model()->findByPk($Dokumen1->id_dokumen);
				$DH=DaftarHadir::model()->findByPk($Dokumen2->id_dokumen);
				
				$Dokumenx= new Dokumen;
				
				$SUPx= new SuratUndanganPenjelasan;
				
				$BAPx= new BeritaAcaraPenjelasan;
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['SuratUndanganPenjelasan']))
				{
					$Dokumenx->attributes=$_POST['Dokumen'];
					$SUPx->attributes=$_POST['SuratUndanganPenjelasan'];
					$BAPx->attributes=$_POST['BeritaAcaraPenjelasan'];
								
					$Dokumen0->tanggal=$Dokumenx->tanggal;	
					$Dokumen1->tanggal=$SUPx->tanggal_undangan;	
					$Dokumen2->tanggal=$SUPx->tanggal_undangan;	
					
					$SUP->nomor=$SUPx->nomor;
					$SUP->sifat=$SUPx->sifat;
					$SUP->perihal=$SUPx->perihal;
					$SUP->tanggal_undangan=$SUPx->tanggal_undangan;
					$SUP->waktu=$SUPx->waktu;
					$SUP->tempat=$SUPx->tempat;
					$BAP->nomor=$BAPx->nomor;
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
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				$this->render('penawaranevaluasisatusampul');
			}
		}
	}
	
	public function actionPenawaranevaluasiduasampul()
	{	
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				$this->render('penawaranevaluasiduasampul');
			}
		}
	}
	
	public function actionPenawaranevaluasiduatahap()
	{	
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				$this->render('penawaranevaluasiduatahap');
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
				'Pengadaan'=>$Pengadaan,'NDP'=>$NDP,'NDPP'=>$NDPP,
			));
		}
	}
	
	public function actionUploader()
	{
		$this->render('uploader');
	}
}