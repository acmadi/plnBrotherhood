<?php
	$this->pageTitle=Yii::app()->name . ' | Divisi';
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$model->search(),
	'htmlOptions'=>array('style'=>'cursor: pointer;'),			
	'selectionChanged'=>"function(id){window.location='" . Yii::app()->createUrl("admin/detaildivisi", array("id"=>"$model->id_divisi")) . "'+ $.fn.yiiGridView.getSelection(id);}",
	'columns'=>array(
		array(
			'name'=>'No',
			'value'=>'$this->grid->dataProvider->pagination->currentPage * 10 + $row + 1',
		),
		array(
			'name'=>'Divisi',
			'value'=>'$data->nama_singkat',
		),
		array(
			'name'=>'Kepanjangan',
			'value'=>'$data->nama_divisi',
		),
		array(
			'class'=>'CButtonColumn',
			'template'=>'{delete}',
			'deleteButtonLabel'=>'Hapus',
			'deleteConfirmation'=>'Hapus divisi?',
			'buttons'=>array(
				'delete'=>array(
					'url'=>'Yii::app()->createUrl("admin/hapusdivisi", array("id"=>$data->id_divisi))',
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

<div><?php echo CHtml::button('Tambah divisi', array('submit'=>array('admin/tambahdivisi'), 'class'=>'sidafbutton'));  ?></div>