<?php
/* @var $this DokumenController */
/* @var $model Dokumen */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'dokumen-form',
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
		<?php echo $form->labelEx($model,'nama_dokumen'); ?>
		<?php echo $form->textField($model,'nama_dokumen',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'nama_dokumen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tanggal'); ?>
		<?php echo $form->textField($model,'tanggal'); ?>
		<?php echo $form->error($model,'tanggal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tempat'); ?>
		<?php echo $form->textField($model,'tempat',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'tempat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_pengadaan'); ?>
		<?php echo $form->textField($model,'id_pengadaan',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'id_pengadaan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status_upload'); ?>
		<?php echo $form->textField($model,'status_upload',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'status_upload'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->