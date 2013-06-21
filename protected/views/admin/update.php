<?php
/* @var $this AdminController */
/* @var $model Admin */

// $this->breadcrumbs=array(
	// 'Admins'=>array('index'),
	// $model->username=>array('view','id'=>$model->username),
	// 'Update',
// );

$this->menu=array(
	array('label'=>'Daftar Admin', 'url'=>array('index')),
	array('label'=>'Tambah Admin', 'url'=>array('create')),
	array('label'=>'Lihat Admin', 'url'=>array('view', 'id'=>$model->username)),
	array('label'=>'Kelola Admin', 'url'=>array('admin')),
);
?>

<h1>Perbarui Admin : <?php echo $model->username; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>