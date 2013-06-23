<?php
/* @var $this PanitiaController */
/* @var $model Panitia */

// $this->breadcrumbs=array(
	// 'Panitias'=>array('index'),
	// $model->id_panitia,
// );

$this->menu=array(
	array('label'=>'Daftar Panitia', 'url'=>array('index')),
	array('label'=>'Tambah Panitia', 'url'=>array('create')),
	array('label'=>'Perbarui Panitia', 'url'=>array('update', 'id'=>$model->id_panitia)),
	array('label'=>'Hapus Panitia', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_panitia),'confirm'=>'Apakah anda yakin menghapus pengguna ini?')),
	array('label'=>'Kelola Panitia', 'url'=>array('admin')),
);
?>

<h1>Lihat Panitia #<?php echo $model->id_panitia; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_panitia',
		'nama_panitia',
		'SK_panitia',
		'tahun',
		'jumlah_anggota',
		'status_panitia',
		'jenis_panitia',
	),
)); ?>
