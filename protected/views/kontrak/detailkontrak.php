<?php
/* @var $this KontrakController */
$id = Yii::app()->getRequest()->getQuery('id');


$this->pageTitle=Yii::app()->name . ' | ' . $suratkontrak->idDokumen->nama_dokumen;
$dataProvider = new CActiveDataProvider(Dokumen::model(), array(
	'criteria'=>array(
		'condition'=>'id_pengadaan = "' . $id . '"',
		'order'=>'id_dokumen ASC',
	),
));
?>
<?php if(Yii::app()->user->getState('role') == 'kdivmum' && $suratkontrak!=null ){?>
	<div id="detailkontrak">
		<h1 style="text-align:center;"><?php echo $suratkontrak->idDokumen->nama_dokumen; ?></h1>
		<br />
		<div style="width:60%; margin:auto;">
			<?php 	$this->widget('zii.widgets.CDetailView', array(
						'id'=>'viewdetail',
						'data'=>$suratkontrak,
						'attributes'=>array(
							array(
								'label'=>'Judul kontrak',
								'value'=>$suratkontrak->idDokumen->nama_dokumen,
							),
							array(
								'label'=>'Pemohon',
								'value'=>$suratkontrak->username,
							),
							array(
								'label'=>'Nomor kontrak',
								'value'=>$suratkontrak->nomor,
							),					
							array(
								'label'=>'Tanggal mulai',
								'value'=>$suratkontrak->tanggal_mulai,
							),
							array(
								'label'=>'Tanggal selesai',
								'value'=>$suratkontrak->tanggal_selesai,
							),
							array(
								'label'=>'Jangka waktu',
								'value'=>$suratkontrak->jangka_waktu,
							),
							array(
								'label'=>'Nilai kontrak',
								'value'=>$suratkontrak->nilai_kontrak,
							),							
							array(
								'label'=>'Lokasi file',
								'value'=>$suratkontrak->lokasi_file,
							),
							array(
								'label'=>'No rekening',
								'value'=>$suratkontrak->no_rek,
							),				
						),
					));
				
			?>
		</div>	
		<br /><br /><br /><br />
	</div>
	
	<?php }else{?>
	<?php
	
		echo ('Surat Kontrak belum selesai dibuat'); 
	?>
	<?php } ?>
	<br/><br/><br/>
	<?php
	echo CHtml::button('Kembali', array('submit'=>array('kontrak/dashboardkontrak'), 'class'=>'sidafbutton')); 
	?>
	