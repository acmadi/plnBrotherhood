<?php

class AnggaranController extends Controller
{
	public function actionKontrolanggaran()
	{
		if (Yii::app()->user->getState('role') == 'kdivmum') {
			$anggaran = array();
			$divisi = Divisi::model()->findAll();
			$pagutotal=0;
			$rabtotal=0;
			$hpstotal=0;
			$kontraktotal=0;
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
					$kontrak=$kontrak+$pengadaan->biaya;
				}
				$pagutotal=$pagutotal+$paguanggaran;
				$rabtotal=$rabtotal+$rab;
				$hpstotal=$hpstotal+$hps;
				$kontraktotal=$kontraktotal+$kontrak;
				if($rab!=0 && $paguanggaran !=0) {
					$rab=RupiahMaker::convertIntTanpaRp($rab);
					$paguanggaran=RupiahMaker::convertIntTanpaRp($paguanggaran);
					if($hps!=0){
						$hps=RupiahMaker::convertIntTanpaRp($hps);
						if($kontrak!=0){
							$kontrak=RupiahMaker::convertIntTanpaRp($kontrak);
							$penghematan=$paguanggaran-$kontrak;
							$persenpenghematan=$penghematan*100/$paguanggaran;
							$penghematan=RupiahMaker::convertIntTanpaRp($penghematan); 
						} else {
							$kontrak='-';
							$penghematan='-';
							$persenpenghematan='-';
						}
					} else {
						$hps='-';
						$kontrak='-';
						$penghematan='-';
						$persenpenghematan='-';
					}
				} else {
					$rab='-';
					$paguanggaran='-';
					$hps='-';
					$kontrak='-';
					$penghematan='-';
					$persenpenghematan='-';
				}
				$anggaran[$i]= array('username'=>$item->username,'nama_divisi'=>$item->nama_divisi,'pagu_anggaran'=>$paguanggaran,'nilai_rab'=>$rab,'nilai_hps'=>$hps,'nilai_kontrak'=>$kontrak,'penghematan'=>$penghematan,'persen'=>$persenpenghematan);
				$i++;
			}
			if($rabtotal!=0 && $pagutotal!=0) {
				$rabtotal=RupiahMaker::convertInt($rabtotal);
				$pagutotal=RupiahMaker::convertIntTanpaRp($pagutotal);
				if($hpstotal!=0){
					$hpstotal=RupiahMaker::convertIntTanpaRp($hpstotal);
					if($kontraktotal!=0){
						$kontraktotal=RupiahMaker::convertIntTanpaRp($kontraktotal);
						$penghematantotal=$pagutotal-$kontraktotal;
						$persenpenghematantotal=$penghematantotal*100/$pagutotal;
						$penghematantotal=RupiahMaker::convertIntTanpaRp($penghematantotal); 
					} else {
						$kontraktotal='-';
						$penghematantotal='-';
						$persenpenghematantotal='-';
					}
				} else {
					$hpstotal='-';
					$kontraktotal='-';
					$penghematantotal='-';
					$persenpenghematantotal='-';
				}
			} else {
				$rabtotal='-';
				$rabtotal='-';
				$hpstotal='-';
				$kontraktotal='-';
				$persenpenghematantotal='-';
				$persenpenghematantotal='-';
			}
			$anggarantotal = array('total_pagu_anggaran'=>$pagutotal,'total_nilai_rab'=>$rabtotal,'total_nilai_hps'=>$hpstotal,'total_nilai_kontrak'=>$kontraktotal,'total_penghematan'=>$penghematantotal,'persen'=>$persenpenghematantotal);
			$dataanggaran = new CArrayDataProvider($anggaran,array(
				'sort'=>array(
					'attributes'=>array(
						'username','nama_divisi','pagu_anggaran','nilai_rab','nilai_hps','nilai_kontrak','penghematan','persen',
					)
				),
				'keyField'=>'username',
			));
			$datatotal = new CArrayDataProvider($anggarantotal,array(
				'sort'=>array(
					'attributes'=>array(
						'total_pagu_anggaran','total_nilai_rab','total_nilai_hps','total_nilai_kontrak','total_penghematan','persen',
					)
				),
			));
			$this->render('kontrolanggaran', array('dataanggaran'=>$dataanggaran,'datatotal'=>$datatotal,'pagutotal'=>$pagutotal,'rabtotal'=>$rabtotal,'hpstotal'=>$hpstotal,'kontraktotal'=>$kontraktotal,'penghematantotal'=>$penghematantotal,'persenpenghematantotal'=>$persenpenghematantotal,
			));
		}
	}
	
	public function actionKontrolanggarandivisi()
	{
		$id = Yii::app()->getRequest()->getQuery('id');
		if (Yii::app()->user->getState('role') == 'kdivmum') {
			$anggaran = array();
			$pengadaan= Pengadaan::model()->findAll('divisi_peminta = "'.$id.'"');
			$i=0;
			foreach($pengadaan as $item) {
				$paguanggaran=NotaDinasPerintahPengadaan::model()->findByPk(Dokumen::model()->find('id_pengadaan = '.$item->id_pengadaan.' and nama_dokumen = "Nota Dinas Perintah Pengadaan"')->id_dokumen)->pagu_anggaran;
				$rab=NotaDinasPermintaan::model()->findByPk(Dokumen::model()->find('id_pengadaan = '.$item->id_pengadaan.' and nama_dokumen = "Nota Dinas Permintaan"')->id_dokumen)->nilai_biaya_rab;
				$hps=Hps::model()->findByPk(Dokumen::model()->find('id_pengadaan = '.$item->id_pengadaan.' and nama_dokumen = "HPS"')->id_dokumen)->nilai_hps;
				$kontrak=$item->biaya;
				if($rab!=0 && $paguanggaran !=0) {
					$rab=RupiahMaker::convertIntTanpaRp($rab);
					$paguanggaran=RupiahMaker::convertIntTanpaRp($paguanggaran);
					if($hps!=0){
						$hps=RupiahMaker::convertIntTanpaRp($hps);
						if($kontrak!=0){
							$kontrak=RupiahMaker::convertIntTanpaRp($kontrak);
							$penghematan=$paguanggaran-$kontrak;
							$persenpenghematan=$penghematan*100/$paguanggaran;
							$penghematan=RupiahMaker::convertIntTanpaRp($penghematan); 
						} else {
							$kontrak='-';
							$penghematan='-';
							$persenpenghematan='-';
						}
					} else {
						$hps='-';
						$kontrak='-';
						$penghematan='-';
						$persenpenghematan='-';
					}
				} else {
					$rab='-';
					$paguanggaran='-';
					$hps='-';
					$kontrak='-';
					$penghematan='-';
					$persenpenghematan='-';
				}
				$anggaran[$i]= array('id_pengadaan'=>$item->id_pengadaan,'nama_pengadaan'=>$item->nama_pengadaan,'pagu_anggaran'=>$paguanggaran,'nilai_rab'=>$rab,'nilai_hps'=>$hps,'nilai_kontrak'=>$kontrak,'penghematan'=>$penghematan,'persen'=>$persenpenghematan);
				$i++;
			}
			$dataanggaran = new CArrayDataProvider($anggaran,array(
				'sort'=>array(
					'attributes'=>array(
						'id_pengadaan','nama_pengadaan','pagu_anggaran','nilai_rab','nilai_hps','nilai_kontrak','penghematan','persen',
					)
				),
				'keyField'=>'id_pengadaan',
			));
			$this->render('kontrolanggarandivisi', array('dataanggaran'=>$dataanggaran,
			));
		}
	}
}
