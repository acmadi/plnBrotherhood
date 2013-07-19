<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name . ' | Tambah Pengadaan';
?>
<?php 
	if (Yii::app()->user->getState('role') == 'kdivmum' || Yii::app()->user->getState('role') == 'divisi') {
?>
	<div class="form">
		<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'pengadaan-form',
		'enableAjaxValidation'=>false,
		)); ?>
		
		<?php echo $form->errorSummary($Pengadaan); ?>

		
		<h4><b> Pengadaan </b></h4>
		<div class="row">
			<?php echo $form->labelEx($Pengadaan,'nama_pengadaan'); ?>
			<?php echo $form->textArea($Pengadaan,'nama_pengadaan',array('cols'=>43,'rows'=>2, 'maxlength'=>100)); ?>
			<?php echo $form->error($Pengadaan,'nama_pengadaan'); ?>
		</div>
	
		<?php if(Yii::app()->user->getState('role') != 'divisi') { ?>
			<div class="row">
				<?php echo $form->labelEx($Pengadaan,'divisi_peminta'); ?>
				<?php echo $form->dropDownList($Pengadaan,'divisi_peminta',CHtml::listData(Divisi::model()->findAll(), 'username', 'nama_divisi'),array('empty'=>'-----Pilih Divisi-----'));?>
				<?php echo $form->error($Pengadaan,'divisi_peminta'); ?>
			</div>
		<?php } ?>
		
		<div class="row">
			<?php echo $form->labelEx($Pengadaan,'jenis_pengadaan'); ?>
			<?php echo $form->radioButtonList($Pengadaan,'jenis_pengadaan',
						array('Barang dan Jasa'=>'Barang dan Jasa','Jasa Konsultasi'=>'Jasa Konsultasi','Jasa'=>'Jasa','Barang'=>'Barang','Jasa Konstruksi'=>'Jasa Konstruksi','Jasa Lainnya'=>'Jasa Lainnya'),
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
					'dateFormat'=>'dd-mm-yy',
					),
			));?>
			<?php echo $form->error($Pengadaan,'tanggal_masuk'); ?>
		</div>
		
		<br/>
		<h4><b> Nota Dinas Permintaan </b></h4>
		
		<div class="row">
			<?php echo $form->labelEx($NDP,'nomor'); ?>
			<?php echo $form->textField($NDP,'nomor',array('size'=>60,'maxlength'=>50)); ?>
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
					'dateFormat'=>'dd-mm-yy',
					),
			));?>
			<?php echo $form->error($Dokumen0,'tanggal'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($NDP,'nilai_biaya_rab'); ?>
			<?php echo $form->textField($NDP,'nilai_biaya_rab',array('size'=>60,'maxlength'=>200)); ?>
			<?php echo $form->error($NDP,'nilai_biaya_rab'); ?>
		</div>
		
		<div class="row buttons">
			<?php echo CHtml::submitButton('Selanjutnya',array('class'=>'sidafbutton')); ?>
		</div>

		<?php $this->endWidget(); ?>

	</div><!-- form -->
<?php	} ?>