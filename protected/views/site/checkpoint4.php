<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' | Generator';
?>

<div id="pagecontent">
	<div id="sidebar">
		<?php if(!Yii::app()->user->isGuest) $this->widget('MenuPortlet'); ?>
	</div>

	<div id="maincontent">
		<h1> Undangan Aanwijzing</h1>
		
		<p> &nbsp </p>

		<p><b> Generate Undangan</b></p>
		
		<?php echo CHtml::link('Generate Word', array()); ?>
		
		<form name="nosurat" id="nosurat" method="POST">
			No Surat :<input type="text" NAME="nosurat" id="nosurat" class="text" maxlength="30" />
		</form>
		<form name="tanggal" id="tanggal" method="POST">
			Tanggal Hari ini :<input type="text" NAME="tanggal" id="tanggal" class="text" maxlength="30" />
		</form>
		<form name="sifat" id="sifat" method="POST">
			Sifat :<input type="text" NAME="sifat" id="sifat" class="text" maxlength="30" />
		</form>
		<form name="dari" id="dari" method="POST">
			Dari :<input type="text" NAME="dari" id="dari" class="text" maxlength="30" />
		</form>
		<form name="kepada" id="kepada" method="POST">
			Kepada :<input type="text" NAME="kepada" id="kepada" class="text" maxlength="30" />
		</form>
		<form name="tanggalpelaksanaan" id="tanggalpelaksanaan" method="POST">
			Tanggal pelaksanaan :<input type="text" NAME="tanggalpelaksanaan" id="tanggalpelaksanaan" class="text" maxlength="30" />
		</form>
		<form name="waktupelaksanaan" id="waktupelaksanaan" method="POST">
			Waktu pelaksanaan :<input type="text" NAME="waktupelaksanaan" id="waktupelaksanaan" class="text" maxlength="30" />
		</form><form name="tempatpelaksanaan" id="tempatpelaksanaan" method="POST">
			Tempat pelaksanaan :<input type="text" NAME="tempatpelaksanaan" id="tempatpelaksanaan" class="text" maxlength="30" />
		</form>
		<p> &nbsp </p>
		<p> &nbsp </p>

		<p><input type='submit' name='generate' value='Generate Doc'></p>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'style'=>'background:url(css/bg.gif)'));  ?></div>
