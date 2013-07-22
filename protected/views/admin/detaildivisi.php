<?php
	$this->pageTitle=Yii::app()->name . ' | Detil ' . $divisi->nama_divisi;
?>

<h2><?php echo $divisi->nama_divisi ?></h2>

<div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'divisi-form',
		'enableAjaxValidation'=>false,
	)); ?>

	<div class="row">
		<?php echo $form->labelEx($divisi,'Nama divisi'); ?> 
		<?php echo $form->textField($divisi,'username',array('size'=>56,'maxlength'=>50)); ?>
		<?php echo $form->error($divisi,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($divisi,'Kepanjangan'); ?> 
		<?php echo $form->textField($divisi,'nama_divisi',array('size'=>56,'maxlength'=>256)); ?>
		<?php echo $form->error($divisi,'nama_divisi'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Perbarui',array('class'=>'sidafbutton')); ?>
	</div>

	<?php $this->endWidget(); ?>
</div>
<br /><br />

<h4>Anggota</h4>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$model->searchUser($divisi->username),
	'columns'=>array(
		array(
			'name'=>'No',
			'value'=>'$this->grid->dataProvider->pagination->currentPage * 10 + $row + 1',
		),
		array(
			'name'=>'Nama Pengguna',
			'value'=>'$data->fbsql_username(link_identifier)',
		),
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

<?php echo CHtml::button('Tambah anggota divisi', array('submit'=>array('admin/tambahanggotadivisi', 'id'=>$id), 'class'=>'sidafbutton')); ?>
<br /><br />

<div><?php echo CHtml::button('Kembali', array('submit'=>array('admin/divisi'), 'class'=>'sidafbutton'));  ?></div>