<?php
	$id = Yii::app()->getRequest()->getQuery('id');
	$user=Yii::app()->user->name;
?>


	
	<?php for($i=0;$i<count($modelDok);$i++){
			if($modelDok[$i]!=null){
				$form = $this->beginWidget('CActiveForm', array(
				'id'=>'upload-form',
				'enableAjaxValidation'=>'false',
				'htmlOptions'=>array('enctype'=>'multipart/form-data'),	
				));
	?>
				<div id="rows">
	<?php
					echo $form->labelEx($modelDok[$i],$modelDok[$i]->nama_dokumen);
					echo '<br>';
					echo $form->fileField($modelDok[$i],'uploadedFile');
					echo $form->hiddenField($modelDok[$i],'id_dokumen');
					echo $form->error($modelDok[$i]	,'uploadedFile');	
					echo CHtml::submitButton('Unggah', array('class'=>'sidafbutton'));
					if($modelDok[$i]->status_upload=="Selesai") {
						echo ' <span style="color:green">Dokumen telah diunggah</span>';
					}
	?>
				</div> <br/>
	<?php
				$this->endWidget();
			}
		}
	?>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/edittambahpengadaan1','id'=>$id), "class"=>'sidafbutton'));  ?>
<?php echo CHtml::button('Buat Nota Dinas Permintaan TOR atau RAB', array('submit'=>array('site/notadinaspermintaantorrab','id'=>$id), "class"=>'sidafbutton'));  ?>
</div>