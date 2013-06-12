<?php
/* @var $this PaktaIntegritasPanitia1Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pakta Integritas Panitia1s',
);

$this->menu=array(
	array('label'=>'Create PaktaIntegritasPanitia1', 'url'=>array('create')),
	array('label'=>'Manage PaktaIntegritasPanitia1', 'url'=>array('admin')),
);
?>

<h1>Pakta Integritas Panitia1s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
