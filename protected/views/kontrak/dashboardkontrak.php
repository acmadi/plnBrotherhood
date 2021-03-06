<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' | Kontrak';
?>
<h2> Sedang dalam pengembangan </h2>

<?php 
	if(Yii::app()->user->getState('role') == 'kdivmum') {		//kadiv atau panitia kontrak
	
		$this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'pengadaan-grid',
			'dataProvider'=>$model->searchKontrak(),
			'filter'=>$model,
			"ajaxUpdate"=>false,	            
			'htmlOptions'=>array('style'=>'cursor: pointer;'),			
			'selectionChanged'=>"function(id){window.location='" . Yii::app()->createUrl("kontrak/detailkontrak", array("id"=>"$model->id_pengadaan")) . "'+ $.fn.yiiGridView.getSelection(id);}",
			'columns'=>array(
	//			array(
	//				'name'=>'No',
	//				// 'filter'=>CHtml::listData(Pengadaan::model()->nama_pengadaan, 'id', 'name'),
	//				'value'=>'$this->grid->dataProvider->pagination->currentPage * 10 + $row + 1',		
	//			),
				// 'id_pengadaan',
				'nama_pengadaan',
				// 'nama_penyedia',
				// 'tanggal_masuk',
				// 'tanggal_selesai',			
				// 'kode_panitia',
				// 'notaDinasPermintaan.nomor',
					
				// array(            // display using an expression
					// 'name'=>'ndpermintaan',				
					// 'value'=>'$data->notaDinasPermintaan->nomor', 
					// 'filter'=>'',
				// ),			
				
				array(            // display using an expression
					'name'=>'pic',				
					'value'=>'$data->idPanitia->nama_panitia',   
					'htmlOptions'=>array('width'=>60, 'style'=>'text-align:center;'),
				),
					
				array(            // display using an expression
					'name'=>'divisi_peminta',
					'value'=>'$data->divisiPeminta->nama_divisi',
					'htmlOptions'=>array('width'=>60, 'style'=>'text-align:center;'),
				),			
					
				array(            // display using an expression
					'name'=>'sisahari',	
					// 'type'=>'raw',
					'value'=>'$data->sisaHari()',
					'filter'=>'',
					'htmlOptions'=>array('width'=>60, 'style'=>'text-align:center;'),
				),
				
				array(            // display using an expression
					'name'=>'statusgan',
					'value'=>'$data->dapatkanStatus()',
					'filter'=>'',
				),			

			),
			'pager'=>array(
					'class'=>'CLinkPager',
					'header'=>'',
					'nextPageLabel'=>"Selanjutnya",
					'prevPageLabel'=>'Sebelumnya',
				),
			'summaryText' => '',
		)); 
	}//end kadiv
	
	else if(UserKontrak::model()->exists('username = "' . Yii::app()->user->name . '"')){
		$this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'pengadaan-grid',
			'dataProvider'=>$model->searchKontrak(),
			'filter'=>$model,
			"ajaxUpdate"=>false,
			'htmlOptions'=>array('style'=>'cursor: pointer;'),			
			'selectionChanged'=>"function(id){window.location='" . Yii::app()->createUrl("kontrak/suratkontrak", array("id"=>"$model->id_pengadaan")) . "'+ $.fn.yiiGridView.getSelection(id);}",
			'columns'=>array(
	//			array(
	//				'name'=>'No',
	//				// 'filter'=>CHtml::listData(Pengadaan::model()->nama_pengadaan, 'id', 'name'),
	//				'value'=>'$this->grid->dataProvider->pagination->currentPage * 10 + $row + 1',		
	//			),
				// 'id_pengadaan',
				'nama_pengadaan',
				// 'nama_penyedia',
				// 'tanggal_masuk',
				// 'tanggal_selesai',			
				// 'kode_panitia',
				// 'notaDinasPermintaan.nomor',
					
				// array(            // display using an expression
					// 'name'=>'ndpermintaan',				
					// 'value'=>'$data->notaDinasPermintaan->nomor', 
					// 'filter'=>'',
				// ),			
				
				array(            // display using an expression
					'name'=>'pic',				
					'value'=>'$data->idPanitia->nama_panitia',   
					'htmlOptions'=>array('width'=>60, 'style'=>'text-align:center;'),
				),
					
				array(            // display using an expression
					'name'=>'divisi_peminta',
					'value'=>'$data->divisiPeminta->nama_divisi',
					'htmlOptions'=>array('width'=>60, 'style'=>'text-align:center;'),
				),			
					
				array(            // display using an expression
					'name'=>'sisahari',	
					// 'type'=>'raw',
					'value'=>'$data->sisaHari()',
					'filter'=>'',
					'htmlOptions'=>array('width'=>60, 'style'=>'text-align:center;'),
				),
				
				array(            // display using an expression
					'name'=>'statusgan',
					'value'=>'$data->dapatkanStatus()',
					'filter'=>'',
				),										
			),
			'pager'=>array(
					'class'=>'CLinkPager',
					'header'=>'',
					'nextPageLabel'=>"Selanjutnya",
					'prevPageLabel'=>'Sebelumnya',
				),
			'summaryText' => '',
		)); 
	
	}//end panitia kontrak
?>