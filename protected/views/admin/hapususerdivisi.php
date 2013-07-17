<?php
	$this->pageTitle=Yii::app()->name . ' | Hapus Pengguna Divisi';
?>

<div id="pagecontent">
	<div id="sidebar">
	<?php $this->beginWidget('zii.widgets.CPortlet'); ?>
	<ul>
		<li><?php echo CHtml::link('Tambah divisi', array('admin/tambahdivisi')) ?></li>
		<li><?php echo CHtml::link('Hapus divisi', array('admin/hapusdivisi')) ?></li>
	</ul>
	<?php $this->endWidget(); ?>
	</div>
	<div id="maincontent">
		<h2><?php echo $divisi->nama_divisi; ?></h2>
		<div class="forms">
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'divisi-form',
				'enableAjaxValidation'=>false,
			)); ?>

			<div class="row">
				<?php echo $form->checkBoxList($user, 'username', CHtml::listData($user->findAllByAttributes(array('divisi'=>$id)), 'username', 'nama')); ?>
				<?php echo $form->error($user,'username'); ?>
			</div>

			<div class="row buttons">
				<?php echo CHtml::submitButton('Hapus',array('class'=>'sidafbutton')); ?>
			</div>

			<?php $this->endWidget(); ?>
		</div>
	</div>
	<div><?php echo CHtml::button('Kembali', array('submit'=>array('admin/detaildivisi', 'id'=>$id), 'class'=>'sidafbutton'));  ?></div>
</div>