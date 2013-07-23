<?php
	$this->pageTitle=Yii::app()->name . ' | Tambah Divisi';
?>

<div class="kelompokform">
	<div class="form">
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'divisi-form',
			'enableAjaxValidation'=>false,
		)); ?>

		<div class="row">
			<?php echo $form->labelEx($divisi,'Nama divisi'); ?> 
			<?php echo $form->textField($divisi,'username',array('size'=>56,'maxlength'=>50)); ?>
			<?php echo $form->error($divisi,'username'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($divisi,'Kepanjangan'); ?> 
			<?php echo $form->textField($divisi,'nama_divisi',array('size'=>56,'maxlength'=>256)); ?>
			<?php echo $form->error($divisi,'nama_divisi'); ?>
		</div>

		<div class="row buttons">
			<?php echo CHtml::submitButton('Simpan',array('class'=>'sidafbutton')); ?>
		</div>

		<?php $this->endWidget(); ?>
	</div>
</div>

<div><?php echo CHtml::button('Kembali', array('submit'=>array('admin/divisi'), 'class'=>'sidafbutton'));  ?></div>