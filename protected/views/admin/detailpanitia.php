<?php
	$this->pageTitle=Yii::app()->name . ' | Detil ' . $panitia->nama_panitia;
?>
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

<?php if(Yii::app()->user->hasFlash('gagal')): ?>
	<div class="flash-error">
		<?php echo Yii::app()->user->getFlash('gagal'); ?>
		<script type="text/javascript">
			setTimeout(function() {
				$('.flash-error').animate({
					height: '0px',
					marginBottom: '0em',
					padding: '0em',
					opacity: '0.0'
				}, 1000, function() {
					$('.flash-error').hide();
				});
			}, 2000);
		</script>
	</div>
<?php endif; ?>

<div class="kelompokform">
	<h2><?php echo $panitia->nama_panitia ?></h2>
	<div class="form">
		<?php $form=$this->beginWidget('CActiveForm', array(
			'enableAjaxValidation'=>false,
		)); ?>

		<div class="row">
			<?php echo $form->labelEx($panitia,'Nama panitia'); ?> 
			<?php echo $form->textField($panitia,'nama_panitia',array('size'=>56,'maxlength'=>256)); ?>
			<?php echo $form->error($panitia,'nama_panitia'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($panitia,'Nomor SK panitia'); ?> 
			<?php echo $form->textField($panitia,'SK_panitia',array('size'=>56,'maxlength'=>256)); ?>
			<?php echo $form->error($panitia,'SK_panitia'); ?>
		</div>
			
		<div class="row">
			<?php echo $form->labelEx($panitia,'Tanggal SK panitia'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
				'model'=>$panitia,
				'attribute'=>'tanggal_sk',
				'value'=>$panitia->tanggal_sk,
				'htmlOptions'=>array('size'=>56),
				'options'=>array(
				'dateFormat'=>'dd-mm-yy',
				),
			));?>
			<?php echo $form->error($panitia,'tanggal_sk'); ?>
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
	'dataProvider'=>$model->searchAnggota($panitia->id_panitia),
	'htmlOptions'=>array('style'=>'cursor: pointer;'),			
	'selectionChanged'=>"function(id){window.location='" . Yii::app()->createUrl("admin/detailanggotapanitia", array("id"=>"$model->id_panitia")) . "'+ $.fn.yiiGridView.getSelection(id);}",
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
		'email',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{delete}',
			'deleteButtonLabel'=>'Hapus',
			'deleteConfirmation'=>'Hapus anggota panitia pengadaan?',
			'buttons'=>array(
				'delete'=>array(
					'url'=>'Yii::app()->createUrl("admin/hapusanggotapanitia", array("id"=>$data->id))',
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

<?php echo CHtml::button('Tambah anggota panitia pengadaan', array('submit'=>array('admin/tambahanggotapanitia', 'id'=>$panitia->id_panitia), 'class'=>'sidafbutton')); ?>
<br /><br />

<div><?php echo CHtml::button('Kembali', array('submit'=>array('admin/panitia'), 'class'=>'sidafbutton'));  ?></div>