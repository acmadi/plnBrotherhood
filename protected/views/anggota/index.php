<?php
/* @var $this AnggotaController */
/* @var $dataProvider CActiveDataProvider */

// $this->breadcrumbs=array(
	// 'Anggotas',
// );

$this->menu=array(
	array('label'=>'Tambah Anggota', 'url'=>array('create')),
	array('label'=>'Kelola Anggota', 'url'=>array('admin')),
);
?>

<h1>Daftar Anggota</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
