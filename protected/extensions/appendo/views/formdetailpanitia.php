<table class="appendo-gii" id="<?php echo $id ?>">
	<thead>
		<tr>
			<th>Anggota</th><th>NIP</th><th>Jabatan</th>
		</tr>
	</thead>
	<tbody>
  
	<?php if (empty($model)){ ?>
		<tr>
			<td>
				<?php echo CHtml::dropDownList('nama[]','',CHtml::listData(Anggota::model()->findAllByAttributes(array('status_user'=>'Aktif')),'id','nama'),array('empty'=>'-----Pilih Anggota------','style'=>'width:200px'));
				?>
			</td>
			<td><?php echo CHtml::textField('jabatan[]','',array('style'=>'width:120px')); ?></td>
		</tr>
		
	<?php }else{ ?>
		<?php for($i = 0; $i < count($model); $i++){ ?>
			<tr>
				<td>
					<?php echo CHtml::dropDownList('nama[]',$model[$i]->id,CHtml::listData(Anggota::model()->findAllByAttributes(array('status_user'=>'Aktif')),'id','nama'),array('empty'=>'-----Pilih Anggota------','style'=>'width:200px'));
					?>
				</td>
				<td><?php echo CHtml::textField('jabatan[]',$model[$i]->jabatan,array('style'=>'width:120px')); ?></td>
			</tr>
		<?php } ?>
		
	<?php } ?>	
		
	</tbody>
</table>