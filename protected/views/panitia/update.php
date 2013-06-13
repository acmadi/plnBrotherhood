<?php
/* @var $this PanitiaController */
/* @var $model Panitia */

// $this->breadcrumbs=array(
	// 'Panitias'=>array('index'),
	// $model->id_panitia=>array('view','id'=>$model->id_panitia),
	// 'Update',
// );

$this->menu=array(
	array('label'=>'List Panitia', 'url'=>array('index')),
	array('label'=>'Create Panitia', 'url'=>array('create')),
	array('label'=>'View Panitia', 'url'=>array('view', 'id'=>$model->id_panitia)),
	array('label'=>'Manage Panitia', 'url'=>array('admin')),
);
?>

<h1>Update Panitia <?php echo $model->id_panitia; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>