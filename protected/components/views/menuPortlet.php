<ul>    
	<?php if(Yii::app()->user->name == 'panitia'){ ?>
		<li><?php echo CHtml::link('RKS/HPS',array('site/generator')); ?></li>    
		<li><?php echo CHtml::link('Undangan Prakualifikasi',array('site/checkpoint2')); ?></li>
		<li><?php echo CHtml::link('Berita Acara Evaluasi Prakualifikasi',array('site/checkpoint3')); ?></li>
		<li><?php echo CHtml::link('Undangan Pengambilan Dokumen Pengadaan',array('site/checkpoint4')); ?></li>
		<li><?php echo CHtml::link('Undangan Aanwijzing',array('site/checkpoint5')); ?></li>
		<li><?php echo CHtml::link('Berita Acara Aanwijzing',array('site/checkpoint6')); ?></li>
		<li><?php echo CHtml::link('Undangan Pembukaan Penawaran',array('site/checkpoint7')); ?></li>
		<li><?php echo CHtml::link('Penetapan Pemenang',array('site/checkpoint8')); ?></li>
    
	<?php } else if(Yii::app()->user->name == 'kadiv'){ ?>
		<li><?php echo CHtml::link('TOR dan RAB',array('site/generator_2')); ?></li>    
		<li><?php echo CHtml::link('Metode Pengadaan yang Digunakan',array('site/checkpoint2_2')); ?></li>    
		<li><?php echo CHtml::link('Nota Dinas Perintah Pengadaan',array('site/checkpoint3_2')); ?></li>
		<li><?php echo CHtml::link('Pakta Integritas Panitia',array('site/checkpoint4_2')); ?></li>
		<li><?php echo CHtml::link('Nota Dinas Penetapan Pemenang',array('site/checkpoint5_2')); ?></li>
	
	<?php } else{?>
	
	<?php } ?>
</ul>