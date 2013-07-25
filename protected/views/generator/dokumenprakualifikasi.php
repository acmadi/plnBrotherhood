<?php
/* @var $this SiteController */

$id = Yii::app()->getRequest()->getQuery('id');
$cpengadaan = Pengadaan::model()->find('id_pengadaan = "' . $id . '"');
$this->pageTitle=Yii::app()->name . ' | '.$cpengadaan->nama_pengadaan;
?>

<div id="pagecontent">
	<div id="sidebar">
		<?php if(!Yii::app()->user->isGuest) $this->widget('MenuPortlet'); ?>
		<script type="text/javascript">
			$('#2').attr('class','onprogress');
		</script>
	</div>

	<div id="maincontent">
	
		<?php 
			if (Yii::app()->user->getState('role') == 'anggota') {
		?>
		      
                <div id="menuform">
                    <?php
						$this->widget('zii.widgets.CMenu', array(
							'items'=>array(
								array('label'=>'Dokumen Prakualifikasi', 'url'=>array($DPK->isNewRecord?('/generator/dokumenprakualifikasi'):('/generator/editdokumenprakualifikasi'),'id'=>$id)),
							),
						));
					?>
                </div>
                
                <br/>
                
		<div class="form">

		<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'dokumen-prakualifikasi-form',
		'enableAjaxValidation'=>false,
		)); ?>
		
		<?php echo $form->errorSummary($DPK); ?>
		
		<h4><b> Dokumen Prakualifikasi </b></h4>
		
		<div class="row">
			<?php echo $form->labelEx($DPK,'nomor'); ?>
			<?php echo $form->textField($DPK,'nomor',array('size'=>56,'maxlength'=>100)); ?>
			<?php echo $form->error($DPK,'nomor'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($Dokumen0,'tanggal surat'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$Dokumen0,
					'attribute'=>'tanggal',
					'value'=>$Dokumen0->tanggal,
					'htmlOptions'=>array('size'=>56),
					'options'=>array(
					'dateFormat'=>'dd-mm-yy',
					),
			));?>
			<?php echo $form->error($Dokumen0,'tanggal'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($DPK,'tujuan_pengadaan'); ?>
			<?php echo $form->textField($DPK,'tujuan_pengadaan',array('size'=>56,'maxlength'=>256)); ?>
			<?php echo $form->error($DPK,'tujuan_pengadaan'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($DPK,'kurun_waktu_pengalaman (dalam satuan tahun)'); ?>
			<?php echo $form->textField($DPK,'kurun_waktu_pengalaman',array('size'=>56,'maxlength'=>256)); ?>
			<?php echo $form->error($DPK,'kurun_waktu_pengalaman'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($DPK,'npt'); ?>
			<?php echo $form->textField($DPK,'npt',array('size'=>56,'maxlength'=>256)); ?>
			<?php echo $form->error($DPK,'npt'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($DPK,'tanggal Pengambilan Dokumen Kualifikasi'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$DPK,
					'attribute'=>'tanggal_pengambilan1',
					'value'=>$DPK->tanggal_pengambilan1,
					'htmlOptions'=>array('size'=>23),
					'options'=>array(
					'dateFormat'=>'dd-mm-yy',
					),
			));?>
			<?php echo $form->error($DPK,'tanggal_pengambilan1'); ?>
			s/d
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$DPK,
					'attribute'=>'tanggal_pengambilan2',
					'value'=>$DPK->tanggal_pengambilan2,
					'htmlOptions'=>array('size'=>23),
					'options'=>array(
					'dateFormat'=>'dd-mm-yy',
					),
			));?>
			<?php echo $form->error($DPK,'tanggal_pengambilan2'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($DPK,'waktu Pengambilan Dokumen Kualifikasi (Format HH:MM)'); ?> 
			<?php echo $form->textField($DPK,'waktu_pengambilan1',array('size'=>23,'maxlength'=>20)); ?>
			<?php echo $form->error($DPK,'waktu_pengambilan1'); ?>
			s/d
			<?php echo $form->textField($DPK,'waktu_pengambilan2',array('size'=>23,'maxlength'=>20)); ?>
			<?php echo $form->error($DPK,'waktu_pengambilan2'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($DPK,'tempat Pengambilan Dokumen Kualifikasi'); ?>
			<?php echo $form->textArea($DPK,'tempat_pengambilan',array('cols'=>43,'rows'=>3, 'maxlength'=>256)); ?>
			<?php echo $form->error($DPK,'tempat_pengambilan'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($DPK,'tanggal Pemasukan Dokumen Kualifikasi'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$DPK,
					'attribute'=>'tanggal_pemasukan1',
					'value'=>$DPK->tanggal_pemasukan1,
					'htmlOptions'=>array('size'=>23),
					'options'=>array(
					'dateFormat'=>'dd-mm-yy',
					),
			));?>
			<?php echo $form->error($DPK,'tanggal_pemasukan1'); ?>
			s/d
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$DPK,
					'attribute'=>'tanggal_pemasukan2',
					'value'=>$DPK->tanggal_pemasukan2,
					'htmlOptions'=>array('size'=>23),
					'options'=>array(
					'dateFormat'=>'dd-mm-yy',
					),
			));?>
			<?php echo $form->error($DPK,'tanggal_pemasukan2'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($DPK,'waktu Pemasukan Dokumen Kualifikasi (Format HH:MM)'); ?> 
			<?php echo $form->textField($DPK,'waktu_pemasukan1',array('size'=>23,'maxlength'=>20)); ?>
			<?php echo $form->error($DPK,'waktu_pemasukan1'); ?>
			s/d
			<?php echo $form->textField($DPK,'waktu_pemasukan2',array('size'=>23,'maxlength'=>20)); ?>
			<?php echo $form->error($DPK,'waktu_pemasukan2'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($DPK,'tempat Pemasukan Dokumen Kualifikasi'); ?>
			<?php echo $form->textArea($DPK,'tempat_pemasukan',array('cols'=>43,'rows'=>3, 'maxlength'=>256)); ?>
			<?php echo $form->error($DPK,'tempat_pemasukan'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($DPK,'tanggal Evaluasi Dokumen Kualifikasi'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$DPK,
					'attribute'=>'tanggal_evaluasi',
					'value'=>$DPK->tanggal_evaluasi,
					'htmlOptions'=>array('size'=>56),
					'options'=>array(
					'dateFormat'=>'dd-mm-yy',
					),
			));?>
			<?php echo $form->error($DPK,'tanggal_evaluasi'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($DPK,'waktu Evaluasi Dokumen Kualifikasi (Format HH:MM)'); ?> 
			<?php echo $form->textField($DPK,'waktu_evaluasi',array('size'=>56,'maxlength'=>20)); ?>
			<?php echo $form->error($DPK,'waktu_evaluasi'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($DPK,'tempat Evaluasi Dokumen Kualifikasi'); ?>
			<?php echo $form->textArea($DPK,'tempat_evaluasi',array('cols'=>43,'rows'=>3, 'maxlength'=>256)); ?>
			<?php echo $form->error($DPK,'tempat_evaluasi'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($DPK,'tanggal Penetapan Hasil Kualifikasi'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$DPK,
					'attribute'=>'tanggal_penetapan',
					'value'=>$DPK->tanggal_penetapan,
					'htmlOptions'=>array('size'=>56),
					'options'=>array(
					'dateFormat'=>'dd-mm-yy',
					),
			));?>
			<?php echo $form->error($DPK,'tanggal_penetapan'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($DPK,'waktu Penetapan Hasil Kualifikasi (Format HH:MM)'); ?> 
			<?php echo $form->textField($DPK,'waktu_penetapan',array('size'=>56,'maxlength'=>20)); ?>
			<?php echo $form->error($DPK,'waktu_penetapan'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($DPK,'tempat Penetapan Hasil Kualifikasi'); ?>
			<?php echo $form->textArea($DPK,'tempat_penetapan',array('cols'=>43,'rows'=>3, 'maxlength'=>256)); ?>
			<?php echo $form->error($DPK,'tempat_penetapan'); ?>
		</div>

		<div class="row buttons">
			<?php echo CHtml::submitButton($DPK->isNewRecord ? 'Simpan' : 'Perbarui',array('class'=>'sidafbutton')); ?>
		</div>
		
	<?php $this->endWidget(); ?>

	</div><!-- form -->
	
	<?php if($DPK->isNewRecord) { ?>
		
	<?php } else { ?>
		<br/>
		<div style="border-top:1px solid lightblue">
		<br/>
			<h4><b> Daftar Dokumen </b></h4>
			<ul class="generatedoc">
				<li><?php echo CHtml::link('Dokumen Prakualifikasi', array('docx/download','id'=>$DPK->id_dokumen)); ?></li>
				<li><?php echo CHtml::link('Pakta Integritas Penyedia', array('docx/download','id'=>$X1->id_dokumen)); ?></li>
				<li><?php echo CHtml::link('Surat Pernyataan Minat', array('docx/download','id'=>$X2->id_dokumen)); ?></li>
				<li><?php echo CHtml::link('Form Isian Kualifikasi', array('docx/download','id'=>$X3->id_dokumen)); ?></li>
			</ul>
		</div>
	<?php } ?>
	
<?php	} ?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'style'=>'background:url(css/bg.gif)'));  ?></div>
