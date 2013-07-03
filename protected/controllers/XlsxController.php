<?php
	
class XlsxController extends Controller
{

	public function actionDownload()
	{
		$templatePath = $_SERVER["DOCUMENT_ROOT"] . Yii::app()->request->baseUrl . '/templates/';
		$objPHPExcel = new PHPExcel;
		// $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', 'Hello')->setCellValue('A2', 'world');
		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objPHPExcel = $objReader->load($templatePath . '16-Lam BA Evaluasi 2 Sampul Sd Edited, SistemBobot.xlsx');
		ob_end_clean();
		ob_start();
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="test.xlsx"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
	}
}
?>