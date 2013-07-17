<?php
/* @var $this SiteController */

$category = Yii::app()->getRequest()->getQuery('category');
$chart = Yii::app()->getRequest()->getQuery('chart');
$detail = Yii::app()->getRequest()->getQuery('detail');

$this->pageTitle=Yii::app()->name . ' | Kontrol Anggaran';
?>

<div id="sidebar">
	<?php $this->beginWidget('zii.widgets.CPortlet'); ?>
	<ul>
		<li><?php echo CHtml::link('Kontrol Anggaran Total', array('site/statistik', 'category'=>'1', 'chart'=>'1')) ?></li>
		<li><?php echo CHtml::link('Kontrol Anggaran Divisi A', array('site/statistik', 'category'=>'2', 'chart'=>'1')) ?></li>
		<li><?php echo CHtml::link('Kontrol Anggaran Divisi B', array('site/statistik', 'category'=>'2', 'chart'=>'1')) ?></li>
	</ul>
	<?php $this->endWidget(); ?>
</div>

<div id="maincontent">
	<div id="menuform">
</div>