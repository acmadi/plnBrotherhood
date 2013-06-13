<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' | Tambah Pengadaan';
?>
<?php 
	if (Kdivmum::model()->exists('username = "' . Yii::app()->user->name . '"')) {
?>
	<div class="form">
		<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pengadaan-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_pengadaan'); ?>
		<?php echo $form->textField($model,'nama_pengadaan',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nama_pengadaan'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'divisi_peminta'); ?>
		<?php echo $form->textField($model,'divisi_peminta',array('size'=>32,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'divisi_peminta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tanggal_masuk'); ?>
		<?php echo $form->textField($model,'tanggal_masuk',array('size'=>32,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'tanggal_masuk'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kode_panitia'); ?>
		<?php echo $form->textField($model,'kode_panitia',array('size'=>10,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'kode_panitia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'metode_pengadaan'); ?>
		<?php echo $form->dropDownList($model,'metode_pengadaan',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'metode_pengadaan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'perihal_pengadaan'); ?>
		<?php echo $form->textField($model,'perihal_pengadaan',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'perihal_pengadaan'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php	}
?>