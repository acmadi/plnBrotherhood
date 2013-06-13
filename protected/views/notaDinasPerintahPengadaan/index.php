<?php
/* @var $this NotaDinasPerintahPengadaanController */
/* @var $dataProvider CActiveDataProvider */

// $this->breadcrumbs=array(
	// 'Nota Dinas Perintah Pengadaans',
// );

$this->menu=array(
	array('label'=>'Create NotaDinasPerintahPengadaan', 'url'=>array('create')),
	array('label'=>'Manage NotaDinasPerintahPengadaan', 'url'=>array('admin')),
);
?>

<h1>Nota Dinas Perintah Pengadaans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
