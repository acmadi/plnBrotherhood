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
						array('label'=>'Beranda', 'url'=>array('/site/dashboard'), 'visible'=>Yii::app()->user->getState('role') != 'admin'),
						array('label'=>'Permintaan', 'url'=>array('/site/permintaan'), 'visible'=>Yii::app()->user->getState('role') == 'kdivmum' || Yii::app()->user->getState('role') == 'divisi'),
						array('label'=>'Kontrak', 'url'=>array('/site/kontrak'), 'visible'=>UserKontrak::model()->exists('username = "' . Yii::app()->user->name . '"') || Yii::app()->user->getState('role') == 'kdivmum'),
						array('label'=>'Arsip', 'url'=>array('/site/history'), 'visible'=>Yii::app()->user->getState('role') != 'admin'),
						array('label'=>'Statistik', 'url'=>array('/site/statistik', 'category'=>'1', 'chart'=>'1'), 'visible'=>Yii::app()->user->getState('role') == 'kdivmum'),
						array('label'=>'Pengguna', 'url'=>array('/admin/pengguna'), 'visible'=>Yii::app()->user->getState('role') == 'admin'),
						array('label'=>'Panitia/Pejabat Pengadaan', 'url'=>array('/admin/panitia'), 'visible'=>Yii::app()->user->getState('role') == 'admin'),
						array('label'=>'Pejabat Berwenang', 'url'=>array('/admin/kdiv'), 'visible'=>Yii::app()->user->getState('role') == 'admin'),
						array('label'=>'Divisi', 'url'=>array('/admin/divisi'), 'visible'=>Yii::app()->user->getState('role') == 'admin'),
						array('label'=>'Manajemen Akun', 'url'=>array('/admin/admin'), 'visible'=>Yii::app()->user->getState('role') == 'admin'),
						array('label'=>'Keluar', 'url'=>array('/site/logout')),
						array('label'=>(Yii::app()->user->getState('role') == 'admin') ? (Admin::model()->find('username = "' . Yii::app()->user->name . '"')->nama) : ((Yii::app()->user->getState('role') == 'anggota') ? (Anggota::model()->find('username = "' . Yii::app()->user->name . '"')->nama) : ((Yii::app()->user->getState('role') == 'divisi') ? (Divisi::model()->find('username = "' . Yii::app()->user->name . '"')->nama_divisi) : (Kdivmum::model()->find('username = "' . Yii::app()->user->name . '"')->nama))), 'itemOptions'=>array('style'=>'color:white;float:right'))
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
