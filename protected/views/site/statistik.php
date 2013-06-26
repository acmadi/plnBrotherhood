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

<div id="sidebar">
	<?php
		$this->widget('zii.widgets.CPortlet', array());
	?>
</div>

<div id="perdiv">
	<?php $this->widget('HighchartsWidget', array(
			'options'=>array(
				'tooltip'=>array(
					'formatter'=>'js:function() {return "<b>"+ this.point.name +"</b>: "+ this.percentage +" %";}',
				),
				'title'=>array('text'=>'Pengadaan per divisi'),
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