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
		
        	<?php if($cpengadaan->metode_pengadaan == 'Penunjukan Langsung') { ?>
        		<div id="menuform">
                    <?php
                        $this->widget('zii.widgets.CMenu', array(
                            'items'=>array(
                                    array('label'=>'ND Usulan', 'url'=>array(Pengadaan::model()->findByPk($id)->status=='16'?'/site/notadinasusulanpemenang':'/site/editnotadinasusulanpemenang','id'=>$id)),
                                    array('label'=>'ND Penetapan', 'url'=>array(Pengadaan::model()->findByPk($id)->status=='17'?'/site/notadinaspenetapanpemenang':(Pengadaan::model()->findByPk($id)->status=='16'?'':'/site/editnotadinaspenetapanpemenang'),'id'=>$id)),
                                    array('label'=>'Surat Penunjukan Pemenang', 'url'=>array(Pengadaan::model()->findByPk($id)->status=='20'?'/site/suratpenunjukanpemenang':(Pengadaan::model()->findByPk($id)->status=='17'?'':(Pengadaan::model()->findByPk($id)->status=='16'?'':'/site/editsuratpenunjukanpemenang')),'id'=>$id)),
                            ),
                        ));
                    ?>
                </div>
        	<?php } else if($cpengadaan->metode_pengadaan == 'Pemilihan Langsung') { ?>
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
			<?php } else if($cpengadaan->metode_pengadaan == 'Pelelangan') { ?>
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
			<?php } ?>
                
                <br/>
                
		<div class="form">

		<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'nota-dinas-usulan-pemenang-form',
		'enableAjaxValidation'=>false,
		)); ?>

		<?php echo $form->errorSummary($NDUP); ?>
		
		<h4><b> Nota Dinas Usulan Pemenang </b></h4>
		<div class="row">
			<?php echo $form->labelEx($NDUP,'nomor'); ?>
			<?php echo $form->textField($NDUP,'nomor',array('size'=>56,'maxlength'=>50)); ?>
			<?php echo $form->error($NDUP,'nomor'); ?>
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
				<?php echo $form->labelEx($NDUP,'nama Penyedia'); ?>
				<?php echo $form->textField($NDUP,'nama_penyedia',array('size'=>56,'maxlength'=>100)); ?>
				<?php echo $form->error($NDUP,'nama_penyedia'); ?>
			</div>
		
			<div class="row">
				<?php echo $form->labelEx($NDUP,'alamat Penyedia'); ?>
				<?php echo $form->textArea($NDUP,'alamat',array('cols'=>43,'rows'=>3, 'maxlength'=>100)); ?>
				<?php echo $form->error($NDUP,'alamat'); ?>
			</div>
		
			<div class="row">
				<?php echo $form->labelEx($NDUP,'NPWP Penyedia'); ?>
				<?php echo $form->textField($NDUP,'NPWP',array('size'=>56,'maxlength'=>20)); ?>
				<?php echo $form->error($NDUP,'NPWP'); ?>
			</div>
		
			<div class="row">
				<?php echo $form->labelEx($NDUP,'biaya Penyedia'); ?>
				<?php echo $form->textField($NDUP,'biaya',array('size'=>56,'maxlength'=>50)); ?>
				<?php echo $form->error($NDUP,'biaya'); ?>
			</div>
			
		<?php } else { ?>
		
			<div class="row">
				<?php echo $form->labelEx($NDUP,'nama Penyedia 1'); ?>
				<?php echo $form->textField($NDUP,'nama_penyedia',array('size'=>56,'maxlength'=>100)); ?>
				<?php echo $form->error($NDUP,'nama_penyedia'); ?>
			</div>
		
			<div class="row">
				<?php echo $form->labelEx($NDUP,'alamat Penyedia 1'); ?>
				<?php echo $form->textArea($NDUP,'alamat',array('cols'=>43,'rows'=>3, 'maxlength'=>100)); ?>
				<?php echo $form->error($NDUP,'alamat'); ?>
			</div>
		
			<div class="row">
				<?php echo $form->labelEx($NDUP,'NPWP Penyedia 1'); ?>
				<?php echo $form->textField($NDUP,'NPWP',array('size'=>56,'maxlength'=>20)); ?>
				<?php echo $form->error($NDUP,'NPWP'); ?>
			</div>
		
			<div class="row">
				<?php echo $form->labelEx($NDUP,'biaya Penyedia 1'); ?>
				<?php echo $form->textField($NDUP,'biaya',array('size'=>56,'maxlength'=>50)); ?>
				<?php echo $form->error($NDUP,'biaya'); ?>
			</div>
			
			<div class="row">
				<?php echo $form->labelEx($NDUP,'nama Penyedia 2'); ?>
				<?php echo $form->textField($NDUP,'nama_penyedia_2',array('size'=>56,'maxlength'=>100)); ?>
				<?php echo $form->error($NDUP,'nama_penyedia_2'); ?>
			</div>
		
			<div class="row">
				<?php echo $form->labelEx($NDUP,'alamat Penyedia 2'); ?>
				<?php echo $form->textArea($NDUP,'alamat_2',array('cols'=>43,'rows'=>3, 'maxlength'=>100)); ?>
				<?php echo $form->error($NDUP,'alamat_2'); ?>
			</div>
		
			<div class="row">
				<?php echo $form->labelEx($NDUP,'NPWP Penyedia 2'); ?>
				<?php echo $form->textField($NDUP,'NPWP_2',array('size'=>56,'maxlength'=>20)); ?>
				<?php echo $form->error($NDUP,'NPWP_2'); ?>
			</div>
		
			<div class="row">
				<?php echo $form->labelEx($NDUP,'biaya Penyedia 2'); ?>
				<?php echo $form->textField($NDUP,'biaya_2',array('size'=>56,'maxlength'=>50)); ?>
				<?php echo $form->error($NDUP,'biaya_2'); ?>
			</div>
		
		<?php } ?>

		<div class="row">
			<?php echo $form->labelEx($NDUP,'tanggal Pelaksanaan'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$NDUP,
					'attribute'=>'waktu_pelaksanaan',
					'value'=>$NDUP->waktu_pelaksanaan,
					'htmlOptions'=>array('size'=>56),
					'options'=>array(
					'dateFormat'=>'yy-mm-dd',
					),
			));?>
			<?php echo $form->error($NDUP,'tanggal_undangan'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($NDUP,'tempat Penyerahan'); ?>
			<?php echo $form->textArea($NDUP,'tempat_penyerahan',array('cols'=>43,'rows'=>3, 'maxlength'=>20)); ?>
			<?php echo $form->error($NDUP,'tempat_penyerahan'); ?>
		</div>

		<div class="row buttons">
			<?php echo CHtml::submitButton($NDUP->isNewRecord ? 'Simpan' : 'Perbarui',array('class'=>'sidafbutton')); ?>
		</div>
		
	<?php $this->endWidget(); ?>

	</div><!-- form -->
	
	<?php if($NDUP->isNewRecord) { ?>
		
	<?php } else { ?>
		<br/>
		<div style="border-top:1px solid lightblue">
		<br/>
			<h4><b> Buat Dokumen </b></h4>
			<ul class="generatedoc">
				<li><?php echo CHtml::link('Nota Dinas Usulan Pemenang', array('docx/download','id'=>$NDUP->id_dokumen)); ?></li>
			</ul>
		</div>
	<?php } ?>
	
<?php	} ?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'style'=>'background:url(css/bg.gif)'));  ?></div>
