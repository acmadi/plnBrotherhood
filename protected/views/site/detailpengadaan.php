<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' | Pengadaan alat mandi';
?>

<br />

<div id="detailpengadaan">
	<h1>Pengadaan alat mandi</h1>
	<br />
	<p>Pengadaan alat mandi untuk pegawai PLN di seluruh Indonesia.</p>
	<p>Tanggal: 18 Juni 2003</p>
	<p>Penyedia: Paper Street Soap</p>
	<p>
		Panitia: Panitia A
		<ul>
			<li>Kevin Indro</li>
			<li>Kevin Alfianto</li>
			<li>Kevin Timo</li>
			<li>Kevin Winoto</li>
		</ul>
	</p>
	<h3>Aanwijzing: 18 Juni 2013</h3>
	<br />
	
</div>

<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'style'=>'background:url(css/bg.gif)'));  ?>