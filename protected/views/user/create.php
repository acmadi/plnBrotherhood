<?php
/* @var $this UserController */
/* @var $model User */

// $this->breadcrumbs=array(
	// 'Users'=>array('index'),
	// 'Create',
// );

$this->menu=array(
	array('label'=>'Daftar Pengguna', 'url'=>array('index')),
	array('label'=>'Kelola Pengguna', 'url'=>array('admin')),
);
?>

<h1>Tambah Pengguna</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>