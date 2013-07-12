<?php
	$this->pageTitle=Yii::app()->name . ' | Tambah Divisi';
?>

<div id="pagecontent">
	<div id="sidebar">
	<?php $this->beginWidget('zii.widgets.CPortlet'); ?>
	<ul>
		<li><?php echo CHtml::link('Tambah divisi', array('admin/tambahdivisi')) ?></li>
		<li class="onprogress"><?php echo CHtml::link('Hapus divisi', array('admin/hapusdivisi')) ?></li>
	</ul>
	<?php $this->endWidget(); ?>
	</div>
	<div id="maincontent">
		<div class="forms">
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'divisi-form',
				'enableAjaxValidation'=>false,
			)); ?>

			<div class="row">
				<?php echo $form->checkBoxList($divisi, 'username', CHtml::listData($divisi->findAll(), 'username', 'nama_divisi')); ?>
				<?php echo $form->error($divisi,'username'); ?>
			</div>

			<div class="row buttons">
				<?php echo CHtml::submitButton('Simpan',array('class'=>'sidafbutton')); ?>
			</div>

			<?php $this->endWidget(); ?>
		</div>
	</div>
	<div><?php echo CHtml::button('Kembali', array('submit'=>array('admin/divisi'), 'class'=>'sidafbutton'));  ?></div>
</div>