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
		
		<h4><b> Berita Acara Klarifikasi dan Negosiasi </b></h4>
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
			<?php echo CHtml::submitButton($Pengadaan->status=='31'? 'Simpan' : 'Perbarui',array('class'=>'sidafbutton')); ?>
		</div>
		
		<?php $this->endWidget(); ?>

		</div><!-- form -->
		
	<?php if($Pengadaan->status!='31') { ?>
		<br/>
		<div style="border-top:1px solid lightblue">
		<br/>
			<h4><b> Daftar Dokumen </b></h4>
			<ul class="generatedoc">
				<li><?php 
						if(Pengadaan::model()->findByPk($id)->metode_pengadaan == 'Pelelangan'){
							echo CHtml::link('Berita Acara Klarifikasi', array('docx/download','id'=>$BANK->id_dokumen)); 
						}else{
							echo CHtml::link('Berita Acara Negosiasi dan Klarifikasi', array('docx/download','id'=>$BANK->id_dokumen)); 
						}
						
					?>
				</li>
			</ul>
		</div>
	<?php } ?>
	
	
	<?php	} ?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'class'=>'sidafbutton'));  ?></div>