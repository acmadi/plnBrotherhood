<?php
/* @var $this NotaDinasPermintaanController */
/* @var $model NotaDinasPermintaan */

// $this->breadcrumbs=array(
	// 'Nota Dinas Permintaans'=>array('index'),
	// 'Create',
// );

$this->menu=array(
	array('label'=>'List NotaDinasPermintaan', 'url'=>array('index')),
	array('label'=>'Manage NotaDinasPermintaan', 'url'=>array('admin')),
);
?>

<h1>Create NotaDinasPermintaan</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>