<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' | Statistik Pengadaan';
?>

<?php
	$test = Yii::app()->db->createCommand('select username, jumlah_berlangsung from divisi')->queryAll();
	$dataProvider = array();
	while(list($k1, $v1)=each($test)) {
		$x = array();
		array_push($x, $v1['username']);
		array_push($x, (int)$v1['jumlah_berlangsung']);
		array_push($dataProvider, $x);
	}
?>

<div id="perdiv">
	<?php $this->widget('HighchartsWidget', array(
			// 'dataProvider'=>Divisi::model()->search(),
			// 'template'=>'{items}',
			'options'=>array(
				// 'chart'=>array(
				// 	'renderTo'=>'perdiv',
				// 	'plotBackgroundColor'=>null,
				// 	'plotBorderWidth'=>null,
				// 	'plotShadow'=>false,
				// ),
				'tooltip'=>array(
					'formatter'=>'js:function() {return "<b>"+ this.point.name +"</b>: "+ this.percentage +" %";}',
				),
				'title'=>array('text'=>'Pengadaan per divisi'),
				'plotOptions'=>array(
					'pie'=>array(
						'dataLabels'=>array(
							'enabled'=>true,
							// 'color'=>'black',
							// 'connectorColor'=>'black',
							'formatter'=>'js:function() {return "<b>"+ this.point.name +"</b>: "+ this.percentage +" %";}',
						),
					),
				),
				// 'xAxis'=>array(
				// 	'categories'=>'username',
				// ),
				// 'yAxis'=>array(
				// 	'categories'=>'jumlah_berlangsung',
				// ),
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