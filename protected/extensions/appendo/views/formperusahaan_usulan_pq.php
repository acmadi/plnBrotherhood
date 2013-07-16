<table class="appendo-gii" id="<?php echo $id ?>">
	<thead>
		<tr>
			<th>Perusahaan </th><th>Status</th>
		</tr>
	</thead>
	<tbody>
  
	<?php if ($model[0]->perusahaan == null){ ?>
		<tr>
			<td><?php echo CHtml::textField('perusahaan[]','',array('style'=>'width:80px')); ?></td>            
            <td>
				<?php echo CHtml::dropDownList('usulan_hasil_pq[]',"string",
					array(
						"1"=>"Diusulkan",
						"0"=>"Tidak Diusulkan",
					),array('style'=>'width:130px'));
				?>
            </td>			
		</tr>
		
	<?php }else{ ?>
		<?php for($i = 0; $i < count($model); $i++){ ?>
			<tr>
				<td><?php echo CHtml::textField('perusahaan[]',$model[$i]->perusahaan,array('style'=>'width:80px')); ?></td>				
				<td>
					<?php echo CHtml::dropDownList('usulan_hasil_pq[]',$model[$i]->usulan_hasil_pq,
						array(
							"1"=>"Diusulkan",
							"0"=>"Tidak Diusulkan",
						),array('style'=>'width:130px'));
					?>
				</td>				
			</tr>
		<?php } ?>
		
	<?php } ?>	
		
	</tbody>
</table>