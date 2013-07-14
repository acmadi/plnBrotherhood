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
			if (Yii::app()->user->getState('role') == 'kdivmum' || UserKontrak::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				$model=new Pengadaan('search');
				$model->unsetAttributes();  // clear any default values
				if(isset($_GET['Pengadaan'])){
					$model->attributes=$_GET['Pengadaan'];                                       
				}	
				
				$this->render('kontrak',array(
					'model'=>$model,
				));
				
			}
		}
	}

	private function in_multiarray($needle, $haystack) {
		if(in_array($needle, $haystack)) {
			return true;
		}
		foreach($haystack as $element) {
			if(is_array($element) && $this->in_multiarray($needle, $element))
				return true;
			}
		return false;
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
			case '3' : {
				switch ($chart) {
					case '1' : {
						$met = Yii::app()->db->createCommand('select metode_pengadaan from pengadaan where metode_pengadaan != "-"')->queryAll();
						while(list($k1, $v1)=each($met)) {
							if (!$this->in_multiarray($v1['metode_pengadaan'], $chartData)) {
								$x = array();
								$peng = Yii::app()->db->createCommand('select id_pengadaan from pengadaan where metode_pengadaan = "' . $v1['metode_pengadaan'] . '" and status != "-1" and status != "100" and status != "99"')->queryAll();
								array_push($x, $v1['metode_pengadaan']);
								array_push($x, count($peng));
								array_push($chartData, $x);
							}
						}
						$chartTitle = 'Pengadaan yang sedang berlangsung';
						$chartSubtitle = 'per metode pengadaan';
						break;
					}
					case '2' : {
						$met = Yii::app()->db->createCommand('select metode_pengadaan from pengadaan')->queryAll();
						while(list($k1, $v1)=each($met)) {
							if (!$this->in_multiarray($v1['metode_pengadaan'], $chartData)) {
								$x = array();
								$peng = Yii::app()->db->createCommand('select id_pengadaan from pengadaan where metode_pengadaan = "' . $v1['metode_pengadaan'] . '" and status = "100"')->queryAll();
								array_push($x, $v1['metode_pengadaan']);
								array_push($x, count($peng));
								array_push($chartData, $x);
							}
						}
						$chartTitle = 'Pengadaan yang telah selesai';
						$chartSubtitle = 'per metode pengadaan';
						break;
					}
					case '3' : {
						$met = Yii::app()->db->createCommand('select metode_pengadaan from pengadaan')->queryAll();
						while(list($k1, $v1)=each($met)) {
							if (!$this->in_multiarray($v1['metode_pengadaan'], $chartData)) {
								$x = array();
								$peng = Yii::app()->db->createCommand('select id_pengadaan from pengadaan where metode_pengadaan = "' . $v1['metode_pengadaan'] . '" and status = "99"')->queryAll();
								array_push($x, $v1['metode_pengadaan']);
								array_push($x, count($peng));
								array_push($chartData, $x);
							}
						}
						$chartTitle = 'Pengadaan yang gagal';
						$chartSubtitle = 'per metode pengadaan';
						break;
					}
					case '4' : {
						$met = Yii::app()->db->createCommand('select metode_pengadaan from pengadaan')->queryAll();
						while(list($k1, $v1)=each($met)) {
							if (!$this->in_multiarray($v1['metode_pengadaan'], $chartData)) {
								$x = array();
								$peng = Yii::app()->db->createCommand('select id_pengadaan from pengadaan where metode_pengadaan = "' . $v1['metode_pengadaan'] . '" and status != "-1"')->queryAll();
								array_push($x, $v1['metode_pengadaan']);
								array_push($x, count($peng));
								array_push($chartData, $x);
							}
						}
						$chartTitle = 'Pengadaan total';
						$chartSubtitle = 'per metode pengadaan';
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
			if (Yii::app()->user->getState('role') == 'kdivmum') {
				$this->render('statistik', array(
					'chartData'=>$chartData,
					'chartTitle'=>$chartTitle,
					'chartSubtitle'=>$chartSubtitle,
				));
			}
		}
	}
	
	public function actionUndanganAanwijzing()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Yii::app()->user->getState('role') == 'anggota') {
			
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
				
				$SUP= new NotaDinasUndangan;
				$SUP->id_dokumen=$Dokumen0->id_dokumen;
				$SUP->tanggal_undangan=Tanggal::getTanggalStrip($RKS->tanggal_penjelasan);
				$SUP->waktu=Tanggal::getJamMenit($RKS->waktu_penjelasan);
				$SUP->tempat=$RKS->tempat_penjelasan;
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['NotaDinasUndangan']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SUP->attributes=$_POST['NotaDinasUndangan'];
					$SUP->tanggal_undangan=date('Y-m-d',strtotime($SUP->tanggal_undangan));
					$valid=$SUP->validate();
					$valid=$valid&&$Dokumen0->validate();
					if($valid){
						if($Dokumen0->save(false)){
							if($SUP->save(false)){
								$this->redirect(array('editundanganaanwijzing','id'=>$id));
							}
						}
					}
				}
				
				if($Pengadaan->jenis_kualifikasi=="Pasca Kualifikasi"){
					if($Pengadaan->metode_pengadaan=="Pelelangan"){
						$DokPengumuman=Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "Surat Pengumuman Pelelangan"');
						$SUPDP=SuratPengumumanPelelangan::model()->findByPk($DokPengumuman->id_dokumen);
						$this->render('undanganaanwijzing',array(
							'SUP'=>$SUP,'Dokumen0'=>$Dokumen0,'SUPDP'=>$SUPDP,
						));
					} else if ($Pengadaan->metode_pengadaan=="Penunjukan Langsung"||$Pengadaan->metode_pengadaan=="Pemilihan Langsung"){
						$DokPermintaan=Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "Surat Undangan Permintaan Penawaran Harga"');
						$SUPPPH=SuratUndanganPermintaanPenawaranHarga::model()->findByPk($DokPermintaan->id_dokumen);
						$this->render('undanganaanwijzing',array(
							'SUP'=>$SUP,'Dokumen0'=>$Dokumen0,'SUPPPH'=>$SUPPPH,
						));
					}
				} else {
					$DokSPHK=Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "Surat Pengumuman Hasil Prakualifikasi"');
					$SPHK=SuratUndanganPermintaanPenawaranHarga::model()->findByPk($DokPermintaan->id_dokumen);
					$this->render('undanganaanwijzing',array(
						'SUP'=>$SUP,'Dokumen0'=>$Dokumen0,'SPHK'=>$SPHK,
					));
				}
			}
		}
	}
	
	public function actionEditUndanganAanwijzing()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Yii::app()->user->getState('role') == 'anggota') {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				
				$Dokumen0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Aanwijzing"');				
				$Dokumen0->tanggal=Tanggal::getTanggalStrip($Dokumen0->tanggal);
				
				$SUP=NotaDinasUndangan::model()->findByPk($Dokumen0->id_dokumen);
				$SUP->tanggal_undangan=Tanggal::getTanggalStrip($SUP->tanggal_undangan);	
				$SUP->waktu=Tanggal::getJamMenit($SUP->waktu);
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['NotaDinasUndangan']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SUP->attributes=$_POST['NotaDinasUndangan'];
					$SUP->tanggal_undangan=date('Y-m-d',strtotime($SUP->tanggal_undangan));
					$valid=$SUP->validate();
					$valid=$valid&&$Dokumen0->validate();
					if($valid){				
						if($Dokumen0->save(false)){
							if($SUP->save(false)){
								$this->redirect(array('editundanganaanwijzing','id'=>$id));
							}
						}						
					}
				}
				if($Pengadaan->metode_pengadaan=="Pelelangan"){
					$DokPengumuman=Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "Surat Pengumuman Pelelangan"');
					$SUPDP=SuratPengumumanPelelangan::model()->findByPk($DokPengumuman->id_dokumen);
					$this->render('undanganaanwijzing',array(
						'SUP'=>$SUP,'Dokumen0'=>$Dokumen0,'SUPDP'=>$SUPDP,
					));
				} else if ($Pengadaan->metode_pengadaan=="Penunjukan Langsung"||$Pengadaan->metode_pengadaan=="Pemilihan Langsung"){
					$DokPermintaan=Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "Surat Undangan Permintaan Penawaran Harga"');
					$SUPPPH=SuratUndanganPermintaanPenawaranHarga::model()->findByPk($DokPermintaan->id_dokumen);
					$this->render('undanganaanwijzing',array(
						'SUP'=>$SUP,'Dokumen0'=>$Dokumen0,'SUPPPH'=>$SUPPPH,
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
			if (Yii::app()->user->getState('role') == 'anggota') {
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
				
				$SUPP= new NotaDinasUndangan;
				$SUPP->id_dokumen=$Dokumen0->id_dokumen;
				
				$DokRKS=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "RKS"');
				$RKS=Rks::model()->findByPk($DokRKS->id_dokumen);
				
				$SUPP->tanggal_undangan=Tanggal::getTanggalStrip($RKS->tanggal_pembukaan_penawaran1);
				$SUPP->waktu=Tanggal::getJamMenit($RKS->waktu_pembukaan_penawaran1);
				$SUPP->tempat=$RKS->tempat_pembukaan_penawaran1;
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);
				
				if(isset($_POST['NotaDinasUndangan']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SUPP->attributes=$_POST['NotaDinasUndangan'];
					$SUPP->tanggal_undangan=date('Y-m-d',strtotime($SUPP->tanggal_undangan));
					$valid=$SUPP->validate();
					$valid=$valid&&$Dokumen0->validate();
					if($valid){
						if($Dokumen0->save(false)){
							if($SUPP->save(false)){
								$this->redirect(array('editsuratundanganpembukaanpenawaran','id'=>$id));
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
			if (Yii::app()->user->getState('role') == 'anggota') {
			
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
				
				$SUPP=NotaDinasUndangan::model()->findByPk($Dokumen0->id_dokumen);
				$SUPP->tanggal_undangan=Tanggal::getTanggalStrip($SUPP->tanggal_undangan);	
				$SUPP->waktu=Tanggal::getJamMenit($SUPP->waktu);
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['NotaDinasUndangan']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SUPP->attributes=$_POST['NotaDinasUndangan'];
					$SUPP->tanggal_undangan=date('Y-m-d',strtotime($SUPP->tanggal_undangan));
					$valid=$SUPP->validate();
					if($valid){
						if($Dokumen0->save(false)){
							if($SUPP->save(false)){
								$this->redirect(array('editsuratundanganpembukaanpenawaran','id'=>$id));
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
	
	public function actionSuratundanganevaluasipenawaran()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Yii::app()->user->getState('role') == 'anggota') {
				$Pengadaan=Pengadaan::model()->findByPk($id);
				
				if ($Pengadaan->metode_penawaran == 'Satu Sampul'){
					$DokBAPP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran"');
				} else if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
					$DokBAPP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran Sampul Satu"');
				} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
					$DokBAPP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran Tahap Satu"');
				}
				
				$BAPP=BeritaAcaraPembukaanPenawaran::model()->findByPk($DokBAPP->id_dokumen);
				
				$Dokumen0= new Dokumen;
				$criteria=new CDbcriteria;
				$criteria->select='max(id_dokumen) AS maxId';
				$row = $Dokumen0->model()->find($criteria);
				$somevariable = $row['maxId'];
				$Dokumen0->id_dokumen=$somevariable+1;
				if ($Pengadaan->metode_penawaran == 'Satu Sampul'){
					$Dokumen0->nama_dokumen='Surat Undangan Evaluasi Penawaran';
				} else if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
					$Dokumen0->nama_dokumen='Surat Undangan Evaluasi Penawaran Sampul Satu';
				} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
					$Dokumen0->nama_dokumen='Surat Undangan Evaluasi Penawaran Tahap Satu';
				}
				$Dokumen0->tempat='Jakarta';
				$Dokumen0->status_upload='Belum Selesai';
				$Dokumen0->id_pengadaan=$id;
				date_default_timezone_set("Asia/Jakarta");
				$Dokumen0->tanggal=date('d-m-Y');
				
				$SUEP= new NotaDinasUndangan;
				$SUEP->id_dokumen=$Dokumen0->id_dokumen;
				
				$DokRKS=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "RKS"');
				$RKS=Rks::model()->findByPk($DokRKS->id_dokumen);
				
				$SUEP->tanggal_undangan=Tanggal::getTanggalStrip($RKS->tanggal_evaluasi_penawaran1);
				$SUEP->waktu=Tanggal::getJamMenit($RKS->waktu_evaluasi_penawaran1);
				$SUEP->tempat=$RKS->tempat_evaluasi_penawaran1;
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);
				
				if(isset($_POST['NotaDinasUndangan']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SUEP->attributes=$_POST['NotaDinasUndangan'];
					$SUEP->tanggal_undangan=date('Y-m-d',strtotime($SUEP->tanggal_undangan));
					$valid=$SUEP->validate();
					$valid=$valid&&$Dokumen0->validate();
					if($valid){
						if($Dokumen0->save(false)){
							if($SUEP->save(false)){
								$this->redirect(array('editsuratundanganevaluasipenawaran','id'=>$id));
							}
						}
					}
				}

				$this->render('suratundanganevaluasipenawaran',array(
					'SUEP'=>$SUEP,'Dokumen0'=>$Dokumen0,'BAPP'=>$BAPP,
				));
			}
		}
	}
	
	public function actionEditSuratundanganevaluasipenawaran()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Yii::app()->user->getState('role') == 'anggota') {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				if ($Pengadaan->metode_penawaran == 'Satu Sampul'){
					$DokBAPP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran"');
				} else if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
					$DokBAPP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran Sampul Satu"');
				} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
					$DokBAPP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran Tahap Satu"');
				}
				
				$BAPP=BeritaAcaraPembukaanPenawaran::model()->findByPk($DokBAPP->id_dokumen);
				
				if ($Pengadaan->metode_penawaran == 'Satu Sampul'){
					$Dokumen0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Evaluasi Penawaran"');
				} else if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
					$Dokumen0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Evaluasi Penawaran Sampul Satu"');
				} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
					$Dokumen0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Evaluasi Penawaran Tahap Satu"');
				}
				
				$Dokumen0->tanggal=Tanggal::getTanggalStrip($Dokumen0->tanggal);
				
				$SUEP=NotaDinasUndangan::model()->findByPk($Dokumen0->id_dokumen);
				$SUEP->tanggal_undangan=Tanggal::getTanggalStrip($SUEP->tanggal_undangan);	
				$SUEP->waktu=Tanggal::getJamMenit($SUEP->waktu);
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['NotaDinasUndangan']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SUEP->attributes=$_POST['NotaDinasUndangan'];
					$SUEP->tanggal_undangan=date('Y-m-d',strtotime($SUEP->tanggal_undangan));
					$valid=$SUEP->validate();
					if($valid){
						if($Dokumen0->save(false)){
							if($SUEP->save(false)){
								$this->redirect(array('editsuratundanganevaluasipenawaran','id'=>$id));
							}
						}
					}
				}

				$this->render('suratundanganevaluasipenawaran',array(
					'SUEP'=>$SUEP,'Dokumen0'=>$Dokumen0,'BAPP'=>$BAPP
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
			if (Yii::app()->user->getState('role') == 'anggota') {
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
				
				$SUPP= new NotaDinasUndangan;
				$SUPP->id_dokumen=$Dokumen0->id_dokumen;
				
				$DokRKS=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "RKS"');
				$RKS=Rks::model()->findByPk($DokRKS->id_dokumen);
				
				$SUPP->tanggal_undangan=Tanggal::getTanggalStrip($RKS->tanggal_pembukaan_penawaran2);
				$SUPP->waktu=Tanggal::getJamMenit($RKS->waktu_pembukaan_penawaran2);
				$SUPP->tempat=$RKS->tempat_pembukaan_penawaran2;
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);
				
				if(isset($_POST['NotaDinasUndangan']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SUPP->attributes=$_POST['NotaDinasUndangan'];
					$SUPP->tanggal_undangan=date('Y-m-d',strtotime($SUPP->tanggal_undangan));
					$valid=$SUPP->validate();
					$valid=$valid&&$Dokumen0->validate();
					if($valid){
						if($Dokumen0->save(false)){
							if($SUPP->save(false)){
								$this->redirect(array('editsuratundanganpembukaanpenawaran2','id'=>$Dokumen0->id_pengadaan));
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
			if (Yii::app()->user->getState('role') == 'anggota') {
			
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
				
				$SUPP=NotaDinasUndangan::model()->findByPk($Dokumen0->id_dokumen);
				$SUPP->tanggal_undangan=Tanggal::getTanggalStrip($SUPP->tanggal_undangan);	
				$SUPP->waktu=Tanggal::getJamMenit($SUPP->waktu);
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['NotaDinasUndangan']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SUPP->attributes=$_POST['NotaDinasUndangan'];
					$valid=$SUPP->validate();
					$valid=$valid&&$Dokumen0->validate();
					if($valid){
						if($Dokumen0->save(false)){
							if($SUPP->save(false)){
								$this->redirect(array('editsuratundanganpembukaanpenawaran2','id'=>$Dokumen0->id_pengadaan));
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
	
	public function actionSuratundanganevaluasipenawaran2()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Yii::app()->user->getState('role') == 'anggota') {
				$Pengadaan=Pengadaan::model()->findByPk($id);
				
				if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
					$DokBAPP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran Sampul Dua"');
				} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
					$DokBAPP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran Tahap Dua"');
				}
				
				$BAPP=BeritaAcaraPembukaanPenawaran::model()->findByPk($DokBAPP->id_dokumen);
				
				$Dokumen0= new Dokumen;
				$criteria=new CDbcriteria;
				$criteria->select='max(id_dokumen) AS maxId';
				$row = $Dokumen0->model()->find($criteria);
				$somevariable = $row['maxId'];
				$Dokumen0->id_dokumen=$somevariable+1;
				if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
					$Dokumen0->nama_dokumen='Surat Undangan Evaluasi Penawaran Sampul Dua';
				} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
					$Dokumen0->nama_dokumen='Surat Undangan Evaluasi Penawaran Tahap Dua';
				}
				$Dokumen0->tempat='Jakarta';
				$Dokumen0->status_upload='Belum Selesai';
				$Dokumen0->id_pengadaan=$id;
				date_default_timezone_set("Asia/Jakarta");
				$Dokumen0->tanggal=date('d-m-Y');
				
				$SUEP= new NotaDinasUndangan;
				$SUEP->id_dokumen=$Dokumen0->id_dokumen;
				
				$DokRKS=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "RKS"');
				$RKS=Rks::model()->findByPk($DokRKS->id_dokumen);
				
				$SUEP->tanggal_undangan=Tanggal::getTanggalStrip($RKS->tanggal_evaluasi_penawaran2);
				$SUEP->waktu=Tanggal::getJamMenit($RKS->waktu_evaluasi_penawaran2);
				$SUEP->tempat=$RKS->tempat_evaluasi_penawaran2;
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);
				
				if(isset($_POST['NotaDinasUndangan']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SUEP->attributes=$_POST['NotaDinasUndangan'];
					$SUEP->tanggal_undangan=date('Y-m-d',strtotime($SUEP->tanggal_undangan));
					$valid=$SUEP->validate();
					$valid=$valid&&$Dokumen0->validate();
					if($valid){
						if($Dokumen0->save(false)){
							if($SUEP->save(false)){
								$this->redirect(array('editsuratundanganevaluasipenawaran2','id'=>$id));
							}
						}
					}
				}

				$this->render('suratundanganevaluasipenawaran2',array(
					'SUEP'=>$SUEP,'Dokumen0'=>$Dokumen0,'BAPP'=>$BAPP,
				));
			}
		}
	}
	
	public function actionEditSuratundanganevaluasipenawaran2()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Yii::app()->user->getState('role') == 'anggota') {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
					$DokBAPP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran Sampul Dua"');
				} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
					$DokBAPP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran Tahap Dua"');
				}
				
				$BAPP=BeritaAcaraPembukaanPenawaran::model()->findByPk($DokBAPP->id_dokumen);
				
				if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
					$Dokumen0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Evaluasi Penawaran Sampul Dua"');
				} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
					$Dokumen0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Evaluasi Penawaran Tahap Dua"');
				}
				
				$Dokumen0->tanggal=Tanggal::getTanggalStrip($Dokumen0->tanggal);
				
				$SUEP=NotaDinasUndangan::model()->findByPk($Dokumen0->id_dokumen);
				$SUEP->tanggal_undangan=Tanggal::getTanggalStrip($SUEP->tanggal_undangan);	
				$SUEP->waktu=Tanggal::getJamMenit($SUEP->waktu);
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['NotaDinasUndangan']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SUEP->attributes=$_POST['NotaDinasUndangan'];
					$SUEP->tanggal_undangan=date('Y-m-d',strtotime($SUEP->tanggal_undangan));
					$valid=$SUEP->validate();
					if($valid){
						if($Dokumen0->save(false)){
							if($SUEP->save(false)){
								$this->redirect(array('editsuratundanganevaluasipenawaran2','id'=>$id));
							}
						}
					}
				}

				$this->render('suratundanganevaluasipenawaran2',array(
					'SUEP'=>$SUEP,'Dokumen0'=>$Dokumen0,'BAPP'=>$BAPP
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
			if (Yii::app()->user->getState('role') == 'anggota') {
			
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
				
				$SUNK= new NotaDinasUndangan;
				$SUNK->id_dokumen=$Dokumen0->id_dokumen;
				$SUNK->tanggal_undangan=Tanggal::getTanggalStrip($RKS->tanggal_negosiasi);
				$SUNK->waktu=Tanggal::getJamMenit($RKS->waktu_negosiasi);
				$SUNK->tempat=$RKS->tempat_negosiasi;
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['NotaDinasUndangan']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SUNK->attributes=$_POST['NotaDinasUndangan'];
					$SUNK->tanggal_undangan=date('Y-m-d',strtotime($SUNK->tanggal_undangan));
					$valid=$SUNK->validate();
					$valid=$valid&&$Dokumen0->validate();
					if($valid){
						if($Dokumen0->save(false)){
							if($SUNK->save(false)){
								$this->redirect(array('editsuratundangannegosiasiklarifikasi','id'=>$id));
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
			if (Yii::app()->user->getState('role') == 'anggota') {
			
				$Pengadaan=Pengadaan::model()->findByPk($id);
				
				$Dokumen0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Negosiasi dan Klarifikasi"');
				$Dokumen0->tanggal=Tanggal::getTanggalStrip($Dokumen0->tanggal);
				
				$SUNK=NotaDinasUndangan::model()->findByPk($Dokumen0->id_dokumen);
				$SUNK->tanggal_undangan=Tanggal::getTanggalStrip($SUNK->tanggal_undangan);
				$SUNK->waktu=Tanggal::getJamMenit($SUNK->waktu);
				
				//Uncomment the following line if AJAX validation is needed
				//$this->performAjaxValidation($model);

				if(isset($_POST['NotaDinasUndangan']))
				{
					$Dokumen0->attributes=$_POST['Dokumen'];
					$SUNK->attributes=$_POST['NotaDinasUndangan'];
					$SUNK->tanggal_undangan=date('Y-m-d',strtotime($SUNK->tanggal_undangan));
					$valid=$SUNK->validate();
					$valid=$valid&&$Dokumen0->validate();
					if($valid){
						if($Dokumen0->save(false)){
							if($SUNK->save(false)){
								$this->redirect(array('editsuratundangannegosiasiklarifikasi','id'=>$id));
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
	
	// public function actionTambahpengadaan()
	// {	
	// 	$user = Yii::app()->user->name;
	// 	if (Yii::app()->user->getState('role') == 'kdivmum') {
			
	// 		$Pengadaan=new Pengadaan;
	// 		$Pengadaan->status="0";
	// 		$criteria=new CDbcriteria;
	// 		$criteria->select='max(id_pengadaan) AS maxId';
	// 		$row = $Pengadaan->model()->find($criteria);
	// 		$somevariable = $row['maxId'];
	// 		$Pengadaan->id_pengadaan=$somevariable+1;
	// 		$Pengadaan->nama_penyedia='-';
	// 		$Pengadaan->tanggal_selesai='-';
	// 		$Pengadaan->biaya='-';
	// 		$Pengadaan->metode_penawaran='-';
	// 		$Pengadaan->jenis_kualifikasi='-';
			
	// 		$Dokumen0= new Dokumen;
	// 		$criteria=new CDbcriteria;
	// 		$criteria->select='max(id_dokumen) AS maxId';
	// 		$row = $Dokumen0->model()->find($criteria);
	// 		$somevariable = $row['maxId'];
	// 		$Dokumen0->id_dokumen=$somevariable+2;
	// 		$Dokumen0->id_pengadaan=$Pengadaan->id_pengadaan;
	// 		$Dokumen0->nama_dokumen='Nota Dinas Permintaan';
	// 		$Dokumen0->tempat='Jakarta';
	// 		$Dokumen0->status_upload='Belum Selesai';
			
	// 		$Dokumen1= new Dokumen;
	// 		$Dokumen1->id_dokumen=$somevariable+5;
	// 		$Dokumen1->id_pengadaan=$Pengadaan->id_pengadaan;
	// 		$Dokumen1->nama_dokumen='Nota Dinas Perintah Pengadaan';
	// 		$Dokumen1->tempat='Jakarta';
	// 		$Dokumen1->status_upload='Belum Selesai';
						
	// 		$Dokumen2= new Dokumen;
	// 		$Dokumen2->id_dokumen=$somevariable+3;
	// 		$Dokumen2->id_pengadaan=$Pengadaan->id_pengadaan;
	// 		$Dokumen2->nama_dokumen='TOR';
	// 		$Dokumen2->tempat='Jakarta';
	// 		$Dokumen2->status_upload='Belum Selesai';
			
	// 		$Dokumen3= new Dokumen;
	// 		$Dokumen3->id_dokumen=$somevariable+4;
	// 		$Dokumen3->id_pengadaan=$Pengadaan->id_pengadaan;
	// 		$Dokumen3->nama_dokumen='RAB';
	// 		$Dokumen3->tempat='Jakarta';
	// 		$Dokumen3->status_upload='Belum Selesai';
			
	// 		$NDP= new NotaDinasPermintaan;
	// 		$NDP->id_dokumen=$Dokumen0->id_dokumen;
			
	// 		$NDPP= new NotaDinasPerintahPengadaan;
	// 		$NDPP->id_dokumen=$Dokumen1->id_dokumen;
			
	// 		$TOR= new Tor;
	// 		$TOR->id_dokumen=$Dokumen2->id_dokumen;
			
	// 		$RAB= new Rab;
	// 		$RAB->id_dokumen=$Dokumen3->id_dokumen;

	// 		// Uncomment the following line if AJAX validation is needed
	// 		// $this->performAjaxValidation($model);
	// 		if(isset($_POST['Pengadaan']))
	// 		{
	// 			$Pengadaan->attributes=$_POST['Pengadaan'];
	// 			$NDP->attributes=$_POST['NotaDinasPermintaan'];
	// 			$NDPP->attributes=$_POST['NotaDinasPerintahPengadaan'];
	// 			$Dokumen0->attributes=$_POST['Dokumen'];
	// 			$valid=$Pengadaan->validate()&&$Dokumen0->validate();
				
	// 			if($valid){
	// 				$Divisi=Divisi::model()->findByPk($Pengadaan->divisi_peminta);
	// 				$Divisi->jumlah_berlangsung=$Divisi->jumlah_berlangsung+1;
	// 				$Dokumen1->tanggal=$Pengadaan->tanggal_masuk;
	// 				$Dokumen2->tanggal=$Dokumen0->tanggal;
	// 				$Dokumen3->tanggal=$Dokumen0->tanggal;
	// 				$Panitia=Panitia::model()->findByPk($Pengadaan->id_panitia);
	// 				$NDPP->kepada=(Anggota::model()->find('id_panitia='.$Panitia->id_panitia. ' and jabatan = "Ketua"')->nama);
	// 				$valid=$valid&&$NDP->validate();
	// 				if($valid){
	// 					$valid=$valid&&$NDPP->validate();
	// 					if($valid){
	// 						if($Pengadaan->save(false)&&$Divisi->save(false)) {
	// 							if($Dokumen0->save(false)&&$Dokumen1->save(false)&&$Dokumen2->save(false)&&$Dokumen3->save(false)&&$DokumenL->save(false)){
	// 								if($NDP->save(false)&&$NDPP->save(false)&&$TOR->save(false)&&$RAB->save(false)){										
	// 									if(isset($_POST['simpan'])){
	// 										$this->redirect(array('dashboard'));
	// 									}
	// 									if(isset($_POST['simpanbuat'])){
	// 										$this->redirect(array('docx/download', 'id'=>$NDPP->id_dokumen));											
	// 									}
	// 								}
	// 							}
	// 						}
	// 					}
	// 				}
	// 			}
	// 		}

	// 		$this->render('tambahpengadaan',array(
	// 			'Pengadaan'=>$Pengadaan,'NDP'=>$NDP,'NDPP'=>$NDPP,'Dokumen0'=>$Dokumen0,
	// 		));
	// 	}
	// }
	
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
			$Pengadaan->biaya='-';
			$Pengadaan->metode_penawaran='-';
			$Pengadaan->jenis_kualifikasi='-';
			if(Yii::app()->user->getState('role') == 'divisi') {
				$Pengadaan->divisi_peminta=Yii::app()->user->name;
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

		}
	}
	
	public function actionTunjukPanitia()
	{	
		$id = Yii::app()->getRequest()->getQuery('id');
		$user = Yii::app()->user->name;
		if (Yii::app()->user->getState('role') == 'kdivmum') {
			
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
}