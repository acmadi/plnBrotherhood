<?php
/* @var $this AnggotaController */
/* @var $model Anggota */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'anggota-form',
	'enableAjaxValidation'=>false,
)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->dropDownList($model,'username',CHtml::listData(User::model()->findAll(), 'username', 'nama'),array('empty'=>'-----Pilih Nama-----'));?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NIP'); ?>
		<?php echo $form->textField($model,'NIP',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'NIP'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_panitia'); ?>
		<?php echo $form->dropDownList($model,'id_panitia',CHtml::listData(Panitia::model()->findAllByAttributes(array('status_panitia'=>'Aktif')), 'id_panitia', 'nama_panitia'),array('empty'=>'-----Pilih Panitia-----'));?>
		<?php echo $form->error($model,'id_panitia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jabatan'); ?>
		<?php echo $form->textField($model,'jabatan',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'jabatan'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Simpan' : 'Perbarui',array('class'=>'sidafbutton')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->