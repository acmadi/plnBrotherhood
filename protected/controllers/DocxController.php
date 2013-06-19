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
			
			$this->doccy->newFile('notadinas.docx');
			if ($dari == "KDIVMUM"){$tembusan = "MS-DAF";}
			else {$tembusan = "KDIVMUM";}
			
			
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#nosurat#', $nomor);
			$this->doccy->phpdocx->assign('#kepada1#', $kepada);
			$this->doccy->phpdocx->assign('#kepada2#', $kepada2);
			$this->doccy->phpdocx->assign('#dari#', $dari);
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
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
			
			$this->doccy->newFile('ndpenetapanpemenang.docx');
			
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
			
			
			$this->doccy->newFile('ndusulanpemenang.docx');
			
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
		else if ($Dok->nama_dokumen == "Nota Dinas Pemberitahuan Pemenang"){
			
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
			$this->renderDocx("Nota Dinas Pemberitahuan Pemenang.docx", true);
		}
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
			
			$this->doccy->newFile('UPDP.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
		
			$this->doccy->phpdocx->assign('#1#', $tempat);
			$this->doccy->phpdocx->assign('#2#', $tanggal);
			$this->doccy->phpdocx->assign('#3#', 'Biasa');
			$this->doccy->phpdocx->assign('#4#', $perihal);
			$this->doccy->phpdocx->assign('#5#', $kepada	);
			$this->doccy->phpdocx->assign('#6#', $nama);
			$this->doccy->phpdocx->assign('#7#', $tanggalambil);
			$this->doccy->phpdocx->assign('#8#', $waktuambil);
			$this->doccy->phpdocx->assign('#9#', $tempatambil);
			$this->doccy->phpdocx->assign('#10#', $nomor);
			$this->renderDocx("Surat Undangan Pengambilan Dokumen Pengadaan.docx", true);
		}
		else if ($Dok->nama_dokumen == "Surat Undangan Pembukaan Penawaran"){
			
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
		}
		else if ($Dok->nama_dokumen == "Surat Undangan Negosiasi dan Klarifikasi"){
			
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
		}
		else if ($Dok->nama_dokumen == "Surat Undangan Aanwijzing") {
			
			$SUP=SuratUndanganPenjelasan::model()->findByPk($id);
			$nomor = $SUP->nomor;
			$tanggal = $Dok->tanggal;
			$tempat = $Dok->tempat;
			$waktu = $SUP->waktu;
			$nama = $Peng->nama_pengadaan;
			$perihal = $SUP->perihal;
					
			$this->doccy->newFile('SUP.docx');
			$this->doccy->phpdocx->assignToHeader("#HEADER1#","");
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#","");
			$this->doccy->phpdocx->assign('#nomor#', $nomor);
			$this->doccy->phpdocx->assign('#tanggal#', $tanggal);
			$this->doccy->phpdocx->assign('#norks#', '');
			$this->doccy->phpdocx->assign('#acara#', '');
			$this->doccy->phpdocx->assign('#pekerjaan#', '');
			$this->doccy->phpdocx->assign('#perihal#', $perihal);
			$this->doccy->phpdocx->assign('#hari#', '');
			$this->doccy->phpdocx->assign('#nama#', $nama);
			$this->doccy->phpdocx->assign('#waktu#', $waktu);
			$this->doccy->phpdocx->assign('#tempat#', $tempat);
			$this->renderDocx("Surat Undangan Penjelasan.docx", true);

		}
		else if ($Dok->nama_dokumen == "Surat Pernyataan Minat"){
			
			
			$SPM=SuratPernyataanMinat::model()->findByPk($id);
			$nama = $Peng->nama_pengadaan;
			$tanggal = $Dok->tanggal;
			$tempat = $Dok->tempat;
			
			$this->doccy->newFile('SPM.docx');
			
		$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
		$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
		
			$this->doccy->phpdocx->assign('#1#', $nama);
			$this->doccy->phpdocx->assign('#2#', $tempat);
			$this->doccy->phpdocx->assign('#3#', $tanggal);
		}
		else if ($Dok->nama_dokumen == "Surat Pemberitahuan Pengadaan"){
			
			$SPP=SuratPemberitahuanPengadaan::model()->findByPk($id);	
			$nomor = $SPP->nomor;
			$tanggal = $Dok->tanggal;
			$tempat = $Dok->tempat;
			$kepada = $Peng->nama_penyedia;
			$perihal = $SPP->perihal;
			$nama = $Peng->nama_pengadaan;
				
			$this->doccy->newFile('spp.docx');
			
		$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
		$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
		
			$this->doccy->phpdocx->assign('#1#', $nomor);
			$this->doccy->phpdocx->assign('#2#', '.............................................');
			$this->doccy->phpdocx->assign('#3#', $tanggal);
			$this->doccy->phpdocx->assign('#4#', $kepada);
			$this->doccy->phpdocx->assign('#5#', $nama);
			$this->doccy->phpdocx->assign('#6#', $perihal);
			$this->renderDocx("Surat Pemberitahuan Pengadaan.docx", true);
		}
