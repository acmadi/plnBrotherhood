<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' | Tambah Pengadaan Pejabat';
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pengadaan-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'nama_pengadaan'); ?>
		<?php echo $form->textField($model,'nama_pengadaan',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nama_pengadaan'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'deskripsi'); ?>
		<?php echo $form->textField($model,'deskripsi',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'deskripsi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tanggal_masuk'); ?>
		<?php echo $form->textField($model,'tanggal_masuk',array('size'=>60)); ?>
		<?php echo $form->error($model,'tanggal_masuk'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'username pejabat'); ?>
		<?php echo $form->textField($model,'nama',array('size'=>60,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'nama'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'metode_pengadaan'); ?>
		<?php echo $form->dropDownList($model,'metode_pengadaan', array('Penunjukan Langsung'=>'Penunjukan Langsung','Pemilihan Langsung'=>'Pemilihan Langsung','Pelelangan'=>'Pelelangan'),array()); ?> 
		<?php echo $form->error($model,'metode_pengadaan'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Buat' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->