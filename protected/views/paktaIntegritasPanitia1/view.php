<?php
/* @var $this PaktaIntegritasPanitia1Controller */
/* @var $model PaktaIntegritasPanitia1 */

// $this->breadcrumbs=array(
	// 'Pakta Integritas Panitia1s'=>array('index'),
	// $model->id_dokumen,
// );

$this->menu=array(
	array('label'=>'List PaktaIntegritasPanitia1', 'url'=>array('index')),
	array('label'=>'Create PaktaIntegritasPanitia1', 'url'=>array('create')),
	array('label'=>'Update PaktaIntegritasPanitia1', 'url'=>array('update', 'id'=>$model->id_dokumen)),
	array('label'=>'Delete PaktaIntegritasPanitia1', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_dokumen),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PaktaIntegritasPanitia1', 'url'=>array('admin')),
);
?>

<h1>View PaktaIntegritasPanitia1 #<?php echo $model->id_dokumen; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_dokumen',
		'kode_panitia',
		'nama',
	),
)); ?>
