<?php
/* @var $this RksController */
/* @var $model Rks */

/*$this->breadcrumbs=array(
	'Rks'=>array('index'),
	'Create',
);*/

$this->menu=array(
	array('label'=>'List Rks', 'url'=>array('index')),
	array('label'=>'Manage Rks', 'url'=>array('admin')),
);
?>

<h1>Create Rks</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>