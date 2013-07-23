<?php
	$this->pageTitle=Yii::app()->name . ' | Detil ' . $divisi->nama_divisi;
?>

<h2><?php echo $divisi->nama_divisi ?></h2>

<?php if(Yii::app()->user->hasFlash('sukses')): ?>
	<div class="flash-success">
		<?php echo Yii::app()->user->getFlash('sukses'); ?>
		<script type="text/javascript">
			setTimeout(function() {
				$('.flash-success').animate({
					height: '0px',
					marginBottom: '0em',
					padding: '0em',
					opacity: '0.0'
				}, 1000, function() {
					$('.flash-success').hide();
				});
			}, 2000);
		</script>
	</div>
<?php endif; ?>

<div class="kelompokform">
	<div class="form">
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'divisi-form',
			'enableAjaxValidation'=>false,
		)); ?>

		<div class="row">
			<?php echo $form->labelEx($divisi,'Nama divisi'); ?> 
			<?php echo $form->textField($divisi,'nama_singkat',array('size'=>56,'maxlength'=>50)); ?>
			<?php echo $form->error($divisi,'nama_singkat'); ?>
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
</div>
<br /><br />

<h4>Anggota</h4>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$model->searchUser($divisi->id_divisi),
	'columns'=>array(
		array(
			'name'=>'No',
			'value'=>'$this->grid->dataProvider->pagination->currentPage * 10 + $row + 1',
		),
		array(
			'name'=>'Nama Pengguna',
			'value'=>'$data->username',
		),
		'nama',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{delete}',
			'deleteButtonLabel'=>'Hapus',
			'deleteConfirmation'=>'Hapus anggota divisi?',
			'buttons'=>array(
				'delete'=>array(
					'url'=>'Yii::app()->createUrl("admin/hapusanggotadivisi", array("id"=>$data->username))',
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

<?php echo CHtml::button('Tambah anggota divisi', array('submit'=>array('admin/tambahanggotadivisi', 'id'=>$id), 'class'=>'sidafbutton')); ?>
<br /><br />

<div><?php echo CHtml::button('Kembali', array('submit'=>array('admin/divisi'), 'class'=>'sidafbutton'));  ?></div>