<?php
/* @var $this NotaDinasPermintaanController */
/* @var $model NotaDinasPermintaan */

// $this->breadcrumbs=array(
	// 'Nota Dinas Permintaans'=>array('index'),
	// $model->id_dokumen=>array('view','id'=>$model->id_dokumen),
	// 'Update',
// );

$this->menu=array(
	array('label'=>'List NotaDinasPermintaan', 'url'=>array('index')),
	array('label'=>'Create NotaDinasPermintaan', 'url'=>array('create')),
	array('label'=>'View NotaDinasPermintaan', 'url'=>array('view', 'id'=>$model->id_dokumen)),
	array('label'=>'Manage NotaDinasPermintaan', 'url'=>array('admin')),
);
?>

<h1>Update NotaDinasPermintaan <?php echo $model->id_dokumen; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>