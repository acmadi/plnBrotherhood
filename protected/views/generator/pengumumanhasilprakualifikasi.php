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
			$('#7').attr('class','onprogress');
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
							array('label'=>'Pengumuman Hasil', 'url'=>array($Pengadaan->status=='15'?('/generator/pengumumanhasilprakualifikasi'):('/generator/editpengumumanhasilprakualifikasi'),'id'=>$id)),
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
			<h4><b>Surat Pengumuman Hasil Prakualifikasi</b></h4>
			<div class="form">
			<?php
				$form=$this->beginWidget('CActiveForm', array(
					'id'=>'pengumuman-hasil-prakualifikasi-form',
					'enableAjaxValidation'=>'false',
				));
				?>
				<div class="row">
				<?php
					echo $form->labelEx($Pengumuman, 'nomor');?>
					<?php
					echo $form->textField($Pengumuman, 'nomor',array('size'=>56,'maxlength'=>50));
					echo $form->error($Pengumuman,'nomor');					
				?>				
				</div>
				<div class="row">
					<?php echo $form->labelEx($newDokumen,'tanggal'); ?>
					<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
							'model'=>$newDokumen,
							'attribute'=>'tanggal',
							'value'=>$newDokumen->tanggal,
							'htmlOptions'=>array('size'=>56),
							'options'=>array(
							'dateFormat'=>'dd-mm-yy',
							),
					));?>
					<?php echo $form->error($newDokumen,'tanggal'); ?>
			</div>
				<div class="row buttons">
					<?php echo CHtml::submitButton($Pengumuman->isNewRecord?'Simpan':'Perbarui',array('class'=>'sidafbutton')); ?>
				</div>
				<?php $this->endWidget();?>
		
		<br/>
		</div><!-- form -->	
		
		<li><?php // echo CHtml::link('Hasil Prakualifikasi', array('xlsx/download','id'=>$PHPQ->id_dokumen)); ?></li>
		
	<?php	} ?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'style'=>'background:url(css/bg.gif)'));  ?></div>
