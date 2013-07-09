<?php
/* @var $this SiteController */

$id = Yii::app()->getRequest()->getQuery('id');
$cpengadaan = Pengadaan::model()->find('id_pengadaan = "' . $id . '"');
$this->pageTitle=Yii::app()->name . ' | '.$cpengadaan->nama_pengadaan;
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
                           	array('label'=>'Dokumen Prakualifikasi', 'url'=>array($DPK->isNewRecord?('/site/dokumenprakualifikasi'):('/site/editdokumenprakualifikasi'),'id'=>$id)),
                          	array('label'=>'Surat Undangan Prakualifikasi', 'url'=>array(Pengadaan::model()->findByPk($id)->status=='2'?'/site/suratundanganprakualifikasi':(Pengadaan::model()->findByPk($id)->status=='1'?'':'/site/editsuratundanganprakualifikasi'),'id'=>$id)),
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
				'id'=>'surat-undangan-prakualifikasi-form',
				'enableAjaxValidation'=>false,
				)); ?>
				
				<?php echo $form->errorSummary($SUPK); ?>
				
				<h4><b> Surat Undangan Prakualifikasi</b></h4>
				
				<div class="row">
					<?php echo $form->labelEx($SUPK,'nomor'); ?>
					<?php echo $form->textField($SUPK,'nomor',array('size'=>56,'maxlength'=>100)); ?>
					<?php echo $form->error($SUPK,'nomor'); ?>
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
					<?php echo $form->labelEx($SUPK,'perihal'); ?>
					<?php echo $form->textArea($SUPK,'perihal',array('cols'=>43,'rows'=>3, 'maxlength'=>256)); ?>
					<?php echo $form->error($SUPK,'perihal'); ?>
				</div>
				
				<div class="row buttons">
					<?php echo CHtml::submitButton($SUPK->isNewRecord ? 'Simpan' : 'Perbarui',array('class'=>'sidafbutton')); ?>
				</div>
				
				<?php $this->endWidget(); ?>

			</div><!-- form -->
		
			<?php if($SUPK->isNewRecord) { ?>
			
			<?php } else { ?>
				<br/>
				<div style="border-top:1px solid lightblue">
					<br/>
					<h4><b> Daftar Dokumen </b></h4>
					<ul class="generatedoc">
						<li><?php echo CHtml::link('Surat Undangan Prakualifikasi', array('docx/download','id'=>$SUPK->id_dokumen)); ?></li>
					</ul>
				</div>
			<?php } ?>
    	<?php } ?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'class'=>'sidafbutton'));  ?></div>
