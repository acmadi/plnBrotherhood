<?php
/* @var $this KdivmumController */
/* @var $model Kdivmum */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'kdivmum-form',
	'enableAjaxValidation'=>false,
)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->dropDownList($model,'username',CHtml::listData(User::model()->findAll(), 'username', 'nama'),array('empty'=>'-----Pilih Nama-----'));?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NIP'); ?>
		<?php echo $form->textField($model,'NIP',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'NIP'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Simpan' : 'Perbarui',array('class'=>'sidafbutton')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->