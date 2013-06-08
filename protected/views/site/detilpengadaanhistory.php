<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' | Pengadaan alat mandi';
?>

<br />

<div id="detailpengadaan">
	<h1>Pengadaan Gedung Baru</h1>

	<p> <?php echo CHtml::link('Lihat Dokumen',array('site/dokumenhistory'));  ?> </p>
	<p>Pengadaan gedung untuk PLN Pusat.</p>
	<p>Tanggal: 18 Juni 2003</p>
	<p>Penyedia: PT Gedung Maker</p>
	<p>
		Panitia: Panitia B
		<ul>
			<li>Wiro Sableng</li>
			<li>Sinto Gendeng</li>
			<li>Saras 008</li>
			<li>Panji Manusia Milenium</li>
		</ul>
	</p>	
	<br />
	
</div>

<?php echo CHtml::button('Kembali', array('submit'=>array('site/history'), 'style'=>'background:url(css/bg.gif)'));  ?>