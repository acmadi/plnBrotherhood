<?php 
/* @var $this SiteController */

	$id = Yii::app()->getRequest()->getQuery('id');
	$cpengadaan = Pengadaan::model()->find('id_pengadaan = "' . $id . '"');
?>

<ul>
	<?php if(Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')){ ?>
		<?php if($cpengadaan->status == '0') { ?>
				<li id="0" class='sudah' ><?php echo CHtml::link('Penentuan Metode',array("site/penentuanmetode","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } else { ?>
			<li id="0" class='sudah' > <?php echo CHtml::link('Penentuan Metode',array("site/editpenentuanmetode","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } ?>
		
		<?php if($cpengadaan->status == '0') { ?>
			<li class='belum'><?php echo 'Pembuatan Dokumen Pengadaan' ?></li>
		<?php } else if($cpengadaan->status == '1') { ?>
			<li id="1" class='sudah' ><?php echo CHtml::link('Pembuatan Dokumen Pengadaan',array("site/rks","id"=>"$cpengadaan->id_pengadaan")); ?></li>	
		<?php } else if($cpengadaan->status == '2') { ?>
			<li id="1" class='sudah' ><?php echo CHtml::link('Pembuatan Dokumen Pengadaan',array("site/hps","id"=>"$cpengadaan->id_pengadaan")); ?></li>	
		<?php } else { ?>
			<li id="1" class='sudah' > <?php echo CHtml::link('Pembuatan Dokumen Pengadaan',array("site/edithps","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } ?>
		
		<?php if ($cpengadaan->jenis_kualifikasi=="Pra Kualifikasi") { ?>
		
			<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1'||$cpengadaan->status == '2') { ?>
				<li class='belum' ><?php echo 'Dokumen Kualifikasi'?></li>
			<?php } else if($cpengadaan->status == '3') { ?>
				<li id="2" class='sudah' ><?php echo CHtml::link('Dokumen Kualifikasi',array("site/dokumenprakualifikasi","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else { ?>
				<li id="2" class='sudah' > <?php echo CHtml::link('Dokumen Kualifikasi',array("site/editdokumenprakualifikasi","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } ?>			
			
			<?php if($cpengadaan->metode_pengadaan=="Penunjukan Langsung"||$cpengadaan->metode_pengadaan=="Pemilihan Langsung") { ?>
				<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1'||$cpengadaan->status == '2'||$cpengadaan->status == '3') { ?>
					<li class='belum'><?php echo 'Undangan Prakualifikasi' ?></li>
				<?php } else if($cpengadaan->status == '4') { ?>
					<li id="3" class='sudah' ><?php echo CHtml::link('Undangan Prakualifikasi',array("site/suratundanganprakualifikasi","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } else { ?>
					<li id="3" class='sudah' ><?php echo CHtml::link('Undangan Prakualifikasi',array("site/editsuratundanganprakualifikasi","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } ?>
			<?php } else if ($cpengadaan->metode_pengadaan=="Pelelangan") { ?>
				<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1'||$cpengadaan->status == '2'||$cpengadaan->status == '3') { ?>
					<li class='belum'><?php echo 'Pengumuman dan Pendaftaran' ?></li>
				<?php } else if($cpengadaan->status == '5') { ?>
					<li id="4" class='sudah' ><?php echo CHtml::link('Pengumuman dan Pendaftaran',array("site/suratpengumumanpelelanganprakualifikasi","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } else if($cpengadaan->status == '6') { ?>
					<li id="4" class='sudah' ><?php echo CHtml::link('Pengumuman dan Pendaftaran',array("site/pendaftaranpelelanganprakualifikasi","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } else if($cpengadaan->status == '7') { ?>
					<li id="4" class='sudah' ><?php echo CHtml::link('Pengumuman dan Pendaftaran',array("site/pengambilandokumenprakualifikasi","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } else { ?>
					<li id="4" class='sudah' ><?php echo CHtml::link('Pengumuman dan Pendaftaran',array("site/editpengambilandokumenprakualifikasi","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } ?>
			<?php } ?>
		
			<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1'||$cpengadaan->status == '2'||$cpengadaan->status == '3'||$cpengadaan->status == '4'||$cpengadaan->status == '5'||$cpengadaan->status == '6'||$cpengadaan->status == '7') { ?>
				<li class='belum' ><?php echo 'Penyampaian dan Evaluasi Kualifikasi'?></li>
			<?php } else if($cpengadaan->status == '8') { ?>
				<li id="5" class='sudah' ><?php echo CHtml::link('Penyampaian dan Evaluasi Kualifikasi',array("site/penyampaiandokumenprakualifikasi","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else if($cpengadaan->status == '9') { ?>
				<li id="5" class='sudah' ><?php echo CHtml::link('Penyampaian dan Evaluasi Kualifikasi',array("site/evaluasidokumenprakualifikasi","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else { ?>
				<li id="5" class='sudah' ><?php echo CHtml::link('Penyampaian dan Evaluasi Kualifikasi',array("site/editevaluasidokumenprakualifikasi","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } ?>
			
			<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1'||$cpengadaan->status == '2'||$cpengadaan->status == '3'||$cpengadaan->status == '4'||$cpengadaan->status == '5'||$cpengadaan->status == '6'||$cpengadaan->status == '7'||$cpengadaan->status == '8'||$cpengadaan->status == '9') { ?>
				<li class='belum' ><?php echo 'Usulan dan Penetapan Hasil Kualifikasi'?></li>
			<?php } else if($cpengadaan->status == '10') { ?>
				<li id="6" class='sudah' ><?php echo CHtml::link('Usulan dan Penetapan Hasil Kualifikasi',array("site/usulanhasilprakualifikasi","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else if($cpengadaan->status == '11') { ?>
				<li id="6" class='sudah' ><?php echo CHtml::link('Usulan dan Penetapan Hasil Kualifikasi',array("site/penetapanhasilprakualifikasi","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else { ?>
				<li id="6" class='sudah' > <?php echo CHtml::link('Usulan dan Penetapan Hasil Kualifikasi',array("site/editpenetapanhasilprakualifikasi","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } ?>
			
			<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1'||$cpengadaan->status == '2'||$cpengadaan->status == '3'||$cpengadaan->status == '4'||$cpengadaan->status == '5'||$cpengadaan->status == '6'||$cpengadaan->status == '7'||$cpengadaan->status == '8'||$cpengadaan->status == '9'||$cpengadaan->status == '10'||$cpengadaan->status == '11') { ?>
				<li class='belum' ><?php echo 'Pengumuman Hasil Kualifikasi'?></li>
			<?php } else if($cpengadaan->status == '12') { ?>
				<li id="7" class='sudah' ><?php echo CHtml::link('Pengumuman Hasil Kualifikasi',array("site/pengumumanhasilprakualifikasi","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else { ?>
				<li id="7" class='sudah' > <?php echo CHtml::link('Pengumuman Hasil Kualifikasi',array("site/editpengumumanhasilprakualifikasi","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } ?>
		<?php } ?>

		<?php if ($cpengadaan->jenis_kualifikasi=="Pasca Kualifikasi") { ?>
			<?php if($cpengadaan->metode_pengadaan=='Pelelangan'){ ?>
				<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1'||$cpengadaan->status == '2'||$cpengadaan->status == '3'||$cpengadaan->status == '4'||$cpengadaan->status == '5'||$cpengadaan->status == '6'||$cpengadaan->status == '7'||$cpengadaan->status == '8'||$cpengadaan->status == '9'||$cpengadaan->status == '10'||$cpengadaan->status == '11'||$cpengadaan->status == '12'||$cpengadaan->status == '13'||$cpengadaan->status == '14'||$cpengadaan->status == '15') { ?>
					<li class='belum' ><?php echo 'Pengumuman dan Pendaftaran'?></li>
				<?php } else if($cpengadaan->status == '17') { ?>
					<li id="8" class='sudah' > <?php echo CHtml::link('Pengumuman dan Pendaftaran',array("site/suratpengumumanpelelangan","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } else if($cpengadaan->status == '18') { ?>
					<li id="8" class='sudah' > <?php echo CHtml::link('Pengumuman dan Pendaftaran',array("site/pendaftaranpelelangan","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } else { ?>
					<li id="8" class='sudah' > <?php echo CHtml::link('Pengumuman dan Pendaftaran',array("site/editpendaftaranpelelangan","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } ?>
			<?php } else if ($cpengadaan->metode_pengadaan=='Penunjukan Langsung'||$cpengadaan->metode_pengadaan=='Pemilihan Langsung'){ ?>
				<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1'||$cpengadaan->status == '2'||$cpengadaan->status == '3'||$cpengadaan->status == '4'||$cpengadaan->status == '5'||$cpengadaan->status == '6'||$cpengadaan->status == '7'||$cpengadaan->status == '8'||$cpengadaan->status == '9'||$cpengadaan->status == '10'||$cpengadaan->status == '11'||$cpengadaan->status == '12'||$cpengadaan->status == '13'||$cpengadaan->status == '14'||$cpengadaan->status == '15') { ?>
					<li class='belum' ><?php echo 'Undangan Permintaan Penawaran'?></li>
				<?php } else if($cpengadaan->status == '16') { ?>
					<li id="9" class='sudah' > <?php echo CHtml::link('Undangan Permintaan Penawaran',array("site/permintaanpenawaranharga","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } else { ?>
					<li id="9" class='sudah' > <?php echo CHtml::link('Undangan Permintaan Penawaran',array("site/editpermintaanpenawaranharga","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } ?>
			<?php } ?>
		<?php } ?>
		
		<?php if($cpengadaan->metode_pengadaan=='Pelelangan'){ ?>
			<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1'||$cpengadaan->status == '2'||$cpengadaan->status == '3'||$cpengadaan->status == '4'||$cpengadaan->status == '5'||$cpengadaan->status == '6'||$cpengadaan->status == '7'||$cpengadaan->status == '8'||$cpengadaan->status == '9'||$cpengadaan->status == '10'||$cpengadaan->status == '11'||$cpengadaan->status == '12'||$cpengadaan->status == '13'||$cpengadaan->status == '14'||$cpengadaan->status == '15') { ?>
				<li class='belum' ><?php echo 'Pengambilan Dokumen Pengadaan'?></li>
			<?php } else if($cpengadaan->status == '19') { ?>
				<li id="10" class='sudah' ><?php echo CHtml::link('Pengambilan Dokumen Pengadaan',array("site/pengambilandokumen","id"=>"$cpengadaan->id_pengadaan")); ?></li>	
			<?php } else { ?>
				<li id="10" class='sudah' ><?php echo CHtml::link('Pengambilan Dokumen Pengadaan',array("site/editpengambilandokumen","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } ?>
		<?php } ?>
		
		<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1'||$cpengadaan->status == '2'||$cpengadaan->status == '3'||$cpengadaan->status == '4'||$cpengadaan->status == '5'||$cpengadaan->status == '6'||$cpengadaan->status == '7'||$cpengadaan->status == '8'||$cpengadaan->status == '9'||$cpengadaan->status == '10'||$cpengadaan->status == '11'||$cpengadaan->status == '12'||$cpengadaan->status == '13'||$cpengadaan->status == '14'||$cpengadaan->status == '15'||$cpengadaan->status == '16'||$cpengadaan->status == '17'||$cpengadaan->status == '18'||$cpengadaan->status == '19') { ?>
				<li class='belum'><?php echo 'Aanwijzing' ?></li>
			<?php } else if($cpengadaan->status == '20') { ?>
				<li id="11" class='sudah'><?php echo CHtml::link('Aanwijzing',array("site/aanwijzing","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else if($cpengadaan->status == '21') { ?>
				<li id="11" class='sudah'><?php echo CHtml::link('Aanwijzing',array("site/beritaacaraaanwijzing","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else { ?>
				<li id="11" class='sudah'><?php echo CHtml::link('Aanwijzing',array("site/editberitaacaraaanwijzing","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } ?>
		
		<?php if($cpengadaan->metode_penawaran=='Satu Sampul') { ?>
			<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1'||$cpengadaan->status == '2'||$cpengadaan->status == '3'||$cpengadaan->status == '4'||$cpengadaan->status == '5'||$cpengadaan->status == '6'||$cpengadaan->status == '7'||$cpengadaan->status == '8'||$cpengadaan->status == '9'||$cpengadaan->status == '10'||$cpengadaan->status == '11'||$cpengadaan->status == '12'||$cpengadaan->status == '13'||$cpengadaan->status == '14'||$cpengadaan->status == '15'||$cpengadaan->status == '16'||$cpengadaan->status == '17'||$cpengadaan->status == '18'||$cpengadaan->status == '19'||$cpengadaan->status == '20'||$cpengadaan->status == '21') { ?>
				<li class='belum'><?php echo 'Penawaran' ?></li>
			<?php } else if($cpengadaan->status == '22') { ?>
				<li id="12" class='sudah'><?php echo CHtml::link('Penawaran',array("site/pembukaanpenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else if($cpengadaan->status == '23') { ?>
				<li id="12" class='sudah'><?php echo CHtml::link('Penawaran',array("site/beritaacarapembukaanpenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else { ?>
				<li id="12" class='sudah'><?php echo CHtml::link('Penawaran',array("site/editberitaacarapembukaanpenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } ?>
			
			<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1'||$cpengadaan->status == '2'||$cpengadaan->status == '3'||$cpengadaan->status == '4'||$cpengadaan->status == '5'||$cpengadaan->status == '6'||$cpengadaan->status == '7'||$cpengadaan->status == '8'||$cpengadaan->status == '9'||$cpengadaan->status == '10'||$cpengadaan->status == '11'||$cpengadaan->status == '12'||$cpengadaan->status == '13'||$cpengadaan->status == '14'||$cpengadaan->status == '15'||$cpengadaan->status == '16'||$cpengadaan->status == '17'||$cpengadaan->status == '18'||$cpengadaan->status == '19'||$cpengadaan->status == '20'||$cpengadaan->status == '21'||$cpengadaan->status == '22'||$cpengadaan->status == '23') { ?>
				<li class='belum'><?php echo 'Evaluasi' ?></li>
			<?php } else if($cpengadaan->status == '24') { ?>
				<li id="13" class='sudah'><?php echo CHtml::link('Evaluasi',array("site/evaluasipenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else if($cpengadaan->status == '25') { ?>
				<li id="13" class='sudah'><?php echo CHtml::link('Evaluasi',array("site/beritaacaraevaluasipenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else { ?>
				<li id="13" class='sudah'><?php echo CHtml::link('Evaluasi',array("site/editberitaacaraevaluasipenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } ?>
			
		<?php } else if($cpengadaan->metode_penawaran=='Dua Sampul') { ?>
			<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1'||$cpengadaan->status == '2'||$cpengadaan->status == '3'||$cpengadaan->status == '4'||$cpengadaan->status == '5'||$cpengadaan->status == '6'||$cpengadaan->status == '7'||$cpengadaan->status == '8'||$cpengadaan->status == '9'||$cpengadaan->status == '10'||$cpengadaan->status == '11'||$cpengadaan->status == '12'||$cpengadaan->status == '13'||$cpengadaan->status == '14'||$cpengadaan->status == '15'||$cpengadaan->status == '16'||$cpengadaan->status == '17'||$cpengadaan->status == '18'||$cpengadaan->status == '19'||$cpengadaan->status == '20'||$cpengadaan->status == '21') { ?>
				<li class='belum'><?php echo 'Penawaran Sampul Satu' ?></li>
			<?php } else if($cpengadaan->status == '22') { ?>
				<li id="12" class='sudah'><?php echo CHtml::link('Penawaran Sampul Satu',array("site/pembukaanpenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else if($cpengadaan->status == '23') { ?>
				<li id="12" class='sudah'><?php echo CHtml::link('Penawaran Sampul Satu',array("site/beritaacarapembukaanpenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else { ?>
				<li id="12" class='sudah'><?php echo CHtml::link('Penawaran Sampul Satu',array("site/editberitaacarapembukaanpenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } ?>
			
			<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1'||$cpengadaan->status == '2'||$cpengadaan->status == '3'||$cpengadaan->status == '4'||$cpengadaan->status == '5'||$cpengadaan->status == '6'||$cpengadaan->status == '7'||$cpengadaan->status == '8'||$cpengadaan->status == '9'||$cpengadaan->status == '10'||$cpengadaan->status == '11'||$cpengadaan->status == '12'||$cpengadaan->status == '13'||$cpengadaan->status == '14'||$cpengadaan->status == '15'||$cpengadaan->status == '16'||$cpengadaan->status == '17'||$cpengadaan->status == '18'||$cpengadaan->status == '19'||$cpengadaan->status == '20'||$cpengadaan->status == '21'||$cpengadaan->status == '22'||$cpengadaan->status == '23') { ?>
				<li class='belum'><?php echo 'Evaluasi Sampul Satu' ?></li>
			<?php } else if($cpengadaan->status == '24') { ?>
				<li id="13" class='sudah'><?php echo CHtml::link('Evaluasi Sampul Satu',array("site/evaluasipenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else if($cpengadaan->status == '25') { ?>
				<li id="13" class='sudah'><?php echo CHtml::link('Evaluasi Sampul Satu',array("site/beritaacaraevaluasipenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else { ?>
				<li id="13" class='sudah'><?php echo CHtml::link('Evaluasi Sampul Satu',array("site/editberitaacaraevaluasipenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } ?>
			
			<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1'||$cpengadaan->status == '2'||$cpengadaan->status == '3'||$cpengadaan->status == '4'||$cpengadaan->status == '5'||$cpengadaan->status == '6'||$cpengadaan->status == '7'||$cpengadaan->status == '8'||$cpengadaan->status == '9'||$cpengadaan->status == '10'||$cpengadaan->status == '11'||$cpengadaan->status == '12'||$cpengadaan->status == '13'||$cpengadaan->status == '14'||$cpengadaan->status == '15'||$cpengadaan->status == '16'||$cpengadaan->status == '17'||$cpengadaan->status == '18'||$cpengadaan->status == '19'||$cpengadaan->status == '20'||$cpengadaan->status == '21'||$cpengadaan->status == '22'||$cpengadaan->status == '23'||$cpengadaan->status == '24'||$cpengadaan->status == '25') { ?>
				<li class='belum'><?php echo 'Penawaran Sampul Dua' ?></li>
			<?php } else if($cpengadaan->status == '26') { ?>
				<li id="14" class='sudah'><?php echo CHtml::link('Penawaran Sampul Dua',array("site/pembukaanpenawaran2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else if($cpengadaan->status == '27') { ?>
				<li id="14" class='sudah'><?php echo CHtml::link('Penawaran Sampul Dua',array("site/beritaacarapembukaanpenawaran2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else { ?>
				<li id="14" class='sudah'><?php echo CHtml::link('Penawaran Sampul Dua',array("site/editberitaacarapembukaanpenawaran2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } ?>
			
			<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1'||$cpengadaan->status == '2'||$cpengadaan->status == '3'||$cpengadaan->status == '4'||$cpengadaan->status == '5'||$cpengadaan->status == '6'||$cpengadaan->status == '7'||$cpengadaan->status == '8'||$cpengadaan->status == '9'||$cpengadaan->status == '10'||$cpengadaan->status == '11'||$cpengadaan->status == '12'||$cpengadaan->status == '13'||$cpengadaan->status == '14'||$cpengadaan->status == '15'||$cpengadaan->status == '16'||$cpengadaan->status == '17'||$cpengadaan->status == '18'||$cpengadaan->status == '19'||$cpengadaan->status == '20'||$cpengadaan->status == '21'||$cpengadaan->status == '22'||$cpengadaan->status == '23'||$cpengadaan->status == '24'||$cpengadaan->status == '25'||$cpengadaan->status == '26'||$cpengadaan->status == '27') { ?>
				<li class='belum'><?php echo 'Evaluasi Sampul Dua' ?></li>
			<?php } else if($cpengadaan->status == '28') { ?>
				<li id="15" class='sudah'><?php echo CHtml::link('Evaluasi Sampul Dua',array("site/evaluasipenawaran2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else if($cpengadaan->status == '29') { ?>
				<li id="15" class='sudah'><?php echo CHtml::link('Evaluasi Sampul Dua',array("site/beritaacaraevaluasipenawaran2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else { ?>
				<li id="15" class='sudah'><?php echo CHtml::link('Evaluasi Sampul Dua',array("site/editberitaacaraevaluasipenawaran2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } ?>
				
		<?php } else if($cpengadaan->metode_penawaran=='Dua Tahap') { ?>
			<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1'||$cpengadaan->status == '2'||$cpengadaan->status == '3'||$cpengadaan->status == '4'||$cpengadaan->status == '5'||$cpengadaan->status == '6'||$cpengadaan->status == '7'||$cpengadaan->status == '8'||$cpengadaan->status == '9'||$cpengadaan->status == '10'||$cpengadaan->status == '11'||$cpengadaan->status == '12'||$cpengadaan->status == '13'||$cpengadaan->status == '14'||$cpengadaan->status == '15'||$cpengadaan->status == '16'||$cpengadaan->status == '17'||$cpengadaan->status == '18'||$cpengadaan->status == '19'||$cpengadaan->status == '20'||$cpengadaan->status == '21') { ?>
				<li class='belum'><?php echo 'Penawaran Tahap Satu' ?></li>
			<?php } else if($cpengadaan->status == '22') { ?>
				<li id="12" class='sudah'><?php echo CHtml::link('Penawaran Tahap SatuS',array("site/pembukaanpenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else if($cpengadaan->status == '23') { ?>
				<li id="12" class='sudah'><?php echo CHtml::link('Penawaran Tahap Satu',array("site/beritaacarapembukaanpenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else { ?>
				<li id="12" class='sudah'><?php echo CHtml::link('Penawaran Tahap Satu',array("site/editberitaacarapembukaanpenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } ?>
			
			<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1'||$cpengadaan->status == '2'||$cpengadaan->status == '3'||$cpengadaan->status == '4'||$cpengadaan->status == '5'||$cpengadaan->status == '6'||$cpengadaan->status == '7'||$cpengadaan->status == '8'||$cpengadaan->status == '9'||$cpengadaan->status == '10'||$cpengadaan->status == '11'||$cpengadaan->status == '12'||$cpengadaan->status == '13'||$cpengadaan->status == '14'||$cpengadaan->status == '15'||$cpengadaan->status == '16'||$cpengadaan->status == '17'||$cpengadaan->status == '18'||$cpengadaan->status == '19'||$cpengadaan->status == '20'||$cpengadaan->status == '21'||$cpengadaan->status == '22'||$cpengadaan->status == '23') { ?>
				<li class='belum'><?php echo 'Evaluasi Tahap Satu' ?></li>
			<?php } else if($cpengadaan->status == '24') { ?>
				<li id="13" class='sudah'><?php echo CHtml::link('Evaluasi Tahap Satu',array("site/evaluasipenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else if($cpengadaan->status == '25') { ?>
				<li id="13" class='sudah'><?php echo CHtml::link('Evaluasi Tahap Satu',array("site/beritaacaraevaluasipenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else { ?>
				<li id="13" class='sudah'><?php echo CHtml::link('Evaluasi Tahap Satu',array("site/editberitaacaraevaluasipenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } ?>
			
			<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1'||$cpengadaan->status == '2'||$cpengadaan->status == '3'||$cpengadaan->status == '4'||$cpengadaan->status == '5'||$cpengadaan->status == '6'||$cpengadaan->status == '7'||$cpengadaan->status == '8'||$cpengadaan->status == '9'||$cpengadaan->status == '10'||$cpengadaan->status == '11'||$cpengadaan->status == '12'||$cpengadaan->status == '13'||$cpengadaan->status == '14'||$cpengadaan->status == '15'||$cpengadaan->status == '16'||$cpengadaan->status == '17'||$cpengadaan->status == '18'||$cpengadaan->status == '19'||$cpengadaan->status == '20'||$cpengadaan->status == '21'||$cpengadaan->status == '22'||$cpengadaan->status == '23'||$cpengadaan->status == '24'||$cpengadaan->status == '25') { ?>
				<li class='belum'><?php echo 'Penawaran Tahap Dua' ?></li>
			<?php } else if($cpengadaan->status == '26') { ?>
				<li id="14" class='sudah'><?php echo CHtml::link('Penawaran Tahap Dua',array("site/pembukaanpenawaran2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else if($cpengadaan->status == '27') { ?>
				<li id="14" class='sudah'><?php echo CHtml::link('Penawaran Tahap Dua',array("site/beritaacarapembukaanpenawaran2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else { ?>
				<li id="14" class='sudah'><?php echo CHtml::link('Penawaran Tahap Dua',array("site/editberitaacarapembukaanpenawaran2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } ?>
			
			<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1'||$cpengadaan->status == '2'||$cpengadaan->status == '3'||$cpengadaan->status == '4'||$cpengadaan->status == '5'||$cpengadaan->status == '6'||$cpengadaan->status == '7'||$cpengadaan->status == '8'||$cpengadaan->status == '9'||$cpengadaan->status == '10'||$cpengadaan->status == '11'||$cpengadaan->status == '12'||$cpengadaan->status == '13'||$cpengadaan->status == '14'||$cpengadaan->status == '15'||$cpengadaan->status == '16'||$cpengadaan->status == '17'||$cpengadaan->status == '18'||$cpengadaan->status == '19'||$cpengadaan->status == '20'||$cpengadaan->status == '21'||$cpengadaan->status == '22'||$cpengadaan->status == '23'||$cpengadaan->status == '24'||$cpengadaan->status == '25'||$cpengadaan->status == '26'||$cpengadaan->status == '27') { ?>
				<li class='belum'><?php echo 'Evaluasi Tahap Dua' ?></li>
			<?php } else if($cpengadaan->status == '28') { ?>
				<li id="15" class='sudah'><?php echo CHtml::link('Evaluasi Tahap Dua',array("site/evaluasipenawaran2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else if($cpengadaan->status == '29') { ?>
				<li id="15" class='sudah'><?php echo CHtml::link('Evaluasi Tahap Dua',array("site/beritaacaraevaluasipenawaran2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else { ?>
				<li id="15" class='sudah'><?php echo CHtml::link('Evaluasi Tahap Dua',array("site/editberitaacaraevaluasipenawaran2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } ?>
		<?php } else {?>
			<li class='belum'><?php echo 'Penawaran' ?></li>
			<li class='belum'><?php echo 'Evaluasi' ?></li>
		<?php } ?>
		
		<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1'||$cpengadaan->status == '2'||$cpengadaan->status == '3'||$cpengadaan->status == '4'||$cpengadaan->status == '5'||$cpengadaan->status == '6'||$cpengadaan->status == '7'||$cpengadaan->status == '8'||$cpengadaan->status == '9'||$cpengadaan->status == '10'||$cpengadaan->status == '11'||$cpengadaan->status == '12'||$cpengadaan->status == '13'||$cpengadaan->status == '14'||$cpengadaan->status == '15'||$cpengadaan->status == '16'||$cpengadaan->status == '17'||$cpengadaan->status == '18'||$cpengadaan->status == '19'||$cpengadaan->status == '20'||$cpengadaan->status == '21'||$cpengadaan->status == '22'||$cpengadaan->status == '23'||$cpengadaan->status == '24'||$cpengadaan->status == '25'||$cpengadaan->status == '26'||$cpengadaan->status == '27'||$cpengadaan->status == '28'||$cpengadaan->status == '29') { ?>
			<li class='belum'><?php echo 'Klarifikasi dan Negosiasi' ?></li>
		<?php } else if($cpengadaan->status == '30') { ?>
			<li id="16" class='sudah'><?php echo CHtml::link('Klarifikasi dan Negosiasi',array("site/negosiasiklarifikasi","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } else if($cpengadaan->status == '31') { ?>
			<li id="16" class='sudah'><?php echo CHtml::link('Klarifikasi dan Negosiasi',array("site/beritaacaranegosiasiklarifikasi","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } else { ?>
			<li id="16" class='sudah'><?php echo CHtml::link('Klarifikasi dan Negosiasi',array("site/editberitaacaranegosiasiklarifikasi","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } ?>
		
		<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1'||$cpengadaan->status == '2'||$cpengadaan->status == '3'||$cpengadaan->status == '4'||$cpengadaan->status == '5'||$cpengadaan->status == '6'||$cpengadaan->status == '7'||$cpengadaan->status == '8'||$cpengadaan->status == '9'||$cpengadaan->status == '10'||$cpengadaan->status == '11'||$cpengadaan->status == '12'||$cpengadaan->status == '13'||$cpengadaan->status == '14'||$cpengadaan->status == '15'||$cpengadaan->status == '16'||$cpengadaan->status == '17'||$cpengadaan->status == '18'||$cpengadaan->status == '19'||$cpengadaan->status == '20'||$cpengadaan->status == '21'||$cpengadaan->status == '22'||$cpengadaan->status == '23'||$cpengadaan->status == '24'||$cpengadaan->status == '25'||$cpengadaan->status == '26'||$cpengadaan->status == '27'||$cpengadaan->status == '28'||$cpengadaan->status == '29'||$cpengadaan->status == '30'||$cpengadaan->status == '31') { ?>
			<li class='belum'><?php echo 'Penentuan Pemenang' ?></li>
		<?php } else if($cpengadaan->status == '32') { ?>
			<li id="17" class='sudah'><?php echo CHtml::link('Penentuan Pemenang',array("site/notadinasusulanpemenang","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } else if($cpengadaan->status == '33') { ?>
			<li id="17" class='sudah'><?php echo CHtml::link('Penentuan Pemenang',array("site/notadinaspenetapanpemenang","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } else if($cpengadaan->status == '34') { ?>
			<li id="17" class='sudah'><?php echo CHtml::link('Penentuan Pemenang',array("site/notadinaspemberitahuanpemenang","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } else if($cpengadaan->status == '35') { ?>
			<li id="17" class='sudah'><?php echo CHtml::link('Penentuan Pemenang',array("site/suratpengumumanpemenang","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } else if($cpengadaan->status == '36') { ?>
			<li id="17" class='sudah'><?php echo CHtml::link('Penentuan Pemenang',array("site/suratpenunjukanpemenang","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } else { ?>
			<li id="17" class='sudah'><?php echo CHtml::link('Penentuan Pemenang',array("site/editsuratpenunjukanpemenang","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } ?>
		
		<br/> 
		<br/>
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
							// array(
								// 'label'=>'Perihal',
								// 'value'=>$cpengadaan->notaDinasPerintahPengadaan->perihal,
							// ),
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