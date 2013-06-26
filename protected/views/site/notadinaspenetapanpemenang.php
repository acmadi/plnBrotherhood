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
                                    array('label'=>'ND Usulan Pemenang', 'url'=>array('/site/editnotadinasusulanpemenang','id'=>$id)),
                                    array('label'=>'ND Penetapan Pemenang', 'url'=>array(($NDPP->isNewRecord)?('/site/notadinaspenetapanpemenang'):('/site/editnotadinaspenetapanpemenang'),'id'=>$id)),                                
                            ),
                        ));
                    ?>
                </div>
                
                <br/>
                
		<div class="form">

		<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'nota-dinas-usulan-pemenang-form',
		'enableAjaxValidation'=>false,
		)); ?>

		<?php echo $form->errorSummary($NDPP); ?>
		
		<h4><b> Surat Undangan Pembukaan Penawaran </b></h4>
		<div class="row">
			<?php echo $form->labelEx($NDPP,'nomor'); ?>
			<?php echo $form->textField($NDPP,'nomor',array('size'=>56,'maxlength'=>50)); ?>
			<?php echo $form->error($NDPP,'nomor'); ?>
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
			<?php echo $form->labelEx($NDPP,'nama Penyedia'); ?>
			<?php echo $form->textField($NDPP,'nama_penyedia',array('size'=>56,'maxlength'=>20)); ?>
			<?php echo $form->error($NDPP,'nama_penyedia'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($NDPP,'alamat Penyedia'); ?>
			<?php echo $form->textField($NDPP,'alamat',array('size'=>56,'maxlength'=>100)); ?>
			<?php echo $form->error($NDPP,'alamat'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($NDPP,'NPWP Penyedia'); ?>
			<?php echo $form->textField($NDPP,'NPWP',array('size'=>56,'maxlength'=>20)); ?>
			<?php echo $form->error($NDPP,'NPWP'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($NDPP,'biaya Penyedia'); ?>
			<?php echo $form->textField($NDPP,'biaya',array('size'=>56,'maxlength'=>50)); ?>
			<?php echo $form->error($NDPP,'biaya'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($NDPP,'tanggal Pelaksanaan'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$NDPP,
					'attribute'=>'waktu_pelaksanaan',
					'value'=>$NDPP->waktu_pelaksanaan,
					'htmlOptions'=>array('size'=>56),
					'options'=>array(
					'dateFormat'=>'yy-mm-dd',
					),
			));?>
			<?php echo $form->error($NDPP,'tanggal_undangan'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($NDPP,'tempat Penyerahan'); ?>
			<?php echo $form->textArea($NDPP,'tempat_penyerahan',array('cols'=>43,'rows'=>3, 'maxlength'=>20)); ?>
			<?php echo $form->error($NDPP,'tempat_penyerahan'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($NDPP,'sumber dana'); ?>
			<?php echo $form->textField($NDPP,'sumber_dana',array('size'=>56,'maxlength'=>20)); ?>
			<?php echo $form->error($NDPP,'sumber_dana'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($NDPP,'jangka waktu berlaku'); ?>
			<?php echo $form->textField($NDPP,'jangka_waktu_berlaku',array('size'=>56,'maxlength'=>20)); ?>
			<?php echo $form->error($NDPP,'jangka_waktu_berlaku'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($NDPP,'jangka waktu deadline'); ?>
			<?php echo $form->textField($NDPP,'jangka_waktu_deadline',array('size'=>56,'maxlength'=>20)); ?>
			<?php echo $form->error($NDPP,'jangka_waktu_deadline'); ?>
		</div>

		<div class="row buttons">
			<?php echo CHtml::submitButton($NDPP->isNewRecord ? 'Simpan' : 'Perbarui',array('class'=>'sidafbutton')); ?>
		</div>
		
	<?php $this->endWidget(); ?>

	</div><!-- form -->
	
	<?php if($NDPP->isNewRecord) { ?>
		
	<?php } else { ?>
		<br/>
		<div style="border-top:1px solid lightblue">
		<br/>
			<h4><b> Buat Dokumen </b></h4>
			<ul class="generatedoc">
				<li><?php echo CHtml::link('Nota Dinas Penetapan Pemenang', array('docx/download','id'=>$NDPP->id_dokumen)); ?></li>
			</ul>
		</div>
	<?php } ?>
	
<?php	} ?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'style'=>'background:url(css/bg.gif)'));  ?></div>
