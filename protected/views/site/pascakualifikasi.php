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
		
		<br/>		
		<h4><b> Surat Pemberitahuan Pengadaan</b></h4>
		<div class="row">
			<?php echo $form->labelEx($X1,'nomor'); ?>
			<?php echo $form->textField($X1,'nomor',array('size'=>56,'maxlength'=>50)); ?>
			<?php echo $form->error($X1,'nomor'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($Dokumen1,'tanggal surat'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$Dokumen1,
					'attribute'=>'tanggal',
					'value'=>$Dokumen1->tanggal,
					'htmlOptions'=>array('size'=>56),
					'options'=>array(
					'dateFormat'=>'yy-mm-dd',
					),
			));?>
			<?php echo $form->error($Dokumen1,'tanggal'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($X1,'perihal'); ?>
			<?php echo $form->textArea($X1,'perihal',array('cols'=>43,'rows'=>3, 'maxlength'=>100)); ?>
			<?php echo $form->error($X1,'perihal'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($X1,'lingkup kerja'); ?>
			<?php echo $form->textField($X1,'lingkup_kerja',array('size'=>56,'maxlength'=>20)); ?>
			<?php echo $form->error($X1,'lingkup_kerja'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($X1,'tanggal penawaran'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$X1,
					'attribute'=>'tanggal_penawaran',
					'value'=>$X1->tanggal_penawaran,
					'htmlOptions'=>array('size'=>56),
					'options'=>array(
					'dateFormat'=>'yy-mm-dd',
					),
			));?>
			<?php echo $form->error($X1,'tanggal_penawaran'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($X1,'waktu kerja'); ?>
			<?php echo $form->textField($X1,'waktu_kerja',array('size'=>56,'maxlength'=>20)); ?>
			<?php echo $form->error($X1,'waktu_kerja'); ?>
		</div>
		
		<div class="row buttons">
			<?php echo CHtml::submitButton('Simpan',array('class'=>'sidafbutton')); ?>
		</div>
		
	<?php $this->endWidget(); ?>

	</div><!-- form -->
	
	
<?php	} ?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'class'=>'sidafbutton'));  ?></div>
