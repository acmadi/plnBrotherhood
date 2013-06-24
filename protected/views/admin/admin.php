<?php
/* @var $this AdminController */
/* @var $model Admin */

// $this->breadcrumbs=array(
	// 'Admins'=>array('index'),
	// 'Manage',
// );

$this->menu=array(
	array('label'=>'Daftar Admin', 'url'=>array('index')),
	array('label'=>'Tambah Admin', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#admin-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Kelola Admin</h1>

<?php echo CHtml::link('Pencarian Lanjut','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'admin-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'username',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
