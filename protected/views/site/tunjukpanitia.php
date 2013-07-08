<?php
	$id = Yii::app()->getRequest()->getQuery('id');
	$user=Yii::app()->user->name;
	$pengadaan=Pengadaan::model()->findByPk($id);
	$this->pageTitle=Yii::app()->name . ' | Tunjuk Panitia '.$pengadaan->nama_pengadaan;
?>

<?php 
	if (Kdivmum::model()->exists('username = "' . Yii::app()->user->name . '"')) {
?>
	<div class="form">
		<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'pengadaan-form',
		'enableAjaxValidation'=>false,
		)); ?>
	
		<h4><b> Nota Dinas Perintah Pengadaan </b></h4>
		<div class="row">
			<?php echo $form->labelEx($NDPP,'nomor'); ?>
			<?php echo $form->textField($NDPP,'nomor',array('size'=>60,'maxlength'=>50)); ?>
			<?php echo $form->error($NDPP,'nomor'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($Dokumen0,'tanggal surat'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$Dokumen0,
					'attribute'=>'tanggal',
					'value'=>$Dokumen0->tanggal,
					'htmlOptions'=>array('size'=>56),
					'options'=>array(
					'dateFormat'=>'dd-mm-yy',
					),
			));?>
			<?php echo $form->error($Dokumen0,'tanggal'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($NDPP,'dari'); ?>
			<?php echo $form->dropDownList($NDPP,'dari',
			  array('KDIVMUM'=>'KDIVMUM','MSDAF'=>'MSDAF'),
					array('empty'=>"-----Pilih Pengirim Nota Dinas------")); ?>
			<?php echo $form->error($NDPP,'dari'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($NDPP,'perihal'); ?>
			<?php echo $form->textArea($NDPP,'perihal',array('cols'=>43,'rows'=>2, 'maxlength'=>100)); ?>
			<?php echo $form->error($NDPP,'perihal'); ?>
		</div>

		<?php
			function dropDownSort($v1, $v2) {
				$c1 = count(Pengadaan::model()->findAll('id_panitia = ' . Panitia::model()->find('nama_panitia = "' . $v1 . '"')->id_panitia));
				$c2 = count(Pengadaan::model()->findAll('id_panitia = ' . Panitia::model()->find('nama_panitia = "' . $v2 . '"')->id_panitia));
				if ($c1 == $c2) {
					return 0;
				} else if ($c1 > $c2) {
					return 1;
				} else {
					return -1;
				}
			}
		?>
		<?php
			$dropDownData = CHtml::listData(Panitia::model()->findAllByAttributes(array('status_panitia'=>'Aktif','jenis_panitia'=>'Pejabat')), 'id_panitia', 'nama_panitia');
			@usort($dropDownData, 'dropDownSort');
			foreach ($dropDownData as &$item) {
				$item = $item . ' (' . count(Pengadaan::model()->findAll('id_panitia = ' . Panitia::model()->find('nama_panitia = "' . $item . '"')->id_panitia)) . ' pekerjaan)';
			}
		?>
		
		<?php if ($NDP->nilai_biaya_rab>500000000) { ?>
			<div class="row">
				<?php echo $form->labelEx($Pengadaan,'nama panitia pengadaan'); ?>
				<?php echo $form->dropDownList($Pengadaan,'id_panitia',$dropDownData,array('empty'=>'-----Pilih Panitia-----'));?>
				<?php echo $form->error($Pengadaan,'id_panitia'); ?>
			</div>
		<?php } else { ?>
			<div class="row">
				<?php echo $form->labelEx($Pengadaan,'nama pejabat pengadaan'); ?>
				<?php echo $form->dropDownList($Pengadaan,'id_panitia',$dropDownData,array('empty'=>'-----Pilih Panitia-----'));?>
				<?php echo $form->error($Pengadaan,'id_panitia'); ?>
			</div>
		<?php } ?>

		<?php if ($Pengadaan->jenis_pengadaan=="Barang dan Jasa") { ?>
			<div class="row">
				<?php echo $form->labelEx($Pengadaan,'metode_pengadaan'); ?>
				<?php echo $form->dropDownList($Pengadaan,'metode_pengadaan',
				  array('Penunjukan Langsung'=>'Penunjukan Langsung','Pemilihan Langsung'=>'Pemilihan Langsung','Pelelangan'=>'Pelelangan'),
						array('empty'=>"-----Pilih Metode Pengadaan------")); ?>
				<?php echo $form->error($Pengadaan,'metode_pengadaan'); ?>
			</div>
		<?php } else { ?>
			<div class="row">
				<?php echo $form->labelEx($Pengadaan,'metode_pengadaan'); ?>
				<?php echo $form->dropDownList($Pengadaan,'metode_pengadaan',
				  array('Penunjukan Langsung'=>'Penunjukan Langsung','Seleksi Langsung'=>'Seleksi Langsung','Seleksi Umum'=>'Seleksi Umum'),
						array('empty'=>"-----Pilih Metode Pengadaan------")); ?>
				<?php echo $form->error($Pengadaan,'metode_pengadaan'); ?>
			</div>
		<?php } ?>
		
		<div class="row">
			<?php echo $form->labelEx($NDPP,'Target SPK/Kontrak (Ket: Dalam Satuan Hari)'); ?>
			<?php echo $form->textField($NDPP,'targetSPK_kontrak',array('size'=>60)); ?>
			<?php echo $form->error($NDPP,'targetSPK_kontrak'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($NDPP,'sumber_dana'); ?>
			<?php echo $form->textField($NDPP,'sumber_dana',array('size'=>60,'maxlength'=>256)); ?>
			<?php echo $form->error($NDPP,'sumber_dana'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($NDPP,'pagu_anggaran'); ?>
			<?php echo $form->textField($NDPP,'pagu_anggaran',array('size'=>60,'maxlength'=>256)); ?>
			<?php echo $form->error($NDPP,'pagu_anggaran'); ?>
		</div>

		<div class="row buttons">
			<?php echo CHtml::submitButton($NDPP->isNewRecord ? 'Simpan' : 'Perbarui',array('class'=>'sidafbutton')); ?>
		</div>
		
		<?php $this->endWidget(); ?>

	</div><!-- form -->
	
	<?php if(!$NDPP->isNewRecord) { ?>
		<br/>
		<div style="border-top:1px solid lightblue">
		<br/>
			<h4><b> Daftar Dokumen </b></h4>
			<ul class="generatedoc">
				<li><?php echo CHtml::link('Nota Dinas Perintah Pengadaan', array('docx/download','id'=>$NDPP->id_dokumen)); ?></li>
			</ul>
		</div>
	<?php } ?>
	
	<?php echo CHtml::button('Kembali', array('submit'=>array('site/tambahpengadaan2','id'=>$id), "class"=>'sidafbutton'));  ?>
	
	
<?php	}
?>