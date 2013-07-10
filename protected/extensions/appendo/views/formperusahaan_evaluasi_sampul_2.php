<table class="appendo-gii" id="<?php echo $id ?>">
	<thead>
		<tr>
			<th>Perusahaan </th><th>Status</th><th>Biaya</th>
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
			<td><?php echo CHtml::textField('biaya[]','',array('style'=>'width:120px')); ?></td> 
		</tr>
		
	<?php }else{ ?>
		<?php for($i = 0; $i < count($model); $i++){ ?>
			<tr>
				<td><?php echo CHtml::textField('perusahaan[]',$model[$i]->perusahaan,array('style'=>'width:120px')); ?></td>				
				<td>
					<?php echo CHtml::dropDownList('evaluasi_penawaran_2[]',$model[$i]->evaluasi_penawaran_2,
						array(
							"1"=>"Lulus",
							"0"=>"Tidak Lulus",
						),array('style'=>'width:100px'));
					?>
				</td>				
				<td><?php echo CHtml::textField('biaya[]',$model[$i]->biaya,array('style'=>'width:120px')); ?></td> 
			</tr>
		<?php } ?>
		
	<?php } ?>	
		
	</tbody>
</table>