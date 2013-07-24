<?php
/* @var $this SiteController */

$id = Yii::app()->getRequest()->getQuery('id');
$Pengadaan= Pengadaan::model()->findByPk($id);
$this->pageTitle=Yii::app()->name . ' | '.$Pengadaan->nama_pengadaan;
?>

<div id="pagecontent">

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
			
				<h4><b> Surat Kontrak </b></h4>
				
				<?php echo CHtml::errorSummary($suratkontrak);?>
				<div class="row">
				<?php
					echo $form->labelEx($suratkontrak, 'nomor');
					echo $form->textField($suratkontrak, 'Nomor');
					echo $form->error($suratkontrak, 'nomor');
				?>
				</div>
				
				<div class="row">
				<?php
					echo $form->labelEx($suratkontrak, 'Tanggal Mulai');
					$this->widget('zii.widgets.jui.CJuiDatePicker',array(
							'model'=>$suratkontrak,
							'attribute'=>'tanggal_mulai',
							'value'=>$suratkontrak->tanggal_mulai,
							'htmlOptions'=>array('size'=>56),
							'options'=>array(
							'dateFormat'=>'dd-mm-yy',
							),
						));
					echo $form->error($suratkontrak, 'tanggal_mulai');
				?>
				</div>
				
				<div class="row">
				<?php
					echo $form->labelEx($suratkontrak, 'Tanggal Selesai');
					$this->widget('zii.widgets.jui.CJuiDatePicker',array(
							'model'=>$suratkontrak,
							'attribute'=>'tanggal_selesai',
							'value'=>$suratkontrak->tanggal_selesai,
							'htmlOptions'=>array('size'=>56),
							'options'=>array(
							'dateFormat'=>'dd-mm-yy',
							),
						));
					echo $form->error($suratkontrak, 'tanggal_selesai');
				?>
				</div>
				
				<div class="row">
				<?php
					echo $form->labelEx($suratkontrak, 'Jangka Waktu (dalam satuan hari)');
					echo $form->textField($suratkontrak, 'jangka_waktu');
					echo $form->error($suratkontrak, 'jangka_waktu');
				?>
				</div>
				
				<div class="row">
				<?php
					echo $form->labelEx($suratkontrak, 'Nilai Kontrak');
					echo $form->textField($suratkontrak, 'nilai_kontrak');
					echo $form->error($suratkontrak, 'nilai_kontrak');
				?>
				</div>
				
				<div class="row">
				<?php
					echo $form->labelEx($suratkontrak, 'Lokasi File');
					echo $form->textField($suratkontrak, 'lokasi_file');
					echo $form->error($suratkontrak, 'lokasi_file');
				?>
				</div>
				
				<div class="row">
				<?php
					echo $form->labelEx($suratkontrak, 'Nomor Rekening');
					echo $form->textField($suratkontrak, 'no_rek');
					echo $form->error($suratkontrak, 'no_rek');
				?>
				</div>

				<div class="row buttons">
					<?php echo CHtml::submitButton($suratkontrak->isNewRecord ? 'Simpan' : 'Perbarui',array('class'=>'sidafbutton')); ?>
				</div>

				<?php $this->endWidget() ?>
			</div>
				
				<?php if (!$suratkontrak->isNewRecord){ ?>	
			<br/>
			<div style="border-top:1px solid lightblue">
			<br/>
			<h4><b> Daftar Dokumen </b></h4>
			<ul class="generatedoc">				
				<li><?php echo CHtml::link('Surat Kontrak', array('docx/download','id'=>$suratkontrak->id_dokumen)); ?></li>
			</ul>
		</div>
	
	<?php } ?>
	</div>

</div>
<br/>
<div><?php echo CHtml::button('Kembali', array('submit'=>array('kontrak/dashboardkontrak'), 'class'=>'sidafbutton'));  ?></div>