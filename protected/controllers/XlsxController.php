<?php
	
class XlsxController extends Controller
{

	public function actionDownloadRks()
	{
		$id= Yii::app()->getRequest()->getQuery('id');
		$crincian = RincianRks::model()->findByPk($id);
		$crks = Rks::model()->findByPk($crincian->id_dokumen);
		$cdokumen = Dokumen::model()->findByPk($crincian->id_dokumen);
		$cpengadaan = Pengadaan::model()->findByPk($cdokumen->id_pengadaan);
		$templatePath = $_SERVER["DOCUMENT_ROOT"] . Yii::app()->request->baseUrl . '/templates/';
		$objPHPExcel = new PHPExcel;
		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		if ($cpengadaan->metode_pengadaan == 'Penunjukan Langsung' || $cpengadaan->metode_pengadaan == 'Pemilihan Langsung' || $cpengadaan->metode_pengadaan == 'Pelelangan') {
			if ($crks->tipe_rks == 1) {
				if ($crincian->nama_rincian == 'Lampiran 2') {
					$objPHPExcel = $objReader->load($templatePath . 'PL-B-Lamp_2.xlsx');
					$this->assign($objPHPExcel, "#nomor#", $crks->nomor);
					$this->assign($objPHPExcel, "#tanggal#", Tanggal::getTanggalLengkap0($cdokumen->tanggal));
					$this->assign($objPHPExcel, "#namapengadaan#", strtoupper($cpengadaan->nama_pengadaan));
					ob_end_clean();
					ob_start();
					header('Content-Disposition: attachment;filename="RKS-PL-B-Lamp_2.xlsx"');
				} else if ($crincian->nama_rincian == 'Lampiran 3') {
					$objPHPExcel = $objReader->load($templatePath . 'PL-B-Lamp_3.xlsx');
					$this->assign($objPHPExcel, "#nomor#", $crks->nomor);
					$this->assign($objPHPExcel, "#tanggal#", Tanggal::getTanggalLengkap0($cdokumen->tanggal));
					$this->assign($objPHPExcel, "#namapengadaan#", strtoupper($cpengadaan->nama_pengadaan));
					ob_end_clean();
					ob_start();
					header('Content-Disposition: attachment;filename="RKS-PL-B-Lamp_3.xlsx"');
				} else if ($crincian->nama_rincian == 'Lampiran 6') {
					$objPHPExcel = $objReader->load($templatePath . 'PL-B-Lamp_6.xlsx');
					ob_end_clean();
					ob_start();
					header('Content-Disposition: attachment;filename="RKS-PL-B-Lamp_6.xlsx"');
				} else if ($crincian->nama_rincian == 'Lampiran ba') {
					$objPHPExcel = $objReader->load($templatePath . 'PL-B-Lamp_ba.xlsx');
					$this->assign($objPHPExcel, "#nomor#", $crks->nomor);
					$this->assign($objPHPExcel, "#tanggal#", Tanggal::getTanggalLengkap0($cdokumen->tanggal));
					ob_end_clean();
					ob_start();
					header('Content-Disposition: attachment;filename="RKS-PL-B-Lamp_BA.xlsx"');
				}
			} else if ($crks->tipe_rks == 2) {
				if ($crincian->nama_rincian == 'Lampiran 2') {
					$objPHPExcel = $objReader->load($templatePath . 'PL-BJ-Lamp_2.xlsx');
					$this->assign($objPHPExcel, "#nomor#", strtoupper($crks->nomor));
					$this->assign($objPHPExcel, "#tanggal#", strtoupper(Tanggal::getTanggalLengkap0($cdokumen->tanggal)));
					$this->assign($objPHPExcel, "#namapengadaan#", strtoupper($cpengadaan->nama_pengadaan));
					ob_end_clean();
					ob_start();
					header('Content-Disposition: attachment;filename="RKS-PL-BJ-Lamp_2.xlsx"');
				} else if ($crincian->nama_rincian == 'Lampiran 3') {
					$objPHPExcel = $objReader->load($templatePath . 'PL-BJ-Lamp_3.xlsx');
					$this->assign($objPHPExcel, "#nomor#", $crks->nomor);
					$this->assign($objPHPExcel, "#tanggal#", Tanggal::getTanggalLengkap0($cdokumen->tanggal));
					$this->assign($objPHPExcel, "#namapengadaan#", strtoupper($cpengadaan->nama_pengadaan));
					ob_end_clean();
					ob_start();
					header('Content-Disposition: attachment;filename="RKS-PL-BJ-Lamp_3.xlsx"');
				} else if ($crincian->nama_rincian == 'Lampiran 5') {
					$objPHPExcel = $objReader->load($templatePath . 'PL-BJ-Lamp_5.xlsx');
					ob_end_clean();
					ob_start();
					header('Content-Disposition: attachment;filename="RKS-PL-BJ-Lamp_5.xlsx"');
				} else if ($crincian->nama_rincian == 'Lampiran ba') {
					$objPHPExcel = $objReader->load($templatePath . 'PL-BJ-Lamp_ba.xlsx');
					$this->assign($objPHPExcel, "#nomor#", $crks->nomor);
					$this->assign($objPHPExcel, "#tanggal#", Tanggal::getTanggalLengkap0($cdokumen->tanggal));
					ob_end_clean();
					ob_start();
					header('Content-Disposition: attachment;filename="RKS-PL-BJ-Lamp_BA.xlsx"');
				}
			} else {
				if ($crincian->nama_rincian == 'Lampiran 2') {
					$objPHPExcel = $objReader->load($templatePath . 'PL-J-Lamp_2.xlsx');
					$this->assign($objPHPExcel, "#nomor#", $crks->nomor);
					$this->assign($objPHPExcel, "#tanggal#", Tanggal::getTanggalLengkap0($cdokumen->tanggal));
					$this->assign($objPHPExcel, "#namapengadaan#", strtoupper($cpengadaan->nama_pengadaan));
					ob_end_clean();
					ob_start();
					header('Content-Disposition: attachment;filename="RKS-PL-J-Lamp_2.xlsx"');
				} else if ($crincian->nama_rincian == 'Lampiran 3') {
					$objPHPExcel = $objReader->load($templatePath . 'PL-J-Lamp_3.xlsx');
					$this->assign($objPHPExcel, "#nomor#", $crks->nomor);
					$this->assign($objPHPExcel, "#tanggal#", Tanggal::getTanggalLengkap0($cdokumen->tanggal));
					$this->assign($objPHPExcel, "#namapengadaan#", strtoupper($cpengadaan->nama_pengadaan));	
					ob_end_clean();
					ob_start();
					header('Content-Disposition: attachment;filename="RKS-PL-J-Lamp_3.xlsx"');
				} else if ($crincian->nama_rincian == 'Lampiran 5') {
					$objPHPExcel = $objReader->load($templatePath . 'PL-J-Lamp_5.xlsx');
					ob_end_clean();
					ob_start();
					header('Content-Disposition: attachment;filename="RKS-PL-J-Lamp_5.xlsx"');
				}
			}
		}
		header('Content-Type: application/vnd.ms-excel');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
	}

