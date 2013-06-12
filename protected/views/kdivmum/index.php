<?php
/* @var $this KdivmumController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Kdivmums',
);

$this->menu=array(
	array('label'=>'Create Kdivmum', 'url'=>array('create')),
	array('label'=>'Manage Kdivmum', 'url'=>array('admin')),
);
?>

<h1>Kdivmums</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
