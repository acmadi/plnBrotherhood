<?php
/* @var $this TorController */
/* @var $model Tor */

// $this->breadcrumbs=array(
	// 'Tors'=>array('index'),
	// 'Create',
// );

$this->menu=array(
	array('label'=>'List Tor', 'url'=>array('index')),
	array('label'=>'Manage Tor', 'url'=>array('admin')),
);
?>

<h1>Create Tor</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>