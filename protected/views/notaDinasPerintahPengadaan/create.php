<?php
/* @var $this NotaDinasPerintahPengadaanController */
/* @var $model NotaDinasPerintahPengadaan */

// $this->breadcrumbs=array(
	// 'Nota Dinas Perintah Pengadaans'=>array('index'),
	// 'Create',
// );

$this->menu=array(
	array('label'=>'List NotaDinasPerintahPengadaan', 'url'=>array('index')),
	array('label'=>'Manage NotaDinasPerintahPengadaan', 'url'=>array('admin')),
);
?>

<h1>Create NotaDinasPerintahPengadaan</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>