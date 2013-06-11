<?php 
/* @var $this SiteController */

	$id = Yii::app()->getRequest()->getQuery('id');
	$cpengadaan = Pengadaan::model()->find('id_pengadaan = "' . $id . '"');
?>
<ul>
		
	<?php if(Yii::app()->user->name == 'panitia'){ ?>
		<?php if($cpengadaan->status == 'Penunjukan panitia') { ?>
				<li class='onprogress' ><?php echo CHtml::link('Penunjukan Panitia',array("site/checkpoint2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else { ?>
				<li class='sudah' > <?php echo CHtml::link('Penunjukan Panitia',array("site/checkpoint2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } ?>
		
		<?php if($cpengadaan->jenis_kualifikasi=='Pra Kualifikasi') { ?>
				<?php if($cpengadaan->status == 'Penunjukan panitia') { ?>
					<li><?php echo CHtml::link('Prakualifikasi',array("site/checkpoint2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } else if($cpengadaan->status == 'Prakualifikasi') { ?>
					<li class='onprogress'><?php echo CHtml::link('Prakualifikasi',array("site/checkpoint2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } else { ?>
					<li class='sudah'><?php echo CHtml::link('Prakualifikasi',array("site/checkpoint2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
				<?php } ?>
		<?php } ?>
		
		<?php if(($cpengadaan->status == 'Penunjukan panitia') || ($cpengadaan->status == 'Prakualifikasi')) { ?>
				<li><?php echo CHtml::link('Pengambilan Dokumen Pengadaan',array("site/checkpoint2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else if($cpengadaan->status == 'Pengambilan Dokumen Pengadaan') { ?>
				<li class='onprogress'><?php echo CHtml::link('Pengambilan Dokumen Pengadaan',array("site/checkpoint2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else { ?>
				<li class='sudah'><?php echo CHtml::link('Pengambilan Dokumen Pengadaan',array("site/checkpoint2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } ?>
		
		<?php if(($cpengadaan->status == 'Penunjukan panitia') || ($cpengadaan->status == 'Prakualifikasi')) { ?>
				<li><?php echo CHtml::link('Annwijzing',array("site/checkpoint2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else if($cpengadaan->status == 'Aanwijzing') { ?>
				<li class='onprogress'><?php echo CHtml::link('Aanwijzing',array("site/checkpoint2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else { ?>
				<li class='sudah'><?php echo CHtml::link('Aanwijzing',array("site/checkpoint2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } ?>
		
		<?php if(($cpengadaan->status == 'Penunjukan panitia') || ($cpengadaan->status == 'Prakualifikasi') || ($cpengadaan->status == 'Aanwijzing')) { ?>
				<li><?php echo CHtml::link('Penawaran dan Evaluasi',array("site/checkpoint2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else if($cpengadaan->status == 'Penawaran dan Evaluasi') { ?>
				<li class='onprogress'><?php echo CHtml::link('Penawaran dan Evaluasi',array("site/checkpoint2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else { ?>
				<li class='sudah'><?php echo CHtml::link('Penawaran dan Evaluasi',array("site/checkpoint2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } ?>
		
		<?php if(($cpengadaan->status == 'Penunjukan panitia') || ($cpengadaan->status == 'Prakualifikasi') || ($cpengadaan->status == 'Aanwijzing') || ($cpengadaan->status == 'Penawaran dan Evaluasi')) { ?>
				<li><?php echo CHtml::link('Negosiasi dan Klarifikasi',array("site/checkpoint2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else if($cpengadaan->status == 'Negosiasi dan Klarifikasi') { ?>
				<li class='onprogress'><?php echo CHtml::link('Negosiasi dan Klarifikasi',array("site/checkpoint2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else { ?>
				<li class='sudah'><?php echo CHtml::link('Negosiasi dan Klarifikasi',array("site/checkpoint2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } ?>
		
		<?php if(($cpengadaan->status == 'Penunjukan panitia') || ($cpengadaan->status == 'Prakualifikasi') || ($cpengadaan->status == 'Aanwijzing') || ($cpengadaan->status == 'Penawaran dan Evaluasi') || ($cpengadaan->status == 'Negosiasi dan Klarifikasi')) { ?>
				<li><?php echo CHtml::link('Penentuan Pemenang',array("site/checkpoint2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else if($cpengadaan->status == 'Penentuan Pemenang') { ?>
				<li class='onprogress'><?php echo CHtml::link('Penentuan Pemenang',array("site/checkpoint2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
			<?php } else { ?>
				<li class='sudah'><?php echo CHtml::link('Penentuan Pemenang',array("site/checkpoint2","id"=>"$cpengadaan->id_pengadaan")); ?></li>
		<?php } ?>
		
	<?php } else if(Yii::app()->user->name == 'kadiv'){ ?>
		<li><?php echo CHtml::link('TOR dan RAB',array('site/generator_2')); ?></li>   
		<li><?php echo CHtml::link('Nota Dinas Perintah Pengadaan',array('site/checkpoint3_2')); ?></li>
		<li><?php echo CHtml::link('Pakta Integritas Panitia',array('site/checkpoint4_2')); ?></li>
	
	<?php } else{?>
	
	<?php } ?>
</ul>