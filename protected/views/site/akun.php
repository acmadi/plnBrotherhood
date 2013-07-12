<?php
	$this->pageTitle=Yii::app()->name . ' | Manajemen Akun';
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
		<?php echo $form->labelEx($divisi,'Nama pengguna'); ?> 
		<?php echo $form->textField($divisi,'username',array('size'=>56,'maxlength'=>20)); ?>
		<?php echo $form->error($divisi,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($divisi,'Nama divisi'); ?> 
		<?php echo $form->textField($divisi,'nama_divisi',array('size'=>56,'maxlength'=>20)); ?>
		<?php echo $form->error($divisi,'nama_divisi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($divisi,'Kata sandi'); ?> 
		<?php echo $form->passwordField($divisi,'oldpass',array('size'=>56,'maxlength'=>20)); ?>
		<?php echo $form->error($divisi,'oldpass'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($divisi,'Kata sandi baru'); ?> 
		<?php echo $form->passwordField($divisi,'newpass',array('size'=>56,'maxlength'=>20)); ?>
		<?php echo $form->error($divisi,'newpass'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($divisi,'Konfirmasi kata sandi baru'); ?> 
		<?php echo $form->passwordField($divisi,'confirmpass',array('size'=>56,'maxlength'=>20)); ?>
		<?php echo $form->error($divisi,'confirmpass'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Perbarui',array('class'=>'sidafbutton')); ?>
	</div>

	<?php $this->endWidget(); ?>
</div>
