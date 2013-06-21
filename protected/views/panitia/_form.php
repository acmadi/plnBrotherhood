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

	<div class="row">
		<?php echo $form->labelEx($model,'nama_panitia'); ?>
		<?php echo $form->textField($model,'nama_panitia',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'nama_panitia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'SK_panitia'); ?>
		<?php echo $form->textField($model,'SK_panitia',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'SK_panitia'); ?>
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

	<div class="row">
		<?php echo $form->labelEx($model,'jenis_panitia'); ?>
		<?php echo $form->textField($model,'jenis_panitia',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'jenis_panitia'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Simpan' : 'Perbarui',array('class'=>'sidafbutton')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->