<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' | Masuk';
// $this->breadcrumbs=array(
// 	'Login',
// );
?>

<script type="text/javascript">
	$('.container').attr('style', 'background:rgba(0,0,0,0); border:0px;');
</script>

<div style="width:100%;"><div style=" position:absolute; top:190px; left:50%; margin-left:-295px;"><img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/pics/kepanjangan.png" style="width:600px;"></div></div>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

<div style="width:100%; height:400px;">
	<div style="border:2px solid lightgrey; background-color:#DDEEEE; width:340px; padding:10px 20px 10px 20px; position:absolute; top:270px; left:50%; margin-left:-172px;">
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

		<div class="row buttons" style="float:right;">
			<?php echo CHtml::submitButton('Masuk', array('style'=>'background:none; margin-right:5px;')); ?>
		</div>
	</div>
</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
