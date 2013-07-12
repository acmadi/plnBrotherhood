<?php
	$this->pageTitle=Yii::app()->name . ' | Divisi';
?>

<div id="pagecontent">
	<div id="sidebar">
	<?php $this->beginWidget('zii.widgets.CPortlet'); ?>
	<ul>
		<li><?php echo CHtml::link('Tambah divisi', array('admin/tambahdivisi')) ?></li>
		<li><?php echo CHtml::link('Hapus divisi', array('admin/hapusdivisi')) ?></li>
	</ul>
	<?php $this->endWidget(); ?>
	</div>
	<div id="maincontent">
		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'dataProvider'=>$model->search(),
			'columns'=>array(
				array(
					'name'=>'No',
					'value'=>'$this->grid->dataProvider->pagination->currentPage * 10 + $row + 1',
				),
				'username',
				'nama_divisi',
			),
		));
		?>
	</div>
</div>