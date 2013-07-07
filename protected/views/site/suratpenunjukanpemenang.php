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
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
		?>
            
                <?php if($cpengadaan->metode_pengadaan == 'Penunjukan Langsung') { ?>
        		<div id="menuform">
                    <?php
                        $this->widget('zii.widgets.CMenu', array(
                            'items'=>array(
                                    array('label'=>'ND Usulan', 'url'=>array('/site/editnotadinasusulanpemenang','id'=>$id)),
                                    array('label'=>'ND Penetapan', 'url'=>array('site/editnotadinaspenetapanpemenang','id'=>$id)),
                                    array('label'=>'Surat Penunjukan Pemenang', 'url'=>array($SPPM->isNewRecord?'/site/suratpenunjukanpemenang':'/site/editsuratpenunjukanpemenang','id'=>$id)),
                            ),
                        ));
                    ?>
                </div>
        	<?php } else if($cpengadaan->metode_pengadaan == 'Pemilihan Langsung') { ?>
                <div id="menuform">
                    <?php
                        $this->widget('zii.widgets.CMenu', array(
                            'items'=>array(
                                    array('label'=>'ND Usulan', 'url'=>array('/site/editnotadinasusulanpemenang','id'=>$id)),
                                    array('label'=>'ND Penetapan', 'url'=>array('site/editnotadinaspenetapanpemenang','id'=>$id)),
                                    array('label'=>'ND Pemberitahuan', 'url'=>array('/site/editnotadinaspemberitahuanpemenang','id'=>$id)),
                                    array('label'=>'Surat Penunjukan Pemenang', 'url'=>array($SPPM->isNewRecord?'/site/suratpenunjukanpemenang':'/site/editsuratpenunjukanpemenang','id'=>$id)),
                            ),
                        ));
                    ?>
                </div>
			<?php } else if($cpengadaan->metode_pengadaan == 'Pelelangan') { ?>
				<div id="menuform">
                    <?php
                        $this->widget('zii.widgets.CMenu', array(
                            'items'=>array(
                                    array('label'=>'ND Usulan', 'url'=>array('/site/editnotadinasusulanpemenang','id'=>$id)),
                                    array('label'=>'ND Penetapan', 'url'=>array('site/editnotadinaspenetapanpemenang','id'=>$id)),
                                    array('label'=>'SP Pelelangan', 'url'=>array('/site/editsuratpengumumanpelelangan','id'=>$id)),
                                    array('label'=>'Surat Penunjukan Pemenang', 'url'=>array($SPPM->isNewRecord?'/site/suratpenunjukanpemenang':'/site/editsuratpenunjukanpemenang','id'=>$id)),
                            ),
                        ));
                    ?>
                </div>
			<?php } ?>
                
                <br/>
                
		<div class="form">

		<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'surat-penunjukan-pemenang-form',
		'enableAjaxValidation'=>false,
		)); ?>
		
		<h4><b> Surat Penunjukan Pemenang </b></h4>
		<div class="row">
			<?php echo $form->labelEx($SPPM,'nomor'); ?>
			<?php if ($cpengadaan->metode_pengadaan=="Penunjukan Langsung") {?>
				Nomor Nota Dinas Penetapan Pemenang : <?php echo $NDPP->nomor ?> <br/>
			<?php } else if ($cpengadaan->metode_pengadaan=="Pemilihan Langsung") {?>
				Nomor Nota Dinas Pemberitahuan Pemenang : <?php echo $NDBP->nomor ?> <br/>
			<?php } else if ($cpengadaan->metode_pengadaan=="Pelelangan") {?>
				Nomor Surat Pengumuman Pemenang : <?php echo $SPP->nomor ?> <br/>
			<?php } ?>
			<?php echo $form->textField($SPPM,'nomor',array('size'=>56,'maxlength'=>50)); ?>
			<?php echo $form->error($SPPM,'nomor'); ?>
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
		
		<?php if($cpengadaan->metode_pengadaan == 'Pelelangan') { ?>
		
			<div class="row">
				<?php echo $form->labelEx($SPPM,'nomor SKI'); ?>
				<?php echo $form->textField($SPPM,'nomor_ski',array('size'=>56,'maxlength'=>50)); ?>
				<?php echo $form->error($SPPM,'nomor_ski'); ?>
			</div>
		
			<div class="row">
			<?php echo $form->labelEx($SPPM,'tanggal SKI'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$SPPM,
					'attribute'=>'tanggal_ski',
					'value'=>$SPPM->tanggal_ski,
					'htmlOptions'=>array('size'=>56),
					'options'=>array(
					'dateFormat'=>'yy-mm-dd',
					),
			));?>
			<?php echo $form->error($SPPM,'tanggal'); ?>
			</div>
		
			<div class="row">
				<?php echo $form->labelEx($SPPM,'No.SKI'); ?>
				<?php echo $form->textField($SPPM,'no_ski',array('size'=>56,'maxlength'=>50)); ?>
				<?php echo $form->error($SPPM,'no_ski'); ?>
			</div>
			
			<div class="row">
				<?php echo $form->labelEx($SPPM,'Jaminan Pelaksanaan'); ?>
				<?php echo $form->textField($SPPM,'jaminan',array('size'=>56,'maxlength'=>255)); ?>
				<?php echo $form->error($SPPM,'jaminan'); ?>
			</div>
			
		<?php } ?>
		
		<div class="row">
			<?php echo $form->labelEx($SPPM,'batas waktu penyerahan (dalam satuan hari)'); ?>
			<?php echo $form->textField($SPPM,'lama_penyerahan',array('size'=>56,'maxlength'=>100)); ?>
			<?php echo $form->error($SPPM,'lama_penyerahan'); ?>
		</div>
		
		<div class="row">
				<?php echo $form->labelEx($SPPM,'Nomor Surat Penawaran'); ?>
				<?php echo $form->textField($SPPM,'no_surat_penawaran',array('size'=>56,'maxlength'=>50)); ?>
				<?php echo $form->error($SPPM,'no_surat_penawaran'); ?>
		</div>
		<div class="row">
			<?php echo $form->labelEx($SPPM,'Tanggal Surat Penawaran'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$SPPM,
					'attribute'=>'tgl_surat_penawaran',
					'value'=>$SPPM->tgl_surat_penawaran,
					'htmlOptions'=>array('size'=>56),
					'options'=>array(
					'dateFormat'=>'dd-mm-yy',
					),
			));?>
			<?php echo $form->error($SPPM,'tgl_surat_penawaran'); ?>
		</div>

		<div class="row buttons">
			<?php echo CHtml::submitButton($SPPM->isNewRecord ? 'Simpan' : 'Perbarui',array('class'=>'sidafbutton')); ?>
		</div>
		
	<?php $this->endWidget(); ?>

	</div><!-- form -->
	
	<?php if($SPPM->isNewRecord) { ?>
		
	<?php } else { ?>
		<br/>
		<div style="border-top:1px solid lightblue">
		<br/>
			<h4><b> Daftar Dokumen </b></h4>
			<ul class="generatedoc">
				<li><?php echo CHtml::link('Surat Penunjukan Pemenang', array('docx/download','id'=>$SPPM->id_dokumen)); ?></li>
			</ul>
		</div>
	<?php } ?>
	
<?php	} ?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'style'=>'background:url(css/bg.gif)'));  ?></div>
