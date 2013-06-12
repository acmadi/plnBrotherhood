<?php
/* @var $this NotaDinasPerintahPengadaanController */
/* @var $model NotaDinasPerintahPengadaan */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_dokumen'); ?>
		<?php echo $form->textField($model,'id_dokumen',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nota_dinas_permintaan'); ?>
		<?php echo $form->textField($model,'nota_dinas_permintaan',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nomor'); ?>
		<?php echo $form->textField($model,'nomor',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dari'); ?>
		<?php echo $form->textField($model,'dari',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kepada'); ?>
		<?php echo $form->textField($model,'kepada',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'perilhal'); ?>
		<?php echo $form->textField($model,'perilhal',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'RAB'); ?>
		<?php echo $form->textField($model,'RAB',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'targetSPK_kontrak'); ?>
		<?php echo $form->textField($model,'targetSPK_kontrak',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sumber_dana'); ?>
		<?php echo $form->textField($model,'sumber_dana',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pagu_anggaran'); ?>
		<?php echo $form->textField($model,'pagu_anggaran',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->