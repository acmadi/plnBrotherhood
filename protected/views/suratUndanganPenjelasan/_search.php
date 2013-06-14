<?php
/* @var $this SuratUndanganPenjelasanController */
/* @var $model SuratUndanganPenjelasan */
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
		<?php echo $form->label($model,'nomor'); ?>
		<?php echo $form->textField($model,'nomor',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_panitia'); ?>
		<?php echo $form->textField($model,'id_panitia',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sifat'); ?>
		<?php echo $form->textField($model,'sifat',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'perihal'); ?>
		<?php echo $form->textField($model,'perihal',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hari_tanggal'); ?>
		<?php echo $form->textField($model,'hari_tanggal',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'waktu'); ?>
		<?php echo $form->textField($model,'waktu',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tempat'); ?>
		<?php echo $form->textField($model,'tempat',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nama_pengadaan'); ?>
		<?php echo $form->textField($model,'nama_pengadaan',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->