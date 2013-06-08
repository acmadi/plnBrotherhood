<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' | Pengadaan Lampau';
?>

<div>
	<table style="width:600px">
		<tr>
			<th style="width:50px">No</th>
			<th style="width:450px">Pengadaan</th>			
		</tr>
		<tr>
			<td>1</td>
			<td><?php echo CHtml::link('Pengadaan gedung baru',array('site/detilpengadaanhistory')); ?> </td>				
		</tr>
                <tr>
			<td>2</td>
			<td>Pengadaan gedung baru 2</td>				
		</tr>
		<tr>
			<td>3</td>
			<td>Pengadaan mobil</td>				
		</tr>
                
	</table>
</div>
