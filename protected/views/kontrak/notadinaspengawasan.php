<?php
/* @var $this SiteController */

$id = Yii::app()->getRequest()->getQuery('id');
$Pengadaan= Pengadaan::model()->findByPk($id);
$this->pageTitle=Yii::app()->name . ' | '.$Pengadaan->nama_pengadaan;
?>

<div id="pagecontent">
	<div id="sidebar">	
		<?php if(!Yii::app()->user->isGuest) $this->widget('KontrakPortlet'); ?>
	</div>

	<div id="maincontent">
	
		<div id="menuform">
		<?php
			$this->widget('zii.widgets.CMenu', array(
					'items'=>array(
						array('label'=>'Surat Kontrak', 'url'=>array((Dokumen::model()->find('id_pengadaan = ' .$id. ' and nama_dokumen = "Surat Kontrak"') == null)?'/kontrak/suratkontrak':'/kontrak/editsuratkontrak','id'=>$id)),
						array('label'=>'Nota Dinas Pengawasan', 'url'=>array((Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "Surat Kontrak"') == null?'':(Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "Nota Dinas Pengawasan"') == null?'/kontrak/notadinaspengawasan':'/kontrak/editnotadinaspengawasan')),'id'=>$id)),
					),
			));
			?>
		</div>
		
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
				'id'=>'suratkontrak-form',
				'enableAjaxValidation'=>false,
			)); ?>
			
				<h4><b> Nota Dinas Direksi dan Pengawasan </b></h4>
				
				<?php echo CHtml::errorSummary($notadinaspengawasan);?>
				<div class="row">
				<?php
					echo $form->labelEx($notadinaspengawasan, 'nomor');
					echo $form->textField($notadinaspengawasan, 'nomor');
					echo $form->error($notadinaspengawasan, 'nomor');
				?>
				</div>
				
				<div class="row">
				<?php
					echo $form->labelEx($notadinaspengawasan, 'Nama Direksi');
					echo $form->textField($notadinaspengawasan, 'nama_direksi');
					echo $form->error($notadinaspengawasan, 'nama_direksi');
				?>
				</div>
				
				<div class="row">
				<?php
					echo $form->labelEx($notadinaspengawasan, 'NIP direksi');
					echo $form->textField($notadinaspengawasan, 'nip_direksi');
					echo $form->error($notadinaspengawasan, 'nip_direksi');
				?>
				</div>
				
				<div class="row">
				<?php
					echo $form->labelEx($notadinaspengawasan, 'Jabatan Direksi');
					echo $form->textField($notadinaspengawasan, 'jabatan_direksi');
					echo $form->error($notadinaspengawasan, 'jabatan_direksi');
				?>
				</div>
				
				<div class="row">
				<?php
					echo $form->labelEx($notadinaspengawasan, 'Email Direksi');
					echo $form->textField($notadinaspengawasan, 'email_direksi');
					echo $form->error($notadinaspengawasan, 'email_direksi');
				?>
				</div>
				
				<div class="row">
				<?php
					echo $form->labelEx($notadinaspengawasan, 'Nama Pengawas');
					echo $form->textField($notadinaspengawasan, 'nama_pengawas');
					echo $form->error($notadinaspengawasan, 'nama_pengawas');
				?>
				</div>
				
				<div class="row">
				<?php
					echo $form->labelEx($notadinaspengawasan, 'NIP pengawas');
					echo $form->textField($notadinaspengawasan, 'nip_pengawas');
					echo $form->error($notadinaspengawasan, 'nip_pengawas');
				?>
				</div>
				<div class="row">
				<?php
					echo $form->labelEx($notadinaspengawasan, 'Jabatan Pengawas');
					echo $form->textField($notadinaspengawasan, 'jabatan_pengawas');
					echo $form->error($notadinaspengawasan, 'jabatan_pengawas');
				?>
				</div>
				
				<div class="row">
				<?php
					echo $form->labelEx($notadinaspengawasan, 'Email Pengawas');
					echo $form->textField($notadinaspengawasan, 'email_pengawas');
					echo $form->error($notadinaspengawasan, 'email_pengawas');
				?>
				</div>

				<div class="row buttons">
					<?php echo CHtml::submitButton($notadinaspengawasan->isNewRecord ? 'Simpan' : 'Perbarui',array('class'=>'sidafbutton')); ?>
				</div>

				<?php $this->endWidget() ?>
			</div>
				
				<?php if (!$notadinaspengawasan->isNewRecord){ ?>	
			<br/>
			<div style="border-top:1px solid lightblue">
			<br/>
			<h4><b> Daftar Dokumen </b></h4>
			<ul class="generatedoc">				
				<li><?php echo CHtml::link('Nota Dinas ireksi dan Pengawasan', array('docx/download','id'=>$notadinaspengawasan->id_dokumen)); ?></li>
			</ul>
		</div>
	
	<?php } ?>
	</div>

</div>
<br/>
<div><?php echo CHtml::button('Kembali', array('submit'=>array('kontrak/dashboardkontrak'), 'class'=>'sidafbutton'));  ?></div>