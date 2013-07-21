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
				if ($crincian->nama_rincian == 'Lampiran 2') {
					$objPHPExcel = $objReader->load($templatePath . 'Lamp 2.xlsx');
					
					$metode_pengadaan = $cpengadaan->metode_pengadaan;
					
					$this->assign($objPHPExcel, "#nomor#", $crks->nomor);
					$this->assign($objPHPExcel, "#tanggal#", Tanggal::getTanggalLengkap0($cdokumen->tanggal));
					$this->assign($objPHPExcel, "#tahun#", Tanggal::getTahun($cdokumen->tanggal));
					$this->assign($objPHPExcel, "#metodepengadaan#", strtoupper($metode_pengadaan));
					$this->assign($objPHPExcel, "#namapengadaan#", strtoupper($cpengadaan->nama_pengadaan));
					header('Content-Disposition: attachment;filename="Lamp 2.xlsx"');
				}
				else if ($crincian->nama_rincian == 'Lampiran 3') {
					$objPHPExcel = $objReader->load($templatePath . 'Lamp 3.xlsx');
					$metode_pengadaan = $cpengadaan->metode_pengadaan;
					$this->assign($objPHPExcel, "#nomor#", $crks->nomor);
					$this->assign($objPHPExcel, "#tanggal#", Tanggal::getTanggalLengkap0($cdokumen->tanggal));
					$this->assign($objPHPExcel, "#namapengadaan#", strtoupper($cpengadaan->nama_pengadaan));
					$this->assign($objPHPExcel, "#tahun#", Tanggal::getTahun($cdokumen->tanggal));
					$this->assign($objPHPExcel, "#metodepengadaan#", strtoupper($metode_pengadaan));
					$this->assign($objPHPExcel, "#namapengadaan#", strtoupper($cpengadaan->nama_pengadaan));
					header('Content-Disposition: attachment;filename="Lamp 3.xlsx"');
				}
				else if ($crincian->nama_rincian == 'Lampiran 6') {
					$objPHPExcel = $objReader->load($templatePath . 'Lamp 6.xlsx');
					$metode_pengadaan = $cpengadaan->metode_pengadaan;
					$this->assign($objPHPExcel, "#tahun#", Tanggal::getTahun($cdokumen->tanggal));
					header('Content-Disposition: attachment;filename="Lamp 6.xlsx"');
				}
				else if ($crincian->nama_rincian == 'Lampiran ba') {
					$objPHPExcel = $objReader->load($templatePath . 'PL-B-Lamp_ba.xlsx');
					$metode_pengadaan = $cpengadaan->metode_pengadaan;
					$this->assign($objPHPExcel, "#nomor#", $crks->nomor);
					$this->assign($objPHPExcel, "#tanggal#", Tanggal::getTanggalLengkap0($cdokumen->tanggal));
					$this->assign($objPHPExcel, "#tahun#", Tanggal::getTahun($cdokumen->tanggal));
					$this->assign($objPHPExcel, "#metodepengadaan#", strtoupper($metode_pengadaan));
					$this->assign($objPHPExcel, "#namapengadaan#", strtoupper($cpengadaan->nama_pengadaan));
					header('Content-Disposition: attachment;filename="RKS-PL-B-Lamp_BA.xlsx"');
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
		$tanggal = Tanggal::getTanggal($tgl);
		$hari = Tanggal::getHari($tgl);
		$bulan = Tanggal::getBulanA($tgl);
		$tahun = RupiahMaker::TerbilangMaker(Tanggal::getTahun($tgl));
		$tgllengkap = Tanggal::getTanggalLengkap($tgl);
		$dokrks=Dokumen::model()->find('id_pengadaan = '. $cdokumen->id_pengadaan . ' and nama_dokumen = "RKS"');
		$rks=Rks::model()->findByPk($dokrks->id_dokumen);	
		$norks = $rks->nomor;
		$tanggalrks = Tanggal::getTanggalLengkap(Dokumen::model()->find($rks->id_dokumen)->tanggal);
		$skpanitia = Panitia::model()->findByPk($cpengadaan->id_panitia)->SK_panitia;
		$panitia = Panitia::model()->findByPk($cpengadaan->id_panitia);
		if($panitia->jenis_panitia=="Pejabat") { 
			$nama_panitia = "Pejabat";
			$kalimat_panitia = "";
		} else { 
			$nama_panitia = $panitia->nama_panitia;
			$kalimat_panitia = "yang dibentuk sesuai Surat Keputusan Direksi Nomor : ".$skpanitia." tanggal ".Tanggal::getTanggalLengkap($panitia->tanggal_sk);
		}
		$jenis = $cpengadaan->jenis_pengadaan;
		$DokNDPP=Dokumen::model()->find('id_pengadaan = '.$cpengadaan->id_pengadaan.' and nama_dokumen = "Nota Dinas Perintah Pengadaan"');
		$NDPP=NotaDinasPerintahPengadaan::model()->findByPk($DokNDPP->id_dokumen);
		$pengesah = strtoupper(Jabatan::model()->findByPk($NDPP->dari)->kepanjangan);
		$nama_pengesah = Kdivmum::model()->find('id_jabatan = '.$NDPP->dari.' and status_user = "Aktif"')->nama;
		
		$dokpq=Dokumen::model()->find('id_pengadaan = '. $cdokumen->id_pengadaan . ' and nama_dokumen = "Dokumen Prakualifikasi"');
		if($dokpq!=null){
			$DPK=DokumenPrakualifikasi::model()->findByPk($dokpq->id_dokumen);
		}
		
		$templatePath = $_SERVER["DOCUMENT_ROOT"] . Yii::app()->request->baseUrl . '/templates/';
		$objPHPExcel = new PHPExcel;
		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		if ($cdokumen->nama_dokumen == 'HPS') {
			if (($jenis == 'Barang dan Jasa') || ($jenis == 'Barang')){
			$objPHPExcel = $objReader->load($templatePath . 'HPS Barang.xlsx');
					$this->assign($objPHPExcel, "#tgllengkap#", $tgllengkap);
					$this->assign($objPHPExcel, "#namapanitia#", strtoupper($nama_panitia));
					$this->assign($objPHPExcel, "#pengesah#", $pengesah);
					$this->assign($objPHPExcel, "#namapengesah#", $nama_pengesah);
					$this->assign($objPHPExcel, "#namapengadaan#", strtoupper($cpengadaan->nama_pengadaan));
					$this->getListPanitiaTandaTangan($cpengadaan->id_panitia, "BoQ","E",34,$objPHPExcel);
			
			header('Content-Disposition: attachment;filename="HPS Barang-'.$cpengadaan->nama_pengadaan.'.xlsx"');
			}
			else if ($jenis == 'Jasa'){
			$objPHPExcel = $objReader->load($templatePath . 'HPS Jasa.xlsx');
					$this->assign($objPHPExcel, "#tgllengkap#", $tgllengkap);
					$this->assign($objPHPExcel, "#namapanitia#", $nama_panitia);
					$this->assign($objPHPExcel, "#pengesah#", $pengesah);
					$this->assign($objPHPExcel, "#namapengesah#", $nama_pengesah);
					$this->assign($objPHPExcel, "#namapengadaan#", strtoupper($cpengadaan->nama_pengadaan));	
			
			header('Content-Disposition: attachment;filename="HPS Jasa-'.$cpengadaan->nama_pengadaan.'.xlsx"');
			}
		}
		else if ($cdokumen->nama_dokumen == 'Berita Acara Penerimaan Prakualifikasi') {
		
			$BAPPQ = BeritaAcaraPenerimaanPq::model()->findByPk($cdokumen->id_dokumen);
			$objPHPExcel = $objReader->load($templatePath . 'BA Penerimaan Prakualifikasi.xlsx');
					$this->assign($objPHPExcel, "#tgldokprakualifikasi#", Tanggal::getTanggalLengkap($cdokumen->tanggal));
					$this->assign($objPHPExcel, "#nodokprakualifikasi#", $BAPPQ->nomor);
			
			header('Content-Disposition: attachment;filename="Berita Acara Penerimaan Prakualifikasi-'.$cpengadaan->nama_pengadaan.'.xlsx"');

		}
		else if($cdokumen->nama_dokumen == 'Lampiran Berita Acara Pembukaan Penawaran Sampul Satu') {
			$objPHPExcel = $objReader->load($templatePath . '10.a-Lam BA PEMBUKAAN 1 Sampul.xlsx');
					$this->assign($objPHPExcel, "#tgllengkap#", $tgllengkap);
					$this->assign($objPHPExcel, "#hari#", $hari);
					$this->assign($objPHPExcel, "#tanggal#", $tanggal);
					$this->assign($objPHPExcel, "#bulan#", $bulan);
					$this->assign($objPHPExcel, "#tahun#", $tahun);
					$this->assign($objPHPExcel, "#nosk#", $skpanitia);
					$this->assign($objPHPExcel, "#panitia#", $nama_panitia);
					$this->assign($objPHPExcel, "#namapengadaan#", strtoupper($cpengadaan->nama_pengadaan));	
			
			header('Content-Disposition: attachment;filename="Lampiran BA Pembukaan 1 Sampul-'.$cpengadaan->nama_pengadaan.'.xlsx"');
		}
		else if($cdokumen->nama_dokumen == 'Lampiran Berita Acara Pembukaan Penawaran Sampul Dua') {
			$objPHPExcel = $objReader->load($templatePath . '13.a-Lam BA Pembukaan 2 SAMPUL.xlsx');
					$this->assign($objPHPExcel, "#tgllengkap#", $tgllengkap);
					$this->assign($objPHPExcel, "#hari#", $hari);
					$this->assign($objPHPExcel, "#tanggal#", $tanggal);
					$this->assign($objPHPExcel, "#bulan#", $bulan);
					$this->assign($objPHPExcel, "#tahun#", $tahun);
					$this->assign($objPHPExcel, "#nosk#", $skpanitia);
					$this->assign($objPHPExcel, "#panitia#", $nama_panitia);
					$this->assign($objPHPExcel, "#namapengadaan#", strtoupper($cpengadaan->nama_pengadaan));	
			
			header('Content-Disposition: attachment;filename="Lampiran BA Pembukaan 2 Sampul-'.$cpengadaan->nama_pengadaan.'.xlsx"');
		}
		else if($cdokumen->nama_dokumen == 'Lampiran Berita Acara Pembukaan Penawaran') {
			$objPHPExcel = $objReader->load($templatePath . '10.a-Lam BA PEMBUKAAN 1 Sampul.xlsx');
					$this->assign($objPHPExcel, "#tgllengkap#", $tgllengkap);
					$this->assign($objPHPExcel, "#hari#", $hari);
					$this->assign($objPHPExcel, "#tanggal#", $tanggal);
					$this->assign($objPHPExcel, "#bulan#", $bulan);
					$this->assign($objPHPExcel, "#tahun#", $tahun);
					$this->assign($objPHPExcel, "#kalimatpanitia#", $kalimat_panitia);
					$this->assign($objPHPExcel, "#panitia#", $nama_panitia);
					$this->assign($objPHPExcel, "#namapengadaan#", strtoupper($cpengadaan->nama_pengadaan));	
			
			header('Content-Disposition: attachment;filename="Lampiran BA Pembukaan Penawaran - '.$cpengadaan->nama_pengadaan.'.xlsx"');
		}
		else if ($cdokumen->nama_dokumen == 'Lampiran Berita Acara Evaluasi Penawaran Sampul Satu') {
			$objPHPExcel = $objReader->load($templatePath . '15.a-Lam BA Evaluasi  1 Sampul.xlsx');
				
				$BAEP=BeritaAcaraEvaluasiPenawaran::model()->findByPk($id);	
				// $nomor = $BAEP->nomor;
			
					$this->assign($objPHPExcel, "#tgllengkap#", $tgllengkap);
					$this->assign($objPHPExcel, "#hari#", $hari);
					$this->assign($objPHPExcel, "#tanggal#", $tanggal);
					$this->assign($objPHPExcel, "#bulan#", $bulan);
					$this->assign($objPHPExcel, "#tahun#", $tahun);
					$this->assign($objPHPExcel, "#kalimatpanitia#", $kalimat_panitia);
					// $this->assign($objPHPExcel, "#nomor#", $nomor);
					$this->assign($objPHPExcel, "#panitia#", $nama_panitia);
					$this->assign($objPHPExcel, "#namapengadaan#", strtoupper($cpengadaan->nama_pengadaan));	
			
			header('Content-Disposition: attachment;filename="Lampiran BA Evaluasi 1 Sampul - '.$cpengadaan->nama_pengadaan.'.xlsx"');
		}
		else if ($cdokumen->nama_dokumen == 'Lampiran Berita Acara Evaluasi Penawaran Sampul Dua') {
			$objPHPExcel = $objReader->load($templatePath . '16.a-Lam BA Evaluasi 2 SAMPUL.xlsx');
					$this->assign($objPHPExcel, "#tgllengkap#", $tgllengkap);
					$this->assign($objPHPExcel, "#hari#", $hari);
					$this->assign($objPHPExcel, "#tanggal#", $tanggal);
					$this->assign($objPHPExcel, "#bulan#", $bulan);
					$this->assign($objPHPExcel, "#tahun#", $tahun);
					$this->assign($objPHPExcel, "#nosk#", $skpanitia);
					$this->assign($objPHPExcel, "#panitia#", $nama_panitia);
					$this->assign($objPHPExcel, "#namapengadaan#", strtoupper($cpengadaan->nama_pengadaan));	
			
			header('Content-Disposition: attachment;filename="Lampiran BA Evaluasi 2 Sampul-'.$cpengadaan->nama_pengadaan.'.xlsx"');
		}
		else if ($cdokumen->nama_dokumen == 'Lampiran Berita Acara Evaluasi Penawaran') {
			$objPHPExcel = $objReader->load($templatePath . '15.a-Lam BA Evaluasi  1 Sampul.xlsx');
					$this->assign($objPHPExcel, "#tgllengkap#", $tgllengkap);
					$this->assign($objPHPExcel, "#hari#", $hari);
					$this->assign($objPHPExcel, "#tanggal#", $tanggal);
					$this->assign($objPHPExcel, "#bulan#", $bulan);
					$this->assign($objPHPExcel, "#tahun#", $tahun);
					$this->assign($objPHPExcel, "#nosk#", $skpanitia);
					$this->assign($objPHPExcel, "#panitia#", $nama_panitia);
					$this->assign($objPHPExcel, "#namapengadaan#", strtoupper($cpengadaan->nama_pengadaan));	
			header('Content-Disposition: attachment;filename="Lampiran Berita Acara Evaluasi Penawaran.xlsx"');
		}
		else if ($cdokumen->nama_dokumen == 'Daftar Hadir Aanwijzing'||$cdokumen->nama_dokumen == 'Daftar Hadir Pembukaan Penawaran'||$cdokumen->nama_dokumen == 'Daftar Hadir Pembukaan Penawaran Sampul Satu'||$cdokumen->nama_dokumen == 'Daftar Hadir Pembukaan Penawaran Tahap Satu'||$cdokumen->nama_dokumen == 'Daftar Hadir Pembukaan Penawaran Sampul Dua'||$cdokumen->nama_dokumen == 'Daftar Hadir Pembukaan Penawaran Tahap Dua') {
			$DH=DaftarHadir::model()->findByPk($cdokumen->id_dokumen);
			$objPHPExcel = $objReader->load($templatePath . 'Daftar Hadir.xlsx');
					$this->assign($objPHPExcel, "#tanggal#", Tanggal::getTanggalLengkap($cdokumen->tanggal));
					$this->assign($objPHPExcel, "#hari#", Tanggal::getHari($cdokumen->tanggal));
					$this->assign($objPHPExcel, "#waktu#", $DH->jam);
					$this->assign($objPHPExcel, "#tempat#", $DH->tempat_hadir);
					$this->assign($objPHPExcel, "#acara#", $DH->acara." ".$cpengadaan->nama_pengadaan);
					$this->assign($objPHPExcel, "#namapengadaan#", $cpengadaan->nama_pengadaan);
					if ($cdokumen->nama_dokumen == 'Daftar Hadir Aanwijzing') {
						$this->getDaftarHadir($cpengadaan->id_panitia, $cdokumen->id_pengadaan, $objPHPExcel, 'ba_aanwijzing');
						header('Content-Disposition: attachment;filename="Daftar Hadir Aanwijzing - "'.$cpengadaan->nama_pengadaan.'".xlsx"');
					} else if ($cdokumen->nama_dokumen == 'Daftar Hadir Pembukaan Penawaran') {
						$this->getDaftarHadir($cpengadaan->id_panitia, $cdokumen->id_pengadaan, $objPHPExcel, 'hadir_pembukaan_penawaran_1');
						header('Content-Disposition: attachment;filename="Daftar Hadir Pembukaan Penawaran - "'.$cpengadaan->nama_pengadaan.'".xlsx"');
					} else if ($cdokumen->nama_dokumen == 'Daftar Hadir Pembukaan Penawaran Sampul Satu') {
						$this->getDaftarHadir($cpengadaan->id_panitia, $cdokumen->id_pengadaan, $objPHPExcel, 'hadir_pembukaan_penawaran_1');
						header('Content-Disposition: attachment;filename="Daftar Hadir Pembukaan Penawaran Sampul Satu - "'.$cpengadaan->nama_pengadaan.'".xlsx"');
					} else if ($cdokumen->nama_dokumen == 'Daftar Hadir Pembukaan Penawaran Tahap Satu') {
						$this->getDaftarHadir($cpengadaan->id_panitia, $cdokumen->id_pengadaan, $objPHPExcel, 'hadir_pembukaan_penawaran_1');
						header('Content-Disposition: attachment;filename="Daftar Hadir Pembukaan Penawaran Tahap Satu - "'.$cpengadaan->nama_pengadaan.'".xlsx"');
					} else if ($cdokumen->nama_dokumen == 'Daftar Hadir Pembukaan Penawaran Sampul Dua') {
						$this->getDaftarHadir($cpengadaan->id_panitia, $cdokumen->id_pengadaan, $objPHPExcel, 'hadir_pembukaan_penawaran_2');
						header('Content-Disposition: attachment;filename="Daftar Hadir Pembukaan Penawaran Sampul Dua - "'.$cpengadaan->nama_pengadaan.'".xlsx"');
					} else if ($cdokumen->nama_dokumen == 'Daftar Hadir Pembukaan Penawaran Tahap Dua') {
						$this->getDaftarHadir($cpengadaan->id_panitia, $cdokumen->id_pengadaan, $objPHPExcel, 'hadir_pembukaan_penawaran_2');
						header('Content-Disposition: attachment;filename="Daftar Hadir Pembukaan Penawaran Tahap Dua - "'.$cpengadaan->nama_pengadaan.'".xlsx"');
					}
		}
		else if ($cdokumen->nama_dokumen == 'Daftar Hadir Negosiasi dan Klarifikasi') {
			$DH=DaftarHadir::model()->findByPk($cdokumen->id_dokumen);
			$objPHPExcel = $objReader->load($templatePath . 'Daftar Hadir.xlsx');
					$this->assign($objPHPExcel, "#tanggal#", Tanggal::getTanggalLengkap($cdokumen->tanggal));
					$this->assign($objPHPExcel, "#hari#", Tanggal::getHari($cdokumen->tanggal));
					$this->assign($objPHPExcel, "#waktu#", $DH->jam);
					$this->assign($objPHPExcel, "#tempat#", $DH->tempat_hadir);
					$this->assign($objPHPExcel, "#acara#", $DH->acara." ".$cpengadaan->nama_pengadaan);
					$this->assign($objPHPExcel, "#namapengadaan#", $cpengadaan->nama_pengadaan);
					$this->getDaftarHadir($cpengadaan->id_panitia, $cdokumen->id_pengadaan, $objPHPExcel, 'hadir_klarifikasi_negosiasi');
					header('Content-Disposition: attachment;filename="Daftar Hadir Negosiasi dan Klarifikasi - "'.$cpengadaan->nama_pengadaan.'".xlsx"');
		}
		else if ($cdokumen->nama_dokumen == 'Daftar Hadir Penerimaan Prakualifikasi') {
			$DH=DaftarHadir::model()->findByPk($cdokumen->id_dokumen);
			$objPHPExcel = $objReader->load($templatePath . 'Daftar Hadir Prakualifikasi.xlsx');
					$this->assign($objPHPExcel, "#tanggal#", Tanggal::getTanggalLengkap($cdokumen->tanggal));
					$this->assign($objPHPExcel, "#hari#", Tanggal::getHari($cdokumen->tanggal));
					$this->assign($objPHPExcel, "#waktu#", Tanggal::getJamMenit($DH->jam));
					$this->assign($objPHPExcel, "#tempat#", $DH->tempat_hadir);
					$this->assign($objPHPExcel, "#acara#", $DH->acara." ".$cpengadaan->nama_pengadaan);
					$this->assign($objPHPExcel, "#namapengadaan#", $cpengadaan->nama_pengadaan);
			
			header('Content-Disposition: attachment;filename="Daftar Hadir Prakualifikasi-'.$cpengadaan->nama_pengadaan.'.xlsx"');

		}
		else if ($cdokumen->nama_dokumen == 'Daftar Hadir Evaluasi Penawaran'||$cdokumen->nama_dokumen == 'Daftar Hadir Evaluasi Penawaran Sampul Satu'||$cdokumen->nama_dokumen == 'Daftar Hadir Evaluasi Penawaran Tahap Satu'||$cdokumen->nama_dokumen == 'Daftar Hadir Evaluasi Penawaran Sampul Dua'||$cdokumen->nama_dokumen == 'Daftar Hadir Evaluasi Penawaran Tahap Dua') {
			$DH=DaftarHadir::model()->findByPk($cdokumen->id_dokumen);
			$objPHPExcel = $objReader->load($templatePath . 'Daftar Hadir.xlsx');
					$this->assign($objPHPExcel, "#tanggal#", Tanggal::getTanggalLengkap($cdokumen->tanggal));
					$this->assign($objPHPExcel, "#hari#", Tanggal::getHari($cdokumen->tanggal));
					$this->assign($objPHPExcel, "#waktu#", $DH->jam);
					$this->assign($objPHPExcel, "#tempat#", $DH->tempat_hadir);
					$this->assign($objPHPExcel, "#acara#", $DH->acara." ".$cpengadaan->nama_pengadaan);
					$this->assign($objPHPExcel, "#namapengadaan#", $cpengadaan->nama_pengadaan);
					if ($cdokumen->nama_dokumen == 'Daftar Hadir Evaluasi Penawaran') {
						$this->getDaftarHadirPanitia($cpengadaan->id_panitia, $objPHPExcel);
						header('Content-Disposition: attachment;filename="Daftar Hadir Evaluasi Penawaran - '.$cpengadaan->nama_pengadaan.'.xlsx"');
					} else if ($cdokumen->nama_dokumen == 'Daftar Hadir Evaluasi Penawaran Sampul Satu') {
						$this->getDaftarHadirPanitia($cpengadaan->id_panitia, $objPHPExcel);
						header('Content-Disposition: attachment;filename="Daftar Hadir Evaluasi Penawaran Sampul Satu - '.$cpengadaan->nama_pengadaan.'.xlsx"');
					} else if ($cdokumen->nama_dokumen == 'Daftar Hadir Evaluasi Penawaran Tahap Satu') {
						$this->getDaftarHadirPanitia($cpengadaan->id_panitia, $objPHPExcel);
						header('Content-Disposition: attachment;filename="Daftar Hadir Evaluasi Penawaran Tahap Satu - '.$cpengadaan->nama_pengadaan.'.xlsx"');
					} else if ($cdokumen->nama_dokumen == 'Daftar Hadir Evaluasi Penawaran Sampul Dua') {
						$this->getDaftarHadirPanitia($cpengadaan->id_panitia, $objPHPExcel);
						header('Content-Disposition: attachment;filename="Daftar Hadir Evaluasi Penawaran Sampul Dua - '.$cpengadaan->nama_pengadaan.'.xlsx"');
					} else if ($cdokumen->nama_dokumen == 'Daftar Hadir Evaluasi Penawaran Tahap Dua') {
						$this->getDaftarHadirPanitia($cpengadaan->id_panitia, $objPHPExcel);
						header('Content-Disposition: attachment;filename="Daftar Hadir Evaluasi Penawaran Tahap Dua - '.$cpengadaan->nama_pengadaan.'.xlsx"');
					}
		}
		else if ($cdokumen->nama_dokumen == 'Pengumuman kualifikasi') {
			$PHPQ=pengumumanhasilprakualifikasi::model()->findByPk($cdokumen->id_dokumen);
			$objPHPExcel = $objReader->load($templatePath . '4b BA dan Hasil Kualifikasi.xlsx');
					$this->assign($objPHPExcel, "#tanggal#", Tanggal::getTanggalLengkap($cdokumen->tanggal));
					$this->assign($objPHPExcel, "#hari#", Tanggal::getHari($cdokumen->tanggal));
					$this->assign($objPHPExcel, "#waktu#", $PHPQ->jam);
					$this->assign($objPHPExcel, "#tempat#", $PHPQ->tempat_hadir);
					$this->assign($objPHPExcel, "#acara#", $PHPQ->acara." ".$cpengadaan->nama_pengadaan);
					$this->assign($objPHPExcel, "#namapengadaan#", $cpengadaan->nama_pengadaan);
					
		}
		else if ($cdokumen->nama_dokumen == 'Berita Acara Evaluasi Prakualifikasi') {
			$BAEPK=BeritaAcaraEvaluasiPrakualifikasi::model()->findByPk($cdokumen->id_dokumen);
			$objPHPExcel = $objReader->load($templatePath . 'BA Evaluasi Prakualifikasi.xlsx');
					$this->assign($objPHPExcel, "#tgllengkap#", Tanggal::getTanggalStrip($cdokumen->tanggal));
					$this->assign($objPHPExcel, "#hari#", Tanggal::getHari($cdokumen->tanggal));
					$this->assign($objPHPExcel, "#tanggal#", Tanggal::getTanggal($cdokumen->tanggal));
					$this->assign($objPHPExcel, "#bulan#", Tanggal::getBulanA($cdokumen->tanggal));
					$this->assign($objPHPExcel, "#tahun#", Tanggal::getTahun($cdokumen->tanggal));
					$this->assign($objPHPExcel, "#nobapq#", $BAEPK->nomor);
					$this->assign($objPHPExcel, "#namapanitia#", $panitia->jenis_panitia);
					$this->assign($objPHPExcel, "#KDIVMUM/MSDAF#", Jabatan::model()->findByPk($NDPP->dari)->jabatan);
					$this->assign($objPHPExcel, "#namapengadaan#", strtoupper($cpengadaan->nama_pengadaan));
					$this->assign($objPHPExcel, "#namapengadaan2#", $cpengadaan->nama_pengadaan);
					$this->assign($objPHPExcel, "#metodepengadaan#", $cpengadaan->metode_pengadaan);
					$this->assign($objPHPExcel, "#kalimatpanitia#", $kalimat_panitia);
					$this->assign($objPHPExcel, "#nopq#", $DPK->nomor);
					$this->assign($objPHPExcel, "#tglpq#", Tanggal::getTanggalLengkap($dokpq->tanggal));
			header('Content-Disposition: attachment;filename="Berita Acara Evaluasi Dokumen Prakualifikasi - '.$cpengadaan->nama_pengadaan.'.xlsx"');
		}
		else if ($cdokumen->nama_dokumen == 'Daftar Hadir Evaluasi Prakualifikasi') {
			$DH=DaftarHadir::model()->findByPk($cdokumen->id_dokumen);
			$objPHPExcel = $objReader->load($templatePath . 'Daftar Hadir Prakualifikasi.xlsx');
					$this->assign($objPHPExcel, "#tanggal#", Tanggal::getTanggalLengkap($cdokumen->tanggal));
					$this->assign($objPHPExcel, "#hari#", Tanggal::getHari($cdokumen->tanggal));
					$this->assign($objPHPExcel, "#waktu#", Tanggal::getJamMenit($DH->jam));
					$this->assign($objPHPExcel, "#tempat#", $DH->tempat_hadir);
					$this->assign($objPHPExcel, "#acara#", $DH->acara);
					$this->assign($objPHPExcel, "#namapengadaan#", $cpengadaan->nama_pengadaan);
			
			header('Content-Disposition: attachment;filename="Daftar Hadir Evaluasi Prakualifikasi-'.$cpengadaan->nama_pengadaan.'.xlsx"');

		}
		else{
			$objPHPExcel = $objReader->load($templatePath . 'test.xlsx');
				$this->assign($objPHPExcel, "#namapengadaan#", strtoupper($cdokumen->nama_dokumen));
			header('Content-Disposition: attachment;filename="test.xlsx"');
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

	function getListPanitiaTandaTangan($idPan, $namasheet, $kolomawal, $barisawal, $objPHPExcel){
		$Pan = Panitia::model()->findByPk($idPan);
		$kolom= $kolomawal;
		if($Pan->jenis_panitia == "Pejabat"){
			$objPHPExcel->setActiveSheetIndexByName($namasheet)->setCellValue(++$kolom.$barisawal,$Pan->nama_panitia);
		}else{
			$objPHPExcel->setActiveSheetIndexByName($namasheet)->setCellValue($kolom.$barisawal,"1. ".Anggota::model()->find('id_panitia = '.$idPan. ' and jabatan = "Ketua" and status_user = "Aktif"')->nama);
			$objPHPExcel->setActiveSheetIndexByName($namasheet)->setCellValue(++$kolom.$barisawal,"Ketua");
			$objPHPExcel->setActiveSheetIndexByName($namasheet)->setCellValue(++$kolom.$barisawal,"(....................)");
			$barisselanjutnya = $barisawal+1;
			$kolom= $kolomawal;
			$objPHPExcel->setActiveSheetIndexByName($namasheet)->setCellValue($kolom.$barisselanjutnya,"2. ".Anggota::model()->find('id_panitia = '.$idPan. ' and jabatan = "Sekretaris" and status_user = "Aktif"')->nama);
			$objPHPExcel->setActiveSheetIndexByName($namasheet)->setCellValue(++$kolom.$barisselanjutnya,"Sekretaris");
			$objPHPExcel->setActiveSheetIndexByName($namasheet)->setCellValue(++$kolom.$barisselanjutnya,"(....................)");
			$barisselanjutnya = $barisselanjutnya+1;
			$kolom= $kolomawal;
			$i=3;
			$anggota = Anggota::model()->findAll('id_panitia = '.$idPan. ' and jabatan = "Anggota" and status_user = "Aktif"');
			foreach($anggota as $item) {
				$objPHPExcel->setActiveSheetIndexByName($namasheet)->setCellValue($kolom.$barisselanjutnya,$i.". ".$item->nama);
				$objPHPExcel->setActiveSheetIndexByName($namasheet)->setCellValue(++$kolom.$barisselanjutnya,"Anggota");
				$objPHPExcel->setActiveSheetIndexByName($namasheet)->setCellValue(++$kolom.$barisselanjutnya,"(....................)");
				$barisselanjutnya = $barisselanjutnya+1;
				$kolom= $kolomawal;
				$i++;
			}
		}
	}
	
	function getDaftarHadir($idPan, $idPeng, $objPHPExcel, $tahap){
		$Pan = Panitia::model()->findByPk($idPan);
		$barisawal = 18;
		if($Pan->jenis_panitia == "Pejabat"){
			$objPHPExcel->setActiveSheetIndexByName("Daftar Hadir")->setCellValue('B17','I');
			$objPHPExcel->setActiveSheetIndexByName("Daftar Hadir")->setCellValue('C17','Pejabat Pengadaan Barang/Jasa');
			$objPHPExcel->setActiveSheetIndexByName("Daftar Hadir")->setCellValue('B'.$barisawal,'1');
			$objPHPExcel->setActiveSheetIndexByName("Daftar Hadir")->setCellValue('C'.$barisawal,$Pan->nama_panitia);
			$objPHPExcel->setActiveSheetIndexByName("Daftar Hadir")->setCellValue('D'.$barisawal,'Pejabat');
			$barisawal = $barisawal+1;
			$objPHPExcel->setActiveSheetIndexByName("Daftar Hadir")->setCellValue('B'.$barisawal,'II');
			$objPHPExcel->setActiveSheetIndexByName("Daftar Hadir")->setCellValue('C'.$barisawal,'Penyadia Barang/Jasa');
			$penyedia = PenerimaPengadaan::model()->findAll('(' . $tahap . ' = "1" or ' . $tahap . ' = "0") and id_pengadaan = ' . $idPeng);
			$barisawal = $barisawal+1;
			$i=1;
			foreach($penyedia as $item) {
				$objPHPExcel->setActiveSheetIndexByName("Daftar Hadir")->setCellValue('B'.$barisawal,$i);
				$objPHPExcel->setActiveSheetIndexByName("Daftar Hadir")->setCellValue('D'.$barisawal,$item->perusahaan);
				$barisawal = $barisawal+1;
				$i++;
			}
		}else{
			$objPHPExcel->setActiveSheetIndexByName("Daftar Hadir")->setCellValue('B17','I');
			$objPHPExcel->setActiveSheetIndexByName("Daftar Hadir")->setCellValue('C17','Panitia Pengadaan Barang/Jasa');
			$objPHPExcel->setActiveSheetIndexByName("Daftar Hadir")->setCellValue('B'.$barisawal,'1');
			$objPHPExcel->setActiveSheetIndexByName("Daftar Hadir")->setCellValue('C'.$barisawal,Anggota::model()->find('id_panitia = '.$idPan. ' and jabatan = "Ketua" and status_user = "Aktif"')->nama);
			$objPHPExcel->setActiveSheetIndexByName("Daftar Hadir")->setCellValue('D'.$barisawal,'Ketua');
			$barisawal = $barisawal+1;
			$objPHPExcel->setActiveSheetIndexByName("Daftar Hadir")->setCellValue('B'.$barisawal,'2');
			$objPHPExcel->setActiveSheetIndexByName("Daftar Hadir")->setCellValue('C'.$barisawal,Anggota::model()->find('id_panitia = '.$idPan. ' and jabatan = "Sekretaris" and status_user = "Aktif"')->nama);
			$objPHPExcel->setActiveSheetIndexByName("Daftar Hadir")->setCellValue('D'.$barisawal,'Sekretaris');
			$anggota = Anggota::model()->findAll('id_panitia = '.$idPan. ' and jabatan = "Anggota" and status_user = "Aktif"');
			$barisawal = $barisawal+1;
			$i=3;
			foreach($anggota as $item) {
				$objPHPExcel->setActiveSheetIndexByName("Daftar Hadir")->setCellValue('B'.$barisawal,$i);
				$objPHPExcel->setActiveSheetIndexByName("Daftar Hadir")->setCellValue('C'.$barisawal,$item->nama);
				$objPHPExcel->setActiveSheetIndexByName("Daftar Hadir")->setCellValue('D'.$barisawal,'Anggota');
				$barisawal = $barisawal+1;
				$i++;
			}
			$objPHPExcel->setActiveSheetIndexByName("Daftar Hadir")->setCellValue('B'.$barisawal,'II');
			$objPHPExcel->setActiveSheetIndexByName("Daftar Hadir")->setCellValue('C'.$barisawal,'Penyadia Barang/Jasa');
			$penyedia = PenerimaPengadaan::model()->findAll('(' . $tahap . ' = "1") and id_pengadaan = ' . $idPeng);
			$barisawal = $barisawal+1;
			$i=1;
			foreach($penyedia as $item) {
				$objPHPExcel->setActiveSheetIndexByName("Daftar Hadir")->setCellValue('B'.$barisawal,$i);
				$objPHPExcel->setActiveSheetIndexByName("Daftar Hadir")->setCellValue('D'.$barisawal,$item->perusahaan);
				$barisawal = $barisawal+1;
				$i++;
			}
		}
	}
	
	function getDaftarHadirPanitia($idPan, $objPHPExcel){
		$Pan = Panitia::model()->findByPk($idPan);
		$barisawal = 18;
		if($Pan->jenis_panitia == "Pejabat"){
			$objPHPExcel->setActiveSheetIndexByName("Daftar Hadir")->setCellValue('B17','I');
			$objPHPExcel->setActiveSheetIndexByName("Daftar Hadir")->setCellValue('C17','Pejabat Pengadaan Barang/Jasa');
			$objPHPExcel->setActiveSheetIndexByName("Daftar Hadir")->setCellValue('B'.$barisawal,'1');
			$objPHPExcel->setActiveSheetIndexByName("Daftar Hadir")->setCellValue('C'.$barisawal,$Pan->nama_panitia);
			$objPHPExcel->setActiveSheetIndexByName("Daftar Hadir")->setCellValue('D'.$barisawal,'Pejabat');
		}else{
			$objPHPExcel->setActiveSheetIndexByName("Daftar Hadir")->setCellValue('B17','I');
			$objPHPExcel->setActiveSheetIndexByName("Daftar Hadir")->setCellValue('C17','Panitia Pengadaan Barang/Jasa');
			$objPHPExcel->setActiveSheetIndexByName("Daftar Hadir")->setCellValue('B'.$barisawal,'1');
			$objPHPExcel->setActiveSheetIndexByName("Daftar Hadir")->setCellValue('C'.$barisawal,Anggota::model()->find('id_panitia = '.$idPan. ' and jabatan = "Ketua" and status_user = "Aktif"')->nama);
			$objPHPExcel->setActiveSheetIndexByName("Daftar Hadir")->setCellValue('D'.$barisawal,'Ketua');
			$barisawal = $barisawal+1;
			$objPHPExcel->setActiveSheetIndexByName("Daftar Hadir")->setCellValue('B'.$barisawal,'2');
			$objPHPExcel->setActiveSheetIndexByName("Daftar Hadir")->setCellValue('C'.$barisawal,Anggota::model()->find('id_panitia = '.$idPan. ' and jabatan = "Sekretaris" and status_user = "Aktif"')->nama);
			$objPHPExcel->setActiveSheetIndexByName("Daftar Hadir")->setCellValue('D'.$barisawal,'Sekretaris');
			$anggota = Anggota::model()->findAll('id_panitia = '.$idPan. ' and jabatan = "Anggota" and status_user = "Aktif"');
			$barisawal = $barisawal+1;
			$i=3;
			foreach($anggota as $item) {
				$objPHPExcel->setActiveSheetIndexByName("Daftar Hadir")->setCellValue('B'.$barisawal,$i);
				$objPHPExcel->setActiveSheetIndexByName("Daftar Hadir")->setCellValue('C'.$barisawal,$item->nama);
				$objPHPExcel->setActiveSheetIndexByName("Daftar Hadir")->setCellValue('D'.$barisawal,'Anggota');
				$barisawal = $barisawal+1;
				$i++;
			}
		}
	}
	
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