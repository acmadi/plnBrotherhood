<?php
/* @var $this DokumenController */
/* @var $data Dokumen */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_dokumen')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_dokumen), array('view', 'id'=>$data->id_dokumen)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_dokumen')); ?>:</b>
	<?php echo CHtml::encode($data->nama_dokumen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tempat')); ?>:</b>
	<?php echo CHtml::encode($data->tempat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pengadaan')); ?>:</b>
	<?php echo CHtml::encode($data->id_pengadaan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_upload')); ?>:</b>
	<?php echo CHtml::encode($data->status_upload); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('waktu_upload')); ?>:</b>
	<?php echo CHtml::encode($data->waktu_upload); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('pengunggah')); ?>:</b>
	<?php echo CHtml::encode($data->pengunggah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_penyimpanan')); ?>:</b>
	<?php echo CHtml::encode($data->link_penyimpanan); ?>
	<br />

	*/ ?>

</div>