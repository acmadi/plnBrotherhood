<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<link rel="icon" type="image/png" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/pics/favicon.png" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/dashboard.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/detailpengadaan.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/generator.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/pics/logo.png" /></div>
	</div><!-- header -->
	
	<div id="mainmenu">
		<?php
			if (Yii::app()->user->isGuest) {
				$this->widget('zii.widgets.CMenu', array(
					'items'=>array(
						array('label'=>'Masuk', 'url'=>array('/site/login')),
					),
				));
			} else {
				$this->widget('zii.widgets.CMenu', array(
					'items'=>array(
						array('label'=>'Beranda', 'url'=>array('/site/dashboard'), 'visible'=>!Admin::model()->exists('username = "' . Yii::app()->user->name . '"')),
						array('label'=>'Kontrak', 'url'=>array('/site/kontrak'), 'visible'=>UserKontrak::model()->exists('username = "' . Yii::app()->user->name . '"')),
						array('label'=>'Arsip', 'url'=>array('/site/history'), 'visible'=>!Admin::model()->exists('username = "' . Yii::app()->user->name . '"')),
						array('label'=>'Statistik', 'url'=>array('/site/statistik', 'chart'=>'1'), 'visible'=>Kdivmum::model()->exists('username = "' . Yii::app()->user->name . '"')),
						array('label'=>'Pengguna', 'url'=>array('/user/index'), 'visible'=>Admin::model()->exists('username = "' . Yii::app()->user->name . '"')),
						array('label'=>'Panitia', 'url'=>array('/panitia/index'), 'visible'=>Admin::model()->exists('username = "' . Yii::app()->user->name . '"')),
						array('label'=>'Anggota', 'url'=>array('/anggota/index'), 'visible'=>Admin::model()->exists('username = "' . Yii::app()->user->name . '"')),
						array('label'=>'KDIVMUM / MSDAF', 'url'=>array('/kdivmum/index'), 'visible'=>Admin::model()->exists('username = "' . Yii::app()->user->name . '"')),
						// array('label'=>'Admin', 'url'=>array('/admin/index')),
						array('label'=>'Keluar', 'url'=>array('/site/logout')),
						array('label'=>User::model()->find('username = "' . Yii::app()->user->name . '"')->nama, 'itemOptions'=>array('style'=>'color:white;float:right'))
					),
				));
			}
		?>
	</div><!-- mainmenu -->
	
	<?php echo $content; ?>
	
	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by PLN Brotherhood.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
