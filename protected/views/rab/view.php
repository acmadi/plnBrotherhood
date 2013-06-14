<?php
/* @var $this RabController */
/* @var $model Rab */

$this->breadcrumbs=array(
	'Rabs'=>array('index'),
	$model->id_dokumen,
);

$this->menu=array(
	array('label'=>'List Rab', 'url'=>array('index')),
	array('label'=>'Create Rab', 'url'=>array('create')),
	array('label'=>'Update Rab', 'url'=>array('update', 'id'=>$model->id_dokumen)),
	array('label'=>'Delete Rab', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_dokumen),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Rab', 'url'=>array('admin')),
);
?>

<h1>View Rab #<?php echo $model->id_dokumen; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_dokumen',
	),
)); ?>
