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
		'id'=>'surat-undangan-pembukaan-penawaran-form',
		'enableAjaxValidation'=>false,
		)); ?>

		<?php echo $form->errorSummary($SUPPx); ?>
		
		<h4><b> Surat Undangan Pembukaan Penawaran </b></h4>
		<div class="row">
			<?php echo $form->labelEx($SUPPx,'nomor'); ?>
			<?php echo $form->textField($SUPPx,'nomor',array('size'=>56,'maxlength'=>20)); ?>
			<?php echo $form->error($SUPPx,'nomor'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($Dokumenx,'tanggal surat'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$Dokumenx,
					'attribute'=>'tanggal',
					'value'=>$Dokumenx->tanggal,
					'htmlOptions'=>array('size'=>56),
					'options'=>array(
					'dateFormat'=>'yy-mm-dd',
					),
			));?>
			<?php echo $form->error($Dokumenx,'tanggal'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($SUPPx,'perihal'); ?>
			<?php echo $form->textArea($SUPPx,'perihal',array('cols'=>40,'rows'=>3, 'maxlength'=>100)); ?>
			<?php echo $form->error($SUPPx,'perihal'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($SUPPx,'tanggal Aanwijzing'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$SUPPx,
					'attribute'=>'tanggal_undangan',
					'value'=>$SUPPx->tanggal_undangan,
					'htmlOptions'=>array('size'=>56),
					'options'=>array(
					'dateFormat'=>'yy-mm-dd',
					),
			));?>
			<?php echo $form->error($SUPPx,'tanggal_undangan'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($SUPPx,'waktu Aanwijzing'); ?>
			<?php echo $form->textField($SUPPx,'waktu',array('size'=>56,'maxlength'=>20)); ?>
			<?php echo $form->error($SUPPx,'waktu'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($SUPPx,'tempat Aanwijzing'); ?>
			<?php echo $form->textArea($SUPPx,'tempat',array('cols'=>40,'rows'=>3, 'maxlength'=>100)); ?>
			<?php echo $form->error($SUPPx,'tempat'); ?>
		</div>
		
		<h4><b> Berita Acara Pembukaan Penawaran </b></h4>
		<div class="row">
			<?php echo $form->labelEx($BAPPx,'nomor'); ?>
			<?php echo $form->textField($BAPPx,'nomor',array('size'=>56,'maxlength'=>20)); ?>
			<?php echo $form->error($BAPPx,'nomor'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($BAPPx,'jumlah penyedia diundang'); ?>
			<?php echo $form->textField($BAPPx,'jumlah_penyedia_diundang',array('size'=>56,'maxlength'=>20)); ?>
			<?php echo $form->error($BAPPx,'jumlah_penyedia_diundang'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($BAPPx,'jumlah penyedia dengan dokumen yang sah'); ?>
			<?php echo $form->textField($BAPPx,'jumlah_penyedia_dokumen_sah',array('size'=>56,'maxlength'=>20)); ?>
			<?php echo $form->error($BAPPx,'jumlah_penyedia_dokumen_sah'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($BAPPx,'jumlah penyedia dengan dokumen tidak sah'); ?>
			<?php echo $form->textField($BAPPx,'jumlah_penyedia_dokumen_tidak_sah',array('size'=>56,'maxlength'=>20)); ?>
			<?php echo $form->error($BAPPx,'jumlah_penyedia_dokumen_tidak_sah'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($BAPPx,'status metode'); ?>
			<?php echo $form->textField($BAPPx,'status_metode',array('size'=>56,'maxlength'=>20)); ?>
			<?php echo $form->error($BAPPx,'status_metode'); ?>
		</div>

		<div class="row buttons">
			<?php echo CHtml::submitButton($Dokumenx->isNewRecord ? 'Simpan' : 'Save',array('class'=>'sidafbutton')); ?>
		</div>
		
	<?php $this->endWidget(); ?>

	</div><!-- form -->
	
	
<?php	}
?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'class'=>'sidafbutton'));  ?></div>
