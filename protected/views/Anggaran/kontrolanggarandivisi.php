<?php
/* @var $this SiteController */
$id = Yii::app()->getRequest()->getQuery('id');
$divisi = Divisi::model()->findByPk($id);
$this->pageTitle=Yii::app()->name . ' | Kontrol Anggaran '.$divisi->nama_divisi;
?>
<h1 align="center" >Kontrol Anggaran <?php echo $divisi->nama_divisi;?> <?php echo $tahun;?></h1>
<div style="width=100%;"><div style="position:absolute; left:100%; margin-left:-525px;">
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
					'valueSuffix' => ' millions'
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
							'jumlah_kontrak_divisi',
							'total_pagu_anggaran_divisi',
							'total_nilai_rab_divisi',
							'total_nilai_hps_divisi',
							'total_nilai_kontrak_divisi',
							'total_penghematan_divisi',
							'persentase',
						),
					));
 
	$this->widget('zii.widgets.grid.CGridView', 
	array( 'id'=>'anggaran-grid',
		 'dataProvider'=>$dataanggaran,
		 'htmlOptions'=>array('style'=>'cursor: pointer;'),			
		 'selectionChanged'=>"function(id){window.location='" . Yii::app()->createUrl("site/detailpengadaan", array("id"=>'')) . "'+ $.fn.yiiGridView.getSelection(id);}",
		 'columns'=>array(
			array( 'name'=>'Nama Pengadaan', 'value'=>'$data["nama_pengadaan"]',),
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