<?php
/* @var $this SiteController */

$id = Yii::app()->getRequest()->getQuery('id');
$Pengadaan= Pengadaan::model()->findByPk($id);
$this->pageTitle=Yii::app()->name . ' | '.$Pengadaan->nama_pengadaan;
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
                                    array('label'=>'Surat Undangan Aanwijzing', 'url'=>array($SUP->isNewRecord?('/site/aanwijzing'):('/site/editaanwijzing'),'id'=>$id)),
                                    array('label'=>'Berita Acara Aanwijzing', 'url'=>array((Dokumen::model()->find('id_pengadaan = ' .$id. ' and nama_dokumen = "Berita Acara Aanwijzing"') == null)?'/site/beritaacaraaanwijzing':'/site/editberitaacaraaanwijzing','id'=>$id)),
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
		
		<h4><b> Nota Dinas Undangan Aanwijzing </b></h4>
		<div class="row">
			<?php echo $form->labelEx($SUP,'nomor'); ?>
			<?php if(Pengadaan::model()->findByPk($id)->metode_pengadaan=="Pelelangan"){ ?>
			Nomor Surat Undangan Pengambilan Dokumen Pengadaan : <?php echo $SUPDP->nomor ?> <br/>
			<?php } else if(Pengadaan::model()->findByPk($id)->metode_pengadaan=="Penunjukan Langsung"||Pengadaan::model()->findByPk($Dokumen0->id_pengadaan)->metode_pengadaan=="Pemilihan Langsung") { ?>
			Nomor Surat Undangan Permintaan Penawaran Harga : <?php echo $SUPPPH->nomor ?> <br/>
			<?php } ?>
			<?php echo $form->textField($SUP,'nomor',array('size'=>56,'maxlength'=>50)); ?>
			<?php echo $form->error($SUP,'nomor'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($Dokumen0,'tanggal surat'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$Dokumen0,
					'attribute'=>'tanggal',
					'value'=>$Dokumen0->tanggal,
					'htmlOptions'=>array('size'=>56),
					'options'=>array(
					'dateFormat'=>'dd-mm-yy',
					),
			));?>
			<?php echo $form->error($Dokumen0,'tanggal'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($SUP,'perihal'); ?>
			<?php echo $form->textArea($SUP,'perihal',array('cols'=>43,'rows'=>3, 'maxlength'=>100)); ?>
			<?php echo $form->error($SUP,'perihal'); ?>
		</div>		
		
		<div class="row">
			<?php echo $form->labelEx($SUP,'tanggal Aanwijzing'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$SUP,
					'attribute'=>'tanggal_undangan',
					'value'=>$SUP->tanggal_undangan,
					'htmlOptions'=>array('size'=>56),
					'options'=>array(
					'dateFormat'=>'dd-mm-yy',
					),
			));?>
			<?php echo $form->error($SUP,'tanggal_undangan'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($SUP,'waktu Aanwijzing (Format HH:MM)'); ?>
			<?php echo $form->textField($SUP,'waktu',array('size'=>56,'maxlength'=>10)); ?>
			<?php echo $form->error($SUP,'waktu'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($SUP,'tempat Pembukaan Penawaran'); ?>
			<?php echo $form->textArea($SUP,'tempat',array('cols'=>43,'rows'=>3, 'maxlength'=>100)); ?>
			<?php echo $form->error($SUP,'tempat'); ?>
		</div>

		
		<div class="row buttons">
			<?php echo CHtml::submitButton($SUP->isNewRecord ? 'Simpan' : 'Perbarui',array('class'=>'sidafbutton')); ?>
			
		</div>
		
	<?php $this->endWidget(); ?>
	
	</div><!-- form -->
	
	<?php if (!$SUP->isNewRecord){ ?>
			
		<div style="border-top:1px solid lightblue">
		<br/>
			<h4><b> Daftar Dokumen </b></h4>
			<ul class="generatedoc">
				<li><?php echo CHtml::link('Surat Undangan Aanwijzing', array('docx/download','id'=>$SUP->id_dokumen)); ?></li>			
			</ul>
		</div>
	<?php } ?>
	
	
	<?php	} ?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'class'=>'sidafbutton'));  ?></div>
