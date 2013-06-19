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
			$this->doccy->phpdocx->assignToHeader("#HEADER1#","Test1"); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#","Test2"); // basic field mapping to footer
			
			if ($dari == "KDIVMUM"){$tembusan = "MS-DAF";}
			else {$tembusan = "KDIVMUM";}
			
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
			$this->renderDocx("Nota Dinas Perintah Pengadaan.docx", true); // use $forceDownload=false in order to (just) store file in the outputPath folder.
		}
		else if ($Dok->nama_dokumen == "Nota Dinas Usulan Pemenang"){
			
			
			$this->doccy->newFile('ndusulanpemenang.docx');
			$this->doccy->phpdocx->assignToHeader("#HEADER1#","Test1"); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#","Test2"); // basic field mapping to footer
			
			
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
			$this->doccy->phpdocx->assign('#18#', '.............................................');
	
		}
		else if ($Dok->nama_dokumen == "Nota Dinas Penetapan Pemenang"){
			
			
			$this->doccy->newFile('ndpenetapanpemenang.docx');
			$this->doccy->phpdocx->assignToHeader("#HEADER1#","Test1"); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#","Test2"); // basic field mapping to footer
			
			
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
			$this->doccy->phpdocx->assign('#18#', '.............................................');
		}
		else if ($Dok->nama_dokumen == "Nota Dinas Pemberitahuan Pemenang"){
			
			
			$this->doccy->newFile('ndpemberitahuanpemenang.docx');
			$this->doccy->phpdocx->assignToHeader("#HEADER1#","Test1"); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#","Test2"); // basic field mapping to footer
			
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
			$this->doccy->phpdocx->assign('#18#', '.............................................');
		}
//	=====================================Surat-Surat=====================================
		else if ($Dok->nama_dokumen == "Surat Undangan Pengambilan Dokumen Pengadaan"){
			
			
			$this->doccy->newFile('UPDP.docx');
			$this->doccy->phpdocx->assignToHeader("#HEADER1#","Test1"); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#","Test2"); // basic field mapping to footer
			
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
			$this->doccy->phpdocx->assign('#18#', '.............................................');
		}
		else if ($Dok->nama_dokumen == "Surat Undangan Pembukaan Penawaran"){
			
			
			$this->doccy->newFile('--.docx');
			$this->doccy->phpdocx->assignToHeader("#HEADER1#","Test1"); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#","Test2"); // basic field mapping to footer
			
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
			$this->doccy->phpdocx->assign('#18#', '.............................................');
		}
		else if ($Dok->nama_dokumen == "Surat Undangan Negsiasi dan Klarifikasi"){
			
			
			$this->doccy->newFile('notadinas.docx');
			$this->doccy->phpdocx->assignToHeader("#HEADER1#","Test1"); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#","Test2"); // basic field mapping to footer
			
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
			$this->doccy->phpdocx->assign('#18#', '.............................................');
		}
		else if ($Dok->nama_dokumen == "Surat Undangan Aanwijzing") {
			$SUP=SuratUndanganPenjelasan::model()->findByPk($id);
			$nomor = $SUP->nomor;
			$tanggal = $SUP->tanggal_undangan;
			$waktu = $SUP->waktu;
			$tempat = $SUP->tempat;
			$nama = $Peng->nama_pengadaan;
			$perihal = $SUP->perihal;
			
		
			$this->doccy->newFile('SUP.docx');
			$this->doccy->phpdocx->assignToHeader("#HEADER1#","Test1");
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#","Test2");
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
			
			
			$this->doccy->newFile('SPM.docx');
			$this->doccy->phpdocx->assignToHeader("#HEADER1#","Test1"); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#","Test2"); // basic field mapping to footer
			
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
			$this->doccy->phpdocx->assign('#18#', '.............................................');
		}
		else if ($Dok->nama_dokumen == "Surat Pemberitahuan Pengadaan"){
			
			
			$this->doccy->newFile('spp.docx');
			$this->doccy->phpdocx->assignToHeader("#HEADER1#","Test1"); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#","Test2"); // basic field mapping to footer
			
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
			$this->doccy->phpdocx->assign('#18#', '.............................................');
		}
