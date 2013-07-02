<?php
/* @var $this SiteController */

$id = Yii::app()->getRequest()->getQuery('id');
$this->pageTitle=Yii::app()->name . ' | '.Pengadaan::model()->findByPk($id)->nama_pengadaan;
?>

<div id="pagecontent">
	<div id="sidebar">
		<?php if(!Yii::app()->user->isGuest) $this->widget('MenuPortlet'); ?>
	</div>

	<div id="maincontent">
		<?php 
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
		?>
			<div id="menuform">
				<?php
				$this->widget('zii.widgets.CMenu', array(
						'items'=>array(
							array('label'=>'Penentuan Metode', 'url'=>array(($Pengadaan->metode_penawaran=='-')?'/site/penentuanmetode':'/site/editpenentuanmetode','id'=>$id)),
							array('label'=>'RKS', 'url'=>array(($Pengadaan->metode_penawaran=='-'?'':(Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "RKS"') == null ?'/site/rks':'/site/editrks')),'id'=>$id)),
							array('label'=>'HPS', 'url'=>array(($Pengadaan->metode_penawaran=='-'||Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "RKS"') == null?'':(Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "HPS"') == null?'/site/hps':'/site/edithps')),'id'=>$id)),
						),
					));
				?>
			</div>
			<br/>
		
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
			
			<div class="form">

			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'rks-form',
				'enableAjaxValidation'=>false,
			)); ?>
				<h4><b> Metode Penawaran Pengadaan</b></h4>
				<?php if($Pengadaan->metode_pengadaan=='Penunjukan Langsung'){ ?>
					<div class="row">
						<?php echo $form->radioButtonList($Pengadaan,'metode_penawaran',
							array('Satu Sampul'=>'Satu Sampul'),
							array('separator'=>' ', 'labelOptions'=>array('style'=>'display:inline'))); ?>
						<?php echo $form->error($Pengadaan,'metode_penawaran'); ?>
					</div>
					<br/>
				<?php } else if($Pengadaan->metode_pengadaan=='Pemilihan Langsung'){ ?>
					<div class="row">
						<?php echo $form->radioButtonList($Pengadaan,'metode_penawaran',
							array('Satu Sampul'=>'Satu Sampul','Dua Sampul'=>'Dua Sampul'),
							array('separator'=>' ', 'labelOptions'=>array('style'=>'display:inline'))); ?>
						<?php echo $form->error($Pengadaan,'metode_penawaran'); ?>
					</div>
					<br/>
				<?php } else { ?>
					<div class="row">
						<?php echo $form->radioButtonList($Pengadaan,'metode_penawaran',
							array('Satu Sampul'=>'Satu Sampul','Dua Sampul'=>'Dua Sampul','Dua Tahap'=>'Dua Tahap'),
							array('separator'=>' ', 'labelOptions'=>array('style'=>'display:inline'))); ?>
						<?php echo $form->error($Pengadaan,'metode_penawaran'); ?>
					</div>
					<br/>
				<?php } ?>
				
				<h4><b> Jenis Kualifikasi Pengadaan</b></h4>
				<div class="row">
					<?php echo $form->dropDownList($Pengadaan,'jenis_kualifikasi',
						array('Pra Kualifikasi'=>'Pra Kualifikasi','Pasca Kualifikasi'=>'Pasca Kualifikasi'),
						array('empty'=>"------Pilih Jenis Kualifikasi------")); ?>
					<?php echo $form->error($Pengadaan,'jenis_kualifikasi'); ?>
				</div>
				<br/>
				
				<div class="row buttons">
					<?php echo CHtml::submitButton($Pengadaan->isNewRecord ? 'Simpan' : 'Perbarui',array('class'=>'sidafbutton')); ?>
				</div>

				<?php $this->endWidget(); ?>

			</div><!-- form -->
			
		<?php }
		?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'class'=>'sidafbutton'));  ?></div>