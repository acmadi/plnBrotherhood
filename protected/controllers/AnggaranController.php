<?php

class AnggaranController extends Controller
{
	public function actionKontrolanggaran()
	{
		if (Yii::app()->user->getState('role') == 'kdivmum') {
			if(isset($_POST['tahun'])) {				
				$tahun = $_POST['tahun'];
			} else {
				$tahun = date('Y');
			}
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
				$semuapengadaan= Pengadaan::model()->findAll('divisi_peminta = "'.$item->username.'" and year(tanggal_masuk) = '.$tahun.' and status = "100"');
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
				$anggaran[$i]= array('username'=>$item->username,'nama_divisi'=>$item->nama_divisi,'pagu_anggaran'=>$paguanggaran,'nilai_rab'=>$rab,'nilai_hps'=>$hps,'nilai_kontrak'=>$kontrak,'penghematan'=>$penghematan,'persentase'=>$persenpenghematan);
				$i++;
			}
			if($rabtotal!=0 && $pagutotal!=0) {
				$rabtotal=RupiahMaker::convertInt($rabtotal);
				$pagutotal=RupiahMaker::convertInt($pagutotal);
				if($hpstotal!=0){
					$hpstotal=RupiahMaker::convertInt($hpstotal);
					if($kontraktotal!=0){
						$kontraktotal=RupiahMaker::convertInt($kontraktotal);
						$penghematantotal=$pagutotal-$kontraktotal;
						$persenpenghematantotal=$penghematantotal*100/$pagutotal;
						$penghematantotal=RupiahMaker::convertInt($penghematantotal); 
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
				$pagutotal='-';
				$rabtotal='-';
				$hpstotal='-';
				$kontraktotal='-';
				$penghematantotal='-';
				$persenpenghematantotal='-';
			}
			$anggarantotal = array('total_pagu_anggaran'=>$pagutotal,'total_nilai_rab'=>$rabtotal,'total_nilai_hps'=>$hpstotal,'total_nilai_kontrak'=>$kontraktotal,'total_penghematan'=>$penghematantotal,'persentase'=>$persenpenghematantotal);
			$dataanggaran = new CArrayDataProvider($anggaran,array(
				'sort'=>array(
					'attributes'=>array(
						'username','nama_divisi','pagu_anggaran','nilai_rab','nilai_hps','nilai_kontrak','penghematan','persentase',
					)
				),
				'keyField'=>'username',
			));
			$this->render('kontrolanggaran', array('dataanggaran'=>$dataanggaran,'anggarantotal'=>$anggarantotal,'tahun'=>$tahun,
			));
		}
	}
	
	public function actionKontrolanggarandivisi()
	{
		$id = Yii::app()->getRequest()->getQuery('id');
		$tahun = Yii::app()->getRequest()->getQuery('tahun');
		if (Yii::app()->user->getState('role') == 'kdivmum') {
			$anggaran = array();
			$pagutotal=0;
			$rabtotal=0;
			$hpstotal=0;
			$kontraktotal=0;
			$pengadaan= Pengadaan::model()->findAll('divisi_peminta = "'.$id.'" and year(tanggal_masuk) = '.$tahun.' and status = "100"');
			$i=0;
			foreach($pengadaan as $item) {
				$paguanggaran=NotaDinasPerintahPengadaan::model()->findByPk(Dokumen::model()->find('id_pengadaan = '.$item->id_pengadaan.' and nama_dokumen = "Nota Dinas Perintah Pengadaan"')->id_dokumen)->pagu_anggaran;
				$rab=NotaDinasPermintaan::model()->findByPk(Dokumen::model()->find('id_pengadaan = '.$item->id_pengadaan.' and nama_dokumen = "Nota Dinas Permintaan"')->id_dokumen)->nilai_biaya_rab;
				$hps=Hps::model()->findByPk(Dokumen::model()->find('id_pengadaan = '.$item->id_pengadaan.' and nama_dokumen = "HPS"')->id_dokumen)->nilai_hps;
				$kontrak=$item->biaya;
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
				$anggaran[$i]= array('id_pengadaan'=>$item->id_pengadaan,'nama_pengadaan'=>$item->nama_pengadaan,'pagu_anggaran'=>$paguanggaran,'nilai_rab'=>$rab,'nilai_hps'=>$hps,'nilai_kontrak'=>$kontrak,'penghematan'=>$penghematan,'persentase'=>$persenpenghematan);
				$i++;
			}
			if($rabtotal!=0 && $pagutotal!=0) {
				$rabtotal=RupiahMaker::convertInt($rabtotal);
				$pagutotal=RupiahMaker::convertInt($pagutotal);
				if($hpstotal!=0){
					$hpstotal=RupiahMaker::convertInt($hpstotal);
					if($kontraktotal!=0){
						$kontraktotal=RupiahMaker::convertInt($kontraktotal);
						$penghematantotal=$pagutotal-$kontraktotal;
						$persenpenghematantotal=$penghematantotal*100/$pagutotal;
						$penghematantotal=RupiahMaker::convertInt($penghematantotal); 
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
				$pagutotal='-';
				$rabtotal='-';
				$hpstotal='-';
				$kontraktotal='-';
				$penghematantotal='-';
				$persenpenghematantotal='-';
			}
			$anggarantotal = array('total_pagu_anggaran_divisi'=>$pagutotal,'total_nilai_rab_divisi'=>$rabtotal,'total_nilai_hps_divisi'=>$hpstotal,'total_nilai_kontrak_divisi'=>$kontraktotal,'total_penghematan_divisi'=>$penghematantotal,'persentase'=>$persenpenghematantotal);
			$dataanggaran = new CArrayDataProvider($anggaran,array(
				'sort'=>array(
					'attributes'=>array(
						'id_pengadaan','nama_pengadaan','pagu_anggaran','nilai_rab','nilai_hps','nilai_kontrak','penghematan','persentase',
					)
				),
				'keyField'=>'id_pengadaan',
			));
			$this->render('kontrolanggarandivisi', array('dataanggaran'=>$dataanggaran,'anggarantotal'=>$anggarantotal,'tahun'=>$tahun,
			));
		}
	}
}
