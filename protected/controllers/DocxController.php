<?php
	
class DocxController extends Controller
{
	public function behaviors()
	{
	   return array(
		   'doccy' => array(
			   'class' => 'ext.doccy.Doccy',
			   'options' => array(
					'templatePath' => $_SERVER["DOCUMENT_ROOT"] . Yii::app()->request->baseUrl . '/templates',
					'outputPath' => $_SERVER["DOCUMENT_ROOT"] . Yii::app()->request->baseUrl . '/docs',
					'tmp' => $_SERVER["DOCUMENT_ROOT"] . Yii::app()->request->baseUrl . '/protected/runtime',
			   ),
		   ),
	   );
	}
	
	public function actionDownloadRks(){
		$id= Yii::app()->getRequest()->getQuery('id');
		$Rincian = RincianRks::model()->findByPk($id);
		$RKS = Rks::model()->findByPk($Rincian->id_dokumen);
		$DokRKS = Dokumen::model()->findByPk($RKS->id_dokumen);
		$Peng = Pengadaan::model()->findByPk($DokRKS->id_pengadaan);
		if ($Peng->metode_pengadaan=="Penunjukan Langsung") {
			if($RKS->tipe_rks==1){
				if ($Rincian->nama_rincian=="Cover") {
//-------------------------------------------Cover
					$metode_pengadaan = strtoupper($Peng->metode_pengadaan);
					$nama_pengadaan = strtoupper($Peng->nama_pengadaan);
					$nomor_rks = $RKS->nomor;
					$tanggal_rks = Tanggal::getTanggalLengkap($DokRKS->tanggal);
					$this->doccy->newFile('RKS-Cover.docx');
					$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					$this->doccy->phpdocx->assign('#metode pengadaan#', $metode_pengadaan);
					$this->doccy->phpdocx->assign('#nomor rks#', $nomor_rks);
					$this->doccy->phpdocx->assign('#tanggal rks#', $tanggal_rks);
					$this->doccy->phpdocx->assign('#nama pengadaan#', $nama_pengadaan);
					$this->renderDocx("RKS-PL-B-Cover.docx", true);	
			
				} else if ($Rincian->nama_rincian=="Daftar Isi") {
					$this->doccy->newFile('PL-B-Daftar_Isi.docx');
					$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					$this->renderDocx("RKS-PL-B-Daftar_Isi.docx", true);
					
				} else if ($Rincian->nama_rincian=="Isi") {
				} else if ($Rincian->nama_rincian=="Lampiran 1") {
					$this->doccy->newFile('PL-B-Lamp_1.docx');
					$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					$this->renderDocx("RKS-PL-B-Lamp_1.docx", true);
				
				} else if ($Rincian->nama_rincian=="Lampiran 4") {
					$this->doccy->newFile('PL-B-Lamp_4.docx');
					$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					$this->renderDocx("RKS-PL-B-Lamp_4.docx", true);
				
				} else if ($Rincian->nama_rincian=="Lampiran 5") {
					$nama_pengadaan = strtoupper($Peng->nama_pengadaan);
					$nomor_rks = $RKS->nomor;
					$tanggal_rks = Tanggal::getTanggalLengkap($DokRKS->tanggal);
					
					$this->doccy->newFile('PL-B-Lamp_5.docx');
					$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					$this->doccy->phpdocx->assign('#nomor rks#', $nomor_rks);
					$this->doccy->phpdocx->assign('#tanggal rks#', $tanggal_rks);
					$this->doccy->phpdocx->assign('#nama pengadaan#', $nama_pengadaan);
					$this->renderDocx("RKS-PL-B-Lamp_5.docx", true);
				
				} else if ($Rincian->nama_rincian=="Lampiran 7") {
					$this->doccy->newFile('PL-B-Lamp_7.docx');
					$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					$this->renderDocx("RKS-PL-B-Lamp_7.docx", true);
				}
			} else if($RKS->tipe_rks==2){
				if ($Rincian->nama_rincian=="Cover") {
//-------------------------------------------Cover
					$metode_pengadaan = strtoupper($Peng->metode_pengadaan);
					$nama_pengadaan = strtoupper($Peng->nama_pengadaan);
					$nomor_rks = $RKS->nomor;
					$tanggal_rks = Tanggal::getTanggalLengkap($DokRKS->tanggal);
					$this->doccy->newFile('RKS-Cover.docx');
					$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					$this->doccy->phpdocx->assign('#metode pengadaan#', $metode_pengadaan);
					$this->doccy->phpdocx->assign('#nomor rks#', $nomor_rks);
					$this->doccy->phpdocx->assign('#tanggal rks#', $tanggal_rks);
					$this->doccy->phpdocx->assign('#nama pengadaan#', $nama_pengadaan);
					$this->renderDocx("RKS-PL-B&J-Cover.docx", true);
					
				} else if ($Rincian->nama_rincian=="Daftar Isi") {
					$this->doccy->newFile('PL-BJ-Daftar_Isi.docx');
					$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					$this->renderDocx("RKS-PL-B&J-Daftar_Isi.docx", true);
				
				} else if ($Rincian->nama_rincian=="Isi") {
				} else if ($Rincian->nama_rincian=="Lampiran 1") {
					$this->doccy->newFile('PL-BJ-Lamp_1.docx');
					$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					$this->renderDocx("RKS-PL-B&J-Lamp_1.docx", true);
				
				} else if ($Rincian->nama_rincian=="Lampiran 4") {
					$this->doccy->newFile('PL-BJ-Lamp_4.docx');
					$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					$this->renderDocx("RKS-PL-B&J-Lamp_4.docx", true);
					
				} else if ($Rincian->nama_rincian=="Lampiran 5") {
					$nama_pengadaan = strtoupper($Peng->nama_pengadaan);
					$nomor_rks = $RKS->nomor;
					$tanggal_rks = Tanggal::getTanggalLengkap($DokRKS->tanggal);
					
					$this->doccy->newFile('PL-BJ-Lamp_5.docx');
					$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					$this->doccy->phpdocx->assign('#nomor rks#', $nomor_rks);
					$this->doccy->phpdocx->assign('#tanggal rks#', $tanggal_rks);
					$this->doccy->phpdocx->assign('#nama pengadaan#', $nama_pengadaan);
					$this->renderDocx("RKS-PL-B&J-Lamp_5.docx", true);
					
				} else if ($Rincian->nama_rincian=="Lampiran 7") {
					$this->doccy->newFile('PL-BJ-Lamp_7.docx');
					$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					$this->renderDocx("RKS-PL-B&J-Lamp_7.docx", true);
				}
			}  else if($RKS->tipe_rks==3){
				if ($Rincian->nama_rincian=="Cover") {
//-------------------------------------------Cover
					$metode_pengadaan = strtoupper($Peng->metode_pengadaan);
					$nama_pengadaan = strtoupper($Peng->nama_pengadaan);
					$nomor_rks = $RKS->nomor;
					$tanggal_rks = Tanggal::getTanggalLengkap($DokRKS->tanggal);
					$this->doccy->newFile('RKS-Cover.docx');
					$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					$this->doccy->phpdocx->assign('#metode pengadaan#', $metode_pengadaan);
					$this->doccy->phpdocx->assign('#nomor rks#', $nomor_rks);
					$this->doccy->phpdocx->assign('#tanggal rks#', $tanggal_rks);
					$this->doccy->phpdocx->assign('#nama pengadaan#', $nama_pengadaan);
					$this->renderDocx("RKS-PL-J-Cover.docx", true);
					
				} else if ($Rincian->nama_rincian=="Daftar Isi") {
					$this->doccy->newFile('PL-J-Daftar_Isi.docx');
					$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					$this->renderDocx("RKS-PL-J-Daftar_Isi.docx", true);
				
				} else if ($Rincian->nama_rincian=="Isi") {
				} else if ($Rincian->nama_rincian=="Lampiran 1") {
					$this->doccy->newFile('PL-J-Lamp_1.docx');
					$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					$this->renderDocx("RKS-PL-J-Lamp_1.docx", true);
				}
			} 
		} else if ($Peng->metode_pengadaan=="Pemilihan Langsung") {
			if($RKS->tipe_rks==1){
				if ($Rincian->nama_rincian=="Cover") {
//-------------------------------------------Cover
					$metode_pengadaan = strtoupper($Peng->metode_pengadaan);
					$nama_pengadaan = strtoupper($Peng->nama_pengadaan);
					$nomor_rks = $RKS->nomor;
					$tanggal_rks = Tanggal::getTanggalLengkap($DokRKS->tanggal);
					$this->doccy->newFile('RKS-Cover.docx');
					$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					$this->doccy->phpdocx->assign('#metode pengadaan#', $metode_pengadaan);
					$this->doccy->phpdocx->assign('#nomor rks#', $nomor_rks);
					$this->doccy->phpdocx->assign('#tanggal rks#', $tanggal_rks);
					$this->doccy->phpdocx->assign('#nama pengadaan#', $nama_pengadaan);
					$this->renderDocx("RKS-PM-B-Cover.docx", true);
					
				} else if ($Rincian->nama_rincian=="Daftar Isi") {
					$this->doccy->newFile('PM-B-Daftar_Isi.docx');
					$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					$this->renderDocx("RKS-PM-B-Daftar_Isi.docx", true);
					
				} else if ($Rincian->nama_rincian=="Isi") {
					$nama_pengadaan = $Peng->nama_pengadaan;
					$nomor_rks = $RKS->nomor;
					$tanggal_rks = Tanggal::getTanggalLengkap($DokRKS->tanggal);
					
					$this->doccy->newFile('PM-B-Isi.docx');
					$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					$this->doccy->phpdocx->assignToHeader('#nomor rks#', $nomor_rks);
					$this->doccy->phpdocx->assignToHeader('#tanggal rks#', $tanggal_rks);
					$this->doccy->phpdocx->assign('#nama pengadaan#', $nama_pengadaan);
					$this->renderDocx("RKS-PM-B-Isi.docx", true);
				
				} else if ($Rincian->nama_rincian=="Lampiran 1") {
					$this->doccy->newFile('PM-B-Lamp_1.docx');
					$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					$this->renderDocx("RKS-PM-B-Lamp_1.docx", true);
				
				} else if ($Rincian->nama_rincian=="Lampiran 4") {
					$this->doccy->newFile('PM-B-Lamp_4.docx');
					$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					$this->renderDocx("RKS-PM-B-Lamp_4.docx", true);
				
				} else if ($Rincian->nama_rincian=="Lampiran 5") {
					$nama_pengadaan = strtoupper($Peng->nama_pengadaan);
					$nomor_rks = $RKS->nomor;
					$tanggal_rks = Tanggal::getTanggalLengkap($DokRKS->tanggal);
					
					$this->doccy->newFile('PM-B-Lamp_5.docx');
					$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					$this->doccy->phpdocx->assign('#nomor rks#', $nomor_rks);
					$this->doccy->phpdocx->assign('#tanggal rks#', $tanggal_rks);
					$this->doccy->phpdocx->assign('#nama pengadaan#', $nama_pengadaan);
					$this->renderDocx("RKS-PM-B-Lamp_5.docx", true);
				
				} else if ($Rincian->nama_rincian=="Lampiran 7") {
					$this->doccy->newFile('PM-B-Lamp_7.docx');
					$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					$this->renderDocx("RKS-PM-B-Lamp_7.docx", true);
				}
			} else if($RKS->tipe_rks==2){
				if ($Rincian->nama_rincian=="Cover") {
//-------------------------------------------Cover
					$metode_pengadaan = strtoupper($Peng->metode_pengadaan);
					$nama_pengadaan = strtoupper($Peng->nama_pengadaan);
					$nomor_rks = $RKS->nomor;
					$tanggal_rks = Tanggal::getTanggalLengkap($DokRKS->tanggal);
					$this->doccy->newFile('RKS-Cover.docx');
					$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					$this->doccy->phpdocx->assign('#metode pengadaan#', $metode_pengadaan);
					$this->doccy->phpdocx->assign('#nomor rks#', $nomor_rks);
					$this->doccy->phpdocx->assign('#tanggal rks#', $tanggal_rks);
					$this->doccy->phpdocx->assign('#nama pengadaan#', $nama_pengadaan);
					$this->renderDocx("RKS-PM-B&J-Cover.docx", true);
					
				} else if ($Rincian->nama_rincian=="Daftar Isi") {
					$this->doccy->newFile('PM-BJ-Daftar_Isi.docx');
					$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					$this->renderDocx("RKS-PM-B&J-Daftar_Isi.docx", true);
					
				} else if ($Rincian->nama_rincian=="Isi") {
				} else if ($Rincian->nama_rincian=="Lampiran 1") {
					$this->doccy->newFile('PM-BJ-Lamp_1.docx');
					$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					$this->renderDocx("RKS-PM-B&J-Lamp_1.docx", true);
				
				} else if ($Rincian->nama_rincian=="Lampiran 4") {
					$this->doccy->newFile('PM-BJ-Lamp_4.docx');
					$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					$this->renderDocx("RKS-PM-B&J-Lamp_4.docx", true);
					
				} else if ($Rincian->nama_rincian=="Lampiran 5") {
					$nama_pengadaan = strtoupper($Peng->nama_pengadaan);
					$nomor_rks = $RKS->nomor;
					$tanggal_rks = Tanggal::getTanggalLengkap($DokRKS->tanggal);
					
					$this->doccy->newFile('PM-BJ-Lamp_5.docx');
					$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					$this->doccy->phpdocx->assign('#nomor rks#', $nomor_rks);
					$this->doccy->phpdocx->assign('#tanggal rks#', $tanggal_rks);
					$this->doccy->phpdocx->assign('#nama pengadaan#', $nama_pengadaan);
					$this->renderDocx("RKS-PM-B&J-Lamp_5.docx", true);
				
				} else if ($Rincian->nama_rincian=="Lampiran 7") {
					$this->doccy->newFile('PM-BJ-Lamp_7.docx');
					$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					$this->renderDocx("RKS-PM-B&J-Lamp_7.docx", true);
				}
			}  else if($RKS->tipe_rks==3){
				if ($Rincian->nama_rincian=="Cover") {
//-------------------------------------------Cover
					$metode_pengadaan = strtoupper($Peng->metode_pengadaan);
					$nama_pengadaan = strtoupper($Peng->nama_pengadaan);
					$nomor_rks = $RKS->nomor;
					$tanggal_rks = Tanggal::getTanggalLengkap($DokRKS->tanggal);
					$this->doccy->newFile('RKS-Cover.docx');
					$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					$this->doccy->phpdocx->assign('#metode pengadaan#', $metode_pengadaan);
					$this->doccy->phpdocx->assign('#nomor rks#', $nomor_rks);
					$this->doccy->phpdocx->assign('#tanggal rks#', $tanggal_rks);
					$this->doccy->phpdocx->assign('#nama pengadaan#', $nama_pengadaan);
					$this->renderDocx("RKS-PM-J-Cover.docx", true);
					
				} else if ($Rincian->nama_rincian=="Daftar Isi") {
					$this->doccy->newFile('PM-J-Daftar_Isi.docx');
					$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					$this->renderDocx("RKS-PM-J-Daftar_Isi.docx", true);
				
				} else if ($Rincian->nama_rincian=="Isi") {
				} else if ($Rincian->nama_rincian=="Lampiran 1") {
					$this->doccy->newFile('PM-J-Lamp_1.docx');
					$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					$this->renderDocx("RKS-PM-J-Lamp_1.docx", true);
				}
			}
		}
	}
	
