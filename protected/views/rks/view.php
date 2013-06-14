<?php
/* @var $this RksController */
/* @var $model Rks */

/*$this->breadcrumbs=array(
	'Rks'=>array('index'),
	$model->id_dokumen,
);*/

$this->menu=array(
	array('label'=>'List Rks', 'url'=>array('index')),
	array('label'=>'Create Rks', 'url'=>array('create')),
	array('label'=>'Update Rks', 'url'=>array('update', 'id'=>$model->id_dokumen)),
	array('label'=>'Delete Rks', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_dokumen),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Rks', 'url'=>array('admin')),
);
?>

<h1>View Rks #<?php echo $model->id_dokumen; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_dokumen',
		'nomor',
	),
)); ?>
