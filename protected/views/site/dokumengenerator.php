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

<div id="pagecontent">
	<div id="sidebar">
		<?php if((!Yii::app()->user->isGuest)&&(Anggota::model()->exists('username = "' . Yii::app()->user->name . '"'))) $this->widget('MenuPortlet'); ?>
	</div>

	<div id="maincontent">

		<h4> 
			List Dokumen : <?php echo $cpengadaan->nama_pengadaan?>
		</h4>

		<?php
			$this->widget('zii.widgets.grid.CGridView', array(
				'id'=>'list-dokumen-grid',
				'dataProvider'=>$dataProvider,
				"ajaxUpdate"=>"false",
				'htmlOptions'=>array('style'=>'cursor: pointer;'),			
				'selectionChanged'=>"function(id){window.location='" . Yii::app()->createUrl("site/detaildokumen", array("id"=>"$model->id_dokumen")) . "'+ $.fn.yiiGridView.getSelection(id);}",
				'columns'=>array(
					array(
						'name'=>'No',
						'value'=>'$this->grid->dataProvider->pagination->currentPage * 10 + $row + 1',
					),
					'nama_dokumen',
					array(
						'class'=>'CDataColumn',
						'header'=>'Status Unggah',
						'value'=>'$data->status_upload',
					),
				),
			));
		?>
	</div>
</div>
<?php 
	if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
		echo CHtml::button('Kembali', array('submit'=>array('site/generator', 'id'=>$id), 'class'=>'sidafbutton'));
	} else if (Kdivmum::model()->exists('username = "' . Yii::app()->user->name . '"')) {
		echo CHtml::button('Kembali', array('submit'=>array('site/detailpengadaan', 'id'=>$id), 'class'=>'sidafbutton'));
	}
?>