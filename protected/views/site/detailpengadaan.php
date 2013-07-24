<?php
/* @var $this SiteController */

$id = Yii::app()->getRequest()->getQuery('id');
$cpengadaan = Pengadaan::model()->find('id_pengadaan = "' . $id . '"');
$DokNDP = Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "Nota Dinas Permintaan"');

if($DokNDP!=null){
	$ndp = NotaDinasPermintaan::model()->findByPk($DokNDP->id_dokumen);
}

$DokTOR = Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "TOR"');
$DokRAB = Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "RAB"');
$DokHPS = Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "HPS"');

if($DokHPS!=null){
	$hps = HPS::model()->findByPk($DokHPS->id_dokumen);
}

$this->pageTitle=Yii::app()->name . ' | ' . $cpengadaan->nama_pengadaan;
$dataProvider = new CActiveDataProvider(Dokumen::model(), array(
	'criteria'=>array(
		'condition'=>'id_pengadaan = "' . $id . '"',
		'order'=>'id_dokumen ASC',
	),
));
?>
<?php if(Yii::app()->user->getState('role') == 'divisi'){?>
	<div id="detailpengadaan">
		<h1 style="text-align:center;"><?php echo $cpengadaan->nama_pengadaan; ?></h1>
		<div style="width:136px; margin:auto;">
			<?php if ($cpengadaan->status == 'Menunggu Pengarsipan') echo CHtml::button('Arsipkan Pengadaan', array('submit'=>array('site/detailpengadaan', 'id'=>$id), 'class'=>'sidafbutton')); ?>
		</div>
		<br />
		<div style="width:60%; margin:auto;">
			<?php if ($cpengadaan->status!=-1) { 
					$this->widget('zii.widgets.CDetailView', array(
						'id'=>'viewdetail',
						'data'=>$cpengadaan,
						'attributes'=>array(
							array(
								'label'=>'Pemohon',
								'value'=>$cpengadaan->divisi_peminta,
							),
							array(
								'label'=>'Perihal',
								'value'=>$cpengadaan->notaDinasPermintaan->perihal,
							),
							array(
								'label'=>'Jenis pengadaan',
								'value'=>$cpengadaan->jenis_pengadaan,
							),					
							array(
								'label'=>'Metode pengadaan',
								'value'=>$cpengadaan->metode_pengadaan,
							),
							array(
								'label'=>'Metode penawaran',
								'value'=>$cpengadaan->metode_penawaran,
							),
							array(
								'label'=>'Jenis kualifikasi',
								'value'=>$cpengadaan->jenis_kualifikasi,
							),
							array(
								'label'=>'Nilai RAB',
								'value'=>$DokNDP!=null ? RupiahMaker::convertInt($ndp->nilai_biaya_rab) : '-',
							),							
							array(
								'label'=>'Pagu anggaran',
								'value'=>RupiahMaker::convertInt($cpengadaan->notaDinasPerintahPengadaan->pagu_anggaran),
							),
							array(
								'label'=>'Sumber dana',
								'value'=>$cpengadaan->notaDinasPerintahPengadaan->sumber_dana,
							),
							array(
								'label'=>'Nomor nota dinas permintaan',
								'value'=>$cpengadaan->notaDinasPermintaan->nomor,
							),
							array(
								'label'=>'Status pengadaan',
								'value'=>$cpengadaan->dapatkanStatus(),
								'visible'=>$cpengadaan->status != '100',
							),
							array(
								'label'=>'Nomor kontrak',
								'value'=>'-',
							),
							array(
								'label'=>'Target kontrak',
								'value'=>$cpengadaan->notaDinasPerintahPengadaan->targetSPK_kontrak . ' hari',
							),
							array(
								'label'=>'Penyedia',
								'value'=>$cpengadaan->nama_penyedia,
							),
							array(
								'label'=>'Nilai kontrak',
								'value'=>$cpengadaan->biaya,
							),
							array(
								'label'=>'PIC',
								'value'=>$cpengadaan->idPanitia->nama_panitia,
							),							
							
						),
					));
				}
			?>
		</div>	
		
		<br /><br /><br /><br />
		
	</div>
<?php } else{?>
	<div id="detailpengadaan">
		<h1 style="text-align:center;"><?php echo $cpengadaan->nama_pengadaan; ?></h1>
		<div style="width:136px; margin:auto;">
			<?php if ($cpengadaan->status == 'Menunggu Pengarsipan') echo CHtml::button('Arsipkan Pengadaan', array('submit'=>array('site/detailpengadaan', 'id'=>$id), 'class'=>'sidafbutton')); ?>
		</div>
		<br />
		<div style="width:60%; margin:auto;">
			<?php if ($cpengadaan->status!=-1) { 
					$this->widget('zii.widgets.CDetailView', array(
						'id'=>'viewdetail',
						'data'=>$cpengadaan,
						'attributes'=>array(
							array(
								'label'=>'Pemohon',
								'value'=>$cpengadaan->divisi_peminta,
							),
							array(
								'label'=>'Perihal',
								'value'=>$cpengadaan->notaDinasPerintahPengadaan->perihal,
							),
							array(
								'label'=>'Jenis pengadaan',
								'value'=>$cpengadaan->jenis_pengadaan,
							),					
							array(
								'label'=>'Metode pengadaan',
								'value'=>$cpengadaan->metode_pengadaan,
							),
							array(
								'label'=>'Metode penawaran',
								'value'=>$cpengadaan->metode_penawaran,
							),
							array(
								'label'=>'Jenis kualifikasi',
								'value'=>$cpengadaan->jenis_kualifikasi,
							),
							array(
								'label'=>'Nilai RAB',
								'value'=>$DokNDP!=null ? RupiahMaker::convertInt($ndp->nilai_biaya_rab) : '-',
							),
							array(
								'label'=>'Nilai HPS',
								'value'=>$DokHPS!=null ? RupiahMaker::convertInt($hps->nilai_hps) : '-',
							),
							array(
								'label'=>'Pagu anggaran',
								'value'=>RupiahMaker::convertInt($cpengadaan->notaDinasPerintahPengadaan->pagu_anggaran),
							),
							array(
								'label'=>'Sumber dana',
								'value'=>$cpengadaan->notaDinasPerintahPengadaan->sumber_dana,
							),
							array(
								'label'=>'Nomor nota dinas permintaan',
								'value'=>$cpengadaan->notaDinasPermintaan->nomor,
							),
							array(
								'label'=>'Status pengadaan',
								'value'=>$cpengadaan->dapatkanStatus(),
								'visible'=>$cpengadaan->status != '100',
							),
							array(
								'label'=>'Nomor kontrak',
								'value'=>'-',
							),
							array(
								'label'=>'Target kontrak',
								'value'=>$cpengadaan->notaDinasPerintahPengadaan->targetSPK_kontrak . ' hari',
							),
							array(
								'label'=>'Penyedia',
								'value'=>$cpengadaan->nama_penyedia,
							),
							array(
								'label'=>'Nilai kontrak',
								'value'=>$cpengadaan->biaya,
							),
							array(
								'label'=>'PIC',
								'value'=>$cpengadaan->idPanitia->nama_panitia,
							),
						),
					));
				}
			?>
		</div>

		<br /><br /><br /><br />
		
	</div>
<?php }?>	




	<?php if ($cpengadaan->status==-1) { ?>
		<div style="width:55%;margin:auto">
			<?php if ($DokNDP->status_upload=="Selesai"&&$DokTOR->status_upload=="Selesai"&&$DokRAB->status_upload=="Selesai") {
					echo CHtml::button('Tunjuk PIC', array('submit'=>array('site/tunjukpanitia','id'=>$id), "class"=>'sidafbutton'));
				} else {
					echo '<span style="margin-left:50px"> </span>';
				}
				echo CHtml::button('Buat Nota Dinas Permintaan TOR atau RAB', array('submit'=>array(Dokumen::model()->find('id_pengadaan = '.$id.' and nama_dokumen = "Nota Dinas Permintaan TOR/RAB"')==null?'site/notadinaspermintaantorrab':'site/editnotadinaspermintaantorrab','id'=>$id), "class"=>'sidafbutton'));
				echo CHtml::button('Ubah Pengadaan', array('submit'=>array('site/edittambahpengadaan1','id'=>$id), "class"=>'sidafbutton'));
			?>
		</div>
	<?php } ?>
