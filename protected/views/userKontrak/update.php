<?php
/* @var $this UserKontrakController */
/* @var $model UserKontrak */

$this->breadcrumbs=array(
	'User Kontraks'=>array('index'),
	$model->id_user_kontrak=>array('view','id'=>$model->id_user_kontrak),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserKontrak', 'url'=>array('index')),
	array('label'=>'Create UserKontrak', 'url'=>array('create')),
	array('label'=>'View UserKontrak', 'url'=>array('view', 'id'=>$model->id_user_kontrak)),
	array('label'=>'Manage UserKontrak', 'url'=>array('admin')),
);
?>

<h1>Update UserKontrak <?php echo $model->id_user_kontrak; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>