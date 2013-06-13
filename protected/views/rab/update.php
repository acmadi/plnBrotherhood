<?php
/* @var $this RabController */
/* @var $model Rab */

$this->breadcrumbs=array(
	'Rabs'=>array('index'),
	$model->id_dokumen=>array('view','id'=>$model->id_dokumen),
	'Update',
);

$this->menu=array(
	array('label'=>'List Rab', 'url'=>array('index')),
	array('label'=>'Create Rab', 'url'=>array('create')),
	array('label'=>'View Rab', 'url'=>array('view', 'id'=>$model->id_dokumen)),
	array('label'=>'Manage Rab', 'url'=>array('admin')),
);
?>

<h1>Update Rab <?php echo $model->id_dokumen; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>