<?php
/* @var $this SiteController */

$category = Yii::app()->getRequest()->getQuery('category');
$chart = Yii::app()->getRequest()->getQuery('chart');
$detail = Yii::app()->getRequest()->getQuery('detail');

$this->pageTitle=Yii::app()->name . ' | Statistik Pengadaan';
?>

<div id="sidebar">
	<?php $this->beginWidget('zii.widgets.CPortlet'); ?>
	<ul>
		<li><?php echo CHtml::link('Pengadaan per divisi', array('site/statistik', 'category'=>'1', 'chart'=>'1')) ?></li>
		<li><?php echo CHtml::link('Pengadaan per PIC', array('site/statistik', 'category'=>'2', 'chart'=>'1')) ?></li>
	</ul>
	<?php $this->endWidget(); ?>
</div>

<div id="maincontent">
	<div id="menuform">
		<?php switch ($category) {
			case '1': {
			    $this->widget('zii.widgets.CMenu', array(
			        'items'=>array(
			                array('label'=>'Berlangsung', 'url'=>array('site/statistik', 'category'=>'1', 'chart'=>'1')),
			                array('label'=>'Selesai', 'url'=>array('site/statistik', 'category'=>'1', 'chart'=>'2')),
			                array('label'=>'Gagal', 'url'=>array('site/statistik', 'category'=>'1', 'chart'=>'3')),
			                array('label'=>'Total', 'url'=>array('site/statistik', 'category'=>'1', 'chart'=>'4')),
			        ),
			    ));
				break;
			}
			case '2': {
			    $this->widget('zii.widgets.CMenu', array(
			        'items'=>array(
			                array('label'=>'Berlangsung', 'url'=>array('site/statistik', 'category'=>'2', 'chart'=>'1')),
			                array('label'=>'Selesai', 'url'=>array('site/statistik', 'category'=>'2', 'chart'=>'2')),
			                array('label'=>'Gagal', 'url'=>array('site/statistik', 'category'=>'2', 'chart'=>'3')),
			                array('label'=>'Total', 'url'=>array('site/statistik', 'category'=>'2', 'chart'=>'4')),
			        ),
			    ));
				break;
			}
		}
		?>
	</div>
	<br />
	<?php $this->widget('HighchartsWidget', array(
			'options'=>array(
				'tooltip'=>array(
					'formatter'=>'js:function() {return this.percentage +" %";}',
				),
				'title'=>array('text'=>$chartTitle),
				'subtitle'=>array('text'=>$chartSubtitle),
				'plotOptions'=>array(
					'pie'=>array(
						// 'allowPointSelect'=>true,
						'dataLabels'=>array(
							'formatter'=>'js:function() {return "<b>" + this.point.name + "</b><br />  " + this.y;}',
						),
						'events'=>array(
							'click'=>'js:function(event) {window.location="' . Yii::app()->createUrl('site/statistik') . '&category=' . $category . '&chart=' . $chart . '&detail=' . '" + event.point.name;}',
						),
					),
				),
				'series'=>array(
					array(
						'type'=>'pie',
						'name'=>'username',
						'data'=>$chartData,
					),
				),
			),
		));
	?>
	<?php
		if ($detail != null) {
			switch ($category) {
				case '1' : {
					$this->widget('zii.widgets.grid.CGridView', array(
						'dataProvider'=>Pengadaan::model()->searchStatistikDivisi($detail, $chart),
						"ajaxUpdate"=>"false",
						'columns'=>array(
							array(
								'name'=>'No',
								'value'=>'$this->grid->dataProvider->pagination->currentPage * 10 + $row + 1',
							),
							'nama_pengadaan',
						),
					));
					break;
				}
				case '2' : {
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
					break;
				}
			}
		}
	?>
</div>