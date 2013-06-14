<?php
	$id = Yii::app()->getRequest()->getQuery('id');
	$cpengadaan = Pengadaan::model()->find('id_pengadaan = "' . $id . '"');
    $this->pageTitle=Yii::app()->name . ' | List Dokumen : ' . $cpengadaan->nama_pengadaan;
    $dataProvider = new CActiveDataProvider(Dokumen::model(), array(
    	'criteria'=>array(
    		'condition'=>'id_pengadaan = "' . $id . '"',
    		'order'=>'id_dokumen ASC',
    	),
    ));
?>

<h4> 
    List Dokumen : <?php echo $cpengadaan->nama_pengadaan?>
</h4>

<?php
	$this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'list-dokumen-grid',
		'dataProvider'=>$dataProvider,
		'columns'=>array(
			'nama_dokumen',
			array(
				'class'=>'CDataColumn',
				'header'=>'Status Unggah',
				'value'=>'$data->status_upload',
			),
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


<?php echo CHtml::button('Kembali', array('submit'=>array('site/detilpengadaanhistory', 'id'=>$id), 'class'=>'sidafbutton')); ?>
    