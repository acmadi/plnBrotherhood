<?php
	$this->pageTitle=Yii::app()->name . ' | Tambah Administrator';
?>

<div class="kelompokform">
	<div class="form">
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'divisi-form',
			'enableAjaxValidation'=>false,
		)); ?>

		<div class="row">
			<?php echo $form->labelEx($admin,'Nama pengguna'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
				'name'=>'Admin[username]',
				'value'=>$admin->username,
				'sourceUrl'=>array('admin/autocomplete'),
				'options'=>array(
					'minLength'=>'2',
				),
				'htmlOptions'=>array(
					'size'=>56,
					'maxlength'=>256,
				),
			));
			?>
			<?php echo $form->error($admin,'username'); ?>
		</div>

		<div class="row buttons">
			<?php echo CHtml::submitButton('Simpan',array('class'=>'sidafbutton')); ?>
		</div>

		<?php $this->endWidget(); ?>
	</div>
</div>
<br />

<div><?php echo CHtml::button('Kembali', array('submit'=>array('admin/dashboard'), 'class'=>'sidafbutton'));  ?></div>