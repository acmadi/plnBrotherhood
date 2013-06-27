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
                                            array('label'=>'Surat Undangan Aanwijzing', 'url'=>array('/site/aanwijzing','id'=>$id)),
                                            array('label'=>'Berita Acara Aanwijzing', 'url'=>array(($BAP->isNewRecord)?('/site/beritaacaraaanwijzing'):('/site/editberitaacaraaanwijzing'),'id'=>$id)),                                        
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
		'id'=>'surat-undangan-penjelasan-form',
		'enableAjaxValidation'=>false,
		)); ?>
		
		
		<h4><b> Berita Acara Aanwijzing </b></h4>
		<div class="row">
			<?php echo $form->labelEx($BAP,'nomor'); ?>
			<?php echo $form->textField($BAP,'nomor',array('size'=>56,'maxlength'=>50)); ?>
			<?php echo $form->error($BAP,'nomor'); ?>
		</div>

		<div class="row buttons">
			<?php echo CHtml::submitButton($BAP->isNewRecord ? 'Simpan' : 'Perbarui',array('class'=>'sidafbutton')); ?>			
		</div>
		
	<?php $this->endWidget(); ?>

	</div><!-- form -->
	
	<?php if (!$BAP->isNewRecord){ ?>
	
		<br/>
		<div style="border-top:1px solid lightblue">
		<br/>
			<h4><b> Buat Dokumen </b></h4>
			<ul class="generatedoc">
				
				<li><?php echo CHtml::link('Berita Acara Aanwijzing', array('docx/download','id'=>$BAP->id_dokumen)); ?></li>
				<li><?php echo CHtml::link('Daftar Hadir Aanwijzing', array('docx/download','id'=>$DH->id_dokumen)); ?></li>
			</ul>
		</div>
	
	<?php } ?>
	
	
	<?php	} ?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'class'=>'sidafbutton'));  ?></div>
