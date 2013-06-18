<?php
/* @var $this SiteController */

	$id = Yii::app()->getRequest()->getQuery('id');
	$cdokumen = Dokumen::model()->find('id_dokumen = "' . $id . '"');
	$this->pageTitle=Yii::app()->name . ' | ' . Pengadaan::model()->findByPk($cdokumen->id_pengadaan)->nama_pengadaan . ' : ' . $cdokumen->nama_dokumen;
	$dataProvider = new CActiveDataProvider(LinkDokumen::model(), array(
		'criteria'=>array(
			'condition'=>'id_dokumen = ' . $id,
			'order'=>'nomor_link DESC',
		),
	));
?>

<br />

<h2><?php echo Pengadaan::model()->findByPk($cdokumen->id_pengadaan)->nama_pengadaan; ?> : <?php echo $cdokumen->nama_dokumen?></h2>
<?php echo CHtml::button('Buat Dokumen', array('class'=>'sidafbutton'));  ?>
<?php echo CHtml::button('Unggah', array('class'=>'sidafbutton'));  ?>

<?php
	$this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'dokumengrid',
		'dataProvider'=>$dataProvider,
		'columns'=>array(
			'pengunggah',
		),
	));
?>

<?php echo CHtml::button('Kembali', array('submit'=>array('site/dokumengenerator', 'id'=>$cdokumen->id_pengadaan), 'class'=>'sidafbutton'));  ?>