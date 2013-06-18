<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' | Generator';
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
		'id'=>'surat-undangan-pengambilan-dokumen-pengadaan-form',
		'enableAjaxValidation'=>false,
		)); ?>

		<?php echo $form->errorSummary($SUPDPx); ?>
		
		<h4><b> Surat Undangan Pengambilan Dokumen Pengadaan </b></h4>
		<div class="row">
			<?php echo $form->labelEx($SUPDPx,'nomor'); ?>
			<?php echo $form->textField($SUPDPx,'nomor',array('size'=>60,'maxlength'=>20)); ?>
			<?php echo $form->error($SUPDPx,'nomor'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($Dokumenx,'tanggal surat'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$Dokumenx,
					'attribute'=>'tanggal',
					'value'=>$Dokumenx->tanggal,
					'htmlOptions'=>array('size'=>60),
					'options'=>array(
					'dateFormat'=>'yy-mm-dd',
					),
			));?>
			<?php echo $form->error($Dokumenx,'tanggal'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($SUPDPx,'sifat'); ?>
			<?php echo $form->textField($SUPDPx,'sifat',array('size'=>60,'maxlength'=>20)); ?>
			<?php echo $form->error($SUPDPx,'sifat'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($SUPDPx,'perihal'); ?>
			<?php echo $form->textField($SUPDPx,'perihal',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($SUPDPx,'perihal'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($SUPDPx,'tanggal pengambilan'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$SUPDPx,
					'attribute'=>'tanggal_pengambilan',
					'value'=>$SUPDPx->tanggal_pengambilan,
					'htmlOptions'=>array('size'=>60),
					'options'=>array(
					'dateFormat'=>'yy-mm-dd',
					),
			));?>
			<?php echo $form->error($SUPDPx,'tanggal_pengambilan'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($SUPDPx,'waktu pengambilan'); ?>
			<?php echo $form->textField($SUPDPx,'waktu_pengambilan',array('size'=>60,'maxlength'=>20)); ?>
			<?php echo $form->error($SUPDPx,'waktu_pengambilan'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($SUPDPx,'tempat_pengambilan'); ?>
			<?php echo $form->textField($SUPDPx,'tempat_pengambilan',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($SUPDPx,'tempat_pengambilan'); ?>
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
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'style'=>'background:url(css/bg.gif)'));  ?></div>
