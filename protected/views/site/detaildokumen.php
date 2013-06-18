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
	$clink = LinkDokumen::model()->findAll('id_dokumen = ' . $id);
?>

<br />

<h2><?php echo Pengadaan::model()->findByPk($cdokumen->id_pengadaan)->nama_pengadaan; ?> : <?php echo $cdokumen->nama_dokumen?></h2>
<?php echo CHtml::button('Buat Dokumen', array('class'=>'sidafbutton'));  ?>
<?php echo CHtml::button('Unggah Dokumen', array('class'=>'sidafbutton'));  ?>

<br />

<?php
	$this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'dokumengrid',
		'dataProvider'=>$dataProvider,
		"ajaxUpdate"=>"false",
		'htmlOptions'=>array('style'=>'cursor: pointer;'),			
		'selectionChanged'=>"function(id){window.location='" . $_SERVER["DOCUMENT_ROOT"] . Yii::app()->baseUrl . '/uploads/' . $cdokumen->id_pengadaan . '/' . "'+ $.fn.yiiGridView.getSelection(id) + '.docx';}",
		'columns'=>array(
			array(
				'name'=>'Tanggal unggah',
				'value'=>'$data->tanggal_upload',
			),
			array(
				'name'=>'Waktu unggah',
				'value'=>'$data->waktu_upload',
			),
			'pengunggah',
		),
	));
?>

<?php echo CHtml::button('Kembali', array('submit'=>array('site/dokumengenerator', 'id'=>$cdokumen->id_pengadaan), 'class'=>'sidafbutton'));  ?>