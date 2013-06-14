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
		'id'=>'surat-undangan-penjelasan-form',
		'enableAjaxValidation'=>false,
		)); ?>

		<?php echo $form->errorSummary($SUP); ?>
		
		<?php
			$Dokumen0->id_pengadaan=$id;
			$Dokumen1->id_pengadaan=$id;
			$Dokumen2->id_pengadaan=$id;
			$SUP->nama_pengadaan=Pengadaan::model()->findByPk($id)->nama_pengadaan;
		?>
		
		<h4><b> Pengadaan </b></h4>
		<div class="row">
		<?php echo $form->labelEx($Dokumen0,'id_pengadaan'); ?>
		<?php echo $form->textField($Dokumen0,'id_pengadaan',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($Dokumen0,'id_pengadaan'); ?>
		</div>
		
		<h4><b> Surat Undangan Aanwijzing </b></h4>
		<div class="row">
			<?php echo $form->labelEx($SUP,'nomor'); ?>
			<?php echo $form->textField($SUP,'nomor',array('size'=>60,'maxlength'=>20)); ?>
			<?php echo $form->error($SUP,'nomor'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($Dokumen0,'tanggal surat'); ?>
			<?php echo $form->textField($Dokumen0,'tanggal',array('size'=>60)); ?>
			<?php echo $form->error($Dokumen0,'tanggal'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($SUP,'sifat'); ?>
			<?php echo $form->textField($SUP,'sifat',array('size'=>60,'maxlength'=>20)); ?>
			<?php echo $form->error($SUP,'sifat'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($SUP,'perihal'); ?>
			<?php echo $form->textField($SUP,'perihal',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($SUP,'perihal'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($SUP,'hari / tanggal Aanwijzing'); ?>
			<?php echo $form->textField($SUP,'hari_tanggal',array('size'=>60,'maxlength'=>20)); ?>
			<?php echo $form->error($SUP,'hari_tanggal'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($SUP,'waktu Aanwijzing'); ?>
			<?php echo $form->textField($SUP,'waktu',array('size'=>60,'maxlength'=>20)); ?>
			<?php echo $form->error($SUP,'waktu'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($SUP,'tempat Aanwijzing'); ?>
			<?php echo $form->textField($SUP,'tempat',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($SUP,'tempat'); ?>
		</div>
		
		<h4><b> Berita Acara Aanwijzing </b></h4>
		<div class="row">
			<?php echo $form->labelEx($BAP,'nomor'); ?>
			<?php echo $form->textField($BAP,'nomor',array('size'=>60,'maxlength'=>20)); ?>
			<?php echo $form->error($BAP,'nomor'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($Dokumen1,'tanggal berita acara'); ?>
			<?php echo $form->textField($Dokumen1,'tanggal',array('size'=>60)); ?>
			<?php echo $form->error($Dokumen1,'tanggal'); ?>
		</div>

		<div class="row buttons">
			<?php echo CHtml::submitButton($SUP->isNewRecord ? 'Simpan' : 'Save',array('class'=>'sidafbutton')); ?>
		</div>
		
	<?php $this->endWidget(); ?>

	</div><!-- form -->
	
	
<?php	}
?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'class'=>'sidafbutton'));  ?></div>
