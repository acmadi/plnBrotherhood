<?php
/* @var $this SiteController */

$id = Yii::app()->getRequest()->getQuery('id');
$cpengadaan = Pengadaan::model()->find('id_pengadaan = "' . $id . '"');
$this->pageTitle=Yii::app()->name . ' | ' . $cpengadaan->nama_pengadaan;
?>

<br />

<div id="detailpengadaan">
	<h1><?php echo $cpengadaan->nama_pengadaan; ?></h1>	
	<?php
		$this->widget('zii.widgets.CDetailView', array(
			'id'=>'viewdetail',
			'data'=>$cpengadaan,
			'attributes'=>array(
				array(
					'label'=>'Perihal',
					'value'=>$cpengadaan->notaDinasPerintahPengadaan->perilhal,
				),
			),
		));
	?>
	
</div>

<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'style'=>'background:url(css/bg.gif)'));  ?>