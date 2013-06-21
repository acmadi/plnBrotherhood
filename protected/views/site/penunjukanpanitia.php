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

			<h4><b> RKS </b></h4>
			<div class="row">
				<?php echo $form->labelEx($Rks,'nomor'); ?>
				<?php echo $form->textField($Rks,'nomor',array('size'=>56,'maxlength'=>50)); ?>
				<?php echo $form->error($Rks,'nomor'); ?>
			</div>
			
			<div class="row">
				<?php echo $form->labelEx($Dokumen1,'tanggal'); ?>
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
			</br>
			
			<h4><b> Metode Penawaran Pengadaan</b></h4>
			<?php if($Pengadaan->metode_pengadaan=='Penunjukan Langsung'){ ?>
				<div class="row">
					<?php echo $form->radioButtonList($Pengadaan,'metode_penawaran',
						array('Satu Sampul'=>'Satu Sampul'),
						array('separator'=>' ', 'labelOptions'=>array('style'=>'display:inline'))); ?>
					<?php echo $form->error($Pengadaan,'metode_penawaran'); ?>
				</div>
				</br>
			<?php } else if($Pengadaan->metode_pengadaan=='Pemilihan Langsung'){ ?>
				<div class="row">
					<?php echo $form->radioButtonList($Pengadaan,'metode_penawaran',
						array('Satu Sampul'=>'Satu Sampul','Dua Sampul'=>'Dua Sampul'),
						array('separator'=>' ', 'labelOptions'=>array('style'=>'display:inline'))); ?>
					<?php echo $form->error($Pengadaan,'metode_penawaran'); ?>
				</div>
				</br>
			<?php } else { ?>
				<div class="row">
					<?php echo $form->radioButtonList($Pengadaan,'metode_penawaran',
						array('Satu Sampul'=>'Satu Sampul','Dua Sampul'=>'Dua Sampul','Dua Tahap'=>'Dua Tahap'),
						array('separator'=>' ', 'labelOptions'=>array('style'=>'display:inline'))); ?>
					<?php echo $form->error($Pengadaan,'metode_penawaran'); ?>
				</div>
				</br>
			<?php } ?>
			
			<h4><b> Jenis Kualifikasi Pengadaan</b></h4>
			<div class="row">
				<?php echo $form->dropDownList($Pengadaan,'jenis_kualifikasi',
					array('Pra Kualifikasi'=>'Pra Kualifikasi','Pasca Kualifikasi'=>'Pasca Kualifikasi'),
					array('empty'=>"------Pilih Jenis Kualifikasi------")); ?>
				<?php echo $form->error($Pengadaan,'jenis_kualifikasi'); ?>
			</div>
			</br>

			<div class="row buttons">
				<?php echo CHtml::submitButton('Simpan', array('class'=>'sidafbutton')); ?>
			</div>

			<?php $this->endWidget(); ?>

		</div><!-- form -->
		<?php }
		?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'class'=>'sidafbutton'));  ?></div>
