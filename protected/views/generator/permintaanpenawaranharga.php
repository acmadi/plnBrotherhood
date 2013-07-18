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
			$('#9').attr('class','onprogress');
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
							array('label'=>'Surat Permintaan Penawaran Harga', 'url'=>array($Dokumen0->isNewRecord?('/generator/permintaanpenawaranharga'):('/generator/editpermintaanpenawaranharga'),'id'=>$id)),
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
				Nomor HPS : <?php echo $HPS->nomor ?> <br/>
				<?php echo $form->textField($SUPPP,'nomor',array('size'=>56,'maxlength'=>50)); ?>
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
				<?php 
					if($Pengadaan->metode_pengadaan == 'Penunjukan Langsung'){
						$this->widget('application.extensions.appendo.JAppendo',array(
						'id' => 'idpenyedia',        
						'model' => $PP,
						// 'model2' => $PP2,
						'viewName' => 'formperusahaan',
						'labelAdd' => '',
						'labelDel' => 'Hapus Penyedia',
						// 'allowDelete' => true,					
						)); 
					}else{
						$this->widget('application.extensions.appendo.JAppendo',array(
						'id' => 'idpenyedia',        
						'model' => $PP,
						// 'model2' => $PP2,
						'viewName' => 'formperusahaan',
						'labelAdd' => 'Tambah Penyedia',
						'labelDel' => 'Hapus Penyedia',
						// 'allowDelete' => true,					
						)); 
					}
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
						<li><?php echo CHtml::link('Surat Undangan Permintaan Penawaran Harga', array('docx/download', 'id'=>$SUPPP->id_dokumen)); ?></li>
					</ul>
				</div>
		<?php } ?>
	<?php	} ?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'style'=>'background:url(css/bg.gif)'));  ?></div>
