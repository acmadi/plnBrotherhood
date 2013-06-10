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
		array(
			'class'=>'CDataColumn',
			'type'=>'number',
			'value'=>'$row + 1',
			'header'=>'No',
		),
		'nama_pengadaan',
		// 'nama_penyedia',
		// 'tanggal_masuk',
		// 'tanggal_selesai',
		'status',
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
			'viewButtonUrl'=>'Yii::app()->createUrl("site/detailpengadaan", array("id"=>"$data->id_pengadaan"))',
		),
	),
)); ?>
