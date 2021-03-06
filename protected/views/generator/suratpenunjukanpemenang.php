<?php
/* @var $this SiteController */

$id = Yii::app()->getRequest()->getQuery('id');
$cpengadaan = Pengadaan::model()->find('id_pengadaan = "' . $id . '"');
$this->pageTitle=Yii::app()->name . ' | '.$cpengadaan->nama_pengadaan;
?>

<div id="pagecontent">
	<div id="sidebar">
		<?php if(!Yii::app()->user->isGuest) $this->widget('MenuPortlet'); ?>
		<script type="text/javascript">
			$('#17').attr('class','onprogress');
		</script>
	</div>

	<div id="maincontent">
	
		<?php 
			if (Yii::app()->user->getState('role') == 'anggota') {
		?>
            
                <?php if($cpengadaan->metode_pengadaan == 'Penunjukan Langsung') { ?>
        		<div id="menuform">
                    <?php
                        $this->widget('zii.widgets.CMenu', array(
                            'items'=>array(
                                    array('label'=>'ND Usulan', 'url'=>array('/generator/editnotadinasusulanpemenang','id'=>$id)),
                                    array('label'=>'ND Penetapan', 'url'=>array('generator/editnotadinaspenetapanpemenang','id'=>$id)),
                                    array('label'=>'Surat Penunjukan Penyedia', 'url'=>array($SPPM->isNewRecord?'/generator/suratpenunjukanpemenang':'/generator/editsuratpenunjukanpemenang','id'=>$id)),
                            ),
                        ));
                    ?>
                </div>
        	<?php } else if($cpengadaan->metode_pengadaan == 'Pemilihan Langsung') { ?>
                <div id="menuform">
                    <?php
                        $this->widget('zii.widgets.CMenu', array(
                            'items'=>array(
                                    array('label'=>'ND Usulan', 'url'=>array('/generator/editnotadinasusulanpemenang','id'=>$id)),
                                    array('label'=>'ND Penetapan', 'url'=>array('generator/editnotadinaspenetapanpemenang','id'=>$id)),
                                    array('label'=>'ND Pemberitahuan', 'url'=>array('/generator/editnotadinaspemberitahuanpemenang','id'=>$id)),
                                    array('label'=>'Surat Penunjukan Pemenang', 'url'=>array($SPPM->isNewRecord?'/generator/suratpenunjukanpemenang':'/generator/editsuratpenunjukanpemenang','id'=>$id)),
                            ),
                        ));
                    ?>
                </div>
			<?php } else if($cpengadaan->metode_pengadaan == 'Pelelangan') { ?>
				<div id="menuform">
                    <?php
                        $this->widget('zii.widgets.CMenu', array(
                            'items'=>array(
                                    array('label'=>'ND Usulan', 'url'=>array('/generator/editnotadinasusulanpemenang','id'=>$id)),
                                    array('label'=>'ND Penetapan', 'url'=>array('generator/editnotadinaspenetapanpemenang','id'=>$id)),
                                    array('label'=>'SP Pemenang', 'url'=>array('/generator/editsuratpengumumanpemenang','id'=>$id)),
                                    array('label'=>'Surat Penunjukan Pemenang', 'url'=>array($SPPM->isNewRecord?'/generator/suratpenunjukanpemenang':'/generator/editsuratpenunjukanpemenang','id'=>$id)),
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
		
		<?php if ($cpengadaan->metode_pengadaan=="Penunjukan Langsung") {?>
			<h4><b> Surat Penunjukan Penyedia </b></h4>
		<?php }else{ ?>
			<h4><b> Surat Penunjukan Pemenang </b></h4>
		<?php } ?>
		
		
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
					'dateFormat'=>'dd-mm-yy',
					),
			));?>
			<?php echo $form->error($SPPM,'tanggal'); ?>
			</div>
		
			<div class="row">
				<?php echo $form->labelEx($SPPM,'No.SKI'); ?>
				<?php echo $form->textField($SPPM,'no_ski',array('size'=>56,'maxlength'=>50)); ?>
				<?php echo $form->error($SPPM,'no_ski'); ?>
			</div>
			
		<?php } ?>

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
