<ul>
	
	<?php 
	$id = Yii::app()->getRequest()->getQuery('id');
	$cpengadaan = Pengadaan::model()->find('id_pengadaan = "' . $id . '"');
	?>
	
	<?php if(Yii::app()->user->name == 'panitia'){ ?>
		<?php /*Jika status pengadaan == x*/ ?>
				<li><?php echo CHtml::link('RKS/HPS',array('site/generator')); ?></li>
			<?php /*else*/ ?>
				<li><b><?php echo CHtml::link('RKS/HPS',array('site/generator')); ?></b></li>
		<?php ?>
		<?php /**/ ?>
		<li><?php echo CHtml::link('Metode Penawaran',array('site/checkpoint2')); ?></li>
		<?php if($cpengadaan->jenis_kualifikasi=='Pra Kualifikasi') { ?>
				<li><?php echo CHtml::link('Undangan Prakualifikasi',array('site/checkpoint2')); ?></li>
		<?php } ?>
		<?php if($cpengadaan->jenis_kualifikasi=='Pra Kualifikasi') { ?>
				<li><?php echo CHtml::link('Berita Acara Evaluasi Prakualifikasi',array('site/checkpoint3'));  ?></li>
		<?php } ?>
		<li><?php echo CHtml::link('Undangan Pengambilan Dokumen Pengadaan',array('site/checkpoint4')); ?></li>
		<li><?php echo CHtml::link('Undangan Aanwijzing',array('site/checkpoint5')); ?></li>
		<li><?php echo CHtml::link('Berita Acara Aanwijzing',array('site/checkpoint6')); ?></li>
		<?php if($cpengadaan->metode_penawaran=='Satu sampul') { ?>
				<li><?php echo CHtml::link('Undangan Pembukaan Penawaran',array('site/checkpoint7')); ?></li>
		<?php } ?>
		<?php if($cpengadaan->metode_penawaran=='Satu sampul') { ?>
				<li><?php echo CHtml::link('Berita Acara Pembukaan Penawaran',array('site/checkpoint8')); ?></li>
		<?php } ?>
		<?php if($cpengadaan->metode_penawaran=='Satu sampul') { ?>
				<li><?php echo CHtml::link('Berita Acara Evaluasi Penawaran',array('site/checkpoint2')); ?></li>
		<?php } ?>
		<?php if($cpengadaan->metode_penawaran=='Dua sampul') { ?>
				<li><?php echo CHtml::link('Undangan Pembukaan Penawaran Sampul Satu',array('site/checkpoint7')); ?></li>
		<?php } ?>
		<?php if($cpengadaan->metode_penawaran=='Dua sampul') { ?>
				<li><?php echo CHtml::link('Berita Acara Pembukaan Penawaran Sampul Satu',array('site/checkpoint8')); ?></li>
		<?php } ?>
		<?php if($cpengadaan->metode_penawaran=='Dua sampul') { ?>
				<li><?php echo CHtml::link('Berita Acara Evaluasi Penawaran Sampul Satu',array('site/checkpoint2')); ?></li>
		<?php } ?>
		<?php if($cpengadaan->metode_penawaran=='Dua sampul') { ?>
				<li><?php echo CHtml::link('Undangan Pembukaan Penawaran Sampul Dua',array('site/checkpoint7')); ?></li>
		<?php } ?>
		<?php if($cpengadaan->metode_penawaran=='Dua sampul') { ?>
				<li><?php echo CHtml::link('Berita Acara Pembukaan Penawaran Sampul Dua',array('site/checkpoint8')); ?></li>
		<?php } ?>
		<?php if($cpengadaan->metode_penawaran=='Dua sampul') { ?>
				<li><?php echo CHtml::link('Berita Acara Evaluasi Penawaran Sampul Dua',array('site/checkpoint2')); ?></li>
		<?php } ?>
		<?php if($cpengadaan->metode_penawaran=='Dua tahap') { ?>
				<li><?php echo CHtml::link('Undangan Pembukaan Penawaran Tahap Satu',array('site/checkpoint7')); ?></li>
		<?php } ?>
		<?php if($cpengadaan->metode_penawaran=='Dua tahap') { ?>
				<li><?php echo CHtml::link('Berita Acara Pembukaan Penawaran Tahap Satu',array('site/checkpoint8')); ?></li>
		<?php } ?>
		<?php if($cpengadaan->metode_penawaran=='Dua tahap') { ?>
				<li><?php echo CHtml::link('Berita Acara Evaluasi Penawaran Tahap Satu',array('site/checkpoint2')); ?></li>
		<?php } ?>
		<?php if($cpengadaan->metode_penawaran=='Dua tahap') { ?>
				<li><?php echo CHtml::link('Undangan Pembukaan Penawaran Tahap Dua',array('site/checkpoint7')); ?></li>
		<?php } ?>
		<?php if($cpengadaan->metode_penawaran=='Dua tahap') { ?>
				<li><?php echo CHtml::link('Berita Acara Pembukaan Penawaran Tahap Dua',array('site/checkpoint8')); ?></li>
		<?php } ?>
		<?php if($cpengadaan->metode_penawaran=='Dua tahap') { ?>
				<li><?php echo CHtml::link('Berita Acara Evaluasi Penawaran  Dua',array('site/checkpoint2')); ?></li>
		<?php } ?>		
		<li><?php echo CHtml::link('Undangan Negosiasi dan Klarifikasi',array('site/checkpoint8')); ?></li>
		<li><?php echo CHtml::link('Berita Acara Negosiasi dan Klarifikasi',array('site/checkpoint2')); ?></li>
		<li><?php echo CHtml::link('Nota Dinas Usulan Pemenang',array('site/checkpoint3')); ?></li>
		<li><?php echo CHtml::link('Nota Dinas Pemberitahuan Pemenang',array('site/checkpoint4')); ?></li>
		<li><?php echo CHtml::link('Kontrak',array('site/checkpoint5')); ?></li>
		<li><?php echo CHtml::link('DaftarHadir',array('site/checkpoint5')); ?></li>
		
	<?php } else if(Yii::app()->user->name == 'kadiv'){ ?>
		<li><?php echo CHtml::link('TOR dan RAB',array('site/generator_2')); ?></li>    
		<li><?php echo CHtml::link('Metode Pengadaan yang Digunakan',array('site/checkpoint2_2')); ?></li>    
		<li><?php echo CHtml::link('Nota Dinas Perintah Pengadaan',array('site/checkpoint3_2')); ?></li>
		<li><?php echo CHtml::link('Pakta Integritas Panitia',array('site/checkpoint4_2')); ?></li>
		<li><?php echo CHtml::link('Nota Dinas Penetapan Pemenang',array('site/checkpoint5_2')); ?></li>
	
	<?php } else{?>
	
	<?php } ?>
</ul>