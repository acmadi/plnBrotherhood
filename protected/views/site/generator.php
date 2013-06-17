<?php
/* @var $this SiteController */

$id = Yii::app()->getRequest()->getQuery('id');
$cpengadaan = Pengadaan::model()->find('id_pengadaan = "' . $id . '"');
$this->pageTitle=Yii::app()->name . ' | ' . $cpengadaan->nama_pengadaan;
?>

<div id="pagecontent">
	<div id="sidebar">
		<?php if(!Yii::app()->user->isGuest) $this->widget('MenuPortlet'); ?>
	</div>

	<div id="maincontent">
		Anda berada di layar <b><?php echo $cpengadaan->nama_pengadaan; ?></b>.</br>
		Saat ini status pengadaan telah mencapai <?php echo $cpengadaan->status; ?>. </br>
		Untuk melanjutkan proses pengadaan, silahkan masuk ke menu <b><?php echo $cpengadaan->status; ?></b> di sebelah kiri. </br>
		<?php if($cpengadaan->status != 'Penunjukan Panitia') { ?>
			Apabila anda ingin mengubah data-data sebelumnya, silahkan masuk ke menu di atasnya. </br>
		<?php } ?> 
		Apabila pengadaan gagal, silahkan masuk ke menu Pengadaan gagal. </br> </br>
		Untuk mengunggah dokumen, silahkan masuk ke menu Unggah Dokumen. </br>
		Untuk melihat dokumen yang telah diunggah, silahkan masuk ke menu Lihat Dokumen.
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'class'=>'sidafbutton'));  ?></div>
