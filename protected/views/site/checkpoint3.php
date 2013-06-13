<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' | Generator';
?>

<div id="pagecontent">
	<div id="sidebar">
		<?php if(!Yii::app()->user->isGuest) $this->widget('MenuPortlet'); ?>
	</div>

	<div id="maincontent">
		<div class="form">

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'rks-form',
			'enableAjaxValidation'=>false,
		)); ?>


			<?php echo $form->errorSummary($Rks); ?>
	
			<div class="row">
				<?php echo $form->labelEx($Rks,'nomor'); ?>
				<?php echo $form->textField($Rks,'nomor',array('size'=>20,'maxlength'=>20)); ?>
				<?php echo $form->error($Rks,'nomor'); ?>
			</div>

			<div class="row buttons">
				<?php echo CHtml::submitButton($Rks->isNewRecord ? 'Simpan' : 'Save'); ?>
			</div>

			<?php $this->endWidget(); ?>

		</div><!-- form -->
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'style'=>'background:url(css/bg.gif)'));  ?></div>