<div>
<?php if(Yii::app()->user->getState('role') == 'kdivmum'){ ?>
	<?php if ($cpengadaan->status==98){ ?>
		<div style="width:55%;margin:auto">
			Pengadaan ini telah diusulkan digagalkan oleh Panitia/Pejabat Pengadaan Barang/Jasa. Tekan tombol Batalkan Pengadaan di bawah untuk menggagalkan pengadaan.
		</div>
		<?php } ?>
	<div style="width:75%; margin:auto;">
		<?php
			$this->widget('zii.widgets.grid.CGridView', array(
				'id'=>'list-dokumen-grid',
				'dataProvider'=>$dataProvider,				
				'htmlOptions'=>array('style'=>'cursor: pointer;'),			
				'selectionChanged'=>"function(id){window.location='" . Yii::app()->createUrl(($cpengadaan->status == 'Selesai' ? "download/download" : "site/detaildokumen"), array("id"=>"$model->id_dokumen")) . "'+ $.fn.yiiGridView.getSelection(id);}",
				'columns'=>array(
					array(
						'name'=>'No',
						'value'=>'$this->grid->dataProvider->pagination->currentPage * 10 + $row + 1',
					),
					'nama_dokumen',
					array(
						'class'=>'CDataColumn',
						'header'=>'Status Unggah',
						'value'=>'$data->status_upload',
					),
				),
				'pager'=>array(
					'class'=>'CLinkPager',
					'header'=>'',
					'nextPageLabel'=>"Selanjutnya",
					'prevPageLabel'=>'Sebelumnya',
				),
				'summaryText' => '',
			));
		?>
	</div>
<?php } ?>
</div>

<?php 
	if($cpengadaan->status==100 || $cpengadaan->status==99){
		echo CHtml::button('Kembali', array('submit'=>array('site/history'), 'class'=>'sidafbutton')); 
	} else {
		echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'class'=>'sidafbutton')); 
	}
?>
<?php if(Yii::app()->user->getState('role') == 'kdivmum'){ ?>
		<?php if($cpengadaan->status==98){ ?>
				<div class="form">
					
					<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'batalkanpengadaan',
					'enableAjaxValidation'=>false,
					)); ?>
					
					<div class="row buttons">
						<?php echo CHtml::submitButton('Batalkan Pengadaan',array('class'=>'sidafbutton')); ?>
					</div>
					
					<?php $this->endWidget(); ?>
					
				</div>
		<?php } ?>
<?php } ?>
