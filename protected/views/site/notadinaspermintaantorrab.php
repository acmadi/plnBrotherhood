<?php
	$id = Yii::app()->getRequest()->getQuery('id');
	$user=Yii::app()->user->name;
	$pengadaan=Pengadaan::model()->findByPk($id);
	$this->pageTitle=Yii::app()->name . ' | Permintaan TOR/RAB '.$pengadaan->nama_pengadaan;
?>

<?php 
	if (Yii::app()->user->getState('role') == 'kdivmum') {
?>
	<div class="form">
		<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'nota-dinas-permintaan-tor-rab-form',
		'enableAjaxValidation'=>false,
		)); ?>
		<div class="kelompokform">
			<h4><b> Nota Dinas Permintaan TOR/RAB </b></h4>
			<div class="row">
				<?php echo $form->labelEx($NDPTR,'nomor'); ?>
				<?php echo $form->textField($NDPTR,'nomor',array('size'=>56,'maxlength'=>100)); ?>
				<?php echo $form->error($NDPTR,'nomor'); ?>
			</div>
			
			<div class="row">
				<?php echo $form->labelEx($Dokumen0,'tanggal_surat'); ?>
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
				<?php echo $form->labelEx($NDPTR,'permintaan'); ?>
				<?php echo $form->dropDownList($NDPTR,'permintaan',
				  array('Rencana Anggaran Biaya (RAB)'=>'RAB','Term Of Reference (TOR)'=>'TOR','Rencana Anggaran Biaya (RAB) dan Term Of Reference (TOR)'=>'RAB dan TOR'),
						array('empty'=>"-----Pilih Permintaan Nota Dinas------")); ?>
				<?php echo $form->error($NDPTR,'permintaan'); ?>
			</div>

			<div class="row buttons">
				<?php echo CHtml::submitButton($NDPTR->isNewRecord ? 'Simpan' : 'Perbarui',array('class'=>'sidafbutton')); ?>
			</div>
		</div>
		
		<?php $this->endWidget(); ?>

	</div><!-- form -->
	<?php if(!$NDPTR->isNewRecord) { ?>
		<br/>
		<div style="border-top:1px solid lightblue">
		<br/>
			<h4><b> Daftar Dokumen </b></h4>
			<ul class="generatedoc">
				<li><?php echo CHtml::link('Nota Dinas Permintaan TOR/RAB', array('docx/download','id'=>$NDPTR->id_dokumen)); ?></li>
			</ul>
		</div>
	<?php } ?>
	<br/>
	<?php echo CHtml::button('Kembali', array('submit'=>array('site/tambahpengadaan2','id'=>$id), "class"=>'sidafbutton'));  ?>
	
<?php	}
?>