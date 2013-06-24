<?php
/* @var $this AdminController */
/* @var $model Admin */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'admin-form',
	'enableAjaxValidation'=>false,
)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Nama'); ?>
		<?php echo $form->dropDownList($model,'username',CHtml::listData(User::model()->findAll(), 'username', 'nama'),array('empty'=>'-----Pilih Nama-----'));?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Simpan' : 'Perbarui',array('class'=>'sidafbutton')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->