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


			<?php echo $form->errorSummary($Rksx); ?>
			<h4><b> RKS </b></h4>
			<div class="row">
				<?php echo $form->labelEx($Rksx,'nomor'); ?>
				<?php echo $form->textField($Rksx,'nomor',array('size'=>32,'maxlength'=>20)); ?>
				<?php echo $form->error($Rksx,'nomor'); ?>
			</div>
			
			<div class="row">
				<?php echo $form->labelEx($Dokumenx,'tanggal'); ?>
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
			
			<h4><b> Metode Penawaran Pengadaan</b></h4>
			<div class="row">
				<?php echo $form->radioButtonList($Pengadaanx,'metode_penawaran',
					array('Satu Sampul'=>'Satu Sampul','Dua Sampul'=>'Dua Sampul','Dua Tahap'=>'Dua Tahap'),
					array('separator'=>' ', 'labelOptions'=>array('style'=>'display:inline'))); ?>
				<?php echo $form->error($Pengadaanx,'metode_penawaran'); ?>
			</div>
			</br>
			
			<h4><b> Jenis Kualifikasi Pengadaan</b></h4>
			<div class="row">
				<?php echo $form->dropDownList($Pengadaanx,'jenis_kualifikasi',
					array('Pra Kualifikasi'=>'Pra Kualifikasi','Pasca Kualifikasi'=>'Pasca Kualifikasi'),
					array('empty'=>"------Pilih Jenis Kualifikasi------")); ?>
				<?php echo $form->error($Pengadaanx,'jenis_kualifikasi'); ?>
			</div>
			</br>

			<div class="row buttons">
				<?php echo CHtml::submitButton($Rksx->isNewRecord ? 'Simpan' : 'Save', array('class'=>'sidafbutton')); ?>
			</div>

			<?php $this->endWidget(); ?>

		</div><!-- form -->
		<?php }
		?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'class'=>'sidafbutton'));  ?></div>
