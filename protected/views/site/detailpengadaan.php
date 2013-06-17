<?php
/* @var $this SiteController */

$id = Yii::app()->getRequest()->getQuery('id');
$cpengadaan = Pengadaan::model()->find('id_pengadaan = "' . $id . '"');
$this->pageTitle=Yii::app()->name . ' | ' . $cpengadaan->nama_pengadaan;
?>

<br />

<div id="detailpengadaan">
	<h1><?php echo $cpengadaan->nama_pengadaan; ?></h1>	
	<div style="width:50%;">
		<?php
			$this->widget('zii.widgets.CDetailView', array(
				'id'=>'viewdetail',
				'data'=>$cpengadaan,
				'attributes'=>array(
					array(
						'label'=>'Pemohon',
						'value'=>$cpengadaan->divisi_peminta,
					),
					array(
						'label'=>'Perihal',
						'value'=>$cpengadaan->notaDinasPerintahPengadaan->perihal,
					),
					array(
						'label'=>'Pagu anggaran',
						'value'=>$cpengadaan->notaDinasPerintahPengadaan->pagu_anggaran,
					),
					array(
						'label'=>'Sumber dana',
						'value'=>$cpengadaan->notaDinasPerintahPengadaan->sumber_dana,
					),
					array(
						'label'=>'Nomor nota dinas permintaan',
						'value'=>$cpengadaan->notaDinasPerintahPengadaan->nota_dinas_permintaan,
					),
					array(
						'label'=>'Status pengadaan',
						'value'=>$cpengadaan->status,
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
						'label'=>'Pelaksana',
						'value'=>$cpengadaan->nama_penyedia,
					),
					array(
						'label'=>'Nilai kontrak',
						'value'=>$cpengadaan->biaya,
					),
					array(
						'label'=>'PIC',
						'value'=>$cpengadaan->idPanitia->nama_panitia,
					),
				),
			));
		?>
	</div>

	<br />
	
</div>

<?php echo CHtml::button('Lihat dokumen', array('submit'=>array('site/dokumengenerator', 'id'=>$id), 'class'=>'sidafbutton'));  ?>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'class'=>'sidafbutton'));  ?>