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
		if ($cpengadaan->metode_pengadaan == 'Penunjukan Langsung') {
			if ($crks->tipe_rks == 1) {
				if ($crincian->nama_rincian == 'Lampiran 2') {
					$objPHPExcel = $objReader->load($templatePath . 'PL-B-Lamp_2.xlsx');
					$objPHPExcel->setActiveSheetIndexByName('Sheet1')->setCellValue('B6', 'NOMOR : ' . $crks->nomor);
					$objPHPExcel->setActiveSheetIndexByName('Sheet1')->setCellValue('B7', 'TANGGAL : ' . strtoupper(Tanggal::getTanggalLengkap($cdokumen->tanggal)));
					$objPHPExcel->setActiveSheetIndexByName('Sheet1')->setCellValue('B8', strtoupper($cpengadaan->nama_pengadaan));
					ob_end_clean();
					ob_start();
					header('Content-Disposition: attachment;filename="RKS-PL-B-Lamp_2.xlsx"');
				} else if ($crincian->nama_rincian == 'Lampiran 3') {
					$objPHPExcel = $objReader->load($templatePath . 'PL-B-Lamp_3.xlsx');
					$objPHPExcel->setActiveSheetIndexByName('Sheet1')->setCellValue('C4', strtoupper($cpengadaan->nama_pengadaan));
					$objPHPExcel->setActiveSheetIndexByName('Sheet1')->setCellValue('C7', 'Nomor : ' . $crks->nomor);
					$objPHPExcel->setActiveSheetIndexByName('Sheet1')->setCellValue('C8', 'Tanggal : ' . Tanggal::getTanggalLengkap($cdokumen->tanggal));
					ob_end_clean();
					ob_start();
					header('Content-Disposition: attachment;filename="RKS-PL-B-Lamp_3.xlsx"');
				}
			}
		}
		header('Content-Type: application/vnd.ms-excel');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
	}
}
?>