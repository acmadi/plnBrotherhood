<?php 
/* @var $this SiteController */

	$id = Yii::app()->getRequest()->getQuery('id');
	$cpengadaan = Pengadaan::model()->find('id_pengadaan = "' . $id . '"');
		$DokNDP = Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "Nota Dinas Permintaan"');	
	if($DokNDP!=null){
		$ndp = NotaDinasPermintaan::model()->findByPk($DokNDP->id_dokumen);
	}
	
	$DokHPS = Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "HPS"');
	if($DokHPS!=null){
		$hps = HPS::model()->findByPk($DokHPS->id_dokumen);
	}
?>

<ul>
	<?php if(Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')){ ?>

		<div style="background-color:lightblue; border:1px solid black; overflow:hidden;">
			<h5 style="margin:5px;">Detil <?php echo ucwords($cpengadaan->nama_pengadaan); ?></h5>
			<div style="margin-left:-3px;">
				<?php $this->widget('zii.widgets.CDetailView', array(
						'id'=>'viewdetail',
						'data'=>$cpengadaan,
						'attributes'=>array(
							array(
								'label'=>'Pemohon',
								'value'=>$cpengadaan->divisi_peminta,
							),
							// array(
								// 'label'=>'Perihal',
								// 'value'=>$cpengadaan->notaDinasPerintahPengadaan->perihal,
							// ),
							array(
								'label'=>'Nilai RAB',
								'value'=>$DokNDP!=null ? RupiahMaker::convertInt($ndp->nilai_biaya_rab) : '-', 
							),
							array(
								'label'=>'Nilai HPS',
								'value'=>$DokHPS!=null ? RupiahMaker::convertInt($hps->nilai_hps) : '-',
							),
							array(
								'label'=>'Pagu anggaran',
								'value'=>RupiahMaker::convertInt($cpengadaan->notaDinasPerintahPengadaan->pagu_anggaran),
							),
							array(
								'label'=>'Sumber dana',
								'value'=>$cpengadaan->notaDinasPerintahPengadaan->sumber_dana,
							),
							array(
								'label'=>'Nomor nota dinas permintaan',
								'value'=>$cpengadaan->notaDinasPermintaan->nomor,
							),
							array(
								'label'=>'Nomor kontrak',
								'value'=>'-',
							),
							array(
								'label'=>'Target kontrak',
								'value'=>$cpengadaan->notaDinasPerintahPengadaan->targetSPK_kontrak . ' hari',
							),
							array(
								'label'=>'Penyedia',
								'value'=>$cpengadaan->nama_penyedia,
							),
							array(
								'label'=>'Nilai kontrak',
								'value'=>$cpengadaan->biaya,
							),
						),
					));
				?>
			</div>
		</div>

		<br />
		<br />
	
	<?php } ?>
</ul>