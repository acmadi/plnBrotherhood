<?php
/* @var $this AdminController */
/* @var $model Admin */

// $this->breadcrumbs=array(
	// 'Admins'=>array('index'),
	// $model->username,
// );

$this->menu=array(
	array('label'=>'Daftar Admin', 'url'=>array('index')),
	array('label'=>'Tambah Admin', 'url'=>array('create')),
	array('label'=>'Perbarui Admin', 'url'=>array('update', 'id'=>$model->username)),
	array('label'=>'Hapus Admin', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->username),'confirm'=>'Apakah anda yakin menghapus pengguna ini?')),
	array('label'=>'Kelola Admin', 'url'=>array('admin')),
);
?>

<h1>Lihat Admin #<?php echo $model->username; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'username',
	),
)); ?>
