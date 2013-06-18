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
		<div class="form">

		<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'surat-undangan-prakualifikasi-form',
		'enableAjaxValidation'=>false,
		)); ?>

		<?php echo $form->errorSummary($X); ?>
		
		<h4><b> Surat Undangan Prakualifikasi</b></h4>		
		<div class="row">
			<?php echo $form->labelEx($Dokumenx,'tanggal surat'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$Dokumenx,
					'attribute'=>'tanggal',
					'value'=>$Dokumenx->tanggal,
					'options'=>array(
					'dateFormat'=>'yy-mm-dd',
					),
			));?>
			<?php echo $form->error($Dokumenx,'tanggal'); ?>
		</div>
		
		</br>		
		<h4><b> Surat Pemberitahuan Pengadaan</b></h4>
		<div class="row">
			<?php echo $form->labelEx($X,'nomor'); ?>
			<?php echo $form->textField($X,'nomor',array('size'=>60,'maxlength'=>20)); ?>
			<?php echo $form->error($X,'nomor'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($X,'perihal'); ?>
			<?php echo $form->textField($X,'perihal',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($X,'perihal'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($X,'lingkup kerja'); ?>
			<?php echo $form->textField($X,'lingkup_kerja',array('size'=>60,'maxlength'=>20)); ?>
			<?php echo $form->error($X,'lingkup_kerja'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($X,'tanggal penawaran'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$X,
					'attribute'=>'tanggal_penawaran',
					'value'=>$X->tanggal_penawaran,
					'options'=>array(
					'dateFormat'=>'yy-mm-dd',
					),
			));?>
			<?php echo $form->error($X,'tanggal_penawaran'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($X,'waktu kerja (dalam satuan hari kerja)'); ?>
			<?php echo $form->textField($X,'waktu_kerja',array('size'=>60,'maxlength'=>20)); ?>
			<?php echo $form->error($X,'waktu_kerja'); ?>
		</div>
		
		<div class="row buttons">
			<?php echo CHtml::submitButton($Dokumenx->isNewRecord ? 'Simpan' : 'Save',array('class'=>'sidafbutton')); ?>
		</div>
		
	<?php $this->endWidget(); ?>

	</div><!-- form -->
	
	
<?php	} ?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'class'=>'sidafbutton'));  ?></div>
