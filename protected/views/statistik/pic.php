<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' | Statistik Pengadaan per Divisi';
?>

<div id="sidebar">
	<?php $this->beginWidget('zii.widgets.CPortlet'); ?>
	<ul>
		<li><?php echo CHtml::link('Pengadaan per divisi', array('statistik/divisi', 'chart'=>'1')) ?></li>
		<li class="onprogress"><?php echo CHtml::link('Pengadaan per PIC', array('statistik/pic', 'chart'=>'1')) ?></li>
		<li><?php echo CHtml::link('Pengadaan per metode pengadaan', array('statistik/metode', 'chart'=>'1')) ?></li>
	</ul>
	<?php $this->endWidget(); ?>
</div>

<div id="maincontent">
	<div id="menuform">
		<?php $this->widget('zii.widgets.CMenu', array(
			'items'=>array(
				array('label'=>'Berlangsung', 'url'=>array('statistik/pic', 'chart'=>'1')),
				array('label'=>'Selesai', 'url'=>array('statistik/pic', 'chart'=>'2')),
				array('label'=>'Gagal', 'url'=>array('statistik/pic', 'chart'=>'3')),
				array('label'=>'Total', 'url'=>array('statistik/pic', 'chart'=>'4')),
			),
		));
		?>
	</div>
	<br />
	<h4>Jumlah pengadaan: <?php echo $total; ?></h4>
	<?php $this->widget('HighchartsWidget', array(
			'options'=>array(
				'tooltip'=>array(
					'formatter'=>'js:function() {return this.percentage +" %";}',
				),
				'title'=>array('text'=>$chart == '1' ? 'Pengadaan yang sedang berlangsung' : ($chart == '2' ? 'Pengadaan yang sudah selesai' : ($chart == '3' ? 'Pengadaan yang gagal' : 'Pengadaan total'))),
				'subtitle'=>array('text'=>'per divisi'),
				'plotOptions'=>array(
					'pie'=>array(
						'dataLabels'=>array(
							'formatter'=>'js:function() {return "<b>" + this.point.name + "</b><br />  " + this.y;}',
						),
						'events'=>array(
							'click'=>'js:function(event) {window.location="' . Yii::app()->createUrl('statistik/pic') . '&chart=' . $chart . '&detail=' . '" + event.point.name;}',
						),
					),
				),
				'series'=>array(
					array(
						'type'=>'pie',
						'name'=>'username',
						'data'=>$data,
					),
				),
			),
		));
	?>
	<?php
		if (isset($detail)) {
			echo '<br />';
			echo '<br />';
			echo '<h3>' . Panitia::model()->findByAttributes(array('nama_panitia'=>$detail))->nama_panitia . '</h3>';
			$pan = Panitia::model()->find('nama_panitia = "' . $detail . '"')->id_panitia;
			$this->widget('zii.widgets.grid.CGridView', array(
				'dataProvider'=>Pengadaan::model()->searchStatistikPanitia($pan, $chart),
				"ajaxUpdate"=>"false",
				'columns'=>array(
					array(
						'name'=>'No',
						'value'=>'$this->grid->dataProvider->pagination->currentPage * 10 + $row + 1',
					),
					'nama_pengadaan',
				),
			));
		}
	?>
</div>