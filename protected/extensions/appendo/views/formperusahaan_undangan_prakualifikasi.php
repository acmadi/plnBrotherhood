<table class="appendo-gii" id="<?php echo $id ?>">
	<thead>
		<tr>
			<th>Perusahaan</th><th>Alamat</th>
		</tr>
	</thead>
	<tbody>
  
	<?php if ($model[0]->perusahaan == null){ ?>
		<tr>
			<td><?php echo CHtml::textField('perusahaan[]','-',array('style'=>'width:120px')); ?></td>            
			<td><?php echo CHtml::textField('alamat[]','-',array('style'=>'width:120px')); ?></td>            
            
		</tr>
		
	<?php }else{ ?>
		<?php for($i = 0; $i < count($model); $i++){ ?>
			<tr>
				<td><?php echo CHtml::textField('perusahaan[]',$model[$i]->perusahaan,array('style'=>'width:120px')); ?></td>				
				<td><?php echo CHtml::textField('alamat[]',$model[$i]->alamat,array('style'=>'width:120px')); ?></td>				
			
			</tr>
		<?php } ?>
		
	<?php } ?>	
		
	</tbody>
</table>