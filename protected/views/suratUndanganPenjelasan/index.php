<?php
/* @var $this SuratUndanganPenjelasanController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Surat Undangan Penjelasans',
);

$this->menu=array(
	array('label'=>'Create SuratUndanganPenjelasan', 'url'=>array('create')),
	array('label'=>'Manage SuratUndanganPenjelasan', 'url'=>array('admin')),
);
?>

<h1>Surat Undangan Penjelasans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
