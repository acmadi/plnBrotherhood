<?php
/* @var $this SiteController */
	
	$id = Yii::app()->getRequest()->getQuery('id');
	$model=Dokumen::model()->findByPk($id);
	$user = Yii::app()->user->name;
	$dirUpload = $_SERVER["DOCUMENT_ROOT"] . Yii::app()->request->baseUrl . '/uploads/' . Dokumen::model()->find('id_dokumen="' . $id . '"')->id_pengadaan . '/' . $id . '/' ;
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
	if($pengadaan->status!='Selesai'){
		if((Kdivmum::model()->exists('username = "' . Yii::app()->user->name . '"'))&&(($cdokumen->nama_dokumen=='Nota Dinas Perintah Pengadaan'))){
			echo CHtml::button('Buat Dokumen', array('submit'=>array('docx/download','id'=>$id),'class'=>'sidafbutton')); 
		} else if ((Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')&&(($cdokumen->nama_dokumen!='Nota Dinas Permintaan')&&($cdokumen->nama_dokumen!='TOR')&&($cdokumen->nama_dokumen!='RAB')&&($cdokumen->nama_dokumen!='Nota Dinas Perintah Pengadaan')))){
			echo CHtml::button('Buat Dokumen', array('submit'=>array('docx/download','id'=>$id),'class'=>'sidafbutton')); 
		}
	}
?>

<?php
	if($pengadaan->status!='Selesai'){
		if((Kdivmum::model()->exists('username = "' . Yii::app()->user->name . '"'))&&(($cdokumen->nama_dokumen=='Nota Dinas Permintaan')||($cdokumen->nama_dokumen=='TOR')||($cdokumen->nama_dokumen=='RAB')||($cdokumen->nama_dokumen=='Nota Dinas Perintah Pengadaan'))){
			$this->widget('ext.coco.CocoWidget'
				,array(
					'id'=>$id,
					'user'=>$user,
					'onCompleted'=>'function(id,filename,jsoninfo){  }',
					'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
					'onMessage'=>'function(m){ alert(m); }',
					//'allowedExtensions'=>array('jpeg','jpg','gif','png'), // server-side mime-type validated
					'sizeLimit'=>2000000, // limit in server-side and in client-side
					// this arguments are used to send a notification
					// on a specific class when a new file is uploaded,
					'uploadDir'=>$dirUpload,
					'receptorClassName'=>'application.models.Dokumen',
					'methodName'=>'fileReceptor',
					'userdata'=>$model->primaryKey,
					// controls how many files must be uploaded
					'maxUploads'=>-1, // defaults to -1 (unlimited)
					'maxUploadsReachMessage'=>'No more files allowed', // if empty, no message is shown
					// controls how many files the can select (not upload, for uploads see also: maxUploads)
					'multipleFileSelection'=>true, // true or false, defaults: true
				));
		} else if ((Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')&&(($cdokumen->nama_dokumen!='Nota Dinas Permintaan')&&($cdokumen->nama_dokumen!='TOR')&&($cdokumen->nama_dokumen!='RAB')&&($cdokumen->nama_dokumen!='Nota Dinas Perintah Pengadaan')))){
			$this->widget('ext.coco.CocoWidget'
				,array(
					'id'=>$id,
					'user'=>$user,
					'onCompleted'=>'function(id,filename,jsoninfo){  }',
					'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
					'onMessage'=>'function(m){ alert(m); }',
					//'allowedExtensions'=>array('jpeg','jpg','gif','png'), // server-side mime-type validated
					'sizeLimit'=>2000000, // limit in server-side and in client-side
					// this arguments are used to send a notification
					// on a specific class when a new file is uploaded,
					'uploadDir'=>$dirUpload,
					'receptorClassName'=>'application.models.Dokumen',
					'methodName'=>'fileReceptor',
					'userdata'=>$model->primaryKey,
					// controls how many files must be uploaded
					'maxUploads'=>-1, // defaults to -1 (unlimited)
					'maxUploadsReachMessage'=>'No more files allowed', // if empty, no message is shown
					// controls how many files the can select (not upload, for uploads see also: maxUploads)
					'multipleFileSelection'=>true, // true or false, defaults: true
				));			
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
		'selectionChanged'=>"function(id){window.location='" . Yii::app()->createUrl("download/download"/*, array("id"=>LinkDokumen::model()->find('id_dokumen = ' . $id)->nomor_link)*/) . "'+ '&id=' + $.fn.yiiGridView.getSelection(id);}",
		'columns'=>array(
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