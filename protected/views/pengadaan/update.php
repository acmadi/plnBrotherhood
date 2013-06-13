<?php
/* @var $this PengadaanController */
/* @var $model Pengadaan */

// $this->breadcrumbs=array(
	// 'Pengadaans'=>array('index'),
	// $model->id_pengadaan=>array('view','id'=>$model->id_pengadaan),
	// 'Update',
// );

$this->menu=array(
	array('label'=>'List Pengadaan', 'url'=>array('index')),
	array('label'=>'Create Pengadaan', 'url'=>array('create')),
	array('label'=>'View Pengadaan', 'url'=>array('view', 'id'=>$model->id_pengadaan)),
	array('label'=>'Manage Pengadaan', 'url'=>array('admin')),
);
?>

<h1>Update Pengadaan <?php echo $model->id_pengadaan; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>