	public function actionDownload()
	{
		$id= Yii::app()->getRequest()->getQuery('id');
		$cdokumen = Dokumen::model()->findByPk($id);
		$cpengadaan = Pengadaan::model()->findByPk($cdokumen->id_pengadaan);
		$tgl = $cdokumen->tanggal;
		$tanggal = Tanggal::getTanggalLengkap($tgl);
		$hari = Tanggal::getHari($tgl);
		$bulan = Tanggal::getBulanA($tgl);
		$tahun = RupiahMaker::TerbilangMaker(Tanggal::getTahun($tgl));
		$tgllengkap = Tanggal::getTanggalLengkap($tgl);
		$dokrks=Dokumen::model()->find('id_pengadaan = '. $cdokumen->id_pengadaan . ' and nama_dokumen = "RKS"');
		$rks=Rks::model()->findByPk($dokrks->id_dokumen);	
		$norks = $rks->nomor;
		$tanggalrks = Tanggal::getTanggalLengkap(Dokumen::model()->find($rks->id_dokumen)->tanggal);
		$skpanitia = Panitia::model()->findByPk($cpengadaan->id_panitia)->SK_panitia;
		$panitia = Panitia::model()->findByPk($cpengadaan->id_panitia)->nama_panitia;
		$jenis = $cpengadaan->jenis_pengadaan;
		$namakadiv = User::model()->findByPk(kdivmum::model()->find('jabatan = "KDIVMUM"')->username)->nama;
		
		$templatePath = $_SERVER["DOCUMENT_ROOT"] . Yii::app()->request->baseUrl . '/templates/';
		$objPHPExcel = new PHPExcel;
		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		if ($cdokumen->nama_dokumen == 'HPS') {
			if (($jenis == 'Barang dan Jasa') || ($jenis == 'Barang')){
			$objPHPExcel = $objReader->load($templatePath . 'HPS Barang.xlsx');
					$this->assign($objPHPExcel, "#tgllengkap#", $tgllengkap);
					$this->assign($objPHPExcel, "#namakadiv#", $namakadiv);
					//$this->assign($objPHPExcel, "#ketua#", $ketua);
					$this->assign($objPHPExcel, "#namapengadaan#", strtoupper($cpengadaan->nama_pengadaan));	
			ob_end_clean();
			ob_start();
			header('Content-Disposition: attachment;filename="HPS Barang.xlsx"');
			}
			else if ($jenis == 'Jasa'){
			$objPHPExcel = $objReader->load($templatePath . 'HPS Jasa.xlsx');
					$this->assign($objPHPExcel, "#tgllengkap#", $tgllengkap);
					$this->assign($objPHPExcel, "#namakadiv#", $namakadiv);
					$this->assign($objPHPExcel, "#panitia#", $panitia);
					$this->assign($objPHPExcel, "#namapengadaan#", strtoupper($cpengadaan->nama_pengadaan));	
			ob_end_clean();
			ob_start();
			header('Content-Disposition: attachment;filename="HPS Jasa.xlsx"');
			}
		}
		else if($cdokumen->nama_dokumen == 'Berita Acara Pembukaan Penawaran Sampul Satu') {
			$objPHPExcel = $objReader->load($templatePath . '10.a-Lam BA PEMBUKAAN 1 Sampul.xlsx');
					$this->assign($objPHPExcel, "#tgllengkap#", $tgllengkap);
					$this->assign($objPHPExcel, "#hari#", $hari);
					$this->assign($objPHPExcel, "#tanggal#", $tanggal);
					$this->assign($objPHPExcel, "#bulan#", $bulan);
					$this->assign($objPHPExcel, "#tahun#", $tahun);
					$this->assign($objPHPExcel, "#nosk#", $skpanitia);
					$this->assign($objPHPExcel, "#panitia#", $panitia);
					$this->assign($objPHPExcel, "#namapengadaan#", strtoupper($cpengadaan->nama_pengadaan));	
			ob_end_clean();
			ob_start();
			header('Content-Disposition: attachment;filename="10.a-Lam BA PEMBUKAAN 1 Sampul.xlsx"');
		}
		else if($cdokumen->nama_dokumen == 'Berita Acara Pembukaan Penawaran Sampul Dua') {
			$objPHPExcel = $objReader->load($templatePath . '13.a-Lam BA Pembukaan 2 SAMPUL.xlsx');
					$this->assign($objPHPExcel, "#tgllengkap#", $tgllengkap);
					$this->assign($objPHPExcel, "#hari#", $hari);
					$this->assign($objPHPExcel, "#tanggal#", $tanggal);
					$this->assign($objPHPExcel, "#bulan#", $bulan);
					$this->assign($objPHPExcel, "#tahun#", $tahun);
					$this->assign($objPHPExcel, "#nosk#", $skpanitia);
					$this->assign($objPHPExcel, "#panitia#", $panitia);
					$this->assign($objPHPExcel, "#namapengadaan#", strtoupper($cpengadaan->nama_pengadaan));	
			ob_end_clean();
			ob_start();
			header('Content-Disposition: attachment;filename="13.a-Lam BA Pembukaan 2 SAMPUL.xlsx"');
		}
		else if ($cdokumen->nama_dokumen == 'Berita Acara Evaluasi Penawaran Sampul Satu') {
			$objPHPExcel = $objReader->load($templatePath . '15.a-Lam BA Evaluasi  1 Sampul.xlsx');
				
				$BAEP=BeritaAcaraEvaluasiPenawaran::model()->findByPk($id);	
				$nomor = $BAEP->nomor;
			
					$this->assign($objPHPExcel, "#tgllengkap#", $tgllengkap);
					$this->assign($objPHPExcel, "#hari#", $hari);
					$this->assign($objPHPExcel, "#tanggal#", $tanggal);
					$this->assign($objPHPExcel, "#bulan#", $bulan);
					$this->assign($objPHPExcel, "#tahun#", $tahun);
					$this->assign($objPHPExcel, "#nosk#", $skpanitia);
					$this->assign($objPHPExcel, "#nomor#", $nomor);
					$this->assign($objPHPExcel, "#panitia#", $panitia);
					$this->assign($objPHPExcel, "#namapengadaan#", strtoupper($cpengadaan->nama_pengadaan));	
			ob_end_clean();
			ob_start();
			header('Content-Disposition: attachment;filename="15.a-Lam BA Evaluasi  1 Sampul.xlsx"');
		}
		else if ($cdokumen->nama_dokumen == 'Berita Acara Evaluasi Penawaran Sampul Dua') {
			$objPHPExcel = $objReader->load($templatePath . '16.a-Lam BA Evaluasi 2 SAMPUL.xlsx');
					$this->assign($objPHPExcel, "#tgllengkap#", $tgllengkap);
					$this->assign($objPHPExcel, "#hari#", $hari);
					$this->assign($objPHPExcel, "#tanggal#", $tanggal);
					$this->assign($objPHPExcel, "#bulan#", $bulan);
					$this->assign($objPHPExcel, "#tahun#", $tahun);
					$this->assign($objPHPExcel, "#nosk#", $skpanitia);
					$this->assign($objPHPExcel, "#panitia#", $panitia);
					$this->assign($objPHPExcel, "#namapengadaan#", strtoupper($cpengadaan->nama_pengadaan));	
			ob_end_clean();
			ob_start();
			header('Content-Disposition: attachment;filename="16.a-Lam BA Evaluasi 2 SAMPUL.xlsx"');
		}
		else if ($cdokumen->nama_dokumen == 'Berita Acara Evaluasi Penawaran') {
			$objPHPExcel = $objReader->load($templatePath . '16-Lam BA Evaluasi 2 Sampul Sd Edited, SistemBobot.xlsx');
					$this->assign($objPHPExcel, "#tgllengkap#", $tgllengkap);
					$this->assign($objPHPExcel, "#hari#", $hari);
					$this->assign($objPHPExcel, "#tanggal#", $tanggal);
					$this->assign($objPHPExcel, "#bulan#", $bulan);
					$this->assign($objPHPExcel, "#tahun#", $tahun);
					$this->assign($objPHPExcel, "#nosk#", $skpanitia);
					$this->assign($objPHPExcel, "#panitia#", $panitia);
					$this->assign($objPHPExcel, "#namapengadaan#", strtoupper($cpengadaan->nama_pengadaan));	
			ob_end_clean();
			ob_start();
			header('Content-Disposition: attachment;filename="16-Lam BA Evaluasi 2 Sampul Sd Edited, SistemBobot.xlsx"');
		}
		else{
			$objPHPExcel = $objReader->load($templatePath . '10.a-Lam BA PEMBUKAAN 1 Sampul.xlsx');
					$this->assign($objPHPExcel, "#hari#", $hari);
					$this->assign($objPHPExcel, "#tanggal#", $tanggal);
					$this->assign($objPHPExcel, "#bulan#", $bulan);
					$this->assign($objPHPExcel, "#tahun#", $tahun);
					$this->assign($objPHPExcel, "#tgllengkap#", $tgllengkap);
					$this->assign($objPHPExcel, "#nosk#", $skpanitia);
					$this->assign($objPHPExcel, "#panitia#", $panitia);
					$this->assign($objPHPExcel, "#namapengadaan#", strtoupper($cpengadaan->nama_pengadaan));	
			ob_end_clean();
			ob_start();
			header('Content-Disposition: attachment;filename="10.a-Lam BA PEMBUKAAN 1 Sampul.xlsx"');
		}
		
		
		header('Content-Type: application/vnd.ms-excel');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
	}

