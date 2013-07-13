<?php
	$this->pageTitle=Yii::app()->name . ' | Hapus Divisi';
?>

<div id="pagecontent">
	<div id="sidebar">
	<?php $this->beginWidget('zii.widgets.CPortlet'); ?>
	<ul>
		<li><?php echo CHtml::link('Tambah panitia pengadaan', array('admin/tambahpanitia')) ?></li>
		<li class="onprogress"><?php echo CHtml::link('Hapus panitia pengadaan', array('admin/hapuspanitia')) ?></li>
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
				<?php echo $form->checkBoxList($panitia, 'id_panitia', CHtml::listData($panitia->findAllByAttributes(array('jenis_panitia'=>'Panitia', 'status_panitia'=>'Aktif')), 'id_panitia', 'nama_panitia')); ?>
				<?php echo $form->error($panitia,'id_panitia'); ?>
			</div>

			<div class="row buttons">
				<?php echo CHtml::submitButton('Hapus',array('class'=>'sidafbutton')); ?>
			</div>

			<?php $this->endWidget(); ?>
		</div>
	</div>
	<div><?php echo CHtml::button('Kembali', array('submit'=>array('admin/divisi'), 'class'=>'sidafbutton'));  ?></div>
</div>