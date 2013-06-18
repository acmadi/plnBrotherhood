<?php
	
class DownloadController extends Controller
{
	
	public function actionDownload()
	{
		$id = Yii::app()->getRequest()->getQuery('id');
		$clink = LinkDokumen::model()->findByPk($id);
		$cdok = Dokumen::model()->findByPk($clink->id_dokumen);
		$dl = $_SERVER["DOCUMENT_ROOT"] . Yii::app()->request->baseUrl . '/uploads/' . $cdok->id_pengadaan . '/' . $clink->id_dokumen . '/' . $clink->nomor_link . '.docx';
		Yii::app()->getRequest()->sendFile($cdok->nama_dokumen . '.docx', @file_get_contents($dl));
	}
}
?>