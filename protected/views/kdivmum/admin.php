<?php
/* @var $this KdivmumController */
/* @var $model Kdivmum */

// $this->breadcrumbs=array(
	// 'Kdivmums'=>array('index'),
	// 'Manage',
// );

$this->menu=array(
	array('label'=>'Daftar KDIVMUM / MSDAF', 'url'=>array('index')),
	array('label'=>'Tambah KDIVMUM / MSDAF', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#kdivmum-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage KDIVMUM / MSDAF</h1>


<?php echo CHtml::link('Pencarian Lanjut','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'kdivmum-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'username',
		'NIP',
		'email',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
