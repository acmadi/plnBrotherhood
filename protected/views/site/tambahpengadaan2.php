<?php
	$id = Yii::app()->getRequest()->getQuery('id');
	$user=Yii::app()->user->name;
	$this->pageTitle=Yii::app()->name . ' | Tambah Pengadaan';
?>
<?php if (Yii::app()->user->getState('role') == 'kdivmum' || Yii::app()->user->getState('role') == 'divisi') { ?>
		<?php for($i=0;$i<count($modelDok);$i++){
				if($modelDok[$i]!=null){
					$form = $this->beginWidget('CActiveForm', array(
					'id'=>'upload-form',
					'enableAjaxValidation'=>'false',
					'htmlOptions'=>array('enctype'=>'multipart/form-data'),	
					));
		?>
					<div class="rows">
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
	<?php if (Yii::app()->user->getState('role') == 'kdivmum') { ?>
		<?php if ($modelDok[0]->status_upload=="Selesai" && $modelDok[1]->status_upload=="Selesai" && $modelDok[2]->status_upload=="Selesai") {
			echo CHtml::button('Tunjuk PIC', array('submit'=>array(Dokumen::model()->find('id_pengadaan = '.$id.' and nama_dokumen = "Nota Dinas Perintah Pengadaan"')==null?'site/tunjukpanitia':'site/edittunjukpanitia','id'=>$id), "class"=>'sidafbutton'));  
		} ?> 
		<?php echo CHtml::button('Buat Nota Dinas Permintaan TOR atau RAB', (array('submit'=>array(Dokumen::model()->find('id_pengadaan = '.$id.' and nama_dokumen = "Nota Dinas Permintaan TOR/RAB"')==null?'site/notadinaspermintaantorrab':'site/editnotadinaspermintaantorrab','id'=>$id), "class"=>'sidafbutton')));  ?>
		<br/><br/>
	<?php } ?>
	<?php echo CHtml::button('Kembali', array('submit'=>array('site/edittambahpengadaan1','id'=>$id), "class"=>'sidafbutton'));  ?>
<?php }  ?>