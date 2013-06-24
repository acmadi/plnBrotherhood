<?php
/* @var $this AdminController */
/* @var $dataProvider CActiveDataProvider */

// $this->breadcrumbs=array(
	// 'Admins',
// );

$this->menu=array(
	array('label'=>'Tambah Admin', 'url'=>array('create')),
	array('label'=>'Kelola Admin', 'url'=>array('admin')),
);
?>

<h1>Daftar Admin</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
