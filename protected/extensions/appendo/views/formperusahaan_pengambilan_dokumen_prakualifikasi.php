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
				<?php echo CHtml::dropDownList('pengambilan_lelang_pq[]',"string",
					array(
						"1"=>"Mengambil",
						"0"=>"Tidak Mengambil",
					),array('style'=>'width:140px'));
				?>
            </td>
		</tr>
		
	<?php }else{ ?>
		<?php for($i = 0; $i < count($model); $i++){ ?>
			<tr>
				<td><?php echo CHtml::textField('perusahaan[]',$model[$i]->perusahaan,array('style'=>'width:120px')); ?></td>				
				<td>
					<?php echo CHtml::dropDownList('pengambilan_lelang_pq[]',$model[$i]->pengambilan_lelang_pq,
						array(
							"1"=>"Mengambil",
							"0"=>"Tidak Mengambil",
						),array('style'=>'width:140px'));
					?>
				</td>
			</tr>
		<?php } ?>
		
	<?php } ?>	
		
	</tbody>
</table>