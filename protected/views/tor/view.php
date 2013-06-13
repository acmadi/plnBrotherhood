<?php
/* @var $this TorController */
/* @var $model Tor */

// $this->breadcrumbs=array(
	// 'Tors'=>array('index'),
	// $model->id_dokumen,
// );

$this->menu=array(
	array('label'=>'List Tor', 'url'=>array('index')),
	array('label'=>'Create Tor', 'url'=>array('create')),
	array('label'=>'Update Tor', 'url'=>array('update', 'id'=>$model->id_dokumen)),
	array('label'=>'Delete Tor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_dokumen),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tor', 'url'=>array('admin')),
);
?>

<h1>View Tor #<?php echo $model->id_dokumen; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_dokumen',
	),
)); ?>
