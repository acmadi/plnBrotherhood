<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->username), array('view', 'id'=>$data->username)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('divisi')); ?>:</b>
	<?php echo CHtml::encode($data->divisi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_user')); ?>:</b>
	<?php echo CHtml::encode($data->status_user); ?>
	<br />


</div>