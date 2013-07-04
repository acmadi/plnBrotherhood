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
					$objPHPExcel->setActiveSheetIndexByName('Sheet1')->setCellValue('B6', 'NOMOR : ' . $crks->nomor);
					$objPHPExcel->setActiveSheetIndexByName('Sheet1')->setCellValue('B7', 'TANGGAL : ' . strtoupper(Tanggal::getTanggalLengkap0($cdokumen->tanggal)));
					$objPHPExcel->setActiveSheetIndexByName('Sheet1')->setCellValue('B8', strtoupper($cpengadaan->nama_pengadaan));
					ob_end_clean();
					ob_start();
					header('Content-Disposition: attachment;filename="RKS-PL-B-Lamp_2.xlsx"');
				} else if ($crincian->nama_rincian == 'Lampiran 3') {
					$objPHPExcel = $objReader->load($templatePath . 'PL-B-Lamp_3.xlsx');
					$objPHPExcel->setActiveSheetIndexByName('Sheet1')->setCellValue('C4', strtoupper($cpengadaan->nama_pengadaan));
					$objPHPExcel->setActiveSheetIndexByName('Sheet1')->setCellValue('C7', 'Nomor : ' . $crks->nomor);
					$objPHPExcel->setActiveSheetIndexByName('Sheet1')->setCellValue('C8', 'Tanggal : ' . Tanggal::getTanggalLengkap0($cdokumen->tanggal));
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
					$objPHPExcel->setActiveSheetIndexByName('Sheet1')->setCellValue('D3', $crks->nomor);
					$objPHPExcel->setActiveSheetIndexByName('Sheet1')->setCellValue('D4', Tanggal::getTanggalLengkap0($cdokumen->tanggal));
					ob_end_clean();
					ob_start();
					header('Content-Disposition: attachment;filename="RKS-PL-B-Lamp_BA.xlsx"');
				}
			} else if ($crks->tipe_rks == 2) {
				if ($crincian->nama_rincian == 'Lampiran 2') {
					$objPHPExcel = $objReader->load($templatePath . 'PL-BJ-Lamp_2.xlsx');
					$objPHPExcel->setActiveSheetIndexByName('Sheet2')->setCellValue('C4', 'NOMOR : ' . $crks->nomor);
					$objPHPExcel->setActiveSheetIndexByName('Sheet2')->setCellValue('C5', 'TANGGAL : ' . strtoupper(Tanggal::getTanggalLengkap0($cdokumen->tanggal)));
					ob_end_clean();
					ob_start();
					header('Content-Disposition: attachment;filename="RKS-PL-BJ-Lamp_2.xlsx"');
				} else if ($crincian->nama_rincian == 'Lampiran 3') {
					$objPHPExcel = $objReader->load($templatePath . 'PL-BJ-Lamp_3.xlsx');
					$objPHPExcel->setActiveSheetIndexByName('Sheet1')->setCellValue('C4', strtoupper($cpengadaan->nama_pengadaan));
					$objPHPExcel->setActiveSheetIndexByName('Sheet1')->setCellValue('C7', 'Nomor : ' . $crks->nomor);
					$objPHPExcel->setActiveSheetIndexByName('Sheet1')->setCellValue('C8', 'Tanggal : ' . Tanggal::getTanggalLengkap0($cdokumen->tanggal));
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
					$objPHPExcel->setActiveSheetIndexByName('Sheet1')->setCellValue('D3', $crks->nomor);
					$objPHPExcel->setActiveSheetIndexByName('Sheet1')->setCellValue('D4', Tanggal::getTanggalLengkap0($cdokumen->tanggal));
					ob_end_clean();
					ob_start();
					header('Content-Disposition: attachment;filename="RKS-PL-BJ-Lamp_BA.xlsx"');
				}
			} else {
				if ($crincian->nama_rincian == 'Lampiran 2') {
					$objPHPExcel = $objReader->load($templatePath . 'PL-J-Lamp_2.xlsx');
					$objPHPExcel->setActiveSheetIndexByName('Sheet1')->setCellValue('B3', 'RINCIAN, JUMLAH DAN PEKERJAAN ' . strtoupper($cpengadaan->nama_pengadaan));
					$objPHPExcel->setActiveSheetIndexByName('Sheet1')->setCellValue('B6', 'NOMOR : ' . $crks->nomor);
					$objPHPExcel->setActiveSheetIndexByName('Sheet1')->setCellValue('B7', 'TANGGAL : ' . strtoupper(Tanggal::getTanggalLengkap0($cdokumen->tanggal)));
					ob_end_clean();
					ob_start();
					header('Content-Disposition: attachment;filename="RKS-PL-J-Lamp_2.xlsx"');
				} else if ($crincian->nama_rincian == 'Lampiran 3') {
					$objPHPExcel = $objReader->load($templatePath . 'PL-J-Lamp_3.xlsx');
					$objPHPExcel->setActiveSheetIndexByName('Sheet1')->setCellValue('C4', strtoupper($cpengadaan->nama_pengadaan));
					$objPHPExcel->setActiveSheetIndexByName('Sheet1')->setCellValue('C7', 'Nomor : ' . $crks->nomor);
					$objPHPExcel->setActiveSheetIndexByName('Sheet1')->setCellValue('C8', 'Tanggal : ' . Tanggal::getTanggalLengkap0($cdokumen->tanggal));
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
		$templatePath = $_SERVER["DOCUMENT_ROOT"] . Yii::app()->request->baseUrl . '/templates/';
		$objPHPExcel = new PHPExcel;
		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		if ($cdokumen->nama_dokumen == 'Lamp BA Pembukaan 1') {
			$objPHPExcel = $objReader->load($templatePath . '10.a-Lam BA PEMBUKAAN 1 Sampul.xlsx');
			$objPHPExcel->setActiveSheetIndexByName('BA Pembukaan Penawaran Harga')->setCellValue('B6', 'Nomor :  ' . 'anu' . ', Tanggal ' . 'tgllgkpanu');
			$objPHPExcel->setActiveSheetIndexByName('BA Pembukaan Penawaran Harga')->setCellValue('C8', 'Pada hari ' . 'harianu' . ' tanggal ' . 'harianutbg' . ' Bulan ' . 'tglanu' . ' Tahun ' . 'thnanutbg' . '(' . 'tgllgkpanu' . ') Jam ' . 'jamanu' . ' Wib, bertempat di Jakarta, ' . 'panitianu' . ' Pengadaan Barang/Jasa PT. PLN (Persero) Kantor Pusat yang dibentuk sesuai Surat Keputusan Direksi Nomor : ' . 'noskdireksi' . ' tanggal  .......... telah melakukan Pembukaan Penawaran Harga Pekerjaan ' . 'namapengadaan' . ' yang dihadiri oleh Panitia...dan Penyedia Barang/Jasa sebagai berikut :');
			ob_end_clean();
			ob_start();
			header('Content-Disposition: attachment;filename="10.a-Lam BA PEMBUKAAN 1 Sampul.xlsx"');
		}
		header('Content-Type: application/vnd.ms-excel');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
	}

	private function assign($objPHPExcel, $pattern, $replacement)
	{
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