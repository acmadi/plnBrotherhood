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

		<?php echo $form->errorSummary($SUPDP); ?>
		
		<h4><b> Surat Undangan Pengambilan Dokumen Pengadaan </b></h4>
		<div class="row">
			<?php echo $form->labelEx($SUPDP,'nomor'); ?>
			<?php echo $form->textField($SUPDP,'nomor',array('size'=>60,'maxlength'=>20)); ?>
			<?php echo $form->error($SUPDP,'nomor'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($Dokumen0,'tanggal surat'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$Dokumen0,
					'attribute'=>'tanggal',
					'value'=>$Dokumen0->tanggal,
					'options'=>array(
					'dateFormat'=>'yy-mm-dd',
					),
			));?>
			<?php echo $form->error($Dokumen0,'tanggal'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($SUPDP,'sifat'); ?>
			<?php echo $form->textField($SUPDP,'sifat',array('size'=>60,'maxlength'=>20)); ?>
			<?php echo $form->error($SUPDP,'sifat'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($SUPDP,'perihal'); ?>
			<?php echo $form->textField($SUPDP,'perihal',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($SUPDP,'perihal'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($SUPDP,'tanggal pengambilan'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$SUPDP,
					'attribute'=>'tanggal_pengambilan',
					'value'=>$SUPDP->tanggal_pengambilan,
					'options'=>array(
					'dateFormat'=>'yy-mm-dd',
					),
			));?>
			<?php echo $form->error($SUPDP,'tanggal_pengambilan'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($SUPDP,'waktu pengambilan'); ?>
			<?php echo $form->textField($SUPDP,'waktu_pengambilan',array('size'=>60,'maxlength'=>20)); ?>
			<?php echo $form->error($SUPDP,'waktu_pengambilan'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($SUPDP,'tempat_pengambilan'); ?>
			<?php echo $form->textField($SUPDP,'tempat_pengambilan',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($SUPDP,'tempat_pengambilan'); ?>
		</div>

		<div class="row buttons">
			<?php echo CHtml::submitButton($Dokumen0->isNewRecord ? 'Simpan' : 'Save',array('class'=>'sidafbutton')); ?>
		</div>
		
	<?php $this->endWidget(); ?>

	</div><!-- form -->
	
	
<?php	} ?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'style'=>'background:url(css/bg.gif)'));  ?></div>
