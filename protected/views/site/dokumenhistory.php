<?php
    $this->pageTitle=Yii::app()->name . ' | List Dokumen Pengadaan Gedung Baru';
?>

<div>
	<table style="width:600px">
		<tr>
			<th style="width:50px">No</th>
			<th style="width:450px">Dokumen</th>
			<th style="width:100px"></th>
		</tr>
		<tr>
			<td>1</td>
			<td>Nota Dinas Permintaan</td>	
                        <td>Unduh</td>
		</tr>
                <tr>
			<td>2</td>
			<td>Nota Dinas Pengadaan</td>	
                        <td>Unduh</td>
		</tr>
                <tr>
			<td>3</td>
			<td>Pakta Integritas Panitia</td>	
                        <td>Unduh</td>
		</tr>
                
	</table>
</div>

<?php echo CHtml::button('Kembali', array('submit'=>array('site/history')))  ?>
    
    




