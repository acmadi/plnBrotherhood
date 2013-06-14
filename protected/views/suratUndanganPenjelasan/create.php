<?php
/* @var $this SuratUndanganPenjelasanController */
/* @var $model SuratUndanganPenjelasan */

$this->breadcrumbs=array(
	'Surat Undangan Penjelasans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SuratUndanganPenjelasan', 'url'=>array('index')),
	array('label'=>'Manage SuratUndanganPenjelasan', 'url'=>array('admin')),
);
?>

<h1>Create SuratUndanganPenjelasan</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>