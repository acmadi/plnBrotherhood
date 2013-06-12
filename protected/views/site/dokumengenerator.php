<?php
	$id = Yii::app()->getRequest()->getQuery('id');
	$cpengadaan = Pengadaan::model()->find('id_pengadaan = "' . $id . '"');
    $this->pageTitle=Yii::app()->name . ' | List Dokumen : ' . $cpengadaan->nama_pengadaan;
?>

<h4> 
    List Dokumen : <?php echo $cpengadaan->nama_pengadaan?>
</h4>

<?php
	$this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'list-dokumen-grid',
		'dataProvider'=>$model->searchListDokumen($id),
		'columns'=>array(
			array(
				'class'=>'CDataColumn',
				'type'=>'number',
				'value'=>'$row + 1',
				'header'=>'No',
			),
			'id_dokumen',
			array(
				'class'=>'CButtonColumn',
				'template'=>'{view} {update}',			
				'viewButtonLabel'=>'Lihat',
				'updateButtonLabel'=>'Perbarui',
				'viewButtonUrl'=>'',
				'updateButtonUrl'=>'',
			),
		),
	));
?>

<?php echo CHtml::button('Kembali', array('submit'=>array('site/detailpengadaan', 'id'=>$id), 'style'=>'background:url(css/bg.gif)'));  ?>
    
    




