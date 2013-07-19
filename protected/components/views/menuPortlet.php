<?php 
/* @var $this SiteController */

	$id = Yii::app()->getRequest()->getQuery('id');
	$cpengadaan = Pengadaan::model()->find('id_pengadaan = "' . $id . '"');
	
	$DokNDP = Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "Nota Dinas Permintaan"');	
	if($DokNDP!=null){
		$ndp = NotaDinasPermintaan::model()->findByPk($DokNDP->id_dokumen);
	}
	
	$DokHPS = Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "HPS"');
	if($DokHPS!=null){
		$hps = HPS::model()->findByPk($DokHPS->id_dokumen);
	}
	
?>

<ul>
	<?php if(Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')){ ?>
		<?php if($cpengadaan->status == '0') { ?>
				<li id="0" class='sudah' ><?php echo CHtml::link('Penentuan Metode',array("generator/penentuanmetode","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } else if($cpengadaan->status == '98') { ?>
			<li class='belum'><?php echo 'Penentuan Metode' ?></li>
		<?php } else { ?>
			<li id="0" class='sudah' > <?php echo CHtml::link('Penentuan Metode',array("generator/editpenentuanmetode","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } ?>
		
		<?php if($cpengadaan->status == '0'||$cpengadaan->status == '98') { ?>
			<li class='belum'><?php echo 'Pembuatan Dokumen Pengadaan' ?></li>
		<?php } else if($cpengadaan->status == '1') { ?>
			<li id="1" class='sudah' ><?php echo CHtml::link('Pembuatan Dokumen Pengadaan',array("generator/rks","id"=>"$cpengadaan->id_pengadaan")); ?></li>	
		<?php } else if($cpengadaan->status == '2') { ?>
			<li id="1" class='sudah' ><?php echo CHtml::link('Pembuatan Dokumen Pengadaan',array("generator/hps","id"=>"$cpengadaan->id_pengadaan")); ?></li>	
		<?php } else { ?>
			<li id="1" class='sudah' > <?php echo CHtml::link('Pembuatan Dokumen Pengadaan',array("generator/edithps","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } ?>
		
		<?php if ($cpengadaan->jenis_kualifikasi=="Pra Kualifikasi") { ?>
		
			<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1'||$cpengadaan->status == '2'||$cpengadaan->status == '3'||$cpengadaan->status == '98') { ?>
				<li class='belum' ><?php echo 'Dokumen Kualifikasi'?></li>
			<?php } else if($cpengadaan->status == '4') { ?>
				<li id="2" class='sudah' ><?php echo CHtml::link('Dokumen Kualifikasi',array("generator/dokumenprakualifikasi","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else { ?>
				<li id="2" class='sudah' > <?php echo CHtml::link('Dokumen Kualifikasi',array("generator/editdokumenprakualifikasi","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } ?>
			
			<?php if($cpengadaan->metode_pengadaan=="Penunjukan Langsung"||$cpengadaan->metode_pengadaan=="Pemilihan Langsung") { ?>
				<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1'||$cpengadaan->status == '2'||$cpengadaan->status == '3'||$cpengadaan->status == '4'||$cpengadaan->status == '98') { ?>
					<li class='belum'><?php echo 'Undangan Prakualifikasi' ?></li>
				<?php } else if($cpengadaan->status == '5') { ?>
					<li id="3" class='sudah' ><?php echo CHtml::link('Undangan Prakualifikasi',array("generator/suratundanganprakualifikasi","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } else { ?>
					<li id="3" class='sudah' ><?php echo CHtml::link('Undangan Prakualifikasi',array("generator/editsuratundanganprakualifikasi","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } ?>
			<?php } else if ($cpengadaan->metode_pengadaan=="Pelelangan") { ?>
				<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1'||$cpengadaan->status == '2'||$cpengadaan->status == '3'||$cpengadaan->status == '4'||$cpengadaan->status == '5'||$cpengadaan->status == '98') { ?>
					<li class='belum'><?php echo 'Pengumuman dan Pendaftaran' ?></li>
				<?php } else if($cpengadaan->status == '6') { ?>
					<li id="4" class='sudah' ><?php echo CHtml::link('Pengumuman dan Pendaftaran',array("generator/suratpengumumanpelelanganprakualifikasi","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } else if($cpengadaan->status == '7') { ?>
					<li id="4" class='sudah' ><?php echo CHtml::link('Pengumuman dan Pendaftaran',array("generator/pendaftaranpelelanganprakualifikasi","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } else if($cpengadaan->status == '8') { ?>
					<li id="4" class='sudah' ><?php echo CHtml::link('Pengumuman dan Pendaftaran',array("generator/pengambilandokumenprakualifikasi","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } else { ?>
					<li id="4" class='sudah' ><?php echo CHtml::link('Pengumuman dan Pendaftaran',array("generator/editpengambilandokumenprakualifikasi","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } ?>
			<?php } ?>
		
			<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1'||$cpengadaan->status == '2'||$cpengadaan->status == '3'||$cpengadaan->status == '4'||$cpengadaan->status == '5'||$cpengadaan->status == '6'||$cpengadaan->status == '7'||$cpengadaan->status == '8'||$cpengadaan->status == '98') { ?>
				<li class='belum' ><?php echo 'Penyampaian dan Evaluasi Kualifikasi'?></li>
			<?php } else if($cpengadaan->status == '9') { ?>
				<li id="5" class='sudah' ><?php echo CHtml::link('Penyampaian dan Evaluasi Kualifikasi',array("generator/penyampaiandokumenprakualifikasi","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else if($cpengadaan->status == '10') { ?>
				<li id="5" class='sudah' ><?php echo CHtml::link('Penyampaian dan Evaluasi Kualifikasi',array("generator/penyampaiandokumenprakualifikasi","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else if($cpengadaan->status == '11') { ?>
				<li id="5" class='sudah' ><?php echo CHtml::link('Penyampaian dan Evaluasi Kualifikasi',array("generator/evaluasidokumenprakualifikasi","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else if($cpengadaan->status == '12') { ?>
				<li id="5" class='sudah' ><?php echo CHtml::link('Penyampaian dan Evaluasi Kualifikasi',array("generator/evaluasidokumenprakualifikasi","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else { ?>
				<li id="5" class='sudah' ><?php echo CHtml::link('Penyampaian dan Evaluasi Kualifikasi',array("generator/editevaluasidokumenprakualifikasi","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } ?>
			
			<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1'||$cpengadaan->status == '2'||$cpengadaan->status == '3'||$cpengadaan->status == '4'||$cpengadaan->status == '5'||$cpengadaan->status == '6'||$cpengadaan->status == '7'||$cpengadaan->status == '8'||$cpengadaan->status == '9'||$cpengadaan->status == '10'||$cpengadaan->status == '11'||$cpengadaan->status == '12'||$cpengadaan->status == '98') { ?>
				<li class='belum' ><?php echo 'Usulan dan Penetapan Hasil Kualifikasi'?></li>
			<?php } else if($cpengadaan->status == '13') { ?>
				<li id="6" class='sudah' ><?php echo CHtml::link('Usulan dan Penetapan Hasil Kualifikasi',array("generator/usulanhasilprakualifikasi","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else if($cpengadaan->status == '14') { ?>
				<li id="6" class='sudah' ><?php echo CHtml::link('Usulan dan Penetapan Hasil Kualifikasi',array("generator/penetapanhasilprakualifikasi","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else { ?>
				<li id="6" class='sudah' > <?php echo CHtml::link('Usulan dan Penetapan Hasil Kualifikasi',array("generator/editpenetapanhasilprakualifikasi","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } ?>
			
			<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1'||$cpengadaan->status == '2'||$cpengadaan->status == '3'||$cpengadaan->status == '4'||$cpengadaan->status == '5'||$cpengadaan->status == '6'||$cpengadaan->status == '7'||$cpengadaan->status == '8'||$cpengadaan->status == '9'||$cpengadaan->status == '10'||$cpengadaan->status == '11'||$cpengadaan->status == '12'||$cpengadaan->status == '13'||$cpengadaan->status == '14'||$cpengadaan->status == '98') { ?>
				<li class='belum' ><?php echo 'Pengumuman Hasil Kualifikasi'?></li>
			<?php } else if($cpengadaan->status == '15') { ?>
				<li id="7" class='sudah' ><?php echo CHtml::link('Pengumuman Hasil Kualifikasi',array("generator/pengumumanhasilprakualifikasi","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else { ?>
				<li id="7" class='sudah' > <?php echo CHtml::link('Pengumuman Hasil Kualifikasi',array("generator/editpengumumanhasilprakualifikasi","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } ?>
		<?php } ?>

		<?php if ($cpengadaan->jenis_kualifikasi=="Pasca Kualifikasi") { ?>
			<?php if($cpengadaan->metode_pengadaan=='Pelelangan'){ ?>
				<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1'||$cpengadaan->status == '2'||$cpengadaan->status == '3'||$cpengadaan->status == '4'||$cpengadaan->status == '5'||$cpengadaan->status == '6'||$cpengadaan->status == '7'||$cpengadaan->status == '8'||$cpengadaan->status == '9'||$cpengadaan->status == '10'||$cpengadaan->status == '11'||$cpengadaan->status == '12'||$cpengadaan->status == '13'||$cpengadaan->status == '14'||$cpengadaan->status == '15'||$cpengadaan->status == '98') { ?>
					<li class='belum' ><?php echo 'Pengumuman dan Pendaftaran'?></li>
				<?php } else if($cpengadaan->status == '17') { ?>
					<li id="8" class='sudah' > <?php echo CHtml::link('Pengumuman dan Pendaftaran',array("generator/suratpengumumanpelelangan","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } else if($cpengadaan->status == '18') { ?>
					<li id="8" class='sudah' > <?php echo CHtml::link('Pengumuman dan Pendaftaran',array("generator/pendaftaranpelelangan","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } else { ?>
					<li id="8" class='sudah' > <?php echo CHtml::link('Pengumuman dan Pendaftaran',array("generator/editpendaftaranpelelangan","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } ?>
			<?php } else if ($cpengadaan->metode_pengadaan=='Penunjukan Langsung'||$cpengadaan->metode_pengadaan=='Pemilihan Langsung'){ ?>
				<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1'||$cpengadaan->status == '2'||$cpengadaan->status == '3'||$cpengadaan->status == '4'||$cpengadaan->status == '5'||$cpengadaan->status == '6'||$cpengadaan->status == '7'||$cpengadaan->status == '8'||$cpengadaan->status == '9'||$cpengadaan->status == '10'||$cpengadaan->status == '11'||$cpengadaan->status == '12'||$cpengadaan->status == '13'||$cpengadaan->status == '14'||$cpengadaan->status == '15'||$cpengadaan->status == '98') { ?>
					<li class='belum' ><?php echo 'Undangan Permintaan Penawaran'?></li>
				<?php } else if($cpengadaan->status == '16') { ?>
					<li id="9" class='sudah' > <?php echo CHtml::link('Undangan Permintaan Penawaran',array("generator/permintaanpenawaranharga","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } else { ?>
					<li id="9" class='sudah' > <?php echo CHtml::link('Undangan Permintaan Penawaran',array("generator/editpermintaanpenawaranharga","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } ?>
			<?php } ?>
		<?php } ?>
		
		<?php if($cpengadaan->metode_pengadaan=='Pelelangan'){ ?>
			<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1'||$cpengadaan->status == '2'||$cpengadaan->status == '3'||$cpengadaan->status == '4'||$cpengadaan->status == '5'||$cpengadaan->status == '6'||$cpengadaan->status == '7'||$cpengadaan->status == '8'||$cpengadaan->status == '9'||$cpengadaan->status == '10'||$cpengadaan->status == '11'||$cpengadaan->status == '12'||$cpengadaan->status == '13'||$cpengadaan->status == '14'||$cpengadaan->status == '15'||$cpengadaan->status == '16'||$cpengadaan->status == '17'||$cpengadaan->status == '18'||$cpengadaan->status == '98') { ?>
				<li class='belum' ><?php echo 'Pengambilan Dokumen Pengadaan'?></li>
			<?php } else if($cpengadaan->status == '19') { ?>
				<li id="10" class='sudah' ><?php echo CHtml::link('Pengambilan Dokumen Pengadaan',array("generator/pengambilandokumen","id"=>"$cpengadaan->id_pengadaan")); ?></li>	
			<?php } else { ?>
				<li id="10" class='sudah' ><?php echo CHtml::link('Pengambilan Dokumen Pengadaan',array("generator/editpengambilandokumen","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } ?>
		<?php } ?>
		
		<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1'||$cpengadaan->status == '2'||$cpengadaan->status == '3'||$cpengadaan->status == '4'||$cpengadaan->status == '5'||$cpengadaan->status == '6'||$cpengadaan->status == '7'||$cpengadaan->status == '8'||$cpengadaan->status == '9'||$cpengadaan->status == '10'||$cpengadaan->status == '11'||$cpengadaan->status == '12'||$cpengadaan->status == '13'||$cpengadaan->status == '14'||$cpengadaan->status == '15'||$cpengadaan->status == '16'||$cpengadaan->status == '17'||$cpengadaan->status == '18'||$cpengadaan->status == '19'||$cpengadaan->status == '98') { ?>
				<li class='belum'><?php echo 'Aanwijzing' ?></li>
			<?php } else if($cpengadaan->status == '20') { ?>
				<li id="11" class='sudah'><?php echo CHtml::link('Aanwijzing',array("generator/aanwijzing","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else if($cpengadaan->status == '21') { ?>
				<li id="11" class='sudah'><?php echo CHtml::link('Aanwijzing',array("generator/beritaacaraaanwijzing","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else { ?>
				<li id="11" class='sudah'><?php echo CHtml::link('Aanwijzing',array("generator/editberitaacaraaanwijzing","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } ?>
		
		<?php if($cpengadaan->metode_penawaran=='Satu Sampul') { ?>
			<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1'||$cpengadaan->status == '2'||$cpengadaan->status == '3'||$cpengadaan->status == '4'||$cpengadaan->status == '5'||$cpengadaan->status == '6'||$cpengadaan->status == '7'||$cpengadaan->status == '8'||$cpengadaan->status == '9'||$cpengadaan->status == '10'||$cpengadaan->status == '11'||$cpengadaan->status == '12'||$cpengadaan->status == '13'||$cpengadaan->status == '14'||$cpengadaan->status == '15'||$cpengadaan->status == '16'||$cpengadaan->status == '17'||$cpengadaan->status == '18'||$cpengadaan->status == '19'||$cpengadaan->status == '20'||$cpengadaan->status == '21'||$cpengadaan->status == '98') { ?>
				<li class='belum'><?php echo 'Pembukaan Penawaran' ?></li>
			<?php } else if($cpengadaan->status == '22') { ?>
				<li id="12" class='sudah'><?php echo CHtml::link('Pembukaan Penawaran',array("generator/pembukaanpenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else if($cpengadaan->status == '23') { ?>
				<li id="12" class='sudah'><?php echo CHtml::link('Pembukaan Penawaran',array("generator/beritaacarapembukaanpenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else { ?>
				<li id="12" class='sudah'><?php echo CHtml::link('Pembukaan Penawaran',array("generator/editberitaacarapembukaanpenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } ?>
			
			<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1'||$cpengadaan->status == '2'||$cpengadaan->status == '3'||$cpengadaan->status == '4'||$cpengadaan->status == '5'||$cpengadaan->status == '6'||$cpengadaan->status == '7'||$cpengadaan->status == '8'||$cpengadaan->status == '9'||$cpengadaan->status == '10'||$cpengadaan->status == '11'||$cpengadaan->status == '12'||$cpengadaan->status == '13'||$cpengadaan->status == '14'||$cpengadaan->status == '15'||$cpengadaan->status == '16'||$cpengadaan->status == '17'||$cpengadaan->status == '18'||$cpengadaan->status == '19'||$cpengadaan->status == '20'||$cpengadaan->status == '21'||$cpengadaan->status == '22'||$cpengadaan->status == '23'||$cpengadaan->status == '98') { ?>
				<li class='belum'><?php echo 'Evaluasi Penawaran' ?></li>
			<?php } else if($cpengadaan->status == '24') { ?>
				<li id="13" class='sudah'><?php echo CHtml::link('Evaluasi Penawaran',array("generator/evaluasipenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else if($cpengadaan->status == '25') { ?>
				<li id="13" class='sudah'><?php echo CHtml::link('Evaluasi Penawaran',array("generator/beritaacaraevaluasipenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else { ?>
				<li id="13" class='sudah'><?php echo CHtml::link('Evaluasi Penawaran',array("generator/editberitaacaraevaluasipenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } ?>
			
		<?php } else if($cpengadaan->metode_penawaran=='Dua Sampul') { ?>
			<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1'||$cpengadaan->status == '2'||$cpengadaan->status == '3'||$cpengadaan->status == '4'||$cpengadaan->status == '5'||$cpengadaan->status == '6'||$cpengadaan->status == '7'||$cpengadaan->status == '8'||$cpengadaan->status == '9'||$cpengadaan->status == '10'||$cpengadaan->status == '11'||$cpengadaan->status == '12'||$cpengadaan->status == '13'||$cpengadaan->status == '14'||$cpengadaan->status == '15'||$cpengadaan->status == '16'||$cpengadaan->status == '17'||$cpengadaan->status == '18'||$cpengadaan->status == '19'||$cpengadaan->status == '20'||$cpengadaan->status == '21') { ?>
				<li class='belum'><?php echo 'Pembukaan Penawaran Sampul Satu' ?></li>
			<?php } else if($cpengadaan->status == '22') { ?>
				<li id="12" class='sudah'><?php echo CHtml::link('Pembukaan Penawaran Sampul Satu',array("generator/pembukaanpenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else if($cpengadaan->status == '23') { ?>
				<li id="12" class='sudah'><?php echo CHtml::link('Pembukaan Penawaran Sampul Satu',array("generator/beritaacarapembukaanpenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else { ?>
				<li id="12" class='sudah'><?php echo CHtml::link('Pembukaan Penawaran Sampul Satu',array("generator/editberitaacarapembukaanpenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } ?>
			
			<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1'||$cpengadaan->status == '2'||$cpengadaan->status == '3'||$cpengadaan->status == '4'||$cpengadaan->status == '5'||$cpengadaan->status == '6'||$cpengadaan->status == '7'||$cpengadaan->status == '8'||$cpengadaan->status == '9'||$cpengadaan->status == '10'||$cpengadaan->status == '11'||$cpengadaan->status == '12'||$cpengadaan->status == '13'||$cpengadaan->status == '14'||$cpengadaan->status == '15'||$cpengadaan->status == '16'||$cpengadaan->status == '17'||$cpengadaan->status == '18'||$cpengadaan->status == '19'||$cpengadaan->status == '20'||$cpengadaan->status == '21'||$cpengadaan->status == '22'||$cpengadaan->status == '23'||$cpengadaan->status == '98') { ?>
				<li class='belum'><?php echo 'Evaluasi Penawaran Sampul Satu' ?></li>
			<?php } else if($cpengadaan->status == '24') { ?>
				<li id="13" class='sudah'><?php echo CHtml::link('Evaluasi Penawaran Sampul Satu',array("generator/evaluasipenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else if($cpengadaan->status == '25') { ?>
				<li id="13" class='sudah'><?php echo CHtml::link('Evaluasi Penawaran Sampul Satu',array("generator/beritaacaraevaluasipenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else { ?>
				<li id="13" class='sudah'><?php echo CHtml::link('Evaluasi Penawaran Sampul Satu',array("generator/editberitaacaraevaluasipenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } ?>
			
			<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1'||$cpengadaan->status == '2'||$cpengadaan->status == '3'||$cpengadaan->status == '4'||$cpengadaan->status == '5'||$cpengadaan->status == '6'||$cpengadaan->status == '7'||$cpengadaan->status == '8'||$cpengadaan->status == '9'||$cpengadaan->status == '10'||$cpengadaan->status == '11'||$cpengadaan->status == '12'||$cpengadaan->status == '13'||$cpengadaan->status == '14'||$cpengadaan->status == '15'||$cpengadaan->status == '16'||$cpengadaan->status == '17'||$cpengadaan->status == '18'||$cpengadaan->status == '19'||$cpengadaan->status == '20'||$cpengadaan->status == '21'||$cpengadaan->status == '22'||$cpengadaan->status == '23'||$cpengadaan->status == '24'||$cpengadaan->status == '25'||$cpengadaan->status == '98') { ?>
				<li class='belum'><?php echo 'Pembukaan Penawaran Sampul Dua' ?></li>
			<?php } else if($cpengadaan->status == '26') { ?>
				<li id="14" class='sudah'><?php echo CHtml::link('Pembukaan Penawaran Sampul Dua',array("generator/pembukaanpenawaran2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else if($cpengadaan->status == '27') { ?>
				<li id="14" class='sudah'><?php echo CHtml::link('Pembukaan Penawaran Sampul Dua',array("generator/beritaacarapembukaanpenawaran2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else { ?>
				<li id="14" class='sudah'><?php echo CHtml::link('Pembukaan Penawaran Sampul Dua',array("generator/editberitaacarapembukaanpenawaran2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } ?>
			
			<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1'||$cpengadaan->status == '2'||$cpengadaan->status == '3'||$cpengadaan->status == '4'||$cpengadaan->status == '5'||$cpengadaan->status == '6'||$cpengadaan->status == '7'||$cpengadaan->status == '8'||$cpengadaan->status == '9'||$cpengadaan->status == '10'||$cpengadaan->status == '11'||$cpengadaan->status == '12'||$cpengadaan->status == '13'||$cpengadaan->status == '14'||$cpengadaan->status == '15'||$cpengadaan->status == '16'||$cpengadaan->status == '17'||$cpengadaan->status == '18'||$cpengadaan->status == '19'||$cpengadaan->status == '20'||$cpengadaan->status == '21'||$cpengadaan->status == '22'||$cpengadaan->status == '23'||$cpengadaan->status == '24'||$cpengadaan->status == '25'||$cpengadaan->status == '26'||$cpengadaan->status == '27'||$cpengadaan->status == '98') { ?>
				<li class='belum'><?php echo 'Evaluasi Penawaran Sampul Dua' ?></li>
			<?php } else if($cpengadaan->status == '28') { ?>
				<li id="15" class='sudah'><?php echo CHtml::link('Evaluasi Penawaran Sampul Dua',array("generator/evaluasipenawaran2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else if($cpengadaan->status == '29') { ?>
				<li id="15" class='sudah'><?php echo CHtml::link('Evaluasi Penawaran Sampul Dua',array("generator/beritaacaraevaluasipenawaran2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else { ?>
				<li id="15" class='sudah'><?php echo CHtml::link('Evaluasi Penawaran Sampul Dua',array("generator/editberitaacaraevaluasipenawaran2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } ?>
				
		<?php } else if($cpengadaan->metode_penawaran=='Dua Tahap') { ?>
			<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1'||$cpengadaan->status == '2'||$cpengadaan->status == '3'||$cpengadaan->status == '4'||$cpengadaan->status == '5'||$cpengadaan->status == '6'||$cpengadaan->status == '7'||$cpengadaan->status == '8'||$cpengadaan->status == '9'||$cpengadaan->status == '10'||$cpengadaan->status == '11'||$cpengadaan->status == '12'||$cpengadaan->status == '13'||$cpengadaan->status == '14'||$cpengadaan->status == '15'||$cpengadaan->status == '16'||$cpengadaan->status == '17'||$cpengadaan->status == '18'||$cpengadaan->status == '19'||$cpengadaan->status == '20'||$cpengadaan->status == '21'||$cpengadaan->status == '98') { ?>
				<li class='belum'><?php echo 'Pembukaan Penawaran Tahap Satu' ?></li>
			<?php } else if($cpengadaan->status == '22') { ?>
				<li id="12" class='sudah'><?php echo CHtml::link('Pembukaan Penawaran Tahap Satu',array("generator/pembukaanpenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else if($cpengadaan->status == '23') { ?>
				<li id="12" class='sudah'><?php echo CHtml::link('Pembukaan Penawaran Tahap Satu',array("generator/beritaacarapembukaanpenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else { ?>
				<li id="12" class='sudah'><?php echo CHtml::link('Pembukaan Penawaran Tahap Satu',array("generator/editberitaacarapembukaanpenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } ?>
			
			<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1'||$cpengadaan->status == '2'||$cpengadaan->status == '3'||$cpengadaan->status == '4'||$cpengadaan->status == '5'||$cpengadaan->status == '6'||$cpengadaan->status == '7'||$cpengadaan->status == '8'||$cpengadaan->status == '9'||$cpengadaan->status == '10'||$cpengadaan->status == '11'||$cpengadaan->status == '12'||$cpengadaan->status == '13'||$cpengadaan->status == '14'||$cpengadaan->status == '15'||$cpengadaan->status == '16'||$cpengadaan->status == '17'||$cpengadaan->status == '18'||$cpengadaan->status == '19'||$cpengadaan->status == '20'||$cpengadaan->status == '21'||$cpengadaan->status == '22'||$cpengadaan->status == '23'||$cpengadaan->status == '98') { ?>
				<li class='belum'><?php echo 'Evaluasi Penawaran Tahap Satu' ?></li>
			<?php } else if($cpengadaan->status == '24') { ?>
				<li id="13" class='sudah'><?php echo CHtml::link('Evaluasi Penawaran Tahap Satu',array("generator/evaluasipenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else if($cpengadaan->status == '25') { ?>
				<li id="13" class='sudah'><?php echo CHtml::link('Evaluasi Penawaran Tahap Satu',array("generator/beritaacaraevaluasipenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else { ?>
				<li id="13" class='sudah'><?php echo CHtml::link('Evaluasi Penawaran Tahap Satu',array("generator/editberitaacaraevaluasipenawaran","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } ?>
			
			<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1'||$cpengadaan->status == '2'||$cpengadaan->status == '3'||$cpengadaan->status == '4'||$cpengadaan->status == '5'||$cpengadaan->status == '6'||$cpengadaan->status == '7'||$cpengadaan->status == '8'||$cpengadaan->status == '9'||$cpengadaan->status == '10'||$cpengadaan->status == '11'||$cpengadaan->status == '12'||$cpengadaan->status == '13'||$cpengadaan->status == '14'||$cpengadaan->status == '15'||$cpengadaan->status == '16'||$cpengadaan->status == '17'||$cpengadaan->status == '18'||$cpengadaan->status == '19'||$cpengadaan->status == '20'||$cpengadaan->status == '21'||$cpengadaan->status == '22'||$cpengadaan->status == '23'||$cpengadaan->status == '24'||$cpengadaan->status == '25'||$cpengadaan->status == '98') { ?>
				<li class='belum'><?php echo 'Pembukaan Penawaran Tahap Dua' ?></li>
			<?php } else if($cpengadaan->status == '26') { ?>
				<li id="14" class='sudah'><?php echo CHtml::link('Pembukaan Penawaran Tahap Dua',array("generator/pembukaanpenawaran2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else if($cpengadaan->status == '27') { ?>
				<li id="14" class='sudah'><?php echo CHtml::link('Pembukaan Penawaran Tahap Dua',array("generator/beritaacarapembukaanpenawaran2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else { ?>
				<li id="14" class='sudah'><?php echo CHtml::link('Pembukaan Penawaran Tahap Dua',array("generator/editberitaacarapembukaanpenawaran2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } ?>
			
			<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1'||$cpengadaan->status == '2'||$cpengadaan->status == '3'||$cpengadaan->status == '4'||$cpengadaan->status == '5'||$cpengadaan->status == '6'||$cpengadaan->status == '7'||$cpengadaan->status == '8'||$cpengadaan->status == '9'||$cpengadaan->status == '10'||$cpengadaan->status == '11'||$cpengadaan->status == '12'||$cpengadaan->status == '13'||$cpengadaan->status == '14'||$cpengadaan->status == '15'||$cpengadaan->status == '16'||$cpengadaan->status == '17'||$cpengadaan->status == '18'||$cpengadaan->status == '19'||$cpengadaan->status == '20'||$cpengadaan->status == '21'||$cpengadaan->status == '22'||$cpengadaan->status == '23'||$cpengadaan->status == '24'||$cpengadaan->status == '25'||$cpengadaan->status == '26'||$cpengadaan->status == '27'||$cpengadaan->status == '98') { ?>
				<li class='belum'><?php echo 'Evaluasi Penawaran Tahap Dua' ?></li>
			<?php } else if($cpengadaan->status == '28') { ?>
				<li id="15" class='sudah'><?php echo CHtml::link('Evaluasi Penawaran Tahap Dua',array("generator/evaluasipenawaran2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else if($cpengadaan->status == '29') { ?>
				<li id="15" class='sudah'><?php echo CHtml::link('Evaluasi Penawaran Tahap Dua',array("generator/beritaacaraevaluasipenawaran2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else { ?>
				<li id="15" class='sudah'><?php echo CHtml::link('Evaluasi Penawaran Tahap Dua',array("generator/editberitaacaraevaluasipenawaran2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } ?>
		<?php } else {?>
			<li class='belum'><?php echo 'Penawaran' ?></li>
			<li class='belum'><?php echo 'Evaluasi' ?></li>
		<?php } ?>
		
		<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1'||$cpengadaan->status == '2'||$cpengadaan->status == '3'||$cpengadaan->status == '4'||$cpengadaan->status == '5'||$cpengadaan->status == '6'||$cpengadaan->status == '7'||$cpengadaan->status == '8'||$cpengadaan->status == '9'||$cpengadaan->status == '10'||$cpengadaan->status == '11'||$cpengadaan->status == '12'||$cpengadaan->status == '13'||$cpengadaan->status == '14'||$cpengadaan->status == '15'||$cpengadaan->status == '16'||$cpengadaan->status == '17'||$cpengadaan->status == '18'||$cpengadaan->status == '19'||$cpengadaan->status == '20'||$cpengadaan->status == '21'||$cpengadaan->status == '22'||$cpengadaan->status == '23'||$cpengadaan->status == '24'||$cpengadaan->status == '25'||$cpengadaan->status == '26'||$cpengadaan->status == '27'||$cpengadaan->status == '28'||$cpengadaan->status == '29'||$cpengadaan->status == '98') { ?>
			<li class='belum'><?php echo 'Klarifikasi/Negosiasi' ?></li>
		<?php } else if($cpengadaan->status == '30') { ?>
			<li id="16" class='sudah'><?php echo CHtml::link('Klarifikasi/Negosiasi',array("generator/negosiasiklarifikasi","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } else if($cpengadaan->status == '31') { ?>
			<li id="16" class='sudah'><?php echo CHtml::link('Klarifikasi/Negosiasi',array("generator/beritaacaranegosiasiklarifikasi","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } else { ?>
			<li id="16" class='sudah'><?php echo CHtml::link('Klarifikasi/Negosiasi',array("generator/editberitaacaranegosiasiklarifikasi","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } ?>
		
		<?php if($cpengadaan->status == '0'||$cpengadaan->status == '1'||$cpengadaan->status == '2'||$cpengadaan->status == '3'||$cpengadaan->status == '4'||$cpengadaan->status == '5'||$cpengadaan->status == '6'||$cpengadaan->status == '7'||$cpengadaan->status == '8'||$cpengadaan->status == '9'||$cpengadaan->status == '10'||$cpengadaan->status == '11'||$cpengadaan->status == '12'||$cpengadaan->status == '13'||$cpengadaan->status == '14'||$cpengadaan->status == '15'||$cpengadaan->status == '16'||$cpengadaan->status == '17'||$cpengadaan->status == '18'||$cpengadaan->status == '19'||$cpengadaan->status == '20'||$cpengadaan->status == '21'||$cpengadaan->status == '22'||$cpengadaan->status == '23'||$cpengadaan->status == '24'||$cpengadaan->status == '25'||$cpengadaan->status == '26'||$cpengadaan->status == '27'||$cpengadaan->status == '28'||$cpengadaan->status == '29'||$cpengadaan->status == '30'||$cpengadaan->status == '31'||$cpengadaan->status == '98') { ?>
			<li class='belum'><?php echo 'Penentuan Pemenang' ?></li>
		<?php } else if($cpengadaan->status == '32') { ?>
			<li id="17" class='sudah'><?php echo CHtml::link('Penentuan Pemenang',array("generator/notadinasusulanpemenang","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } else if($cpengadaan->status == '33') { ?>
			<li id="17" class='sudah'><?php echo CHtml::link('Penentuan Pemenang',array("generator/notadinaspenetapanpemenang","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } else if($cpengadaan->status == '34') { ?>
			<li id="17" class='sudah'><?php echo CHtml::link('Penentuan Pemenang',array("generator/notadinaspemberitahuanpemenang","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } else if($cpengadaan->status == '35') { ?>
			<li id="17" class='sudah'><?php echo CHtml::link('Penentuan Pemenang',array("generator/suratpengumumanpemenang","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } else if($cpengadaan->status == '36') { ?>
			<li id="17" class='sudah'><?php echo CHtml::link('Penentuan Pemenang',array("generator/suratpenunjukanpemenang","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } else { ?>
			<li id="17" class='sudah'><?php echo CHtml::link('Penentuan Pemenang',array("generator/editsuratpenunjukanpemenang","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } ?>
		
		<br/> 
		<br/>
		<li class='unggah'><?php echo CHtml::link('Unggah Dokumen',array("generator/uploader","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<li class='lihat'><?php echo CHtml::link('Lihat Dokumen',array("generator/dokumengenerator","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		
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
		
		<li class='sudah' style="border-top:1px solid black;"><?php echo CHtml::link('Batalkan Pengadaan',array("generator/notadinaslaporanpengadaangagal","id"=>"$cpengadaan->id_pengadaan")); ?></li>
	
	<?php } ?>
</ul>