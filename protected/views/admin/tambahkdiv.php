<?php
	$this->pageTitle=Yii::app()->name . ' | Tambah Pejabat Berwenang';
?>

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

<div class="kelompokform">
	<div class="form">
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'divisi-form',
			'enableAjaxValidation'=>false,
		)); ?>

		<div class="row">
			<?php echo $form->labelEx($kdiv,'Nama pengguna'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
				'name'=>'Kdivmum[username]',
				'value'=>$kdiv->username,
				'sourceUrl'=>array('admin/autocomplete'),
				'options'=>array(
					'minLength'=>'2',
				),
				'htmlOptions'=>array(
					'size'=>56,
					'maxlength'=>256,
				),
			));
			?>
			<?php echo $form->error($kdiv,'username'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($kdiv,'Nama'); ?> 
			<?php echo $form->textField($kdiv,'nama',array('size'=>56,'maxlength'=>256)); ?>
			<?php echo $form->error($kdiv,'nama'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($kdiv,'E-mail'); ?> 
			<?php echo $form->textField($kdiv,'email',array('size'=>56,'maxlength'=>256)); ?>
			<?php echo $form->error($kdiv,'email'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($kdiv,'Jabatan'); ?> 
			<?php echo $form->dropDownList($kdiv,'id_jabatan',CHtml::listData(Jabatan::model()->findAllByAttributes(array('status'=>'Aktif')),'id_jabatan','jabatan'), array('empty'=>'-----Pilih Jabatan------')); ?>
			<?php echo $form->error($kdiv,'id_jabatan'); ?>
		</div>

		<div class="row buttons">
			<?php echo CHtml::submitButton('Simpan',array('class'=>'sidafbutton')); ?>
		</div>

		<?php $this->endWidget(); ?>
	</div>
</div>

<div><?php echo CHtml::button('Kembali', array('submit'=>array('admin/kdiv'), 'class'=>'sidafbutton'));  ?></div>