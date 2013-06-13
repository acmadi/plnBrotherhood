<?php
/* @var $this PanitiaController */
/* @var $model Panitia */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'panitia-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_panitia'); ?>
		<?php echo $form->textField($model,'id_panitia',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'id_panitia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kode_panitia'); ?>
		<?php echo $form->textField($model,'kode_panitia',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'kode_panitia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tahun'); ?>
		<?php echo $form->textField($model,'tahun'); ?>
		<?php echo $form->error($model,'tahun'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jumlah_panitia'); ?>
		<?php echo $form->textField($model,'jumlah_panitia',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'jumlah_panitia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status_panitia'); ?>
		<?php echo $form->textField($model,'status_panitia',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'status_panitia'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->