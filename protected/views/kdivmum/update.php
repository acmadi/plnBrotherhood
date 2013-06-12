<?php
/* @var $this KdivmumController */
/* @var $model Kdivmum */

$this->breadcrumbs=array(
	'Kdivmums'=>array('index'),
	$model->username=>array('view','id'=>$model->username),
	'Update',
);

$this->menu=array(
	array('label'=>'List Kdivmum', 'url'=>array('index')),
	array('label'=>'Create Kdivmum', 'url'=>array('create')),
	array('label'=>'View Kdivmum', 'url'=>array('view', 'id'=>$model->username)),
	array('label'=>'Manage Kdivmum', 'url'=>array('admin')),
);
?>

<h1>Update Kdivmum <?php echo $model->username; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>