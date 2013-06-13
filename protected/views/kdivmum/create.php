<?php
/* @var $this KdivmumController */
/* @var $model Kdivmum */

//$this->breadcrumbs=array(
	//'Kdivmums'=>array('index'),
	//'Create',
//);

$this->menu=array(
	array('label'=>'List Kdivmum', 'url'=>array('index')),
	array('label'=>'Manage Kdivmum', 'url'=>array('admin')),
);
?>

<h1>Create Kdivmum</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>