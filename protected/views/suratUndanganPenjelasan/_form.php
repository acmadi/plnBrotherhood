<?php
/* @var $this SuratUndanganPenjelasanController */
/* @var $model SuratUndanganPenjelasan */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'surat-undangan-penjelasan-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_dokumen'); ?>
		<?php echo $form->textField($model,'id_dokumen',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'id_dokumen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nomor'); ?>
		<?php echo $form->textField($model,'nomor',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'nomor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_panitia'); ?>
		<?php echo $form->textField($model,'id_panitia',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'id_panitia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sifat'); ?>
		<?php echo $form->textField($model,'sifat',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'sifat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'perihal'); ?>
		<?php echo $form->textField($model,'perihal',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'perihal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hari_tanggal'); ?>
		<?php echo $form->textField($model,'hari_tanggal',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'hari_tanggal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'waktu'); ?>
		<?php echo $form->textField($model,'waktu',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'waktu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tempat'); ?>
		<?php echo $form->textField($model,'tempat',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'tempat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_pengadaan'); ?>
		<?php echo $form->textField($model,'nama_pengadaan',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nama_pengadaan'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->