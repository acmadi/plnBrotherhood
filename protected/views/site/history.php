<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' | Pengadaan Lampau';
?>

<div>
	<table style="width:600px">
		<tr>
			<th style="width:50px">No</th>
			<th style="width:450px">Pengadaan</th>
			<th style="width:100px"></th>
		</tr>
		<tr>
			<td>1</td>
			<td>Pengadaan gedung baru</td>	
			<td><?php echo CHtml::link('Link Dokumen',array('site/dokumenhistory'));  ?> </td>
		</tr>
                <tr>
			<td>2</td>
			<td>Pengadaan gedung baru 2</td>	
			<td>Link dokumen</td>
		</tr>
		<tr>
			<td>3</td>
			<td>Pengadaan mobil</td>	
			<td>Link dokumen</td>
		</tr>
                
	</table>
</div>
