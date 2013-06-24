<?php
/* @var $this UserKontrakController */
/* @var $model UserKontrak */

$this->breadcrumbs=array(
	'User Kontraks'=>array('index'),
	$model->id_user_kontrak,
);

$this->menu=array(
	array('label'=>'List UserKontrak', 'url'=>array('index')),
	array('label'=>'Create UserKontrak', 'url'=>array('create')),
	array('label'=>'Update UserKontrak', 'url'=>array('update', 'id'=>$model->id_user_kontrak)),
	array('label'=>'Delete UserKontrak', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_user_kontrak),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserKontrak', 'url'=>array('admin')),
);
?>

<h1>View UserKontrak #<?php echo $model->id_user_kontrak; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_user_kontrak',
		'username',
	),
)); ?>
