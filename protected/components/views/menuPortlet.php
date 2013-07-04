<?php 
/* @var $this SiteController */

	$id = Yii::app()->getRequest()->getQuery('id');
	$cpengadaan = Pengadaan::model()->find('id_pengadaan = "' . $id . '"');
?>
<ul>
		
	<?php if(Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')){ ?>
		<?php if($cpengadaan->status == '0') { ?>
				<li class='onprogress' ><?php echo CHtml::link('Pembuatan Dokumen Pengadaan',array("site/penentuanmetode","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } else if($cpengadaan->status == '1') { ?>
				<li class='onprogress' ><?php echo CHtml::link('Pembuatan Dokumen Pengadaan',array("site/rks","id"=>"$cpengadaan->id_pengadaan")); ?></li>	
		<?php } else if($cpengadaan->status == '2') { ?>
				<li class='onprogress' ><?php echo CHtml::link('Pembuatan Dokumen Pengadaan',array("site/hps","id"=>"$cpengadaan->id_pengadaan")); ?></li>	
		<?php } else { ?>
			<li class='sudah' > <?php echo CHtml::link('Pembuatan Dokumen Pengadaan',array("site/edithps","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } ?>
		
		<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1'||$cpengadaan->status == '2') { ?>
				<li class='belum'><?php echo 'Kualifikasi' ?></li>
			<?php } else if($cpengadaan->status == '3') { ?>
				<li class='onprogress'><?php 
					if($cpengadaan->jenis_kualifikasi=='Pra Kualifikasi'){
						echo CHtml::link('Kualifikasi',array("site/prakualifikasi","id"=>"$cpengadaan->id_pengadaan")); 
					} else {
						echo CHtml::link('Kualifikasi',array("site/pascakualifikasi","id"=>"$cpengadaan->id_pengadaan"));
					}
				?></li>
			<?php } else { ?>
				<li class='sudah'><?php
					if($cpengadaan->jenis_kualifikasi=='Pra Kualifikasi'){
						echo CHtml::link('Kualifikasi',array("site/editprakualifikasi","id"=>"$cpengadaan->id_pengadaan")); 
					} else {
						echo CHtml::link('Kualifikasi',array("site/pascakualifikasi","id"=>"$cpengadaan->id_pengadaan"));
					} 
				?></li>
		<?php } ?>

		<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1' || $cpengadaan->status == '2'||$cpengadaan->status == '3') { ?>
				<li class='belum' ><?php echo 'Pengambilan Dokumen Pengadaan'?></li>
		<?php } else if($cpengadaan->status == '4') { ?>
				<li class='onprogress' ><?php echo CHtml::link('Pengambilan Dokumen Pengadaan',array("site/pengumumanpengadaan","id"=>"$cpengadaan->id_pengadaan")); ?></li>	
		<?php } else if($cpengadaan->status == '5') { ?>
			<li class='onprogress' > <?php echo CHtml::link('Pengambilan Dokumen Pengadaan',array("site/permintaanpenawaranharga","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } else { ?>
			<?php if($cpengadaan->metode_pengadaan=='Pelelangan'){ ?>
				<li class='sudah' ><?php echo CHtml::link('Pengambilan Dokumen Pengadaan',array("site/editpengumumanpengadaan","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else if ($cpengadaan->metode_pengadaan=='Penunjukan Langsung'||$cpengadaan->metode_pengadaan=='Pemilihan Langsung'){ ?>
				<li class='sudah' > <?php echo CHtml::link('Pengambilan Dokumen Pengadaan',array("site/editpermintaanpenawaranharga","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } ?>
		<?php } ?>
		
		<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1' || $cpengadaan->status == '2'||$cpengadaan->status == '3' || $cpengadaan->status == '4'||$cpengadaan->status == '5') { ?>
				<li class='belum'><?php echo 'Aanwijzing' ?></li>
			<?php } else if($cpengadaan->status == '7') { ?>
				<li class='onprogress'><?php echo CHtml::link('Aanwijzing',array("site/beritaacaraaanwijzing","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else { ?>
				<li class='sudah'><?php echo CHtml::link('Aanwijzing',array("site/editberitaacaraaanwijzing","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } ?>
		
		<?php if($cpengadaan->metode_penawaran=='Satu Sampul') { ?>
			<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1' || $cpengadaan->status == '2'||$cpengadaan->status == '3' || $cpengadaan->status == '4'||$cpengadaan->status == '5' || $cpengadaan->status == '6'||$cpengadaan->status == '7') { ?>
					<li class='belum'><?php echo 'Penawaran' ?></li>
				<?php } else if($cpengadaan->status == '8') { ?>
					<li class='onprogress'><?php echo CHtml::link('Penawaran',array("site/suratundanganpembukaanpenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } else if($cpengadaan->status == '9') { ?>
					<li class='onprogress'><?php echo CHtml::link('Penawaran',array("site/beritaacarapembukaanpenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } else { ?>
					<li class='sudah'><?php echo CHtml::link('Penawaran',array("site/editberitaacarapembukaanpenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } ?>
			<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1' || $cpengadaan->status == '2'||$cpengadaan->status == '3' || $cpengadaan->status == '4'||$cpengadaan->status == '5' || $cpengadaan->status == '6' || $cpengadaan->status == '7' || $cpengadaan->status == '8' || $cpengadaan->status == '9') { ?>
					<li class='belum'><?php echo 'Evaluasi' ?></li>
				<?php } else if($cpengadaan->status == '10') { ?>
					<li class='onprogress'><?php echo CHtml::link('Evaluasi',array("site/beritaacaraevaluasipenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } else { ?>
					<li class='sudah'><?php echo CHtml::link('Evaluasi',array("site/editberitaacaraevaluasipenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } ?>
			
		<?php } else if($cpengadaan->metode_penawaran=='Dua Sampul') { ?>
			<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1' || $cpengadaan->status == '2'||$cpengadaan->status == '3' || $cpengadaan->status == '4'||$cpengadaan->status == '5' || $cpengadaan->status == '6'||$cpengadaan->status == '7') { ?>
					<li class='belum'><?php echo 'Penawaran Sampul Satu' ?></li>
				<?php } else if($cpengadaan->status == '8') { ?>
					<li class='onprogress'><?php echo CHtml::link('Penawaran Sampul Satu',array("site/suratundanganpembukaanpenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } else if($cpengadaan->status == '9') { ?>
					<li class='onprogress'><?php echo CHtml::link('Penawaran Sampul Satu',array("site/beritaacarapembukaanpenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } else { ?>
					<li class='sudah'><?php echo CHtml::link('Penawaran Sampul Satu',array("site/editberitaacarapembukaanpenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } ?>
			<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1' || $cpengadaan->status == '2'||$cpengadaan->status == '3' || $cpengadaan->status == '4'||$cpengadaan->status == '5' || $cpengadaan->status == '6'||$cpengadaan->status == '7' || $cpengadaan->status == '8' || $cpengadaan->status == '9') { ?>
					<li class='belum'><?php echo 'Evaluasi Sampul Satu' ?></li>
				<?php } else if($cpengadaan->status == '10') { ?>
					<li class='onprogress'><?php echo CHtml::link('Evaluasi Sampul Satu',array("site/beritaacaraevaluasipenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } else { ?>
					<li class='sudah'><?php echo CHtml::link('Evaluasi Sampul Satu',array("site/editberitaacaraevaluasipenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } ?>
			<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1' || $cpengadaan->status == '2'||$cpengadaan->status == '3' || $cpengadaan->status == '4'||$cpengadaan->status == '5' || $cpengadaan->status == '6'||$cpengadaan->status == '7' || $cpengadaan->status == '8' || $cpengadaan->status == '9' || $cpengadaan->status == '10') { ?>
					<li class='belum'><?php echo 'Penawaran Sampul Dua' ?></li>
				<?php } else if($cpengadaan->status == '11') { ?>
					<li class='onprogress'><?php echo CHtml::link('Penawaran Sampul Dua',array("site/suratundanganpembukaanpenawaran2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } else if($cpengadaan->status == '12') { ?>
					<li class='onprogress'><?php echo CHtml::link('Penawaran Sampul Dua',array("site/beritaacarapembukaanpenawaran2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } else { ?>
					<li class='sudah'><?php echo CHtml::link('Penawaran Sampul Dua',array("site/editberitaacarapembukaanpenawaran2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } ?>
			<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1' || $cpengadaan->status == '2'||$cpengadaan->status == '3' || $cpengadaan->status == '4'||$cpengadaan->status == '5' || $cpengadaan->status == '6'||$cpengadaan->status == '7' || $cpengadaan->status == '8' || $cpengadaan->status == '9' || $cpengadaan->status == '10' || $cpengadaan->status == '11' || $cpengadaan->status == '12') { ?>
					<li class='belum'><?php echo 'Evaluasi Sampul Dua' ?></li>
				<?php } else if($cpengadaan->status == '13') { ?>
					<li class='onprogress'><?php echo CHtml::link('Evaluasi Sampul Dua',array("site/beritaacaraevaluasipenawaran2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } else { ?>
					<li class='sudah'><?php echo CHtml::link('Evaluasi Sampul Dua',array("site/editberitaacaraevaluasipenawaran2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } ?>
			
		<?php } else if($cpengadaan->metode_penawaran=='Dua Tahap') { ?>
			<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1' || $cpengadaan->status == '2'||$cpengadaan->status == '3' || $cpengadaan->status == '4'||$cpengadaan->status == '5' || $cpengadaan->status == '6'||$cpengadaan->status == '7') { ?>
					<li class='belum'><?php echo 'Penawaran Tahap Satu' ?></li>
				<?php } else if($cpengadaan->status == '8') { ?>
					<li class='onprogress'><?php echo CHtml::link('Penawaran Tahap Satu',array("site/suratundanganpembukaanpenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } else if($cpengadaan->status == '9') { ?>
					<li class='onprogress'><?php echo CHtml::link('Penawaran Tahap Satu',array("site/beritaacarapembukaanpenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } else { ?>
					<li class='sudah'><?php echo CHtml::link('Penawaran Tahap Satu',array("site/editberitaacarapembukaanpenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } ?>
			<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1' || $cpengadaan->status == '2'||$cpengadaan->status == '3' || $cpengadaan->status == '4'||$cpengadaan->status == '5' || $cpengadaan->status == '6'||$cpengadaan->status == '7' || $cpengadaan->status == '8' || $cpengadaan->status == '9') { ?>
					<li class='belum'><?php echo 'Evaluasi Tahap Satu' ?></li>
				<?php } else if($cpengadaan->status == '10') { ?>
					<li class='onprogress'><?php echo CHtml::link('Evaluasi Tahap Satu',array("site/beritaacaraevaluasipenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } else { ?>
					<li class='sudah'><?php echo CHtml::link('Evaluasi Tahap Satu',array("site/editberitaacaraevaluasipenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } ?>
			<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1' || $cpengadaan->status == '2'||$cpengadaan->status == '3' || $cpengadaan->status == '4'||$cpengadaan->status == '5' || $cpengadaan->status == '6'||$cpengadaan->status == '7' || $cpengadaan->status == '8' || $cpengadaan->status == '9' || $cpengadaan->status == '10') { ?>
					<li class='belum'><?php echo 'Penawaran Tahap Dua' ?></li>
				<?php } else if($cpengadaan->status == '11') { ?>
					<li class='onprogress'><?php echo CHtml::link('Penawaran Tahap Dua',array("site/suratundanganpembukaanpenawaran2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } else if($cpengadaan->status == '12') { ?>
					<li class='onprogress'><?php echo CHtml::link('Penawaran Tahap Dua',array("site/beritaacarapembukaanpenawaran2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } else { ?>
					<li class='sudah'><?php echo CHtml::link('Penawaran Tahap Dua',array("site/editberitaacarapembukaanpenawaran2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } ?>
			<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1' || $cpengadaan->status == '2'||$cpengadaan->status == '3' || $cpengadaan->status == '4'||$cpengadaan->status == '5' || $cpengadaan->status == '6'||$cpengadaan->status == '7' || $cpengadaan->status == '8' || $cpengadaan->status == '9' || $cpengadaan->status == '10' || $cpengadaan->status == '11' || $cpengadaan->status == '12') { ?>
					<li class='belum'><?php echo 'Evaluasi Tahap Dua' ?></li>
				<?php } else if($cpengadaan->status == '13') { ?>
					<li class='onprogress'><?php echo CHtml::link('Evaluasi Tahap Dua',array("site/beritaacaraevaluasipenawaran2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } else { ?>
					<li class='sudah'><?php echo CHtml::link('Evaluasi Tahap Dua',array("site/editberitaacaraevaluasipenawaran2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } ?>
			
		<?php } else {?>
			<li class='belum'><?php echo 'Penawaran' ?></li>
			<li class='belum'><?php echo 'Evaluasi' ?></li>
		<?php } ?>
		
		<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1' || $cpengadaan->status == '2'||$cpengadaan->status == '3' || $cpengadaan->status == '4'||$cpengadaan->status == '5' || $cpengadaan->status == '6'||$cpengadaan->status == '7' || $cpengadaan->status == '8'||$cpengadaan->status == '9' || $cpengadaan->status == '10'||$cpengadaan->status == '11' || $cpengadaan->status == '12'||$cpengadaan->status == '13') { ?>
				<li class='belum'><?php echo 'Negosiasi dan Klarifikasi' ?></li>
			<?php } else if($cpengadaan->status == '14') { ?>
				<li class='onprogress'><?php echo CHtml::link('Negosiasi dan Klarifikasi',array("site/suratundangannegosiasiklarifikasi","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else if($cpengadaan->status == '15') { ?>
				<li class='onprogress'><?php echo CHtml::link('Negosiasi dan Klarifikasi',array("site/beritaacaranegosiasiklarifikasi","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else { ?>
				<li class='sudah'><?php echo CHtml::link('Negosiasi dan Klarifikasi',array("site/editberitaacaranegosiasiklarifikasi","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } ?>
		
		<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1' || $cpengadaan->status == '2'||$cpengadaan->status == '3' || $cpengadaan->status == '4'||$cpengadaan->status == '5' || $cpengadaan->status == '6'||$cpengadaan->status == '7' || $cpengadaan->status == '8'||$cpengadaan->status == '9' || $cpengadaan->status == '10'||$cpengadaan->status == '11' || $cpengadaan->status == '12'||$cpengadaan->status == '13' || $cpengadaan->status == '14'||$cpengadaan->status == '15') { ?>
				<li class='belum'><?php echo 'Penentuan Pemenang' ?></li>
			<?php } else if($cpengadaan->status == '16') { ?>
				<li class='onprogress'><?php echo CHtml::link('Penentuan Pemenang',array("site/notadinasusulanpemenang","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else if($cpengadaan->status == '17') { ?>
				<li class='onprogress'><?php echo CHtml::link('Penentuan Pemenang',array("site/notadinaspenetapanpemenang","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else if($cpengadaan->status == '18') { ?>
				<li class='onprogress'><?php echo CHtml::link('Penentuan Pemenang',array("site/notadinaspemberitahuanpemenang","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else if($cpengadaan->status == '19') { ?>
				<li class='onprogress'><?php echo CHtml::link('Penentuan Pemenang',array("site/suratpengumumanpelelangan","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else if($cpengadaan->status == '20') { ?>
				<li class='onprogress'><?php echo CHtml::link('Penentuan Pemenang',array("site/suratpenunjukanpemenang","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else { ?>
				<li class='sudah'><?php echo CHtml::link('Penentuan Pemenang',array("site/editsuratpenunjukanpemenang","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } ?>
		
		<br /> 
		
		<li class='unggah'><?php echo CHtml::link('Unggah Dokumen',array("site/uploader","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<li class='lihat'><?php echo CHtml::link('Lihat Dokumen',array("site/dokumengenerator","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		
		<br />

		<div style="background-color:lightblue; border:1px solid black; overflow:hidden;">

			<h5 style="margin:5px;">Detil <?php echo ucwords($cpengadaan->nama_pengadaan); ?></h5>

			<div style="margin-left:-3px;">
				<?php $this->widget('zii.widgets.CDetailView', array(
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
						),
					));
				?>
			</div>
		</div>

		<br />
		<br />
		
		<li class='sudah' style="border-top:1px solid black;"><?php echo CHtml::link('Batalkan Pengadaan',array("site/checkpoint2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
	
	<?php } ?>
	
	
</ul>