<?php
	$this->pageTitle=Yii::app()->name . ' | Detil ' . $divisi->nama_divisi;
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
		<h2><?php echo $divisi->nama_divisi ?></h2>
		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'dataProvider'=>$model->searchUser($divisi->username),
			'columns'=>array(
				array(
					'name'=>'No',
					'value'=>'$this->grid->dataProvider->pagination->currentPage * 10 + $row + 1',
				),
				'username',
				'nama',
			),
		));
		?>
		<?php echo CHtml::button('Tambah pengguna divisi', array('submit'=>array('admin/tambahuserdivisi', 'id'=>$id), 'class'=>'sidafbutton')); ?>
		<?php echo CHtml::button('Hapus pengguna divisi', array('submit'=>array('admin/hapususerdivisi', 'id'=>$id), 'class'=>'sidafbutton')); ?>
	</div>
</div>
<div><?php echo CHtml::button('Kembali', array('submit'=>array('admin/divisi'), 'class'=>'sidafbutton'));  ?></div>