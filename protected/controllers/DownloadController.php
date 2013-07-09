<?php
	
class DownloadController extends Controller
{
	
	public function actionDownload()
	{
		$id = Yii::app()->getRequest()->getQuery('id');
		$clink = LinkDokumen::model()->findByPk($id);
		$cdok = Dokumen::model()->findByPk($clink->id_dokumen);
		$dl = $_SERVER["DOCUMENT_ROOT"] . Yii::app()->request->baseUrl . '/uploads/' . $cdok->id_pengadaan . '/' . $clink->id_dokumen . '/' . $clink->nomor_link . '.' . $clink->format_dokumen;
		Yii::app()->getRequest()->sendFile($clink->nama_file . '.' . $clink->format_dokumen, @file_get_contents($dl));
	}
}
?>