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
		<?php echo $form->labelEx($model,'jumlah_anggota'); ?>
		<?php echo $form->textField($model,'jumlah_anggota',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'jumlah_anggota'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status_panitia'); ?>
		<?php echo $form->radioButtonList($model,'status_panitia',
				array('Aktif'=>'Aktif','Tidak Aktif'=>'Tidak Aktif'),
				array('separator'=>' ', 'labelOptions'=>array('style'=>'display:inline'))); ?>
		<?php echo $form->error($model,'status_panitia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jenis_panitia'); ?>
		<?php echo $form->radioButtonList($model,'jenis_panitia',
				array('Pejabat'=>'Pejabat','Panitia'=>'Panitia'),
				array('separator'=>' ', 'labelOptions'=>array('style'=>'display:inline'))); ?>
		<?php echo $form->error($model,'jenis_panitia'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Simpan' : 'Perbarui',array('class'=>'sidafbutton')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->