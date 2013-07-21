<?php
/* @var $this SiteController */

$id = Yii::app()->getRequest()->getQuery('id');
$Pengadaan= Pengadaan::model()->findByPk($id);
$this->pageTitle=Yii::app()->name . ' | '.$Pengadaan->nama_pengadaan;
?>

<div id="pagecontent">
	<div id="sidebar">
		<?php if(!Yii::app()->user->isGuest) $this->widget('MenuPortlet'); ?>
		<script type="text/javascript">
			$('#1').attr('class','onprogress');
		</script>
	</div>

	<div id="maincontent">
		<?php 
			if (Yii::app()->user->getState('role') == 'anggota') {
		?>
			<div id="menuform">
				<?php
				$this->widget('zii.widgets.CMenu', array(
						'items'=>array(
							array('label'=>'RKS', 'url'=>array(($Rks->isNewRecord)?'/generator/rks':'/generator/editrks','id'=>$id)),
							array('label'=>'HPS', 'url'=>array((Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "RKS"') == null?'':(Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "HPS"') == null?'/generator/hps':'/generator/edithps')),'id'=>$id)),
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
			
				<h4><b> RKS </b></h4>
				
				<div style="border:2px solid lightblue; padding:10px; background-color:lightgrey">
					<?php if ($Rks->isNewRecord){ ?>
						<div class="row">
							<?php echo $form->labelEx($Rks,'jenis rks'); ?>
							<?php echo $form->radioButtonList($Rks,'tipe_rks',
								array(1=>'Barang',2=>'Barang dan Jasa',3=>'Jasa'),
								array('separator'=>' ', 'labelOptions'=>array('style'=>'display:inline'))); ?>
							<?php echo $form->error($Rks,'tipe_rks'); ?>
						</div>
					<?php } ?>
					
					<div class="row">
						<?php echo $form->labelEx($Rks,'nomor'); ?>
						<?php echo $form->textField($Rks,'nomor',array('size'=>56,'maxlength'=>50)); ?>
						<?php echo $form->error($Rks,'nomor'); ?>
					</div>
					
					<div class="row">
						<?php echo $form->labelEx($Dokumen0,'tanggal rks'); ?>
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
						<?php echo $form->labelEx($Rks,'bidang_usaha'); ?>
						<?php echo $form->textField($Rks,'bidang_usaha',array('size'=>56,'maxlength'=>256)); ?>
						<?php echo $form->error($Rks,'bidang_usaha'); ?>
					</div>
					
					<div class="row">
						<?php echo $form->labelEx($Rks,'sub_bidang_usaha'); ?>
						<?php echo $form->textField($Rks,'sub_bidang_usaha',array('size'=>56,'maxlength'=>256)); ?>
						<?php echo $form->error($Rks,'sub_bidang_usaha'); ?>
					</div>
					
					<div class="row">
						<?php echo $form->labelEx($Rks,'kualifikasi'); ?>
						<?php echo $form->radioButtonList($Rks,'kualifikasi',
								array(1=>'K-1',2=>'M',3=>'B'),
								array('separator'=>' ', 'labelOptions'=>array('style'=>'display:inline'))); ?>
						<?php echo $form->error($Rks,'kualifikasi'); ?>
					</div>
					
					<div class="row">
						<?php echo $form->labelEx($Rks,'klasifikasi'); ?>
						<?php echo $form->radioButtonList($Rks,'klasifikasi',
								array(1=>'Pemasokan Barang/Jasa Lainnya',2=>'Jasa Pemborong Non Kontruksi',3=>'Jasa Konsultasi Non Kontruksi'),
								array('separator'=>' ', 'labelOptions'=>array('style'=>'display:inline'))); ?>
						<?php echo $form->error($Rks,'klasifikasi'); ?>
					</div>
					
					<div class="row">
						<?php echo $form->labelEx($Rks,'sistem_evaluasi_penawaran'); ?>
						<?php echo $form->textField($Rks,'sistem_evaluasi_penawaran',array('size'=>56,'maxlength'=>20)); ?>
						<?php echo $form->error($Rks,'sistem_evaluasi_penawaran'); ?>
					</div>
					
					<div class="row">
						<?php echo $form->labelEx($Rks,'jangka_waktu_penyerahan (dalam satuan bulan)'); ?>
						<?php echo $form->textField($Rks,'jangka_waktu_penyerahan',array('size'=>56,'maxlength'=>20)); ?>
						<?php echo $form->error($Rks,'jangka_waktu_penyerahan'); ?>
					</div>
					
					<div class="row">
						<?php echo $form->labelEx($Rks,'tempat_penyerahan'); ?>
						<?php echo $form->textArea($Rks,'tempat_penyerahan',array('cols'=>43,'rows'=>3, 'maxlength'=>256)); ?>
						<?php echo $form->error($Rks,'tempat_penyerahan'); ?>
					</div>
					
					<div class="row">
						<?php echo $form->labelEx($Rks,'lama_pelaksanaan (dalam satuan hari)'); ?>
						<?php echo $form->textField($Rks,'lama_pelaksanaan',array('size'=>56,'maxlength'=>20)); ?>
						<?php echo $form->error($Rks,'lama_pelaksanaan'); ?>
					</div>
					
					<div class="row">
						<?php echo $form->labelEx($Rks,'biaya_jaminan_pelaksanaan'); ?>
						<?php echo $form->textField($Rks,'biaya_jaminan_pelaksanaan',array('size'=>56,'maxlength'=>50)); ?>
						<?php echo $form->error($Rks,'biaya_jaminan_pelaksanaan'); ?>
					</div>
					
					<div class="row">
						<?php echo $form->labelEx($Rks,'jangka_waktu_berlaku_jaminan (dalam satuan bulan)'); ?>
						<?php echo $form->textField($Rks,'jangka_waktu_berlaku_jaminan',array('size'=>56,'maxlength'=>20)); ?>
						<?php echo $form->error($Rks,'jangka_waktu_berlaku_jaminan'); ?>
					</div>
				</div>
				
				<br/>
				<h4><b> Penjadwalan </b></h4>
				
				<?php if ($Pengadaan->metode_pengadaan=="Pelelangan") { ?>
					<div style="border:2px solid lightblue; padding:10px; background-color:lightgrey">
						<div class="row">
							<?php echo $form->labelEx($Rks,'tanggal_pendaftaran'); ?>
							<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
								'model'=>$Rks,
								'attribute'=>'tanggal_pendaftaran',
								'value'=>$Rks->tanggal_pendaftaran,
								'htmlOptions'=>array('size'=>56),
								'options'=>array(
								'dateFormat'=>'dd-mm-yy',
								),
							));?>
							<?php echo $form->error($Rks,'tanggal_pendaftaran'); ?>
						</div>
					</div>
					<br/>
					<div style="border:2px solid lightblue; padding:10px; background-color:lightgrey">
						<div class="row">
							<?php echo $form->labelEx($Rks,'Tanggal Pengambilan Dokumen'); ?>
							<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
									'model'=>$Rks,
									'attribute'=>'tanggal_pengambilan_dokumen1',
									'value'=>$Rks->tanggal_pengambilan_dokumen1,
									'htmlOptions'=>array('size'=>23),
									'options'=>array(
									'dateFormat'=>'yy-mm-dd',
									),
							));?>
							<?php echo $form->error($Rks,'tanggal_pengambilan_dokumen1'); ?>
							s/d
							<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
									'model'=>$Rks,
									'attribute'=>'tanggal_pengambilan_dokumen2',
									'value'=>$Rks->tanggal_pengambilan_dokumen2,
									'htmlOptions'=>array('size'=>23),
									'options'=>array(
									'dateFormat'=>'yy-mm-dd',
									),
							));?>
							<?php echo $form->error($Rks,'tanggal_pengambilan_dokumen2'); ?>
						</div>
						<div class="row">
							<?php echo $form->labelEx($Rks,'waktu_pengambilan_dokumen (Format HH:MM)'); ?>
							<?php echo $form->textField($Rks,'waktu_pengambilan_dokumen1',array('size'=>23,'maxlength'=>20)); ?>
							<?php echo $form->error($Rks,'waktu_pengambilan_dokumen1'); ?>
							s/d
							<?php echo $form->textField($Rks,'waktu_pengambilan_dokumen2',array('size'=>23,'maxlength'=>20)); ?>
							<?php echo $form->error($Rks,'waktu_pengambilan_dokumen12'); ?>
						</div>
						<div class="row">
							<?php echo $form->labelEx($Rks,'tempat_pengambilan_dokumen'); ?>
							<?php echo $form->textArea($Rks,'tempat_pengambilan_dokumen',array('cols'=>43,'rows'=>3, 'maxlength'=>256)); ?>
							<?php echo $form->error($Rks,'tempat_pengambilan_dokumen'); ?>
						</div>
					</div>
					<br/>
				<?php } else { ?>
					<div style="border:2px solid lightblue; padding:10px; background-color:lightgrey">
						<div class="row">
							<?php echo $form->labelEx($Rks,'tanggal_permintaan_penawaran'); ?>
							<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
								'model'=>$Rks,
								'attribute'=>'tanggal_permintaan_penawaran',
								'value'=>$Rks->tanggal_permintaan_penawaran,
								'htmlOptions'=>array('size'=>56),
								'options'=>array(
								'dateFormat'=>'dd-mm-yy',
								),
							));?>
							<?php echo $form->error($Rks,'tanggal_permintaan_penawaran'); ?>
						</div>
					</div>
					<br/>
				<?php } ?>
				
				<div style="border:2px solid lightblue; padding:10px; background-color:lightgrey">
					<div class="row">
						<?php echo $form->labelEx($Rks,'tanggal_penjelasan'); ?>
						<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
							'model'=>$Rks,
							'attribute'=>'tanggal_penjelasan',
							'value'=>$Rks->tanggal_penjelasan,
							'htmlOptions'=>array('size'=>56),
							'options'=>array(
							'dateFormat'=>'dd-mm-yy',
							),
						));?>
						<?php echo $form->error($Rks,'tanggal_penjelasan'); ?>
					</div>
					
					<div class="row">
						<?php echo $form->labelEx($Rks,'waktu_penjelasan (Format HH:MM)'); ?>
						<?php echo $form->textField($Rks,'waktu_penjelasan',array('size'=>56,'maxlength'=>20)); ?>
						<?php echo $form->error($Rks,'waktu_penjelasan'); ?>
					</div>

					<div class="row">
						<?php echo $form->labelEx($Rks,'tempat_penjelasan'); ?>
						<?php echo $form->textArea($Rks,'tempat_penjelasan',array('cols'=>43,'rows'=>3, 'maxlength'=>256)); ?>
						<?php echo $form->error($Rks,'tempat_penjelasan'); ?>
					</div>
				</div>
				<br/>
				
				<div style="border:2px solid lightblue; padding:10px; background-color:lightgrey">
					<div class="row">
						<?php if ($Pengadaan->metode_penawaran=="Satu Sampul" || $Pengadaan->metode_penawaran=="Dua Sampul") { 
							echo $form->labelEx($Rks,'tanggal_pemasukan_penawaran'); 
						} else if ($Pengadaan->metode_penawaran=="Dua Tahap") {
							echo $form->labelEx($Rks,'tanggal_pemasukan_penawaran tahap 1'); 
						} ?> 
						<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
							'model'=>$Rks,
							'attribute'=>'tanggal_awal_pemasukan_penawaran1',
							'value'=>$Rks->tanggal_akhir_pemasukan_penawaran1,
							'htmlOptions'=>array('size'=>23),
							'options'=>array(
							'dateFormat'=>'dd-mm-yy',
							),
						));?>
						<?php echo $form->error($Rks,'tanggal_awal_pemasukan_penawaran1'); ?>
						s/d
						<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
							'model'=>$Rks,
							'attribute'=>'tanggal_akhir_pemasukan_penawaran1',
							'value'=>$Rks->tanggal_akhir_pemasukan_penawaran1,
							'htmlOptions'=>array('size'=>23),
							'options'=>array(
							'dateFormat'=>'dd-mm-yy',
							),
						));?>
						<?php echo $form->error($Rks,'tanggal_akhir_pemasukan_penawaran1'); ?>
					</div>
			
					<div class="row">
						<?php if ($Pengadaan->metode_penawaran=="Satu Sampul" || $Pengadaan->metode_penawaran=="Dua Sampul") { 
							echo $form->labelEx($Rks,'waktu_paling_lambat_pemasukan_penawaran'); 
						} else if ($Pengadaan->metode_penawaran=="Dua Tahap") {
							echo $form->labelEx($Rks,'waktu_paling_lambat_pemasukan_penawaran tahap 1'); 
						} ?> 
						<?php echo $form->textField($Rks,'waktu_pemasukan_penawaran1',array('size'=>56,'maxlength'=>20)); ?>
						<?php echo $form->error($Rks,'waktu_pemasukan_penawaran1'); ?>
					</div>

					<div class="row">
						<?php if ($Pengadaan->metode_penawaran=="Satu Sampul" || $Pengadaan->metode_penawaran=="Dua Sampul") { 
							echo $form->labelEx($Rks,'tempat_pemasukan_penawaran'); 
						} else if ($Pengadaan->metode_penawaran=="Dua Tahap") {
							echo $form->labelEx($Rks,'tempat_pemasukan_penawaran tahap 1'); 
						} ?> 
						<?php echo $form->textArea($Rks,'tempat_pemasukan_penawaran1',array('cols'=>43,'rows'=>3, 'maxlength'=>100)); ?>
						<?php echo $form->error($Rks,'tempat_pemasukan_penawaran1'); ?>
					</div>
				</div>
				<br/>
				
				<div style="border:2px solid lightblue; padding:10px; background-color:lightgrey">
					<div class="row">
						<?php if ($Pengadaan->metode_penawaran=="Satu Sampul") {
							echo $form->labelEx($Rks,'tanggal_pembukaan_penawaran'); 
						} else if ($Pengadaan->metode_penawaran=="Dua Sampul") {
							echo $form->labelEx($Rks,'tanggal_pembukaan_penawaran sampul 1'); 
						} else if ($Pengadaan->metode_penawaran=="Dua Tahap") {
							echo $form->labelEx($Rks,'tanggal_pembukaan_penawaran tahap 1'); 
						} ?> 
						<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
							'model'=>$Rks,
							'attribute'=>'tanggal_pembukaan_penawaran1',
							'value'=>$Rks->tanggal_pembukaan_penawaran1,
							'htmlOptions'=>array('size'=>56),
							'options'=>array(
							'dateFormat'=>'dd-mm-yy',
							),
						));?>
						<?php echo $form->error($Rks,'tanggal_pembukaan_penawaran1'); ?>
					</div>
					
					<div class="row">
						<?php if ($Pengadaan->metode_penawaran=="Satu Sampul") {
							echo $form->labelEx($Rks,'waktu_pembukaan_penawaran (Format HH:MM)'); 
						} else if ($Pengadaan->metode_penawaran=="Dua Sampul") {
							echo $form->labelEx($Rks,'waktu_pembukaan_penawaran sampul 1 (Format HH:MM)'); 
						} else if ($Pengadaan->metode_penawaran=="Dua Tahap") {
							echo $form->labelEx($Rks,'waktu_pembukaan_penawaran tahap 1 (Format HH:MM)'); 
						} ?> 
						<?php echo $form->textField($Rks,'waktu_pembukaan_penawaran1',array('size'=>56,'maxlength'=>20)); ?>
						<?php echo $form->error($Rks,'waktu_pembukaan_penawaran1'); ?>
					</div>
					
					<div class="row">
						<?php if ($Pengadaan->metode_penawaran=="Satu Sampul") {
							echo $form->labelEx($Rks,'tempat_pembukaan_penawaran'); 
						} else if ($Pengadaan->metode_penawaran=="Dua Sampul") {
							echo $form->labelEx($Rks,'tempat_pembukaan_penawaran sampul 1'); 
						} else if ($Pengadaan->metode_penawaran=="Dua Tahap") {
							echo $form->labelEx($Rks,'tempat_pembukaan_penawaran tahap 1'); 
						} ?> 
						<?php echo $form->textArea($Rks,'tempat_pembukaan_penawaran1',array('cols'=>43,'rows'=>3, 'maxlength'=>100)); ?>
						<?php echo $form->error($Rks,'tempat_pembukaan_penawaran1'); ?>
					</div>
				</div>
				<br/>
				
				<div style="border:2px solid lightblue; padding:10px; background-color:lightgrey">
					<div class="row">
						<?php if ($Pengadaan->metode_penawaran=="Satu Sampul") {
							echo $form->labelEx($Rks,'tanggal_evaluasi_penawaran'); 
						} else if ($Pengadaan->metode_penawaran=="Dua Sampul") {
							echo $form->labelEx($Rks,'tanggal_evaluasi_penawaran sampul 1'); 
						} else if ($Pengadaan->metode_penawaran=="Dua Tahap") {
							echo $form->labelEx($Rks,'tanggal_evaluasi_penawaran tahap 1'); 
						} ?> 
						<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
							'model'=>$Rks,
							'attribute'=>'tanggal_evaluasi_penawaran1',
							'value'=>$Rks->tanggal_evaluasi_penawaran1,
							'htmlOptions'=>array('size'=>56),
							'options'=>array(
							'dateFormat'=>'dd-mm-yy',
							),
						));?>
						<?php echo $form->error($Rks,'tanggal_evaluasi_penawaran1'); ?>
					</div>
					
					<div class="row">
						<?php if ($Pengadaan->metode_penawaran=="Satu Sampul") {
							echo $form->labelEx($Rks,'waktu_evaluasi_penawaran (Format HH:MM)'); 
						} else if ($Pengadaan->metode_penawaran=="Dua Sampul") {
							echo $form->labelEx($Rks,'waktu_evaluasi_penawaran sampul 1 (Format HH:MM)'); 
						} else if ($Pengadaan->metode_penawaran=="Dua Tahap") {
							echo $form->labelEx($Rks,'waktu_evaluasi_penawaran tahap 1 (Format HH:MM)'); 
						} ?> 
						<?php echo $form->textField($Rks,'waktu_evaluasi_penawaran1',array('size'=>56,'maxlength'=>20)); ?>
						<?php echo $form->error($Rks,'waktu_evaluasi_penawaran1'); ?>
					</div>
					<div class="row">
						<?php if ($Pengadaan->metode_penawaran=="Satu Sampul") {
							echo $form->labelEx($Rks,'tempat_evaluasi_penawaran'); 
						} else if ($Pengadaan->metode_penawaran=="Dua Sampul") {
							echo $form->labelEx($Rks,'tempat_evaluasi_penawaran sampul 1'); 
						} else if ($Pengadaan->metode_penawaran=="Dua Tahap") {
							echo $form->labelEx($Rks,'tempat_evaluasi_penawaran tahap 1'); 
						} ?> 
						<?php echo $form->textArea($Rks,'tempat_evaluasi_penawaran1',array('cols'=>43,'rows'=>3, 'maxlength'=>100)); ?>
						<?php echo $form->error($Rks,'tempat_evaluasi_penawaran1'); ?>
					</div>
				</div>
				<br/>
				
				<?php if ($Pengadaan->metode_penawaran=="Dua Sampul") { ?>
					<div style="border:2px solid lightblue; padding:10px; background-color:lightgrey">		
						<div class="row">
							<?php echo $form->labelEx($Rks,'tanggal_pembukaan_penawaran sampul 2');?> 
							<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
								'model'=>$Rks,
								'attribute'=>'tanggal_pembukaan_penawaran2',
								'value'=>$Rks->tanggal_pembukaan_penawaran2,
								'htmlOptions'=>array('size'=>56),
								'options'=>array(
								'dateFormat'=>'dd-mm-yy',
								),
							));?>
							<?php echo $form->error($Rks,'tanggal_pembukaan_penawaran2'); ?>
						</div>
					
						<div class="row">
							<?php echo $form->labelEx($Rks,'waktu_pembukaan_penawaran sampul 2 (Format HH:MM)'); ?> 
							<?php echo $form->textField($Rks,'waktu_pembukaan_penawaran2',array('size'=>56,'maxlength'=>20)); ?>
							<?php echo $form->error($Rks,'waktu_pembukaan_penawaran2'); ?>
						</div>
						
						<div class="row">
							<?php echo $form->labelEx($Rks,'tempat_pembukaan_penawaran sampul 2'); ?> 
							<?php echo $form->textArea($Rks,'tempat_pembukaan_penawaran2',array('cols'=>43,'rows'=>3, 'maxlength'=>100)); ?>
							<?php echo $form->error($Rks,'tempat_pembukaan_penawaran2'); ?>
						</div>
					</div>
					<br/>

					<div style="border:2px solid lightblue; padding:10px; background-color:lightgrey">
						<div class="row">
							<?php echo $form->labelEx($Rks,'tanggal_evaluasi_penawaran sampul 2');?> 
							<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
								'model'=>$Rks,
								'attribute'=>'tanggal_evaluasi_penawaran2',
								'value'=>$Rks->tanggal_evaluasi_penawaran2,
								'htmlOptions'=>array('size'=>56),
								'options'=>array(
								'dateFormat'=>'dd-mm-yy',
								),
							));?>
							<?php echo $form->error($Rks,'tanggal_evaluasi_penawaran2'); ?>
						</div>
					
						<div class="row">
							<?php echo $form->labelEx($Rks,'waktu_evaluasi_penawaran sampul 2 (Format HH:MM)'); ?> 
							<?php echo $form->textField($Rks,'waktu_evaluasi_penawaran2',array('size'=>56,'maxlength'=>20)); ?>
							<?php echo $form->error($Rks,'waktu_evaluasi_penawaran2'); ?>
						</div>
						
						<div class="row">
							<?php echo $form->labelEx($Rks,'tempat_evaluasi_penawaran sampul 2'); ?> 
							<?php echo $form->textArea($Rks,'tempat_evaluasi_penawaran2',array('cols'=>43,'rows'=>3, 'maxlength'=>100)); ?>
							<?php echo $form->error($Rks,'tempat_evaluasi_penawaran2'); ?>
						</div>
					</div>
					<br/>
					
				<?php }	else if ($Pengadaan->metode_penawaran=="Dua Tahap") { ?>
					<div style="border:2px solid lightblue; padding:10px; background-color:lightgrey">
						<div class="row">
							<?php echo $form->labelEx($Rks,'tanggal_pemasukan_penawaran tahap 2'); ?> 
							<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
								'model'=>$Rks,
								'attribute'=>'tanggal_awal_pemasukan_penawaran2',
								'value'=>$Rks->tanggal_awal_pemasukan_penawaran2,
								'htmlOptions'=>array('size'=>23),
								'options'=>array(
								'dateFormat'=>'dd-mm-yy',
								),
							));?>
							<?php echo $form->error($Rks,'tanggal_awal_pemasukan_penawaran2'); ?>
							s/d
							<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
								'model'=>$Rks,
								'attribute'=>'tanggal_akhir_pemasukan_penawaran2',
								'value'=>$Rks->tanggal_akhir_pemasukan_penawaran2,
								'htmlOptions'=>array('size'=>23),
								'options'=>array(
								'dateFormat'=>'dd-mm-yy',
								),
							));?>
							<?php echo $form->error($Rks,'tanggal_akhir_pemasukan_penawaran2'); ?>
						</div>
						
						<div class="row">
							<?php echo $form->labelEx($Rks,'waktu_paling_lambat_pemasukan_penawaran tahap 2 (Format HH:MM)'); ?>
							<?php echo $form->textField($Rks,'waktu_pemasukan_penawaran2',array('size'=>56,'maxlength'=>20)); ?>
							<?php echo $form->error($Rks,'waktu_pemasukan_penawaran2'); ?>
						</div>

						<div class="row">
							<?php echo $form->labelEx($Rks,'tempat_pemasukan_penawaran tahap 2'); ?>
							<?php echo $form->textArea($Rks,'tempat_pemasukan_penawaran2',array('cols'=>43,'rows'=>3, 'maxlength'=>100)); ?>
							<?php echo $form->error($Rks,'tempat_pemasukan_penawaran2'); ?>
						</div>
					</div>
					<br/>

					<div style="border:2px solid lightblue; padding:10px; background-color:lightgrey">
						<div class="row">
							<?php echo $form->labelEx($Rks,'tanggal_pembukaan_penawaran tahap 2');?> 
							<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
								'model'=>$Rks,
								'attribute'=>'tanggal_pembukaan_penawaran2',
								'value'=>$Rks->tanggal_pembukaan_penawaran2,
								'htmlOptions'=>array('size'=>56),
								'options'=>array(
								'dateFormat'=>'dd-mm-yy',
								),
							));?>
							<?php echo $form->error($Rks,'tanggal_pembukaan_penawaran2'); ?>
						</div>
					
						<div class="row">
							<?php echo $form->labelEx($Rks,'waktu_pembukaan_penawaran tahap 2 (Format HH:MM)'); ?> 
							<?php echo $form->textField($Rks,'waktu_pembukaan_penawaran2',array('size'=>56,'maxlength'=>20)); ?>
							<?php echo $form->error($Rks,'waktu_pembukaan_penawaran2'); ?>
						</div>
						
						<div class="row">
							<?php echo $form->labelEx($Rks,'tempat_pembukaan_penawaran tahap 2'); ?> 
							<?php echo $form->textArea($Rks,'tempat_pembukaan_penawaran2',array('cols'=>43,'rows'=>3, 'maxlength'=>100)); ?>
							<?php echo $form->error($Rks,'tempat_pembukaan_penawaran2'); ?>
						</div>
					</div>
					<br/>
					
					<div style="border:2px solid lightblue; padding:10px; background-color:lightgrey">
						<div class="row">
							<?php echo $form->labelEx($Rks,'tanggal_evaluasi_penawaran tahap 2');?> 
							<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
								'model'=>$Rks,
								'attribute'=>'tanggal_evaluasi_penawaran2',
								'value'=>$Rks->tanggal_evaluasi_penawaran2,
								'htmlOptions'=>array('size'=>56),
								'options'=>array(
								'dateFormat'=>'dd-mm-yy',
								),
							));?>
							<?php echo $form->error($Rks,'tanggal_evaluasi_penawaran2'); ?>
						</div>
					
						<div class="row">
							<?php echo $form->labelEx($Rks,'waktu_evaluasi_penawaran tahap 2 (Format HH:MM)'); ?> 
							<?php echo $form->textField($Rks,'waktu_evaluasi_penawaran2',array('size'=>56,'maxlength'=>20)); ?>
							<?php echo $form->error($Rks,'waktu_evaluasi_penawaran2'); ?>
						</div>
						
						<div class="row">
							<?php echo $form->labelEx($Rks,'tempat_evaluasi_penawaran tahap 2'); ?> 
							<?php echo $form->textArea($Rks,'tempat_evaluasi_penawaran2',array('cols'=>43,'rows'=>3, 'maxlength'=>100)); ?>
							<?php echo $form->error($Rks,'tempat_evaluasi_penawaran2'); ?>
						</div>
					</div>
					<br/>
				<?php } ?>
				
				<div style="border:2px solid lightblue; padding:10px; background-color:lightgrey">
					<div class="row">
						<?php echo $form->labelEx($Rks,'tanggal_negosiasi'); ?>
						<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
							'model'=>$Rks,
							'attribute'=>'tanggal_negosiasi',
							'value'=>$Rks->tanggal_negosiasi,
							'htmlOptions'=>array('size'=>56),
							'options'=>array(
							'dateFormat'=>'dd-mm-yy',
							),
						));?>
						<?php echo $form->error($Rks,'tanggal_negosiasi'); ?>
					</div>
					
					<div class="row">
						<?php echo $form->labelEx($Rks,'waktu_negosiasi (Format HH:MM)'); ?>
						<?php echo $form->textField($Rks,'waktu_negosiasi',array('size'=>56,'maxlength'=>20)); ?>
						<?php echo $form->error($Rks,'waktu_negosiasi'); ?>
					</div>

					<div class="row">
						<?php echo $form->labelEx($Rks,'tempat_negosiasi'); ?>
						<?php echo $form->textArea($Rks,'tempat_negosiasi',array('cols'=>43,'rows'=>3, 'maxlength'=>100)); ?>
						<?php echo $form->error($Rks,'tempat_negosiasi'); ?>
					</div>
				</div>
				<br/>
				
				<div style="border:2px solid lightblue; padding:10px; background-color:lightgrey">
					<div class="row">
						<?php echo $form->labelEx($Rks,'tanggal_usulan_pemenang'); ?>
						<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
							'model'=>$Rks,
							'attribute'=>'tanggal_usulan_pemenang',
							'value'=>$Rks->tanggal_usulan_pemenang,
							'htmlOptions'=>array('size'=>56),
							'options'=>array(
							'dateFormat'=>'dd-mm-yy',
							),
						));?>
						<?php echo $form->error($Rks,'tanggal_usulan_pemenang'); ?>
					</div>
					
					<div class="row">
						<?php echo $form->labelEx($Rks,'waktu_usulan_pemenang (Format HH:MM)'); ?>
						<?php echo $form->textField($Rks,'waktu_usulan_pemenang',array('size'=>56,'maxlength'=>20)); ?>
						<?php echo $form->error($Rks,'waktu_usulan_pemenang'); ?>
					</div>
				</div>
				<br/>
				
				<div style="border:2px solid lightblue; padding:10px; background-color:lightgrey">
					<div class="row">
						<?php echo $form->labelEx($Rks,'tanggal_penetapan_pemenang'); ?>
						<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
							'model'=>$Rks,
							'attribute'=>'tanggal_penetapan_pemenang',
							'value'=>$Rks->tanggal_penetapan_pemenang,
							'htmlOptions'=>array('size'=>56),
							'options'=>array(
							'dateFormat'=>'dd-mm-yy',
							),
						));?>
						<?php echo $form->error($Rks,'tanggal_penetapan_pemenang'); ?>
					</div>
					
					<div class="row">
						<?php echo $form->labelEx($Rks,'waktu_penetapan_pemenang (Format HH:MM)'); ?>
						<?php echo $form->textField($Rks,'waktu_penetapan_pemenang',array('size'=>56,'maxlength'=>20)); ?>
						<?php echo $form->error($Rks,'waktu_penetapan_pemenang'); ?>
					</div>
				</div>
				<br/>
				
				<div style="border:2px solid lightblue; padding:10px; background-color:lightgrey">
					<div class="row">
						<?php echo $form->labelEx($Rks,'tanggal_pemberitahuan_pemenang'); ?>
						<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
							'model'=>$Rks,
							'attribute'=>'tanggal_pemberitahuan_pemenang',
							'value'=>$Rks->tanggal_pemberitahuan_pemenang,
							'htmlOptions'=>array('size'=>56),
							'options'=>array(
							'dateFormat'=>'dd-mm-yy',
							),
						));?>
						<?php echo $form->error($Rks,'tanggal_pemberitahuan_pemenang'); ?>
					</div>
					
					<div class="row">
						<?php echo $form->labelEx($Rks,'waktu_pemberitahuan_pemenang (Format HH:MM)'); ?>
						<?php echo $form->textField($Rks,'waktu_pemberitahuan_pemenang',array('size'=>56,'maxlength'=>20)); ?>
						<?php echo $form->error($Rks,'waktu_pemberitahuan_pemenang'); ?>
					</div>
				</div>
				<br/>
				
				<div style="border:2px solid lightblue; padding:10px; background-color:lightgrey">
					<div class="row">
						<?php echo $form->labelEx($Rks,'tanggal_penunjukan_pemenang'); ?>
						<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
							'model'=>$Rks,
							'attribute'=>'tanggal_penunjukan_pemenang',
							'value'=>$Rks->tanggal_penunjukan_pemenang,
							'htmlOptions'=>array('size'=>56),
							'options'=>array(
							'dateFormat'=>'dd-mm-yy',
							),
						));?>
						<?php echo $form->error($Rks,'tanggal_penunjukan_pemenang'); ?>
					</div>
					
					<div class="row">
						<?php echo $form->labelEx($Rks,'waktu_penunjukan_pemenang (Format HH:MM)'); ?>
						<?php echo $form->textField($Rks,'waktu_penunjukan_pemenang',array('size'=>56,'maxlength'=>20)); ?>
						<?php echo $form->error($Rks,'waktu_penunjukan_pemenang'); ?>
					</div>
				</div>
				<br/>
				
				<div class="row buttons">
					<?php echo CHtml::submitButton($Rks->isNewRecord ? 'Simpan' : 'Perbarui',array('class'=>'sidafbutton')); ?>
				</div>

				<?php $this->endWidget(); ?>

			</div><!-- form -->
			
			<?php if (!$Rks->isNewRecord){ ?>
				</br>
				<div style="border-top:1px solid lightblue">
				<br/>
					<h4><b> Daftar Dokumen </b></h4>
					<ul class="generatedoc">
						<?php $Cover=RincianRks::model()->find('id_dokumen = '. $Rks->id_dokumen. ' and nama_rincian = "Cover"');?>
						<li><?php echo CHtml::link('RKS - Cover', array('docx/downloadrks','id'=>$Cover->id_rincian)); ?></li>
						<?php $DaftarIsi=RincianRks::model()->find('id_dokumen = '. $Rks->id_dokumen. ' and nama_rincian = "Daftar Isi"');?>
						<li><?php echo CHtml::link('RKS - Daftar Isi', array('docx/downloadrks','id'=>$DaftarIsi->id_rincian)); ?></li>
						<?php $Isi=RincianRks::model()->find('id_dokumen = '. $Rks->id_dokumen. ' and nama_rincian = "Isi"');?>
						<li><?php echo CHtml::link('RKS - Isi', array('docx/downloadrks','id'=>$Isi->id_rincian)); ?></li>
						<?php if ($Rks->tipe_rks==3) {
							$Lamp1=RincianRks::model()->find('id_dokumen = '. $Rks->id_dokumen. ' and nama_rincian = "Lampiran 1"');
							$Lamp2=RincianRks::model()->find('id_dokumen = '. $Rks->id_dokumen. ' and nama_rincian = "Lampiran 2"');
							$Lamp3=RincianRks::model()->find('id_dokumen = '. $Rks->id_dokumen. ' and nama_rincian = "Lampiran 3"');
							$Lamp4=RincianRks::model()->find('id_dokumen = '. $Rks->id_dokumen. ' and nama_rincian = "Lampiran 4"');
							$Lamp5=RincianRks::model()->find('id_dokumen = '. $Rks->id_dokumen. ' and nama_rincian = "Lampiran 5"');
							?>
							<li><?php echo CHtml::link('RKS - Lampiran 1', array('docx/downloadrks','id'=>$Lamp1->id_rincian)); ?></li>
							<li><?php echo CHtml::link('RKS - Lampiran 2', array('xlsx/downloadrks','id'=>$Lamp2->id_rincian)); ?></li>
							<li><?php echo CHtml::link('RKS - Lampiran 3', array('docx/downloadrks','id'=>$Lamp3->id_rincian)); ?></li>
							<li><?php echo CHtml::link('RKS - Lampiran 4', array('docx/downloadrks','id'=>$Lamp4->id_rincian)); ?></li>
							<li><?php echo CHtml::link('RKS - Lampiran 5', array('docx/downloadrks','id'=>$Lamp5->id_rincian)); ?></li>
						<?php } else if  ($Rks->tipe_rks==2) {
							$Lamp1=RincianRks::model()->find('id_dokumen = '. $Rks->id_dokumen. ' and nama_rincian = "Lampiran 1"');
							$Lamp2=RincianRks::model()->find('id_dokumen = '. $Rks->id_dokumen. ' and nama_rincian = "Lampiran 2"');
							$Lamp3=RincianRks::model()->find('id_dokumen = '. $Rks->id_dokumen. ' and nama_rincian = "Lampiran 3"');
							$Lamp4=RincianRks::model()->find('id_dokumen = '. $Rks->id_dokumen. ' and nama_rincian = "Lampiran 4"');
							$Lamp5=RincianRks::model()->find('id_dokumen = '. $Rks->id_dokumen. ' and nama_rincian = "Lampiran 5"');
							$Lamp6=RincianRks::model()->find('id_dokumen = '. $Rks->id_dokumen. ' and nama_rincian = "Lampiran 6"');
							$Lampba=RincianRks::model()->find('id_dokumen = '. $Rks->id_dokumen. ' and nama_rincian = "Lampiran ba"');
						?>
							<li><?php echo CHtml::link('RKS - Lampiran 1', array('docx/downloadrks','id'=>$Lamp1->id_rincian)); ?></li>
							<li><?php echo CHtml::link('RKS - Lampiran 2', array('xlsx/downloadrks','id'=>$Lamp2->id_rincian)); ?></li>
							<li><?php echo CHtml::link('RKS - Lampiran 3', array('xlsx/downloadrks','id'=>$Lamp3->id_rincian)); ?></li>
							<li><?php echo CHtml::link('RKS - Lampiran 4', array('docx/downloadrks','id'=>$Lamp4->id_rincian)); ?></li>
							<li><?php echo CHtml::link('RKS - Lampiran 5', array('xlsx/downloadrks','id'=>$Lamp5->id_rincian)); ?></li>
							<li><?php echo CHtml::link('RKS - Lampiran 6', array('docx/downloadrks','id'=>$Lamp6->id_rincian)); ?></li>
							<li><?php echo CHtml::link('RKS - Lampiran ba', array('xlsx/downloadrks','id'=>$Lampba->id_rincian)); ?></li>
						
						<?php } else {						
							$Lamp1=RincianRks::model()->find('id_dokumen = '. $Rks->id_dokumen. ' and nama_rincian = "Lampiran 1"');
							$Lamp2=RincianRks::model()->find('id_dokumen = '. $Rks->id_dokumen. ' and nama_rincian = "Lampiran 2"');
							$Lamp3=RincianRks::model()->find('id_dokumen = '. $Rks->id_dokumen. ' and nama_rincian = "Lampiran 3"');
							$Lamp4=RincianRks::model()->find('id_dokumen = '. $Rks->id_dokumen. ' and nama_rincian = "Lampiran 4"');
							$Lamp5=RincianRks::model()->find('id_dokumen = '. $Rks->id_dokumen. ' and nama_rincian = "Lampiran 5"');
							$Lamp6=RincianRks::model()->find('id_dokumen = '. $Rks->id_dokumen. ' and nama_rincian = "Lampiran 6"');
							$Lamp7=RincianRks::model()->find('id_dokumen = '. $Rks->id_dokumen. ' and nama_rincian = "Lampiran 7"');
							$Lampba=RincianRks::model()->find('id_dokumen = '. $Rks->id_dokumen. ' and nama_rincian = "Lampiran ba"');
						?>
							<li><?php echo CHtml::link('RKS - Lampiran 1', array('docx/downloadrks','id'=>$Lamp1->id_rincian)); ?></li>
							<li><?php echo CHtml::link('RKS - Lampiran 2', array('xlsx/downloadrks','id'=>$Lamp2->id_rincian)); ?></li>
							<li><?php echo CHtml::link('RKS - Lampiran 3', array('xlsx/downloadrks','id'=>$Lamp3->id_rincian)); ?></li>
							<li><?php echo CHtml::link('RKS - Lampiran 4', array('docx/downloadrks','id'=>$Lamp4->id_rincian)); ?></li>
							<li><?php echo CHtml::link('RKS - Lampiran 5', array('docx/downloadrks','id'=>$Lamp5->id_rincian)); ?></li>
							<li><?php echo CHtml::link('RKS - Lampiran 6', array('xlsx/downloadrks','id'=>$Lamp6->id_rincian)); ?></li>
							<li><?php echo CHtml::link('RKS - Lampiran 7', array('docx/downloadrks','id'=>$Lamp7->id_rincian)); ?></li>
							<li><?php echo CHtml::link('RKS - Lampiran ba', array('xlsx/downloadrks','id'=>$Lampba->id_rincian)); ?></li>
						<?php } ?>
						<?php if ($Pengadaan->jenis_kualifikasi=="Pasca Kualifikasi") { ?>
							<li><?php echo CHtml::link('Pakta Integritas Penyedia', array('docx/download','id'=>$X1->id_dokumen)); ?></li>
							<li><?php echo CHtml::link('Surat Pengantar Penawaran Harga', array('docx/download','id'=>$X2->id_dokumen)); ?></li>
							<li><?php echo CHtml::link('Surat Pernyataan Minat', array('docx/download','id'=>$X3->id_dokumen)); ?></li>
							<li><?php echo CHtml::link('Form Isian Kualifikasi', array('docx/download','id'=>$X4->id_dokumen)); ?></li>
						<?php } ?>
					</ul>
				</div>
			<?php } ?>
			
		<?php }
		?>
	</div>
</div>

<div><?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'class'=>'sidafbutton'));  ?></div>
