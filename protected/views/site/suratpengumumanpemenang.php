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
			if (Yii::app()->user->getState('role') == 'anggota') {
		?>
            
                <div id="menuform">
                    <?php
                        $this->widget('zii.widgets.CMenu', array(
                            'items'=>array(
                                    array('label'=>'ND Usulan', 'url'=>array('/site/editnotadinasusulanpemenang','id'=>$id)),
                                    array('label'=>'ND Penetapan', 'url'=>array('site/editnotadinaspenetapanpemenang','id'=>$id)),
                                    array('label'=>'SP Pemenang', 'url'=>array($SPP->isNewRecord?'/site/suratpengumumanpemenang':'/site/editsuratpengumumanpemenang','id'=>$id)),
                                    array('label'=>'Surat Penunjukan Pemenang', 'url'=>array(Pengadaan::model()->findByPk($id)->status=='27'?'/site/suratpenunjukanpemenang':(Pengadaan::model()->findByPk($id)->status=='26'?'':'/site/editsuratpenunjukanpemenang'),'id'=>$id)),
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
		
		<h4><b> Surat Pengumuman Pemenang </b></h4>
		<div class="row">
			<?php echo $form->labelEx($SPP,'nomor'); ?>
			Nomor Nota Dinas Penetapan Pemenang : <?php echo $NDPP->nomor ?> <br/>
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
					'dateFormat'=>'dd-mm-yy',
					),
			));?>
			<?php echo $form->error($Dokumen0,'tanggal'); ?>
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
			<h4><b> Daftar Dokumen </b></h4>
			<ul class="generatedoc">
				<li><?php echo CHtml::link('Surat Pengumuman Pemenang', array('docx/download','id'=>$SPP->id_dokumen)); ?></li>
			</ul>
		</div>
	<?php } ?>
	
<?php	} ?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'style'=>'background:url(css/bg.gif)'));  ?></div>
