<?php
/* @var $this UserKontrakController */
/* @var $model UserKontrak */

$this->breadcrumbs=array(
	'User Kontraks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserKontrak', 'url'=>array('index')),
	array('label'=>'Manage UserKontrak', 'url'=>array('admin')),
);
?>

<h1>Create UserKontrak</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>