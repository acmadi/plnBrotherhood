<?php
	$this->pageTitle=Yii::app()->name . ' | Detail ' . $panitia->nama_panitia;
?>

<div id="pagecontent">
	<div id="sidebar">
	<?php $this->beginWidget('zii.widgets.CPortlet'); ?>
	<ul>
		<li><?php echo CHtml::link('Tambah panitia', array('site/statistik', 'category'=>'1', 'chart'=>'1')) ?></li>
		<li><?php echo CHtml::link('Hapus panitia', array('site/statistik', 'category'=>'2', 'chart'=>'1')) ?></li>
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

		<h2><?php echo $panitia->nama_panitia ?></h2>
		<br />
		<div class="form">
			<?php $form=$this->beginWidget('CActiveForm', array(
				'enableAjaxValidation'=>false,
			)); ?>

			<div class="row">
				<?php echo $form->labelEx($panitia,'Nama panitia'); ?> 
				<?php echo $form->textField($panitia,'nama_panitia',array('size'=>56,'maxlength'=>20)); ?>
				<?php echo $form->error($panitia,'nama_panitia'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($panitia,'Nomor SK panitia'); ?> 
				<?php echo $form->textField($panitia,'SK_panitia',array('size'=>56,'maxlength'=>20)); ?>
				<?php echo $form->error($panitia,'SK_panitia'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($panitia,'Status panitia'); ?> 
				<?php echo $form->dropDownList($panitia,'status_panitia',
					array('Aktif'=>'Aktif','Tidak Aktif'=>'Tidak Aktif'),
					array('empty'=>"------Pilih Status Panitia------")); ?>
				<?php echo $form->error($panitia,'status_panitia'); ?>
			</div>
				
			<div class="row">
				<?php echo $form->labelEx($panitia,'Tanggal SK panitia'); ?>
				<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$panitia,
					'attribute'=>'tanggal_sk',
					'value'=>$panitia->tanggal_sk,
					'htmlOptions'=>array('size'=>56),
					'options'=>array(
					'dateFormat'=>'dd-mm-yy',
					),
				));?>
				<?php echo $form->error($panitia,'tanggal_sk'); ?>
			</div>

			<div class="row">
				<?php
					$this->widget('application.extensions.appendo.JAppendo',array(
					'id' => 'anggota',
					'model' => $anggota,
					'viewName' => 'formdetailpanitia',
					'labelAdd' => 'Tambah Anggota',
					'labelDel' => 'Hapus Anggota',
					));
				?>
			</div>

			<div class="row buttons">
				<?php echo CHtml::submitButton('Perbarui',array('class'=>'sidafbutton')); ?>
			</div>

			<?php $this->endWidget(); ?>
		</div>
	</div>
</div>
<div><?php echo CHtml::button('Kembali', array('submit'=>array('admin/panitia'), 'class'=>'sidafbutton'));  ?></div>