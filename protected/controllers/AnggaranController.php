<?php

class AnggaranController extends Controller
{
	public function actionKontrolanggaran()
	{
		if (Yii::app()->user->getState('role') == 'kdivmum') {
			$anggaran = array();
			$divisi = Divisi::model()->findAll();
			$i=0;
			foreach ($divisi as $item) {
				$paguanggaran=0;
				$rab=0;
				$hps=0;
				$kontrak=0;
				$semuapengadaan= Pengadaan::model()->findAll('divisi_peminta = "'.$item->username.'"');
				foreach ($semuapengadaan as $pengadaan){
					$paguanggaran=$paguanggaran+NotaDinasPerintahPengadaan::model()->findByPk(Dokumen::model()->find('id_pengadaan = '.$pengadaan->id_pengadaan.' and nama_dokumen = "Nota Dinas Perintah Pengadaan"')->id_dokumen)->pagu_anggaran;
					$rab=$rab+NotaDinasPermintaan::model()->findByPk(Dokumen::model()->find('id_pengadaan = '.$pengadaan->id_pengadaan.' and nama_dokumen = "Nota Dinas Permintaan"')->id_dokumen)->nilai_biaya_rab;
					$hps=$hps+Hps::model()->findByPk(Dokumen::model()->find('id_pengadaan = '.$pengadaan->id_pengadaan.' and nama_dokumen = "HPS"')->id_dokumen)->nilai_hps;
				}
				$anggaran[$i]= array('Nama_Divisi'=>$item->nama_divisi,'pagu_anggaran'=>$paguanggaran,'nilai_rab'=>$rab,'nilai_hps'=>$hps);
				$i++;
			}
			$dataanggaran = new CArrayDataProvider($anggaran, array('keyField'=>'Nama_Divisi'));
			$this->render('kontrolanggaran', array('dataanggaran'=>$dataanggaran,
			));
		}
	}
	
	public function actionKontrolanggarandivisi()
	{
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->getState('role') == 'kdivmum') {
			$paguanggaran=0;
			$rab=0;
			$hps=0;
			$kontrak=0;
			$semuapengadaan= Pengadaan::model()->findAll('divisi_pemintan = '.$item->username);
			$this->render('kontrolanggaran', array(
			));
		}
	}
}
