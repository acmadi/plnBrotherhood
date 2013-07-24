<?php
	$this->pageTitle=Yii::app()->name . ' | Tambah Hari Libur';
?>
<div class="kelompokform">
	<div class="form">
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'divisi-form',
			'enableAjaxValidation'=>false,
		)); ?>
			
		<div class="row">
			<?php echo $form->labelEx($libur,'Tanggal'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
				'model'=>$libur,
				'attribute'=>'tanggal',
				'value'=>$libur->tanggal,
				'htmlOptions'=>array('size'=>56),
				'options'=>array(
				'dateFormat'=>'dd-mm-yy',
				),
			));?>
			<?php echo $form->error($libur,'tanggal'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($libur,'Keterangan'); ?> 
			<?php echo $form->textField($libur,'keterangan',array('size'=>56,'maxlength'=>256)); ?>
			<?php echo $form->error($libur,'keterangan'); ?>
		</div>

		<div class="row buttons">
			<?php echo CHtml::submitButton('Simpan',array('class'=>'sidafbutton')); ?>
		</div>

		<?php $this->endWidget(); ?>
	</div>
</div>

<div><?php echo CHtml::button('Kembali', array('submit'=>array('admin/libur'), 'class'=>'sidafbutton'));  ?></div>