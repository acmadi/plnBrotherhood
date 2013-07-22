<?php
	$this->pageTitle=Yii::app()->name . ' | Tambah Divisi';
?>

<div id="pagecontent">
	<div id="sidebar">
	<?php $this->beginWidget('zii.widgets.CPortlet'); ?>
	<ul>
		<li class="onprogress"><?php echo CHtml::link('Tambah divisi', array('admin/tambahdivisi')) ?></li>
		<li><?php echo CHtml::link('Hapus divisi', array('admin/hapusdivisi')) ?></li>
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
				<?php echo $form->labelEx($divisi,'Nama divisi'); ?> 
				<?php echo $form->textField($divisi,'username',array('size'=>56,'maxlength'=>50)); ?>
				<?php echo $form->error($divisi,'username'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($divisi,'Kepanjangan'); ?> 
				<?php echo $form->textField($divisi,'nama_divisi',array('size'=>56,'maxlength'=>256)); ?>
				<?php echo $form->error($divisi,'nama_divisi'); ?>
			</div>

			<div class="row buttons">
				<?php echo CHtml::submitButton('Simpan',array('class'=>'sidafbutton')); ?>
			</div>

			<?php $this->endWidget(); ?>
		</div>
	</div>
	<div><?php echo CHtml::button('Kembali', array('submit'=>array('admin/divisi'), 'class'=>'sidafbutton'));  ?></div>
</div>