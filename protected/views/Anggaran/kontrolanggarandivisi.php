<?php
/* @var $this SiteController */
$id = Yii::app()->getRequest()->getQuery('id');
$divisi = Divisi::model()->findByPk($id);
$this->pageTitle=Yii::app()->name . ' | Kontrol Anggaran '.$divisi->nama_divisi;
?>
<h1 align="center" >Kontrol Anggaran <?php echo $divisi->nama_divisi;?></h1>
<!--
<p>
	Pagu Total :  <?php //echo $pagutotal; ?>
	RAB Total :  <?php //echo $rabtotal; ?> 
	HPS Total :  <?php //echo $hpstotal; ?>
	Kontrak Total :  <?php //echo $kontraktotal; ?>
	Penghematan Total :  <?php //echo $penghematantotal; ?>
	Pesren Total :  <?php //echo $persenpenghematantotal; ?> 
</p>
--->
<?php
	// $this->widget('zii.widgets.CDetailView', array(
						// 'id'=>'viewdetail',
						// 'data'=>$datatotal,
						// 'attributes'=>array(
							// 'total_pagu_anggaran',
							// array( 'label'=>'Total Pagu Anggaran', 'value'=>'$data["total_pagu_anggaran"]',),
							// array( 'label'=>'Total Nama Divisi', 'value'=>'$data["total_nilai_rab"]',),
							// array( 'label'=>'Total Nilai HPS', 'value'=>'$data["nilai_hps"]',),
							// array( 'label'=>'Total Nilai Kontrak', 'value'=>'$data["total_nilai_hps"]',),
							// array( 'label'=>'Total Penghematan', 'value'=>'$data["total_penghematan"]',),
							// array( 'label'=>'Persen', 'value'=>'$data["persen"]',),
							
						// ),
					// ));
 
	$this->widget('zii.widgets.grid.CGridView', 
	array( 'id'=>'anggaran-grid',
		 'dataProvider'=>$dataanggaran,		
		 'columns'=>array(
			array( 'name'=>'Nama Pengadaan', 'value'=>'$data["nama_pengadaan"]',),
			array( 'name'=>'Pagu Anggaran', 'value'=>'$data["pagu_anggaran"]',),
			array( 'name'=>'Nilai RAB', 'value'=>'$data["nilai_rab"]',),
			array( 'name'=>'Nilai HPS', 'value'=>'$data["nilai_hps"]',),
			array( 'name'=>'Nilai Kontrak', 'value'=>'$data["nilai_kontrak"]',),
			array( 'name'=>'Penghematan', 'value'=>'$data["penghematan"]',),
			array( 'name'=>'Persen', 'value'=>'$data["persen"]',),
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