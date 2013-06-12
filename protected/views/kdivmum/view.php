<?php
/* @var $this KdivmumController */
/* @var $model Kdivmum */

$this->breadcrumbs=array(
	'Kdivmums'=>array('index'),
	$model->username,
);

$this->menu=array(
	array('label'=>'List Kdivmum', 'url'=>array('index')),
	array('label'=>'Create Kdivmum', 'url'=>array('create')),
	array('label'=>'Update Kdivmum', 'url'=>array('update', 'id'=>$model->username)),
	array('label'=>'Delete Kdivmum', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->username),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Kdivmum', 'url'=>array('admin')),
);
?>

<h1>View Kdivmum #<?php echo $model->username; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'username',
		'NIP',
		'email',
	),
)); ?>
