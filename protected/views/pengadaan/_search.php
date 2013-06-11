<?php
/* @var $this PengadaanController */
/* @var $model Pengadaan */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_pengadaan'); ?>
		<?php echo $form->textField($model,'id_pengadaan',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nama_pengadaan'); ?>
		<?php echo $form->textField($model,'nama_pengadaan',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nama_penyedia'); ?>
		<?php echo $form->textField($model,'nama_penyedia',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tanggal_masuk'); ?>
		<?php echo $form->textField($model,'tanggal_masuk'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tanggal_selesai'); ?>
		<?php echo $form->textField($model,'tanggal_selesai'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'biaya'); ?>
		<?php echo $form->textField($model,'biaya',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nama'); ?>
		<?php echo $form->textField($model,'nama',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kode_panitia'); ?>
		<?php echo $form->textField($model,'kode_panitia',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'metode_pengadaan'); ?>
		<?php echo $form->textField($model,'metode_pengadaan',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'metode_penawaran'); ?>
		<?php echo $form->textField($model,'metode_penawaran',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'deskripsi'); ?>
		<?php echo $form->textField($model,'deskripsi',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->