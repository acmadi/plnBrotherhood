<?php
/* @var $this PengadaanController */
/* @var $model Pengadaan */

// $this->breadcrumbs=array(
	// 'Pengadaans'=>array('index'),
	// 'Create',
// );

$this->menu=array(
	array('label'=>'List Pengadaan', 'url'=>array('index')),
	array('label'=>'Manage Pengadaan', 'url'=>array('admin')),
);
?>

<h1>Create Pengadaan</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>