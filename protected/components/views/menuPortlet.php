<?php 
/* @var $this SiteController */

	$id = Yii::app()->getRequest()->getQuery('id');
	$cpengadaan = Pengadaan::model()->find('id_pengadaan = "' . $id . '"');
?>
<ul>
		
	<?php if(Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')){ ?>
		<?php if($cpengadaan->status == 'Penunjukan Panitia') { ?>
				<li class='onprogress' ><?php echo CHtml::link('Penunjukan Panitia',array("site/penunjukanpanitia","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else { ?>
				<li class='sudah' > <?php echo CHtml::link('Penunjukan Panitia',array("site/editpenunjukanpanitia","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } ?>
		
		<?php if($cpengadaan->status == 'Penunjukan Panitia') { ?>
				<li class='belum'><?php echo 'Kualifikasi' ?></li>
			<?php } else if($cpengadaan->status == 'Kualifikasi') { ?>
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
		
		<?php if(($cpengadaan->status == 'Penunjukan Panitia') || ($cpengadaan->status == 'Kualifikasi')) { ?>
				<li class='belum'><?php echo 'Pengambilan Dokumen Pengadaan' ?></li>
			<?php } else if($cpengadaan->status == 'Pengambilan Dokumen Pengadaan') { ?>
				<li class='onprogress'><?php echo CHtml::link('Pengambilan Dokumen Pengadaan',array("site/pengambilandokumenpengadaan","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else { ?>
				<li class='sudah'><?php echo CHtml::link('Pengambilan Dokumen Pengadaan',array("site/editpengambilandokumenpengadaan","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } ?>
		
		<?php if(($cpengadaan->status == 'Penunjukan Panitia') || ($cpengadaan->status == 'Kualifikasi')|| ($cpengadaan->status == 'Pengambilan Dokumen Pengadaan')) { ?>
				<li class='belum'><?php echo 'Annwijzing' ?></li>
			<?php } else if($cpengadaan->status == 'Aanwijzing') { ?>
				<li class='onprogress'><?php echo CHtml::link('Aanwijzing',array("site/aanwijzing","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else { ?>
				<li class='sudah'><?php echo CHtml::link('Aanwijzing',array("site/editaanwijzing","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } ?>
		
		<?php if($cpengadaan->metode_penawaran=='Satu Sampul') { ?>
			<?php if(($cpengadaan->status == 'Penunjukan Panitia') || ($cpengadaan->status == 'Kualifikasi')|| ($cpengadaan->status == 'Pengambilan Dokumen Pengadaan') || ($cpengadaan->status == 'Aanwijzing')) { ?>
					<li class='belum'><?php echo 'Penawaran dan Evaluasi' ?></li>
				<?php } else if($cpengadaan->status == 'Penawaran dan Evaluasi') { ?>
					<li class='onprogress'><?php echo CHtml::link('Penawaran dan Evaluasi',array("site/penawaranevaluasisatusampul","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } else { ?>
					<li class='sudah'><?php echo CHtml::link('Penawaran dan Evaluasi',array("site/editpenawaranevaluasisatusampul","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } ?>	
		<?php } else if($cpengadaan->metode_penawaran=='Dua Sampul') { ?>
			<?php if(($cpengadaan->status == 'Penunjukan Panitia') || ($cpengadaan->status == 'Kualifikasi')|| ($cpengadaan->status == 'Pengambilan Dokumen Pengadaan') || ($cpengadaan->status == 'Aanwijzing')) { ?>
					<li class='belum'><?php echo 'Penawaran dan Evaluasi' ?></li>
				<?php } else if($cpengadaan->status == 'Penawaran dan Evaluasi') { ?>
					<li class='onprogress'><?php echo CHtml::link('Penawaran dan Evaluasi',array("site/penawaranevaluasiduasampul","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } else { ?>
					<li class='sudah'><?php echo CHtml::link('Penawaran dan Evaluasi',array("site/editpenawaranevaluasiduasampul","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } ?>
		<?php } else if($cpengadaan->metode_penawaran=='Dua Tahap') { ?>
			<?php if(($cpengadaan->status == 'Penunjukan Panitia') || ($cpengadaan->status == 'Kualifikasi')|| ($cpengadaan->status == 'Pengambilan Dokumen Pengadaan') || ($cpengadaan->status == 'Aanwijzing')) { ?>
					<li class='belum'><?php echo 'Penawaran dan Evaluasi' ?></li>
				<?php } else if($cpengadaan->status == 'Penawaran dan Evaluasi') { ?>
					<li class='onprogress'><?php echo CHtml::link('Penawaran dan Evaluasi',array("site/penawaranevaluasiduatahap","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } else { ?>
					<li class='sudah'><?php echo CHtml::link('Penawaran dan Evaluasi',array("site/editpenawaranevaluasiduatahap","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } ?>
		<?php } else {?>
			<li class='belum'><?php echo 'Penawaran dan Evaluasi' ?></li>
		<?php } ?>
		
		<?php if(($cpengadaan->status == 'Penunjukan Panitia') || ($cpengadaan->status == 'Kualifikasi') || ($cpengadaan->status == 'Pengambilan Dokumen Pengadaan') || ($cpengadaan->status == 'Aanwijzing') || ($cpengadaan->status == 'Penawaran dan Evaluasi')) { ?>
				<li class='belum'><?php echo 'Negosiasi dan Klarifikasi' ?></li>
			<?php } else if($cpengadaan->status == 'Negosiasi dan Klarifikasi') { ?>
				<li class='onprogress'><?php echo CHtml::link('Negosiasi dan Klarifikasi',array("site/checkpoint2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else { ?>
				<li class='sudah'><?php echo CHtml::link('Negosiasi dan Klarifikasi',array("site/checkpoint2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } ?>
		
		<?php if(($cpengadaan->status == 'Penunjukan Panitia') || ($cpengadaan->status == 'Kualifikasi') || ($cpengadaan->status == 'Pengambilan Dokumen Pengadaan') || ($cpengadaan->status == 'Aanwijzing') || ($cpengadaan->status == 'Penawaran dan Evaluasi') || ($cpengadaan->status == 'Negosiasi dan Klarifikasi')) { ?>
				<li class='belum'><?php echo 'Penentuan Pemenang' ?></li>
			<?php } else if($cpengadaan->status == 'Penentuan Pemenang') { ?>
				<li class='onprogress'><?php echo CHtml::link('Penentuan Pemenang',array("site/checkpoint2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else { ?>
				<li class='sudah'><?php echo CHtml::link('Penentuan Pemenang',array("site/checkpoint2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } ?>
		
		<?php if(($cpengadaan->status == 'Penunjukan Panitia') || ($cpengadaan->status == 'Kualifikasi') || ($cpengadaan->status == 'Pengambilan Dokumen Pengadaan') || ($cpengadaan->status == 'Pengambilan Dokumen Pengadaan') || ($cpengadaan->status == 'Aanwijzing') || ($cpengadaan->status == 'Penawaran dan Evaluasi') || ($cpengadaan->status == 'Negosiasi dan Klarifikasi') || ($cpengadaan->status == 'Penawaran dan Evaluasi') || ($cpengadaan->status == 'Penentuan Pemenang')){ ?>
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