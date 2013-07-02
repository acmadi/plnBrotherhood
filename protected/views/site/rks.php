<?php
/* @var $this SiteController */

$id = Yii::app()->getRequest()->getQuery('id');
$this->pageTitle=Yii::app()->name . ' | '.Pengadaan::model()->findByPk($id)->nama_pengadaan;
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
							array('label'=>'RKS', 'url'=>array($Rks->isNewRecord?('/site/rks'):('/site/editrks'),'id'=>$id)),
							array('label'=>'HPS', 'visible'=>$Rks->isNewRecord),
							array('label'=>'HPS', 'url'=>array(Pengadaan::model()->findByPk($id)->status=='2'?'/site/hps':'/site/edithps','id'=>$id), 'visible'=>!$Rks->isNewRecord),
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
				'id'=>'rks-form',
				'enableAjaxValidation'=>false,
			)); ?>
				<h4><b> RKS </b></h4>
				<div class="row">
					<?php echo $form->labelEx($Rks,'nomor'); ?>
					<?php echo $form->textField($Rks,'nomor',array('size'=>56,'maxlength'=>50)); ?>
					<?php echo $form->error($Rks,'nomor'); ?>
				</div>
				
				<div class="row">
					<?php echo $form->labelEx($Dokumen1,'tanggal rks'); ?>
					<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
						'model'=>$Dokumen1,
						'attribute'=>'tanggal',
						'value'=>$Dokumen1->tanggal,
						'htmlOptions'=>array('size'=>56),
						'options'=>array(
						'dateFormat'=>'dd-mm-yy',
						),
					));?>
					<?php echo $form->error($Dokumen1,'tanggal'); ?>
				</div>
				
				<div class="row">
					<?php echo $form->labelEx($Rks,'tanggal_permintaan_penawaran'); ?>
					<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
						'model'=>$Rks,
						'attribute'=>'tanggal_permintaan_penawaran',
						'value'=>$Rks->tanggal_permintaan_penawaran,
						'htmlOptions'=>array('sigze'=>56),
						'options'=>array(
						'dateFormat'=>'dd-mm-yy',
						),
					));?>
					<?php echo $form->error($Rks,'tanggal_permintaan_penawaran'); ?>
				</div>
				
				<div class="row">
					<?php echo $form->labelEx($Rks,'tanggal_penjelasan'); ?>
					<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
						'model'=>$Rks,
						'attribute'=>'tanggal_penjelasan',
						'value'=>$Rks->tanggal_penjelasan,
						'htmlOptions'=>array('size'=>56),
						'options'=>array(
						'dateFormat'=>'dd-mm-yy',
						),
					));?>
					<?php echo $form->error($Rks,'tanggal_penjelasan'); ?>
				</div>
				
				<div class="row">
					<?php echo $form->labelEx($Rks,'waktu_penjelasan (Format HH:MM)'); ?>
					<?php echo $form->textField($Rks,'waktu_penjelasan',array('size'=>56,'maxlength'=>20)); ?>
					<?php echo $form->error($Rks,'waktu_penjelasan'); ?>
				</div>

				<div class="row">
					<?php echo $form->labelEx($Rks,'tempat_penjelasan'); ?>
					<?php echo $form->textArea($Rks,'tempat_penjelasan',array('cols'=>43,'rows'=>3, 'maxlength'=>256)); ?>
					<?php echo $form->error($Rks,'tempat_penjelasan'); ?>
				</div>
				
				<div class="row">
					<?php echo $form->labelEx($Rks,'tanggal_awal_pemasukan_penawaran'); ?>
					<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
						'model'=>$Rks,
						'attribute'=>'tanggal_pemasukan_penawaran',
						'value'=>$Rks->tanggal_pemasukan_penawaran,
						'htmlOptions'=>array('size'=>56),
						'options'=>array(
						'dateFormat'=>'dd-mm-yy',
						),
					));?>
					<?php echo $form->error($Rks,'tanggal_pemasukan_penawaran'); ?>
				</div>
				
				<div class="row">
					<?php echo $form->labelEx($Rks,'tanggal_akhir_pemasukan_penawaran'); ?>
					<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
						'model'=>$Rks,
						'attribute'=>'tanggal_akhir_pemasukan_penawaran',
						'value'=>$Rks->tanggal_akhir_pemasukan_penawaran,
						'htmlOptions'=>array('size'=>56),
						'options'=>array(
						'dateFormat'=>'dd-mm-yy',
						),
					));?>
					<?php echo $form->error($Rks,'tanggal_akhir_pemasukan_penawaran'); ?>
				</div>
				
				<div class="row">
					<?php echo $form->labelEx($Rks,'waktu_paling_lambat_pemasukan_penawaran (Format HH:MM)'); ?>
					<?php echo $form->textField($Rks,'waktu_pemasukan_penawaran',array('size'=>56,'maxlength'=>20)); ?>
					<?php echo $form->error($Rks,'waktu_pemasukan_penawaran'); ?>
				</div>

				<div class="row">
					<?php echo $form->labelEx($Rks,'tempat_pemasukan_penawaran'); ?>
					<?php echo $form->textArea($Rks,'tempat_pemasukan_penawaran',array('cols'=>43,'rows'=>3, 'maxlength'=>100)); ?>
					<?php echo $form->error($Rks,'tempat_pemasukan_penawaran'); ?>
				</div>
				
				<div class="row">
					<?php echo $form->labelEx($Rks,'tanggal_negosiasi'); ?>
					<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
						'model'=>$Rks,
						'attribute'=>'tanggal_negosiasi',
						'value'=>$Rks->tanggal_negosiasi,
						'htmlOptions'=>array('size'=>56),
						'options'=>array(
						'dateFormat'=>'dd-mm-yy',
						),
					));?>
					<?php echo $form->error($Rks,'tanggal_negosiasi'); ?>
				</div>
				
				<div class="row">
					<?php echo $form->labelEx($Rks,'waktu_negosiasi (Format HH:MM)'); ?>
					<?php echo $form->textField($Rks,'waktu_negosiasi',array('size'=>56,'maxlength'=>20)); ?>
					<?php echo $form->error($Rks,'waktu_negosiasi'); ?>
				</div>

				<div class="row">
					<?php echo $form->labelEx($Rks,'tempat_negosiasi'); ?>
					<?php echo $form->textArea($Rks,'tempat_negosiasi',array('cols'=>43,'rows'=>3, 'maxlength'=>100)); ?>
					<?php echo $form->error($Rks,'tempat_negosiasi'); ?>
				</div>
				
				<div class="row">
					<?php echo $form->labelEx($Rks,'tanggal_penetapan_pemenang'); ?>
					<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
						'model'=>$Rks,
						'attribute'=>'tanggal_penetapan_pemenang',
						'value'=>$Rks->tanggal_penetapan_pemenang,
						'htmlOptions'=>array('size'=>56),
						'options'=>array(
						'dateFormat'=>'dd-mm-yy',
						),
					));?>
					<?php echo $form->error($Rks,'tanggal_penetapan_pemenang'); ?>
				</div>
				
				<div class="row">
					<?php echo $form->labelEx($Rks,'waktu_penetapan_pemenang (Format HH:MM)'); ?>
					<?php echo $form->textField($Rks,'waktu_penetapan_pemenang',array('size'=>56,'maxlength'=>20)); ?>
					<?php echo $form->error($Rks,'waktu_penetapan_pemenang'); ?>
				</div>

				<div class="row">
					<?php echo $form->labelEx($Rks,'tempat_penetapan_pemenang'); ?>
					<?php echo $form->textArea($Rks,'tempat_penetapan_pemenang',array('cols'=>43,'rows'=>3, 'maxlength'=>100)); ?>
					<?php echo $form->error($Rks,'tempat_penetapan_pemenang'); ?>
				</div>
				
				<br/>
				
				<h4><b> Metode Penawaran Pengadaan</b></h4>
				<?php if($Pengadaan->metode_pengadaan=='Penunjukan Langsung'){ ?>
					<div class="row">
						<?php echo $form->radioButtonList($Pengadaan,'metode_penawaran',
							array('Satu Sampul'=>'Satu Sampul'),
							array('separator'=>' ', 'labelOptions'=>array('style'=>'display:inline'))); ?>
						<?php echo $form->error($Pengadaan,'metode_penawaran'); ?>
					</div>
					<br/>
				<?php } else if($Pengadaan->metode_pengadaan=='Pemilihan Langsung'){ ?>
					<div class="row">
						<?php echo $form->radioButtonList($Pengadaan,'metode_penawaran',
							array('Satu Sampul'=>'Satu Sampul','Dua Sampul'=>'Dua Sampul'),
							array('separator'=>' ', 'labelOptions'=>array('style'=>'display:inline'))); ?>
						<?php echo $form->error($Pengadaan,'metode_penawaran'); ?>
					</div>
					<br/>
				<?php } else { ?>
					<div class="row">
						<?php echo $form->radioButtonList($Pengadaan,'metode_penawaran',
							array('Satu Sampul'=>'Satu Sampul','Dua Sampul'=>'Dua Sampul','Dua Tahap'=>'Dua Tahap'),
							array('separator'=>' ', 'labelOptions'=>array('style'=>'display:inline'))); ?>
						<?php echo $form->error($Pengadaan,'metode_penawaran'); ?>
					</div>
					<br/>
				<?php } ?>
				
				<h4><b> Jenis Kualifikasi Pengadaan</b></h4>
				<div class="row">
					<?php echo $form->dropDownList($Pengadaan,'jenis_kualifikasi',
						array('Pra Kualifikasi'=>'Pra Kualifikasi','Pasca Kualifikasi'=>'Pasca Kualifikasi'),
						array('empty'=>"------Pilih Jenis Kualifikasi------")); ?>
					<?php echo $form->error($Pengadaan,'jenis_kualifikasi'); ?>
				</div>
				<br/>

				<div class="row buttons">
					<?php echo CHtml::submitButton($Rks->isNewRecord ? 'Simpan' : 'Perbarui',array('class'=>'sidafbutton')); ?>
				</div>

				<?php $this->endWidget(); ?>

			</div><!-- form -->
			
			<?php if (!$Rks->isNewRecord){ ?>
				</br>
				<div style="border-top:1px solid lightblue">
				<br/>
					<h4><b> Buat Dokumen </b></h4>
					<ul class="generatedoc">
						<li><?php echo CHtml::link('Pakta Integritas Awal Panitia', array('docx/download','id'=>$PAP1->id_dokumen)); ?></li>
						<li><?php echo CHtml::link('RKS', array('docx/download','id'=>$Rks->id_dokumen)); ?></li>
					</ul>
				</div>
			<?php } ?>
			
		<?php }
		?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'class'=>'sidafbutton'));  ?></div>
