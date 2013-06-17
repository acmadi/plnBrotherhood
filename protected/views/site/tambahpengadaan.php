<?php
/* @var $this SiteController */
?>
<?php 
	if (Kdivmum::model()->exists('username = "' . Yii::app()->user->name . '"')) {
?>
	<div class="form">
		<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'pengadaan-form',
		'enableAjaxValidation'=>false,
		)); ?>

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
			 <?php /*echo $form->textField($Pengadaan,'tanggal_masuk',array('size'=>60)); */?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$Pengadaan,
					'attribute'=>'tanggal_masuk',
					'value'=>$Pengadaan->tanggal_masuk,
					'options'=>array(
					'dateFormat'=>'yy-mm-dd',
					),
			));?>
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
		
		</br>
		<h4><b> Nota Dinas Permintaan </b></h4>
		<div class="row">
			<?php echo $form->labelEx($NDP,'nomor'); ?>
			<?php echo $form->textField($NDP,'nomor',array('size'=>60,'maxlength'=>20)); ?>
			<?php echo $form->error($NDP,'nomor'); ?>
		</div>
		
		<div class="row buttons">
			<?php echo CHtml::button('Unggah Nota Dinas Permintaan', array('class'=>'sidafbutton'));?>
		</div>
		
		</br>
		</br>
		<h4><b> Nota Dinas Perintah Pengadaan </b></h4>
		<div class="row">
			<?php echo $form->labelEx($NDPP,'nomor'); ?>
			<?php echo $form->textField($NDPP,'nomor',array('size'=>60,'maxlength'=>20)); ?>
			<?php echo $form->error($NDPP,'nomor'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($NDPP,'dari'); ?>
			<?php echo $form->dropDownList($NDPP,'dari',
			  array('KDIVMUM'=>'KDIVMUM','MS-DAF'=>'MS-DAF'),
					array('empty'=>"-----Pilih Pengirim Nota Dinas------")); ?>
			<?php echo $form->error($NDPP,'dari'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($NDPP,'perihal'); ?>
			<?php echo $form->textField($NDPP,'perihal',array('size'=>60,'maxlength'=>50)); ?>
			<?php echo $form->error($NDPP,'perihal'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($NDPP,'Target SPK/Kontrak'); ?>
			<?php echo $form->textField($NDPP,'targetSPK_kontrak',array('size'=>60)); ?>
			<?php echo $form->error($NDPP,'targetSPK_kontrak'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($NDPP,'sumber_dana'); ?>
			<?php echo $form->textField($NDPP,'sumber_dana',array('size'=>60,'maxlength'=>20)); ?>
			<?php echo $form->error($NDPP,'sumber_dana'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($NDPP,'pagu_anggaran'); ?>
			<?php echo $form->textField($NDPP,'pagu_anggaran',array('size'=>60,'maxlength'=>20)); ?>
			<?php echo $form->error($NDPP,'pagu_anggaran'); ?>
		</div>
		
		</br>
		</br>
		
		<div class="row buttons">
			<?php echo CHtml::button('Unggah TOR',array('class'=>'sidafbutton'));?>
		</div>
		
		</br>
		</br>
		
		<div class="row buttons">
			<?php echo CHtml::button('Unggah RAB', array('class'=>'sidafbutton'));?>
		</div>
		
		</br>
		</br>

		<div class="row buttons">
			<?php echo CHtml::submitButton($Pengadaan->isNewRecord ? 'Simpan' : 'Save',array('class'=>'sidafbutton')); ?>
		</div>

		<?php $this->endWidget(); ?>

	</div><!-- form -->
	
	
<?php	}
?>