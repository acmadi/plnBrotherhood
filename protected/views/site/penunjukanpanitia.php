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
			'id'=>'rks-form',
			'enableAjaxValidation'=>false,
		)); ?>


			<?php echo $form->errorSummary($Rks); ?>
			<h4><b> RKS </b></h4>
			<div class="row">
				<?php echo $form->labelEx($Rks,'nomor'); ?>
				<?php echo $form->textField($Rks,'nomor',array('size'=>32,'maxlength'=>20)); ?>
				<?php echo $form->error($Rks,'nomor'); ?>
			</div>
			
			<div class="row">
				<?php echo $form->labelEx($Dokumen1,'tanggal surat'); ?>
				<?php echo $form->textField($Dokumen1,'tanggal',array('size'=>32)); ?>
				<?php echo $form->error($Dokumen1,'tanggal'); ?>
			</div>
			</br>
			
			<h4><b> Metode Penawaran Pengadaan</b></h4>
			<div class="row">
				<?php echo $form->dropDownList($Pengadaan,'metode_penawaran',
					array('Satu Sampul'=>'Satu Sampul','Dua Sampul'=>'Dua Sampul','Dua Tahap'=>'Dua Tahap'),
					array('empty'=>"------Pilih Metode Penawaran------")); ?>
				<?php echo $form->error($Pengadaan,'metode_penawaran'); ?>
			</div>
			</br>
			
			<h4><b> Jenis Kualifikasi Pengadaan</b></h4>
			<div class="row">
				<?php echo $form->dropDownList($Pengadaan,'jenis_kualifikasi',
					array('Pra Kualifikasi'=>'Pra Kualifikasi','Pasca Kualifikasi'=>'Pasca Kualifikasi'),
					array('empty'=>"------Pilih Jenis Kualifikasi------")); ?>
				<?php echo $form->error($Pengadaan,'jenis_kualifikasi'); ?>
			</div>
			</br>

			<div class="row buttons">
				<?php echo CHtml::submitButton($Rks->isNewRecord ? 'Simpan' : 'Save', array('class'=>'sidafbutton')); ?>
			</div>

			<?php $this->endWidget(); ?>

		</div><!-- form -->
		<?php }
		?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'class'=>'sidafbutton'));  ?></div>
