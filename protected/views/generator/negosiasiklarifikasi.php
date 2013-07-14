<?php
/* @var $this SiteController */

$id = Yii::app()->getRequest()->getQuery('id');
$Pengadaan = Pengadaan::model()->find('id_pengadaan = "' . $id . '"');
$this->pageTitle=Yii::app()->name . ' | '.$Pengadaan->nama_pengadaan;
?>

<div id="pagecontent">
	<div id="sidebar">
		<?php if(!Yii::app()->user->isGuest) $this->widget('MenuPortlet'); ?>
		<script type="text/javascript">
			$('#16').attr('class','onprogress');
		</script>
	</div>

	<div id="maincontent">
	
		<?php 
			if (Yii::app()->user->getState('role') == 'anggota') {
		?>
                
                <div id="menuform">
                   <?php
						if(Panitia::model()->findByPk(Pengadaan::model()->findByPk($id)->id_panitia)->jenis_panitia=="Panitia") {
							$this->widget('zii.widgets.CMenu', array(
								'items'=>array(
										array('label'=>'Undangan', 'url'=>array((Dokumen::model()->find('id_pengadaan = ' .$id. ' and nama_dokumen = "Surat Undangan Negosiasi dan Klarifikasi"') == null)?'/generator/suratundangannegosiasiklarifikasi':'/generator/editsuratundangannegosiasiklarifikasi','id'=>$id)),
										array('label'=>'Klarifikasi dan Negosiasi', 'url'=>array($Pengadaan->status=='30'?('/generator/negosiasiklarifikasi'):('/generator/editnegosiasiklarifikasi'),'id'=>$id)),
										array('label'=>'Berita Acara', 'url'=>array($Pengadaan->status=='31'?'/generator/beritaacaranegosiasiklarifikasi':($Pengadaan->status=='30'?'':'/generator/editberitaacaranegosiasiklarifikasi'),'id'=>$id)),
								),
							));
						} else {
							$this->widget('zii.widgets.CMenu', array(
								'items'=>array(
										array('label'=>'Klarifikasi dan Negosiasi', 'url'=>array($Pengadaan->status=='30'?('/generator/negosiasiklarifikasi'):('/generator/editnegosiasiklarifikasi'),'id'=>$id)),
										array('label'=>'Berita Acara', 'url'=>array($Pengadaan->status=='31'?'/generator/beritaacaranegosiasiklarifikasi':($Pengadaan->status=='30'?'':'/generator/editberitaacaranegosiasiklarifikasi'),'id'=>$id)),
								),
							));
						}
                    ?>
                </div>
                <br/>
                
		<div class="form">

		<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'berita-acara-negosiasi-klarifikasi-form',
		'enableAjaxValidation'=>false,
		)); ?>
		
		<h4><b> Klarifikasi dan Negosiasi </b></h4>
		<div class="row">
			<?php echo $form->labelEx($Dokumen1,'tanggal'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$Dokumen1,
					'attribute'=>'tanggal',
					'value'=>$Dokumen1->tanggal,
					'htmlOptions'=>array('size'=>56),
					'options'=>array(
					'dateFormat'=>'yy-mm-dd',
					),
			));?>
			<?php echo $form->error($Dokumen1,'tanggal'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($BANK,'waktu (Format HH:MM)'); ?>
			<?php echo $form->textField($BANK,'waktu',array('size'=>56,'maxlength'=>10)); ?>
			<?php echo $form->error($BANK,'waktu'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($BANK,'tempat'); ?>
			<?php echo $form->textArea($BANK,'tempat',array('cols'=>43,'rows'=>3, 'maxlength'=>100)); ?>
			<?php echo $form->error($BANK,'tempat'); ?>
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
			<h4><b> Daftar Dokumen </b></h4>
			<ul class="generatedoc">
				<li><?php 
						if(Pengadaan::model()->findByPk($id)->metode_pengadaan == 'Pelelangan'){
							echo CHtml::link('Lampiran Berita Acara Klarifikasi', array('docx/download','id'=>$Dokumen2->id_dokumen)); 
						}else{
							echo CHtml::link('Lampiran Berita Acara Negosiasi dan Klarifikasi', array('docx/download','id'=>$Dokumen2->id_dokumen)); 
						}
					?>
				</li>
				<li><?php echo CHtml::link('Daftar Hadir Negosiasi dan Klarifikasi', array('docx/download','id'=>$DH->id_dokumen)); ?></li>
			</ul>
		</div>
	<?php } ?>
	
	
	<?php	} ?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'class'=>'sidafbutton'));  ?></div>