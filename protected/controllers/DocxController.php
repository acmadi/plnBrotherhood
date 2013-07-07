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
		// if ($Peng->metode_pengadaan=="Penunjukan Langsung") {
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
					$nama_pengadaan = $Peng->nama_pengadaan;
					$nomor_rks = $RKS->nomor;
					$tanggal_rks = Tanggal::getTanggalLengkap($DokRKS->tanggal);
					$tempatsurat = $DokRKS->tempat;
					$tanggal_penjelasan = Tanggal::getTanggalLengkap($RKS->tanggal_penjelasan);
					$tanggal_permintaan = Tanggal::getTanggalLengkap($RKS->tanggal_permintaan_penawaran);
					$waktu_penjelasan = Tanggal::getJamMenit($RKS->waktu_penjelasan);
					$tempat_penjelasan = $RKS->tempat_penjelasan;
					$tanggal_awal_pemasukan= Tanggal::getTanggalLengkap($RKS->tanggal_awal_pemasukan_penawaran1);
					$tanggal_akhir_pemasukan= Tanggal::getTanggalLengkap($RKS->tanggal_akhir_pemasukan_penawaran1);
					$waktu_pemasukan = Tanggal::getJamMenit($RKS->waktu_pemasukan_penawaran1);
					$tempat_pemasukan = $RKS->tempat_pemasukan_penawaran1;
					$tanggal_pembukaan= Tanggal::getTanggalLengkap($RKS->tanggal_pembukaan_penawaran1);
					$waktu_pembukaan = Tanggal::getJamMenit($RKS->waktu_pembukaan_penawaran1);
					$tempat_pembukaan = $RKS->tempat_pembukaan_penawaran1;
					$tanggal_evaluasi= Tanggal::getTanggalLengkap($RKS->tanggal_evaluasi_penawaran1);
					$waktu_evaluasi = Tanggal::getJamMenit($RKS->waktu_evaluasi_penawaran1);
					$tempat_evaluasi = $RKS->tempat_evaluasi_penawaran1;
					$tanggal_negosiasi= Tanggal::getTanggalLengkap($RKS->tanggal_negosiasi);
					$waktu_negosiasi = Tanggal::getJamMenit($RKS->waktu_negosiasi);
					$tempat_negosiasi = $RKS->tempat_negosiasi;
					$tanggal_usulan= Tanggal::getTanggalLengkap($RKS->tanggal_usulan_pemenang);
					$waktu_usulan = Tanggal::getJamMenit($RKS->waktu_usulan_pemenang);
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
					$jangka_waktu_penyerahan = $RKS->jangka_waktu_penyerahan;
					$terbilang_jangka_waktu_penyerahan = RupiahMaker::terbilangMaker($jangka_waktu_penyerahan);
					$tanggal_terakhir_penyerahan = Tanggal::getTanggalLengkap($RKS->tanggal_paling_lambat_penyerahan);
					$lama_berlaku_jaminan = $RKS->jangka_waktu_berlaku_jaminan;
					$terbilang_lama_berlaku_jaminan = RupiahMaker::terbilangMaker($lama_berlaku_jaminan);
					$lama_waktu_tambahan = $RKS->lama_waktu_tambahan;
					$terbilang_lama_waktu_tambahan = RupiahMaker::terbilangMaker($lama_waktu_tambahan);
					$pengesah = $NDPP->dari;
					if ($pengesah == "MSDAF") {
						$nama_pengesah = User::model()->findByPk(Kdivmum::model()->find('jabatan = "MSDAF"')->username)->nama;
					} else {
						$nama_pengesah = User::model()->findByPk(Kdivmum::model()->find('jabatan = "KDIVMUM"')->username)->nama;
					}
					if($Panitia->jenis_panitia=="Pejabat") {
						$nama_pembuat = User::model()->findByPk(Anggota::model()->find('id_panitia = '.$Panitia->id_panitia)->username)->nama;
					} else {
						$nama_pembuat = User::model()->findByPk(Anggota::model()->find('id_panitia = '.$Panitia->id_panitia. ' and jabatan = "Ketua"')->username)->nama;
					}
					
					$this->doccy->newFile('PL-B-Isi.docx');
					$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					$this->doccy->phpdocx->assignToHeader('#nomor rks#', $nomor_rks);
					$this->doccy->phpdocx->assignToHeader('#tanggal rks#', $tanggal_rks);
					$this->doccy->phpdocx->assign('#nomor rks#', $nomor_rks);
					$this->doccy->phpdocx->assign('#nama pengadaan#', $nama_pengadaan);
					$this->doccy->phpdocx->assign('#tempat surat#', $tempatsurat);
					$this->doccy->phpdocx->assign('#tanggal rks#', $tanggal_rks);
					$this->doccy->phpdocx->assign('#tanggal penjelasan#', $tanggal_penjelasan);
					$this->doccy->phpdocx->assign('#tanggal permintaan#', $tanggal_permintaan);
					$this->doccy->phpdocx->assign('#waktu penjelasan#', $waktu_penjelasan);
					$this->doccy->phpdocx->assign('#tempat penjelasan#', $tempat_penjelasan);
					$this->doccy->phpdocx->assign('#tanggal awal pemasukan#', $tanggal_awal_pemasukan);
					$this->doccy->phpdocx->assign('#tanggal akhir pemasukan#', $tanggal_akhir_pemasukan);
					$this->doccy->phpdocx->assign('#waktu pemasukan#', $waktu_pemasukan);
					$this->doccy->phpdocx->assign('#tempat pemasukan#', $tempat_pemasukan);
					$this->doccy->phpdocx->assign('#tanggal pembukaan#', $tanggal_pembukaan);
					$this->doccy->phpdocx->assign('#waktu pembukaan#', $waktu_pembukaan);
					$this->doccy->phpdocx->assign('#tempat pembukaan#', $tempat_pembukaan);
					$this->doccy->phpdocx->assign('#tanggal evaluasi#', $tanggal_evaluasi);
					$this->doccy->phpdocx->assign('#waktu evaluasi#', $waktu_evaluasi);
					$this->doccy->phpdocx->assign('#tempat evaluasi#', $tempat_evaluasi);
					$this->doccy->phpdocx->assign('#tanggal negosiasi#', $tanggal_negosiasi);
					$this->doccy->phpdocx->assign('#waktu negosiasi#', $waktu_negosiasi);
					$this->doccy->phpdocx->assign('#tempat negosiasi#', $tempat_negosiasi);
					$this->doccy->phpdocx->assign('#tanggal usulan#', $tanggal_usulan);
					$this->doccy->phpdocx->assign('#waktu usulan#', $waktu_usulan);
					$this->doccy->phpdocx->assign('#tanggal penetapan#', $tanggal_penetapan);
					$this->doccy->phpdocx->assign('#waktu penetapan#', $waktu_penetapan);
					$this->doccy->phpdocx->assign('#jenis panitia#', $jenis_panitia);
					$this->doccy->phpdocx->assign('#jenis panitia kapital#', $jenis_panitia_kapital);
					$this->doccy->phpdocx->assign('#sumber dana#', $sumber_dana);
					$this->doccy->phpdocx->assign('#metode pengadaan#', $metode_pengadaan);
					$this->doccy->phpdocx->assign('#metode penawaran#', $metode_penawaran);
					$this->doccy->phpdocx->assign('#jenis kualifikasi#', $jenis_kualifikasi);
					$this->doccy->phpdocx->assign('#sistem evaluasi#', $sistem_evaluasi);
					$this->doccy->phpdocx->assign('#jangka waktu penyerahan#', $jangka_waktu_penyerahan);
					$this->doccy->phpdocx->assign('#terbilang jangka waktu#', $terbilang_jangka_waktu_penyerahan);
					$this->doccy->phpdocx->assign('#tanggal terakhir penyerahan#', $tanggal_terakhir_penyerahan);
					$this->doccy->phpdocx->assign('#lama berlaku jaminan#', $lama_berlaku_jaminan);
					$this->doccy->phpdocx->assign('#terbilang lama berlaku jaminan#', $terbilang_lama_berlaku_jaminan);
					$this->doccy->phpdocx->assign('#lama waktu tambahan#', $lama_waktu_tambahan);
					$this->doccy->phpdocx->assign('#terbilang lama waktu tambahan#', $terbilang_lama_waktu_tambahan);
					$this->doccy->phpdocx->assign('#pengesah#', $pengesah);
					$this->doccy->phpdocx->assign('#nama pengesah#', $nama_pengesah);
					$this->doccy->phpdocx->assign('#nama pejabat / ketua panitia#', $nama_pembuat);					
					$this->renderDocx("RKS-PL-B-Isi.docx", true);
				
				} else if ($Rincian->nama_rincian=="Lampiran 1") {
					$nomor_rks = $RKS->nomor;
					
					$this->doccy->newFile('PL-B-Lamp_1.docx');
					$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					$this->doccy->phpdocx->assign('#nomor rks#', $nomor_rks);
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
					$nama_pengadaan = $Peng->nama_pengadaan;
					$nomor_rks = $RKS->nomor;
					$tanggal_rks = Tanggal::getTanggalLengkap($DokRKS->tanggal);
					$tempatsurat = $DokRKS->tempat;
					$tanggal_penjelasan = Tanggal::getTanggalLengkap($RKS->tanggal_penjelasan);
					$tanggal_permintaan = Tanggal::getTanggalLengkap($RKS->tanggal_permintaan_penawaran);
					$waktu_penjelasan = Tanggal::getJamMenit($RKS->waktu_penjelasan);
					$tempat_penjelasan = $RKS->tempat_penjelasan;
					$tanggal_awal_pemasukan= Tanggal::getTanggalLengkap($RKS->tanggal_awal_pemasukan_penawaran1);
					$tanggal_akhir_pemasukan= Tanggal::getTanggalLengkap($RKS->tanggal_akhir_pemasukan_penawaran1);
					$waktu_pemasukan = Tanggal::getJamMenit($RKS->waktu_pemasukan_penawaran1);
					$tempat_pemasukan = $RKS->tempat_pemasukan_penawaran1;
					$tanggal_pembukaan= Tanggal::getTanggalLengkap($RKS->tanggal_pembukaan_penawaran1);
					$waktu_pembukaan = Tanggal::getJamMenit($RKS->waktu_pembukaan_penawaran1);
					$tempat_pembukaan = $RKS->tempat_pembukaan_penawaran1;
					$tanggal_evaluasi= Tanggal::getTanggalLengkap($RKS->tanggal_evaluasi_penawaran1);
					$waktu_evaluasi = Tanggal::getJamMenit($RKS->waktu_evaluasi_penawaran1);
					$tempat_evaluasi = $RKS->tempat_evaluasi_penawaran1;
					$tanggal_negosiasi= Tanggal::getTanggalLengkap($RKS->tanggal_negosiasi);
					$waktu_negosiasi = Tanggal::getJamMenit($RKS->waktu_negosiasi);
					$tempat_negosiasi = $RKS->tempat_negosiasi;
					$tanggal_usulan= Tanggal::getTanggalLengkap($RKS->tanggal_usulan_pemenang);
					$waktu_usulan = Tanggal::getJamMenit($RKS->waktu_usulan_pemenang);
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
					$jangka_waktu_penyerahan = $RKS->jangka_waktu_penyerahan;
					$terbilang_jangka_waktu_penyerahan = RupiahMaker::terbilangMaker($jangka_waktu_penyerahan);
					$tanggal_terakhir_penyerahan = Tanggal::getTanggalLengkap($RKS->tanggal_paling_lambat_penyerahan);
					$lama_berlaku_jaminan = $RKS->jangka_waktu_berlaku_jaminan;
					$terbilang_lama_berlaku_jaminan = RupiahMaker::terbilangMaker($lama_berlaku_jaminan);
					$lama_waktu_tambahan = $RKS->lama_waktu_tambahan;
					$terbilang_lama_waktu_tambahan = RupiahMaker::terbilangMaker($lama_waktu_tambahan);
					$pengesah = $NDPP->dari;
					if ($pengesah == "MSDAF") {
						$nama_pengesah = User::model()->findByPk(Kdivmum::model()->find('jabatan = "MSDAF"')->username)->nama;
					} else {
						$nama_pengesah = User::model()->findByPk(Kdivmum::model()->find('jabatan = "KDIVMUM"')->username)->nama;
					}
					if($Panitia->jenis_panitia=="Pejabat") {
						$nama_pembuat = User::model()->findByPk(Anggota::model()->find('id_panitia = '.$Panitia->id_panitia)->username)->nama;
					} else {
						$nama_pembuat = User::model()->findByPk(Anggota::model()->find('id_panitia = '.$Panitia->id_panitia. ' and jabatan = "Ketua"')->username)->nama;
					}
					
					$this->doccy->newFile('PL-BJ-Isi.docx');
					$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					$this->doccy->phpdocx->assignToHeader('#nomor rks#', $nomor_rks);
					$this->doccy->phpdocx->assignToHeader('#tanggal rks#', $tanggal_rks);
					$this->doccy->phpdocx->assign('#nomor rks#', $nomor_rks);
					$this->doccy->phpdocx->assign('#nama pengadaan#', $nama_pengadaan);
					$this->doccy->phpdocx->assign('#tempat surat#', $tempatsurat);
					$this->doccy->phpdocx->assign('#tanggal rks#', $tanggal_rks);
					$this->doccy->phpdocx->assign('#tanggal penjelasan#', $tanggal_penjelasan);
					$this->doccy->phpdocx->assign('#tanggal permintaan#', $tanggal_permintaan);
					$this->doccy->phpdocx->assign('#waktu penjelasan#', $waktu_penjelasan);
					$this->doccy->phpdocx->assign('#tempat penjelasan#', $tempat_penjelasan);
					$this->doccy->phpdocx->assign('#tanggal awal pemasukan#', $tanggal_awal_pemasukan);
					$this->doccy->phpdocx->assign('#tanggal akhir pemasukan#', $tanggal_akhir_pemasukan);
					$this->doccy->phpdocx->assign('#waktu pemasukan#', $waktu_pemasukan);
					$this->doccy->phpdocx->assign('#tempat pemasukan#', $tempat_pemasukan);
					$this->doccy->phpdocx->assign('#tanggal pembukaan#', $tanggal_pembukaan);
					$this->doccy->phpdocx->assign('#waktu pembukaan#', $waktu_pembukaan);
					$this->doccy->phpdocx->assign('#tempat pembukaan#', $tempat_pembukaan);
					$this->doccy->phpdocx->assign('#tanggal evaluasi#', $tanggal_evaluasi);
					$this->doccy->phpdocx->assign('#waktu evaluasi#', $waktu_evaluasi);
					$this->doccy->phpdocx->assign('#tempat evaluasi#', $tempat_evaluasi);
					$this->doccy->phpdocx->assign('#tanggal negosiasi#', $tanggal_negosiasi);
					$this->doccy->phpdocx->assign('#waktu negosiasi#', $waktu_negosiasi);
					$this->doccy->phpdocx->assign('#tempat negosiasi#', $tempat_negosiasi);
					$this->doccy->phpdocx->assign('#tanggal usulan#', $tanggal_usulan);
					$this->doccy->phpdocx->assign('#waktu usulan#', $waktu_usulan);
					$this->doccy->phpdocx->assign('#tanggal penetapan#', $tanggal_penetapan);
					$this->doccy->phpdocx->assign('#waktu penetapan#', $waktu_penetapan);
					$this->doccy->phpdocx->assign('#jenis panitia#', $jenis_panitia);
					$this->doccy->phpdocx->assign('#jenis panitia kapital#', $jenis_panitia_kapital);
					$this->doccy->phpdocx->assign('#sumber dana#', $sumber_dana);
					$this->doccy->phpdocx->assign('#metode pengadaan#', $metode_pengadaan);
					$this->doccy->phpdocx->assign('#metode penawaran#', $metode_penawaran);
					$this->doccy->phpdocx->assign('#jenis kualifikasi#', $jenis_kualifikasi);
					$this->doccy->phpdocx->assign('#sistem evaluasi#', $sistem_evaluasi);
					$this->doccy->phpdocx->assign('#jangka waktu penyerahan#', $jangka_waktu_penyerahan);
					$this->doccy->phpdocx->assign('#terbilang jangka waktu#', $terbilang_jangka_waktu_penyerahan);
					$this->doccy->phpdocx->assign('#tanggal terakhir penyerahan#', $tanggal_terakhir_penyerahan);
					$this->doccy->phpdocx->assign('#lama berlaku jaminan#', $lama_berlaku_jaminan);
					$this->doccy->phpdocx->assign('#terbilang lama berlaku jaminan#', $terbilang_lama_berlaku_jaminan);
					$this->doccy->phpdocx->assign('#lama waktu tambahan#', $lama_waktu_tambahan);
					$this->doccy->phpdocx->assign('#terbilang lama waktu tambahan#', $terbilang_lama_waktu_tambahan);
					$this->doccy->phpdocx->assign('#pengesah#', $pengesah);
					$this->doccy->phpdocx->assign('#nama pengesah#', $nama_pengesah);
					$this->doccy->phpdocx->assign('#nama pejabat / ketua panitia#', $nama_pembuat);
					$this->renderDocx("RKS-PL-B&J-Isi.docx", true);
				
				} else if ($Rincian->nama_rincian=="Lampiran 1") {
					$nomor_rks = $RKS->nomor;
					
					$this->doccy->newFile('PL-BJ-Lamp_1.docx');
					$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					$this->doccy->phpdocx->assign('#nomor rks#', $nomor_rks);
					$this->renderDocx("RKS-PL-B&J-Lamp_1.docx", true);
				
				} else if ($Rincian->nama_rincian=="Lampiran 4") {
					$nama_pengadaan = strtoupper($Peng->nama_pengadaan);
					$nomor_rks = $RKS->nomor;
					$tanggal_rks = Tanggal::getTanggalLengkap($DokRKS->tanggal);
				
					$this->doccy->newFile('PL-BJ-Lamp_4.docx');
					$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					$this->doccy->phpdocx->assign('#nomor rks#', $nomor_rks);
					$this->doccy->phpdocx->assign('#tanggal rks#', $tanggal_rks);
					$this->doccy->phpdocx->assign('#nama pengadaan#', $nama_pengadaan);
					$this->renderDocx("RKS-PL-B&J-Lamp_4.docx", true);
					
				} else if ($Rincian->nama_rincian=="Lampiran 6") {					
					$this->doccy->newFile('PL-BJ-Lamp_6.docx');
					$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					$this->renderDocx("RKS-PL-B&J-Lamp_6.docx", true);
					
				// } else if ($Rincian->nama_rincian=="Lampiran 7") {
					// $this->doccy->newFile('PL-BJ-Lamp_7.docx');
					// $this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					// $this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					// $this->renderDocx("RKS-PL-B&J-Lamp_7.docx", true);
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
					$nama_pengadaan = $Peng->nama_pengadaan;
					$nomor_rks = $RKS->nomor;
					$tanggal_rks = Tanggal::getTanggalLengkap($DokRKS->tanggal);
					$tempatsurat = $DokRKS->tempat;
					$tanggal_penjelasan = Tanggal::getTanggalLengkap($RKS->tanggal_penjelasan);
					$tanggal_permintaan = Tanggal::getTanggalLengkap($RKS->tanggal_permintaan_penawaran);
					$waktu_penjelasan = Tanggal::getJamMenit($RKS->waktu_penjelasan);
					$tempat_penjelasan = $RKS->tempat_penjelasan;
					$tanggal_awal_pemasukan= Tanggal::getTanggalLengkap($RKS->tanggal_awal_pemasukan_penawaran1);
					$tanggal_akhir_pemasukan= Tanggal::getTanggalLengkap($RKS->tanggal_akhir_pemasukan_penawaran1);
					$waktu_pemasukan = Tanggal::getJamMenit($RKS->waktu_pemasukan_penawaran1);
					$tempat_pemasukan = $RKS->tempat_pemasukan_penawaran1;
					$tanggal_pembukaan= Tanggal::getTanggalLengkap($RKS->tanggal_pembukaan_penawaran1);
					$waktu_pembukaan = Tanggal::getJamMenit($RKS->waktu_pembukaan_penawaran1);
					$tempat_pembukaan = $RKS->tempat_pembukaan_penawaran1;
					$tanggal_evaluasi= Tanggal::getTanggalLengkap($RKS->tanggal_evaluasi_penawaran1);
					$waktu_evaluasi = Tanggal::getJamMenit($RKS->waktu_evaluasi_penawaran1);
					$tempat_evaluasi = $RKS->tempat_evaluasi_penawaran1;
					$tanggal_negosiasi= Tanggal::getTanggalLengkap($RKS->tanggal_negosiasi);
					$waktu_negosiasi = Tanggal::getJamMenit($RKS->waktu_negosiasi);
					$tempat_negosiasi = $RKS->tempat_negosiasi;
					$tanggal_usulan= Tanggal::getTanggalLengkap($RKS->tanggal_usulan_pemenang);
					$waktu_usulan = Tanggal::getJamMenit($RKS->waktu_usulan_pemenang);
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
					$jangka_waktu_penyerahan = $RKS->jangka_waktu_penyerahan;
					$terbilang_jangka_waktu_penyerahan = RupiahMaker::terbilangMaker($jangka_waktu_penyerahan);
					$tanggal_terakhir_penyerahan = Tanggal::getTanggalLengkap($RKS->tanggal_paling_lambat_penyerahan);
					$lama_berlaku_jaminan = $RKS->jangka_waktu_berlaku_jaminan;
					$terbilang_lama_berlaku_jaminan = RupiahMaker::terbilangMaker($lama_berlaku_jaminan);
					$lama_waktu_tambahan = $RKS->lama_waktu_tambahan;
					$terbilang_lama_waktu_tambahan = RupiahMaker::terbilangMaker($lama_waktu_tambahan);
					$pengesah = $NDPP->dari;
					if ($pengesah == "MSDAF") {
						$nama_pengesah = User::model()->findByPk(Kdivmum::model()->find('jabatan = "MSDAF"')->username)->nama;
					} else {
						$nama_pengesah = User::model()->findByPk(Kdivmum::model()->find('jabatan = "KDIVMUM"')->username)->nama;
					}
					if($Panitia->jenis_panitia=="Pejabat") {
						$nama_pembuat = User::model()->findByPk(Anggota::model()->find('id_panitia = '.$Panitia->id_panitia)->username)->nama;
					} else {
						$nama_pembuat = User::model()->findByPk(Anggota::model()->find('id_panitia = '.$Panitia->id_panitia. ' and jabatan = "Ketua"')->username)->nama;
					}
					
					$this->doccy->newFile('PL-J-Isi.docx');
					$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					$this->doccy->phpdocx->assignToHeader('#nomor rks#', $nomor_rks);
					$this->doccy->phpdocx->assignToHeader('#tanggal rks#', $tanggal_rks);
					$this->doccy->phpdocx->assign('#nomor rks#', $nomor_rks);
					$this->doccy->phpdocx->assign('#nama pengadaan#', $nama_pengadaan);
					$this->doccy->phpdocx->assign('#tempat surat#', $tempatsurat);
					$this->doccy->phpdocx->assign('#tanggal rks#', $tanggal_rks);
					$this->doccy->phpdocx->assign('#tanggal penjelasan#', $tanggal_penjelasan);
					$this->doccy->phpdocx->assign('#tanggal permintaan#', $tanggal_permintaan);
					$this->doccy->phpdocx->assign('#waktu penjelasan#', $waktu_penjelasan);
					$this->doccy->phpdocx->assign('#tempat penjelasan#', $tempat_penjelasan);
					$this->doccy->phpdocx->assign('#tanggal awal pemasukan#', $tanggal_awal_pemasukan);
					$this->doccy->phpdocx->assign('#tanggal akhir pemasukan#', $tanggal_akhir_pemasukan);
					$this->doccy->phpdocx->assign('#waktu pemasukan#', $waktu_pemasukan);
					$this->doccy->phpdocx->assign('#tempat pemasukan#', $tempat_pemasukan);
					$this->doccy->phpdocx->assign('#tanggal pembukaan#', $tanggal_pembukaan);
					$this->doccy->phpdocx->assign('#waktu pembukaan#', $waktu_pembukaan);
					$this->doccy->phpdocx->assign('#tempat pembukaan#', $tempat_pembukaan);
					$this->doccy->phpdocx->assign('#tanggal evaluasi#', $tanggal_evaluasi);
					$this->doccy->phpdocx->assign('#waktu evaluasi#', $waktu_evaluasi);
					$this->doccy->phpdocx->assign('#tempat evaluasi#', $tempat_evaluasi);
					$this->doccy->phpdocx->assign('#tanggal negosiasi#', $tanggal_negosiasi);
					$this->doccy->phpdocx->assign('#waktu negosiasi#', $waktu_negosiasi);
					$this->doccy->phpdocx->assign('#tempat negosiasi#', $tempat_negosiasi);
					$this->doccy->phpdocx->assign('#tanggal usulan#', $tanggal_usulan);
					$this->doccy->phpdocx->assign('#waktu usulan#', $waktu_usulan);
					$this->doccy->phpdocx->assign('#tanggal penetapan#', $tanggal_penetapan);
					$this->doccy->phpdocx->assign('#waktu penetapan#', $waktu_penetapan);
					$this->doccy->phpdocx->assign('#jenis panitia#', $jenis_panitia);
					$this->doccy->phpdocx->assign('#jenis panitia kapital#', $jenis_panitia_kapital);
					$this->doccy->phpdocx->assign('#sumber dana#', $sumber_dana);
					$this->doccy->phpdocx->assign('#metode pengadaan#', $metode_pengadaan);
					$this->doccy->phpdocx->assign('#metode penawaran#', $metode_penawaran);
					$this->doccy->phpdocx->assign('#jenis kualifikasi#', $jenis_kualifikasi);
					$this->doccy->phpdocx->assign('#sistem evaluasi#', $sistem_evaluasi);
					$this->doccy->phpdocx->assign('#jangka waktu penyerahan#', $jangka_waktu_penyerahan);
					$this->doccy->phpdocx->assign('#terbilang jangka waktu#', $terbilang_jangka_waktu_penyerahan);
					$this->doccy->phpdocx->assign('#tanggal terakhir penyerahan#', $tanggal_terakhir_penyerahan);
					$this->doccy->phpdocx->assign('#lama berlaku jaminan#', $lama_berlaku_jaminan);
					$this->doccy->phpdocx->assign('#terbilang lama berlaku jaminan#', $terbilang_lama_berlaku_jaminan);
					$this->doccy->phpdocx->assign('#lama waktu tambahan#', $lama_waktu_tambahan);
					$this->doccy->phpdocx->assign('#terbilang lama waktu tambahan#', $terbilang_lama_waktu_tambahan);
					$this->doccy->phpdocx->assign('#pengesah#', $pengesah);
					$this->doccy->phpdocx->assign('#nama pengesah#', $nama_pengesah);
					$this->doccy->phpdocx->assign('#nama pejabat / ketua panitia#', $nama_pembuat);					
					$this->renderDocx("RKS-PL-J-Isi.docx", true);
					
				} else if ($Rincian->nama_rincian=="Lampiran 1") {
					$nomor_rks = $RKS->nomor;
				
					$this->doccy->newFile('PL-J-Lamp_1.docx');
					$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					$this->doccy->phpdocx->assign('#nomor rks#', $nomor_rks);
					$this->renderDocx("RKS-PL-J-Lamp_1.docx", true);
				}
			} 
		// } else if ($Peng->metode_pengadaan=="Pemilihan Langsung") {
			// if($RKS->tipe_rks==1){
				// if ($Rincian->nama_rincian=="Cover") {
					// $metode_pengadaan = strtoupper($Peng->metode_pengadaan);
					// $nama_pengadaan = strtoupper($Peng->nama_pengadaan);
					// $nomor_rks = $RKS->nomor;
					// $tanggal_rks = Tanggal::getTanggalLengkap($DokRKS->tanggal);
					// $this->doccy->newFile('RKS-Cover.docx');
					// $this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					// $this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					// $this->doccy->phpdocx->assign('#metode pengadaan#', $metode_pengadaan);
					// $this->doccy->phpdocx->assign('#nomor rks#', $nomor_rks);
					// $this->doccy->phpdocx->assign('#tanggal rks#', $tanggal_rks);
					// $this->doccy->phpdocx->assign('#nama pengadaan#', $nama_pengadaan);
					// $this->renderDocx("RKS-PM-B-Cover.docx", true);
					
				// } else if ($Rincian->nama_rincian=="Daftar Isi") {
					// $this->doccy->newFile('PM-B-Daftar_Isi.docx');
					// $this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					// $this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					// $this->renderDocx("RKS-PM-B-Daftar_Isi.docx", true);
					
				// } else if ($Rincian->nama_rincian=="Isi") {
					// $nama_pengadaan = $Peng->nama_pengadaan;
					// $nomor_rks = $RKS->nomor;
					// $tanggal_rks = Tanggal::getTanggalLengkap($DokRKS->tanggal);
					// $tempatsurat = $DokRKS->tempat;
					// $tanggal_penjelasan = Tanggal::getTanggalLengkap($RKS->tanggal_penjelasan);
					// $waktu_penjelasan = Tanggal::getJamMenit($RKS->waktu_penjelasan);
					// $tempat_penjelasan = $RKS->tempat_penjelasan;
					
					// $this->doccy->newFile('PM-B-Isi.docx');
					// $this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					// $this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					// $this->doccy->phpdocx->assignToHeader('#nomor rks#', $nomor_rks);
					// $this->doccy->phpdocx->assignToHeader('#tanggal rks#', $tanggal_rks);
					// $this->doccy->phpdocx->assign('#nama pengadaan#', $nama_pengadaan);
					// $this->doccy->phpdocx->assign('#tempat surat#', $tempatsurat);
					// $this->doccy->phpdocx->assign('#tanggal rks#', $tanggal_rks);
					// $this->doccy->phpdocx->assign('#tanggal penjelasan#', $tanggal_penjelasan);
					// $this->doccy->phpdocx->assign('#waktu penjelasan#', $waktu_penjelasan);
					// $this->doccy->phpdocx->assign('#tempat penjelasan#', $tempat_penjelasan);
					// $this->renderDocx("RKS-PM-B-Isi.docx", true);
				
				// } else if ($Rincian->nama_rincian=="Lampiran 1") {
					// $this->doccy->newFile('PM-B-Lamp_1.docx');
					// $this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					// $this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					// $this->renderDocx("RKS-PM-B-Lamp_1.docx", true);
				
				// } else if ($Rincian->nama_rincian=="Lampiran 4") {
					// $this->doccy->newFile('PM-B-Lamp_4.docx');
					// $this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					// $this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					// $this->renderDocx("RKS-PM-B-Lamp_4.docx", true);
				
				// } else if ($Rincian->nama_rincian=="Lampiran 5") {
					// $nama_pengadaan = strtoupper($Peng->nama_pengadaan);
					// $nomor_rks = $RKS->nomor;
					// $tanggal_rks = Tanggal::getTanggalLengkap($DokRKS->tanggal);
					
					// $this->doccy->newFile('PM-B-Lamp_5.docx');
					// $this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					// $this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					// $this->doccy->phpdocx->assign('#nomor rks#', $nomor_rks);
					// $this->doccy->phpdocx->assign('#tanggal rks#', $tanggal_rks);
					// $this->doccy->phpdocx->assign('#nama pengadaan#', $nama_pengadaan);
					// $this->renderDocx("RKS-PM-B-Lamp_5.docx", true);
				
				// } else if ($Rincian->nama_rincian=="Lampiran 7") {
					// $this->doccy->newFile('PM-B-Lamp_7.docx');
					// $this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					// $this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					// $this->renderDocx("RKS-PM-B-Lamp_7.docx", true);
				// }
			// } else if($RKS->tipe_rks==2){
				// if ($Rincian->nama_rincian=="Cover") {
					// $metode_pengadaan = strtoupper($Peng->metode_pengadaan);
					// $nama_pengadaan = strtoupper($Peng->nama_pengadaan);
					// $nomor_rks = $RKS->nomor;
					// $tanggal_rks = Tanggal::getTanggalLengkap($DokRKS->tanggal);
					// $this->doccy->newFile('RKS-Cover.docx');
					// $this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					// $this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					// $this->doccy->phpdocx->assign('#metode pengadaan#', $metode_pengadaan);
					// $this->doccy->phpdocx->assign('#nomor rks#', $nomor_rks);
					// $this->doccy->phpdocx->assign('#tanggal rks#', $tanggal_rks);
					// $this->doccy->phpdocx->assign('#nama pengadaan#', $nama_pengadaan);
					// $this->renderDocx("RKS-PM-B&J-Cover.docx", true);
					
				// } else if ($Rincian->nama_rincian=="Daftar Isi") {
					// $this->doccy->newFile('PM-BJ-Daftar_Isi.docx');
					// $this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					// $this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					// $this->renderDocx("RKS-PM-B&J-Daftar_Isi.docx", true);
					
				// } else if ($Rincian->nama_rincian=="Isi") {
				// } else if ($Rincian->nama_rincian=="Lampiran 1") {
					// $this->doccy->newFile('PM-BJ-Lamp_1.docx');
					// $this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					// $this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					// $this->renderDocx("RKS-PM-B&J-Lamp_1.docx", true);
				
				// } else if ($Rincian->nama_rincian=="Lampiran 4") {
					// $this->doccy->newFile('PM-BJ-Lamp_4.docx');
					// $this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					// $this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					// $this->renderDocx("RKS-PM-B&J-Lamp_4.docx", true);
					
				// } else if ($Rincian->nama_rincian=="Lampiran 5") {
					// $nama_pengadaan = strtoupper($Peng->nama_pengadaan);
					// $nomor_rks = $RKS->nomor;
					// $tanggal_rks = Tanggal::getTanggalLengkap($DokRKS->tanggal);
					
					// $this->doccy->newFile('PM-BJ-Lamp_5.docx');
					// $this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					// $this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					// $this->doccy->phpdocx->assign('#nomor rks#', $nomor_rks);
					// $this->doccy->phpdocx->assign('#tanggal rks#', $tanggal_rks);
					// $this->doccy->phpdocx->assign('#nama pengadaan#', $nama_pengadaan);
					// $this->renderDocx("RKS-PM-B&J-Lamp_5.docx", true);
				
				// } else if ($Rincian->nama_rincian=="Lampiran 7") {
					// $this->doccy->newFile('PM-BJ-Lamp_7.docx');
					// $this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					// $this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					// $this->renderDocx("RKS-PM-B&J-Lamp_7.docx", true);
				// }
			// }  else if($RKS->tipe_rks==3){
				// if ($Rincian->nama_rincian=="Cover") {
					// $metode_pengadaan = strtoupper($Peng->metode_pengadaan);
					// $nama_pengadaan = strtoupper($Peng->nama_pengadaan);
					// $nomor_rks = $RKS->nomor;
					// $tanggal_rks = Tanggal::getTanggalLengkap($DokRKS->tanggal);
					// $this->doccy->newFile('RKS-Cover.docx');
					// $this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					// $this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					// $this->doccy->phpdocx->assign('#metode pengadaan#', $metode_pengadaan);
					// $this->doccy->phpdocx->assign('#nomor rks#', $nomor_rks);
					// $this->doccy->phpdocx->assign('#tanggal rks#', $tanggal_rks);
					// $this->doccy->phpdocx->assign('#nama pengadaan#', $nama_pengadaan);
					// $this->renderDocx("RKS-PM-J-Cover.docx", true);
					
				// } else if ($Rincian->nama_rincian=="Daftar Isi") {
					// $this->doccy->newFile('PM-J-Daftar_Isi.docx');
					// $this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					// $this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					// $this->renderDocx("RKS-PM-J-Daftar_Isi.docx", true);
				
				// } else if ($Rincian->nama_rincian=="Isi") {
				// } else if ($Rincian->nama_rincian=="Lampiran 1") {
					// $this->doccy->newFile('PM-J-Lamp_1.docx');
					// $this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
					// $this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
					// $this->renderDocx("RKS-PM-J-Lamp_1.docx", true);
				// }
			// }
		// }
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
			
			$metode = $Peng->metode_penawaran;
			if ($metode == "Satu Sampul"){
				$tanggal = Tanggal::getTanggalLengkap($Dok->tanggal);
				$DokBAE1=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Berita Acara Evaluasi Penawaran"');
				$BAE1 = BeritaAcaraEvaluasiPenawaran::model()->findByPk($DokBAE1->id_dokumen);
				$noBAE1 = $BAE1->nomor;
				$tglBAE1 = Tanggal::getTanggalLengkap($DokBAE1->tanggal);
				$noBAE2 = "";
				$tglBAE2 = "";
				$Kal1 = "";
				$Kal2 = "";
				$Kal3 = "";
			}
			else if ($metode == "Dua Sampul"){
				$tanggal = Tanggal::getTanggalLengkap($Dok->tanggal);
				$DokBAE1=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Berita Acara Evaluasi Penawaran Sampul Satu"');
				$BAE1 = BeritaAcaraEvaluasiPenawaran::model()->findByPk($DokBAE1->id_dokumen);
				$noBAE1 = $BAE1->nomor;
				$tglBAE1 = Tanggal::getTanggalLengkap($DokBAE1->tanggal);
				$DokBAE2=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Berita Acara Evaluasi Penawaran Sampul Dua"');
				$BAE2 = BeritaAcaraEvaluasiPenawaran::model()->findByPk($DokBAE2->id_dokumen);
				$noBAE2 = $BAE2->nomor;
				$tglBAE2 = Tanggal::getTanggalLengkap($DokBAE2->tanggal);
				$Kal1 = "dan Berita Acara Evaluasi Penawaran harga (sampul) II No. : ";
				$Kal2 = "tanggal";
				$Kal3 = "dengan ini ditetapkan Perusahaan tersebut dibawah ini sebagai pemenang untuk melaksanakan Pekerjaan";
			
			}
			$tanggal = Tanggal::getTanggalLengkap($Dok->tanggal);
			
			$dokndup=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Nota Dinas Usulan Pemenang"');
			$ndup = NotaDinasUsulanPemenang::model()->findByPk($dokndup->id_dokumen);
			
			$dokndpp=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Nota Dinas Perintah Pengadaan"');
			$ndpp = NotaDinasPerintahPengadaan::model()->findByPk($dokndpp->id_dokumen);
		
			if(Panitia::model()->findByPk($Peng->id_panitia)->jenis_panitia == 'Pejabat'){
				$pejabatketuapanitia = "Pejabat";
			}else{
				$pejabatketuapanitia = "Ketua Panitia";
			}
			
			$nama = $Peng->nama_pengadaan;
			// $terbilang = RupiahMaker::terbilangMaker($biaya);
			
			$this->doccy->newFile('14 Nota Dinas Penetapan Pemenang.docx');
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
		
			$this->doccy->phpdocx->assign('#nomor#', $nomor);
			
			$this->doccy->phpdocx->assign('#pejabat/ketuapanitia#', $ndpp->kepada);
			$this->doccy->phpdocx->assign('#KDIVMUM/MSDAF#', $ndpp->dari);
			$this->doccy->phpdocx->assign('#KetuaPanitia/Pejabat#', $pejabatketuapanitia);
			$this->doccy->phpdocx->assign('#nousulan#', $ndup->nomor);
			$this->doccy->phpdocx->assign('#tanggalusulan#', Tanggal::getTanggalLengkap($dokndup->tanggal));
			
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#sifat#', 'Biasa');			
			
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->doccy->phpdocx->assign('#noBAEsampul1#', $noBAE1);
			$this->doccy->phpdocx->assign('#noBAEsampul2#', $noBAE2);
			$this->doccy->phpdocx->assign('#tanggalBAEsampul1#', $tglBAE1);
			$this->doccy->phpdocx->assign('#tanggalBAEsampul2#', $tglBAE2);
			$this->doccy->phpdocx->assign('#penyedia#', $this->getPenyediaLulusPenetapanPemenang($Peng->id_pengadaan));
			// $this->doccy->phpdocx->assign('#alamatpenyedia#', $alamat);
			// $this->doccy->phpdocx->assign('#NPWP#', $NPWP);
				$this->doccy->phpdocx->assign('#Kal1#', $Kal1);
				$this->doccy->phpdocx->assign('#Kal2#', $Kal2);
				$this->doccy->phpdocx->assign('#Kal3#', $Kal3);
			// $this->doccy->phpdocx->assign('#biaya#', $biayaa);
			// $this->doccy->phpdocx->assign('#terbilang#', $terbilang);
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
			$ketua = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Ketua"')->username)->nama;
			$tanggal = Tanggal::getTanggalLengkap($Dok->tanggal);
			$waktu = Tanggal::getTanggalLengkap($NDUP->waktu_pelaksanaan);
			$tempat = $NDUP->tempat_penyerahan;
			
			$dokNDPP = Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Nota Dinas Perintah Pengadaan"');
			$ndpp = NotaDinasPerintahPengadaan::model()->findByPk($dokNDPP->id_dokumen)->nomor;
			
			$dokNDP = Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Nota Dinas Permintaan"');
			$ndp = NotaDinasPermintaan::model()->findByPk($dokNDP->id_dokumen)->nomor;
			
			if(($metode == "Pelelangan")||($metode == "Pemilihan Langsung")){
				$this->doccy->newFile('13 Nota Dinas Usulan Pemenang(lelang-pilih).docx');
			}
			else{
				$this->doccy->newFile('13 Nota Dinas Usulan Pemenang(tunjuk).docx');
			}

			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
		
		
			$this->doccy->phpdocx->assign('#nomor#', $nomor);
			$this->doccy->phpdocx->assign('#dari#', $ketua);
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->doccy->phpdocx->assign('#penyedia#', $pemenang);
			$this->doccy->phpdocx->assign('#alamatpenyedia#', $alamat);
			$this->doccy->phpdocx->assign('#NPWP#', $NPWP);
			$this->doccy->phpdocx->assign('#biaya#', RupiahMaker::convertInt($biaya));
			$this->doccy->phpdocx->assign('#terbilang#', $terbilang);
			$this->doccy->phpdocx->assign('#penyedia2#', $pemenang2);
			$this->doccy->phpdocx->assign('#alamatpenyedia2#', $alamat2);
			$this->doccy->phpdocx->assign('#NPWP2#', $NPWP2);
			$this->doccy->phpdocx->assign('#biaya2#', RupiahMaker::convertInt($biaya2));
			$this->doccy->phpdocx->assign('#terbilang2#', $terbilang2);

			$this->doccy->phpdocx->assign('#waktupelaksanaan#', $waktu);
			$this->doccy->phpdocx->assign('#tempatpenyerahan#', $tempat);
						
			$this->doccy->phpdocx->assign('#suratkeputusandireksi#', Panitia::model()->findByPk($Peng->id_panitia)->SK_panitia);
			
			$this->doccy->phpdocx->assign('#nondpermintaan#', $ndp);
			$this->doccy->phpdocx->assign('#nondpp#', $ndpp);
			
			$jenispic = Panitia::model()->findByPk($Peng->id_panitia)->jenis_panitia;
						
			$this->doccy->phpdocx->assign('#tdtgnpic#', $this->getListPanitiaNegoKlar($Peng->id_panitia));			
			$this->doccy->phpdocx->assign('#pejabatataupanitia#', $jenispic . " " . $nama);
			
			$this->doccy->phpdocx->assign('#listpeserta#', $this->getPenyediaLulusKesimpulan($Peng->id_pengadaan, 'usulan_pemenang') );
			
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
			$kepada = User::model()->findByPk($Peng->divisi_peminta)->nama;
			$permintaan = $NDPTR->permintaan;
			$namapengadaan = $Peng->nama_pengadaan;
			$DokNDP = Dokumen::model()->find('id_pengadaan = '.$Peng->id_pengadaan. ' and nama_dokumen = "Nota Dinas Permintaan"');
			$NDP= NotaDinasPermintaan::model()->findByPk($DokNDP->id_dokumen);
			$notadinaspermintaan = $NDP->nomor;
			$tanggalpermintaan = Tanggal::getTanggalLengkap($DokNDP->tanggal);
			$perihalpermintaan = $NDP->perihal;
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

		
		
