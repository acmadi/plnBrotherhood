<?php
/* @var $this PaktaIntegritasPanitia1Controller */
/* @var $data PaktaIntegritasPanitia1 */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_dokumen')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_dokumen), array('view', 'id'=>$data->id_dokumen)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kode_panitia')); ?>:</b>
	<?php echo CHtml::encode($data->kode_panitia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />


</div>