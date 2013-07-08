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
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
		?>
            
        	<?php if($cpengadaan->metode_penawaran == 'Satu Sampul') { ?>    
                <div id="menuform">
                    <?php
						if(Panitia::model()->findByPk(Pengadaan::model()->findByPk($id)->id_panitia)->jenis_panitia=="Panitia") {
							$this->widget('zii.widgets.CMenu', array(
								'items'=>array(
										array('label'=>'ND Undangan Pembukaan Penawaran', 'url'=>array((Dokumen::model()->find('id_pengadaan = ' .$id. ' and nama_dokumen = "Surat Undangan Pembukaan Penawaran"') == null)?'/site/suratundanganpembukaanpenawaran':'/site/editsuratundanganpembukaanpenawaran','id'=>$id)),
										array('label'=>'BA Pembukaan Penawaran', 'url'=>array($BAPP->isNewRecord? '/site/beritaacarapembukaanpenawaran':'/site/editberitaacarapembukaanpenawaran','id'=>$id)),
								),
							));
						} else {
							$this->widget('zii.widgets.CMenu', array(
								'items'=>array(
										array('label'=>'BA Pembukaan Penawaran', 'url'=>array($BAPP->isNewRecord? '/site/beritaacarapembukaanpenawaran':'/site/editberitaacarapembukaanpenawaran','id'=>$id)),
								),
							));
						}
                    ?>
                </div>
          	<?php } else if($cpengadaan->metode_penawaran == 'Dua Sampul') { ?>
          		<div id="menuform">
                    <?php
						if(Panitia::model()->findByPk(Pengadaan::model()->findByPk($id)->id_panitia)->jenis_panitia=="Panitia") {
							$this->widget('zii.widgets.CMenu', array(
								'items'=>array(
										array('label'=>'ND Undangan Pembukaan Penawaran Sampul Satu', 'url'=>array((Dokumen::model()->find('id_pengadaan = ' .$id. ' and nama_dokumen = "Surat Undangan Pembukaan Penawaran Sampul Satu"') == null)?'/site/suratundanganpembukaanpenawaran':'/site/editsuratundanganpembukaanpenawaran','id'=>$id)),
										array('label'=>'BA Pembukaan Penawaran Sampul Satu', 'url'=>array($BAPP->isNewRecord ? '/site/beritaacarapembukaanpenawaran':'/site/editberitaacarapembukaanpenawaran','id'=>$id)),
								),
							));
						} else {
							$this->widget('zii.widgets.CMenu', array(
								'items'=>array(
										array('label'=>'BA Pembukaan Penawaran Sampul Satu', 'url'=>array($BAPP->isNewRecord ? '/site/beritaacarapembukaanpenawaran':'/site/editberitaacarapembukaanpenawaran','id'=>$id)),
								),
							));
						} 
                    ?>
                </div>
          	<?php } else if($cpengadaan->metode_penawaran == 'Dua Tahap') { ?>
          		<div id="menuform">
                    <?php
						if(Panitia::model()->findByPk(Pengadaan::model()->findByPk($id)->id_panitia)->jenis_panitia=="Panitia") {
							$this->widget('zii.widgets.CMenu', array(
								'items'=>array(
										array('label'=>'ND Undangan Pembukaan Penawaran Tahap Satu', 'url'=>array((Dokumen::model()->find('id_pengadaan = ' .$id. ' and nama_dokumen = "Surat Undangan Pembukaan Penawaran Tahap Satu"') == null)?'/site/suratundanganpembukaanpenawaran':'/site/editsuratundanganpembukaanpenawaran','id'=>$id)),
										array('label'=>'BA Pembukaan Penawaran Tahap Satu', 'url'=>array($BAPP->isNewRecord ? '/site/beritaacarapembukaanpenawaran':'/site/editberitaacarapembukaanpenawaran','id'=>$id)),
								),
							));
						} else {
							$this->widget('zii.widgets.CMenu', array(
								'items'=>array(
										array('label'=>'BA Pembukaan Penawaran Tahap Satu', 'url'=>array($BAPP->isNewRecord ? '/site/beritaacarapembukaanpenawaran':'/site/editberitaacarapembukaanpenawaran','id'=>$id)),
								),
							));
						}
                    ?>
                </div>
          	<?php } ?>
          	
                <br/>
                
		<div class="form">

		<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'berita-acara-pembukaan-penawaran-form',
		'enableAjaxValidation'=>false,
		)); ?>
		
		<?php if($cpengadaan->metode_penawaran == 'Satu Sampul') { ?>
			<h4><b> Berita Acara Pembukaan Penawaran </b></h4>
		<?php } else if($cpengadaan->metode_penawaran == 'Dua Sampul') { ?>
			<h4><b> Berita Acara Pembukaan Penawaran Sampul Satu </b></h4>
		<?php } else if($cpengadaan->metode_penawaran == 'Dua Tahap') { ?>
			<h4><b> Berita Acara Pembukaan Penawaran Tahap Satu </b></h4>
		<?php } ?>
		<div class="row">
			<?php echo $form->labelEx($BAPP,'nomor'); ?>
			<?php if ($Dok0==null) {?>
				Nomor Berita Acara Aanwijzing : <?php echo $BAP->nomor ?> <br/>
			<?php } else { ?>
				Nomor Nota Dinas Undangan Pembukaan Penawaran : <?php echo $SUPP->nomor ?> <br/>
			<?php } ?>
			<?php echo $form->textField($BAPP,'nomor',array('size'=>56,'maxlength'=>50)); ?>
			<?php echo $form->error($BAPP,'nomor'); ?>
		</div>
		
		<div class="row">
				<?php 
					$this->widget('application.extensions.appendo.JAppendo',array(
					'id' => 'idpenyedia',        
					'model' => $PP,
					// 'model2' => $PP2,
					'viewName' => 'formperusahaan_pembukaan_penawaran_1',
					'labelAdd' => 'Tambah Penyedia',
					'labelDel' => 'Hapus Penyedia',
					
					)); 
				?>
		</div>
		
		<div class="row buttons">
			<?php echo CHtml::submitButton($BAPP->isNewRecord ? 'Simpan' : 'Perbarui',array('class'=>'sidafbutton')); ?>
		</div>
		
		<?php $this->endWidget(); ?>

		</div><!-- form -->
		
	<?php if($BAPP->isNewRecord) { ?>
		
	<?php } else { ?>
		<br/>
		<div style="border-top:1px solid lightblue">
		<br/>
			<h4><b> Daftar Dokumen </b></h4>
			<ul class="generatedoc">
				<?php if($cpengadaan->metode_penawaran == 'Satu Sampul') { ?>
					<li><?php echo CHtml::link('Berita Acara Pembukaan Penawaran', array('docx/download','id'=>$BAPP->id_dokumen)); ?></li>
					<li><?php echo CHtml::link('Daftar Hadir Pembukaan Penawaran', array('docx/download','id'=>$DH->id_dokumen)); ?></li>
					<li><?php echo CHtml::link('Lampiran Berita Acara Pembukaan Penawaran', array('xlsx/download','id'=>$BAPP->id_dokumen)); ?></li>
				<?php } else if($cpengadaan->metode_penawaran == 'Dua Sampul') { ?>
					<li><?php echo CHtml::link('Berita Acara Pembukaan Penawaran Sampul Satu', array('docx/download','id'=>$BAPP->id_dokumen)); ?></li>
					<li><?php echo CHtml::link('Daftar Hadir Pembukaan Penawaran Sampul Satu', array('docx/download','id'=>$DH->id_dokumen)); ?></li>
					<li><?php echo CHtml::link('Lampiran Berita Acara Pembukaan Penawaran Sampul Satu', array('xlsx/download','id'=>$BAPP->id_dokumen)); ?></li>
				<?php } else if($cpengadaan->metode_penawaran == 'Dua Tahap') { ?>
					<li><?php echo CHtml::link('Berita Acara Pembukaan Penawaran Tahap Satu', array('docx/download','id'=>$BAPP->id_dokumen)); ?></li>
					<li><?php echo CHtml::link('Daftar Hadir Pembukaan Penawaran Tahap Satu', array('docx/download','id'=>$DH->id_dokumen)); ?></li>
					<li><?php echo CHtml::link('Lampiran Berita Acara Pembukaan Penawaran Tahap Satu', array('xlsx/download','id'=>$BAPP->id_dokumen)); ?></li>
				<?php } ?>
			</ul>
		</div>
	<?php } ?>
	
	
	<?php	} ?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'class'=>'sidafbutton'));  ?></div>