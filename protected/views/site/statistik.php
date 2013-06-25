<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' | Statistik Pengadaan';
?>

<?php $this->widget('EAmChartWidget', array(
		'width'=>500,
		'height'=>500,
		'chart'=>array(
			'dataProvider'=>Pengadaan::model()->search(),
			'categoryField'=>'id_pengadaan',
			'type'=>'pie',
		),
	));
?>