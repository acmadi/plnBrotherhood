<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' | Permintaan';
		
?>

<?php if(Yii::app()->user->getState('role') == 'kdivmum'){		//kadiv
	
?>    
    
<?php
	$this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'pengadaan-grid',
		'dataProvider'=>$model->searchPermintaan(),
		'filter'=>$model,
		"ajaxUpdate"=>false,	            
		'htmlOptions'=>array('style'=>'cursor: pointer;'),			
		'selectionChanged'=>"function(id){window.location='" . Yii::app()->createUrl("site/detailpengadaan", array("id"=>"$model->id_pengadaan")) . "'+ $.fn.yiiGridView.getSelection(id);}",
		'columns'=>array(
			array(            // display using an expression
				'name'=>'nama_pengadaan',				
				'value'=>'$data->nama_pengadaan', 
				'htmlOptions'=>array('width'=>400, 'style'=>'text-align:left;'),
			),	

			array(            // display using an expression
				'name'=>'ndpermintaan',				
				'value'=>'$data->notaDinasPermintaan->nomor', 
				'filter'=>'',
				'htmlOptions'=>array('width'=>200, 'style'=>'text-align:left;'),
			),	
				
			array(            // display using an expression
				'name'=>'divisi_peminta',
				'value'=>'$data->divisiPeminta->nama_divisi',
				'htmlOptions'=>array('width'=>200, 'style'=>'text-align:center;'),
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
		'dataProvider'=>$model->searchPermintaanDivisi(),
		'filter'=>$model,
		"ajaxUpdate"=>false,	            
		'htmlOptions'=>array('style'=>'cursor: pointer;'),			
		'selectionChanged'=>"function(id){window.location='" . Yii::app()->createUrl("site/edittambahpengadaan1", array("id"=>"$model->id_pengadaan")) . "'+ $.fn.yiiGridView.getSelection(id);}",
		'columns'=>array(
			array(            // display using an expression
				'name'=>'nama_pengadaan',				
				'value'=>'$data->nama_pengadaan', 
				'htmlOptions'=>array('width'=>400, 'style'=>'text-align:left;'),
			),	

			array(            // display using an expression
				'name'=>'ndpermintaan',				
				'value'=>'$data->notaDinasPermintaan->nomor', 
				'filter'=>'',
				'htmlOptions'=>array('width'=>200, 'style'=>'text-align:left;'),
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




