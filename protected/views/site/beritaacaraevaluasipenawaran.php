<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' | Generator';
$id = Yii::app()->getRequest()->getQuery('id');
$cpengadaan = Pengadaan::model()->find('id_pengadaan = "' . $id . '"');
?>

<div id="pagecontent">
	<div id="sidebar">
		<?php if(!Yii::app()->user->isGuest) $this->widget('MenuPortlet'); ?>
	</div>

	<div id="maincontent">		
	
		<?php 
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
		?>
		
        	<?php if($cpengadaan->metode_penawaran == 'Satu Sampul') { ?>        
                <div id="menuform">
                    <?php
                        $this->widget('zii.widgets.CMenu', array(
                            'items'=>array(                                    
                                    array('label'=>'BA Evaluasi Penawaran'),
                            ),
                        ));
                    ?>
                </div>
          	<?php } else if($cpengadaan->metode_penawaran == 'Dua Sampul') { ?>
          		<div id="menuform">
                    <?php
                        $this->widget('zii.widgets.CMenu', array(
                            'items'=>array(                                    
                                    array('label'=>'BA Evaluasi Penawaran Sampul Satu'),
                            ),
                        ));
                    ?>
                </div>
          	<?php } else if($cpengadaan->metode_penawaran == 'Dua Tahap') { ?>
          		<div id="menuform">
                    <?php
                        $this->widget('zii.widgets.CMenu', array(
                            'items'=>array(                                    
                                    array('label'=>'BA Evaluasi Penawaran Tahap Satu'),
                            ),
                        ));
                    ?>
                </div>
          	<?php } ?>
                <br/>
                
		<div class="form">

		<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'berita-acara-evaluasi-penawaran-form',
		'enableAjaxValidation'=>false,
		)); ?>

		<?php echo $form->errorSummary($BAEP); ?>
		
		<?php if($cpengadaan->metode_penawaran == 'Satu Sampul') { ?>
			<h4><b> Berita Acara Evaluasi Penawaran</b></h4>
		<?php } else if($cpengadaan->metode_penawaran == 'Dua Sampul') { ?>
			<h4><b> Berita Acara Evaluasi Penawaran Sampul Satu</b></h4>
		<?php } else if($cpengadaan->metode_penawaran == 'Dua Tahap') { ?>
			<h4><b> Berita Acara Evaluasi Penawaran Tahap Satu</b></h4>
		<?php } ?>
		<div class="row">
			<?php echo $form->labelEx($BAEP,'nomor'); ?>
			<?php echo $form->textField($BAEP,'nomor',array('size'=>56,'maxlength'=>50)); ?>
			<?php echo $form->error($BAEP,'nomor'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($Dokumen1,'tanggal surat'); ?>
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
		
		<?php if($cpengadaan->metode_penawaran == 'Satu Sampul') { ?>
			<div class="row">
				<?php echo $form->labelEx($BAEP,'pemenang 1'); ?>
				<?php echo $form->textField($BAEP,'pemenang',array('size'=>56,'maxlength'=>100)); ?>
				<?php echo $form->error($BAEP,'pemenang'); ?>
			</div>
		
			<div class="row">
				<?php echo $form->labelEx($BAEP,'alamat 1'); ?>
				<?php echo $form->textArea($BAEP,'alamat',array('cols'=>40,'rows'=>3, 'maxlength'=>255)); ?>
				<?php echo $form->error($BAEP,'alamat'); ?>
			</div>
		
			<div class="row">
				<?php echo $form->labelEx($BAEP,'NPWP 1'); ?>
				<?php echo $form->textField($BAEP,'NPWP',array('size'=>56,'maxlength'=>100)); ?>
				<?php echo $form->error($BAEP,'NPWP'); ?>
			</div>
		
			<div class="row">
				<?php echo $form->labelEx($BAEP,'nilai 1'); ?>
				<?php echo $form->textField($BAEP,'nilai',array('size'=>56,'maxlength'=>255)); ?>
				<?php echo $form->error($BAEP,'nilai'); ?>
			</div>
		
			<div class="row">
				<?php echo $form->labelEx($BAEP,'pemenang 2'); ?>
				<?php echo $form->textField($BAEP,'pemenang_2',array('size'=>56,'maxlength'=>100)); ?>
				<?php echo $form->error($BAEP,'pemenang_2'); ?>
			</div>
		
			<div class="row">
				<?php echo $form->labelEx($BAEP,'alamat 2'); ?>
				<?php echo $form->textArea($BAEP,'alamat_2',array('cols'=>40,'rows'=>3, 'maxlength'=>255)); ?>
				<?php echo $form->error($BAEP,'alamat_2'); ?>
			</div>
		
			<div class="row">
				<?php echo $form->labelEx($BAEP,'NPWP 2'); ?>
				<?php echo $form->textField($BAEP,'NPWP_2',array('size'=>56,'maxlength'=>100)); ?>
				<?php echo $form->error($BAEP,'NPWP_2'); ?>
			</div>
		
			<div class="row">
				<?php echo $form->labelEx($BAEP,'nilai 2'); ?>
				<?php echo $form->textField($BAEP,'nilai_2',array('size'=>56,'maxlength'=>255)); ?>
				<?php echo $form->error($BAEP,'nilai_2'); ?>
			</div>
		<?php } ?>
	
		<div class="row">
				<?php 
					$this->widget('application.extensions.appendo.JAppendo',array(
					'id' => 'idpenyedia',        
					'model' => $PP,
					// 'model2' => $PP2,
					'viewName' => 'formperusahaan_evaluasi_sampul_1',
					'labelAdd' => 'Tambah Penyedia',
					'labelDel' => 'Hapus Penyedia',
					
					)); 
				?>
		</div>
		
		<div class="row buttons">
			<?php echo CHtml::submitButton($BAEP->isNewRecord ? 'Simpan' : 'Perbarui',array('class'=>'sidafbutton')); ?>
		</div>
		
		<?php $this->endWidget(); ?>

		</div><!-- form -->
		
	<?php if($BAEP->isNewRecord) { ?>
		
	<?php } else { ?>
		<br/>
		<div style="border-top:1px solid lightblue">
		<br/>
			<h4><b> Buat Dokumen </b></h4>
			<ul class="generatedoc">
				<?php if($cpengadaan->metode_penawaran == 'Satu Sampul') { ?>
					<li><?php echo CHtml::link('Berita Acara Evaluasi Penawaran', array('docx/download','id'=>$BAEP->id_dokumen)); ?></li>
					<li><?php echo CHtml::link('Daftar Hadir Evaluasi Penawaran', array('docx/download','id'=>$DH->id_dokumen)); ?></li>
				<?php } else if($cpengadaan->metode_penawaran == 'Dua Sampul') { ?>
					<li><?php echo CHtml::link('Berita Acara Evaluasi Penawaran Sampul Satu', array('docx/download','id'=>$BAEP->id_dokumen)); ?></li>
					<li><?php echo CHtml::link('Daftar Hadir Evaluasi Penawaran Sampul Satu', array('docx/download','id'=>$DH->id_dokumen)); ?></li>
				<?php } else if($cpengadaan->metode_penawaran == 'Dua Tahap') { ?>
					<li><?php echo CHtml::link('Berita Acara Evaluasi Penawaran Tahap Satu', array('docx/download','id'=>$BAEP->id_dokumen)); ?></li>
					<li><?php echo CHtml::link('Daftar Hadir Evaluasi Penawaran Tahap Satu', array('docx/download','id'=>$DH->id_dokumen)); ?></li>
				<?php } ?>
			</ul>
		</div>
	<?php } ?>
	
	
	<?php	} ?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'class'=>'sidafbutton'));  ?></div>