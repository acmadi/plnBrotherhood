<?php
/* @var $this SuratUndanganPenjelasanController */
/* @var $model SuratUndanganPenjelasan */

$this->breadcrumbs=array(
	'Surat Undangan Penjelasans'=>array('index'),
	$model->id_dokumen=>array('view','id'=>$model->id_dokumen),
	'Update',
);

$this->menu=array(
	array('label'=>'List SuratUndanganPenjelasan', 'url'=>array('index')),
	array('label'=>'Create SuratUndanganPenjelasan', 'url'=>array('create')),
	array('label'=>'View SuratUndanganPenjelasan', 'url'=>array('view', 'id'=>$model->id_dokumen)),
	array('label'=>'Manage SuratUndanganPenjelasan', 'url'=>array('admin')),
);
?>

<h1>Update SuratUndanganPenjelasan <?php echo $model->id_dokumen; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>