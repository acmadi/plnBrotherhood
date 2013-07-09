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
                                    array('label'=>'ND Undangan Negosiasi Klarifikasi', 'url'=>array($SUNK->isNewRecord?'/site/suratundangannegosiasiklarifikasi':'/site/editsuratundangannegosiasiklarifikasi','id'=>$id)),
                                    array('label'=>'BA Negosiasi Klarifikasi', 'url'=>array((Dokumen::model()->find('id_pengadaan = ' .$id. ' and nama_dokumen = "Berita Acara Negosiasi dan Klarifikasi"') == null)?'/site/beritaacaranegosiasiklarifikasi':'/site/editberitaacaranegosiasiklarifikasi','id'=>$id)),
                            ),
                        ));
                    ?>
                </div>
                <br/>
                
		<div class="form">

		<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'surat-undangan-negosiasi-klarifikasi-form',
		'enableAjaxValidation'=>false,
		)); ?>
		
		<h4><b> Nota Dinas Undangan Negosiasi dan Klarifikasi </b></h4>
		<div class="row">
			<?php echo $form->labelEx($SUNK,'nomor'); ?>
			<?php if(Pengadaan::model()->findByPk($id)->metode_penawaran=="Satu Sampul"){ ?>
			Nomor Berita Acara Evaluasi Penawaran : <?php echo $Eval->nomor ?> <br/>
			<?php } else if(Pengadaan::model()->findByPk($id)->metode_penawaran=="Dua Sampul"){ ?>
			Nomor Berita Acara Evaluasi Penawaran Sampul Dua : <?php echo $Eval->nomor ?> <br/>
			<?php } else if(Pengadaan::model()->findByPk($id)->metode_penawaran=="Dua Tahap"){ ?>
			Nomor Berita Acara Evaluasi Penawaran Tahap Dua : <?php echo $Eval->nomor ?> <br/>
			<?php } ?>
			<?php echo $form->textField($SUNK,'nomor',array('size'=>56,'maxlength'=>50)); ?>
			<?php echo $form->error($SUNK,'nomor'); ?>
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
			<?php echo $form->labelEx($SUNK,'perihal'); ?>
			<?php echo $form->textArea($SUNK,'perihal',array('cols'=>40,'rows'=>3, 'maxlength'=>100)); ?>
			<?php echo $form->error($SUNK,'perihal'); ?>
		</div>
		
		<div class="row buttons">
			<?php echo CHtml::submitButton($SUNK->isNewRecord ? 'Simpan' : 'Perbarui',array('class'=>'sidafbutton')); ?>
		</div>
		
	<?php $this->endWidget(); ?>

	</div><!-- form -->
	
	<?php if($SUNK->isNewRecord) { ?>
		
	<?php } else { ?>
		<br/>
		<div style="border-top:1px solid lightblue">
		<br/>
			<h4><b> Daftar Dokumen </b></h4>
			<ul class="generatedoc">
				<li><?php echo CHtml::link('Surat Undangan Negosiasi dan Klarifikasi', array('docx/download','id'=>$SUNK->id_dokumen)); ?></li>
			</ul>
		</div>
	<?php } ?>
	
<?php	} ?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'style'=>'background:url(css/bg.gif)'));  ?></div>
