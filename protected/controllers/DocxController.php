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
	
	public function actionDownload()
	{
		$id = Yii::app()->getRequest()->getQuery('id');	
		
		// $this->redirect(array('site/dashboard'));
	
		$Dok=Dokumen::model()->findByPk($id);
		$Peng=Pengadaan::model()->findByPk($Dok->id_pengadaan);
		
		
//	=====================================Nota Dinas=====================================
		if ($Dok->nama_dokumen == "Nota Dinas Perintah Pengadaan"){
			$NDPP=NotaDinasPerintahPengadaan::model()->findByPk($id);	
			$nomor = $NDPP->nomor;
			$dari = $NDPP->dari;
			$kepada = $NDPP->kepada;
			$perihal = $NDPP->perihal;
			$anggaran = $NDPP->pagu_anggaran;
			$sumber = $NDPP->sumber_dana;
			$tanggal = $Dok->tanggal;
			$DokNotaDinas= Dokumen::model()->find('id_pengadaan = '. $Dok->id_pengadaan. ' and nama_dokumen = "Nota Dinas Permintaan"');
			$tanggalpermintaan = $DokNotaDinas->tanggal;
			$torrks = $NDPP->TOR_RKS;
			$rab = $NDPP->RAB;
			$target = $NDPP->targetSPK_kontrak;
			$nonota = $NDPP->nota_dinas_permintaan;
			$metode = $Peng->metode_pengadaan;
			$user = $Peng->divisi_peminta;
			$nama = $Peng->nama_pengadaan;
			$panitia = Panitia::model()->findByPk($Peng->id_panitia);
			$namapanitia=$panitia->nama_panitia;
			if($panitia->jenis_panitia=="Pejabat"){
				$kepada2 = ""; 
				$sekretaris = "";
			} else {
				$kepada2 = "Ketua ".$panitia->nama_panitia." Pengadaan Barang Jasa";
				$sekretaris = "- Sekretaris Panitia";
			}
			
			$this->doccy->newFile('1. nd-perintahpengadaan.docx');
			if ($dari == "KDIVMUM"){$tembusan = "MSDAF";}
			else {$tembusan = "KDIVMUM";}
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#nosurat#', $nomor);
			$this->doccy->phpdocx->assign('#kepada1#', $kepada);
			$this->doccy->phpdocx->assign('#kepada2#', $kepada2);
			$this->doccy->phpdocx->assign('#dari#', $dari);
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#tanggalpermintaan#', $tanggalpermintaan);
			$this->doccy->phpdocx->assign('#perihal#', $perihal);
			$this->doccy->phpdocx->assign('#anggaran#', $anggaran);
			$this->doccy->phpdocx->assign('#sumber#', $sumber);
			$this->doccy->phpdocx->assign('#torrks#', $torrks);
			$this->doccy->phpdocx->assign('#rab#', $rab);
			$this->doccy->phpdocx->assign('#panitia#', $namapanitia);
			$this->doccy->phpdocx->assign('#metode#', $metode);
			$this->doccy->phpdocx->assign('#targetspk#', $target);
			$this->doccy->phpdocx->assign('#tembusan#', $tembusan);
			$this->doccy->phpdocx->assign('#user#', $user);
			$this->doccy->phpdocx->assign('#nonotadinas#', $nonota);
			$this->doccy->phpdocx->assign('#sekretaris#', $sekretaris);
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->renderDocx("Nota Dinas Perintah Pengadaan.docx", true);
		}
		else if ($Dok->nama_dokumen == "Nota Dinas Penetapan Pemenang"){
			
			$this->doccy->newFile('nd-penetapanpemenang.docx');
			
			$NDPP=NotaDinasPenetapanPemenang::model()->findByPk($id);	
			$nomor = $NDPP->nomor;
			$pemenang = $NDPP->nama_penyedia;
			$alamat = $NDPP->alamat;
			$NPWP = $NDPP->NPWP;
			$biaya = $NDPP->biaya;
			$tanggal = $Dok->tanggal;
			$nama = $Peng->nama_pengadaan;
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
		
			$this->doccy->phpdocx->assign('#1#', $nomor);
			$this->doccy->phpdocx->assign('#2#', $tanggal);
			$this->doccy->phpdocx->assign('#3#', 'Biasa');
			$this->doccy->phpdocx->assign('#4#', '.............................................');
			$this->doccy->phpdocx->assign('#5#', '.............................................');
			$this->doccy->phpdocx->assign('#6#', $nama);
			$this->doccy->phpdocx->assign('#7#', '.............................................');
			$this->doccy->phpdocx->assign('#8#', '.............................................');
			$this->doccy->phpdocx->assign('#9#', '.............................................');
			$this->doccy->phpdocx->assign('#10#', '.............................................');
			$this->doccy->phpdocx->assign('#11#', $pemenang);
			$this->doccy->phpdocx->assign('#12#', $alamat);
			$this->doccy->phpdocx->assign('#13#', $NPWP);
			$this->doccy->phpdocx->assign('#14#', $biaya);
			$this->renderDocx("Nota Dinas Penetapan Pemenang.docx", true);
	
		}
		else if ($Dok->nama_dokumen == "Nota Dinas Usulan Pemenang"){
			
			$this->doccy->newFile('nd-usulanpemenang.docx');
			
			$NDUP=NotaDinasUsulanPemenang::model()->findByPk($id);	
			$nomor = $NDUP->nomor;
			$dari = $NDUP->dari;
			$pemenang = $NDUP->nama_penyedia;
			$alamat = $NDUP->alamat;
			$NPWP = $NDUP->NPWP;
			$biaya = $NDUP->biaya;
			$tanggal = $Dok->tanggal;
			$waktu = $NDUP->waktu_pelaksanaan;
			$tempat = $NDUP->tempat_penyerahan;
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
		
			$this->doccy->phpdocx->assign('#1#', $nomor);
			$this->doccy->phpdocx->assign('#2#', $dari);
			$this->doccy->phpdocx->assign('#3#', $tanggal);
			$this->doccy->phpdocx->assign('#4#', '.............................................');
			$this->doccy->phpdocx->assign('#5#', '.............................................');
			$this->doccy->phpdocx->assign('#6#', $nama);
			$this->doccy->phpdocx->assign('#7#', $pemenang);
			$this->doccy->phpdocx->assign('#8#', $alamat);
			$this->doccy->phpdocx->assign('#9#', $NPWP);
			$this->doccy->phpdocx->assign('#10#', $biaya);
			$this->doccy->phpdocx->assign('#11#', $waktu);
			$this->doccy->phpdocx->assign('#12#', $tempat);
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
//	=====================================Surat-Surat=====================================
		else if ($Dok->nama_dokumen == "Surat Undangan Pengambilan Dokumen Pengadaan"){
			
			$SUPDP=SuratUndanganPengambilanDokumenPengadaan::model()->findByPk($id);	
			$nomor = $SUPDP->nomor;
			$tanggal = $Dok->tanggal;
			$tempat = $Dok->tempat;
			$kepada = $Peng->nama_penyedia;
			$perihal = $SUPDP->perihal;
			$tanggalambil = $SUPDP->tanggal_pengambilan;
			$waktuambil = $SUPDP->waktu_pengambilan;
			$tempatambil = $SUPDP->tempat_pengambilan;
			$nama = $Peng->nama_pengadaan;
			
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
			$this->doccy->phpdocx->assign('#nomor#', $nomor);
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
			$tanggal = $Dok->tanggal;
			$tempat = $Dok->tempat;
			$waktu = $SUP->waktu;
			$nama = $Peng->nama_pengadaan;
			$perihal = $SUP->perihal;
			$ketua = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Ketua"')->username)->nama;
			$sekretaris = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Sekretaris"')->username)->nama;
			$anggota1 = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Anggota"')->username)->nama;
					
			$this->doccy->newFile('8 Surat Undangan Aanwijzing.docx');
			$this->doccy->phpdocx->assignToHeader("#HEADER1#","");
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#","");
			$this->doccy->phpdocx->assign('#nomor#', $nomor);
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#norks#', '		');
			$this->doccy->phpdocx->assign('#acara#', '		');
			$this->doccy->phpdocx->assign('#pekerjaan#', '			');
			$this->doccy->phpdocx->assign('#perihal#', $perihal);
			$this->doccy->phpdocx->assign('#hari#', '		');
			$this->doccy->phpdocx->assign('#nama#', $nama);
			$this->doccy->phpdocx->assign('#waktu#', $waktu);
			$this->doccy->phpdocx->assign('#tempat#', $tempat);
			$this->doccy->phpdocx->assign('#ketua#', $ketua);
			$this->doccy->phpdocx->assign('#sekretaris#', $sekretaris);
			$this->doccy->phpdocx->assign('#anggota1#', $anggota1);
			
			$this->renderDocx("Surat Undangan Penjelasan.docx", true);

		}
		else if ($Dok->nama_dokumen == "Surat Pernyataan Minat"){
			
			
			$SPM=SuratPernyataanMinat::model()->findByPk($id);
			$nama = $Peng->nama_pengadaan;
			$tanggal = $Dok->tanggal;
			$tempat = $Dok->tempat;
			
			$this->doccy->newFile('5b Surat Pernyataan Minat.docx');
			
		$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
		$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
		
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->doccy->phpdocx->assign('#kota#', $tempat);
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
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
		
		$this->renderDocx("Surat Pemberitahuan Pengadaan.docx", true);
		}
		else if ($Dok->nama_dokumen == "Surat Undangan Permintaan Penawaran Harga"){
			
			$SUPH=SuratUndanganPermintaanPenawaranHarga::model()->findByPk($id);	
			$nomor = $SUPH->nomor;
			$tanggal = $Dok->tanggal;
			$lingkup = $SUPH->lingkup_kerja;
			$waktukerja = $SUPH->waktu_kerja;
			$masa = $SUPH->masa_berlaku_penawaran;
			$lingkup = $SUPH->lingkup_kerja;
			$tempat = $SUPH->tempat_penyerahan;
			$nama = $Peng->nama_pengadaan;
			$tanggalpenawaran = $SUPH->tempat_penyerahan;
				
			$this->doccy->newFile('6 Surat Undangan Penawaran Harga.docx');
			
		$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
		$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
		
			$this->doccy->phpdocx->assign('#nomor#', $nomor);
			$this->doccy->phpdocx->assign('#bulan#', '.....');
			$this->doccy->phpdocx->assign('#terbilangbulan#', '................................');
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#lingkupkerja#', $lingkup);
			$this->doccy->phpdocx->assign('#tanggalpenawaran#', $tanggalpenawaran);
			$this->doccy->phpdocx->assign('#waktupengerjaan#', $waktukerja);
			$this->doccy->phpdocx->assign('#tempatpenyerahan#', $tempat);
			$this->doccy->phpdocx->assign('#namaKDIVMUM/MSDAF#', 'PaKadiv');
			$this->renderDocx("Surat Undangan Permintaan Penawaran Harga.docx", true);
		}
		else if ($Dok->nama_dokumen == "Form Isian Kualifikasi"){
		
		$nama = $Peng->nama_pengadaan;
			
		$this->doccy->newFile('5d Form Isian Kualifikasi.docx');
			
		$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
		$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
		$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
		
		$this->renderDocx("Form Isian Kualifikasi.docx", true);
		}
/*Belum ada model*/		/*else if ($Dok->nama_dokumen == "Surat Penunjukan Pemenang"){
			
			$SPP=SuratPemberitahuanPengadaan::model()->findByPk($id);	
			$nomor = $SPP->nomor;
			$tanggal = $Dok->tanggal;
			$tempat = $Dok->tempat;
			$kepada = $Peng->nama_penyedia;
			$perihal = $SPP->perihal;
			$nama = $Peng->nama_pengadaan;
				
			$this->doccy->newFile('s-pemberitahuanpengadaan.docx');
			
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
//	=====================================Pakta Integritas=====================================
		else if ($Dok->nama_dokumen == "Pakta Integritas Awal Panitia"){
			
			$PI=PaktaIntegritasPanitia1::model()->findByPk($id);
			$tanggal = $Dok->tanggal;
			$panitia = Panitia::model()->findByPk($Peng->id_panitia);
			$ketua = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Ketua"')->username)->nama;
			$sekretaris = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Sekretaris"')->username)->nama;
			$anggota1 = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Anggota"')->username)->nama;
			
			$this->doccy->newFile('2 Pakta Integritas Awal Panitia.docx');
			
		$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
		$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#kota#', 'Jakarta');
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#ketua#', $ketua);
			$this->doccy->phpdocx->assign('#sekretaris#', $sekretaris);
			$this->doccy->phpdocx->assign('#anggota1#', $anggota1);
			$this->renderDocx("Pakta Integritas Awal Panitia.docx", true);
			
		}
		else if ($Dok->nama_dokumen == "Pakta Integritas Akhir Panitia"){
			
			$PI=PaktaIntegritasPanitia1::model()->findByPk($id);
			$tanggal = $Dok->tanggal;
			$panitia = Panitia::model()->findByPk($Peng->id_panitia);
			$ketua = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Ketua"')->username)->nama;
			$sekretaris = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Sekretaris"')->username)->nama;
			$anggota1 = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Anggota"')->username)->nama;
			$nama = $Peng->nama_pengadaan;
			$sk = $panitia->SK_panitia;
			$this->doccy->newFile('pi-panitia2.docx');
			
		$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
		$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->doccy->phpdocx->assign('#sk#', $sk);
			$ketua = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Ketua"')->username)->nama;
			$sekretaris = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Sekretaris"')->username)->nama;
			$anggota1 = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Anggota"')->username)->nama;
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
			$tglrks = $Dok->tanggal;
			$nama = $Peng->nama_pengadaan;
			$tanggalpermintaan = $rks->tanggal_permintaan_penawaran;
			$tanggalpenunjukan = $rks->tanggal_penjelasan;
			$waktupenunjukan = $rks->waktu_penjelasan;
			$tempatpenunjukan = $rks->tempat_penjelasan;
			$tanggalawalpemasukan = $rks->tanggal_pemasukan_penawaran;
			$tanggalakhirpemasukan = $rks->tanggal_akhir_pemasukan_penawaran;
			$waktupemasukanpenawaran = $rks->waktu_pemasukan_penawaran;
			$tempatpemasukan = $rks->tempat_pemasukan_penawaran;
			$tanggalnegosiasi = $rks->tanggal_negosiasi;
			$waktunegosiasi = $rks->waktu_negosiasi;
			$tanggalpenunjukanpemenang = $rks->tanggal_penetapan_pemenang;
			$waktupenunjukanpemenang = $rks->waktu_penetapan_pemenang;
			$tempatpenunjukanpemenang = $rks->tempat_penetapan_pemenang;
			
			$this->doccy->newFile('3a rks-tunjuklangsungjasa.docx');
			
		$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
		$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#norks#', $norks);
			$this->doccy->phpdocx->assign('#tglrks#', $tglrks);
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
			$tanggal = $Dok->tanggal;
			$nama = $Peng->nama_pengadaan;
			$panitia = Panitia::model()->findByPk($Peng->id_panitia);
			$ketua = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Ketua"')->username)->nama;
			$sekretaris = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Sekretaris"')->username)->nama;
			$anggota1 = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Anggota"')->username)->nama;
			//$norks = Rks::model()->find(Dokumen::model()->find('id_pengadaan='.$Peng->id_pengadaan)->id_dokumen)->nomor;
			$this->doccy->newFile('9a Berita Acara Aanwijzing.docx');
			
		$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
		$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#nomorba#', $nomor);
			$this->doccy->phpdocx->assign('#hari#', '				');
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->doccy->phpdocx->assign('#ketua#', $ketua);
			$this->doccy->phpdocx->assign('#sekretaris#', $sekretaris);
			$this->doccy->phpdocx->assign('#anggota#', $anggota1);
			$this->doccy->phpdocx->assign('#wakturapat#', '....... : .......');
			$this->doccy->phpdocx->assign('#norks#', '.............................................');
			$this->doccy->phpdocx->assign('#tanggalrks#', '.............................................');
			$this->renderDocx("Berita Acara Penjelasan.docx", true);
		}
		else if ($Dok->nama_dokumen == "Berita Acara Evaluasi Penawaran"){
			
			$BAE=BeritAcaraEvaluasi::model()->findByPk($id);	
			$nomor = $BAE->nomor;
			$nama = $Peng->nama_pengadaan;
			$tanggal = $Dok->tanggal;
			$norks = $BAE->no_RKS;
			$ketua = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Ketua"')->username)->nama;
			$sekretaris = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Sekretaris"')->username)->nama;
			$anggota1 = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Anggota"')->username)->nama;
			$anggota2 = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Anggota"')->username)->nama;
			
			$metode = $Peng->metode_pengadaan;
			$metode2 = $Peng->metode_penawaran;
			$user = $Peng->divisi_peminta;
			$nama = $Peng->nama_pengadaan;
			$panitia = Panitia::model()->findByPk($Peng->id_panitia);
			$namapanitia=$panitia->nama_panitia;
			$tanggalrks = Rks::model()->find(no_rks)->tanggal_rks;
			
			if ($metode2 == "Satu Sampul"){
				$this->doccy->newFile('11a Berita Acara Evaluasi Penawaran.docx');
				$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
				$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
				
				$this->doccy->phpdocx->assign('#nomorba#', $nomor);
				$this->doccy->phpdocx->assign('#namadokumen#', '');
				$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
				$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
				$this->doccy->phpdocx->assign('#norks#', $norks);
				$this->doccy->phpdocx->assign('#tanggalrks#', $tanggalrks);
				$this->doccy->phpdocx->assign('#ketua#', $ketua);
				$this->doccy->phpdocx->assign('#sekretaris#', $sekretaris);
				$this->doccy->phpdocx->assign('#anggota1#', $anggota1);
				$this->doccy->phpdocx->assign('#anggota2#', $anggota2);
				}
			
			else {
				$this->doccy->newFile('11b Berita Acara Evaluasi Penawaran.docx');
				$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
				$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
				
				$this->doccy->phpdocx->assign('#nomor#', $nomor);
				$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
				$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
				$this->doccy->phpdocx->assign('#tanggalrks#', $tanggalrks);
				$this->doccy->phpdocx->assign('#norks#', $norks);
				$this->doccy->phpdocx->assign('#ketua#', $ketua);
				$this->doccy->phpdocx->assign('#sekretaris#', $sekretaris);
				$this->doccy->phpdocx->assign('#anggota1#', $anggota1);
				$this->doccy->phpdocx->assign('#anggota2#', $anggota2);
			
			}
			$this->renderDocx("Berita Acara Evaluasi Penawaran.docx", true);
		}
		else if ($Dok->nama_dokumen == "Berita Acara Negosiasi Klarifikasi"){
			
			$bakn=BeritaAcaraNegosiasiKlarifikasi::model()->findByPk($id);	
			$nomor = $bakn->nomor;
			$tanggal = $Dok->tanggal;
			$tempat = $Dok->tempat;
			$kepada = $Peng->nama_penyedia;
			$nama = $Peng->nama_pengadaan;
			$ketua = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Ketua"')->username)->nama;
			$sekretaris = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Sekretaris"')->username)->nama;
			$anggota1 = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Anggota"')->username)->nama;
			$anggota2 = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Anggota"')->username)->nama;
			
			$this->doccy->newFile('ba-kn.docx');
			
		$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
		$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#nomor#', $nomor);
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->doccy->phpdocx->assign('#norks#', '.............................................');
			$this->doccy->phpdocx->assign('#tanggalrks#', '.............................................');
			$this->doccy->phpdocx->assign('#hari#', '.........................');
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#zzz#', '....................');
			$this->doccy->phpdocx->assign('#ketua#', $ketua);
			$this->doccy->phpdocx->assign('#sekretaris#', $sekretaris);
			$this->doccy->phpdocx->assign('#anggota1#', $anggota1);
			$this->doccy->phpdocx->assign('#anggota2#', $anggota2);
			$this->renderDocx("Berita Acara Negosiasi Klarifikasi.docx", true);
		}
		else if ($Dok->nama_dokumen == "Berita Acara Pembukaan Penawaran"){
			
			$BAPP=BeritAcaraPembukaanPenawaran::model()->findByPk($id);	
			$nomor = $BAPP->nomor;
			$nama = $Peng->nama_pengadaan;
			$tanggal = $Dok->tanggal;
			$norks = $BAPP->no_RKS;
			
			
			$metode = $Peng->metode_pengadaan;
			$metode2 = $Peng->metode_penawaran;
			$user = $Peng->divisi_peminta;
			$nama = $Peng->nama_pengadaan;
			$panitia = Panitia::model()->findByPk($Peng->id_panitia);
			$namapanitia=$panitia->nama_panitia;
			$ketua = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Ketua"')->username)->nama;
			$sekretaris = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Sekretaris"')->username)->nama;
			$anggota1 = User::model()->findByPk(Anggota::model()->find('id_panitia='.$Peng->id_panitia. ' and jabatan = "Anggota"')->username)->nama;
						
			if ($metode2 == "Satu Sampul"){
			$this->doccy->newFile('10a Berita Acara Pembukaan Penawaran.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#nomorba#', $nomor);
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->doccy->phpdocx->assign('#hari#', '..............................');
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#jam#', '..... : .....');
			$this->doccy->phpdocx->assign('#norks#', '..............................');
			$this->doccy->phpdocx->assign('#tanggalrks#', '..............................');
			$this->doccy->phpdocx->assign('#ketua#', $ketua);
			$this->doccy->phpdocx->assign('#sekretaris#', $sekretaris);
			$this->doccy->phpdocx->assign('#anggota1#', $anggota1);
			$this->doccy->phpdocx->assign('#anggota2#', '.............................................');
			$this->renderDocx("Berita Acara Pembukaan Penawaran.docx", true);}
		
			else if ($metode2 == "Dua Sampul"){
			$this->doccy->newFile('10b Berita Acara Pembukaan Penawaran.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#nomorba#', $nomor);
			$this->doccy->phpdocx->assign('#namapengadaan#', $nama);
			$this->doccy->phpdocx->assign('#hari#', '.....................');
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#jam#', '..... : .....');
			$this->doccy->phpdocx->assign('#norks#', '........................................');
			$this->doccy->phpdocx->assign('#tanggalrks#', '..............................');
			$this->doccy->phpdocx->assign('#ketua#', $ketua);
			$this->doccy->phpdocx->assign('#sekretaris#', $sekretaris);
			$this->doccy->phpdocx->assign('#anggota1#', $anggota1);
			$this->doccy->phpdocx->assign('#anggota2#', '.............................................');
			$this->renderDocx("Berita Acara Pembukaan Penawaran.docx", true);}
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
			$this->doccy->phpdocx->assign('#7#', '');
			$this->doccy->phpdocx->assign('#8#', '');
			$this->doccy->phpdocx->assign('#9#', '');
			$this->doccy->phpdocx->assign('#10#', '');
			$this->doccy->phpdocx->assign('#11#', '');
			$this->doccy->phpdocx->assign('#12#', '');
			$this->renderDocx("Temp.docx", true);
		}
	}
}
?>