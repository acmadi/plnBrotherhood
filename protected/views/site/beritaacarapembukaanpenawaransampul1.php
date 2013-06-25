<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' | Generator';
$id = Yii::app()->getRequest()->getQuery('id');
$cpengadaan = Pengadaan::model()->find('id_pengadaan = "' . $id . '"');
?>

<div id="pagecontent">
	<div id="sidebar">
		<?php if(!Yii::app()->user->isGuest) $this->widget('MenuPortlet'); ?>
	</div>

	<div id="maincontent">
	
	<?php if($BAPP->isNewRecord) { ?>
		
	<?php } else { ?>
		<div>
		<?php echo CHtml::button('Surat Undangan Pembukaan Penawaran Sampul Satu', array('submit'=>array('site/editsuratundanganpembukaanpenawaransampul1',"id"=>"$cpengadaan->id_pengadaan"), 'style'=>'background:url(css/bg.gif)')); ?>
			<?php if($cpengadaan->status == 'Berita Acara Evaluasi Penawaran') { ?>
				<?php echo CHtml::button('Berita Acara Evaluasi Penawaran Sampul Satu', array('submit'=>array('site/beritaacaraevaluasipenawaransampul1',"id"=>"$cpengadaan->id_pengadaan"), 'style'=>'background:url(css/bg.gif)')); ?>
			<?php } else { ?>
				<?php echo CHtml::button('Berita Acara Evaluasi Penawaran Sampul Satu', array('submit'=>array('site/editberitaacaraevaluasipenawaransampul1',"id"=>"$cpengadaan->id_pengadaan"), 'style'=>'background:url(css/bg.gif)')); ?>
			<?php } ?>
		</div>
		</br>
	<?php } ?>
	
		<?php 
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
		?>
		<div class="form">

		<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'berita-acara-pembukaan-penawaran-form',
		'enableAjaxValidation'=>false,
		)); ?>

		<?php echo $form->errorSummary($BAPP); ?>
		
		<h4><b> Berita Acara Pembukaan Penawaran Sampul Satu </b></h4>
		<div class="row">
			<?php echo $form->labelEx($BAPP,'nomor'); ?>
			<?php echo $form->textField($BAPP,'nomor',array('size'=>56,'maxlength'=>50)); ?>
			<?php echo $form->error($BAPP,'nomor'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($BAPP,'jumlah penyedia diundang'); ?>
			<?php echo $form->textField($BAPP,'jumlah_penyedia_diundang',array('size'=>56,'maxlength'=>10)); ?>
			<?php echo $form->error($BAPP,'jumlah_penyedia_diundang'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($BAPP,'jumlah penyedia dengan dokumen yang sah'); ?>
			<?php echo $form->textField($BAPP,'jumlah_penyedia_dokumen_sah',array('size'=>56,'maxlength'=>10)); ?>
			<?php echo $form->error($BAPP,'jumlah_penyedia_dokumen_sah'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($BAPP,'jumlah penyedia dengan dokumen tidak sah'); ?>
			<?php echo $form->textField($BAPP,'jumlah_penyedia_dokumen_tidak_sah',array('size'=>56,'maxlength'=>10)); ?>
			<?php echo $form->error($BAPP,'jumlah_penyedia_dokumen_tidak_sah'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($BAPP,'status metode'); ?>
			<?php echo $form->textField($BAPP,'status_metode',array('size'=>56,'maxlength'=>10)); ?>
			<?php echo $form->error($BAPP,'status_metode'); ?>
		</div>
	
		<div class="row buttons">
			<?php echo CHtml::submitButton($BAPP->isNewRecord ? 'Simpan' : 'Perbarui',array('class'=>'sidafbutton')); ?>
		</div>
		
		<?php $this->endWidget(); ?>

		</div><!-- form -->
		
	<?php if($BAPP->isNewRecord) { ?>
		
	<?php } else { ?>
		</br>
		<div style="border-top:1px solid lightblue">
		</br>
			<h4><b> Buat Dokumen </b></h4>
			<ul class="generatedoc">
				<li><?php echo CHtml::link('Berita Acara Pembukaan Penawaran Sampul Satu', array('docx/download','id'=>$BAPP>id_dokumen)); ?></li>
				<li><?php echo CHtml::link('Daftar Hadir Pembukaan Penawaran Sampul Satu', array('docx/download','id'=>$DH->id_dokumen)); ?></li>
			</ul>
		</div>
	<?php } ?>
	
	
	<?php	} ?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'class'=>'sidafbutton'));  ?></div>