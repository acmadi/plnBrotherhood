<?php
/* @var $this KdivmumController */
/* @var $model Kdivmum */

// $this->breadcrumbs=array(
	// 'Kdivmums'=>array('index'),
	// $model->username,
// );

$this->menu=array(
	array('label'=>'Daftar KDIVMUM / MSDAF', 'url'=>array('index')),
	array('label'=>'Tambah KDIVMUM / MSDAF', 'url'=>array('create')),
	array('label'=>'Perbarui KDIVMUM / MSDAF', 'url'=>array('update', 'id'=>$model->username)),
	array('label'=>'Hapus KDIVMUM / MSDAF', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->username),'Apakah anda yakin menghapus pengguna ini?')),
	array('label'=>'Kelola KDIVMUM / MSDAF', 'url'=>array('admin')),
);
?>

<h1>Lihat KDIVMUM / MSDAF #<?php echo $model->username; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'username',
		'NIP',
		'email',
	),
)); ?>
