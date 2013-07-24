<?php
	$this->pageTitle=Yii::app()->name . ' | Detil ' . $anggota->nama;
?>

<?php if(Yii::app()->user->hasFlash('sukses')): ?>
	<div class="flash-success">
		<?php echo Yii::app()->user->getFlash('sukses'); ?>
		<script type="text/javascript">
			setTimeout(function() {
				$('.flash-success').animate({
					height: '0px',
					marginBottom: '0em',
					padding: '0em',
					opacity: '0.0'
				}, 1000, function() {
					$('.flash-success').hide();
				});
			}, 2000);
		</script>
	</div>
<?php endif; ?>

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
			<?php echo $form->labelEx($anggota,'Nama pengguna'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
				'name'=>'Anggota[username]',
				'value'=>$anggota->username,
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
			<?php echo $form->error($anggota,'username'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($anggota,'Nama'); ?> 
			<?php echo $form->textField($anggota,'nama',array('size'=>56,'maxlength'=>256)); ?>
			<?php echo $form->error($anggota,'nama'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($anggota,'E-mail'); ?> 
			<?php echo $form->textField($anggota,'email',array('size'=>56,'maxlength'=>256)); ?>
			<?php echo $form->error($anggota,'email'); ?>
		</div>

		<div class="row buttons">
			<?php echo CHtml::submitButton('Perbarui',array('class'=>'sidafbutton')); ?>
		</div>

		<?php $this->endWidget(); ?>
	</div>
</div>

<div><?php echo CHtml::button('Kembali', array('submit'=>array('admin/detailpanitia', 'id'=>$anggota->id_panitia), 'class'=>'sidafbutton'));  ?></div>