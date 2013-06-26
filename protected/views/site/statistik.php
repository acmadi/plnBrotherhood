<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' | Statistik Pengadaan';
?>

<div id="sidebar">
	<?php $this->beginWidget('zii.widgets.CPortlet'); ?>
	<ul>
		<li><?php echo CHtml::link('Pengadaan per divisi', array('site/statistik', 'chart'=>'1')) ?></li>
	</ul>
	<?php $this->endWidget(); ?>
</div>

<div id="maincontent">
	<div id="menuform">
		<?php
		    $this->widget('zii.widgets.CMenu', array(
		        'items'=>array(
		                array('label'=>'Total', 'url'=>array('site/statistik', 'chart'=>'1')),
		                array('label'=>'Berlangsung', 'url'=>array('site/statistik', 'chart'=>'2')),
		                array('label'=>'Selesai', 'url'=>array('site/statistik', 'chart'=>'3')),
		                array('label'=>'Gagal', 'url'=>array('site/statistik', 'chart'=>'4')),
		        ),
		    ));
		?>
	</div>
	<br />
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