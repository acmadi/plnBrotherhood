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
                                    array('label'=>'SU Pembukaan Penawaran Sampul Dua', 'url'=>array(Pengadaan::model()->findByPk($id)->status=='11'?'/site/suratundanganpembukaanpenawaran2':'/site/editsuratundanganpembukaanpenawaransampul2','id'=>$id)),
                                    array('label'=>'BA Pembukaan Penawaran Sampul Dua', 'url'=>array(Pengadaan::model()->findByPk($id)->status=='12'?'/site/beritaacarapembukaanpenawaran2':(Pengadaan::model()->findByPk($id)->status=='11'?'':'/site/editberitaacarapembukaanpenawaransampul2'),'id'=>$id)),
                            ),
                        ));
                    ?>
                </div>
         	<?php } else if($cpengadaan->metode_penawaran == 'Dua Tahap') { ?>
         		<div id="menuform">
                    <?php
                        $this->widget('zii.widgets.CMenu', array(
                            'items'=>array(
                                    array('label'=>'SU Pembukaan Penawaran Tahap Dua', 'url'=>array(Pengadaan::model()->findByPk($id)->status=='11'?'/site/suratundanganpembukaanpenawaran2':'/site/editsuratundanganpembukaanpenawaransampul2','id'=>$id)),
                                    array('label'=>'BA Pembukaan Penawaran Tahap Dua', 'url'=>array(Pengadaan::model()->findByPk($id)->status=='12'?'/site/beritaacarapembukaanpenawaran2':(Pengadaan::model()->findByPk($id)->status=='11'?'':'/site/editberitaacarapembukaanpenawaransampul2'),'id'=>$id)),
                            ),
                        ));
                    ?>
                </div>
         	<?php } ?>
                <br/>
                
		<div class="form">

		<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'surat-undangan-pembukaan-penawaran-form',
		'enableAjaxValidation'=>false,
		)); ?>

		<?php echo $form->errorSummary($SUPP); ?>
		
		<?php if($cpengadaan->metode_penawaran == 'Dua Sampul') { ?>
			<h4><b> Surat Undangan Pembukaan Penawaran Sampul Dua </b></h4>
		<?php } else if($cpengadaan->metode_penawaran == 'Dua Tahap') { ?>
			<h4><b> Surat Undangan Pembukaan Penawaran Tahap Dua </b></h4>
		<?php } ?>
		<div class="row">
			<?php echo $form->labelEx($SUPP,'nomor'); ?>
			<?php echo $form->textField($SUPP,'nomor',array('size'=>56,'maxlength'=>50)); ?>
			<?php echo $form->error($SUPP,'nomor'); ?>
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
			<?php echo $form->labelEx($SUPP,'perihal'); ?>
			<?php echo $form->textArea($SUPP,'perihal',array('cols'=>43,'rows'=>3, 'maxlength'=>100)); ?>
			<?php echo $form->error($SUPP,'perihal'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($SUPP,'tanggal Pembukaan Penawaran'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$SUPP,
					'attribute'=>'tanggal_undangan',
					'value'=>$SUPP->tanggal_undangan,
					'htmlOptions'=>array('size'=>56),
					'options'=>array(
					'dateFormat'=>'yy-mm-dd',
					),
			));?>
			<?php echo $form->error($SUPP,'tanggal_undangan'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($SUPP,'waktu Pembukaan Penawaran (Format HH:MM)'); ?>
			<?php echo $form->textField($SUPP,'waktu',array('size'=>56,'maxlength'=>10)); ?>
			<?php echo $form->error($SUPP,'waktu'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($SUPP,'tempat Pembukaan Penawaran'); ?>
			<?php echo $form->textArea($SUPP,'tempat',array('cols'=>43,'rows'=>3, 'maxlength'=>100)); ?>
			<?php echo $form->error($SUPP,'tempat'); ?>
		</div>

		<div class="row buttons">
			<?php echo CHtml::submitButton($SUPP->isNewRecord ? 'Simpan' : 'Perbarui',array('class'=>'sidafbutton')); ?>
		</div>
		
	<?php $this->endWidget(); ?>

	</div><!-- form -->
	
	<?php if($SUPP->isNewRecord) { ?>
		
	<?php } else { ?>
		<br/>
		<div style="border-top:1px solid lightblue">
		<br/>
			<h4><b> Buat Dokumen </b></h4>
			<ul class="generatedoc">
				<?php if($cpengadaan->metode_penawaran == 'Dua Sampul') { ?>
					<li><?php echo CHtml::link('Surat Undangan Pembukaan Penawaran Sampul Dua', array('docx/download','id'=>$SUPP->id_dokumen)); ?></li>
				<?php } else if($cpengadaan->metode_penawaran == 'Dua Tahap') { ?>
					<li><?php echo CHtml::link('Surat Undangan Pembukaan Penawaran Tahap Dua', array('docx/download','id'=>$SUPP->id_dokumen)); ?></li>
				<?php } ?>
			</ul>
		</div>
	<?php } ?>
	
<?php	} ?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'style'=>'background:url(css/bg.gif)'));  ?></div>
