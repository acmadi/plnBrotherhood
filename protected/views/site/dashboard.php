<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' | Beranda';
$id = Yii::app()->user->name;
$cpengadaan = Pengadaan::model()->find('id_pengadaan = "' . $id . '"');
?>

<h2 style="margin-left:30px">Selamat datang, <b><?php echo User::model()->find('username = "' . Yii::app()->user->name . '"')->nama; ?></b>!</h2>

<?php if(Kdivmum::model()->exists('username = "' . Yii::app()->user->name . '"')){

	$this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'pengadaan-grid',
		'dataProvider'=>$model->search(),
		// 'filter'=>$model,
		'columns'=>array(
			// 'id_pengadaan',
			'nama_pengadaan',
			// 'nama_penyedia',
			// 'tanggal_masuk',
			// 'tanggal_selesai',			
			// 'kode_panitia',
			// 'notaDinasPermintaan.nomor',
						
			'notaDinasPerintahPengadaan.nota_dinas_permintaan',
			
			array(            // display using an expression
				'name'=>'PIC',
				'value'=>'$data->idPanitia->nama_panitia',
				),
				
			array(            // display using an expression
            'name'=>'Sisa Hari',
            'value'=>'$data->sisaHari()',
			),
			
			'status',
			/*
			'biaya',
			'nama',			
			'metode_pengadaan',
			'metode_penawaran',
			'deskripsi',
			*/
			array(
				'class'=>'CButtonColumn',
				'template'=>'{view}',			
				'viewButtonLabel'=>'Lihat',
				'viewButtonUrl'=>'Yii::app()->createUrl("site/detailpengadaan", array("id"=>"$data->id_pengadaan"))',			
			),
		),
	)); 
	} else if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
		$this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'pengadaan-grid',
			'dataProvider'=>$model->searchBuatPanitia(),
			// 'filter'=>$model,
			'columns'=>array(
				// 'id_pengadaan',
				'nama_pengadaan',
				// 'nama_penyedia',
				// 'tanggal_masuk',
				// 'tanggal_selesai',
				// 'kode_panitia',
				'notaDinasPerintahPengadaan.nota_dinas_permintaan',

				array(            // display using an expression
				'name'=>'PIC',
				'value'=>'$data->idPanitia->nama_panitia',
				),
				
				array(            // display using an expression
				'name'=>'Sisa Hari',
				'value'=>'$data->sisaHari()',
				),
				'status',
				/*
				'biaya',
				'nama',				
				'metode_pengadaan',
				'metode_penawaran',
				'deskripsi',
				*/
				array(
					'class'=>'CButtonColumn',
					'template'=>'{view}',			
					'viewButtonLabel'=>'Lihat',
					'viewButtonUrl'=>'Yii::app()->createUrl("site/generator", array("id"=>"$data->id_pengadaan"))',			
				),
			),
		)); 
	}
?>


<?php 
	if (Kdivmum::model()->exists('username = "' . Yii::app()->user->name . '"')) {
		echo CHtml::button('Tambah Pengadaan', array('submit'=>array('site/tambahpengadaan'), 'class'=>'sidafbutton')); 
	}
?>



