<table class="appendo-gii" id="<?php echo $id ?>">
	<thead>
		<tr>
			<th>Perusahaan </th><th>Status</th><th>NPWP</th><th>Alamat</th><th>Biaya</th><th>No Surat Penawaran</th><th>Tgl Surat Penawaran</th>
		</tr>
	</thead>
	<tbody>
  
	<?php if ($model[0]->perusahaan == null){ ?>
		<tr>
			<td><?php echo CHtml::textField('perusahaan[]','',array('style'=>'width:60px')); ?></td>            
            <td>
				<?php echo CHtml::dropDownList('evaluasi_penawaran_1[]',"string",
					array(
						"1"=>"Lulus",
						"0"=>"Tidak Lulus",
					),array('style'=>'width:100px'));
				?>
            </td>
			<td><?php echo CHtml::textField('npwp[]','',array('style'=>'width:60px')); ?></td> 
			<td><?php echo CHtml::textField('alamat[]','',array('style'=>'width:60px')); ?></td> 
			<td><?php echo CHtml::textField('biaya[]','',array('style'=>'width:60px')); ?></td> 
			<td><?php echo CHtml::textField('nomor_surat_penawaran[]','',array('style'=>'width:60px')); ?></td> 
			<td><?php echo CHtml::textField('tanggal_penawaran[]','',array('style'=>'width:60px')); ?></td> 
		</tr>
		
	<?php }else{ ?>
		<?php for($i = 0; $i < count($model); $i++){ ?>
			<tr>
				<td><?php echo CHtml::textField('perusahaan[]',$model[$i]->perusahaan,array('style'=>'width:60px')); ?></td>				
				<td>
					<?php echo CHtml::dropDownList('evaluasi_penawaran_1[]',$model[$i]->evaluasi_penawaran_1,
						array(
							"1"=>"Lulus",
							"0"=>"Tidak Lulus",
						),array('style'=>'width:100px'));
					?>
				</td>
				<td><?php echo CHtml::textField('npwp[]',$model[$i]->npwp,array('style'=>'width:60px')); ?></td> 
				<td><?php echo CHtml::textField('alamat[]',$model[$i]->alamat,array('style'=>'width:60px')); ?></td> 
				<td><?php echo CHtml::textField('biaya[]',$model[$i]->biaya,array('style'=>'width:60px')); ?></td> 
				<td><?php echo CHtml::textField('nomor_surat_penawaran[]',$model[$i]->nomor_surat_penawaran,array('style'=>'width:60px')); ?></td> 
				<td><?php echo CHtml::textField('tanggal_penawaran[]',$model[$i]->tanggal_penawaran,array('style'=>'width:60px')); ?></td> 
			</tr>
		<?php } ?>
		
	<?php } ?>	
		
	</tbody>
</table>