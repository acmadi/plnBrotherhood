<?php
	$this->pageTitle=Yii::app()->name . ' | Tambah Pengguna Divisi';
?>

<div id="pagecontent">
	<div id="sidebar">
	<?php $this->beginWidget('zii.widgets.CPortlet'); ?>
	<ul>
		<li><?php echo CHtml::link('Tambah divisi', array('admin/tambahdivisi')) ?></li>
		<li><?php echo CHtml::link('Hapus divisi', array('admin/hapusdivisi')) ?></li>
	</ul>
	<?php $this->endWidget(); ?>
	</div>
	<div id="maincontent">
		<h2><?php echo $divisi->nama_divisi; ?></h2>
		<div class="form">
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'divisi-form',
				'enableAjaxValidation'=>false,
			)); ?>

			<div class="row">
				<?php echo $form->labelEx($user,'Nama pengguna'); ?> 
				<?php echo $form->textField($user,'username',array('size'=>56,'maxlength'=>20)); ?>
				<?php echo $form->error($user,'username'); ?>
			</div>

			<div class="row buttons">
				<?php echo CHtml::submitButton('Simpan',array('class'=>'sidafbutton')); ?>
			</div>

			<?php $this->endWidget(); ?>
		</div>
	</div>
	<div><?php echo CHtml::button('Kembali', array('submit'=>array('admin/detaildivisi', 'id'=>$id), 'class'=>'sidafbutton'));  ?></div>
</div>