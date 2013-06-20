<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' | Beranda';
?>

<h2 style="margin-left:30px">Selamat datang, <b><?php echo User::model()->find('username = "' . Yii::app()->user->name . '"')->nama; ?></b>!</h2>

<?php if(Kdivmum::model()->exists('username = "' . Yii::app()->user->name . '"')){		//kadiv

	$this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'pengadaan-grid',
		'dataProvider'=>$model->search(),
		// 'filter'=>$model,
		"ajaxUpdate"=>"false",
		'htmlOptions'=>array('style'=>'cursor: pointer;'),			
		'selectionChanged'=>"function(id){window.location='" . Yii::app()->createUrl("site/detailpengadaan", array("id"=>"$model->id_pengadaan")) . "'+ $.fn.yiiGridView.getSelection(id);}",
		'columns'=>array(
			array(
				'name'=>'No',
				'value'=>'$this->grid->dataProvider->pagination->currentPage * 10 + $row + 1',		
			),
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
            'value'=>'$data->sisaHari($data->id_pengadaan)',
			),
			
			'status',
			
			array (
				  'name'=>'Progress',				  
				  'value'=>'$this->grid->Controller->createWidget("zii.widgets.jui.CJuiProgressBar",array(					
					"value"=>$data->progressPengadaan(),
					"htmlOptions"=>array(
					  "style"=>"width:100px; height:20px; float:left;margin-left:35px; background-color:#44F44F ;background:#EFFDFF",
					  "color" => "red"
					  // "options"=>array(
					    // "change"=>new CJavaScriptExpression("function(event, ui)) {}
					  // ),
					),					

				  ))->run()',
				),
				
			/*
			'biaya',
			'nama',			
			'metode_pengadaan',
			'metode_penawaran',
			'deskripsi',
			*/
			// array(
				// 'class'=>'CButtonColumn',
				// 'template'=>'{view}',			
				// 'viewButtonLabel'=>'Lihat',
				// 'viewButtonUrl'=>'Yii::app()->createUrl("site/detailpengadaan", array("id"=>"$data->id_pengadaan"))',			
			// ),
		),
	)); 
	} else if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {		//panitia/pejabat
				
		$this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'pengadaan-grid',
			'dataProvider'=>$model->searchBuatPanitia(),
			// 'filter'=>$model,
			'htmlOptions'=>array('style'=>'cursor: pointer;'),			
			'selectionChanged'=>"function(id){window.location='" . Yii::app()->createUrl("site/generator") . "' + '&id=' + $.fn.yiiGridView.getSelection(id);}",

			"ajaxUpdate"=>"false",
			
			'columns'=>array(
				array(
					'name'=>'No',
					'value'=>'$this->grid->dataProvider->pagination->currentPage * 10 + $row + 1',
				),
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
				'value'=>'$data->sisaHari($data->id_pengadaan)',
				),
				'status',
				
				array (
				  'name'=>'Progress',				  
				  'value'=>'$this->grid->Controller->createWidget("zii.widgets.jui.CJuiProgressBar",array(					
					"value"=>$data->progressPengadaan(),
					"htmlOptions"=>array(
					  "style"=>"width:100px; height:20px; float:left;margin-left:35px; background-color:#44F44F ;background:#EFFDFF",
					  "color" => "red"
					  // "options"=>array(
					    // "change"=>new CJavaScriptExpression("function(event, ui)) {}
					  // ),
					),					

				  ))->run()',
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



