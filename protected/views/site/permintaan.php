<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' | Permintaan';
		
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
				'value'=>'$data->namaDivisi->nama',
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
	else if (Divisi::model()->exists('username = "' . Yii::app()->user->name . '"')) {		//Divisi lain / user
		
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




