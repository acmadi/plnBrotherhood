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
			
			if ($dari == "KDIVMUM"){
				$tembusan = "MS-DAF";
			} else {$tembusan = "KDIVMUM";}
			
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
			$this->doccy->phpdocx->assign('#targetspk#', '');
			$this->doccy->phpdocx->assign('#perihal#', $perihal);
			$this->doccy->phpdocx->assign('#hari#', '');
			$this->doccy->phpdocx->assign('#targetspk#', '');
			$this->doccy->phpdocx->assign('#nama#', $nama);
			$this->doccy->phpdocx->assign('#waktu#', $waktu);
			$this->doccy->phpdocx->assign('#tempat#', $tempat);
			$this->renderDocx("Surat Undangan Penjelasan.docx", true);

		}
		else if ($Dok->nama_dokumen == "Nota Dinas Permintaan"){
			$NDP = NotaDinasPermintaan::model()->findByPk($id);
			
		}
		
		
		
		
		
		$this->render('download');
	}
}
?>