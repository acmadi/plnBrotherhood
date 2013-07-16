<?php
/* @var $this SiteController */
$id = Yii::app()->getRequest()->getQuery('id');
$Pengadaan= Pengadaan::model()->findByPk($id);
$this->pageTitle=Yii::app()->name . ' | '.$Pengadaan->nama_pengadaan;
?>

<div id="pagecontent">
	<div id="sidebar">
		<?php if(!Yii::app()->user->isGuest) $this->widget('MenuPortlet'); ?>
		<script type="text/javascript">
			$('#6').attr('class','onprogress');
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
							array('label'=>'Usulan Hasil', 'url'=>array($Pengadaan->status=='13'?('/generator/usulanhasilprakualifikasi'):('/generator/editusulanhasilprakualifikasi'),'id'=>$id)),
							array('label'=>'Penetapan Hasil', 'url'=>array($Pengadaan->status=='14'?('/generator/penetapanhasilprakualifikasi'):($Pengadaan->status=='13'?'':('/generator/editpenetapanhasilprakualifikasi')),'id'=>$id)),
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
				'id'=>'penetapan-hasil-prakualifikasi-form',
				'enableAjaxValidation'=>false,
			)); ?>

				<h4><b> Nota Dinas Penetapan Hasil Prakualifikasi </b></h4>
				<div class="row">
					<?php echo $form->labelEx($NDPK,'nomor'); ?>
					<?php echo $form->textField($NDPK,'nomor',array('size'=>56,'maxlength'=>100)); ?>
					<?php echo $form->error($NDPK,'nomor'); ?>
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
				
				<div class="row buttons">
					<?php echo CHtml::submitButton($NDPK->isNewRecord ? 'Simpan' : 'Perbarui',array('class'=>'sidafbutton')); ?>
				</div>

				<?php $this->endWidget(); ?>

			</div><!-- form -->
			
			<?php if (!$NDPK->isNewRecord){ ?>
				<br/>
				<div style="border-top:1px solid lightblue">
				<br/>
					<h4><b> Daftar Dokumen </b></h4>
					<ul class="generatedoc">
						<li><?php echo CHtml::link('Nota Dinas Penetapan Hasil Prakualifikasi', array('docx/download','id'=>$NDPK->id_dokumen)); ?></li>
					</ul>
				</div>
			<?php } ?>
		
	<?php	} ?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'style'=>'background:url(css/bg.gif)'));  ?></div>
