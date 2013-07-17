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
			$('#5').attr('class','onprogress');
		</script>
	</div>

	<div id="maincontent">
		<?php 
		if (Yii::app()->user->getState('role') == 'anggota') {
		?>
			
			<div id="menuform">
				
				<?php
					if(Panitia::model()->findByPk(Pengadaan::model()->findByPk($id)->id_panitia)->jenis_panitia=="Panitia") {
						$this->widget('zii.widgets.CMenu', array(
							'items'=>array(
									array('label'=>'Undangan', 'url'=>array((Dokumen::model()->find('id_pengadaan = ' .$id. ' and nama_dokumen = "Surat Undangan Pembukaan Penawaran"') == null)?'/generator/suratundanganpembukaanpenawaran':'/generator/editsuratundanganpembukaanpenawaran','id'=>$id)),
									array('label'=>'Penyampaian Dokumen', 'url'=>array($Pengadaan->status=='8'?('/generator/penyampaiandokumenprakualifikasi'):('/generator/editpenyampaiandokumenprakualifikasi'),'id'=>$id)),
									array('label'=>'Evaluasi Dokumen', 'url'=>array($Pengadaan->status=='9'?'/generator/evaluasidokumenprakualifikasi':($Pengadaan->status=='8'?'':'/generator/editevaluasidokumenprakualifikasi'),'id'=>$id)),
								),
							));
					} else {
						$this->widget('zii.widgets.CMenu', array(
								'items'=>array(
									array('label'=>'Penyampaian Dokumen', 'url'=>array($Pengadaan->status=='8'?('/generator/penyampaiandokumenprakualifikasi'):('/generator/editpenyampaiandokumenprakualifikasi'),'id'=>$id)),
									array('label'=>'Evaluasi Dokumen', 'url'=>array($Pengadaan->status=='9'?('/generator/evaluasidokumenprakualifikasi'):($Pengadaan->status=='8'?'':('/generator/editevaluasidokumenprakualifikasi')),'id'=>$id)),
								),
							));
					}
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
			
			<h4><b> Berita Acara Penyampaian Dokumen Prakualifikasi </b></h4>
			
			<div class="row">
				<?php echo $form->labelEx($BAPPQ,'nomor'); ?>
				<?php echo $form->textField($BAPPQ,'nomor',array('size'=>56,'maxlength'=>50)); ?>
				<?php echo $form->error($BAPPQ,'nomor'); ?>
			</div>
			
			<div class="row">
				<?php 
					$this->widget('application.extensions.appendo.JAppendo',array(
					'id' => 'idpenyedia',        
					'model' => $PP,					
					'viewName' => 'formperusahaan_penyampaian_dokumen_prakualifikasi',
					'labelAdd' => '',
					'labelDel' => 'Hapus Penyedia',
					
					)); 
				?>
			</div>
			
			<div class="row buttons">
				<?php echo CHtml::submitButton($Pengadaan->status == '8' ? 'Simpan' : 'Perbarui',array('class'=>'sidafbutton')); ?>
			</div>
		
			
		<?php $this->endWidget(); ?>
		
		<br/>
		</div><!-- form -->
		
			<?php if($Pengadaan->status!='23') { ?>
			<br/>
			<div style="border-top:1px solid lightblue">
			<br/>
				<h4><b> Daftar Dokumen </b></h4>
				<ul class="generatedoc">
						<li><?php echo CHtml::link('Berita Acara Pembukaan Penawaran', array('xlsx/download','id'=>$BAPPQ->id_dokumen)); ?></li>
					<?php } ?>
				</ul>
			</div>		
	<?php	} ?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'style'=>'background:url(css/bg.gif)'));  ?></div>