	// function getListPanitiaTanpaKetua($idPan){
		// if(Panitia::model()->findByPk($idPan)->jenis_panitia == "Pejabat"){
			// $list = "";
		// }else{
			// $list = "1. " . User::model()->findByPk(Anggota::model()->find('id_panitia = ' . $idPan . ' and jabatan = "Sekretaris"')->username)->nama;
			// $n = (Panitia::model()->findByPk($idPan)->jumlah_anggota)-2;
			// for ( $i=1;$i<=$n;$i++){
				// $list .= '<w:br/>';
				// $list .= $i+1 . ". " . User::model()->findByPk(Anggota::model()->find('id_panitia = ' . $idPan . ' and jabatan = "Anggota' . $i . '"')->username)->nama;				
			// }
		// }
		// return  $list;
	// }

	// function getListPanitia($idPan){
		// if(Panitia::model()->findByPk($idPan)->jenis_panitia == "Pejabat"){
			// $list = "";
		// }else{
			// $list = "1. " . User::model()->findByPk(Anggota::model()->find('id_panitia = ' . $idPan . ' and jabatan = "Ketua"')->username)->nama . "																			Ketua								(.................................)";
			// $list .= '<w:br/>';
			// $list .= '<w:br/>';
			// $list .= "2. " . User::model()->findByPk(Anggota::model()->find('id_panitia = ' . $idPan . ' and jabatan = "Sekretaris"')->username)->nama . "																	Sekretaris								(.................................)";
			// $n = (Panitia::model()->findByPk($idPan)->jumlah_anggota)-2;
			// for ( $i=1;$i<=$n;$i++){
				// $list .= '<w:br/>';
				// $list .= '<w:br/>';
				// $list .= $i+2 . ". " . User::model()->findByPk(Anggota::model()->find('id_panitia = ' . $idPan . ' and jabatan = "Anggota' . $i . '"')->username)->nama . "																	Anggota								(.................................)";				
			// }
		// }
		// return  $list;
	// }
	
	private function assign($objPHPExcel, $pattern, $replacement){
		$sheets = $objPHPExcel->getAllSheets();
		foreach ($sheets as $sheet) {
			foreach ($sheet->getRowIterator() as $row) {
				foreach ($row->getCellIterator() as $cell) {
					if (strpos($cell->getValue(), $pattern) !== false) {
						$cell->setValue(str_replace($pattern, $replacement, $cell->getValue()));
					}
				}
			}
		}
	}
}
?>