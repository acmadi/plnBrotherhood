<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name . ' | Kontrol Anggaran';
?>
<h1 align="center" >Kontrol Anggaran</h1>
<?php
	$this->widget('zii.widgets.CDetailView', array(
						'id'=>'viewdetail',
						'data'=>$anggarantotal,
						'attributes'=>array(
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
		 'selectionChanged'=>"function(id){window.location='" . Yii::app()->createUrl("anggaran/kontrolanggarandivisi", array("id"=>'')) . "'+ $.fn.yiiGridView.getSelection(id);}",
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