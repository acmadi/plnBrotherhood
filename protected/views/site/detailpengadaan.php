<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' | Pengadaan alat mandi';
$id = Yii::app()->getRequest()->getQuery('id');
$cpengadaan = Pengadaan::model()->find('id_pengadaan = "' . $id . '"');
?>

<br />

<div id="detailpengadaan">
	<h1><?php echo $cpengadaan->nama_pengadaan; ?></h1>	
	<p> <?php echo CHtml::link('Lihat Dokumen',array('site/dokumengenerator'));  ?> </p>
	<p><?php echo $cpengadaan->deskripsi; ?></p>
	<p>Tanggal masuk: <?php echo $cpengadaan->tanggal_masuk; ?></p>
	<p>Tanggal selesai: <?php
		if (is_null($cpengadaan->tanggal_selesai)) {
			echo "-";
		}
		else {
			echo $cpengadaan->selesai;
		}
	?></p>
	<p>Penyedia: <?php echo $cpengadaan->nama_penyedia; ?></p>
	<p><?php
		if (is_null($cpengadaan->nama)) {
			echo 'Panitia: ';
			echo $cpengadaan->kode_panitia;
		}
		else {
			echo 'Pejabat: ';
			echo $cpengadaan->nama;
		}
	?></p>
	<br />
	
</div>

<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'style'=>'background:url(css/bg.gif)'));  ?>