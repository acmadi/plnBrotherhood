<?php
/* @var $this NotaDinasPermintaanController */
/* @var $model NotaDinasPermintaan */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'nota-dinas-permintaan-form',
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

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->