<?php
/* @var $this PanitiaController */
/* @var $dataProvider CActiveDataProvider */

// $this->breadcrumbs=array(
	// 'Panitias',
// );

$this->menu=array(
	array('label'=>'Create Panitia', 'url'=>array('create')),
	array('label'=>'Manage Panitia', 'url'=>array('admin')),
);
?>

<h1>Panitias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
