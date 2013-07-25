<?php
	$this->pageTitle=Yii::app()->name . ' | Administrator';
?>

<h2>Administrator</h2>

<?php if (Yii::app()->user->getState('asAdmin')) { ?>
	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'dataProvider'=>$model->searchAdmin(Yii::app()->user->name),
		'columns'=>array(
			array(
				'name'=>'No',
				'value'=>'$this->grid->dataProvider->pagination->currentPage * 10 + $row + 1',
			),
			'username',
			array(
				'class'=>'CButtonColumn',
				'template'=>'{delete}',
				'deleteButtonLabel'=>'Hapus',
				'deleteConfirmation'=>'Hapus administrator?',
				'buttons'=>array(
					'delete'=>array(
						'url'=>'Yii::app()->createUrl("admin/hapusadmin", array("id"=>$data->username))',
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

	<?php echo CHtml::button('Tambah administrator', array('submit'=>array('admin/tambahadmin'), 'class'=>'sidafbutton'));  ?>
	<br /><br /><br /><br />

	<?php echo CHtml::link('Pindah ke modus pengguna biasa', array('admin/switch', 'id'=>'0')); ?>
<?php }
	else {
		echo CHtml::link('Pindah ke modus administrator', array('admin/switch', 'id'=>'1'));
	}
?>