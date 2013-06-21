<?php
/* @var $this PanitiaController */
/* @var $data Panitia */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_panitia')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_panitia), array('view', 'id'=>$data->id_panitia)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_panitia')); ?>:</b>
	<?php echo CHtml::encode($data->nama_panitia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SK_panitia')); ?>:</b>
	<?php echo CHtml::encode($data->SK_panitia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tahun')); ?>:</b>
	<?php echo CHtml::encode($data->tahun); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jumlah_panitia')); ?>:</b>
	<?php echo CHtml::encode($data->jumlah_panitia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_panitia')); ?>:</b>
	<?php echo CHtml::encode($data->status_panitia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jenis_panitia')); ?>:</b>
	<?php echo CHtml::encode($data->jenis_panitia); ?>
	<br />


</div>