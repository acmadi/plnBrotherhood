<?php
/* @var $this PengadaanController */
/* @var $model Pengadaan */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pengadaan-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_pengadaan'); ?>
		<?php echo $form->textField($model,'id_pengadaan',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'id_pengadaan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_pengadaan'); ?>
		<?php echo $form->textField($model,'nama_pengadaan',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nama_pengadaan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_penyedia'); ?>
		<?php echo $form->textField($model,'nama_penyedia',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'nama_penyedia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tanggal_masuk'); ?>
		<?php echo $form->textField($model,'tanggal_masuk'); ?>
		<?php echo $form->error($model,'tanggal_masuk'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tanggal_selesai'); ?>
		<?php echo $form->textField($model,'tanggal_selesai'); ?>
		<?php echo $form->error($model,'tanggal_selesai'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'biaya'); ?>
		<?php echo $form->textField($model,'biaya',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'biaya'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nama'); ?>
		<?php echo $form->textField($model,'nama',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'nama'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kode_panitia'); ?>
		<?php echo $form->textField($model,'kode_panitia',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'kode_panitia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'metode_pengadaan'); ?>
		<?php echo $form->textField($model,'metode_pengadaan',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'metode_pengadaan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'metode_penawaran'); ?>
		<?php echo $form->textField($model,'metode_penawaran',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'metode_penawaran'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'deskripsi'); ?>
		<?php echo $form->textField($model,'deskripsi',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'deskripsi'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->