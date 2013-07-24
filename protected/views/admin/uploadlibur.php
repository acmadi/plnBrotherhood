<?php
	$this->pageTitle=Yii::app()->name . ' | Tambah Hari Libur';
?>

<div><?php echo CHtml::button('Unduh daftar hari libur sekarang', array('submit'=>array('admin/downloadlibur'), 'class'=>'sidafbutton'));  ?></div>
<br />

<div style="margin:10px;">
	<?php echo CHtml::beginForm('', 'post', array('enctype'=>'multipart/form-data')); ?>
		<?php echo CHtml::label('Berkas daftar hari libur', 'libur'); ?>
		<?php echo CHtml::fileField('libur', 'libur'); ?>
		<?php echo CHtml::submitButton('Unggah',array("class"=>'sidafbutton')); ?>
	<?php echo CHtml::endForm(); ?>
</div>
<br /><br />

<div><?php echo CHtml::button('Kembali', array('submit'=>array('admin/libur'), 'class'=>'sidafbutton'));  ?></div>