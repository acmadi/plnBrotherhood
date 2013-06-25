<?php
/* @var $this SiteController */

$id = Yii::app()->getRequest()->getQuery('id');
$cpengadaan = Pengadaan::model()->find('id_pengadaan = "' . $id . '"');
$this->pageTitle=Yii::app()->name . ' | ' . $cpengadaan->nama_pengadaan;
$dataProvider = new CActiveDataProvider(Dokumen::model(), array(
	'criteria'=>array(
		'condition'=>'id_pengadaan = "' . $id . '"',
		'order'=>'id_dokumen ASC',
	),
));
?>

<div id="detailpengadaan">
	<h1 style="text-align:center;"><?php echo $cpengadaan->nama_pengadaan; ?></h1>
	<div style="width:136px; margin:auto;">
		<?php if ($cpengadaan->status == 'Menunggu Pengarsipan') echo CHtml::button('Arsipkan Pengadaan', array('submit'=>array('site/detailpengadaan', 'id'=>$id), 'class'=>'sidafbutton')); ?>
	</div>
	<br />
	<div style="width:60%; margin:auto;">
		<?php
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
						'label'=>'Pagu anggaran',
						'value'=>'Rp. ' . $cpengadaan->notaDinasPerintahPengadaan->pagu_anggaran . ',00',
					),
					array(
						'label'=>'Sumber dana',
						'value'=>$cpengadaan->notaDinasPerintahPengadaan->sumber_dana,
					),
					array(
						'label'=>'Nomor nota dinas permintaan',
						'value'=>$cpengadaan->notaDinasPerintahPengadaan->nota_dinas_permintaan,
					),
					array(
						'label'=>'Status pengadaan',
						'value'=>$cpengadaan->status,
						'visible'=>$cpengadaan->status != 'Selesai',
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
		?>
	</div>

	<br /><br /><br /><br />
	
</div>

<div>
<div style="width:75%; margin:auto;">
	<?php
		$this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'list-dokumen-grid',
			'dataProvider'=>$dataProvider,
			"ajaxUpdate"=>"false",
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
		));
	?>
</div>

</div>

<?php 
	if($cpengadaan->status=="Selesai"){
		echo CHtml::button('Kembali', array('submit'=>array('site/history'), 'class'=>'sidafbutton')); 
	} else {
		echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'class'=>'sidafbutton')); 
	}
?>