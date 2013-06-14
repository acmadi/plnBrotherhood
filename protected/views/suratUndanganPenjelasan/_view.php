<?php
/* @var $this SuratUndanganPenjelasanController */
/* @var $data SuratUndanganPenjelasan */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_dokumen')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_dokumen), array('view', 'id'=>$data->id_dokumen)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nomor')); ?>:</b>
	<?php echo CHtml::encode($data->nomor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_panitia')); ?>:</b>
	<?php echo CHtml::encode($data->id_panitia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sifat')); ?>:</b>
	<?php echo CHtml::encode($data->sifat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('perihal')); ?>:</b>
	<?php echo CHtml::encode($data->perihal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hari_tanggal')); ?>:</b>
	<?php echo CHtml::encode($data->hari_tanggal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('waktu')); ?>:</b>
	<?php echo CHtml::encode($data->waktu); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('tempat')); ?>:</b>
	<?php echo CHtml::encode($data->tempat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_pengadaan')); ?>:</b>
	<?php echo CHtml::encode($data->nama_pengadaan); ?>
	<br />

	*/ ?>

</div>