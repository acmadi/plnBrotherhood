<?php
	$this->pageTitle=Yii::app()->name . ' | Tambah Jenis Jabatan';
?>
<div class="kelompokform">
	<div class="form">
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'divisi-form',
			'enableAjaxValidation'=>false,
		)); ?>

		<div class="row">
			<?php echo $form->labelEx($jabatan,'Jabatan'); ?> 
			<?php echo $form->textField($jabatan,'jabatan',array('size'=>56,'maxlength'=>256)); ?>
			<?php echo $form->error($jabatan,'jabatan'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($jabatan,'Kepanjangan jabatan'); ?> 
			<?php echo $form->textField($jabatan,'kepanjangan',array('size'=>56,'maxlength'=>256)); ?>
			<?php echo $form->error($jabatan,'jabatan'); ?>
		</div>

		<div class="row buttons">
			<?php echo CHtml::submitButton('Simpan',array('class'=>'sidafbutton')); ?>
		</div>

		<?php $this->endWidget(); ?>
	</div>
</div>

<div><?php echo CHtml::button('Kembali', array('submit'=>array('admin/kdiv'), 'class'=>'sidafbutton'));  ?></div>