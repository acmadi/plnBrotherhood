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
				
				// $criteria=new CDbcriteria;
				// $criteria->select='max(id_link) AS maxId';
				// $row = $newLinkDokumen->model()->find($criteria);
				// $id_link = $row['maxId'] + 1;
				
				$newLinkDokumen->id_link=LinkDokumen::model()->count() + 1;
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
		$category = Yii::app()->getRequest()->getQuery('category');
		$chart = Yii::app()->getRequest()->getQuery('chart');
		$chartData = array();
		$chartTitle;
		$chartSubtitle;
		switch ($category) {
			case '1' : {
				switch ($chart) {
					case '1' : {
						$div = Yii::app()->db->createCommand('select username from divisi')->queryAll();
						while(list($k1, $v1)=each($div)) {
							$x = array();
							$peng = Yii::app()->db->createCommand('select id_pengadaan from pengadaan where divisi_peminta = "' . $v1['username'] . '" and status != "-1" and status != "100" and status != "99"')->queryAll();
							array_push($x, $v1['username']);
							array_push($x, count($peng));
							array_push($chartData, $x);
						}
						$chartTitle = 'Pengadaan yang sedang berlangsung';
						$chartSubtitle = 'per divisi';
						break;
					}
					case '2' : {
						$div = Yii::app()->db->createCommand('select username from divisi')->queryAll();
						while(list($k1, $v1)=each($div)) {
							$x = array();
							$peng = Yii::app()->db->createCommand('select id_pengadaan from pengadaan where divisi_peminta = "' . $v1['username'] . '" and status = "100"')->queryAll();
							array_push($x, $v1['username']);
							array_push($x, count($peng));
							array_push($chartData, $x);
						}
						$chartTitle = 'Pengadaan yang telah selesai';
						$chartSubtitle = 'per divisi';
						break;
					}
					case '3' : {
						$div = Yii::app()->db->createCommand('select username from divisi')->queryAll();
						while(list($k1, $v1)=each($div)) {
							$x = array();
							$peng = Yii::app()->db->createCommand('select id_pengadaan from pengadaan where divisi_peminta = "' . $v1['username'] . '" and status = "99"')->queryAll();
							array_push($x, $v1['username']);
							array_push($x, count($peng));
							array_push($chartData, $x);
						}
						$chartTitle = 'Pengadaan yang gagal';
						$chartSubtitle = 'per divisi';
						break;
					}
					case '4' : {
						$div = Yii::app()->db->createCommand('select username from divisi')->queryAll();
						while(list($k1, $v1)=each($div)) {
							$x = array();
							$peng = Yii::app()->db->createCommand('select id_pengadaan from pengadaan where divisi_peminta = "' . $v1['username'] . '" and status != "-1"')->queryAll();
							array_push($x, $v1['username']);
							array_push($x, count($peng));
							array_push($chartData, $x);
						}
						$chartTitle = 'Pengadaan total';
						$chartSubtitle = 'per divisi';
						break;
					}
				}
				break;
			}
			case '2' : {
				switch ($chart) {
					case '1' : {
						$div = Yii::app()->db->createCommand('select id_panitia from panitia where id_panitia != "-1" and status_panitia = "Aktif"')->queryAll();
						while(list($k1, $v1)=each($div)) {
							$x = array();
							$peng = Yii::app()->db->createCommand('select id_pengadaan from pengadaan where id_panitia = "' . $v1['id_panitia'] . '" and status != "-1" and status != "100" and status != "99"')->queryAll();
							array_push($x, Panitia::model()->findByPk($v1['id_panitia'])->nama_panitia);
							array_push($x, count($peng));
							array_push($chartData, $x);
						}
						$chartTitle = 'Pengadaan yang sedang berlangsung';
						$chartSubtitle = 'per PIC';
						break;
					}
					case '2' : {
						$div = Yii::app()->db->createCommand('select id_panitia from panitia where id_panitia != "-1" and status_panitia = "Aktif"')->queryAll();
						while(list($k1, $v1)=each($div)) {
							$x = array();
							$peng = Yii::app()->db->createCommand('select id_pengadaan from pengadaan where id_panitia = "' . $v1['id_panitia'] . '" and status = "100"')->queryAll();
							array_push($x, Panitia::model()->findByPk($v1['id_panitia'])->nama_panitia);
							array_push($x, count($peng));
							array_push($chartData, $x);
						}
						$chartTitle = 'Pengadaan yang telah selesai';
						$chartSubtitle = 'per PIC';
						break;
					}
					case '3' : {
						$div = Yii::app()->db->createCommand('select id_panitia from panitia where id_panitia != "-1" and status_panitia = "Aktif"')->queryAll();
						while(list($k1, $v1)=each($div)) {
							$x = array();
							$peng = Yii::app()->db->createCommand('select id_pengadaan from pengadaan where id_panitia = "' . $v1['id_panitia'] . '" and status = "99"')->queryAll();
							array_push($x, Panitia::model()->findByPk($v1['id_panitia'])->nama_panitia);
							array_push($x, count($peng));
							array_push($chartData, $x);
						}
						$chartTitle = 'Pengadaan yang gagal';
						$chartSubtitle = 'per PIC';
						break;
					}
					case '4' : {
						$div = Yii::app()->db->createCommand('select id_panitia from panitia where id_panitia != "-1" and status_panitia = "Aktif"')->queryAll();
						while(list($k1, $v1)=each($div)) {
							$x = array();
							$peng = Yii::app()->db->createCommand('select id_pengadaan from pengadaan where id_panitia = "' . $v1['id_panitia'] . '" and status != "-1"')->queryAll();
							array_push($x, Panitia::model()->findByPk($v1['id_panitia'])->nama_panitia);
							array_push($x, count($peng));
							array_push($chartData, $x);
						}
						$chartTitle = 'Pengadaan total';
						$chartSubtitle = 'per PIC';
						break;
					}
				}
				break;
			}
		}

		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Kdivmum::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				$this->render('statistik', array(
					'chartData'=>$chartData,
					'chartTitle'=>$chartTitle,
					'chartSubtitle'=>$chartSubtitle,
				));
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
				if(Pengadaan::model()->findByPk($id)->status=="0"){
					$this->redirect(array('site/penentuanmetode','id'=>$id));
				}
				// if(Pengadaan::model()->findByPk($id)->status=="1"){
				// }
				// if(Pengadaan::model()->findByPk($id)->status=="2"){
				// }
				// if(Pengadaan::model()->findByPk($id)->status=="3"){
		
				// }
				if(Pengadaan::model()->findByPk($id)->status=="4"){
					$this->redirect(array('site/rks','id'=>$id));
				}
				if(Pengadaan::model()->findByPk($id)->status=="5"){
					$this->redirect(array('site/hps','id'=>$id));
				}
				if(Pengadaan::model()->findByPk($id)->status=="6"){
					$this->redirect(array('site/pengumumanpengadaan','id'=>$id));
				}
				if(Pengadaan::model()->findByPk($id)->status=="7"){
					$this->redirect(array('site/permintaanpenawaranharga','id'=>$id));
				}
				if(Pengadaan::model()->findByPk($id)->status=="8"){
					$this->redirect(array('site/beritaacaraaanwijzing','id'=>$id));
				}
				if(Pengadaan::model()->findByPk($id)->status=="9"){
					$this->redirect(array('site/beritaacarapembukaanpenawaran','id'=>$id));
				}
				if(Pengadaan::model()->findByPk($id)->status=="10"){
					$this->redirect(array('site/beritaacaraevaluasipenawaran','id'=>$id));
				}
				if(Pengadaan::model()->findByPk($id)->status=="11"){
					$this->redirect(array('site/beritaacarapembukaanpenawaran2','id'=>$id));
				}
				if(Pengadaan::model()->findByPk($id)->status=="12"){
					$this->redirect(array('site/beritaacaraevaluasipenawaran2','id'=>$id));
				}
				if(Pengadaan::model()->findByPk($id)->status=="13"){
					$this->redirect(array('site/beritaacaranegosiasiklarifikasi','id'=>$id));
				}
				if(Pengadaan::model()->findByPk($id)->status=="14"){
					$this->redirect(array('site/notadinasusulanpemenang','id'=>$id));
				}
				if(Pengadaan::model()->findByPk($id)->status=="15"){
					$this->redirect(array('site/notadinaspenetapanpemenang','id'=>$id));
				}
				if(Pengadaan::model()->findByPk($id)->status=="16"){
					$this->redirect(array('site/notadinaspemberitahuanpemenang','id'=>$id));
				}
				if(Pengadaan::model()->findByPk($id)->status=="17"){
					$this->redirect(array('site/suratpengumumanpelelangan','id'=>$id));
				}
				if(Pengadaan::model()->findByPk($id)->status=="18"){
					$this->redirect(array('site/suratpenunjukanpemenang','id'=>$id));
				}
				else{
					$this->redirect(array('site/checkpoint2','id'=>$id));
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
	
	public function actionPenentuanMetode(){
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				$Pengadaan=Pengadaan::model()->findByPk($id);
				
				if(isset($_POST['Pengadaan']))
				{
					$Pengadaan->attributes=$_POST['Pengadaan'];
					if($Pengadaan->jenis_kualifikasi=="Pra Kualifikasi") {
						$Pengadaan->status='1';
					} else { 
						$Pengadaan->status='4';
					}
					$valid=$Pengadaan->validate();
					if($valid){		
						if($Pengadaan->save(false))
						{	
							$this->redirect(array('editpenentuanmetode','id'=>$Pengadaan->id_pengadaan));
						}
					}
				}

				$this->render('penentuanmetode',array(
					'Pengadaan'=>$Pengadaan,
				));
			}
		}
	}
	
	public function actionEditPenentuanMetode(){
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				$Pengadaan=Pengadaan::model()->findByPk($id);
				
				if(isset($_POST['Pengadaan']))
				{
					$Pengadaan->attributes=$_POST['Pengadaan'];
					$valid=$Pengadaan->validate();
					if($valid){		
						if($Pengadaan->save(false))
						{	
							$this->redirect(array('editpenentuanmetode','id'=>$Pengadaan->id_pengadaan));
						}
					}
				}

				$this->render('penentuanmetode',array(
					'Pengadaan'=>$Pengadaan,
				));
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
				$Pengadaan->status ='5';
				
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
				date_default_timezone_set("Asia/Jakarta");
				$Dokumen1->tanggal=date('d-m-Y');
				
				$PAP1= new PaktaIntegritasPanitia1;
				$PAP1->id_dokumen=$Dokumen0->id_dokumen;
				
				$RKS= new Rks;
				$RKS->id_dokumen=$Dokumen1->id_dokumen;
				
				if ($Pengadaan->metode_penawaran=="Satu Sampul"){
					$RKS->tanggal_awal_pemasukan_penawaran2='00-00-0000';
					$RKS->tanggal_akhir_pemasukan_penawaran2='00-00-0000';
					$RKS->waktu_pemasukan_penawaran2='00:00';
					$RKS->tempat_pemasukan_penawaran2='-';
					$RKS->tanggal_pembukaan_penawaran2='00-00-0000';
					$RKS->waktu_pembukaan_penawaran2='00:00';
					$RKS->tempat_pembukaan_penawaran2='-';
					$RKS->tanggal_evaluasi_penawaran2='00-00-0000';
					$RKS->waktu_evaluasi_penawaran2='00:00';
					$RKS->tempat_evaluasi_penawaran2='-';
				} else if ($Pengadaan->metode_penawaran=="Dua Sampul"){
					$RKS->tanggal_awal_pemasukan_penawaran2='00-00-0000';
					$RKS->tanggal_akhir_pemasukan_penawaran2='00-00-0000';
					$RKS->waktu_pemasukan_penawaran2='00:00';
					$RKS->tempat_pemasukan_penawaran2='-';
				}
				
				if($Pengadaan->jenis_kualifikasi=="Pasca Kualifikasi") {
					$DokumenX1= new Dokumen;
					$DokumenX1->id_dokumen=$somevariable+3;
					$DokumenX1->nama_dokumen='Pakta Integritas Penyedia';
					$DokumenX1->status_upload='Belum Selesai';
					$DokumenX1->tanggal='-';
					$DokumenX1->tempat='-';
					$DokumenX1->id_pengadaan=$id;
					
					$DokumenX2= new Dokumen;
					$DokumenX2->id_dokumen=$somevariable+4;
					$DokumenX2->nama_dokumen='Surat Pengantar Penawaran Harga';
					$DokumenX2->tanggal='-';
					$DokumenX2->tempat='Jakarta';
					$DokumenX2->status_upload='Belum Selesai';
					$DokumenX2->id_pengadaan=$id;
					
					$DokumenX3= new Dokumen;
					$DokumenX3->id_dokumen=$somevariable+5;
					$DokumenX3->nama_dokumen='Surat Pernyataan Minat';
					$DokumenX3->tanggal='-';
					$DokumenX3->tempat='-';
					$DokumenX3->status_upload='Belum Selesai';
					$DokumenX3->id_pengadaan=$id;
					
					$DokumenX4= new Dokumen;
					$DokumenX4->id_dokumen=$somevariable+6;
					$DokumenX4->nama_dokumen='Form Isian Kualifikasi';
					$DokumenX4->tanggal='-';
					$DokumenX4->tempat='-';
					$DokumenX4->status_upload='Belum Selesai';
					$DokumenX4->id_pengadaan=$id;
					
					$X1= new PaktaIntegritasPenyedia;
					$X1->id_dokumen=$DokumenX1->id_dokumen;
					
					$X2= new SuratPengantarPenawaranHarga;
					$X2->id_dokumen=$DokumenX2->id_dokumen;
					
					$X3= new SuratPernyataanMinat;
					$X3->id_dokumen=$DokumenX3->id_dokumen;
					
					$X4= new FormIsianKualifikasi;
					$X4->id_dokumen=$DokumenX4->id_dokumen;
				}
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['Rks']))
				{
					$Dokumen1->attributes=$_POST['Dokumen'];
					$RKS->attributes=$_POST['Rks'];
					$RKS->tanggal_permintaan_penawaran=date('Y-m-d', strtotime($RKS->tanggal_permintaan_penawaran));
					$RKS->tanggal_penjelasan=date('Y-m-d', strtotime($RKS->tanggal_penjelasan));
					$RKS->tanggal_awal_pemasukan_penawaran1=date('Y-m-d', strtotime($RKS->tanggal_awal_pemasukan_penawaran1));
					$RKS->tanggal_akhir_pemasukan_penawaran1=date('Y-m-d', strtotime($RKS->tanggal_akhir_pemasukan_penawaran1));
					$RKS->tanggal_pembukaan_penawaran1=date('Y-m-d', strtotime($RKS->tanggal_pembukaan_penawaran1));
					$RKS->tanggal_evaluasi_penawaran1=date('Y-m-d', strtotime($RKS->tanggal_evaluasi_penawaran1));
					$RKS->tanggal_awal_pemasukan_penawaran2=date('Y-m-d', strtotime($RKS->tanggal_awal_pemasukan_penawaran2));
					$RKS->tanggal_akhir_pemasukan_penawaran2=date('Y-m-d', strtotime($RKS->tanggal_akhir_pemasukan_penawaran2));
					$RKS->tanggal_pembukaan_penawaran2=date('Y-m-d', strtotime($RKS->tanggal_pembukaan_penawaran2));
					$RKS->tanggal_evaluasi_penawaran2=date('Y-m-d', strtotime($RKS->tanggal_evaluasi_penawaran2));
					$RKS->tanggal_negosiasi=date('Y-m-d', strtotime($RKS->tanggal_negosiasi));
					$RKS->tanggal_usulan_pemenang=date('Y-m-d', strtotime($RKS->tanggal_usulan_pemenang));
					$RKS->tanggal_penetapan_pemenang=date('Y-m-d', strtotime($RKS->tanggal_penetapan_pemenang));
					$RKS->tanggal_pemberitahuan_pemenang=date('Y-m-d', strtotime($RKS->tanggal_pemberitahuan_pemenang));
					$RKS->tanggal_penunjukan_pemenang=date('Y-m-d', strtotime($RKS->tanggal_penunjukan_pemenang));
					$RKS->tanggal_paling_lambat_penyerahan=date('Y-m-d', strtotime($RKS->tanggal_paling_lambat_penyerahan));
					$valid=$PAP1->validate()&&$RKS->validate();
					$valid=$valid&&$Dokumen1->validate();
					$Dokumen0->tanggal=$Dokumen1->tanggal;
					$valid=$valid&&$Dokumen0->validate();
					if($valid){
						$Cover = new RincianRks;
						$Cover->id_dokumen=$RKS->id_dokumen;
						$Cover->nama_rincian="Cover";
						// if($Pengadaan->metode_pengadaan=="Penunjukan Langsung"){
							if($RKS->tipe_rks==1){
								$PLBD= new RincianRks;
								$PLBD->id_dokumen=$RKS->id_dokumen;
								$PLBD->nama_rincian="Daftar Isi";
								$PLBI= new RincianRks;
								$PLBI->id_dokumen=$RKS->id_dokumen;
								$PLBI->nama_rincian="Isi";
								$PLBL1= new RincianRks;
								$PLBL1->id_dokumen=$RKS->id_dokumen;
								$PLBL1->nama_rincian="Lampiran 1";
								$PLBL2= new RincianRks;
								$PLBL2->id_dokumen=$RKS->id_dokumen;
								$PLBL2->nama_rincian="Lampiran 2";
								$PLBL3= new RincianRks;
								$PLBL3->id_dokumen=$RKS->id_dokumen;
								$PLBL3->nama_rincian="Lampiran 3";
								$PLBL4= new RincianRks;
								$PLBL4->id_dokumen=$RKS->id_dokumen;
								$PLBL4->nama_rincian="Lampiran 4";
								$PLBL5= new RincianRks;
								$PLBL5->id_dokumen=$RKS->id_dokumen;
								$PLBL5->nama_rincian="Lampiran 5";
								$PLBL6= new RincianRks;
								$PLBL6->id_dokumen=$RKS->id_dokumen;
								$PLBL6->nama_rincian="Lampiran 6";
								$PLBL7= new RincianRks;
								$PLBL7->id_dokumen=$RKS->id_dokumen;
								$PLBL7->nama_rincian="Lampiran 7";;
								$PLBLba= new RincianRks;
								$PLBLba->id_dokumen=$RKS->id_dokumen;
								$PLBLba->nama_rincian="Lampiran ba";
							} else if ($RKS->tipe_rks==2){
								$PLBJD= new RincianRks;
								$PLBJD->id_dokumen=$RKS->id_dokumen;
								$PLBJD->nama_rincian="Daftar Isi";
								$PLBJI= new RincianRks;
								$PLBJI->id_dokumen=$RKS->id_dokumen;
								$PLBJI->nama_rincian="Isi";
								$PLBJL1= new RincianRks;
								$PLBJL1->id_dokumen=$RKS->id_dokumen;
								$PLBJL1->nama_rincian="Lampiran 1";
								$PLBJL2= new RincianRks;
								$PLBJL2->id_dokumen=$RKS->id_dokumen;
								$PLBJL2->nama_rincian="Lampiran 2";
								$PLBJL3= new RincianRks;
								$PLBJL3->id_dokumen=$RKS->id_dokumen;
								$PLBJL3->nama_rincian="Lampiran 3";
								$PLBJL4= new RincianRks;
								$PLBJL4->id_dokumen=$RKS->id_dokumen;
								$PLBJL4->nama_rincian="Lampiran 4";
								$PLBJL5= new RincianRks;
								$PLBJL5->id_dokumen=$RKS->id_dokumen;
								$PLBJL5->nama_rincian="Lampiran 5";
								$PLBJL6= new RincianRks;
								$PLBJL6->id_dokumen=$RKS->id_dokumen;
								$PLBJL6->nama_rincian="Lampiran 6";
								$PLBJL7= new RincianRks;
								$PLBJL7->id_dokumen=$RKS->id_dokumen;
								$PLBJL7->nama_rincian="Lampiran 7";
								$PLBJLba= new RincianRks;
								$PLBJLba->id_dokumen=$RKS->id_dokumen;
								$PLBJLba->nama_rincian="Lampiran ba";
							} else if ($RKS->tipe_rks==3){
								$PLJD= new RincianRks;
								$PLJD->id_dokumen=$RKS->id_dokumen;
								$PLJD->nama_rincian="Daftar Isi";
								$PLJI= new RincianRks;
								$PLJI->id_dokumen=$RKS->id_dokumen;
								$PLJI->nama_rincian="Isi";
								$PLJL1= new RincianRks;
								$PLJL1->id_dokumen=$RKS->id_dokumen;
								$PLJL1->nama_rincian="Lampiran 1";
								$PLJL2= new RincianRks;
								$PLJL2->id_dokumen=$RKS->id_dokumen;
								$PLJL2->nama_rincian="Lampiran 2";
								$PLJL3= new RincianRks;
								$PLJL3->id_dokumen=$RKS->id_dokumen;
								$PLJL3->nama_rincian="Lampiran 3";
								$PLJL4= new RincianRks;
								$PLJL4->id_dokumen=$RKS->id_dokumen;
								$PLJL4->nama_rincian="Lampiran 4";
								$PLJL5= new RincianRks;
								$PLJL5->id_dokumen=$RKS->id_dokumen;
								$PLJL5->nama_rincian="Lampiran 5";
							}
						// } else if ($Pengadaan->metode_pengadaan=="Pemilihan Langsung"){
							// if($RKS->tipe_rks==1){
								// $PMBD= new RincianRks;
								// $PMBD->id_dokumen=$RKS->id_dokumen;
								// $PMBD->nama_rincian="Daftar Isi";
								// $PMBI= new RincianRks;
								// $PMBI->id_dokumen=$RKS->id_dokumen;
								// $PMBI->nama_rincian="Isi";
								// $PMBL1= new RincianRks;
								// $PMBL1->id_dokumen=$RKS->id_dokumen;
								// $PMBL1->nama_rincian="Lampiran 1";
								// $PMBL2= new RincianRks;
								// $PMBL2->id_dokumen=$RKS->id_dokumen;
								// $PMBL2->nama_rincian="Lampiran 2";
								// $PMBL3= new RincianRks;
								// $PMBL3->id_dokumen=$RKS->id_dokumen;
								// $PMBL3->nama_rincian="Lampiran 3";
								// $PMBL4= new RincianRks;
								// $PMBL4->id_dokumen=$RKS->id_dokumen;
								// $PMBL4->nama_rincian="Lampiran 4";
								// $PMBL5= new RincianRks;
								// $PMBL5->id_dokumen=$RKS->id_dokumen;
								// $PMBL5->nama_rincian="Lampiran 5";
								// $PMBL6= new RincianRks;
								// $PMBL6->id_dokumen=$RKS->id_dokumen;
								// $PMBL6->nama_rincian="Lampiran 6";
								// $PMBL7= new RincianRks;
								// $PMBL7->id_dokumen=$RKS->id_dokumen;
								// $PMBL7->nama_rincian="Lampiran 7";
								// $PMBLba= new RincianRks;
								// $PMBLba->id_dokumen=$RKS->id_dokumen;
								// $PMBLba->nama_rincian="Lampiran ba";
							// } else if ($RKS->tipe_rks==2){
								// $PMBJD= new RincianRks;
								// $PMBJD->id_dokumen=$RKS->id_dokumen;
								// $PMBJD->nama_rincian="Daftar Isi";
								// $PMBJI= new RincianRks;
								// $PMBJI->id_dokumen=$RKS->id_dokumen;
								// $PMBJI->nama_rincian="Isi";
								// $PMBJL1= new RincianRks;
								// $PMBJL1->id_dokumen=$RKS->id_dokumen;
								// $PMBJL1->nama_rincian="Lampiran 1";
								// $PMBJL2= new RincianRks;
								// $PMBJL2->id_dokumen=$RKS->id_dokumen;
								// $PMBJL2->nama_rincian="Lampiran 2";
								// $PMBJL3= new RincianRks;
								// $PMBJL3->id_dokumen=$RKS->id_dokumen;
								// $PMBJL3->nama_rincian="Lampiran 3";
								// $PMBJL4= new RincianRks;
								// $PMBJL4->id_dokumen=$RKS->id_dokumen;
								// $PMBJL4->nama_rincian="Lampiran 4";
								// $PMBJL5= new RincianRks;
								// $PMBJL5->id_dokumen=$RKS->id_dokumen;
								// $PMBJL5->nama_rincian="Lampiran 5";
								// $PMBJL6= new RincianRks;
								// $PMBJL6->id_dokumen=$RKS->id_dokumen;
								// $PMBJL6->nama_rincian="Lampiran 6";
								// $PMBJLba= new RincianRks;
								// $PMBJLba->id_dokumen=$RKS->id_dokumen;
								// $PMBJLba->nama_rincian="Lampiran ba";
							// } else if ($RKS->tipe_rks==3){
								// $PMJD= new RincianRks;
								// $PMJD->id_dokumen=$RKS->id_dokumen;
								// $PMJD->nama_rincian="Daftar Isi";
								// $PMJI= new RincianRks;
								// $PMJI->id_dokumen=$RKS->id_dokumen;
								// $PMJI->nama_rincian="Isi";
								// $PMJL1= new RincianRks;
								// $PMJL1->id_dokumen=$RKS->id_dokumen;
								// $PMJL1->nama_rincian="Lampiran 1";
								// $PMJL2= new RincianRks;
								// $PMJL2->id_dokumen=$RKS->id_dokumen;
								// $PMJL2->nama_rincian="Lampiran 2";
								// $PMJL3= new RincianRks;
								// $PMJL3->id_dokumen=$RKS->id_dokumen;
								// $PMJL3->nama_rincian="Lampiran 3";
								// $PMJL4= new RincianRks;
								// $PMJL4->id_dokumen=$RKS->id_dokumen;
								// $PMJL4->nama_rincian="Lampiran 4";
								// $PMJL5= new RincianRks;
								// $PMJL5->id_dokumen=$RKS->id_dokumen;
								// $PMJL5->nama_rincian="Lampiran 5";
							// }
						// }
						if($Pengadaan->save(false))
						{	
							if($Dokumen0->save(false)&&$Dokumen1->save(false)){
								if($PAP1->save(false)&&$RKS->save(false)){
									if($Pengadaan->jenis_kualifikasi=="Pasca Kualifikasi") {
										$DokumenX1->save(false);
										$DokumenX2->save(false);
										$DokumenX3->save(false);
										$DokumenX4->save(false);
										$X1->save(false);
										$X2->save(false);
										$X3->save(false);
										$X4->save(false);
									}
									$Cover->save(false);
									// if($Pengadaan->metode_pengadaan=="Penunjukan Langsung"){
										if($RKS->tipe_rks==1){
											$PLBD->save(false);
											$PLBI->save(false);										
											$PLBL1->save(false);
											$PLBL2->save(false);
											$PLBL3->save(false);
											$PLBL4->save(false);
											$PLBL5->save(false);
											$PLBL6->save(false);
											$PLBL7->save(false);
											$PLBLba->save(false);
										} else if ($RKS->tipe_rks==2){
											$PLBJD->save(false);
											$PLBJI->save(false);;
											$PLBJL1->save(false);
											$PLBJL2->save(false);
											$PLBJL3->save(false);
											$PLBJL4->save(false);
											$PLBJL5->save(false);
											$PLBJL6->save(false);
											$PLBJLba->save(false);
										} else if ($RKS->tipe_rks==3){
											$PLJD->save(false);
											$PLJI->save(false);
											$PLJL1->save(false);
											$PLJL2->save(false);
											$PLJL3->save(false);
											$PLJL4->save(false);
											$PLJL5->save(false);
										}
									// } else if ($Pengadaan->metode_pengadaan=="Pemilihan Langsung"){
										// if($RKS->tipe_rks==1){
											// $PMBD->save(false);
											// $PMBI->save(false);
											// $PMBL1->save(false);
											// $PMBL2->save(false);
											// $PMBL3->save(false);
											// $PMBL4->save(false);
											// $PMBL5->save(false);
											// $PMBL6->save(false);
											// $PMBL7->save(false);
											// $PMBLba->save(false);
										// } else if ($RKS->tipe_rks==2){
											// $PMBJD->save(false);
											// $PMBJI->save(false);
											// $PMBJL1->save(false);
											// $PMBJL2->save(false);
											// $PMBJL3->save(false);
											// $PMBJL4->save(false);
											// $PMBJL5->save(false);
											// $PMBJL6->save(false);
											// $PMBJLba->save(false);
										// } else if ($RKS->tipe_rks==3){
											// $PMJD->save(false);
											// $PMJI->save(false);
											// $PMJL1->save(false);
											// $PMJL2->save(false);
											// $PMJL3->save(false);
											// $PMJL4->save(false);
											// $PMJL5->save(false);
										// }
									// }
									
									$this->redirect(array('editrks','id'=>$Dokumen0->id_pengadaan));
								}
							}
						}
					}
				}
				$this->render('rks',array(
					'Rks'=>$RKS,'Dokumen1'=>$Dokumen1,
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
				$Dokumen1->tanggal=Tanggal::getTanggalStrip($Dokumen1->tanggal);
				
				$PAP1= PaktaIntegritasPanitia1::model()->findByPk($Dokumen0->id_dokumen);
				$RKS= Rks::model()->findByPk($Dokumen1->id_dokumen);
				$RKS->waktu_penjelasan=Tanggal::getJamMenit($RKS->waktu_penjelasan);
				$RKS->waktu_pemasukan_penawaran1=Tanggal::getJamMenit($RKS->waktu_pemasukan_penawaran1);
				$RKS->waktu_pembukaan_penawaran1=Tanggal::getJamMenit($RKS->waktu_pembukaan_penawaran1);
				$RKS->waktu_evaluasi_penawaran1=Tanggal::getJamMenit($RKS->waktu_evaluasi_penawaran1);
				$RKS->waktu_pemasukan_penawaran2=Tanggal::getJamMenit($RKS->waktu_pemasukan_penawaran2);
				$RKS->waktu_pembukaan_penawaran2=Tanggal::getJamMenit($RKS->waktu_pembukaan_penawaran2);
				$RKS->waktu_evaluasi_penawaran2=Tanggal::getJamMenit($RKS->waktu_evaluasi_penawaran2);
				$RKS->waktu_negosiasi=Tanggal::getJamMenit($RKS->waktu_negosiasi);
				$RKS->waktu_usulan_pemenang=Tanggal::getJamMenit($RKS->waktu_usulan_pemenang);
				$RKS->waktu_penetapan_pemenang=Tanggal::getJamMenit($RKS->waktu_penetapan_pemenang);
				$RKS->waktu_pemberitahuan_pemenang=Tanggal::getJamMenit($RKS->waktu_pemberitahuan_pemenang);
				$RKS->waktu_penunjukan_pemenang=Tanggal::getJamMenit($RKS->waktu_penunjukan_pemenang);
				$RKS->tanggal_permintaan_penawaran=Tanggal::getTanggalStrip($RKS->tanggal_permintaan_penawaran);
				$RKS->tanggal_awal_pemasukan_penawaran1=Tanggal::getTanggalStrip($RKS->tanggal_awal_pemasukan_penawaran1);
				$RKS->tanggal_akhir_pemasukan_penawaran1=Tanggal::getTanggalStrip($RKS->tanggal_akhir_pemasukan_penawaran1);
				$RKS->tanggal_pembukaan_penawaran1=Tanggal::getTanggalStrip($RKS->tanggal_pembukaan_penawaran1);
				$RKS->tanggal_evaluasi_penawaran1=Tanggal::getTanggalStrip($RKS->tanggal_evaluasi_penawaran1);
				$RKS->tanggal_awal_pemasukan_penawaran2=Tanggal::getTanggalStrip($RKS->tanggal_awal_pemasukan_penawaran2);
				$RKS->tanggal_akhir_pemasukan_penawaran2=Tanggal::getTanggalStrip($RKS->tanggal_akhir_pemasukan_penawaran2);
				$RKS->tanggal_pembukaan_penawaran2=Tanggal::getTanggalStrip($RKS->tanggal_pembukaan_penawaran2);
				$RKS->tanggal_evaluasi_penawaran2=Tanggal::getTanggalStrip($RKS->tanggal_evaluasi_penawaran2);
				$RKS->tanggal_penjelasan=Tanggal::getTanggalStrip($RKS->tanggal_penjelasan);
				$RKS->tanggal_negosiasi=Tanggal::getTanggalStrip($RKS->tanggal_negosiasi);
				$RKS->tanggal_usulan_pemenang=Tanggal::getTanggalStrip($RKS->tanggal_usulan_pemenang);
				$RKS->tanggal_penetapan_pemenang=Tanggal::getTanggalStrip($RKS->tanggal_penetapan_pemenang);
				$RKS->tanggal_pemberitahuan_pemenang=Tanggal::getTanggalStrip($RKS->tanggal_pemberitahuan_pemenang);
				$RKS->tanggal_penunjukan_pemenang=Tanggal::getTanggalStrip($RKS->tanggal_penunjukan_pemenang);
				$RKS->tanggal_paling_lambat_penyerahan=Tanggal::getTanggalStrip($RKS->tanggal_paling_lambat_penyerahan);
				
				if($Pengadaan->jenis_kualifikasi=="Pasca Kualifikasi") {
					
					$DokumenX1= Dokumen::model()->find('id_pengadaan = '.$id.' and nama_dokumen = "Pakta Integritas Penyedia"');
					$DokumenX2= Dokumen::model()->find('id_pengadaan = '.$id.' and nama_dokumen = "Surat Pengantar Penawaran Harga"');
					$DokumenX3= Dokumen::model()->find('id_pengadaan = '.$id.' and nama_dokumen = "Surat Pernyataan Minat"');
					$DokumenX4= Dokumen::model()->find('id_pengadaan = '.$id.' and nama_dokumen = "Form Isian Kualifikasi"');
					
					$X1= PaktaIntegritasPenyedia::model()->findByPk($DokumenX1->id_dokumen);
					$X2= SuratPengantarPenawaranHarga::model()->findByPk($DokumenX2->id_dokumen);
					$X3= SuratPernyataanMinat::model()->findByPk($DokumenX3->id_dokumen);
					$X4= FormIsianKualifikasi::model()->findByPk($DokumenX4->id_dokumen);
				}
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['Rks']))
				{
					$Dokumen1->attributes=$_POST['Dokumen'];
					$RKS->attributes=$_POST['Rks'];
					$RKS->tanggal_permintaan_penawaran=date('Y-m-d', strtotime($RKS->tanggal_permintaan_penawaran));
					$RKS->tanggal_penjelasan=date('Y-m-d', strtotime($RKS->tanggal_penjelasan));
					$RKS->tanggal_awal_pemasukan_penawaran1=date('Y-m-d', strtotime($RKS->tanggal_awal_pemasukan_penawaran1));
					$RKS->tanggal_akhir_pemasukan_penawaran1=date('Y-m-d', strtotime($RKS->tanggal_akhir_pemasukan_penawaran1));
					$RKS->tanggal_pembukaan_penawaran1=date('Y-m-d', strtotime($RKS->tanggal_pembukaan_penawaran1));
					$RKS->tanggal_evaluasi_penawaran1=date('Y-m-d', strtotime($RKS->tanggal_evaluasi_penawaran1));
					$RKS->tanggal_awal_pemasukan_penawaran2=date('Y-m-d', strtotime($RKS->tanggal_awal_pemasukan_penawaran2));
					$RKS->tanggal_akhir_pemasukan_penawaran2=date('Y-m-d', strtotime($RKS->tanggal_akhir_pemasukan_penawaran2));
					$RKS->tanggal_pembukaan_penawaran2=date('Y-m-d', strtotime($RKS->tanggal_pembukaan_penawaran2));
					$RKS->tanggal_evaluasi_penawaran2=date('Y-m-d', strtotime($RKS->tanggal_evaluasi_penawaran2));
					$RKS->tanggal_negosiasi=date('Y-m-d', strtotime($RKS->tanggal_negosiasi));
					$RKS->tanggal_usulan_pemenang=date('Y-m-d', strtotime($RKS->tanggal_usulan_pemenang));
					$RKS->tanggal_penetapan_pemenang=date('Y-m-d', strtotime($RKS->tanggal_penetapan_pemenang));
					$RKS->tanggal_pemberitahuan_pemenang=date('Y-m-d', strtotime($RKS->tanggal_pemberitahuan_pemenang));
					$RKS->tanggal_penunjukan_pemenang=date('Y-m-d', strtotime($RKS->tanggal_penunjukan_pemenang));
					$RKS->tanggal_paling_lambat_penyerahan=date('Y-m-d', strtotime($RKS->tanggal_paling_lambat_penyerahan));
					$valid=$PAP1->validate()&&$RKS->validate();
					$valid=$valid&&$Dokumen1->validate();
					$Dokumen0->tanggal=$Dokumen1->tanggal;
					$valid=$valid&&$Dokumen0->validate();
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

				if($Pengadaan->jenis_kualifikasi=="Pasca Kualifikasi"){
					$this->render('rks',array(
						'Rks'=>$RKS,'Dokumen1'=>$Dokumen1,'PAP1'=>$PAP1,'X1'=>$X1,'X2'=>$X2,'X3'=>$X3,'X4'=>$X4,
					));
				} else {
					$this->render('rks',array(
						'Rks'=>$RKS,'Dokumen1'=>$Dokumen1,'PAP1'=>$PAP1,
					));
				}
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
				if($Pengadaan->metode_pengadaan=='Pelelangan'){
					$Pengadaan->status= "6";
				} else if ($Pengadaan->metode_pengadaan=='Penunjukan Langsung'||$Pengadaan->metode_pengadaan=='Pemilihan Langsung') {
					$Pengadaan->status= "7";
				}
				
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
				date_default_timezone_set("Asia/Jakarta");
				$Dokumen0->tanggal=date('d-m-Y');
				
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
				$Dokumen0->tanggal=Tanggal::getTanggalStrip($Dokumen0->tanggal);
				
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
	
	public function actionPengumumanpengadaan()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				
				$Pengadaan=Pengadaan::model()->findByPk($id);
				$Pengadaan->status="8";
				
				$DokHPS=Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "HPS"');
				$HPS=Hps::model()->findByPk($DokHPS->id_dokumen);
				
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
				date_default_timezone_set("Asia/Jakarta");
				$Dokumen0->tanggal=date('d-m-Y');
				
				
				$SUPDP= new SuratUndanganPengambilanDokumenPengadaan;
				$SUPDP->id_dokumen=$Dokumen0->id_dokumen;
				// $SUPDP->perihal= 'Undangan Pengambilan Dokumen RKS dari '.$Pengadaan->nama_pengadaan;
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['SuratUndanganPengambilanDokumenPengadaan']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SUPDP->attributes=$_POST['SuratUndanganPengambilanDokumenPengadaan'];
					$SUPDP->tanggal_pengambilan=date('Y-m-d', strtotime($SUPDP->tanggal_pengambilan));
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
					'SUPDP'=>$SUPDP,'Dokumen0'=>$Dokumen0,'HPS'=>$HPS
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
				
				$DokHPS=Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "HPS"');
				$HPS=Hps::model()->findByPk($DokHPS->id_dokumen);
				
				$Dokumen0= Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pengambilan Dokumen Pengadaan"');
				$Dokumen0->tanggal=Tanggal::getTanggalStrip($Dokumen0->tanggal);
				
				$SUPDP= SuratUndanganPengambilanDokumenPengadaan::model()->findByPk($Dokumen0->id_dokumen);
				$SUPDP->waktu_pengambilan=Tanggal::getJamMenit($SUPDP->waktu_pengambilan);
				$SUPDP->tanggal_pengambilan=Tanggal::getTanggalStrip($SUPDP->tanggal_pengambilan);
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['SuratUndanganPengambilanDokumenPengadaan']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SUPDP->attributes=$_POST['SuratUndanganPengambilanDokumenPengadaan'];
					$SUPDP->tanggal_pengambilan=date('Y-m-d', strtotime($SUPDP->tanggal_pengambilan));
					$valid=$Dokumen0->validate();
					$valid=$valid&&$SUPDP->validate();
					if($valid){	
						if($Dokumen0->save(false)){
							if($SUPDP->save(false)){
								$this->redirect(array('editpengumumanpengadaan','id'=>$Dokumen0->id_pengadaan));
							}
						}
					}
				}

				$this->render('pengumumanpengadaan',array(
					'SUPDP'=>$SUPDP,'Dokumen0'=>$Dokumen0,'HPS'=>$HPS,
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
				$Pengadaan->status="8";
				
				$DokHPS=Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "HPS"');
				$HPS=Hps::model()->findByPk($DokHPS->id_dokumen);
				
				$Dokumen0= new Dokumen;
				$criteria=new CDbcriteria;
				$criteria->select='max(id_dokumen) AS maxId';
				$row = $Dokumen0->model()->find($criteria);
				$somevariable = $row['maxId'];
				$Dokumen0->id_dokumen=$somevariable+1;
				$Dokumen0->nama_dokumen='Surat Undangan Permintaan Penawaran Harga';
				$Dokumen0->tempat='Jakarta';
				$Dokumen0->status_upload='Belum Selesai';
				$Dokumen0->id_pengadaan=$id;
				date_default_timezone_set("Asia/Jakarta");
				$Dokumen0->tanggal=date('d-m-Y');
				
				$SUPPP= new SuratUndanganPermintaanPenawaranHarga;
				$SUPPP->id_dokumen=$Dokumen0->id_dokumen;							
				
				$PP = array(new PenerimaPengadaan);										
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['SuratUndanganPermintaanPenawaranHarga']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					// $PP->attributes=$_POST['PenerimaPengadaan'][0];
					
					$SUPPP->attributes=$_POST['SuratUndanganPermintaanPenawaranHarga'];
					$valid=$Dokumen0->validate();
					$valid=$valid&&$SUPPP->validate();
					if($valid){
					
						if(isset($_POST['perusahaan'])){
							$total = count($_POST['perusahaan']);
							
							for($i=0;$i<$total;$i++){
								if(isset($_POST['perusahaan'][$i])){
									$PP[$i] = new PenerimaPengadaan;									
									$PP[$i]->id_pengadaan = $Pengadaan->id_pengadaan;
									// $PP[$i]->status = $_POST['status'][$i];
									$PP[$i]->perusahaan=$_POST['perusahaan'][$i];									
									$PP[$i]->alamat='-';									
									$PP[$i]->npwp='-';		
									$PP[$i]->nilai = '-';
									// $PP[$i]->tahap = 'Penawaran Harga';		
									$PP[$i]->undangan_prakualifikasi = '1';
									$PP[$i]->ba_evaluasi_prakualifikasi = '1';
									$PP[$i]->undangan_pengambilan_dokumen = $_POST['undangan_pengambilan_dokumen'][$i];			
									$PP[$i]->ba_aanwijzing = '-';
									$PP[$i]->pembukaan_penawaran_1 = '-';
									$PP[$i]->evaluasi_penawaran_1 = '-';
									$PP[$i]->pembukaan_penawaran_2 = '-';			
									$PP[$i]->evaluasi_penawaran_2 = '-';
									$PP[$i]->negosiasi_klarifikasi = '-';
									$PP[$i]->usulan_pemenang = '-';
									$PP[$i]->penetapan_pemenang	 = '-';								
									
									$PP[$i]->save();
								}
							}
							
						}		

						if($Pengadaan->save(false))
						{	
							if($Dokumen0->save(false)){
								if($SUPPP->save(false)){
									// if($PP->save(false)){
										$this->redirect(array('editpermintaanpenawaranharga','id'=>$Dokumen0->id_pengadaan));
									// }
								}
							}
						}
					}
				}

				$this->render('permintaanpenawaranharga',array(
					'SUPPP'=>$SUPPP,'Dokumen0'=>$Dokumen0,'PP'=>$PP,'HPS'=>$HPS,
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
				
				$DokHPS=Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "HPS"');
				$HPS=Hps::model()->findByPk($DokHPS->id_dokumen);
				
				$Dokumen0= Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Permintaan Penawaran Harga"');
				$Dokumen0->tanggal=Tanggal::getTanggalStrip($Dokumen0->tanggal);
				
				$SUPPP= SuratUndanganPermintaanPenawaranHarga::model()->findByPk($Dokumen0->id_dokumen);
				
				$PP = PenerimaPengadaan::model()->findAll('undangan_pengambilan_dokumen = "1" and id_pengadaan = ' . $Pengadaan->id_pengadaan);
				// $PP = PenerimaPengadaan::model()->find('id_pengadaan = 2');
				// $PP[0]->perusahaan = 'aaaapppppp';
				// $PP[0]->save();
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['SuratUndanganPermintaanPenawaranHarga']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					// $PP->perusahaan=$_POST['perusahaan'][0];
					$SUPPP->attributes=$_POST['SuratUndanganPermintaanPenawaranHarga'];
					$valid=$Dokumen0->validate();
					$valid=$valid&&$SUPPP->validate();
					if($valid){
					
						if(isset($_POST['perusahaan'])){
														
							for($i=0;$i<count($PP);$i++){
								if(isset($_POST['perusahaan'][$i])){																																				
									
									// $PP[$i]->status = $_POST['status'][$i];
									$PP[$i]->perusahaan=$_POST['perusahaan'][$i];									
									$PP[$i]->alamat='-';									
									$PP[$i]->npwp='-';		
									$PP[$i]->nilai = '-';
									// $PP[$i]->tahap = 'Penawaran Harga';		
									$PP[$i]->undangan_prakualifikasi = '1';
									$PP[$i]->ba_evaluasi_prakualifikasi = '1';
									$PP[$i]->undangan_pengambilan_dokumen = $_POST['undangan_pengambilan_dokumen'][$i];			
									$PP[$i]->ba_aanwijzing = '-';
									$PP[$i]->pembukaan_penawaran_1 = '-';
									$PP[$i]->evaluasi_penawaran_1 = '-';
									$PP[$i]->pembukaan_penawaran_2 = '-';			
									$PP[$i]->evaluasi_penawaran_2 = '-';
									$PP[$i]->negosiasi_klarifikasi = '-';
									$PP[$i]->usulan_pemenang = '-';
									$PP[$i]->penetapan_pemenang	 = '-';								
									
									$PP[$i]->save();
								}
							}
							
							$total = count($_POST['perusahaan']);
							if(count($PP)<$total){
								$PPkurang = $total - count($PP);
								for($j=0;$j<$PPkurang;$j++){
									$PPbaru = new PenerimaPengadaan;
									$PPbaru->id_pengadaan = $Pengadaan->id_pengadaan;
									// $PPbaru->status = $_POST['status'][$j+$i];
									$PPbaru->perusahaan=$_POST['perusahaan'][$j+$i];	
									$PPbaru->alamat='-';									
									$PPbaru->npwp='-';		
									$PPbaru->nilai = '-';
									// $PPbaru->tahap = 'Penawaran Harga';	
									$PPbaru->undangan_prakualifikasi = '1';
									$PPbaru->ba_evaluasi_prakualifikasi = '1';
									$PPbaru->undangan_pengambilan_dokumen = $_POST['undangan_pengambilan_dokumen'][$i+$j];			
									$PPbaru->ba_aanwijzing = '-';
									$PPbaru->pembukaan_penawaran_1 = '-';
									$PPbaru->evaluasi_penawaran_1 = '-';
									$PPbaru->pembukaan_penawaran_2 = '-';			
									$PPbaru->evaluasi_penawaran_2 = '-';
									$PPbaru->negosiasi_klarifikasi = '-';
									$PPbaru->usulan_pemenang = '-';
									$PPbaru->penetapan_pemenang	 = '-';								
									$PPbaru->save();
								}
								
							}
							
						}
						
						if($Pengadaan->save(false))
						{	
							if($Dokumen0->save(false)){
								if($SUPPP->save(false)){
									// if($PP->save(false)){
										$this->redirect(array('editpermintaanpenawaranharga','id'=>$Dokumen0->id_pengadaan));
									// }
								}
							}
						}
					}
				}

				$this->render('permintaanpenawaranharga',array(
					'SUPPP'=>$SUPPP,'Dokumen0'=>$Dokumen0,'PP'=>$PP,'HPS'=>$HPS,
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
				
				$DokRKS=Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "RKS"');
				$RKS=Rks::model()->findByPk($DokRKS->id_dokumen);
				
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
				date_default_timezone_set("Asia/Jakarta");
				$Dokumen0->tanggal=date('d-m-Y');
				
				$SUP= new SuratUndanganPenjelasan;
				$SUP->id_dokumen=$Dokumen0->id_dokumen;
				$SUP->perihal= 'Undangan Aanwijzing '.$Pengadaan->nama_pengadaan;
				$SUP->tanggal_undangan=Tanggal::getTanggalStrip($RKS->tanggal_penjelasan);
				$SUP->waktu=Tanggal::getJamMenit($RKS->waktu_penjelasan);
				$SUP->tempat=$RKS->tempat_penjelasan;
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['SuratUndanganPenjelasan']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SUP->attributes=$_POST['SuratUndanganPenjelasan'];
					$SUP->tanggal_undangan=date('Y-m-d',strtotime($SUP->tanggal_undangan));
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

				if($Pengadaan->metode_pengadaan=="Pelelangan"){
					$DokPengumuman=Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "Surat Undangan Pengambilan Dokumen Pengadaan"');
					$SUPDP=SuratUndanganPengambilanDokumenPengadaan::model()->findByPk($DokPengumuman->id_dokumen);
					$this->render('aanwijzing',array(
						'SUP'=>$SUP,'Dokumen0'=>$Dokumen0,'SUPDP'=>$SUPDP,
					));
				} else if ($Pengadaan->metode_pengadaan=="Penunjukan Langsung"||$Pengadaan->metode_pengadaan=="Pemilihan Langsung"){
					$DokPermintaan=Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "Surat Undangan Permintaan Penawaran Harga"');
					$SUPPPH=SuratUndanganPermintaanPenawaranHarga::model()->findByPk($DokPermintaan->id_dokumen);
					$this->render('aanwijzing',array(
						'SUP'=>$SUP,'Dokumen0'=>$Dokumen0,'SUPPPH'=>$SUPPPH,
					));
				}

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
				$Dokumen0->tanggal=Tanggal::getTanggalStrip($Dokumen0->tanggal);
				
				$SUP=SuratUndanganPenjelasan::model()->findByPk($Dokumen0->id_dokumen);
				$SUP->tanggal_undangan=Tanggal::getTanggalStrip($SUP->tanggal_undangan);	
				$SUP->waktu=Tanggal::getJamMenit($SUP->waktu);
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['SuratUndanganPenjelasan']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SUP->attributes=$_POST['SuratUndanganPenjelasan'];
					$SUP->tanggal_undangan=date('Y-m-d',strtotime($SUP->tanggal_undangan));
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
				if($Pengadaan->metode_pengadaan=="Pelelangan"){
					$DokPengumuman=Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "Surat Undangan Pengambilan Dokumen Pengadaan"');
					$SUPDP=SuratUndanganPengambilanDokumenPengadaan::model()->findByPk($DokPengumuman->id_dokumen);
					$this->render('aanwijzing',array(
						'SUP'=>$SUP,'Dokumen0'=>$Dokumen0,'SUPDP'=>$SUPDP,
					));
				} else if ($Pengadaan->metode_pengadaan=="Penunjukan Langsung"||$Pengadaan->metode_pengadaan=="Pemilihan Langsung"){
					$DokPermintaan=Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "Surat Undangan Permintaan Penawaran Harga"');
					$SUPPPH=SuratUndanganPermintaanPenawaranHarga::model()->findByPk($DokPermintaan->id_dokumen);
					$this->render('aanwijzing',array(
						'SUP'=>$SUP,'Dokumen0'=>$Dokumen0,'SUPPPH'=>$SUPPPH,
					));
				}
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
				$Pengadaan->status ='9';
				
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
				
				$Dokumen2=new Dokumen;
				$Dokumen2->id_dokumen=$somevariable+2;
				$Dokumen2->nama_dokumen='Daftar Hadir Aanwijzing';
				$Dokumen2->tempat='Jakarta';
				$Dokumen2->status_upload='Belum Selesai';
				$Dokumen2->id_pengadaan=$id;
				
				$BAP= new BeritaAcaraPenjelasan;
				$BAP->id_dokumen=$Dokumen1->id_dokumen;
				
				$DH= new DaftarHadir;
				$DH->id_dokumen=$Dokumen2->id_dokumen;
				$DH->acara="Aanwijzing";
				
				$DokSUP = Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "Surat Undangan Aanwijzing"');
				if($DokSUP==null) {
					$DokRKS=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "RKS"');
					$RKS=Rks::model()->findByPk($DokRKS->id_dokumen);
					$Dokumen1->tanggal=Tanggal::getTanggalStrip($RKS->tanggal_penjelasan);
					$Dokumen2->tanggal=Tanggal::getTanggalStrip($RKS->tanggal_penjelasan);
					$DH->jam=$RKS->waktu_penjelasan;
					$DH->tempat_hadir=$RKS->tempat_penjelasan;
				} else {
					$SUP=SuratUndanganPenjelasan::model()->findByPk($DokSUP->id_dokumen);
					$Dokumen1->tanggal=$SUP->tanggal_undangan;
					$Dokumen2->tanggal=$SUP->tanggal_undangan;
					$DH->jam=$SUP->waktu;
					$DH->tempat_hadir=$SUP->tempat;
				}
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);
				$PP = PenerimaPengadaan::model()->findAll('undangan_pengambilan_dokumen = "1" and id_pengadaan = ' . $Pengadaan->id_pengadaan);
				
				if(isset($_POST['BeritaAcaraPenjelasan']))
				{
					$BAP->attributes=$_POST['BeritaAcaraPenjelasan'];
					$valid=$BAP->validate();
					if($valid){
					
						if(isset($_POST['perusahaan'])){
							
							for($i=0;$i<count($PP);$i++){
								if(isset($_POST['perusahaan'][$i])){
									
									$PP[$i]->perusahaan=$_POST['perusahaan'][$i];									
									$PP[$i]->alamat='-';									
									$PP[$i]->npwp='-';		
									$PP[$i]->nilai = '-';
									// $PP[$i]->tahap = 'Penawaran Harga';		
									$PP[$i]->undangan_prakualifikasi = '1';
									$PP[$i]->ba_evaluasi_prakualifikasi = '1';
									$PP[$i]->undangan_pengambilan_dokumen = '1';			
									$PP[$i]->ba_aanwijzing = $_POST['ba_aanwijzing'][$i];
									$PP[$i]->pembukaan_penawaran_1 = '-';
									$PP[$i]->evaluasi_penawaran_1 = '-';
									$PP[$i]->pembukaan_penawaran_2 = '-';			
									$PP[$i]->evaluasi_penawaran_2 = '-';
									$PP[$i]->negosiasi_klarifikasi = '-';
									$PP[$i]->usulan_pemenang = '-';
									$PP[$i]->penetapan_pemenang	 = '-';								
									
									$PP[$i]->save();
								}
							}
							
							$total = count($_POST['perusahaan']);
							if(count($PP)<$total){
								$PPkurang = $total - count($PP);
								for($j=0;$j<$PPkurang;$j++){
									$PPbaru = new PenerimaPengadaan;
									$PPbaru->id_pengadaan = $Pengadaan->id_pengadaan;
									// $PPbaru->status = $_POST['status'][$j+$i];
									$PPbaru->perusahaan=$_POST['perusahaan'][$j+$i];	
									$PPbaru->alamat='-';									
									$PPbaru->npwp='-';		
									$PPbaru->nilai = '-';
									// $PPbaru->tahap = 'Penawaran Harga';	
									$PPbaru->undangan_prakualifikasi = '1';
									$PPbaru->ba_evaluasi_prakualifikasi = '1';
									$PPbaru->undangan_pengambilan_dokumen = '1';
									$PPbaru->ba_aanwijzing = $_POST['ba_aanwijzing'][$i+$j];
									$PPbaru->pembukaan_penawaran_1 = '-';
									$PPbaru->evaluasi_penawaran_1 = '-';
									$PPbaru->pembukaan_penawaran_2 = '-';			
									$PPbaru->evaluasi_penawaran_2 = '-';
									$PPbaru->negosiasi_klarifikasi = '-';
									$PPbaru->usulan_pemenang = '-';
									$PPbaru->penetapan_pemenang	 = '-';								
									$PPbaru->save();
								}
								
							}
							
						}		
						
                        if($Pengadaan->save(false)){
							if($Dokumen1->save(false)&&$Dokumen2->save(false)){
								if($BAP->save(false)&&$DH->save(false)){
									$this->redirect(array('editberitaacaraaanwijzing','id'=>$Dokumen1->id_pengadaan));
								}
							}
                        }
					}
				}
				if($DokSUP== null ){
					if($Pengadaan->metode_pengadaan=="Pelelangan"){
						$DokPengumuman=Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "Surat Undangan Pengambilan Dokumen Pengadaan"');
						$SUPDP=SuratUndanganPengambilanDokumenPengadaan::model()->findByPk($DokPengumuman->id_dokumen);
						$this->render('beritaacaraaanwijzing',array(
							'BAP'=>$BAP,'SUPDP'=>$SUPDP,'PP'=>$PP,
						));
					} else if ($Pengadaan->metode_pengadaan=="Penunjukan Langsung"||$Pengadaan->metode_pengadaan=="Pemilihan Langsung"){
						$DokPermintaan=Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "Surat Undangan Permintaan Penawaran Harga"');
						$SUPPPH=SuratUndanganPermintaanPenawaranHarga::model()->findByPk($DokPermintaan->id_dokumen);
						$this->render('beritaacaraaanwijzing',array(
							'BAP'=>$BAP,'SUPPPH'=>$SUPPPH,'PP'=>$PP,
						));
					}
				} else {
					$this->render('beritaacaraaanwijzing',array(
						'BAP'=>$BAP,'SUP'=>$SUP,'PP'=>$PP,'Dokumen1'=>$Dokumen1,
					));
				}
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

				$PP = PenerimaPengadaan::model()->findAll('ba_aanwijzing = "1" and id_pengadaan = ' . $Pengadaan->id_pengadaan);
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['BeritaAcaraPenjelasan']))
				{
					// $Dokumen0->attributes=$_POST['Dokumen'];
					
					$BAP->attributes=$_POST['BeritaAcaraPenjelasan'];
					$valid=$BAP->validate();					
					if($valid){

						if(isset($_POST['perusahaan'])){
							
							
							for($i=0;$i<count($PP);$i++){
								if(isset($_POST['perusahaan'][$i])){									
									$PP[$i]->perusahaan=$_POST['perusahaan'][$i];									
									$PP[$i]->alamat='-';									
									$PP[$i]->npwp='-';		
									$PP[$i]->nilai = '-';									
									$PP[$i]->undangan_prakualifikasi = '1';
									$PP[$i]->ba_evaluasi_prakualifikasi = '1';
									$PP[$i]->undangan_pengambilan_dokumen = '1';			
									$PP[$i]->ba_aanwijzing = $_POST['ba_aanwijzing'][$i];
									$PP[$i]->pembukaan_penawaran_1 = '-';
									$PP[$i]->evaluasi_penawaran_1 = '-';
									$PP[$i]->pembukaan_penawaran_2 = '-';			
									$PP[$i]->evaluasi_penawaran_2 = '-';
									$PP[$i]->negosiasi_klarifikasi = '-';
									$PP[$i]->usulan_pemenang = '-';
									$PP[$i]->penetapan_pemenang	 = '-';								
									
									$PP[$i]->save();
								}
							}
							
							$total = count($_POST['perusahaan']);
							if(count($PP)<$total){
								$PPkurang = $total - count($PP);
								for($j=0;$j<$PPkurang;$j++){
									$PPbaru = new PenerimaPengadaan;
									$PPbaru->id_pengadaan = $Pengadaan->id_pengadaan;
									// $PPbaru->status = $_POST['status'][$j+$i];
									$PPbaru->perusahaan=$_POST['perusahaan'][$j+$i];	
									$PPbaru->alamat='-';									
									$PPbaru->npwp='-';		
									$PPbaru->nilai = '-';
									// $PPbaru->tahap = 'Penawaran Harga';	
									$PPbaru->undangan_prakualifikasi = '1';
									$PPbaru->ba_evaluasi_prakualifikasi = '1';
									$PPbaru->undangan_pengambilan_dokumen = '1';
									$PPbaru->ba_aanwijzing = $_POST['ba_aanwijzing'][$i+$j];	
									$PPbaru->pembukaan_penawaran_1 = '-';
									$PPbaru->evaluasi_penawaran_1 = '-';
									$PPbaru->pembukaan_penawaran_2 = '-';			
									$PPbaru->evaluasi_penawaran_2 = '-';
									$PPbaru->negosiasi_klarifikasi = '-';
									$PPbaru->usulan_pemenang = '-';
									$PPbaru->penetapan_pemenang	 = '-';								
									$PPbaru->save();
								}
								
							}
							
						}
						
						if($BAP->save(false)&&$DH->save(false)){
							$this->redirect(array('editberitaacaraaanwijzing','id'=>$Dokumen1->id_pengadaan));
						}
						
					}
				}
				$DokSUP = Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "Surat Undangan Aanwijzing"');
				if($DokSUP== null ){
					if($Pengadaan->metode_pengadaan=="Pelelangan"){
						$DokPengumuman=Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "Surat Undangan Pengambilan Dokumen Pengadaan"');
						$SUPDP=SuratUndanganPengambilanDokumenPengadaan::model()->findByPk($DokPengumuman->id_dokumen);
						$this->render('beritaacaraaanwijzing',array(
							'BAP'=>$BAP,'DH'=>$DH,'SUPDP'=>$SUPDP,'PP'=>$PP,
						));
					} else if ($Pengadaan->metode_pengadaan=="Penunjukan Langsung"||$Pengadaan->metode_pengadaan=="Pemilihan Langsung"){
						$DokPermintaan=Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "Surat Undangan Permintaan Penawaran Harga"');
						$SUPPPH=SuratUndanganPermintaanPenawaranHarga::model()->findByPk($DokPermintaan->id_dokumen);
						$this->render('beritaacaraaanwijzing',array(
							'BAP'=>$BAP,'DH'=>$DH,'SUPPPH'=>$SUPPPH,'PP'=>$PP,
						));
					}
				} else {
					$SUP=SuratUndanganPenjelasan::model()->findByPk($DokSUP->id_dokumen);
					$this->render('beritaacaraaanwijzing',array(
						'BAP'=>$BAP,'DH'=>$DH,'SUP'=>$SUP,'PP'=>$PP,
					));
				}

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
				
				$DokBAP= Dokumen::model()->find('id_pengadaan = '.$id.' and nama_dokumen = "Berita Acara Aanwijzing"');
				$BAP= BeritaAcaraPenjelasan::model()->findByPk($DokBAP->id_dokumen);
				
				$Dokumen0= new Dokumen;
				$criteria=new CDbcriteria;
				$criteria->select='max(id_dokumen) AS maxId';
				$row = $Dokumen0->model()->find($criteria);
				$somevariable = $row['maxId'];
				$Dokumen0->id_dokumen=$somevariable+1;
				if ($Pengadaan->metode_penawaran == 'Satu Sampul'){
					$Dokumen0->nama_dokumen='Surat Undangan Pembukaan Penawaran';
				} else if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
					$Dokumen0->nama_dokumen='Surat Undangan Pembukaan Penawaran Sampul Satu';
				} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
					$Dokumen0->nama_dokumen='Surat Undangan Pembukaan Penawaran Tahap Satu';
				}
				$Dokumen0->tempat='Jakarta';
				$Dokumen0->status_upload='Belum Selesai';
				$Dokumen0->id_pengadaan=$id;
				date_default_timezone_set("Asia/Jakarta");
				$Dokumen0->tanggal=date('d-m-Y');
				
				$SUPP= new SuratUndanganPembukaanPenawaran;
				$SUPP->id_dokumen=$Dokumen0->id_dokumen;
				if ($Pengadaan->metode_penawaran == 'Satu Sampul'){
					$SUPP->perihal= 'Undangan Pembukaan Penawaran '.$Pengadaan->nama_pengadaan;
				} else if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
					$SUPP->perihal= 'Undangan Pembukaan Penawaran Sampul Satu '.$Pengadaan->nama_pengadaan;
				} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
					$SUPP->perihal= 'Undangan Pembukaan Penawaran Tahap Satu '.$Pengadaan->nama_pengadaan;
				}
				
				$DokRKS=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "RKS"');
				$RKS=Rks::model()->findByPk($DokRKS->id_dokumen);
				
				$SUPP->tanggal_undangan=Tanggal::getTanggalStrip($RKS->tanggal_pembukaan_penawaran1);
				$SUPP->waktu=$RKS->waktu_pembukaan_penawaran1;
				$SUPP->tempat=$RKS->tempat_pembukaan_penawaran1;
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);
				
				if(isset($_POST['SuratUndanganPembukaanPenawaran']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SUPP->attributes=$_POST['SuratUndanganPembukaanPenawaran'];
					$SUPP->tanggal_undangan=date('Y-m-d',strtotime($SUPP->tanggal_undangan));
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
					'SUPP'=>$SUPP,'Dokumen0'=>$Dokumen0,'BAP'=>$BAP,
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
				
				if ($Pengadaan->metode_penawaran == 'Satu Sampul'){
					$Dokumen0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pembukaan Penawaran"');
				} else if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
					$Dokumen0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pembukaan Penawaran Sampul Satu"');
				} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
					$Dokumen0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pembukaan Penawaran Tahap Satu"');
				}
				
				$Dokumen0->tanggal=Tanggal::getTanggalStrip($Dokumen0->tanggal);
				
				$DokBAP= Dokumen::model()->find('id_pengadaan = '.$id.' and nama_dokumen = "Berita Acara Aanwijzing"');
				$BAP= BeritaAcaraPenjelasan::model()->findByPk($DokBAP->id_dokumen);
				
				$SUPP=SuratUndanganPembukaanPenawaran::model()->findByPk($Dokumen0->id_dokumen);
				
				$SUPP=SuratUndanganPembukaanPenawaran::model()->findByPk($Dokumen0->id_dokumen);
				$SUPP->tanggal_undangan=Tanggal::getTanggalStrip($SUPP->tanggal_undangan);	
				$SUPP->waktu=Tanggal::getJamMenit($SUPP->waktu);
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['SuratUndanganPembukaanPenawaran']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SUPP->attributes=$_POST['SuratUndanganPembukaanPenawaran'];
					$SUPP->tanggal_undangan=date('Y-m-d',strtotime($SUPP->tanggal_undangan));
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
					'SUPP'=>$SUPP,'Dokumen0'=>$Dokumen0,'BAP'=>$BAP
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
						
				$Dokumen1= new Dokumen;
				$criteria=new CDbcriteria;
				$criteria->select='max(id_dokumen) AS maxId';
				$row = $Dokumen1->model()->find($criteria);
				$somevariable = $row['maxId'];				
								
				$Dokumen1->id_dokumen=$somevariable+1;
				if ($Pengadaan->metode_penawaran == 'Satu Sampul'){
					$Dokumen1->nama_dokumen='Berita Acara Pembukaan Penawaran';
				} else if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
					$Dokumen1->nama_dokumen='Berita Acara Pembukaan Penawaran Sampul Satu';
				} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
					$Dokumen1->nama_dokumen='Berita Acara Pembukaan Penawaran Tahap Satu';
				}
				$Dokumen1->tempat='Jakarta';
				$Dokumen1->status_upload='Belum Selesai';
				$Dokumen1->id_pengadaan=$id;
				
				$Dokumen2=new Dokumen;
				$Dokumen2->id_dokumen=$somevariable+2;
				if ($Pengadaan->metode_penawaran == 'Satu Sampul'){
					$Dokumen2->nama_dokumen='Daftar Hadir Pembukaan Penawaran';
				} else if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
					$Dokumen2->nama_dokumen='Daftar Hadir Pembukaan Penawaran Sampul Satu';
				} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
					$Dokumen2->nama_dokumen='Daftar Hadir Pembukaan Penawaran Tahap Satu';
				}
				$Dokumen2->tempat='Jakarta';
				$Dokumen2->status_upload='Belum Selesai';
				$Dokumen2->id_pengadaan=$id;
				
				$BAPP= new BeritaAcaraPembukaanPenawaran;
				$BAPP->id_dokumen=$Dokumen1->id_dokumen;				
				
				
				$DH= new DaftarHadir;
				$DH->id_dokumen=$Dokumen2->id_dokumen;
				if ($Pengadaan->metode_penawaran == 'Satu Sampul'){
					$DH->acara="Pembukaan Penawaran";
				} else if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
					$DH->acara="Pembukaan Penawaran Sampul Satu";
				} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
					$DH->acara="Pembukaan Penawaran Tahap Satu";
				}
				
				if ($Pengadaan->metode_penawaran == 'Satu Sampul'){
					$Dok0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pembukaan Penawaran"');
				} else if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
					$Dok0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pembukaan Penawaran Sampul Satu"');
				} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
					$Dok0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pembukaan Penawaran Tahap Satu"');
				}
				
				if ($Dok0==null) {
					$DokRKS=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "RKS"');
					$RKS=Rks::model()->findByPk($DokRKS->id_dokumen);
					$Dokumen1->tanggal=$RKS->tanggal_pembukaan_penawaran1;
					$Dokumen2->tanggal=$RKS->tanggal_pembukaan_penawaran1;
					$DH->jam=$RKS->waktu_pembukaan_penawaran1;
					$DH->tempat_hadir=$RKS->tempat_pembukaan_penawaran1;
				} else {
					$SUPP=SuratUndanganPembukaanPenawaran::model()->findByPk($Dok0->id_dokumen);
					$Dokumen1->tanggal=$SUPP->tanggal_undangan;
					$Dokumen2->tanggal=$SUPP->tanggal_undangan;
					$DH->jam=$SUPP->waktu;
					$DH->tempat_hadir=$SUPP->tempat;
				}
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);
				
				$PP = PenerimaPengadaan::model()->findAll('ba_aanwijzing = "1" and id_pengadaan = ' . $Pengadaan->id_pengadaan);
				
				if(isset($_POST['BeritaAcaraPembukaanPenawaran']))
				{
					$BAPP->attributes=$_POST['BeritaAcaraPembukaanPenawaran'];
					$valid=$BAPP->validate();
					if($valid){
					
						if(isset($_POST['perusahaan'])){
							
							for($i=0;$i<count($PP);$i++){
								if(isset($_POST['perusahaan'][$i])){
									// $PP[$i] = new PenerimaPengadaan;
									// $PP[$i]->id_pengadaan = $Pengadaan->id_pengadaan;
									$PP[$i]->perusahaan=$_POST['perusahaan'][$i];									
									$PP[$i]->alamat='-';									
									$PP[$i]->npwp='-';		
									$PP[$i]->nilai = '-';
									// $PP[$i]->tahap = 'Penawaran Harga';		
									$PP[$i]->undangan_prakualifikasi = '1';
									$PP[$i]->ba_evaluasi_prakualifikasi = '1';
									$PP[$i]->undangan_pengambilan_dokumen = '1';			
									$PP[$i]->ba_aanwijzing = '1';
									$PP[$i]->pembukaan_penawaran_1 = $_POST['pembukaan_penawaran_1'][$i];
									$PP[$i]->evaluasi_penawaran_1 = '-';
									$PP[$i]->pembukaan_penawaran_2 = '-';			
									$PP[$i]->evaluasi_penawaran_2 = '-';
									$PP[$i]->negosiasi_klarifikasi = '-';
									$PP[$i]->usulan_pemenang = '-';
									$PP[$i]->penetapan_pemenang	 = '-';								
									
									$PP[$i]->save();
								}
							}
							
							$total = count($_POST['perusahaan']);
							if(count($PP)<$total){
								$PPkurang = $total - count($PP);
								for($j=0;$j<$PPkurang;$j++){
									$PPbaru = new PenerimaPengadaan;
									$PPbaru->id_pengadaan = $Pengadaan->id_pengadaan;
									// $PPbaru->status = $_POST['status'][$j+$i];
									$PPbaru->perusahaan=$_POST['perusahaan'][$j+$i];	
									$PPbaru->alamat='-';									
									$PPbaru->npwp='-';		
									$PPbaru->nilai = '-';
									// $PPbaru->tahap = 'Penawaran Harga';	
									$PPbaru->undangan_prakualifikasi = '1';
									$PPbaru->ba_evaluasi_prakualifikasi = '1';
									$PPbaru->undangan_pengambilan_dokumen = '1';
									$PPbaru->ba_aanwijzing = '1';
									$PPbaru->pembukaan_penawaran_1 = $_POST['pembukaan_penawaran_1'][$i+$j];
									$PPbaru->evaluasi_penawaran_1 = '-';
									$PPbaru->pembukaan_penawaran_2 = '-';			
									$PPbaru->evaluasi_penawaran_2 = '-';
									$PPbaru->negosiasi_klarifikasi = '-';
									$PPbaru->usulan_pemenang = '-';
									$PPbaru->penetapan_pemenang	 = '-';								
									$PPbaru->save();
								}
								
							}
						}		
						
						if($Pengadaan->save(false)){
							if($Dokumen1->save(false)&&$Dokumen2->save(false)){
								if($BAPP->save(false)&&$DH->save(false)){
									$this->redirect(array('editberitaacarapembukaanpenawaran','id'=>$Dokumen1->id_pengadaan));
								}
							}
						}
					}
				}
				if ($Dok0==null) {
					$DokBAP= Dokumen::model()->find('id_pengadaan = '.$id.' and nama_dokumen = "Berita Acara Aanwijzing"');
					$BAP= BeritaAcaraPenjelasan::model()->findByPk($DokBAP->id_dokumen);
					$this->render('beritaacarapembukaanpenawaran',array(
						'BAPP'=>$BAPP,'PP'=>$PP,'BAP'=>$BAP,'Dok0'=>$Dok0,
					));
				} else {
					$this->render('beritaacarapembukaanpenawaran',array(
						'BAPP'=>$BAPP,'PP'=>$PP,'SUPP'=>$SUPP,'Dok0'=>$Dok0,
					));
				}
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
				
				if ($Pengadaan->metode_penawaran == 'Satu Sampul'){
					$Dok0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pembukaan Penawaran"');
				} else if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
					$Dok0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pembukaan Penawaran Sampul Satu"');
				} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
					$Dok0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pembukaan Penawaran Tahap Satu"');
				}
				
				$DokBAP= Dokumen::model()->find('id_pengadaan = '.$id.' and nama_dokumen = "Berita Acara Aanwijzing"');
				$BAP= BeritaAcaraPenjelasan::model()->findByPk($DokBAP->id_dokumen);
				
				if ($Pengadaan->metode_penawaran == 'Satu Sampul'){
					$Dokumen1=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran"');
					$Dokumen2=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Daftar Hadir Pembukaan Penawaran"');
				} else if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
					$Dokumen1=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran Sampul Satu"');
					$Dokumen2=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Daftar Hadir Pembukaan Penawaran Sampul Satu"');
				} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
					$Dokumen1=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran Tahap Satu"');
					$Dokumen2=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Daftar Hadir Pembukaan Penawaran Tahap Satu"');
				}
				
				$BAPP=BeritaAcaraPembukaanPenawaran::model()->findByPk($Dokumen1->id_dokumen);
				$DH=DaftarHadir::model()->findByPk($Dokumen2->id_dokumen);
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				$PP = PenerimaPengadaan::model()->findAll('pembukaan_penawaran_1 = "1" and id_pengadaan = ' . $Pengadaan->id_pengadaan);
				
				if(isset($_POST['BeritaAcaraPembukaanPenawaran']))
				{
					// $Dokumen0->attributes=$_POST['Dokumen'];
					
					$BAPP->attributes=$_POST['BeritaAcaraPembukaanPenawaran'];
					$valid=$BAPP->validate();					
					if($valid){		

						if(isset($_POST['perusahaan'])){
							
							
							for($i=0;$i<count($PP);$i++){
								if(isset($_POST['perusahaan'][$i])){									
									$PP[$i]->perusahaan=$_POST['perusahaan'][$i];									
									$PP[$i]->alamat='-';									
									$PP[$i]->npwp='-';		
									$PP[$i]->nilai = '-';									
									$PP[$i]->undangan_prakualifikasi = '1';
									$PP[$i]->ba_evaluasi_prakualifikasi = '1';
									$PP[$i]->undangan_pengambilan_dokumen = '1';			
									$PP[$i]->ba_aanwijzing =  '1';
									$PP[$i]->pembukaan_penawaran_1 =  $_POST['pembukaan_penawaran_1'][$i];
									$PP[$i]->evaluasi_penawaran_1 = '-';
									$PP[$i]->pembukaan_penawaran_2 = '-';			
									$PP[$i]->evaluasi_penawaran_2 = '-';
									$PP[$i]->negosiasi_klarifikasi = '-';
									$PP[$i]->usulan_pemenang = '-';
									$PP[$i]->penetapan_pemenang	 = '-';								
									
									$PP[$i]->save();
								}
							}
							
							$total = count($_POST['perusahaan']);
							if(count($PP)<$total){
								$PPkurang = $total - count($PP);
								for($j=0;$j<$PPkurang;$j++){
									$PPbaru = new PenerimaPengadaan;
									$PPbaru->id_pengadaan = $Pengadaan->id_pengadaan;
									// $PPbaru->status = $_POST['status'][$j+$i];
									$PPbaru->perusahaan=$_POST['perusahaan'][$j+$i];	
									$PPbaru->alamat='-';									
									$PPbaru->npwp='-';		
									$PPbaru->nilai = '-';
									// $PPbaru->tahap = 'Penawaran Harga';	
									$PPbaru->undangan_prakualifikasi = '1';
									$PPbaru->ba_evaluasi_prakualifikasi = '1';
									$PPbaru->undangan_pengambilan_dokumen = '1';
									$PPbaru->ba_aanwijzing = '1';
									$PPbaru->pembukaan_penawaran_1 =  $_POST['pembukaan_penawaran_1'][$i];
									$PPbaru->evaluasi_penawaran_1 = '-';
									$PPbaru->pembukaan_penawaran_2 = '-';			
									$PPbaru->evaluasi_penawaran_2 = '-';
									$PPbaru->negosiasi_klarifikasi = '-';
									$PPbaru->usulan_pemenang = '-';
									$PPbaru->penetapan_pemenang	 = '-';								
									$PPbaru->save();
								}
								
							}
							
						}
						
						if($BAPP->save(false)&&$DH->save(false)){
							$this->redirect(array('editberitaacarapembukaanpenawaran','id'=>$Dokumen1->id_pengadaan));
						}
						
					}
				}

				if ($Dok0==null) {
					$this->render('beritaacarapembukaanpenawaran',array(
						'BAPP'=>$BAPP,'DH'=>$DH,'PP'=>$PP,'BAP'=>$BAP,'Dok0'=>$Dok0,
					));
				} else {
					$SUPP= SuratUndanganPembukaanPenawaran::model()->findByPk($Dok0->id_dokumen);
					$this->render('beritaacarapembukaanpenawaran',array(
						'BAPP'=>$BAPP,'DH'=>$DH,'PP'=>$PP,'SUPP'=>$SUPP,'Dok0'=>$Dok0,
					));
				}

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
				if ($Pengadaan->metode_penawaran == 'Satu Sampul'){
					$Pengadaan->status ='13';
				} else {
					$Pengadaan->status ='11';
				}
				
				if ($Pengadaan->metode_penawaran == 'Satu Sampul'){
					$DokBAPP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran"');
				} else if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
					$DokBAPP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran Sampul Satu"');
				} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
					$DokBAPP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran Tahap Satu"');
				}
				
				$BAPP=BeritaAcaraPembukaanPenawaran::model()->findByPk($DokBAPP->id_dokumen);
				
				$DokRKS=Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "RKS"');
				$RKS=Rks::model()->findByPk($DokRKS->id_dokumen);
				
				$Dokumen1= new Dokumen;
				$criteria=new CDbcriteria;
				$criteria->select='max(id_dokumen) AS maxId';
				$row = $Dokumen1->model()->find($criteria);
				$somevariable = $row['maxId'];				
								
				$Dokumen1->id_dokumen=$somevariable+1;
				if ($Pengadaan->metode_penawaran == 'Satu Sampul'){
					$Dokumen1->nama_dokumen='Berita Acara Evaluasi Penawaran';
				} else if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
					$Dokumen1->nama_dokumen='Berita Acara Evaluasi Penawaran Sampul Satu';
				} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
					$Dokumen1->nama_dokumen='Berita Acara Evaluasi Penawaran Tahap Satu';
				}
				$Dokumen1->tempat='Jakarta';
				$Dokumen1->status_upload='Belum Selesai';
				$Dokumen1->id_pengadaan=$id;
				date_default_timezone_set("Asia/Jakarta");
				$Dokumen1->tanggal=date('d-m-Y');
				
				$Dokumen2=new Dokumen;
				$Dokumen2->id_dokumen=$somevariable+2;
				if ($Pengadaan->metode_penawaran == 'Satu Sampul'){
					$Dokumen2->nama_dokumen='Daftar Hadir Evaluasi Penawaran';
				} else if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
					$Dokumen2->nama_dokumen='Daftar Hadir Evaluasi Penawaran Sampul Satu';
				} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
					$Dokumen2->nama_dokumen='Daftar Hadir Evaluasi Penawaran Tahap Satu';
				}
				$Dokumen2->tempat='Jakarta';
				$Dokumen2->status_upload='Belum Selesai';
				$Dokumen2->id_pengadaan=$id;
				
				$BAEP= new BeritaAcaraEvaluasiPenawaran;
				$BAEP->id_dokumen=$Dokumen1->id_dokumen;
				
				$DH= new DaftarHadir;
				$DH->id_dokumen=$Dokumen2->id_dokumen;
				if ($Pengadaan->metode_penawaran == 'Satu Sampul'){
					$DH->acara="Evaluasi Penawaran";
				} else if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
					$DH->acara="Evaluasi Penawaran Sampul Satu";
				} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
					$DH->acara="Evaluasi Penawaran Tahap Satu";
				}
				$DH->jam=$RKS->waktu_evaluasi_penawaran1;
				$DH->tempat_hadir=$RKS->tempat_evaluasi_penawaran1;
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);
				
				$PP = PenerimaPengadaan::model()->findAll('pembukaan_penawaran_1 = "1" and id_pengadaan = ' . $Pengadaan->id_pengadaan);
				
				if(isset($_POST['BeritaAcaraEvaluasiPenawaran']))
				{
					$Dokumen1->attributes=$_POST['Dokumen'];
					$BAEP->attributes=$_POST['BeritaAcaraEvaluasiPenawaran'];
					$Dokumen2->tanggal=$Dokumen1->tanggal;
					$valid=$BAEP->validate();
					if($valid){
					
						if(isset($_POST['perusahaan'])){
							
							for($i=0;$i<count($PP);$i++){
								if(isset($_POST['perusahaan'][$i])){
									
									$PP[$i]->perusahaan=$_POST['perusahaan'][$i];									
									$PP[$i]->alamat='-';									
									$PP[$i]->npwp='-';		
									$PP[$i]->nilai = '-';
									// $PP[$i]->tahap = 'Penawaran Harga';		
									$PP[$i]->undangan_prakualifikasi = '1';
									$PP[$i]->ba_evaluasi_prakualifikasi = '1';
									$PP[$i]->undangan_pengambilan_dokumen = '1';			
									$PP[$i]->ba_aanwijzing = '1';
									$PP[$i]->pembukaan_penawaran_1 = '1';
									$PP[$i]->evaluasi_penawaran_1 = $_POST['evaluasi_penawaran_1'][$i];
									$PP[$i]->pembukaan_penawaran_2 = '-';			
									$PP[$i]->evaluasi_penawaran_2 = '-';
									$PP[$i]->negosiasi_klarifikasi = '-';
									$PP[$i]->usulan_pemenang = '-';
									$PP[$i]->penetapan_pemenang	 = '-';								
									
									$PP[$i]->save();
								}
							}
							
							$total = count($_POST['perusahaan']);
							if(count($PP)<$total){
								$PPkurang = $total - count($PP);
								for($j=0;$j<$PPkurang;$j++){
									$PPbaru = new PenerimaPengadaan;
									$PPbaru->id_pengadaan = $Pengadaan->id_pengadaan;
									// $PPbaru->status = $_POST['status'][$j+$i];
									$PPbaru->perusahaan=$_POST['perusahaan'][$j+$i];	
									$PPbaru->alamat='-';									
									$PPbaru->npwp='-';		
									$PPbaru->nilai = '-';
									// $PPbaru->tahap = 'Penawaran Harga';	
									$PPbaru->undangan_prakualifikasi = '1';
									$PPbaru->ba_evaluasi_prakualifikasi = '1';
									$PPbaru->undangan_pengambilan_dokumen = '1';
									$PPbaru->ba_aanwijzing = '1';
									$PPbaru->pembukaan_penawaran_1 = '1';
									$PPbaru->evaluasi_penawaran_1 = $_POST['evaluasi_penawaran_1'][$i+$j];
									$PPbaru->pembukaan_penawaran_2 = '-';			
									$PPbaru->evaluasi_penawaran_2 = '-';
									$PPbaru->negosiasi_klarifikasi = '-';
									$PPbaru->usulan_pemenang = '-';
									$PPbaru->penetapan_pemenang	 = '-';								
									$PPbaru->save();
								}
								
							}
							
						}
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
					'BAEP'=>$BAEP,'Dokumen1'=>$Dokumen1,'PP'=>$PP,'BAPP'=>$BAPP,
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
				
				if ($Pengadaan->metode_penawaran == 'Satu Sampul'){
					$Dokumen1=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Evaluasi Penawaran"');
					$Dokumen2=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Daftar Hadir Evaluasi Penawaran"');
				} else if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
					$Dokumen1=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Evaluasi Penawaran Sampul Satu"');
					$Dokumen2=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Daftar Hadir Evaluasi Penawaran Sampul Satu"');
				} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
					$Dokumen1=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Evaluasi Penawaran Tahap Satu"');
					$Dokumen2=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Daftar Hadir Evaluasi Penawaran Tahap Satu"');
				}
				
				$Dokumen1->tanggal=Tanggal::getTanggalStrip($Dokumen1->tanggal);
				
				$BAEP=BeritaAcaraEvaluasiPenawaran::model()->findByPk($Dokumen1->id_dokumen);
				$DH=DaftarHadir::model()->findByPk($Dokumen2->id_dokumen);
				
				if ($Pengadaan->metode_penawaran == 'Satu Sampul'){
					$DokBAPP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran"');
				} else if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
					$DokBAPP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran Sampul Satu"');
				} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
					$DokBAPP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran Tahap Satu"');
				}
				
				$BAPP=BeritaAcaraPembukaanPenawaran::model()->findByPk($DokBAPP->id_dokumen);
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				$PP = PenerimaPengadaan::model()->findAll('evaluasi_penawaran_1 = "1" and id_pengadaan = ' . $Pengadaan->id_pengadaan);
				
				if(isset($_POST['BeritaAcaraEvaluasiPenawaran']))
				{
					$Dokumen1->attributes=$_POST['Dokumen'];
					$BAEP->attributes=$_POST['BeritaAcaraEvaluasiPenawaran'];
					$valid=$BAEP->validate();
					if($valid){
					
						if(isset($_POST['perusahaan'])){
														
							for($i=0;$i<count($PP);$i++){
								if(isset($_POST['perusahaan'][$i])){									
									$PP[$i]->perusahaan=$_POST['perusahaan'][$i];									
									$PP[$i]->alamat='-';									
									$PP[$i]->npwp='-';		
									$PP[$i]->nilai = '-';									
									$PP[$i]->undangan_prakualifikasi = '1';
									$PP[$i]->ba_evaluasi_prakualifikasi = '1';
									$PP[$i]->undangan_pengambilan_dokumen = '1';			
									$PP[$i]->ba_aanwijzing = '1';
									$PP[$i]->pembukaan_penawaran_1 = '1';
									$PP[$i]->evaluasi_penawaran_1 = $_POST['evaluasi_penawaran_1'][$i];
									$PP[$i]->pembukaan_penawaran_2 = '-';			
									$PP[$i]->evaluasi_penawaran_2 = '-';
									$PP[$i]->negosiasi_klarifikasi = '-';
									$PP[$i]->usulan_pemenang = '-';
									$PP[$i]->penetapan_pemenang	 = '-';								
									
									$PP[$i]->save();
								}
							}
							
							$total = count($_POST['perusahaan']);
							if(count($PP)<$total){
								$PPkurang = $total - count($PP);
								for($j=0;$j<$PPkurang;$j++){
									$PPbaru = new PenerimaPengadaan;
									$PPbaru->id_pengadaan = $Pengadaan->id_pengadaan;
									// $PPbaru->status = $_POST['status'][$j+$i];
									$PPbaru->perusahaan=$_POST['perusahaan'][$j+$i];	
									$PPbaru->alamat='-';									
									$PPbaru->npwp='-';		
									$PPbaru->nilai = '-';
									// $PPbaru->tahap = 'Penawaran Harga';	
									$PPbaru->undangan_prakualifikasi = '1';
									$PPbaru->ba_evaluasi_prakualifikasi = '1';
									$PPbaru->undangan_pengambilan_dokumen = '1';
									$PPbaru->ba_aanwijzing = '1';
									$PPbaru->pembukaan_penawaran_1 = '1';
									$PPbaru->evaluasi_penawaran_1 = $_POST['evaluasi_penawaran_1'][$i];
									$PPbaru->pembukaan_penawaran_2 = '-';			
									$PPbaru->evaluasi_penawaran_2 = '-';
									$PPbaru->negosiasi_klarifikasi = '-';
									$PPbaru->usulan_pemenang = '-';
									$PPbaru->penetapan_pemenang	 = '-';								
									$PPbaru->save();
								}
								
							}
							
						}
						
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
					'BAEP'=>$BAEP,'Dokumen1'=>$Dokumen1,'DH'=>$DH,'PP'=>$PP,'BAPP'=>$BAPP,
				));

			}
		}
	}
	
	public function actionSuratundanganpembukaanpenawaran2()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				$Pengadaan=Pengadaan::model()->findByPk($id);
				
				if($Pengadaan->metode_penawaran=="Dua Sampul") {
					$DokBAEP= Dokumen::model()->find('id_pengadaan = '.$id.' and nama_dokumen = "Berita Acara Evaluasi Penawaran Sampul Satu"');
				} else if($Pengadaan->metode_penawaran=="Dua Tahap") {
					$DokBAEP= Dokumen::model()->find('id_pengadaan = '.$id.' and nama_dokumen = "Berita Acara Evaluasi Penawaran Tahap Satu"');
				}
				$BAEP= BeritaAcaraEvaluasiPenawaran::model()->findByPk($DokBAEP->id_dokumen);
				
				$Dokumen0= new Dokumen;
				$criteria=new CDbcriteria;
				$criteria->select='max(id_dokumen) AS maxId';
				$row = $Dokumen0->model()->find($criteria);
				$somevariable = $row['maxId'];
				$Dokumen0->id_dokumen=$somevariable+1;
				if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
					$Dokumen0->nama_dokumen='Surat Undangan Pembukaan Penawaran Sampul Dua';
				} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
					$Dokumen0->nama_dokumen='Surat Undangan Pembukaan Penawaran Tahap Dua';
				}
				$Dokumen0->tempat='Jakarta';
				$Dokumen0->status_upload='Belum Selesai';
				$Dokumen0->id_pengadaan=$id;
				date_default_timezone_set("Asia/Jakarta");
				$Dokumen0->tanggal=date('d-m-Y');
				
				$SUPP= new SuratUndanganPembukaanPenawaran;
				$SUPP->id_dokumen=$Dokumen0->id_dokumen;
				if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
					$SUPP->perihal= 'Undangan Pembukaan Penawaran Sampul Dua '.$Pengadaan->nama_pengadaan;
				} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
					$SUPP->perihal= 'Undangan Pembukaan Penawaran Tahap Dua '.$Pengadaan->nama_pengadaan;
				}
				
				$DokRKS=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "RKS"');
				$RKS=Rks::model()->findByPk($DokRKS->id_dokumen);
				
				$SUPP->tanggal_undangan=Tanggal::getTanggalStrip($RKS->tanggal_pembukaan_penawaran2);
				$SUPP->waktu=Tanggal::getJamMenit($RKS->waktu_pembukaan_penawaran2);
				$SUPP->tempat=$RKS->tempat_pembukaan_penawaran2;
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);
				
				if(isset($_POST['SuratUndanganPembukaanPenawaran']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SUPP->attributes=$_POST['SuratUndanganPembukaanPenawaran'];
					$SUPP->tanggal_undangan=date('Y-m-d',strtotime($SUPP->tanggal_undangan));
					$valid=$SUPP->validate();
					$valid=$valid&&$Dokumen0->validate();
					if($valid){
						if($Pengadaan->save(false))
						{	
							if($Dokumen0->save(false)){
								if($SUPP->save(false)){
									$this->redirect(array('editsuratundanganpembukaanpenawaran2','id'=>$Dokumen0->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('suratundanganpembukaanpenawaran2',array(
					'SUPP'=>$SUPP,'Dokumen0'=>$Dokumen0,'BAEP'=>$BAEP,
				));
			}
		}
	}
	
	public function actionEditSuratundanganpembukaanpenawaran2()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				
				if($Pengadaan->metode_penawaran=="Dua Sampul") {
					$DokBAEP= Dokumen::model()->find('id_pengadaan = '.$id.' and nama_dokumen = "Berita Acara Evaluasi Penawaran Sampul Satu"');
				} else if($Pengadaan->metode_penawaran=="Dua Tahap") {
					$DokBAEP= Dokumen::model()->find('id_pengadaan = '.$id.' and nama_dokumen = "Berita Acara Evaluasi Penawaran Tahap Satu"');
				}
				$BAEP= BeritaAcaraEvaluasiPenawaran::model()->findByPk($DokBAEP->id_dokumen);
				
				
				if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
					$Dokumen0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pembukaan Penawaran Sampul Dua"');
				} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
					$Dokumen0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pembukaan Penawaran Tahap Dua"');
				}
				
				$Dokumen0->tanggal=Tanggal::getTanggalStrip($Dokumen0->tanggal);
				
				$SUPP=SuratUndanganPembukaanPenawaran::model()->findByPk($Dokumen0->id_dokumen);
				$SUPP->tanggal_undangan=Tanggal::getTanggalStrip($SUPP->tanggal_undangan);	
				$SUPP->waktu=Tanggal::getJamMenit($SUPP->waktu);
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
									$this->redirect(array('editsuratundanganpembukaanpenawaran2','id'=>$Dokumen0->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('suratundanganpembukaanpenawaran2',array(
					'SUPP'=>$SUPP,'Dokumen0'=>$Dokumen0,'BAEP'=>$BAEP,
				));

			}
		}
	}
	
	public function actionBeritaacarapembukaanpenawaran2()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				$Pengadaan->status ='12';
				
				$Dokumen1= new Dokumen;
				$criteria=new CDbcriteria;
				$criteria->select='max(id_dokumen) AS maxId';
				$row = $Dokumen1->model()->find($criteria);
				$somevariable = $row['maxId'];				
								
				$Dokumen1->id_dokumen=$somevariable+1;
				if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
					$Dokumen1->nama_dokumen='Berita Acara Pembukaan Penawaran Sampul Dua';
				} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
					$Dokumen1->nama_dokumen='Berita Acara Pembukaan Penawaran Tahap Dua';
				}
				$Dokumen1->tempat='Jakarta';
				$Dokumen1->status_upload='Belum Selesai';
				$Dokumen1->id_pengadaan=$id;
				
				$Dokumen2=new Dokumen;
				$Dokumen2->id_dokumen=$somevariable+2;
				if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
					$Dokumen2->nama_dokumen='Daftar Hadir Pembukaan Penawaran Sampul Dua';
				} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
					$Dokumen2->nama_dokumen='Daftar Hadir Pembukaan Penawaran Tahap Dua';
				}
				$Dokumen2->tempat='Jakarta';
				$Dokumen2->status_upload='Belum Selesai';
				$Dokumen2->id_pengadaan=$id;
				
				$BAPP= new BeritaAcaraPembukaanPenawaran;
				$BAPP->id_dokumen=$Dokumen1->id_dokumen;

				$DH= new DaftarHadir;
				$DH->id_dokumen=$Dokumen2->id_dokumen;
				if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
					$DH->acara="Pembukaan Penawaran Sampul Dua";
				} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
					$DH->acara="Pembukaan Penawaran Tahap Dua";
				}
				
				
				if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
					$Dok0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pembukaan Penawaran Sampul Dua"');
				} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
					$Dok0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pembukaan Penawaran Tahap Dua"');
				}
				
				if ($Dok0==null) {
					$DokRKS=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "RKS"');
					$RKS=Rks::model()->findByPk($DokRKS->id_dokumen);
					$Dokumen1->tanggal=$RKS->tanggal_pembukaan_penawaran2;
					$Dokumen2->tanggal=$RKS->tanggal_pembukaan_penawaran2;
					$DH->jam=$RKS->waktu_pembukaan_penawaran2;
					$DH->tempat_hadir=$RKS->tempat_pembukaan_penawaran2;
				} else {
					$SUPP=SuratUndanganPembukaanPenawaran::model()->findByPk($Dok0->id_dokumen);
					$Dokumen1->tanggal=$SUPP->tanggal_undangan;
					$Dokumen2->tanggal=$SUPP->tanggal_undangan;
					$DH->jam=$SUPP->waktu;
					$DH->tempat_hadir=$SUPP->tempat;
				}
				
				if($Pengadaan->metode_penawaran=="Dua Sampul") {
					$DokBAEP= Dokumen::model()->find('id_pengadaan = '.$id.' and nama_dokumen = "Berita Acara Evaluasi Penawaran Sampul Satu"');
				} else if($Pengadaan->metode_penawaran=="Dua Sampul") {
					$DokBAEP= Dokumen::model()->find('id_pengadaan = '.$id.' and nama_dokumen = "Berita Acara Evaluasi Penawaran Tahap Satu"');
				}
				$BAEP= BeritaAcaraEvaluasiPenawaran::model()->findByPk($DokBAEP->id_dokumen);
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);
				
				$PP = PenerimaPengadaan::model()->findAll('evaluasi_penawaran_1 = "1" and id_pengadaan = ' . $Pengadaan->id_pengadaan);
				
				if(isset($_POST['BeritaAcaraPembukaanPenawaran']))
				{
					$BAPP->attributes=$_POST['BeritaAcaraPembukaanPenawaran'];
					$valid=$BAPP->validate();
					if($valid){
					
						if(isset($_POST['perusahaan'])){
							
							for($i=0;$i<count($PP);$i++){
								if(isset($_POST['perusahaan'][$i])){
									
									$PP[$i]->perusahaan=$_POST['perusahaan'][$i];									
									$PP[$i]->alamat='-';									
									$PP[$i]->npwp='-';		
									$PP[$i]->nilai = '-';
									// $PP[$i]->tahap = 'Penawaran Harga';		
									$PP[$i]->undangan_prakualifikasi = '1';
									$PP[$i]->ba_evaluasi_prakualifikasi = '1';
									$PP[$i]->undangan_pengambilan_dokumen = '1';			
									$PP[$i]->ba_aanwijzing = '1';	
									$PP[$i]->pembukaan_penawaran_1 = '1';
									$PP[$i]->evaluasi_penawaran_1 = '1';
									$PP[$i]->pembukaan_penawaran_2 = $_POST['pembukaan_penawaran_2'][$i];
									$PP[$i]->evaluasi_penawaran_2 = '-';
									$PP[$i]->negosiasi_klarifikasi = '-';
									$PP[$i]->usulan_pemenang = '-';
									$PP[$i]->penetapan_pemenang	 = '-';								
									
									$PP[$i]->save();
								}
							}
							
							$total = count($_POST['perusahaan']);
							if(count($PP)<$total){
								$PPkurang = $total - count($PP);
								for($j=0;$j<$PPkurang;$j++){
									$PPbaru = new PenerimaPengadaan;
									$PPbaru->id_pengadaan = $Pengadaan->id_pengadaan;
									// $PPbaru->status = $_POST['status'][$j+$i];
									$PPbaru->perusahaan=$_POST['perusahaan'][$j+$i];	
									$PPbaru->alamat='-';									
									$PPbaru->npwp='-';		
									$PPbaru->nilai = '-';
									// $PPbaru->tahap = 'Penawaran Harga';	
									$PPbaru->undangan_prakualifikasi = '1';
									$PPbaru->ba_evaluasi_prakualifikasi = '1';
									$PPbaru->undangan_pengambilan_dokumen = '1';
									$PPbaru->ba_aanwijzing = '1';
									$PPbaru->pembukaan_penawaran_1 = '1';
									$PPbaru->evaluasi_penawaran_1 = '1';
									$PPbaru->pembukaan_penawaran_2 = $_POST['pembukaan_penawaran_2'][$i+$j];
									$PPbaru->evaluasi_penawaran_2 = '-';
									$PPbaru->negosiasi_klarifikasi = '-';
									$PPbaru->usulan_pemenang = '-';
									$PPbaru->penetapan_pemenang	 = '-';								
									$PPbaru->save();
								}
								
							}
							
						}
						
						if($Pengadaan->save(false)){
							if($Dokumen1->save(false)&&$Dokumen2->save(false)){
								if($BAPP->save(false)&&$DH->save(false)){
									$this->redirect(array('editberitaacarapembukaanpenawaran2','id'=>$Dokumen1->id_pengadaan));
								}
							}
						}
					}
				}
				if ($Dok0==null) {
					if ($Pengadaan->metode_penawaran=="Dua Sampul") {
						$DokBAEP= Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Evaluasi Penawaran Sampul Satu"');
					} else if ($Pengadaan->metode_penawaran=="Dua Tahap") {
						$DokBAEP= Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Evaluasi Penawaran Tahap Satu"');
					}
					$BAEP= BeritaAcaraEvaluasiPenawaran::model()->findByPk($DokBAEP->id_dokumen);
					$this->render('beritaacarapembukaanpenawaran2',array(
						'BAPP'=>$BAPP,'PP'=>$PP,'BAEP'=>$BAEP,'Dok0'=>$Dok0,
					));
				} else {
					$this->render('beritaacarapembukaanpenawaran2',array(
						'BAPP'=>$BAPP,'PP'=>$PP,'SUPP'=>$SUPP,'Dok0'=>$Dok0,
					));
				}
			}
		}
	}
	
	public function actionEditBeritaacarapembukaanpenawaran2()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				
				if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
					$Dokumen1=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran Sampul Dua"');
					$Dokumen2=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Daftar Hadir Pembukaan Penawaran Sampul Dua"');
				} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
					$Dokumen1=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran Tahap Dua"');
					$Dokumen2=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Daftar Hadir Pembukaan Penawaran Tahap Dua"');
				}
				
				$BAPP=BeritaAcaraPembukaanPenawaran::model()->findByPk($Dokumen1->id_dokumen);
				$DH=DaftarHadir::model()->findByPk($Dokumen2->id_dokumen);
				
				if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
					$Dok0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pembukaan Penawaran Sampul Dua"');
				} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
					$Dok0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pembukaan Penawaran Tahap Dua"');
				}
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				$PP = PenerimaPengadaan::model()->findAll('pembukaan_penawaran_2 = "1" and id_pengadaan = ' . $Pengadaan->id_pengadaan);
				
				if(isset($_POST['BeritaAcaraPembukaanPenawaran']))
				{
					// $Dokumen0->attributes=$_POST['Dokumen'];
					
					$BAPP->attributes=$_POST['BeritaAcaraPembukaanPenawaran'];
					$valid=$BAPP->validate();					
					if($valid){	

						if(isset($_POST['perusahaan'])){
							
							for($i=0;$i<count($PP);$i++){
								if(isset($_POST['perusahaan'][$i])){
									
									$PP[$i]->perusahaan=$_POST['perusahaan'][$i];									
									$PP[$i]->alamat='-';									
									$PP[$i]->npwp='-';		
									$PP[$i]->nilai = '-';
									// $PP[$i]->tahap = 'Penawaran Harga';		
									$PP[$i]->undangan_prakualifikasi = '1';
									$PP[$i]->ba_evaluasi_prakualifikasi = '1';
									$PP[$i]->undangan_pengambilan_dokumen = '1';			
									$PP[$i]->ba_aanwijzing = '1';	
									$PP[$i]->pembukaan_penawaran_1 = '1';
									$PP[$i]->evaluasi_penawaran_1 = '1';
									$PP[$i]->pembukaan_penawaran_2 = $_POST['pembukaan_penawaran_2'][$i];
									$PP[$i]->evaluasi_penawaran_2 = '-';
									$PP[$i]->negosiasi_klarifikasi = '-';
									$PP[$i]->usulan_pemenang = '-';
									$PP[$i]->penetapan_pemenang	 = '-';								
									
									$PP[$i]->save();
								}
							}
							
							$total = count($_POST['perusahaan']);
							if(count($PP)<$total){
								$PPkurang = $total - count($PP);
								for($j=0;$j<$PPkurang;$j++){
									$PPbaru = new PenerimaPengadaan;
									$PPbaru->id_pengadaan = $Pengadaan->id_pengadaan;
									// $PPbaru->status = $_POST['status'][$j+$i];
									$PPbaru->perusahaan=$_POST['perusahaan'][$j+$i];	
									$PPbaru->alamat='-';									
									$PPbaru->npwp='-';		
									$PPbaru->nilai = '-';
									// $PPbaru->tahap = 'Penawaran Harga';	
									$PPbaru->undangan_prakualifikasi = '1';
									$PPbaru->ba_evaluasi_prakualifikasi = '1';
									$PPbaru->undangan_pengambilan_dokumen = '1';
									$PPbaru->ba_aanwijzing = '1';
									$PPbaru->pembukaan_penawaran_1 = '1';
									$PPbaru->evaluasi_penawaran_1 = '1';
									$PPbaru->pembukaan_penawaran_2 = $_POST['pembukaan_penawaran_2'][$i+$j];
									$PPbaru->evaluasi_penawaran_2 = '-';
									$PPbaru->negosiasi_klarifikasi = '-';
									$PPbaru->usulan_pemenang = '-';
									$PPbaru->penetapan_pemenang	 = '-';								
									$PPbaru->save();
								}
								
							}
							
						}
						
						if($BAPP->save(false)&&$DH->save(false)){
							$this->redirect(array('editberitaacarapembukaanpenawaran2','id'=>$Dokumen1->id_pengadaan));
						}
						
					}
				}
				
				if ($Dok0==null) {
					if ($Pengadaan->metode_penawaran=="Dua Sampul") {
						$DokBAEP= Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Evaluasi Penawaran Sampul Satu"');
					} else if ($Pengadaan->metode_penawaran=="Dua Tahap") {
						$DokBAEP= Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Evaluasi Penawaran Tahap Satu"');
					}
					$BAEP= BeritaAcaraEvaluasiPenawaran::model()->findByPk($DokBAEP->id_dokumen);
					$this->render('beritaacarapembukaanpenawaran2',array(
						'BAPP'=>$BAPP,'DH'=>$DH,'PP'=>$PP,'BAEP'=>$BAEP,'Dok0'=>$Dok0,
					));
				} else {
					$SUPP=SuratUndanganPembukaanPenawaran::model()->findByPk($Dok0->id_dokumen);
					$this->render('beritaacarapembukaanpenawaran2',array(
						'BAPP'=>$BAPP,'DH'=>$DH,'PP'=>$PP,'SUPP'=>$SUPP,'Dok0'=>$Dok0,
					));
				}

			}
		}
	}
	
	public function actionBeritaacaraevaluasipenawaran2()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				$Pengadaan->status ='13';
				
				if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
					$DokBAPP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran Sampul Dua"');
				} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
					$DokBAPP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran Tahap Dua"');
				}				
				$BAPP=BeritaAcaraPembukaanPenawaran::model()->findByPk($DokBAPP->id_dokumen);
				
				$DokRKS=Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "RKS"');
				$RKS=Rks::model()->findByPk($DokRKS->id_dokumen);
				
				$Dokumen1= new Dokumen;
				$criteria=new CDbcriteria;
				$criteria->select='max(id_dokumen) AS maxId';
				$row = $Dokumen1->model()->find($criteria);
				$somevariable = $row['maxId'];				
								
				$Dokumen1->id_dokumen=$somevariable+1;
				if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
					$Dokumen1->nama_dokumen='Berita Acara Evaluasi Penawaran Sampul Dua';
				} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
					$Dokumen1->nama_dokumen='Berita Acara Evaluasi Penawaran Tahap Dua';
				}
				$Dokumen1->tempat='Jakarta';
				$Dokumen1->status_upload='Belum Selesai';
				$Dokumen1->id_pengadaan=$id;
				date_default_timezone_set("Asia/Jakarta");
				$Dokumen1->tanggal=date('d-m-Y');
				
				$Dokumen2=new Dokumen;
				$Dokumen2->id_dokumen=$somevariable+2;
				if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
					$Dokumen2->nama_dokumen='Daftar Hadir Evaluasi Penawaran Sampul Dua';
				} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
					$Dokumen2->nama_dokumen='Daftar Hadir Evaluasi Penawaran Tahap Dua';
				}
				$Dokumen2->tempat='Jakarta';
				$Dokumen2->status_upload='Belum Selesai';
				$Dokumen2->id_pengadaan=$id;
				
				$BAEP= new BeritaAcaraEvaluasiPenawaran;
				$BAEP->id_dokumen=$Dokumen1->id_dokumen;
				
				$DH= new DaftarHadir;
				$DH->id_dokumen=$Dokumen2->id_dokumen;
				if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
					$DH->acara="Evaluasi Penawaran Sampul Dua";
				} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
					$DH->acara="Evaluasi Penawaran Tahap Dua";
				}
				$DH->jam=$RKS->waktu_evaluasi_penawaran2;
				$DH->tempat_hadir=$RKS->tempat_evaluasi_penawaran2;
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);
				
				$PP = PenerimaPengadaan::model()->findAll('pembukaan_penawaran_2 = "1" and id_pengadaan = ' . $Pengadaan->id_pengadaan);
				
				if(isset($_POST['BeritaAcaraEvaluasiPenawaran']))
				{
					$Dokumen1->attributes=$_POST['Dokumen'];
					$BAEP->attributes=$_POST['BeritaAcaraEvaluasiPenawaran'];
					$valid=$BAEP->validate();
					if($valid){
					
						if(isset($_POST['perusahaan'])){
							
							for($i=0;$i<count($PP);$i++){
								if(isset($_POST['perusahaan'][$i])){
									
									$PP[$i]->perusahaan=$_POST['perusahaan'][$i];									
									$PP[$i]->alamat=$_POST['alamat'][$i];	
									$PP[$i]->npwp=$_POST['npwp'][$i];
									$PP[$i]->nilai = $_POST['nilai'][$i];	
									// $PP[$i]->tahap = 'Penawaran Harga';		
									$PP[$i]->undangan_prakualifikasi = '1';
									$PP[$i]->ba_evaluasi_prakualifikasi = '1';
									$PP[$i]->undangan_pengambilan_dokumen = '1';			
									$PP[$i]->ba_aanwijzing = '1';
									$PP[$i]->pembukaan_penawaran_1 = '1';
									$PP[$i]->evaluasi_penawaran_1 = '1';
									$PP[$i]->pembukaan_penawaran_2 = '1';
									$PP[$i]->evaluasi_penawaran_2 = $_POST['evaluasi_penawaran_2'][$i];		
									$PP[$i]->negosiasi_klarifikasi = '-';
									$PP[$i]->usulan_pemenang = '-';
									$PP[$i]->penetapan_pemenang	 = '-';								
									
									$PP[$i]->save();
								}
							}
							
							$total = count($_POST['perusahaan']);
							if(count($PP)<$total){
								$PPkurang = $total - count($PP);
								for($j=0;$j<$PPkurang;$j++){
									$PPbaru = new PenerimaPengadaan;
									$PPbaru->id_pengadaan = $Pengadaan->id_pengadaan;
									// $PPbaru->status = $_POST['status'][$j+$i];
									$PPbaru->perusahaan=$_POST['perusahaan'][$j+$i];	
									$PPbaru->alamat=$_POST['alamat'][$j+$i];
									$PPbaru->npwp=$_POST['npwp'][$j+$i];	
									$PPbaru->nilai = $_POST['nilai'][$j+$i];	
									// $PPbaru->tahap = 'Penawaran Harga';	
									$PPbaru->undangan_prakualifikasi = '1';
									$PPbaru->ba_evaluasi_prakualifikasi = '1';
									$PPbaru->undangan_pengambilan_dokumen = '1';
									$PPbaru->ba_aanwijzing = '1';
									$PPbaru->pembukaan_penawaran_1 = '1';
									$PPbaru->evaluasi_penawaran_1 = '1';
									$PPbaru->pembukaan_penawaran_2 = '1';
									$PPbaru->evaluasi_penawaran_2 = $_POST['evaluasi_penawaran_2'][$i];			
									$PPbaru->negosiasi_klarifikasi = '-';
									$PPbaru->usulan_pemenang = '-';
									$PPbaru->penetapan_pemenang	 = '-';								
									$PPbaru->save();
								}
								
							}
							
						}
						
						$Dokumen2->tanggal=$Dokumen1->tanggal;
						if($Pengadaan->save(false)){
							if($Dokumen1->save(false)&&$Dokumen2->save(false)){
								if($BAEP->save(false)&&$DH->save(false)){
									$this->redirect(array('editberitaacaraevaluasipenawaran2','id'=>$Dokumen1->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('beritaacaraevaluasipenawaran2',array(
					'BAEP'=>$BAEP,'Dokumen1'=>$Dokumen1,'PP'=>$PP,'BAPP'=>$BAPP
				));
			}
		}
	}
	
	public function actionEditBeritaacaraevaluasipenawaran2()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				
				if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
					$DokBAPP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran Sampul Dua"');
				} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
					$DokBAPP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran Tahap Dua"');
				}				
				$BAPP=BeritaAcaraPembukaanPenawaran::model()->findByPk($DokBAPP->id_dokumen);
				
				if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
					$Dokumen1=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Evaluasi Penawaran Sampul Dua"');
					$Dokumen2=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Daftar Hadir Evaluasi Penawaran Sampul Dua"');
				} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
					$Dokumen1=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Evaluasi Penawaran Tahap Dua"');
					$Dokumen2=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Daftar Hadir Evaluasi Penawaran Tahap Dua"');
				}
				
				$Dokumen1->tanggal=Tanggal::getTanggalStrip($Dokumen1->tanggal);
				
				$BAEP=BeritaAcaraEvaluasiPenawaran::model()->findByPk($Dokumen1->id_dokumen);
				$DH=DaftarHadir::model()->findByPk($Dokumen2->id_dokumen);
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				$PP = PenerimaPengadaan::model()->findAll('evaluasi_penawaran_2 = "1" and id_pengadaan = ' . $Pengadaan->id_pengadaan);
				
				if(isset($_POST['BeritaAcaraEvaluasiPenawaran']))
				{
					$Dokumen1->attributes=$_POST['Dokumen'];
					$BAEP->attributes=$_POST['BeritaAcaraEvaluasiPenawaran'];
					$valid=$BAEP->validate();
					if($valid){
					
						if(isset($_POST['perusahaan'])){
							
							for($i=0;$i<count($PP);$i++){
								if(isset($_POST['perusahaan'][$i])){
									
									$PP[$i]->perusahaan=$_POST['perusahaan'][$i];									
									$PP[$i]->alamat=$_POST['alamat'][$i];	
									$PP[$i]->npwp=$_POST['npwp'][$i];
									$PP[$i]->nilai = $_POST['nilai'][$i];
									// $PP[$i]->tahap = 'Penawaran Harga';		
									$PP[$i]->undangan_prakualifikasi = '1';
									$PP[$i]->ba_evaluasi_prakualifikasi = '1';
									$PP[$i]->undangan_pengambilan_dokumen = '1';			
									$PP[$i]->ba_aanwijzing = '1';
									$PP[$i]->pembukaan_penawaran_1 = '1';
									$PP[$i]->evaluasi_penawaran_1 = '1';
									$PP[$i]->pembukaan_penawaran_2 = '1';
									$PP[$i]->evaluasi_penawaran_2 = $_POST['evaluasi_penawaran_2'][$i];	
									$PP[$i]->negosiasi_klarifikasi = '-';
									$PP[$i]->usulan_pemenang = '-';
									$PP[$i]->penetapan_pemenang	 = '-';								
									
									$PP[$i]->save();
								}
							}
							
							$total = count($_POST['perusahaan']);
							if(count($PP)<$total){
								$PPkurang = $total - count($PP);
								for($j=0;$j<$PPkurang;$j++){
									$PPbaru = new PenerimaPengadaan;
									$PPbaru->id_pengadaan = $Pengadaan->id_pengadaan;
									// $PPbaru->status = $_POST['status'][$j+$i];
									$PPbaru->perusahaan=$_POST['perusahaan'][$j+$i];	
									$PPbaru->alamat=$_POST['alamat'][$j+$i];
									$PPbaru->npwp=$_POST['npwp'][$j+$i];	
									$PPbaru->nilai = $_POST['nilai'][$j+$i];
									// $PPbaru->tahap = 'Penawaran Harga';	
									$PPbaru->undangan_prakualifikasi = '1';
									$PPbaru->ba_evaluasi_prakualifikasi = '1';
									$PPbaru->undangan_pengambilan_dokumen = '1';
									$PPbaru->ba_aanwijzing = '1';
									$PPbaru->pembukaan_penawaran_1 = '1';
									$PPbaru->evaluasi_penawaran_1 = '1';
									$PPbaru->pembukaan_penawaran_2 = '1';
									$PPbaru->evaluasi_penawaran_2 = $_POST['evaluasi_penawaran_2'][$i];			
									$PPbaru->negosiasi_klarifikasi = '-';
									$PPbaru->usulan_pemenang = '-';
									$PPbaru->penetapan_pemenang	 = '-';								
									$PPbaru->save();
								}
								
							}
						}
							
						$Dokumen2->tanggal=$Dokumen1->tanggal;
						if($Pengadaan->save(false)){
							if($Dokumen1->save(false)&&$Dokumen2->save(false)){
								if($BAEP->save(false)&&$DH->save(false)){
									$this->redirect(array('editberitaacaraevaluasipenawaran2','id'=>$Dokumen1->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('beritaacaraevaluasipenawaran2',array(
					'BAEP'=>$BAEP,'Dokumen1'=>$Dokumen1,'DH'=>$DH,'PP'=>$PP,'BAPP'=>$BAPP,
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
				
				$DokRKS=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "RKS"');
				$RKS=Rks::model()->findByPk($DokRKS->id_dokumen);
				
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
				date_default_timezone_set("Asia/Jakarta");
				$Dokumen0->tanggal=date('d-m-Y');
				
				$SUNK= new SuratUndanganNegosiasiKlarifikasi;
				$SUNK->id_dokumen=$Dokumen0->id_dokumen;
				$SUNK->perihal= 'Undangan Negosiasi dan Klarifikasi '.$Pengadaan->nama_pengadaan;
				$SUNK->tanggal_undangan=$RKS->tanggal_negosiasi;
				$SUNK->waktu=$RKS->waktu_negosiasi;
				$SUNK->tempat=$RKS->tempat_negosiasi;
				
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
				
				if($Pengadaan->metode_penawaran=="Satu Sampul") {
					$DokEval=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Evaluasi Penawaran"');
					$Eval=BeritaAcaraEvaluasiPenawaran::model()->findByPk($DokEval->id_dokumen);
					$this->render('suratundangannegosiasiklarifikasi',array(
						'SUNK'=>$SUNK,'Dokumen0'=>$Dokumen0,'Eval'=>$Eval,
					));
				} else if ($Pengadaan->metode_penawaran=="Dua Sampul"){
					$DokEval=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Evaluasi Penawaran Sampul Dua"');
					$Eval=BeritaAcaraEvaluasiPenawaran::model()->findByPk($DokEval->id_dokumen);
					$this->render('suratundangannegosiasiklarifikasi',array(
						'SUNK'=>$SUNK,'Dokumen0'=>$Dokumen0,'Eval'=>$Eval,
					));
				} else if ($Pengadaan->metode_penawaran=="Dua Sampul"){
					$DokEval=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Evaluasi Penawaran Tahap Dua"');
					$Eval=BeritaAcaraEvaluasiPenawaran::model()->findByPk($DokEval->id_dokumen);
					$this->render('suratundangannegosiasiklarifikasi',array(
						'SUNK'=>$SUNK,'Dokumen0'=>$Dokumen0,'Eval'=>$Eval,
					));
				}
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
				$Dokumen0->tanggal=Tanggal::getTanggalStrip($Dokumen0->tanggal);
				
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

				if($Pengadaan->metode_penawaran=="Satu Sampul") {
					$DokEval=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Evaluasi Penawaran"');
					$Eval=BeritaAcaraEvaluasiPenawaran::model()->findByPk($DokEval->id_dokumen);
					$this->render('suratundangannegosiasiklarifikasi',array(
						'SUNK'=>$SUNK,'Dokumen0'=>$Dokumen0,'Eval'=>$Eval,
					));
				} else if ($Pengadaan->metode_penawaran=="Dua Sampul"){
					$DokEval=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Evaluasi Penawaran Sampul Dua"');
					$Eval=BeritaAcaraEvaluasiPenawaran::model()->findByPk($DokEval->id_dokumen);
					$this->render('suratundangannegosiasiklarifikasi',array(
						'SUNK'=>$SUNK,'Dokumen0'=>$Dokumen0,'Eval'=>$Eval,
					));
				} else if ($Pengadaan->metode_penawaran=="Dua Sampul"){
					$DokEval=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Evaluasi Penawaran Tahap Dua"');
					$Eval=BeritaAcaraEvaluasiPenawaran::model()->findByPk($DokEval->id_dokumen);
					$this->render('suratundangannegosiasiklarifikasi',array(
						'SUNK'=>$SUNK,'Dokumen0'=>$Dokumen0,'Eval'=>$Eval,
					));
				}
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
				$Pengadaan->status ='14';
				
				$DokRKS=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "RKS"');
				$RKS=Rks::model()->findByPk($DokRKS->id_dokumen);
				
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
				$Dokumen1->tanggal=$RKS->tanggal_negosiasi;
				
				$Dokumen2=new Dokumen;
				$Dokumen2->id_dokumen=$somevariable+2;
				$Dokumen2->nama_dokumen='Daftar Hadir Negosiasi dan Klarifikasi';
				$Dokumen2->tempat='Jakarta';
				$Dokumen2->status_upload='Belum Selesai';
				$Dokumen2->id_pengadaan=$id;
				$Dokumen2->tanggal=$RKS->tanggal_negosiasi;
				
				$BANK= new BeritaAcaraNegosiasiKlarifikasi;
				$BANK->id_dokumen=$Dokumen1->id_dokumen;
				$BANK->surat_penawaran_harga='-';
				
				$DH= new DaftarHadir;
				$DH->id_dokumen=$Dokumen2->id_dokumen;
				$DH->acara="Negosiasi dan Klarifikasi";
				$DH->jam=$RKS->waktu_negosiasi;
				$DH->tempat_hadir=$RKS->tempat_negosiasi;
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);
				
				$PP = PenerimaPengadaan::model()->findAll('evaluasi_penawaran_2 = "1" and id_pengadaan = ' . $Pengadaan->id_pengadaan);
				
				if(isset($_POST['BeritaAcaraNegosiasiKlarifikasi']))
				{
					$BANK->attributes=$_POST['BeritaAcaraNegosiasiKlarifikasi'];
					$valid=$BANK->validate();
					if($valid){
					
						if(isset($_POST['perusahaan'])){
							
							for($i=0;$i<count($PP);$i++){
								if(isset($_POST['perusahaan'][$i])){
									
									$PP[$i]->perusahaan=$_POST['perusahaan'][$i];									
									// $PP[$i]->alamat='-';									
									// $PP[$i]->npwp='-';		
									// $PP[$i]->nilai = '-';
									// $PP[$i]->tahap = 'Penawaran Harga';		
									$PP[$i]->undangan_prakualifikasi = '1';
									$PP[$i]->ba_evaluasi_prakualifikasi = '1';
									$PP[$i]->undangan_pengambilan_dokumen = '1';			
									$PP[$i]->ba_aanwijzing = '1';
									$PP[$i]->pembukaan_penawaran_1 = '1';
									$PP[$i]->evaluasi_penawaran_1 = '1';
									$PP[$i]->pembukaan_penawaran_2 = '1';			
									$PP[$i]->evaluasi_penawaran_2 = '1';
									$PP[$i]->negosiasi_klarifikasi = $_POST['negosiasi_klarifikasi'][$i];
									$PP[$i]->usulan_pemenang = '-';
									$PP[$i]->penetapan_pemenang	 = '-';								
									
									$PP[$i]->save();
								}
							}
							
							$total = count($_POST['perusahaan']);
							if(count($PP)<$total){
								$PPkurang = $total - count($PP);
								for($j=0;$j<$PPkurang;$j++){
									$PPbaru = new PenerimaPengadaan;
									$PPbaru->id_pengadaan = $Pengadaan->id_pengadaan;
									// $PPbaru->status = $_POST['status'][$j+$i];
									$PPbaru->perusahaan=$_POST['perusahaan'][$j+$i];	
									// $PPbaru->alamat='-';									
									// $PPbaru->npwp='-';		
									// $PPbaru->nilai = '-';
									// $PPbaru->tahap = 'Penawaran Harga';	
									$PPbaru->undangan_prakualifikasi = '1';
									$PPbaru->ba_evaluasi_prakualifikasi = '1';
									$PPbaru->undangan_pengambilan_dokumen = '1';
									$PPbaru->ba_aanwijzing = '1';
									$PPbaru->pembukaan_penawaran_1 = '1';
									$PPbaru->evaluasi_penawaran_1 = '1';
									$PPbaru->pembukaan_penawaran_2 = '1';			
									$PPbaru->evaluasi_penawaran_2 = '1';
									$PPbaru->negosiasi_klarifikasi = $_POST['negosiasi_klarifikasi'][$i+$j];
									$PPbaru->usulan_pemenang = '-';
									$PPbaru->penetapan_pemenang	 = '-';								
									$PPbaru->save();
								}
								
							}
							
						}
						
						if($Pengadaan->save(false)){
							if($Dokumen1->save(false)&&$Dokumen2->save(false)){
								if($BANK->save(false)&&$DH->save(false)){
									$this->redirect(array('editberitaacaranegosiasiklarifikasi','id'=>$Dokumen1->id_pengadaan));
								}
							}
						}
					}
				}
				if (Dokumen::model()->find('id_pengadaan = ' .$id. ' and nama_dokumen = "Surat Undangan Negosiasi dan Klarifikasi"') == null) {
					if($Pengadaan->metode_penawaran=="Satu Sampul") {
						$DokEval=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Evaluasi Penawaran"');
						$Eval=BeritaAcaraEvaluasiPenawaran::model()->findByPk($DokEval->id_dokumen);
						$this->render('beritaacaranegosiasiklarifikasi',array(
							'BANK'=>$BANK,'Eval'=>$Eval,'PP'=>$PP,
						));
					} else if ($Pengadaan->metode_penawaran=="Dua Sampul"){
						$DokEval=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Evaluasi Penawaran Sampul Dua"');
						$Eval=BeritaAcaraEvaluasiPenawaran::model()->findByPk($DokEval->id_dokumen);
						$this->render('beritaacaranegosiasiklarifikasi',array(
							'BANK'=>$BANK,'Eval'=>$Eval,'PP'=>$PP,
						));
					} else if ($Pengadaan->metode_penawaran=="Dua Sampul"){
						$DokEval=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Evaluasi Penawaran Tahap Dua"');
						$Eval=BeritaAcaraEvaluasiPenawaran::model()->findByPk($DokEval->id_dokumen);
						$this->render('beritaacaranegosiasiklarifikasi',array(
							'BANK'=>$BANK,'Eval'=>$Eval,'PP'=>$PP,
						));
					}
				} else {
					$DokSUNK=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Negosiasi dan Klarifikasi"');
					$SUNK=SuratUndanganNegosiasiKlarifikasi::model()->findByPk($DokSUNK->id_dokumen);
					$this->render('beritaacaranegosiasiklarifikasi',array(
						'BANK'=>$BANK,'SUNK'=>$SUNK,'PP'=>$PP,
					));
				}
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

				$PP = PenerimaPengadaan::model()->findAll('negosiasi_klarifikasi = "1" and id_pengadaan = ' . $Pengadaan->id_pengadaan);
				
				if(isset($_POST['BeritaAcaraNegosiasiKlarifikasi']))
				{
					// $Dokumen0->attributes=$_POST['Dokumen'];
					
					$BANK->attributes=$_POST['BeritaAcaraNegosiasiKlarifikasi'];
					$valid=$BANK->validate();					
					if($valid){				
						
						if(isset($_POST['perusahaan'])){
							
							for($i=0;$i<count($PP);$i++){
								if(isset($_POST['perusahaan'][$i])){
									
									$PP[$i]->perusahaan=$_POST['perusahaan'][$i];									
									// $PP[$i]->alamat='-';									
									// $PP[$i]->npwp='-';		
									// $PP[$i]->nilai = '-';
									// $PP[$i]->tahap = 'Penawaran Harga';		
									$PP[$i]->undangan_prakualifikasi = '1';
									$PP[$i]->ba_evaluasi_prakualifikasi = '1';
									$PP[$i]->undangan_pengambilan_dokumen = '1';			
									$PP[$i]->ba_aanwijzing = '1';
									$PP[$i]->pembukaan_penawaran_1 = '1';
									$PP[$i]->evaluasi_penawaran_1 = '1';
									$PP[$i]->pembukaan_penawaran_2 = '1';			
									$PP[$i]->evaluasi_penawaran_2 = '1';
									$PP[$i]->negosiasi_klarifikasi = $_POST['negosiasi_klarifikasi'][$i];
									$PP[$i]->usulan_pemenang = '-';
									$PP[$i]->penetapan_pemenang	 = '-';								
									
									$PP[$i]->save();
								}
							}
							
							$total = count($_POST['perusahaan']);
							if(count($PP)<$total){
								$PPkurang = $total - count($PP);
								for($j=0;$j<$PPkurang;$j++){
									$PPbaru = new PenerimaPengadaan;
									$PPbaru->id_pengadaan = $Pengadaan->id_pengadaan;
									// $PPbaru->status = $_POST['status'][$j+$i];
									$PPbaru->perusahaan=$_POST['perusahaan'][$j+$i];	
									// $PPbaru->alamat='-';									
									// $PPbaru->npwp='-';		
									// $PPbaru->nilai = '-';
									// $PPbaru->tahap = 'Penawaran Harga';	
									$PPbaru->undangan_prakualifikasi = '1';
									$PPbaru->ba_evaluasi_prakualifikasi = '1';
									$PPbaru->undangan_pengambilan_dokumen = '1';
									$PPbaru->ba_aanwijzing = '1';
									$PPbaru->pembukaan_penawaran_1 = '1';
									$PPbaru->evaluasi_penawaran_1 = '1';
									$PPbaru->pembukaan_penawaran_2 = '1';			
									$PPbaru->evaluasi_penawaran_2 = '1';
									$PPbaru->negosiasi_klarifikasi = $_POST['negosiasi_klarifikasi'][$i+$j];
									$PPbaru->usulan_pemenang = '-';
									$PPbaru->penetapan_pemenang	 = '-';								
									$PPbaru->save();
								}
								
							}
							
						}
						
						if($BANK->save(false)&&$DH->save(false)){
							$this->redirect(array('editberitaacaranegosiasiklarifikasi','id'=>$Dokumen1->id_pengadaan));
						}
						
					}
				}

				if (Dokumen::model()->find('id_pengadaan = ' .$id. ' and nama_dokumen = "Surat Undangan Negosiasi dan Klarifikasi"') == null) {
					if($Pengadaan->metode_penawaran=="Satu Sampul") {
						$DokEval=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Evaluasi Penawaran"');
						$Eval=BeritaAcaraEvaluasiPenawaran::model()->findByPk($DokEval->id_dokumen);
						$this->render('beritaacaranegosiasiklarifikasi',array(
							'BANK'=>$BANK, 'DH'=>$DH, 'Eval'=>$Eval,'PP'=>$PP,
						));
					} else if ($Pengadaan->metode_penawaran=="Dua Sampul"){
						$DokEval=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Evaluasi Penawaran Sampul Dua"');
						$Eval=BeritaAcaraEvaluasiPenawaran::model()->findByPk($DokEval->id_dokumen);
						$this->render('beritaacaranegosiasiklarifikasi',array(
							'BANK'=>$BANK, 'DH'=>$DH, 'Eval'=>$Eval,'PP'=>$PP,
						));
					} else if ($Pengadaan->metode_penawaran=="Dua Sampul"){
						$DokEval=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Evaluasi Penawaran Tahap Dua"');
						$Eval=BeritaAcaraEvaluasiPenawaran::model()->findByPk($DokEval->id_dokumen);
						$this->render('beritaacaranegosiasiklarifikasi',array(
							'BANK'=>$BANK, 'DH'=>$DH, 'Eval'=>$Eval,'PP'=>$PP,
						));
					}
				} else {
					$DokSUNK=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Negosiasi dan Klarifikasi"');
					$SUNK=SuratUndanganNegosiasiKlarifikasi::model()->findByPk($DokSUNK->id_dokumen);
					$this->render('beritaacaranegosiasiklarifikasi',array(
							'BANK'=>$BANK, 'DH'=>$DH, 'SUNK'=>$SUNK,'PP'=>$PP,
					));
				}
			}
		}
	}
	
	public function actionNotadinasusulanpemenang()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				$Pengadaan->status ='15';
				
				$Panitia=Panitia::model()->findByPk($Pengadaan->id_panitia);
				
				$DokBANK=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Negosiasi dan Klarifikasi"');				
				$BANK=BeritaAcaraNegosiasiKlarifikasi::model()->findByPk($DokBANK->id_dokumen);
				
				$Dokumen0= new Dokumen;
				$criteria=new CDbcriteria;
				$criteria->select='max(id_dokumen) AS maxId';
				$row = $Dokumen0->model()->find($criteria);
				$somevariable = $row['maxId'];
				$Dokumen0->id_dokumen=$somevariable+1;
				$Dokumen0->nama_dokumen='Nota Dinas Usulan Pemenang';
				$Dokumen0->tempat='Jakarta';
				$Dokumen0->status_upload='Belum Selesai';
				$Dokumen0->id_pengadaan=$id;
				date_default_timezone_set("Asia/Jakarta");
				$Dokumen0->tanggal=date('d-m-Y');
				
				$Dokumen1= new Dokumen;
				$Dokumen1->id_dokumen=$somevariable+2;
				if ($Panitia->jenis_panitia == 'Panitia'){
					$Dokumen1->nama_dokumen='Pakta Integritas Akhir Panitia';
				} else if ($Panitia->jenis_panitia == 'Pejabat'){
					$Dokumen1->nama_dokumen='Pakta Integritas Akhir Pejabat';
				}
				$Dokumen1->tempat='Jakarta';
				$Dokumen1->status_upload='Belum Selesai';
				$Dokumen1->id_pengadaan=$id;
				
				$NDUP= new NotaDinasUsulanPemenang;
				$NDUP->id_dokumen=$Dokumen0->id_dokumen;
				
				$PIP2= new PaktaIntegritasPanitia2;
				$PIP2->id_dokumen=$Dokumen1->id_dokumen;
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				$PP = PenerimaPengadaan::model()->findAll('negosiasi_klarifikasi = "1" and id_pengadaan = ' . $Pengadaan->id_pengadaan);
				
				if(isset($_POST['NotaDinasUsulanPemenang']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$NDUP->attributes=$_POST['NotaDinasUsulanPemenang'];
					$NDUP->waktu_pelaksanaan=date('Y-m-d',strtotime($NDUP->waktu_pelaksanaan));
					$valid=$NDUP->validate();
					$valid=$valid&&$Dokumen0->validate();
					if($valid){
					
						if(isset($_POST['perusahaan'])){
							
							for($i=0;$i<count($PP);$i++){
								if(isset($_POST['perusahaan'][$i])){
									
									$PP[$i]->perusahaan=$_POST['perusahaan'][$i];									
									$PP[$i]->alamat=$_POST['alamat'][$i];									
									$PP[$i]->npwp=$_POST['npwp'][$i];	
									$PP[$i]->nilai = $_POST['nilai'][$i];
									// $PP[$i]->tahap = 'Penawaran Harga';		
									$PP[$i]->undangan_prakualifikasi = '1';
									$PP[$i]->ba_evaluasi_prakualifikasi = '1';
									$PP[$i]->undangan_pengambilan_dokumen = '1';			
									$PP[$i]->ba_aanwijzing = '1';
									$PP[$i]->pembukaan_penawaran_1 = '1';
									$PP[$i]->evaluasi_penawaran_1 = '1';
									$PP[$i]->pembukaan_penawaran_2 = '1';			
									$PP[$i]->evaluasi_penawaran_2 = '1';
									$PP[$i]->negosiasi_klarifikasi = '1';
									$PP[$i]->usulan_pemenang = $_POST['usulan_pemenang'][$i];
									$PP[$i]->penetapan_pemenang	 = '-';								
									
									$PP[$i]->save();
								}
							}
							
							$total = count($_POST['perusahaan']);
							if(count($PP)<$total){
								$PPkurang = $total - count($PP);
								for($j=0;$j<$PPkurang;$j++){
									$PPbaru = new PenerimaPengadaan;
									$PPbaru->id_pengadaan = $Pengadaan->id_pengadaan;
									// $PPbaru->status = $_POST['status'][$j+$i];
									$PPbaru->perusahaan=$_POST['perusahaan'][$j+$i];	
									$PPbaru->alamat=$_POST['alamat'][$j+$i];								
									$PPbaru->npwp=$_POST['npwp'][$j+$i];	
									$PPbaru->nilai = $_POST['nilai'][$j+$i];
									// $PPbaru->tahap = 'Penawaran Harga';	
									$PPbaru->undangan_prakualifikasi = '1';
									$PPbaru->ba_evaluasi_prakualifikasi = '1';
									$PPbaru->undangan_pengambilan_dokumen = '1';
									$PPbaru->ba_aanwijzing = '1';
									$PPbaru->pembukaan_penawaran_1 = '1';
									$PPbaru->evaluasi_penawaran_1 = '1';
									$PPbaru->pembukaan_penawaran_2 = '1';			
									$PPbaru->evaluasi_penawaran_2 = '1';
									$PPbaru->negosiasi_klarifikasi = '1';
									$PPbaru->usulan_pemenang = $_POST['usulan_pemenang'][$i+$j];
									$PPbaru->penetapan_pemenang	 = '-';								
									$PPbaru->save();
								}
								
							}
							
						}
						
						$Dokumen1->tanggal=$Dokumen0->tanggal;
						if($Pengadaan->save(false))
						{	
							if($Dokumen0->save(false)&&$Dokumen1->save(false)){
								if($NDUP->save(false)&&$PIP2->save(false)){
									$this->redirect(array('editnotadinasusulanpemenang','id'=>$Dokumen0->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('notadinasusulanpemenang',array(
					'NDUP'=>$NDUP,'Dokumen0'=>$Dokumen0,'PP'=>$PP,'BANK'=>$BANK,
				));

			}
		}
	}
	
	public function actionEditNotadinasusulanpemenang()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				$Panitia=Panitia::model()->findByPk($Pengadaan->id_panitia);
				
				$DokBANK=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Negosiasi dan Klarifikasi"');				
				$BANK=BeritaAcaraNegosiasiKlarifikasi::model()->findByPk($DokBANK->id_dokumen);
				
				$Dokumen0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Nota Dinas Usulan Pemenang"');
				if ($Panitia->jenis_panitia == 'Panitia'){
					$Dokumen1=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Pakta Integritas Akhir Panitia"');
				} else if ($Panitia->jenis_panitia == 'Pejabat'){
					$Dokumen1=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Pakta Integritas Akhir Pejabat"');
				}
				$Dokumen0->tanggal=Tanggal::getTanggalStrip($Dokumen0->tanggal);
				
				$NDUP=NotaDinasUsulanPemenang::model()->findByPk($Dokumen0->id_dokumen);
				$NDUP->waktu_pelaksanaan=Tanggal::getTanggalStrip($NDUP->waktu_pelaksanaan);
				$PIP2=PaktaIntegritasPanitia2::model()->findByPk($Dokumen1->id_dokumen);
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				$PP = PenerimaPengadaan::model()->findAll('usulan_pemenang = "1" and id_pengadaan = ' . $Pengadaan->id_pengadaan);
				
				if(isset($_POST['NotaDinasUsulanPemenang']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$NDUP->attributes=$_POST['NotaDinasUsulanPemenang'];
					$valid=$NDUP->validate();
					$valid=$valid&&$Dokumen0->validate();
					if($valid){
					
						if(isset($_POST['perusahaan'])){
							
							for($i=0;$i<count($PP);$i++){
								if(isset($_POST['perusahaan'][$i])){
									
									$PP[$i]->perusahaan=$_POST['perusahaan'][$i];									
									$PP[$i]->alamat=$_POST['alamat'][$i];									
									$PP[$i]->npwp=$_POST['npwp'][$i];			
									$PP[$i]->nilai = $_POST['nilai'][$i];	
									// $PP[$i]->tahap = 'Penawaran Harga';		
									$PP[$i]->undangan_prakualifikasi = '1';
									$PP[$i]->ba_evaluasi_prakualifikasi = '1';
									$PP[$i]->undangan_pengambilan_dokumen = '1';			
									$PP[$i]->ba_aanwijzing = '1';
									$PP[$i]->pembukaan_penawaran_1 = '1';
									$PP[$i]->evaluasi_penawaran_1 = '1';
									$PP[$i]->pembukaan_penawaran_2 = '1';			
									$PP[$i]->evaluasi_penawaran_2 = '1';
									$PP[$i]->negosiasi_klarifikasi = '1';
									$PP[$i]->usulan_pemenang = $_POST['usulan_pemenang'][$i];
									$PP[$i]->penetapan_pemenang	 = '-';								
									
									$PP[$i]->save();
								}
							}
							
							$total = count($_POST['perusahaan']);
							if(count($PP)<$total){
								$PPkurang = $total - count($PP);
								for($j=0;$j<$PPkurang;$j++){
									$PPbaru = new PenerimaPengadaan;
									$PPbaru->id_pengadaan = $Pengadaan->id_pengadaan;
									// $PPbaru->status = $_POST['status'][$j+$i];
									$PPbaru->perusahaan=$_POST['perusahaan'][$j+$i];	
									$PPbaru->alamat=$_POST['alamat'][$j+$i];									
									$PPbaru->npwp=$_POST['npwp'][$j+$i];	
									$PPbaru->nilai = $_POST['nilai'][$j+$i];
									// $PPbaru->tahap = 'Penawaran Harga';	
									$PPbaru->undangan_prakualifikasi = '1';
									$PPbaru->ba_evaluasi_prakualifikasi = '1';
									$PPbaru->undangan_pengambilan_dokumen = '1';
									$PPbaru->ba_aanwijzing = '1';
									$PPbaru->pembukaan_penawaran_1 = '1';
									$PPbaru->evaluasi_penawaran_1 = '1';
									$PPbaru->pembukaan_penawaran_2 = '1';			
									$PPbaru->evaluasi_penawaran_2 = '1';
									$PPbaru->negosiasi_klarifikasi = '1';
									$PPbaru->usulan_pemenang = $_POST['usulan_pemenang'][$i+$j];
									$PPbaru->penetapan_pemenang	 = '-';								
									$PPbaru->save();
								}
								
							}
							
						}
						
						$Dokumen1->tanggal=$Dokumen0->tanggal;
						if($Pengadaan->save(false))
						{	
							if($Dokumen0->save(false)&&$Dokumen1->save(false)){
								if($NDUP->save(false)&&$PIP2->save(false)){
									$this->redirect(array('editnotadinasusulanpemenang','id'=>$Dokumen0->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('notadinasusulanpemenang',array(
					'NDUP'=>$NDUP,'Dokumen0'=>$Dokumen0,'PIP2'=>$PIP2,'PP'=>$PP,'BANK'=>$BANK,
				));

			}
		}
	}
	
	public function actionNotadinaspenetapanpemenang()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				if ($Pengadaan->metode_pengadaan == 'Penunjukan Langsung'){
					$Pengadaan->status ='18';
				} else if ($Pengadaan->metode_pengadaan == 'Pemilihan Langsung'){
					$Pengadaan->status ='16';
				} else if ($Pengadaan->metode_pengadaan == 'Pelelangan'){
					$Pengadaan->status ='17';
				}
				
				$DokNDUP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Nota Dinas Usulan Pemenang"');
				$NDUP=NotaDinasUsulanPemenang::model()->findByPk($DokNDUP->id_dokumen);
				
				$Dokumen0= new Dokumen;
				$criteria=new CDbcriteria;
				$criteria->select='max(id_dokumen) AS maxId';
				$row = $Dokumen0->model()->find($criteria);
				$somevariable = $row['maxId'];
				$Dokumen0->id_dokumen=$somevariable+1;
				$Dokumen0->nama_dokumen='Nota Dinas Penetapan Pemenang';
				$Dokumen0->tempat='Jakarta';
				$Dokumen0->status_upload='Belum Selesai';
				$Dokumen0->id_pengadaan=$id;
				date_default_timezone_set("Asia/Jakarta");
				$Dokumen0->tanggal=date('d-m-Y');
				
				$NDPP= new NotaDinasPenetapanPemenang;
				$NDPP->id_dokumen=$Dokumen0->id_dokumen;
								
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				$PP = PenerimaPengadaan::model()->findAll('usulan_pemenang = "1" and id_pengadaan = ' . $Pengadaan->id_pengadaan);
				
				if(isset($_POST['NotaDinasPenetapanPemenang']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$NDPP->attributes=$_POST['NotaDinasPenetapanPemenang'];
					$valid=$NDPP->validate();
					$valid=$valid&&$Dokumen0->validate();
					if($valid){
					
						if(isset($_POST['perusahaan'])){
							
							for($i=0;$i<count($PP);$i++){
								if(isset($_POST['perusahaan'][$i])){
									
									$PP[$i]->perusahaan=$_POST['perusahaan'][$i];									
									$PP[$i]->alamat=$_POST['alamat'][$i];									
									$PP[$i]->npwp=$_POST['npwp'][$i];		
									$PP[$i]->nilai = $_POST['nilai'][$i];
									// $PP[$i]->tahap = 'Penawaran Harga';		
									$PP[$i]->undangan_prakualifikasi = '1';
									$PP[$i]->ba_evaluasi_prakualifikasi = '1';
									$PP[$i]->undangan_pengambilan_dokumen = '1';			
									$PP[$i]->ba_aanwijzing = '1';	
									$PP[$i]->pembukaan_penawaran_1 = '1';	
									$PP[$i]->evaluasi_penawaran_1 = '1';	
									$PP[$i]->pembukaan_penawaran_2 = '1';			
									$PP[$i]->evaluasi_penawaran_2 = '1';	
									$PP[$i]->negosiasi_klarifikasi = '1';	
									$PP[$i]->usulan_pemenang = '1';	
									$PP[$i]->penetapan_pemenang	 = $_POST['penetapan_pemenang'][$i];						
									
									$PP[$i]->save();
								}
							}
							
							$total = count($_POST['perusahaan']);
							if(count($PP)<$total){
								$PPkurang = $total - count($PP);
								for($j=0;$j<$PPkurang;$j++){
									$PPbaru = new PenerimaPengadaan;
									$PPbaru->id_pengadaan = $Pengadaan->id_pengadaan;
									// $PPbaru->status = $_POST['status'][$j+$i];
									$PPbaru->perusahaan=$_POST['perusahaan'][$j+$i];	
									$PPbaru->alamat=$_POST['alamat'][$j+$i];										
									$PPbaru->npwp=$_POST['npwp'][$j+$i];			
									$PPbaru->nilai = $_POST['nilai'][$j+$i];	
									// $PPbaru->tahap = 'Penawaran Harga';	
									$PPbaru->undangan_prakualifikasi = '1';
									$PPbaru->ba_evaluasi_prakualifikasi = '1';
									$PPbaru->undangan_pengambilan_dokumen = '1';
									$PPbaru->ba_aanwijzing = '1';
									$PPbaru->pembukaan_penawaran_1 = '1';
									$PPbaru->evaluasi_penawaran_1 = '1';
									$PPbaru->pembukaan_penawaran_2 = '1';			
									$PPbaru->evaluasi_penawaran_2 = '1';
									$PPbaru->negosiasi_klarifikasi = '1';
									$PPbaru->usulan_pemenang = '1';
									$PPbaru->penetapan_pemenang	 = $_POST['penetapan_pemenang'][$i+$j];					
									$PPbaru->save();
								}
								
							}
							
						}
						
						if($Pengadaan->save(false))
						{	
							if($Dokumen0->save(false)){
								if($NDPP->save(false)){
									$this->redirect(array('editnotadinaspenetapanpemenang','id'=>$Dokumen0->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('notadinaspenetapanpemenang',array(
					'NDPP'=>$NDPP,'Dokumen0'=>$Dokumen0,'NDUP'=>$NDUP,'PP'=>$PP,
				));

			}
		}
	}
	
	public function actionEditNotadinaspenetapanpemenang()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				
				$DokNDUP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Nota Dinas Usulan Pemenang"');
				$NDUP=NotaDinasUsulanPemenang::model()->findByPk($DokNDUP->id_dokumen);
				
				$Dokumen0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Nota Dinas Penetapan Pemenang"');
				$Dokumen0->tanggal=Tanggal::getTanggalStrip($Dokumen0->tanggal);
				$NDPP=NotaDinasPenetapanPemenang::model()->findByPk($Dokumen0->id_dokumen);
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				$PP = PenerimaPengadaan::model()->findAll('penetapan_pemenang = "1" and id_pengadaan = ' . $Pengadaan->id_pengadaan);
				
				if(isset($_POST['NotaDinasPenetapanPemenang']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$NDPP->attributes=$_POST['NotaDinasPenetapanPemenang'];
					$valid=$NDPP->validate();
					$valid=$valid&&$Dokumen0->validate();
					if($valid){
					
						if(isset($_POST['perusahaan'])){
							
							for($i=0;$i<count($PP);$i++){
								if(isset($_POST['perusahaan'][$i])){
									
									$PP[$i]->perusahaan=$_POST['perusahaan'][$i];									
									$PP[$i]->alamat=$_POST['alamat'][$i];										
									$PP[$i]->npwp=$_POST['npwp'][$i];		
									$PP[$i]->nilai = $_POST['nilai'][$i];	
									// $PP[$i]->tahap = 'Penawaran Harga';		
									$PP[$i]->undangan_prakualifikasi = '1';
									$PP[$i]->ba_evaluasi_prakualifikasi = '1';
									$PP[$i]->undangan_pengambilan_dokumen = '1';			
									$PP[$i]->ba_aanwijzing = '1';	
									$PP[$i]->pembukaan_penawaran_1 = '1';	
									$PP[$i]->evaluasi_penawaran_1 = '1';	
									$PP[$i]->pembukaan_penawaran_2 = '1';			
									$PP[$i]->evaluasi_penawaran_2 = '1';	
									$PP[$i]->negosiasi_klarifikasi = '1';	
									$PP[$i]->usulan_pemenang = '1';	
									$PP[$i]->penetapan_pemenang	 = $_POST['penetapan_pemenang'][$i];						
									
									$PP[$i]->save();
								}
							}
							
							$total = count($_POST['perusahaan']);
							if(count($PP)<$total){
								$PPkurang = $total - count($PP);
								for($j=0;$j<$PPkurang;$j++){
									$PPbaru = new PenerimaPengadaan;
									$PPbaru->id_pengadaan = $Pengadaan->id_pengadaan;
									// $PPbaru->status = $_POST['status'][$j+$i];
									$PPbaru->perusahaan=$_POST['perusahaan'][$j+$i];	
									$PPbaru->alamat=$_POST['alamat'][$j+$i];										
									$PPbaru->npwp=$_POST['npwp'][$j+$i];			
									$PPbaru->nilai = $_POST['nilai'][$j+$i];	
									// $PPbaru->tahap = 'Penawaran Harga';	
									$PPbaru->undangan_prakualifikasi = '1';
									$PPbaru->ba_evaluasi_prakualifikasi = '1';
									$PPbaru->undangan_pengambilan_dokumen = '1';
									$PPbaru->ba_aanwijzing = '1';
									$PPbaru->pembukaan_penawaran_1 = '1';
									$PPbaru->evaluasi_penawaran_1 = '1';
									$PPbaru->pembukaan_penawaran_2 = '1';			
									$PPbaru->evaluasi_penawaran_2 = '1';
									$PPbaru->negosiasi_klarifikasi = '1';
									$PPbaru->usulan_pemenang = '1';
									$PPbaru->penetapan_pemenang	 = $_POST['penetapan_pemenang'][$i+$j];					
									$PPbaru->save();
								}
								
							}
							
						}
						
						if($Pengadaan->save(false))
						{	
							if($Dokumen0->save(false)){
								if($NDPP->save(false)){
									$this->redirect(array('editnotadinaspenetapanpemenang','id'=>$Dokumen0->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('notadinaspenetapanpemenang',array(
					'NDPP'=>$NDPP,'Dokumen0'=>$Dokumen0,'NDUP'=>$NDUP,'PP'=>$PP,
				));

			}
		}
	}
	
	public function actionNotadinaspemberitahuanpemenang()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				$Pengadaan->status ='18';
				
				$DokNDPP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Nota Dinas Penetapan Pemenang"');
				$NDPP=NotaDinasPenetapanPemenang::model()->findByPk($DokNDPP->id_dokumen);
				
				$Dokumen0= new Dokumen;
				$criteria=new CDbcriteria;
				$criteria->select='max(id_dokumen) AS maxId';
				$row = $Dokumen0->model()->find($criteria);
				$somevariable = $row['maxId'];
				$Dokumen0->id_dokumen=$somevariable+1;
				$Dokumen0->nama_dokumen='Nota Dinas Pemberitahuan Pemenang';
				$Dokumen0->tempat='Jakarta';
				$Dokumen0->status_upload='Belum Selesai';
				$Dokumen0->id_pengadaan=$id;
				date_default_timezone_set("Asia/Jakarta");
				$Dokumen0->tanggal=date('d-m-Y');
				
				$NDBP= new NotaDinasPemberitahuanPemenang;
				$NDBP->id_dokumen=$Dokumen0->id_dokumen;
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['NotaDinasPemberitahuanPemenang']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$NDBP->attributes=$_POST['NotaDinasPemberitahuanPemenang'];
					$NDBP->waktu_pelaksanaan=date('Y-m-d',strtotime($NDBP->waktu_pelaksanaan));
					$valid=$NDBP->validate();
					$valid=$valid&&$Dokumen0->validate();
					if($valid){
						if($Pengadaan->save(false))
						{	
							if($Dokumen0->save(false)){
								if($NDBP->save(false)){
									$this->redirect(array('editnotadinaspemberitahuanpemenang','id'=>$Dokumen0->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('notadinaspemberitahuanpemenang',array(
					'NDBP'=>$NDBP,'Dokumen0'=>$Dokumen0,'NDPP'=>$NDPP,
				));

			}
		}
	}
	
	public function actionEditNotadinaspemberitahuanpemenang()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				
				$DokNDPP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Nota Dinas Penetapan Pemenang"');
				$NDPP=NotaDinasPenetapanPemenang::model()->findByPk($DokNDPP->id_dokumen);
				
				$Dokumen0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Nota Dinas Pemberitahuan Pemenang"');
				$Dokumen0->tanggal=Tanggal::getTanggalStrip($Dokumen0->tanggal);
				$NDBP=NotaDinasPemberitahuanPemenang::model()->findByPk($Dokumen0->id_dokumen);
				$NDBP->waktu_pelaksanaan=Tanggal::getTanggalStrip($NDBP->waktu_pelaksanaan);
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['NotaDinasPemberitahuanPemenang']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$NDBP->attributes=$_POST['NotaDinasPemberitahuanPemenang'];
					$valid=$NDBP->validate();
					$valid=$valid&&$Dokumen0->validate();
					if($valid){
						if($Pengadaan->save(false))
						{	
							if($Dokumen0->save(false)){
								if($NDBP->save(false)){
									$this->redirect(array('editnotadinaspemberitahuanpemenang','id'=>$Dokumen0->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('notadinaspemberitahuanpemenang',array(
					'NDBP'=>$NDBP,'Dokumen0'=>$Dokumen0,'NDPP'=>$NDPP
				));

			}
		}
	}
	
	public function actionSuratpengumumanpelelangan()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				$Pengadaan->status ='18';
				
				$DokNDPP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Nota Dinas Penetapan Pemenang"');
				$NDPP=NotaDinasPenetapanPemenang::model()->findByPk($DokNDPP->id_dokumen);
				
				$Dokumen0= new Dokumen;
				$criteria=new CDbcriteria;
				$criteria->select='max(id_dokumen) AS maxId';
				$row = $Dokumen0->model()->find($criteria);
				$somevariable = $row['maxId'];
				$Dokumen0->id_dokumen=$somevariable+1;
				$Dokumen0->nama_dokumen='Surat Pengumuman Pelelangan';
				$Dokumen0->tempat='Jakarta';
				$Dokumen0->status_upload='Belum Selesai';
				$Dokumen0->id_pengadaan=$id;
				date_default_timezone_set("Asia/Jakarta");
				$Dokumen0->tanggal=date('d-m-Y');
				
				$SPP= new SuratPengumumanPelelangan;
				$SPP->id_dokumen=$Dokumen0->id_dokumen;
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['SuratPengumumanPelelangan']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SPP->attributes=$_POST['SuratPengumumanPelelangan'];
					$valid=$SPP->validate();
					$valid=$valid&&$Dokumen0->validate();
					if($valid){
						if($Pengadaan->save(false))
						{	
							if($Dokumen0->save(false)){
								if($SPP->save(false)){
									$this->redirect(array('editsuratpengumumanpelelangan','id'=>$Dokumen0->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('suratpengumumanpelelangan',array(
					'SPP'=>$SPP,'Dokumen0'=>$Dokumen0,'NDPP'=>$NDPP,
				));

			}
		}
	}
	
	public function actionEditSuratpengumumanpelelangan()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				
				$DokNDPP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Nota Dinas Penetapan Pemenang"');
				$NDPP=NotaDinasPenetapanPemenang::model()->findByPk($DokNDPP->id_dokumen);
				
				$Dokumen0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Pengumuman Pelelangan"');
				$Dokumen0->tanggal=Tanggal::getTanggalStrip($Dokumen0->tanggal);
				$SPP=SuratPengumumanPelelangan::model()->findByPk($Dokumen0->id_dokumen);
				
				
				if(isset($_POST['SuratPengumumanPelelangan']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SPP->attributes=$_POST['SuratPengumumanPelelangan'];
					$valid=$SPP->validate();
					$valid=$valid&&$Dokumen0->validate();
					if($valid){
						if($Pengadaan->save(false))
						{	
							if($Dokumen0->save(false)){
								if($SPP->save(false)){
									$this->redirect(array('editsuratpengumumanpelelangan','id'=>$Dokumen0->id_pengadaan));
								}
							}
						}
					}
				}

				$this->render('suratpengumumanpelelangan',array(
					'SPP'=>$SPP,'Dokumen0'=>$Dokumen0,'NDPP'=>$NDPP,
				));

			}
		}
	}
	
	public function actionSuratpenunjukanpemenang()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				$Pengadaan->status ='19';
				
				$Dokumen0= new Dokumen;
				$criteria=new CDbcriteria;
				$criteria->select='max(id_dokumen) AS maxId';
				$row = $Dokumen0->model()->find($criteria);
				$somevariable = $row['maxId'];
				$Dokumen0->id_dokumen=$somevariable+1;
				$Dokumen0->nama_dokumen='Surat Penunjukan Pemenang';
				$Dokumen0->tempat='Jakarta';
				$Dokumen0->status_upload='Belum Selesai';
				$Dokumen0->id_pengadaan=$id;
				date_default_timezone_set("Asia/Jakarta");
				$Dokumen0->tanggal=date('d-m-Y');
				
				$SPPM= new SuratPenunjukanPemenang;
				$SPPM->id_dokumen=$Dokumen0->id_dokumen;
				if ($Pengadaan->metode_pengadaan == 'Penunjukan Langsung' || $Pengadaan->metode_pengadaan == 'Pemilihan Langsung'){
					$SPPM->jaminan='0';
					$SPPM->nomor_ski='-';
					$SPPM->tanggal_ski='-';
					$SPPM->no_ski='-';
				}
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['SuratPenunjukanPemenang']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SPPM->attributes=$_POST['SuratPenunjukanPemenang'];
					$valid=$SPPM->validate();
					$valid=$valid&&$Dokumen0->validate();
					if($valid){
						// $Pengadaan->nama_penyedia=$SPPM->nama_penyedia;
						if($Pengadaan->save(false))
						{	
							if($Dokumen0->save(false)){
								if($SPPM->save(false)){
									$this->redirect(array('editsuratpenunjukanpemenang','id'=>$Dokumen0->id_pengadaan));
								}
							}
						}
					}
				}
				if($Pengadaan->metode_pengadaan=="Penunjukan Langsung") {
					$DokNDPP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Nota Dinas Penetapan Pemenang"');
					$NDPP=NotaDinasPenetapanPemenang::model()->findByPk($DokNDPP->id_dokumen);
					$this->render('suratpenunjukanpemenang',array(
						'SPPM'=>$SPPM,'Dokumen0'=>$Dokumen0,'NDPP'=>$NDPP,
					));
				} else if ($Pengadaan->metode_pengadaan=="Pemilihan Langsung") {
					$DokNDBP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Nota Dinas Pemberitahuan Pemenang"');
					$NDBP=NotaDinasPemberitahuanPemenang::model()->findByPk($DokNDBP->id_dokumen);
					$this->render('suratpenunjukanpemenang',array(
						'SPPM'=>$SPPM,'Dokumen0'=>$Dokumen0,'NDBP'=>$NDBP,
					));
				} else if ($Pengadaan->metode_pengadaan=="Pelelangan") {
					$DokSPP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Pengumuman Pelelangan"');
					$SPP=SuratPengumumanPelelangan::model()->findByPk($DokSPP->id_dokumen);
					$this->render('suratpenunjukanpemenang',array(
						'SPPM'=>$SPPM,'Dokumen0'=>$Dokumen0,'SPP'=>$SPP,
					));
				}
			}
		}
	}
	
	public function actionEditSuratpenunjukanpemenang()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				
				$Dokumen0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Penunjukan Pemenang"');
				$Dokumen0->tanggal=Tanggal::getTanggalStrip($Dokumen0->tanggal);
				$SPPM=SuratPenunjukanPemenang::model()->findByPk($Dokumen0->id_dokumen);
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['SuratPenunjukanPemenang']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SPPM->attributes=$_POST['SuratPenunjukanPemenang'];
					$valid=$SPPM->validate();
					$valid=$valid&&$Dokumen0->validate();
					if($valid){
						// $Pengadaan->nama_penyedia=$SPPM->nama_penyedia;
						if($Pengadaan->save(false))
						{	
							if($Dokumen0->save(false)){
								if($SPPM->save(false)){
									$this->redirect(array('editsuratpenunjukanpemenang','id'=>$Dokumen0->id_pengadaan));
								}
							}
						}
					}
				}
				if($Pengadaan->metode_pengadaan=="Penunjukan Langsung") {
					$DokNDPP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Nota Dinas Penetapan Pemenang"');
					$NDPP=NotaDinasPenetapanPemenang::model()->findByPk($DokNDPP->id_dokumen);
					$this->render('suratpenunjukanpemenang',array(
						'SPPM'=>$SPPM,'Dokumen0'=>$Dokumen0,'NDPP'=>$NDPP,
					));
				} else if ($Pengadaan->metode_pengadaan=="Pemilihan Langsung") {
					$DokNDBP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Nota Dinas Pemberitahuan Pemenang"');
					$NDBP=NotaDinasPemberitahuanPemenang::model()->findByPk($DokNDBP->id_dokumen);
					$this->render('suratpenunjukanpemenang',array(
						'SPPM'=>$SPPM,'Dokumen0'=>$Dokumen0,'NDBP'=>$NDBP,
					));
				} else if ($Pengadaan->metode_pengadaan=="Pelelangan") {
					$DokSPP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Pengumuman Pelelangan"');
					$SPP=SuratPengumumanPelelangan::model()->findByPk($DokSPP->id_dokumen);
					$this->render('suratpenunjukanpemenang',array(
						'SPPM'=>$SPPM,'Dokumen0'=>$Dokumen0,'SPP'=>$SPP,
					));
				}
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
		$user = Yii::app()->user->name;
		if (Kdivmum::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
			$Pengadaan=new Pengadaan;
			$Pengadaan->status="0";
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
			
			$TOR= new Tor;
			$TOR->id_dokumen=$Dokumen2->id_dokumen;
			
			$RAB= new Rab;
			$RAB->id_dokumen=$Dokumen3->id_dokumen;

			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);
			if(isset($_POST['Pengadaan']))
			{
				$Pengadaan->attributes=$_POST['Pengadaan'];
				$NDP->attributes=$_POST['NotaDinasPermintaan'];
				$NDPP->attributes=$_POST['NotaDinasPerintahPengadaan'];
				$Dokumen0->attributes=$_POST['Dokumen'];
				$valid=$Pengadaan->validate()&&$Dokumen0->validate();
				
				if($valid){
					$Divisi=Divisi::model()->findByPk($Pengadaan->divisi_peminta);
					$Divisi->jumlah_berlangsung=$Divisi->jumlah_berlangsung+1;
					$Dokumen1->tanggal=$Pengadaan->tanggal_masuk;
					$Dokumen2->tanggal=$Dokumen0->tanggal;
					$Dokumen3->tanggal=$Dokumen0->tanggal;
					$Panitia=Panitia::model()->findByPk($Pengadaan->id_panitia);
					$NDPP->kepada=(User::model()->findByPk(Anggota::model()->find('id_panitia='.$Panitia->id_panitia. ' and jabatan = "Ketua"')->username)->nama);
					$valid=$valid&&$NDP->validate();
					if($valid){
						$valid=$valid&&$NDPP->validate();
						if($valid){
							if($Pengadaan->save(false)&&$Divisi->save(false)) {
								if($Dokumen0->save(false)&&$Dokumen1->save(false)&&$Dokumen2->save(false)&&$Dokumen3->save(false)){
									if($NDP->save(false)&&$NDPP->save(false)&&$TOR->save(false)&&$RAB->save(false)){										
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
				'Pengadaan'=>$Pengadaan,'NDP'=>$NDP,'NDPP'=>$NDPP,'Dokumen0'=>$Dokumen0,
			));
		}
	}
	
	public function actionTambahpengadaan1()
	{	
		$user = Yii::app()->user->name;
		if (Kdivmum::model()->exists('username = "' . Yii::app()->user->name . '"')||Divisi::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
			$Pengadaan=new Pengadaan;
			$Pengadaan->status="-1";
			$criteria=new CDbcriteria;
			$criteria->select='max(id_pengadaan) AS maxId';
			$row = $Pengadaan->model()->find($criteria);
			$somevariable = $row['maxId'];
			$Pengadaan->id_pengadaan=$somevariable+1;
			$Pengadaan->nama_penyedia='-';
			$Pengadaan->tanggal_selesai='-';
			$Pengadaan->id_panitia=-1;
			$Pengadaan->metode_pengadaan='-';
			$Pengadaan->biaya='-';
			$Pengadaan->metode_penawaran='-';
			$Pengadaan->jenis_kualifikasi='-';
			if(Divisi::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				$Pengadaan->divisi_peminta=Yii::app()->user->name;
			}
			date_default_timezone_set("Asia/Jakarta");
			$Pengadaan->tanggal_masuk=date('d-m-Y');
			
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
			$Dokumen1->id_dokumen=$somevariable+2;
			$Dokumen1->id_pengadaan=$Pengadaan->id_pengadaan;
			$Dokumen1->nama_dokumen='TOR';
			$Dokumen1->tempat='Jakarta';
			$Dokumen1->status_upload='Belum Selesai';
			
			$Dokumen2= new Dokumen;
			$Dokumen2->id_dokumen=$somevariable+3;
			$Dokumen2->id_pengadaan=$Pengadaan->id_pengadaan;
			$Dokumen2->nama_dokumen='RAB';
			$Dokumen2->tempat='Jakarta';
			$Dokumen2->status_upload='Belum Selesai';
			
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
				// $RAB->attributes=$_POST['RAB'];
				$Dokumen0->attributes=$_POST['Dokumen'];
				$Pengadaan->tanggal_masuk=date('Y-m-d',strtotime($Pengadaan->tanggal_masuk));
				$valid=$Pengadaan->validate()&&$Dokumen0->validate();
				if($valid){
					$Dokumen1->tanggal=$Dokumen0->tanggal;
					$Dokumen2->tanggal=$Dokumen0->tanggal;
					$valid=$valid&&$NDP->validate();
					if($valid){
						if($Pengadaan->save(false)) {
							if($Dokumen0->save(false)&&$Dokumen1->save(false)&&$Dokumen2->save(false)){
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
		}
	}
	
	public function actionEditTambahPengadaan1()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		$user = Yii::app()->user->name;
		if (Kdivmum::model()->exists('username = "' . Yii::app()->user->name . '"')||Divisi::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
			$Pengadaan= Pengadaan::model()->findByPk($id);
			
			$Dokumen0 = Dokumen::model()->find('id_pengadaan = '. $id. ' and nama_dokumen = "Nota Dinas Permintaan"');
			$Dokumen1 = Dokumen::model()->find('id_pengadaan = '. $id. ' and nama_dokumen = "TOR"');
			$Dokumen2 = Dokumen::model()->find('id_pengadaan = '. $id. ' and nama_dokumen = "RAB"');
			
			$NDP = NotaDinasPermintaan::model()->findByPk($Dokumen0->id_dokumen);
			
			$Pengadaan->tanggal_masuk=Tanggal::getTanggalStrip($Pengadaan->tanggal_masuk);
			$Dokumen0->tanggal=Tanggal::getTanggalStrip($Dokumen0->tanggal);
			// $TOR = Tor::model()->findByPk($Dokumen1->id_dokumen);
			// $RAB = Rab::model()->findByPk($Dokumen2->id_dokumen);	
			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);
			if(isset($_POST['Pengadaan']))
			{
				$Pengadaan->attributes=$_POST['Pengadaan'];
				$NDP->attributes=$_POST['NotaDinasPermintaan'];
				// $RAB->attributes=$_POST['RAB'];
				$Dokumen0->attributes=$_POST['Dokumen'];
				$Pengadaan->tanggal_masuk=date('Y-m-d',strtotime($Pengadaan->tanggal_masuk));
				$valid=$Pengadaan->validate()&&$Dokumen0->validate();
				if($valid){
					$Dokumen1->tanggal=$Dokumen0->tanggal;
					$Dokumen2->tanggal=$Dokumen0->tanggal;
					$valid=$valid&&$NDP->validate();
					if($valid){
						if($Pengadaan->save(false)) {
							if($Dokumen0->save(false)&&$Dokumen1->save(false)&&$Dokumen2->save(false)){
								if($NDP->save(false)/*&&$TOR->save(false)&&$RAB->save(false)*/){
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
		}
	}
	
	public function actionTambahpengadaan2()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		$user = Yii::app()->user->name;
		if (Kdivmum::model()->exists('username = "' . Yii::app()->user->name . '"')||Divisi::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
			$modelDok = array (
				Dokumen::model()->find('id_pengadaan = '. $id . ' and nama_dokumen = "Nota Dinas Permintaan"'),
				Dokumen::model()->find('id_pengadaan = '. $id . ' and nama_dokumen = "TOR"'),
				Dokumen::model()->find('id_pengadaan = '. $id . ' and nama_dokumen = "RAB"'),
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
				$newLinkDokumen->format_dokumen=$pathinfo['extension'];
				$newLinkDokumen->save();
								
				$path = $_SERVER["DOCUMENT_ROOT"] . Yii::app()->request->baseUrl . '/uploads/' . $newDokumen->id_pengadaan . '/' . $newDokumen->id_dokumen . '/';
				@mkdir($path,0700,true);
				$namaFile = $newLinkDokumen->nomor_link;
				
				if($newDokumen->save(false)){
					$newDokumen->uploadedFile->saveAs($path . $namaFile . '.' . $pathinfo['extension']);
					}
			}

			$this->render('tambahpengadaan2',array('modelDok'=>$modelDok));
		}
	}
	
	public function actionNotadinaspermintaantorrab()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		$user = Yii::app()->user->name;
		if (Kdivmum::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
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

		}
	}
	
	public function actionEditNotadinaspermintaantorrab()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		$user = Yii::app()->user->name;
		if (Kdivmum::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
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

		}
	}
	
	public function actionTunjukPanitia()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		$user = Yii::app()->user->name;
		if (Kdivmum::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
			$Pengadaan = Pengadaan::model()->findByPk($id);
			$Pengadaan->status='0';
			
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
					$NDPP->kepada=(User::model()->findByPk(Anggota::model()->find('id_panitia='.$Panitia->id_panitia. ' and jabatan = "Ketua"')->username)->nama);
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
		}
	}
	
	public function actionEditTunjukPanitia()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		$user = Yii::app()->user->name;
		if (Kdivmum::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
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
					$NDPP->kepada=(User::model()->findByPk(Anggota::model()->find('id_panitia='.$Panitia->id_panitia. ' and jabatan = "Ketua"')->username)->nama);
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