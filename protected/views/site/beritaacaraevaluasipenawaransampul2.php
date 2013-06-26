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
                
                <div id="menuform">
                    <?php
                        $this->widget('zii.widgets.CMenu', array(
                            'items'=>array(
                                    array('label'=>'BA Evaluasi Penawaran Sampul 2', 'url'=>array(Pengadaan::model()->findByPk($id)->status=='13'?'/site/beritaacaraevaluasipenawaransampul2':'/site/editberitaacaraevaluasipenawaransampul2','id'=>$id)),                                    
                            ),
                        ));
                    ?>
                </div>
                <br/>
                
		<div class="form">

		<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'berita-acara-evaluasi-penawaran-form',
		'enableAjaxValidation'=>false,
		)); ?>

		<?php echo $form->errorSummary($BAEP); ?>
		
		<h4><b> Berita Acara Evaluasi Penawaran Sampul Dua</b></h4>
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
				<li><?php echo CHtml::link('Berita Acara Evaluasi Penawaran Sampul Dua', array('docx/download','id'=>$BAEP->id_dokumen)); ?></li>
				<li><?php echo CHtml::link('Daftar Hadir Evaluasi Penawaran Sampul Dua', array('docx/download','id'=>$DH->id_dokumen)); ?></li>
			</ul>
		</div>
	<?php } ?>
	
	
	<?php	} ?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'class'=>'sidafbutton'));  ?></div>