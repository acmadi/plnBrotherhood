<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name . ' | Kontrol Anggaran';
?>
<h1 align="center" >Kontrol Anggaran <?php echo $tahun; ?></h1>
<div style="width=100%;"><div style="position:absolute; left:100%; margin-left:-520px;">
	<?php echo CHtml::beginForm();?>
		<?php echo CHtml::label('Tahun Anggaran','tahun'); ?>
		<?php echo CHtml::textField('tahun');?>
		<?php echo CHtml::submitButton('OK',array("class"=>'sidafbutton')); ?>
	<?php echo CHtml::endForm();?>
</div></div>

<br/><br/>
<?php $this->widget('HighchartsWidget', array(
			'options'=>array(
				'chart'=>array(
					'type'=>'column',
				),
				'tooltip'=>array(
					'valueSuffix' => ''
				),
				'title'=>array('Anggaran'),
				'subtitle'=>array('text'=>array('')),
				'plotOptions'=>array(
					'column'=>array(
						'dataLabels'=>array (
							'enabled'=> true
						)					
					),
				),
				'series'=>$chartdata,
				'xAxis'=>array (
					'categories'=>array ('Pagu Anggaran','RAB', 'HPS', 'Kontrak', 'Penghematan')
				),
				'yAxis'=>array (
					'min' => 0,
						'title'=>array (
							'text'=> 'Nilai',
						),
						'labels'=>array(
							'overflow'=> 'justify'
						)
				),
			),
		));
?>
<br/><br/>
<?php
	$this->widget('zii.widgets.CDetailView', array(
						'id'=>'viewdetail',
						'data'=>$anggarantotal,
						'attributes'=>array(
							'jumlah_kontrak',
							'total_pagu_anggaran',
							'total_nilai_rab',
							'total_nilai_hps',
							'total_nilai_kontrak',
							'total_penghematan',
							'persentase',
						),
					));
 
	$this->widget('zii.widgets.grid.CGridView', 
	array( 'id'=>'anggaran-grid',
		 'dataProvider'=>$dataanggaran,
		 'htmlOptions'=>array('style'=>'cursor: pointer;'),			
		 'selectionChanged'=>'js:function(id) {window.location="' . Yii::app()->createUrl('anggaran/kontrolanggarandivisi') . '&id="+$.fn.yiiGridView.getSelection(id)+"'. '&tahun=' .$tahun. '";}',
		 'columns'=>array(
			array( 'name'=>'Nama Divisi', 'value'=>'$data["nama_divisi"]',),
			array( 'name'=>'Pagu Anggaran', 'value'=>'$data["pagu_anggaran"]',),
			array( 'name'=>'Nilai RAB', 'value'=>'$data["nilai_rab"]',),
			array( 'name'=>'Nilai HPS', 'value'=>'$data["nilai_hps"]',),
			array( 'name'=>'Nilai Kontrak', 'value'=>'$data["nilai_kontrak"]',),
			array( 'name'=>'Penghematan', 'value'=>'$data["penghematan"]',),
			array( 'name'=>'Persentase', 'value'=>'$data["persentase"]',),
			),
		'pager'=>array(
			'class'=>'CLinkPager',
			'header'=>'',
			'nextPageLabel'=>"Selanjutnya",
			'prevPageLabel'=>'Sebelumnya',
		),
		'summaryText' => 'Keterangan : Angka dalam satuan rupiah.',
	));
?>

