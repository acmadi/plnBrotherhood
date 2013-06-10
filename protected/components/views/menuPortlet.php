<ul>    
	<?php if(Yii::app()->user->name == 'panitia'){ ?>
		
		<li><?php echo CHtml::link('RKS/HPS',array('site/generator')); ?></li>
		<li><?php echo CHtml::link('Metode Penawaran',array('site/checkpoint2')); ?></li>
		<li><?php echo CHtml::link('Undangan Prakualifikasi',array('site/checkpoint2')); ?></li>
		<li><?php echo CHtml::link('Berita Acara Evaluasi Prakualifikasi',array('site/checkpoint3')); ?></li>
		<li><?php echo CHtml::link('Undangan Pengambilan Dokumen Pengadaan',array('site/checkpoint4')); ?></li>
		<li><?php echo CHtml::link('Undangan Aanwijzing',array('site/checkpoint5')); ?></li>
		<li><?php echo CHtml::link('Berita Acara Aanwijzing',array('site/checkpoint6')); ?></li>
		<li><?php echo CHtml::link('Undangan Pembukaan Penawaran',array('site/checkpoint7')); ?></li>
		<li><?php echo CHtml::link('Berita Acara Pembukaan Penawaran',array('site/checkpoint8')); ?></li>
		<li><?php echo CHtml::link('Berita Acara Evaluasi Penawaran',array('site/checkpoint2')); ?></li>
		<li><?php echo CHtml::link('Undangan Pembukaan Penawaran Sampul 1',array('site/checkpoint3')); ?></li>
		<li><?php echo CHtml::link('Berita Acara Pembukaan Penawaran Sampul 1',array('site/checkpoint4')); ?></li>
		<li><?php echo CHtml::link('Berita Acara Evaluasi Penawaran Sampul 1',array('site/checkpoint5')); ?></li>
		<li><?php echo CHtml::link('Undangan Pembukaan Penawaran Sampul 2',array('site/checkpoint6')); ?></li>
		<li><?php echo CHtml::link('Berita Acara Pembukaan Penawaran Sampul 2',array('site/checkpoint7')); ?></li>
		<li><?php echo CHtml::link('Berita Acara Evaluasi Penawaran Sampul 2',array('site/checkpoint8')); ?></li>
		<li><?php echo CHtml::link('Undangan Pembukaan Penawaran Tahap 1',array('site/checkpoint2')); ?></li>
		<li><?php echo CHtml::link('Berita Acara Pembukaan Penawaran Tahap 1',array('site/checkpoint3')); ?></li>
		<li><?php echo CHtml::link('Berita Acara Evaluasi Penawaran Tahap 1',array('site/checkpoint4')); ?></li>
		<li><?php echo CHtml::link('Undangan Pembukaan Penawaran Tahap 2',array('site/checkpoint5')); ?></li>
		<li><?php echo CHtml::link('Berita Acara Pembukaan Penawaran Tahap 2',array('site/checkpoint6')); ?></li>
		<li><?php echo CHtml::link('Berita Acara Evaluasi Penawaran Tahap 2',array('site/checkpoint7')); ?></li>
		<li><?php echo CHtml::link('Undangan Negosiasi dan Klarifikasi',array('site/checkpoint8')); ?></li>
		<li><?php echo CHtml::link('Berita Acara Negosiasi dan Klarifikasi',array('site/checkpoint2')); ?></li>
		<li><?php echo CHtml::link('Nota Dinas Usulan Pemenang',array('site/checkpoint3')); ?></li>
		<li><?php echo CHtml::link('Nota Dinas Pemberitahuan Pemenang',array('site/checkpoint4')); ?></li>
		<li><?php echo CHtml::link('Kontrak',array('site/checkpoint5')); ?></li>
		
	<?php } else if(Yii::app()->user->name == 'kadiv'){ ?>
		<li><?php echo CHtml::link('TOR dan RAB',array('site/generator_2')); ?></li>    
		<li><?php echo CHtml::link('Metode Pengadaan yang Digunakan',array('site/checkpoint2_2')); ?></li>    
		<li><?php echo CHtml::link('Nota Dinas Perintah Pengadaan',array('site/checkpoint3_2')); ?></li>
		<li><?php echo CHtml::link('Pakta Integritas Panitia',array('site/checkpoint4_2')); ?></li>
		<li><?php echo CHtml::link('Nota Dinas Penetapan Pemenang',array('site/checkpoint5_2')); ?></li>
	
	<?php } else{?>
	
	<?php } ?>
</ul>