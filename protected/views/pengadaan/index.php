<?php
/* @var $this PengadaanController */
/* @var $dataProvider CActiveDataProvider */

// $this->breadcrumbs=array(
	// 'Pengadaans',
// );

$this->menu=array(
	array('label'=>'Create Pengadaan', 'url'=>array('create')),
	array('label'=>'Manage Pengadaan', 'url'=>array('admin')),
);
?>

<h1>Pengadaans</h1>

<?php $this->widget('zii.widgets.CGridView', array(
	'dataProvider'=>new CArrayDataProvider('Pengadaan'),
	'columns'=>array(
		'id_pengadaan',
	),
)); ?>
