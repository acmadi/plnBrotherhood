<?php
	$this->pageTitle=Yii::app()->name . ' | Manajemen Akun Administrator';
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'berita-acara-pembukaan-penawaran-form',
	'enableAjaxValidation'=>false,
)); ?>

<div class="row">
	<?php echo $form->labelEx($admin,'username'); ?> 
	<?php echo $form->textField($admin,'username',array('size'=>56,'maxlength'=>20)); ?>
	<?php echo $form->error($admin,'username'); ?>
</div>

<?php $this->endWidget(); ?>