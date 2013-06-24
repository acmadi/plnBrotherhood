<?php
/* @var $this UserKontrakController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'User Kontraks',
);

$this->menu=array(
	array('label'=>'Create UserKontrak', 'url'=>array('create')),
	array('label'=>'Manage UserKontrak', 'url'=>array('admin')),
);
?>

<h1>User Kontraks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
