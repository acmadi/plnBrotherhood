<?php
/* @var $this AnggotaController */
/* @var $model Anggota */

$this->breadcrumbs=array(
	'Anggotas'=>array('index'),
	$model->username=>array('view','id'=>$model->username),
	'Update',
);

$this->menu=array(
	array('label'=>'List Anggota', 'url'=>array('index')),
	array('label'=>'Create Anggota', 'url'=>array('create')),
	array('label'=>'View Anggota', 'url'=>array('view', 'id'=>$model->username)),
	array('label'=>'Manage Anggota', 'url'=>array('admin')),
);
?>

<h1>Update Anggota <?php echo $model->username; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>