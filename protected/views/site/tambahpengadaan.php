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

		<div class="row">
			<?php echo $form->labelEx($Pengadaan,'nama_pengadaan'); ?>
			<?php echo $form->textArea($Pengadaan,'nama_pengadaan',array('cols'=>43,'rows'=>2, 'maxlength'=>100)); ?>
			<?php echo $form->error($Pengadaan,'nama_pengadaan'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($Pengadaan,'divisi_peminta'); ?>
			<?php echo $form->dropDownList($Pengadaan,'divisi_peminta',CHtml::listData(Divisi::model()->findAll(), 'username', 'username'),array('empty'=>'-----Pilih Divisi-----'));?>
			<?php echo $form->error($Pengadaan,'divisi_peminta'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($Pengadaan,'jenis_pengadaan'); ?>
			<?php echo $form->radioButtonList($Pengadaan,'jenis_pengadaan',
						array('Barang dan Jasa'=>'Barang dan Jasa','Jasa Konsultasi'=>'Jasa Konsultasi'),
						array('separator'=>' ', 'labelOptions'=>array('style'=>'display:inline'))); ?>
			<?php echo $form->error($Pengadaan,'jenis_pengadaan'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($Pengadaan,'tanggal_masuk'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$Pengadaan,
					'attribute'=>'tanggal_masuk',
					'value'=>$Pengadaan->tanggal_masuk,
					'htmlOptions'=>array('size'=>60),
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
			  array('Penunjukan Langsung'=>'Penunjukan Langsung','Pemilihan Langsung'=>'Pemilihan Langsung','Pelelangan'=>'Pelelangan'),
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
		
		<div class="row">
			<?php echo $form->labelEx($Dokumen0,'tanggal surat'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$Dokumen0,
					'attribute'=>'tanggal',
					'value'=>$Dokumen0->tanggal,
					'htmlOptions'=>array('size'=>56),
					'options'=>array(
					'dateFormat'=>'yy-mm-dd',
					),
			));?>
			<?php echo $form->error($Dokumen0,'tanggal'); ?>
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
			  array('KDIVMUM'=>'KDIVMUM','MSDAF'=>'MSDAF'),
					array('empty'=>"-----Pilih Pengirim Nota Dinas------")); ?>
			<?php echo $form->error($NDPP,'dari'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($NDPP,'perihal'); ?>
			<?php echo $form->textArea($NDPP,'perihal',array('cols'=>43,'rows'=>2, 'maxlength'=>100)); ?>
			<?php echo $form->error($NDPP,'perihal'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($NDPP,'Target SPK/Kontrak (Ket: Dalam Satuan Hari)'); ?>
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
		
		<div class="row buttons">
			<?php echo CHtml::button('Unggah TOR',array('class'=>'sidafbutton'));?>
			<?php echo CHtml::button('Unggah RAB', array('class'=>'sidafbutton'));?>
		</div>
		
		</br>

		<div class="row buttons">
			<?php echo CHtml::submitButton($Pengadaan->isNewRecord ? 'Simpan' : 'Save',array('class'=>'sidafbutton','name'=>'simpan')); ?>
			<?php echo CHtml::submitButton($Pengadaan->isNewRecord ? 'Simpan dan Buat Nota Dinas Perintah Pengadaan' : 'Save',array('class'=>'sidafbutton','name'=>'simpanbuat')); ?>
		</div>

		
		<?php $this->endWidget(); ?>

	</div><!-- form -->
	
	
<?php	}
?>