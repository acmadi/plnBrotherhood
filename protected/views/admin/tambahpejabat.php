<?php
	$this->pageTitle=Yii::app()->name . ' | Tambah Pejabat Pengadaan';
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
			<?php echo $form->labelEx($pejabat,'Nama pengguna'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
				'name'=>'Anggota[username]',
				'value'=>$pejabat->username,
				'sourceUrl'=>array('admin/autocomplete'),
				'options'=>array(
					'minLength'=>'2',
					'select'=>'js:function(event, ui) {
						$.ajax({
							type: "post",
							dataType: "json",
							url: "' . Yii::app()->createUrl('admin/userdetail') . '",
							data: {username: ui.item.label},
							success: function(data) {
								$("#Anggota_nama").val(data.nama);
								$("#Anggota_email").val(data.email);
							},
						});
					}',
				),
				'htmlOptions'=>array(
					'size'=>56,
					'maxlength'=>256,
				),
			));
			?>
			<?php echo $form->error($pejabat,'username'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($pejabat,'Nama'); ?> 
			<?php echo $form->textField($pejabat,'nama',array('size'=>56,'maxlength'=>256)); ?>
			<?php echo $form->error($pejabat,'nama'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($pejabat,'E-mail'); ?> 
			<?php echo $form->textField($pejabat,'email',array('size'=>56,'maxlength'=>256)); ?>
			<?php echo $form->error($pejabat,'email'); ?>
		</div>

		<div class="row buttons">
			<?php echo CHtml::submitButton('Simpan',array('class'=>'sidafbutton')); ?>
		</div>

		<?php $this->endWidget(); ?>
	</div>
</div>

<div><?php echo CHtml::button('Kembali', array('submit'=>array('admin/pejabat'), 'class'=>'sidafbutton'));  ?></div>