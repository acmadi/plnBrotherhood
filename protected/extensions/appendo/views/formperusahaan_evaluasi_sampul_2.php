<table class="appendo-gii" id="<?php echo $id ?>">
	<thead>
		<tr>
			<th>Perusahaan </th><th>Status</th><th>NPWP</th><th>Alamat</th><th>Nilai</th>
		</tr>
	</thead>
	<tbody>
  
	<?php if ($model[0]->perusahaan == null){ ?>
		<tr>
			<td><?php echo CHtml::textField('perusahaan[]','',array('style'=>'width:120px')); ?></td>            
            <td>
				<?php echo CHtml::dropDownList('evaluasi_penawaran_2[]',"string",
					array(
						"1"=>"Lulus",
						"0"=>"Tidak Lulus",
					),array('style'=>'width:100px'));
				?>
            </td>
			<td><?php echo CHtml::textField('npwp[]','',array('style'=>'width:120px')); ?></td> 
			<td><?php echo CHtml::textField('alamat[]','',array('style'=>'width:120px')); ?></td> 
			<td><?php echo CHtml::textField('nilai[]','',array('style'=>'width:120px')); ?></td> 
		</tr>
		
	<?php }else{ ?>
		<?php for($i = 0; $i < count($model); $i++){ ?>
			<tr>
				<td><?php echo CHtml::textField('perusahaan[]',$model[$i]->perusahaan,array('style'=>'width:120px')); ?></td>				
				<td>
					<?php echo CHtml::dropDownList('evaluasi_penawaran_2[]',$model[$i]->status,
						array(
							"1"=>"Lulus",
							"0"=>"Tidak Lulus",
						),array('style'=>'width:100px'));
					?>
				</td>
				<td><?php echo CHtml::textField('npwp[]',$model[$i]->npwp,array('style'=>'width:120px')); ?></td> 
				<td><?php echo CHtml::textField('alamat[]',$model[$i]->alamat,array('style'=>'width:120px')); ?></td> 
				<td><?php echo CHtml::textField('nilai[]',$model[$i]->nilai,array('style'=>'width:120px')); ?></td> 
			</tr>
		<?php } ?>
		
	<?php } ?>	
		
	</tbody>
</table>