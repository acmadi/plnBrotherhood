<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' | Generator';
$id = Yii::app()->getRequest()->getQuery('id');
?>

<div id="pagecontent">
	<div id="sidebar">
		<?php if(!Yii::app()->user->isGuest) $this->widget('MenuPortlet'); ?>
	</div>

	<div id="maincontent">
		<?php 
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
		?>
		
		<?php if(Yii::app()->user->hasFlash('sukses')): ?>
 			<div class="flash-success">
				<?php echo Yii::app()->user->getFlash('sukses'); ?>
				<script type="text/javascript">
					setTimeout(function() {
						$('.flash-success').animate({
							height: '0px',
							marginBottom: '0em',
							padding: '0em',
							opacity: '0.0'
						}, 1000, function() {
							$('.flash-success').hide();
						});
					}, 2000);
				</script>
			</div>
		<?php endif; ?>
		
		<div class="form">

		<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'surat-undangan-penjelasan-form',
		'enableAjaxValidation'=>false,
		)); ?>
		
		<h4><b> Surat Undangan Negosiasi dan Klarifikasi </b></h4>
		<div class="row">
			<?php echo $form->labelEx($SUNK,'nomor'); ?>
			<?php echo $form->textField($SUNK,'nomor',array('size'=>56,'maxlength'=>50)); ?>
			<?php echo $form->error($SUNK,'nomor'); ?>
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

		<div class="row">
			<?php echo $form->labelEx($SUNK,'perihal'); ?>
			<?php echo $form->textArea($SUNK,'perihal',array('cols'=>40,'rows'=>3, 'maxlength'=>100)); ?>
			<?php echo $form->error($SUNK,'perihal'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($SUNK,'nama calon penyedia'); ?>
			<?php echo $form->textField($SUNK,'kepada',array('size'=>56,'maxlength'=>30)); ?>
			<?php echo $form->error($SUNK,'kepada'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($SUNK,'tanggal Negosiasi dan Klarifikasi'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$SUNK,
					'attribute'=>'tanggal_undangan',
					'value'=>$SUNK->tanggal_undangan,
					'htmlOptions'=>array('size'=>56),
					'options'=>array(
					'dateFormat'=>'yy-mm-dd',
					),
			));?>
			<?php echo $form->error($SUNK,'tanggal_undangan'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($SUNK,'waktu Negosiasi dan Klarifikasi (Format HH:MM)'); ?>
			<?php echo $form->textField($SUNK,'waktu',array('size'=>56,'maxlength'=>10)); ?>
			<?php echo $form->error($SUNK,'waktu'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($SUNK,'tempat Negosiasi dan Klarifikasi'); ?>
			<?php echo $form->textArea($SUNK,'tempat',array('cols'=>40,'rows'=>3, 'maxlength'=>100)); ?>
			<?php echo $form->error($SUNK,'tempat'); ?>
		</div>
		
		<h4><b> Berita Acara Aanwijzing </b></h4>
		<div class="row">
			<?php echo $form->labelEx($BANK,'nomor'); ?>
			<?php echo $form->textField($BANK,'nomor',array('size'=>56,'maxlength'=>50)); ?>
			<?php echo $form->error($BANK,'nomor'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($BANK,'surat penawaran harga'); ?>
			<?php echo $form->textField($BANK,'surat_penawaran_harga',array('size'=>56,'maxlength'=>50)); ?>
			<?php echo $form->error($BANK,'surat_penawaran_harga'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($BANK,'hak kewajiban penyedia'); ?>
			<?php echo $form->textField($BANK,'hak_kewajiban_penyedia',array('size'=>56,'maxlength'=>50)); ?>
			<?php echo $form->error($BANK,'hak_kewajiban_penyedia'); ?>
		</div>

		<div class="row buttons">
			<?php echo CHtml::submitButton('Perbarui',array('class'=>'sidafbutton')); ?>
		</div>
		
	<?php $this->endWidget(); ?>

	</div><!-- form -->
	
	</br>
	<div style="border-top:1px solid lightblue">
	</br>
		<h4><b> Buat Dokumen </b></h4>
		<ul class="generatedoc">
			<li><?php echo CHtml::link('Surat Undangan Negosiasi dan Klarifikasi', array('docx/download','id'=>$SUNK->id_dokumen)); ?></li>
			<li><?php echo CHtml::link('Berita Acara Negosiasi dan Klarifikasi', array('docx/download','id'=>$BANK->id_dokumen)); ?></li>
			<li><?php echo CHtml::link('Daftar Hadir Negosiasi dan Klarifikasi', array('docx/download','id'=>$DH->id_dokumen)); ?></li>
		</ul>
	</div>
	
	<?php	} ?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'class'=>'sidafbutton'));  ?></div>
