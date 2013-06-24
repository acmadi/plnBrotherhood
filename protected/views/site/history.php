<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' | Pengadaan Lampau';
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pengadaan-grid',
	'dataProvider'=>$model->searchBuatHistory(),
	// 'filter'=>$model,
	'htmlOptions'=>array('style'=>'cursor: pointer;'),			
	'selectionChanged'=>"function(id){window.location='" . Yii::app()->createUrl("site/detailpengadaan", array("id"=>"$model->id_pengadaan")) . "'+ $.fn.yiiGridView.getSelection(id);}",
	'columns'=>array(
		array(
			'name'=>'No',
			'value'=>'$this->grid->dataProvider->pagination->currentPage * 10 + $row + 1',
		),
		// 'id_pengadaan',
		'nama_pengadaan',
		'notaDinasPerintahPengadaan.nota_dinas_permintaan',
			
		array(            // display using an expression
			'name'=>"PIC",
			'value'=>'$data->idPanitia->nama_panitia',
			),
			
		array(            // display using an expression
				'name'=>'User',
				'value'=>'$data->divisi_peminta',
				),			
	),
)); ?>
