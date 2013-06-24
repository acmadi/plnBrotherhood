<?php
/* @var $this PanitiaController */
/* @var $dataProvider CActiveDataProvider */

// $this->breadcrumbs=array(
	// 'Panitias',
// );

$this->menu=array(
	array('label'=>'Tambah Panitia', 'url'=>array('create')),
	array('label'=>'Kelola Panitia', 'url'=>array('admin')),
);
?>

<h1>Daftar Panitia</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
