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
                                    array('label'=>'ND Pemberitahuan', 'url'=>array(Pengadaan::model()->findByPk($id)->status=='18'?'/site/notadinaspemberitahuanpemenang':(Pengadaan::model()->findByPk($id)->status=='17'?'':(Pengadaan::model()->findByPk($id)->status=='16'?'':'/site/editnotadinaspemberitahuanpemenang')),'id'=>$id)),
                                    array('label'=>'Surat Penunjukan Pemenang', 'url'=>array(Pengadaan::model()->findByPk($id)->status=='20'?'/site/suratpenunjukanpemenang':(Pengadaan::model()->findByPk($id)->status=='18'?'':(Pengadaan::model()->findByPk($id)->status=='17'?'':(Pengadaan::model()->findByPk($id)->status=='16'?'':'/site/editsuratpenunjukanpemenang'))),'id'=>$id)),
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

		<?php echo $form->errorSummary($NDBP); ?>
		
		<h4><b> Nota Dinas Pemberitahuan Pemenang </b></h4>
		<div class="row">
			<?php echo $form->labelEx($NDBP,'nomor'); ?>
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
					'dateFormat'=>'yy-mm-dd',
					),
			));?>
			<?php echo $form->error($Dokumen0,'tanggal'); ?>
		</div>
		
		<?php if($cpengadaan->metode_pengadaan == 'Penunjukan Langsung') { ?>
		
			<div class="row">
				<?php echo $form->labelEx($NDBP,'nama Penyedia'); ?>
				<?php echo $form->textField($NDBP,'nama_penyedia',array('size'=>56,'maxlength'=>100)); ?>
				<?php echo $form->error($NDBP,'nama_penyedia'); ?>
			</div>
		
			<div class="row">
				<?php echo $form->labelEx($NDBP,'alamat Penyedia'); ?>
				<?php echo $form->textArea($NDBP,'alamat',array('cols'=>43,'rows'=>3, 'maxlength'=>100)); ?>
				<?php echo $form->error($NDBP,'alamat'); ?>
			</div>
		
			<div class="row">
				<?php echo $form->labelEx($NDBP,'NPWP Penyedia'); ?>
				<?php echo $form->textField($NDBP,'NPWP',array('size'=>56,'maxlength'=>20)); ?>
				<?php echo $form->error($NDBP,'NPWP'); ?>
			</div>
		
			<div class="row">
				<?php echo $form->labelEx($NDBP,'biaya Penyedia'); ?>
				<?php echo $form->textField($NDBP,'biaya',array('size'=>56,'maxlength'=>50)); ?>
				<?php echo $form->error($NDBP,'biaya'); ?>
			</div>
			
		<?php } else { ?>
		
			<div class="row">
				<?php echo $form->labelEx($NDBP,'nama Penyedia 1'); ?>
				<?php echo $form->textField($NDBP,'nama_penyedia',array('size'=>56,'maxlength'=>100)); ?>
				<?php echo $form->error($NDBP,'nama_penyedia'); ?>
			</div>
		
			<div class="row">
				<?php echo $form->labelEx($NDBP,'alamat Penyedia 1'); ?>
				<?php echo $form->textArea($NDBP,'alamat',array('cols'=>43,'rows'=>3, 'maxlength'=>100)); ?>
				<?php echo $form->error($NDBP,'alamat'); ?>
			</div>
		
			<div class="row">
				<?php echo $form->labelEx($NDBP,'NPWP Penyedia 1'); ?>
				<?php echo $form->textField($NDBP,'NPWP',array('size'=>56,'maxlength'=>20)); ?>
				<?php echo $form->error($NDBP,'NPWP'); ?>
			</div>
		
			<div class="row">
				<?php echo $form->labelEx($NDBP,'biaya Penyedia 1'); ?>
				<?php echo $form->textField($NDBP,'biaya',array('size'=>56,'maxlength'=>50)); ?>
				<?php echo $form->error($NDBP,'biaya'); ?>
			</div>
			
			<div class="row">
				<?php echo $form->labelEx($NDBP,'nama Penyedia 2'); ?>
				<?php echo $form->textField($NDBP,'nama_penyedia_2',array('size'=>56,'maxlength'=>100)); ?>
				<?php echo $form->error($NDBP,'nama_penyedia_2'); ?>
			</div>
		
			<div class="row">
				<?php echo $form->labelEx($NDBP,'alamat Penyedia 2'); ?>
				<?php echo $form->textArea($NDBP,'alamat_2',array('cols'=>43,'rows'=>3, 'maxlength'=>100)); ?>
				<?php echo $form->error($NDBP,'alamat_2'); ?>
			</div>
		
			<div class="row">
				<?php echo $form->labelEx($NDBP,'NPWP Penyedia 2'); ?>
				<?php echo $form->textField($NDBP,'NPWP_2',array('size'=>56,'maxlength'=>20)); ?>
				<?php echo $form->error($NDBP,'NPWP_2'); ?>
			</div>
		
			<div class="row">
				<?php echo $form->labelEx($NDBP,'biaya Penyedia 2'); ?>
				<?php echo $form->textField($NDBP,'biaya_2',array('size'=>56,'maxlength'=>50)); ?>
				<?php echo $form->error($NDBP,'biaya_2'); ?>
			</div>
		
		<?php } ?>

		<div class="row">
			<?php echo $form->labelEx($NDBP,'tanggal Pelaksanaan'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$NDBP,
					'attribute'=>'waktu_pelaksanaan',
					'value'=>$NDBP->waktu_pelaksanaan,
					'htmlOptions'=>array('size'=>56),
					'options'=>array(
					'dateFormat'=>'yy-mm-dd',
					),
			));?>
			<?php echo $form->error($NDBP,'tanggal_undangan'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($NDBP,'tempat Penyerahan'); ?>
			<?php echo $form->textArea($NDBP,'tempat_penyerahan',array('cols'=>43,'rows'=>3, 'maxlength'=>20)); ?>
			<?php echo $form->error($NDBP,'tempat_penyerahan'); ?>
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
			<h4><b> Buat Dokumen </b></h4>
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
