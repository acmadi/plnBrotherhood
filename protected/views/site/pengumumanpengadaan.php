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
							array('label'=>'Pengumuman Pengadaan', 'url'=>array($Dokumen0->isNewRecord?('/site/pengumumanpengadaan'):('/site/editpengumumanpengadaan'),'id'=>$id)),
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
			
			<h4><b> Surat Undangan Pengambilan Dokumen Pengadaan </b></h4>
			<div class="row">
				<?php echo $form->labelEx($SUPDP,'nomor'); ?>
				Nomor HPS : <?php echo $HPS->nomor ?> <br/>
				<?php echo $form->textField($SUPDP,'nomor',array('size'=>56,'maxlength'=>50)); ?>
				<?php echo $form->error($SUPDP,'nomor'); ?>
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
				<?php //echo $form->labelEx($SUPDP,'perihal'); ?>
				<?php //echo $form->textArea($SUPDP,'perihal',array('cols'=>43,'rows'=>3, 'maxlength'=>100)); ?>
				<?php //echo $form->error($SUPDP,'perihal'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($SUPDP,'tanggal pengambilan'); ?>
				<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
						'model'=>$SUPDP,
						'attribute'=>'tanggal_pengambilan',
						'value'=>$SUPDP->tanggal_pengambilan,
						'htmlOptions'=>array('size'=>56),
						'options'=>array(
						'dateFormat'=>'dd-mm-yy',
						),
				));?>
				<?php echo $form->error($SUPDP,'tanggal_pengambilan'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($SUPDP,'waktu pengambilan'); ?>
				<?php echo $form->textField($SUPDP,'waktu_pengambilan',array('size'=>56,'maxlength'=>20)); ?>
				<?php echo $form->error($SUPDP,'waktu_pengambilan'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($SUPDP,'tempat_pengambilan'); ?>
				<?php echo $form->textArea($SUPDP,'tempat_pengambilan',array('cols'=>43,'rows'=>3, 'maxlength'=>100)); ?>
				<?php echo $form->error($SUPDP,'tempat_pengambilan'); ?>
			</div>

			<div class="row">
				<?php 
					$this->widget('application.extensions.appendo.JAppendo',array(
					'id' => 'idpenyedia',        
					'model' => $PP,
					// 'model2' => $PP2,
					'viewName' => 'formperusahaan_pengumuman_pengadaan',
					'labelAdd' => 'Tambah Penyedia',
					'labelDel' => 'Hapus Penyedia',
					
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
					<h4><b> Daftar Dokumen </b></h4>
					<ul class="generatedoc">
						<li><?php echo CHtml::link('Surat Undangan Pengambilan Dokumen Pengadaan', array('docx/download', 'id'=>$SUPDP->id_dokumen)); ?></li>
					</ul>
				</div>
		<?php } ?>
	<?php	} ?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'style'=>'background:url(css/bg.gif)'));  ?></div>
