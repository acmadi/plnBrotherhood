<?php
/* @var $this AnggotaController */
/* @var $model Anggota */

// $this->breadcrumbs=array(
	// 'Anggotas'=>array('index'),
	// $model->id,
// );

$this->menu=array(
	array('label'=>'List Anggota', 'url'=>array('index')),
	array('label'=>'Create Anggota', 'url'=>array('create')),
	array('label'=>'Update Anggota', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Anggota', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Anggota', 'url'=>array('admin')),
);
?>

<h1>View Anggota #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'NIP',
		'email',
		'id_panitia',
	),
)); ?>
