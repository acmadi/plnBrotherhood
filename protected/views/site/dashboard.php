<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' | Beranda';
?>

<h2 style="margin-left:30px">Selamat datang, <b><?php echo CHtml::encode(Yii::app()->user->name); ?></b>!</h2>

<br />

<div id="tabelstatus">
	<table style="width:600px">
		<tr>
			<th style="width:50px">No</th>
			<th style="width:450px">Pengadaan</th>
			<th style="width:100px">Status</th>
		</tr>
		<tr>
			<td>1</td>
			<td><?php
				if (Yii::app()->user->name == 'panitia') {
					echo CHtml::link('Pengadaan alat mandi', array('site/detailpengadaan'));
				}
				else if (Yii::app()->user->name == 'kadiv') {
					echo CHtml::link('Pengadaan alat mandi', array('site/generator'));
				}
			?></td>
			<td>Checkpoint 1</td>
		</tr>
	</table>
</div>

<?php echo CHtml::button('Unggah berkas excel', array('submit'=>array('site/uploadexcel'), 'style'=>'background:url(css/bg.gif)')); ?>

