<?php
	$model=Dokumen::model();
    $this->pageTitle=Yii::app()->name . ' | Uploader';
	//id pengadaan
	$id = Yii::app()->getRequest()->getQuery('id');
	$user=Yii::app()->user->name;
	$objectpengadaan = Pengadaan::model()->find('id_pengadaan = "' . $id. '"');
	$dirUpload =  $_SERVER["DOCUMENT_ROOT"] . Yii::app()->request->baseUrl . '/uploads/' . $objectpengadaan->id_pengadaan . '/' ;
	$modelDok0 = Dokumen::model()->find('nama_dokumen="Pakta Integritas Awal Panitia"');
	$modelDok1 = Dokumen::model()->find('nama_dokumen="RKS"');
	$modelDok2 = Dokumen::model()->find('nama_dokumen="Surat Undangan Prakualifikasi"');
	$modelDok3 = Dokumen::model()->find('nama_dokumen="Pakta Integritas Penyedia"');
	$modelDok4 = Dokumen::model()->find('nama_dokumen="Surat Pemberitahuan Pengadaan"');
	$modelDok5 = Dokumen::model()->find('nama_dokumen="Surat Pernyataan Minat"');
	$modelDok6 = Dokumen::model()->find('nama_dokumen="Form Isian Kualifikasi"');
	$modelDok21=Dokumen::model()->find('nama_dokumen="Surat Undangan Pengambilan Dokumen Pengadaan"');
	$modelDok7 = Dokumen::model()->find('nama_dokumen="Surat Undangan Aanwijzing"');
	$modelDok8 = Dokumen::model()->find('nama_dokumen="Berita Acara Aanwijzing"');
	$modelDok9 = Dokumen::model()->find('nama_dokumen="Daftar Hadir Aanwijzing"');
	$modelDok10 = Dokumen::model()->find('nama_dokumen="Dokumen Penawaran"');
	$metode_penawaran1='';
	$metode_penawaran2='';
	if($objectpengadaan->metode_penawaran=='Dua Tahap'){
		$metode_penawaran1='Tahap 1';
		$metode_penawaran2='Tahap 2';
	} else if ($objectpengadaan->metode_penawaran=='Dua Sampul'){
		$metode_penawaran1='Sampul 1';
		$metode_penawaran2='Sampul 2';
	}	
	$modelDok11 = Dokumen::model()->find('nama_dokumen="Surat Undangan Pembukaan Penawaran ' . $metode_penawaran1 . '"');
	$modelDok11b = Dokumen::model()->find('nama_dokumen="Surat Undangan Pembukaan Penawaran ' . $metode_penawaran2 . '"');
	$modelDok12 = Dokumen::model()->find('nama_dokumen="Berita Acara Pembukaan Penawaran ' . $metode_penawaran1 . '"');
	$modelDok12b = Dokumen::model()->find('nama_dokumen="Berita Acara Pembukaan Penawaran ' . $metode_penawaran2 . '"');
	$modelDok13 = Dokumen::model()->find('nama_dokumen="Daftar Hadir Pembukaan Penawaran ' . $metode_penawaran1 . '"');
	$modelDok13b = Dokumen::model()->find('nama_dokumen="Daftar Hadir Pembukaan Penawaran ' . $metode_penawaran2 . '"');
	$modelDok14 = Dokumen::model()->find('nama_dokumen="Berita Acara Evaluasi Penawaran ' . $metode_penawaran1 . '"');
	$modelDok14b = Dokumen::model()->find('nama_dokumen="Berita Acara Evaluasi Penawaran ' . $metode_penawaran2 . '"');
	$modelDok15 = Dokumen::model()->find('nama_dokumen="Surat Undangan Negosiasi dan Klarifikasi"');
	$modelDok16 = Dokumen::model()->find('nama_dokumen="Berita Acara Negosiasi dan Klarifikasi"');
	$modelDok17 = Dokumen::model()->find('nama_dokumen="Nota Dinas Usulan Pemenang"');
	$modelDok18 = Dokumen::model()->find('nama_dokumen="Nota Dinas Penetapan Pemenang"');
	$modelDok19 = Dokumen::model()->find('nama_dokumen="Nota Dinas Pemberitahuan Pemenang"');
	$modelDok20 = Dokumen::model()->find('nama_dokumen="Pakta Integritas Akhir Panitia"');
