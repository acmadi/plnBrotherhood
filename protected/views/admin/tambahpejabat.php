<?php
	$this->pageTitle=Yii::app()->name . ' | Tambah Pejabat Pengadaan';
?>

<div id="pagecontent">
	<div id="sidebar">
	<?php $this->beginWidget('zii.widgets.CPortlet'); ?>
	<ul>
		<li class="onprogress"><?php echo CHtml::link('Tambah pejabat pengadaan', array('admin/tambahpejabat')) ?></li>
		<li><?php echo CHtml::link('Tambah panitia pengadaan', array('admin/tambahpanitia')) ?></li>
		<li><?php echo CHtml::link('Hapus pejabat pengadaan', array('admin/hapuspejabat')) ?></li>
		<li><?php echo CHtml::link('Hapus panitia pengadaan', array('admin/hapuspanitia')) ?></li>
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
				<?php echo $form->labelEx($pejabat,'Username'); ?> 
				<?php echo $form->textField($pejabat,'username',array('size'=>56,'maxlength'=>20)); ?>
				<?php echo $form->error($pejabat,'username'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($pejabat,'Nama'); ?> 
				<?php echo $form->textField($pejabat,'nama',array('size'=>56,'maxlength'=>20)); ?>
				<?php echo $form->error($pejabat,'nama'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($pejabat,'E-mail'); ?> 
				<?php echo $form->textField($pejabat,'email',array('size'=>56,'maxlength'=>20)); ?>
				<?php echo $form->error($pejabat,'email'); ?>
			</div>

			<div class="row buttons">
				<?php echo CHtml::submitButton('Simpan',array('class'=>'sidafbutton')); ?>
			</div>

			<?php $this->endWidget(); ?>
		</div>
	</div>
	<div><?php echo CHtml::button('Kembali', array('submit'=>array('admin/panitia'), 'class'=>'sidafbutton'));  ?></div>
</div>