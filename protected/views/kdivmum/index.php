<?php
/* @var $this KdivmumController */
/* @var $dataProvider CActiveDataProvider */

// $this->breadcrumbs=array(
	// 'Kdivmums',
// );

$this->menu=array(
	array('label'=>'Tambah KDIVMUM / MSDAF', 'url'=>array('create')),
	array('label'=>'Kelola KDIVMUM / MSDAF', 'url'=>array('admin')),
);
?>

<h1>Daftar KDIVMUM / MSDAF</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
