<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' | Kontrak';
?>
Sedang dalam pengembangan

<?php 
	if(Yii::app()->user->getState('role') == 'kdivmum') {		//kadiv atau panitia kontrak
	
		$this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'pengadaan-grid',
			'dataProvider'=>$model->searchKontrak(),
			'filter'=>$model,
			"ajaxUpdate"=>false,	            
			'htmlOptions'=>array('style'=>'cursor: pointer;'),			
			'selectionChanged'=>"function(id){window.location='" . Yii::app()->createUrl("site/detailpengadaan", array("id"=>"$model->id_pengadaan")) . "'+ $.fn.yiiGridView.getSelection(id);}",
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
					'value'=>'$data->namaDivisi->nama',
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
				
				array (
					  'name'=>'progressgan',                                    
					  'value'=>'$this->grid->Controller->createWidget(
										  "zii.widgets.jui.CJuiProgressBar",array(
												"value"=>$data->progressPengadaan(),
												"htmlOptions"=>array(
													"style"=>"width:100px; height:20px; float:left;margin-left:30px; background-color:#44F44F ;background:#EFFDFF;",
												"color" => "red",
													// "options"=>array(
													  // "change"=>new CJavaScriptExpression("function(event, ui)) {}
													// ),
												),					
										  )
									   )->run()',
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
	
	
	}//end panitia kontrak
?>