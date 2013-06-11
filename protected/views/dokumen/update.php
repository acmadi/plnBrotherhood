<?php
/* @var $this DokumenController */
/* @var $model Dokumen */

// $this->breadcrumbs=array(
// 	'Dokumens'=>array('index'),
// 	$model->id_dokumen=>array('view','id'=>$model->id_dokumen),
// 	'Update',
// );

$this->menu=array(
	array('label'=>'List Dokumen', 'url'=>array('index')),
	array('label'=>'Create Dokumen', 'url'=>array('create')),
	array('label'=>'View Dokumen', 'url'=>array('view', 'id'=>$model->id_dokumen)),
	array('label'=>'Manage Dokumen', 'url'=>array('admin')),
);
?>

<h1>Update Dokumen <?php echo $model->id_dokumen; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>