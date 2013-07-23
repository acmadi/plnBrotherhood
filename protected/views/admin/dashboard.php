<?php
	$this->pageTitle=Yii::app()->name . ' | Administrator';
?>

<h2>Administrator</h2>

<?php
	if (Yii::app()->user->getState('asAdmin')) {
		echo CHtml::link('Pindah ke modus pengguna biasa', array('admin/switch', 'id'=>'0'));
	}
	else {
		echo CHtml::link('Pindah ke modus administrator', array('admin/switch', 'id'=>'1'));
	}
?>