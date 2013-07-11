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
		
		<?php if($cpengadaan->metode_penawaran == 'Satu Sampul') { ?>
			<h4><b> Berita Acara Evaluasi Penawaran</b></h4>
		<?php } else if($cpengadaan->metode_penawaran == 'Dua Sampul') { ?>
			<h4><b> Berita Acara Evaluasi Penawaran Sampul Satu</b></h4>
		<?php } else if($cpengadaan->metode_penawaran == 'Dua Tahap') { ?>
			<h4><b> Berita Acara Evaluasi Penawaran Tahap Satu</b></h4>
		<?php } ?>
		<div class="row">
			<?php echo $form->labelEx($BAEP,'nomor'); ?>
			<?php if($cpengadaan->metode_penawaran == 'Satu Sampul') { ?>
				Nomor Berita Acara Pembukaan : <?php echo $BAPP->nomor ?> <br/>
			<?php } else if($cpengadaan->metode_penawaran == 'Dua Sampul') { ?>
				Nomor Berita Acara Pembukaan Sampul Satu : <?php echo $BAPP->nomor ?> <br/>
			<?php } else if($cpengadaan->metode_penawaran == 'Dua Tahap') { ?>
				Nomor Berita Acara Pembukaan Tahap Satu : <?php echo $BAPP->nomor ?> <br/>
			<?php } ?>
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
	
		<div class="row">
				<?php 
					if($cpengadaan->metode_penawaran == 'Satu Sampul'){
						$this->widget('application.extensions.appendo.JAppendo',array(
						'id' => 'idpenyedia',        
						'model' => $PP,
						// 'model2' => $PP2,
						'viewName' => 'formperusahaan_evaluasi_1_sampul',
						'labelAdd' => 'Tambah Penyedia',
						'labelDel' => 'Hapus Penyedia',						
						)); 
					}else if($cpengadaan->metode_penawaran == 'Dua Sampul'){
						$this->widget('application.extensions.appendo.JAppendo',array(
						'id' => 'idpenyedia',        
						'model' => $PP,
						// 'model2' => $PP2,
						'viewName' => 'formperusahaan_evaluasi_sampul_1',
						'labelAdd' => 'Tambah Penyedia',
						'labelDel' => 'Hapus Penyedia',						
						)); 
					}
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
			<h4><b> Daftar Dokumen </b></h4>
			<ul class="generatedoc">
				<?php if($cpengadaan->metode_penawaran == 'Satu Sampul') { ?>
					<li><?php echo CHtml::link('Berita Acara Evaluasi Penawaran', array('docx/download','id'=>$BAEP->id_dokumen)); ?></li>
					<li><?php echo CHtml::link('Daftar Hadir Evaluasi Penawaran', array('docx/download','id'=>$DH->id_dokumen)); ?></li>
					<li><?php echo CHtml::link('Lampiran Berita Acara Evaluasi Penawaran', array('xlsx/download','id'=>$BAEP->id_dokumen)); ?></li>
				<?php } else if($cpengadaan->metode_penawaran == 'Dua Sampul') { ?>
					<li><?php echo CHtml::link('Berita Acara Evaluasi Penawaran Sampul Satu', array('docx/download','id'=>$BAEP->id_dokumen)); ?></li>
					<li><?php echo CHtml::link('Daftar Hadir Evaluasi Penawaran Sampul Satu', array('docx/download','id'=>$DH->id_dokumen)); ?></li>
					<li><?php echo CHtml::link('Lampiran Berita Acara Evaluasi Penawaran Sampul Satu', array('xlsx/download','id'=>$BAEP->id_dokumen)); ?></li>
				<?php } else if($cpengadaan->metode_penawaran == 'Dua Tahap') { ?>
					<li><?php echo CHtml::link('Berita Acara Evaluasi Penawaran Tahap Satu', array('docx/download','id'=>$BAEP->id_dokumen)); ?></li>
					<li><?php echo CHtml::link('Daftar Hadir Evaluasi Penawaran Tahap Satu', array('docx/download','id'=>$DH->id_dokumen)); ?></li>
					<li><?php echo CHtml::link('Lampiran Berita Acara Evaluasi Penawaran Tahap Satu', array('xlsx/download','id'=>$BAEP->id_dokumen)); ?></li>
				<?php } ?>
			</ul>
		</div>
	<?php } ?>
	
	
	<?php	} ?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'class'=>'sidafbutton'));  ?></div>