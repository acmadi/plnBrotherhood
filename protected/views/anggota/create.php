<?php
/* @var $this AnggotaController */
/* @var $model Anggota */

// $this->breadcrumbs=array(
	// 'Anggotas'=>array('index'),
	// 'Create',
// );

$this->menu=array(
	array('label'=>'Daftar Anggota', 'url'=>array('index')),
	array('label'=>'Kelola Anggota', 'url'=>array('admin')),
);
?>

<h1>Tambah Anggota</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>