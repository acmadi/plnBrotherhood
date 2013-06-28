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
		'id'=>'surat-penunjukan-pemenang-form',
		'enableAjaxValidation'=>false,
		)); ?>

		<?php echo $form->errorSummary($SPPM); ?>
		
		<h4><b> Surat Penunjukan Pemenang </b></h4>
		<div class="row">
			<?php echo $form->labelEx($SPPM,'nomor'); ?>
			<?php echo $form->textField($SPPM,'nomor',array('size'=>56,'maxlength'=>50)); ?>
			<?php echo $form->error($SPPM,'nomor'); ?>
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
			<?php echo $form->labelEx($SPPM,'nama Penyedia'); ?>
			<?php echo $form->textField($SPPM,'nama_penyedia',array('size'=>56,'maxlength'=>50)); ?>
			<?php echo $form->error($SPPM,'nama_penyedia'); ?>
		</div>
		
		<?php if($cpengadaan->metode_pengadaan == 'Pelelangan') { ?>
		
			<div class="row">
				<?php echo $form->labelEx($SPPM,'nomor SKI'); ?>
				<?php echo $form->textField($SPPM,'nomor_ski',array('size'=>56,'maxlength'=>50)); ?>
				<?php echo $form->error($SPPM,'nomor_ski'); ?>
			</div>
		
			<div class="row">
			<?php echo $form->labelEx($SPPM,'tanggal SKI'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$SPPM,
					'attribute'=>'tanggal_ski',
					'value'=>$SPPM->tanggal_ski,
					'htmlOptions'=>array('size'=>56),
					'options'=>array(
					'dateFormat'=>'yy-mm-dd',
					),
			));?>
			<?php echo $form->error($SPPM,'tanggal'); ?>
		</div>
		
			<div class="row">
				<?php echo $form->labelEx($SPPM,'No.SKI'); ?>
				<?php echo $form->textField($SPPM,'no_ski',array('size'=>56,'maxlength'=>50)); ?>
				<?php echo $form->error($SPPM,'no_ski'); ?>
			</div>
			
		<?php } ?>
		
		<div class="row">
			<?php echo $form->labelEx($SPPM,'jumlah harga keseluruhan'); ?>
			<?php echo $form->textField($SPPM,'harga',array('size'=>56,'maxlength'=>255)); ?>
			<?php echo $form->error($SPPM,'harga'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($SPPM,'batas waktu penyerahan (dalam satuan hari)'); ?>
			<?php echo $form->textField($SPPM,'lama_penyerahan',array('size'=>56,'maxlength'=>100)); ?>
			<?php echo $form->error($SPPM,'lama_penyerahan'); ?>
		</div>

		<div class="row buttons">
			<?php echo CHtml::submitButton($SPPM->isNewRecord ? 'Simpan' : 'Perbarui',array('class'=>'sidafbutton')); ?>
		</div>
		
	<?php $this->endWidget(); ?>

	</div><!-- form -->
	
	<?php if($SPPM->isNewRecord) { ?>
		
	<?php } else { ?>
		<br/>
		<div style="border-top:1px solid lightblue">
		<br/>
			<h4><b> Buat Dokumen </b></h4>
			<ul class="generatedoc">
				<li><?php echo CHtml::link('Surat Pengumuman Pelelangan', array('docx/download','id'=>$SPPM->id_dokumen)); ?></li>
			</ul>
		</div>
	<?php } ?>
	
<?php	} ?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'style'=>'background:url(css/bg.gif)'));  ?></div>
