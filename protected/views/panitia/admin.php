<?php
/* @var $this PanitiaController */
/* @var $model Panitia */

// $this->breadcrumbs=array(
	// 'Panitias'=>array('index'),
	// 'Manage',
// );

$this->menu=array(
	array('label'=>'Daftar Panitia', 'url'=>array('index')),
	array('label'=>'Tambah Panitia', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#panitia-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Kelola Panitia</h1>


<?php echo CHtml::link('Pencarian Lanjut','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'panitia-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_panitia',
		'nama_panitia',
		'SK_panitia',
		'tahun',
		'jumlah_anggota',
		'status_panitia',
		/*
		'jenis_panitia',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
