<?php
/* @var $this SiteController */

$id = Yii::app()->getRequest()->getQuery('id');
$this->pageTitle=Yii::app()->name . ' | '.Pengadaan::model()->findByPk($id)->nama_pengadaan;
?>

<div id="pagecontent">
	<div id="sidebar">
		<?php if(!Yii::app()->user->isGuest) $this->widget('MenuPortlet'); ?>
		<script type="text/javascript">
			$('#1').attr('class','onprogress');
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
							array('label'=>'RKS', 'url'=>array('/site/editrks','id'=>$id)),
							array('label'=>'HPS', 'url'=>array(($Hps->isNewRecord)?('/site/hps'):('/site/edithps'),'id'=>$id)),
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

				<h4><b> HPS </b></h4>
				<div class="row">
					<?php echo $form->labelEx($Hps,'nomor'); ?>
					Nomor Rks : <?php echo $Rks->nomor ?> <br/>  
					<?php echo $form->textField($Hps,'nomor',array('size'=>56,'maxlength'=>50)); ?>
					<?php echo $form->error($Hps,'nomor'); ?>
				</div>
				
				<div class="row">
					<?php echo $form->labelEx($Dokumen0,'tanggal'); ?>
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
				<br/>
				
				<div class="row buttons">
					<?php echo CHtml::submitButton($Hps->isNewRecord ? 'Simpan' : 'Perbarui',array('class'=>'sidafbutton')); ?>
				</div>

				<?php $this->endWidget(); ?>

			</div><!-- form -->
			
			<?php if (!$Hps->isNewRecord){ ?>
				<br/>
				<div style="border-top:1px solid lightblue">
				<br/>
					<h4><b> Daftar Dokumen </b></h4>
					<ul class="generatedoc">
						<li><?php echo CHtml::link('Hps', array('xlsx/download','id'=>$Hps->id_dokumen)); ?></li>
					</ul>
				</div>
			<?php } ?>
			
		<?php } ?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'class'=>'sidafbutton'));  ?></div>
