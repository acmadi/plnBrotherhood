<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' | Generator';
$id = Yii::app()->getRequest()->getQuery('id');
$cpengadaan = Pengadaan::model()->find('id_pengadaan = "' . $id . '"');
?>

<div id="pagecontent">
	<div id="sidebar">
		<?php if(!Yii::app()->user->isGuest) $this->widget('MenuPortlet'); ?>
	</div>

	<div id="maincontent">
		<br/>
		<h3>
			<b> <?php echo $cpengadaan->nama_pengadaan; ?> </b> telah digagalkan. <br/> <br/>
			Silahkan masuk ke menu <b> Batalkan Pengadaan </b> untuk membuat dan mengunduh Nota Dinas Pengadaan Gagal.
		</h3>

	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'style'=>'background:url(css/bg.gif)'));  ?></div>
