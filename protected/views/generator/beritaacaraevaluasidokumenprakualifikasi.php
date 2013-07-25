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
				$this->widget('zii.widgets.CMenu', array(
						'items'=>array(
							array('label'=>'Penyampaian Dokumen', 'url'=>array($Pengadaan->status=='9'?('/generator/penyampaiandokumenprakualifikasibagian1'):('/generator/editpenyampaiandokumenprakualifikasibagian1'),'id'=>$id)),
								array('label'=>'BA Penyampaian Dokumen', 'url'=>array($Pengadaan->status=='10'?('/generator/penyampaiandokumenprakualifikasibagian2'):($Pengadaan->status=='9'?'':('/generator/editpenyampaiandokumenprakualifikasibagian2')),'id'=>$id)),
								array('label'=>'Evaluasi Dokumen', 'url'=>array($Pengadaan->status=='11'?('/generator/evaluasidokumenprakualifikasi'):($Pengadaan->status=='10'?'':($Pengadaan->status=='9'?'':'/generator/editevaluasidokumenprakualifikasi')),'id'=>$id)),
								array('label'=>'BA Evaluasi Dokumen', 'url'=>array($Pengadaan->status=='12'?('/generator/beritaacaraevaluasidokumenprakualifikasi'):($Pengadaan->status=='11'?'':($Pengadaan->status=='10'?'':($Pengadaan->status=='9'?'':'/generator/editberitaacaraevaluasidokumenprakualifikasi'))),'id'=>$id)),
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
				'id'=>'usulan-hasil-prakualifikasi-form',
				'enableAjaxValidation'=>false,
			)); ?>

				<h4><b> Berita Acara Evaluasi Dokumen Prakualifikasi </b></h4>
				<div class="row">
					<?php echo $form->labelEx($BAEPK,'nomor'); ?>
					<?php echo $form->textField($BAEPK,'nomor',array('size'=>56,'maxlength'=>100)); ?>
					<?php echo $form->error($BAEPK,'nomor'); ?>
				</div>
			
				<div class="row">
					<?php 
						$this->widget('application.extensions.appendo.JAppendo',array(
						'id' => 'idpenyedia',        
						'model' => $PP,					
						'viewName' => 'formperusahaan_evaluasi_dokumen_prakualifikasi',
						'labelAdd' => '',
						'labelDel' => '',
				
						)); 
					?>
				</div>
			
				<div class="row buttons">
					<?php echo CHtml::submitButton($Pengadaan->status=='12'? 'Simpan' : 'Perbarui',array('class'=>'sidafbutton')); ?>
				</div>

				<?php $this->endWidget(); ?>

			</div><!-- form -->
			
			<?php if ($Pengadaan->status!='12'){ ?>
				<br/>
				<div style="border-top:1px solid lightblue">
				<br/>
					<h4><b> Daftar Dokumen </b></h4>
					<ul class="generatedoc">
						<li><?php echo CHtml::link('Berita Acara Evaluasi Dokumen Prakualifikasi', array('docx/download','id'=>$BAEPK->id_dokumen)); ?></li>
					</ul>
				</div>
			<?php } ?>
			
		
	<?php	} ?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'style'=>'background:url(css/bg.gif)'));  ?></div>
