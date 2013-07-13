<table class="appendo-gii" id="<?php echo $id ?>">
	<thead>
		<tr>
			<th>Nama pengguna</th><th>Nama</th><th>NIP</th><th>E-mail</th><th>Divisi</th><th>Jabatan</th><th>Status</th>
		</tr>
	</thead>
	<tbody>
  
	<?php if (empty($model)){ ?>
		<tr>
			<td><?php echo CHtml::textField('userluar[]','',array('style'=>'width:100px')); ?></td>
			<td><?php echo CHtml::textField('namaluar[]','',array('style'=>'width:120px')); ?></td>
			<td><?php echo CHtml::textField('NIPluar[]','',array('style'=>'width:80px')); ?></td>
			<td><?php echo CHtml::textField('emailluar[]','',array('style'=>'width:100px')); ?></td>
			<td><?php echo CHtml::textField('divisiluar[]','',array('style'=>'width:80px')); ?></td>
			<td><?php echo CHtml::textField('jabatanluar[]','',array('style'=>'width:80px')); ?></td>
			<td><?php echo CHtml::dropDownList('statusluar[]','string',array('Aktif'=>'Aktif','Tidak Aktif'=>'Tidak Aktif'),array('style'=>'width:60px')); ?></td>
		</tr>
		
	<?php }else{ ?>
		<?php for($i = 0; $i < count($model); $i++){ ?>
			<tr>
				<td><?php echo CHtml::textField('userluar[]',$model[$i]->username,array('style'=>'width:100px')); ?></td>
				<td><?php echo CHtml::textField('namaluar[]',$model[$i]->nama,array('style'=>'width:120px')); ?></td>
				<td><?php echo CHtml::textField('NIPluar[]',$model[$i]->NIP,array('style'=>'width:80px')); ?></td>
				<td><?php echo CHtml::textField('emailluar[]',$model[$i]->email,array('style'=>'width:100px')); ?></td>
				<td><?php echo CHtml::textField('divisiluar[]',$model[$i]->divisi,array('style'=>'width:80px')); ?></td>
				<td><?php echo CHtml::textField('jabatanluar[]',$model[$i]->jabatan,array('style'=>'width:80px')); ?></td>
				<td><?php echo CHtml::dropDownList('statusluar[]','string',array('Aktif'=>'Aktif','Tidak Aktif'=>'Tidak Aktif'),array('style'=>'width:60px')); ?></td>
				<td><?php echo CHtml::hiddenField('idluar[]',$model[$i]->id); ?></td>
			</tr>
		<?php } ?>
		
	<?php } ?>	
		
	</tbody>
</table>