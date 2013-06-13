<?php
/* @var $this PaktaIntegritasPanitia1Controller */
/* @var $model PaktaIntegritasPanitia1 */

// $this->breadcrumbs=array(
	// 'Pakta Integritas Panitia1s'=>array('index'),
	// 'Create',
// );

$this->menu=array(
	array('label'=>'List PaktaIntegritasPanitia1', 'url'=>array('index')),
	array('label'=>'Manage PaktaIntegritasPanitia1', 'url'=>array('admin')),
);
?>

<h1>Create PaktaIntegritasPanitia1</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>