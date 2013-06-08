<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' | Beranda';
?>

<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'style'=>'background:url(css/bg.gif)')); ?>

