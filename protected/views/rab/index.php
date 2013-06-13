<?php
/* @var $this RabController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Rabs',
);

$this->menu=array(
	array('label'=>'Create Rab', 'url'=>array('create')),
	array('label'=>'Manage Rab', 'url'=>array('admin')),
);
?>

<h1>Rabs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