//	=====================================Pakta Integritas=====================================
		else if ($Dok->nama_dokumen == "Pakta Integritas Panitia 1"){
			
			
			$this->doccy->newFile('PIPanitia.docx');
			$this->doccy->phpdocx->assignToHeader("#HEADER1#","Test1"); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#","Test2"); // basic field mapping to footer
			
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
			$this->doccy->phpdocx->assign('#18#', '.............................................');
		}
		else if ($Dok->nama_dokumen == "Pakta Integritas Penyedia"){
			
			
			$this->doccy->newFile('PIPeserta.docx');
			$this->doccy->phpdocx->assignToHeader("#HEADER1#","Test1"); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#","Test2"); // basic field mapping to footer
			
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
			$this->doccy->phpdocx->assign('#18#', '.............................................');
		}
//	=====================================RKS=====================================
		else if ($Dok->nama_dokumen == "RKS"){
			
			
			$this->doccy->newFile('notadinas.docx');
			$this->doccy->phpdocx->assignToHeader("#HEADER1#","Test1"); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#","Test2"); // basic field mapping to footer
			
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
			$this->doccy->phpdocx->assign('#18#', '.............................................');
		}
//	=====================================Berita Acara=====================================
		else if ($Dok->nama_dokumen == "Berita Acara Aanwijzing"){
			
			
			$this->doccy->newFile('bapenjelasan.docx');
			$this->doccy->phpdocx->assignToHeader("#HEADER1#","Test1"); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#","Test2"); // basic field mapping to footer
			
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
			$this->doccy->phpdocx->assign('#18#', '.............................................');
		}
		else if ($Dok->nama_dokumen == "Berita Acara Evaluasi Penawaran"){
			
			
			$this->doccy->newFile('baevaluasi1.docx');
			$this->doccy->phpdocx->assignToHeader("#HEADER1#","Test1"); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#","Test2"); // basic field mapping to footer
			
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
			$this->doccy->phpdocx->assign('#18#', '.............................................');
		}
		else if ($Dok->nama_dokumen == "Berita Acara Negosiasi Klarifikasi"){
			
			
			$this->doccy->newFile('bakn.docx');
			$this->doccy->phpdocx->assignToHeader("#HEADER1#","Test1"); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#","Test2"); // basic field mapping to footer
			
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
			$this->doccy->phpdocx->assign('#18#', '.............................................');
		}
		else if ($Dok->nama_dokumen == "Berita Acara Pembukaan Penawaran"){
			
			
			$this->doccy->newFile('bapembukaan1.docx');
			$this->doccy->phpdocx->assignToHeader("#HEADER1#","Test1"); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#","Test2"); // basic field mapping to footer
			
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
			$this->doccy->phpdocx->assign('#18#', '.............................................');
		}
//	=====================================Dokumen=====================================
		else if ($Dok->nama_dokumen == "Dokumen Penawaran"){
			
			$this->doccy->newFile('--.docx');
			$this->doccy->phpdocx->assignToHeader("#HEADER1#","Test1"); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#","Test2"); // basic field mapping to footer
			
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
			$this->doccy->phpdocx->assign('#18#', '.............................................');
		}
//	=====================================Daftar Hadir=====================================
		else if (($Dok->nama_dokumen == "Daftar Hadir Aanwijzing")
		or($Dok->nama_dokumen == "Daftar Hadir Evaluasi Penawaran")
		or($Dok->nama_dokumen == "Daftar Hadir Negosiasi Klarifikasi")
		or($Dok->nama_dokumen == "Daftar Hadir Pembukaan Penawaran")
		or($Dok->nama_dokumen == "Daftar Hadir Prakualifikasi")){
						
			$this->doccy->newFile('daftarhadir.docx');
			$this->doccy->phpdocx->assignToHeader("#HEADER1#","Test1"); // basic field mapping to header
			$this->doccy->phpdocx->assignToFooter("#FOOTER1#","Test2"); // basic field mapping to footer
			
			$this->doccy->phpdocx->assign('#1#', '.............................................');
			$this->doccy->phpdocx->assign('#2#', '.............................................');
			$this->doccy->phpdocx->assign('#3#', '.............................................');
			$this->doccy->phpdocx->assign('#4#', '.............................................');
			$this->doccy->phpdocx->assign('#5#', '.............................................');
			
		}
			
		$this->render('download');
	}
}
?>