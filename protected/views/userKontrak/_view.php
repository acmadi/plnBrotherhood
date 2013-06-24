<?php
/* @var $this UserKontrakController */
/* @var $data UserKontrak */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_user_kontrak')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_user_kontrak), array('view', 'id'=>$data->id_user_kontrak)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />


</div>