<?php
	$this->pageTitle=Yii::app()->name . ' | Pejabat Berwenang';
?>

<h3>Jenis jabatan</h3>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$modelJabatan->searchJabatan(),
	'htmlOptions'=>array('style'=>'cursor: pointer;'),			
	'selectionChanged'=>"function(id){window.location='" . Yii::app()->createUrl("admin/detailjabatan", array("id"=>"$modelJabatan->jabatan")) . "'+ $.fn.yiiGridView.getSelection(id);}",
	'columns'=>array(
		array(
			'name'=>'No',
			'value'=>'$this->grid->dataProvider->pagination->currentPage * 10 + $row + 1',
		),
		array(
			'name'=>'Jenis Jabatan',
			'value'=>'$data->jabatan',
		),
		'kepanjangan',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{delete}',
			'deleteButtonLabel'=>'Hapus',
			'deleteConfirmation'=>'Hapus jenis jabatan?',
			'afterDelete'=>'function(){$.fn.yiiGridView.update("kdiv");}',
			'buttons'=>array(
				'delete'=>array(
					'url'=>'Yii::app()->createUrl("admin/hapusjabatan", array("id"=>$data->id_jabatan))',
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
<div><?php echo CHtml::button('Tambah Jenis Jabatan', array('submit'=>array('admin/tambahjabatan'), 'class'=>'sidafbutton'));  ?></div>
<br /><br />

<h3>Pejabat yang berwenang</h3>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'kdiv',
	'dataProvider'=>$modelKdiv->searchKdiv(),
	'htmlOptions'=>array('style'=>'cursor: pointer;'),			
	'selectionChanged'=>"function(id){window.location='" . Yii::app()->createUrl("admin/detailkdiv", array("id"=>"$modelKdiv->username")) . "'+ $.fn.yiiGridView.getSelection(id);}",
	'columns'=>array(
		array(
			'name'=>'No',
			'value'=>'$this->grid->dataProvider->pagination->currentPage * 10 + $row + 1',
		),
		'username',
		'nama',
		array(
			'name'=>'Jabatan',
			'value'=>'$data->idJabatan->jabatan',
		),
		array(
			'class'=>'CButtonColumn',
			'template'=>'{delete}',
			'deleteButtonLabel'=>'Hapus',
			'deleteConfirmation'=>'Hapus pejabat berwenang?',
			'buttons'=>array(
				'delete'=>array(
					'url'=>'Yii::app()->createUrl("admin/hapuskdiv", array("id"=>$data->username))',
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
<div><?php echo CHtml::button('Tambah pejabat berwenang', array('submit'=>array('admin/tambahkdiv'), 'class'=>'sidafbutton'));  ?></div>