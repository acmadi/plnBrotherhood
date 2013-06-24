<?php
/* @var $this UserController */
/* @var $model User */

// $this->breadcrumbs=array(
	// 'Users'=>array('index'),
	// 'Manage',
// );

$this->menu=array(
	array('label'=>'Daftar Pengguna', 'url'=>array('index')),
	array('label'=>'Tambah Pengguna', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Kelola Pengguna</h1>

<?php echo CHtml::link('Pencarian Lanjut','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'username',
		'nama',
		'password',
		'divisi',
		'status_user',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
