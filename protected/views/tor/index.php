<?php
/* @var $this TorController */
/* @var $dataProvider CActiveDataProvider */

// $this->breadcrumbs=array(
	// 'Tors',
// );

$this->menu=array(
	array('label'=>'Create Tor', 'url'=>array('create')),
	array('label'=>'Manage Tor', 'url'=>array('admin')),
);
?>

<h1>Tors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
