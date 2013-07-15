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
			$('#13').attr('class','onprogress');
		</script>
	</div>

	<div id="maincontent">		
	
		<?php 
			if (Yii::app()->user->getState('role') == 'anggota') {
		?>
		
        	<?php if($Pengadaan->metode_penawaran == 'Satu Sampul') { ?>    
                <div id="menuform">
                   <?php
						if(Panitia::model()->findByPk(Pengadaan::model()->findByPk($id)->id_panitia)->jenis_panitia=="Panitia") {
							$this->widget('zii.widgets.CMenu', array(
								'items'=>array(
										array('label'=>'Undangan', 'url'=>array((Dokumen::model()->find('id_pengadaan = ' .$id. ' and nama_dokumen = "Surat Undangan Evaluasi Penawaran"') == null)?'/generator/suratundanganevaluasipenawaran':'/generator/editsuratundanganevaluasipenawaran','id'=>$id)),
										array('label'=>'Evaluasi Penawaran', 'url'=>array($Pengadaan->status=='24'?('/generator/evaluasipenawaran'):('/generator/editevaluasipenawaran'),'id'=>$id)),
										array('label'=>'Berita Acara', 'url'=>array($Pengadaan->status=='25'?'/generator/beritaacaraevaluasipenawaran':($Pengadaan->status=='24'?'':'/generator/editberitaacaraevaluasipenawaran'),'id'=>$id)),
								),
							));
						} else {
							$this->widget('zii.widgets.CMenu', array(
								'items'=>array(
										array('label'=>'Evaluasi Penawaran', 'url'=>array($Pengadaan->status=='24'?('/generator/evaluasipenawaran'):('/generator/editevaluasipenawaran'),'id'=>$id)),
										array('label'=>'Berita Acara', 'url'=>array($Pengadaan->status=='25'?'/generator/beritaacaraevaluasipenawaran':($Pengadaan->status=='24'?'':'/generator/editberitaacaraevaluasipenawaran'),'id'=>$id)),
								),
							));
						}
                    ?>
                </div>
          	<?php } else if($Pengadaan->metode_penawaran == 'Dua Sampul') { ?>
          		<div id="menuform">
                   <?php
						if(Panitia::model()->findByPk(Pengadaan::model()->findByPk($id)->id_panitia)->jenis_panitia=="Panitia") {
							$this->widget('zii.widgets.CMenu', array(
								'items'=>array(
										array('label'=>'Undangan', 'url'=>array((Dokumen::model()->find('id_pengadaan = ' .$id. ' and nama_dokumen = "Surat Undangan Evaluasi Penawaran Sampul Satu"') == null)?'/generator/suratundanganevaluasipenawaran':'/generator/editsuratundanganevaluasipenawaran','id'=>$id)),
										array('label'=>'Evaluasi Penawaran', 'url'=>array($Pengadaan->status=='24'?('/generator/evaluasipenawaran'):('/generator/editevaluasipenawaran'),'id'=>$id)),
										array('label'=>'Berita Acara', 'url'=>array($Pengadaan->status=='25'?'/generator/beritaacaraevaluasipenawaran':($Pengadaan->status=='24'?'':'/generator/editberitaacaraevaluasipenawaran'),'id'=>$id)),
								),
							));
						} else {
							$this->widget('zii.widgets.CMenu', array(
								'items'=>array(
										array('label'=>'Evaluasi Penawaran', 'url'=>array($Pengadaan->status=='24'?('/generator/evaluasipenawaran'):('/generator/editevaluasipenawaran'),'id'=>$id)),
										array('label'=>'Berita Acara', 'url'=>array($Pengadaan->status=='25'?'/generator/beritaacaraevaluasipenawaran':($Pengadaan->status=='24'?'':'/generator/editberitaacaraevaluasipenawaran'),'id'=>$id)),
								),
							));
						}
                    ?>
                </div>
          	<?php } else if($Pengadaan->metode_penawaran == 'Dua Tahap') { ?>
          		<div id="menuform">
                    <?php
						if(Panitia::model()->findByPk(Pengadaan::model()->findByPk($id)->id_panitia)->jenis_panitia=="Panitia") {
							$this->widget('zii.widgets.CMenu', array(
								'items'=>array(
										array('label'=>'Undangan', 'url'=>array((Dokumen::model()->find('id_pengadaan = ' .$id. ' and nama_dokumen = "Surat Undangan Evaluasi Penawaran Tahap Satu"') == null)?'/generator/suratundanganevaluasipenawaran':'/generator/editsuratundanganevaluasipenawaran','id'=>$id)),
										array('label'=>'Evaluasi Penawaran', 'url'=>array($Pengadaan->status=='24'?('/generator/evaluasipenawaran'):('/generator/editevaluasipenawaran'),'id'=>$id)),
										array('label'=>'Berita Acara', 'url'=>array($Pengadaan->status=='25'?'/generator/beritaacaraevaluasipenawaran':($Pengadaan->status=='24'?'':'/generator/editberitaacaraevaluasipenawaran'),'id'=>$id)),
								),
							));
						} else {
							$this->widget('zii.widgets.CMenu', array(
								'items'=>array(
										array('label'=>'Evaluasi Penawaran', 'url'=>array($Pengadaan->status=='24'?('/generator/evaluasipenawaran'):('/generator/editevaluasipenawaran'),'id'=>$id)),
										array('label'=>'Berita Acara', 'url'=>array($Pengadaan->status=='25'?'/generator/beritaacaraevaluasipenawaran':($Pengadaan->status=='24'?'':'/generator/editberitaacaraevaluasipenawaran'),'id'=>$id)),
								),
							));
						}
                    ?>
                </div>
          	<?php } ?>
                <br/>
                
		<div class="form">

		<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'berita-acara-evaluasi-penawaran-form',
		'enableAjaxValidation'=>false,
		)); ?>
		
		<?php if($Pengadaan->metode_penawaran == 'Satu Sampul') { ?>
			<h4><b> Berita Acara Evaluasi Penawaran</b></h4>
		<?php } else if($Pengadaan->metode_penawaran == 'Dua Sampul') { ?>
			<h4><b> Berita Acara Evaluasi Penawaran Sampul Satu</b></h4>
		<?php } else if($Pengadaan->metode_penawaran == 'Dua Tahap') { ?>
			<h4><b> Berita Acara Evaluasi Penawaran Tahap Satu</b></h4>
		<?php } ?>
		<div class="row">
			<?php echo $form->labelEx($BAEP,'nomor'); ?>
			<?php if($Pengadaan->metode_penawaran == 'Satu Sampul') { ?>
				Nomor Berita Acara Pembukaan : <?php echo $BAPP->nomor ?> <br/>
			<?php } else if($Pengadaan->metode_penawaran == 'Dua Sampul') { ?>
				Nomor Berita Acara Pembukaan Sampul Satu : <?php echo $BAPP->nomor ?> <br/>
			<?php } else if($Pengadaan->metode_penawaran == 'Dua Tahap') { ?>
				Nomor Berita Acara Pembukaan Tahap Satu : <?php echo $BAPP->nomor ?> <br/>
			<?php } ?>
			<?php echo $form->textField($BAEP,'nomor',array('size'=>56,'maxlength'=>50)); ?>
			<?php echo $form->error($BAEP,'nomor'); ?>
		</div>
	
		<div class="row">
				<?php 
					if($Pengadaan->metode_penawaran == 'Satu Sampul'){
						$this->widget('application.extensions.appendo.JAppendo',array(
						'id' => 'idpenyedia',        
						'model' => $PP,
						// 'model2' => $PP2,
						'viewName' => 'formperusahaan_evaluasi_1_sampul',
						'labelAdd' => '',
						'labelDel' => '',						
						)); 
					}else if($Pengadaan->metode_penawaran == 'Dua Sampul' || $Pengadaan->metode_penawaran == 'Dua Tahap'){
						$this->widget('application.extensions.appendo.JAppendo',array(
						'id' => 'idpenyedia',        
						'model' => $PP,
						// 'model2' => $PP2,
						'viewName' => 'formperusahaan_evaluasi_sampul_1',
						'labelAdd' => '',
						'labelDel' => '',						
						)); 
					}
				?>
		</div>
		
		<div class="row buttons">
			<?php echo CHtml::submitButton($Pengadaan->status=='25'? 'Simpan' : 'Perbarui',array('class'=>'sidafbutton')); ?>
		</div>
		
		<?php $this->endWidget(); ?>

		</div><!-- form -->
		
	<?php if($Pengadaan->status!='25') { ?>
		<br/>
		<div style="border-top:1px solid lightblue">
		<br/>
			<h4><b> Daftar Dokumen </b></h4>
			<ul class="generatedoc">
				<?php if($Pengadaan->metode_penawaran == 'Satu Sampul') { ?>
					<li><?php echo CHtml::link('Berita Acara Evaluasi Penawaran', array('docx/download','id'=>$BAEP->id_dokumen)); ?></li>
				<?php } else if($Pengadaan->metode_penawaran == 'Dua Sampul') { ?>
					<li><?php echo CHtml::link('Berita Acara Evaluasi Penawaran Sampul Satu', array('docx/download','id'=>$BAEP->id_dokumen)); ?></li>
				<?php } else if($Pengadaan->metode_penawaran == 'Dua Tahap') { ?>
					<li><?php echo CHtml::link('Berita Acara Evaluasi Penawaran Tahap Satu', array('docx/download','id'=>$BAEP->id_dokumen)); ?></li>
				<?php } ?>
			</ul>
		</div>
	<?php } ?>
	
	
	<?php	} ?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'class'=>'sidafbutton'));  ?></div>