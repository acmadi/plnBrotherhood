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
	
	<?php if($SUPP->isNewRecord) { ?>
		
	<?php } else { ?>
		<div>
			<?php if($cpengadaan->status == '9') { ?>
				<?php echo CHtml::button('Berita Acara Pembukaan Penawaran Sampul Satu', array('submit'=>array('site/beritaacarapembukaanpenawaransampul1',"id"=>"$cpengadaan->id_pengadaan"), 'class'=>'sidafbutton')); ?>
			<?php } else { ?>
				<?php echo CHtml::button('Berita Acara Pembukaan Penawaran Sampul Satu', array('submit'=>array('site/editberitaacarapembukaanpenawaransampul1',"id"=>"$cpengadaan->id_pengadaan"), 'class'=>'sidafbutton')); ?>
			<?php } ?>
		</div>
		<br/>
	<?php } ?>
	
		<?php 
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
		?>
		<div class="form">

		<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'surat-undangan-pembukaan-penawaran-form',
		'enableAjaxValidation'=>false,
		)); ?>

		<?php echo $form->errorSummary($SUPP); ?>
		
		<h4><b> Surat Undangan Pembukaan Penawaran Sampul Satu </b></h4>
		<div class="row">
			<?php echo $form->labelEx($SUPP,'nomor'); ?>
			<?php echo $form->textField($SUPP,'nomor',array('size'=>56,'maxlength'=>50)); ?>
			<?php echo $form->error($SUPP,'nomor'); ?>
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
			<?php echo $form->labelEx($SUPP,'perihal'); ?>
			<?php echo $form->textArea($SUPP,'perihal',array('cols'=>43,'rows'=>3, 'maxlength'=>100)); ?>
			<?php echo $form->error($SUPP,'perihal'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($SUPP,'tanggal Pembukaan Penawaran'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$SUPP,
					'attribute'=>'tanggal_undangan',
					'value'=>$SUPP->tanggal_undangan,
					'htmlOptions'=>array('size'=>56),
					'options'=>array(
					'dateFormat'=>'yy-mm-dd',
					),
			));?>
			<?php echo $form->error($SUPP,'tanggal_undangan'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($SUPP,'waktu Pembukaan Penawaran (Format HH:MM)'); ?>
			<?php echo $form->textField($SUPP,'waktu',array('size'=>56,'maxlength'=>10)); ?>
			<?php echo $form->error($SUPP,'waktu'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($SUPP,'tempat Pembukaan Penawaran'); ?>
			<?php echo $form->textArea($SUPP,'tempat',array('cols'=>43,'rows'=>3, 'maxlength'=>100)); ?>
			<?php echo $form->error($SUPP,'tempat'); ?>
		</div>

		<div class="row buttons">
			<?php echo CHtml::submitButton($SUPP->isNewRecord ? 'Simpan' : 'Perbarui',array('class'=>'sidafbutton')); ?>
		</div>
		
	<?php $this->endWidget(); ?>

	</div><!-- form -->
	
	<?php if($SUPP->isNewRecord) { ?>
		
	<?php } else { ?>
		<br/>
		<div style="border-top:1px solid lightblue">
		<br/>
			<h4><b> Buat Dokumen </b></h4>
			<ul class="generatedoc">
				<li><?php echo CHtml::link('Surat Undangan Pembukaan Penawaran Sampul Satu', array('docx/download','id'=>$SUPP->id_dokumen)); ?></li>
			</ul>
		</div>
	<?php } ?>
	
<?php	} ?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'style'=>'background:url(css/bg.gif)'));  ?></div>
