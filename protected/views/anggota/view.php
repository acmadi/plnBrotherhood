<?php
/* @var $this AnggotaController */
/* @var $model Anggota */

// $this->breadcrumbs=array(
	// 'Anggotas'=>array('index'),
	// $model->id,
// );

$this->menu=array(
	array('label'=>'Daftar Anggota', 'url'=>array('index')),
	array('label'=>'Tambah Anggota', 'url'=>array('create')),
	array('label'=>'Perbarui Anggota', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Hapus Anggota', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Apakah anda yakin menghapus pengguna ini?')),
	array('label'=>'Kelola Anggota', 'url'=>array('admin')),
);
?>

<h1>Lihat Anggota #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'NIP',
		'email',
		'id_panitia',
		'jabatan',
	),
)); ?>
