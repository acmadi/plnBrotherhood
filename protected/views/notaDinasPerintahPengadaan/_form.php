<?php
/* @var $this NotaDinasPerintahPengadaanController */
/* @var $model NotaDinasPerintahPengadaan */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'nota-dinas-perintah-pengadaan-form',
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
		<?php echo $form->labelEx($model,'nota_dinas_permintaan'); ?>
		<?php echo $form->textField($model,'nota_dinas_permintaan',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'nota_dinas_permintaan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nomor'); ?>
		<?php echo $form->textField($model,'nomor',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'nomor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dari'); ?>
		<?php echo $form->textField($model,'dari',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'dari'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kepada'); ?>
		<?php echo $form->textField($model,'kepada',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'kepada'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'perihal'); ?>
		<?php echo $form->textField($model,'perihal',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'perihal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'RAB'); ?>
		<?php echo $form->textField($model,'RAB',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'RAB'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TOR_RKS'); ?>
		<?php echo $form->textField($model,'TOR_RKS',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'TOR_RKS'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'targetSPK_kontrak'); ?>
		<?php echo $form->textField($model,'targetSPK_kontrak'); ?>
		<?php echo $form->error($model,'targetSPK_kontrak'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sumber_dana'); ?>
		<?php echo $form->textField($model,'sumber_dana',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'sumber_dana'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pagu_anggaran'); ?>
		<?php echo $form->textField($model,'pagu_anggaran',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'pagu_anggaran'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->