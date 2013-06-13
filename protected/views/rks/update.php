<?php
/* @var $this RksController */
/* @var $model Rks */

/*$this->breadcrumbs=array(
	'Rks'=>array('index'),
	$model->id_dokumen=>array('view','id'=>$model->id_dokumen),
	'Update',
);*/

$this->menu=array(
	array('label'=>'List Rks', 'url'=>array('index')),
	array('label'=>'Create Rks', 'url'=>array('create')),
	array('label'=>'View Rks', 'url'=>array('view', 'id'=>$model->id_dokumen)),
	array('label'=>'Manage Rks', 'url'=>array('admin')),
);
?>

<h1>Update Rks <?php echo $model->id_dokumen; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>