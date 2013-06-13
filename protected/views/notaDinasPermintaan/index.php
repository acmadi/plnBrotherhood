<?php
/* @var $this NotaDinasPermintaanController */
/* @var $dataProvider CActiveDataProvider */

// $this->breadcrumbs=array(
	// 'Nota Dinas Permintaans',
// );

$this->menu=array(
	array('label'=>'Create NotaDinasPermintaan', 'url'=>array('create')),
	array('label'=>'Manage NotaDinasPermintaan', 'url'=>array('admin')),
);
?>

<h1>Nota Dinas Permintaans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
