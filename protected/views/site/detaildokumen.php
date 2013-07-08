<?php
/* @var $this SiteController */
	
	$id = Yii::app()->getRequest()->getQuery('id');
	$model=Dokumen::model()->findByPk($id);
	$user = Yii::app()->user->name;
	$cdokumen = Dokumen::model()->find('id_dokumen = "' . $id . '"');	
	$pengadaan=Pengadaan::model()->findByPk($cdokumen->id_pengadaan);
	$this->pageTitle=Yii::app()->name . ' | ' . $pengadaan->nama_pengadaan . ' : ' . $cdokumen->nama_dokumen;
	$dataProvider = new CActiveDataProvider(LinkDokumen::model(), array(
		'criteria'=>array(
			'condition'=>'id_dokumen = ' . $id,
			'order'=>'nomor_link DESC',
		),
	));
	$clink = LinkDokumen::model()->findAll('id_dokumen = ' . $id);
?>

<br />

<h2><?php echo $pengadaan->nama_pengadaan; ?> : <?php echo $cdokumen->nama_dokumen?></h2>
<?php
	if($pengadaan->status!='100'||$pengadaan->status!='99'){
		if((Kdivmum::model()->exists('username = "' . Yii::app()->user->name . '"'))&&(($cdokumen->nama_dokumen=='Nota Dinas Perintah Pengadaan'))){
			echo CHtml::button('Buat Dokumen', array('submit'=>array('docx/download','id'=>$id),'class'=>'sidafbutton')); 
			echo '<br/>';
		} else if ((Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')&&(($cdokumen->nama_dokumen!='Nota Dinas Permintaan')&&($cdokumen->nama_dokumen!='TOR')&&($cdokumen->nama_dokumen!='RAB')&&($cdokumen->nama_dokumen!='Nota Dinas Perintah Pengadaan')))){
			echo CHtml::button('Buat Dokumen', array('submit'=>array('docx/download','id'=>$id),'class'=>'sidafbutton'));
			echo '<br/>';
		}
	}
?>

<?php
	if($pengadaan->status!='100'||$pengadaan->status!='99'){
		if((Kdivmum::model()->exists('username = "' . Yii::app()->user->name . '"'))&&(($cdokumen->nama_dokumen=='Nota Dinas Permintaan')||($cdokumen->nama_dokumen=='TOR')||($cdokumen->nama_dokumen=='RAB')||($cdokumen->nama_dokumen=='Nota Dinas Perintah Pengadaan'))){
		
		//insert uploader here
		$chosenDokumen = Dokumen::model()->findByPk($id);
		echo '<br/>';
		$form = $this->beginWidget('CActiveForm', array(
			'id'=>'upload-form',
			'enableAjaxValidation'=>'false',
			'htmlOptions'=>array('enctype'=>'multipart/form-data'),
		));
		
		echo $form->labelEx($chosenDokumen, 'Unggah berkas');
		echo $form->fileField($chosenDokumen, 'uploadedFile');
		echo $form->hiddenField($chosenDokumen, 'id_dokumen');
		echo $form->error($chosenDokumen, 'uploadedFile');
		echo CHtml::submitButton('Unggah', array('class'=>'sidafbutton'));
		
		$this->endWidget();
		
		} else if ((Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')&&(($cdokumen->nama_dokumen!='Nota Dinas Permintaan')&&($cdokumen->nama_dokumen!='TOR')&&($cdokumen->nama_dokumen!='RAB')&&($cdokumen->nama_dokumen!='Nota Dinas Perintah Pengadaan')))){
	
		//insert uploader
		$chosenDokumen = Dokumen::model()->findByPk($id);
		echo '<br/>';
		$form = $this->beginWidget('CActiveForm', array(
			'id'=>'upload-form',
			'enableAjaxValidation'=>'false',
			'htmlOptions'=>array('enctype'=>'multipart/form-data'),
		));
		
		echo $form->labelEx($chosenDokumen, $chosenDokumen->nama_dokumen);
		echo $form->fileField($chosenDokumen, 'uploadedFile');
		echo $form->hiddenField($chosenDokumen, 'id_dokumen');
		echo $form->error($chosenDokumen, 'uploadedFile');
		echo CHtml::submitButton('Unggah', array('class'=>'sidafbutton'));
		
		$this->endWidget();
		}
	}
    ?>
<br />

<?php
	$this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'dokumengrid',
		'dataProvider'=>$dataProvider,
		"ajaxUpdate"=>"false",
		'htmlOptions'=>array('style'=>'cursor: pointer;'),			
		'selectionChanged'=>"function(id){window.location='" . Yii::app()->createUrl("download/download") . "'+ '&id=' + $.fn.yiiGridView.getSelection(id);}",
		'columns'=>array(
			array(
				'name'=>'Nama berkas',
				'value'=>'$data->nama_file',
			),
			array(
				'name'=>'Tanggal unggah',
				'value'=>'$data->tanggal_upload',
			),
			array(
				'name'=>'Waktu unggah',
				'value'=>'$data->waktu_upload',
			),
			'pengunggah',
		),
	));
?>

<?php
	if($pengadaan->status=="Selesai"){
		echo CHtml::button('Kembali', array('submit'=>array('site/detailpengadaan', 'id'=>$cdokumen->id_pengadaan), 'class'=>'sidafbutton'));
	} else{
		if(Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')){
			echo CHtml::button('Kembali', array('submit'=>array('site/dokumengenerator', 'id'=>$cdokumen->id_pengadaan), 'class'=>'sidafbutton'));
		} else if(Kdivmum::model()->exists('username = "' . Yii::app()->user->name . '"')){
			echo CHtml::button('Kembali', array('submit'=>array('site/detailpengadaan', 'id'=>$cdokumen->id_pengadaan), 'class'=>'sidafbutton'));
		}
	}  
?>