<?php
/* @var $this KdivmumController */
/* @var $model Kdivmum */

// $this->breadcrumbs=array(
	// 'Kdivmums'=>array('index'),
	// $model->username=>array('view','id'=>$model->username),
	// 'Update',
// );

$this->menu=array(
	array('label'=>'Daftar KDIVMUM / MSDAF', 'url'=>array('index')),
	array('label'=>'Tambah KDIVMUM / MSDAF', 'url'=>array('create')),
	array('label'=>'Lihat KDIVMUM / MSDAF', 'url'=>array('view', 'id'=>$model->username)),
	array('label'=>'Kelola KDIVMUM / MSDAF', 'url'=>array('admin')),
);
?>

<h1>Perbarui KDIVMUM / MSDAF : <?php echo $model->username; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>