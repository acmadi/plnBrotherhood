<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' | Masuk';
// $this->breadcrumbs=array(
// 	'Login',
// );
?>

<h1>Masuk</h1>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

<br />

	<div class="row">
		<?php echo $form->labelEx($model,'nama pengguna'); ?>
		<?php echo $form->textField($model,'nama_pengguna',array('size'=>50)); ?>
		<?php echo $form->error($model,'nama_pengguna'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kata sandi'); ?>
		<?php echo $form->passwordField($model,'kata_sandi',array('size'=>50)); ?>
		<?php echo $form->error($model,'kata_sandi'); ?>
		<!-- <p class="hint">
			Hint: You may login with <kbd>demo</kbd>/<kbd>demo</kbd> or <kbd>admin</kbd>/<kbd>admin</kbd>.
		</p> -->
	</div>

	<!-- <div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div> -->

	<div class="row buttons">
		<?php echo CHtml::submitButton('Masuk', array('class'=>'sidafbutton')); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
