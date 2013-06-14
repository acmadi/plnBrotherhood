<?php
/* @var $this RabController */
/* @var $model Rab */

$this->breadcrumbs=array(
	'Rabs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Rab', 'url'=>array('index')),
	array('label'=>'Manage Rab', 'url'=>array('admin')),
);
?>

<h1>Create Rab</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>