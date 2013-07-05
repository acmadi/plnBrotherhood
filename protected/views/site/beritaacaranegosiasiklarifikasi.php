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
                                    array('label'=>'SU Negosiasi Klarifikasi', 'url'=>array((Dokumen::model()->find('id_pengadaan = ' .$id. ' and nama_dokumen = "Surat Undangan Negosiasi dan Klarifikasi"') == null)?'/site/suratundangannegosiasiklarifikasi':'/site/editsuratundangannegosiasiklarifikasi','id'=>$id)),
                                    array('label'=>'BA Negosiasi Klarifikasi', 'url'=>array(Pengadaan::model()->findByPk($id)->status=='15'?'/site/beritaacaranegosiasiklarifikasi':(Pengadaan::model()->findByPk($id)->status=='14'?'':'/site/editberitaacaranegosiasiklarifikasi'),'id'=>$id)),
                            ),
                        ));
                    ?>
                </div>
                <br/>
                
		<div class="form">

		<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'berita-acara-negosiasi-klarifikasi-form',
		'enableAjaxValidation'=>false,
		)); ?>

		<?php echo $form->errorSummary($BANK); ?>
		
		<h4><b> Berita Acara Negosiasi dan Klarifikasi </b></h4>
		<div class="row">
			<?php echo $form->labelEx($BANK,'nomor'); ?>
			<?php if (Dokumen::model()->find('id_pengadaan = ' .$id. ' and nama_dokumen = "Surat Undangan Negosiasi dan Klarifikasi"') == null) {?>
				<?php if(Pengadaan::model()->findByPk($id)->metode_penawaran=="Satu Sampul"){ ?>
				Nomor Berita Acara Evaluasi Penawaran : <?php echo $Eval->nomor ?> <br/>
				<?php } else if(Pengadaan::model()->findByPk($id)->metode_penawaran=="Dua Sampul"){ ?>
				Nomor Berita Acara Evaluasi Penawaran Sampul Dua : <?php echo $Eval->nomor ?> <br/>
				<?php } else if(Pengadaan::model()->findByPk($id)->metode_penawaran=="Dua Tahap"){ ?>
				Nomor Berita Acara Evaluasi Penawaran Tahap Dua : <?php echo $Eval->nomor ?> <br/>
				<?php } ?>
			<?php } else { ?>
				Nomor Surat Undangan Negosiasi dan Klarifikasi : <?php echo $SUNK->nomor ?> <br/>
			<?php } ?>
			<?php echo $form->textField($BANK,'nomor',array('size'=>56,'maxlength'=>50)); ?>
			<?php echo $form->error($BANK,'nomor'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($BANK,'hak_kewajiban_penyedia'); ?>
			<?php echo $form->textField($BANK,'hak_kewajiban_penyedia',array('size'=>56,'maxlength'=>50)); ?>
			<?php echo $form->error($BANK,'hak_kewajiban_penyedia'); ?>
		</div>
	
		<div class="row">
				<?php 
					$this->widget('application.extensions.appendo.JAppendo',array(
					'id' => 'idpenyedia',        
					'model' => $PP,
					// 'model2' => $PP2,
					'viewName' => 'formperusahaan_klarifikasi',
					'labelAdd' => 'Tambah Penyedia',
					'labelDel' => 'Hapus Penyedia',
					
					)); 
				?>
		</div>
		
		<div class="row buttons">
			<?php echo CHtml::submitButton($BANK->isNewRecord ? 'Simpan' : 'Perbarui',array('class'=>'sidafbutton')); ?>
		</div>
		
		<?php $this->endWidget(); ?>

		</div><!-- form -->
		
	<?php if($BANK->isNewRecord) { ?>
		
	<?php } else { ?>
		<br/>
		<div style="border-top:1px solid lightblue">
		<br/>
			<h4><b> Buat Dokumen </b></h4>
			<ul class="generatedoc">
				<li><?php echo CHtml::link('Berita Acara Negosiasi dan Klarifikasi', array('docx/download','id'=>$BANK->id_dokumen)); ?></li>
				<li><?php echo CHtml::link('Daftar Hadir Negosiasi dan Klarifikasi', array('docx/download','id'=>$DH->id_dokumen)); ?></li>
			</ul>
		</div>
	<?php } ?>
	
	
	<?php	} ?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'class'=>'sidafbutton'));  ?></div>