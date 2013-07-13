<table class="appendo-gii" id="<?php echo $id ?>">
	<thead>
		<tr>
			<th>Anggota</th><th>Jabatan</th><th>Status Anggota</th>
		</tr>
	</thead>
	<tbody>
  
	<?php if (empty($model)){ ?>
		<tr>
			<td><?php echo CHtml::dropDownList('nama[]','string',CHtml::listData(Anggota::model()->findAllByAttributes(array('status_user'=>'Aktif', 'jabatan'=>'Pejabat')),'username','nama'),array('empty'=>'-----Pilih Anggota------','style'=>'width:200px')); ?></td>
			<td><?php echo CHtml::textField('jabatan[]','',array('style'=>'width:100px')); ?></td>
			<td><?php echo CHtml::dropDownList('status[]','string',array('Aktif'=>'Aktif','Tidak Aktif'=>'Tidak Aktif'),array('style'=>'width:100px')); ?></td>
		</tr>
		
	<?php }else{ ?>
		<?php for($i = 0; $i < count($model); $i++){ ?>
			<tr>
				<td><?php echo CHtml::dropDownList('nama[]',$model[$i]->username,CHtml::listData(Anggota::model()->findAllByAttributes(array('status_user'=>'Aktif', 'jabatan'=>'Pejabat')),'username','nama'),array('empty'=>'-----Pilih Anggota------','style'=>'width:200px')); ?></td>
				<td><?php echo CHtml::textField('jabatan[]',$model[$i]->jabatan,array('style'=>'width:100px')); ?></td>
				<td><?php echo CHtml::dropDownList('status[]','string',array('Aktif'=>'Aktif','Tidak Aktif'=>'Tidak Aktif'),array('style'=>'width:100px')); ?></td>
				<td><?php echo CHtml::hiddenField('id[]',$model[$i]->id); ?></td>
			</tr>
		<?php } ?>
		
	<?php } ?>	
		
	</tbody>
</table>