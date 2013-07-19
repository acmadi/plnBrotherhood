<?php
	$this->pageTitle=Yii::app()->name . ' | Pejabat Berwenang';
?>

<div id="pagecontent">
	<div id="sidebar">
	<?php $this->beginWidget('zii.widgets.CPortlet'); ?>
	<ul>
		<li><?php echo CHtml::link('Tambah pejabat berwenang', array('admin/tambahkdiv')) ?></li>
		<li><?php echo CHtml::link('Hapus pejabat berwenang', array('admin/hapuskdiv')) ?></li>
		<li><?php echo CHtml::link('Tambah jenis jabatan', array('admin/tambahjabatan')) ?></li>
		<li class="onprogress"><?php echo CHtml::link('Hapus jenis jabatan', array('admin/hapusjabatan')) ?></li>
	</ul>
	<?php $this->endWidget(); ?>
	</div>
	<div id="maincontent">
		<div class="forms">
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'divisi-form',
				'enableAjaxValidation'=>false,
			)); ?>

			<div class="row">
				<?php echo $form->checkBoxList($jabatan, 'id_jabatan', CHtml::listData($jabatan->findAll(), 'id_jabatan', 'jabatan')); ?>
				<?php echo $form->error($jabatan,'id_jabatan'); ?>
			</div>

			<div class="row buttons">
				<?php echo CHtml::submitButton('Hapus',array('class'=>'sidafbutton')); ?>
			</div>

			<?php $this->endWidget(); ?>
		</div>
	</div>
	<div><?php echo CHtml::button('Kembali', array('submit'=>array('admin/kdiv'), 'class'=>'sidafbutton'));  ?></div>
</div>