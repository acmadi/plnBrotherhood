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
           	
           	<?php if($cpengadaan->metode_penawaran == 'Dua Sampul') { ?>
                <div id="menuform">
                    <?php
                        $this->widget('zii.widgets.CMenu', array(
                            'items'=>array(
                                    array('label'=>'BA Evaluasi Penawaran Sampul Dua', 'url'=>array(Pengadaan::model()->findByPk($id)->status=='13'?'/site/beritaacaraevaluasipenawaran2':'/site/editberitaacaraevaluasipenawaransampul2','id'=>$id)),                                    
                            ),
                        ));
                    ?>
                </div>
          	<?php } else if($cpengadaan->metode_penawaran == 'Dua Tahap') { ?>
          		<div id="menuform">
                    <?php
                        $this->widget('zii.widgets.CMenu', array(
                            'items'=>array(
                                    array('label'=>'BA Evaluasi Penawaran Tahap Dua', 'url'=>array(Pengadaan::model()->findByPk($id)->status=='13'?'/site/beritaacaraevaluasipenawaran2':'/site/editberitaacaraevaluasipenawaransampul2','id'=>$id)),                                    
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
		
		<?php if($cpengadaan->metode_penawaran == 'Dua Sampul') { ?>
			<h4><b> Berita Acara Evaluasi Penawaran Sampul Dua</b></h4>
		<?php } else if($cpengadaan->metode_penawaran == 'Dua Tahap') { ?>
			<h4><b> Berita Acara Evaluasi Penawaran Tahap Dua</b></h4>
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
		
		<div class="row">
			<?php echo $form->labelEx($BAEP,'tanggal Evaluasi Penawaran'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$BAEP,
					'attribute'=>'tanggal_berita_acara',
					'value'=>$BAEP->tanggal_berita_acara,
					'htmlOptions'=>array('size'=>56),
					'options'=>array(
					'dateFormat'=>'yy-mm-dd',
					),
			));?>
			<?php echo $form->error($BAEP,'tanggal_berita_acara'); ?>
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
				<?php if($cpengadaan->metode_penawaran == 'Dua Sampul') { ?>
					<li><?php echo CHtml::link('Berita Acara Evaluasi Penawaran Sampul Dua', array('docx/download','id'=>$BAEP->id_dokumen)); ?></li>
					<li><?php echo CHtml::link('Daftar Hadir Evaluasi Penawaran Sampul Dua', array('docx/download','id'=>$DH->id_dokumen)); ?></li>
				<?php } else if($cpengadaan->metode_penawaran == 'Dua Tahap') { ?>
					<li><?php echo CHtml::link('Berita Acara Evaluasi Penawaran Tahap Dua', array('docx/download','id'=>$BAEP->id_dokumen)); ?></li>
					<li><?php echo CHtml::link('Daftar Hadir Evaluasi Penawaran Tahap Dua', array('docx/download','id'=>$DH->id_dokumen)); ?></li>
				<?php } ?>
			</ul>
		</div>
	<?php } ?>
	
	
	<?php	} ?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'class'=>'sidafbutton'));  ?></div>