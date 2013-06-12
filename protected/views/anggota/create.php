<?php
/* @var $this AnggotaController */
/* @var $model Anggota */

$this->breadcrumbs=array(
	'Anggotas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Anggota', 'url'=>array('index')),
	array('label'=>'Manage Anggota', 'url'=>array('admin')),
);
?>

<h1>Create Anggota</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>