	public function actionDownload()
	{
		$id = Yii::app()->getRequest()->getQuery('id');	
		
		// $this->redirect(array('site/dashboard'));
	
		$Dok=Dokumen::model()->findByPk($id);
		$Peng=Pengadaan::model()->findByPk($Dok->id_pengadaan);
	
//	=====================================Nota Dinas=====================================
		if ($Dok->nama_dokumen == "Nota Dinas Perintah Pengadaan"){
			$NDPP=NotaDinasPerintahPengadaan::model()->findByPk($id);
			$tanggalsurat = Tanggal::getTanggalLengkap($Dok->tanggal);
			$nomor = $NDPP->nomor;
			$dari = $NDPP->dari;
			if($dari == "MSDAF"){
				$tes = Kdivmum::model()->find('jabatan = "MSDAF"');
			} else {
				$tes = Kdivmum::model()->find('jabatan = "KDIVMUM"');
			}
			$namapengirim= User::model()->findByPk($tes->username)->nama;
			$kepada = $NDPP->kepada;
			$perihal = $NDPP->perihal;
			$anggaran = RupiahMaker::convertInt($NDPP->pagu_anggaran);
			$sumber = $NDPP->sumber_dana;
			$tanggal = Tanggal::getTanggalLengkap($Dok->tanggal);
			$DokNotaDinas= Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan. ' and nama_dokumen = "Nota Dinas Permintaan"');
			$NDP=NotaDinasPermintaan::model()->findByPk($DokNotaDinas->id_dokumen);
			$tanggalpermintaan = Tanggal::getTanggalLengkap($DokNotaDinas->tanggal);
			$nonotadinaspermintaan = $NDP->nomor;
			$perihalnotadinaspermintaan = $NDP->perihal;
			$target = $NDPP->targetSPK_kontrak;
			$metode = $Peng->metode_pengadaan;
			$user = $Peng->divisi_peminta;
			$nama = $Peng->nama_pengadaan;
			$panitia = Panitia::model()->findByPk($Peng->id_panitia);
			$namapanitia=$panitia->nama_panitia;
			if($panitia->jenis_panitia=="Pejabat"){
				$sekretaris = "";
			} else {
				$sekretaris = "- Sekretaris Panitia";
			}
			$this->doccy->newFile('1 nd-perintahpengadaan.docx');
			if ($dari == "KDIVMUM"){$tembusan = "MSDAF";}
			else {$tembusan = "KDIVMUM";}
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#nosurat#', $nomor);
			$this->doccy->phpdocx->assign('#nama ketua/pejabat#', $kepada);
			$this->doccy->phpdocx->assign('#pengirim surat#', $dari);
			$this->doccy->phpdocx->assign('#tanggal#', $tanggalsurat);
			$this->doccy->phpdocx->assign('#tanggalnotadinaspermintaan#', $tanggalpermintaan);
			$this->doccy->phpdocx->assign('#nonotadinaspermintaan#', $nonotadinaspermintaan);
			$this->doccy->phpdocx->assign('#perihalnotadinaspermintaan#', $perihalnotadinaspermintaan);
			$this->doccy->phpdocx->assign('#perihal#', $perihal);
			$this->doccy->phpdocx->assign('#anggaran#', $anggaran);
			$this->doccy->phpdocx->assign('#sumberdana#', $sumber);
			$this->doccy->phpdocx->assign('#panitia#', $namapanitia);
			$this->doccy->phpdocx->assign('#metode#', $metode);
			$this->doccy->phpdocx->assign('#targetspk#', $target);
			$this->doccy->phpdocx->assign('#tembusan#', $tembusan);
			$this->doccy->phpdocx->assign('#user#', $user);
			$this->doccy->phpdocx->assign('#sekretaris#', $sekretaris);
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->doccy->phpdocx->assign('#namapengirim#', $namapengirim);
			$this->renderDocx("Nota Dinas Perintah Pengadaan.docx", true);
		}
		else if ($Dok->nama_dokumen == "Nota Dinas Penetapan Pemenang"){
			
			$NDPP=NotaDinasPenetapanPemenang::model()->findByPk($id);	
			$nomor = $NDPP->nomor;
			$pemenang = $NDPP->nama_penyedia;
			$alamat = $NDPP->alamat;
			$NPWP = $NDPP->NPWP;
			$biaya = $NDPP->biaya;
			$metode = $Peng->metode_penawaran;
			if ($metode == "Satu Sampul"){
				$tanggal = Tanggal::getTanggalLengkap($Dok->tanggal);
				$DokBAE1=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Berita Acara Evaluasi Penawaran"');
				$BAE1 = BeritaAcaraEvaluasiPenawaran::model()->findByPk($DokBAE1->id_dokumen);
				$noBAE1 = $BAE1->nomor;
				$tglBAE1 = Tanggal::getTanggalLengkap($DokBAE1->tanggal);
				$noBAE2 = "-";
				$tglBAE2 = "-";
			}
			else if ($metode == "Dua Sampul"){
				$tanggal = Tanggal::getTanggalLengkap($Dok->tanggal);
				$DokBAE1=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Berita Acara Evaluasi Penawaran"');
				$BAE1 = BeritaAcaraEvaluasiPenawaran::model()->findByPk($DokBAE1->id_dokumen);
				$noBAE1 = $BAE1->nomor;
				$tglBAE1 = Tanggal::getTanggalLengkap($DokBAE1->tanggal);
				$DokBAE2=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Berita Acara Evaluasi Penawaran"');
				$BAE2 = BeritaAcaraEvaluasiPenawaran::model()->findByPk($DokBAE2->id_dokumen);
				$noBAE2 = $BAE2->nomor;
				$tglBAE2 = Tanggal::getTanggalLengkap($DokBAE2->tanggal);
			}
			$tanggal = Tanggal::getTanggalLengkap($Dok->tanggal);
			
			$dokndpp2=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Nota Dinas Perintah Pengadaan"');
			$ndpp2 = NotaDinasPerintahPengadaan::model()->findByPk($dokndpp2->id_dokumen);

			$nondpp = $ndpp2->nomor;
			$tanggalndpp = $dokndpp2->tanggal;
			$nama = $Peng->nama_pengadaan;
			$terbilang = RupiahMaker::terbilangMaker($biaya);
			
			$this->doccy->newFile('14 Nota Dinas Penetapan Pemenang.docx');
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
		
			$this->doccy->phpdocx->assign('#nomor#', $nomor);
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#sifat#', 'Biasa');
			$this->doccy->phpdocx->assign('#nondpp#', $nondpp);
			$this->doccy->phpdocx->assign('#tanggalndpp#', $tanggalndpp);
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->doccy->phpdocx->assign('#noBAEsampul1#', $noBAE1);
			$this->doccy->phpdocx->assign('#noBAEsampul2#', $noBAE2);
			$this->doccy->phpdocx->assign('#tanggalBAEsampul1#', $tglBAE1);
			$this->doccy->phpdocx->assign('#tanggalBAEsampul2#', $tglBAE2);
			$this->doccy->phpdocx->assign('#penyedia#', $pemenang);
			$this->doccy->phpdocx->assign('#alamatpenyedia#', $alamat);
			$this->doccy->phpdocx->assign('#NPWP#', $NPWP);
			$this->doccy->phpdocx->assign('#biaya#', $biaya);
			$this->doccy->phpdocx->assign('#terbilang#', $terbilang);
			$this->renderDocx("Nota Dinas Penetapan Pemenang.docx", true);
	
		}
		else if ($Dok->nama_dokumen == "Nota Dinas Usulan Pemenang"){
			
			$NDUP=NotaDinasUsulanPemenang::model()->findByPk($id);	

			$metode = $Peng->metode_pengadaan;
			
			if (($metode == "Pemilihan Langsung")||($metode == "Pelelangan")){
			$this->doccy->newFile('13 Nota Dinas Usulan Pemenang(lelang-pilih).docx');
			}
			else{
			$this->doccy->newFile('13 Nota Dinas Usulan Pemenang(tunjuk).docx');
			}
			$nama = $Peng->nama_pengadaan;

			$pemenang = $NDUP->nama_penyedia;
			$alamat = $NDUP->alamat;
			$NPWP = $NDUP->NPWP;
			$biaya = $NDUP->biaya;
			$terbilang = RupiahMaker::terbilangMaker($biaya);
				
			$pemenang2 = $NDUP->nama_penyedia;
			$alamat2 = $NDUP->alamat;
			$NPWP2 = $NDUP->NPWP;
			$biaya2 = $NDUP->biaya;
			$terbilang2 = RupiahMaker::terbilangMaker($biaya2);
			
			$nomor = $NDUP->nomor;

			$dari = $NDUP->dari;

			$tanggal = Tanggal::getTanggalLengkap($Dok->tanggal);
			$waktu = Tanggal::getTanggalLengkap($NDUP->waktu_pelaksanaan);
			$tempat = $NDUP->tempat_penyerahan;
			
			if(($metode == "Pelelangan")||($metode == "Pemilihan Langsung")){
				$this->doccy->newFile('13 Nota Dinas Usulan Pemenang(lelang-pilih).docx');
			}
			else{
				$this->doccy->newFile('13 Nota Dinas Usulan Pemenang(tunjuk).docx');
			}

			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
		
		
			$this->doccy->phpdocx->assign('#nomor#', $nomor);
			// $this->doccy->phpdocx->assign('#dari#', $dari);
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->doccy->phpdocx->assign('#penyedia#', $pemenang);
			$this->doccy->phpdocx->assign('#alamatpenyedia#', $alamat);
			$this->doccy->phpdocx->assign('#NPWP#', $NPWP);
			$this->doccy->phpdocx->assign('#biaya#', $biaya);
			$this->doccy->phpdocx->assign('#terbilang#', $terbilang);
			$this->doccy->phpdocx->assign('#penyedia2#', $pemenang2);
			$this->doccy->phpdocx->assign('#alamatpenyedia2#', $alamat2);
			$this->doccy->phpdocx->assign('#NPWP2#', $NPWP2);
			$this->doccy->phpdocx->assign('#biaya2#', $biaya2);
			$this->doccy->phpdocx->assign('#terbilang2#', $terbilang2);

			$this->doccy->phpdocx->assign('#waktupelaksanaan#', $waktu);
			$this->doccy->phpdocx->assign('#tempatpenyerahan#', $tempat);

			$this->doccy->phpdocx->assign('#metode#', $metode);
			$this->renderDocx("Nota Dinas Usulan Pemenang.docx", true);
		}
		/*else if ($Dok->nama_dokumen == "Nota Dinas Pemberitahuan Pemenang"){
			$this->doccy->newFile('nd-pemberitahuanpemenang.docx');
			$NDPP=NotaDinasPemberitahuanPemenang::model()->findByPk($id);	
			$nomor = $NDPP->nomor;
			$dari = $NDPP->dari;
			$pemenang = $NDPP->nama_penyedia;
			$alamat = $NDPP->alamat;
			$NPWP = $NDPP->NPWP;
			$biaya = $NDPP->biaya;
			$tanggal = $Dok->tanggal;
			$waktu = $NDPP->waktu_pelaksanaan;
			$tempat = $NDPP->tempat_penyerahan;
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#1#', '.............................................');
			$this->doccy->phpdocx->assign('#2#', '.............................................');
			$this->doccy->phpdocx->assign('#3#', '.............................................');
			$this->doccy->phpdocx->assign('#4#', '.............................................');
			$this->doccy->phpdocx->assign('#5#', '.............................................');
			$this->doccy->phpdocx->assign('#6#', '.............................................');
			$this->doccy->phpdocx->assign('#7#', '.............................................');
			$this->doccy->phpdocx->assign('#8#', '.............................................');
			$this->doccy->phpdocx->assign('#9#', '.............................................');
			$this->doccy->phpdocx->assign('#10#', '.............................................');
			$this->doccy->phpdocx->assign('#11#', '.............................................');
			$this->doccy->phpdocx->assign('#12#', '.............................................');
			$this->doccy->phpdocx->assign('#13#', '.............................................');
			$this->doccy->phpdocx->assign('#14#', '.............................................');
			$this->doccy->phpdocx->assign('#15#', '.............................................');
			$this->doccy->phpdocx->assign('#16#', '.............................................');
			$this->doccy->phpdocx->assign('#17#', '.............................................');
			$this->renderDocx("Nota Dinas Pemberitahuan Pemenang.docx", true);
		}*/
		else if ($Dok->nama_dokumen == "Nota Dinas Permintaan TOR/RAB"){
			$NDPTR=NotaDinasPermintaanTorRab::model()->findByPk($id);
			$tanggalsurat = Tanggal::getTanggalLengkap($Dok->tanggal);
			$nomor = $NDPTR->nomor;
			$kepada = $NDPTR->divisi_peminta;
			$permintaan = $NDPTR->permintaan;
			$namapengadaan = $NDPTR->nama_pengadaan;
			$notadinaspermintaan = $NDPTR->nota_dinas_permintaan;
			$tanggalpermintaan = $NDPTR->tanggal_nota_dinas_permintaan;
			$perihalpermintaan = $NDPTR->perihal_permintaan;
			$namakadiv = User::model()->findByPk(kdivmum::model()->find('jabatan = "KDIVMUM"')->username)->nama;
			
			$this->doccy->newFile('0 Nota Dinas permintaan TOR RAB.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#nomor#', $nomor);
			$this->doccy->phpdocx->assign('#tanggal#', $tanggalsurat);
			$this->doccy->phpdocx->assign('#kepada#', $kepada);
			$this->doccy->phpdocx->assign('#permintaan#', $permintaan);
			$this->doccy->phpdocx->assign('#namapengadaan#', $namapengadaan);
			$this->doccy->phpdocx->assign('#notadinaspermintaan#', $notadinaspermintaan);
			$this->doccy->phpdocx->assign('#tanggalpermintaan#', $tanggalpermintaan);
			$this->doccy->phpdocx->assign('#perihalpermintaan#', $perihalpermintaan);
			$this->doccy->phpdocx->assign('#nama#', $namakadiv);
			$this->renderDocx("Nota Dinas Permintaan TOR RAB.docx", true);
		}
//	=====================================Surat-Surat=====================================
		else if ($Dok->nama_dokumen == "Surat Undangan Pengambilan Dokumen Pengadaan"){
			
			$SUPDP=SuratUndanganPengambilanDokumenPengadaan::model()->findByPk($id);	
			$ketua = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Ketua"')->username)->nama;
			$nomor = $SUPDP->nomor;
			$tanggal = Tanggal::getTanggalLengkap($Dok->tanggal);
			$tempat = $Dok->tempat;
			$kepada = $Peng->nama_penyedia;
			// $perihal = $SUPDP->perihal;
			$tanggalambil = Tanggal::getTanggalLengkap($SUPDP->tanggal_pengambilan);
			$waktuambil = Tanggal::getJamMenit($SUPDP->waktu_pengambilan);
			$tempatambil = $SUPDP->tempat_pengambilan;
			
			$nama = $Peng->nama_pengadaan;
			$dokrks=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "RKS"');
			$tanggalrks=Tanggal::getTanggalLengkap($dokrks->tanggal);
			$rks=Rks::model()->findByPk($dokrks->id_dokumen);	
			$norks = $rks->nomor;
			$tanggalpenjelasan = Tanggal::getTanggalLengkap($rks->tanggal_penjelasan);
			$waktupenjelasan = Tanggal::getJamMenit($rks->waktu_penjelasan);
			
			$this->doccy->newFile('7 Surat Pemberitahuan Pengadaan.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
		
			$this->doccy->phpdocx->assign('#nomor#', $nomor);
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#tanggalrks#', $tanggalrks);
			$this->doccy->phpdocx->assign('#norks#', $norks);
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->doccy->phpdocx->assign('#tanggalambil#', $tanggalambil);
			$this->doccy->phpdocx->assign('#waktuambil#', $waktuambil);
			$this->doccy->phpdocx->assign('#tempatambil#', $tempatambil);
			$this->doccy->phpdocx->assign('#tanggalpenjelasan#', $tanggalpenjelasan);
			$this->doccy->phpdocx->assign('#waktupenjelasan#', $waktupenjelasan);
			$this->doccy->phpdocx->assign('#ketua#', $ketua);
			$this->renderDocx("Surat Undangan Pengambilan Dokumen Pengadaan.docx", true);
		}
/*Belum ada template*/		/*else if ($Dok->nama_dokumen == "Surat Undangan Pembukaan Penawaran"){
			
			$this->doccy->newFile('temp.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#1#', '.............................................');
			$this->doccy->phpdocx->assign('#2#', '.............................................');
			$this->doccy->phpdocx->assign('#3#', '.............................................');
			$this->doccy->phpdocx->assign('#4#', '.............................................');
			$this->doccy->phpdocx->assign('#5#', '.............................................');
			$this->doccy->phpdocx->assign('#6#', '.............................................');
			$this->doccy->phpdocx->assign('#7#', '.............................................');
			$this->doccy->phpdocx->assign('#8#', '.............................................');
			$this->doccy->phpdocx->assign('#9#', '.............................................');
			$this->doccy->phpdocx->assign('#10#', '.............................................');
			$this->doccy->phpdocx->assign('#11#', '.............................................');
			$this->doccy->phpdocx->assign('#12#', '.............................................');
			$this->doccy->phpdocx->assign('#13#', '.............................................');
			$this->doccy->phpdocx->assign('#14#', '.............................................');
			$this->doccy->phpdocx->assign('#15#', '.............................................');
			$this->doccy->phpdocx->assign('#16#', '.............................................');
			$this->doccy->phpdocx->assign('#17#', '.............................................');
			$this->renderDocx("Surat Undangan Pembukaan Penawaran.docx", true);
		}*/
/*Belum ada template*/		/*else if ($Dok->nama_dokumen == "Surat Undangan Negosiasi dan Klarifikasi"){
			
			$this->doccy->newFile('temp.docx');
			
		$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
		$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#1#', '.............................................');
			$this->doccy->phpdocx->assign('#2#', '.............................................');
			$this->doccy->phpdocx->assign('#3#', '.............................................');
			$this->doccy->phpdocx->assign('#4#', '.............................................');
			$this->doccy->phpdocx->assign('#5#', '.............................................');
			$this->doccy->phpdocx->assign('#6#', '.............................................');
			$this->doccy->phpdocx->assign('#7#', '.............................................');
			$this->doccy->phpdocx->assign('#8#', '.............................................');
			$this->doccy->phpdocx->assign('#9#', '.............................................');
			$this->doccy->phpdocx->assign('#10#', '.............................................');
			$this->doccy->phpdocx->assign('#11#', '.............................................');
			$this->doccy->phpdocx->assign('#12#', '.............................................');
			$this->doccy->phpdocx->assign('#13#', '.............................................');
			$this->doccy->phpdocx->assign('#14#', '.............................................');
			$this->doccy->phpdocx->assign('#15#', '.............................................');
			$this->doccy->phpdocx->assign('#16#', '.............................................');
			$this->doccy->phpdocx->assign('#17#', '.............................................');
			$this->renderDocx("Surat Undangan Negosiasi.docx", true);
		}*/
		else if ($Dok->nama_dokumen == "Surat Undangan Aanwijzing") {
			
			$SUP=SuratUndanganPenjelasan::model()->findByPk($id);
			$nomor = $SUP->nomor;
			$tanggal = Tanggal::getTanggalLengkap($Dok->tanggal);
			$tempat = $Dok->tempat;
			$waktu = Tanggal::getJamMenit($SUP->waktu);
			$nama = $Peng->nama_pengadaan;
			$perihal = $SUP->perihal;
			
			$this->doccy->newFile('8 Surat Undangan Aanwijzing.docx');
			$this->doccy->phpdocx->assignToHeader("#HEADER1#","");
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#","");
			
			if(Panitia::model()->findByPk($Peng->id_panitia)->jumlah_anggota == 1){
				$ketua = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Ketua"')->username)->nama;
				// $this->doccy->phpdocx->assign('#ketua#', $ketua);
				// $listPanitiaTanpaKetua = $this->getListPanitiaTanpaKetua(3);
				
				// $this->doccy->phpdocx->assign('#listPanitiaTanpaKetua#', $listPanitiaTanpaKetua);
			}
			else{
				$ketua = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Ketua"')->username)->nama;
				$listPanitiaTanpaKetua = $this->getListPanitiaTanpaKetua($Peng->id_panitia);
				
				$this->doccy->phpdocx->assign('#listPanitiaTanpaKetua#', $listPanitiaTanpaKetua);
				// $sekretaris = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Sekretaris"')->username)->nama;
				// $anggota1 = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Anggota"')->username)->nama;
				
				// $this->doccy->phpdocx->assign('#ketua#', $ketua);
				// $this->doccy->phpdocx->assign('#sekretaris#', $sekretaris);
				// $this->doccy->phpdocx->assign('#anggota1#', $anggota1);				
			}
			// $ketua = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Ketua"')->username)->nama;
			// $sekretaris = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Sekretaris"')->username)->nama;
			// $anggota1 = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Anggota"')->username)->nama;
			$dokrks=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "RKS"');
			$rks=Rks::model()->findByPk($dokrks->id_dokumen);	
			$norks = $rks->nomor;
			$hari = Tanggal::getHari($tanggal);
			
			$dokNDPP=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Nota Dinas Perintah Pengadaan"');
			$NDPP=NotaDinasPerintahPengadaan::model()->findByPk($dokNDPP->id_dokumen);	
			
			$nomorNdPerintahPengadaan = $NDPP->nomor;
			$tanggalNdPerintahPengadaan = Tanggal::getTanggalLengkap($dokNDPP->tanggal);
			$perihalNdPerintahPengadaan = $NDPP->perihal;
									
			$this->doccy->phpdocx->assign('#nomor#', $nomor);
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#norks#', $norks);
			// $this->doccy->phpdocx->assign('#acara#', '..........');
			$this->doccy->phpdocx->assign('#pekerjaan#', $nama);
			$this->doccy->phpdocx->assign('#perihal#', $perihal);
			$this->doccy->phpdocx->assign('#hari#', $hari);
			$this->doccy->phpdocx->assign('#nama#', $nama);
			$this->doccy->phpdocx->assign('#waktu#', $waktu);
			$this->doccy->phpdocx->assign('#tempat#', $tempat);
			$this->doccy->phpdocx->assign('#ketua#', $ketua);
			// $this->doccy->phpdocx->assign('#sekretaris#', $sekretaris);
			// $this->doccy->phpdocx->assign('#anggota1#', $anggota1);
			$this->doccy->phpdocx->assign('#nomorNdPerintahPengadaan#', $nomorNdPerintahPengadaan);
			$this->doccy->phpdocx->assign('#tanggalNdPerintahPengadaan#', $tanggalNdPerintahPengadaan);
			$this->doccy->phpdocx->assign('#perihalNdPerintahPengadaan#', $perihalNdPerintahPengadaan);						
			
			$this->renderDocx("Surat Undangan Penjelasan.docx", true);

		}
		else if ($Dok->nama_dokumen == "Surat Pernyataan Minat"){
			
			
			$SPM=SuratPernyataanMinat::model()->findByPk($id);
			$nama = $Peng->nama_pengadaan;
			$namakapital = strtoupper($nama);
			$tahun = Tanggal::getTahun($Peng->tanggal_masuk);
			$tempat = $Dok->tempat;
			
			$this->doccy->newFile('5b Surat Pernyataan Minat.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->doccy->phpdocx->assign('#namapengadaankapital#', $namakapital);
			$this->doccy->phpdocx->assign('#kota#', $tempat);
			$this->doccy->phpdocx->assign('#tahun#', $tahun);
			$this->renderDocx("Surat Pernyataan Minat.docx", true);
		}
		/*else if ($Dok->nama_dokumen == "Surat Pemberitahuan Pengadaan"){
			
			$SPP=SuratPemberitahuanPengadaan::model()->findByPk($id);	
			$nomor = $SPP->nomor;
			$tanggal = $Dok->tanggal;
			$tempat = $Dok->tempat;
			$kepada = $Peng->nama_penyedia;
			$perihal = $SPP->perihal;
			$nama = $Peng->nama_pengadaan;
				
			$this->doccy->newFile('s-upemberitahuanpengadaan.docx');
			
		$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
		$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
		
			$this->doccy->phpdocx->assign('#1#', $nomor);
			$this->doccy->phpdocx->assign('#2#', '.............................................');
			$this->doccy->phpdocx->assign('#3#', $tanggal);
			$this->doccy->phpdocx->assign('#4#', $kepada);
			$this->doccy->phpdocx->assign('#5#', $nama);
			$this->doccy->phpdocx->assign('#6#', $perihal);
			$this->renderDocx("Surat Pemberitahuan Pengadaan.docx", true);
		}*/
		else if ($Dok->nama_dokumen == "Surat Pengantar Penawaran Harga"){
		
		$this->doccy->newFile('5c Surat Pengantar Penawaran Harga.docx');
			
		$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
		$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
		
		$this->renderDocx("Surat Pengantar Penawaran Harga.docx", true);
		}
		else if ($Dok->nama_dokumen == "Surat Undangan Permintaan Penawaran Harga"){
			
			$SUPH=SuratUndanganPermintaanPenawaranHarga::model()->findByPk($id);
			$dokrks=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "RKS"');
			$rks=Rks::model()->findByPk($dokrks->id_dokumen);	
			
			$dokhps=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "HPS"');
			$hps=Hps::model()->findByPk($dokhps->id_dokumen);	
			
			$nomor = $SUPH->nomor;
			$tanggal = " " . Tanggal::getTanggalLengkap($Dok->tanggal);
			// $lingkup = $SUPH->lingkup_kerja;
			$waktukerja = $SUPH->waktu_kerja;
			$masa = $rks->lama_berlaku_penawaran;
			// $lingkup = $SUPH->lingkup_kerja;
			$tempat = $SUPH->tempat_penyerahan;
			$nama = $Peng->nama_pengadaan;
			$tanggalpenawaran = Tanggal::getTanggalLengkap($rks->tanggal_akhir_pemasukan_penawaran1);
			$waktupenawaran = Tanggal::getJamMenit($rks->waktu_pemasukan_penawaran1);
			
			$terbilang = RupiahMaker::terbilangMaker($masa);
			
			// $norks = $rks -> nomor;
			// $nohps = $hps -> nomor;
			// $tglrks = Tanggal::getTanggalLengkap($dokrks -> tanggal);
			$dokNDPP=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Nota Dinas Perintah Pengadaan"');
			$NDPP=NotaDinasPerintahPengadaan::model()->findByPk($dokNDPP->id_dokumen);	
			$dari= $NDPP->dari;
						
			if($dari=='KDIVMUM'){
				$namakadiv = User::model()->findByPk(kdivmum::model()->find('jabatan = "KDIVMUM"')->username)->nama;
			}else if($dari=='MSDAF'){
				$namakadiv = User::model()->findByPk(kdivmum::model()->find('jabatan = "MSDAF"')->username)->nama;
			}
			$this->doccy->newFile('6 Surat Undangan Penawaran Harga.docx');
			
		$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
		$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
		
			$this->doccy->phpdocx->assign('#nomor#', $nomor);
			$this->doccy->phpdocx->assign('#bulan#', $masa);
			$this->doccy->phpdocx->assign('#terbilangbulan#', $terbilang);
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			// $this->doccy->phpdocx->assign('#RKS#', $norks);
			// $this->doccy->phpdocx->assign('#HPS#', $nohps);
			// $this->doccy->phpdocx->assign('#tglRKS#', $tglrks);
			
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->doccy->phpdocx->assign('#tanggalpenawaran#', $tanggalpenawaran);
			$this->doccy->phpdocx->assign('#waktupenawaran#', $waktupenawaran);
			$this->doccy->phpdocx->assign('#waktupengerjaan#', $waktukerja);
			$this->doccy->phpdocx->assign('#tempatpenyerahan#', $tempat);
			
			
			$this->doccy->phpdocx->assign('#namaKDIVMUM/MSDAF#', $namakadiv);
			$this->renderDocx("Surat Undangan Permintaan Penawaran Harga.docx", true);
		}
		else if ($Dok->nama_dokumen == "Form Isian Kualifikasi"){
		
		$nama = strtoupper($Peng->nama_pengadaan);
		$tahun = Tanggal::getTahun($Peng->tanggal_masuk);
			
		$this->doccy->newFile('5d Form Isian Kualifikasi.docx');
			
		$this->doccy->phpdocx->assign('#nama pengadaan#', $nama);
		$this->doccy->phpdocx->assign('#tahun#', $tahun);
		$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
		$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
		
		$this->renderDocx("Form Isian Kualifikasi.docx", true);
		}
		else if ($Dok->nama_dokumen == "Surat Penunjukan Pemenang"){
			
			$SPP=SuratPenunjukanPemenang::model()->findByPk($id);	
			$nomor = $SPP->nomor;
			$penyedia = $SPP->nama_penyedia;
			$biaya = $SPP->harga;
			$biayaterbilang = RupiahMaker::TerbilangMaker($biaya);
			$jaminan = $SPP->jaminan;
			$jaminanterbilang = RupiahMaker::TerbilangMaker($jaminan);
			$lama = $SPP->lama_penyerahan;
			$lamaterbilang = RupiahMaker::TerbilangMaker($lama);
			$tanggal = Tanggal::getTanggalLengkap($Dok->tanggal);
			$tempat = $Dok->tempat;
			$perihal = $SPP->perihal;
			$nama = $Peng->nama_pengadaan;
			$metode = $Peng->metode_pengadaan;
			
			// $doksupph=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Surat Undangan Permintaan Penawaran Harga"');
			// $supph = SuratUndanganPermintaanPenawaranHarga::model()->findByPk($doksupph->id_dokumen);
			// $nosupph = $supph->nomor;
			// $tglsupph = $doksupph->tanggal;
			
			// $dokspph=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Surat Pengantar Penawaran Harga"');
			// $spph = SuratUndanganPermintaanPenawaranHarga::model()->findByPk($dokspph->id_dokumen);
			// $nospph = $spph->nomor;
			// $tglspph = $dokspph->tanggal;
			
			// $dokspp=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Surat Pengumuman Pemenang"');
			// $spp = SuratUndanganPermintaanPenawaranHarga::model()->findByPk($dokspp->id_dokumen);
			// $nospp = $spp->nomor;
			// $tglspp = $dokspp->tanggal;
			
			if ($metode == "Penunjukan Langsung"){
				$this->doccy->newFile('15 Surat Penunjukan Pemenang (Tunjuk).docx');
			}
			else if($metode == "Pemilihan Langsung"){
				$this->doccy->newFile('15 Surat Penunjukan Pemenang (Pilih).docx');
			}
			else if($metode == "Pelelangan"){
				$noski = $SPP->no_ski;
				$nomorski = $SPP->nomor_ski;
				$tglski = $SPP->tanggal_ski;
				
				$this->doccy->newFile('15 Surat Penunjukan Pemenang (Lelang).docx');
				
				$this->doccy->phpdocx->assign('#noski#', $noski);
				$this->doccy->phpdocx->assign('#tglski#', $tglski);
				$this->doccy->phpdocx->assign('#nomorski#', $nomorski);
			}
			
		$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
		$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
		
			$this->doccy->phpdocx->assign('#nomor#', $nomor);
			$this->doccy->phpdocx->assign('#kepada#', $penyedia);
			$this->doccy->phpdocx->assign('#alamat#', '');
			$this->doccy->phpdocx->assign('#nosupph#', '');
			$this->doccy->phpdocx->assign('#tglsupph#', '');
			$this->doccy->phpdocx->assign('#nospph#', '');
			$this->doccy->phpdocx->assign('#tgglspph#', '');
			$this->doccy->phpdocx->assign('#nospp#', '');
			$this->doccy->phpdocx->assign('#tglspp#', '');
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->doccy->phpdocx->assign('#biaya#', $biaya);
			$this->doccy->phpdocx->assign('#biayaterbilang#', $biayaterbilang);
			$this->doccy->phpdocx->assign('#lama#', $lama);
			$this->doccy->phpdocx->assign('#lamaterbilang#', $lamaterbilang);
			$this->doccy->phpdocx->assign('#biayajaminan#', $jaminan);
			$this->doccy->phpdocx->assign('#jaminanterbilang#', $jaminanterbilang);
			$this->renderDocx("Surat Pemberitahuan Pengadaan.docx", true);
		}
//	=====================================Pakta Integritas=====================================
		else if ($Dok->nama_dokumen == "Pakta Integritas Awal Panitia"){
			
			$PI=PaktaIntegritasPanitia1::model()->findByPk($id);
			$tanggal = Tanggal::getTanggalLengkap($Dok->tanggal);
			$tahun = Tanggal::getTahun($Dok->tanggal);
			$tempat = $Dok->tempat;
			$namapengadaan= $Peng->nama_pengadaan;
			
			if (Panitia::model()->findByPk($Peng->id_panitia)->jenis_panitia=="Pejabat") {
				$namapejabat=User::model()->findByPk(Anggota::model()->find('id_panitia = '.$Peng->id_panitia)->username)->nama;
				$this->doccy->newFile('2 Pakta Integritas Awal Pejabat.docx');
				$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
				$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
				$this->doccy->phpdocx->assign('#tempat surat#', $tempat);
				$this->doccy->phpdocx->assign('#tanggal surat#', $tanggal);
				$this->doccy->phpdocx->assign('#tahun#', $tahun);
				$this->doccy->phpdocx->assign('#nama pengadaan#', $namapengadaan);
				$this->doccy->phpdocx->assign('#nama pejabat#', $namapejabat);
				$this->renderDocx("Pakta Integritas Awal Pejabat.docx", true);
			} else {
				$listpanitia = $this->getListPanitia($Peng->id_panitia);
				$this->doccy->newFile('2 Pakta Integritas Awal Panitia.docx');
				$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
				$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
				$this->doccy->phpdocx->assign('#tempat surat#', $tempat);
				$this->doccy->phpdocx->assign('#tanggal surat#', $tanggal);
				$this->doccy->phpdocx->assign('#tahun#', $tahun);
				$this->doccy->phpdocx->assign('#nama pengadaan#', $namapengadaan);
				$this->doccy->phpdocx->assign('#listpanitia#', $listpanitia);
				$this->renderDocx("Pakta Integritas Awal Panitia.docx", true);
			}
			
			
		$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
		$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#tempat surat#', $tempat);
			$this->doccy->phpdocx->assign('#tanggal surat#', $tanggal);
			$this->doccy->phpdocx->assign('#nama pengadaan#', $namapengadaan);
			$this->renderDocx("Pakta Integritas Awal Panitia.docx", true);
			
		}
		else if ($Dok->nama_dokumen == "Pakta Integritas Akhir Panitia"){
			
			$PI=PaktaIntegritasPanitia1::model()->findByPk($id);
			$tanggal = $Dok->tanggal;
			$panitia = Panitia::model()->findByPk($Peng->id_panitia);
			$ketua = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Ketua"')->username)->nama;
			$sekretaris = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Sekretaris"')->username)->nama;
			$anggota1 = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Anggota1"')->username)->nama;
			$nama = $Peng->nama_pengadaan;
			$sk = $panitia->SK_panitia;
			$this->doccy->newFile('12a Pakta Integritas Akhir Panitia.docx');
			
		$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
		$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->doccy->phpdocx->assign('#sk#', $sk);
			$ketua = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Ketua"')->username)->nama;
			$sekretaris = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Sekretaris"')->username)->nama;
			$anggota1 = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Anggota1"')->username)->nama;
			$this->renderDocx("Pakta Integritas Akhir Panitia.docx", true);
		}
		else if ($Dok->nama_dokumen == "Pakta Integritas Penyedia"){
			
			$nama = $Peng->nama_pengadaan;
			
			$this->doccy->newFile('5a Pakta Integritas Penyedia.docx');
			
		$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
		$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->doccy->phpdocx->assign('#2#', '.............................................');
			$this->doccy->phpdocx->assign('#3#', '.............................................');
			$this->renderDocx("Pakta Integritas Penyedia.docx", true);
		}
//	=====================================RKS=====================================
		else if ($Dok->nama_dokumen == "RKS"){
			
			$rks=Rks::model()->findByPk($id);
			
			$norks = $rks->nomor;
			$tglrks = Tanggal::getTanggalLengkap($Dok->tanggal);
			$nama = $Peng->nama_pengadaan;
			$namakapital = strtoupper($nama);
			$tanggalpermintaan = Tanggal::getTanggalLengkap($rks->tanggal_permintaan_penawaran);
			$tanggalpenunjukan = Tanggal::getTanggalLengkap($rks->tanggal_penjelasan);
			$waktupenunjukan = Tanggal::getJamMenit($rks->waktu_penjelasan);
			$tempatpenunjukan = $rks->tempat_penjelasan;
			$tanggalawalpemasukan = Tanggal::getTanggalLengkap($rks->tanggal_pemasukan_penawaran);
			$tanggalakhirpemasukan = Tanggal::getTanggalLengkap($rks->tanggal_akhir_pemasukan_penawaran);
			$waktupemasukanpenawaran = Tanggal::getJamMenit($rks->waktu_pemasukan_penawaran);
			$tempatpemasukan = $rks->tempat_pemasukan_penawaran;
			$tanggalnegosiasi = Tanggal::getTanggalLengkap($rks->tanggal_negosiasi);
			$waktunegosiasi = Tanggal::getJamMenit($rks->waktu_negosiasi);
			$tanggalpenunjukanpemenang = Tanggal::getTanggalLengkap($rks->tanggal_penetapan_pemenang);
			$waktupenunjukanpemenang = Tanggal::getJamMenit($rks->waktu_penetapan_pemenang);
			$tempatpenunjukanpemenang = $rks->tempat_penetapan_pemenang;
			
			$this->doccy->newFile('3a rks-tunjuklangsungjasa.docx');
			
		$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
		$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#norks#', $norks);
			$this->doccy->phpdocx->assign('#tglrks#', $tglrks);
			$this->doccy->phpdocx->assign('#pengadaan#', $namakapital);
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->doccy->phpdocx->assign('#tanggalpermintaanpenawaran#', $tanggalpermintaan);
			$this->doccy->phpdocx->assign('#tanggalpenunjukanlangsung#', $tanggalpenunjukan);
			$this->doccy->phpdocx->assign('#waktupenunjukanlangsung#', $waktupenunjukan);
			$this->doccy->phpdocx->assign('#tempatpenunjukanlangsung#', $tempatpenunjukan);
			$this->doccy->phpdocx->assign('#tanggalawalpemasukansuratpenawaran#', $tanggalawalpemasukan);
			$this->doccy->phpdocx->assign('#tanggalakhirpemasukansuratpenawaran#', $tanggalakhirpemasukan);
			$this->doccy->phpdocx->assign('#waktupemasukansuratpenawaran#', $waktupemasukanpenawaran);
			$this->doccy->phpdocx->assign('#tempatpemasukansuratpenawaran#', $tempatpemasukan);
			$this->doccy->phpdocx->assign('#tanggalnegosiasidanklarifikasi#', $tanggalnegosiasi);
			$this->doccy->phpdocx->assign('#waktunegosiasidanklarifikasi#', $waktunegosiasi);
			$this->doccy->phpdocx->assign('#tanggalpenunjukanpemenang#', $tanggalpenunjukanpemenang);
			$this->doccy->phpdocx->assign('#waktupenunjukanpemenang#', $waktupenunjukanpemenang);
			$this->doccy->phpdocx->assign('#tempatpenunjukanpemenang#', $tempatpenunjukanpemenang);
			$this->renderDocx("RKS.docx", true);
		}
//	=====================================Berita Acara=====================================
		else if ($Dok->nama_dokumen == "Berita Acara Aanwijzing"){
			
			$BA=BeritaAcaraPenjelasan::model()->findByPk($id);	
			$nomor = $BA->nomor;
			// $tanggal = $Dok->tanggal;
			$nama = $Peng->nama_pengadaan;
			$panitia = Panitia::model()->findByPk($Peng->id_panitia);
			$ketua = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Ketua"')->username)->nama;
			$sekretaris = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Sekretaris"')->username)->nama;
			$anggota1 = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Anggota1"')->username)->nama;
			$dokrks=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "RKS"');
			$rks=Rks::model()->findByPk($dokrks->id_dokumen);	
			$this->doccy->newFile('9a Berita Acara Aanwijzing.docx');
			$norks = $rks->nomor;
			
		$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
		$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#nomorba#', $nomor);
			$this->doccy->phpdocx->assign('#haritanggal#', Tanggal::getHariTanggalLengkap($Dok->tanggal));
			// $this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->doccy->phpdocx->assign('#ketua#', $ketua);
			$this->doccy->phpdocx->assign('#sekretaris#', $sekretaris);
			$this->doccy->phpdocx->assign('#anggota#', $anggota1);
			$DokRKS=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "RKS"');
			$RKS=Rks::model()->findByPk($DokRKS->id_dokumen);
			$this->doccy->phpdocx->assign('#wakturapat#', Tanggal::getJamMenit($RKS->waktu_penjelasan));
			$this->doccy->phpdocx->assign('#norks#', $RKS->nomor);
			$this->doccy->phpdocx->assign('#tanggal_rks#', Tanggal::getHariTanggalLengkap($DokRKS->tanggal));
			$this->renderDocx("Berita Acara Penjelasan.docx", true);
		}
		else if ($Dok->nama_dokumen == "Berita Acara Evaluasi Penawaran"){
			
			$BAEP=BeritaAcaraEvaluasiPenawaran::model()->findByPk($id);	
			$nomor = $BAEP->nomor;
			$nama = $Peng->nama_pengadaan;
			$tanggal = Tanggal::getTanggalLengkap($Dok->tanggal);
			$hari = Tanggal::getHari($tanggal);
			$dokrks=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "RKS"');
			$rks=Rks::model()->findByPk($dokrks->id_dokumen);	
			$norks = $rks->nomor;
			$tanggalrks = Dokumen::model()->find($rks->id_dokumen)->tanggal;
			$ketua = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Ketua"')->username)->nama;
			$sekretaris = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Sekretaris"')->username)->nama;
			$anggota1 = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Anggota1"')->username)->nama;
			$anggota2 = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Anggota1"')->username)->nama;
			$dokBAPP=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Berita Acara Pembukaan Penawaran"');
			$BAPP=BeritaAcaraPembukaanPenawaran::model()->findByPk($dokBAPP->id_dokumen);
			$jumlahperusahaan = $BAPP->jumlah_penyedia_diundang;
			
			$pemenang = $BAEP->pemenang;
			$alamat = $BAEP->alamat;
			$NPWP = $BAEP->NPWP;
			$nilai = $BAEP->nilai;
			$pemenang2 = $BAEP->pemenang_2;
			$alamat2 = $BAEP->alamat_2;
			$NPWP2 = $BAEP->NPWP_2;
			$nilai2 = $BAEP->nilai_2;
			$metode = $Peng->metode_pengadaan;
			$metode2 = $Peng->metode_penawaran;
			$user = $Peng->divisi_peminta;
			$nama = $Peng->nama_pengadaan;
			$panitia = Panitia::model()->findByPk($Peng->id_panitia);
			$namapanitia=$panitia->nama_panitia;
			
			$this->doccy->newFile('11a Berita Acara Evaluasi Penawaran.docx');
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
				
			$this->doccy->phpdocx->assign('#nomorba#', $nomor);
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#hari#', $hari);
			$this->doccy->phpdocx->assign('#norks#', $norks);
			$this->doccy->phpdocx->assign('#tanggalrks#', $tanggalrks);
			$this->doccy->phpdocx->assign('#ketua#', $ketua);
			$this->doccy->phpdocx->assign('#sekretaris#', $sekretaris);
			$this->doccy->phpdocx->assign('#anggota1#', $anggota1);
			$this->doccy->phpdocx->assign('#anggota2#', '.......................');
			$this->doccy->phpdocx->assign('#jumlahperusahaan#', $jumlahperusahaan);
			$this->doccy->phpdocx->assign('#listperusahaan#', '.......................');
			$this->doccy->phpdocx->assign('#listperusahaanlulus#', '.......................');
			$this->doccy->phpdocx->assign('#listperusahaantidaklulus#', '.......................');
			$this->doccy->phpdocx->assign('#pemenang1#', $pemenang);
			$this->doccy->phpdocx->assign('#alamat1#', $alamat);
			$this->doccy->phpdocx->assign('#npwp1#', $NPWP);
			$this->doccy->phpdocx->assign('#nilai1#', $nilai);
			$this->doccy->phpdocx->assign('#pemenang2#', $pemenang2);
			$this->doccy->phpdocx->assign('#alamat1#', $alamat2);
			$this->doccy->phpdocx->assign('#npwp2#', $NPWP2);
			$this->doccy->phpdocx->assign('#nilai2#', $nilai2);
			
			$this->renderDocx("Berita Acara Evaluasi Penawaran.docx", true);
		}
		else if ($Dok->nama_dokumen == "Berita Acara Evaluasi Penawaran Sampul Satu" || $Dok->nama_dokumen == "Berita Acara Evaluasi Penawaran Tahap Satu"){
			
			$BAEP=BeritaAcaraEvaluasiPenawaran::model()->findByPk($id);	
			$nomor = $BAEP->nomor;
			$nama = $Peng->nama_pengadaan;
			$tanggal = Tanggal::getTanggalLengkap($Dok->tanggal);
			$hari = Tanggal::getHari($tanggal);
			$dokrks=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "RKS"');
			$rks=Rks::model()->findByPk($dokrks->id_dokumen);	
			$norks = $rks->nomor;
			$tanggalrks = Tanggal::getTanggalLengkap(Dokumen::model()->find($rks->id_dokumen)->tanggal);
			$ketua = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Ketua"')->username)->nama;
			$sekretaris = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Sekretaris"')->username)->nama;
			$anggota1 = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Anggota"')->username)->nama;
			$anggota2 = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Anggota"')->username)->nama;
			$dokBAPP=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Berita Acara Pembukaan Penawaran Sampul Satu"');
			$BAPP=BeritaAcaraPembukaanPenawaran::model()->findByPk($dokBAPP->id_dokumen);
			$jumlahperusahaan = $BAPP->jumlah_penyedia_diundang;
			
			$metode = $Peng->metode_pengadaan;
			$metode2 = $Peng->metode_penawaran;
			$user = $Peng->divisi_peminta;
			$nama = $Peng->nama_pengadaan;
			$panitia = Panitia::model()->findByPk($Peng->id_panitia);
			$namapanitia=$panitia->nama_panitia;
			
			$this->doccy->newFile('11b Berita Acara Evaluasi Penawaran Sampul 1.docx');
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
				
			$this->doccy->phpdocx->assign('#nomorba#', $nomor);
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#hari#', $hari);
			$this->doccy->phpdocx->assign('#norks#', $norks);
			$this->doccy->phpdocx->assign('#tanggalrks#', $tanggalrks);
			$this->doccy->phpdocx->assign('#ketua#', $ketua);
			$this->doccy->phpdocx->assign('#sekretaris#', $sekretaris);
			$this->doccy->phpdocx->assign('#anggota1#', $anggota1);
			$this->doccy->phpdocx->assign('#anggota2#', '..................');
			$this->doccy->phpdocx->assign('#jumlahperusahaan#', $jumlahperusahaan);
			$this->doccy->phpdocx->assign('#listperusahaan#', '.......................');
			$this->doccy->phpdocx->assign('#listperusahaanlulus#', '.......................');
			$this->doccy->phpdocx->assign('#listperusahaantidaklulus#', '.......................');
			
			$this->renderDocx("Berita Acara Evaluasi Penawaran Sampul 1.docx", true);
		}
		else if ($Dok->nama_dokumen == "Berita Acara Evaluasi Penawaran Sampul Dua" || $Dok->nama_dokumen == "Berita Acara Evaluasi Penawaran Tahap Dua"){
			
			$BAEP=BeritaAcaraEvaluasiPenawaran::model()->findByPk($id);	
			$nomor = $BAEP->nomor;
			$nama = $Peng->nama_pengadaan;
			$tanggal = Tanggal::getTanggalLengkap($Dok->tanggal);
			$hari = Tanggal::getHari($tanggal);
			$dokrks=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "RKS"');
			$rks=Rks::model()->findByPk($dokrks->id_dokumen);	
			$norks = $rks->nomor;
			$tanggalrks = Tanggal::getTanggalLengkap(Dokumen::model()->find($rks->id_dokumen)->tanggal);
			$ketua = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Ketua"')->username)->nama;
			$sekretaris = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Sekretaris"')->username)->nama;
			$anggota = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Anggota"')->username)->nama;
			$dokBAPP=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Berita Acara Pembukaan Penawaran Sampul Satu"');
			$BAPP=BeritaAcaraPembukaanPenawaran::model()->findByPk($dokBAPP->id_dokumen);
			$jumlahperusahaan = $BAPP->jumlah_penyedia_diundang;
			
			$pemenang = $BAEP->pemenang;
			$alamat = $BAEP->alamat;
			$NPWP = $BAEP->NPWP;
			$nilai = $BAEP->nilai;
			$pemenang2 = $BAEP->pemenang_2;
			$alamat2 = $BAEP->alamat_2;
			$NPWP2 = $BAEP->NPWP_2;
			$nilai2 = $BAEP->nilai_2;
			$nilai1terbilang = RupiahMaker::terbilangMaker($nilai);
			$nilai2terbilang = RupiahMaker::terbilangMaker($nilai2);
			$metode = $Peng->metode_pengadaan;
			$metode2 = $Peng->metode_penawaran;
			$user = $Peng->divisi_peminta;
			$nama = $Peng->nama_pengadaan;
			$panitia = Panitia::model()->findByPk($Peng->id_panitia);
			$namapanitia=$panitia->nama_panitia;
			
			$this->doccy->newFile('11b Berita Acara Evaluasi Penawaran Sampul 2.docx');
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
				
			$this->doccy->phpdocx->assign('#nomorba#', $nomor);
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#hari#', $hari);
			$this->doccy->phpdocx->assign('#norks#', $norks);
			$this->doccy->phpdocx->assign('#tanggalrks#', $tanggalrks);
			$this->doccy->phpdocx->assign('#ketua#', $ketua);
			$this->doccy->phpdocx->assign('#sekretaris#', $sekretaris);
			$this->doccy->phpdocx->assign('#anggota#', $anggota);
			$this->doccy->phpdocx->assign('#pemenang1#', $pemenang);
			$this->doccy->phpdocx->assign('#alamat1#', $alamat);
			$this->doccy->phpdocx->assign('#npwp1#', $NPWP);
			$this->doccy->phpdocx->assign('#nilai1#', $nilai);
			$this->doccy->phpdocx->assign('#nilai1terbilang#', $nilai1terbilang);
			$this->doccy->phpdocx->assign('#pemenang2#', $pemenang2);
			$this->doccy->phpdocx->assign('#alamat2#', $alamat2);
			$this->doccy->phpdocx->assign('#npwp2#', $NPWP2);
			$this->doccy->phpdocx->assign('#nilai2#', $nilai2);
			$this->doccy->phpdocx->assign('#nilai2terbilang#', $nilai2terbilang);
			
			$this->renderDocx("Berita Acara Evaluasi Penawaran Sampul 2.docx", true);
		}
		else if ($Dok->nama_dokumen == "Berita Acara Negosiasi dan Klarifikasi"){
			
			$bakn=BeritaAcaraNegosiasiKlarifikasi::model()->findByPk($id);	
			$nomor = $bakn->nomor;
			$tanggal = $Dok->tanggal;
			$hari = Tanggal::getHari($tanggal);
			$tanggal1 = RupiahMaker::terbilangMaker(Tanggal::getTanggal($tanggal));
			$bulan = RupiahMaker::terbilangMaker(Tanggal::getBulanA($tanggal));
			$tahun = RupiahMaker::terbilangMaker(Tanggal::getTahun($tanggal));
			$tgll = Tanggal::getTanggalLengkap($tanggal);
			$tempat = $Dok->tempat;
			$kepada = $Peng->nama_penyedia;
			$nama = $Peng->nama_pengadaan;
			$ketua = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Ketua"')->username)->nama;
			//$sekretaris = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Sekretaris"')->username)->nama;
			//$anggota1 = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Anggota"')->username)->nama;
			$dokrks=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "RKS"');
			$rks=Rks::model()->findByPk($dokrks->id_dokumen);	
			$norks = $rks->nomor; 
			$tanggalrks = Dokumen::model()->find($rks->id_dokumen)->tanggal;
			$tglrks = Tanggal::getTanggalLengkap($tanggalrks);
			$panitia = Panitia::model()->findByPk($Peng->id_panitia);
			//$dokspph=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Surat Undangan Permintaan Penawaran Harga"');
			//$spph = SuratUndanganPermintaanPenawaranHarga::model()->findByPk($dokspph->id_dokumen);
			//$nospph = $spph->nomor;
			$nosk = $panitia->SK_panitia;
//	===>	$tanggalsk = $panitia->tanggal_SK;
			$this->doccy->newFile('12 Berita Acara Klarifikasi dan Negosiasi.docx');
			
		$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
		$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#nomor#', $nomor);
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->doccy->phpdocx->assign('#norks#', $norks);
			$this->doccy->phpdocx->assign('#tanggalrks#', $tglrks);
			$this->doccy->phpdocx->assign('#ha#', $hari);
			$this->doccy->phpdocx->assign('#tgl#', $tanggal1);
			$this->doccy->phpdocx->assign('#bulan#', $bulan);
			$this->doccy->phpdocx->assign('#tahun#', $tahun);
			$this->doccy->phpdocx->assign('#sk#', $nosk);
			$this->doccy->phpdocx->assign('#tanggalsk#', $tgll);
			$this->doccy->phpdocx->assign('#nospph#', '---');
			$this->doccy->phpdocx->assign('#zzz#', $tgll);
			$this->doccy->phpdocx->assign('#ketua#', $ketua);
			//$this->doccy->phpdocx->assign('#sekretaris#', $sekretaris);
			//$this->doccy->phpdocx->assign('#anggota1#', $anggota1);
			$this->renderDocx("Berita Acara Negosiasi Klarifikasi.docx", true);
		}
		else if ($Dok->nama_dokumen == "Berita Acara Pembukaan Penawaran"){
			
			$BAPP=BeritaAcaraPembukaanPenawaran::model()->findByPk($id);	
			$nomor = $BAPP->nomor;
			$jumlah_penyedia_diundang = $BAPP->jumlah_penyedia_diundang;
			$jumlah_penyedia_dokumen_sah = $BAPP->jumlah_penyedia_dokumen_sah;
			$jumlah_penyedia_dokumen_tidak_sah = $BAPP->jumlah_penyedia_dokumen_tidak_sah;
			$nama = $Peng->nama_pengadaan;
			$tanggal = Tanggal::getTanggalLengkap($Dok->tanggal);
			$hari = Tanggal::getHari($tanggal);
			$dokrks=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "RKS"');
			$rks=Rks::model()->findByPk($dokrks->id_dokumen);	
			$norks = $rks->nomor;
			$tanggalrks = Dokumen::model()->find($rks->id_dokumen)->tanggal;
			
			
			$metode = $Peng->metode_pengadaan;
			$metode2 = $Peng->metode_penawaran;
			$user = $Peng->divisi_peminta;
			$panitia = Panitia::model()->findByPk($Peng->id_panitia);
			$namapanitia=$panitia->nama_panitia;
			$ketua = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Ketua"')->username)->nama;
			$sekretaris = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Sekretaris"')->username)->nama;
			$anggota1 = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Anggota1"')->username)->nama;
			
			$this->doccy->newFile('10a Berita Acara Pembukaan Penawaran.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#nomorba#', $nomor);
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->doccy->phpdocx->assign('#hari#', $hari);
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#jam#', '..... : .....');
			$this->doccy->phpdocx->assign('#norks#', $norks);
			$this->doccy->phpdocx->assign('#tanggalrks#', $tanggalrks);
			$this->doccy->phpdocx->assign('#ketua#', $ketua);
			$this->doccy->phpdocx->assign('#sekretaris#', $sekretaris);
			$this->doccy->phpdocx->assign('#anggota1#', $anggota1);
			$this->doccy->phpdocx->assign('#anggota2#', '.............................................');
			$this->doccy->phpdocx->assign('#jumlahperusahaan#', $jumlah_penyedia_diundang);
			$this->doccy->phpdocx->assign('#listperusahaandanharga#', '.............................................');
			$this->doccy->phpdocx->assign('#listperusahaanikut#', '.............................................');
			$this->doccy->phpdocx->assign('#jumlahsah#', $jumlah_penyedia_dokumen_sah);
			$this->doccy->phpdocx->assign('#jumlahtidaksah#', $jumlah_penyedia_dokumen_tidak_sah);
			$this->renderDocx("Berita Acara Pembukaan Penawaran.docx", true);
		}
		else if ($Dok->nama_dokumen == "Berita Acara Pembukaan Penawaran Sampul Satu" || $Dok->nama_dokumen == "Berita Acara Pembukaan Penawaran Tahap Satu"){
			
			$BAPP=BeritaAcaraPembukaanPenawaran::model()->findByPk($id);	
			$nomor = $BAPP->nomor;
			$jumlah_penyedia_diundang = $BAPP->jumlah_penyedia_diundang;
			$nama = $Peng->nama_pengadaan;
			$tanggal = Tanggal::getTanggalLengkap($Dok->tanggal);
			$hari = Tanggal::getHari($tanggal);
			$dokrks=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "RKS"');
			$rks=Rks::model()->findByPk($dokrks->id_dokumen);	
			$norks = $rks->nomor;
			$tanggalrks = Dokumen::model()->find($rks->id_dokumen)->tanggal;
			
			
			$metode = $Peng->metode_pengadaan;
			$metode2 = $Peng->metode_penawaran;
			$user = $Peng->divisi_peminta;
			$panitia = Panitia::model()->findByPk($Peng->id_panitia);
			$namapanitia=$panitia->nama_panitia;
			$ketua = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Ketua"')->username)->nama;
			$sekretaris = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Sekretaris"')->username)->nama;
			$anggota1 = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Anggota"')->username)->nama;
			
			$this->doccy->newFile('10b Berita Acara Pembukaan Penawaran Sampul 1.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#nomorba#', $nomor);
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->doccy->phpdocx->assign('#hari#', $hari);
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#jam#', '..... : .....');
			$this->doccy->phpdocx->assign('#norks#', $norks);
			$this->doccy->phpdocx->assign('#tanggalrks#', $tanggalrks);
			$this->doccy->phpdocx->assign('#ketua#', $ketua);
			$this->doccy->phpdocx->assign('#sekretaris#', $sekretaris);
			$this->doccy->phpdocx->assign('#anggota1#', $anggota1);
			$this->doccy->phpdocx->assign('#anggota2#', '.............................................');
			$this->doccy->phpdocx->assign('#jumlahmasuk#', $jumlah_penyedia_diundang);
			$this->doccy->phpdocx->assign('#listperusahaanmasuk#', '.............................................');
			$this->doccy->phpdocx->assign('#listperusahaanikut#', '.............................................');
			$this->renderDocx("Berita Acara Pembukaan Penawaran Sampul 1.docx", true);
		}
		else if ($Dok->nama_dokumen == "Berita Acara Pembukaan Penawaran Sampul Dua" || $Dok->nama_dokumen == "Berita Acara Pembukaan Penawaran Tahap Dua"){
			
			$BAPP=BeritaAcaraPembukaanPenawaran::model()->findByPk($id);	
			$nomor = $BAPP->nomor;
			$jumlah_penyedia_diundang = $BAPP->jumlah_penyedia_diundang;
			$nama = $Peng->nama_pengadaan;
			$tanggal = Tanggal::getTanggalLengkap($Dok->tanggal);
			$hari = Tanggal::getHari($tanggal);
			$dokrks=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "RKS"');
			$rks=Rks::model()->findByPk($dokrks->id_dokumen);	
			$norks = $rks->nomor;
			$tanggalrks = Dokumen::model()->find($rks->id_dokumen)->tanggal;
			
			
			$metode = $Peng->metode_pengadaan;
			$metode2 = $Peng->metode_penawaran;
			$user = $Peng->divisi_peminta;
			$panitia = Panitia::model()->findByPk($Peng->id_panitia);
			$namapanitia=$panitia->nama_panitia;
			$ketua = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Ketua"')->username)->nama;
			$sekretaris = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Sekretaris"')->username)->nama;
			$anggota1 = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Anggota"')->username)->nama;
			
			$this->doccy->newFile('10b Berita Acara Pembukaan Penawaran Sampul 2.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#nomorba#', $nomor);
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->doccy->phpdocx->assign('#hari#', $hari);
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#jam#', '..... : .....');
			$this->doccy->phpdocx->assign('#norks#', $norks);
			$this->doccy->phpdocx->assign('#tanggalrks#', $tanggalrks);
			$this->doccy->phpdocx->assign('#ketua#', $ketua);
			$this->doccy->phpdocx->assign('#sekretaris#', $sekretaris);
			$this->doccy->phpdocx->assign('#anggota1#', $anggota1);
			$this->doccy->phpdocx->assign('#anggota2#', '.............................................');
			$this->doccy->phpdocx->assign('#listperusahaan#', '.............................................');
			$this->doccy->phpdocx->assign('#listperusahaanikut#', '.............................................');
			$this->renderDocx("Berita Acara Pembukaan Penawaran Sampul 2.docx", true);
		}
//	=====================================Daftar Hadir=====================================
		else if ($Dok->nama_dokumen == "Daftar Hadir Aanwijzing"){
						
			$this->doccy->newFile('daftarhadir.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#1#', '.............................................');
			$this->doccy->phpdocx->assign('#2#', '.............................................');
			$this->doccy->phpdocx->assign('#3#', '.............................................');
			$this->doccy->phpdocx->assign('#4#', '.............................................');
			$this->doccy->phpdocx->assign('#5#', '.............................................');
			$this->renderDocx("Daftar Hadir Aanwijzing.docx", true);
		}
		else if ($Dok->nama_dokumen == "Daftar Hadir Evaluasi Penawaran"){
						
			$this->doccy->newFile('daftarhadir.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#1#', '.............................................');
			$this->doccy->phpdocx->assign('#2#', '.............................................');
			$this->doccy->phpdocx->assign('#3#', '.............................................');
			$this->doccy->phpdocx->assign('#4#', '.............................................');
			$this->doccy->phpdocx->assign('#5#', '.............................................');
			$this->renderDocx("Daftar Hadir Evaluasi Penawaran.docx", true);
		}
		else if ($Dok->nama_dokumen == "Daftar Hadir Evaluasi Penawaran Sampul Satu"){
						
			$this->doccy->newFile('daftarhadir.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#1#', '.............................................');
			$this->doccy->phpdocx->assign('#2#', '.............................................');
			$this->doccy->phpdocx->assign('#3#', '.............................................');
			$this->doccy->phpdocx->assign('#4#', '.............................................');
			$this->doccy->phpdocx->assign('#5#', '.............................................');
			$this->renderDocx("Daftar Hadir Evaluasi Penawaran Sampul 1.docx", true);
		}
		else if ($Dok->nama_dokumen == "Daftar Hadir Evaluasi Penawaran Sampul Dua"){
						
			$this->doccy->newFile('daftarhadir.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#1#', '.............................................');
			$this->doccy->phpdocx->assign('#2#', '.............................................');
			$this->doccy->phpdocx->assign('#3#', '.............................................');
			$this->doccy->phpdocx->assign('#4#', '.............................................');
			$this->doccy->phpdocx->assign('#5#', '.............................................');
			$this->renderDocx("Daftar Hadir Evaluasi Penawaran Sampul 2.docx", true);
		}
		else if ($Dok->nama_dokumen == "Daftar Hadir Evaluasi Penawaran Tahap Satu"){
						
			$this->doccy->newFile('daftarhadir.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#1#', '.............................................');
			$this->doccy->phpdocx->assign('#2#', '.............................................');
			$this->doccy->phpdocx->assign('#3#', '.............................................');
			$this->doccy->phpdocx->assign('#4#', '.............................................');
			$this->doccy->phpdocx->assign('#5#', '.............................................');
			$this->renderDocx("Daftar Hadir Evaluasi Penawaran Tahap 1.docx", true);
		}
		else if ($Dok->nama_dokumen == "Daftar Hadir Evaluasi Penawaran Tahap Dua"){
						
			$this->doccy->newFile('daftarhadir.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#1#', '.............................................');
			$this->doccy->phpdocx->assign('#2#', '.............................................');
			$this->doccy->phpdocx->assign('#3#', '.............................................');
			$this->doccy->phpdocx->assign('#4#', '.............................................');
			$this->doccy->phpdocx->assign('#5#', '.............................................');
			$this->renderDocx("Daftar Hadir Evaluasi Penawaran Tahap 2.docx", true);
		}
		else if ($Dok->nama_dokumen == "Daftar Hadir Negosiasi Klarifikasi"){
						
			$this->doccy->newFile('daftarhadir.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#1#', '.............................................');
			$this->doccy->phpdocx->assign('#2#', '.............................................');
			$this->doccy->phpdocx->assign('#3#', '.............................................');
			$this->doccy->phpdocx->assign('#4#', '.............................................');
			$this->doccy->phpdocx->assign('#5#', '.............................................');
			$this->renderDocx("Daftar Hadir Negosiasi dan Klarifikasi.docx", true);
		}
		else if ($Dok->nama_dokumen == "Daftar Hadir Pembukaan Penawaran"){
						
			$this->doccy->newFile('daftarhadir.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#1#', '.............................................');
			$this->doccy->phpdocx->assign('#2#', '.............................................');
			$this->doccy->phpdocx->assign('#3#', '.............................................');
			$this->doccy->phpdocx->assign('#4#', '.............................................');
			$this->doccy->phpdocx->assign('#5#', '.............................................');
			$this->renderDocx("Daftar Hadir Pembukaan Penawaran.docx", true);
		}
		else if ($Dok->nama_dokumen == "Daftar Hadir Pembukaan Penawaran Sampul Satu"){
						
			$this->doccy->newFile('daftarhadir.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#1#', '.............................................');
			$this->doccy->phpdocx->assign('#2#', '.............................................');
			$this->doccy->phpdocx->assign('#3#', '.............................................');
			$this->doccy->phpdocx->assign('#4#', '.............................................');
			$this->doccy->phpdocx->assign('#5#', '.............................................');
			$this->renderDocx("Daftar Hadir Pembukaan Penawaran Sampul Satu.docx", true);
		}
		else if ($Dok->nama_dokumen == "Daftar Hadir Pembukaan Penawaran Sampul Dua"){
						
			$this->doccy->newFile('daftarhadir.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#1#', '.............................................');
			$this->doccy->phpdocx->assign('#2#', '.............................................');
			$this->doccy->phpdocx->assign('#3#', '.............................................');
			$this->doccy->phpdocx->assign('#4#', '.............................................');
			$this->doccy->phpdocx->assign('#5#', '.............................................');
			$this->renderDocx("Daftar Hadir Pembukaan Penawaran Sampul Dua.docx", true);
		}
		else if ($Dok->nama_dokumen == "Daftar Hadir Pembukaan Penawaran Tahap Satu"){
						
			$this->doccy->newFile('daftarhadir.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#1#', '.............................................');
			$this->doccy->phpdocx->assign('#2#', '.............................................');
			$this->doccy->phpdocx->assign('#3#', '.............................................');
			$this->doccy->phpdocx->assign('#4#', '.............................................');
			$this->doccy->phpdocx->assign('#5#', '.............................................');
			$this->renderDocx("Daftar Hadir Pembukaan Penawaran Tahap Satu.docx", true);
		}
		else if ($Dok->nama_dokumen == "Daftar Hadir Pembukaan Penawaran Tahap Dua"){
						
			$this->doccy->newFile('daftarhadir.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#1#', '.............................................');
			$this->doccy->phpdocx->assign('#2#', '.............................................');
			$this->doccy->phpdocx->assign('#3#', '.............................................');
			$this->doccy->phpdocx->assign('#4#', '.............................................');
			$this->doccy->phpdocx->assign('#5#', '.............................................');
			$this->renderDocx("Daftar Hadir Pembukaan Penawaran Tahap Dua.docx", true);
		}
		else if ($Dok->nama_dokumen == "Daftar Hadir Prakualifikasi"){
						
			$this->doccy->newFile('daftarhadir.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#1#', '.............................................');
			$this->doccy->phpdocx->assign('#2#', '.............................................');
			$this->doccy->phpdocx->assign('#3#', '.............................................');
			$this->doccy->phpdocx->assign('#4#', '.............................................');
			$this->doccy->phpdocx->assign('#5#', '.............................................');
			$this->renderDocx("Daftar Hadir Prakualifikasi.docx", true);
		}
		else if ($Dok->nama_dokumen == "Surat Pengumuman Pelelangan"){
			
			$spp = SuratPengumumanPelelangan::model()->findByPk($id);	
			$ketua = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Ketua"')->username)->nama;
						
			// $doksupph = Dokumen::model()->find('id_pengadaan = /"'. $Dok->id_pengadaan . '/" and nama_dokumen = "Surat Undangan Permintaan Penawaran Harga"');
			// $supph=SuratUndanganPermintaanPenawaranHarga::model()->findByPk($doksupph->id_dokumen);
			
			$this->doccy->newFile('14a Pengumuman Pelelangan.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#nomor#', $spp->nomor);
			$this->doccy->phpdocx->assign('#tanggal#', Tanggal::getTanggalLengkap($Dok->tanggal));
			// $this->doccy->phpdocx->assign('#nosupph#', $supph->nomor);
			// $this->doccy->phpdocx->assign('#tglsupph#', Tanggal::getTanggalLengkap($doksupph->tanggal));
			$this->doccy->phpdocx->assign('#penyedia#', $spp->nama_penyedia);
			$this->doccy->phpdocx->assign('#biaya#', RupiahMaker::convertInt($spp->harga_penawaran));
			$this->doccy->phpdocx->assign('#keterangan#', $spp->keterangan);
			$this->doccy->phpdocx->assign('#deadline#', $spp->batas_sanggahan);
			$this->doccy->phpdocx->assign('#deadlineterbilang#', RupiahMaker::terbilangMaker($spp->batas_sanggahan));
			$this->doccy->phpdocx->assign('#namapeng#', $Peng->nama_pengadaan);
			$this->doccy->phpdocx->assign('#namaketua#', $ketua);
			$this->renderDocx("Surat Pengumuman Pelelangan", true);
		}
		else {
			$this->doccy->newFile('temp.docx');
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			$this->doccy->phpdocx->assign('#1#', '');
			$this->doccy->phpdocx->assign('#2#', '');
			$this->doccy->phpdocx->assign('#3#', '');
			$this->doccy->phpdocx->assign('#4#', '');
			$this->doccy->phpdocx->assign('#5#', '');
			$this->doccy->phpdocx->assign('#6#', '');
			$this->renderDocx("Temp.docx", true);
		}
	}

	function getListPanitiaTanpaKetua($idPan){
		if(Panitia::model()->findByPk($idPan)->jenis_panitia == "Pejabat"){
			$list = "";
		}else{
			$list = "1. " . User::model()->findByPk(Anggota::model()->find('id_panitia = ' . $idPan . ' and jabatan = "Sekretaris"')->username)->nama;
			$n = (Panitia::model()->findByPk($idPan)->jumlah_anggota)-2;
			for ( $i=1;$i<=$n;$i++){
				$list .= '<w:br/>';
				$list .= $i+1 . ". " . User::model()->findByPk(Anggota::model()->find('id_panitia = ' . $idPan . ' and jabatan = "Anggota' . $i . '"')->username)->nama;				
			}
		}
		return  $list;
	}

	function getListPanitia($idPan){
		if(Panitia::model()->findByPk($idPan)->jenis_panitia == "Pejabat"){
			$list = "";
		}else{
			$list = "1. " . User::model()->findByPk(Anggota::model()->find('id_panitia = ' . $idPan . ' and jabatan = "Ketua"')->username)->nama . "																			Ketua								(.................................)";
			$list .= '<w:br/>';
			$list .= '<w:br/>';
			$list .= "2. " . User::model()->findByPk(Anggota::model()->find('id_panitia = ' . $idPan . ' and jabatan = "Sekretaris"')->username)->nama . "																	Sekretaris								(.................................)";
			$n = (Panitia::model()->findByPk($idPan)->jumlah_anggota)-2;
			for ( $i=1;$i<=$n;$i++){
				$list .= '<w:br/>';
				$list .= '<w:br/>';
				$list .= $i+2 . ". " . User::model()->findByPk(Anggota::model()->find('id_panitia = ' . $idPan . ' and jabatan = "Anggota' . $i . '"')->username)->nama . "																	Anggota								(.................................)";				
			}
		}
		return  $list;
	}
}
?>