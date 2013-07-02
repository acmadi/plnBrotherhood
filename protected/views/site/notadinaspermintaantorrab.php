<?php
/* @var $this SiteController */
?>
<?php 
	if (Kdivmum::model()->exists('username = "' . Yii::app()->user->name . '"')) {
?>
	<div class="form">
		<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'nota-dinas-permintaan-tor-rab-form',
		'enableAjaxValidation'=>false,
		)); ?>
		
		<h4><b> Nota Dinas Permintaan TOR/RAB </b></h4>
		<div class="row">
			<?php echo $form->labelEx($NDPTR,'nomor'); ?>
			<?php echo $form->textField($NDPTR,'nomor',array('size'=>56,'maxlength'=>100)); ?>
			<?php echo $form->error($NDPTR,'nomor'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($Dokumen0,'tanggal_nota_dinas'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$Dokumen0,
					'attribute'=>'tanggal',
					'value'=>$Dokumen0->tanggal,
					'htmlOptions'=>array('size'=>60),
					'options'=>array(
					'dateFormat'=>'dd-mm-yy',
					),
			));?>
			<?php echo $form->error($Dokumen0,'tanggal_masuk'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($NDPTR,'divisi_peminta'); ?>
			<?php echo $form->textField($NDPTR,'divisi_peminta',array('size'=>56,'maxlength'=>100)); ?>
			<?php echo $form->error($NDPTR,'divisi_peminta'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($NDPTR,'permintaan'); ?>
			<?php echo $form->dropDownList($NDPTR,'permintaan',
			  array('RAB'=>'Rencana Anggaran Biaya (RAB)','TOR'=>'Term Of Reference (TOR)','RAB dan TOR'=>'Rencana Anggaran Biaya (RAB) dan Term Of Reference (TOR)'),
					array('empty'=>"-----Pilih Permintaan Nota Dinas------")); ?>
			<?php echo $form->error($NDPTR,'permintaan'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($NDPTR,'nama_pengadaan'); ?>
			<?php echo $form->textField($NDPTR,'nama_pengadaan',array('size'=>56,'maxlength'=>256)); ?>
			<?php echo $form->error($NDPTR,'nama_pengadaan'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($NDPTR,'nomor nota dinas permintaan'); ?>
			<?php echo $form->textField($NDPTR,'nota_dinas_permintaan',array('size'=>56,'maxlength'=>100)); ?>
			<?php echo $form->error($NDPTR,'nota_dinas_permintaan'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($NDPTR,'tanggal_nota_dinas_permintaan'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$NDPTR,
					'attribute'=>'tanggal_nota_dinas_permintaan',
					'value'=>$NDPTR->tanggal_nota_dinas_permintaan,
					'htmlOptions'=>array('size'=>60),
					'options'=>array(
					'dateFormat'=>'dd-mm-yy',
					),
			));?>
			<?php echo $form->error($NDPTR,'tanggal_nota_dinas_permintaan'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($NDPTR,'perihal nota dinas permintaan'); ?>
			<?php echo $form->textArea($NDPTR,'perihal_permintaan',array('cols'=>43,'rows'=>3, 'maxlength'=>256)); ?>
			<?php echo $form->error($NDPTR,'perihal_permintaan'); ?>
		</div>
		
		<br/>
		
		<br/>

		<div class="row buttons">
			<?php echo CHtml::submitButton($NDPTR->isNewRecord ? 'Simpan' : 'Save',array('class'=>'sidafbutton','name'=>'simpan')); ?>
			<?php echo CHtml::submitButton($NDPTR->isNewRecord ? 'Simpan dan Buat Nota Dinas Permintaan TOR/RAB' : 'Save',array('class'=>'sidafbutton','name'=>'simpanbuat')); ?>
		</div>

		
		<?php $this->endWidget(); ?>

	</div><!-- form -->
	
	
<?php	}
?>