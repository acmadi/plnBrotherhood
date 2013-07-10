<?php
	$this->pageTitle=Yii::app()->name . ' | Manajemen Akun Administrator';
?>

<?php if(Yii::app()->user->hasFlash('sukses')): ?>
	<div class="flash-success">
		<?php echo Yii::app()->user->getFlash('sukses'); ?>
		<script type="text/javascript">
			setTimeout(function() {
				$('.flash-success').animate({
					height: '0px',
					marginBottom: '0em',
					padding: '0em',
					opacity: '0.0'
				}, 1000, function() {
					$('.flash-success').hide();
				});
			}, 2000);
		</script>
	</div>
<?php endif; ?>

<div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'admin-form',
		'enableAjaxValidation'=>false,
	)); ?>

	<div class="row">
		<?php echo $form->labelEx($admin,'Nama pengguna'); ?> 
		<?php echo $form->textField($admin,'username',array('size'=>56,'maxlength'=>20)); ?>
		<?php echo $form->error($admin,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($admin,'Nama'); ?> 
		<?php echo $form->textField($admin,'nama',array('size'=>56,'maxlength'=>20)); ?>
		<?php echo $form->error($admin,'nama'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($admin,'Kata sandi'); ?> 
		<?php echo $form->passwordField($admin,'oldpass',array('size'=>56,'maxlength'=>20)); ?>
		<?php echo $form->error($admin,'oldpass'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($admin,'Kata sandi baru'); ?> 
		<?php echo $form->passwordField($admin,'newpass',array('size'=>56,'maxlength'=>20)); ?>
		<?php echo $form->error($admin,'newpass'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($admin,'Konfirmasi kata sandi baru'); ?> 
		<?php echo $form->passwordField($admin,'confirmpass',array('size'=>56,'maxlength'=>20)); ?>
		<?php echo $form->error($admin,'confirmpass'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Perbarui',array('class'=>'sidafbutton')); ?>
	</div>

	<?php $this->endWidget(); ?>
</div>
