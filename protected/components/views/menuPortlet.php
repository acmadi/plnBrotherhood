<?php 
/* @var $this SiteController */

	$id = Yii::app()->getRequest()->getQuery('id');
	$cpengadaan = Pengadaan::model()->find('id_pengadaan = "' . $id . '"');
?>
<ul>
		
	<?php if(Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')){ ?>
		<?php if($cpengadaan->status == '1') { ?>
				<li class='onprogress' ><?php echo CHtml::link('Pembuatan Dokumen Pengadaan',array("site/rks","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } else if($cpengadaan->status == '2') { ?>
				<li class='onprogress' ><?php echo CHtml::link('Pembuatan Dokumen Pengadaan',array("site/hps","id"=>"$cpengadaan->id_pengadaan")); ?></li>	
		<?php } else { ?>
			<li class='sudah' > <?php echo CHtml::link('Pembuatan Dokumen Pengadaan',array("site/edithps","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } ?>
		
		<?php if($cpengadaan->status == '1'||$cpengadaan->status == '2') { ?>
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
						echo CHtml::link('Kualifikasi',array("site/editpascakualifikasi","id"=>"$cpengadaan->id_pengadaan"));
					} 
				?></li>
		<?php } ?>
		
		<?php if($cpengadaan->status == '1' || $cpengadaan->status == '2'||$cpengadaan->status == '3') { ?>
				<li class='belum'><?php echo 'Pengambilan Dokumen Pengadaan' ?></li>
			<?php } else if($cpengadaan->status == '4') { ?>
				<li class='onprogress'><?php echo CHtml::link('Pengambilan Dokumen Pengadaan',array("site/pengambilandokumenpengadaan","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else if($cpengadaan->status == '5') { ?>
				<li class='onprogress'><?php echo CHtml::link('Pengambilan Dokumen Pengadaan',array("site/pengambilandokumenpengadaan","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else { ?>
				<li class='sudah'><?php echo CHtml::link('Pengambilan Dokumen Pengadaan',array("site/editpengambilandokumenpengadaan","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } ?>
		
		<?php if($cpengadaan->status == '1' || $cpengadaan->status == '2'||$cpengadaan->status == '3' || $cpengadaan->status == '4'||$cpengadaan->status == '5') { ?>
				<li class='belum'><?php echo 'Aanwijzing' ?></li>
			<?php } else if($cpengadaan->status == '6') { ?>
				<li class='onprogress'><?php echo CHtml::link('Aanwijzing',array("site/aanwijzing","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else if($cpengadaan->status == '7') { ?>
				<li class='onprogress'><?php echo CHtml::link('Aanwijzing',array("site/beritaacaraaanwijzing","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else { ?>
				<li class='sudah'><?php echo CHtml::link('Aanwijzing',array("site/editaanwijzing","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } ?>
		
		<?php if($cpengadaan->metode_penawaran=='Satu Sampul') { ?>
			<?php if($cpengadaan->status == '1' || $cpengadaan->status == '2'||$cpengadaan->status == '3' || $cpengadaan->status == '4'||$cpengadaan->status == '5' || $cpengadaan->status == '6'||$cpengadaan->status == '7' || $cpengadaan->status == '8') { ?>
					<li class='belum'><?php echo 'Penawaran dan Evaluasi' ?></li>
				<?php } else if($cpengadaan->status == '8') { ?>
					<li class='onprogress'><?php echo CHtml::link('Penawaran dan Evaluasi',array("site/suratundanganpembukaanpenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } else if($cpengadaan->status == '9') { ?>
					<li class='onprogress'><?php echo CHtml::link('Penawaran dan Evaluasi',array("site/beritaacarapembukaanpenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } else if($cpengadaan->status == '10') { ?>
					<li class='onprogress'><?php echo CHtml::link('Penawaran dan Evaluasi',array("site/beritaacaraevaluasipenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } else { ?>
					<li class='sudah'><?php echo CHtml::link('Penawaran dan Evaluasi',array("site/editberitaacaraevaluasipenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } ?>		
		<?php } else if($cpengadaan->metode_penawaran=='Dua Sampul') { ?>
			<?php if($cpengadaan->status == '1' || $cpengadaan->status == '2'||$cpengadaan->status == '3' || $cpengadaan->status == '4'||$cpengadaan->status == '5' || $cpengadaan->status == '6'||$cpengadaan->status == '7' || $cpengadaan->status == '8') { ?>
					<li class='belum'><?php echo 'Penawaran dan Evaluasi' ?></li>
				<?php } else if($cpengadaan->status == '8') { ?>
					<li class='onprogress'><?php echo CHtml::link('Penawaran dan Evaluasi',array("site/suratundanganpembukaanpenawaransampul1","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } else if($cpengadaan->status == '9') { ?>
					<li class='onprogress'><?php echo CHtml::link('Penawaran dan Evaluasi',array("site/beritaacarapembukaanpenawaransampul1","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } else if($cpengadaan->status == '10') { ?>
					<li class='onprogress'><?php echo CHtml::link('Penawaran dan Evaluasi',array("site/beritaacaraevaluasipenawaransampul1","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } else if($cpengadaan->status == '11') { ?>
					<li class='onprogress'><?php echo CHtml::link('Penawaran dan Evaluasi',array("site/suratundanganpembukaanpenawaransampul2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } else if($cpengadaan->status == '12') { ?>
					<li class='onprogress'><?php echo CHtml::link('Penawaran dan Evaluasi',array("site/beritaacarapembukaanpenawaransampul2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } else if($cpengadaan->status == '13') { ?>
					<li class='onprogress'><?php echo CHtml::link('Penawaran dan Evaluasi',array("site/beritaacaraevaluasipenawaransampul2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } else { ?>
					<li class='sudah'><?php echo CHtml::link('Penawaran dan Evaluasi',array("site/editberitaacaraevaluasipenawaransampul2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } ?>	
		<?php } else if($cpengadaan->metode_penawaran=='Dua Tahap') { ?>
			<?php if($cpengadaan->status == '1' || $cpengadaan->status == '2'||$cpengadaan->status == '3' || $cpengadaan->status == '4'||$cpengadaan->status == '5' || $cpengadaan->status == '6'||$cpengadaan->status == '7' || $cpengadaan->status == '8') { ?>
					<li class='belum'><?php echo 'Penawaran dan Evaluasi' ?></li>
				<?php } else if($cpengadaan->status == '8') { ?>
					<li class='onprogress'><?php echo CHtml::link('Penawaran dan Evaluasi',array("site/suratundanganpembukaanpenawarantahap1","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } else if($cpengadaan->status == '9') { ?>
					<li class='onprogress'><?php echo CHtml::link('Penawaran dan Evaluasi',array("site/beritaacarapembukaanpenawarantahap1","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } else if($cpengadaan->status == '10') { ?>
					<li class='onprogress'><?php echo CHtml::link('Penawaran dan Evaluasi',array("site/beritaacaraevaluasipenawarantahap1","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } else if($cpengadaan->status == '11') { ?>
					<li class='onprogress'><?php echo CHtml::link('Penawaran dan Evaluasi',array("site/suratundanganpembukaanpenawarantahap2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } else if($cpengadaan->status == '12') { ?>
					<li class='onprogress'><?php echo CHtml::link('Penawaran dan Evaluasi',array("site/beritaacarapembukaanpenawarantahap2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } else if($cpengadaan->status == '13') { ?>
					<li class='onprogress'><?php echo CHtml::link('Penawaran dan Evaluasi',array("site/beritaacaraevaluasipenawarantahap2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } else { ?>
					<li class='sudah'><?php echo CHtml::link('Penawaran dan Evaluasi',array("site/editberitaacaraevaluasipenawarantahap2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } ?>
		<?php } else {?>
			<li class='belum'><?php echo 'Penawaran dan Evaluasi' ?></li>
		<?php } ?>
		
		<?php if($cpengadaan->status == '1' || $cpengadaan->status == '2'||$cpengadaan->status == '3' || $cpengadaan->status == '4'||$cpengadaan->status == '5' || $cpengadaan->status == '6'||$cpengadaan->status == '7' || $cpengadaan->status == '8'||$cpengadaan->status == '9' || $cpengadaan->status == '10'||$cpengadaan->status == '11' || $cpengadaan->status == '12'||$cpengadaan->status == '13') { ?>
				<li class='belum'><?php echo 'Negosiasi dan Klarifikasi' ?></li>
			<?php } else if($cpengadaan->status == '14') { ?>
				<li class='onprogress'><?php echo CHtml::link('Negosiasi dan Klarifikasi',array("site/suratundangannegosiasiklarifikasi","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else if($cpengadaan->status == '15') { ?>
				<li class='onprogress'><?php echo CHtml::link('Negosiasi dan Klarifikasi',array("site/beritaacaranegosiasiklarifikasi","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else { ?>
				<li class='sudah'><?php echo CHtml::link('Negosiasi dan Klarifikasi',array("site/editberitaacaranegosiasiklarifikasi","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } ?>
		
		<?php if($cpengadaan->status == '1' || $cpengadaan->status == '2'||$cpengadaan->status == '3' || $cpengadaan->status == '4'||$cpengadaan->status == '5' || $cpengadaan->status == '6'||$cpengadaan->status == '7' || $cpengadaan->status == '8'||$cpengadaan->status == '9' || $cpengadaan->status == '10'||$cpengadaan->status == '11' || $cpengadaan->status == '12'||$cpengadaan->status == '13' || $cpengadaan->status == '14'||$cpengadaan->status == '15') { ?>
				<li class='belum'><?php echo 'Penentuan Pemenang' ?></li>
			<?php } else if($cpengadaan->status == '16') { ?>
				<li class='onprogress'><?php echo CHtml::link('Penentuan Pemenang',array("site/checkpoint2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else if($cpengadaan->status == '17') { ?>
				<li class='onprogress'><?php echo CHtml::link('Penentuan Pemenang',array("site/checkpoint2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else if($cpengadaan->status == '18') { ?>
				<li class='onprogress'><?php echo CHtml::link('Penentuan Pemenang',array("site/checkpoint2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else if($cpengadaan->status == '19') { ?>
				<li class='onprogress'><?php echo CHtml::link('Penentuan Pemenang',array("site/checkpoint2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else if($cpengadaan->status == '20') { ?>
				<li class='onprogress'><?php echo CHtml::link('Penentuan Pemenang',array("site/checkpoint2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else { ?>
				<li class='sudah'><?php echo CHtml::link('Penentuan Pemenang',array("site/checkpoint2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } ?>
		
		<?php if($cpengadaan->status == '1' || $cpengadaan->status == '2'||$cpengadaan->status == '3' || $cpengadaan->status == '4'||$cpengadaan->status == '5' || $cpengadaan->status == '6'||$cpengadaan->status == '7' || $cpengadaan->status == '8'||$cpengadaan->status == '9' || $cpengadaan->status == '10'||$cpengadaan->status == '11' || $cpengadaan->status == '12'||$cpengadaan->status == '13' || $cpengadaan->status == '14'||$cpengadaan->status == '15' || $cpengadaan->status == '16'|| $cpengadaan->status == '17' || $cpengadaan->status == '18'||$cpengadaan->status == '19' || $cpengadaan->status == '20') { ?>
				<li class='belum'><?php echo 'Selesai' ?></li>
			<?php } else if($cpengadaan->status == 'Pengajuan Selesai') { ?>
				<li class='onprogress'><?php echo CHtml::link('Selesai',array("site/checkpoint2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else { ?>
				<li class='sudah'><?php echo CHtml::link('Selesai',array("site/checkpoint2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } ?>
		
		</br> 
		
		<li class='unggah'><?php echo CHtml::link('Unggah Dokumen',array("site/uploader","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<li class='lihat'><?php echo CHtml::link('Lihat Dokumen',array("site/dokumengenerator","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		
		</br></br>
		
		<li class='sudah'><?php echo CHtml::link('Pengadaan Gagal',array("site/checkpoint2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
	
	<?php } ?>
	
	
</ul>