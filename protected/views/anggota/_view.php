<?php
/* @var $this AnggotaController */
/* @var $data Anggota */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NIP')); ?>:</b>
	<?php echo CHtml::encode($data->NIP); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_panitia')); ?>:</b>
	<?php echo CHtml::encode($data->id_panitia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jabatan')); ?>:</b>
	<?php echo CHtml::encode($data->jabatan); ?>
	<br />


</div>