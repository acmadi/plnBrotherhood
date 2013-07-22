<?php
	$this->pageTitle=Yii::app()->name . ' | Detil ' . $divisi->nama_divisi;
?>

<h2><?php echo $divisi->nama_divisi ?></h2>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$model->searchUser($divisi->username),
	'columns'=>array(
		array(
			'name'=>'No',
			'value'=>'$this->grid->dataProvider->pagination->currentPage * 10 + $row + 1',
		),
		'username',
		'nama',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{delete}',
			'deleteButtonLabel'=>'Hapus',
			'deleteConfirmation'=>'Hapus divisi?',
			'buttons'=>array(
				'delete'=>array(
					'url'=>'Yii::app()->createUrl("admin/hapusanggotadivisi", array("id"=>$data->username))',
				),
			),
		),
	),
));
?>

<?php echo CHtml::button('Tambah anggota divisi', array('submit'=>array('admin/tambahuserdivisi', 'id'=>$id), 'class'=>'sidafbutton')); ?>

<div><?php echo CHtml::button('Kembali', array('submit'=>array('admin/divisi'), 'class'=>'sidafbutton'));  ?></div>