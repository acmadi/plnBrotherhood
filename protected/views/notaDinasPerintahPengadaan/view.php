<?php
/* @var $this NotaDinasPerintahPengadaanController */
/* @var $model NotaDinasPerintahPengadaan */

// $this->breadcrumbs=array(
	// 'Nota Dinas Perintah Pengadaans'=>array('index'),
	// $model->id_dokumen,
// );

$this->menu=array(
	array('label'=>'List NotaDinasPerintahPengadaan', 'url'=>array('index')),
	array('label'=>'Create NotaDinasPerintahPengadaan', 'url'=>array('create')),
	array('label'=>'Update NotaDinasPerintahPengadaan', 'url'=>array('update', 'id'=>$model->id_dokumen)),
	array('label'=>'Delete NotaDinasPerintahPengadaan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_dokumen),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage NotaDinasPerintahPengadaan', 'url'=>array('admin')),
);
?>

<h1>View NotaDinasPerintahPengadaan #<?php echo $model->id_dokumen; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_dokumen',
		'nota_dinas_permintaan',
		'nomor',
		'dari',
		'kepada',
		'perilhal',
		'RAB',
		'targetSPK_kontrak',
		'sumber_dana',
		'pagu_anggaran',
	),
)); ?>
