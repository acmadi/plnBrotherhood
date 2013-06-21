<?php
/* @var $this KdivmumController */
/* @var $model Kdivmum */

//$this->breadcrumbs=array(
	//'Kdivmums'=>array('index'),
	//'Create',
//);

$this->menu=array(
	array('label'=>'Daftar KDIVMUM / MSDAF ', 'url'=>array('index')),
	array('label'=>'Kelola KDIVMUM / MSDAF', 'url'=>array('admin')),
);
?>

<h1>Tambah KDIVMUM / MSDAF</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>