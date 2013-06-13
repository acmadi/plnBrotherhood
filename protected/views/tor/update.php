<?php
/* @var $this TorController */
/* @var $model Tor */

// $this->breadcrumbs=array(
	// 'Tors'=>array('index'),
	// $model->id_dokumen=>array('view','id'=>$model->id_dokumen),
	// 'Update',
// );

$this->menu=array(
	array('label'=>'List Tor', 'url'=>array('index')),
	array('label'=>'Create Tor', 'url'=>array('create')),
	array('label'=>'View Tor', 'url'=>array('view', 'id'=>$model->id_dokumen)),
	array('label'=>'Manage Tor', 'url'=>array('admin')),
);
?>

<h1>Update Tor <?php echo $model->id_dokumen; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>