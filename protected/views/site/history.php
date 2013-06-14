<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' | Pengadaan Lampau';
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pengadaan-grid',
	'dataProvider'=>$model->searchBuatHistory(),
	// 'filter'=>$model,
	'columns'=>array(
		// 'id_pengadaan',
		'nama_pengadaan',
		'notaDinasPerintahPengadaan.nota_dinas_permintaan',
			
		array(            // display using an expression
			'name'=>"PIC",
			'value'=>'$data->idPanitia->nama_panitia',
			),
					
		// 'nama_penyedia',
		// 'tanggal_masuk',
		// 'tanggal_selesai',
		// 'status',
		/*
		'biaya',
		'nama',
		'kode_panitia',
		'metode_pengadaan',
		'metode_penawaran',
		'deskripsi',
		*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}',
			'viewButtonLabel'=>'Lihat',
			'viewButtonUrl'=>'Yii::app()->createUrl("site/detilpengadaanhistory", array("id"=>"$data->id_pengadaan"))',
		),
	),
)); ?>
