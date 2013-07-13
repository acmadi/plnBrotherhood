<?php
	$this->pageTitle=Yii::app()->name . ' | Panitia';
?>

<div id="pagecontent">
	<div id="sidebar">
	<?php $this->beginWidget('zii.widgets.CPortlet'); ?>
	<ul>
		<li><?php echo CHtml::link('Tambah panitia pengadaan', array('admin/tambahpanitia')) ?></li>
		<li><?php echo CHtml::link('Hapus panitia pengadaan', array('admin/hapuspanitia')) ?></li>
	</ul>
	<?php $this->endWidget(); ?>
	</div>
	<div id="maincontent">
		<h3>Panitia pengadaan</h3>
		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'dataProvider'=>$model->searchPanitia(),
			'htmlOptions'=>array('style'=>'cursor: pointer;'),			
			'selectionChanged'=>"function(id){window.location='" . Yii::app()->createUrl("admin/detailpanitia", array("id"=>"$model->id_panitia")) . "'+ $.fn.yiiGridView.getSelection(id);}",
			'columns'=>array(
				array(
					'name'=>'No',
					'value'=>'$this->grid->dataProvider->pagination->currentPage * 10 + $row + 1',
				),
				'nama_panitia',
				'SK_panitia',
				'tanggal_sk',
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
			),
		));
		?>
	</div>
</div>