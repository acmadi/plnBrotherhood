<?php
/* @var $this NotaDinasPermintaanController */
/* @var $model NotaDinasPermintaan */

// $this->breadcrumbs=array(
	// 'Nota Dinas Permintaans'=>array('index'),
	// $model->id_dokumen,
// );

$this->menu=array(
	array('label'=>'List NotaDinasPermintaan', 'url'=>array('index')),
	array('label'=>'Create NotaDinasPermintaan', 'url'=>array('create')),
	array('label'=>'Update NotaDinasPermintaan', 'url'=>array('update', 'id'=>$model->id_dokumen)),
	array('label'=>'Delete NotaDinasPermintaan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_dokumen),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage NotaDinasPermintaan', 'url'=>array('admin')),
);
?>

<h1>View NotaDinasPermintaan #<?php echo $model->id_dokumen; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_dokumen',
		'nomor',
	),
)); ?>
