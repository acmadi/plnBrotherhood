<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' | Statistik Pengadaan';
?>

<div id="sidebar">
	<?php $this->beginWidget('zii.widgets.CPortlet'); ?>
	<ul>
		<li><?php echo CHtml::link('Pengadaan per divisi', array('site/statistik')) ?></li>
		<li><?php echo CHtml::link('Status pengadaan', array('site/statistik')) ?></li>
	</ul>
	<?php $this->endWidget(); ?>
</div>

<div id="maincontent">
	<?php $this->widget('HighchartsWidget', array(
			'options'=>array(
				'tooltip'=>array(
					'formatter'=>'js:function() {return "<b>"+ this.point.name +"</b>: "+ this.percentage +" %";}',
				),
				'title'=>array('text'=>$title),
				'subtitle'=>array('text'=>$subtitle),
				'series'=>array(
					array(
						'type'=>'pie',
						'name'=>'username',
						'data'=>$dataProvider,
					),
				),
			),
		));
	?>
</div>