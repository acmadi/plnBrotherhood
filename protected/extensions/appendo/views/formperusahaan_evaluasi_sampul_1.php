<table class="appendo-gii" id="<?php echo $id ?>">
	<thead>
		<tr>
			<th>Perusahaan </th><th>NPWP</th><th>Alamat</th><th>No Surat Penawaran</th><th>Tgl Surat Penawaran</th><th>Administrasi</th><th>Teknis</th>
		</tr>
	</thead>
	<tbody>
  
	<?php if ($model[0]->perusahaan == null){ ?>
		<tr>
			<td><?php echo CHtml::textField('perusahaan[]','',array('style'=>'width:80px')); ?></td>     
			<td><?php echo CHtml::textField('npwp[]','',array('style'=>'width:60px')); ?></td>    
			<td><?php echo CHtml::textField('alamat[]','',array('style'=>'width:80px')); ?></td>    			
			<td><?php echo CHtml::textField('nomor_surat_penawaran[]','',array('style'=>'width:60px')); ?></td>    			
			<td><?php echo CHtml::textField('tanggal_penawaran[]','',array('style'=>'width:60px')); ?></td>    			
            <td>
				<?php echo CHtml::dropDownList('administrasi[]',"string",
					array(
						"1"=>"Lulus",
						"0"=>"Tidak Lulus",
					),array('style'=>'width:100px'));
				?>
            </td>
			<td>
				<?php echo CHtml::dropDownList('evaluasi_penawaran_1[]',"string",
					array(
						"-"=>"Tidak Mengikuti",
						"1"=>"Lulus",
						"0"=>"Tidak Lulus",
					),array('style'=>'width:100px'));
				?>
            </td>
			
		</tr>
		
	<?php }else{ ?>
		<?php for($i = 0; $i < count($model); $i++){ ?>
			<tr>
				<td><?php echo CHtml::textField('perusahaan[]',$model[$i]->perusahaan,array('style'=>'width:80px')); ?></td>				
				<td><?php echo CHtml::textField('npwp[]',$model[$i]->npwp,array('style'=>'width:60px')); ?></td>    
				<td><?php echo CHtml::textField('alamat[]',$model[$i]->alamat,array('style'=>'width:80px')); ?></td> 
				<td><?php echo CHtml::textField('nomor_surat_penawaran[]',$model[$i]->nomor_surat_penawaran,array('style'=>'width:60px')); ?></td> 
				<td><?php echo CHtml::textField('tanggal_penawaran[]',$model[$i]->tanggal_penawaran,array('style'=>'width:60px')); ?></td> 
				<td>
					<?php echo CHtml::dropDownList('administrasi[]',$model[$i]->administrasi,
						array(
							"1"=>"Lulus",
							"0"=>"Tidak Lulus",
						),array('style'=>'width:100px'));
					?>
				</td>
				<td>
					<?php echo CHtml::dropDownList('evaluasi_penawaran_1[]',$model[$i]->evaluasi_penawaran_1,
						array(
							"-"=>"Tidak Mengikuti",
							"1"=>"Lulus",
							"0"=>"Tidak Lulus",
						),array('style'=>'width:100px'));
					?>
				</td>
			
			</tr>
		<?php } ?>
		
	<?php } ?>	
		
	</tbody>
</table>