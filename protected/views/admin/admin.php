<?php
	$this->pageTitle=Yii::app()->name . ' | Manajemen Administrator';
?>

<div id="pagecontent">
	<div id="sidebar">
	<?php $this->beginWidget('zii.widgets.CPortlet'); ?>
	<ul>
		<li><?php echo CHtml::link('Manajemen akun', array('admin/akun')) ?></li>
		<li><?php echo CHtml::link('Tambah admin', array('admin/tambahadmin')) ?></li>
		<li><?php echo CHtml::link('Hapus admin', array('admin/hapusadmin')) ?></li>
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
			),
		));
		?>
	</div>
</div>