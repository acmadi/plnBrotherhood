<?php
/* @var $this PengadaanController */
/* @var $model Pengadaan */

$this->breadcrumbs=array(
	'Pengadaans'=>array('index'),
	$model->id_pengadaan,
);

$this->menu=array(
	array('label'=>'List Pengadaan', 'url'=>array('index')),
	array('label'=>'Create Pengadaan', 'url'=>array('create')),
	array('label'=>'Update Pengadaan', 'url'=>array('update', 'id'=>$model->id_pengadaan)),
	array('label'=>'Delete Pengadaan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_pengadaan),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pengadaan', 'url'=>array('admin')),
);
?>

<h1>View Pengadaan #<?php echo $model->id_pengadaan; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_pengadaan',
		'divisi_peminta',
		'nama_pengadaan',
		'nama_penyedia',
		'tanggal_masuk',
		'tanggal_selesai',
		'status',
		'biaya',
		'kode_panitia',
		'metode_pengadaan',
		'metode_penawaran',
		'jenis_kualifikasi',
		'perihal_pengadaan',
	),
)); ?>
