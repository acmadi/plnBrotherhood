<?php
	$this->pageTitle=Yii::app()->name . ' | Panitia';
?>

<div id="pagecontent">
	<div id="sidebar">
	<?php $this->beginWidget('zii.widgets.CPortlet'); ?>
	<ul>
		<li><?php echo CHtml::link('Tambah panitia', array('site/statistik', 'category'=>'1', 'chart'=>'1')) ?></li>
		<li><?php echo CHtml::link('Hapus panitia', array('site/statistik', 'category'=>'2', 'chart'=>'1')) ?></li>
	</ul>
	<?php $this->endWidget(); ?>
	</div>
	<div id="maincontent">
		<h3>Panitia pengadaan</h3>
		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'dataProvider'=>$model->searchPanitia(),
			// 'htmlOptions'=>array('style'=>'cursor: pointer;'),			
			// 'selectionChanged'=>"function(id){window.location='" . Yii::app()->createUrl("site/detailpengadaan", array("id"=>"$model->id_pengadaan")) . "'+ $.fn.yiiGridView.getSelection(id);}",
			'columns'=>array(
				array(
					'name'=>'No',
					'value'=>'$this->grid->dataProvider->pagination->currentPage * 10 + $row + 1',
				),
				'nama_panitia',
				'SK_panitia',
				'tanggal_sk',
				'jumlah_anggota',
				'status_panitia',
			),
		));
		?>
		<br /><br />
		<h3>Pejabat pengadaan</h3>
		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'dataProvider'=>$model->searchPejabat(),
			// 'htmlOptions'=>array('style'=>'cursor: pointer;'),			
			// 'selectionChanged'=>"function(id){window.location='" . Yii::app()->createUrl("site/detailpengadaan", array("id"=>"$model->id_pengadaan")) . "'+ $.fn.yiiGridView.getSelection(id);}",
			'columns'=>array(
				array(
					'name'=>'No',
					'value'=>'$this->grid->dataProvider->pagination->currentPage * 10 + $row + 1',
				),
				'nama_panitia',
				array(
					'name'=>'Status pejabat',
					'value'=>'$data->status_panitia',
				),
			),
		));
		?>
	</div>
</div>