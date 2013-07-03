<?php
	
class XlsxController extends Controller
{

	public function actionDownloadRks()
	{
		$id= Yii::app()->getRequest()->getQuery('id');
		$crincian = RincianRks::model()->findByPk($id);
		$templatePath = $_SERVER["DOCUMENT_ROOT"] . Yii::app()->request->baseUrl . '/templates/';
		$objPHPExcel = new PHPExcel;
		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objPHPExcel = $objReader->load($templatePath . '10.a-Lam BA PEMBUKAAN 1 Sampul.xlsx');
		$objPHPExcel->setActiveSheetIndexByName('LAMP.BUKA.1SAMPUL (2)')->setCellValue('D35', 'hello world');
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