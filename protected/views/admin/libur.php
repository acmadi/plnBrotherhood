<?php
	$this->pageTitle=Yii::app()->name . ' | Jadwal Hari Libur';
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$model->search(),
	// 'htmlOptions'=>array('style'=>'cursor: pointer;'),			
	// 'selectionChanged'=>"function(id){window.location='" . Yii::app()->createUrl("admin/detailpanitia", array("id"=>"$model->id_panitia")) . "'+ $.fn.yiiGridView.getSelection(id);}",
	'columns'=>array(
		array(
			'name'=>'No',
			'value'=>'$this->grid->dataProvider->pagination->currentPage * 10 + $row + 1',
		),
		array(
			'name'=>'Tanggal',
			'value'=>'Tanggal::getTanggalStrip($data->tanggal)',
		),
		'keterangan',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{delete}',
			'deleteButtonLabel'=>'Hapus',
			'deleteConfirmation'=>'Hapus hari libur?',
			'buttons'=>array(
				'delete'=>array(
					'url'=>'Yii::app()->createUrl("admin/hapuslibur", array("id"=>$data->tanggal))',
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

<?php echo CHtml::button('Tambah hari libur', array('submit'=>array('admin/tambahlibur'), 'class'=>'sidafbutton'));  ?>
<?php echo CHtml::button('Unggah daftar hari libur', array('submit'=>array('admin/uploadlibur'), 'class'=>'sidafbutton'));  ?>