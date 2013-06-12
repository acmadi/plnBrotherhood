<?php
/* @var $this NotaDinasPerintahPengadaanController */
/* @var $data NotaDinasPerintahPengadaan */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_dokumen')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_dokumen), array('view', 'id'=>$data->id_dokumen)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nota_dinas_permintaan')); ?>:</b>
	<?php echo CHtml::encode($data->nota_dinas_permintaan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nomor')); ?>:</b>
	<?php echo CHtml::encode($data->nomor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dari')); ?>:</b>
	<?php echo CHtml::encode($data->dari); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kepada')); ?>:</b>
	<?php echo CHtml::encode($data->kepada); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('perilhal')); ?>:</b>
	<?php echo CHtml::encode($data->perilhal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RAB')); ?>:</b>
	<?php echo CHtml::encode($data->RAB); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('targetSPK_kontrak')); ?>:</b>
	<?php echo CHtml::encode($data->targetSPK_kontrak); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sumber_dana')); ?>:</b>
	<?php echo CHtml::encode($data->sumber_dana); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pagu_anggaran')); ?>:</b>
	<?php echo CHtml::encode($data->pagu_anggaran); ?>
	<br />

	*/ ?>

</div>