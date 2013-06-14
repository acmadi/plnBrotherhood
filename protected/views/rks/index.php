<?php
/* @var $this RksController */
/* @var $dataProvider CActiveDataProvider */

/*$this->breadcrumbs=array(
	'Rks',
);*/

$this->menu=array(
	array('label'=>'Create Rks', 'url'=>array('create')),
	array('label'=>'Manage Rks', 'url'=>array('admin')),
);
?>

<h1>Rks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
