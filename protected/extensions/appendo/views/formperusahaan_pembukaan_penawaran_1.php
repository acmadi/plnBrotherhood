<table class="appendo-gii" id="<?php echo $id ?>">
	<thead>
		<tr>
			<th>Perusahaan </th><th>Status</th>
		</tr>
	</thead>
	<tbody>
  
	<?php if ($model[0]->perusahaan == null){ ?>
		<tr>
			<td><?php echo CHtml::textField('perusahaan[]','',array('style'=>'width:120px')); ?></td>            
            <td>
				<?php echo CHtml::dropDownList('pembukaan_penawaran_1[]',"string",
					array(
						"1"=>"Dokumen Sah dan Penyedia Hadir",
						"2"=>"Dokumen Sah dan Penyedia Tidak Hadir",
						"3"=>"Dokumen Tidak Sah dan Penyedia Hadir",
						"4"=>"Dokumen Tidak Sah dan Penyedia Tidak Hadir",
						"0"=>"Tidak Memasukkan dokumen",
					),array('style'=>'width:330px'));
				?>
            </td>
			
		</tr>
		
	<?php }else{ ?>
		<?php for($i = 0; $i < count($model); $i++){ ?>
			<tr>
				<td><?php echo CHtml::textField('perusahaan[]',$model[$i]->perusahaan,array('style'=>'width:120px')); ?></td>				
				<td>
					<?php echo CHtml::dropDownList('pembukaan_penawaran_1[]',$model[$i]->pembukaan_penawaran_1,
						array(
							"1"=>"Dokumen Sah dan Penyedia Hadir",
							"2"=>"Dokumen Sah dan Penyedia Tidak Hadir",
							"3"=>"Dokumen Tidak Sah dan Penyedia Hadir",
							"4"=>"Dokumen Tidak Sah dan Penyedia Tidak Hadir",
							"0"=>"Tidak Memasukkan dokumen",
						),array('style'=>'width:330px'));
					?>
				</td>
				
			</tr>
		<?php } ?>
		
	<?php } ?>	
		
	</tbody>
</table>