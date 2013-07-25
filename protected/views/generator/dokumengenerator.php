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
		<?php if((!Yii::app()->user->isGuest)&&(Yii::app()->user->getState('role') == 'anggota')) $this->widget('MenuPortlet'); ?>
		<script type="text/javascript">
			$('#20').attr('class','onprogress');
		</script>
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
	if (Yii::app()->user->getState('role') == 'anggota') {
		echo CHtml::button('Kembali', array('submit'=>array('site/dashboard', 'id'=>$id), 'class'=>'sidafbutton'));
	} else if (Yii::app()->user->getState('role') == 'kdivmum') {
		echo CHtml::button('Kembali', array('submit'=>array('site/detailpengadaan', 'id'=>$id), 'class'=>'sidafbutton'));
	}
?>