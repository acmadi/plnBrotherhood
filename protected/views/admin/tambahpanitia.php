<?php
	$this->pageTitle=Yii::app()->name . ' | Tambah Panitia Pengadaan';
?>

<div id="pagecontent">
	<div id="sidebar">
	<?php $this->beginWidget('zii.widgets.CPortlet'); ?>
	<ul>
		<li><?php echo CHtml::link('Tambah pejabat pengadaan', array('admin/tambahpejabat')) ?></li>
		<li><?php echo CHtml::link('Hapus pejabat pengadaan', array('admin/hapuspejabat')) ?></li>
		<li class="onprogress"><?php echo CHtml::link('Tambah panitia pengadaan', array('admin/tambahpanitia')) ?></li>
		<li><?php echo CHtml::link('Hapus panitia pengadaan', array('admin/hapuspanitia')) ?></li>
	</ul>
	<?php $this->endWidget(); ?>
	</div>
	<div id="maincontent">
		<div class="form">
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'divisi-form',
				'enableAjaxValidation'=>false,
			)); ?>

			<div class="row">
				<?php echo $form->labelEx($panitia,'Nama panitia'); ?> 
				<?php echo $form->textField($panitia,'nama_panitia',array('size'=>56,'maxlength'=>256)); ?>
				<?php echo $form->error($panitia,'nama_panitia'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($panitia,'Nomor SK panitia'); ?> 
				<?php echo $form->textField($panitia,'SK_panitia',array('size'=>56,'maxlength'=>256)); ?>
				<?php echo $form->error($panitia,'SK_panitia'); ?>
			</div>
				
			<div class="row">
				<?php echo $form->labelEx($panitia,'Tanggal SK panitia'); ?>
				<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$panitia,
					'attribute'=>'tanggal_sk',
					'value'=>$panitia->tanggal_sk,
					'htmlOptions'=>array('size'=>56),
					'options'=>array(
					'dateFormat'=>'dd-mm-yy',
					),
				));?>
				<?php echo $form->error($panitia,'tanggal_sk'); ?>
			</div>

			<div class="row buttons">
				<?php echo CHtml::submitButton('Simpan',array('class'=>'sidafbutton')); ?>
			</div>

			<?php $this->endWidget(); ?>
		</div>
	</div>
	<div><?php echo CHtml::button('Kembali', array('submit'=>array('admin/panitia'), 'class'=>'sidafbutton'));  ?></div>
</div>