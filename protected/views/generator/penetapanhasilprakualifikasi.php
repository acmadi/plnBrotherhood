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
	
			 <div class="form" >

			<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'surat-undangan-pengambilan-dokumen-pengadaan-form',
			'enableAjaxValidation'=>false,
			 )); ?>
			
			<h4><b> Berita Acara Penyampaian Dokumen Prakualifikasi </b></h4>
	
			<div class="row">
				<?php 
					$this->widget('application.extensions.appendo.JAppendo',array(
					'id' => 'idpenyedia',        
					'model' => $PP,					
					'viewName' => 'formperusahaan_penetapan_hasil_prakualifikasi',
					'labelAdd' => '',
					'labelDel' => 'Hapus Penyedia',					
					)); 
				?>
			</div>
			
			<div class="row buttons">
				<?php echo CHtml::submitButton($Pengadaan->status == '14' ? 'Simpan' : 'Perbarui',array('class'=>'sidafbutton')); ?>
			</div>
		
			
		<?php $this->endWidget(); ?>
		
		<br/>
		</div><!-- form -->
		
	<?php	} ?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'style'=>'background:url(css/bg.gif)'));  ?></div>