//	=================================================================Surat-Surat=================================================================
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
			$tanggal = Tanggal::getTanggalLengkap($SUP->tanggal_undangan);
			$tanggalsurat = Tanggal::getTanggalLengkap($Dok->tanggal);
			$tempat = $SUP->tempat;
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
									
			$this->doccy->phpdocx->assign('#listPanitiaTanpaKetua#', $listPanitiaTanpaKetua);
			$this->doccy->phpdocx->assign('#nomor#', $nomor);
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#tanggalsurat#', $tanggalsurat);
			$this->doccy->phpdocx->assign('#norks#', $norks);
			// $this->doccy->phpdocx->assign('#acara#', '..........');
			$this->doccy->phpdocx->assign('#pekerjaan#', $nama);
			$this->doccy->phpdocx->assign('#perihal#', $perihal);
			$this->doccy->phpdocx->assign('#hari#', $hari);
			$this->doccy->phpdocx->assign('#nama#', $nama);
			$this->doccy->phpdocx->assign('#waktu#', $waktu);
			$this->doccy->phpdocx->assign('#tempat#', $tempat);
			$this->doccy->phpdocx->assign('#surat#', 'Aanwijzing');
			$this->doccy->phpdocx->assign('#ketua#', $ketua);
			// $this->doccy->phpdocx->assign('#sekretaris#', $sekretaris);
			// $this->doccy->phpdocx->assign('#anggota1#', $anggota1);
			$this->doccy->phpdocx->assign('#nomorNdPerintahPengadaan#', $nomorNdPerintahPengadaan);
			$this->doccy->phpdocx->assign('#tanggalNdPerintahPengadaan#', $tanggalNdPerintahPengadaan);
			$this->doccy->phpdocx->assign('#perihalNdPerintahPengadaan#', $perihalNdPerintahPengadaan);						
			
			$this->renderDocx("Surat Undangan Penjelasan.docx", true);

		}
		else if ($Dok->nama_dokumen == "Surat Undangan Pembukaan Penawaran" || $Dok->nama_dokumen == "Surat Undangan Pembukaan Penawaran Sampul Satu" || $Dok->nama_dokumen == "Surat Undangan Pembukaan Penawaran Tahap Satu" || $Dok->nama_dokumen == "Surat Undangan Pembukaan Penawaran Sampul Dua" || $Dok->nama_dokumen == "Surat Undangan Pembukaan Penawaran Tahap Dua") {
			
			$SUPP=SuratUndanganPembukaanPenawaran::model()->findByPk($id);
			$nomor = $SUPP->nomor;
			$tanggal = Tanggal::getTanggalLengkap($SUPP->tanggal_undangan);
			$tanggalsurat = Tanggal::getTanggalLengkap($Dok->tanggal);
			$tempat = $SUPP->tempat;
			$waktu = Tanggal::getJamMenit($SUPP->waktu);
			$nama = $Peng->nama_pengadaan;
			$perihal = $SUPP->perihal;
			
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
			
			$this->doccy->phpdocx->assign('#listPanitiaTanpaKetua#', $listPanitiaTanpaKetua);
			$this->doccy->phpdocx->assign('#nomor#', $nomor);
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#tanggalsurat#', $tanggalsurat);
			$this->doccy->phpdocx->assign('#norks#', $norks);
			// $this->doccy->phpdocx->assign('#acara#', '..........');
			$this->doccy->phpdocx->assign('#pekerjaan#', $nama);
			$this->doccy->phpdocx->assign('#perihal#', $perihal);
			$this->doccy->phpdocx->assign('#hari#', $hari);
			$this->doccy->phpdocx->assign('#nama#', $nama);
			$this->doccy->phpdocx->assign('#waktu#', $waktu);
			$this->doccy->phpdocx->assign('#tempat#', $tempat);
			if ($Dok->nama_dokumen == "Surat Undangan Pembukaan Penawaran"){
				$this->doccy->phpdocx->assign('#surat#', 'Pembukaan Penawaran');
			} else if ($Dok->nama_dokumen == "Surat Undangan Pembukaan Penawaran Sampul Satu"){
				$this->doccy->phpdocx->assign('#surat#', 'Pembukaan Penawaran Sampul Satu');
			} else if ($Dok->nama_dokumen == "Surat Undangan Pembukaan Penawaran Tahap Satu"){
				$this->doccy->phpdocx->assign('#surat#', 'Pembukaan Penawaran Tahap Satu');
			} else if ($Dok->nama_dokumen == "Surat Undangan Pembukaan Penawaran Sampul Dua"){
				$this->doccy->phpdocx->assign('#surat#', 'Pembukaan Penawaran Sampul Dua');
			} else if ($Dok->nama_dokumen == "Surat Undangan Pembukaan Penawaran Tahap Dua"){
				$this->doccy->phpdocx->assign('#surat#', 'Pembukaan Penawaran Tahap Dua');
			}
			$this->doccy->phpdocx->assign('#ketua#', $ketua);
			// $this->doccy->phpdocx->assign('#sekretaris#', $sekretaris);
			// $this->doccy->phpdocx->assign('#anggota1#', $anggota1);
			$this->doccy->phpdocx->assign('#nomorNdPerintahPengadaan#', $nomorNdPerintahPengadaan);
			$this->doccy->phpdocx->assign('#tanggalNdPerintahPengadaan#', $tanggalNdPerintahPengadaan);
			$this->doccy->phpdocx->assign('#perihalNdPerintahPengadaan#', $perihalNdPerintahPengadaan);						
			
			if ($Dok->nama_dokumen == "Surat Undangan Pembukaan Penawaran"){
				$this->renderDocx("Surat Undangan Pembukaan Penawaran.docx", true);
			} else if ($Dok->nama_dokumen == "Surat Undangan Pembukaan Penawaran Sampul Satu"){
				$this->renderDocx("Surat Undangan Pembukaan Penawaran Sampul Satu.docx", true);
			} else if ($Dok->nama_dokumen == "Surat Undangan Pembukaan Penawaran Tahap Satu"){
				$this->renderDocx("Surat Undangan Pembukaan Penawaran Tahap Satu.docx", true);
			} else if ($Dok->nama_dokumen == "Surat Undangan Pembukaan Penawaran Sampul Dua"){
				$this->renderDocx("Surat Undangan Pembukaan Penawaran Sampul Dua.docx", true);
			} else if ($Dok->nama_dokumen == "Surat Undangan Pembukaan Penawaran Tahap Dua"){
				$this->renderDocx("Surat Undangan Pembukaan Penawaran Tahap Dua.docx", true);
			}

		}
		else if ($Dok->nama_dokumen == "Surat Undangan Negosiasi dan Klarifikasi") {
			
			$SUNK=SuratUndanganNegosiasiKlarifikasi::model()->findByPk($id);
			$nomor = $SUNK->nomor;
			$tanggal = Tanggal::getTanggalLengkap($SUNK->tanggal_undangan);
			$tanggalsurat = Tanggal::getTanggalLengkap($Dok->tanggal);
			$tempat = $SUNK->tempat;
			$waktu = Tanggal::getJamMenit($SUNK->waktu);
			$nama = $Peng->nama_pengadaan;
			$perihal = $SUNK->perihal;
			
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
									
			$this->doccy->phpdocx->assign('#listPanitiaTanpaKetua#', $listPanitiaTanpaKetua);
			$this->doccy->phpdocx->assign('#nomor#', $nomor);
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#tanggalsurat#', $tanggalsurat);
			$this->doccy->phpdocx->assign('#norks#', $norks);
			// $this->doccy->phpdocx->assign('#acara#', '..........');
			$this->doccy->phpdocx->assign('#pekerjaan#', $nama);
			$this->doccy->phpdocx->assign('#perihal#', $perihal);
			$this->doccy->phpdocx->assign('#hari#', $hari);
			$this->doccy->phpdocx->assign('#nama#', $nama);
			$this->doccy->phpdocx->assign('#waktu#', $waktu);
			$this->doccy->phpdocx->assign('#tempat#', $tempat);
			$this->doccy->phpdocx->assign('#surat#', 'Negosiasi dan Klarifikasi');
			$this->doccy->phpdocx->assign('#ketua#', $ketua);
			// $this->doccy->phpdocx->assign('#sekretaris#', $sekretaris);
			// $this->doccy->phpdocx->assign('#anggota1#', $anggota1);
			$this->doccy->phpdocx->assign('#nomorNdPerintahPengadaan#', $nomorNdPerintahPengadaan);
			$this->doccy->phpdocx->assign('#tanggalNdPerintahPengadaan#', $tanggalNdPerintahPengadaan);
			$this->doccy->phpdocx->assign('#perihalNdPerintahPengadaan#', $perihalNdPerintahPengadaan);						
			
			$this->renderDocx("Surat Undangan Negosiasi dan Klarifikasi.docx", true);

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
			// $masa = '90';
			// $lingkup = $SUPH->lingkup_kerja;
			$tempat = $SUPH->tempat_penyerahan;
			$nama = $Peng->nama_pengadaan;
			$tanggalpenawaran = Tanggal::getTanggalLengkap($rks->tanggal_akhir_pemasukan_penawaran1);
			$waktupenawaran = Tanggal::getJamMenit($rks->waktu_pemasukan_penawaran1);
			
			// $terbilang = RupiahMaker::terbilangMaker($masa);			
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
			// $this->doccy->phpdocx->assign('#bulan#', $masa);
			// $this->doccy->phpdocx->assign('#terbilangbulan#', $terbilang);
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
			$this->doccy->phpdocx->assign('#penerima#', $this->getPenyediaLulusX($Peng->id_pengadaan,'undangan_pengambilan_dokumen'));
			
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
			$biayaa = RupiahMaker::convertInt($biaya);
			$biayaterbilang = RupiahMaker::TerbilangMaker($biaya);
			$jaminan = $SPP->jaminan;
			$jaminanterbilang = RupiahMaker::TerbilangMaker($jaminan);
			$lama = $SPP->lama_penyerahan;
			$lamaterbilang = RupiahMaker::TerbilangMaker($lama);
			$tanggal = Tanggal::getTanggalLengkap($Dok->tanggal);
			$tempat = $Dok->tempat;
			$nama = $Peng->nama_pengadaan;
			$metode = $Peng->metode_pengadaan;
			
			$doksupph=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Surat Undangan Permintaan Penawaran Harga"');
			$supph = SuratUndanganPermintaanPenawaranHarga::model()->findByPk($doksupph->id_dokumen);
			$nosupph = $supph->nomor;
			$tglsupph = Tanggal::getTanggalLengkap($doksupph->tanggal);
			
			// $dokspph=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Surat Pengantar Penawaran Harga"');
			// $spph = SuratUndanganPermintaanPenawaranHarga::model()->findByPk($dokspph->id_dokumen);
			// $nospph = $spph->nomor;
			// $tglspph = Tanggal::geetTanggalLengkap($dokspph->tanggal);
			
			
			if ($metode == "Penunjukan Langsung"){
				$this->doccy->newFile('15 Surat Penunjukan Pemenang (Tunjuk).docx');
			}
			else if($metode == "Pemilihan Langsung"){
				// $dokspp=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Surat Pengumuman Pemenang"');
				// $spp = SuratUndanganPermintaanPenawaranHarga::model()->findByPk($dokspp->id_dokumen);
				// $nospp = $spp->nomor;
				// $tglspp = Tanggal::getTanggalLengkap($dokspp->tanggal);
				$this->doccy->newFile('15 Surat Penunjukan Pemenang (Pilih).docx');
				$this->doccy->phpdocx->assign('#nospp#', '');
				$this->doccy->phpdocx->assign('#tglspp#', '');

			}
			else if($metode == "Pelelangan"){
				$noski = $SPP->no_ski;
				$nomorski = $SPP->nomor_ski;
				$tglski = Tanggal::getTanggalLengkap($SPP->tanggal_ski);
				
				// $dokspp=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Surat Pengumuman Pemenang"');
				// $spp = SuratPengumumanPelelangan::model()->findByPk($dokspp->id_dokumen);
				// $nospp = $spp->nomor;
				// $tglspp = Tanggal::getTanggalLengkap($dokspp->tanggal);
			
				$this->doccy->newFile('15 Surat Penunjukan Pemenang (Lelang).docx');
				$this->doccy->phpdocx->assign('#nospp#', $nospp);
				$this->doccy->phpdocx->assign('#tglspp#', $tglspp);
				$this->doccy->phpdocx->assign('#noski#', $noski);
				$this->doccy->phpdocx->assign('#tglski#', $tglski);
				$this->doccy->phpdocx->assign('#nomorski#', $nomorski);
			}
			
		$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
		$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
		
			$this->doccy->phpdocx->assign('#nomor#', $nomor);
			$this->doccy->phpdocx->assign('#penyedia#', $penyedia);
			$this->doccy->phpdocx->assign('#perihal#', $nama);
			$this->doccy->phpdocx->assign('#alamatpenyedia#', '');
			$this->doccy->phpdocx->assign('#nosupph#', $nosupph);
			$this->doccy->phpdocx->assign('#tsupph#', $tglsupph);
			$this->doccy->phpdocx->assign('#nospph#', '');
			$this->doccy->phpdocx->assign('#tglspph#', '');
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->doccy->phpdocx->assign('#biaya#', $biayaa);
			$this->doccy->phpdocx->assign('#biayaterbilang#', $biayaterbilang);
			$this->doccy->phpdocx->assign('#lamapengerjaan#', $lama);
			$this->doccy->phpdocx->assign('#lamaterbilang#', $lamaterbilang);
			$this->doccy->phpdocx->assign('#biayajaminan#', $jaminan);
			$this->doccy->phpdocx->assign('#jaminanterbilang#', $jaminanterbilang);
			$this->renderDocx("Surat Penunjukan Pemenang.docx", true);
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
			
			$PIP2=PaktaIntegritasPanitia2::model()->findByPk($id);
			$tanggal = Tanggal::getTanggalLengkap($Dok->tanggal);
			$panitia = Panitia::model()->findByPk($Peng->id_panitia);
			$skpanitia = "kami atas nama Panitia Pengadaan Barang/Jasa PT PLN (Persero) Kantor Pusat yang ditunjuk berdasarkan Surat Keputusan Direktur Sumber Daya Manusia dan Umum PT PLN (Persero) No. :  ". Panitia::model()->findByPk($Peng->id_panitia)->SK_panitia . " sebagai berikut :" ;
			$skpanitia2 = "saya ". Panitia::model()->findByPk($Peng->id_panitia)->nama_panitia ." sebagai Pejabat Pengadaan Barang/Jasa PT PLN (Persero) Kantor Pusat";
			// $ketua = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Ketua"')->username)->nama;
			// $sekretaris = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Sekretaris"')->username)->nama;
			// $anggota1 = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Anggota1"')->username)->nama;
			$nama = $Peng->nama_pengadaan;
			$metode = $Peng->metode_pengadaan;
			// $sk = $panitia->SK_panitia;
			
			$this->doccy->newFile('12a Pakta Integritas Akhir Panitia.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->doccy->phpdocx->assign('#nokeputusandir#', $sk);
			$this->doccy->phpdocx->assign('#metodepengadaan#', $metode);
			// $this->doccy->phpdocx->assign('#ketua#', $ketua);
			// $this->doccy->phpdocx->assign('#sekretaris#', $sekretaris);
			// $this->doccy->phpdocx->assign('#anggota1#', $anggota1);
			
			if(Panitia::model()->findByPk($Peng->id_panitia)->jenis_panitia == 'Panitia'){
				$this->doccy->phpdocx->assign('#skpanitia#', $skpanitia);
				$this->doccy->phpdocx->assign('#tdtgnpic#', $this->getTTPanitiaAanwijzing($Peng->id_panitia));
			}else{
				$this->doccy->phpdocx->assign('#skpanitia#', $skpanitia2);
				$this->doccy->phpdocx->assign('#tdtgnpic#', $this->getTTPanitiaAanwijzing($Peng->id_panitia));
			}
			
			$this->renderDocx("Pakta Integritas Akhir Panitia.docx", true);
		}
		else if ($Dok->nama_dokumen == "Pakta Integritas Akhir Pejabat"){
			
			$PIP2=PaktaIntegritasPanitia2::model()->findByPk($id);
			$tanggal = Tanggal::getTanggalLengkap($Dok->tanggal);
			$panitia = Panitia::model()->findByPk($Peng->id_panitia);
			// $ketua = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Ketua"')->username)->nama;
			// $sekretaris = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Sekretaris"')->username)->nama;
			// $anggota1 = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Anggota1"')->username)->nama;
			$nama = $Peng->nama_pengadaan;
			$metode = $Peng->metode_pengadaan;
			$sk = $panitia->SK_panitia;
			
			$skpanitia = "kami atas nama Panitia Pengadaan Barang/Jasa PT PLN (Persero) Kantor Pusat yang ditunjuk berdasarkan Surat Keputusan Direktur Sumber Daya Manusia dan Umum PT PLN (Persero) No. :  ". Panitia::model()->findByPk($Peng->id_panitia)->SK_panitia . " sebagai berikut :" ;
			$skpanitia2 = "saya ". Panitia::model()->findByPk($Peng->id_panitia)->nama_panitia ." sebagai Pejabat Pengadaan Barang/Jasa PT PLN (Persero) Kantor Pusat";
			
			$namapejabat=User::model()->findByPk(Anggota::model()->find('id_panitia = '.$Peng->id_panitia)->username)->nama;
			
			$this->doccy->newFile('12b Pakta Integritas Akhir Pejabat.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->doccy->phpdocx->assign('#nokeputusandir#', $sk);
			$this->doccy->phpdocx->assign('#metodepengadaan#', $metode);
			$this->doccy->phpdocx->assign('#namapejabat#', $namapejabat);
			
			if(Panitia::model()->findByPk($Peng->id_panitia)->jenis_panitia == 'Panitia'){
				$this->doccy->phpdocx->assign('#skpanitia#', $skpanitia);
				$this->doccy->phpdocx->assign('#tdtgnpic#', $this->getTTPanitiaPembukaanSampul1($Peng->id_panitia));
			}else{
				$this->doccy->phpdocx->assign('#skpanitia#', $skpanitia2);
				$this->doccy->phpdocx->assign('#tdtgnpic#', $this->getTTPanitiaPembukaanSampul1($Peng->id_panitia));
			}
			
			$this->renderDocx("Pakta Integritas Akhir Pejabat.docx", true);
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
			// $sekretaris = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Sekretaris"')->username)->nama;
			// $anggota1 = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Anggota1"')->username)->nama;
			$dokrks=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "RKS"');
			$rks=Rks::model()->findByPk($dokrks->id_dokumen);	
			
			$this->doccy->newFile('9a Berita Acara Aanwijzing.docx');
			$norks = $rks->nomor;
			
			$namapic = $this->getListPanitiaAanwijzing($Peng->id_panitia);
			$jenispic = Panitia::model()->findByPk($Peng->id_panitia)->jenis_panitia;						
			$jenispic2 = Panitia::model()->findByPk($Peng->id_panitia)->nama_panitia;
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#nomorba#', $nomor);
			$this->doccy->phpdocx->assign('#haritanggal#', Tanggal::getHariTanggalLengkap($Dok->tanggal));
			// $this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->doccy->phpdocx->assign('#ketua#', $ketua);
			// $this->doccy->phpdocx->assign('#sekretaris#', $sekretaris);
			// $this->doccy->phpdocx->assign('#anggota#', $anggota1);
			$DokRKS=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "RKS"');
			$RKS=Rks::model()->findByPk($DokRKS->id_dokumen);
			$this->doccy->phpdocx->assign('#wakturapat#', Tanggal::getJamMenit($RKS->waktu_penjelasan));
			$this->doccy->phpdocx->assign('#norks#', $RKS->nomor);
			$this->doccy->phpdocx->assign('#tanggal_rks#', Tanggal::getHariTanggalLengkap($DokRKS->tanggal));
			
			if($jenispic == 'Pejabat'){
				$this->doccy->phpdocx->assign('#panitiaataupejabat#', $jenispic);				
			}else{
				$this->doccy->phpdocx->assign('#panitiaataupejabat#', $jenispic2);								
			}
			
			$this->doccy->phpdocx->assign('#panitiaataupejabat2#', strtoupper($jenispic . " " . $nama));				
			$this->doccy->phpdocx->assign('#listpic#',$namapic);
			$this->doccy->phpdocx->assign('#listpeserta#',$this->getPenyediaLulusX($Peng->id_pengadaan,'ba_aanwijzing'));
			$this->doccy->phpdocx->assign('#listpesertattd#',$this->getTTPenyediaLulusX($Peng->id_pengadaan,'ba_aanwijzing'));
			$this->doccy->phpdocx->assign('#tdtgnpanitia#',$this->getListPanitiaTTAanwijzing($Peng->id_panitia));
			
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
			$tanggalrks = Tanggal::getTanggalLengkap(Dokumen::model()->find($rks->id_dokumen)->tanggal);
			// $ketua = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Ketua"')->username)->nama;
			// $sekretaris = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Sekretaris"')->username)->nama;
			// $anggota1 = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Anggota1"')->username)->nama;
			// $anggota2 = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Anggota1"')->username)->nama;
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
			
			$namapic = $this->getListPanitiaAanwijzing($Peng->id_panitia);
			$jenispicgan = Panitia::model()->findByPk($Peng->id_panitia)->jenis_panitia;
			$jenispic = "kami atas nama Panitia Pengadaan Barang/Jasa PT PLN (Persero) Kantor Pusat yang ditunjuk berdasarkan Surat Keputusan Direktur Sumber Daya Manusia dan Umum PT PLN (Persero) No. :  ". Panitia::model()->findByPk($Peng->id_panitia)->SK_panitia . " sebagai berikut :" ;
			$jenispic2 = "saya ". Panitia::model()->findByPk($Peng->id_panitia)->nama_panitia ." sebagai Pejabat Pengadaan Barang/Jasa PT PLN (Persero) Kantor Pusat";
			// $this->doccy->phpdocx->assign('#ketua#', $ketua);
			// $this->doccy->phpdocx->assign('#sekretaris#', $sekretaris);
			// $this->doccy->phpdocx->assign('#anggota1#', $anggota1);
			// $this->doccy->phpdocx->assign('#anggota2#', '.......................');
			$this->doccy->phpdocx->assign('#jumlahperusahaan#', $jumlahperusahaan);
			$this->doccy->phpdocx->assign('#listperusahaan#', '.......................');
			$this->doccy->phpdocx->assign('#listperusahaanlulus#', '.......................');
			$this->doccy->phpdocx->assign('#listperusahaantidaklulus#', '.......................');
			$this->doccy->phpdocx->assign('#pemenang1#', $pemenang);
			$this->doccy->phpdocx->assign('#alamat1#', $alamat);
			$this->doccy->phpdocx->assign('#npwp1#', $NPWP);
			$this->doccy->phpdocx->assign('#nilai1#', $nilai);
			$this->doccy->phpdocx->assign('#pemenang2#', $pemenang2);
			$this->doccy->phpdocx->assign('#alamat2#', $alamat2);
			$this->doccy->phpdocx->assign('#npwp2#', $NPWP2);
			$this->doccy->phpdocx->assign('#nilai2#', $nilai2);
			
			if($jenispicgan == 'Pejabat'){
				$this->doccy->phpdocx->assign('#panitiaataupejabat#', $jenispic2);				
			}else{
				$this->doccy->phpdocx->assign('#panitiaataupejabat#', $jenispic);		
				$this->doccy->phpdocx->assign('#listpic#',$namapic);				
			}			
			
			$this->doccy->phpdocx->assign('#tdtgnpic#',$this->getListPanitiaTTAanwijzing($Peng->id_panitia));
			
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
			
			$jenispic = Panitia::model()->findByPk($Peng->id_panitia)->jenis_panitia;
			
			$namapic = $this->getListPanitiaAanwijzing($Peng->id_panitia);			
			$skpanitia = "kami atas nama Panitia Pengadaan Barang/Jasa PT PLN (Persero) Kantor Pusat yang ditunjuk berdasarkan Surat Keputusan Direktur Sumber Daya Manusia dan Umum PT PLN (Persero) No. :  ". Panitia::model()->findByPk($Peng->id_panitia)->SK_panitia . " sebagai berikut :" ;
			$skpanitia2 = "saya ". Panitia::model()->findByPk($Peng->id_panitia)->nama_panitia ." sebagai Pejabat Pengadaan Barang/Jasa PT PLN (Persero) Kantor Pusat";
			
			// $ketua = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Ketua"')->username)->nama;
			// $sekretaris = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Sekretaris"')->username)->nama;
			// $anggota1 = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Anggota"')->username)->nama;
			// $anggota2 = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Anggota"')->username)->nama;
			$dokBAPP=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Berita Acara Pembukaan Penawaran Sampul Satu"');
			$BAPP=BeritaAcaraPembukaanPenawaran::model()->findByPk($dokBAPP->id_dokumen);
			$jumlahperusahaan = $BAPP->jumlah_penyedia_diundang;
			
			$metode = $Peng->metode_pengadaan;
			// $metode2 = $Peng->metode_penawaran;
			// $user = $Peng->divisi_peminta;
			$nama = $Peng->nama_pengadaan;
			// $panitia = Panitia::model()->findByPk($Peng->id_panitia);
			// $namapanitia=$panitia->nama_panitia;
			
			$this->doccy->newFile('11b Berita Acara Evaluasi Penawaran Sampul 1.docx');
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
				
			$this->doccy->phpdocx->assign('#nomorba#', $nomor);
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#hari#', $hari);
			$this->doccy->phpdocx->assign('#norks#', $norks);
			$this->doccy->phpdocx->assign('#tanggalrks#', $tanggalrks);
			// $this->doccy->phpdocx->assign('#ketua#', $ketua);
			// $this->doccy->phpdocx->assign('#sekretaris#', $sekretaris);
			// $this->doccy->phpdocx->assign('#anggota1#', $anggota1);
			// $this->doccy->phpdocx->assign('#anggota2#', '..................');
			
			$this->doccy->phpdocx->assign('#listperusahaan#',$this->getPenyediaX($Peng->id_pengadaan,'evaluasi_penawaran_1'));
			// $this->doccy->phpdocx->assign('#listpesertalulus#',$this->getPenyediaLulus($Peng->id_pengadaan));
			$this->doccy->phpdocx->assign('#listpesertalulus#',$this->getPenyediaLulusX($Peng->id_pengadaan,'evaluasi_penawaran_1'));
			$this->doccy->phpdocx->assign('#listperusahaantdklulus#',$this->getPenyediaTdkLulusX($Peng->id_pengadaan,'evaluasi_penawaran_1'));
			// $this->doccy->phpdocx->assign('#tdtgnpeserta#',$this->getTTPenyedia($Peng->id_pengadaan));			
			$this->doccy->phpdocx->assign('#jmlpesertalulus#', $this->getJmlPenyediaLulus($Peng->id_pengadaan,'evaluasi_penawaran_1'));	
			$this->doccy->phpdocx->assign('#jumlahperusahaan#', $this->getJmlPenyedia($Peng->id_pengadaan,'evaluasi_penawaran_1'));	
			
			if(Panitia::model()->findByPk($Peng->id_panitia)->jenis_panitia == 'Panitia'){
				$this->doccy->phpdocx->assign('#skpanitia#', $skpanitia);
				$this->doccy->phpdocx->assign('#listpic#', $this->getListPanitiaAanwijzing($Peng->id_panitia));
			}else{
				$this->doccy->phpdocx->assign('#skpanitia#', $skpanitia2);
				$this->doccy->phpdocx->assign('#listpic#', "");
			}
			$this->doccy->phpdocx->assign('#pejabatataupanitia2#', strtoupper($jenispic . " " . $nama));
			$this->doccy->phpdocx->assign('#tdtgnpic#',$this->getTTPanitiaPembukaanSampul1($Peng->id_panitia));
			
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
			
			$jenispic = Panitia::model()->findByPk($Peng->id_panitia)->jenis_panitia;
			// $ketua = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Ketua"')->username)->nama;
			// $sekretaris = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Sekretaris"')->username)->nama;
			// $anggota = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Anggota"')->username)->nama;
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
			
			$skpanitia = "kami atas nama Panitia Pengadaan Barang/Jasa PT PLN (Persero) Kantor Pusat yang ditunjuk berdasarkan Surat Keputusan Direktur Sumber Daya Manusia dan Umum PT PLN (Persero) No. :  ". Panitia::model()->findByPk($Peng->id_panitia)->SK_panitia . " sebagai berikut :" ;
			$skpanitia2 = "saya ". Panitia::model()->findByPk($Peng->id_panitia)->nama_panitia ." sebagai Pejabat Pengadaan Barang/Jasa PT PLN (Persero) Kantor Pusat";
			
			$this->doccy->newFile('11b Berita Acara Evaluasi Penawaran Sampul 2.docx');
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
				
			$this->doccy->phpdocx->assign('#nomorba#', $nomor);
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#hari#', $hari);
			$this->doccy->phpdocx->assign('#norks#', $norks);
			$this->doccy->phpdocx->assign('#tanggalrks#', $tanggalrks);
			// $this->doccy->phpdocx->assign('#ketua#', $ketua);
			// $this->doccy->phpdocx->assign('#sekretaris#', $sekretaris);
			// $this->doccy->phpdocx->assign('#anggota#', $anggota);
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
			
			if(Panitia::model()->findByPk($Peng->id_panitia)->jenis_panitia == 'Panitia'){
				$this->doccy->phpdocx->assign('#skpanitia#', $skpanitia);
				$this->doccy->phpdocx->assign('#listpic#', $this->getListPanitiaAanwijzing($Peng->id_panitia));
			}else{
				$this->doccy->phpdocx->assign('#skpanitia#', $skpanitia2);
				$this->doccy->phpdocx->assign('#listpic#', "");
			}
			$this->doccy->phpdocx->assign('#pejabatataupanitia2#', strtoupper($jenispic . " " . $nama));
			$this->doccy->phpdocx->assign('#tdtgnpic#',$this->getTTPanitiaPembukaanSampul1($Peng->id_panitia));
			
			$this->doccy->phpdocx->assign('#listpesertasampul2#',$this->getPenyediaLulusEvalSampul2($Peng->id_pengadaan));
			$this->doccy->phpdocx->assign('#listpesertasampul2kesimpulan#',$this->getPenyediaLulusKesimpulan($Peng->id_pengadaan,'evaluasi_penawaran_2'));
			
			$this->renderDocx("Berita Acara Evaluasi Penawaran Sampul 2.docx", true);
		}
		else if ($Dok->nama_dokumen == "Berita Acara Negosiasi dan Klarifikasi"){
			
			$bakn=BeritaAcaraNegosiasiKlarifikasi::model()->findByPk($id);	
			$nomor = $bakn->nomor;
			$tanggal = $Dok->tanggal;
			$hari = Tanggal::getHari($tanggal);
			$tanggal1 = RupiahMaker::terbilangMaker(Tanggal::getTanggal($tanggal));
			$bulan = Tanggal::getBulanA($tanggal);
			$tahun = RupiahMaker::terbilangMaker(Tanggal::getTahun($tanggal));
			$tgll = Tanggal::getTanggalLengkap($tanggal);
			$tempat = $Dok->tempat;
			$kepada = $Peng->nama_penyedia;
			$nama = $Peng->nama_pengadaan;
			
			$namapic = $this->getListPanitiaNegoKlar($Peng->id_panitia);
			$jenispic = Panitia::model()->findByPk($Peng->id_panitia)->jenis_panitia;
			// $ketua = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Ketua"')->username)->nama;
			//$sekretaris = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Sekretaris"')->username)->nama;
			//$anggota1 = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Anggota"')->username)->nama;
			
			$dokNDPP = Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Nota Dinas Perintah Pengadaan"');
			$ndpp = NotaDinasPerintahPengadaan::model()->findByPk($dokNDPP->id_dokumen);
			$boss = $ndpp->dari;
			
			$dokrks=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "RKS"');
			$rks=Rks::model()->findByPk($dokrks->id_dokumen);	
			$norks = $rks->nomor; 
			$tanggalrks = Dokumen::model()->find($rks->id_dokumen)->tanggal;
			$tglrks = Tanggal::getTanggalLengkap($tanggalrks);
			$panitia = Panitia::model()->findByPk($Peng->id_panitia);
			$dokspph=Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan . ' and nama_dokumen = "Surat Undangan Permintaan Penawaran Harga"');
			$spph = SuratUndanganPermintaanPenawaranHarga::model()->findByPk($dokspph->id_dokumen);
			$nospph = $spph->nomor;
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
			$this->doccy->phpdocx->assign('#nospph#', $nospph);
			$this->doccy->phpdocx->assign('#tan#', $tgll);
			// $this->doccy->phpdocx->assign('#ketua#', $ketua);
			//$this->doccy->phpdocx->assign('#sekretaris#', $sekretaris);
			//$this->doccy->phpdocx->assign('#anggota1#', $anggota1);
			$this->doccy->phpdocx->assign('#boss#',$boss);
			$this->doccy->phpdocx->assign('#listpic#',$namapic);			
			$this->doccy->phpdocx->assign('#panitiaataupejabat#', strtoupper($jenispic));
			
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
			$tanggalrks = Tanggal::getTanggalLengkap(Dokumen::model()->find($rks->id_dokumen)->tanggal);
			
			
			$metode = $Peng->metode_pengadaan;
			$metode2 = $Peng->metode_penawaran;
			$user = $Peng->divisi_peminta;
			$panitia = Panitia::model()->findByPk($Peng->id_panitia);
			$namapanitia=$panitia->nama_panitia;
			
			$namapic = $this->getListPanitiaAanwijzing($Peng->id_panitia);
			$jenispic = Panitia::model()->findByPk($Peng->id_panitia)->jenis_panitia;						
			$jenispic2 = Panitia::model()->findByPk($Peng->id_panitia)->nama_panitia;
			// $ketua = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Ketua"')->username)->nama;
			// $sekretaris = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Sekretaris"')->username)->nama;
			// $anggota1 = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Anggota1"')->username)->nama;
			
			$this->doccy->newFile('10a Berita Acara Pembukaan Penawaran.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#nomorba#', $nomor);
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->doccy->phpdocx->assign('#hari#', $hari);
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#jam#', Tanggal::getJamMenit($tanggal));
			$this->doccy->phpdocx->assign('#norks#', $norks);
			$this->doccy->phpdocx->assign('#tanggalrks#', $tanggalrks);
			// $this->doccy->phpdocx->assign('#ketua#', $ketua);
			// $this->doccy->phpdocx->assign('#sekretaris#', $sekretaris);
			// $this->doccy->phpdocx->assign('#anggota1#', $anggota1);
			// $this->doccy->phpdocx->assign('#anggota2#', '.............................................');
			$this->doccy->phpdocx->assign('#jumlahperusahaan#', $jumlah_penyedia_diundang);
			$this->doccy->phpdocx->assign('#listperusahaandanharga#', '.............................................');
			$this->doccy->phpdocx->assign('#listperusahaanikut#', '.............................................');
			$this->doccy->phpdocx->assign('#jumlahsah#', $jumlah_penyedia_dokumen_sah);
			$this->doccy->phpdocx->assign('#jumlahtidaksah#', $jumlah_penyedia_dokumen_tidak_sah);
			
			if($jenispic == 'Pejabat'){
				$this->doccy->phpdocx->assign('#panitiaataupejabat#', $jenispic);				
			}else{
				$this->doccy->phpdocx->assign('#panitiaataupejabat#', $jenispic2);				
			}
			
			$this->doccy->phpdocx->assign('#listpic#',$namapic);
			$this->doccy->phpdocx->assign('#tdtgnpic#',$this->getListPanitiaTTAanwijzing($Peng->id_panitia));
			
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
			$tanggalrks = Tanggal::getTanggalLengkap(Dokumen::model()->find($rks->id_dokumen)->tanggal);
			
			
			$metode = $Peng->metode_pengadaan;
			// $metode2 = $Peng->metode_penawaran;
			// $user = $Peng->divisi_peminta;
			// $panitia = Panitia::model()->findByPk($Peng->id_panitia);
			// $namapanitia=$panitia->nama_panitia;
			
			$jenispic = Panitia::model()->findByPk($Peng->id_panitia)->jenis_panitia;
			// $ketua = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Ketua"')->username)->nama;
			// $sekretaris = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Sekretaris"')->username)->nama;
			// $anggota1 = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Anggota"')->username)->nama;
			
			$this->doccy->newFile('10b Berita Acara Pembukaan Penawaran Sampul 1.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#nomorba#', $nomor);
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);			
			$this->doccy->phpdocx->assign('#hari#', $hari);
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#jam#', Tanggal::getJamMenit($tanggal));
			$this->doccy->phpdocx->assign('#norks#', $norks);
			$this->doccy->phpdocx->assign('#tanggalrks#', $tanggalrks);
			
			// $this->doccy->phpdocx->assign('#jumlahmasuk#', $jumlah_penyedia_diundang);			
			$this->doccy->phpdocx->assign('#jumlahmasuk#', $this->getJmlPenyediaLulus($Peng->id_pengadaan,'ba_aanwijzing'));			
			
			$this->doccy->phpdocx->assign('#listpeserta#',$this->getPenyediaLulusX($Peng->id_pengadaan,"ba_aanwijzing"));
			$this->doccy->phpdocx->assign('#listpesertalulus#',$this->getPenyediaX($Peng->id_pengadaan,"pembukaan_penawaran_1"));
			$this->doccy->phpdocx->assign('#listpesertaluluskoma#',$this->getPenyediaLulusX($Peng->id_pengadaan,"pembukaan_penawaran_1"));
			$this->doccy->phpdocx->assign('#listpesertatdklulus#',$this->getPenyediaTdkLulusX($Peng->id_pengadaan,"pembukaan_penawaran_1"));
			$this->doccy->phpdocx->assign('#tdtgnpeserta#',$this->getTTPenyediaX($Peng->id_pengadaan,"pembukaan_penawaran_1"));	
			
			$this->doccy->phpdocx->assign('#pejabatataupanitia#', $jenispic . " " . $nama);
			$this->doccy->phpdocx->assign('#pejabatataupanitia2#', strtoupper($jenispic . " " . $nama));
			$this->doccy->phpdocx->assign('#listpic#', $this->getListPanitiaAanwijzing($Peng->id_panitia));
			$this->doccy->phpdocx->assign('#metode#', $metode);
			$this->doccy->phpdocx->assign('#tdtgnpic#',$this->getTTPanitiaPembukaanSampul1($Peng->id_panitia));
			
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
			$tanggalrks = Tanggal::getTanggalLengkap(Dokumen::model()->find($rks->id_dokumen)->tanggal);
			
			$metode = $Peng->metode_pengadaan;
			
			$jenispic = Panitia::model()->findByPk($Peng->id_panitia)->jenis_panitia;
			// $metode2 = $Peng->metode_penawaran;
			// $user = $Peng->divisi_peminta;
			// $panitia = Panitia::model()->findByPk($Peng->id_panitia);
			// $namapanitia=$panitia->nama_panitia;
			// $ketua = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Ketua"')->username)->nama;
			// $sekretaris = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Sekretaris"')->username)->nama;
			// $anggota1 = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Anggota"')->username)->nama;
			
			$this->doccy->newFile('10b Berita Acara Pembukaan Penawaran Sampul 2.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#nomorba#', $nomor);
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->doccy->phpdocx->assign('#hari#', $hari);
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#jam#', Tanggal::getJamMenit($tanggal));
			$this->doccy->phpdocx->assign('#norks#', $norks);
			$this->doccy->phpdocx->assign('#tanggalrks#', $tanggalrks);
			
			// $this->doccy->phpdocx->assign('#jumlahmasuk#', $this->getJmlPenyediaLulus($Peng->id_pengadaan));						
			$this->doccy->phpdocx->assign('#listpeserta#',$this->getPenyediaX($Peng->id_pengadaan,'pembukaan_penawaran_2'));
			$this->doccy->phpdocx->assign('#listpesertasampul2#',$this->getPenyediaLulusX($Peng->id_pengadaan,'pembukaan_penawaran_2'));
			// $this->doccy->phpdocx->assign('#listpesertaluluskoma#',$this->getPenyediaLulusPakeKoma($Peng->id_pengadaan));
			// $this->doccy->phpdocx->assign('#listpesertatdklulus#',$this->getPenyediaTdkLulusPakeKoma($Peng->id_pengadaan));
			$this->doccy->phpdocx->assign('#tdtgnpesertasampul2#',$this->getTTPenyediaLulusX($Peng->id_pengadaan,'pembukaan_penawaran_2'));	
			
			$this->doccy->phpdocx->assign('#pejabatataupanitia#', $jenispic . " " . $nama);
			$this->doccy->phpdocx->assign('#pejabatataupanitia2#', strtoupper($jenispic . " " . $nama));
			$this->doccy->phpdocx->assign('#listpic#', $this->getListPanitiaAanwijzing($Peng->id_panitia));
			$this->doccy->phpdocx->assign('#metode#', $metode);
			$this->doccy->phpdocx->assign('#tdtgnpic#',$this->getTTPanitiaPembukaanSampul1($Peng->id_panitia));
			
			$this->renderDocx("Berita Acara Pembukaan Penawaran Sampul 2.docx", true);
		}
