<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' | Generator';
$id = Yii::app()->getRequest()->getQuery('id');
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
							array('label'=>'HPS', 'url'=>array((!$Rks->isNewRecord)&&(Pengadaan::model()->findByPk($id)->status=='2')?'/site/hps')),
						),
					));
				?>
			</div>
			</br>
		
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
					<?php echo $form->labelEx($Dokumen1,'tanggal'); ?>
					<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
						'model'=>$Dokumen1,
						'attribute'=>'tanggal',
						'value'=>$Dokumen1->tanggal,
						'htmlOptions'=>array('size'=>56),
						'options'=>array(
						'dateFormat'=>'yy-mm-dd',
						),
					));?>
					<?php echo $form->error($Dokumen1,'tanggal'); ?>
				</div>
				</br>
				
				<h4><b> Metode Penawaran Pengadaan</b></h4>
				<?php if($Pengadaan->metode_pengadaan=='Penunjukan Langsung'){ ?>
					<div class="row">
						<?php echo $form->radioButtonList($Pengadaan,'metode_penawaran',
							array('Satu Sampul'=>'Satu Sampul'),
							array('separator'=>' ', 'labelOptions'=>array('style'=>'display:inline'))); ?>
						<?php echo $form->error($Pengadaan,'metode_penawaran'); ?>
					</div>
					</br>
				<?php } else if($Pengadaan->metode_pengadaan=='Pemilihan Langsung'){ ?>
					<div class="row">
						<?php echo $form->radioButtonList($Pengadaan,'metode_penawaran',
							array('Satu Sampul'=>'Satu Sampul','Dua Sampul'=>'Dua Sampul'),
							array('separator'=>' ', 'labelOptions'=>array('style'=>'display:inline'))); ?>
						<?php echo $form->error($Pengadaan,'metode_penawaran'); ?>
					</div>
					</br>
				<?php } else { ?>
					<div class="row">
						<?php echo $form->radioButtonList($Pengadaan,'metode_penawaran',
							array('Satu Sampul'=>'Satu Sampul','Dua Sampul'=>'Dua Sampul','Dua Tahap'=>'Dua Tahap'),
							array('separator'=>' ', 'labelOptions'=>array('style'=>'display:inline'))); ?>
						<?php echo $form->error($Pengadaan,'metode_penawaran'); ?>
					</div>
					</br>
				<?php } ?>
				
				<h4><b> Jenis Kualifikasi Pengadaan</b></h4>
				<div class="row">
					<?php echo $form->dropDownList($Pengadaan,'jenis_kualifikasi',
						array('Pra Kualifikasi'=>'Pra Kualifikasi','Pasca Kualifikasi'=>'Pasca Kualifikasi'),
						array('empty'=>"------Pilih Jenis Kualifikasi------")); ?>
					<?php echo $form->error($Pengadaan,'jenis_kualifikasi'); ?>
				</div>
				</br>

				<div class="row buttons">
					<?php echo CHtml::submitButton($Rks->isNewRecord ? 'Simpan' : 'Perbarui',array('class'=>'sidafbutton')); ?>
				</div>

				<?php $this->endWidget(); ?>

			</div><!-- form -->
			
			<?php if (!$Rks->isNewRecord){ ?>
				</br>
				<div style="border-top:1px solid lightblue">
				</br>
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
