<?php
/* @var $this UserController */
/* @var $model User */

// $this->breadcrumbs=array(
	// 'Users'=>array('index'),
	// $model->username,
// );

$this->menu=array(
	array('label'=>'Daftar Pengguna', 'url'=>array('index')),
	array('label'=>'Tambah Pengguna', 'url'=>array('create')),
	array('label'=>'Perbarui Pengguna', 'url'=>array('update', 'id'=>$model->username)),
	array('label'=>'Hapus Pengguna', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->username),'confirm'=>'Apakah anda yakin menghapus pengguna ini?')),
	array('label'=>'Kelola Pengguna', 'url'=>array('admin')),
);
?>

<h1>Lihat Pengguna #<?php echo $model->username; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'username',
		'nama',
		'divisi',
		'status_user',
	),
)); ?>
