<?php
	class GeneratorController extends Controller
	{
		public function actionGenerator()
		{
			$id = Yii::app()->getRequest()->getQuery('id');
			if (Yii::app()->user->isGuest) {
				$this->redirect(array('site/login'));
			}
			else {
				if (Yii::app()->user->getState('role') == 'anggota') {
					if(Pengadaan::model()->findByPk($id)->status=="0"){
						$this->redirect(array('generator/penentuanmetode','id'=>$id));
					}
					if(Pengadaan::model()->findByPk($id)->status=="1"){
						$this->redirect(array('generator/rks','id'=>$id));
					}
					if(Pengadaan::model()->findByPk($id)->status=="2"){
						$this->redirect(array('generator/hps','id'=>$id));
					}
					if(Pengadaan::model()->findByPk($id)->status=="3"){
						$this->redirect(array('generator/edithps','id'=>$id));
					}
					if(Pengadaan::model()->findByPk($id)->status=="4"){
						$this->redirect(array('generator/dokumenprakualifikasi','id'=>$id));
					}
					if(Pengadaan::model()->findByPk($id)->status=="5"){
						$this->redirect(array('generator/suratpengumumanpelelanganprakualifikasi','id'=>$id));
					}
					if(Pengadaan::model()->findByPk($id)->status=="6"){
						$this->redirect(array('generator/pendaftaranpelelanganprakualifikasi','id'=>$id));
					}
					if(Pengadaan::model()->findByPk($id)->status=="7"){
						$this->redirect(array('generator/pengambilandokumenprakualifikasi','id'=>$id));
					}
					if(Pengadaan::model()->findByPk($id)->status=="8"){
						$this->redirect(array('generator/penyampaiandokumenprakualifikasi','id'=>$id));
					}
					if(Pengadaan::model()->findByPk($id)->status=="9"){
						$this->redirect(array('generator/evaluasidokumenprakualifikasi','id'=>$id));
					}
					if(Pengadaan::model()->findByPk($id)->status=="10"){
						$this->redirect(array('generator/usulanhasilprakualifikasi','id'=>$id));
					}
					if(Pengadaan::model()->findByPk($id)->status=="11"){
						$this->redirect(array('generator/penetapanhasilprakualifikasi','id'=>$id));
					}
					if(Pengadaan::model()->findByPk($id)->status=="12"){
						$this->redirect(array('generator/pengumumanhasilprakualifikasi','id'=>$id));
					}
					if(Pengadaan::model()->findByPk($id)->status=="13"){
						$this->redirect(array('generator/usulanhasilprakualifikasi','id'=>$id));
					}
					if(Pengadaan::model()->findByPk($id)->status=="14"){
						$this->redirect(array('generator/penetapanhasilprakualifikasi','id'=>$id));
					}
					if(Pengadaan::model()->findByPk($id)->status=="15"){
						$this->redirect(array('generator/pengumumanhasilprakualifikasi','id'=>$id));
					}
					if(Pengadaan::model()->findByPk($id)->status=="16"){
						$this->redirect(array('generator/permintaanpenawaranharga','id'=>$id));
					}
					if(Pengadaan::model()->findByPk($id)->status=="17"){
						$this->redirect(array('generator/suratpengumumanpelelangan','id'=>$id));
					}
					if(Pengadaan::model()->findByPk($id)->status=="18"){
						$this->redirect(array('generator/pendaftaranpelelangan','id'=>$id));
					}
					if(Pengadaan::model()->findByPk($id)->status=="19"){
						$this->redirect(array('generator/pengambilandokumen','id'=>$id));
					}
					if(Pengadaan::model()->findByPk($id)->status=="20"){
						$this->redirect(array('generator/aanwijzing','id'=>$id));
					}
					if(Pengadaan::model()->findByPk($id)->status=="21"){
						$this->redirect(array('generator/beritaacaraaanwijzing','id'=>$id));
					}
					if(Pengadaan::model()->findByPk($id)->status=="22"){
						$this->redirect(array('generator/pembukaanpenawaran','id'=>$id));
					}
					if(Pengadaan::model()->findByPk($id)->status=="23"){
						$this->redirect(array('generator/beritaacarapembukaanpenawaran','id'=>$id));
					}
					if(Pengadaan::model()->findByPk($id)->status=="24"){
						$this->redirect(array('generator/evaluasipenawaran','id'=>$id));
					}
					if(Pengadaan::model()->findByPk($id)->status=="25"){
						$this->redirect(array('generator/beritaacaraevaluasipenawaran','id'=>$id));
					}
					if(Pengadaan::model()->findByPk($id)->status=="26"){
						$this->redirect(array('generator/pembukaanpenawaran2','id'=>$id));
					}
					if(Pengadaan::model()->findByPk($id)->status=="27"){
						$this->redirect(array('generator/beritaacarapembukaanpenawaran2','id'=>$id));
					}
					if(Pengadaan::model()->findByPk($id)->status=="28"){
						$this->redirect(array('generator/evaluasipenawaran2','id'=>$id));
					}
					if(Pengadaan::model()->findByPk($id)->status=="29"){
						$this->redirect(array('generator/beritaacaraevaluasipenawaran2','id'=>$id));
					}
					if(Pengadaan::model()->findByPk($id)->status=="30"){
						$this->redirect(array('generator/negosiasiklarifikasi','id'=>$id));
					}
					if(Pengadaan::model()->findByPk($id)->status=="31"){
						$this->redirect(array('generator/beritaacaranegosiasiklarifikasi','id'=>$id));
					}
					if(Pengadaan::model()->findByPk($id)->status=="32"){
						$this->redirect(array('generator/notadinasusulanpemenang','id'=>$id));
					}
					if(Pengadaan::model()->findByPk($id)->status=="33"){
						$this->redirect(array('generator/notadinaspenetapanpemenang','id'=>$id));
					}
					if(Pengadaan::model()->findByPk($id)->status=="34"){
						$this->redirect(array('generator/notadinaspemberitahuanpemenang','id'=>$id));
					}
					if(Pengadaan::model()->findByPk($id)->status=="35"){
						$this->redirect(array('generator/suratpengumumanpemenang','id'=>$id));
					}
					if(Pengadaan::model()->findByPk($id)->status=="36"){
						$this->redirect(array('generator/suratpenunjukanpemenang','id'=>$id));
					}
					else{
						$this->redirect(array('generator/checkpoint2','id'=>$id));
					}
				}
			}
		}
	
		public function actionPenentuanMetode(){
			$id = Yii::app()->getRequest()->getQuery('id');
			if (Yii::app()->user->isGuest) {
				$this->redirect(array('site/login'));
			}
			else {
				if (Yii::app()->user->getState('role') == 'anggota') {
					$Pengadaan=Pengadaan::model()->findByPk($id);
					$Pengadaan->status='1';
					
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
					date_default_timezone_set("Asia/Jakarta");
					$Dokumen0->tanggal=date('d-m-Y');
					
					$PAP1= new PaktaIntegritasPanitia1;
					$PAP1->id_dokumen=$Dokumen0->id_dokumen;
					
					if(isset($_POST['Pengadaan']))
					{
						$Pengadaan->attributes=$_POST['Pengadaan'];
						$valid=$Pengadaan->validate();
						if($valid){		
							if($Pengadaan->save(false))
							{	
								if($Dokumen0->save(false)){
									if($PAP1->save(false)){
										$this->redirect(array('editpenentuanmetode','id'=>$id));
									}
								}
							}
						}
					}

					$this->render('penentuanmetode',array(
						'Pengadaan'=>$Pengadaan,'PAP1'=>$PAP1,
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
				if (Yii::app()->user->getState('role') == 'anggota') {
					$Pengadaan=Pengadaan::model()->findByPk($id);
					
					$Dokumen0= Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Pakta Integritas Awal Panitia"');
					$PAP1=PaktaIntegritasPanitia1::model()->findByPk($Dokumen0->id_dokumen);
					
					if(isset($_POST['Pengadaan']))
					{
						$Pengadaan->attributes=$_POST['Pengadaan'];
						$valid=$Pengadaan->validate();
						if($valid){		
							if($Pengadaan->save(false))
							{	
								$this->redirect(array('editpenentuanmetode','id'=>$id));
							}
						}
					}

					$this->render('penentuanmetode',array(
						'Pengadaan'=>$Pengadaan,'PAP1'=>$PAP1,
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
				if (Yii::app()->user->getState('role') == 'anggota') {
					
					$Pengadaan=Pengadaan::model()->findByPk($id);
					$Pengadaan->status ='2';
					
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
					date_default_timezone_set("Asia/Jakarta");
					$Dokumen0->tanggal=date('d-m-Y');
					
					$RKS= new Rks;
					$RKS->id_dokumen=$Dokumen0->id_dokumen;
					
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
						$Dokumen0->attributes=$_POST['Dokumen'];
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
						$valid=$RKS->validate();
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
								if($Dokumen0->save(false)){
									if($RKS->save(false)){
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
										
										$this->redirect(array('editrks','id'=>$id));
									}
								}
							}
						}
					}
					$this->render('rks',array(
						'Rks'=>$RKS,'Dokumen0'=>$Dokumen0,
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
				if (Yii::app()->user->getState('role') == 'anggota') {
					
					$Pengadaan=Pengadaan::model()->findByPk($id);
					
					$Dokumen0= Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "RKS"');
					$Dokumen0->tanggal=Tanggal::getTanggalStrip($Dokumen0->tanggal);
					
					$RKS= Rks::model()->findByPk($Dokumen0->id_dokumen);
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
						$Dokumen0->attributes=$_POST['Dokumen'];
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
						$valid=$RKS->validate();
						$valid=$valid&&$Dokumen0->validate();
						if($valid){		
							if($Pengadaan->save(false))
							{	
								if($Dokumen0->save(false)){
									if($RKS->save(false)){
										$this->redirect(array('editrks','id'=>$id));
									}
								}
							}
						}
					}

					if($Pengadaan->jenis_kualifikasi=="Pasca Kualifikasi"){
						$this->render('rks',array(
							'Rks'=>$RKS,'Dokumen0'=>$Dokumen0,'X1'=>$X1,'X2'=>$X2,'X3'=>$X3,'X4'=>$X4,
						));
					} else {
						$this->render('rks',array(
							'Rks'=>$RKS,'Dokumen0'=>$Dokumen0,
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
				if (Yii::app()->user->getState('role') == 'anggota') {
					
					$Pengadaan=Pengadaan::model()->findByPk($id);
					$Pengadaan->status='3';
					
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
					$HPS->nilai_hps=0;
					
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
										$this->redirect(array('edithps','id'=>$id));
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
				if (Yii::app()->user->getState('role') == 'anggota') {
					
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
						if($HPS->nilai_hps>0){
							if($Pengadaan->jenis_kualifikasi=="Pra Kualifikasi") {
								$Pengadaan->status="4";
							} else {
								if($Pengadaan->metode_pengadaan=='Pelelangan'){
									$Pengadaan->status= "17";
								} else if ($Pengadaan->metode_pengadaan=='Penunjukan Langsung'||$Pengadaan->metode_pengadaan=='Pemilihan Langsung') {
									$Pengadaan->status= "16";
								}
							}
						}
						$valid=$HPS->validate();;
						$valid=$valid&&$Dokumen0->validate();
						if($valid){						
							if($Pengadaan->save(false))
							{	
								if($Dokumen0->save(false)){
									if($HPS->save(false)){
										Yii::app()->user->setFlash('sukses','Data Telah Disimpan');
										$this->redirect(array('edithps','id'=>$id));
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
	
		public function actionDokumenprakualifikasi()
		{	
			$id = Yii::app()->getRequest()->getQuery('id');
			if (Yii::app()->user->isGuest) {
				$this->redirect(array('site/login'));
			}
			else {
				if (Yii::app()->user->getState('role') == 'anggota') {
					$Pengadaan=Pengadaan::model()->findByPk($id);
					if ($Pengadaan->metode_pengadaan=='Pelelangan'){
						$Pengadaan->status= "6";
					} else {	
						$Pengadaan->status= "5";
					}
					
					$Dokumen0= new Dokumen;
					$criteria=new CDbcriteria;
					$criteria->select='max(id_dokumen) AS maxId';
					$row = $Dokumen0->model()->find($criteria);
					$somevariable = $row['maxId'];
					$Dokumen0->id_dokumen=$somevariable+1;
					$Dokumen0->nama_dokumen='Dokumen Prakualifikasi';
					$Dokumen0->tempat='Jakarta';
					$Dokumen0->status_upload='Belum Selesai';
					$Dokumen0->id_pengadaan=$id;
					date_default_timezone_set("Asia/Jakarta");
					$Dokumen0->tanggal=date('d-m-Y');
					
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
					
					$DPK= new DokumenPrakualifikasi;
					$DPK->id_dokumen=$Dokumen0->id_dokumen;
					
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
					
					if(isset($_POST['DokumenPrakualifikasi']))
					{
						$Dokumen0->attributes=$_POST['Dokumen'];
						$DPK->attributes=$_POST['DokumenPrakualifikasi'];
						$valid=$DPK->validate();
						$valid=$valid&&$Dokumen0->validate();
						if($valid){
							if($Pengadaan->save(false))
							{	
								if($Dokumen0->save(false)&&$Dokumen1->save(false)&&$Dokumen2->save(false)&&$Dokumen3->save(false)&&$Dokumen4->save(false)){
									if($DPK->save(false)&&$X1->save(false)&&$X2->save(false)&&$X3->save(false)&&$X4->save(false)){
										$this->redirect(array('editdokumenprakualifikasi','id'=>$Dokumen0->id_pengadaan));
									}
								}
							}
						}
					}

					$this->render('dokumenprakualifikasi',array(
						'DPK'=>$DPK,'Dokumen0'=>$Dokumen0,'X1'=>$X1,'X2'=>$X2,'X3'=>$X3,'X4'=>$X4,
					));
				}
			}
		}
		
		public function actionEditDokumenprakualifikasi()
		{	
			$id = Yii::app()->getRequest()->getQuery('id');
			if (Yii::app()->user->isGuest) {
				$this->redirect(array('site/login'));
			}
			else {
				if (Yii::app()->user->getState('role') == 'anggota') {
				
					$Pengadaan=Pengadaan::model()->findByPk($id);
					
					$Dokumen0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Dokumen Prakualifikasi"');
					$Dokumen1= Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Pakta Integritas Penyedia"');
					$Dokumen2= Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Pengantar Penawaran Harga"');
					$Dokumen3= Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Pernyataan Minat"');
					$Dokumen4= Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Form Isian Kualifikasi"');
					
					$DPK= DokumenPrakualifikasi::model()->findByPk($Dokumen0->id_dokumen);
					$DPK->waktu_pemasukan1=Tanggal::getJamMenit($DPK->waktu_pemasukan1);
					$DPK->waktu_pemasukan2=Tanggal::getJamMenit($DPK->waktu_pemasukan2);
					$DPK->waktu_evaluasi=Tanggal::getJamMenit($DPK->waktu_evaluasi);
					$DPK->waktu_penetapan=Tanggal::getJamMenit($DPK->waktu_penetapan);
					
					$X1= PaktaIntegritasPenyedia::model()->findByPk($Dokumen1->id_dokumen);
					$X2= SuratPengantarPenawaranHarga::model()->findByPk($Dokumen2->id_dokumen);
					$X3= SuratPernyataanMinat::model()->findByPk($Dokumen3->id_dokumen);
					$X4= FormIsianKualifikasi::model()->findByPk($Dokumen4->id_dokumen);
					
					//Uncomment the following line if AJAX validation is needed
					//$this->performAjaxValidation($model);

					if(isset($_POST['DokumenPrakualifikasi']))
					{
						$Dokumen0->attributes=$_POST['Dokumen'];
						$DPK->attributes=$_POST['DokumenPrakualifikasi'];
						$valid=$DPK->validate();
						$valid=$valid&&$Dokumen0->validate();
						if($valid){
							if($Pengadaan->save(false))
							{	
								if($Dokumen0->save(false)&&$Dokumen1->save(false)&&$Dokumen2->save(false)&&$Dokumen3->save(false)&&$Dokumen4->save(false)){
									if($DPK->save(false)&&$X1->save(false)&&$X2->save(false)&&$X3->save(false)&&$X4->save(false)){
										$this->redirect(array('editdokumenprakualifikasi','id'=>$Dokumen0->id_pengadaan));
									}
								}
							}
						}
					}

					$this->render('dokumenprakualifikasi',array(
						'DPK'=>$DPK,'Dokumen0'=>$Dokumen0,'X1'=>$X1,'X2'=>$X2,'X3'=>$X3,'X4'=>$X4,
					));

				}
			}
		}
	
		public function actionSuratundanganprakualifikasi()
		{	
			$id = Yii::app()->getRequest()->getQuery('id');
			if (Yii::app()->user->isGuest) {
				$this->redirect(array('site/login'));
			}
			else {
				if (Yii::app()->user->getState('role') == 'anggota') {
					
					$Pengadaan=Pengadaan::model()->findByPk($id);
					$Pengadaan->status= "9";
					
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
					
					$SUPK= new SuratUndanganPrakualifikasi;
					$SUPK->id_dokumen=$Dokumen0->id_dokumen;
					$SUPK->perihal= 'Undangan Prakualifikasi '.$Pengadaan->nama_pengadaan;
					
					//Uncomment the following line if AJAX validation is needed
					//$this->performAjaxValidation($model);

					if(isset($_POST['SuratUndanganPrakualifikasi']))
					{
						$Dokumen0->attributes=$_POST['Dokumen'];
						$SUPK->attributes=$_POST['SuratUndanganPrakualifikasi'];
						$valid=$Dokumen0->validate();
						$valid=$valid&&$SUPK->validate();
						if($valid){
							if($Pengadaan->save(false))
							{	
								if($Dokumen0->save(false)){
									if($SUPK->save(false)){
										$this->redirect(array('editsuratundanganprakualifikasi','id'=>$Dokumen0->id_pengadaan));
									}
								}
							}
						}
					}

					$this->render('suratundanganprakualifikasi',array(
						'Dokumen0'=>$Dokumen0,'SUPK'=>$SUPK,
					));
				}
			}
		}
		
		public function actionEditSuratundanganprakualifikasi()
		{	
			$id = Yii::app()->getRequest()->getQuery('id');
			if (Yii::app()->user->isGuest) {
				$this->redirect(array('site/login'));
			}
			else {
				if (Yii::app()->user->getState('role') == 'anggota') {
					
					$Pengadaan=Pengadaan::model()->findByPk($id);
					
					$Dokumen0= Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Prakualifikasi"');
					
					$SUPK= SuratUndanganPrakualifikasi::model()->findByPk($Dokumen0->id_dokumen);
					
					//Uncomment the following line if AJAX validation is needed
					//$this->performAjaxValidation($model);

					if(isset($_POST['SuratUndanganPrakualifikasi']))
					{
						$Dokumen0->attributes=$_POST['Dokumen'];
						$SUPK->attributes=$_POST['SuratUndanganPrakualifikasi'];
						$valid=$Dokumen0->validate();
						$valid=$valid&&$SUPK->validate();
						if($valid){
							if($Pengadaan->save(false))
							{	
								if($Dokumen0->save(false)){
									if($SUPK->save(false)){
										$this->redirect(array('editsuratundanganprakualifikasi','id'=>$Dokumen0->id_pengadaan));
									}
								}
							}
						}
					}

					$this->render('suratundanganprakualifikasi',array(
						'Dokumen0'=>$Dokumen0,'SUPK'=>$SUPK,
					));
				}
			}
		}
	
		public function actionSuratpengumumanpelelanganprakualifikasi()
		{	
			$id = Yii::app()->getRequest()->getQuery('id');
			if (Yii::app()->user->isGuest) {
				$this->redirect(array('site/login'));
			}
			else {
				if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
					$Pengadaan=Pengadaan::model()->findByPk($id);
					$Pengadaan->status="7";
					
					$DokHPS=Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "HPS"');
					$HPS=Hps::model()->findByPk($DokHPS->id_dokumen);
					
					$Dokumen0= new Dokumen;
					$criteria=new CDbcriteria;
					$criteria->select='max(id_dokumen) AS maxId';
					$row = $Dokumen0->model()->find($criteria);
					$somevariable = $row['maxId'];
					$Dokumen0->id_dokumen=$somevariable+1;
					$Dokumen0->nama_dokumen='Surat Pengumuman Pelelangan Prakualifikasi';
					$Dokumen0->tempat='Jakarta';
					$Dokumen0->status_upload='Belum Selesai';
					$Dokumen0->id_pengadaan=$id;
					date_default_timezone_set("Asia/Jakarta");
					$Dokumen0->tanggal=date('d-m-Y');
					
					$SPPP= new SuratPengumumanPelelangan;
					$SPPP->id_dokumen=$Dokumen0->id_dokumen;
					
					if(isset($_POST['SuratPengumumanPelelangan']))
					{
						$Dokumen0->attributes=$_POST['Dokumen'];
						$SPPP->attributes=$_POST['SuratPengumumanPelelangan'];
						$valid=$Dokumen0->validate();
						$valid=$valid&&$SPPP->validate();
						if($valid){
							if($Pengadaan->save(false))
							{	
								if($Dokumen0->save(false)){
									if($SPPP->save(false)){
										$this->redirect(array('editsuratpengumumanpelelanganprakualifikasi','id'=>$Dokumen0->id_pengadaan));
									}
								}
							}
						}
					}
					$this->render('suratpengumumanpelelanganprakualifikasi',array(
						'SPPP'=>$SPPP,'Dokumen0'=>$Dokumen0,'HPS'=>$HPS,
					));
				}
			}
		}
		
		public function actionEditSuratpengumumanpelelanganprakualifikasi()
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
					
					$Dokumen0=Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "Surat Pengumuman Pelelangan Prakualifikasi"');
					$SPPP=SuratPengumumanPelelangan::model()->findByPk($Dokumen0->id_dokumen);
					
					if(isset($_POST['SuratPengumumanPelelangan']))
					{
						$Dokumen0->attributes=$_POST['Dokumen'];
						$SPPP->attributes=$_POST['SuratPengumumanPelelangan'];
						$valid=$Dokumen0->validate();
						$valid=$valid&&$SPPP->validate();
						if($valid){
							if($Pengadaan->save(false))
							{	
								if($Dokumen0->save(false)){
									if($SPPP->save(false)){
										$this->redirect(array('editsuratpengumumanpelelanganprakualifikasi','id'=>$Dokumen0->id_pengadaan));
									}
								}
							}
						}
					}
					$this->render('suratpengumumanpelelanganprakualifikasi',array(
						'SPPP'=>$SPPP,'Dokumen0'=>$Dokumen0,'HPS'=>$HPS,
					));
				}
			}
		}
	
		public function actionPendaftaranpelelanganprakualifikasi()
		{	
			$id = Yii::app()->getRequest()->getQuery('id');
			if (Yii::app()->user->isGuest) {
				$this->redirect(array('site/login'));
			}
			else {
				if (Yii::app()->user->getState('role') == 'anggota') {
					
					$Pengadaan=Pengadaan::model()->findByPk($id);
					$Pengadaan->status="8";

					$PP = array(new PenerimaPengadaan);	
						
					if(isset($_POST['perusahaan'])){
						$total = count($_POST['perusahaan']);
						
						for($i=0;$i<$total;$i++){
							if(isset($_POST['perusahaan'][$i])){
								$PP[$i] = new PenerimaPengadaan;									
								$PP[$i]->id_pengadaan = $Pengadaan->id_pengadaan;									
								$PP[$i]->perusahaan=$_POST['perusahaan'][$i];									
								$PP[$i]->alamat='-';									
								$PP[$i]->npwp='-';		
								$PP[$i]->nilai = 0;									
								$PP[$i]->biaya = '0';									
								$PP[$i]->nomor_surat_penawaran = '-';									
								$PP[$i]->tanggal_penawaran = '-';									
								$PP[$i]->undangan_prakualifikasi = '1';
								$PP[$i]->pendaftaran_pelelangan_pq = '1';		
								$PP[$i]->pengambilan_lelang_pq = '-';
								$PP[$i]->penyampaian_lelang = '-';
								$PP[$i]->evaluasi_pq = '-';
								$PP[$i]->penetapan_pq = '-';
								$PP[$i]->undangan_supph = '-';
								$PP[$i]->pendaftaran_pc = '-';
								$PP[$i]->pengambilan_dokumen = '-';									
								$PP[$i]->ba_aanwijzing = '-';
								$PP[$i]->hadir_pembukaan_penawaran_1 = '-';
								$PP[$i]->pembukaan_penawaran_1 = '-';
								$PP[$i]->evaluasi_penawaran_1 = '-';
								$PP[$i]->hadir_pembukaan_penawaran_2 = '-';
								$PP[$i]->pembukaan_penawaran_2 = '-';			
								$PP[$i]->evaluasi_penawaran_2 = '-';
								$PP[$i]->negosiasi_klarifikasi = '-';
								$PP[$i]->usulan_pemenang = '-';
								$PP[$i]->penetapan_pemenang	 = '-';								
								
								$PP[$i]->save();
							}
						}
							
						if($Pengadaan->save(false))
						{						
							$this->redirect(array('editpendaftaranpelelanganprakualifikasi','id'=>$id));					
						}
					}


					$this->render('pendaftaranpelelanganprakualifikasi',array(
						'PP'=>$PP,
					));
				}
			}
		}
		
		public function actionEditPendaftaranpelelanganprakualifikasi()
		{	
			$id = Yii::app()->getRequest()->getQuery('id');
			if (Yii::app()->user->isGuest) {
				$this->redirect(array('site/login'));
			}
			else {
				if (Yii::app()->user->getState('role') == 'anggota') {
					
					$Pengadaan=Pengadaan::model()->findByPk($id);
									
					//Uncomment the following line if AJAX validation is needed
					//$this->performAjaxValidation($model);
					
					$PP = PenerimaPengadaan::model()->findAll('pendaftaran_pelelangan_pq = "1" and id_pengadaan = ' . $Pengadaan->id_pengadaan);
						
					if($PP == null){
						$this->redirect(array('pendaftaranpelelangan','id'=>$id));		
					}
					
					if(isset($_POST['perusahaan'])){
													
						for($i=0;$i<count($PP);$i++){
							if(isset($_POST['perusahaan'][$i])){																																																
								$PP[$i]->perusahaan=$_POST['perusahaan'][$i];									
								$PP[$i]->save();
							}
						}
						
						$total = count($_POST['perusahaan']);
						if(count($PP)<$total){
							$PPkurang = $total - count($PP);
							for($j=0;$j<$PPkurang;$j++){
								$PPbaru = new PenerimaPengadaan;
								$PPbaru->id_pengadaan = $Pengadaan->id_pengadaan;							
								$PPbaru->perusahaan=$_POST['perusahaan'][$j+$i];	
								$PPbaru->alamat='-';									
								$PPbaru->npwp='-';		
								$PPbaru->nilai = 0;
								$PPbaru->biaya = '0';							
								$PPbaru->nomor_surat_penawaran = '-';
								$PPbaru->tanggal_penawaran = '-';														
								$PPbaru->undangan_prakualifikasi = '1';
								$PPbaru->pendaftaran_pelelangan_pq = '1';		
								$PPbaru->pengambilan_lelang_pq = '-';
								$PPbaru->penyampaian_lelang = '-';
								$PPbaru->evaluasi_pq = '-';
								$PPbaru->penetapan_pq = '-';
								$PPbaru->undangan_supph = '-';
								$PPbaru->pendaftaran_pc = '-';
								$PPbaru->pengambilan_dokumen = '-';
								$PPbaru->pengambilan_dokumen = '-';
								$PPbaru->ba_aanwijzing = '-';
								$PPbaru->pembukaan_penawaran_1 = '-';
								$PPbaru->evaluasi_penawaran_1 = '-';
								$PPbaru->pembukaan_penawaran_2 = '-';
								$PPbaru->evaluasi_penawaran_2 = '-';
								$PPbaru->negosiasi_klarifikasi = '-';
								$PPbaru->usulan_pemenang = '-';
								$PPbaru->penetapan_pemenang = '-';
								
								$PPbaru->save();
							}
							
						}
						
						
						if($Pengadaan->save(false)){	
							$this->redirect(array('editpendaftaranpelelanganprakualifikasi','id'=>$id));					
						}			
						
					}
						
						
					$this->render('pendaftaranpelelanganprakualifikasi',array(
						'PP'=>$PP,
					));
				}
			}
		}
	
		public function actionPengambilanDokumenPrakualifikasi()
		{	
			$id = Yii::app()->getRequest()->getQuery('id');
			if (Yii::app()->user->isGuest) {
				$this->redirect(array('site/login'));
			}
			else {
				if (Yii::app()->user->getState('role') == 'anggota') {
					
					$Pengadaan=Pengadaan::model()->findByPk($id);
					$Pengadaan->status="9";
					
					//Uncomment the following line if AJAX validation is needed
					//$this->performAjaxValidation($model);
					
					$PP = PenerimaPengadaan::model()->findAll('pendaftaran_pelelangan_pq = "1" and id_pengadaan = ' . $Pengadaan->id_pengadaan);
					
					if(isset($_POST['perusahaan'])){
													
						for($i=0;$i<count($PP);$i++){
							if(isset($_POST['perusahaan'][$i])){																																																
								$PP[$i]->perusahaan=$_POST['perusahaan'][$i];									
								$PP[$i]->pengambilan_lelang_pq = $_POST['pengambilan_lelang_pq'][$i];	
								$PP[$i]->save();
							}
						}
						
						$total = count($_POST['perusahaan']);
						if(count($PP)<$total){
							$PPkurang = $total - count($PP);
							for($j=0;$j<$PPkurang;$j++){
								$PPbaru = new PenerimaPengadaan;
								$PPbaru->id_pengadaan = $Pengadaan->id_pengadaan;							
								$PPbaru->perusahaan=$_POST['perusahaan'][$j+$i];	
								$PPbaru->alamat='-';									
								$PPbaru->npwp='-';		
								$PPbaru->nilai = 0;
								$PPbaru->biaya = '0';							
								$PPbaru->nomor_surat_penawaran = '-';
								$PPbaru->tanggal_penawaran = '-';														
								$PPbaru->undangan_prakualifikasi = '1';
								$PPbaru->pendaftaran_pelelangan_pq = '1';
								$PPbaru->pengambilan_lelang_pq = $_POST['pengambilan_lelang_pq'][$i+$j];		
								$PPbaru->penyampaian_lelang = '-';
								$PPbaru->evaluasi_pq = '-';
								$PPbaru->penetapan_pq = '-';
								$PPbaru->undangan_supph = '-';
								$PPbaru->pendaftaran_pc = '-';
								$PPbaru->pengambilan_dokumen = '-';
								$PPbaru->ba_aanwijzing = '-';
								$PPbaru->hadir_pembukaan_penawaran_1 = '-';
								$PPbaru->pembukaan_penawaran_1 = '-';
								$PPbaru->evaluasi_penawaran_1 = '-';
								$PPbaru->hadir_pembukaan_penawaran_2 = '-';
								$PPbaru->pembukaan_penawaran_2 = '-';
								$PPbaru->evaluasi_penawaran_2 = '-';
								$PPbaru->negosiasi_klarifikasi = '-';
								$PPbaru->usulan_pemenang = '-';
								$PPbaru->penetapan_pemenang = '-';
								
								$PPbaru->save();
							}
							
						}
						
						
						if($Pengadaan->save(false)){	
							$this->redirect(array('editpengambilandokumenprakualifikasi','id'=>$id));					
						}			
						
					}
						
						
					$this->render('pengambilandokumenprakualifikasi',array(
						'Pengadaan'=>$Pengadaan,'PP'=>$PP,
					));
				}
			}
		}
		
		public function actionEditPengambilanDokumenPrakualifikasi()
		{	
			$id = Yii::app()->getRequest()->getQuery('id');
			if (Yii::app()->user->isGuest) {
				$this->redirect(array('site/login'));
			}
			else {
				if (Yii::app()->user->getState('role') == 'anggota') {
					
					$Pengadaan=Pengadaan::model()->findByPk($id);
					$Pengadaan->status="9";
					
					//Uncomment the following line if AJAX validation is needed
					//$this->performAjaxValidation($model);
					
					$PP = PenerimaPengadaan::model()->findAll('pendaftaran_pelelangan_pq = "1" and id_pengadaan = ' . $Pengadaan->id_pengadaan);
					
					if(isset($_POST['perusahaan'])){
													
						for($i=0;$i<count($PP);$i++){
							if(isset($_POST['perusahaan'][$i])){																																																
								$PP[$i]->perusahaan=$_POST['perusahaan'][$i];									
								$PP[$i]->pengambilan_lelang_pq = $_POST['pengambilan_lelang_pq'][$i];	
								$PP[$i]->save();
							}
						}
						
						$total = count($_POST['perusahaan']);
						if(count($PP)<$total){
							$PPkurang = $total - count($PP);
							for($j=0;$j<$PPkurang;$j++){
								$PPbaru = new PenerimaPengadaan;
								$PPbaru->id_pengadaan = $Pengadaan->id_pengadaan;							
								$PPbaru->perusahaan=$_POST['perusahaan'][$j+$i];	
								$PPbaru->alamat='-';									
								$PPbaru->npwp='-';		
								$PPbaru->nilai = 0;
								$PPbaru->biaya = '0';							
								$PPbaru->nomor_surat_penawaran = '-';
								$PPbaru->tanggal_penawaran = '-';														
								$PPbaru->undangan_prakualifikasi = '1';
								$PPbaru->pendaftaran_pelelangan_pq = '1';
								$PPbaru->pengambilan_lelang_pq = $_POST['pengambilan_lelang_pq'][$i+$j];		
								$PPbaru->penyampaian_lelang = '-';
								$PPbaru->evaluasi_pq = '-';
								$PPbaru->penetapan_pq = '-';
								$PPbaru->undangan_supph = '-';
								$PPbaru->pendaftaran_pc = '-';
								$PPbaru->pengambilan_dokumen = '-';
								$PPbaru->ba_aanwijzing = '-';
								$PPbaru->hadir_pembukaan_penawaran_1 = '-';
								$PPbaru->pembukaan_penawaran_1 = '-';
								$PPbaru->evaluasi_penawaran_1 = '-';
								$PPbaru->hadir_pembukaan_penawaran_2 = '-';
								$PPbaru->pembukaan_penawaran_2 = '-';
								$PPbaru->evaluasi_penawaran_2 = '-';
								$PPbaru->negosiasi_klarifikasi = '-';
								$PPbaru->usulan_pemenang = '-';
								$PPbaru->penetapan_pemenang = '-';
								
								$PPbaru->save();
							}
							
						}
						
						
						if($Pengadaan->save(false)){	
							$this->redirect(array('editpengambilandokumenprakualifikasi','id'=>$id));					
						}			
						
					}
						
						
					$this->render('pengambilandokumenprakualifikasi',array(
						'Pengadaan'=>$Pengadaan,'PP'=>$PP,
					));
				}
			}
		}
	
		public function actionPenyampaianDokumenPrakualifikasi()
		{	
			$id = Yii::app()->getRequest()->getQuery('id');
			if (Yii::app()->user->isGuest) {
				$this->redirect(array('site/login'));
			}
			else {
				if (Yii::app()->user->getState('role') == 'anggota') {
					
					$Pengadaan=Pengadaan::model()->findByPk($id);
					$Pengadaan->status="11";
					
					//Uncomment the following line if AJAX validation is needed
					//$this->performAjaxValidation($model);
					
					$PP = PenerimaPengadaan::model()->findAll('pengambilan_lelang_pq = "1" and id_pengadaan = ' . $Pengadaan->id_pengadaan);
					
					if(isset($_POST['perusahaan'])){
													
						for($i=0;$i<count($PP);$i++){
							if(isset($_POST['perusahaan'][$i])){																																																
								$PP[$i]->perusahaan=$_POST['perusahaan'][$i];									
								$PP[$i]->penyampaian_lelang = $_POST['penyampaian_lelang'][$i];
								$PP[$i]->save();
							}
						}
						
						$total = count($_POST['perusahaan']);
						if(count($PP)<$total){
							$PPkurang = $total - count($PP);
							for($j=0;$j<$PPkurang;$j++){
								$PPbaru = new PenerimaPengadaan;
								$PPbaru->id_pengadaan = $Pengadaan->id_pengadaan;							
								$PPbaru->perusahaan=$_POST['perusahaan'][$j+$i];	
								$PPbaru->alamat='-';									
								$PPbaru->npwp='-';		
								$PPbaru->nilai = 0;
								$PPbaru->biaya = '0';							
								$PPbaru->nomor_surat_penawaran = '-';
								$PPbaru->tanggal_penawaran = '-';														
								$PPbaru->undangan_prakualifikasi = '1';
								$PPbaru->pendaftaran_pelelangan_pq = '1';
								$PPbaru->pengambilan_lelang_pq = '1';
								$PPbaru->penyampaian_lelang =  $_POST['penyampaian_lelang'][$i+$j];	
								$PPbaru->evaluasi_pq = '-';
								$PPbaru->penetapan_pq = '-';
								$PPbaru->undangan_supph = '-';
								$PPbaru->pendaftaran_pc = '-';
								$PPbaru->pengambilan_dokumen = '-';
								$PPbaru->ba_aanwijzing = '-';
								$PPbaru->hadir_pembukaan_penawaran_1 = '-';
								$PPbaru->pembukaan_penawaran_1 = '-';
								$PPbaru->evaluasi_penawaran_1 = '-';
								$PPbaru->hadir_pembukaan_penawaran_2 = '-';
								$PPbaru->pembukaan_penawaran_2 = '-';
								$PPbaru->evaluasi_penawaran_2 = '-';
								$PPbaru->negosiasi_klarifikasi = '-';
								$PPbaru->usulan_pemenang = '-';
								$PPbaru->penetapan_pemenang = '-';
								
								$PPbaru->save();
							}
							
						}
						
						
						if($Pengadaan->save(false)){	
							$this->redirect(array('editpenyampaiandokumenprakualifikasi','id'=>$id));					
						}			
						
					}
						
					$Pengadaan->save();
					
					$this->render('penyampaiandokumenprakualifikasi',array(
						'Pengadaan'=>$Pengadaan,'PP'=>$PP,
					));
				}
			}
		}
		
		public function actionEditPenyampaianDokumenPrakualifikasi()
		{	
			$id = Yii::app()->getRequest()->getQuery('id');
			if (Yii::app()->user->isGuest) {
				$this->redirect(array('site/login'));
			}
			else {
				if (Yii::app()->user->getState('role') == 'anggota') {
					
					$Pengadaan=Pengadaan::model()->findByPk($id);
					
					//Uncomment the following line if AJAX validation is needed
					//$this->performAjaxValidation($model);
					
					$PP = PenerimaPengadaan::model()->findAll('pengambilan_lelang_pq = "1" and id_pengadaan = ' . $Pengadaan->id_pengadaan);
					
					if(isset($_POST['perusahaan'])){
													
						for($i=0;$i<count($PP);$i++){
							if(isset($_POST['perusahaan'][$i])){																																																
								$PP[$i]->perusahaan=$_POST['perusahaan'][$i];									
								$PP[$i]->penyampaian_lelang = $_POST['penyampaian_lelang'][$i];
								$PP[$i]->save();
							}
						}
						
						$total = count($_POST['perusahaan']);
						if(count($PP)<$total){
							$PPkurang = $total - count($PP);
							for($j=0;$j<$PPkurang;$j++){
								$PPbaru = new PenerimaPengadaan;
								$PPbaru->id_pengadaan = $Pengadaan->id_pengadaan;							
								$PPbaru->perusahaan=$_POST['perusahaan'][$j+$i];	
								$PPbaru->alamat='-';									
								$PPbaru->npwp='-';		
								$PPbaru->nilai = 0;
								$PPbaru->biaya = '0';							
								$PPbaru->nomor_surat_penawaran = '-';
								$PPbaru->tanggal_penawaran = '-';														
								$PPbaru->undangan_prakualifikasi = '1';
								$PPbaru->pendaftaran_pelelangan_pq = '1';
								$PPbaru->pengambilan_lelang_pq = '1';
								$PPbaru->penyampaian_lelang =  $_POST['penyampaian_lelang'][$i+$j];	
								$PPbaru->evaluasi_pq = '-';
								$PPbaru->penetapan_pq = '-';
								$PPbaru->undangan_supph = '-';
								$PPbaru->pendaftaran_pc = '-';
								$PPbaru->pengambilan_dokumen = '-';
								$PPbaru->ba_aanwijzing = '-';
								$PPbaru->pembukaan_penawaran_1 = '-';
								$PPbaru->evaluasi_penawaran_1 = '-';
								$PPbaru->pembukaan_penawaran_2 = '-';
								$PPbaru->evaluasi_penawaran_2 = '-';
								$PPbaru->negosiasi_klarifikasi = '-';
								$PPbaru->usulan_pemenang = '-';
								$PPbaru->penetapan_pemenang = '-';
								
								$PPbaru->save();
							}
							
						}
						
						
						if($Pengadaan->save(false)){	
							$this->redirect(array('editpenyampaiandokumenprakualifikasi','id'=>$id));					
						}			
						
					}
						
					$Pengadaan->save();
					
					$this->render('penyampaiandokumenprakualifikasi',array(
						'Pengadaan'=>$Pengadaan,'PP'=>$PP,
					));
				}
			}
		}
	
		public function actionEvaluasiDokumenPrakualifikasi()
		{	
			$id = Yii::app()->getRequest()->getQuery('id');
			if (Yii::app()->user->isGuest) {
				$this->redirect(array('site/login'));
			}
			else {
				if (Yii::app()->user->getState('role') == 'anggota') {
					
					$Pengadaan=Pengadaan::model()->findByPk($id);
					$Pengadaan->status="13";
					
					//Uncomment the following line if AJAX validation is needed
					//$this->performAjaxValidation($model);
					
					$PP = PenerimaPengadaan::model()->findAll('penyampaian_lelang = "1" and id_pengadaan = ' . $Pengadaan->id_pengadaan);
					
					if(isset($_POST['perusahaan'])){
													
						for($i=0;$i<count($PP);$i++){
							if(isset($_POST['perusahaan'][$i])){																																																
								$PP[$i]->perusahaan=$_POST['perusahaan'][$i];																									
								$PP[$i]->undangan_prakualifikasi = '1';
								$PP[$i]->pendaftaran_pelelangan_pq = '1';	
								$PP[$i]->pengambilan_lelang_pq = '1';
								$PP[$i]->penyampaian_lelang = '1';
								$PP[$i]->evaluasi_pq = $_POST['evaluasi_pq'][$i];	
								$PP[$i]->penetapan_pq = '-';
								$PP[$i]->undangan_supph = '-';
								$PP[$i]->pendaftaran_pc = '-';
								$PP[$i]->pengambilan_dokumen = '-';									
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
								$PPbaru->perusahaan=$_POST['perusahaan'][$j+$i];	
								$PPbaru->alamat='-';									
								$PPbaru->npwp='-';		
								$PPbaru->nilai = 0;
								$PPbaru->biaya = '0';							
								$PPbaru->nomor_surat_penawaran = '-';
								$PPbaru->tanggal_penawaran = '-';														
								$PPbaru->undangan_prakualifikasi = '1';
								$PPbaru->pendaftaran_pelelangan_pq = '1';
								$PPbaru->pengambilan_lelang_pq = '1';
								$PPbaru->penyampaian_lelang = '-';
								$PPbaru->evaluasi_pq = $_POST['evaluasi_pq'][$i+$j];		
								$PPbaru->penetapan_pq = '-';
								$PPbaru->undangan_supph = '-';
								$PPbaru->pendaftaran_pc = '-';
								$PPbaru->pengambilan_dokumen = '-';
								$PPbaru->ba_aanwijzing = '-';
								$PPbaru->pembukaan_penawaran_1 = '-';
								$PPbaru->evaluasi_penawaran_1 = '-';
								$PPbaru->pembukaan_penawaran_2 = '-';
								$PPbaru->evaluasi_penawaran_2 = '-';
								$PPbaru->negosiasi_klarifikasi = '-';
								$PPbaru->usulan_pemenang = '-';
								$PPbaru->penetapan_pemenang = '-';
								
								$PPbaru->save();
							}
							
						}
						
						
						if($Pengadaan->save(false)){	
							$this->redirect(array('editevaluasidokumenprakualifikasi','id'=>$id));					
						}			
						
					}
						
					$Pengadaan->save();
					
					$this->render('evaluasidokumenprakualifikasi',array(
						'Pengadaan'=>$Pengadaan,'PP'=>$PP,
					));
				}
			}
		}
		
		public function actionEditEvaluasiDokumenPrakualifikasi()
		{	
			$id = Yii::app()->getRequest()->getQuery('id');
			if (Yii::app()->user->isGuest) {
				$this->redirect(array('site/login'));
			}
			else {
				if (Yii::app()->user->getState('role') == 'anggota') {
					
					$Pengadaan=Pengadaan::model()->findByPk($id);
					
					//Uncomment the following line if AJAX validation is needed
					//$this->performAjaxValidation($model);
					
					$PP = PenerimaPengadaan::model()->findAll('penyampaian_lelang = "1" and id_pengadaan = ' . $Pengadaan->id_pengadaan);
					
					if(isset($_POST['perusahaan'])){
													
						for($i=0;$i<count($PP);$i++){
							if(isset($_POST['perusahaan'][$i])){																																																
								$PP[$i]->perusahaan=$_POST['perusahaan'][$i];															
								$PP[$i]->evaluasi_pq = $_POST['evaluasi_pq'][$i];															
								$PP[$i]->save();
							}
						}
						
						$total = count($_POST['perusahaan']);
						if(count($PP)<$total){
							$PPkurang = $total - count($PP);
							for($j=0;$j<$PPkurang;$j++){
								$PPbaru = new PenerimaPengadaan;
								$PPbaru->id_pengadaan = $Pengadaan->id_pengadaan;							
								$PPbaru->perusahaan=$_POST['perusahaan'][$j+$i];	
								$PPbaru->alamat='-';									
								$PPbaru->npwp='-';		
								$PPbaru->nilai = 0;
								$PPbaru->biaya = '0';							
								$PPbaru->nomor_surat_penawaran = '-';
								$PPbaru->tanggal_penawaran = '-';														
								$PPbaru->undangan_prakualifikasi = '1';
								$PPbaru->pendaftaran_pelelangan_pq = '1';
								$PPbaru->pengambilan_lelang_pq = '1';		
								$PPbaru->penyampaian_lelang = '1';
								$PPbaru->evaluasi_pq = $_POST['evaluasi_pq'][$i+$j];
								$PPbaru->penetapan_pq = '-';
								$PPbaru->undangan_supph = '-';
								$PPbaru->pendaftaran_pc = '-';
								$PPbaru->pengambilan_dokumen = '-';
								$PPbaru->ba_aanwijzing = '-';
								$PPbaru->pembukaan_penawaran_1 = '-';
								$PPbaru->evaluasi_penawaran_1 = '-';
								$PPbaru->pembukaan_penawaran_2 = '-';
								$PPbaru->evaluasi_penawaran_2 = '-';
								$PPbaru->negosiasi_klarifikasi = '-';
								$PPbaru->usulan_pemenang = '-';
								$PPbaru->penetapan_pemenang = '-';
								
								$PPbaru->save();
							}
							
						}
						
						
						if($Pengadaan->save(false)){	
							$this->redirect(array('editevaluasidokumenprakualifikasi','id'=>$id));					
						}			
						
					}
						
					$Pengadaan->save();
					
					$this->render('evaluasidokumenprakualifikasi',array(
						'Pengadaan'=>$Pengadaan,'PP'=>$PP,
					));
				}
			}
		}
	
		public function actionUsulanHasilPrakualifikasi()
		{	
			$id = Yii::app()->getRequest()->getQuery('id');
			if (Yii::app()->user->isGuest) {
				$this->redirect(array('site/login'));
			}
			else {
				if (Yii::app()->user->getState('role') == 'anggota') {
					
					$Pengadaan=Pengadaan::model()->findByPk($id);
					$Pengadaan->status="14";
					
					//Uncomment the following line if AJAX validation is needed
					//$this->performAjaxValidation($model);
					
					// $PP = PenerimaPengadaan::model()->findAll('pendaftaran_pelelangan_pq = "1" and id_pengadaan = ' . $Pengadaan->id_pengadaan);
					
					// if(isset($_POST['perusahaan'])){
													
						// for($i=0;$i<count($PP);$i++){
							// if(isset($_POST['perusahaan'][$i])){																																																
								// $PP[$i]->perusahaan=$_POST['perusahaan'][$i];									
								// $PP[$i]->alamat='-';									
								// $PP[$i]->npwp='-';		
								// $PP[$i]->nilai = 0;									
								// $PP[$i]->biaya = '0';				
								// $PP[$i]->nomor_surat_penawaran = '-';									
								// $PP[$i]->tanggal_penawaran = '-';												
								// $PP[$i]->undangan_prakualifikasi = '1';
								// $PP[$i]->pendaftaran_pelelangan_pq = '1';	
								// $PP[$i]->pengambilan_lelang_pq = $_POST['pengambilan_lelang_pq'][$i];	
								// $PP[$i]->penyampaian_lelang = '-';
								// $PP[$i]->evaluasi_pq = '-';
								// $PP[$i]->penetapan_pq = '-';
								// $PP[$i]->undangan_supph = '-';
								// $PP[$i]->pendaftaran_pc = '-';
								// $PP[$i]->pengambilan_dokumen = '-';									
								// $PP[$i]->ba_aanwijzing = '-';
								// $PP[$i]->pembukaan_penawaran_1 = '-';
								// $PP[$i]->evaluasi_penawaran_1 = '-';
								// $PP[$i]->pembukaan_penawaran_2 = '-';			
								// $PP[$i]->evaluasi_penawaran_2 = '-';
								// $PP[$i]->negosiasi_klarifikasi = '-';
								// $PP[$i]->usulan_pemenang = '-';
								// $PP[$i]->penetapan_pemenang	 = '-';								
								
								// $PP[$i]->save();
							// }
						// }
						
						// $total = count($_POST['perusahaan']);
						// if(count($PP)<$total){
							// $PPkurang = $total - count($PP);
							// for($j=0;$j<$PPkurang;$j++){
								// $PPbaru = new PenerimaPengadaan;
								// $PPbaru->id_pengadaan = $Pengadaan->id_pengadaan;							
								// $PPbaru->perusahaan=$_POST['perusahaan'][$j+$i];	
								// $PPbaru->alamat='-';									
								// $PPbaru->npwp='-';		
								// $PPbaru->nilai = 0;
								// $PPbaru->biaya = '0';							
								// $PPbaru->nomor_surat_penawaran = '-';
								// $PPbaru->tanggal_penawaran = '-';														
								// $PPbaru->undangan_prakualifikasi = '1';
								// $PPbaru->pendaftaran_pelelangan_pq = '1';
								// $PPbaru->pengambilan_lelang_pq = $_POST['pengambilan_lelang_pq'][$i+$j];		
								// $PPbaru->penyampaian_lelang = '-';
								// $PPbaru->evaluasi_pq = '-';
								// $PPbaru->penetapan_pq = '-';
								// $PPbaru->undangan_supph = '-';
								// $PPbaru->pendaftaran_pc = '-';
								// $PPbaru->pengambilan_dokumen = '-';
								// $PPbaru->ba_aanwijzing = '-';
								// $PPbaru->pembukaan_penawaran_1 = '-';
								// $PPbaru->evaluasi_penawaran_1 = '-';
								// $PPbaru->pembukaan_penawaran_2 = '-';
								// $PPbaru->evaluasi_penawaran_2 = '-';
								// $PPbaru->negosiasi_klarifikasi = '-';
								// $PPbaru->usulan_pemenang = '-';
								// $PPbaru->penetapan_pemenang = '-';
								
								// $PPbaru->save();
							// }
							
						// }
						
						
						// if($Pengadaan->save(false)){	
							// $this->redirect(array('editpenyampaiandokumenprakualifikasi','id'=>$id));					
						// }			
						
					// }
						
					$Pengadaan->save();
					
					$this->render('usulanhasilprakualifikasi',array(
						// 'Pengadaan'=>$Pengadaan,'PP'=>$PP,
					));
				}
			}
		}
		
		public function actionEditUsulanHasilPrakualifikasi()
		{	
			$id = Yii::app()->getRequest()->getQuery('id');
			if (Yii::app()->user->isGuest) {
				$this->redirect(array('site/login'));
			}
			else {
				if (Yii::app()->user->getState('role') == 'anggota') {
					
					$Pengadaan=Pengadaan::model()->findByPk($id);
					
					//Uncomment the following line if AJAX validation is needed
					//$this->performAjaxValidation($model);
					
					// $PP = PenerimaPengadaan::model()->findAll('pendaftaran_pelelangan_pq = "1" and id_pengadaan = ' . $Pengadaan->id_pengadaan);
					
					// if(isset($_POST['perusahaan'])){
													
						// for($i=0;$i<count($PP);$i++){
							// if(isset($_POST['perusahaan'][$i])){																																																
								// $PP[$i]->perusahaan=$_POST['perusahaan'][$i];									
								// $PP[$i]->alamat='-';									
								// $PP[$i]->npwp='-';		
								// $PP[$i]->nilai = 0;									
								// $PP[$i]->biaya = '0';				
								// $PP[$i]->nomor_surat_penawaran = '-';									
								// $PP[$i]->tanggal_penawaran = '-';												
								// $PP[$i]->undangan_prakualifikasi = '1';
								// $PP[$i]->pendaftaran_pelelangan_pq = '1';	
								// $PP[$i]->pengambilan_lelang_pq = $_POST['pengambilan_lelang_pq'][$i];	
								// $PP[$i]->penyampaian_lelang = '-';
								// $PP[$i]->evaluasi_pq = '-';
								// $PP[$i]->penetapan_pq = '-';
								// $PP[$i]->undangan_supph = '-';
								// $PP[$i]->pendaftaran_pc = '-';
								// $PP[$i]->pengambilan_dokumen = '-';									
								// $PP[$i]->ba_aanwijzing = '-';
								// $PP[$i]->pembukaan_penawaran_1 = '-';
								// $PP[$i]->evaluasi_penawaran_1 = '-';
								// $PP[$i]->pembukaan_penawaran_2 = '-';			
								// $PP[$i]->evaluasi_penawaran_2 = '-';
								// $PP[$i]->negosiasi_klarifikasi = '-';
								// $PP[$i]->usulan_pemenang = '-';
								// $PP[$i]->penetapan_pemenang	 = '-';								
								
								// $PP[$i]->save();
							// }
						// }
						
						// $total = count($_POST['perusahaan']);
						// if(count($PP)<$total){
							// $PPkurang = $total - count($PP);
							// for($j=0;$j<$PPkurang;$j++){
								// $PPbaru = new PenerimaPengadaan;
								// $PPbaru->id_pengadaan = $Pengadaan->id_pengadaan;							
								// $PPbaru->perusahaan=$_POST['perusahaan'][$j+$i];	
								// $PPbaru->alamat='-';									
								// $PPbaru->npwp='-';		
								// $PPbaru->nilai = 0;
								// $PPbaru->biaya = '0';							
								// $PPbaru->nomor_surat_penawaran = '-';
								// $PPbaru->tanggal_penawaran = '-';														
								// $PPbaru->undangan_prakualifikasi = '1';
								// $PPbaru->pendaftaran_pelelangan_pq = '1';
								// $PPbaru->pengambilan_lelang_pq = $_POST['pengambilan_lelang_pq'][$i+$j];		
								// $PPbaru->penyampaian_lelang = '-';
								// $PPbaru->evaluasi_pq = '-';
								// $PPbaru->penetapan_pq = '-';
								// $PPbaru->undangan_supph = '-';
								// $PPbaru->pendaftaran_pc = '-';
								// $PPbaru->pengambilan_dokumen = '-';
								// $PPbaru->ba_aanwijzing = '-';
								// $PPbaru->pembukaan_penawaran_1 = '-';
								// $PPbaru->evaluasi_penawaran_1 = '-';
								// $PPbaru->pembukaan_penawaran_2 = '-';
								// $PPbaru->evaluasi_penawaran_2 = '-';
								// $PPbaru->negosiasi_klarifikasi = '-';
								// $PPbaru->usulan_pemenang = '-';
								// $PPbaru->penetapan_pemenang = '-';
								
								// $PPbaru->save();
							// }
							
						// }
						
						
						// if($Pengadaan->save(false)){	
							// $this->redirect(array('editpenyampaiandokumenprakualifikasi','id'=>$id));					
						// }			
						
					// }
						
					$Pengadaan->save();
					
					$this->render('usulanhasilprakualifikasi',array(
						// 'Pengadaan'=>$Pengadaan,'PP'=>$PP,
					));
				}
			}
		}
	
		public function actionPenetapanHasilPrakualifikasi()
		{	
			$id = Yii::app()->getRequest()->getQuery('id');
			if (Yii::app()->user->isGuest) {
				$this->redirect(array('site/login'));
			}
			else {
				if (Yii::app()->user->getState('role') == 'anggota') {
					
					$Pengadaan=Pengadaan::model()->findByPk($id);
					$Pengadaan->status="15";
					
					//Uncomment the following line if AJAX validation is needed
					//$this->performAjaxValidation($model);
					
					$PP = PenerimaPengadaan::model()->findAll('evaluasi_pq = "1" and id_pengadaan = ' . $Pengadaan->id_pengadaan);
					
					if(isset($_POST['perusahaan'])){
													
						for($i=0;$i<count($PP);$i++){
							if(isset($_POST['perusahaan'][$i])){																																																
								$PP[$i]->perusahaan=$_POST['perusahaan'][$i];																						
								$PP[$i]->undangan_prakualifikasi = '1';
								$PP[$i]->pendaftaran_pelelangan_pq = '1';	
								$PP[$i]->pengambilan_lelang_pq ='1';	
								$PP[$i]->penyampaian_lelang = '1';	
								$PP[$i]->evaluasi_pq = '1';	
								$PP[$i]->penetapan_pq =  $_POST['penetapan_pq'][$i];	
								$PP[$i]->undangan_supph = '-';
								$PP[$i]->pendaftaran_pc = '-';
								$PP[$i]->pengambilan_dokumen = '-';									
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
								$PPbaru->perusahaan=$_POST['perusahaan'][$j+$i];	
								$PPbaru->alamat='-';									
								$PPbaru->npwp='-';		
								$PPbaru->nilai = 0;
								$PPbaru->biaya = '0';							
								$PPbaru->nomor_surat_penawaran = '-';
								$PPbaru->tanggal_penawaran = '-';														
								$PPbaru->undangan_prakualifikasi = '1';
								$PPbaru->pendaftaran_pelelangan_pq = '1';
								$PPbaru->pengambilan_lelang_pq = '1';
								$PPbaru->penyampaian_lelang = '1';
								$PPbaru->evaluasi_pq = '1';
								$PPbaru->penetapan_pq = $_POST['penetapan_pq'][$i+$j];		
								$PPbaru->undangan_supph = '-';
								$PPbaru->pendaftaran_pc = '-';
								$PPbaru->pengambilan_dokumen = '-';
								$PPbaru->ba_aanwijzing = '-';
								$PPbaru->pembukaan_penawaran_1 = '-';
								$PPbaru->evaluasi_penawaran_1 = '-';
								$PPbaru->pembukaan_penawaran_2 = '-';
								$PPbaru->evaluasi_penawaran_2 = '-';
								$PPbaru->negosiasi_klarifikasi = '-';
								$PPbaru->usulan_pemenang = '-';
								$PPbaru->penetapan_pemenang = '-';
								
								$PPbaru->save();
							}
							
						}
						
						
						if($Pengadaan->save(false)){	
							$this->redirect(array('editpenetapanhasilprakualifikasi','id'=>$id));					
						}			
						
					}
						
					$Pengadaan->save();
					
					$this->render('penetapanhasilprakualifikasi',array(
						'Pengadaan'=>$Pengadaan,'PP'=>$PP,
					));
				}
			}
		}
		
		public function actionEditPenetapanHasilPrakualifikasi()
		{	
			$id = Yii::app()->getRequest()->getQuery('id');
			if (Yii::app()->user->isGuest) {
				$this->redirect(array('site/login'));
			}
			else {
				if (Yii::app()->user->getState('role') == 'anggota') {
					
					$Pengadaan=Pengadaan::model()->findByPk($id);
					
					//Uncomment the following line if AJAX validation is needed
					//$this->performAjaxValidation($model);
					
					$PP = PenerimaPengadaan::model()->findAll('pendaftaran_pelelangan_pq = "1" and id_pengadaan = ' . $Pengadaan->id_pengadaan);
					
					if(isset($_POST['perusahaan'])){
													
						for($i=0;$i<count($PP);$i++){
							if(isset($_POST['perusahaan'][$i])){																																																
								$PP[$i]->perusahaan=$_POST['perusahaan'][$i];																
								$PP[$i]->penetapan_pq =  $_POST['penetapan_pq'][$i];							
								$PP[$i]->save();
							}
						}
						
						$total = count($_POST['perusahaan']);
						if(count($PP)<$total){
							$PPkurang = $total - count($PP);
							for($j=0;$j<$PPkurang;$j++){
								$PPbaru = new PenerimaPengadaan;
								$PPbaru->id_pengadaan = $Pengadaan->id_pengadaan;							
								$PPbaru->perusahaan=$_POST['perusahaan'][$j+$i];	
								$PPbaru->alamat='-';									
								$PPbaru->npwp='-';		
								$PPbaru->nilai = 0;
								$PPbaru->biaya = '0';							
								$PPbaru->nomor_surat_penawaran = '-';
								$PPbaru->tanggal_penawaran = '-';														
								$PPbaru->undangan_prakualifikasi = '1';
								$PPbaru->pendaftaran_pelelangan_pq = '1';
								$PPbaru->pengambilan_lelang_pq = '1';	
								$PPbaru->penyampaian_lelang = '1';
								$PPbaru->evaluasi_pq = '1';
								$PPbaru->penetapan_pq = $_POST['penetapan_pq'][$i+$j];
								$PPbaru->undangan_supph = '-';
								$PPbaru->pendaftaran_pc = '-';
								$PPbaru->pengambilan_dokumen = '-';
								$PPbaru->ba_aanwijzing = '-';
								$PPbaru->pembukaan_penawaran_1 = '-';
								$PPbaru->evaluasi_penawaran_1 = '-';
								$PPbaru->pembukaan_penawaran_2 = '-';
								$PPbaru->evaluasi_penawaran_2 = '-';
								$PPbaru->negosiasi_klarifikasi = '-';
								$PPbaru->usulan_pemenang = '-';
								$PPbaru->penetapan_pemenang = '-';
								
								$PPbaru->save();
							}					
						}
						
						if($Pengadaan->save(false)){	
							$this->redirect(array('editpenetapanhasilprakualifikasi','id'=>$id));					
						}			
						
					}
						
					$Pengadaan->save();
					
					$this->render('penetapanhasilprakualifikasi',array(
						'Pengadaan'=>$Pengadaan,'PP'=>$PP,
					));
				}
			}
		}
	
		public function actionPengumumanHasilPrakualifikasi()
		{	
			$id = Yii::app()->getRequest()->getQuery('id');
			if (Yii::app()->user->isGuest) {
				$this->redirect(array('site/login'));
			}
			else {
				if (Yii::app()->user->getState('role') == 'anggota') {
					
					$Pengadaan=Pengadaan::model()->findByPk($id);
					if($Pengadaan->metode_pengadaan=="Pelelangan") {
						$Pengadaan->status="16";
					} else if ($Pengadaan->metode_pengadaan=="Penunjukan Langsung"||$Pengadaan->metode_pengadaan=="Pemilihan Langsung") {
						$Pengadaan->status="17";
					}
					//Uncomment the following line if AJAX validation is needed
					//$this->performAjaxValidation($model);
					
					$PP = PenerimaPengadaan::model()->findAll('pendaftaran_pelelangan_pq = "1" and id_pengadaan = ' . $Pengadaan->id_pengadaan);
					
					if(isset($_POST['perusahaan'])){
													
						for($i=0;$i<count($PP);$i++){
							if(isset($_POST['perusahaan'][$i])){				
								$PP[$i]->perusahaan=$_POST['perusahaan'][$i];									
								$PP[$i]->alamat='-';									
								$PP[$i]->npwp='-';		
								$PP[$i]->nilai = 0;									
								$PP[$i]->biaya = '0';				
								$PP[$i]->nomor_surat_penawaran = '-';									
								$PP[$i]->tanggal_penawaran = '-';												
								$PP[$i]->undangan_prakualifikasi = '1';
								$PP[$i]->pendaftaran_pelelangan_pq = '1';	
								$PP[$i]->pengambilan_lelang_pq = $_POST['pengambilan_lelang_pq'][$i];	
								$PP[$i]->penyampaian_lelang = '-';
								$PP[$i]->evaluasi_pq = '-';
								$PP[$i]->penetapan_pq = '-';
								$PP[$i]->undangan_supph = '-';
								$PP[$i]->pendaftaran_pc = '-';
								$PP[$i]->pengambilan_dokumen = '-';									
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
								$PPbaru->perusahaan=$_POST['perusahaan'][$j+$i];	
								$PPbaru->alamat='-';									
								$PPbaru->npwp='-';		
								$PPbaru->nilai = 0;
								$PPbaru->biaya = '0';							
								$PPbaru->nomor_surat_penawaran = '-';
								$PPbaru->tanggal_penawaran = '-';														
								$PPbaru->undangan_prakualifikasi = '1';
								$PPbaru->pendaftaran_pelelangan_pq = '1';
								$PPbaru->pengambilan_lelang_pq = $_POST['pengambilan_lelang_pq'][$i+$j];		
								$PPbaru->penyampaian_lelang = '-';
								$PPbaru->evaluasi_pq = '-';
								$PPbaru->penetapan_pq = '-';
								$PPbaru->undangan_supph = '-';
								$PPbaru->pendaftaran_pc = '-';
								$PPbaru->pengambilan_dokumen = '-';
								$PPbaru->ba_aanwijzing = '-';
								$PPbaru->pembukaan_penawaran_1 = '-';
								$PPbaru->evaluasi_penawaran_1 = '-';
								$PPbaru->pembukaan_penawaran_2 = '-';
								$PPbaru->evaluasi_penawaran_2 = '-';
								$PPbaru->negosiasi_klarifikasi = '-';
								$PPbaru->usulan_pemenang = '-';
								$PPbaru->penetapan_pemenang = '-';
								
								$PPbaru->save();
							}
							
						}
						
						
						if($Pengadaan->save(false)){	
							$this->redirect(array('editpenyampaiandokumenprakualifikasi','id'=>$id));					
						}			
						
					}
						
					$Pengadaan->save();
					
					$this->render('pengumumanhasilprakualifikasi',array(
						'Pengadaan'=>$Pengadaan,'PP'=>$PP,
					));
				}
			}
		}
		
		public function actionEditPengumumanHasilPrakualifikasi()
		{	
			$id = Yii::app()->getRequest()->getQuery('id');
			if (Yii::app()->user->isGuest) {
				$this->redirect(array('site/login'));
			}
			else {
				if (Yii::app()->user->getState('role') == 'anggota') {
					
					$Pengadaan=Pengadaan::model()->findByPk($id);
					
					//Uncomment the following line if AJAX validation is needed
					//$this->performAjaxValidation($model);
					
					// $PP = PenerimaPengadaan::model()->findAll('pendaftaran_pelelangan_pq = "1" and id_pengadaan = ' . $Pengadaan->id_pengadaan);
					
					// if(isset($_POST['perusahaan'])){
													
						// for($i=0;$i<count($PP);$i++){
							// if(isset($_POST['perusahaan'][$i])){																																																
								// $PP[$i]->perusahaan=$_POST['perusahaan'][$i];									
								// $PP[$i]->alamat='-';									
								// $PP[$i]->npwp='-';		
								// $PP[$i]->nilai = 0;									
								// $PP[$i]->biaya = '0';				
								// $PP[$i]->nomor_surat_penawaran = '-';									
								// $PP[$i]->tanggal_penawaran = '-';												
								// $PP[$i]->undangan_prakualifikasi = '1';
								// $PP[$i]->pendaftaran_pelelangan_pq = '1';	
								// $PP[$i]->pengambilan_lelang_pq = $_POST['pengambilan_lelang_pq'][$i];	
								// $PP[$i]->penyampaian_lelang = '-';
								// $PP[$i]->evaluasi_pq = '-';
								// $PP[$i]->penetapan_pq = '-';
								// $PP[$i]->undangan_supph = '-';
								// $PP[$i]->pendaftaran_pc = '-';
								// $PP[$i]->pengambilan_dokumen = '-';									
								// $PP[$i]->ba_aanwijzing = '-';
								// $PP[$i]->pembukaan_penawaran_1 = '-';
								// $PP[$i]->evaluasi_penawaran_1 = '-';
								// $PP[$i]->pembukaan_penawaran_2 = '-';			
								// $PP[$i]->evaluasi_penawaran_2 = '-';
								// $PP[$i]->negosiasi_klarifikasi = '-';
								// $PP[$i]->usulan_pemenang = '-';
								// $PP[$i]->penetapan_pemenang	 = '-';								
								
								// $PP[$i]->save();
							// }
						// }
						
						// $total = count($_POST['perusahaan']);
						// if(count($PP)<$total){
							// $PPkurang = $total - count($PP);
							// for($j=0;$j<$PPkurang;$j++){
								// $PPbaru = new PenerimaPengadaan;
								// $PPbaru->id_pengadaan = $Pengadaan->id_pengadaan;							
								// $PPbaru->perusahaan=$_POST['perusahaan'][$j+$i];	
								// $PPbaru->alamat='-';									
								// $PPbaru->npwp='-';		
								// $PPbaru->nilai = 0;
								// $PPbaru->biaya = '0';							
								// $PPbaru->nomor_surat_penawaran = '-';
								// $PPbaru->tanggal_penawaran = '-';														
								// $PPbaru->undangan_prakualifikasi = '1';
								// $PPbaru->pendaftaran_pelelangan_pq = '1';
								// $PPbaru->pengambilan_lelang_pq = $_POST['pengambilan_lelang_pq'][$i+$j];		
								// $PPbaru->penyampaian_lelang = '-';
								// $PPbaru->evaluasi_pq = '-';
								// $PPbaru->penetapan_pq = '-';
								// $PPbaru->undangan_supph = '-';
								// $PPbaru->pendaftaran_pc = '-';
								// $PPbaru->pengambilan_dokumen = '-';
								// $PPbaru->ba_aanwijzing = '-';
								// $PPbaru->pembukaan_penawaran_1 = '-';
								// $PPbaru->evaluasi_penawaran_1 = '-';
								// $PPbaru->pembukaan_penawaran_2 = '-';
								// $PPbaru->evaluasi_penawaran_2 = '-';
								// $PPbaru->negosiasi_klarifikasi = '-';
								// $PPbaru->usulan_pemenang = '-';
								// $PPbaru->penetapan_pemenang = '-';
								
								// $PPbaru->save();
							// }
							
						// }
						
						
						// if($Pengadaan->save(false)){	
							// $this->redirect(array('editpenyampaiandokumenprakualifikasi','id'=>$id));					
						// }			
						
					// }
						
					$Pengadaan->save();
					
					$this->render('pengumumanhasilprakualifikasi',array(
						// 'Pengadaan'=>$Pengadaan,'PP'=>$PP,
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
				if (Yii::app()->user->getState('role') == 'anggota') {
					
					$Pengadaan=Pengadaan::model()->findByPk($id);
					$Pengadaan->status="18";
					
					$DokHPS=Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "HPS"');
					$HPS=Hps::model()->findByPk($DokHPS->id_dokumen);
					
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
					
					if(isset($_POST['SuratPengumumanPelelangan']))
					{
						$Dokumen0->attributes=$_POST['Dokumen'];
						$SPP->attributes=$_POST['SuratPengumumanPelelangan'];
						$valid=$Dokumen0->validate();
						$valid=$valid&&$SPP->validate();
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
						'SPP'=>$SPP,'Dokumen0'=>$Dokumen0,'HPS'=>$HPS,
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
				if (Yii::app()->user->getState('role') == 'anggota') {
					
					$Pengadaan=Pengadaan::model()->findByPk($id);
					
					$DokHPS=Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "HPS"');
					$HPS=Hps::model()->findByPk($DokHPS->id_dokumen);
					
					$Dokumen0= Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Pengumuman Pelelangan"');
					$Dokumen0->tanggal=Tanggal::getTanggalStrip($Dokumen0->tanggal);
					
					$SPP= SuratPengumumanPelelangan::model()->findByPk($Dokumen0->id_dokumen);
					
					if(isset($_POST['SuratPengumumanPelelangan']))
					{
						$Dokumen0->attributes=$_POST['Dokumen'];
						$SPP->attributes=$_POST['SuratPengumumanPelelangan'];
						$valid=$Dokumen0->validate();
						$valid=$valid&&$SPP->validate();
						if($valid){
							if($Pengadaan->save(false))
							{	
								if($Dokumen0->save(false)){
									if($SPP->save(false)){
										$this->redirect(array('editsuratpengumumanpelelangan','id'=>$id));
									}
								}
							}
						}
					}

					$this->render('suratpengumumanpelelangan',array(
						'SPP'=>$SPP,'Dokumen0'=>$Dokumen0,'HPS'=>$HPS,
					));
				}
			}
		}
	
		public function actionPendaftaranPelelangan()
		{	
			$id = Yii::app()->getRequest()->getQuery('id');
			if (Yii::app()->user->isGuest) {
				$this->redirect(array('site/login'));
			}
			else {
				if (Yii::app()->user->getState('role') == 'anggota') {
					
					$Pengadaan=Pengadaan::model()->findByPk($id);
					$Pengadaan->status="19";

					$PP = array(new PenerimaPengadaan);	
						
					if(isset($_POST['perusahaan'])){
						$total = count($_POST['perusahaan']);
						
						for($i=0;$i<$total;$i++){
							if(isset($_POST['perusahaan'][$i])){
								$PP[$i] = new PenerimaPengadaan;									
								$PP[$i]->id_pengadaan = $Pengadaan->id_pengadaan;									
								$PP[$i]->perusahaan=$_POST['perusahaan'][$i];									
								$PP[$i]->alamat='-';									
								$PP[$i]->npwp='-';		
								$PP[$i]->nilai = 0;									
								$PP[$i]->biaya = '0';									
								$PP[$i]->nomor_surat_penawaran = '-';									
								$PP[$i]->tanggal_penawaran = '-';									
								$PP[$i]->undangan_prakualifikasi = '1';
								$PP[$i]->pendaftaran_pelelangan_pq = '1';		
								$PP[$i]->pengambilan_lelang_pq = '1';	
								$PP[$i]->penyampaian_lelang = '1';	
								$PP[$i]->evaluasi_pq = '1';	
								$PP[$i]->penetapan_pq = '1';	
								$PP[$i]->undangan_supph = '1';	
								$PP[$i]->pendaftaran_pc = '1';	
								$PP[$i]->pengambilan_dokumen = '-';									
								$PP[$i]->ba_aanwijzing = '-';
								$PP[$i]->hadir_pembukaan_penawaran_1 = '-';
								$PP[$i]->pembukaan_penawaran_1 = '-';
								$PP[$i]->evaluasi_penawaran_1 = '-';
								$PP[$i]->hadir_pembukaan_penawaran_2 = '-';
								$PP[$i]->pembukaan_penawaran_2 = '-';			
								$PP[$i]->evaluasi_penawaran_2 = '-';
								$PP[$i]->negosiasi_klarifikasi = '-';
								$PP[$i]->usulan_pemenang = '-';
								$PP[$i]->penetapan_pemenang	 = '-';								
								
								$PP[$i]->save();
							}
						}
							
						if($Pengadaan->save(false))
						{						
							$this->redirect(array('editpendaftaranpelelangan','id'=>$id));					
						}
					}


					$this->render('pendaftaranpelelangan',array(
						'PP'=>$PP,
					));
				}
			}
		}
		
		public function actionEditPendaftaranPelelangan()
		{	
			$id = Yii::app()->getRequest()->getQuery('id');
			if (Yii::app()->user->isGuest) {
				$this->redirect(array('site/login'));
			}
			else {
				if (Yii::app()->user->getState('role') == 'anggota') {
					
					$Pengadaan=Pengadaan::model()->findByPk($id);
									
					//Uncomment the following line if AJAX validation is needed
					//$this->performAjaxValidation($model);
					
					$PP = PenerimaPengadaan::model()->findAll('pendaftaran_pelelangan_pq = "1" and id_pengadaan = ' . $Pengadaan->id_pengadaan);
						
					if($PP == null){
						$this->redirect(array('pendaftaranpelelangan','id'=>$id));		
					}
					
					if(isset($_POST['perusahaan'])){
													
						for($i=0;$i<count($PP);$i++){
							if(isset($_POST['perusahaan'][$i])){																																																
								$PP[$i]->perusahaan=$_POST['perusahaan'][$i];									
								$PP[$i]->save();
							}
						}
						
						$total = count($_POST['perusahaan']);
						if(count($PP)<$total){
							$PPkurang = $total - count($PP);
							for($j=0;$j<$PPkurang;$j++){
								$PPbaru = new PenerimaPengadaan;
								$PPbaru->id_pengadaan = $Pengadaan->id_pengadaan;							
								$PPbaru->perusahaan=$_POST['perusahaan'][$j+$i];	
								$PPbaru->alamat='-';									
								$PPbaru->npwp='-';		
								$PPbaru->nilai = 0;
								$PPbaru->biaya = '0';							
								$PPbaru->nomor_surat_penawaran = '-';
								$PPbaru->tanggal_penawaran = '-';														
								$PPbaru->undangan_prakualifikasi = '1';
								$PPbaru->pendaftaran_pelelangan_pq = '1';		
								$PPbaru->pengambilan_lelang_pq = '1';	
								$PPbaru->penyampaian_lelang = '1';	
								$PPbaru->evaluasi_pq = '1';	
								$PPbaru->penetapan_pq = '1';	
								$PPbaru->undangan_supph = '1';	
								$PPbaru->pendaftaran_pc = '1';
								$PPbaru->pengambilan_dokumen = '-';
								$PPbaru->pengambilan_dokumen = '-';
								$PPbaru->ba_aanwijzing = '-';
								$PPbaru->hadir_pembukaan_penawaran_2 = '-';
								$PPbaru->pembukaan_penawaran_1 = '-';
								$PPbaru->evaluasi_penawaran_1 = '-';
								$PPbaru->hadir_pembukaan_penawaran_2 = '-';
								$PPbaru->pembukaan_penawaran_2 = '-';
								$PPbaru->evaluasi_penawaran_2 = '-';
								$PPbaru->negosiasi_klarifikasi = '-';
								$PPbaru->usulan_pemenang = '-';
								$PPbaru->penetapan_pemenang = '-';
								
								$PPbaru->save();
							}
							
						}
						
						
						if($Pengadaan->save(false)){	
							$this->redirect(array('editpendaftaranpelelangan','id'=>$id));					
						}			
						
					}
						
						
					$this->render('pendaftaranpelelangan',array(
						'Pengadaan'=>$Pengadaan,'PP'=>$PP,
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
				if (Yii::app()->user->getState('role') == 'anggota') {
					
					$Pengadaan=Pengadaan::model()->findByPk($id);
					$Pengadaan->status="20";
					
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
										$PP[$i]->perusahaan=$_POST['perusahaan'][$i];									
										$PP[$i]->alamat='-';									
										$PP[$i]->npwp='-';		
										$PP[$i]->nilai = 0;									
										$PP[$i]->biaya = '0';									
										$PP[$i]->nomor_surat_penawaran = '-';									
										$PP[$i]->tanggal_penawaran = '-';									
										$PP[$i]->undangan_prakualifikasi = '1';
										$PP[$i]->pendaftaran_pelelangan_pq = '1';
										$PP[$i]->pengambilan_lelang_pq = '1';
										$PP[$i]->penyampaian_lelang = '1';
										$PP[$i]->evaluasi_pq = '1';
										$PP[$i]->penetapan_pq = '1';
										$PP[$i]->undangan_supph ='1';		
										$PP[$i]->pendaftaran_pc = '-';
										$PP[$i]->pengambilan_dokumen = '-';									
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
											$this->redirect(array('editpermintaanpenawaranharga','id'=>$id));
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
				if (Yii::app()->user->getState('role') == 'anggota') {
					
					$Pengadaan=Pengadaan::model()->findByPk($id);
					
					$DokHPS=Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "HPS"');
					$HPS=Hps::model()->findByPk($DokHPS->id_dokumen);
					
					$Dokumen0= Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Permintaan Penawaran Harga"');
					$Dokumen0->tanggal=Tanggal::getTanggalStrip($Dokumen0->tanggal);
					
					$SUPPP= SuratUndanganPermintaanPenawaranHarga::model()->findByPk($Dokumen0->id_dokumen);
					
					
					// $PP = PenerimaPengadaan::model()->find('id_pengadaan = 2');
					// $PP[0]->perusahaan = 'aaaapppppp';
					// $PP[0]->save();
					
					//Uncomment the following line if AJAX validation is needed
					//$this->performAjaxValidation($model);

					$PP = PenerimaPengadaan::model()->findAll('undangan_supph = "1" and id_pengadaan = ' . $Pengadaan->id_pengadaan);
					
					
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
										$PP[$i]->perusahaan=$_POST['perusahaan'][$i];									
										// $PP[$i]->alamat='-';									
										// $PP[$i]->npwp='-';		
										// $PP[$i]->nilai = 0;									
										// $PP[$i]->biaya = '0';				
										// $PP[$i]->nomor_surat_penawaran = '-';									
										// $PP[$i]->tanggal_penawaran = '-';												
										// $PP[$i]->undangan_prakualifikasi = '1';
										// $PP[$i]->pendaftaran_pelelangan_pq = '1';	
										// $PP[$i]->pengambilan_lelang_pq = $_POST['pengambilan_lelang_pq'][$i];	
										// $PP[$i]->penyampaian_lelang = '-';
										// $PP[$i]->evaluasi_pq = '-';
										// $PP[$i]->penetapan_pq = '-';
										// $PP[$i]->undangan_supph = $_POST['undangan_supph'][$i];	
										// $PP[$i]->pendaftaran_pc = '-';
										// $PP[$i]->pengambilan_dokumen = '-';									
										// $PP[$i]->ba_aanwijzing = '-';
										// $PP[$i]->pembukaan_penawaran_1 = '-';
										// $PP[$i]->evaluasi_penawaran_1 = '-';
										// $PP[$i]->pembukaan_penawaran_2 = '-';			
										// $PP[$i]->evaluasi_penawaran_2 = '-';
										// $PP[$i]->negosiasi_klarifikasi = '-';
										// $PP[$i]->usulan_pemenang = '-';
										// $PP[$i]->penetapan_pemenang	 = '-';								
										
										$PP[$i]->save();
									}
								}
								
								$total = count($_POST['perusahaan']);
								if(count($PP)<$total){
									$PPkurang = $total - count($PP);
									for($j=0;$j<$PPkurang;$j++){
										$PPbaru = new PenerimaPengadaan;
										$PPbaru->id_pengadaan = $Pengadaan->id_pengadaan;							
										$PPbaru->perusahaan=$_POST['perusahaan'][$j+$i];	
										$PPbaru->alamat='-';									
										$PPbaru->npwp='-';		
										$PPbaru->nilai = 0;
										$PPbaru->biaya = '0';							
										$PPbaru->nomor_surat_penawaran = '-';
										$PPbaru->tanggal_penawaran = '-';														
										$PPbaru->undangan_prakualifikasi = '1';
										$PPbaru->pendaftaran_pelelangan_pq = '1';
										$PPbaru->pengambilan_lelang_pq = '1';		
										$PPbaru->penyampaian_lelang = '1';
										$PPbaru->evaluasi_pq = '1';
										$PPbaru->penetapan_pq = '1';
										$PPbaru->undangan_supph = '1';
										$PPbaru->pendaftaran_pc = '-';
										$PPbaru->pengambilan_dokumen = '-';
										$PPbaru->pengambilan_dokumen = '-';
										$PPbaru->ba_aanwijzing = '-';
										$PPbaru->pembukaan_penawaran_1 = '-';
										$PPbaru->evaluasi_penawaran_1 = '-';
										$PPbaru->pembukaan_penawaran_2 = '-';
										$PPbaru->evaluasi_penawaran_2 = '-';
										$PPbaru->negosiasi_klarifikasi = '-';
										$PPbaru->usulan_pemenang = '-';
										$PPbaru->penetapan_pemenang = '-';
										
										$PPbaru->save();
									}
									
								}
							
							}
							if($Pengadaan->save(false))
							{	
								if($Dokumen0->save(false)){
									if($SUPPP->save(false)){
										// if($PP->save(false)){
											$this->redirect(array('editpermintaanpenawaranharga','id'=>$id));
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
	
		public function actionPengambilanDokumen()
		{	
			$id = Yii::app()->getRequest()->getQuery('id');
			if (Yii::app()->user->isGuest) {
				$this->redirect(array('site/login'));
			}
			else {
				if (Yii::app()->user->getState('role') == 'anggota') {
					
					$Pengadaan=Pengadaan::model()->findByPk($id);
					$Pengadaan->status="20";
					
					//Uncomment the following line if AJAX validation is needed
					//$this->performAjaxValidation($model);
					if($Pengadaan->jenis_kualifikasi=='Pasca Kualifikasi'){
						$PP = PenerimaPengadaan::model()->findAll('pendaftaran_pc = "1" and id_pengadaan = ' . $Pengadaan->id_pengadaan);
					}else{
						$PP = PenerimaPengadaan::model()->findAll('penetapan_pq = "1" and id_pengadaan = ' . $Pengadaan->id_pengadaan);
					}				
					
					if(isset($_POST['perusahaan'])){
													
						for($i=0;$i<count($PP);$i++){
							if(isset($_POST['perusahaan'][$i])){																																																
								$PP[$i]->perusahaan=$_POST['perusahaan'][$i];									
								$PP[$i]->pengambilan_dokumen = $_POST['pengambilan_dokumen'][$i];								
								$PP[$i]->save();
							}
						}
						
						if($Pengadaan->save(false)){	
							$this->redirect(array('editpengambilandokumen','id'=>$id));					
						}			
						
					}
						
						
					$this->render('pengambilandokumen',array(
						'Pengadaan'=>$Pengadaan,'PP'=>$PP,
					));
				}
			}
		}
		
		public function actionEditPengambilanDokumen()
		{	
			$id = Yii::app()->getRequest()->getQuery('id');
			if (Yii::app()->user->isGuest) {
				$this->redirect(array('site/login'));
			}
			else {
				if (Yii::app()->user->getState('role') == 'anggota') {
					
					$Pengadaan=Pengadaan::model()->findByPk($id);
									
					//Uncomment the following line if AJAX validation is needed
					//$this->performAjaxValidation($model);
					
					$PP = PenerimaPengadaan::model()->findAll('pendaftaran_pc = "1" and id_pengadaan = ' . $Pengadaan->id_pengadaan);
						
					if($PP == null){
						$this->redirect(array('pengambilandokumen','id'=>$id));		
					}
					
					if(isset($_POST['perusahaan'])){
													
						for($i=0;$i<count($PP);$i++){
							if(isset($_POST['perusahaan'][$i])){																																																
								$PP[$i]->perusahaan=$_POST['perusahaan'][$i];									
								$PP[$i]->pengambilan_dokumen = $_POST['pengambilan_dokumen'][$i];									
								$PP[$i]->save();
							}
						}
						
						if($Pengadaan->save(false)){	
							$this->redirect(array('editpengambilandokumen','id'=>$id));					
						}			
						
					}
						
						
					$this->render('pengambilandokumen',array(
						'Pengadaan'=>$Pengadaan,'PP'=>$PP,
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

		public function actionAanwijzing()
		{	
			$id = Yii::app()->getRequest()->getQuery('id');
			if (Yii::app()->user->isGuest) {
				$this->redirect(array('site/login'));
			}
			else {
				if (Yii::app()->user->getState('role') == 'anggota') {
				
					$Pengadaan=Pengadaan::model()->findByPk($id);
					$Pengadaan->status ='21';
					
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
					$Dokumen2->nama_dokumen='Lampiran Berita Acara Aanwijzing';
					$Dokumen2->tempat='Jakarta';
					$Dokumen2->status_upload='Belum Selesai';
					$Dokumen2->id_pengadaan=$id;
					
					$Dokumen3=new Dokumen;
					$Dokumen3->id_dokumen=$somevariable+3;
					$Dokumen3->nama_dokumen='Daftar Hadir Aanwijzing';
					$Dokumen3->tempat='Jakarta';
					$Dokumen3->status_upload='Belum Selesai';
					$Dokumen3->id_pengadaan=$id;
								
					$BAP= new BeritaAcaraPenjelasan;
					$BAP->id_dokumen=$Dokumen1->id_dokumen;
					$BAP->nomor='-';
					
					$DH= new DaftarHadir;
					$DH->id_dokumen=$Dokumen3->id_dokumen;
					$DH->acara="Aanwijzing";
					
					$DokSUP = Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "Surat Undangan Aanwijzing"');
					if($DokSUP==null) {
						$DokRKS=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "RKS"');
						$RKS=Rks::model()->findByPk($DokRKS->id_dokumen);
						$Dokumen1->tanggal=Tanggal::getTanggalStrip($RKS->tanggal_penjelasan);
						$BAP->waktu=Tanggal::getJamMenit($RKS->waktu_penjelasan);
						$BAP->tempat=$RKS->tempat_penjelasan;
					} else {
						$SUP=NotaDinasUndangan::model()->findByPk($DokSUP->id_dokumen);
						$Dokumen1->tanggal=Tanggal::getTanggalStrip($SUP->tanggal_undangan);
						$BAP->waktu=Tanggal::getJamMenit($SUP->waktu);
						$BAP->tempat=$SUP->tempat;
					}
					//Uncomment the following line if AJAX validation is needed
					//$this->performAjaxValidation($model);
					
					if($Pengadaan->metode_pengadaan == 'Pelelangan'){
						$PP = PenerimaPengadaan::model()->findAll('pengambilan_dokumen = "1" and id_pengadaan = ' . $Pengadaan->id_pengadaan);
					}
					else{
						if($Pengadaan->jenis_kualifikasi == 'Pasca Kualifikasi'){
							$PP = PenerimaPengadaan::model()->findAll('undangan_supph = "1" and id_pengadaan = ' . $Pengadaan->id_pengadaan);
						}else{
							$PP = PenerimaPengadaan::model()->findAll('penetapan_pq = "1" and id_pengadaan = ' . $Pengadaan->id_pengadaan);
						}					
					}
					
					if(isset($_POST['BeritaAcaraPenjelasan']))
					{
						$Dokumen1->attributes=$_POST['Dokumen'];
						$BAP->attributes=$_POST['BeritaAcaraPenjelasan'];
						$valid=$Dokumen1->validate()&&$BAP->validate();
						if($valid){
							$Dokumen2->tanggal=$Dokumen1->tanggal;
							$Dokumen3->tanggal=$Dokumen1->tanggal;
							$DH->jam=$BAP->waktu;
							$DH->tempat_hadir=$BAP->tempat;
							if(isset($_POST['perusahaan'])){
								
								for($i=0;$i<count($PP);$i++){
									if(isset($_POST['perusahaan'][$i])){
										$PP[$i]->perusahaan=$_POST['perusahaan'][$i];									
										$PP[$i]->ba_aanwijzing = $_POST['ba_aanwijzing'][$i];
										$PP[$i]->save();
									}
								}
								
							}		
							
	                        if($Pengadaan->save(false)){
								if($Dokumen1->save(false)&&$Dokumen2->save(false)&&$Dokumen3->save(false)){
									if($BAP->save(false)&&$DH->save(false)){
										$this->redirect(array('editaanwijzing','id'=>$id));
									}
								}
	                        }
						}
					}
					
					$this->render('aanwijzing',array(
						'BAP'=>$BAP,'PP'=>$PP,'Dokumen1'=>$Dokumen1,
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
				if (Yii::app()->user->getState('role') == 'anggota') {
				
					$Pengadaan=Pengadaan::model()->findByPk($id);
					
					$Dokumen1=Dokumen::model()->find('id_pengadaan = '.$id.' and nama_dokumen= "Berita Acara Aanwijzing"');
					$Dokumen2=Dokumen::model()->find('id_pengadaan = '.$id.' and nama_dokumen= "Lampiran Berita Acara Aanwijzing"');
					$Dokumen3=Dokumen::model()->find('id_pengadaan = '.$id.' and nama_dokumen= "Daftar Hadir Aanwijzing"');
					$Dokumen1->tanggal=Tanggal::getTanggalStrip($Dokumen1->tanggal);
					$BAP=BeritaAcaraPenjelasan::model()->findByPk($Dokumen1->id_dokumen);
					$BAP->waktu=Tanggal::getJamMenit($BAP->waktu);
					$DH=DaftarHadir::model()->findByPk($Dokumen3->id_dokumen);
					

					if($Pengadaan->metode_pengadaan == 'Pelelangan'){
						$PP = PenerimaPengadaan::model()->findAll('pengambilan_dokumen = "1" and id_pengadaan = ' . $Pengadaan->id_pengadaan);
					}
					else{
						if($Pengadaan->jenis_kualifikasi == 'Pasca Kualifikasi'){
							$PP = PenerimaPengadaan::model()->findAll('undangan_supph = "1" and id_pengadaan = ' . $Pengadaan->id_pengadaan);
						}else{
							$PP = PenerimaPengadaan::model()->findAll('penetapan_pq = "1" and id_pengadaan = ' . $Pengadaan->id_pengadaan);
						}					
					}
					
					if(isset($_POST['BeritaAcaraPenjelasan']))
					{
						// $Dokumen0->attributes=$_POST['Dokumen'];
						$Dokumen1->attributes=$_POST['Dokumen'];
						$BAP->attributes=$_POST['BeritaAcaraPenjelasan'];
						$valid=$BAP->validate();					
						if($valid){

							if(isset($_POST['perusahaan'])){							
								
								for($i=0;$i<count($PP);$i++){
									if(isset($_POST['perusahaan'][$i])){									
										$PP[$i]->perusahaan=$_POST['perusahaan'][$i];									
										$PP[$i]->ba_aanwijzing = $_POST['ba_aanwijzing'][$i];
										$PP[$i]->save();
									}
								}
								
							}
							if($Dokumen1->save(false)&&$Dokumen2->save(false)&&$Dokumen3->save(false)){
								if($BAP->save(false)&&$DH->save(false)){
									$this->redirect(array('editaanwijzing','id'=>$id));
								}
							}
							
						}
					}
					 $this->render('aanwijzing',array(
						'BAP'=>$BAP,'PP'=>$PP,'DH'=>$DH,'Dokumen2'=>$Dokumen2,'Dokumen1'=>$Dokumen1,
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
				if (Yii::app()->user->getState('role') == 'anggota') {
				
					$Pengadaan=Pengadaan::model()->findByPk($id);
					$Pengadaan->status ='22';
					
					$DokBAP= Dokumen::model()->find('id_pengadaan = '.$id.' and nama_dokumen= "Berita Acara Aanwijzing"');
					$BAP= BeritaAcaraPenjelasan::model()->findByPk($DokBAP->id_dokumen);

					//Uncomment the following line if AJAX validation is needed
					//$this->performAjaxValidation($model);
					
					if(isset($_POST['BeritaAcaraPenjelasan']))
					{
						$BAP->attributes=$_POST['BeritaAcaraPenjelasan'];
						$valid=$BAP->validate();
						if($valid){						
	                        if($Pengadaan->save(false)){
								if($BAP->save(false)){
									$this->redirect(array('editberitaacaraaanwijzing','id'=>$id));
								}
	                        }
						}
					}
					
					if($Pengadaan->jenis_kualifikasi=="Pasca Kualifikasi") {
						$DokSUP=Dokumen::model()->find('id_pengadaan = '.$id.' and nama_dokumen = "Surat Undangan Aanwijzing"');
						if($DokSUP== null ){
							if($Pengadaan->metode_pengadaan=="Pelelangan"){
								$DokPengumuman=Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "Surat Pengumuman Pelelangan"');
								$SUPDP=SuratPengumumanPelelangan::model()->findByPk($DokPengumuman->id_dokumen);
								$this->render('beritaacaraaanwijzing',array(
									'BAP'=>$BAP,'SUPDP'=>$SUPDP,
								));
							} else if ($Pengadaan->metode_pengadaan=="Penunjukan Langsung"||$Pengadaan->metode_pengadaan=="Pemilihan Langsung"){
								$DokPermintaan=Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "Surat Undangan Permintaan Penawaran Harga"');
								$SUPPPH=SuratUndanganPermintaanPenawaranHarga::model()->findByPk($DokPermintaan->id_dokumen);
								$this->render('beritaacaraaanwijzing',array(
									'BAP'=>$BAP,'SUPPPH'=>$SUPPPH,
								));
							}
						} else {
							$SUP=NotaDinasUndangan::model()->findByPk($DokSUP->id_dokumen);
							$this->render('beritaacaraaanwijzing',array(
								'BAP'=>$BAP,'SUP'=>$SUP,
							));
						}
					} else {
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
				if (Yii::app()->user->getState('role') == 'anggota') {
					
					$Pengadaan=Pengadaan::model()->findByPk($id);
					
					$DokBAP= Dokumen::model()->find('id_pengadaan = '.$id.' and nama_dokumen= "Berita Acara Aanwijzing"');
					$BAP= BeritaAcaraPenjelasan::model()->findByPk($DokBAP->id_dokumen);
					
					if(isset($_POST['BeritaAcaraPenjelasan']))
					{
						$BAP->attributes=$_POST['BeritaAcaraPenjelasan'];
						$valid=$BAP->validate();
						if($valid){
							if($BAP->save(false)){
								$this->redirect(array('editberitaacaraaanwijzing','id'=>$id));
							}
						}
					}
					if($Pengadaan->jenis_kualifikasi=="Pasca Kualifikasi") {
						$DokSUP=Dokumen::model()->find('id_pengadaan = '.$id.' and nama_dokumen = "Surat Undangan Aanwijzing"');
						if($DokSUP== null ){
							if($Pengadaan->metode_pengadaan=="Pelelangan"){
								$DokPengumuman=Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "Surat Pengumuman Pelelangan"');
								$SUPDP=SuratPengumumanPelelangan::model()->findByPk($DokPengumuman->id_dokumen);
								$this->render('beritaacaraaanwijzing',array(
									'BAP'=>$BAP,'SUPDP'=>$SUPDP,
								));
							} else if ($Pengadaan->metode_pengadaan=="Penunjukan Langsung"||$Pengadaan->metode_pengadaan=="Pemilihan Langsung"){
								$DokPermintaan=Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "Surat Undangan Permintaan Penawaran Harga"');
								$SUPPPH=SuratUndanganPermintaanPenawaranHarga::model()->findByPk($DokPermintaan->id_dokumen);
								$this->render('beritaacaraaanwijzing',array(
									'BAP'=>$BAP,'SUPPPH'=>$SUPPPH,
								));
							}
						} else {
							$SUP=NotaDinasUndangan::model()->findByPk($DokSUP->id_dokumen);
							$this->render('beritaacaraaanwijzing',array(
								'BAP'=>$BAP,'SUP'=>$SUP,
							));
						}
					} else {
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
	
		public function actionPembukaanpenawaran()
		{	
			$id = Yii::app()->getRequest()->getQuery('id');
			if (Yii::app()->user->isGuest) {
				$this->redirect(array('site/login'));
			}
			else {
				if (Yii::app()->user->getState('role') == 'anggota') {
				
					$Pengadaan=Pengadaan::model()->findByPk($id);
					$Pengadaan->status ='23';
							
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
						$Dokumen2->nama_dokumen='Lampiran Berita Acara Pembukaan Penawaran';
					} else if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
						$Dokumen2->nama_dokumen='Lampiran Berita Acara Pembukaan Penawaran Sampul Satu';
					} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
						$Dokumen2->nama_dokumen='Lampiran Berita Acara Pembukaan Penawaran Tahap Satu';
					}
					$Dokumen2->tempat='Jakarta';
					$Dokumen2->status_upload='Belum Selesai';
					$Dokumen2->id_pengadaan=$id;
					
					$Dokumen3=new Dokumen;
					$Dokumen3->id_dokumen=$somevariable+3;
					if ($Pengadaan->metode_penawaran == 'Satu Sampul'){
						$Dokumen3->nama_dokumen='Daftar Hadir Pembukaan Penawaran';
					} else if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
						$Dokumen3->nama_dokumen='Daftar Hadir Pembukaan Penawaran Sampul Satu';
					} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
						$Dokumen3->nama_dokumen='Daftar Hadir Pembukaan Penawaran Tahap Satu';
					}
					$Dokumen3->tempat='Jakarta';
					$Dokumen3->status_upload='Belum Selesai';
					$Dokumen3->id_pengadaan=$id;
					
					$BAPP= new BeritaAcaraPembukaanPenawaran;
					$BAPP->id_dokumen=$Dokumen1->id_dokumen;
					$BAPP->nomor='-';
					
					
					$DH= new DaftarHadir;
					$DH->id_dokumen=$Dokumen3->id_dokumen;
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
						$Dokumen1->tanggal=Tanggal::getTanggalStrip($RKS->tanggal_pembukaan_penawaran1);
						$BAPP->waktu=Tanggal::getJamMenit($RKS->waktu_pembukaan_penawaran1);
						$BAPP->tempat=$RKS->tempat_pembukaan_penawaran1;
					} else {
						$SUPP=NotaDinasUndangan::model()->findByPk($Dok0->id_dokumen);
						$Dokumen1->tanggal=Tanggal::getTanggalStrip($SUPP->tanggal_undangan);
						$BAPP->waktu=Tanggal::getJamMenit($SUPP->waktu);
						$BAPP->tempat=$SUPP->tempat;
					}
					
					//Uncomment the following line if AJAX validation is needed
					//$this->performAjaxValidation($model);
					
					$PP = PenerimaPengadaan::model()->findAll('(ba_aanwijzing = "1" or ba_aanwijzing = "0") and id_pengadaan = ' . $Pengadaan->id_pengadaan);
					
					if(isset($_POST['BeritaAcaraPembukaanPenawaran']))
					{
						$Dokumen1->attributes=$_POST['Dokumen'];
						$BAPP->attributes=$_POST['BeritaAcaraPembukaanPenawaran'];
						$valid=$Dokumen1->validate()&&$BAPP->validate();
						if($valid){
							$Dokumen2->tanggal=$Dokumen1->tanggal;
							$Dokumen3->tanggal=$Dokumen1->tanggal;
							$DH->jam=$BAPP->waktu;
							$DH->tempat_hadir=$BAPP->tempat;
					
							if(isset($_POST['perusahaan'])){								
								for($i=0;$i<count($PP);$i++){
									if(isset($_POST['perusahaan'][$i])){
										$PP[$i]->perusahaan=$_POST['perusahaan'][$i];									
										$PP[$i]->hadir_pembukaan_penawaran_1 = $_POST['hadir_pembukaan_penawaran_1'][$i];
										$PP[$i]->save();
									}
								}								
							}//end isset perusahaan		
							
							if($Pengadaan->save(false)){
								if($Dokumen1->save(false)&&$Dokumen2->save(false)&&$Dokumen3->save(false)){
									if($BAPP->save(false)&&$DH->save(false)){
										$this->redirect(array('editpembukaanpenawaran','id'=>$id));
									}
								}
							}
						}
					}//end isset
					
					$this->render('pembukaanpenawaran',array(
						'BAPP'=>$BAPP,'PP'=>$PP,'Dokumen1'=>$Dokumen1,
					));
				}
			}
		}
		
		public function actionEditPembukaanpenawaran()
		{	
			$id = Yii::app()->getRequest()->getQuery('id');
			if (Yii::app()->user->isGuest) {
				$this->redirect(array('site/login'));
			}
			else {
				if (Yii::app()->user->getState('role') == 'anggota') {
				
					$Pengadaan=Pengadaan::model()->findByPk($id);
					
					if ($Pengadaan->metode_penawaran == 'Satu Sampul'){
						$Dokumen1=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran"');
						$Dokumen2=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Lampiran Berita Acara Pembukaan Penawaran"');
						$Dokumen3=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Daftar Hadir Pembukaan Penawaran"');
					} else if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
						$Dokumen1=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran Sampul Satu"');
						$Dokumen2=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Lampiran Berita Acara Pembukaan Penawaran Sampul Satu"');
						$Dokumen3=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Daftar Hadir Pembukaan Penawaran Sampul Satu"');
					} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
						$Dokumen1=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran Tahap Satu"');
						$Dokumen2=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Lampiran Berita Acara Pembukaan Penawaran Tahap Satu"');
						$Dokumen3=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Daftar Hadir Pembukaan Penawaran Tahap Satu"');
					}
					$Dokumen1->tanggal=Tanggal::getTanggalStrip($Dokumen1->tanggal);
					$BAPP=BeritaAcaraPembukaanPenawaran::model()->findByPk($Dokumen1->id_dokumen);
					$BAPP->waktu=Tanggal::getJamMenit($BAPP->waktu);
					$DH=DaftarHadir::model()->findByPk($Dokumen3->id_dokumen);
					
					//Uncomment the following line if AJAX validation is needed
					//$this->performAjaxValidation($model);

					$PP = PenerimaPengadaan::model()->findAll('(ba_aanwijzing = "1" or ba_aanwijzing = "0") and id_pengadaan = ' . $Pengadaan->id_pengadaan);
					
					if(isset($_POST['BeritaAcaraPembukaanPenawaran']))
					{
						// $Dokumen0->attributes=$_POST['Dokumen'];
						
						$Dokumen1->attributes=$_POST['Dokumen'];
						$BAPP->attributes=$_POST['BeritaAcaraPembukaanPenawaran'];
						$valid=$Dokumen1->validate()&&$BAPP->validate();
						if($valid){
							$Dokumen2->tanggal=$Dokumen1->tanggal;
							$Dokumen3->tanggal=$Dokumen1->tanggal;
							$DH->jam=$BAPP->waktu;
							$DH->tempat_hadir=$BAPP->tempat;

							if(isset($_POST['perusahaan'])){
								
								for($i=0;$i<count($PP);$i++){
									if(isset($_POST['perusahaan'][$i])){
										$PP[$i]->perusahaan=$_POST['perusahaan'][$i];									
										$PP[$i]->hadir_pembukaan_penawaran_1 = $_POST['hadir_pembukaan_penawaran_1'][$i];														
										$PP[$i]->save();
									}
								}
								
							}
							if($Dokumen1->save(false)&&$Dokumen2->save(false)&&$Dokumen3->save(false)){
								if($BAPP->save(false)&&$DH->save(false)){
									$this->redirect(array('editpembukaanpenawaran','id'=>$id));
								}
							}
							
						}
					}
					$this->render('pembukaanpenawaran',array(
						'BAPP'=>$BAPP,'PP'=>$PP,'Dokumen1'=>$Dokumen1,'Dokumen2'=>$Dokumen2,'DH'=>$DH,
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
	
		public function actionBeritaacarapembukaanpenawaran()
		{	
			$id = Yii::app()->getRequest()->getQuery('id');
			if (Yii::app()->user->isGuest) {
				$this->redirect(array('site/login'));
			}
			else {
				if (Yii::app()->user->getState('role') == 'anggota') {
				
					$Pengadaan=Pengadaan::model()->findByPk($id);
					$Pengadaan->status ='24';
					
					if ($Pengadaan->metode_penawaran == 'Satu Sampul'){
						$DokBAPP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran"');
					} else if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
						$DokBAPP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran Sampul Satu"');
					} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
						$DokBAPP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran Tahap Satu"');
					}
					
					$BAPP=BeritaAcaraPembukaanPenawaran::model()->findByPk($DokBAPP->id_dokumen);				
					
					if ($Pengadaan->metode_penawaran == 'Satu Sampul'){
						$Dok0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pembukaan Penawaran"');
					} else if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
						$Dok0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pembukaan Penawaran Sampul Satu"');
					} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
						$Dok0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pembukaan Penawaran Tahap Satu"');
					}
					
					//Uncomment the following line if AJAX validation is needed
					//$this->performAjaxValidation($model);
					
					$PP = PenerimaPengadaan::model()->findAll('(hadir_pembukaan_penawaran_1 = "1" or hadir_pembukaan_penawaran_1 = "2") and id_pengadaan = ' . $Pengadaan->id_pengadaan);
					
					if(isset($_POST['BeritaAcaraPembukaanPenawaran']))
					{
						$BAPP->attributes=$_POST['BeritaAcaraPembukaanPenawaran'];
						$valid=$BAPP->validate();
						if($valid){
						
							if(isset($_POST['perusahaan'])){
								
								for($i=0;$i<count($PP);$i++){
									if(isset($_POST['perusahaan'][$i])){
										$PP[$i]->perusahaan=$_POST['perusahaan'][$i];									
										$PP[$i]->pembukaan_penawaran_1 = $_POST['pembukaan_penawaran_1'][$i];
										$PP[$i]->save();
									}
								}
								
							}//end isset perusahaan		
							
							if($Pengadaan->save(false)){
								if($BAPP->save(false)){
									$this->redirect(array('editberitaacarapembukaanpenawaran','id'=>$id));
								}
							}
						}
					}//end isset
					
					if ($Dok0==null) {
						$DokBAP= Dokumen::model()->find('id_pengadaan = '.$id.' and nama_dokumen = "Berita Acara Aanwijzing"');
						$BAP= BeritaAcaraPenjelasan::model()->findByPk($DokBAP->id_dokumen);
						$this->render('beritaacarapembukaanpenawaran',array(
							'BAPP'=>$BAPP,'PP'=>$PP,'BAP'=>$BAP,'Dok0'=>$Dok0,
						));
					} else {
						$SUPP=NotaDinasUndangan::model()->findByPk($Dok0->id_dokumen);
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
				if (Yii::app()->user->getState('role') == 'anggota') {
				
					$Pengadaan=Pengadaan::model()->findByPk($id);
					
					if ($Pengadaan->metode_penawaran == 'Satu Sampul'){
						$Dok0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pembukaan Penawaran"');
					} else if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
						$Dok0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pembukaan Penawaran Sampul Satu"');
					} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
						$Dok0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pembukaan Penawaran Tahap Satu"');
					}
					
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

					$PP = PenerimaPengadaan::model()->findAll('(hadir_pembukaan_penawaran_1 = "1" or hadir_pembukaan_penawaran_1 = "2") and id_pengadaan = ' . $Pengadaan->id_pengadaan);
					
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
										$PP[$i]->pembukaan_penawaran_1 = $_POST['pembukaan_penawaran_1'][$i];
										$PP[$i]->save();
									}
								}							
								
							}
							if($BAPP->save(false)){
								$this->redirect(array('editberitaacarapembukaanpenawaran','id'=>$id));
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
						$SUPP=NotaDinasUndangan::model()->findByPk($Dok0->id_dokumen);
						$this->render('beritaacarapembukaanpenawaran',array(
							'BAPP'=>$BAPP,'PP'=>$PP,'SUPP'=>$SUPP,'Dok0'=>$Dok0,
						));
					}
				}
			}
		}
	
		public function actionEvaluasipenawaran()
		{	
			$id = Yii::app()->getRequest()->getQuery('id');
			if (Yii::app()->user->isGuest) {
				$this->redirect(array('site/login'));
			}
			else {
				if (Yii::app()->user->getState('role') == 'anggota') {
				
					$Pengadaan=Pengadaan::model()->findByPk($id);
					$Pengadaan->status ='25';
					
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
					
					$Dokumen2=new Dokumen;
					$Dokumen2->id_dokumen=$somevariable+2;
					if ($Pengadaan->metode_penawaran == 'Satu Sampul'){
						$Dokumen2->nama_dokumen='Lampiran Berita Acara Evaluasi Penawaran';
					} else if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
						$Dokumen2->nama_dokumen='Lampiran Berita Acara Evaluasi Penawaran Sampul Satu';
					} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
						$Dokumen2->nama_dokumen='Lampiran Berita Acara Evaluasi Penawaran Tahap Satu';
					}
					$Dokumen2->tempat='Jakarta';
					$Dokumen2->status_upload='Belum Selesai';
					$Dokumen2->id_pengadaan=$id;
					
					$Dokumen3=new Dokumen;
					$Dokumen3->id_dokumen=$somevariable+3;
					if ($Pengadaan->metode_penawaran == 'Satu Sampul'){
						$Dokumen3->nama_dokumen='Daftar Hadir Evaluasi Penawaran';
					} else if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
						$Dokumen3->nama_dokumen='Daftar Hadir Evaluasi Penawaran Sampul Satu';
					} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
						$Dokumen3->nama_dokumen='Daftar Hadir Evaluasi Penawaran Tahap Satu';
					}
					$Dokumen3->tempat='Jakarta';
					$Dokumen3->status_upload='Belum Selesai';
					$Dokumen3->id_pengadaan=$id;
					
					$BAEP= new BeritaAcaraEvaluasiPenawaran;
					$BAEP->id_dokumen=$Dokumen1->id_dokumen;
					$BAEP->nomor='-';
					
					$DH= new DaftarHadir;
					$DH->id_dokumen=$Dokumen3->id_dokumen;
					if ($Pengadaan->metode_penawaran == 'Satu Sampul'){
						$DH->acara="Evaluasi Penawaran";
					} else if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
						$DH->acara="Evaluasi Penawaran Sampul Satu";
					} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
						$DH->acara="Evaluasi Penawaran Tahap Satu";
					}
					
					if ($Pengadaan->metode_penawaran == 'Satu Sampul'){
						$Dok0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Evaluasi Penawaran"');
					} else if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
						$Dok0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Evaluasi Penawaran Sampul Satu"');
					} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
						$Dok0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Evaluasi Penawaran Tahap Satu"');
					}
					
					if ($Dok0==null) {
						$DokRKS=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "RKS"');
						$RKS=Rks::model()->findByPk($DokRKS->id_dokumen);
						$Dokumen1->tanggal=Tanggal::getTanggalStrip($RKS->tanggal_evaluasi_penawaran1);
						$BAEP->waktu=Tanggal::getJamMenit($RKS->waktu_evaluasi_penawaran1);
						$BAEP->tempat=$RKS->tempat_evaluasi_penawaran1;
					} else {
						$SUEP=NotaDinasUndangan::model()->findByPk($Dok0->id_dokumen);
						$Dokumen1->tanggal=Tanggal::getTanggalStrip($SUEP->tanggal_undangan);
						$BAEP->waktu=Tanggal::getJamMenit($SUEP->waktu);
						$BAEP->tempat=$SUEP->tempat;
					}
					
					//Uncomment the following line if AJAX validation is needed
					//$this->performAjaxValidation($model);
					
					if(isset($_POST['BeritaAcaraEvaluasiPenawaran']))
					{
						$Dokumen1->attributes=$_POST['Dokumen'];
						$BAEP->attributes=$_POST['BeritaAcaraEvaluasiPenawaran'];
						$valid=$Dokumen1->validate()&&$BAEP->validate();
						if($valid){
							$DH->jam=$BAEP->waktu;
							$DH->tempat_hadir=$BAEP->tempat;
							$Dokumen2->tanggal=$Dokumen1->tanggal;
							$Dokumen3->tanggal=$Dokumen1->tanggal;						
							
							if($Pengadaan->save(false)){
								if($Dokumen1->save(false)&&$Dokumen2->save(false)&&$Dokumen3->save(false)){
									if($BAEP->save(false)&&$DH->save(false)){
										$this->redirect(array('editevaluasipenawaran','id'=>$id));
									}
								}
							}
						}
					}

					$this->render('evaluasipenawaran',array(
						'BAEP'=>$BAEP,'Dokumen1'=>$Dokumen1,
					));
				}
			}
		}
		
		public function actionEditEvaluasipenawaran()
		{	
			$id = Yii::app()->getRequest()->getQuery('id');
			if (Yii::app()->user->isGuest) {
				$this->redirect(array('site/login'));
			}
			else {
				if (Yii::app()->user->getState('role') == 'anggota') {
				
					$Pengadaan=Pengadaan::model()->findByPk($id);
					
					if ($Pengadaan->metode_penawaran == 'Satu Sampul'){
						$Dokumen1=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Evaluasi Penawaran"');
						$Dokumen2=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Lampiran Berita Acara Evaluasi Penawaran"');
						$Dokumen3=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Daftar Hadir Evaluasi Penawaran"');
					} else if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
						$Dokumen1=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Evaluasi Penawaran Sampul Satu"');
						$Dokumen2=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Lampiran Berita Acara Evaluasi Penawaran Sampul Satu"');
						$Dokumen3=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Daftar Hadir Evaluasi Penawaran Sampul Satu"');
					} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
						$Dokumen1=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Evaluasi Penawaran Tahap Satu"');
						$Dokumen2=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Lampiran Berita Acara Evaluasi Penawaran Tahap Satu"');
						$Dokumen3=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Daftar Hadir Evaluasi Penawaran Tahap Satu"');
					}
					
					$Dokumen1->tanggal=Tanggal::getTanggalStrip($Dokumen1->tanggal);
					$BAEP=BeritaAcaraEvaluasiPenawaran::model()->findByPk($Dokumen1->id_dokumen);
					$BAEP->waktu=Tanggal::getJamMenit($BAEP->waktu);
					$DH=DaftarHadir::model()->findByPk($Dokumen3->id_dokumen);
				
					
					//Uncomment the following line if AJAX validation is needed
					//$this->performAjaxValidation($model);			
					
					if(isset($_POST['BeritaAcaraEvaluasiPenawaran']))
					{
						$Dokumen1->attributes=$_POST['Dokumen'];
						$BAEP->attributes=$_POST['BeritaAcaraEvaluasiPenawaran'];
						$valid=$BAEP->validate();
						if($valid){
						
							if($Dokumen1->save(false)&&$Dokumen2->save(false)&&$Dokumen3->save(false)){
								if($BAEP->save(false)&&$DH->save(false)){
									$this->redirect(array('editevaluasipenawaran','id'=>$id));
								}
							}
						}
					}

					$this->render('evaluasipenawaran',array(
						'BAEP'=>$BAEP,'Dokumen1'=>$Dokumen1,'DH'=>$DH,'Dokumen2'=>$Dokumen2,
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
				if (Yii::app()->user->getState('role') == 'anggota') {
				
					$Pengadaan=Pengadaan::model()->findByPk($id);
					if ($Pengadaan->metode_penawaran == 'Satu Sampul'){
						$Pengadaan->status ='30';
					} else {
						$Pengadaan->status ='26';
					}
					
					if ($Pengadaan->metode_penawaran == 'Satu Sampul'){
						$DokBAPP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran"');
					} else if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
						$DokBAPP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran Sampul Satu"');
					} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
						$DokBAPP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran Tahap Satu"');
					}
					
					$BAPP=BeritaAcaraPembukaanPenawaran::model()->findByPk($DokBAPP->id_dokumen);
					
					if ($Pengadaan->metode_penawaran == 'Satu Sampul'){
						$DokBAEP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Evaluasi Penawaran"');
					} else if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
						$DokBAEP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Evaluasi Penawaran Sampul Satu"');
					} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
						$DokBAEP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Evaluasi Penawaran Tahap Satu"');
					}
					
					$BAEP=BeritaAcaraEvaluasiPenawaran::model()->findByPk($DokBAEP->id_dokumen);
					
					//Uncomment the following line if AJAX validation is needed
					//$this->performAjaxValidation($model);
					
					$PP = PenerimaPengadaan::model()->findAll('(pembukaan_penawaran_1 = "1") and id_pengadaan = ' . $Pengadaan->id_pengadaan);
					
					if(isset($_POST['BeritaAcaraEvaluasiPenawaran']))
					{
						$BAEP->attributes=$_POST['BeritaAcaraEvaluasiPenawaran'];
						$valid=$BAEP->validate();
						if($valid){
							if(isset($_POST['perusahaan'])){
								if ($Pengadaan->metode_penawaran == 'Dua Sampul' || $Pengadaan->metode_penawaran == 'Dua Tahap'){
									for($i=0;$i<count($PP);$i++){
										if(isset($_POST['perusahaan'][$i])){
											$PP[$i]->perusahaan=$_POST['perusahaan'][$i];									
											$PP[$i]->alamat=$_POST['alamat'][$i];									
											$PP[$i]->npwp=$_POST['npwp'][$i];												
											$PP[$i]->nomor_surat_penawaran = $_POST['nomor_surat_penawaran'][$i];								
											$PP[$i]->tanggal_penawaran = $_POST['tanggal_penawaran'][$i];					
											$PP[$i]->evaluasi_penawaran_1 = $_POST['evaluasi_penawaran_1'][$i];										
											$PP[$i]->administrasi = $_POST['administrasi'][$i];										
											$PP[$i]->save();
										}
									}
																	
								}//end dua sampul
								else if ($Pengadaan->metode_penawaran == 'Satu Sampul'){
									for($i=0;$i<count($PP);$i++){
										if(isset($_POST['perusahaan'][$i])){
											$PP[$i]->perusahaan=$_POST['perusahaan'][$i];									
											$PP[$i]->alamat = $_POST['alamat'][$i];								
											$PP[$i]->npwp = $_POST['npwp'][$i];											
											$PP[$i]->biaya = $_POST['biaya'][$i];													
											$PP[$i]->nomor_surat_penawaran = $_POST['nomor_surat_penawaran'][$i];
											$PP[$i]->tanggal_penawaran = $_POST['tanggal_penawaran'][$i];																					
											$PP[$i]->evaluasi_penawaran_1 = $_POST['evaluasi_penawaran_1'][$i];														
											$PP[$i]->evaluasi_penawaran_2 = $_POST['evaluasi_penawaran_2'][$i];			
											$PP[$i]->administrasi = $_POST['administrasi'][$i];																									
											$PP[$i]->save();
										}
									}
									
								}//end satu sampul
							}//end isset perusahaan		
							
							if($Pengadaan->save(false)){
								if($BAEP->save(false)){
									$this->redirect(array('editberitaacaraevaluasipenawaran','id'=>$id));
								}
							}
						}
					}

					$this->render('beritaacaraevaluasipenawaran',array(
						'BAEP'=>$BAEP,'PP'=>$PP,'BAPP'=>$BAPP,
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
				if (Yii::app()->user->getState('role') == 'anggota') {
				
					$Pengadaan=Pengadaan::model()->findByPk($id);
					
					if ($Pengadaan->metode_penawaran == 'Satu Sampul'){
						$DokBAEP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Evaluasi Penawaran"');
					} else if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
						$DokBAEP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Evaluasi Penawaran Sampul Satu"');
					} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
						$DokBAEP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Evaluasi Penawaran Tahap Satu"');
					}
					
					$BAEP=BeritaAcaraEvaluasiPenawaran::model()->findByPk($DokBAEP->id_dokumen);
					
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

					$PP = PenerimaPengadaan::model()->findAll('(pembukaan_penawaran_1 = "1") and id_pengadaan = ' . $Pengadaan->id_pengadaan);
					
					if(isset($_POST['BeritaAcaraEvaluasiPenawaran']))
					{
						$BAEP->attributes=$_POST['BeritaAcaraEvaluasiPenawaran'];
						$valid=$BAEP->validate();
						if($valid){
						
							if(isset($_POST['perusahaan'])){
								if ($Pengadaan->metode_penawaran == 'Dua Sampul' || $Pengadaan->metode_penawaran == 'Dua Tahap'){
									for($i=0;$i<count($PP);$i++){
										if(isset($_POST['perusahaan'][$i])){
											$PP[$i]->perusahaan=$_POST['perusahaan'][$i];									
											$PP[$i]->alamat=$_POST['alamat'][$i];									
											$PP[$i]->npwp=$_POST['npwp'][$i];		
											
											$PP[$i]->nomor_surat_penawaran = $_POST['nomor_surat_penawaran'][$i];								
											$PP[$i]->tanggal_penawaran = $_POST['tanggal_penawaran'][$i];					
											
											$PP[$i]->evaluasi_penawaran_1 = $_POST['evaluasi_penawaran_1'][$i];
											$PP[$i]->administrasi = $_POST['administrasi'][$i];
											
											$PP[$i]->save();
										}
									}
									
								}//end dua sampul
								else if ($Pengadaan->metode_penawaran == 'Satu Sampul'){
									for($i=0;$i<count($PP);$i++){
										if(isset($_POST['perusahaan'][$i])){
											$PP[$i]->perusahaan=$_POST['perusahaan'][$i];									
											$PP[$i]->alamat = $_POST['alamat'][$i];								
											$PP[$i]->npwp = $_POST['npwp'][$i];
											// $PP[$i]->nilai = 0;						
											$PP[$i]->biaya = $_POST['biaya'][$i];		
											
											$PP[$i]->nomor_surat_penawaran = $_POST['nomor_surat_penawaran'][$i];								
											$PP[$i]->tanggal_penawaran = $_POST['tanggal_penawaran'][$i];										
											
											$PP[$i]->evaluasi_penawaran_1 = $_POST['evaluasi_penawaran_1'][$i];
											$PP[$i]->evaluasi_penawaran_2 = $_POST['evaluasi_penawaran_2'][$i];
											$PP[$i]->administrasi = $_POST['administrasi'][$i];
											
											$PP[$i]->save();
										}
									}
									
								}//end satu sampul
							}//end isset perusahaan		
				
							if($BAEP->save(false)){
								$this->redirect(array('editberitaacaraevaluasipenawaran','id'=>$id));
							}
						}
					}

					$this->render('beritaacaraevaluasipenawaran',array(
						'BAEP'=>$BAEP,'PP'=>$PP,'BAPP'=>$BAPP,
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
	
		public function actionPembukaanpenawaran2()
		{	
			$id = Yii::app()->getRequest()->getQuery('id');
			if (Yii::app()->user->isGuest) {
				$this->redirect(array('site/login'));
			}
			else {
				if (Yii::app()->user->getState('role') == 'anggota') {
				
					$Pengadaan=Pengadaan::model()->findByPk($id);
					$Pengadaan->status ='27';
							
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
						$Dokumen2->nama_dokumen='Lampiran Berita Acara Pembukaan Penawaran Sampul Dua';
					} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
						$Dokumen2->nama_dokumen='Lampiran Berita Acara Pembukaan Penawaran Tahap Dua';
					}
					$Dokumen2->tempat='Jakarta';
					$Dokumen2->status_upload='Belum Selesai';
					$Dokumen2->id_pengadaan=$id;
					
					$Dokumen3=new Dokumen;
					$Dokumen3->id_dokumen=$somevariable+3;
					if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
						$Dokumen3->nama_dokumen='Daftar Hadir Pembukaan Penawaran Sampul Dua';
					} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
						$Dokumen3->nama_dokumen='Daftar Hadir Pembukaan Penawaran Tahap Dua';
					}
					$Dokumen3->tempat='Jakarta';
					$Dokumen3->status_upload='Belum Selesai';
					$Dokumen3->id_pengadaan=$id;
					
					$BAPP= new BeritaAcaraPembukaanPenawaran;
					$BAPP->id_dokumen=$Dokumen1->id_dokumen;
					$BAPP->nomor='-';
					
					
					$DH= new DaftarHadir;
					$DH->id_dokumen=$Dokumen3->id_dokumen;
					if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
						$DH->acara="Pembukaan Penawaran Sampul Dua";
					} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
						$DH->acara="Pembukaan Penawaran Tahap Dua";
					}
					
					if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
						$Dok0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pembukaan Penawaran Sampul Dua"');
					} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
						$Dok0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pembukaan Penawaran Tahap Dua"');
						$PP = PenerimaPengadaan::model()->findAll('evaluasi_penawaran_1 = "1" and id_pengadaan = ' . $Pengadaan->id_pengadaan);
					}
					
					if ($Dok0==null) {
						$DokRKS=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "RKS"');
						$RKS=Rks::model()->findByPk($DokRKS->id_dokumen);
						$Dokumen1->tanggal=Tanggal::getTanggalStrip($RKS->tanggal_pembukaan_penawaran2);
						$BAPP->waktu=Tanggal::getJamMenit($RKS->waktu_pembukaan_penawaran2);
						$BAPP->tempat=$RKS->tempat_pembukaan_penawaran2;
					} else {
						$SUPP=NotaDinasUndangan::model()->findByPk($Dok0->id_dokumen);
						$Dokumen1->tanggal=Tanggal::getTanggalStrip($SUPP->tanggal_undangan);
						$BAPP->waktu=Tanggal::getJamMenit($SUPP->waktu);
						$BAPP->tempat=$SUPP->tempat;
					}									
					
					if(isset($_POST['BeritaAcaraPembukaanPenawaran']))
					{
						$Dokumen1->attributes=$_POST['Dokumen'];
						$BAPP->attributes=$_POST['BeritaAcaraPembukaanPenawaran'];
						$valid=$BAPP->validate();
						if($valid){
							$Dokumen2->tanggal=$Dokumen1->tanggal;
							$Dokumen3->tanggal=$Dokumen1->tanggal;
							$DH->jam=$BAPP->waktu;
							$DH->tempat_hadir=$BAPP->tempat;
							
							if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
								if(isset($_POST['perusahaan'])){																
									for($i=0;$i<count($PP);$i++){
										if(isset($_POST['perusahaan'][$i])){									
											$PP[$i]->perusahaan=$_POST['perusahaan'][$i];																		
											$PP[$i]->hadir_pembukaan_penawaran_2 = $_POST['hadir_pembukaan_penawaran_2'][$i];												
											$PP[$i]->save();
										}
									}									
								}//end isset perusahaan
							}
							
							if($Pengadaan->save(false)){
								if($Dokumen1->save(false)&&$Dokumen2->save(false)&&$Dokumen3->save(false)){
									if($BAPP->save(false)&&$DH->save(false)){
										$this->redirect(array('editpembukaanpenawaran2','id'=>$id));
									}
								}
							}
						}
					}
					
					if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
						$this->render('pembukaanpenawaran2',array(
						'BAPP'=>$BAPP,'PP'=>$PP,'Dokumen1'=>$Dokumen1,
						));
					}else{
						$this->render('pembukaanpenawaran2',array(
						'BAPP'=>$BAPP,'Dokumen1'=>$Dokumen1,
						));
					}
					
				}
			}
		}
		
		public function actionEditPembukaanpenawaran2()
		{	
			$id = Yii::app()->getRequest()->getQuery('id');
			if (Yii::app()->user->isGuest) {
				$this->redirect(array('site/login'));
			}
			else {
				if (Yii::app()->user->getState('role') == 'anggota') {
				
					$Pengadaan=Pengadaan::model()->findByPk($id);
					
					if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
						$Dokumen1=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran Sampul Dua"');
						$Dokumen2=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Lampiran Berita Acara Pembukaan Penawaran Sampul Dua"');
						$Dokumen3=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Daftar Hadir Pembukaan Penawaran Sampul Dua"');
					} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
						$Dokumen1=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran Tahap Dua"');
						$Dokumen2=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Lampiran Berita Acara Pembukaan Penawaran Tahap Dua"');
						$Dokumen3=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Daftar Hadir Pembukaan Penawaran Tahap Dua"');
					}
					$Dokumen1->tanggal=Tanggal::getTanggalStrip($Dokumen1->tanggal);
					$BAPP=BeritaAcaraPembukaanPenawaran::model()->findByPk($Dokumen1->id_dokumen);
					$BAPP->waktu=Tanggal::getJamMenit($BAPP->waktu);
					$DH=DaftarHadir::model()->findByPk($Dokumen3->id_dokumen);
					
					//Uncomment the following line if AJAX validation is needed
					//$this->performAjaxValidation($model);

					$PP = PenerimaPengadaan::model()->findAll('evaluasi_penawaran_1 = "1" and id_pengadaan = ' . $Pengadaan->id_pengadaan);
					
					if(isset($_POST['BeritaAcaraPembukaanPenawaran']))
					{
						$Dokumen1->attributes=$_POST['Dokumen'];
						$BAPP->attributes=$_POST['BeritaAcaraPembukaanPenawaran'];
						$valid=$BAPP->validate();
						if($valid){
							$Dokumen2->tanggal=$Dokumen1->tanggal;
							$Dokumen3->tanggal=$Dokumen1->tanggal;
							$DH->jam=$BAPP->waktu;
							$DH->tempat_hadir=$BAPP->tempat;
							if(isset($_POST['perusahaan'])){							
								
								for($i=0;$i<count($PP);$i++){
									if(isset($_POST['perusahaan'][$i])){									
										$PP[$i]->perusahaan=$_POST['perusahaan'][$i];																		
										$PP[$i]->hadir_pembukaan_penawaran_2 = $_POST['hadir_pembukaan_penawaran_2'][$i];														
										$PP[$i]->save();
									}
								}
								
							}//end isset perusahaan
						
							if($Dokumen1->save(false)&&$Dokumen2->save(false)&&$Dokumen3->save(false)){
								if($BAPP->save(false)&&$DH->save(false)){
									$this->redirect(array('editpembukaanpenawaran2','id'=>$id));
								}
							}
						}
					}
					$this->render('pembukaanpenawaran2',array(
						'BAPP'=>$BAPP,'PP'=>$PP,'Dokumen1'=>$Dokumen1,'Dokumen2'=>$Dokumen2,'DH'=>$DH,
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
				if (Yii::app()->user->getState('role') == 'anggota') {
				
					$Pengadaan=Pengadaan::model()->findByPk($id);
					$Pengadaan->status ='28';
					
					if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
						$DokBAPP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran Sampul Dua"');
					} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
						$DokBAPP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran Tahap Dua"');
					}
					
					$BAPP=BeritaAcaraPembukaanPenawaran::model()->findByPk($DokBAPP->id_dokumen);
					
					if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
						$Dok0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pembukaan Penawaran Sampul Dua"');
					} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
						$Dok0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pembukaan Penawaran Tahap Dua"');
					}
					
					if($Pengadaan->metode_penawaran=="Dua Sampul") {
						$DokBAEP= Dokumen::model()->find('id_pengadaan = '.$id.' and nama_dokumen = "Berita Acara Evaluasi Penawaran Sampul Satu"');
						$PP = PenerimaPengadaan::model()->findAll('evaluasi_penawaran_1 = "1" and id_pengadaan = ' . $Pengadaan->id_pengadaan);
					} else if($Pengadaan->metode_penawaran=="Dua Tahap") {
						$DokBAEP= Dokumen::model()->find('id_pengadaan = '.$id.' and nama_dokumen = "Berita Acara Evaluasi Penawaran Tahap Satu"');
						$PP = PenerimaPengadaan::model()->findAll('(hadir_pembukaan_penawaran_2 = "1" or hadir_pembukaan_penawaran_2 = "0") and id_pengadaan = ' . $Pengadaan->id_pengadaan);
					}
					$BAEP= BeritaAcaraEvaluasiPenawaran::model()->findByPk($DokBAEP->id_dokumen);
					
					//Uncomment the following line if AJAX validation is needed
					//$this->performAjaxValidation($model);										
					
					if(isset($_POST['BeritaAcaraPembukaanPenawaran']))
					{
						$BAPP->attributes=$_POST['BeritaAcaraPembukaanPenawaran'];
						$valid=$BAPP->validate();
						if($valid){
							if(isset($_POST['perusahaan'])){							
								
								for($i=0;$i<count($PP);$i++){
									if(isset($_POST['perusahaan'][$i])){									
										$PP[$i]->perusahaan=$_POST['perusahaan'][$i];																		
										$PP[$i]->pembukaan_penawaran_2 = $_POST['pembukaan_penawaran_2'][$i];												
										$PP[$i]->save();
									}
								}
								
							}//end isset perusahaan
							
							if($Pengadaan->save(false)){
								if($BAPP->save(false)){
									$this->redirect(array('editberitaacarapembukaanpenawaran2','id'=>$id));
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
						$SUPP=NotaDinasUndangan::model()->findByPk($Dok0->id_dokumen);
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
				if (Yii::app()->user->getState('role') == 'anggota') {
				
					$Pengadaan=Pengadaan::model()->findByPk($id);
					
					if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
						$DokBAPP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran Sampul Dua"');
					} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
						$DokBAPP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran Tahap Dua"');
					}
					
					$BAPP=BeritaAcaraPembukaanPenawaran::model()->findByPk($DokBAPP->id_dokumen);
					
					if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
						$Dok0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pembukaan Penawaran Sampul Dua"');
						$PP = PenerimaPengadaan::model()->findAll('evaluasi_penawaran_1 = "1" and id_pengadaan = ' . $Pengadaan->id_pengadaan);
					} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
						$Dok0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Pembukaan Penawaran Tahap Dua"');
						$PP = PenerimaPengadaan::model()->findAll('(hadir_pembukaan_penawaran_2 = "1" or hadir_pembukaan_penawaran_2 = "0") and id_pengadaan = ' . $Pengadaan->id_pengadaan);
					}
					
					
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
										$PP[$i]->pembukaan_penawaran_2 = $_POST['pembukaan_penawaran_2'][$i];			
										$PP[$i]->save();
									}
								}
								
							}//end isset perusahaan
							
							if($BAPP->save(false)){
								$this->redirect(array('editberitaacarapembukaanpenawaran2','id'=>$id));
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
						$SUPP=NotaDinasUndangan::model()->findByPk($Dok0->id_dokumen);
						$this->render('beritaacarapembukaanpenawaran2',array(
							'BAPP'=>$BAPP,'PP'=>$PP,'SUPP'=>$SUPP,'Dok0'=>$Dok0,
						));
					}

				}
			}
		}
	
		public function actionEvaluasipenawaran2()
		{	
			$id = Yii::app()->getRequest()->getQuery('id');
			if (Yii::app()->user->isGuest) {
				$this->redirect(array('site/login'));
			}
			else {
				if (Yii::app()->user->getState('role') == 'anggota') {
				
					$Pengadaan=Pengadaan::model()->findByPk($id);
					$Pengadaan->status ='29';
					
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
					
					$Dokumen2=new Dokumen;
					$Dokumen2->id_dokumen=$somevariable+2;
					if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
						$Dokumen2->nama_dokumen='Lampiran Berita Acara Evaluasi Penawaran Sampul Dua';
					} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
						$Dokumen2->nama_dokumen='Lampiran Berita Acara Evaluasi Penawaran Tahap Dua';
					}
					$Dokumen2->tempat='Jakarta';
					$Dokumen2->status_upload='Belum Selesai';
					$Dokumen2->id_pengadaan=$id;
					
					$Dokumen3=new Dokumen;
					$Dokumen3->id_dokumen=$somevariable+3;
					if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
						$Dokumen3->nama_dokumen='Daftar Hadir Evaluasi Penawaran Sampul Dua';
					} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
						$Dokumen3->nama_dokumen='Daftar Hadir Evaluasi Penawaran Tahap Dua';
					}
					$Dokumen3->tempat='Jakarta';
					$Dokumen3->status_upload='Belum Selesai';
					$Dokumen3->id_pengadaan=$id;
					
					$BAEP= new BeritaAcaraEvaluasiPenawaran;
					$BAEP->id_dokumen=$Dokumen1->id_dokumen;
					$BAEP->nomor='-';
					
					$DH= new DaftarHadir;
					$DH->id_dokumen=$Dokumen3->id_dokumen;
					if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
						$DH->acara="Evaluasi Penawaran Sampul Dua";
					} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
						$DH->acara="Evaluasi Penawaran Tahap Dua";
					}
					
					if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
						$Dok0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Evaluasi Penawaran Sampul Dua"');
					} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
						$Dok0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Evaluasi Penawaran Tahap Dua"');
					}
					
					if ($Dok0==null) {
						$DokRKS=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "RKS"');
						$RKS=Rks::model()->findByPk($DokRKS->id_dokumen);
						$Dokumen1->tanggal=Tanggal::getTanggalStrip($RKS->tanggal_evaluasi_penawaran2);
						$BAEP->waktu=Tanggal::getJamMenit($RKS->waktu_evaluasi_penawaran2);
						$BAEP->tempat=$RKS->tempat_evaluasi_penawaran2;
					} else {
						$SUEP=NotaDinasUndangan::model()->findByPk($Dok0->id_dokumen);
						$Dokumen1->tanggal=Tanggal::getTanggalStrip($SUEP->tanggal_undangan);
						$BAEP->waktu=Tanggal::getJamMenit($SUEP->waktu);
						$BAEP->tempat=$SUEP->tempat;
					}
					
					//Uncomment the following line if AJAX validation is needed
					//$this->performAjaxValidation($model);
					
					if(isset($_POST['BeritaAcaraEvaluasiPenawaran']))
					{
						$Dokumen1->attributes=$_POST['Dokumen'];
						$BAEP->attributes=$_POST['BeritaAcaraEvaluasiPenawaran'];
						$valid=$BAEP->validate();
						if($valid){
							$DH->jam=$BAEP->waktu;
							$DH->tempat_hadir=$BAEP->tempat;
							$Dokumen2->tanggal=$Dokumen1->tanggal;
							$Dokumen3->tanggal=$Dokumen1->tanggal;
					
							if($Pengadaan->save(false)){
								if($Dokumen1->save(false)&&$Dokumen2->save(false)&&$Dokumen3->save(false)){
									if($BAEP->save(false)&&$DH->save(false)){
										$this->redirect(array('editevaluasipenawaran2','id'=>$id));
									}
								}
							}
						}
					}

					$this->render('evaluasipenawaran2',array(
						'BAEP'=>$BAEP,'Dokumen1'=>$Dokumen1,
					));
				}
			}
		}
		
		public function actionEditEvaluasipenawaran2()
		{	
			$id = Yii::app()->getRequest()->getQuery('id');
			if (Yii::app()->user->isGuest) {
				$this->redirect(array('site/login'));
			}
			else {
				if (Yii::app()->user->getState('role') == 'anggota') {
				
					$Pengadaan=Pengadaan::model()->findByPk($id);
					
					if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
						$Dokumen1=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Evaluasi Penawaran Sampul Dua"');
						$Dokumen2=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Lampiran Berita Acara Evaluasi Penawaran Sampul Dua"');
						$Dokumen3=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Daftar Hadir Evaluasi Penawaran Sampul Dua"');
					} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
						$Dokumen1=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Evaluasi Penawaran Tahap Dua"');
						$Dokumen2=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Lampiran Berita Acara Evaluasi Penawaran Tahap Dua"');
						$Dokumen3=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Daftar Hadir Evaluasi Penawaran Tahap Dua"');
					}
					
					$Dokumen1->tanggal=Tanggal::getTanggalStrip($Dokumen1->tanggal);
					
					$BAEP=BeritaAcaraEvaluasiPenawaran::model()->findByPk($Dokumen1->id_dokumen);
					$BAEP->waktu=Tanggal::getJamMenit($BAEP->waktu);
					$DH=DaftarHadir::model()->findByPk($Dokumen3->id_dokumen);
					
					//Uncomment the following line if AJAX validation is needed
					//$this->performAjaxValidation($model);

					if(isset($_POST['BeritaAcaraEvaluasiPenawaran']))
					{
						$Dokumen1->attributes=$_POST['Dokumen'];
						$BAEP->attributes=$_POST['BeritaAcaraEvaluasiPenawaran'];
						$valid=$BAEP->validate();
						if($valid){
							$DH->jam=$BAEP->waktu;
							$DH->tempat_hadir=$BAEP->tempat;
							$Dokumen2->tanggal=$Dokumen1->tanggal;
							$Dokumen3->tanggal=$Dokumen1->tanggal;
								
							$Dokumen2->tanggal=$Dokumen1->tanggal;
							if($Pengadaan->save(false)){
								if($Dokumen1->save(false)&&$Dokumen2->save(false)&&$Dokumen3->save(false)){
									if($BAEP->save(false)&&$DH->save(false)){
										$this->redirect(array('editevaluasipenawaran2','id'=>$id));
									}
								}
							}
						}
					}

					$this->render('evaluasipenawaran2',array(
						'BAEP'=>$BAEP,'Dokumen1'=>$Dokumen1,'DH'=>$DH,'Dokumen2'=>$Dokumen2,
					));

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
				if (Yii::app()->user->getState('role') == 'anggota') {
				
					$Pengadaan=Pengadaan::model()->findByPk($id);
					$Pengadaan->status ='30';
					
					if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
						$DokBAPP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran Sampul Dua"');
					} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
						$DokBAPP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran Tahap Dua"');
					}				
					$BAPP=BeritaAcaraPembukaanPenawaran::model()->findByPk($DokBAPP->id_dokumen);
					
					if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
						$DokBAEP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Evaluasi Penawaran Sampul Dua"');
					} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
						$DokBAEP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Evaluasi Penawaran Tahap Dua"');
					}
					$BAEP= BeritaAcaraEvaluasiPenawaran::model()->findByPk($DokBAEP->id_dokumen);
					
					//Uncomment the following line if AJAX validation is needed
					//$this->performAjaxValidation($model);
					
					$PP = PenerimaPengadaan::model()->findAll('pembukaan_penawaran_2 = "1" and id_pengadaan = ' . $Pengadaan->id_pengadaan);
					
					if(isset($_POST['BeritaAcaraEvaluasiPenawaran']))
					{
						$BAEP->attributes=$_POST['BeritaAcaraEvaluasiPenawaran'];
						$valid=$BAEP->validate();
						if($valid){
						
							if(isset($_POST['perusahaan'])){							
								
								for($i=0;$i<count($PP);$i++){
									if(isset($_POST['perusahaan'][$i])){									
										$PP[$i]->perusahaan=$_POST['perusahaan'][$i];									
										$PP[$i]->biaya=$_POST['biaya'][$i];									
										$PP[$i]->evaluasi_penawaran_2 = $_POST['evaluasi_penawaran_2'][$i];
										$PP[$i]->save();
									}
								}
								
							}//end isset perusahaan
							if($Pengadaan->save(false)){
								if($BAEP->save(false)){
									$this->redirect(array('editberitaacaraevaluasipenawaran2','id'=>$id));
								}
							}
						}
					}

					$this->render('beritaacaraevaluasipenawaran2',array(
						'BAEP'=>$BAEP,'PP'=>$PP,'BAPP'=>$BAPP
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
				if (Yii::app()->user->getState('role') == 'anggota') {
				
					$Pengadaan=Pengadaan::model()->findByPk($id);
					
					if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
						$DokBAPP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran Sampul Dua"');
					} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
						$DokBAPP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Pembukaan Penawaran Tahap Dua"');
					}				
					$BAPP=BeritaAcaraPembukaanPenawaran::model()->findByPk($DokBAPP->id_dokumen);
					
					if ($Pengadaan->metode_penawaran == 'Dua Sampul'){
						$DokBAEP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Evaluasi Penawaran Sampul Dua"');
					} else if ($Pengadaan->metode_penawaran == 'Dua Tahap'){
						$DokBAEP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Evaluasi Penawaran Tahap Dua"');
					}
					$BAEP= BeritaAcaraEvaluasiPenawaran::model()->findByPk($DokBAEP->id_dokumen);
					
					
					//Uncomment the following line if AJAX validation is needed
					//$this->performAjaxValidation($model);

					$PP = PenerimaPengadaan::model()->findAll('pembukaan_penawaran_2 = "1" and id_pengadaan = ' . $Pengadaan->id_pengadaan);
					
					if(isset($_POST['BeritaAcaraEvaluasiPenawaran']))
					{
						$BAEP->attributes=$_POST['BeritaAcaraEvaluasiPenawaran'];
						$valid=$BAEP->validate();
						if($valid){
						
							if(isset($_POST['perusahaan'])){							
								
								for($i=0;$i<count($PP);$i++){
									if(isset($_POST['perusahaan'][$i])){									
										$PP[$i]->perusahaan=$_POST['perusahaan'][$i];									
										$PP[$i]->biaya=$_POST['biaya'][$i];									
										$PP[$i]->evaluasi_penawaran_2 = $_POST['evaluasi_penawaran_2'][$i];
										$PP[$i]->save();
									}
								}
								
							}//end isset perusahaan
							if($BAEP->save(false)){
								$this->redirect(array('editberitaacaraevaluasipenawaran2','id'=>$id));
							}
						}
					}

					$this->render('beritaacaraevaluasipenawaran2',array(
						'BAEP'=>$BAEP,'PP'=>$PP,'BAPP'=>$BAPP
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
					} else if ($Pengadaan->metode_penawaran=="Dua Tahap"){
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
					} else if ($Pengadaan->metode_penawaran=="Dua Tahap"){
						$DokEval=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Evaluasi Penawaran Tahap Dua"');
						$Eval=BeritaAcaraEvaluasiPenawaran::model()->findByPk($DokEval->id_dokumen);
						$this->render('suratundangannegosiasiklarifikasi',array(
							'SUNK'=>$SUNK,'Dokumen0'=>$Dokumen0,'Eval'=>$Eval,
						));
					}
				}
			}
		}
	
		public function actionNegosiasiklarifikasi()
		{	
			$id = Yii::app()->getRequest()->getQuery('id');
			if (Yii::app()->user->isGuest) {
				$this->redirect(array('site/login'));
			}
			else {
				if (Yii::app()->user->getState('role') == 'anggota') {
				
					$Pengadaan=Pengadaan::model()->findByPk($id);
					$Pengadaan->status ='31';
					
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
					
					$Dokumen2=new Dokumen;
					$Dokumen2->id_dokumen=$somevariable+2;
					$Dokumen2->nama_dokumen='Lampiran Berita Acara Negosiasi dan Klarifikasi';
					$Dokumen2->tempat='Jakarta';
					$Dokumen2->status_upload='Belum Selesai';
					$Dokumen2->id_pengadaan=$id;
					
					$Dokumen3=new Dokumen;
					$Dokumen3->id_dokumen=$somevariable+3;
					$Dokumen3->nama_dokumen='Daftar Hadir Negosiasi dan Klarifikasi';
					$Dokumen3->tempat='Jakarta';
					$Dokumen3->status_upload='Belum Selesai';
					$Dokumen3->id_pengadaan=$id;
					
					$BANK= new BeritaAcaraNegosiasiKlarifikasi;
					$BANK->id_dokumen=$Dokumen1->id_dokumen;
					$BANK->nomor='-';
					
					$DH= new DaftarHadir;
					$DH->id_dokumen=$Dokumen3->id_dokumen;
					$DH->acara="Negosiasi dan Klarifikasi";
					
					$Dok0=Dokumen::model()->find('id_pengadaan = ' .$id. ' and nama_dokumen = "Surat Undangan Negosiasi dan Klarifikasi"');
					if($Dok0==null) {
						$Dokumen1->tanggal=Tanggal::getTanggalStrip($RKS->tanggal_negosiasi);
						$BANK->tempat=$RKS->tempat_negosiasi;
						$BANK->waktu=Tanggal::getJamMenit($RKS->waktu_negosiasi);
					} else {
						$SUNK=NotaDinasUndangan::model()->findByPk($Dok0->id_dokumen);
						$Dokumen1->tanggal=Tanggal::getTanggalStrip($SUNK->tanggal_undangan);
						$BANK->tempat=$SUNK->tempat;
						$BANK->waktu=Tanggal::getJamMenit($SUNK->waktu);
					}
					
					if(isset($_POST['BeritaAcaraNegosiasiKlarifikasi']))
					{
						$Dokumen1->attributes=$_POST['Dokumen'];
						$BANK->attributes=$_POST['BeritaAcaraNegosiasiKlarifikasi'];
						$valid=$Dokumen1->validate()&&$BANK->validate();
						if($valid){
							$DH->jam=$BANK->waktu;
							$DH->tempat_hadir=$BANK->tempat;
							$Dokumen2->tanggal=$Dokumen1->tanggal;
							$Dokumen3->tanggal=$Dokumen1->tanggal;
							
							if($Pengadaan->save(false)){
								if($Dokumen1->save(false)&&$Dokumen2->save(false)&&$Dokumen3->save(false)){
									if($BANK->save(false)&&$DH->save(false)){
										$this->redirect(array('editnegosiasiklarifikasi','id'=>$id));
									}
								}
							}
						}
					}
					$this->render('negosiasiklarifikasi',array(
						'BANK'=>$BANK,'Dokumen1'=>$Dokumen1,
					));
				}
			}
		}
		
		public function actionEditNegosiasiklarifikasi()
		{	
			$id = Yii::app()->getRequest()->getQuery('id');
			if (Yii::app()->user->isGuest) {
				$this->redirect(array('site/login'));
			}
			else {
				if (Yii::app()->user->getState('role') == 'anggota') {
				
					$Pengadaan=Pengadaan::model()->findByPk($id);
					
					$Dokumen1=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Negosiasi dan Klarifikasi"');
					$Dokumen2=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Lampiran Berita Acara Negosiasi dan Klarifikasi"');
					$Dokumen3=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Daftar Hadir Negosiasi dan Klarifikasi"');
					$Dokumen1->tanggal=Tanggal::getTanggalStrip($Dokumen1->tanggal);
					$BANK=BeritaAcaraNegosiasiKlarifikasi::model()->findByPk($Dokumen1->id_dokumen);
					$BANK->waktu=Tanggal::getJamMenit($BANK->waktu);
					$DH=DaftarHadir::model()->findByPk($Dokumen3->id_dokumen);
					
					
					//Uncomment the following line if AJAX validation is needed
					//$this->performAjaxValidation($model);

					
					if(isset($_POST['BeritaAcaraNegosiasiKlarifikasi']))
					{
						$Dokumen1->attributes=$_POST['Dokumen'];
						$BANK->attributes=$_POST['BeritaAcaraNegosiasiKlarifikasi'];
						$valid=$Dokumen1->validate()&&$BANK->validate();
						if($valid){
							$DH->jam=$BANK->waktu;
							$DH->tempat_hadir=$BANK->tempat;
							$Dokumen2->tanggal=$Dokumen1->tanggal;
							$Dokumen3->tanggal=$Dokumen1->tanggal;
					
							if($Dokumen1->save(false)&&$Dokumen2->save(false)&&$Dokumen3->save(false)){
								if($BANK->save(false)&&$DH->save(false)){
									$this->redirect(array('editnegosiasiklarifikasi','id'=>$id));
								}
							}	
						}
					}
					$this->render('negosiasiklarifikasi',array(
						'BANK'=>$BANK,'Dokumen1'=>$Dokumen1,'Dokumen2'=>$Dokumen2,'DH'=>$DH,
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
				if (Yii::app()->user->getState('role') == 'anggota') {
				
					$Pengadaan=Pengadaan::model()->findByPk($id);
					$Pengadaan->status ='32';
					
					
					$DokBANK=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Negosiasi dan Klarifikasi"');
					$BANK=BeritaAcaraNegosiasiKlarifikasi::model()->findByPk($DokBANK->id_dokumen);
					
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
										$PP[$i]->negosiasi_klarifikasi = $_POST['negosiasi_klarifikasi'][$i];
										$PP[$i]->save();
									}
								}
								
							}//end isset perusahaan	
							
							if($Pengadaan->save(false)){
								if($BANK->save(false)){
									$this->redirect(array('editberitaacaranegosiasiklarifikasi','id'=>$id));
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
						} else if ($Pengadaan->metode_penawaran=="Dua Tahap"){
							$DokEval=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Evaluasi Penawaran Tahap Dua"');
							$Eval=BeritaAcaraEvaluasiPenawaran::model()->findByPk($DokEval->id_dokumen);
							$this->render('beritaacaranegosiasiklarifikasi',array(
								'BANK'=>$BANK,'Eval'=>$Eval,'PP'=>$PP,
							));
						}
					} else {
						$DokSUNK=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Negosiasi dan Klarifikasi"');
						$SUNK=NotaDinasUndangan::model()->findByPk($DokSUNK->id_dokumen);
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
				if (Yii::app()->user->getState('role') == 'anggota') {
				
					$Pengadaan=Pengadaan::model()->findByPk($id);
					
					$Dokumen1=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Negosiasi dan Klarifikasi"');
					$Dokumen2=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Daftar Hadir Negosiasi dan Klarifikasi"');
					
					$BANK=BeritaAcaraNegosiasiKlarifikasi::model()->findByPk($Dokumen1->id_dokumen);
					$DH=DaftarHadir::model()->findByPk($Dokumen2->id_dokumen);
					
					$PP = PenerimaPengadaan::model()->findAll('evaluasi_penawaran_2 = "1" and id_pengadaan = ' . $Pengadaan->id_pengadaan);
					
					if($PP=='null'){
						$this->redirect(array('beritaacaranegosiasiklarifikasi','id'=>$Dokumen1->id_pengadaan));
					}
					
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
										$PP[$i]->negosiasi_klarifikasi = $_POST['negosiasi_klarifikasi'][$i];
										$PP[$i]->save();
									}
								}
								
							}//end isset perusahaan	
							
							if($BANK->save(false)&&$DH->save(false)){
								$this->redirect(array('editberitaacaranegosiasiklarifikasi','id'=>$id));
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
						} else if ($Pengadaan->metode_penawaran=="Dua Tahap"){
							$DokEval=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Berita Acara Evaluasi Penawaran Tahap Dua"');
							$Eval=BeritaAcaraEvaluasiPenawaran::model()->findByPk($DokEval->id_dokumen);
							$this->render('beritaacaranegosiasiklarifikasi',array(
								'BANK'=>$BANK, 'DH'=>$DH, 'Eval'=>$Eval,'PP'=>$PP,
							));
						}
					} else {
						$DokSUNK=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Undangan Negosiasi dan Klarifikasi"');
						$SUNK=NotaDinasUndangan::model()->findByPk($DokSUNK->id_dokumen);
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
				if (Yii::app()->user->getState('role') == 'anggota') {
				
					$Pengadaan=Pengadaan::model()->findByPk($id);
					$Pengadaan->status ='33';
					
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
											$PP[$i]->usulan_pemenang = $_POST['usulan_pemenang'][$i];
											$PP[$i]->save();
										}
									}
									
							}//end isset perusahaan		
							
							$Dokumen1->tanggal=$Dokumen0->tanggal;
							if($Pengadaan->save(false))
							{	
								if($Dokumen0->save(false)&&$Dokumen1->save(false)){
									if($NDUP->save(false)&&$PIP2->save(false)){
										$this->redirect(array('editnotadinasusulanpemenang','id'=>$id));
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
				if (Yii::app()->user->getState('role') == 'anggota') {
				
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

					$PP = PenerimaPengadaan::model()->findAll('negosiasi_klarifikasi = "1" and id_pengadaan = ' . $Pengadaan->id_pengadaan);
					
					if($PP=='null'){
						$this->redirect(array('notadinasusulanpemenang','id'=>$id));
					}
					
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
										$PP[$i]->usulan_pemenang = $_POST['usulan_pemenang'][$i];
										$PP[$i]->save();
									}
								}
								
							}//end isset perusahaan	
							
							$Dokumen1->tanggal=$Dokumen0->tanggal;
							if($Dokumen0->save(false)&&$Dokumen1->save(false)){
								if($NDUP->save(false)&&$PIP2->save(false)){
									$this->redirect(array('editnotadinasusulanpemenang','id'=>$id));
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
				if (Yii::app()->user->getState('role') == 'anggota') {
				
					$Pengadaan=Pengadaan::model()->findByPk($id);
					if ($Pengadaan->metode_pengadaan == 'Penunjukan Langsung'){
						$Pengadaan->status ='36';
					} else if ($Pengadaan->metode_pengadaan == 'Pemilihan Langsung'){
						$Pengadaan->status ='34';
					} else if ($Pengadaan->metode_pengadaan == 'Pelelangan'){
						$Pengadaan->status ='35';
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
											$PP[$i]->penetapan_pemenang	 = $_POST['penetapan_pemenang'][$i];																
											$PP[$i]->save();
										}
									}
									
							}//end isset perusahaan	
							
							if($Pengadaan->save(false))
							{	
								if($Dokumen0->save(false)){
									if($NDPP->save(false)){
										$this->redirect(array('editnotadinaspenetapanpemenang','id'=>$id));
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
				if (Yii::app()->user->getState('role') == 'anggota') {
				
					$Pengadaan=Pengadaan::model()->findByPk($id);
					
					$DokNDUP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Nota Dinas Usulan Pemenang"');
					$NDUP=NotaDinasUsulanPemenang::model()->findByPk($DokNDUP->id_dokumen);
					
					$Dokumen0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Nota Dinas Penetapan Pemenang"');
					$Dokumen0->tanggal=Tanggal::getTanggalStrip($Dokumen0->tanggal);
					$NDPP=NotaDinasPenetapanPemenang::model()->findByPk($Dokumen0->id_dokumen);
					
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
											$PP[$i]->penetapan_pemenang	 = $_POST['penetapan_pemenang'][$i];						
											$PP[$i]->save();
										}
									}
									
							}//end isset perusahaan	
							
							if($Dokumen0->save(false)){
								if($NDPP->save(false)){
									$this->redirect(array('editnotadinaspenetapanpemenang','id'=>$id));
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
				if (Yii::app()->user->getState('role') == 'anggota') {
				
					$Pengadaan=Pengadaan::model()->findByPk($id);
					$Pengadaan->status ='36';
					
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
						$valid=$NDBP->validate();
						$valid=$valid&&$Dokumen0->validate();
						if($valid){
							if($Pengadaan->save(false))
							{	
								if($Dokumen0->save(false)){
									if($NDBP->save(false)){
										$this->redirect(array('editnotadinaspemberitahuanpemenang','id'=>$id));
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
				if (Yii::app()->user->getState('role') == 'anggota') {
				
					$Pengadaan=Pengadaan::model()->findByPk($id);
					
					$DokNDPP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Nota Dinas Penetapan Pemenang"');
					$NDPP=NotaDinasPenetapanPemenang::model()->findByPk($DokNDPP->id_dokumen);
					
					$Dokumen0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Nota Dinas Pemberitahuan Pemenang"');
					$Dokumen0->tanggal=Tanggal::getTanggalStrip($Dokumen0->tanggal);
					$NDBP=NotaDinasPemberitahuanPemenang::model()->findByPk($Dokumen0->id_dokumen);
					
					//Uncomment the following line if AJAX validation is needed
					//$this->performAjaxValidation($model);

					if(isset($_POST['NotaDinasPemberitahuanPemenang']))
					{
						$Dokumen0->attributes=$_POST['Dokumen'];
						$NDBP->attributes=$_POST['NotaDinasPemberitahuanPemenang'];
						$valid=$NDBP->validate();
						$valid=$valid&&$Dokumen0->validate();
						if($valid){
							if($Dokumen0->save(false)){
								if($NDBP->save(false)){
									$this->redirect(array('editnotadinaspemberitahuanpemenang','id'=>$id));
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
	
		public function actionSuratpengumumanpemenang()
		{	
			$id = Yii::app()->getRequest()->getQuery('id');
			if (Yii::app()->user->isGuest) {
				$this->redirect(array('site/login'));
			}
			else {
				if (Yii::app()->user->getState('role') == 'anggota') {
				
					$Pengadaan=Pengadaan::model()->findByPk($id);
					$Pengadaan->status ='36';
					
					$DokNDPP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Nota Dinas Penetapan Pemenang"');
					$NDPP=NotaDinasPenetapanPemenang::model()->findByPk($DokNDPP->id_dokumen);
					
					$Dokumen0= new Dokumen;
					$criteria=new CDbcriteria;
					$criteria->select='max(id_dokumen) AS maxId';
					$row = $Dokumen0->model()->find($criteria);
					$somevariable = $row['maxId'];
					$Dokumen0->id_dokumen=$somevariable+1;
					$Dokumen0->nama_dokumen='Surat Pengumuman Pemenang';
					$Dokumen0->tempat='Jakarta';
					$Dokumen0->status_upload='Belum Selesai';
					$Dokumen0->id_pengadaan=$id;
					date_default_timezone_set("Asia/Jakarta");
					$Dokumen0->tanggal=date('d-m-Y');
					
					$SPP= new SuratPengumumanPemenang;
					$SPP->id_dokumen=$Dokumen0->id_dokumen;
					
					//Uncomment the following line if AJAX validation is needed
					//$this->performAjaxValidation($model);

					if(isset($_POST['SuratPengumumanPemenang']))
					{
						$Dokumen0->attributes=$_POST['Dokumen'];
						$SPP->attributes=$_POST['SuratPengumumanPemenang'];
						$valid=$SPP->validate();
						$valid=$valid&&$Dokumen0->validate();
						if($valid){
							if($Pengadaan->save(false))
							{	
								if($Dokumen0->save(false)){
									if($SPP->save(false)){
										$this->redirect(array('editsuratpengumumanpemenang','id'=>$id));
									}
								}
							}
						}
					}

					$this->render('suratpengumumanpemenang',array(
						'SPP'=>$SPP,'Dokumen0'=>$Dokumen0,'NDPP'=>$NDPP,
					));

				}
			}
		}
		
		public function actionEditSuratpengumumanpemenang()
		{	
			$id = Yii::app()->getRequest()->getQuery('id');
			if (Yii::app()->user->isGuest) {
				$this->redirect(array('site/login'));
			}
			else {
				if (Yii::app()->user->getState('role') == 'anggota') {
				
					$Pengadaan=Pengadaan::model()->findByPk($id);
					
					$DokNDPP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Nota Dinas Penetapan Pemenang"');
					$NDPP=NotaDinasPenetapanPemenang::model()->findByPk($DokNDPP->id_dokumen);
					
					$Dokumen0=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Pengumuman Pemenang"');
					$Dokumen0->tanggal=Tanggal::getTanggalStrip($Dokumen0->tanggal);
					$SPP=SuratPengumumanPemenang::model()->findByPk($Dokumen0->id_dokumen);
					
					
					if(isset($_POST['SuratPengumumanPemenang']))
					{
						$Dokumen0->attributes=$_POST['Dokumen'];
						$SPP->attributes=$_POST['SuratPengumumanPemenang'];
						$valid=$SPP->validate();
						$valid=$valid&&$Dokumen0->validate();
						if($valid){
							if($Dokumen0->save(false)){
								if($SPP->save(false)){
									$this->redirect(array('editsuratpengumumanpemenang','id'=>$id));
								}
							}
						}
					}

					$this->render('suratpengumumanpemenang',array(
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
				if (Yii::app()->user->getState('role') == 'anggota') {
				
					$Pengadaan=Pengadaan::model()->findByPk($id);
					$Pengadaan->status ='37';
					
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
										$this->redirect(array('editsuratpenunjukanpemenang','id'=>$id));
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
						$DokSPP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Pengumuman Pemenang"');
						$SPP=SuratPengumumanPemenang::model()->findByPk($DokSPP->id_dokumen);
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
				if (Yii::app()->user->getState('role') == 'anggota') {
				
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
							if($Dokumen0->save(false)){
								if($SPPM->save(false)){
									$this->redirect(array('editsuratpenunjukanpemenang','id'=>$id));
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
						$DokSPP=Dokumen::model()->find(('id_pengadaan='.$Pengadaan->id_pengadaan).' and nama_dokumen= "Surat Pengumuman Pemenang"');
						$SPP=SuratPengumumanPemenang::model()->findByPk($DokSPP->id_dokumen);
						$this->render('suratpenunjukanpemenang',array(
							'SPPM'=>$SPPM,'Dokumen0'=>$Dokumen0,'SPP'=>$SPP,
						));
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
				if (Yii::app()->user->getState('role') == 'anggota') {
					$this->render('checkpoint2');
				}
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
					$this->render('uploader',array('modelDok'=>$modelDok));
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
	}
?>