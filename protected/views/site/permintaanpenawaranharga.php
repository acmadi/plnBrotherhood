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
							array('label'=>'Surat Permintaan Penawaran Harga', 'url'=>array($Dokumen0->isNewRecord?('/site/permintaanpenawaranharga'):('/site/editpermintaanpenawaranharga'),'id'=>$id)),
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
			
			<div class="form" >

			<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'surat-undangan-pengambilan-dokumen-pengadaan-form',
			'enableAjaxValidation'=>false,
			)); ?>
			
			<h4><b> Surat Undangan Permintaan Penawaran Harga </b></h4>
			<div class="row">
				<?php echo $form->labelEx($SUPPP,'nomor'); ?>
				<?php echo $form->textField($SUPPP,'nomor',array('size'=>56,'maxlength'=>20)); ?>
				<?php echo $form->error($SUPPP,'nomor'); ?>
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
				<?php //echo $form->labelEx($SUPPP,'lingkup_kerja'); ?>
				<?php //echo $form->textArea($SUPPP,'lingkup_kerja',array('cols'=>43,'rows'=>3, 'maxlength'=>100)); ?>
				<?php //echo $form->error($SUPPP,'lingkup_kerja'); ?>
			</div>
			
			<div class="row">
				<?php echo $form->labelEx($SUPPP,'lama berlaku penawaran harga  (dalam satuan bulan)'); ?>
				<?php echo $form->textField($SUPPP,'masa_berlaku_penawaran',array('size'=>56,'maxlength'=>20)); ?>
				<?php echo $form->error($SUPPP,'masa_berlaku_penawaran'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($SUPPP,'waktu penyelesaian pekerjaan (dalam satuan hari)'); ?>
				<?php echo $form->textField($SUPPP,'waktu_kerja',array('size'=>56,'maxlength'=>20)); ?>
				<?php echo $form->error($SUPPP,'waktu_kerja'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($SUPPP,'tempat_penyerahan_pekerjaan'); ?>
				<?php echo $form->textArea($SUPPP,'tempat_penyerahan',array('cols'=>43,'rows'=>3, 'maxlength'=>100)); ?>
				<?php echo $form->error($SUPPP,'tempat_penyerahan'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($PP,'Penyedia Layanan'); ?>
				<?php echo $form->textArea($PP,'perusahaan',array('cols'=>43,'rows'=>3, 'maxlength'=>256)); ?>
				<?php echo $form->error($PP,'perusahaan'); ?>
			</div>
			
			<div class="row">
				<?php $this->widget('application.extensions.appendo.JAppendo',array(
					'id' => 'repeateEnum',        
					'model' => PenerimaPengadaan::model(),
					'viewName' => 'formperusahaan',
					'labelDel' => 'Remove Row',
					// 'cssFile' => 'css/jquery.appendo2.css'
					)); 
				?>
			</div>
			
			<div class="row buttons">
				<?php echo CHtml::submitButton($Dokumen0->isNewRecord ? 'Simpan' : 'Perbarui',array('class'=>'sidafbutton')); ?>
			</div>
			
		<?php $this->endWidget(); ?>
		
		<br/>
		</div><!-- form -->
		<?php if (!$Dokumen0->isNewRecord){ ?>
				<br/>
				<div style="border-top:1px solid lightblue">
				<br/>
					<h4><b> Buat Dokumen </b></h4>
					<ul class="generatedoc">
						<li><?php echo CHtml::link('Surat Undangan Permintaan Penawaran Harga', array('docx/download', 'id'=>$SUPPP->id_dokumen)); ?></li>
					</ul>
				</div>
		<?php } ?>
	<?php	} ?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'style'=>'background:url(css/bg.gif)'));  ?></div>
