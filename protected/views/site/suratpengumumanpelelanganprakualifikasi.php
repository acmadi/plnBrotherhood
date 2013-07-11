<?php
/* @var $this SiteController */
$id = Yii::app()->getRequest()->getQuery('id');
$Pengadaan= Pengadaan::model()->findByPk($id);
$this->pageTitle=Yii::app()->name . ' | '.$Pengadaan->nama_pengadaan;
?>

<div id="pagecontent">
	<div id="sidebar">
		<?php if(!Yii::app()->user->isGuest) $this->widget('MenuPortlet'); ?>
	</div>

	<div id="maincontent">
		<?php 
		if (Yii::app()->user->getState('role') == 'anggota') {
		?>
			
			<div id="menuform">
				<?php
				$this->widget('zii.widgets.CMenu', array(
						'items'=>array(
							array('label'=>'Pengumuman Pelelangan', 'url'=>array($Dokumen0->isNewRecord?('/site/suratpengumumanpelelanganprakualifikasi'):('/site/editsuratpengumumanpelelanganprakualifikasi'),'id'=>$id)),
							array('label'=>'Pendaftaran Pelelangan', 'url'=>array($Pengadaan->status=='6'?('/site/pendaftaranpelelanganprakualifikasi'):($Pengadaan->status=='5'?'':('/site/editpendaftaranpelelanganprakualifikasi')),'id'=>$id)),
							array('label'=>'Pengambilan Dokumen', 'url'=>array($Pengadaan->status=='7'?('/site/pengambilandokumenkualifikasi'):($Pengadaan->status=='6'?'':($Pengadaan->status=='5'?'':('/site/editpengambilandokumenkualifikasi'))),'id'=>$id)),
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
			'id'=>'surat-pengumuman-pelelangan-form',
			'enableAjaxValidation'=>false,
			)); ?>
			
			<h4><b> Surat Pengumuman Pelelangan Prakualifikasi </b></h4>
			<div class="row">
				<?php echo $form->labelEx($SPPP,'nomor'); ?>
				Nomor HPS : <?php echo $HPS->nomor ?> <br/>
				<?php echo $form->textField($SPPP,'nomor',array('size'=>56,'maxlength'=>100)); ?>
				<?php echo $form->error($SPPP,'nomor'); ?>
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
				<?php echo $form->labelEx($SPPP,'syarat_mengikuti_lelang'); ?>
				<?php echo $form->textArea($SPPP,'syarat_mengikuti_lelang',array('cols'=>43,'rows'=>3, 'maxlength'=>256)); ?>
				<?php echo $form->error($SPPP,'syarat_mengikuti_lelang'); ?>
			</div>
			
			<div class="row buttons">
				<?php echo CHtml::submitButton($SPPP->isNewRecord ? 'Simpan' : 'Perbarui',array('class'=>'sidafbutton')); ?>
			</div>
			
		<?php $this->endWidget(); ?>
		
		<br/>
		</div><!-- form -->
		<?php if (!$SPPP->isNewRecord){ ?>
				<br/>
				<div style="border-top:1px solid lightblue">
				<br/>
					<h4><b> Daftar Dokumen </b></h4>
					<ul class="generatedoc">
						<li><?php echo CHtml::link('Surat Pengumuman Pelelangan Prakualifikasi', array('docx/download', 'id'=>$SPPP->id_dokumen)); ?></li>
					</ul>
				</div>
		<?php } ?>
	<?php	} ?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'style'=>'background:url(css/bg.gif)'));  ?></div>
