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
                                    array('label'=>'ND Usulan', 'url'=>array(Pengadaan::model()->findByPk($id)->status=='16'?'/site/notadinasusulanpemenang':'/site/editnotadinasusulanpemenang','id'=>$id)),
                                    array('label'=>'ND Penetapan', 'url'=>array(Pengadaan::model()->findByPk($id)->status=='17'?'/site/notadinaspenetapanpemenang':(Pengadaan::model()->findByPk($id)->status=='16'?'':'/site/editnotadinaspenetapanpemenang'),'id'=>$id)),
                                    array('label'=>'SP Pelelangan', 'url'=>array(Pengadaan::model()->findByPk($id)->status=='19'?'/site/suratpengumumanpelelangan':(Pengadaan::model()->findByPk($id)->status=='17'?'':(Pengadaan::model()->findByPk($id)->status=='16'?'':'/site/editsuratpengumumanpelelangan')),'id'=>$id)),
                                    array('label'=>'Surat Penunjukan Pemenang', 'url'=>array(Pengadaan::model()->findByPk($id)->status=='20'?'/site/suratpenunjukanpemenang':(Pengadaan::model()->findByPk($id)->status=='19'?'':(Pengadaan::model()->findByPk($id)->status=='17'?'':(Pengadaan::model()->findByPk($id)->status=='16'?'':'/site/editsuratpenunjukanpemenang'))),'id'=>$id)),
                            ),
                        ));
                    ?>
                </div>
                
                <br/>
                
		<div class="form">

		<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'surat-pengumuman-pelelangan-form',
		'enableAjaxValidation'=>false,
		)); ?>

		<?php echo $form->errorSummary($SPP); ?>
		
		<h4><b> Surat Pengumuman Pelelangan </b></h4>
		<div class="row">
			<?php echo $form->labelEx($SPP,'nomor'); ?>
			<?php echo $form->textField($SPP,'nomor',array('size'=>56,'maxlength'=>50)); ?>
			<?php echo $form->error($SPP,'nomor'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($Dokumen0,'tanggal surat'); ?>
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
		
		<div class="row">
			<?php echo $form->labelEx($SPP,'nama Penyedia'); ?>
			<?php echo $form->textField($SPP,'nama_penyedia',array('size'=>56,'maxlength'=>50)); ?>
			<?php echo $form->error($SPP,'nama_penyedia'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($SPP,'harga Penawaran'); ?>
			<?php echo $form->textField($SPP,'harga_penawaran',array('size'=>56,'maxlength'=>255)); ?>
			<?php echo $form->error($SPP,'harga_penawaran'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($SPP,'keterangan'); ?>
			<?php echo $form->textArea($SPP,'keterangan',array('cols'=>43,'rows'=>3, 'maxlength'=>255)); ?>
			<?php echo $form->error($SPP,'keterangan'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($SPP,'batas waktu sanggahan (dalam satuan hari)'); ?>
			<?php echo $form->textField($SPP,'batas_sanggahan',array('size'=>56,'maxlength'=>100)); ?>
			<?php echo $form->error($SPP,'batas_sanggahan'); ?>
		</div>

		<div class="row buttons">
			<?php echo CHtml::submitButton($SPP->isNewRecord ? 'Simpan' : 'Perbarui',array('class'=>'sidafbutton')); ?>
		</div>
		
	<?php $this->endWidget(); ?>

	</div><!-- form -->
	
	<?php if($SPP->isNewRecord) { ?>
		
	<?php } else { ?>
		<br/>
		<div style="border-top:1px solid lightblue">
		<br/>
			<h4><b> Buat Dokumen </b></h4>
			<ul class="generatedoc">
				<li><?php echo CHtml::link('Surat Pengumuman Pelelangan', array('docx/download','id'=>$SPP->id_dokumen)); ?></li>
			</ul>
		</div>
	<?php } ?>
	
<?php	} ?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'style'=>'background:url(css/bg.gif)'));  ?></div>
