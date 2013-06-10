<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' | Beranda';
?>

<h2 style="margin-left:30px">Selamat datang, <b><?php echo User::model()->find('username = "' . Yii::app()->user->name . '"')->nama; ?></b>!</h2>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pengadaan-grid',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	'columns'=>array(
		// 'id_pengadaan',
		array(
			'class'=>'CDataColumn',
			'type'=>'number',
			'value'=>'$row + 1',
			'header'=>'No',
		),
		'nama_pengadaan',
		// 'nama_penyedia',
		// 'tanggal_masuk',
		// 'tanggal_selesai',
		'status',
		/*
		'biaya',
		'nama',
		'kode_panitia',
		'metode_pengadaan',
		'metode_penawaran',
		'deskripsi',
		*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}',
			'viewButtonUrl'=>'Yii::app()->createUrl("site/generator")',
		),
	),
)); ?>


<?php 
	if (Yii::app()->user->name == 'kadiv') {
		echo CHtml::button('Tambah Pengadaan', array('submit'=>array('site/generator_2'), 'style'=>'background:url(css/bg.gif)')); 
	}
?>
<?php echo CHtml::button('Unggah berkas excel', array('submit'=>array('site/uploadexcel'), 'style'=>'background:url(css/bg.gif)')); ?>



