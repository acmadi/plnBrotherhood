<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' | Generator';
?>

<div id="pagecontent">
	<div id="sidebar">
		<?php if(!Yii::app()->user->isGuest) $this->widget('MenuPortlet'); ?>
	</div>

	<div id="maincontent">
	<?php 
		if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			echo CHtml::button('Generate Doc', array('submit'=>array('docx/download'), 'class'=>'sidafbutton')); 
		}
	?>

	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'style'=>'background:url(css/bg.gif)'));  ?></div>
