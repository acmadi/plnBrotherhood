<?php
	$this->pageTitle=Yii::app()->name . ' | Panitia/Pejabat Pengadaan';
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$model->searchPejabat(),
	'htmlOptions'=>array('style'=>'cursor: pointer;'),			
	'selectionChanged'=>"function(id){window.location='" . Yii::app()->createUrl("admin/detailpejabat", array("id"=>"$model->id_panitia")) . "'+ $.fn.yiiGridView.getSelection(id);}",
	'columns'=>array(
		array(
			'name'=>'No',
			'value'=>'$this->grid->dataProvider->pagination->currentPage * 10 + $row + 1',
		),
		array(
			'name'=>'Nama Pengguna',
			'value'=>'$data->anggotas[0]->username',
		),
		array(
			'name'=>'Nama Pejabat',
			'value'=>'$data->nama_panitia',
		),
		array(
			'name'=>'E-mail',
			'value'=>'$data->email',
		),
		array(
			'class'=>'CButtonColumn',
			'template'=>'{delete}',
			'deleteButtonLabel'=>'Hapus',
			'deleteConfirmation'=>'Hapus pejabat pengadaan?',
			'buttons'=>array(
				'delete'=>array(
					'url'=>'Yii::app()->createUrl("admin/hapuspejabat", array("id"=>$data->id_panitia))',
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

<div><?php echo CHtml::button('Tambah pejabat pengadaan', array('submit'=>array('admin/tambahpejabat'), 'class'=>'sidafbutton'));  ?></div>