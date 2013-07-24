<?php
	$this->pageTitle=Yii::app()->name . ' | Panitia/Pejabat Pengadaan';
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$model->searchPanitia(),
	'htmlOptions'=>array('style'=>'cursor: pointer;'),			
	'selectionChanged'=>"function(id){window.location='" . Yii::app()->createUrl("admin/detailpanitia", array("id"=>"$model->id_panitia")) . "'+ $.fn.yiiGridView.getSelection(id);}",
	'columns'=>array(
		array(
			'name'=>'No',
			'value'=>'$this->grid->dataProvider->pagination->currentPage * 10 + $row + 1',
		),
		'nama_panitia',
		'SK_panitia',
		array(
			'name'=>'Tanggal SK',
			'value'=>'Tanggal::getTanggalStrip($data->tanggal_sk)',
		),
		array(
			'class'=>'CButtonColumn',
			'template'=>'{delete}',
			'deleteButtonLabel'=>'Hapus',
			'deleteConfirmation'=>'Hapus panitia pengadaan?',
			'buttons'=>array(
				'delete'=>array(
					'url'=>'Yii::app()->createUrl("admin/hapuspanitia", array("id"=>$data->id_panitia))',
				),
			),
		),
	),
	'pager'=>array(
			'class'=>'CLinkPager',
			'header'=>'',
			'nextPageLabel'=>"Selanjutnya",
			'prevPageLabel'=>'Sebelumnya',
	),
	'summaryText'=>'',
));
?>

<div><?php echo CHtml::button('Tambah panitia pengadaan', array('submit'=>array('admin/tambahpanitia'), 'class'=>'sidafbutton'));  ?></div>