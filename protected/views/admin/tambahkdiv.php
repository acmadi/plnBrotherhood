<?php
	$this->pageTitle=Yii::app()->name . ' | Tambah Pejabat Berwenang';
?>

<div id="pagecontent">
	<div id="sidebar">
	<?php $this->beginWidget('zii.widgets.CPortlet'); ?>
	<ul>
		<li class="onprogress"><?php echo CHtml::link('Tambah pejabat berwenang', array('admin/tambahkdiv')) ?></li>
		<li><?php echo CHtml::link('Hapus pejabat berwenang', array('admin/hapuskdiv')) ?></li>
		<li><?php echo CHtml::link('Tambah jenis jabatan', array('admin/tambahjabatan')) ?></li>
		<li><?php echo CHtml::link('Hapus jenis jabatan', array('admin/hapusjabatan')) ?></li>
	</ul>
	<?php $this->endWidget(); ?>
	</div>
	<div id="maincontent">
		<?php if(Yii::app()->user->hasFlash('gagal')): ?>
			<div class="flash-error">
				<?php echo Yii::app()->user->getFlash('gagal'); ?>
				<script type="text/javascript">
					setTimeout(function() {
						$('.flash-error').animate({
							height: '0px',
							marginBottom: '0em',
							padding: '0em',
							opacity: '0.0'
						}, 1000, function() {
							$('.flash-error').hide();
						});
					}, 2000);
				</script>
			</div>
		<?php endif; ?>

		<div class="form">
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'divisi-form',
				'enableAjaxValidation'=>false,
			)); ?>

			<div class="row">
				<?php echo $form->labelEx($kdiv,'Nama pengguna'); ?> 
				<?php echo $form->textField($kdiv,'username',array('size'=>56,'maxlength'=>256)); ?>
				<?php echo $form->error($kdiv,'username'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($kdiv,'Jabatan'); ?> 
				<?php echo $form->dropDownList($kdiv,'id_jabatan',CHtml::listData(Jabatan::model()->findAllByAttributes(array('status'=>'Aktif')),'id_jabatan','jabatan')); ?>
				<?php echo $form->error($kdiv,'id_jabatan'); ?>
			</div>

			<div class="row buttons">
				<?php echo CHtml::submitButton('Simpan',array('class'=>'sidafbutton')); ?>
			</div>

			<?php $this->endWidget(); ?>
		</div>
	</div>
	<div><?php echo CHtml::button('Kembali', array('submit'=>array('admin/kdiv'), 'class'=>'sidafbutton'));  ?></div>
</div>