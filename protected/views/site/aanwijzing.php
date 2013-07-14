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
			$('#11').attr('class','onprogress');
		</script>
	</div>

	<div id="maincontent">
		<?php 
			if (Yii::app()->user->getState('role') == 'anggota') {
		?>
		
                <div id="menuform">
                    <?php
					if(Panitia::model()->findByPk($Pengadaan->id_panitia)->jenis_panitia=="Panitia") {
						$this->widget('zii.widgets.CMenu', array(
										'items'=>array(
											array('label'=>'Nota Dinas Undangan Aanwijzing', 'url'=>array((Dokumen::model()->find('id_pengadaan = ' .$id. ' and nama_dokumen = "Surat Undangan Aanwijzing"') == null)?'/site/undanganaanwijzing':'/site/editundanganaanwijzing','id'=>$id)),
											array('label'=>'Aanwijzing', 'url'=>array($Pengadaan->status=='20'?('/site/aanwijzing'):('/site/editaanwijzing'),'id'=>$id)),
											array('label'=>'BA Aanwijzing', 'url'=>array($Pengadaan->status=='21'?'/site/beritaacaraaanwijzing':($Pengadaan->status=='20'?'':'/site/editberitaacaraaanwijzing'),'id'=>$id)),
										),
								));
					} else {
						$this->widget('zii.widgets.CMenu', array(
										'items'=>array(
											array('label'=>'Aanwijzing', 'url'=>array($Pengadaan->status=='20'?('/site/aanwijzing'):('/site/editaanwijzing'),'id'=>$id)),
											array('label'=>'BA Aanwijzing', 'url'=>array($Pengadaan->status=='21'?'/site/beritaacaraaanwijzing':($Pengadaan->status=='20'?'':'/site/editberitaacaraaanwijzing'),'id'=>$id)),
										),
								));
					}
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
		'id'=>'berita-acara-penjelasan-form',
		'enableAjaxValidation'=>false,
		)); ?>
		
		
		<h4><b> Aanwijzing </b></h4>
		<div class="row">
			<?php echo $form->labelEx($Dokumen1,'tanggal'); ?>
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
			<?php echo $form->labelEx($BAP,'waktu Aanwijzing (Format HH:MM)'); ?>
			<?php echo $form->textField($BAP,'waktu',array('size'=>56,'maxlength'=>10)); ?>
			<?php echo $form->error($BAP,'waktu'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($BAP,'tempat Aanwijzing'); ?>
			<?php echo $form->textArea($BAP,'tempat',array('cols'=>43,'rows'=>3, 'maxlength'=>100)); ?>
			<?php echo $form->error($BAP,'tempat'); ?>
		</div>


		<div class="row">
				<?php 
					if($Pengadaan->metode_pengadaan == 'Penunjukan Langsung'){
						$this->widget('application.extensions.appendo.JAppendo',array(
						'id' => 'idpenyedia',        
						'model' => $PP,
						// 'model2' => $PP2,
						'viewName' => 'formperusahaanaanwijzing',
						'labelAdd' => '',
						'labelDel' => 'Hapus Penyedia',					
						)); 
					}else{
						$this->widget('application.extensions.appendo.JAppendo',array(
						'id' => 'idpenyedia',        
						'model' => $PP,
						// 'model2' => $PP2,
						'viewName' => 'formperusahaanaanwijzing',
						'labelAdd' => '',
						'labelDel' => '',					
						)); 
					}
				?>
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
			<h4><b> Daftar Dokumen </b></h4>
			<ul class="generatedoc">
				
				<li><?php echo CHtml::link('Lampiran Berita Acara Aanwijzing', array('docx/download','id'=>$Dokumen2->id_dokumen)); ?></li>
				<li><?php echo CHtml::link('Daftar Hadir Aanwijzing', array('xlsx/download','id'=>$DH->id_dokumen)); ?></li>
			</ul>
		</div>
	
	<?php } ?>
	
	
	<?php	} ?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'class'=>'sidafbutton'));  ?></div>
