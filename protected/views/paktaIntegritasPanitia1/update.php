<?php
/* @var $this PaktaIntegritasPanitia1Controller */
/* @var $model PaktaIntegritasPanitia1 */

$this->breadcrumbs=array(
	'Pakta Integritas Panitia1s'=>array('index'),
	$model->id_dokumen=>array('view','id'=>$model->id_dokumen),
	'Update',
);

$this->menu=array(
	array('label'=>'List PaktaIntegritasPanitia1', 'url'=>array('index')),
	array('label'=>'Create PaktaIntegritasPanitia1', 'url'=>array('create')),
	array('label'=>'View PaktaIntegritasPanitia1', 'url'=>array('view', 'id'=>$model->id_dokumen)),
	array('label'=>'Manage PaktaIntegritasPanitia1', 'url'=>array('admin')),
);
?>

<h1>Update PaktaIntegritasPanitia1 <?php echo $model->id_dokumen; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>