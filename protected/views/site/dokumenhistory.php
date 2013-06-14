<?php
	$id = Yii::app()->getRequest()->getQuery('id');
	$cdokhis = Pengadaan::model()->find('id_pengadaan = "' . $id . '"');
    $this->pageTitle=Yii::app()->name . ' | List Dokumen : ' . $cdokhis->nama_pengadaan;
?>

<h4> 
    List Dokumen Pengadaan Gedung Baru 
</h4>


<div>
	<table style="width:800px">
		<tr>
			<th style="width:50px">No</th>
			<th style="width:450px">Dokumen</th>
			<th style="width:200px"></th>			
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



<?php echo CHtml::button('Kembali', array('submit'=>array('site/detilpengadaanhistory', 'id'=>$id), 'class'=>'sidafbutton')); ?>
    