//	=====================================Pakta Integritas=====================================
		else if ($Dok->nama_dokumen == "Pakta Integritas Panitia 1"){
			
			$this->doccy->newFile('PIPanitia.docx');
			
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
			$this->renderDocx("Pakta Integritas Panitia.docx", true);
		}
		else if ($Dok->nama_dokumen == "Pakta Integritas Penyedia"){
			
			$this->doccy->newFile('PIPeserta.docx');
			
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
			$this->renderDocx("Pakta Integritas Penyedia.docx", true);
		}
//	=====================================RKS=====================================
		else if ($Dok->nama_dokumen == "RKS"){
			
			
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
			$this->renderDocx("RKS.docx", true);
		}
//	=====================================Berita Acara=====================================
		else if ($Dok->nama_dokumen == "Berita Acara Aanwijzing"){
			
			$BA=BeritaAcaraPenjelasan::model()->findByPk($id);	
			$nomor = $BA->nomor;
			$tanggal = $Dok->tanggal;
			$tempat = $Dok->tempat;
			$kepada = $Peng->nama_penyedia;
			$nama = $Peng->nama_pengadaan;
			
			$this->doccy->newFile('bapenjelasan.docx');
			
		$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
		$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#1#', $nomor);
			$this->doccy->phpdocx->assign('#2#', '.............................................');
			$this->doccy->phpdocx->assign('#3#', $tanggal);
			$this->doccy->phpdocx->assign('#4#', $nama);
			$this->doccy->phpdocx->assign('#5#', '.............................................');
			$this->doccy->phpdocx->assign('#6#', '.............................................');
			$this->doccy->phpdocx->assign('#7#', '.............................................');
			$this->doccy->phpdocx->assign('#8#', '........:........');
			$this->doccy->phpdocx->assign('#9#', '.............................................');
			$this->doccy->phpdocx->assign('#10#', '.............................................');
			$this->renderDocx("Berita Acara Penjelasan.docx", true);
		}
		else if ($Dok->nama_dokumen == "Berita Acara Evaluasi Penawaran"){
			
			$this->doccy->newFile('baevaluasi1.docx');
			
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
			$this->renderDocx("Berita Acara Evaluasi Penawaran.docx", true);
		}
		else if ($Dok->nama_dokumen == "Berita Acara Negosiasi Klarifikasi"){
			
			$this->doccy->newFile('bakn.docx');
			
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
			$this->renderDocx("Berita Acara Negosiasi Klarifikasi.docx", true);
		}
		else if ($Dok->nama_dokumen == "Berita Acara Pembukaan Penawaran"){
			
			$this->doccy->newFile('bapembukaan1.docx');
			
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
			$this->renderDocx("Berita Acara Pembukaan Penawaran.docx", true);
		}
//	=====================================Daftar Hadir=====================================
		else if (($Dok->nama_dokumen == "Daftar Hadir Aanwijzing")
		or($Dok->nama_dokumen == "Daftar Hadir Evaluasi Penawaran")
		or($Dok->nama_dokumen == "Daftar Hadir Negosiasi Klarifikasi")
		or($Dok->nama_dokumen == "Daftar Hadir Pembukaan Penawaran")
		or($Dok->nama_dokumen == "Daftar Hadir Prakualifikasi")){
						
			$this->doccy->newFile('daftarhadir.docx');
			
			$this->doccy->phpdocx->assignToHeader("#HEADER1#",""); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#",""); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#1#', '.............................................');
			$this->doccy->phpdocx->assign('#2#', '.............................................');
			$this->doccy->phpdocx->assign('#3#', '.............................................');
			$this->doccy->phpdocx->assign('#4#', '.............................................');
			$this->doccy->phpdocx->assign('#5#', '.............................................');
			$this->renderDocx("Daftar Hadir.docx", true);
		}
	}
}
?>