//	=====================================Daftar Hadir=====================================
		else if ($Dok->nama_dokumen == "Daftar Hadir Aanwijzing"){
						
			$nama = $Peng->nama_pengadaan;
			$this->doccy->newFile('daftarhadir.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#","");
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#","");
			
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->renderDocx("Daftar Hadir Aanwijzing.docx", true);
		}
		else if ($Dok->nama_dokumen == "Daftar Hadir Evaluasi Penawaran"){
						
			$nama = $Peng->nama_pengadaan;
			$this->doccy->newFile('daftarhadir.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#","");
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#","");
			
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->renderDocx("Daftar Hadir Evaluasi Penawaran Sampul 1.docx", true);
		}
		else if ($Dok->nama_dokumen == "Daftar Hadir Evaluasi Penawaran Sampul Dua"){
						
			$nama = $Peng->nama_pengadaan;
			$this->doccy->newFile('daftarhadir.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#","");
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#","");
			
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->renderDocx("Daftar Hadir Evaluasi Penawaran Sampul 2.docx", true);
		}
		else if ($Dok->nama_dokumen == "Daftar Hadir Evaluasi Penawaran Tahap Satu"){
						
			$nama = $Peng->nama_pengadaan;
			$this->doccy->newFile('daftarhadir.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#","");
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#","");
			
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->renderDocx("Daftar Hadir Evaluasi Penawaran Tahap 1.docx", true);
		}
		else if ($Dok->nama_dokumen == "Daftar Hadir Evaluasi Penawaran Tahap Dua"){
						
			$nama = $Peng->nama_pengadaan;
			$this->doccy->newFile('daftarhadir.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#","");
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#","");
			
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->renderDocx("Daftar Hadir Evaluasi Penawaran Tahap 2.docx", true);
		}
		else if ($Dok->nama_dokumen == "Daftar Hadir Negosiasi Klarifikasi"){
						
			$nama = $Peng->nama_pengadaan;
			$this->doccy->newFile('daftarhadir.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#","");
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#","");
			
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);;
			$this->renderDocx("Daftar Hadir Negosiasi dan Klarifikasi.docx", true);
		}
		else if ($Dok->nama_dokumen == "Daftar Hadir Pembukaan Penawaran"){
						
			$nama = $Peng->nama_pengadaan;
			$this->doccy->newFile('daftarhadir.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#","");
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#","");
			
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->renderDocx("Daftar Hadir Pembukaan Penawaran.docx", true);
		}
		else if ($Dok->nama_dokumen == "Daftar Hadir Pembukaan Penawaran Sampul Satu"){
						
			$nama = $Peng->nama_pengadaan;
			$this->doccy->newFile('daftarhadir.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#","");
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#","");
			
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->renderDocx("Daftar Hadir Pembukaan Penawaran Sampul Satu.docx", true);
		}
		else if ($Dok->nama_dokumen == "Daftar Hadir Pembukaan Penawaran Sampul Dua"){
						
			$nama = $Peng->nama_pengadaan;
			$this->doccy->newFile('daftarhadir.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#","");
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#","");
			
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->renderDocx("Daftar Hadir Pembukaan Penawaran Sampul Dua.docx", true);
		}
		else if ($Dok->nama_dokumen == "Daftar Hadir Pembukaan Penawaran Tahap Satu"){
						
			$nama = $Peng->nama_pengadaan;
			$this->doccy->newFile('daftarhadir.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#","");
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#","");
			
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->renderDocx("Daftar Hadir Pembukaan Penawaran Tahap Satu.docx", true);
		}
		else if ($Dok->nama_dokumen == "Daftar Hadir Pembukaan Penawaran Tahap Dua"){
						
			$nama = $Peng->nama_pengadaan;
			$this->doccy->newFile('daftarhadir.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#","");
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#","");
			
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->renderDocx("Daftar Hadir Pembukaan Penawaran Tahap Dua.docx", true);
		}
		else if ($Dok->nama_dokumen == "Daftar Hadir Prakualifikasi"){
						
			$nama = $Peng->nama_pengadaan;
			$this->doccy->newFile('daftarhadir.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#","");
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#","");
			
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
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
	
	function getListPanitiaAanwijzing($idPan){
		if(Panitia::model()->findByPk($idPan)->jenis_panitia == "Pejabat"){
			$list = Panitia::model()->findByPk($idPan)->nama_panitia;
		}else{
			$list = "1. " . User::model()->findByPk(Anggota::model()->find('id_panitia = ' . $idPan . ' and jabatan = "Ketua"')->username)->nama . " : sebagai Ketua merangkap Anggota" ;
			$list .= '<w:br/>';
			// $list .= '<w:br/>';
			$list .= "2. " . User::model()->findByPk(Anggota::model()->find('id_panitia = ' . $idPan . ' and jabatan = "Sekretaris"')->username)->nama . " : sebagai Sekretaris merangkap Anggota";
			$n = (Panitia::model()->findByPk($idPan)->jumlah_anggota)-2;
			for ( $i=1;$i<=$n;$i++){
				$list .= '<w:br/>';
				// $list .= '<w:br/>';
				$list .= $i+2 . ". " . User::model()->findByPk(Anggota::model()->find('id_panitia = ' . $idPan . ' and jabatan = "Anggota' . $i . '"')->username)->nama . " : sebagai Anggota";		
			}
		}
		return  $list;
	}
	
	function getListPanitiaTTAanwijzing($idPan){ //td tgn selang-seling
		if(Panitia::model()->findByPk($idPan)->jenis_panitia == "Pejabat"){
			$list = Panitia::model()->findByPk($idPan)->nama_panitia;
		}else{
			$list = "1. " . User::model()->findByPk(Anggota::model()->find('id_panitia = ' . $idPan . ' and jabatan = "Ketua"')->username)->nama . "                                                       ...........................................";
			$list .= '<w:br/>';		
			$list .= '<w:br/>';					
			$list .= "2. " . User::model()->findByPk(Anggota::model()->find('id_panitia = ' . $idPan . ' and jabatan = "Sekretaris"')->username)->nama . "                  ...........................................";
			$n = (Panitia::model()->findByPk($idPan)->jumlah_anggota)-2;
			for ( $i=1;$i<=$n;$i++){
				$list .= '<w:br/>';				
				$list .= '<w:br/>';		
				if($i%2==0){
					$list .= $i+2 . ". " . User::model()->findByPk(Anggota::model()->find('id_panitia = ' . $idPan . ' and jabatan = "Anggota' . $i . '"')->username)->nama . "                  ...........................................";
				}else{
					$list .= $i+2 . ". " . User::model()->findByPk(Anggota::model()->find('id_panitia = ' . $idPan . ' and jabatan = "Anggota' . $i . '"')->username)->nama . "                                                       ...........................................";
				}				
			}
		}
		return  $list;
	}
	
	function getListPanitiaNegoKlar($idPan){ //td tgn biasa
		if(Panitia::model()->findByPk($idPan)->jenis_panitia == "Pejabat"){
			$list = Panitia::model()->findByPk($idPan)->nama_panitia;
		}else{
			$list = "1. " . User::model()->findByPk(Anggota::model()->find('id_panitia = ' . $idPan . ' and jabatan = "Ketua"')->username)->nama . "/Ketua : ...........................................";
			$list .= '<w:br/>';			
			$list .= '<w:br/>';		
			$list .= "2. " . User::model()->findByPk(Anggota::model()->find('id_panitia = ' . $idPan . ' and jabatan = "Sekretaris"')->username)->nama . "/Sekretaris : ...........................................";
			$n = (Panitia::model()->findByPk($idPan)->jumlah_anggota)-2;
			for ( $i=1;$i<=$n;$i++){
				$list .= '<w:br/>';						
				$list .= '<w:br/>';		
				$list .= $i+2 . ". " . User::model()->findByPk(Anggota::model()->find('id_panitia = ' . $idPan . ' and jabatan = "Anggota' . $i . '"')->username)->nama . "/Anggota : ...........................................";						
			}
		}
		return  $list;
	}
	
	function getTTPanitiaPembukaanSampul1($idPan){ //td tgn biasa
		if(Panitia::model()->findByPk($idPan)->jenis_panitia == "Pejabat"){
			$list = Panitia::model()->findByPk($idPan)->nama_panitia;
		}else{
			$list = "1. " . User::model()->findByPk(Anggota::model()->find('id_panitia = ' . $idPan . ' and jabatan = "Ketua"')->username)->nama . "                                           (Ketua)    ...............................";
			$list .= '<w:br/>';		
			$list .= '<w:br/>';					
			$list .= "2. " . User::model()->findByPk(Anggota::model()->find('id_panitia = ' . $idPan . ' and jabatan = "Sekretaris"')->username)->nama . "         (Sekretaris)   ..................................";
			$n = (Panitia::model()->findByPk($idPan)->jumlah_anggota)-2;
			for ( $i=1;$i<=$n;$i++){
				$list .= '<w:br/>';				
				$list .= '<w:br/>';		
				if($i%2==0){
					$list .= $i+2 . ". " . User::model()->findByPk(Anggota::model()->find('id_panitia = ' . $idPan . ' and jabatan = "Anggota' . $i . '"')->username)->nama . "            (Anggota)	............................";
				}else{
					$list .= $i+2 . ". " . User::model()->findByPk(Anggota::model()->find('id_panitia = ' . $idPan . ' and jabatan = "Anggota' . $i . '"')->username)->nama . "                                       (Anggota)   ...............................";
				}				
			}
		}
		return  $list;
	}	
	
	function getPenyediaX($idpeng,$tahap){
		$arraypenyedia = PenerimaPengadaan::model()->findAll($tahap . ' = "1" or ' . $tahap . ' = "0" ' . 'and id_pengadaan = ' . $idpeng);
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
	
	function getTTPenyediaX($idpeng,$tahap){
		$arraypenyedia = PenerimaPengadaan::model()->findAll($tahap . ' = "1" or ' . $tahap . ' = "0" ' . 'and id_pengadaan = ' . $idpeng);
		$stringpenyedia = "";
				
		if($arraypenyedia == null){
			$stringpenyedia = '-';
		}else{		
			for($i=0;$i<count($arraypenyedia);$i++){
				$stringpenyedia .= $arraypenyedia[$i]->perusahaan . '                                ................................................. <w:br/>';
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
	
	function getTTPenyediaLulusX($idpeng,$tahap){
		$arraypenyedia = PenerimaPengadaan::model()->findAll($tahap . ' = "1" and id_pengadaan = ' . $idpeng);
		$stringpenyedia = "";
				
		if($arraypenyedia == null){
			$stringpenyedia = '-';
		}else{		
			for($i=0;$i<count($arraypenyedia);$i++){
				$stringpenyedia .= $arraypenyedia[$i]->perusahaan . '                                ................................................. <w:br/>';
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
				$stringpenyedia .= $arraypenyedia[$i]->perusahaan . '                                ................................................. <w:br/>';
			}
		}
		
		return $stringpenyedia;
	}

	function getPenyediaLulusPakeKoma($idpeng){
		$arraypenyedia = PenerimaPengadaan::model()->findAll('status = "Lulus" and id_pengadaan = ' . $idpeng);
		$stringpenyedia = "";
				
		if($arraypenyedia == null){
			$stringpenyedia = '-';
		}else{		
			$stringpenyedia .= $arraypenyedia[0]->perusahaan ;
			for($i=1;$i<count($arraypenyedia);$i++){
				$stringpenyedia .= ', ' . $arraypenyedia[$i]->perusahaan ;
			}
		}		
		return $stringpenyedia;
	}
		
	function getPenyediaTdkLulusPakeKoma($idpeng){
		$arraypenyedia = PenerimaPengadaan::model()->findAll('status = "Tidak Lulus" and id_pengadaan = ' . $idpeng);
		$stringpenyedia = "";
		
		if($arraypenyedia == null){
			$stringpenyedia = '-';
		}else{		
			$stringpenyedia .= $arraypenyedia[0]->perusahaan;
			for($i=1;$i<count($arraypenyedia);$i++){
				$stringpenyedia .= ', ' . $arraypenyedia[$i]->perusahaan;
			}
		}
		return $stringpenyedia;
	}
	
	function getJmlPenyedia($idpeng, $tahap){
		$arraypenyedia = PenerimaPengadaan::model()->findAll($tahap . ' = "1" or ' . $tahap . ' = "0" ' . 'and id_pengadaan = ' . $idpeng);
		return count($arraypenyedia);
	}
	
	function getJmlPenyediaLulus($idpeng, $tahap){
		$arraypenyedia = PenerimaPengadaan::model()->findAll($tahap . ' = "1" and id_pengadaan = ' . $idpeng);
		return count($arraypenyedia);
	}
		
	function getPenyediaLulusEvalSampul2($idpeng){
		$arraypenyedia = PenerimaPengadaan::model()->findAll('evaluasi_penawaran_2 = "1"  and id_pengadaan = ' . $idpeng);
		$stringpenyedia = "";
				
		if($arraypenyedia == null){
			$stringpenyedia = '-';
		}else{		
			for($i=0;$i<count($arraypenyedia);$i++){
				$stringpenyedia .= 	'PT. ' . $arraypenyedia[$i]->perusahaan . '<w:br/>'  .
									'a. Harga yang ditawarkan sebesar ' . RupiahMaker::convertInt($arraypenyedia[$i]->nilai) . '(' . RupiahMaker::TerbilangMaker($arraypenyedia[$i]->nilai) . ')' . ' sesuai data yang ada didalam server PT PLN (Persero) / e-proc PLN.' . '<w:br/>' . 
									'b. Harga penawaran sebesar ' . RupiahMaker::convertInt($arraypenyedia[$i]->nilai) . '(' . RupiahMaker::TerbilangMaker($arraypenyedia[$i]->nilai) . ')' . ' lebih rendah dari ' . $this->persenMaker($arraypenyedia[$i]->nilai,1000) .'% HPS <w:br/>'
									;
			}
		}		
		return $stringpenyedia;
	}
	
	function getPenyediaLulusKesimpulan($idpeng,$tahap){
		$arraypenyedia = PenerimaPengadaan::model()->findAll($tahap . ' = "1"  and id_pengadaan = ' . $idpeng);
		$stringpenyedia = "";
				
		if($arraypenyedia == null){
			$stringpenyedia = '-';
		}else{		
			for($i=0;$i<count($arraypenyedia);$i++){
				$stringpenyedia .= 	'Calon Pemenang ' . ($i+1) . '<w:br/>' . 
									'Nama Perusahaan 	: ' . $arraypenyedia[$i]->perusahaan . '<w:br/>' . 
									'Alamat			 	: ' . $arraypenyedia[$i]->alamat . '<w:br/>' . 
									'NPWP			 	: ' . $arraypenyedia[$i]->npwp . '<w:br/>' .
									'Nilai Penawaran 	: ' . RupiahMaker::convertInt($arraypenyedia[$i]->nilai) . '<w:br/>' .
									'Terbilang 			: ' . RupiahMaker::TerbilangMaker($arraypenyedia[$i]->nilai) . ', sudah termasuk pajak sesuai dengan ketentuan yang berlaku. <w:br/>'
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
									'Nilai Penawaran 	: ' . RupiahMaker::convertInt($arraypenyedia[$i]->nilai) . '<w:br/>' .
									'Terbilang 			: ' . RupiahMaker::TerbilangMaker($arraypenyedia[$i]->nilai) . ', sudah termasuk pajak sesuai dengan ketentuan yang berlaku. <w:br/>'
									;
			}
		}		
		return $stringpenyedia;
	}
		
	function persenMaker($nilai,$hps){
		return 0;
	}
	
	
	
}
?>