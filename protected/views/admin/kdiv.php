<?php
	$this->pageTitle=Yii::app()->name . ' | Pejabat Berwenang';
?>

<div id="pagecontent">
	<div id="sidebar">
	<?php $this->beginWidget('zii.widgets.CPortlet'); ?>
	<ul>
		<li><?php echo CHtml::link('Tambah pejabat berwenang', array('admin/tambahkdiv')) ?></li>
		<li><?php echo CHtml::link('Hapus pejabat berwenang', array('admin/hapuskdiv')) ?></li>
		<li><?php echo CHtml::link('Tambah jenis jabatan', array('admin/tambahjabatan')) ?></li>
		<li><?php echo CHtml::link('Hapus jenis jabatan', array('admin/hapusjabatan')) ?></li>
	</ul>
	<?php $this->endWidget(); ?>
	</div>
	<div id="maincontent">
		<h3>Jenis jabatan</h3>
		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'dataProvider'=>$modelJabatan->searchJabatan(),
			// 'htmlOptions'=>array('style'=>'cursor: pointer;'),			
			// 'selectionChanged'=>"function(id){window.location='" . Yii::app()->createUrl("site/detailpengadaan", array("id"=>"$model->id_pengadaan")) . "'+ $.fn.yiiGridView.getSelection(id);}",
			'columns'=>array(
				array(
					'name'=>'No',
					'value'=>'$this->grid->dataProvider->pagination->currentPage * 10 + $row + 1',
				),
				array(
					'name'=>'Jenis Jabatan',
					'value'=>'$data->jabatan',
				),
				'kepanjangan',
			),
			'pager'=>array(
					'class'=>'CLinkPager',
					'header'=>'',
					'nextPageLabel'=>"Selanjutnya",
					'prevPageLabel'=>'Sebelumnya',
			),
			'summaryText'=>'',
		));
		?>
		<br /><br />
		<h3>Pejabat yang berwenang</h3>
		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'dataProvider'=>$modelKdiv->searchKdiv(),
			// 'htmlOptions'=>array('style'=>'cursor: pointer;'),			
			// 'selectionChanged'=>"function(id){window.location='" . Yii::app()->createUrl("site/detailpengadaan", array("id"=>"$model->id_pengadaan")) . "'+ $.fn.yiiGridView.getSelection(id);}",
			'columns'=>array(
				array(
					'name'=>'No',
					'value'=>'$this->grid->dataProvider->pagination->currentPage * 10 + $row + 1',
				),
				'username',
				'nama',
				array(
					'name'=>'Jabatan',
					'value'=>'$data->idJabatan->jabatan',
				),
			),
			'pager'=>array(
					'class'=>'CLinkPager',
					'header'=>'',
					'nextPageLabel'=>"Selanjutnya",
					'prevPageLabel'=>'Sebelumnya',
			),
			'summaryText'=>'',
		));
		?>
	</div>
</div>