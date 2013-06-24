<?php
/* @var $this AnggotaController */
/* @var $model Anggota */

// $this->breadcrumbs=array(
	// 'Anggotas'=>array('index'),
	// 'Manage',
// );

$this->menu=array(
	array('label'=>'Daftar Anggota', 'url'=>array('index')),
	array('label'=>'Tambah Anggota', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#anggota-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Kelola Anggota</h1>

<?php echo CHtml::link('Pencarian Lanjut','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'anggota-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'username',
		'NIP',
		'email',
		'id_panitia',
		'jabatan',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
