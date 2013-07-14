<?php
	$this->pageTitle=Yii::app()->name . ' | Detil ' . $pejabat->nama;
?>

<div id="pagecontent">
	<div id="sidebar">
	<?php $this->beginWidget('zii.widgets.CPortlet'); ?>
	<ul>
		<li><?php echo CHtml::link('Tambah pejabat pengadaan', array('admin/tambahpejabat')) ?></li>
		<li><?php echo CHtml::link('Tambah panitia pengadaan', array('admin/tambahpanitia')) ?></li>
		<li><?php echo CHtml::link('Hapus pejabat pengadaan', array('admin/hapuspejabat')) ?></li>
		<li><?php echo CHtml::link('Hapus panitia pengadaan', array('admin/hapuspanitia')) ?></li>
	</ul>
	<?php $this->endWidget(); ?>
	</div>
	<div id="maincontent">
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

		<h2><?php echo $pejabat->nama ?></h2>
		<div class="form">
			<?php $form=$this->beginWidget('CActiveForm', array(
				'enableAjaxValidation'=>false,
			)); ?>

			<div class="row">
				<?php echo $form->labelEx($pejabat,'Nama'); ?> 
				<?php echo $form->textField($pejabat,'nama',array('size'=>56,'maxlength'=>20)); ?>
				<?php echo $form->error($pejabat,'nama'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($pejabat,'E-mail'); ?> 
				<?php echo $form->textField($pejabat,'email',array('size'=>56,'maxlength'=>20)); ?>
				<?php echo $form->error($pejabat,'email'); ?>
			</div>

			<div class="row buttons">
				<?php echo CHtml::submitButton('Perbarui',array('class'=>'sidafbutton')); ?>
			</div>

			<?php $this->endWidget(); ?>
		</div>
	</div>
</div>
<div><?php echo CHtml::button('Kembali', array('submit'=>array('admin/panitia'), 'class'=>'sidafbutton'));  ?></div>