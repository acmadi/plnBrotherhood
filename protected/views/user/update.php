<?php
/* @var $this UserController */
/* @var $model User */

// $this->breadcrumbs=array(
	// 'Users'=>array('index'),
	// $model->username=>array('view','id'=>$model->username),
	// 'Update',
// );

$this->menu=array(
	array('label'=>'Daftar Pengguna', 'url'=>array('index')),
	array('label'=>'Tambah Pengguna', 'url'=>array('create')),
	array('label'=>'Lihat Pengguna', 'url'=>array('view', 'id'=>$model->username)),
	array('label'=>'Kelola Pengguna', 'url'=>array('admin')),
);
?>

<h1>Perbarui Pengguna : <?php echo $model->username; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>