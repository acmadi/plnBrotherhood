<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' | Beranda';
		
?>

<h2 style="margin-left:30px">Selamat datang, <b>
	<?php
		switch (Yii::app()->user->getState('role')) {
			case 'admin' : {
				echo Admin::model()->find('username = "' . Yii::app()->user->name . '"')->nama;
				break;
			}
			case 'anggota' : {
				echo Anggota::model()->find('username = "' . Yii::app()->user->name . '"')->nama;
				break;
			}
			case 'divisi' : {
				echo Divisi::model()->find('username = "' . Yii::app()->user->name . '"')->nama_divisi;
				break;
			}
			case 'kdivmum' : {
				echo Kdivmum::model()->find('username = "' . Yii::app()->user->name . '"')->nama;
				break;
			}
		}
	?>
</b>!</h2>

<?php if(Yii::app()->user->getState('role') == 'kdivmum'){		//kadiv
	
?>

<?php
	$this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'pengadaan-grid',
		'dataProvider'=>$model->searchDashboard(),
		'filter'=>$model,
		"ajaxUpdate"=>false,	            
		'htmlOptions'=>array('style'=>'cursor: pointer;'),			
		'selectionChanged'=>"function(id){window.location='" . Yii::app()->createUrl("site/detailpengadaan", array("id"=>"$model->id_pengadaan")) . "'+ $.fn.yiiGridView.getSelection(id);}",
		'columns'=>array(
			'nama_pengadaan',
				
			array(            // display using an expression
				'name'=>'ndpermintaan',				
				'value'=>'$data->notaDinasPermintaan->nomor', 
				'filter'=>'',
			),			
			
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
	} 
        else if (Yii::app()->user->getState('role') == 'anggota') {		//panitia/pejabat
		
        ?>
            
            <?php
			$this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'pengadaan-grid',
			'dataProvider'=>$model->searchBuatPanitia(),
			 'filter'=>$model,
			'htmlOptions'=>array('style'=>'cursor: pointer;'),			
			'selectionChanged'=>"function(id){window.location='" . Yii::app()->createUrl("generator/generator") . "' + '&id=' + $.fn.yiiGridView.getSelection(id);}",
			"ajaxUpdate"=>false,			
			'columns'=>array(
				'nama_pengadaan',
				array(            // display using an expression
                                    'name'=>'ndpermintaan',				
                                    'value'=>'$data->notaDinasPermintaan->nomor',
                                    'filter'=>'',
                                ),		

				array(            // display using an expression
                                    'name'=>'pic',				
                                    'filter'=>'',
                                    'value'=>'$data->idPanitia->nama_panitia',   
                                    'htmlOptions'=>array('width'=>60, 'style'=>'text-align:center;'),
				),
				
				'metode_pengadaan',
				
				array(            // display using an expression
                                    'name'=>'divisi_peminta',
                                    'value'=>'$data->divisiPeminta->nama_divisi',
                                    'htmlOptions'=>array('width'=>60, 'style'=>'text-align:center;'),
                                ),					
				
				array(            // display using an expression
                                    'name'=>'sisahari',	
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
	}
	else if (Yii::app()->user->getState('role') == 'divisi') {		//Divisi lain / user
		
        ?>            
            <?php
			$this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'pengadaan-grid',
			'dataProvider'=>$model->searchBuatDivisi(),
			 'filter'=>$model,
			'htmlOptions'=>array('style'=>'cursor: pointer;'),			
			'selectionChanged'=>"function(id){window.location='" . Yii::app()->createUrl("site/detailpengadaan") . "' + '&id=' + $.fn.yiiGridView.getSelection(id);}",
			"ajaxUpdate"=>false,			
			'columns'=>array(
				'nama_pengadaan',
				array(            // display using an expression
                                    'name'=>'ndpermintaan',				
                                    'value'=>'$data->notaDinasPermintaan->nomor',
                                    'filter'=>'',
                                ),		

				array(            // display using an expression
                                    'name'=>'pic',	
                                    'value'=>'$data->idPanitia->nama_panitia',   
                                    'htmlOptions'=>array('width'=>60, 'style'=>'text-align:center;'),
				),				
				
				array(            // display using an expression
                                    'name'=>'sisahari',	
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
	}
?>


<?php 
	if (Yii::app()->user->getState('role') == 'kdivmum' || Yii::app()->user->getState('role') == 'divisi') {
		echo CHtml::button('Tambah Pengadaan', array('submit'=>array('site/tambahpengadaan1'), 'class'=>'sidafbutton'));
	}
?>



