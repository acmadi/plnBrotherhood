<table class="appendo-gii" id="<?php echo $id ?>">
	<thead>
		<tr>
			<th>Perusahaan </th><th>Alamat</th><th>Status</th>
		</tr>
	</thead>
	<tbody>
    <?php if ($model->perusahaan == null): ?>
		<tr>
			<td><?php echo CHtml::textField('perusahaan[]','',array('style'=>'width:120px')); ?></td>
            <td><?php echo CHtml::textField('alamat[]','',array('style'=>'width:90px')); ?></td>
            <td>
				<?php echo CHtml::dropDownList('status[]',"string",
					array(
						"Lulus"=>"Lulus",
						"Tidak Lulus"=>"Tidak Lulus",
					),array('style'=>'width:100px'));
				?>
            </td>
		</tr>
    <?php else: ?>
        <?php for($i = 0; $i < sizeof($model->nama); ++$i): ?>
    		<tr>
    			<td><?php echo CHtml::textField('perusahaan[]',$model->enum_name[$i],array('style'=>'width:120px')); ?></td>
                <td><?php echo CHtml::textField('alamat[]',$model->enum_value[$i],array('style'=>'width:90px')); ?></td>
                <td>
					<?php echo CHtml::dropDownList('status[]',$model->enum_type[$i],
						array(
							"Lulus"=>"Lulus",
							"Tidak Lulus"=>"Perempuan",
						),array('style'=>'width:100px'));
					?>
                </td>
            </tr>
        <?php endfor; ?>
		<tr>
			<td><?php echo CHtml::textField('perusahaan[]','',array('style'=>'width:120px')); ?></td>
            <td><?php echo CHtml::textField('alamat[]','',array('style'=>'width:90px')); ?></td>
            <td>
				<?php echo CHtml::dropDownList('status[]',"string",
					array(
							"Lulus"=>"Lulus",
							"Tidak Lulus"=>"Tidak Lulus",
						),array('style'=>'width:100px'));
				?>
            </td>
		</tr>
    <?php endif; ?>
	</tbody>
</table>