?>

<div id="pagecontent">
	<div id="sidebar">
		<?php if(!Yii::app()->user->isGuest) $this->widget('MenuPortlet'); ?>
	</div>
	
	<div id="maincontent">
	<?php
		//uploader biasa
		$form = $this->beginWidget('CActiveForm', array(
			'id'=>'upload-form',
			'enableAjaxValidation'=>'false',
			'htmlOptions'=>array('enctype'=>'multipart/form-data'),	
		)
		);
		
		echo $form->labelEx($modelDok1,'coks');
		echo '<br>';
		echo $form->fileField($modelDok1,'id_dokumen');
		echo $form->error($modelDok1,'id_dokumen');
		
		echo CHtml::submitButton('Simpan', array('submit'=>array('uploader/save'),'class'=>'sidafbutton'));
		
		$this->endWidget();
	?>
	
	<div class="uploaderblock">
	<?php
	if($modelDok0 !=null){
	echo '<h5>' . $modelDok0->nama_dokumen . '<h5>' ;
    $this->widget('ext.coco.CocoWidget'
        ,array(
            'id'=>$modelDok0->id_dokumen,
			'user'=>$user,
			'idPengadaan'=>$id,
            'onCompleted'=>'function(id,filename,jsoninfo){  }',
            'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
            'onMessage'=>'function(m){ alert(m); }',
            //'allowedExtensions'=>array('jpeg','jpg','gif','png'), // server-side mime-type validated
            'sizeLimit'=>2000000, // limit in server-side and in client-side
            // this arguments are used to send a notification
            // on a specific class when a new file is uploaded,
			'uploadDir'=>$dirUpload . $modelDok0->id_dokumen . '/',
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
    ?>
	</div>
	
	<div class="uploaderblock">
	<?php
	if($modelDok1 !=null){
	echo '<h5>' . $modelDok1->nama_dokumen . '<h5>' ;
    $this->widget('ext.coco.CocoWidget'
        ,array(
            'id'=>$modelDok1->id_dokumen,
			'user'=>$user,
			'idPengadaan'=>$id,
            'onCompleted'=>'function(id,filename,jsoninfo){  }',
            'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
            'onMessage'=>'function(m){ alert(m); }',
            //'allowedExtensions'=>array('jpeg','jpg','gif','png'), // server-side mime-type validated
            'sizeLimit'=>2000000, // limit in server-side and in client-side
            // this arguments are used to send a notification
            // on a specific class when a new file is uploaded,
			'uploadDir'=>$dirUpload . $modelDok1->id_dokumen . '/',
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
    ?>
	</div>
	
	<div class="uploaderblock">
	<?php
	if(($modelDok2 !=null) && ($objectpengadaan->jenis_kualifikasi=='Pra Kualifikasi')){
	echo '<h5>' . $modelDok2->nama_dokumen . '<h5>' ;
    $this->widget('ext.coco.CocoWidget'
        ,array(
            'id'=>$modelDok2->id_dokumen,
			'user'=>$user,
			'idPengadaan'=>$id,
            'onCompleted'=>'function(id,filename,jsoninfo){  }',
            'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
            'onMessage'=>'function(m){ alert(m); }',
            //'allowedExtensions'=>array('jpeg','jpg','gif','png'), // server-side mime-type validated
            'sizeLimit'=>2000000, // limit in server-side and in client-side
            // this arguments are used to send a notification
            // on a specific class when a new file is uploaded,
			'uploadDir'=>$dirUpload . $modelDok2->id_dokumen . '/',
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
    ?>
	</div>
	
	<div class="uploaderblock">
	<?php
	if($modelDok3 !=null){
	echo '<h5>' . $modelDok3->nama_dokumen . '<h5>' ;
    $this->widget('ext.coco.CocoWidget'
        ,array(
            'id'=>$modelDok3->id_dokumen,
			'user'=>$user,
			'idPengadaan'=>$id,
            'onCompleted'=>'function(id,filename,jsoninfo){  }',
            'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
            'onMessage'=>'function(m){ alert(m); }',
            //'allowedExtensions'=>array('jpeg','jpg','gif','png'), // server-side mime-type validated
            'sizeLimit'=>2000000, // limit in server-side and in client-side
            // this arguments are used to send a notification
            // on a specific class when a new file is uploaded,
			'uploadDir'=>$dirUpload . $modelDok3->id_dokumen . '/',
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
    ?>
	</div>
	
	<div class="uploaderblock">
	<?php
	if($modelDok4 !=null){
	echo '<h5>' . $modelDok4->nama_dokumen . '<h5>' ;
    $this->widget('ext.coco.CocoWidget'
        ,array(
            'id'=>$modelDok4->id_dokumen,
			'user'=>$user,
			'idPengadaan'=>$id,
            'onCompleted'=>'function(id,filename,jsoninfo){  }',
            'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
            'onMessage'=>'function(m){ alert(m); }',
            //'allowedExtensions'=>array('jpeg','jpg','gif','png'), // server-side mime-type validated
            'sizeLimit'=>2000000, // limit in server-side and in client-side
            // this arguments are used to send a notification
            // on a specific class when a new file is uploaded,
			'uploadDir'=>$dirUpload . $modelDok4->id_dokumen . '/',
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
    ?>
	</div>
	
	<div class="uploaderblock">
	<?php
	if($modelDok5 !=null){
	echo '<h5>' . $modelDok5->nama_dokumen . '<h5>' ;
    $this->widget('ext.coco.CocoWidget'
        ,array(
            'id'=>$modelDok5->id_dokumen,
			'user'=>$user,
			'idPengadaan'=>$id,
            'onCompleted'=>'function(id,filename,jsoninfo){  }',
            'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
            'onMessage'=>'function(m){ alert(m); }',
            //'allowedExtensions'=>array('jpeg','jpg','gif','png'), // server-side mime-type validated
            'sizeLimit'=>2000000, // limit in server-side and in client-side
            // this arguments are used to send a notification
            // on a specific class when a new file is uploaded,
			'uploadDir'=>$dirUpload . $modelDok5->id_dokumen . '/',
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
    ?>
	</div>
	
	<div class="uploaderblock">
	<?php
	if($modelDok6 !=null){
	echo '<h5>' . $modelDok6->nama_dokumen . '<h5>' ;
    $this->widget('ext.coco.CocoWidget'
        ,array(
            'id'=>$modelDok6->id_dokumen,
			'user'=>$user,
			'idPengadaan'=>$id,
            'onCompleted'=>'function(id,filename,jsoninfo){  }',
            'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
            'onMessage'=>'function(m){ alert(m); }',
            //'allowedExtensions'=>array('jpeg','jpg','gif','png'), // server-side mime-type validated
            'sizeLimit'=>2000000, // limit in server-side and in client-side
            // this arguments are used to send a notification
            // on a specific class when a new file is uploaded,
			'uploadDir'=>$dirUpload . $modelDok6->id_dokumen . '/',
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
    ?>
	</div>
	
		<div class="uploaderblock">
	<?php
	if($modelDok21 !=null){
	echo '<h5>' . $modelDok21->nama_dokumen . '<h5>' ;
    $this->widget('ext.coco.CocoWidget'
        ,array(
            'id'=>$modelDok21->id_dokumen,
			'user'=>$user,
			'idPengadaan'=>$id,
            'onCompleted'=>'function(id,filename,jsoninfo){  }',
            'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
            'onMessage'=>'function(m){ alert(m); }',
            //'allowedExtensions'=>array('jpeg','jpg','gif','png'), // server-side mime-type validated
            'sizeLimit'=>2000000, // limit in server-side and in client-side
            // this arguments are used to send a notification
            // on a specific class when a new file is uploaded,
			'uploadDir'=>$dirUpload . $modelDok21->id_dokumen . '/',
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
    ?>
	</div>
	
	<div class="uploaderblock">
	<?php
	if($modelDok7 !=null){
	echo '<h5>' . $modelDok7->nama_dokumen . '<h5>' ;
    $this->widget('ext.coco.CocoWidget'
        ,array(
            'id'=>$modelDok7->id_dokumen,
			'user'=>$user,
			'idPengadaan'=>$id,
            'onCompleted'=>'function(id,filename,jsoninfo){  }',
            'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
            'onMessage'=>'function(m){ alert(m); }',
            //'allowedExtensions'=>array('jpeg','jpg','gif','png'), // server-side mime-type validated
            'sizeLimit'=>2000000, // limit in server-side and in client-side
            // this arguments are used to send a notification
            // on a specific class when a new file is uploaded,
			'uploadDir'=>$dirUpload . $modelDok7->id_dokumen . '/',
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
    ?>
	</div>
	
	<div class="uploaderblock">
	<?php
	if($modelDok8 !=null){
	echo '<h5>' . $modelDok8->nama_dokumen . '<h5>' ;
    $this->widget('ext.coco.CocoWidget'
        ,array(
            'id'=>$modelDok8->id_dokumen,
			'user'=>$user,
			'idPengadaan'=>$id,
            'onCompleted'=>'function(id,filename,jsoninfo){  }',
            'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
            'onMessage'=>'function(m){ alert(m); }',
            //'allowedExtensions'=>array('jpeg','jpg','gif','png'), // server-side mime-type validated
            'sizeLimit'=>2000000, // limit in server-side and in client-side
            // this arguments are used to send a notification
            // on a specific class when a new file is uploaded,
			'uploadDir'=>$dirUpload . $modelDok8->id_dokumen . '/',
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
    ?>
	</div>
	
	<div class="uploaderblock">
	<?php
	if($modelDok9 !=null){
	echo '<h5>' . $modelDok9->nama_dokumen . '<h5>' ;
    $this->widget('ext.coco.CocoWidget'
        ,array(
            'id'=>$modelDok9->id_dokumen,
			'user'=>$user,
			'idPengadaan'=>$id,
            'onCompleted'=>'function(id,filename,jsoninfo){  }',
            'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
            'onMessage'=>'function(m){ alert(m); }',
            //'allowedExtensions'=>array('jpeg','jpg','gif','png'), // server-side mime-type validated
            'sizeLimit'=>2000000, // limit in server-side and in client-side
            // this arguments are used to send a notification
            // on a specific class when a new file is uploaded,
			'uploadDir'=>$dirUpload . $modelDok9->id_dokumen . '/',
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
    ?>
	</div>
	
	<div class="uploaderblock">
	<?php
	if($modelDok10 !=null){
	echo '<h5>' . $modelDok10->nama_dokumen . '<h5>' ;
    $this->widget('ext.coco.CocoWidget'
        ,array(
            'id'=>$modelDok10->id_dokumen,
			'user'=>$user,
			'idPengadaan'=>$id,
            'onCompleted'=>'function(id,filename,jsoninfo){  }',
            'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
            'onMessage'=>'function(m){ alert(m); }',
            //'allowedExtensions'=>array('jpeg','jpg','gif','png'), // server-side mime-type validated
            'sizeLimit'=>2000000, // limit in server-side and in client-side
            // this arguments are used to send a notification
            // on a specific class when a new file is uploaded,
			'uploadDir'=>$dirUpload . $modelDok10->id_dokumen . '/',
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
    ?>
	</div>
	
	<div class="uploaderblock">
	<?php
	if($modelDok11 !=null){
	echo '<h5>' . $modelDok11->nama_dokumen . '<h5>' ;
    $this->widget('ext.coco.CocoWidget'
        ,array(
            'id'=>$modelDok11->id_dokumen,
			'user'=>$user,
			'idPengadaan'=>$id,
            'onCompleted'=>'function(id,filename,jsoninfo){  }',
            'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
            'onMessage'=>'function(m){ alert(m); }',
            //'allowedExtensions'=>array('jpeg','jpg','gif','png'), // server-side mime-type validated
            'sizeLimit'=>2000000, // limit in server-side and in client-side
            // this arguments are used to send a notification
            // on a specific class when a new file is uploaded,
			'uploadDir'=>$dirUpload . $modelDok11->id_dokumen . '/',
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
    ?>
	</div>
	
	<div class="uploaderblock">
	<?php
	if($modelDok11b !=null){
	if(($object_pengadaan->metode_penawaran=='Dua Tahap') || $object_pengadaan->metode_penawaran=='Dua Sampul') {
	echo '<h5>' . $modelDok11b->nama_dokumen . '<h5>' ;
    $this->widget('ext.coco.CocoWidget'
        ,array(
            'id'=>$modelDok11b->id_dokumen,
			'user'=>$user,
			'idPengadaan'=>$id,
            'onCompleted'=>'function(id,filename,jsoninfo){  }',
            'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
            'onMessage'=>'function(m){ alert(m); }',
            //'allowedExtensions'=>array('jpeg','jpg','gif','png'), // server-side mime-type validated
            'sizeLimit'=>2000000, // limit in server-side and in client-side
            // this arguments are used to send a notification
            // on a specific class when a new file is uploaded,
			'uploadDir'=>$dirUpload . $modelDok11b->id_dokumen . '/',
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
	</div>
	
	<div class="uploaderblock">
	<?php
	if($modelDok12 !=null){
	echo '<h5>' . $modelDok12->nama_dokumen . '<h5>' ;
    $this->widget('ext.coco.CocoWidget'
        ,array(
            'id'=>$modelDok12->id_dokumen,
			'user'=>$user,
			'idPengadaan'=>$id,
            'onCompleted'=>'function(id,filename,jsoninfo){  }',
            'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
            'onMessage'=>'function(m){ alert(m); }',
            //'allowedExtensions'=>array('jpeg','jpg','gif','png'), // server-side mime-type validated
            'sizeLimit'=>2000000, // limit in server-side and in client-side
            // this arguments are used to send a notification
            // on a specific class when a new file is uploaded,
			'uploadDir'=>$dirUpload . $uploader12->id_dokumen . '/',
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
    ?>
	</div>
	
	<div class="uploaderblock">
	<?php
	if($modelDok12b !=null){
	if(($object_pengadaan->metode_penawaran=='Dua Tahap') || $object_pengadaan->metode_penawaran=='Dua Sampul') {	
	echo '<h5>' . $modelDok12b->nama_dokumen . '<h5>' ;
    $this->widget('ext.coco.CocoWidget'
        ,array(
            'id'=>$modelDok12b->id_dokumen,
			'user'=>$user,
			'idPengadaan'=>$id,
            'onCompleted'=>'function(id,filename,jsoninfo){  }',
            'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
            'onMessage'=>'function(m){ alert(m); }',
            //'allowedExtensions'=>array('jpeg','jpg','gif','png'), // server-side mime-type validated
            'sizeLimit'=>2000000, // limit in server-side and in client-side
            // this arguments are used to send a notification
            // on a specific class when a new file is uploaded,
			'uploadDir'=>$dirUpload . $uploader12b->id_dokumen . '/',
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
	</div>	
	
	<div class="uploaderblock">
	<?php
	if($modelDok13 !=null){
	echo '<h5>' . $modelDok13->nama_dokumen . '<h5>' ;
    $this->widget('ext.coco.CocoWidget'
        ,array(
            'id'=>$modelDok13->id_dokumen,
			'user'=>$user,
			'idPengadaan'=>$id,
            'onCompleted'=>'function(id,filename,jsoninfo){  }',
            'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
            'onMessage'=>'function(m){ alert(m); }',
            //'allowedExtensions'=>array('jpeg','jpg','gif','png'), // server-side mime-type validated
            'sizeLimit'=>2000000, // limit in server-side and in client-side
            // this arguments are used to send a notification
            // on a specific class when a new file is uploaded,
			'uploadDir'=>$dirUpload . $uploader13->id_dokumen . '/',
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
    ?>
	</div>	
	
	<div class="uploaderblock">
	<?php
	if($modelDok13b !=null){
	if(($object_pengadaan->metode_penawaran=='Dua Tahap') || $object_pengadaan->metode_penawaran=='Dua Sampul') {	
	echo '<h5>' . $modelDok13b->nama_dokumen . '<h5>' ;
    $this->widget('ext.coco.CocoWidget'
        ,array(
            'id'=>$modelDok13b->id_dokumen,
			'user'=>$user,
			'idPengadaan'=>$id,
            'onCompleted'=>'function(id,filename,jsoninfo){  }',
            'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
            'onMessage'=>'function(m){ alert(m); }',
            //'allowedExtensions'=>array('jpeg','jpg','gif','png'), // server-side mime-type validated
            'sizeLimit'=>2000000, // limit in server-side and in client-side
            // this arguments are used to send a notification
            // on a specific class when a new file is uploaded,
			'uploadDir'=>$dirUpload . $uploader13b->id_dokumen . '/',
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
	</div>	
	
	<div class="uploaderblock">
	<?php
	if($modelDok14 !=null){
	echo '<h5>' . $modelDok14->nama_dokumen . '<h5>' ;
    $this->widget('ext.coco.CocoWidget'
        ,array(
            'id'=>$modelDok14->id_dokumen,
			'user'=>$user,
			'idPengadaan'=>$id,
            'onCompleted'=>'function(id,filename,jsoninfo){  }',
            'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
            'onMessage'=>'function(m){ alert(m); }',
            //'allowedExtensions'=>array('jpeg','jpg','gif','png'), // server-side mime-type validated
            'sizeLimit'=>2000000, // limit in server-side and in client-side
            // this arguments are used to send a notification
            // on a specific class when a new file is uploaded,
			'uploadDir'=>$dirUpload . $uploader14->id_dokumen . '/',
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
    ?>
	</div>	
	
	<div class="uploaderblock">
	<?php
	if($modelDok14b !=null){
	if(($object_pengadaan->metode_penawaran=='Dua Tahap') || $object_pengadaan->metode_penawaran=='Dua Sampul') {
	echo '<h5>' . $modelDok14b->nama_dokumen . '<h5>' ;
    $this->widget('ext.coco.CocoWidget'
        ,array(
            'id'=>$modelDok14b->id_dokumen,
			'user'=>$user,
			'idPengadaan'=>$id,
            'onCompleted'=>'function(id,filename,jsoninfo){  }',
            'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
            'onMessage'=>'function(m){ alert(m); }',
            //'allowedExtensions'=>array('jpeg','jpg','gif','png'), // server-side mime-type validated
            'sizeLimit'=>2000000, // limit in server-side and in client-side
            // this arguments are used to send a notification
            // on a specific class when a new file is uploaded,
			'uploadDir'=>$dirUpload . $uploader14b->id_dokumen . '/',
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
	</div>	
	
	<div class="uploaderblock">
	<?php
	if($modelDok15 !=null){
	echo '<h5>' . $modelDok15->nama_dokumen . '<h5>' ;
    $this->widget('ext.coco.CocoWidget'
        ,array(
            'id'=>$modelDok15->id_dokumen,
			'user'=>$user,
			'idPengadaan'=>$id,
            'onCompleted'=>'function(id,filename,jsoninfo){  }',
            'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
            'onMessage'=>'function(m){ alert(m); }',
            //'allowedExtensions'=>array('jpeg','jpg','gif','png'), // server-side mime-type validated
            'sizeLimit'=>2000000, // limit in server-side and in client-side
            // this arguments are used to send a notification
            // on a specific class when a new file is uploaded,
			'uploadDir'=>$dirUpload . $uploader15->id_dokumen . '/',
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
    ?>
	</div>	
	
	<div class="uploaderblock">
	<?php
	if($modelDok16 !=null){
	echo '<h5>' . $modelDok16->nama_dokumen . '<h5>' ;
    $this->widget('ext.coco.CocoWidget'
        ,array(
            'id'=>$modelDok16->id_dokumen,
			'user'=>$user,
			'idPengadaan'=>$id,
            'onCompleted'=>'function(id,filename,jsoninfo){  }',
            'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
            'onMessage'=>'function(m){ alert(m); }',
            //'allowedExtensions'=>array('jpeg','jpg','gif','png'), // server-side mime-type validated
            'sizeLimit'=>2000000, // limit in server-side and in client-side
            // this arguments are used to send a notification
            // on a specific class when a new file is uploaded,
			'uploadDir'=>$dirUpload . $uploader16->id_dokumen . '/',
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
    ?>
	</div>	
	
	<div class="uploaderblock">
	<?php
	if($modelDok17 !=null){
	echo '<h5>' . $modelDok17->nama_dokumen . '<h5>' ;
    $this->widget('ext.coco.CocoWidget'
        ,array(
            'id'=>$modelDok17->id_dokumen,
			'user'=>$user,
			'idPengadaan'=>$id,
            'onCompleted'=>'function(id,filename,jsoninfo){  }',
            'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
            'onMessage'=>'function(m){ alert(m); }',
            //'allowedExtensions'=>array('jpeg','jpg','gif','png'), // server-side mime-type validated
            'sizeLimit'=>2000000, // limit in server-side and in client-side
            // this arguments are used to send a notification
            // on a specific class when a new file is uploaded,
			'uploadDir'=>$dirUpload . $uploader17->id_dokumen . '/',
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
    ?>
	</div>	
	
	<div class="uploaderblock">
	<?php
	if($modelDok18 !=null){
	echo '<h5>' . $modelDok18->nama_dokumen . '<h5>' ;
    $this->widget('ext.coco.CocoWidget'
        ,array(
            'id'=>$modelDok18->id_dokumen,
			'user'=>$user,
			'idPengadaan'=>$id,
            'onCompleted'=>'function(id,filename,jsoninfo){  }',
            'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
            'onMessage'=>'function(m){ alert(m); }',
            //'allowedExtensions'=>array('jpeg','jpg','gif','png'), // server-side mime-type validated
            'sizeLimit'=>2000000, // limit in server-side and in client-side
            // this arguments are used to send a notification
            // on a specific class when a new file is uploaded,
			'uploadDir'=>$dirUpload . $uploader18->id_dokumen . '/',
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
    ?>
	</div>	
	
	<div class="uploaderblock">
	<?php
	if($modelDok19 !=null){
	echo '<h5>' . $modelDok19->nama_dokumen . '<h5>' ;
    $this->widget('ext.coco.CocoWidget'
        ,array(
            'id'=>$modelDok19->id_dokumen,
			'user'=>$user,
			'idPengadaan'=>$id,
            'onCompleted'=>'function(id,filename,jsoninfo){  }',
            'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
            'onMessage'=>'function(m){ alert(m); }',
            //'allowedExtensions'=>array('jpeg','jpg','gif','png'), // server-side mime-type validated
            'sizeLimit'=>2000000, // limit in server-side and in client-side
            // this arguments are used to send a notification
            // on a specific class when a new file is uploaded,
			'uploadDir'=>$dirUpload . $uploader19->id_dokumen . '/',
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
    ?>
	</div>	
	
	<div class="uploaderblock">
	<?php
	if($modelDok20 !=null){
	echo '<h5>' . $modelDok20->nama_dokumen . '<h5>' ;
    $this->widget('ext.coco.CocoWidget'
        ,array(
            'id'=>$modelDok20->id_dokumen,
			'user'=>$user,
			'idPengadaan'=>$id,
            'onCompleted'=>'function(id,filename,jsoninfo){  }',
            'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
            'onMessage'=>'function(m){ alert(m); }',
            //'allowedExtensions'=>array('jpeg','jpg','gif','png'), // server-side mime-type validated
            'sizeLimit'=>2000000, // limit in server-side and in client-side
            // this arguments are used to send a notification
            // on a specific class when a new file is uploaded,
			'uploadDir'=>$dirUpload . $uploader20->id_dokumen . '/',
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
    ?>
	</div>
	</div>
</div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'style'=>'background:url(css/bg.gif)'));  ?></div>
    