<?php
/* @var $this DokumenController */
/* @var $model Dokumen */

$this->breadcrumbs=array(
	'Dokumens'=>array('index'),
	$model->id_dokumen,
);

$this->menu=array(
	array('label'=>'List Dokumen', 'url'=>array('index')),
	array('label'=>'Create Dokumen', 'url'=>array('create')),
	array('label'=>'Update Dokumen', 'url'=>array('update', 'id'=>$model->id_dokumen)),
	array('label'=>'Delete Dokumen', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_dokumen),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Dokumen', 'url'=>array('admin')),
);
?>

<h1>View Dokumen #<?php echo $model->id_dokumen; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_dokumen',
		'nama_dokumen',
		'tanggal',
		'tempat',
		'id_pengadaan',
		'status_upload',
	),
)); ?>
