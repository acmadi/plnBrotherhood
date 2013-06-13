<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' | Tambah Pengadaan';
$id = Yii::app()->getRequest()->getQuery('id');
?>
<?php 
	if (Kdivmum::model()->exists('username = "' . Yii::app()->user->name . '"')) {
?>
	<div class="form">
		<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'pengadaan-form',
		'enableAjaxValidation'=>false,
		)); ?>

		<p class="note">Keterangan : <span class="required">*</span> Harus diisi.</p>

		<?php echo $form->errorSummary($Pengadaan); ?>

		<div class="row">
			<?php echo $form->labelEx($Pengadaan,'nama_pengadaan'); ?>
			<?php echo $form->textField($Pengadaan,'nama_pengadaan',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($Pengadaan,'nama_pengadaan'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($Pengadaan,'divisi_peminta'); ?>
			<?php echo $form->textField($Pengadaan,'divisi_peminta',array('size'=>60,'maxlength'=>32)); ?>
			<?php echo $form->error($Pengadaan,'divisi_peminta'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($Pengadaan,'tanggal_masuk'); ?>
			<?php echo $form->textField($Pengadaan,'tanggal_masuk',array('size'=>60)); ?>
			<?php echo $form->error($Pengadaan,'tanggal_masuk'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($Pengadaan,'nama panitia / pejabat pengadaan'); ?>
			<?php echo $form->dropDownList($Pengadaan,'id_panitia',CHtml::listData(Panitia::model()->findAllByAttributes(array('status_panitia'=>'Aktif')), 'id_panitia', 'nama_panitia'),array('empty'=>'-----Pilih Panitia-----'));?>
			<?php echo $form->error($Pengadaan,'id_panitia'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($Pengadaan,'metode_pengadaan'); ?>
			<?php echo $form->dropDownList($Pengadaan,'metode_pengadaan',
			  array('Penunjukan Langsung'=>'Penunjukan Lansung','Pemilihan Langsung'=>'Pemilihan Lansung','Pelelangan'=>'Pelelangan'),
					array('empty'=>"-----Pilih Metode Pengadaan------")); ?>
			<?php echo $form->error($Pengadaan,'metode_pengadaan'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($Pengadaan,'perihal_pengadaan'); ?>
			<?php echo $form->textField($Pengadaan,'perihal_pengadaan',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($Pengadaan,'perihal_pengadaan'); ?>
		</div>

		<div class="row buttons">
			<?php echo CHtml::submitButton($Pengadaan->isNewRecord ? 'Simpan' : 'Save'); ?>
		</div>

		<?php $this->endWidget(); ?>

	</div><!-- form -->
<?php	}
?>