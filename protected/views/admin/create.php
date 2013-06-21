<?php
/* @var $this AdminController */
/* @var $model Admin */

// $this->breadcrumbs=array(
	// 'Admins'=>array('index'),
	// 'Create',
// );

$this->menu=array(
	array('label'=>'Daftar Admin', 'url'=>array('index')),
	array('label'=>'Tambah Admin', 'url'=>array('admin')),
);
?>

<h1>Tambah Admin</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>