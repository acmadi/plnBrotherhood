<?php
/* @var $this NotaDinasPerintahPengadaanController */
/* @var $model NotaDinasPerintahPengadaan */

// $this->breadcrumbs=array(
	// 'Nota Dinas Perintah Pengadaans'=>array('index'),
	// $model->id_dokumen=>array('view','id'=>$model->id_dokumen),
	// 'Update',
// );

$this->menu=array(
	array('label'=>'List NotaDinasPerintahPengadaan', 'url'=>array('index')),
	array('label'=>'Create NotaDinasPerintahPengadaan', 'url'=>array('create')),
	array('label'=>'View NotaDinasPerintahPengadaan', 'url'=>array('view', 'id'=>$model->id_dokumen)),
	array('label'=>'Manage NotaDinasPerintahPengadaan', 'url'=>array('admin')),
);
?>

<h1>Update NotaDinasPerintahPengadaan <?php echo $model->id_dokumen; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>