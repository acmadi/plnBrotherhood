<?php
/* @var $this PanitiaController */
/* @var $model Panitia */

$this->breadcrumbs=array(
	'Panitias'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Panitia', 'url'=>array('index')),
	array('label'=>'Manage Panitia', 'url'=>array('admin')),
);
?>

<h1>Create Panitia</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>