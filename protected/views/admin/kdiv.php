<?php
	$this->pageTitle=Yii::app()->name . ' | Pejabat Berwenang';
?>

<div id="pagecontent">
	<div id="sidebar">
	<?php $this->beginWidget('zii.widgets.CPortlet'); ?>
	<ul>
		<li><?php echo CHtml::link('Tambah pejabat', array('admin/tambahkdiv')) ?></li>
		<li><?php echo CHtml::link('Hapus pejabat', array('admin/hapuskdiv')) ?></li>
	</ul>
	<?php $this->endWidget(); ?>
	</div>
	<div id="maincontent">
		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'dataProvider'=>$model->searchKdiv(),
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
				'jabatan',
			),
		));
		?>
	</div>
</div>