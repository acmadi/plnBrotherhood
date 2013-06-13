<?php
/* @var $this PanitiaController */
/* @var $model Panitia */

$this->breadcrumbs=array(
	'Panitias'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Panitia', 'url'=>array('index')),
	array('label'=>'Create Panitia', 'url'=>array('create')),
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

<h1>Manage Panitias</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
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
		'kode_panitia',
		'tahun',
		'jumlah_panitia',
		'status_panitia',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
