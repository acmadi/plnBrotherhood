<?php
/* @var $this PanitiaController */
/* @var $model Panitia */

// $this->breadcrumbs=array(
	// 'Panitias'=>array('index'),
	// 'Create',
// );

$this->menu=array(
	array('label'=>'Daftar Panitia', 'url'=>array('index')),
	array('label'=>'Kelola Panitia', 'url'=>array('admin')),
);
?>

<h1>Tambah Panitia</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>