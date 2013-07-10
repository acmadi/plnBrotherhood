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
            
                <div id="menuform">
                    <?php
                        $this->widget('zii.widgets.CMenu', array(
                            'items'=>array(
                                    array('label'=>'ND Usulan', 'url'=>array('/site/editnotadinasusulanpemenang','id'=>$id)),
                                    array('label'=>'ND Penetapan', 'url'=>array('site/editnotadinaspenetapanpemenang','id'=>$id)),
                                    array('label'=>'ND Pemberitahuan', 'url'=>array($NDBP->isNewRecord?'/site/notadinaspemberitahuanpemenang':'/site/editnotadinaspemberitahuanpemenang','id'=>$id)),
                                    array('label'=>'Surat Penunjukan Pemenang', 'url'=>array(Pengadaan::model()->findByPk($id)->status=='27'?'/site/suratpenunjukanpemenang':(Pengadaan::model()->findByPk($id)->status=='25'?'':'/site/editsuratpenunjukanpemenang'),'id'=>$id)),
                            ),
                        ));
                    ?>
                </div>
                
                <br/>
                
		<div class="form">

		<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'nota-dinas-pemberitahuan-pemenang-form',
		'enableAjaxValidation'=>false,
		)); ?>
		
		<h4><b> Nota Dinas Pemberitahuan Pemenang </b></h4>
		<div class="row">
			<?php echo $form->labelEx($NDBP,'nomor'); ?>
			Nomor Nota Dinas Penetapan Pemenang : <?php echo $NDPP->nomor ?> <br/>
			<?php echo $form->textField($NDBP,'nomor',array('size'=>56,'maxlength'=>50)); ?>
			<?php echo $form->error($NDBP,'nomor'); ?>
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
			<?php echo $form->labelEx($NDBP,'keterangan'); ?>
			<?php echo $form->textArea($NDBP,'keterangan',array('cols'=>43,'rows'=>3, 'maxlength'=>255)); ?>
			<?php echo $form->error($NDBP,'keterangan'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($NDBP,'batas waktu sanggahan (dalam satuan hari)'); ?>
			<?php echo $form->textField($NDBP,'batas_sanggahan',array('size'=>56,'maxlength'=>100)); ?>
			<?php echo $form->error($NDBP,'batas_sanggahan'); ?>
		</div>

		<div class="row buttons">
			<?php echo CHtml::submitButton($NDBP->isNewRecord ? 'Simpan' : 'Perbarui',array('class'=>'sidafbutton')); ?>
		</div>
		
	<?php $this->endWidget(); ?>

	</div><!-- form -->
	
	<?php if(!$NDBP->isNewRecord) {?>
		<br/>
		<div style="border-top:1px solid lightblue">
		<br/>
			<h4><b> Daftar Dokumen </b></h4>
			<ul class="generatedoc">
				<li><?php echo CHtml::link('Nota Dinas Pemberitahuan Pemenang', array('docx/download','id'=>$NDBP->id_dokumen)); ?></li>
			</ul>
		</div>
	<?php } ?>
	
<?php	} ?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'style'=>'background:url(css/bg.gif)'));  ?></div>
