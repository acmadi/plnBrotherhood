<table class="appendo-gii" id="<?php echo $id ?>">
	<thead>
		<tr>
			<th>Nama Pengguna</th><th>Jabatan</th><th>Status Keanggotaan</th>
		</tr>
	</thead>
	<tbody>
  
	<?php if (empty($model)){ ?>
		<tr>
			<td><?php echo CHtml::textField('username[]','',array('style'=>'width:200px')); ?></td>
			<td><?php echo CHtml::dropDownList('jabatan[]','string',array('Ketua'=>'Ketua','Sekretaris'=>'Sekretaris', 'Anggota'=>'Anggota'),array('style'=>'width:100px')); ?></td>
			<td><?php echo CHtml::dropDownList('status[]','string',array('Aktif'=>'Aktif','Tidak Aktif'=>'Tidak Aktif'),array('style'=>'width:100px')); ?></td>
		</tr>
		
	<?php }else{ ?>
		<?php for($i = 0; $i < count($model); $i++){ ?>
			<tr>
				<td><?php echo CHtml::textField('username[]',$model[$i]->username,array('style'=>'width:200px')); ?></td>
				<td><?php echo CHtml::dropDownList('jabatan[]',$model[$i]->jabatan,array('Ketua'=>'Ketua','Sekretaris'=>'Sekretaris', 'Anggota'=>'Anggota'),array('style'=>'width:100px')); ?></td>
				<td><?php echo CHtml::dropDownList('status[]','string',array('Aktif'=>'Aktif','Tidak Aktif'=>'Tidak Aktif'),array('style'=>'width:100px')); ?></td>
				<td><?php echo CHtml::hiddenField('id[]',$model[$i]->id); ?></td>
			</tr>
		<?php } ?>
		
	<?php } ?>	
		
	</tbody>
</table>