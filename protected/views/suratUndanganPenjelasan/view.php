<?php
/* @var $this SuratUndanganPenjelasanController */
/* @var $model SuratUndanganPenjelasan */

$this->breadcrumbs=array(
	'Surat Undangan Penjelasans'=>array('index'),
	$model->id_dokumen,
);

$this->menu=array(
	array('label'=>'List SuratUndanganPenjelasan', 'url'=>array('index')),
	array('label'=>'Create SuratUndanganPenjelasan', 'url'=>array('create')),
	array('label'=>'Update SuratUndanganPenjelasan', 'url'=>array('update', 'id'=>$model->id_dokumen)),
	array('label'=>'Delete SuratUndanganPenjelasan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_dokumen),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SuratUndanganPenjelasan', 'url'=>array('admin')),
);
?>

<h1>View SuratUndanganPenjelasan #<?php echo $model->id_dokumen; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_dokumen',
		'nomor',
		'id_panitia',
		'sifat',
		'perihal',
		'hari_tanggal',
		'waktu',
		'tempat',
		'nama_pengadaan',
	),
)); ?>
