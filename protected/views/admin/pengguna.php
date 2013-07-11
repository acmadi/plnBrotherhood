<?php
	$this->pageTitle=Yii::app()->name . ' | Pengguna';
?>

<div id="pagecontent">
	<div id="sidebar">
	<?php $this->beginWidget('zii.widgets.CPortlet'); ?>
	<ul>
		<li><?php echo CHtml::link('Tambah pengguna', array('site/statistik', 'category'=>'1', 'chart'=>'1')) ?></li>
		<li><?php echo CHtml::link('Hapus pengguna', array('site/statistik', 'category'=>'2', 'chart'=>'1')) ?></li>
	</ul>
	<?php $this->endWidget(); ?>
	</div>
	<div id="maincontent">
		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'dataProvider'=>$model->search(),
			// 'htmlOptions'=>array('style'=>'cursor: pointer;'),			
			// 'selectionChanged'=>"function(id){window.location='" . Yii::app()->createUrl("site/detailpengadaan", array("id"=>"$model->id_pengadaan")) . "'+ $.fn.yiiGridView.getSelection(id);}",
			'columns'=>array(
				array(
					'name'=>'No',
					'value'=>'$this->grid->dataProvider->pagination->currentPage * 10 + $row + 1',
				),
				'username',
				'NIP',
				'nama',
				array(
					'name'=>'Peran',
					'value'=>'$data->idPanitia->jenis_panitia',
				),
			),
		));
		?>
	</div>
</div>