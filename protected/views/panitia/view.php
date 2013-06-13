<?php
/* @var $this PanitiaController */
/* @var $model Panitia */

// $this->breadcrumbs=array(
	// 'Panitias'=>array('index'),
	// $model->id_panitia,
// );

$this->menu=array(
	array('label'=>'List Panitia', 'url'=>array('index')),
	array('label'=>'Create Panitia', 'url'=>array('create')),
	array('label'=>'Update Panitia', 'url'=>array('update', 'id'=>$model->id_panitia)),
	array('label'=>'Delete Panitia', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_panitia),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Panitia', 'url'=>array('admin')),
);
?>

<h1>View Panitia #<?php echo $model->id_panitia; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_panitia',
		'nama_panitia',
		'tahun',
		'jumlah_panitia',
		'status_panitia',
	),
)); ?>
