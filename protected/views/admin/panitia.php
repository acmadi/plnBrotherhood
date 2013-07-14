<?php
	$this->pageTitle=Yii::app()->name . ' | Panitia/Pejabat Pengadaan';
?>

<div id="pagecontent">
	<div id="sidebar">
	<?php $this->beginWidget('zii.widgets.CPortlet'); ?>
	<ul>
		<li><?php echo CHtml::link('Tambah pejabat pengadaan', array('admin/tambahpejabat')) ?></li>
		<li><?php echo CHtml::link('Tambah panitia pengadaan', array('admin/tambahpanitia')) ?></li>
		<li><?php echo CHtml::link('Hapus pejabat pengadaan', array('admin/hapuspejabat')) ?></li>
		<li><?php echo CHtml::link('Hapus panitia pengadaan', array('admin/hapuspanitia')) ?></li>
	</ul>
	<?php $this->endWidget(); ?>
	</div>
	<div id="maincontent">
		<h3>Pejabat pengadaan</h3>
		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'dataProvider'=>$model->searchPejabat(),
			'htmlOptions'=>array('style'=>'cursor: pointer;'),			
			'selectionChanged'=>"function(id){window.location='" . Yii::app()->createUrl("admin/detailpejabat", array("id"=>"$model->id_panitia")) . "'+ $.fn.yiiGridView.getSelection(id);}",
			'columns'=>array(
				array(
					'name'=>'No',
					'value'=>'$this->grid->dataProvider->pagination->currentPage * 10 + $row + 1',
				),
				array(
					'name'=>'Nama Pejabat',
					'value'=>'$data->nama_panitia',
				),
			),
		));
		?>
		<br /><br />
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
	</div>
</div>