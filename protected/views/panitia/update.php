<?php
/* @var $this PanitiaController */
/* @var $model Panitia */

// $this->breadcrumbs=array(
	// 'Panitias'=>array('index'),
	// $model->id_panitia=>array('view','id'=>$model->id_panitia),
	// 'Update',
// );

$this->menu=array(
	array('label'=>'Daftar Panitia', 'url'=>array('index')),
	array('label'=>'Tambah Panitia', 'url'=>array('create')),
	array('label'=>'Lihat Panitia', 'url'=>array('view', 'id'=>$model->id_panitia)),
	array('label'=>'Kelola Panitia', 'url'=>array('admin')),
);
?>

<h1>Perbarui Panitia : <?php echo $model->id_panitia; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>