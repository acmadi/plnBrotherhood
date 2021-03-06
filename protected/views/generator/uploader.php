<?php
	$model=Dokumen::model();
    $this->pageTitle=Yii::app()->name . ' | Unggah Dokumen';
	//id pengadaan
	$id = Yii::app()->getRequest()->getQuery('id');
	$user=Yii::app()->user->name;
?>

<div id="pagecontent">
	<div id="sidebar">
		<?php if(!Yii::app()->user->isGuest) $this->widget('MenuPortlet'); ?>
		<script type="text/javascript">
			$('#19').attr('class','onprogress');
		</script>
	</div>
	
	<div id="maincontent">
	<?php
		for($i=0;$i<count($modelDok);$i++)
		{
			if($modelDok[$i]!=null){
				$form = $this->beginWidget('CActiveForm', array(
				'id'=>'upload-form',
				'enableAjaxValidation'=>'false',
				'htmlOptions'=>array('enctype'=>'multipart/form-data'),	
				));		
				echo $form->labelEx($modelDok[$i],$modelDok[$i]->nama_dokumen);
				echo '<br>';
				echo $form->fileField($modelDok[$i],'uploadedFile');
				echo $form->hiddenField($modelDok[$i],'id_dokumen');
				echo $form->error($modelDok[$i]	,'uploadedFile', array('accept'=>'.docx, .xlsx, application/pdf'));	
				echo CHtml::submitButton('Unggah', array('class'=>'sidafbutton'));
				if($modelDok[$i]->status_upload=="Selesai") {
					echo ' <span style="color:green">Dokumen telah diunggah</span>';
				}
				$this->endWidget();
				echo '<br/>';
			}
		}
		?>
	</div>
</div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), "class"=>'sidafbutton'));  ?></div>
    