<?php
	$this->pageTitle=Yii::app()->name . ' | Tambah Pejabat Berwenang';
?>

<div id="pagecontent">
	<div id="sidebar">
	<?php $this->beginWidget('zii.widgets.CPortlet'); ?>
	<ul>
		<li class="onprogress"><?php echo CHtml::link('Tambah pejabat berwenang', array('admin/tambahkdiv')) ?></li>
		<li><?php echo CHtml::link('Hapus pejabat berwenang', array('admin/hapuskdiv')) ?></li>
	</ul>
	<?php $this->endWidget(); ?>
	</div>
	<div id="maincontent">
		<div class="form">
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'divisi-form',
				'enableAjaxValidation'=>false,
			)); ?>

			<div class="row">
				<?php echo $form->labelEx($kdiv,'Nama pengguna'); ?> 
				<?php echo $form->textField($kdiv,'username',array('size'=>56,'maxlength'=>20)); ?>
				<?php echo $form->error($kdiv,'username'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($kdiv,'Nama'); ?> 
				<?php echo $form->textField($kdiv,'nama',array('size'=>56,'maxlength'=>20)); ?>
				<?php echo $form->error($kdiv,'nama'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($kdiv,'E-mail'); ?> 
				<?php echo $form->textField($kdiv,'email',array('size'=>56,'maxlength'=>20)); ?>
				<?php echo $form->error($kdiv,'email'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($kdiv,'Jabatan'); ?> 
				<?php echo $form->textField($kdiv,'jabatan',array('size'=>56,'maxlength'=>20)); ?>
				<?php echo $form->error($kdiv,'jabatan'); ?>
			</div>

			<div class="row buttons">
				<?php echo CHtml::submitButton('Simpan',array('class'=>'sidafbutton')); ?>
			</div>

			<?php $this->endWidget(); ?>
		</div>
	</div>
	<div><?php echo CHtml::button('Kembali', array('submit'=>array('admin/kdiv'), 'class'=>'sidafbutton'));  ?></div>
</div>