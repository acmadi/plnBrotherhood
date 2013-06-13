<?php
/* @var $this SiteController */

$id = Yii::app()->getRequest()->getQuery('id');
$cpengadaan = Pengadaan::model()->find('id_pengadaan = "' . $id . '"');
$this->pageTitle=Yii::app()->name . ' | ' . $cpengadaan->nama_pengadaan;
?>

<div id="detailpengadaanhistory">
	<h1><?php echo $cpengadaan->nama_pengadaan; ?></h1>	
	<p> <?php echo CHtml::link('Lihat Dokumen',array('site/dokumenhistory',"id"=>"$cpengadaan->id_pengadaan"));  ?> </p>
	<p><?php echo $cpengadaan->deskripsi; ?></p>
	<p>Tanggal masuk: <?php echo $cpengadaan->tanggal_masuk; ?></p>
	<p>Tanggal selesai: <?php
		if (is_null($cpengadaan->tanggal_selesai)) {
			echo "-";
		}
		else {
			echo $cpengadaan->tanggal_selesai;
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
	
</div>

<?php echo CHtml::button('Kembali', array('submit'=>array('site/history'), 'class'=>'sidafbutton'));  ?>