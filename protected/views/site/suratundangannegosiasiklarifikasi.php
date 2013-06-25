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
	
	<?php if($SUNK->isNewRecord) { ?>
		
	<?php } else { ?>
		<div>
			<?php if($cpengadaan->status == '15') { ?>
				<?php echo CHtml::button('Berita Acara Negosiasi dan Klarifikasi', array('submit'=>array('site/beritaacaranegosiasiklarifikasi',"id"=>"$cpengadaan->id_pengadaan"), 'class'=>'sidafbutton')); ?>
			<?php } else { ?>
				<?php echo CHtml::button('Berita Acara Negosiasi dan Klarifikasi', array('submit'=>array('site/editberitaacaranegosiasiklarifikasi',"id"=>"$cpengadaan->id_pengadaan"), 'class'=>'sidafbutton')); ?>
			<?php } ?>
		</div>
		<br/>
	<?php } ?>
	
		<?php 
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
		?>
		<div class="form">

		<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'surat-undangan-negosiasi-klarifikasi-form',
		'enableAjaxValidation'=>false,
		)); ?>

		<?php echo $form->errorSummary($SUNK); ?>
		
		<h4><b> Surat Undangan Negosiasi dan Klarifikasi </b></h4>
		<div class="row">
			<?php echo $form->labelEx($SUNK,'nomor'); ?>
			<?php echo $form->textField($SUNK,'nomor',array('size'=>56,'maxlength'=>50)); ?>
			<?php echo $form->error($SUNK,'nomor'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($Dokumen0,'tanggal surat'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$Dokumen0,
					'attribute'=>'tanggal',
					'value'=>$Dokumen0->tanggal,
					'htmlOptions'=>array('size'=>56),
					'options'=>array(
					'dateFormat'=>'yy-mm-dd',
					),
			));?>
			<?php echo $form->error($Dokumen0,'tanggal'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($SUNK,'perihal'); ?>
			<?php echo $form->textArea($SUNK,'perihal',array('cols'=>40,'rows'=>3, 'maxlength'=>100)); ?>
			<?php echo $form->error($SUNK,'perihal'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($SUNK,'nama calon penyedia'); ?>
			<?php echo $form->textField($SUNK,'kepada',array('size'=>56,'maxlength'=>30)); ?>
			<?php echo $form->error($SUNK,'kepada'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($SUNK,'tanggal Negosiasi dan Klarifikasi'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$SUNK,
					'attribute'=>'tanggal_undangan',
					'value'=>$SUNK->tanggal_undangan,
					'htmlOptions'=>array('size'=>56),
					'options'=>array(
					'dateFormat'=>'yy-mm-dd',
					),
			));?>
			<?php echo $form->error($SUNK,'tanggal_undangan'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($SUNK,'waktu Negosiasi dan Klarifikasi (Format HH:MM)'); ?>
			<?php echo $form->textField($SUNK,'waktu',array('size'=>56,'maxlength'=>10)); ?>
			<?php echo $form->error($SUNK,'waktu'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($SUNK,'tempat Negosiasi dan Klarifikasi'); ?>
			<?php echo $form->textArea($SUNK,'tempat',array('cols'=>40,'rows'=>3, 'maxlength'=>100)); ?>
			<?php echo $form->error($SUNK,'tempat'); ?>
		</div>

		<div class="row buttons">
			<?php echo CHtml::submitButton($SUNK->isNewRecord ? 'Simpan' : 'Perbarui',array('class'=>'sidafbutton')); ?>
		</div>
		
	<?php $this->endWidget(); ?>

	</div><!-- form -->
	
	<?php if($SUNK->isNewRecord) { ?>
		
	<?php } else { ?>
		<br/>
		<div style="border-top:1px solid lightblue">
		<br/>
			<h4><b> Buat Dokumen </b></h4>
			<ul class="generatedoc">
				<li><?php echo CHtml::link('Surat Undangan Negosiasi dan Klarifikasi', array('docx/download','id'=>$SUNK->id_dokumen)); ?></li>
			</ul>
		</div>
	<?php } ?>
	
<?php	} ?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'style'=>'background:url(css/bg.gif)'));  ?></div>
