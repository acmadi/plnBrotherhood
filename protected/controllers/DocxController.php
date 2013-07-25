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
		$Panitia = Panitia::model()->findByPk($Peng->id_panitia);
		
		if ($Rincian->nama_rincian=="Cover") {
//------------------------------Cover
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
			$this->renderDocx("RKS-Cover-".$Peng->nama_pengadaan.".docx", true);	
		} else if ($Rincian->nama_rincian=="Daftar Isi") {
//----------------------------Daftar Isi
			$this->doccy->newFile('RKS Daftar Isi.docx');
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			$metode_pengadaan = $Peng->metode_pengadaan;
			$this->doccy->phpdocx->assign('#metode pengadaan#', $metode_pengadaan);
			$this->renderDocx("RKS-Daftar Isi-".$Peng->nama_pengadaan.".docx", true);
		} else if ($Rincian->nama_rincian=="Isi") {
//-----------------------------Isi
			$nama_pengadaan = $Peng->nama_pengadaan;
			$nomor_rks = $RKS->nomor;
			$tanggal_rks = Tanggal::getTanggalLengkap($DokRKS->tanggal);
			$tempatsurat = $DokRKS->tempat;
			$tanggal_permintaan = Tanggal::getTanggalLengkap($RKS->tanggal_permintaan_penawaran);
			$tanggal_pendaftaran = Tanggal::getTanggalLengkap($RKS->tanggal_pendaftaran);
			$tanggal_pengambilan_dokumen1 = Tanggal::getTanggalLengkap($RKS->tanggal_pengambilan_dokumen1);
			$hari_tanggal_pengambilan_dokumen1 = Tanggal::getHariTanggalLengkap($RKS->tanggal_pengambilan_dokumen1);
			$tanggal_pengambilan_dokumen2 = Tanggal::getTanggalLengkap($RKS->tanggal_pengambilan_dokumen2);
			$hari_tanggal_pengambilan_dokumen2 = Tanggal::getHariTanggalLengkap($RKS->tanggal_pengambilan_dokumen2);
			$waktu_pengambilan_dokumen1 = Tanggal::getJamMenit($RKS->waktu_pengambilan_dokumen1);
			$waktu_pengambilan_dokumen2 = Tanggal::getJamMenit($RKS->waktu_pengambilan_dokumen2);
			$tempat_pengambilan_dokumen = $RKS->tempat_pengambilan_dokumen;
			$tanggal_penjelasan = Tanggal::getTanggalLengkap($RKS->tanggal_penjelasan);
			$hari_tanggal_penjelasan = Tanggal::getHariTanggalLengkap($RKS->tanggal_penjelasan);
			$waktu_penjelasan = Tanggal::getJamMenit($RKS->waktu_penjelasan);
			$tempat_penjelasan = $RKS->tempat_penjelasan;
			$tanggal_awal_pemasukan= Tanggal::getTanggalLengkap($RKS->tanggal_awal_pemasukan_penawaran1);
			$tanggal_akhir_pemasukan= Tanggal::getTanggalLengkap($RKS->tanggal_akhir_pemasukan_penawaran1);
			$waktu_pemasukan = Tanggal::getJamMenit($RKS->waktu_pemasukan_penawaran1);
			$tempat_pemasukan = $RKS->tempat_pemasukan_penawaran1;
			$tanggal_pembukaan= Tanggal::getTanggalLengkap($RKS->tanggal_pembukaan_penawaran1);
			$hari_tanggal_pembukaan= Tanggal::getHariTanggalLengkap($RKS->tanggal_pembukaan_penawaran1);
			$waktu_pembukaan = Tanggal::getJamMenit($RKS->waktu_pembukaan_penawaran1);
			$tempat_pembukaan = $RKS->tempat_pembukaan_penawaran1;
			$tanggal_evaluasi= Tanggal::getTanggalLengkap($RKS->tanggal_evaluasi_penawaran1);
			$waktu_evaluasi = Tanggal::getJamMenit($RKS->waktu_evaluasi_penawaran1);
			$tempat_evaluasi = $RKS->tempat_evaluasi_penawaran1;
			$tanggal_negosiasi= Tanggal::getTanggalLengkap($RKS->tanggal_negosiasi);
			$waktu_negosiasi = Tanggal::getJamMenit($RKS->waktu_negosiasi);
			$tempat_negosiasi = $RKS->tempat_negosiasi;
			$tanggal_penetapan= Tanggal::getTanggalLengkap($RKS->tanggal_penetapan_pemenang);
			$waktu_penetapan = Tanggal::getJamMenit($RKS->waktu_penetapan_pemenang);
			$jenis_panitia= $Panitia->jenis_panitia;
			$jenis_panitia_kapital = strtoupper($jenis_panitia);
			$DokNDPP = Dokumen::model()->find('id_pengadaan = '. $Peng->id_pengadaan. ' and nama_dokumen = "Nota Dinas Perintah Pengadaan"');
			$NDPP = NotaDinasPerintahPengadaan::model()->findByPk($DokNDPP->id_dokumen);
			$sumber_dana= $NDPP->sumber_dana;
			$metode_pengadaan = $Peng->metode_pengadaan;
			$metode_penawaran = $Peng->metode_penawaran;
			$jenis_kualifikasi = $Peng->jenis_kualifikasi;
			$sistem_evaluasi = $RKS->sistem_evaluasi_penawaran;
			$kualifikasi = $RKS->kualifikasi;
			$klasifikasi = $RKS->klasifikasi;
			$bidangusaha = $RKS->bidang_usaha;
			$subbidangusaha = $RKS->sub_bidang_usaha;
			$jangka_waktu_penyerahan = $RKS->jangka_waktu_penyerahan;
			$terbilang_jangka_waktu_penyerahan = RupiahMaker::terbilangMaker($jangka_waktu_penyerahan);
			$lama_berlaku_jaminan = $RKS->jangka_waktu_berlaku_jaminan;
			$terbilang_lama_berlaku_jaminan = RupiahMaker::terbilangMaker($lama_berlaku_jaminan);
			$pengesah = Jabatan::model()->findByPk($NDPP->dari)->jabatan;
			$nama_pengesah =Kdivmum::model()->find('id_jabatan = '.$NDPP->dari.' and status_user = "Aktif"')->nama;
			if($Panitia->jenis_panitia=="Panitia"){
				$kalimat= 'Panitia adalah '.$Panitia->nama_panitia.' Pengadaan Barang/Jasa Kantor Pusat, Divisi Umum dan Manajemen Kantor Pusat, sesuai dengan surat tugas DIRSDM No : '.$Panitia->SK_panitia.' tanggal : '.Tanggal::getTanggalLengkap($Panitia->tanggal_sk).' yang diangkat oleh Pemberi Tugas untuk melaksanakan pengadaan Barang/Jasa.';
				$kalimat2= 'Adalah '.$Panitia->nama_panitia.' Pengadaan Barang/Jasa Kantor Pusat, Divisi Umum dan Manajemen Kantor Pusat, sesuai dengan surat tugas DIRSDM No : '.$Panitia->SK_panitia.' tanggal : '.Tanggal::getTanggalLengkap($Panitia->tanggal_sk).' yang diangkat oleh Pemberi Tugas untuk melaksanakan pengadaan Barang/Jasa.';
				$listpanitia=$this->getListPanitia($Panitia->id_panitia);
			} else {
				$kalimat= 'Pejabat adalah Pejabat Pengadaan Barang/Jasa Kantor Pusat, Divisi Umum dan Manajemen Kantor Pusat, yang diangkat oleh Pemberi Tugas untuk melaksanakan pengadaan Barang/Jasa.';
				$kalimat2= 'Adalah Pejabat Pengadaan Barang/Jasa Kantor Pusat, Divisi Umum dan Manajemen Kantor Pusat, yang diangkat oleh Pemberi Tugas untuk melaksanakan pengadaan Barang/Jasa.';
				$listpanitia=$Panitia->nama_panitia;
			}
			$DokNDP = Dokumen::model()->find('id_pengadaan = '. $Peng->id_pengadaan. ' and nama_dokumen = "Nota Dinas Permintaan"');
			$NDP = NotaDinasPermintaan::model()->findByPk($DokNDP->id_dokumen);
			if ($metode_pengadaan=="Penunjukan Langsung"){
				if($NDP->nilai_biaya_rab>500000000) { 
					$this->doccy->newFile('RKS PL diatas 500.docx');
				} else {
					$this->doccy->newFile('RKS PL dibawah 500.docx');
				}
			} else if ($metode_pengadaan=="Pemilihan Langsung"){
				if($NDP->nilai_biaya_rab>500000000) { 
					$this->doccy->newFile('RKS PM di atas 500.docx');
				} else {
					$this->doccy->newFile('RKS PM di bawah 500.docx');
				}
			} else if ($metode_pengadaan=="Pelelangan"){
				if($RKS->tipe_rks==1) {
					$this->doccy->newFile('RKS Pelelangan Format 1.docx');
				} else if($RKS->tipe_rks==2){
					$this->doccy->newFile('RKS Pelelangan Format 2.docx');
				}
			}
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			$this->doccy->phpdocx->assignToHeader('#nomor rks#', $nomor_rks);
			$this->doccy->phpdocx->assignToHeader('#tanggal rks#', $tanggal_rks);
			$this->doccy->phpdocx->assign('#nomor rks#', $nomor_rks);
			$this->doccy->phpdocx->assign('#nama pengadaan#', $nama_pengadaan);
			$this->doccy->phpdocx->assign('#nama pengadaan kapital#', strtoupper($nama_pengadaan));
			$this->doccy->phpdocx->assign('#tempat surat#', $tempatsurat);
			$this->doccy->phpdocx->assign('#tanggal rks#', $tanggal_rks);
			$this->doccy->phpdocx->assign('#tanggal permintaan#', $tanggal_permintaan);
			$this->doccy->phpdocx->assign('#tanggal pendaftaran#', $tanggal_pendaftaran);
			$this->doccy->phpdocx->assign('#tanggal pengambilan1#', $tanggal_pengambilan_dokumen1);
			$this->doccy->phpdocx->assign('#hari tanggal pengambilan1#', $hari_tanggal_pengambilan_dokumen1);
			$this->doccy->phpdocx->assign('#tanggal pengambilan2#', $tanggal_pengambilan_dokumen2);
			$this->doccy->phpdocx->assign('#hari tanggal pengambilan2#', $hari_tanggal_pengambilan_dokumen2);
			$this->doccy->phpdocx->assign('#waktu pengambilan1#', $waktu_pengambilan_dokumen1);
			$this->doccy->phpdocx->assign('#waktu pengambilan2#', $waktu_pengambilan_dokumen2);
			$this->doccy->phpdocx->assign('#tempat pengambilan#', $tempat_pengambilan_dokumen);
			$this->doccy->phpdocx->assign('#tanggal penjelasan#', $tanggal_penjelasan);
			$this->doccy->phpdocx->assign('#hari tanggal penjelasan#', $hari_tanggal_penjelasan);
			$this->doccy->phpdocx->assign('#waktu penjelasan#', $waktu_penjelasan);
			$this->doccy->phpdocx->assign('#tempat penjelasan#', $tempat_penjelasan);
			$this->doccy->phpdocx->assign('#tanggal awal pemasukan#', $tanggal_awal_pemasukan);
			$this->doccy->phpdocx->assign('#tanggal akhir pemasukan#', $tanggal_akhir_pemasukan);
			$this->doccy->phpdocx->assign('#waktu pemasukan#', $waktu_pemasukan);
			$this->doccy->phpdocx->assign('#tempat pemasukan#', $tempat_pemasukan);
			$this->doccy->phpdocx->assign('#tanggal pembukaan#', $tanggal_pembukaan);
			$this->doccy->phpdocx->assign('#hari tanggal pembukaan#', $hari_tanggal_pembukaan);
			$this->doccy->phpdocx->assign('#waktu pembukaan#', $waktu_pembukaan);
			$this->doccy->phpdocx->assign('#tempat pembukaan#', $tempat_pembukaan);
			$this->doccy->phpdocx->assign('#tanggal evaluasi#', $tanggal_evaluasi);
			$this->doccy->phpdocx->assign('#waktu evaluasi#', $waktu_evaluasi);
			$this->doccy->phpdocx->assign('#tempat evaluasi#', $tempat_evaluasi);
			$this->doccy->phpdocx->assign('#tanggal negosiasi#', $tanggal_negosiasi);
			$this->doccy->phpdocx->assign('#waktu negosiasi#', $waktu_negosiasi);
			$this->doccy->phpdocx->assign('#tempat negosiasi#', $tempat_negosiasi);
			$this->doccy->phpdocx->assign('#tanggal penetapan#', $tanggal_penetapan);
			$this->doccy->phpdocx->assign('#waktu penetapan#', $waktu_penetapan);
			$this->doccy->phpdocx->assign('#pengguna#', Divisi::model()->findByPk($Peng->divisi_peminta)->nama_divisi);
			$this->doccy->phpdocx->assign('#kalimatpanitia/pejabat#', $kalimat);
			$this->doccy->phpdocx->assign('#kalimat penjelasan panitia#', $kalimat2);
			$this->doccy->phpdocx->assign('#jenis panitia#', $jenis_panitia);
			$this->doccy->phpdocx->assign('#jenis panitia kapital#', $jenis_panitia_kapital);
			$this->doccy->phpdocx->assign('#sumber dana#', $sumber_dana);
			$this->doccy->phpdocx->assign('#metode pengadaan#', $metode_pengadaan);
			$this->doccy->phpdocx->assign('#metode penawaran#', $metode_penawaran);
			$this->doccy->phpdocx->assign('#jenis kualifikasi#', $jenis_kualifikasi);
			$this->doccy->phpdocx->assign('#sistem evaluasi#', $sistem_evaluasi);
			$this->doccy->phpdocx->assign('#kualifikasi#', $kualifikasi);
			$this->doccy->phpdocx->assign('#klasifikasi#', $klasifikasi);
			$this->doccy->phpdocx->assign('#bidang usaha#', $bidangusaha);
			$this->doccy->phpdocx->assign('#sub bidang usaha#', $subbidangusaha);
			$this->doccy->phpdocx->assign('#jangka waktu penyerahan#', $jangka_waktu_penyerahan);
			$this->doccy->phpdocx->assign('#terbilang jangka waktu#', $terbilang_jangka_waktu_penyerahan);
			$this->doccy->phpdocx->assign('#lama berlaku jaminan#', $lama_berlaku_jaminan);
			$this->doccy->phpdocx->assign('#terbilang lama berlaku jaminan#', $terbilang_lama_berlaku_jaminan);
			$this->doccy->phpdocx->assign('#pengesah#', $pengesah);
			$this->doccy->phpdocx->assign('#nama pengesah#', $nama_pengesah);
			$this->doccy->phpdocx->assign('#listpanitia#', $listpanitia);					
			$this->renderDocx("RKS-Isi-".$Peng->nama_pengadaan.".docx", true);
		
		} else if ($Rincian->nama_rincian=="Lampiran 1") {
//------------------------Lampiran 1
			$this->doccy->newFile('Lamp 1.docx');
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			$this->doccy->phpdocx->assign('#nomor rks#', $RKS->nomor);
			$this->doccy->phpdocx->assign('#tanggalrks#', Tanggal::getTanggalLengkap($DokRKS->tanggal));
			$this->doccy->phpdocx->assign('#namapengadaan#', $Peng->nama_pengadaan);
			$this->doccy->phpdocx->assign('#jenispanitia#', strtoupper($Panitia->jenis_panitia));
			$this->doccy->phpdocx->assign('#jangkawaktupenyerahan#', $RKS->jangka_waktu_penyerahan);
			$this->doccy->phpdocx->assign('#terbilangjangkawaktupenyerahan#', RupiahMaker::terbilangMaker($RKS->jangka_waktu_penyerahan));
			$this->renderDocx("RKS-Lamp 1.docx", true);
		} else if ($Rincian->nama_rincian=="Lampiran 4") {
//--------------------Lampiran 4
			$this->doccy->newFile('Lamp 4.docx');
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer

			$this->doccy->phpdocx->assign('#namapenyedia#', '....................');
			$this->doccy->phpdocx->assign('#divisipeminta#', '....................');
			$this->renderDocx("RKS-Lamp 4.docx", true);
		} else if ($Rincian->nama_rincian=="Lampiran 5") {
//---------------------Lampiran 5
			$nama_pengadaan = strtoupper($Peng->nama_pengadaan);
			$nomor_rks = $RKS->nomor;
			$tanggal_rks = Tanggal::getTanggalLengkap($DokRKS->tanggal);
			$metode_pengadaan = strtoupper($Peng->metode_pengadaan);					
			$this->doccy->newFile('Lamp 5.docx');
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			$this->doccy->phpdocx->assign('#nomor rks#', $nomor_rks);
			$this->doccy->phpdocx->assign('#tanggal rks#', $tanggal_rks);
			$this->doccy->phpdocx->assign('#nama pengadaan#', $nama_pengadaan);
			$this->doccy->phpdocx->assign('#metodepengadaan#', $metode_pengadaan);
			$this->renderDocx("RKS-Lamp 5.docx", true);
		} else if ($Rincian->nama_rincian=="Lampiran 7") {
//---------------------Lampiran 7
			$jenis_panitia= $Panitia->jenis_panitia;
			$this->doccy->newFile('Lamp 7.docx');
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			$this->doccy->phpdocx->assign('#jenispanitia#', $jenis_panitia);
			$this->renderDocx("RKS-Lamp 7.docx", true);
		}
	}
	
	public function actionDownload()
	{
		$id = Yii::app()->getRequest()->getQuery('id');	
		
		// $this->redirect(array('site/dashboard'));
	
		$Dok=Dokumen::model()->findByPk($id);
		$Peng=Pengadaan::model()->findByPk($Dok->id_pengadaan);
	
//	================================================================Nota Dinas================================================================
		if ($Dok->nama_dokumen == "Nota Dinas Perintah Pengadaan"){
			$NDPP=NotaDinasPerintahPengadaan::model()->findByPk($id);
			$tanggalsurat = Tanggal::getTanggalLengkap($Dok->tanggal);
			$nomor = $NDPP->nomor;
			$dari = Jabatan::model()->findByPk($NDPP->dari)->jabatan;
			$namapengirim = Kdivmum::model()->find('id_jabatan = '.$NDPP->dari.' and status_user = "Aktif"')->nama;
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
			$user = Divisi::model()->findByPk($Peng->divisi_peminta)->nama_divisi;
			$nama = $Peng->nama_pengadaan;
			$panitia = Panitia::model()->findByPk($Peng->id_panitia);
			$namapanitia=$panitia->nama_panitia;
			if($panitia->jenis_panitia=="Pejabat"){
				$sekretaris = "";
			} else {
				$sekretaris = "- Sekretaris Panitia";
			}
			$this->doccy->newFile('1 nd-perintahpengadaan.docx');
			$tembusan = $this->getTembusan($NDPP->dari);
			
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
			$this->renderDocx("Nota Dinas Perintah Pengadaan-".$Peng->nama_pengadaan.".docx", true);
		}
		else if ($Dok->nama_dokumen == "Nota Dinas Penetapan Pemenang"){
						
			$NDPP=NotaDinasPenetapanPemenang::model()->findByPk($id);	
			$nomor = $NDPP->nomor;
			
			$metode = $Peng->metode_penawaran;
			if ($metode == "Satu Sampul"){
				$tanggal = Tanggal::getTanggalLengkap($Dok->tanggal);
				$DokBAE1=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Berita Acara Evaluasi Penawaran"');
				$BAE1 = BeritaAcaraEvaluasiPenawaran::model()->findByPk($DokBAE1->id_dokumen);
				$tglBAE1 = Tanggal::getTanggalLengkap($DokBAE1->tanggal);
				$KalimatEvaluasi = "Berita Acara Evaluasi Penawaran Satu Sampul No. : ".$BAE1->nomor." tanggal ".$tglBAE1;
			}
			else if ($metode == "Dua Sampul"){
				$tanggal = Tanggal::getTanggalLengkap($Dok->tanggal);
				$DokBAE1=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Berita Acara Evaluasi Penawaran Sampul Satu"');
				$BAE1 = BeritaAcaraEvaluasiPenawaran::model()->findByPk($DokBAE1->id_dokumen);
				$tglBAE1 = Tanggal::getTanggalLengkap($DokBAE1->tanggal);
				$DokBAE2=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Berita Acara Evaluasi Penawaran Sampul Dua"');
				$BAE2 = BeritaAcaraEvaluasiPenawaran::model()->findByPk($DokBAE2->id_dokumen);
				$tglBAE2 = Tanggal::getTanggalLengkap($DokBAE2->tanggal);
				$KalimatEvaluasi = "Berita Acara Evaluasi Adminitrasi dan Teknis (Sampul I) No. : ".$BAE1->nomor." tanggal ".$tglBAE1." dan Berita Acara Evaluasi Penawaran Harga (Sampul II) No. : ".$BAE2->nomor." tanggal ".$tglBAE2;
			
			}
			else if ($metode == "Dua Tahap"){
				$DokBAE1=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Berita Acara Evaluasi Penawaran Tahap Satu"');
				$BAE1 = BeritaAcaraEvaluasiPenawaran::model()->findByPk($DokBAE1->id_dokumen);
				$tglBAE1 = Tanggal::getTanggalLengkap($DokBAE1->tanggal);
				$DokBAE2=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Berita Acara Evaluasi Penawaran Tahap Dua"');
				$BAE2 = BeritaAcaraEvaluasiPenawaran::model()->findByPk($DokBAE2->id_dokumen);
				$tglBAE2 = Tanggal::getTanggalLengkap($DokBAE2->tanggal);
				$KalimatEvaluasi = "Berita Acara Evaluasi Adminitrasi dan Teknis (Tahap I) No. : ".$BAE1->nomor." tanggal ".$tglBAE1." dan Berita Acara Evaluasi Penawaran Harga (Tahap II) No. : ".$BAE2->nomor." tanggal ".$tglBAE2;
			
			}
			
			$tanggal = Tanggal::getTanggalLengkap($Dok->tanggal);
			
			$dokndup=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Nota Dinas Usulan Pemenang"');
			$ndup = NotaDinasUsulanPemenang::model()->findByPk($dokndup->id_dokumen);
			
			$dokndpp=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Nota Dinas Perintah Pengadaan"');
			$ndpp = NotaDinasPerintahPengadaan::model()->findByPk($dokndpp->id_dokumen);
			$pengirim = Jabatan::model()->findByPk($ndpp->dari)->jabatan;
			$namapengirim =Kdivmum::model()->find('id_jabatan = '.$ndpp->dari.' and status_user = "Aktif"')->nama;
			if(Panitia::model()->findByPk($Peng->id_panitia)->jenis_panitia == 'Pejabat'){
				$pejabatketuapanitia = "Pejabat";
			}else{
				$pejabatketuapanitia = "Ketua Panitia";
			}
			
			$nama = $Peng->nama_pengadaan;
			
			$this->doccy->newFile('14 Nota Dinas Penetapan Pemenang.docx');
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			$this->doccy->phpdocx->assign('#nomor#', $nomor);
			$this->doccy->phpdocx->assign('#pejabat/ketuapanitia#', $ndpp->kepada);
			$this->doccy->phpdocx->assign('#KDIVMUM/MSDAF#', $pengirim);
			$this->doccy->phpdocx->assign('#namaKDIVMUM/MSDAF#', $namapengirim);
			$this->doccy->phpdocx->assign('#KetuaPanitia/Pejabat#', $pejabatketuapanitia);
			$this->doccy->phpdocx->assign('#nousulan#', $ndup->nomor);
			$this->doccy->phpdocx->assign('#tanggalusulan#', Tanggal::getTanggalLengkap($dokndup->tanggal));
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#sifat#', 'Biasa');	
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->doccy->phpdocx->assign('#penyedia#', $this->getPenyediaLulusPenetapanPemenang($Peng->id_pengadaan));
			$this->doccy->phpdocx->assign('#kalimatevaluasi#', $KalimatEvaluasi);
			$this->renderDocx("Nota Dinas Penetapan Pemenang-".$Peng->nama_pengadaan.".docx", true);
	
		}
		else if ($Dok->nama_dokumen == "Nota Dinas Usulan Pemenang"){
			
			$NDUP=NotaDinasUsulanPemenang::model()->findByPk($id);	
			$DokRKS=Dokumen::model()->find('id_pengadaan = '.$Peng->id_pengadaan.' and nama_dokumen = "RKS"');
			$RKS=Rks::model()->findByPk($DokRKS->id_dokumen);
			$metode = $Peng->metode_pengadaan;
			$nama = $Peng->nama_pengadaan;			
			$nomor = $NDUP->nomor;
			$Panitia = Panitia::model()->findByPk($Peng->id_panitia);
			if ($Panitia->jenis_panitia=="Panitia") {
				$dari = "Ketua ".$Panitia->nama_panitia;
			} else {
				$dari = Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Pejabat" and status_user = "Aktif"')->nama;
			}
			$tanggal = Tanggal::getTanggalLengkap($Dok->tanggal);
			$waktu = $RKS->lama_pelaksanaan;
			$tempat = $RKS->tempat_penyerahan;
			
			$dokNDPP = Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Nota Dinas Perintah Pengadaan"');
			$ndpp = NotaDinasPerintahPengadaan::model()->findByPk($dokNDPP->id_dokumen);
			$nomorndpp = $ndpp->nomor;
			$penerima = Jabatan::model()->findByPk($ndpp->dari)->jabatan;
			$dokNDP = Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Nota Dinas Permintaan"');
			$ndp = NotaDinasPermintaan::model()->findByPk($dokNDP->id_dokumen)->nomor;

				if(($metode == "Pelelangan")||($metode == "Pemilihan Langsung")){
				$this->doccy->newFile('13 Nota Dinas Usulan Pemenang(lelang-pilih).docx');
				$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
				$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
				$this->doccy->phpdocx->assign('#metodepengadaan#', $metode);
			}
			else{
				$PP = PenerimaPengadaan::model()->find('usulan_pemenang = "1"  and id_pengadaan = ' . $Peng->id_pengadaan);
				
				$this->doccy->newFile('13 Nota Dinas Usulan Pemenang(tunjuk).docx');
				$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
				$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
				
				$this->doccy->phpdocx->assign('#penyedia#', $PP->perusahaan);
				$this->doccy->phpdocx->assign('#alamatpenyedia#', $PP->alamat);
				$this->doccy->phpdocx->assign('#NPWP#', $PP->npwp);				
				$this->doccy->phpdocx->assign('#biaya#', $PP->biaya);
				$this->doccy->phpdocx->assign('#terbilang#', RupiahMaker::terbilangMaker($PP->biaya));
			}
			if ($Panitia->jenis_panitia=="Panitia") {
				$ketua = "Ketua ".$Panitia->nama_panitia;
				$this->doccy->phpdocx->assign('#panitia/pejabat#',$Panitia->nama_panitia);
			} else {
				$ketua = Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Pejabat" and status_user = "Aktif"')->nama;
				$this->doccy->phpdocx->assign('#panitia/pejabat#',"Pejabat");
			}
			$this->doccy->phpdocx->assign('#nomor#', $nomor);
			$this->doccy->phpdocx->assign('#dari#', $ketua);
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#penerima#', $penerima);
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);			
			$this->doccy->phpdocx->assign('#waktupelaksanaan#', $waktu);
			$this->doccy->phpdocx->assign('#tempatpenyerahan#', $tempat);						
			$this->doccy->phpdocx->assign('#suratkeputusandireksi#', Panitia::model()->findByPk($Peng->id_panitia)->SK_panitia);			
			$this->doccy->phpdocx->assign('#nondpermintaan#', $ndp);
			$this->doccy->phpdocx->assign('#nondpp#', $nomorndpp);
			
			$jenispic = Panitia::model()->findByPk($Peng->id_panitia)->jenis_panitia;						
			$this->doccy->phpdocx->assign('#tdtgnpic#', $this->getListPanitiaNegoKlar($Peng->id_panitia));			
			$this->doccy->phpdocx->assign('#pejabatataupanitia#', $jenispic . " " . $nama);			
			$this->doccy->phpdocx->assign('#listpeserta#', $this->getPenyediaLulusKesimpulan($Peng->id_pengadaan, 'usulan_pemenang') );			
			$this->doccy->phpdocx->assign('#metode#', $metode);
			$this->doccy->phpdocx->assign('#ketuapanitia/pejabat#', NotaDinasPerintahPengadaan::model()->findByPk($dokNDPP->id_dokumen)->kepada);
			$this->renderDocx("Nota Dinas Usulan Pemenang-".$Peng->nama_pengadaan.".docx", true);
		}
		else if ($Dok->nama_dokumen == "Nota Dinas Pemberitahuan Pemenang"){
			$this->doccy->newFile('14b Nota Dinas Pemberitahuan Pemenang.docx');
			
			$PP = PenerimaPengadaan::model()->find('penetapan_pemenang = "1"  and id_pengadaan = ' . $Peng->id_pengadaan);
			
			$ndbp=NotaDinasPemberitahuanPemenang::model()->findByPk($Dok->id_dokumen);
			if ($Peng->jenis_kualifikasi == "Pasca Kualifikasi") {
				$doksupph = Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Surat Undangan Permintaan Penawaran Harga"');
				$supph=SuratUndanganPermintaanPenawaranHarga::model()->findByPk($doksupph->id_dokumen);
				$kalimatundaganpqatauspph= 'Sehubungan dengan Surat Permintaan Penawaran Harga No. '.$supph->nomor.' tanggal '.Tanggal::getTanggalLengkap($doksupph->tanggal).',';
			} else {
				$doksupk = Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Surat Pengumuman Hasil Kualifikasi"');
				$supk=PengumumanHasilPrakualifikasi::model()->findByPk($doksupk->id_dokumen);
				$kalimatundaganpqatauspph= 'Sehubungan dengan Surat Pengumuman Hasil Kualifikasi No. '.$supk->nomor.' tanggal '.Tanggal::getTanggalLengkap($doksupk->tanggal).',';
			}
			$panitia = Panitia::model()->findByPk($Peng->id_panitia);
			$dokpenetapan=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Nota Dinas Penetapan Pemenang"');
			$penetapan = NotaDinasPenetapanPemenang::model()->findByPk($dokpenetapan->id_dokumen);			
			$dokndpp=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Nota Dinas Perintah Pengadaan"');
			$ndpp = NotaDinasPerintahPengadaan::model()->findByPk($dokndpp->id_dokumen);		
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#nomor#', $ndbp->nomor);
			$this->doccy->phpdocx->assign('#tanggal#', Tanggal::getTanggalLengkap($Dok->tanggal));
			$this->doccy->phpdocx->assign('#kalimatundaganpqatauspph#', $kalimatundaganpqatauspph);
			$this->doccy->phpdocx->assign('#nondpenetapan#', $penetapan->nomor);
			$this->doccy->phpdocx->assign('#tglpenetapan#', Tanggal::getTanggalLengkap($dokpenetapan->tanggal));
			$this->doccy->phpdocx->assign('#penyedia#', $PP->perusahaan);
			$this->doccy->phpdocx->assign('#biaya#', RupiahMaker::convertInt($PP->biaya));
			$this->doccy->phpdocx->assign('#keterangan#', $ndbp->keterangan);
			$this->doccy->phpdocx->assign('#deadline#', $ndbp->batas_sanggahan);
			$this->doccy->phpdocx->assign('#deadlineterbilang#', RupiahMaker::terbilangMaker($ndbp->batas_sanggahan));
			$this->doccy->phpdocx->assign('#namapengadaan#', $Peng->nama_pengadaan);
			$this->doccy->phpdocx->assign('#panitia/pejabat2#', $panitia->jenis_panitia);
			$this->doccy->phpdocx->assign('#penyediadetail#', $this->getPenyediaLulusPenetapanPemenang($Peng->id_pengadaan));
			$this->doccy->phpdocx->assign('#PemberiTugas#', Jabatan::model()->findByPk($ndpp->dari)->jabatan);
			$this->doccy->phpdocx->assign('#NamaPemberiTugas#', Kdivmum::model()->find('id_jabatan = '.$ndpp->dari.' and status_user = "Aktif"')->nama);
			
			if($panitia->jenis_panitia == 'Panitia'){
				$this->doccy->phpdocx->assign('#namaketua#', Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Ketua"')->nama);
				$this->doccy->phpdocx->assign('#kalimat#', 'Ketua');
			}else{
				$this->doccy->phpdocx->assign('#namaketua#', Panitia::model()->findByPk($Peng->id_panitia)->nama_panitia);
				$this->doccy->phpdocx->assign('#kalimat#', '');
			}
			if($Peng->jenis_kualifikasi=="Pasca Kualifikasi"){
				$this->doccy->phpdocx->assign('#listpeserta#', $this->getPenyediaX($Peng->id_pengadaan,'undangan_supph'));
			} else {
				$this->doccy->phpdocx->assign('#listpeserta#', $this->getPenyediaX($Peng->id_pengadaan,'undangan_prakualifikasi'));
			}
			$this->renderDocx("Nota Dinas Pemberitahuan Pemenang-".$Peng->nama_pengadaan.".docx", true);
		}
		else if ($Dok->nama_dokumen == "Nota Dinas Permintaan TOR/RAB"){
			$NDPTR=NotaDinasPermintaanTorRab::model()->findByPk($id);
			$tanggalsurat = Tanggal::getTanggalLengkap($Dok->tanggal);
			$nomor = $NDPTR->nomor;
			$kepada = Divisi::model()->findByPk($Peng->divisi_peminta)->nama_divisi;
			$permintaan = $NDPTR->permintaan;
			$namapengadaan = $Peng->nama_pengadaan;
			$DokNDP = Dokumen::model()->find('id_pengadaan = '.$Peng->id_pengadaan. ' and nama_dokumen = "Nota Dinas Permintaan"');
			$NDP= NotaDinasPermintaan::model()->findByPk($DokNDP->id_dokumen);
			$notadinaspermintaan = $NDP->nomor;
			$tanggalpermintaan = Tanggal::getTanggalLengkap($DokNDP->tanggal);
			$perihalpermintaan = $NDP->perihal;
			$namakadiv = kdivmum::model()->find('jabatan = "KDIVMUM"')->nama;
			
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
			$this->renderDocx("Nota Dinas Permintaan TOR RAB-".$Peng->nama_pengadaan.".docx", true);
		}
		else if ($Dok->nama_dokumen == "Nota Dinas Usulan Hasil Prakualifikasi"){
			$this->doccy->newFile('4c Nota Dinas Usulan Penetapan.docx');
			
			$NDUPN=NotaDinasUsulanPenetapan::model()->findByPk($Dok->id_dokumen);
			$nomor=$NDUPN->nomor;
			
			$Panitia = Panitia::model()->findByPk($Peng->id_panitia);
			if ($Panitia->jenis_panitia=="Panitia") {
				$dari = "Ketua ".$Panitia->nama_panitia;
				$panitiapejabat = Anggota::model()->find('id_panitia ='.$Peng->id_panitia.' and jabatan = "Ketua"')->nama;
				$this->doccy->phpdocx->assign('#panitia/pejabat#', $panitiapejabat);
			} else {
				$dari = Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Pejabat" and status_user = "Aktif"')->nama;				
				$this->doccy->phpdocx->assign('#panitia/pejabat#', $dari);
			}

			$tanggal = Tanggal::getTanggalLengkap($Dok->tanggal);
			$dokNDPP = Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Nota Dinas Perintah Pengadaan"');
			$ndpp = NotaDinasPerintahPengadaan::model()->findByPk($dokNDPP->id_dokumen);
			$penerima = Jabatan::model()->findByPk($ndpp->dari)->jabatan;
			$namapengadaan = $Peng->nama_pengadaan;
			$metode = $Peng->metode_pengadaan;
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#nomor#', $nomor);
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#penerima#', $penerima);
			$this->doccy->phpdocx->assign('#dari#', $dari);
			$this->doccy->phpdocx->assign('#metode#', $metode);
			$this->doccy->phpdocx->assign('#namapengadaan#', $namapengadaan);	
			
			$this->doccy->phpdocx->assign('#listpenyedia#', $this->getPenyediaLulusX($Peng->id_pengadaan,'usulan_hasil_pq'));	
			
			$this->renderDocx("Nota Dinas Usulan Hasil Prakualifikasi-".$Peng->nama_pengadaan.".docx", true);
		}
		else if ($Dok->nama_dokumen == "Nota Dinas Penetapan Hasil Prakualifikasi"){
			$this->doccy->newFile('4d Nota Dinas Penetapan Kualifikasi.docx');
			
			$NDPK=NotaDinasPenetapanKualifikasi::model()->findByPk($Dok->id_dokumen);
			$nomor=$NDPK->nomor;
			$tanggal = Tanggal::getTanggalLengkap($Dok->tanggal);
			
			$dokndupn=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Nota Dinas Usulan Hasil Prakualifikasi"');
			$NDUPN = NotaDinasUsulanPenetapan::model()->findByPk($dokndupn->id_dokumen);
			$nousulan = $NDUPN->nomor;
			$tanggalusulan = Tanggal::getTanggalLengkap($dokndupn->tanggal);
			
			$dokndpp=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Nota Dinas Perintah Pengadaan"');
			$ndpp = NotaDinasPerintahPengadaan::model()->findByPk($dokndpp->id_dokumen);
			$namapengirim = Kdivmum::model()->find('id_jabatan = "'.$ndpp->dari.'" and status_user = "Aktif"')->nama;
			$pejabatketuapanitia = $ndpp->kepada;
			$dari = Jabatan::model()->findByPk($ndpp->dari)->jabatan;
			if(Panitia::model()->findByPk($Peng->id_panitia)->jenis_panitia == 'Pejabat'){
				$pejabatpanitia = "Pejabat";
			}else{
				$pejabatpanitia = "Ketua Panitia";
			}
			$namapengadaan = $Peng->nama_pengadaan;
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#nomor#', $nomor);
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#KDIVMUM/MSDAF#', $dari);
			$this->doccy->phpdocx->assign('#pejabat/ketuapanitia#', $pejabatketuapanitia);
			$this->doccy->phpdocx->assign('#KetuaPanitia/Pejabat#', $pejabatpanitia);
			$this->doccy->phpdocx->assign('#nousulan#', $nousulan);
			$this->doccy->phpdocx->assign('#tanggalusulan#', $tanggalusulan);
			$this->doccy->phpdocx->assign('#namapengadaan#', $namapengadaan);
			$this->doccy->phpdocx->assign('#namaKDIVMUM/MSDAF#', $namapengirim);
			$this->doccy->phpdocx->assign('#listpenyedia#', $this->getPenyediaLulusX($Peng->id_pengadaan,'penetapan_pq'));	
			
			$this->renderDocx("Nota Dinas Penetapan Hasil Prakualifikasi-".$Peng->nama_pengadaan.".docx", true);
		}
		else if ($Dok->nama_dokumen == "Nota Dinas Laporan Pengadaan Gagal"){
			$dokrks=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "RKS"');
			if ($dokrks!=null){
				$RKS=Rks::model()->findByPk($dokrks->id_dokumen);
				$tglawalpengumuman=Tanggal::getTanggalLengkap($RKS->tanggal_pengambilan_dokumen1);
				$tglakhirpengumuman=Tanggal::getTanggalLengkap($RKS->tanggal_pengambilan_dokumen2);
			}
			
			if ($Peng->metode_pengadaan == "Pelelangan"){
				$this->doccy->newFile('Nota Dinas Pengadaan Lelang Gagal Panitia.docx');
				if ($Peng->jenis_kualifikasi == "Pra Kualifikasi"){
					$doksppp=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Surat Pengumuman Pelelangan Prakualifikasi"');
					if ($doksppp!=null){
						$SPPP=SuratPengumumanPelelangan::model()->findByPk($doksppp->id_dokumen);
						$nopengumuman=$SPPP->nomor;
						$tglpengumuman=$doksppp->tanggal;
						$jumlahpesertadaftar=$this->getPenyediaLulusX($Peng->id_pengadaan,'pendaftaran_pelelangan_pq');
					} else {
						$nopengumuman="-- TIDAK ADA --";
						$tglpengumuman="-- TIDAK ADA --";
						$jumlahpesertadaftar="-- TIDAK ADA --";
					}
				} else {
					$dokspp=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Surat Pengumuman Pelelangan"');
					if ($dokspp!=null){
						$SPP=SuratPengumumanPelelangan::model()->findByPk($dokspp->id_dokumen);
						$nopengumuman=$SPP->nomor;
						$tglpengumuman=$dokspp->tanggal;
						$jumlahpesertadaftar=$this->getPenyediaLulusX($Peng->id_pengadaan,'pendaftaran_pc');
					} else {
						$nopengumuman="-- TIDAK ADA --";
						$tglpengumuman="-- TIDAK ADA --";
						$jumlahpesertadaftar="-- TIDAK ADA --";
					}
				}
			} else {
				$this->doccy->newFile('Nota Dinas Pengadaan Gagal Panitia.docx');
			}
			
			$NDPGP=NotaDinasPengadaanGagalPanitia::model()->findByPk($Dok->id_dokumen);
			$nomornotadinas=$NDPGP->nomor;
			$tanggalsurat = Tanggal::getTanggalLengkap($Dok->tanggal);
			$namapengadaan = $Peng->nama_pengadaan;
			
			$dokbap=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Berita Acara Aanwijzing"');
			if ($dokbap!=null){
				$BAP=BeritaAcaraPenjelasan::model()->findByPk($dokbap->id_dokumen);
				$nobaaanwijzing=$BAP->nomor;
				$tglbaaanwijzing=Tanggal::getTanggalLengkap($dokbap->tanggal);
				$tglaanwijzing=$RKS->tanggal_penjelasan;
				$jumlahpesertaaanwijzing=$this->getPenyediaLulusX($Peng->id_pengadaan,'ba_aanwijzing');
			} else {
				$nobaaanwijzing="-- TIDAK ADA --";
				$tglbaaanwijzing="-- TIDAK ADA --";
				$tglaanwijzing="-- TIDAK ADA --";
				$jumlahpesertaaanwijzing="-- TIDAK ADA --";
			}
			
			if ($Peng->metode_penawaran == "Satu Sampul"){
				$dokbapp=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Berita Acara Pembukaan Penawaran"');
			} else if ($Peng->metode_penawaran == "Dua Sampul"){
				$dokbapp=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Berita Acara Pembukaan Penawaran Sampul Satu"');
			} else {
				$dokbapp=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Berita Acara Pembukaan Penawaran Tahap Satu"');
			}
			if ($dokbapp!=null){
				$BAPP=BeritaAcaraPembukaanPenawaran::model()->findByPk($dokbapp->id_dokumen);
				$tglpemasukandokumen=Tanggal::getTanggalLengkap($RKS->tanggal_akhir_pemasukan_penawaran1);
				$waktupemasukandokumen=Tanggal::getJamMenit($RKS->waktu_pemasukan_penawaran1);
				$nobapembukaandokumen=$BAPP->nomor;
				$tglbapembukaandokumen=Tanggal::getTanggalLengkap($dokbapp->tanggal);
				$tglpembukaandokumen=Tanggal::getTanggalLengkap($RKS->tanggal_pembukaan_penawaran1);
				$waktupembukaandokumen=Tanggal::getJamMenit($RKS->waktu_pembukaan_penawaran1);
			} else {
				$tglpemasukandokumen="-- TIDAK ADA --";
				$waktupemasukandokumen="-- TIDAK ADA --";
				$nobapembukaandokumen="-- TIDAK ADA --";
				$tglbapembukaandokumen="-- TIDAK ADA --";
				$tglpembukaandokumen="-- TIDAK ADA --";
				$waktupembukaandokumen="-- TIDAK ADA --";
			}
			
			if ($Peng->metode_penawaran == "Satu Sampul"){
				$dokbaep=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Berita Acara Evaluasi Penawaran"');
			} else if ($Peng->metode_penawaran == "Dua Sampul"){
				$dokbaep=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Berita Acara Evaluasi Penawaran Sampul Satu"');
			} else {
				$dokbaep=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Berita Acara Evaluasi Penawaran Tahap Satu"');
			}
			if ($dokbapp!=null){
				$BAEP=BeritaAcaraEvaluasiPenawaran::model()->findByPk($dokbaep->id_dokumen);
				$nobaevaluasi=$BAEP->nomor;
				$tglbaevaluasi=Tanggal::getTanggalLengkap($dokbaep->tanggal);
				$tglevaluasi=Tanggal::getTanggalLengkap($RKS->tanggal_evaluasi_penawaran1);
				$jumlahpesertaevaluasi=$this->getPenyediaLulusX($Peng->id_pengadaan,'evaluasi_penawaran_1');
			} else {
				$nobapembukaandokumen="-- TIDAK ADA --";
				$tglbapembukaandokumen="-- TIDAK ADA --";
				$tglpembukaandokumen="-- TIDAK ADA --";
				$jumlahpesertaevaluasi="-- TIDAK ADA --";
			}
			
			$dokndpp = Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Nota Dinas Perintah Pengadaan"');
			$NDPP = NotaDinasPerintahPengadaan::model()->findByPk($dokndpp->id_dokumen);
			if ($NDPP->dari == "1"){
				$kepada = "KDIVMUM";
			} else {
				$kepada = "MSDAF";
			}
			$ketuapanitiapejabat = $NDPP->kepada;
			$tahun = Tanggal::getTahun($Dok->tanggal);
			$divisipeminta = Divisi::model()->findByPk($Peng->divisi_peminta)->nama_divisi;
			if(Panitia::model()->findByPk($Peng->id_panitia)->jenis_panitia == 'Pejabat'){
				$panitiapejabat = "Pejabat Pengadaan Barang/Jasa";
			}else{
				$panitiapejabat = "Panitia Pengadaan Barang/Jasa";
			}
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#nomornotadinas#', $nomornotadinas);
			$this->doccy->phpdocx->assign('#tanggalsurat#', $tanggalsurat);
			$this->doccy->phpdocx->assign('#kepada#', $kepada);
			$this->doccy->phpdocx->assign('#panitia/pejabat#', $panitiapejabat);
			$this->doccy->phpdocx->assign('#namapengadaan#', $namapengadaan);
			$this->doccy->phpdocx->assign('#tglawalpengumuman#', $tglawalpengumuman);
			$this->doccy->phpdocx->assign('#tglakhirpengumuman#', $tglakhirpengumuman);
			$this->doccy->phpdocx->assign('#nopengumuman#', $nopengumuman);
			$this->doccy->phpdocx->assign('#tglpengumuman#', $tglpengumuman);
			$this->doccy->phpdocx->assign('#tglawalpendaftaran#', '.............');
			$this->doccy->phpdocx->assign('#tglakhirpendaftaran#', '.............');
			$this->doccy->phpdocx->assign('#jumlahpesertadaftar#', $jumlahpesertadaftar);
			$this->doccy->phpdocx->assign('#tglaanwijzing#', $tglaanwijzing);
			$this->doccy->phpdocx->assign('#jumlahpesertaaanwijzing#', $jumlahpesertaaanwijzing);
			$this->doccy->phpdocx->assign('#nobaaanwijzing#', $nobaaanwijzing);
			$this->doccy->phpdocx->assign('#tglbaaanwijzing#', $tglbaaanwijzing);
			$this->doccy->phpdocx->assign('#tglpemasukandokumen#', $tglpemasukandokumen);
			$this->doccy->phpdocx->assign('#waktupemasukandokumen#', $waktupemasukandokumen);
			$this->doccy->phpdocx->assign('#tglpembukaandokumen#', $tglpembukaandokumen);
			$this->doccy->phpdocx->assign('#waktupembukaandokumen#', $waktupembukaandokumen);
			$this->doccy->phpdocx->assign('#nobapembukaandokumen#', $nobapembukaandokumen);
			$this->doccy->phpdocx->assign('#tglbapembukaandokumen#', $tglbapembukaandokumen);
			$this->doccy->phpdocx->assign('#tglevaluasi#', $tglevaluasi);
			$this->doccy->phpdocx->assign('#nobaevaluasi#', $nobaevaluasi);
			$this->doccy->phpdocx->assign('#tglbaevaluasi#', $tglbaevaluasi);
			$this->doccy->phpdocx->assign('#jumlahpesertaevaluasi#', $jumlahpesertaevaluasi);
			$this->doccy->phpdocx->assign('#tahun#', $tahun);
			$this->doccy->phpdocx->assign('#divisipeminta#', $divisipeminta);
			$this->doccy->phpdocx->assign('#Ketuapanitia/Pejabat#', $ketuapanitiapejabat);
			
			$this->renderDocx("Nota Dinas Laporan Pengadaan Gagal-".$Peng->nama_pengadaan.".docx", true);
		}
//	=================================================================Surat-Surat=================================================================
		else if ($Dok->nama_dokumen == "Surat Undangan Pengambilan Dokumen Pengadaan"){
			
			$SUPDP=SuratUndanganPengambilanDokumenPengadaan::model()->findByPk($id);	
			$ketua = Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Ketua"')->nama;
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
			$this->doccy->phpdocx->assign('#penyedia#', $this->getPenyediaLulusX($Peng->id_pengadaan,'undangan_pengambilan_dokumen'));
			$this->renderDocx("Surat Undangan Pengambilan Dokumen Pengadaan-".$Peng->nama_pengadaan.".docx", true);
		}
		else if ($Dok->nama_dokumen == "Surat Undangan Aanwijzing") {
			
			$NDU=NotaDinasUndangan::model()->findByPk($id);
			$nomor = $NDU->nomor;
			$tanggalsurat = Tanggal::getTanggalLengkap($Dok->tanggal);
			$perihal = "Undangan Aanwijzing";
			$tanggal_undangan = Tanggal::getTanggalLengkap($NDU->tanggal_undangan);			
			$tempat = $NDU->tempat;
			$waktu = Tanggal::getJamMenit($NDU->waktu);
			$nama_pengadaan = $Peng->nama_pengadaan;
			$kegiatan = "Aanwijzing";
			$acara = $kegiatan." ".$nama_pengadaan;
			$this->doccy->newFile('8 Nota Dinas Undangan Panitia.docx');
			$this->doccy->phpdocx->assignToHeader("#HEADER1#","");
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#","");
			
			$ketua = Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Ketua"')->nama;
			$listPanitiaTanpaKetua = $this->getListPanitiaTanpaKetua($Peng->id_panitia);				
			$dokrks=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "RKS"');
			$rks=Rks::model()->findByPk($dokrks->id_dokumen);	
			$norks = $rks->nomor;
			$hari = Tanggal::getHari($tanggal_undangan);
			
			$dokNDPP=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Nota Dinas Perintah Pengadaan"');
			$NDPP=NotaDinasPerintahPengadaan::model()->findByPk($dokNDPP->id_dokumen);	
			
			$nomorNdPerintahPengadaan = $NDPP->nomor;
			$tanggalNdPerintahPengadaan = Tanggal::getTanggalLengkap($dokNDPP->tanggal);
			$perihalNdPerintahPengadaan = $NDPP->perihal;
									
			$this->doccy->phpdocx->assign('#listPanitiaTanpaKetua#', $listPanitiaTanpaKetua);
			$this->doccy->phpdocx->assign('#nomor#', $nomor);
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal_undangan);
			$this->doccy->phpdocx->assign('#tanggalsurat#', $tanggalsurat);
			$this->doccy->phpdocx->assign('#norks#', $norks);
			$this->doccy->phpdocx->assign('#pekerjaan#', $nama_pengadaan);
			$this->doccy->phpdocx->assign('#perihal#', $perihal);
			$this->doccy->phpdocx->assign('#hari#', $hari);
			$this->doccy->phpdocx->assign('#waktu#', $waktu);
			$this->doccy->phpdocx->assign('#tempat#', $tempat);
			$this->doccy->phpdocx->assign('#ketua#', $ketua);
			$this->doccy->phpdocx->assign('#kegiatan#', $kegiatan);
			$this->doccy->phpdocx->assign('#acara#', $acara);
			$this->doccy->phpdocx->assign('#nomorNdPerintahPengadaan#', $nomorNdPerintahPengadaan);
			$this->doccy->phpdocx->assign('#tanggalNdPerintahPengadaan#', $tanggalNdPerintahPengadaan);
			$this->doccy->phpdocx->assign('#perihalNdPerintahPengadaan#', $perihalNdPerintahPengadaan);						
			
			$this->renderDocx("Surat Undangan Penjelasan-".$Peng->nama_pengadaan.".docx", true);

		}
		else if ($Dok->nama_dokumen == "Surat Undangan Pembukaan Penawaran" || $Dok->nama_dokumen == "Surat Undangan Pembukaan Penawaran Sampul Satu" || $Dok->nama_dokumen == "Surat Undangan Pembukaan Penawaran Tahap Satu" || $Dok->nama_dokumen == "Surat Undangan Pembukaan Penawaran Sampul Dua" || $Dok->nama_dokumen == "Surat Undangan Pembukaan Penawaran Tahap Dua") {
			
			$NDU=NotaDinasUndangan::model()->findByPk($id);
			$nomor = $NDU->nomor;
			$tanggalsurat = Tanggal::getTanggalLengkap($Dok->tanggal);
			$tanggal_undangan = Tanggal::getTanggalLengkap($NDU->tanggal_undangan);			
			$tempat = $NDU->tempat;
			$waktu = Tanggal::getJamMenit($NDU->waktu);
			$nama_pengadaan = $Peng->nama_pengadaan;
			
			$this->doccy->newFile('8 Nota Dinas Undangan Panitia.docx');
			$this->doccy->phpdocx->assignToHeader("#HEADER1#","");
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#","");
			
			$ketua = Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Ketua"')->nama;
			$listPanitiaTanpaKetua = $this->getListPanitiaTanpaKetua($Peng->id_panitia);				
			$dokrks=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "RKS"');
			$rks=Rks::model()->findByPk($dokrks->id_dokumen);	
			$norks = $rks->nomor;
			$hari = Tanggal::getHari($tanggal_undangan);
			
			$dokNDPP=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Nota Dinas Perintah Pengadaan"');
			$NDPP=NotaDinasPerintahPengadaan::model()->findByPk($dokNDPP->id_dokumen);	
			
			$nomorNdPerintahPengadaan = $NDPP->nomor;
			$tanggalNdPerintahPengadaan = Tanggal::getTanggalLengkap($dokNDPP->tanggal);
			$perihalNdPerintahPengadaan = $NDPP->perihal;
			
			$this->doccy->phpdocx->assign('#listPanitiaTanpaKetua#', $listPanitiaTanpaKetua);
			$this->doccy->phpdocx->assign('#nomor#', $nomor);
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal_undangan);
			$this->doccy->phpdocx->assign('#tanggalsurat#', $tanggalsurat);
			$this->doccy->phpdocx->assign('#norks#', $norks);
			$this->doccy->phpdocx->assign('#pekerjaan#', $nama_pengadaan);
			$this->doccy->phpdocx->assign('#hari#', $hari);
			$this->doccy->phpdocx->assign('#waktu#', $waktu);
			$this->doccy->phpdocx->assign('#tempat#', $tempat);
			$this->doccy->phpdocx->assign('#ketua#', $ketua);
			$this->doccy->phpdocx->assign('#nomorNdPerintahPengadaan#', $nomorNdPerintahPengadaan);
			$this->doccy->phpdocx->assign('#tanggalNdPerintahPengadaan#', $tanggalNdPerintahPengadaan);
			$this->doccy->phpdocx->assign('#perihalNdPerintahPengadaan#', $perihalNdPerintahPengadaan);	
			if ($Dok->nama_dokumen == "Surat Undangan Pembukaan Penawaran"){
				$kegiatan = 'Pembukaan Penawaran';
				$acara = $kegiatan." ".$nama_pengadaan;
				$this->doccy->phpdocx->assign('#perihal#', 'Undangan Pembukaan Penawaran');
				$this->doccy->phpdocx->assign('#kegiatan#', $kegiatan);
				$this->doccy->phpdocx->assign('#acara#', $acara);
				$this->renderDocx("Surat Undangan Pembukaan Penawaran-".$Peng->nama_pengadaan.".docx", true);
			} else if ($Dok->nama_dokumen == "Surat Undangan Pembukaan Penawaran Sampul Satu"){
				$kegiatan = 'Pembukaan Penawaran Sampul Satu';
				$acara = $kegiatan." ".$nama_pengadaan;
				$this->doccy->phpdocx->assign('#perihal#', 'Undangan Pembukaan Penawaran Sampul Satu');
				$this->doccy->phpdocx->assign('#kegiatan#', $kegiatan);
				$this->doccy->phpdocx->assign('#acara#', $acara);
				$this->renderDocx("Surat Undangan Pembukaan Penawaran Sampul Satu-".$Peng->nama_pengadaan.".docx", true);
			} else if ($Dok->nama_dokumen == "Surat Undangan Pembukaan Penawaran Tahap Satu"){
				$kegiatan = 'Pembukaan Penawaran Tahap Satu';
				$acara = $kegiatan." ".$nama_pengadaan;
				$this->doccy->phpdocx->assign('#perihal#', 'Undangan Pembukaan Penawaran Tahap Satu');
				$this->doccy->phpdocx->assign('#kegiatan#', $kegiatan);
				$this->doccy->phpdocx->assign('#acara#', $acara);
				$this->renderDocx("Surat Undangan Pembukaan Penawaran Tahap Satu-".$Peng->nama_pengadaan.".docx", true);
			} else if ($Dok->nama_dokumen == "Surat Undangan Pembukaan Penawaran Sampul Dua"){
				$kegiatan = 'Pembukaan Penawaran Sampul Dua';
				$acara = $kegiatan." ".$nama_pengadaan;
				$this->doccy->phpdocx->assign('#perihal#', 'Undangan Pembukaan Penawaran Sampul Dua');
				$this->doccy->phpdocx->assign('#kegiatan#', $kegiatan);
				$this->doccy->phpdocx->assign('#acara#', $acara);
				$this->renderDocx("Surat Undangan Pembukaan Penawaran Sampul Dua-".$Peng->nama_pengadaan.".docx", true);
			} else if ($Dok->nama_dokumen == "Surat Undangan Pembukaan Penawaran Tahap Dua"){
				$kegiatan = 'Pembukaan Penawaran Tahap Dua';
				$acara = $kegiatan." ".$nama_pengadaan;
				$this->doccy->phpdocx->assign('#perihal#', 'Undangan Pembukaan Penawaran Tahap Dua');
				$this->doccy->phpdocx->assign('#kegiatan#', $kegiatan);
				$this->doccy->phpdocx->assign('#acara#', $acara);
				$this->renderDocx("Surat Undangan Pembukaan Penawaran Tahap Dua-".$Peng->nama_pengadaan.".docx", true);
			}

		}
		else if ($Dok->nama_dokumen == "Surat Undangan Evaluasi Penawaran" || $Dok->nama_dokumen == "Surat Undangan Evaluasi Penawaran Sampul Satu" || $Dok->nama_dokumen == "Surat Undangan Evaluasi Penawaran Tahap Satu" || $Dok->nama_dokumen == "Surat Undangan Evaluasi Penawaran Sampul Dua" || $Dok->nama_dokumen == "Surat Undangan Evaluasi Penawaran Tahap Dua") {
			
			$NDU=NotaDinasUndangan::model()->findByPk($id);
			$nomor = $NDU->nomor;
			$tanggalsurat = Tanggal::getTanggalLengkap($Dok->tanggal);
			$tanggal_undangan = Tanggal::getTanggalLengkap($NDU->tanggal_undangan);			
			$tempat = $NDU->tempat;
			$waktu = Tanggal::getJamMenit($NDU->waktu);
			$nama_pengadaan = $Peng->nama_pengadaan;
			
			$this->doccy->newFile('8 Nota Dinas Undangan Panitia.docx');
			$this->doccy->phpdocx->assignToHeader("#HEADER1#","");
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#","");
			
			$ketua = Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Ketua"')->nama;
			$listPanitiaTanpaKetua = $this->getListPanitiaTanpaKetua($Peng->id_panitia);				
			$dokrks=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "RKS"');
			$rks=Rks::model()->findByPk($dokrks->id_dokumen);	
			$norks = $rks->nomor;
			$hari = Tanggal::getHari($tanggal_undangan);
			
			$dokNDPP=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Nota Dinas Perintah Pengadaan"');
			$NDPP=NotaDinasPerintahPengadaan::model()->findByPk($dokNDPP->id_dokumen);	
			
			$nomorNdPerintahPengadaan = $NDPP->nomor;
			$tanggalNdPerintahPengadaan = Tanggal::getTanggalLengkap($dokNDPP->tanggal);
			$perihalNdPerintahPengadaan = $NDPP->perihal;
			
			$this->doccy->phpdocx->assign('#listPanitiaTanpaKetua#', $listPanitiaTanpaKetua);
			$this->doccy->phpdocx->assign('#nomor#', $nomor);
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal_undangan);
			$this->doccy->phpdocx->assign('#tanggalsurat#', $tanggalsurat);
			$this->doccy->phpdocx->assign('#norks#', $norks);
			$this->doccy->phpdocx->assign('#pekerjaan#', $nama_pengadaan);
			$this->doccy->phpdocx->assign('#hari#', $hari);
			$this->doccy->phpdocx->assign('#waktu#', $waktu);
			$this->doccy->phpdocx->assign('#tempat#', $tempat);
			$this->doccy->phpdocx->assign('#ketua#', $ketua);
			$this->doccy->phpdocx->assign('#nomorNdPerintahPengadaan#', $nomorNdPerintahPengadaan);
			$this->doccy->phpdocx->assign('#tanggalNdPerintahPengadaan#', $tanggalNdPerintahPengadaan);
			$this->doccy->phpdocx->assign('#perihalNdPerintahPengadaan#', $perihalNdPerintahPengadaan);	
			if ($Dok->nama_dokumen == "Surat Undangan Evaluasi Penawaran"){
				$kegiatan = 'Evaluasi Penawaran';
				$acara = $kegiatan." ".$nama_pengadaan;
				$this->doccy->phpdocx->assign('#perihal#', 'Undangan Evaluasi Penawaran');
				$this->doccy->phpdocx->assign('#kegiatan#', $kegiatan);
				$this->doccy->phpdocx->assign('#acara#', $acara);
				$this->renderDocx("Surat Undangan Evaluasi Penawaran-".$Peng->nama_pengadaan.".docx", true);
			} else if ($Dok->nama_dokumen == "Surat Undangan Evaluasi Penawaran Sampul Satu"){
				$kegiatan = 'Evaluasi Penawaran Sampul Satu';
				$acara = $kegiatan." ".$nama_pengadaan;
				$this->doccy->phpdocx->assign('#perihal#', 'Undangan Evaluasi Penawaran Sampul Satu');
				$this->doccy->phpdocx->assign('#kegiatan#', $kegiatan);
				$this->doccy->phpdocx->assign('#acara#', $acara);
				$this->renderDocx("Surat Undangan Evaluasi Penawaran Sampul Satu-".$Peng->nama_pengadaan.".docx", true);
			} else if ($Dok->nama_dokumen == "Surat Undangan Evaluasi Penawaran Tahap Satu"){
				$kegiatan = 'Evaluasi Penawaran Tahap Satu';
				$acara = $kegiatan." ".$nama_pengadaan;
				$this->doccy->phpdocx->assign('#perihal#', 'Undangan Evaluasi Penawaran Tahap Satu');
				$this->doccy->phpdocx->assign('#kegiatan#', $kegiatan);
				$this->doccy->phpdocx->assign('#acara#', $acara);
				$this->renderDocx("Surat Undangan Evaluasi Penawaran Tahap Satu-".$Peng->nama_pengadaan.".docx", true);
			} else if ($Dok->nama_dokumen == "Surat Undangan Evaluasi Penawaran Sampul Dua"){
				$kegiatan = 'Evaluasi Penawaran Sampul Dua';
				$acara = $kegiatan." ".$nama_pengadaan;
				$this->doccy->phpdocx->assign('#perihal#', 'Undangan Evaluasi Penawaran Sampul Dua');
				$this->doccy->phpdocx->assign('#kegiatan#', $kegiatan);
				$this->doccy->phpdocx->assign('#acara#', $acara);
				$this->renderDocx("Surat Undangan Evaluasi Penawaran Sampul Dua-".$Peng->nama_pengadaan.".docx", true);
			} else if ($Dok->nama_dokumen == "Surat Undangan Evaluasi Penawaran Tahap Dua"){
				$kegiatan = 'Evaluasi Penawaran Tahap Dua';
				$acara = $kegiatan." ".$nama_pengadaan;
				$this->doccy->phpdocx->assign('#perihal#', 'Undangan Evaluasi Penawaran Tahap Dua');
				$this->doccy->phpdocx->assign('#kegiatan#', $kegiatan);
				$this->doccy->phpdocx->assign('#acara#', $acara);
				$this->renderDocx("Surat Undangan Evaluasi Penawaran Tahap Dua-".$Peng->nama_pengadaan.".docx", true);
			}

		}
		else if ($Dok->nama_dokumen == "Surat Undangan Negosiasi dan Klarifikasi") {
			
			$NDU=NotaDinasUndangan::model()->findByPk($id);
			$nomor = $NDU->nomor;
			$tanggalsurat = Tanggal::getTanggalLengkap($Dok->tanggal);
			$perihal = "Undangan Klarifikasi dan Negosiasi";
			$tanggal_undangan = Tanggal::getTanggalLengkap($NDU->tanggal_undangan);			
			$tempat = $NDU->tempat;
			$waktu = Tanggal::getJamMenit($NDU->waktu);
			$nama_pengadaan = $Peng->nama_pengadaan;
			$kegiatan = "Klarifikasi dan Negosiasi";
			$acara = $kegiatan." ".$nama_pengadaan;
			$this->doccy->newFile('8 Nota Dinas Undangan Panitia.docx');
			$this->doccy->phpdocx->assignToHeader("#HEADER1#","");
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#","");
			
			$ketua = Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Ketua"')->nama;
			$listPanitiaTanpaKetua = $this->getListPanitiaTanpaKetua($Peng->id_panitia);				
			$dokrks=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "RKS"');
			$rks=Rks::model()->findByPk($dokrks->id_dokumen);	
			$norks = $rks->nomor;
			$hari = Tanggal::getHari($tanggal_undangan);
			
			$dokNDPP=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Nota Dinas Perintah Pengadaan"');
			$NDPP=NotaDinasPerintahPengadaan::model()->findByPk($dokNDPP->id_dokumen);	
			
			$nomorNdPerintahPengadaan = $NDPP->nomor;
			$tanggalNdPerintahPengadaan = Tanggal::getTanggalLengkap($dokNDPP->tanggal);
			$perihalNdPerintahPengadaan = $NDPP->perihal;
									
			$this->doccy->phpdocx->assign('#listPanitiaTanpaKetua#', $listPanitiaTanpaKetua);
			$this->doccy->phpdocx->assign('#nomor#', $nomor);
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal_undangan);
			$this->doccy->phpdocx->assign('#tanggalsurat#', $tanggalsurat);
			$this->doccy->phpdocx->assign('#norks#', $norks);
			$this->doccy->phpdocx->assign('#pekerjaan#', $nama_pengadaan);
			$this->doccy->phpdocx->assign('#perihal#', $perihal);
			$this->doccy->phpdocx->assign('#hari#', $hari);
			$this->doccy->phpdocx->assign('#waktu#', $waktu);
			$this->doccy->phpdocx->assign('#tempat#', $tempat);
			$this->doccy->phpdocx->assign('#ketua#', $ketua);
			$this->doccy->phpdocx->assign('#kegiatan#', $kegiatan);
			$this->doccy->phpdocx->assign('#acara#', $acara);
			$this->doccy->phpdocx->assign('#nomorNdPerintahPengadaan#', $nomorNdPerintahPengadaan);
			$this->doccy->phpdocx->assign('#tanggalNdPerintahPengadaan#', $tanggalNdPerintahPengadaan);
			$this->doccy->phpdocx->assign('#perihalNdPerintahPengadaan#', $perihalNdPerintahPengadaan);					
			
			$this->renderDocx("Surat Undangan Negosiasi dan Klarifikasi-".$Peng->nama_pengadaan.".docx", true);

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
			$this->renderDocx("Surat Pernyataan Minat-".$Peng->nama_pengadaan.".docx", true);
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
		else if ($Dok->nama_dokumen == "Surat Undangan Permintaan Penawaran Harga"){
			
			$SUPH=SuratUndanganPermintaanPenawaranHarga::model()->findByPk($id);
			$dokrks=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "RKS"');
			$rks=Rks::model()->findByPk($dokrks->id_dokumen);
			$nomor = $SUPH->nomor;
			$tanggal = Tanggal::getTanggalLengkap($Dok->tanggal);
			$nama = $Peng->nama_pengadaan;
			$dokNDPP=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Nota Dinas Perintah Pengadaan"');
			$NDPP=NotaDinasPerintahPengadaan::model()->findByPk($dokNDPP->id_dokumen);	
			$dari= Jabatan::model()->findByPk($NDPP->dari)->jabatan;
						
			$this->doccy->newFile('6 Surat Undangan Penawaran Harga.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
		
			if($dari=='KDIVMUM'){
				$namakadiv = kdivmum::model()->find('jabatan = "KDIVMUM" and status_user = "Aktif"')->nama;
				$this->doccy->phpdocx->assign('#tembusan#', 'MSDAF');
				$this->doccy->phpdocx->assign('#pengirim#', 'KEPALA DIVISI UMUM DAN MANAJEMEN');
			}else if($dari=='MSDAF'){
				$namakadiv = kdivmum::model()->find('jabatan = "MSDAF" and status_user = "Aktif"')->nama;
				$this->doccy->phpdocx->assign('#tembusan#', 'KDIVMUM');
				$this->doccy->phpdocx->assign('#pengirim#', 'MANAJER SENIOR PENGADAAN DAN PENGELOLAAN SARANA FASILITAS KANTOR PUSAT');
			}
			$this->doccy->phpdocx->assign('#nomor#', $nomor);
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->doccy->phpdocx->assign('#norks#', $rks->nomor);
			$this->doccy->phpdocx->assign('#tglrks#', Tanggal::getTanggalLengkap($dokrks->tanggal));
			$this->doccy->phpdocx->assign('#namapengirim#', $namakadiv);
			$this->doccy->phpdocx->assign('#penerima#', $this->getPenyediaLulusXDanAlamat($Peng->id_pengadaan,'undangan_supph'));
			
			$this->renderDocx("Surat Undangan Permintaan Penawaran Harga-".$Peng->nama_pengadaan.".docx", true);
		}
		else if ($Dok->nama_dokumen == "Form Isian Kualifikasi"){
		
		$nama = strtoupper($Peng->nama_pengadaan);
		$tahun = Tanggal::getTahun($Peng->tanggal_masuk);
			
		$this->doccy->newFile('5d Form Isian Kualifikasi.docx');
			
		$this->doccy->phpdocx->assign('#namapengadaankapital#', $nama);
		$this->doccy->phpdocx->assign('#tahun#', $tahun);
		$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
		$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
		
		$this->renderDocx("Form Isian Kualifikasi-".$Peng->nama_pengadaan.".docx", true);
		}
		else if ($Dok->nama_dokumen == "Surat Penunjukan Pemenang"){
			
			$PP = PenerimaPengadaan::model()->findAll('penetapan_pemenang = "1" and id_pengadaan = ' . $Peng->id_pengadaan);
			$SPP=SuratPenunjukanPemenang::model()->findByPk($id);				
			$dokSPP=Dokumen::model()->findByPk($id);			
			$nomor = $SPP->nomor;
			if($PP!=null){
				$penyedia = $PP[0]->perusahaan;
				$biaya = $PP[0]->biaya;
				$nosuratpenawaran = $PP[0]->nomor_surat_penawaran;
				$tglsuratpenawaran = date('Y-m-d', strtotime($PP[0]->tanggal_penawaran));;
				$alamatpenyedia = $PP[0]->alamat;
			}else{
				$penyedia = '-';
				$biaya = '0';
				$nosuratpenawaran = '-';
				$tglsuratpenawaran = '-';
				$alamatpenyedia = '';
			}
			
			$dokndpp=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Nota Dinas Perintah Pengadaan"');
			$ndpp = NotaDinasPerintahPengadaan::model()->findByPk($dokndpp->id_dokumen);
			$pengirim = strtoupper(Jabatan::model()->findByPk($ndpp->dari)->kepanjangan);
			$namapengirim = Kdivmum::model()->find('id_jabatan = '.$ndpp->dari.' and status_user = "Aktif"')->nama;
			$dokrks=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "RKS"');
			$rks=Rks::model()->findByPk($dokrks->id_dokumen);
			$biayaa = RupiahMaker::convertInt($biaya);
			$biayaterbilang = RupiahMaker::TerbilangMaker($biaya);
			$jaminan = $rks->biaya_jaminan_pelaksanaan;
			$jaminanterbilang = RupiahMaker::TerbilangMaker($jaminan);
			$lama = $rks->jangka_waktu_penyerahan;
			$lamaterbilang = RupiahMaker::TerbilangMaker($lama);
			$tanggal = Tanggal::getTanggalLengkap($Dok->tanggal);
			$tempat = $Dok->tempat;
			$nama = $Peng->nama_pengadaan;
			$metode = $Peng->metode_pengadaan;
			
			if ($metode == "Penunjukan Langsung"){
				$doksupph=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Surat Undangan Permintaan Penawaran Harga"');
				$supph = SuratUndanganPermintaanPenawaranHarga::model()->findByPk($doksupph->id_dokumen);
				$nosupph = $supph->nomor;
				$tglsupph = Tanggal::getTanggalLengkap($doksupph->tanggal);
				$this->doccy->newFile('15 Surat Penunjukan Penyedia.docx');
				$this->doccy->phpdocx->assign('#nosupph#', $nosupph);
				$this->doccy->phpdocx->assign('#tglsupph#', $tglsupph);	
			}
			else if($metode == "Pemilihan Langsung"){
				$doksupph=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Surat Undangan Permintaan Penawaran Harga"');
				$supph = SuratUndanganPermintaanPenawaranHarga::model()->findByPk($doksupph->id_dokumen);
				$nosupph = $supph->nomor;
				$tglsupph = Tanggal::getTanggalLengkap($doksupph->tanggal);
				$dokspp = Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Nota Dinas Pemberitahuan Pemenang"');
				$spp = NotaDinasPemberitahuanPemenang::model()->findByPk($dokspp->id_dokumen);
				$this->doccy->newFile('15 Surat Penunjukan Pemenang (Pilih).docx');
				$this->doccy->phpdocx->assign('#nospp#', $spp->nomor);
				$this->doccy->phpdocx->assign('#tglspp#', Tanggal::getTanggalLengkap($dokspp->tanggal));
				$this->doccy->phpdocx->assign('#nosupph#', $nosupph);
				$this->doccy->phpdocx->assign('#tglsupph#', $tglsupph);	

			}
			else if($metode == "Pelelangan"){
				$noski = $SPP->no_ski;
				$nomorski = $SPP->nomor_ski;
				$tglski = Tanggal::getTanggalLengkap($SPP->tanggal_ski);
				if($Peng->jenis_kualifikasi=="Pasca Kualifikasi"){
					$dokpengumuman=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Surat Pengumuman Pelelangan"');
					$pengumuman = SuratPengumumanPelelangan::model()->findByPk($dokpengumuman->id_dokumen);
				} else  {
					$dokpengumuman=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Surat Pengumuman Pelelangan Prakualifikasi"');
					$pengumuman = SuratPengumumanPelelangan::model()->findByPk($dokpengumuman->id_dokumen);
				}
				$dokspp = Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Surat Pengumuman Pemenang"');
				$spp = SuratPengumumanPemenang::model()->findByPk($dokspp->id_dokumen);
			
				$this->doccy->newFile('15 Surat Penunjukan Pemenang (Lelang).docx');
				$this->doccy->phpdocx->assign('#nopengumuman#', $pengumuman->nomor);
				$this->doccy->phpdocx->assign('#tglpengumuman#', Tanggal::getTanggalLengkap( $dokpengumuman->tanggal));
				$this->doccy->phpdocx->assign('#nospp#', $spp->nomor);
				$this->doccy->phpdocx->assign('#tglspp#', Tanggal::getTanggalLengkap($dokspp->tanggal));
				$this->doccy->phpdocx->assign('#noski#', $noski);
				$this->doccy->phpdocx->assign('#tglski#', $tglski);
				$this->doccy->phpdocx->assign('#nomorski#', $nomorski);
				$this->doccy->phpdocx->assign('#biayajaminan#', RupiahMaker::convertInt($jaminan));
				$this->doccy->phpdocx->assign('#jaminanterbilang#', $jaminanterbilang);
			}
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
		
			$this->doccy->phpdocx->assign('#nomor#', $nomor);
			$this->doccy->phpdocx->assign('#penyedia#', $penyedia);
			$this->doccy->phpdocx->assign('#alamatpenyedia#', $alamatpenyedia);
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->doccy->phpdocx->assign('#biaya#', $biayaa);
			$this->doccy->phpdocx->assign('#biayaterbilang#', $biayaterbilang);
			$this->doccy->phpdocx->assign('#lamapengerjaan#', $lama);
			$this->doccy->phpdocx->assign('#lamaterbilang#', $lamaterbilang);
			$this->doccy->phpdocx->assign('#nopenawaran#', $nosuratpenawaran);
			$this->doccy->phpdocx->assign('#tglpenawaran#', Tanggal::getTanggalLengkap($tglsuratpenawaran));
			$this->doccy->phpdocx->assign('#tanggal#', Tanggal::getTanggalLengkap($dokSPP->tanggal));
			$this->doccy->phpdocx->assign('#pengirim#',$pengirim);
			$this->doccy->phpdocx->assign('#namapengirim#',$namapengirim);
			if ($metode == "Penunjukan Langsung"){
				$this->renderDocx("Surat Penunjukan Penyedia-".$Peng->nama_pengadaan.".docx", true);
			} else {
				$this->renderDocx("Surat Penunjukan Pemenang-".$Peng->nama_pengadaan.".docx", true);
			}
		}
		else if ($Dok->nama_dokumen == "Dokumen Prakualifikasi"){
			
			$DPK=DokumenPrakualifikasi::model()->findByPk($id);
			$dokNDPP=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Nota Dinas Perintah Pengadaan"');
			$NDPP=NotaDinasPerintahPengadaan::model()->findByPk($dokNDPP->id_dokumen);
			
			$nomor = $DPK->nomor;
			$tanggal = Tanggal::getTanggalLengkap($Dok->tanggal);
			$tahun = Tanggal::getTahun($tanggal);
			$namapengadaan = $Peng->nama_pengadaan;
			$panitia = Panitia::model()->findByPk($Peng->id_panitia);
			if($panitia->jenis_panitia=="Panitia"){
				$kalimat= 'Panitia adalah '.$panitia->nama_panitia.' Pengadaan Barang/Jasa Kantor Pusat, Divisi Umum dan Manajemen Kantor Pusat, sesuai dengan surat tugas DIRSDM No : '.$panitia->SK_panitia.' tanggal : '.Tanggal::getTanggalLengkap($panitia->tanggal_sk).' yang diangkat oleh '.Jabatan::model()->findByPk($NDPP->dari)->jabatan.' untuk melaksanakan pengadaan Barang/Jasa.';
				$listpanitia=$this->getListPanitia($panitia->id_panitia);
			} else {
				$kalimat= 'Pejabat adalah Pejabat Pengadaan Barang/Jasa Kantor Pusat, Divisi Umum dan Manajemen Kantor Pusat, yang diangkat oleh '.Jabatan::model()->findByPk($NDPP->dari)->jabatan.' untuk melaksanakan pengadaan Barang/Jasa.';
				$listpanitia=$panitia->nama_panitia;
			}
			$jenispanitia = $panitia->jenis_panitia;
			$tujuanpengadaan = $DPK->tujuan_pengadaan;
			$sumberdana = $NDPP->sumber_dana;
			$biaya = RupiahMaker::convertInt($NDPP->pagu_anggaran);
			$biayaterbilang = RupiahMaker::terbilangMaker($NDPP->pagu_anggaran);
			
			$tanggalpemasukan1 = Tanggal::getHariTanggalLengkap($DPK->tanggal_pemasukan1);
			$tanggalpemasukan2 = Tanggal::getHariTanggalLengkap($DPK->tanggal_pemasukan2);
			$waktupemasukan1 = Tanggal::getJamMenit($DPK->waktu_pemasukan1);
			$waktupemasukan2 = Tanggal::getJamMenit($DPK->waktu_pemasukan2);
			$tempatpemasukan = $DPK->tempat_pemasukan;
			
			$tanggalevaluasi = Tanggal::getHariTanggalLengkap($DPK->tanggal_evaluasi);
			$waktuevaluasi = Tanggal::getJamMenit($DPK->waktu_evaluasi);
			$tempatevaluasi = $DPK->tempat_evaluasi;
			$tanggalpenetapan = Tanggal::getHariTanggalLengkap($DPK->tanggal_penetapan);
			$waktupenetapan = Tanggal::getJamMenit($DPK->waktu_penetapan);
			$tempatpenetapan = $DPK->tempat_penetapan;
			
			$DokRKS=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "RKS"');
			$RKS=Rks::model()->findByPk($DokRKS->id_dokumen);
			$bidangusaha = $RKS->bidang_usaha;
			$subbidangusaha = $RKS->sub_bidang_usaha;
			$kualifikasiperusahaan = $RKS->kualifikasi;
			$kurunwaktu = $DPK->kurun_waktu_pengalaman;
			$kurunwaktuterbilang = RupiahMaker::terbilangMaker($DPK->kurun_waktu_pengalaman);
			
			$penyetuju = Jabatan::model()->findByPk($NDPP->dari)->jabatan;
			$namapenyetuju = kdivmum::model()->find('id_jabatan = '.$NDPP->dari)->nama;
				
			$this->doccy->newFile('4 Dok Prakualifikasi Format 2.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
		
			$this->doccy->phpdocx->assign('#nomor#', $nomor);
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#namapengadaan#', $namapengadaan);
			$this->doccy->phpdocx->assign('#namapengadaankapital#', strtoupper($namapengadaan));
			$this->doccy->phpdocx->assign('#tahun#', $tahun);
			$this->doccy->phpdocx->assign('#tujuanpengadaan#', $tujuanpengadaan);
			$this->doccy->phpdocx->assign('#kalimatpanitia/pejabat#', $kalimat);
			$this->doccy->phpdocx->assign('#jenis panitia#', $jenispanitia);
			$this->doccy->phpdocx->assign('#sumberdana#', $sumberdana);
			$this->doccy->phpdocx->assign('#biaya#', $biaya);
			$this->doccy->phpdocx->assign('#biayaterbilang#', $biayaterbilang);
			$this->doccy->phpdocx->assign('#tanggalpemasukan1#', $tanggalpemasukan1);
			$this->doccy->phpdocx->assign('#tanggalpemasukan2#', $tanggalpemasukan2);
			$this->doccy->phpdocx->assign('#waktupemasukan1#', $waktupemasukan1);
			$this->doccy->phpdocx->assign('#waktupemasukan2#', $waktupemasukan2);
			$this->doccy->phpdocx->assign('#tempatpemasukan#', $tempatpemasukan);
			$this->doccy->phpdocx->assign('#tanggalevaluasi#', $tanggalevaluasi);
			$this->doccy->phpdocx->assign('#waktuevaluasi#', $waktuevaluasi);
			$this->doccy->phpdocx->assign('#tempatevaluasi#', $tempatevaluasi);
			$this->doccy->phpdocx->assign('#tanggalpenetapan#', $tanggalpenetapan);
			$this->doccy->phpdocx->assign('#waktupenetapan#', $waktupenetapan);
			$this->doccy->phpdocx->assign('#tempatpenetapan#', $tempatpenetapan);
			$this->doccy->phpdocx->assign('#bidangusaha#', $bidangusaha);
			$this->doccy->phpdocx->assign('#subbidangusaha#', $subbidangusaha);
			$this->doccy->phpdocx->assign('#kualifikasiperusahaan#', $kualifikasiperusahaan);
			$this->doccy->phpdocx->assign('#kurunwaktu#', $kurunwaktu);
			$this->doccy->phpdocx->assign('#kurunwaktuterbilang#', $kurunwaktuterbilang);
			$this->doccy->phpdocx->assign('#jenis panitia kapital#', strtoupper($jenispanitia));
			$this->doccy->phpdocx->assign('#penyetuju#', $penyetuju);
			$this->doccy->phpdocx->assign('#namapenyetuju#', $namapenyetuju);
			$this->doccy->phpdocx->assign('#listpanitia#', $listpanitia);		
			
			$this->renderDocx("Dokumen Prakualifikasi-".$Peng->nama_pengadaan.".docx", true);
		}
		else if($Dok->nama_dokumen=="Surat Pengumuman Hasil Kualifikasi"){
			
			$SPHK = PengumumanHasilPrakualifikasi::model()->find('id_dokumen='.$Dok->id_dokumen);
			$tanggal = Tanggal::getTanggalLengkap($Dok->tanggal);
			$penyedia = $this->getPenyediaXDenganNumbering($Peng->id_pengadaan,"penetapan_pq");
			$dokpenetapanpq=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Nota Dinas Penetapan Hasil Prakualifikasi"');
			$penetapanpq = NotaDinasPenetapanKualifikasi::model()->findByPk($dokpenetapanpq->id_dokumen);			
			$dokndpp=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Nota Dinas Perintah Pengadaan"');
			$ndpp = NotaDinasPerintahPengadaan::model()->findByPk($dokndpp->id_dokumen);
			$dokrks=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "RKS"');
			$rks=Rks::model()->findByPk($dokrks->id_dokumen);
			if($Peng->metode_pengadaan=="Pelelangan"){
				$DokLelang = Dokumen::model()->find('id_pengadaan=' . $Peng->id_pengadaan . ' and nama_dokumen="Surat Pengumuman Pelelangan Prakualifikasi"');
				$tanggalpengumuman = Tanggal::getTanggalLengkap($DokLelang->tanggal);
				$nopengumuman = SuratPengumumanPelelangan::model()->find('id_dokumen='.$DokLelang->id_dokumen)->nomor;
				$listpeserta = $this->getPenyediaX($Peng->id_pengadaan,"pendaftaran_pelelangan_pq");
				$kalimatundanganpengumuman = 'Sehubungan dengan Pengumuman	No : '.$nopengumuman.' tanggal  : '.$tanggalpengumuman.'.';
			} else {
				$DokUndangan = Dokumen::model()->find('id_pengadaan=' . $Peng->id_pengadaan . ' and nama_dokumen="Surat Undangan Prakualifikasi"');
				$tanggalundangan = Tanggal::getTanggalLengkap($DokUndangan->tanggal);
				$noundangan = SuratUndanganPrakualifikasi::model()->find('id_dokumen='.$DokUndangan->id_dokumen)->nomor;
				$listpeserta = $this->getPenyediaX($Peng->id_pengadaan,"undangan_prakualifikasi");
				$kalimatundanganpengumuman = 'Sehubungan dengan Undangan Prakualifikasi	No : '.$noundangan.' tanggal  : '.$tanggalundangan.'.';
			}
			$panitia=Panitia::model()->find('id_panitia='.$Peng->id_panitia);
			if($panitia->jenis_panitia=='Panitia'){
				$kalimat = "Ketua";
				$nama = Anggota::model()->find('id_panitia=' . $Peng->id_panitia . ' and jabatan="Ketua" and status_user = "Aktif"')->nama;
			} else {
				$kalimat = "";
				$nama = Anggota::model()->find('id_panitia=' . $Peng->id_panitia)->nama;
			}
			$this->doccy->newFile('4e Pengumuman Hasil Prakualifikasi.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			$this->doccy->phpdocx->assign('#nomor#', $SPHK->nomor);			
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#kalimatundanganataupengumuman#', $kalimatundanganpengumuman);			
			$this->doccy->phpdocx->assign('#penerima#', $listpeserta);			
			$this->doccy->phpdocx->assign('#penyedia#', $penyedia);			
			$this->doccy->phpdocx->assign('#namapengadaan#', $Peng->nama_pengadaan);
			$this->doccy->phpdocx->assign('#panitia/pejabat#', $panitia->jenis_panitia);
			$this->doccy->phpdocx->assign('#kalimat#', $kalimat);
			$this->doccy->phpdocx->assign('#namaketua#', $nama);
			$this->doccy->phpdocx->assign('#nondpenetapanpq#', $penetapanpq->nomor);
			$this->doccy->phpdocx->assign('#tglndpenetapanpq#', Tanggal::getTanggalLengkap($dokpenetapanpq->tanggal));
			$this->doccy->phpdocx->assign('#haritanggalpengambilan1#', Tanggal::getHariTanggalLengkap($rks->tanggal_pengambilan_dokumen1));
			$this->doccy->phpdocx->assign('#haritanggalpengambilan2#', Tanggal::getHariTanggalLengkap($rks->tanggal_pengambilan_dokumen2));
			$this->doccy->phpdocx->assign('#waktupengambilan1#', Tanggal::getJamMenit($rks->waktu_pengambilan_dokumen1));
			$this->doccy->phpdocx->assign('#waktupengambilan2#', Tanggal::getJamMenit($rks->waktu_pengambilan_dokumen2));
			$this->doccy->phpdocx->assign('#tempatpengambilan#', $rks->tempat_pengambilan_dokumen);
			$this->doccy->phpdocx->assign('#PemberiTugas#', Jabatan::model()->findByPk($ndpp->dari)->jabatan);
			$this->doccy->phpdocx->assign('#NamaPemberiTugas#', Kdivmum::model()->find('id_jabatan = '.$ndpp->dari.' and status_user = "Aktif"')->nama);
			
			$this->renderDocx("Surat Pengumuman Hasil Prakualifikasi-".$Peng->nama_pengadaan.".docx", true);
		}
		else if ($Dok->nama_dokumen == "Surat Undangan Prakualifikasi"){
			
			$SUPK=SuratUndanganPrakualifikasi::model()->findByPk($id);
			$dokDPK=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Dokumen Prakualifikasi"');
			$DPK=DokumenPrakualifikasi::model()->findByPk($dokDPK->id_dokumen);
			$dokNDPP=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Nota Dinas Perintah Pengadaan"');
			$NDPP=NotaDinasPerintahPengadaan::model()->findByPk($dokNDPP->id_dokumen);
			
			$this->doccy->newFile('4a Surat Undangan Prakualifikasi.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
		
			$this->doccy->phpdocx->assign('#nomor#', $SUPK->nomor);
			$this->doccy->phpdocx->assign('#tanggal#', Tanggal::getTanggalLengkap($Dok->tanggal));
			$this->doccy->phpdocx->assign('#perihal#', $SUPK->perihal);
			$this->doccy->phpdocx->assign('#nopq#', $DPK->nomor);
			$this->doccy->phpdocx->assign('#tglpq#', Tanggal::getTanggalLengkap($dokDPK->tanggal));
			$this->doccy->phpdocx->assign('#namapengadaan#', $Peng->nama_pengadaan);
			$this->doccy->phpdocx->assign('#penerima#', $this->getPenyediaLulusXDanAlamat($Peng->id_pengadaan,'undangan_prakualifikasi'));
			$this->doccy->phpdocx->assign('#tembusan#', $this->getTembusan($NDPP->dari));
			$this->doccy->phpdocx->assign('#pengirim#', Jabatan::model()->findByPk($NDPP->dari)->jabatan);
			$this->doccy->phpdocx->assign('#namapengirim#', Kdivmum::model()->find('id_jabatan = '.$NDPP->dari.' and status_user = "Aktif"')->nama);
			
			$this->renderDocx("Surat Undangan Prakualifikasi-".$Peng->nama_pengadaan.".docx", true);
		}
		else if ($Dok->nama_dokumen == "Surat Pengumuman Pelelangan"){
			
			$SPP = SuratPengumumanPelelangan::model()->findByPk($id);
			$nomor = $SPP->nomor;
			$namapengadaan = $Peng->nama_pengadaan;
			$namapengadaankapital = strtoupper($Peng->nama_pengadaan);
			$panitia = Panitia::model()->findByPk($Peng->id_panitia);
			$tempat = $Dok->tempat;
			$tanggal = Tanggal::getTanggalLengkap($Dok->tanggal);
			$DokRKS=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "RKS"');
			$RKS=Rks::model()->findByPk($DokRKS->id_dokumen);
			
			$this->doccy->newFile('7a Surat Pengumuman Pelelangan.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$panitia = Panitia::model()->findByPk($Peng->id_panitia);
			if($panitia->jenis_panitia=="Panitia"){
				$this->doccy->phpdocx->assign('#kata#', 'Ketua');				
				$this->doccy->phpdocx->assign('#panitia/pejabat#', $panitia->nama_panitia);
				$this->doccy->phpdocx->assign('#panitia/pejabatkapital#', strtoupper($panitia->nama_panitia));
				$this->doccy->phpdocx->assign('#namaketua/pejabat#', Anggota::model()->find('id_panitia = '.$panitia->id_panitia.' and jabatan = "Ketua" and status_user = "Aktif"')->nama);
			} else {
				$this->doccy->phpdocx->assign('#kata#', '');
				$this->doccy->phpdocx->assign('#panitia/pejabat#', $panitia->jenis_panitia);
				$this->doccy->phpdocx->assign('#panitia/pejabatkapital#', strtoupper($panitia->jenis_panitia));
				$this->doccy->phpdocx->assign('#namaketua/pejabat#', $panitia->nama_panitia);
			}
			$this->doccy->phpdocx->assign('#nomor#', $nomor);
			$this->doccy->phpdocx->assign('#namapengadaankapital#', $namapengadaankapital);
			$this->doccy->phpdocx->assign('#namapengadaan#', $namapengadaan);
			$this->doccy->phpdocx->assign('#bidangusaha#', $RKS->bidang_usaha);
			$this->doccy->phpdocx->assign('#subbidangusaha#', $RKS->sub_bidang_usaha);
			$this->doccy->phpdocx->assign('#kualifikasi#', $RKS->kualifikasi);
			$this->doccy->phpdocx->assign('#klasifikasi#', $RKS->klasifikasi);
			$this->doccy->phpdocx->assign('#hargadokumen#', RupiahMaker::convertInt($SPP->harga_dokumen));
			$this->doccy->phpdocx->assign('#haripengambilan1#', Tanggal::getHari($RKS->tanggal_pengambilan_dokumen1));
			$this->doccy->phpdocx->assign('#haripengambilan2#', Tanggal::getHari($RKS->tanggal_pengambilan_dokumen2));
			$this->doccy->phpdocx->assign('#tanggalpengambilan1#', Tanggal::getTanggalLengkap($RKS->tanggal_pengambilan_dokumen1));
			$this->doccy->phpdocx->assign('#tanggalpengambilan2#', Tanggal::getTanggalLengkap($RKS->tanggal_pengambilan_dokumen2));
			$this->doccy->phpdocx->assign('#waktupengambilan1#', Tanggal::getJamMenit($RKS->waktu_pengambilan_dokumen1));
			$this->doccy->phpdocx->assign('#waktupengambilan2#', Tanggal::getJamMenit($RKS->waktu_pengambilan_dokumen2));
			$this->doccy->phpdocx->assign('#tempatpengambilan#', $RKS->tempat_pengambilan_dokumen);
			$this->doccy->phpdocx->assign('#tempat#', $tempat);
			$this->doccy->phpdocx->assign('#tanggalsurat#', $tanggal);
			
			$this->renderDocx("Surat Pengumuman Pelelangan-".$Peng->nama_pengadaan.".docx", true);
		}
		else if ($Dok->nama_dokumen == "Surat Pengumuman Pelelangan Prakualifikasi"){
			
			$SPP = SuratPengumumanPelelangan::model()->findByPk($id);
			$nomor = $SPP->nomor;
			$namapengadaan = $Peng->nama_pengadaan;
			$namapengadaankapital = strtoupper($Peng->nama_pengadaan);
			$panitia = Panitia::model()->findByPk($Peng->id_panitia);
			$tempat = $Dok->tempat;
			$tanggal = Tanggal::getTanggalLengkap($Dok->tanggal);
			$DokRKS=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "RKS"');
			$RKS=Rks::model()->findByPk($DokRKS->id_dokumen);
			$DokPQ=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Dokumen Prakualifikasi"');
			$PQ=DokumenPrakualifikasi::model()->findByPk($DokPQ->id_dokumen);
			
			$this->doccy->newFile('7b Surat Pengumuman Pelelangan Prakualifikasi.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$panitia = Panitia::model()->findByPk($Peng->id_panitia);
			if($panitia->jenis_panitia=="Panitia"){
				$this->doccy->phpdocx->assign('#kata#', 'Ketua');				
				$this->doccy->phpdocx->assign('#panitia/pejabat#', $panitia->nama_panitia);
				$this->doccy->phpdocx->assign('#panitia/pejabatkapital#', strtoupper($panitia->nama_panitia));
				$this->doccy->phpdocx->assign('#namaketua/pejabat#', Anggota::model()->find('id_panitia = '.$panitia->id_panitia.' and jabatan = "Ketua" and status_user = "Aktif"')->nama);
			} else {
				$this->doccy->phpdocx->assign('#kata#', '');
				$this->doccy->phpdocx->assign('#panitia/pejabat#', $panitia->jenis_panitia);
				$this->doccy->phpdocx->assign('#panitia/pejabatkapital#', strtoupper($panitia->jenis_panitia));
				$this->doccy->phpdocx->assign('#namaketua/pejabat#', $panitia->nama_panitia);
			}
			$this->doccy->phpdocx->assign('#nomor#', $nomor);
			$this->doccy->phpdocx->assign('#namapengadaankapital#', $namapengadaankapital);
			$this->doccy->phpdocx->assign('#namapengadaan#', $namapengadaan);
			$this->doccy->phpdocx->assign('#bidangusaha#', $RKS->bidang_usaha);
			$this->doccy->phpdocx->assign('#subbidangusaha#', $RKS->sub_bidang_usaha);
			$this->doccy->phpdocx->assign('#kualifikasi#', $RKS->kualifikasi);
			$this->doccy->phpdocx->assign('#klasifikasi#', $RKS->klasifikasi);
			$this->doccy->phpdocx->assign('#hargadokumen#', RupiahMaker::convertInt($SPP->harga_dokumen));
			$this->doccy->phpdocx->assign('#haripengambilan1#', Tanggal::getHari($PQ->tanggal_pengambilan1));
			$this->doccy->phpdocx->assign('#haripengambilan2#', Tanggal::getHari($PQ->tanggal_pengambilan2));
			$this->doccy->phpdocx->assign('#tanggalpengambilan1#', Tanggal::getTanggalLengkap($PQ->tanggal_pengambilan1));
			$this->doccy->phpdocx->assign('#tanggalpengambilan2#', Tanggal::getTanggalLengkap($PQ->tanggal_pengambilan2));
			$this->doccy->phpdocx->assign('#waktupengambilan1#', Tanggal::getJamMenit($PQ->waktu_pengambilan1));
			$this->doccy->phpdocx->assign('#waktupengambilan2#', Tanggal::getJamMenit($PQ->waktu_pengambilan2));
			$this->doccy->phpdocx->assign('#tempatpengambilan#', $PQ->tempat_pengambilan);
			$this->doccy->phpdocx->assign('#tempat#', $tempat);
			$this->doccy->phpdocx->assign('#tanggalsurat#', $tanggal);			
			$this->renderDocx("Surat Pengumuman Pelelangan Prakualifikasi-".$Peng->nama_pengadaan.".docx", true);
		} else if($Dok->nama_dokumen == "Surat Kontrak"){
		$this->doccy->newFile('17 Surat Kontrak.docx');
			$dummy = "";
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#namapengadaan#', $Peng->nama_pengadaan);
			$this->doccy->phpdocx->assign('#namapemenang#', $dummy);
			$this->doccy->phpdocx->assign('#nomorkontrak#', $dummy);
			$this->doccy->phpdocx->assign('#hari#', $dummy);
			$this->doccy->phpdocx->assign('#tanggal#', $dummy);
			$this->doccy->phpdocx->assign('#bulan#', $dummy);
			$this->doccy->phpdocx->assign('#tahun#', $dummy);
			$this->doccy->phpdocx->assign('#namakdivms#', $dummy);
			$this->doccy->phpdocx->assign('#alamatpemenang#', $dummy);
			$this->doccy->phpdocx->assign('#notapenetapanpemenang#', $dummy);
			$this->renderDocx("Surat Kontrak -".$Peng->nama_pengadaan.".docx", true);
		}
//	=====================================Pakta Integritas=====================================
		else if ($Dok->nama_dokumen == "Pakta Integritas Awal Panitia"){
			
			$PI=PaktaIntegritasPanitia1::model()->findByPk($id);
			$tanggal = Tanggal::getTanggalLengkap($Dok->tanggal);
			$tahun = Tanggal::getTahun($Dok->tanggal);
			$tempat = $Dok->tempat;
			$namapengadaan= $Peng->nama_pengadaan;
			
			if (Panitia::model()->findByPk($Peng->id_panitia)->jenis_panitia=="Pejabat") {
				$namapejabat= Anggota::model()->find('id_panitia = '.$Peng->id_panitia) ->nama;
				$this->doccy->newFile('2 Pakta Integritas Awal Pejabat.docx');
				$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
				$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
				$this->doccy->phpdocx->assign('#tempat surat#', $tempat);
				$this->doccy->phpdocx->assign('#tanggal surat#', $tanggal);
				$this->doccy->phpdocx->assign('#tahun#', $tahun);
				$this->doccy->phpdocx->assign('#nama pengadaan#', $namapengadaan);
				$this->doccy->phpdocx->assign('#nama pejabat#', $namapejabat);
				$this->renderDocx("Pakta Integritas Awal Pejabat-".$Peng->nama_pengadaan.".docx", true);
			} else {
				$listpanitia = $this->getListPanitia($Peng->id_panitia);
				$this->doccy->newFile('2 Pakta Integritas Awal Panitia.docx');
				$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
				$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
				$this->doccy->phpdocx->assign('#tempat surat#',$tempat);
				$this->doccy->phpdocx->assign('#tanggal surat#',$tanggal);
				$this->doccy->phpdocx->assign('#tahun#',$tahun);
				$this->doccy->phpdocx->assign('#nama_pengadaan#',$namapengadaan);
				$this->doccy->phpdocx->assign('#listpanitia#',$listpanitia);
				$this->renderDocx("Pakta Integritas Awal Panitia-".$Peng->nama_pengadaan.".docx", true);
			}
			
		}
		else if ($Dok->nama_dokumen == "Pakta Integritas Akhir Panitia"){
			
			$PIP2=PaktaIntegritasPanitia2::model()->findByPk($id);
			$tanggal = Tanggal::getTanggalLengkap($Dok->tanggal);
			$panitia = Panitia::model()->findByPk($Peng->id_panitia);
			$skpanitia = "Kami atas nama Panitia Pengadaan Barang/Jasa PT PLN (Persero) Kantor Pusat yang ditunjuk berdasarkan Surat Keputusan Direktur Sumber Daya Manusia dan Umum PT PLN (Persero) No. :  ". Panitia::model()->findByPk($Peng->id_panitia)->SK_panitia . " sebagai berikut :" ;
			$nama = $Peng->nama_pengadaan;
			$metode = $Peng->metode_pengadaan;
			
			$this->doccy->newFile('12a Pakta Integritas Akhir Panitia.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->doccy->phpdocx->assign('#metodepengadaan#', $metode);
			$this->doccy->phpdocx->assign('#skpanitia#', $skpanitia);
			$this->doccy->phpdocx->assign('#namapanitia#', strtoupper($panitia->nama_panitia));
			$this->doccy->phpdocx->assign('#tdtgnpic#', $this->getListPanitiaTTAanwijzing($Peng->id_panitia));			
			$this->renderDocx("Pakta Integritas Akhir Panitia-".$Peng->nama_pengadaan.".docx", true);
		}
		else if ($Dok->nama_dokumen == "Pakta Integritas Akhir Pejabat"){
			
			$PIP2=PaktaIntegritasPanitia2::model()->findByPk($id);
			$tanggal = Tanggal::getTanggalLengkap($Dok->tanggal);
			$panitia = Panitia::model()->findByPk($Peng->id_panitia);
			$nama = $Peng->nama_pengadaan;
			$metode = $Peng->metode_pengadaan;
			
			$skpanitia2 = "Saya ". Panitia::model()->findByPk($Peng->id_panitia)->nama_panitia ." sebagai Pejabat Pengadaan Barang/Jasa PT PLN (Persero) Kantor Pusat";
			
			$namapejabat= Anggota::model()->find('id_panitia = '.$Peng->id_panitia)->nama;
			
			$this->doccy->newFile('12b Pakta Integritas Akhir Pejabat.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->doccy->phpdocx->assign('#metodepengadaan#', $metode);
			$this->doccy->phpdocx->assign('#namapejabat#', $namapejabat);			
			$this->doccy->phpdocx->assign('#skpanitia#', $skpanitia2);
			$this->doccy->phpdocx->assign('#tdtgnpic#', $this->getTTPanitiaPembukaanSampul1($Peng->id_panitia));
			
			$this->renderDocx("Pakta Integritas Akhir Pejabat-".$Peng->nama_pengadaan.".docx", true);
		}
		else if ($Dok->nama_dokumen == "Pakta Integritas Penyedia"){
			
			$nama = $Peng->nama_pengadaan;
			
 			$this->doccy->newFile('5a Pakta Integritas Penyedia.docx');
			
		$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
		$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->renderDocx("Pakta Integritas Penyedia-".$Peng->nama_pengadaan.".docx", true);
		}
//	=====================================Berita Acara=====================================
		else if ($Dok->nama_dokumen == "Berita Acara Aanwijzing"){
			
			$BA=BeritaAcaraPenjelasan::model()->findByPk($id);	
			$nomor = $BA->nomor;
			$nama = $Peng->nama_pengadaan;
			$panitia = Panitia::model()->findByPk($Peng->id_panitia);

			$dokrks=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "RKS"');
			$rks=Rks::model()->findByPk($dokrks->id_dokumen);	
			
			$this->doccy->newFile('9a Berita Acara Aanwijzing.docx');
			$norks = $rks->nomor;
			
			$namapic = $this->getListPanitiaAanwijzing($Peng->id_panitia);
			$jenispic = Panitia::model()->findByPk($Peng->id_panitia)->jenis_panitia;						
			$jenispic2 = Panitia::model()->findByPk($Peng->id_panitia)->nama_panitia;
			$kalimatpanitia = "kami atas nama Panitia Pengadaan Barang/Jasa PT PLN (Persero) Kantor Pusat yang ditunjuk berdasarkan Surat Keputusan Direktur Sumber Daya Manusia dan Umum PT PLN (Persero) No. :  ". Panitia::model()->findByPk($Peng->id_panitia)->SK_panitia;
			$kalimatpejabat = "saya ". Panitia::model()->findByPk($Peng->id_panitia)->nama_panitia ." sebagai Pejabat Pengadaan Barang/Jasa PT PLN (Persero) Kantor Pusat";
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#nomorba#', $nomor);
			$this->doccy->phpdocx->assign('#haritanggal#', Tanggal::getHariTanggalLengkap($Dok->tanggal));
			$this->doccy->phpdocx->assign('#namapengadaankapital#', strtoupper($nama));
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			
			$this->doccy->phpdocx->assign('#wakturapat#', Tanggal::getJamMenit($rks->waktu_penjelasan));
			$this->doccy->phpdocx->assign('#norks#', $rks->nomor);
			$this->doccy->phpdocx->assign('#tanggal_rks#', Tanggal::getTanggalLengkap($dokrks->tanggal));
			
			if($jenispic == 'Pejabat'){
				$this->doccy->phpdocx->assign('#panitiaataupejabat#', strtoupper($jenispic));
				$this->doccy->phpdocx->assign('#kalimatpanitia/pejabat#', $kalimatpejabat);
			}else{
				$this->doccy->phpdocx->assign('#panitiaataupejabat#', strtoupper($jenispic2));
				$ketua = Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Ketua"')->nama;				
				$this->doccy->phpdocx->assign('#ketua#', $ketua);
				$this->doccy->phpdocx->assign('#kalimatpanitia/pejabat#', $kalimatpanitia);
			}
			
			$this->doccy->phpdocx->assign('#listpic#',$namapic);
			$this->doccy->phpdocx->assign('#listpeserta#',$this->getPenyediaLulusX($Peng->id_pengadaan,'ba_aanwijzing'));
			$this->doccy->phpdocx->assign('#listpesertattd#',$this->getTTPenyediaLulusX($Peng->id_pengadaan,'ba_aanwijzing'));
			$this->doccy->phpdocx->assign('#tdtgnpanitia#',$this->getListPanitiaTTAanwijzing($Peng->id_panitia));
			
			$this->renderDocx("Berita Acara Penjelasan-".$Peng->nama_pengadaan.".docx", true);
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
			$tanggalrks = Tanggal::getTanggalLengkap($dokrks->tanggal);
			$dokBAPP=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Berita Acara Pembukaan Penawaran"');
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
			
			$namapic = $this->getListPanitiaAanwijzing($Peng->id_panitia);
			$jenispicgan = Panitia::model()->findByPk($Peng->id_panitia)->jenis_panitia;
			$jenispic = "kami atas nama Panitia Pengadaan Barang/Jasa PT PLN (Persero) Kantor Pusat yang ditunjuk berdasarkan Surat Keputusan Direktur Sumber Daya Manusia dan Umum PT PLN (Persero) No. :  ". Panitia::model()->findByPk($Peng->id_panitia)->SK_panitia . " sebagai berikut :" ;
			$jenispic2 = "saya ". Panitia::model()->findByPk($Peng->id_panitia)->nama_panitia ." sebagai Pejabat Pengadaan Barang/Jasa PT PLN (Persero) Kantor Pusat.";
			
			$this->doccy->phpdocx->assign('#pejabatataupanitia2#', strtoupper($jenispicgan));
			$this->doccy->phpdocx->assign('#tdtgnpic#',$this->getTTPanitiaPembukaanSampul1($Peng->id_panitia));
			$this->doccy->phpdocx->assign('#panitia/pejabat#', $jenispicgan);
			$this->doccy->phpdocx->assign('#listpeserta#',$this->getPenyediaLulusEval1Sampul($Peng->id_pengadaan));
			$this->doccy->phpdocx->assign('#listpesertakesimpulan#',$this->getPenyediaLulusKesimpulan($Peng->id_pengadaan,'evaluasi_penawaran_2'));
			
			$this->doccy->phpdocx->assign('#listperusahaan#',$this->getPenyediaXMasukPenawaran1($Peng->id_pengadaan));			
			$this->doccy->phpdocx->assign('#listperusahaanlulus#',$this->getPenyediaLulusX($Peng->id_pengadaan,'evaluasi_penawaran_2'));
			$this->doccy->phpdocx->assign('#listperusahaantidaklulusadministrasi#',$this->getPenyediaTdkLulusX($Peng->id_pengadaan,'administrasi'));			
			$this->doccy->phpdocx->assign('#listperusahaantidaklulusteknik#',$this->getPenyediaTdkLulusX($Peng->id_pengadaan,'evaluasi_penawaran_1'));			
			$this->doccy->phpdocx->assign('#listperusahaantidaklulusbiaya#',$this->getPenyediaTdkLulusX($Peng->id_pengadaan,'evaluasi_penawaran_2'));			
			$this->doccy->phpdocx->assign('#jmlpesertalulus#', $this->getJmlPenyediaLulus($Peng->id_pengadaan,'evaluasi_penawaran_2'));	
			$this->doccy->phpdocx->assign('#jumlahperusahaan#', $this->getJmlPenyediaMasukPenawaran1($Peng->id_pengadaan));	
						
			if($jenispicgan == 'Pejabat'){
				$this->doccy->phpdocx->assign('#panitiaataupejabat#', $jenispic2);				
				$this->doccy->phpdocx->assign('#listpic#',"");				
			}else{
				$this->doccy->phpdocx->assign('#panitiaataupejabat#', $jenispic);		
				$this->doccy->phpdocx->assign('#listpic#',$namapic);				
			}			
					
			
			$this->renderDocx("Berita Acara Evaluasi Penawaran-".$Peng->nama_pengadaan.".docx", true);
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
			$tanggalrks = Tanggal::getTanggalLengkap($dokrks->tanggal);
			
			$jenispic = Panitia::model()->findByPk($Peng->id_panitia)->jenis_panitia;
			
			$namapic = $this->getListPanitiaAanwijzing($Peng->id_panitia);			
			$skpanitia = "kami atas nama Panitia Pengadaan Barang/Jasa PT PLN (Persero) Kantor Pusat yang ditunjuk berdasarkan Surat Keputusan Direktur Sumber Daya Manusia dan Umum PT PLN (Persero) No. :  ". Panitia::model()->findByPk($Peng->id_panitia)->SK_panitia . " sebagai berikut :" ;
			$skpanitia2 = "saya ". Panitia::model()->findByPk($Peng->id_panitia)->nama_panitia ." sebagai Pejabat Pengadaan Barang/Jasa PT PLN (Persero) Kantor Pusat";
			
			$metode = $Peng->metode_pengadaan;
			
			$this->doccy->newFile('11b Berita Acara Evaluasi Penawaran Sampul 1.docx');
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			$this->doccy->phpdocx->assign('#nomorba#', $nomor);
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->doccy->phpdocx->assign('#namapengadaankapital#', strtoupper($nama));
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#hari#', $hari);
			$this->doccy->phpdocx->assign('#norks#', $norks);
			$this->doccy->phpdocx->assign('#tanggalrks#', $tanggalrks);
			
			$this->doccy->phpdocx->assign('#listperusahaan#',$this->getPenyediaXMasukPenawaran1($Peng->id_pengadaan));
			$this->doccy->phpdocx->assign('#listpesertalulus#',$this->getPenyediaLulusX($Peng->id_pengadaan,'evaluasi_penawaran_1'));
			$this->doccy->phpdocx->assign('#listperusahaantdklulusadministrasi#',$this->getPenyediaTdkLulusX($Peng->id_pengadaan,'administrasi'));
			$this->doccy->phpdocx->assign('#listperusahaantdklulusteknik#',$this->getPenyediaTdkLulusX($Peng->id_pengadaan,'evaluasi_penawaran_1'));
			$this->doccy->phpdocx->assign('#jmlpesertalulus#', $this->getJmlPenyediaLulus($Peng->id_pengadaan,'evaluasi_penawaran_1'));	
			$this->doccy->phpdocx->assign('#jumlahperusahaan#', $this->getJmlPenyediaMasukPenawaran1($Peng->id_pengadaan));	
			
			if(Panitia::model()->findByPk($Peng->id_panitia)->jenis_panitia == 'Panitia'){
				$this->doccy->phpdocx->assign('#skpanitia#', $skpanitia);
				$this->doccy->phpdocx->assign('#listpic#', $this->getListPanitiaAanwijzing($Peng->id_panitia));
				$this->doccy->phpdocx->assign('#panitia/pejabat#', "Panitia");
			}else{
				$this->doccy->phpdocx->assign('#skpanitia#', $skpanitia2);
				$this->doccy->phpdocx->assign('#listpic#', "");
				$this->doccy->phpdocx->assign('#panitia/pejabat#', "Pejabat");
			}
			$this->doccy->phpdocx->assign('#pejabatataupanitia2#', strtoupper($jenispic));
			$this->doccy->phpdocx->assign('#tdtgnpic#',$this->getTTPanitiaPembukaanSampul1($Peng->id_panitia));
			if($Peng->metode_penawaran=="Dua Sampul") {
				$this->doccy->phpdocx->assign('#sampul/tahapkapital#', 'SAMPUL');
				$this->doccy->phpdocx->assign('#sampul/tahap#', 'Sampul');
				$this->doccy->phpdocx->assign('#kalimat1#', 'dilanjutkan pembukaan sampul II (Penawaran Harga) dan Perusahaan yang Gugur pada sampul I (Syarat Administrasi dan Teknis), dokumen sampul II (Penawaran Harga) tidak dibuka dan dikembalikan kepada masing-masing Perusahaan.');
				$this->renderDocx("Berita Acara Evaluasi Penawaran Sampul 1-".$Peng->nama_pengadaan.".docx", true);
			} else if($Peng->metode_penawaran=="Dua Tahap") {
				$this->doccy->phpdocx->assign('#sampul/tahapkapital#', 'TAHAP');
				$this->doccy->phpdocx->assign('#sampul/tahap#', 'Tahap');
				$this->doccy->phpdocx->assign('#kalimat1#', 'selanjutnya mengirim dokumen penawaran tahap II (Penawaran Harga) dan Perusahaan yang Gugur pada sampul I (Syarat Administrasi dan Teknis) tidak dapat lanjut mengirim dokumen Penawaran Harga ( Sampul II).');
				$this->renderDocx("Berita Acara Evaluasi Penawaran Tahap 1-".$Peng->nama_pengadaan.".docx", true);
			}
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
			$tanggalrks = Tanggal::getTanggalLengkap($dokrks->tanggal);
			
			$jenispic = Panitia::model()->findByPk($Peng->id_panitia)->jenis_panitia;
			$metode = $Peng->metode_pengadaan;
			$panitia = Panitia::model()->findByPk($Peng->id_panitia);
			
			$skpanitia = "kami atas nama Panitia Pengadaan Barang/Jasa PT PLN (Persero) Kantor Pusat yang ditunjuk berdasarkan Surat Keputusan Direktur Sumber Daya Manusia dan Umum PT PLN (Persero) No. :  ". Panitia::model()->findByPk($Peng->id_panitia)->SK_panitia . " sebagai berikut :" ;
			$skpanitia2 = "saya ". $panitia->nama_panitia ." sebagai Pejabat Pengadaan Barang/Jasa PT PLN (Persero) Kantor Pusat";
			
			$this->doccy->newFile('11b Berita Acara Evaluasi Penawaran Sampul 2.docx');
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			$this->doccy->phpdocx->assign('#nomorba#', $nomor);
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->doccy->phpdocx->assign('#namapengadaankapital#', strtoupper($nama));
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#hari#', $hari);
			$this->doccy->phpdocx->assign('#norks#', $norks);
			$this->doccy->phpdocx->assign('#tanggalrks#', $tanggalrks);
			
			if(Panitia::model()->findByPk($Peng->id_panitia)->jenis_panitia == 'Panitia'){
				$this->doccy->phpdocx->assign('#skpanitia#', $skpanitia);
				$this->doccy->phpdocx->assign('#listpic#', $this->getListPanitiaAanwijzing($Peng->id_panitia));
				$this->doccy->phpdocx->assign('#panitia/pejabat#', "Panitia");
			}else{
				$this->doccy->phpdocx->assign('#skpanitia#', $skpanitia2);
				$this->doccy->phpdocx->assign('#listpic#', "");
				$this->doccy->phpdocx->assign('#panitia/pejabat#', "Pejabat");
			}
			$this->doccy->phpdocx->assign('#pejabatataupanitia2#', strtoupper($jenispic));
			$this->doccy->phpdocx->assign('#tdtgnpic#',$this->getTTPanitiaPembukaanSampul1($Peng->id_panitia));
			
			$this->doccy->phpdocx->assign('#listpesertasampul2#',$this->getPenyediaLulusEvalSampul2($Peng->id_pengadaan));
			$this->doccy->phpdocx->assign('#listpesertasampul2kesimpulan#',$this->getPenyediaLulusKesimpulan($Peng->id_pengadaan,'evaluasi_penawaran_2'));
			if($Peng->metode_penawaran=="Dua Sampul") {
				$this->doccy->phpdocx->assign('#sampul/tahapkapital#', 'SAMPUL');
				$this->doccy->phpdocx->assign('#sampul/tahap#', 'Sampul');
				$this->renderDocx("Berita Acara Evaluasi Penawaran Sampul 2-".$Peng->nama_pengadaan.".docx", true);
			} else if($Peng->metode_penawaran=="Dua Tahap") {
				$this->doccy->phpdocx->assign('#sampul/tahapkapital#', 'TAHAP');
				$this->doccy->phpdocx->assign('#sampul/tahap#', 'Tahap');
				$this->renderDocx("Berita Acara Evaluasi Penawaran Tahap 2-".$Peng->nama_pengadaan.".docx", true);
			}
		}
		else if ($Dok->nama_dokumen == "Berita Acara Negosiasi dan Klarifikasi"){
			
			$bakn=BeritaAcaraNegosiasiKlarifikasi::model()->findByPk($id);	
			$nomor = $bakn->nomor;
			$tanggal = $Dok->tanggal;
			$hari = Tanggal::getHari($tanggal);
			$tanggal1 = RupiahMaker::terbilangMaker(Tanggal::getTanggal($tanggal));
			$bulan = Tanggal::getBulanA($tanggal);
			$tahun = RupiahMaker::terbilangMaker(Tanggal::getTahun($tanggal));
			$tanggallengkap = Tanggal::getTanggalLengkap($tanggal);
			$tempat = $bakn->tempat;
			$kepada = $Peng->nama_penyedia;
			$nama = $Peng->nama_pengadaan;
			
			$namapic = $this->getListPanitiaNegoKlar($Peng->id_panitia);
			$jenispic = Panitia::model()->findByPk($Peng->id_panitia)->jenis_panitia;
			
			$dokNDPP = Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Nota Dinas Perintah Pengadaan"');
			$ndpp = NotaDinasPerintahPengadaan::model()->findByPk($dokNDPP->id_dokumen);
			$boss = strtoupper(Jabatan::model()->findByPk($ndpp->dari)->kepanjangan);
			$namaboss = Kdivmum::model()->find('id_jabatan = '.$ndpp->dari.' and status_user = "Aktif"')->nama;
			
			$dokrks=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "RKS"');
			$rks=Rks::model()->findByPk($dokrks->id_dokumen);	
			$norks = $rks->nomor; 
			$tglrks = Tanggal::getTanggalLengkap($dokrks->tanggal);
			$panitia = Panitia::model()->findByPk($Peng->id_panitia);
			
			$skpanitia = "kami atas nama Panitia Pengadaan Barang/Jasa PT PLN (Persero) Kantor Pusat yang ditunjuk berdasarkan Surat Keputusan Direktur Sumber Daya Manusia dan Umum PT PLN (Persero) No. :  ". Panitia::model()->findByPk($Peng->id_panitia)->SK_panitia ;
			$skpanitia2 = "saya ". Panitia::model()->findByPk($Peng->id_panitia)->nama_panitia ." sebagai Pejabat Pengadaan Barang/Jasa PT PLN (Persero) Kantor Pusat";
			
			if($Peng->metode_pengadaan == 'Pelelangan'){
				$dokspp=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Surat Pengumuman Pelelangan"');
				$spp = SuratPengumumanPelelangan::model()->findByPk($dokspp->id_dokumen);
				$nospp = $spp->nomor;
				$this->doccy->newFile('12c Berita Acara Klarifikasi.docx');
			
				$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
				$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
				$this->doccy->phpdocx->assign('#nospp#', $nospp);
				
			}else{
				$dokspph=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Surat Undangan Permintaan Penawaran Harga"');
				$spph = SuratUndanganPermintaanPenawaranHarga::model()->findByPk($dokspph->id_dokumen);
				$nospph = $spph->nomor;

				$this->doccy->newFile('12 Berita Acara Klarifikasi dan Negosiasi.docx');
				
				$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
				$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
				$this->doccy->phpdocx->assign('#nospph#', $nospph);
			}
			
			$this->doccy->phpdocx->assign('#nomor#', $nomor);
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->doccy->phpdocx->assign('#namapengadaankapital#', strtoupper($nama));
			$this->doccy->phpdocx->assign('#norks#', $norks);
			$this->doccy->phpdocx->assign('#tanggalrks#', $tglrks);
			$this->doccy->phpdocx->assign('#hari#', $hari);
			$this->doccy->phpdocx->assign('#tgl#', $tanggal1);
			$this->doccy->phpdocx->assign('#bulan#', $bulan);
			$this->doccy->phpdocx->assign('#tahun#', $tahun);
			$this->doccy->phpdocx->assign('#tempat#', $tempat);
			
			$this->doccy->phpdocx->assign('#tanggallengkap#', $tanggallengkap);
			$this->doccy->phpdocx->assign('#boss#',$boss);
			$this->doccy->phpdocx->assign('#namaboss#',$namaboss);
			$this->doccy->phpdocx->assign('#listpic#',$namapic);			
			
			$this->doccy->phpdocx->assign('#panitiaataupejabat#', strtoupper($jenispic));
			
			if(Panitia::model()->findByPk($Peng->id_panitia)->jenis_panitia == 'Panitia'){
				$this->doccy->phpdocx->assign('#skpanitia#', $skpanitia);				
			}else{
				$this->doccy->phpdocx->assign('#skpanitia#', $skpanitia2);				
			}
			
			if($Peng->metode_pengadaan == 'Pelelangan'){
				$this->renderDocx("Berita Acara Klarifikasi-".$Peng->nama_pengadaan.".docx", true);
			}else{
				$this->renderDocx("Berita Acara Negosiasi Klarifikasi-".$Peng->nama_pengadaan.".docx", true);
			}
			
		}
		else if ($Dok->nama_dokumen == "Berita Acara Pembukaan Penawaran"){
			
			$BAPP=BeritaAcaraPembukaanPenawaran::model()->findByPk($id);	
			$nomor = $BAPP->nomor;
			$nama = $Peng->nama_pengadaan;
			$tanggal = Tanggal::getTanggalLengkap($Dok->tanggal);
			$hari = Tanggal::getHari($tanggal);
			$waktu = Tanggal::getJamMenit($BAPP->waktu);
			$dokrks=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "RKS"');
			$rks=Rks::model()->findByPk($dokrks->id_dokumen);	
			$norks = $rks->nomor;
			$tanggalrks = Tanggal::getTanggalLengkap($dokrks->tanggal);
			$metode = $Peng->metode_pengadaan;
			$panitia = Panitia::model()->findByPk($Peng->id_panitia);
			$namapanitia=$panitia->nama_panitia;
			
			$namapic = $this->getListPanitiaAanwijzing($Peng->id_panitia);
			$jenispic = Panitia::model()->findByPk($Peng->id_panitia)->jenis_panitia;						
			$jenispic2 = Panitia::model()->findByPk($Peng->id_panitia)->nama_panitia;
			
			$this->doccy->newFile('10a Berita Acara Pembukaan Penawaran.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#nomorba#', $nomor);
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->doccy->phpdocx->assign('#namapengadaankapital#', strtoupper($nama));
			$this->doccy->phpdocx->assign('#hari#', $hari);
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#jam#', $waktu);
			$this->doccy->phpdocx->assign('#norks#', $norks);
			$this->doccy->phpdocx->assign('#tanggalrks#', $tanggalrks);
			
			$this->doccy->phpdocx->assign('#jumlahmasuk#', $this->getJmlPenyediaMasukPenawaran1($Peng->id_pengadaan));			
			
			$this->doccy->phpdocx->assign('#listpeserta#',$this->getPenyediaXMasukPenawaran1($Peng->id_pengadaan));
			$this->doccy->phpdocx->assign('#listpesertalulus#',$this->getPenyediaXHadirPenawaran1($Peng->id_pengadaan));
			$this->doccy->phpdocx->assign('#listpesertaluluskoma#',$this->getPenyediaXSahPenawaran1($Peng->id_pengadaan));
			$this->doccy->phpdocx->assign('#listpesertatdklulus#',$this->getPenyediaXTdkSahPenawaran1($Peng->id_pengadaan));
			$this->doccy->phpdocx->assign('#tdtgnpeserta#',$this->getTTPenyediaX($Peng->id_pengadaan,"pembukaan_penawaran_1"));	
			
			if($jenispic == 'Pejabat'){
				$this->doccy->phpdocx->assign('#pejabatataupanitia#', $jenispic);
			}else{
				$this->doccy->phpdocx->assign('#pejabatataupanitia#', Panitia::model()->findByPk($Peng->id_panitia)->nama_panitia);
			}
			$this->doccy->phpdocx->assign('#pejabatataupanitia2#', strtoupper($jenispic));
			$this->doccy->phpdocx->assign('#listpic#', $this->getListPanitiaAanwijzing($Peng->id_panitia));
			$this->doccy->phpdocx->assign('#metode#', $metode);
			$this->doccy->phpdocx->assign('#tdtgnpic#',$this->getTTPanitiaPembukaanSampul1($Peng->id_panitia));
			
			$this->renderDocx("Berita Acara Pembukaan Penawaran-".$Peng->nama_pengadaan.".docx", true);
		}
		else if ($Dok->nama_dokumen == "Berita Acara Evaluasi Prakualifikasi"){
			
			$BAEP=BeritaAcaraEvaluasiPrakualifikasi::model()->findByPk($id);	
			$nomor = $BAEP->nomor;
			$nama = $Peng->nama_pengadaan;
			$tanggall = Tanggal::getTanggalLengkap($Dok->tanggal);
			$tanggal = RupiahMaker::TerbilangMaker(Tanggal::getTanggal($Dok->tanggal));
			$bulan = Tanggal::getBulanA($Dok->tanggal);
			$tahun = RupiahMaker::TerbilangMaker(Tanggal::getTahun($Dok->tanggal));
			$hari = Tanggal::getHari($tanggal);
			$dokrks=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "RKS"');
			$rks=Rks::model()->findByPk($dokrks->id_dokumen);	
			$norks = $rks->nomor;
			$tanggalrks = Tanggal::getTanggalLengkap($dokrks->tanggal);
			$metode = $Peng->metode_pengadaan;
			$panitia = Panitia::model()->findByPk($Peng->id_panitia);
			$namapanitia=$panitia->nama_panitia;
			
			$namapic = $this->getListPanitiaAanwijzing($Peng->id_panitia);
			$jenispic = Panitia::model()->findByPk($Peng->id_panitia)->jenis_panitia;						
			$jenispic2 = Panitia::model()->findByPk($Peng->id_panitia)->nama_panitia;
			
			$this->doccy->newFile('4b BA Evaluasi Prakualifikasi.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#nomorba#', $nomor);
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->doccy->phpdocx->assign('#namapengadaankapital#', strtoupper($nama));
			$this->doccy->phpdocx->assign('#hari#', $hari);
			$this->doccy->phpdocx->assign('#tgllengkap#', $tanggall);
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#bulan#', $bulan);
			$this->doccy->phpdocx->assign('#tahun#', $tahun);
			
			$this->doccy->phpdocx->assign('#jumlahmasuk#', $this->getJmlPenyediaMasukPenawaran1($Peng->id_pengadaan));			
			
			$this->doccy->phpdocx->assign('#listpeserta#',$this->getPenyediaXMasukPenawaran1($Peng->id_pengadaan));
			$this->doccy->phpdocx->assign('#listpesertalulus#',$this->getPenyediaXHadirPenawaran1($Peng->id_pengadaan));
			$this->doccy->phpdocx->assign('#listpesertaluluskoma#',$this->getPenyediaXSahPenawaran1($Peng->id_pengadaan));
			$this->doccy->phpdocx->assign('#listpesertatdklulus#',$this->getPenyediaXTdkSahPenawaran1($Peng->id_pengadaan));
			$this->doccy->phpdocx->assign('#tdtgnpeserta#',$this->getTTPenyediaX($Peng->id_pengadaan,"pembukaan_penawaran_1"));	
			
			if($jenispic == 'Pejabat'){
				$this->doccy->phpdocx->assign('#pejabatataupanitia#', $jenispic);
			}else{
				$this->doccy->phpdocx->assign('#pejabatataupanitia#', Panitia::model()->findByPk($Peng->id_panitia)->nama_panitia);
			}
			$this->doccy->phpdocx->assign('#pejabatataupanitia2#', strtoupper($jenispic));
			$this->doccy->phpdocx->assign('#listpic#', $this->getListPanitiaAanwijzing($Peng->id_panitia));
			$this->doccy->phpdocx->assign('#jumlahperusahaanmengambil#', '');
			$this->doccy->phpdocx->assign('#listperusahaanmengambil#', '');
			$this->doccy->phpdocx->assign('#jumlahperusahaanmemasukan#', '');
			$this->doccy->phpdocx->assign('#listperusahaanmemasukan#', '');
			$this->doccy->phpdocx->assign('#jumlahperusahaantidakmemasukan#', '');
			$this->doccy->phpdocx->assign('#listperusahaantidakmemasukan#', '');
			$this->doccy->phpdocx->assign('#memenuhi#', '');
			$this->doccy->phpdocx->assign('#listmemenuhi#', '');
			$this->doccy->phpdocx->assign('#tidakmemenuhi#', '');
			$this->doccy->phpdocx->assign('#listtidakmemenuhi#', '');
			$this->doccy->phpdocx->assign('#tdtgnpic#',$this->getTTPanitiaPembukaanSampul1($Peng->id_panitia));
			
			$this->renderDocx("Berita Acara Pembukaan Penawaran-".$Peng->nama_pengadaan.".docx", true);
		}
		else if ($Dok->nama_dokumen == "Berita Acara Pembukaan Penawaran Sampul Satu" || $Dok->nama_dokumen == "Berita Acara Pembukaan Penawaran Tahap Satu"){
			
			$BAPP=BeritaAcaraPembukaanPenawaran::model()->findByPk($id);	
			$nomor = $BAPP->nomor;
			$nama = $Peng->nama_pengadaan;
			$tanggal = Tanggal::getTanggalLengkap($Dok->tanggal);
			$hari = Tanggal::getHari($tanggal);
			$dokrks=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "RKS"');
			$rks=Rks::model()->findByPk($dokrks->id_dokumen);	
			$norks = $rks->nomor;
			$tanggalrks = Tanggal::getTanggalLengkap($dokrks->tanggal);
			
			$metode = $Peng->metode_pengadaan;
			
			$jenispic = Panitia::model()->findByPk($Peng->id_panitia)->jenis_panitia;
			
			$this->doccy->newFile('10b Berita Acara Pembukaan Penawaran Sampul 1.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			$this->doccy->phpdocx->assign('#nomorba#', $nomor);
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->doccy->phpdocx->assign('#namapengadaankapital#', strtoupper($nama));			
			$this->doccy->phpdocx->assign('#hari#', $hari);
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#jam#', Tanggal::getJamMenit($BAPP->waktu));
			$this->doccy->phpdocx->assign('#norks#', $norks);
			$this->doccy->phpdocx->assign('#tanggalrks#', $tanggalrks);			
			$this->doccy->phpdocx->assign('#jumlahmasuk#', $this->getJmlPenyediaMasukPenawaran1($Peng->id_pengadaan));	
			$this->doccy->phpdocx->assign('#listpeserta#',$this->getPenyediaXMasukPenawaran1($Peng->id_pengadaan));
			$this->doccy->phpdocx->assign('#listpesertalulus#',$this->getPenyediaXHadirPenawaran1($Peng->id_pengadaan));
			$this->doccy->phpdocx->assign('#listpesertaluluskoma#',$this->getPenyediaXSahPenawaran1($Peng->id_pengadaan));
			$this->doccy->phpdocx->assign('#listpesertatdklulus#',$this->getPenyediaXTdkSahPenawaran1($Peng->id_pengadaan));
			$this->doccy->phpdocx->assign('#tdtgnpeserta#',$this->getTTPenyediaXHadirPenawaran1($Peng->id_pengadaan));	
			
			if($jenispic == 'Pejabat'){
				$this->doccy->phpdocx->assign('#pejabatataupanitia#', $jenispic);
			}else{
				$this->doccy->phpdocx->assign('#pejabatataupanitia#', Panitia::model()->findByPk($Peng->id_panitia)->nama_panitia);
			}			
			$this->doccy->phpdocx->assign('#pejabatataupanitia2#', strtoupper($jenispic));
			$this->doccy->phpdocx->assign('#listpic#', $this->getListPanitiaAanwijzing($Peng->id_panitia));
			$this->doccy->phpdocx->assign('#metode#', $metode);
			$this->doccy->phpdocx->assign('#tdtgnpic#',$this->getTTPanitiaPembukaanSampul1($Peng->id_panitia));
			
			if($Peng->metode_penawaran=="Dua Sampul") {
				$this->doccy->phpdocx->assign('#sampul/tahapkapital#', 'SAMPUL');
				$this->doccy->phpdocx->assign('#sampul/tahap#', 'Sampul');
				$this->renderDocx("Berita Acara Pembukaan Penawaran Sampul 1-".$Peng->nama_pengadaan.".docx", true);
			} else if($Peng->metode_penawaran=="Dua Tahap") {
				$this->doccy->phpdocx->assign('#sampul/tahapkapital#', 'TAHAP');
				$this->doccy->phpdocx->assign('#sampul/tahap#', 'Tahap');
				$this->renderDocx("Berita Acara Pembukaan Penawaran Tahap 1-".$Peng->nama_pengadaan.".docx", true);
			}
		}
		else if ($Dok->nama_dokumen == "Berita Acara Pembukaan Penawaran Sampul Dua" || $Dok->nama_dokumen == "Berita Acara Pembukaan Penawaran Tahap Dua"){
			
			$BAPP=BeritaAcaraPembukaanPenawaran::model()->findByPk($id);	
			$nomor = $BAPP->nomor;
			// $jumlah_penyedia_diundang = $BAPP->jumlah_penyedia_diundang;
			$nama = $Peng->nama_pengadaan;
			$tanggal = Tanggal::getTanggalLengkap($Dok->tanggal);
			$hari = Tanggal::getHari($tanggal);
			$dokrks=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "RKS"');
			$rks=Rks::model()->findByPk($dokrks->id_dokumen);	
			$norks = $rks->nomor;
			$tanggalrks = Tanggal::getTanggalLengkap($dokrks->tanggal);
			
			$metode = $Peng->metode_pengadaan;
			
			$jenispic = Panitia::model()->findByPk($Peng->id_panitia)->jenis_panitia;
			
			$this->doccy->newFile('10b Berita Acara Pembukaan Penawaran Sampul 2.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			$this->doccy->phpdocx->assign('#nomorba#', $nomor);
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->doccy->phpdocx->assign('#namapengadaankapital#', strtoupper($nama));
			$this->doccy->phpdocx->assign('#hari#', $hari);
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#jam#', Tanggal::getJamMenit($BAPP->waktu));
			$this->doccy->phpdocx->assign('#norks#', $norks);
			$this->doccy->phpdocx->assign('#tanggalrks#', $tanggalrks);					
			$this->doccy->phpdocx->assign('#listpeserta#',$this->getPenyediaXMasukPenawaran1($Peng->id_pengadaan));
			$this->doccy->phpdocx->assign('#listpesertasampul2#',$this->getPenyediaLulusX($Peng->id_pengadaan,'pembukaan_penawaran_2'));
			$this->doccy->phpdocx->assign('#tdtgnpesertasampul2#',$this->getTTPenyediaLulusX($Peng->id_pengadaan,'pembukaan_penawaran_2'));	
			
			if($jenispic == 'Pejabat'){
				$this->doccy->phpdocx->assign('#pejabatataupanitia#', $jenispic);
				$this->doccy->phpdocx->assign('#panitia/pejabat#', "Pejabat");
			}else{
				$this->doccy->phpdocx->assign('#pejabatataupanitia#', Panitia::model()->findByPk($Peng->id_panitia)->nama_panitia);
				$this->doccy->phpdocx->assign('#panitia/pejabat#', "Panitia");
			}
				
			$this->doccy->phpdocx->assign('#pejabatataupanitia2#', strtoupper($jenispic));
			$this->doccy->phpdocx->assign('#listpic#', $this->getListPanitiaAanwijzing($Peng->id_panitia));
			$this->doccy->phpdocx->assign('#metode#', $metode);
			$this->doccy->phpdocx->assign('#tdtgnpic#',$this->getTTPanitiaPembukaanSampul1($Peng->id_panitia));
			if($Peng->metode_penawaran=="Dua Sampul") {
				$this->doccy->phpdocx->assign('#sampul/tahapkapital#', 'SAMPUL');
				$this->doccy->phpdocx->assign('#sampul/tahap#', 'Sampul');
				$this->renderDocx("Berita Acara Pembukaan Penawaran Sampul 2-".$Peng->nama_pengadaan.".docx", true);
			} else if($Peng->metode_penawaran=="Dua Tahap") {
				$this->doccy->phpdocx->assign('#sampul/tahapkapital#', 'TAHAP');
				$this->doccy->phpdocx->assign('#sampul/tahap#', 'Tahap');
				$this->renderDocx("Berita Acara Pembukaan Penawaran Tahap 2-".$Peng->nama_pengadaan.".docx", true);
			}
		}
		else if ($Dok->nama_dokumen == "Surat Pengumuman Pemenang"){
			
			$PP = PenerimaPengadaan::model()->find('penetapan_pemenang = "1"  and id_pengadaan = ' . $Peng->id_pengadaan);
			
			$spp1 = SuratPengumumanPemenang::model()->findByPk($id);				
			$jenispic = Panitia::model()->findByPk($Peng->id_panitia)->jenis_panitia;				
			
			if($Peng->jenis_kualifikasi=="Pra Kualifikasi") {
				$dokspp=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Surat Pengumuman Pelelangan Prakualifikasi"');
				$spp = SuratPengumumanPelelangan::model()->findByPk($dokspp->id_dokumen);
			} else {
				$dokspp=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Surat Pengumuman Pelelangan"');
				$spp = SuratPengumumanPelelangan::model()->findByPk($dokspp->id_dokumen);
			}
			
			$dokpenetapan=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Nota Dinas Penetapan Pemenang"');
			$penetapan = NotaDinasPenetapanPemenang::model()->findByPk($dokpenetapan->id_dokumen);
			
			$dokndpp=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Nota Dinas Perintah Pengadaan"');
			$ndpp = NotaDinasPerintahPengadaan::model()->findByPk($dokndpp->id_dokumen);
			
			$this->doccy->newFile('14a Pengumuman Pemenang.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#nomor#', $spp1->nomor);
			$this->doccy->phpdocx->assign('#tanggal#', Tanggal::getTanggalLengkap($Dok->tanggal));
			$this->doccy->phpdocx->assign('#nospp#', $spp->nomor);
			$this->doccy->phpdocx->assign('#tglspp#', Tanggal::getTanggalLengkap($dokspp->tanggal));
			$this->doccy->phpdocx->assign('#nondpenetapan#', $penetapan->nomor);
			$this->doccy->phpdocx->assign('#tglpenetapan#', Tanggal::getTanggalLengkap($dokpenetapan->tanggal));
			$this->doccy->phpdocx->assign('#penyedia#', $PP->perusahaan);
			$this->doccy->phpdocx->assign('#biaya#', RupiahMaker::convertInt($PP->biaya));
			$this->doccy->phpdocx->assign('#keterangan#', $spp1->keterangan);
			$this->doccy->phpdocx->assign('#deadline#', $spp1->batas_sanggahan);
			$this->doccy->phpdocx->assign('#deadlineterbilang#', RupiahMaker::terbilangMaker($spp1->batas_sanggahan));
			$this->doccy->phpdocx->assign('#namapengadaan#', $Peng->nama_pengadaan);
			$this->doccy->phpdocx->assign('#panitia/pejabat2#', $jenispic);
			$this->doccy->phpdocx->assign('#penyediadetail#', $this->getPenyediaLulusPenetapanPemenang($Peng->id_pengadaan));
			$this->doccy->phpdocx->assign('#PemberiTugas#', Jabatan::model()->findByPk($ndpp->dari)->jabatan);
			$this->doccy->phpdocx->assign('#NamaPemberiTugas#', Kdivmum::model()->find('id_jabatan = '.$ndpp->dari.' and status_user = "Aktif"')->nama);
			
			if($jenispic == 'Panitia'){
				$this->doccy->phpdocx->assign('#namaketua#', Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Ketua"')->nama);
				$this->doccy->phpdocx->assign('#kalimat#', 'Ketua');
			}else{
				$this->doccy->phpdocx->assign('#namaketua#', Panitia::model()->findByPk($Peng->id_panitia)->nama_panitia);
				$this->doccy->phpdocx->assign('#kalimat#', '');
			}
			
			$this->doccy->phpdocx->assign('#listpeserta#', $this->getPenyediaX($Peng->id_pengadaan,'pengambilan_dokumen'));
			
			$this->renderDocx("Surat Pengumuman Pemenang-".$Peng->nama_pengadaan.".docx", true);
		}
		else if ($Dok->nama_dokumen == "Lampiran Berita Acara Aanwijzing"){
			$Pengadaan = Pengadaan::model()->findByPk($Dok->id_pengadaan);
			$DokBAP = Dokumen::model()->find('id_pengadaan = '.$Dok->id_pengadaan.' and nama_dokumen = "Berita Acara Aanwijzing"');
			$BAP = BeritaAcaraPenjelasan::model()->findByPk($DokBAP->id_dokumen);
			$DokHPS = Dokumen::model()->find('id_pengadaan = '.$Dok->id_pengadaan.' and nama_dokumen = "HPS"');
			$HPS = Hps::model()->findByPk($DokHPS->id_dokumen);
			$Panitia = Panitia::model()->findByPk($Pengadaan->id_panitia);
			$this->doccy->newFile('9b Lampiran Berita Acara Aanwijzing.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			$this->doccy->phpdocx->assignToHeader("#nomor#", $BAP->nomor);
			$this->doccy->phpdocx->assignToHeader("#tanggal#", Tanggal::getTanggalLengkap($DokBAP->tanggal)); 
			$this->doccy->phpdocx->assign('#namapengadaan#', $Pengadaan->nama_pengadaan);
			$this->doccy->phpdocx->assign('#nilaihps#', RupiahMaker::convertInt($HPS->nilai_hps));
			$this->doccy->phpdocx->assign('#terbilang#', RupiahMaker::terbilangMaker($HPS->nilai_hps));
			
			if($Panitia->jenis_panitia == "Panitia"){
				$this->doccy->phpdocx->assign('#panitia/pejabat#', strtoupper($Panitia->nama_panitia));
				$this->doccy->phpdocx->assign('#listpanitia#', $this->getListPanitia($Panitia->id_panitia));
			}else{
				$this->doccy->phpdocx->assign('#panitia/pejabat#', strtoupper($Panitia->jenis_panitia));
				$this->doccy->phpdocx->assign('#listpanitia#', $Panitia->nama_panitia."                     ..........................................................");
			}			
			$this->doccy->phpdocx->assign('#listpeserta#', $this->getTTPenyediaX($Peng->id_pengadaan,'ba_aanwijzing'));			
			$this->renderDocx("Lampiran Berita Acara Aanwijzing-".$Peng->nama_pengadaan.".docx", true);
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
			$this->renderDocx("Temp-".$Peng->nama_pengadaan.".docx", true);
		}
	}

	function getListPanitiaTanpaKetua($idPan){
		if(Panitia::model()->findByPk($idPan)->jenis_panitia == "Pejabat"){
			$list = "";
		}else{
			$list = "1. " . Anggota::model()->find('id_panitia = ' . $idPan . ' and jabatan = "Sekretaris" and status_user = "Aktif"')->nama;
			$Anggota = Anggota::model()->findAll('id_panitia = ' . $idPan. ' and jabatan = "Anggota" and status_user = "Aktif"');
			$i=2;
			foreach ($Anggota as $item) {
				$list .= '<w:br/>';
				$list .= $i.". ". $item->nama;
				$i++;
			}
		}
		return  $list;
	}

	function getListPanitia($idPan){
		if(Panitia::model()->findByPk($idPan)->jenis_panitia == "Pejabat"){
			$list = "";
		}else{
			$list = "1. " . Anggota::model()->find('id_panitia = ' . $idPan . ' and jabatan = "Ketua" and status_user = "Aktif"')->nama . "																			Ketua								(.................................)";
			$list .= '<w:br/>';
			$list .= '<w:br/>';
			$list .= "2. " . Anggota::model()->find('id_panitia = ' . $idPan . ' and jabatan = "Sekretaris" and status_user = "Aktif"')->nama . "																	Sekretaris								(.................................)";
			$Anggota = Anggota::model()->findAll('id_panitia = ' . $idPan. ' and jabatan = "Anggota" and status_user = "Aktif"');
			$i=3;
			foreach ($Anggota as $item) {
				$list .= '<w:br/>';
				$list .= '<w:br/>';
				$list .= $i.". ". $item->nama. "																	Anggota								(.................................)";;
				$i++;
			}
		}
		return  $list;
	}
	
	function getListPanitiaAanwijzing($idPan){
		if(Panitia::model()->findByPk($idPan)->jenis_panitia == "Pejabat"){
			$list = Panitia::model()->findByPk($idPan)->nama_panitia;
		}else{
			$list = "1. " . Anggota::model()->find('id_panitia = ' . $idPan . ' and jabatan = "Ketua" and status_user = "Aktif"')->nama . " : sebagai Ketua merangkap Anggota" ;
			$list .= '<w:br/>';
			// $list .= '<w:br/>';
			$list .= "2. " . Anggota::model()->find('id_panitia = ' . $idPan . ' and jabatan = "Sekretaris" and status_user = "Aktif"')->nama . " : sebagai Sekretaris merangkap Anggota";
			$anggota=Anggota::model()->findAll('id_panitia = ' . $idPan . ' and jabatan = "Anggota" and status_user = "Aktif"');
			$i=3;
			foreach ($anggota as $item){
				$list .= '<w:br/>';
				$list .= $i.". ". $item->nama." : sebagai Anggota";
				$i++;
			}
		}
		return  $list;
	}
	
	function getListPanitiaTTAanwijzing($idPan){ //td tgn selang-seling
		if(Panitia::model()->findByPk($idPan)->jenis_panitia == "Pejabat"){
			$list = Panitia::model()->findByPk($idPan)->nama_panitia;
		}else{
			$list = "1. " . Anggota::model()->find('id_panitia = ' . $idPan . ' and jabatan = "Ketua" and status_user = "Aktif"')->nama . "                                                       ...........................................";
			$list .= '<w:br/>';		
			$list .= '<w:br/>';					
			$list .= "2. " . Anggota::model()->find('id_panitia = ' . $idPan . ' and jabatan = "Sekretaris" and status_user = "Aktif"')->nama . "                  ...........................................";
			$anggota=Anggota::model()->findAll('id_panitia = ' . $idPan . ' and jabatan = "Anggota" and status_user = "Aktif"');
			$i=3;
			foreach ($anggota as $item){
				$list .= '<w:br/>';
				$list .= '<w:br/>';
				if($i%2==0){
					$list .= $i.". " .$item->nama. "                  ...........................................";
				}else{
					$list .= $i.". " .$item->nama . "                                                       ...........................................";
				}
				$i++;
			}
		}
		return  $list;
	}
	
	function getListPanitiaNegoKlar($idPan){ //td tgn biasa
		if(Panitia::model()->findByPk($idPan)->jenis_panitia == "Pejabat"){
			$list = Panitia::model()->findByPk($idPan)->nama_panitia;
		}else{
			$list = "1. " . Anggota::model()->find('id_panitia = ' . $idPan . ' and jabatan = "Ketua" and status_user = "Aktif"')->nama . "/Ketua : ...........................................";
			$list .= '<w:br/>';			
			$list .= '<w:br/>';		
			$list .= "2. " . Anggota::model()->find('id_panitia = ' . $idPan . ' and jabatan = "Sekretaris" and status_user = "Aktif"')->nama . "/Sekretaris : ...........................................";
			$anggota=Anggota::model()->findAll('id_panitia = ' . $idPan . ' and jabatan = "Anggota" and status_user = "Aktif"');
			$i=3;
			foreach ($anggota as $item){
				$list .= '<w:br/>';
				$list .= '<w:br/>';
				$list .= $i.". " .$item->nama."/Anggota : ...........................................";
				$i++;
			}
		}
		return  $list;
	}
	
	function getTTPanitiaPembukaanSampul1($idPan){ //td tgn biasa
		if(Panitia::model()->findByPk($idPan)->jenis_panitia == "Pejabat"){
			$list = Panitia::model()->findByPk($idPan)->nama_panitia;
		}else{
			$list = "1. " . Anggota::model()->find('id_panitia = ' . $idPan . ' and jabatan = "Ketua" and status_user = "Aktif"')->nama . "                                                       ...........................................";
			$list .= '<w:br/>';		
			$list .= '<w:br/>';					
			$list .= "2. " . Anggota::model()->find('id_panitia = ' . $idPan . ' and jabatan = "Sekretaris" and status_user = "Aktif"')->nama . "                  ...........................................";
			$anggota=Anggota::model()->findAll('id_panitia = ' . $idPan . ' and jabatan = "Anggota" and status_user = "Aktif"');
			$i=3;
			foreach ($anggota as $item){
				$list .= '<w:br/>';
				$list .= '<w:br/>';
				if($i%2==0){
					$list .= $i.". " .$item->nama. "                  ...........................................";
				}else{
					$list .= $i.". " .$item->nama . "                                                       ...........................................";
				}
				$i++;
			}
		}
		return  $list;
	}	
	
	function getPenyediaX($idpeng,$tahap){
		$arraypenyedia = PenerimaPengadaan::model()->findAll('(' . $tahap . ' = "1" or ' . $tahap . ' = "0") and id_pengadaan = ' . $idpeng);
		$stringpenyedia = "";
				
		if($arraypenyedia == null){
			$stringpenyedia = '-';
		}else{		
			for($i=0;$i<count($arraypenyedia);$i++){
				$stringpenyedia .= $arraypenyedia[$i]->perusahaan . '<w:br/>';
			}
		}
		
		return $stringpenyedia;
	}
	
	function getPenyediaXDenganNumbering($idpeng,$tahap){
		$arraypenyedia = PenerimaPengadaan::model()->findAll('(' . $tahap . ' = "1" or ' . $tahap . ' = "0") and id_pengadaan = ' . $idpeng);
		$stringpenyedia = "";
				
		if($arraypenyedia == null){
			$stringpenyedia = '-';
		}else{		
			for($i=0;$i<count($arraypenyedia);$i++){
				$stringpenyedia .= ($i+1).'. '.$arraypenyedia[$i]->perusahaan . '<w:br/>';
			}
		}
		
		return $stringpenyedia;
	}
	
	function getTTPenyediaX($idpeng,$tahap){
		$arraypenyedia = PenerimaPengadaan::model()->findAll('(' . $tahap . ' = "1" or ' . $tahap . ' = "0") and id_pengadaan = ' . $idpeng);
		$stringpenyedia = "";
				
		if($arraypenyedia == null){
			$stringpenyedia = '-';
		}else{		
			for($i=0;$i<count($arraypenyedia);$i++){
				$stringpenyedia .= $arraypenyedia[$i]->perusahaan . '                                ................................................. <w:br/> <w:br/>';
			}
		}
		
		return $stringpenyedia;
	}
	
	function getPenyediaLulusX($idpeng,$tahap){
		$arraypenyedia = PenerimaPengadaan::model()->findAll($tahap . ' = "1" and id_pengadaan = ' . $idpeng);
		$stringpenyedia = "";
				
		if($arraypenyedia == null){
			$stringpenyedia = '-';
		}else{		
			for($i=0;$i<count($arraypenyedia);$i++){
				$stringpenyedia .= $arraypenyedia[$i]->perusahaan . '<w:br/>';
			}
		}
		
		return $stringpenyedia;
	}
	
	function getPenyediaLulusXDanAlamat($idpeng,$tahap){
		$arraypenyedia = PenerimaPengadaan::model()->findAll($tahap . ' = "1" and id_pengadaan = ' . $idpeng);
		$stringpenyedia = "";
				
		if($arraypenyedia == null){
			$stringpenyedia = '-';
		}else{		
			for($i=0;$i<count($arraypenyedia);$i++){
				$stringpenyedia .= $arraypenyedia[$i]->perusahaan .'<w:br/>';
				$stringpenyedia .= $arraypenyedia[$i]->alamat .'<w:br/>';
			}
		}
		
		return $stringpenyedia;
	}
	
	function getTTPenyediaLulusX($idpeng,$tahap){
		$arraypenyedia = PenerimaPengadaan::model()->findAll($tahap . ' = "1" and id_pengadaan = ' . $idpeng);
		$stringpenyedia = "";
				
		if($arraypenyedia == null){
			$stringpenyedia = '-';
		}else{		
			for($i=0;$i<count($arraypenyedia);$i++){
				$stringpenyedia .= $arraypenyedia[$i]->perusahaan . '                                ................................................. <w:br/> <w:br/>';
			}
		}
		
		return $stringpenyedia;
	}
	
	function getPenyediaTdkLulusX($idpeng,$tahap){
		$arraypenyedia = PenerimaPengadaan::model()->findAll($tahap . ' = "0" and id_pengadaan = ' . $idpeng);
		$stringpenyedia = "";
				
		if($arraypenyedia == null){
			$stringpenyedia = '-';
		}else{		
			for($i=0;$i<count($arraypenyedia);$i++){
				$stringpenyedia .= $arraypenyedia[$i]->perusahaan . '<w:br/>';
			}
		}
		
		return $stringpenyedia;
	}
	
	function getTTPenyediaTdkLulusX($idpeng,$tahap){
		$arraypenyedia = PenerimaPengadaan::model()->findAll($tahap . ' = "0" and id_pengadaan = ' . $idpeng);
		$stringpenyedia = "";
				
		if($arraypenyedia == null){
			$stringpenyedia = '-';
		}else{		
			for($i=0;$i<count($arraypenyedia);$i++){
				$stringpenyedia .= $arraypenyedia[$i]->perusahaan . '                                ................................................. <w:br/> <w:br/>';
			}
		}
		
		return $stringpenyedia;
	}	
			
	function getJmlPenyedia($idpeng, $tahap){
		$arraypenyedia = PenerimaPengadaan::model()->findAll('(' . $tahap . ' = "1" or ' . $tahap . ' = "0") and id_pengadaan = ' . $idpeng);
		return count($arraypenyedia);
	}
	
	function getJmlPenyediaLulus($idpeng, $tahap){
		$arraypenyedia = PenerimaPengadaan::model()->findAll($tahap . ' = "1" and id_pengadaan = ' . $idpeng);
		return count($arraypenyedia);
	}
	
	function getJmlPenyediaMasukPenawaran1($idpeng){
		$arraypenyedia = PenerimaPengadaan::model()->findAll('( hadir_pembukaan_penawaran_1 = "1" or  hadir_pembukaan_penawaran_1 = "2") and id_pengadaan = ' . $idpeng);
		return count($arraypenyedia);
	}
	
	function getPenyediaLulusEvalSampul2($idpeng){
		$dokhps = Dokumen::model()->find('id_pengadaan = ' . $idpeng . ' and nama_dokumen = "HPS"');
		$hps = HPS::model()->findByPk($dokhps->id_dokumen);
		
		$arraypenyedia = PenerimaPengadaan::model()->findAll('evaluasi_penawaran_2 = "1"  and id_pengadaan = ' . $idpeng);
		$stringpenyedia = "";
		
		if($arraypenyedia == null){
			$stringpenyedia = '-';
		}else{		
			for($i=0;$i<count($arraypenyedia);$i++){
				$stringpenyedia .= 	'PT. ' . $arraypenyedia[$i]->perusahaan . '<w:br/>'  .
									'a. Harga yang ditawarkan sebesar ' . RupiahMaker::convertInt($arraypenyedia[$i]->biaya) . '(' . RupiahMaker::TerbilangMaker($arraypenyedia[$i]->biaya) . ' rupiah)' . ' sesuai data yang ada didalam server PT PLN (Persero) / e-proc PLN.' . '<w:br/>' . 
									'b. Harga penawaran sebesar ' . RupiahMaker::convertInt($arraypenyedia[$i]->biaya) . '(' . RupiahMaker::TerbilangMaker($arraypenyedia[$i]->biaya) . ' rupiah)' . ' lebih rendah dari ' . $this->persenMaker($arraypenyedia[$i]->biaya,$hps->nilai_hps) .'% HPS <w:br/>'
									;
			}
		}		
		return $stringpenyedia;
	}
	
	function getPenyediaLulusEval1Sampul($idpeng){
		$dokhps = Dokumen::model()->find('id_pengadaan = ' . $idpeng . ' and nama_dokumen = "HPS"');
		$hps = HPS::model()->findByPk($dokhps->id_dokumen);

		$arraypenyedia = PenerimaPengadaan::model()->findAll('evaluasi_penawaran_1 = "1"  and id_pengadaan = ' . $idpeng);
		$stringpenyedia = "";
				
		if($arraypenyedia == null){
			$stringpenyedia = '-';
		}else{		
			for($i=0;$i<count($arraypenyedia);$i++){
				$stringpenyedia .= 	'PT. ' . $arraypenyedia[$i]->perusahaan . '<w:br/>'  .
									'a. Harga yang ditawarkan sebesar ' . RupiahMaker::convertInt($arraypenyedia[$i]->biaya) . '(' . RupiahMaker::TerbilangMaker($arraypenyedia[$i]->biaya) . ' rupiah)' . ' sesuai data yang ada didalam server PT PLN (Persero) / e-proc PLN.' . '<w:br/>' . 
									'b. Harga penawaran sebesar ' . RupiahMaker::convertInt($arraypenyedia[$i]->biaya) . '(' . RupiahMaker::TerbilangMaker($arraypenyedia[$i]->biaya) . ' rupiah)' . ' lebih rendah dari ' . $this->persenMaker($arraypenyedia[$i]->biaya,$hps->nilai_hps) .'% HPS <w:br/>'
									;
			}
		}		
		return $stringpenyedia;
	}
	
	function getPenyediaLulusKesimpulan($idpeng,$tahap){
		$arraypenyedia = PenerimaPengadaan::model()->findAll($tahap . ' = "1"  and id_pengadaan = ' . $idpeng . ' order by biaya');
		$stringpenyedia = "";
				
		if($arraypenyedia == null){
			$stringpenyedia = '-';
		}else{		
			for($i=0;$i<count($arraypenyedia);$i++){
				$stringpenyedia .= 	'Calon Pemenang ' . ($i+1) . '<w:br/>' . 
									'Nama Perusahaan 	: ' . $arraypenyedia[$i]->perusahaan . '<w:br/>' . 
									'Alamat			 	: ' . $arraypenyedia[$i]->alamat . '<w:br/>' . 
									'NPWP			 	: ' . $arraypenyedia[$i]->npwp . '<w:br/>' .
									'Nilai Penawaran 	: ' . RupiahMaker::convertInt($arraypenyedia[$i]->biaya) . '<w:br/>' .
									'Terbilang 			: ' . RupiahMaker::TerbilangMaker($arraypenyedia[$i]->biaya) . ' rupiah, sudah termasuk pajak sesuai dengan ketentuan yang berlaku. <w:br/> <w:br/>'
									;
			}
		}		
		return $stringpenyedia;
	}
	
	function getPenyediaLulusPenetapanPemenang($idpeng){
		$arraypenyedia = PenerimaPengadaan::model()->findAll('penetapan_pemenang = "1"  and id_pengadaan = ' . $idpeng);
		$stringpenyedia = "";
				
		if($arraypenyedia == null){
			$stringpenyedia = '-';
		}else{		
			for($i=0;$i<count($arraypenyedia);$i++){
				$stringpenyedia .= 	'Nama Perusahaan 	: ' . $arraypenyedia[$i]->perusahaan . '<w:br/>' . 
									'Alamat			 	: ' . $arraypenyedia[$i]->alamat . '<w:br/>' . 
									'NPWP			 	: ' . $arraypenyedia[$i]->npwp . '<w:br/>' .
									'Nilai Penawaran 	: ' . RupiahMaker::convertInt($arraypenyedia[$i]->biaya) . '<w:br/>' .
									'Terbilang 			: ' . RupiahMaker::TerbilangMaker($arraypenyedia[$i]->biaya) . ' rupiah, sudah termasuk pajak sesuai dengan ketentuan yang berlaku. <w:br/>'
									;
			}
		}		
		return $stringpenyedia;
	}
	
	function getPenyediaXMasukPenawaran1($idpeng){
		$arraypenyedia = PenerimaPengadaan::model()->findAll('(hadir_pembukaan_penawaran_1 = "1" or  hadir_pembukaan_penawaran_1 = "2") and id_pengadaan = ' . $idpeng);
		$stringpenyedia = "";
				
		if($arraypenyedia == null){
			$stringpenyedia = '-';
		}else{		
			for($i=0;$i<count($arraypenyedia);$i++){
				$stringpenyedia .= $arraypenyedia[$i]->perusahaan . '<w:br/>';
			}
		}
		
		return $stringpenyedia;
	}
	
	function getPenyediaXSahPenawaran1($idpeng){
		$arraypenyedia = PenerimaPengadaan::model()->findAll('pembukaan_penawaran_1 = "1" and id_pengadaan = ' . $idpeng);
		$stringpenyedia = "";
				
		if($arraypenyedia == null){
			$stringpenyedia = '-';
		}else{		
			for($i=0;$i<count($arraypenyedia);$i++){
				$stringpenyedia .= $arraypenyedia[$i]->perusahaan . '<w:br/>';
			}
		}
		
		return $stringpenyedia;
	}
	
	function getPenyediaXTdkSahPenawaran1($idpeng){
		$arraypenyedia = PenerimaPengadaan::model()->findAll('pembukaan_penawaran_1 = "0" and id_pengadaan = ' . $idpeng);
		$stringpenyedia = "";
				
		if($arraypenyedia == null){
			$stringpenyedia = '-';
		}else{		
			for($i=0;$i<count($arraypenyedia);$i++){
				$stringpenyedia .= $arraypenyedia[$i]->perusahaan . '<w:br/>';
			}
		}
		
		return $stringpenyedia;
	}
	
	function getPenyediaXHadirPenawaran1($idpeng){
		$arraypenyedia = PenerimaPengadaan::model()->findAll('hadir_pembukaan_penawaran_1 = "1" and id_pengadaan = ' . $idpeng);
		$stringpenyedia = "";
				
		if($arraypenyedia == null){
			$stringpenyedia = '-';
		}else{		
			for($i=0;$i<count($arraypenyedia);$i++){
				$stringpenyedia .= $arraypenyedia[$i]->perusahaan . '<w:br/>';
			}
		}
		
		return $stringpenyedia;
	}
	
	function getTTPenyediaXHadirPenawaran1($idpeng){
		$arraypenyedia = PenerimaPengadaan::model()->findAll('hadir_pembukaan_penawaran_1 = "1" and id_pengadaan = ' . $idpeng);
		$stringpenyedia = "";
				
		if($arraypenyedia == null){
			$stringpenyedia = '-';
		}else{		
			for($i=0;$i<count($arraypenyedia);$i++){
				$stringpenyedia .= $arraypenyedia[$i]->perusahaan . '                                ................................................. <w:br/> <w:br/>';
			}
		}
		
		return $stringpenyedia;
	}

	
	function persenMaker($biaya,$hps){				
		return ($biaya/$hps)*100;
	}
	
	function getTembusan ($id){
		$list = '';
		$berwenang = Jabatan::model()->findAll('id_jabatan != '.$id.' and status = "Aktif"');
		foreach ($berwenang as $item) {
			$list .= '- '.$item->jabatan. '<w:br/>';
		}
		return $list;
	}
	
	
}
?>