<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' | Beranda';
		
?>

<h2 style="margin-left:30px">Selamat datang, <b><?php echo User::model()->find('username = "' . Yii::app()->user->name . '"')->nama; ?></b>!</h2>

<?php if(Kdivmum::model()->exists('username = "' . Yii::app()->user->name . '"')){		//kadiv
	
?>
    
    <!----------------------------------------->
	<!--
        <div class="searchdiv">

            <?php 
				// $form=$this->beginWidget('CActiveForm', array(
				// 'action'=>Yii::app()->createUrl($this->route),
				// 'method'=>'get',
				// )); 
			?>	
                    <div class="row">
                            <?php // echo $form->label($model,'nama_pengadaan'); ?>
                            <?php 
								// echo $form->textField($model,'nama_pengadaan',array('size'=>20,'maxlength'=>100)); 
							?>
                            <?php 
								// echo CHtml::submitButton('Cari Nama Pengadaan',array('class'=>'sidafbutton')); 
							?>
                    </div>

            <?php 
				// $this->endWidget(); 
			?>

        </div>
        <br/>
        <br/>
        <br/>
	-->

        <!----------------------------------------->
    
    
<?php
	$this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'pengadaan-grid',
		'dataProvider'=>$model->search(),
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
				'value'=>'$data->divisi_peminta',
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
        else if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {		//panitia/pejabat
		
        ?>
        <!--
            <div class="searchdiv">

                <?php 
					// $form=$this->beginWidget('CActiveForm', array(
					// 'action'=>Yii::app()->createUrl($this->route),
					// 'method'=>'get',
					// )); 
				?>	
                        <div class="row">
                                <?php // echo $form->label($model,'nama_pengadaan'); ?>
                                <?php 
									// echo $form->textField($model,'nama_pengadaan',array('size'=>20,'maxlength'=>100)); 
								?>
                                <?php 
									// echo CHtml::submitButton('Cari Nama Pengadaan',array('class'=>'sidafbutton')); 
								?>
                        </div>

                <?php 
					// $this->endWidget(); 
				?>

            </div>
            <br/>
            <br/>
            <br/>
		-->
            
            <?php
		$this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'pengadaan-grid',
			'dataProvider'=>$model->searchBuatPanitia(),
			 'filter'=>$model,
			'htmlOptions'=>array('style'=>'cursor: pointer;'),			
			'selectionChanged'=>"function(id){window.location='" . Yii::app()->createUrl("site/generator") . "' + '&id=' + $.fn.yiiGridView.getSelection(id);}",
			"ajaxUpdate"=>false,			
			'columns'=>array(
//				array(
//					'name'=>'No',
//					'value'=>'$this->grid->dataProvider->pagination->currentPage * 10 + $row + 1',
//				),
				// 'id_pengadaan',
				'nama_pengadaan',
				// 'nama_penyedia',
				// 'tanggal_masuk',
				// 'tanggal_selesai',
				// 'kode_panitia',
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
                                    'value'=>'$data->divisi_peminta',
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
	if (Kdivmum::model()->exists('username = "' . Yii::app()->user->name . '"')) {
		echo CHtml::button('Tambah Pengadaan', array('submit'=>array('site/tambahpengadaan'), 'class'=>'sidafbutton'));
		echo CHtml::button('Buat Nota Dinas Permintaan TOR/RAB', array('submit'=>array('site/notadinaspermintaantorrab'), 'class'=>'sidafbutton'));
	}
?>



