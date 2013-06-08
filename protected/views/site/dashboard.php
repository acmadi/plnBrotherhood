<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' | Dashboard';
?>

<h2 style="margin-left:30px">Welcome, <b><?php echo CHtml::encode(Yii::app()->user->name); ?></b>!</h2>

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
			<td><?php echo CHtml::link('Pengadaan alat mandi', array('site/detailpengadaan'))?></td>
			<td>Checkpoint 1</td>
		</tr>
	</table>
</div>

<div>
	<?php echo CHtml::link('See history', array('site/history'))?>
</div>
