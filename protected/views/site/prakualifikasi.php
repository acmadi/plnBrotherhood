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
		
			<div id="menuform">
				<?php
				$this->widget('zii.widgets.CMenu', array(
						'items'=>array(
							array('label'=>'Dokumen Kualifikasi', 'url'=>array($X2->isNewRecord?('/site/rks'):('/site/editrks'),'id'=>$id)),
						),
					));
				?>
			</div>
			<br/>
		
			<?php if(Yii::app()->user->hasFlash('sukses')): ?>
				<div class="flash-success">
					<?php echo Yii::app()->user->getFlash('sukses'); ?>
					<script type="text/javascript">
						setTimeout(function() {
							$('.flash-success').animate({
								height: '0px',
								marginBottom: '0em',
								padding: '0em',
								opacity: '0.0'
							}, 1000, function() {
								$('.flash-success').hide();
							});
						}, 2000);
					</script>
				</div>
			<?php endif; ?>
			
			<div class="form">

			<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'surat-undangan-prakualifikasi-form',
			'enableAjaxValidation'=>false,
			)); ?>
			
			<h4><b> Surat Undangan Prakualifikasi</b></h4>		
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
			
			<br/>		
			<h4><b> Surat Pemberitahuan Pengadaan</b></h4>
			<div class="row">
				<?php echo $form->labelEx($X2,'nomor'); ?>
				<?php echo $form->textField($X2,'nomor',array('size'=>56,'maxlength'=>20)); ?>
				<?php echo $form->error($X2,'nomor'); ?>
			</div>
			
			<div class="row">
				<?php echo $form->labelEx($X2,'perihal'); ?>
				<?php echo $form->textArea($X2,'perihal',array('cols'=>43,'rows'=>3, 'maxlength'=>100)); ?>
				<?php echo $form->error($X2,'perihal'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($X2,'lingkup kerja'); ?>
				<?php echo $form->textField($X2,'lingkup_kerja',array('size'=>56,'maxlength'=>20)); ?>
				<?php echo $form->error($X2,'lingkup_kerja'); ?>
			</div>
			
			<div class="row">
				<?php echo $form->labelEx($X2,'tanggal penawaran'); ?>
				<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
						'model'=>$X2,
						'attribute'=>'tanggal_penawaran',
						'value'=>$X2->tanggal_penawaran,
						'htmlOptions'=>array('size'=>56),
						'options'=>array(
						'dateFormat'=>'yy-mm-dd',
						),
				));?>
				<?php echo $form->error($X2,'tanggal_penawaran'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($X2,'waktu kerja (dalam satuan hari kerja)'); ?>
				<?php echo $form->textField($X2,'waktu_kerja',array('size'=>56,'maxlength'=>20)); ?>
				<?php echo $form->error($X2,'waktu_kerja'); ?>
			</div>
			
			<div class="row buttons">
				<?php echo CHtml::submitButton('Perbarui',array('class'=>'sidafbutton')); ?>
			</div>
			
		<?php $this->endWidget(); ?>

		</div><!-- form -->
		
		<br/>
		<div style="border-top:1px solid lightblue">
		<br/>
			<h4><b> Buat Dokumen </b></h4>
			<ul class="generatedoc">
				<li><?php echo CHtml::link('Surat Undangan Prakualifikasi', array('docx/download','id'=>$X0->id_dokumen)); ?></li>
				<li><?php echo CHtml::link('Pakta Integritas Penyedia', array('docx/download','id'=>$X1->id_dokumen)); ?></li>
				<li><?php echo CHtml::link('Surat Pemberitahuan Pengadaan', array('docx/download','id'=>$X2->id_dokumen)); ?></li>
				<li><?php echo CHtml::link('Surat Pernyataan Minat', array('docx/download','id'=>$X3->id_dokumen)); ?></li>
				<li><?php echo CHtml::link('Form Isian Kualifikasi', array('docx/download','id'=>$X4->id_dokumen)); ?></li>
			</ul>
		</div>
    <?php } ?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'class'=>'sidafbutton'));  ?></div>
