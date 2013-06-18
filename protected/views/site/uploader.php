<?php
	$model=Dokumen::model();
    $this->pageTitle=Yii::app()->name . ' | Uploader';
	//id pengadaan
	$id = Yii::app()->getRequest()->getQuery('id');
	$user=Yii::app()->user->name;
	$objectpengadaan = Pengadaan::model()->find('id_pengadaan = "' . $id. '"');
	$dirUpload =  $_SERVER["DOCUMENT_ROOT"] . Yii::app()->request->baseUrl . '/uploads/' . $objectpengadaan->id_pengadaan . '/' ;
	$modelDok1 = Dokumen::model()->find('nama_dokumen="Pakta Integritas Panitia 1"');
	$modelDok2 = Dokumen::model()->find('nama_dokumen="Dokumen Kualifikasi"');
	$modelDok3 = Dokumen::model()->find('nama_dokumen="Berita Acara Evaluasi Kualifikasi"');
	$modelDok4 = Dokumen::model()->find('nama_dokumen="Berita Acara Aanwijzing"');
	$modelDok5 = Dokumen::model()->find('nama_dokumen="Berita Acara Pembukaan Dokumen Penawaran"');
	$modelDok52 = Dokumen::model()->find('nama_dokumen="Berita Acara Pembukaan Dokumen Penawaran 2"');
	$modelDok6 = Dokumen::model()->find('nama_dokumen="Berita Acara Evaluasi Penawaran"');
	$modelDok62 = Dokumen::model()->find('nama_dokumen="Berita Acara Evaluasi Penawaran 2"');
	$modelDok7 = Dokumen::model()->find('nama_dokumen="Berita Acara Negosiasi Klarifikasi"');
	$modelDok8 = Dokumen::model()->find('nama_dokumen="Nota Dinas Usulan Pemenang"');
	$modelDok9 = Dokumen::model()->find('nama_dokumen="Nota Dinas Penetapan Pemenang "');
	$modelDok10 = Dokumen::model()->find('nama_dokumen="Nota Dinas Pemberitahuan Pemenang"');
	$modelDok11 = Dokumen::model()->find('nama_dokumen="Pakta Integritas Panitia 2"');
	$modelDok12 = Dokumen::model()->find('nama_dokumen="Kontrak"');
	$modelDok13 = Dokumen::model()->find('nama_dokumen="Daftar Hadir"');
?>

<div id="pagecontent">
	<div id="sidebar">
		<?php if(!Yii::app()->user->isGuest) $this->widget('MenuPortlet'); ?>
	</div>
	
	<div id="maincontent">
	
	<div class="uploaderblock">
	<?php
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
    ?>
	</div>
	
	<div class="modelDokblock">
	<?php
	echo '<h5>' . $modelDok2->nama_dokumen . '<h5>' ;
    $this->widget('ext.coco.CocoWidget'
        ,array(
            'id'=>$modelDok2,
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
    ?>
	</div>
	
	<div class="uploaderblock">
	<?php
	echo '<h5>' . $modelDok3->nama_dokumen . '<h5>' ;
    $this->widget('ext.coco.CocoWidget'
        ,array(
            'id'=>$modelDok3,
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
    ?>
	</div>
	
	<div class="uploaderblock">
	<?php
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
    ?>
	</div>
	
	<div class="uploaderblock">
	<?php
	echo '<h5>' . $modelDok5->nama_dokumen . '<h5>' ;
    $this->widget('ext.coco.CocoWidget'
        ,array(
            'id'=>$modelDok5,
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
    ?>
	</div>
	
	<div class="uploaderblock">
	<?php
	if($objectpengadaan->metode_penawaran=="Dua Sampul" || $objectpengadaan->metode_penawaran=="Dua Tahap" )
	{
	echo '<h5>' . $modelDok52->nama_dokumen . '<h5>' ;
    $this->widget('ext.coco.CocoWidget'
        ,array(
            'id'=>$modelDok52->id_dokumen,
			'user'=>$user,
			'idPengadaan'=>$id,
            'onCompleted'=>'function(id,filename,jsoninfo){  }',
            'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
            'onMessage'=>'function(m){ alert(m); }',
            //'allowedExtensions'=>array('jpeg','jpg','gif','png'), // server-side mime-type validated
            'sizeLimit'=>2000000, // limit in server-side and in client-side
            // this arguments are used to send a notification
            // on a specific class when a new file is uploaded,
			'uploadDir'=>$dirUpload . $modelDok52->id_dokumen . '/',
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
    ?>
	</div>
	
	<div class="uploaderblock">
	<?php
	if($objectpengadaan->metode_penawaran=="Dua Sampul" || $objectpengadaan->metode_penawaran=="Dua Tahap" )
	{
	echo '<h5>' . $modelDok62->nama_dokumen . '<h5>' ;
    $this->widget('ext.coco.CocoWidget'
        ,array(
            'id'=>$modelDok62,
			'user'=>$user,
			'idPengadaan'=>$id,
            'onCompleted'=>'function(id,filename,jsoninfo){  }',
            'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
            'onMessage'=>'function(m){ alert(m); }',
            //'allowedExtensions'=>array('jpeg','jpg','gif','png'), // server-side mime-type validated
            'sizeLimit'=>2000000, // limit in server-side and in client-side
            // this arguments are used to send a notification
            // on a specific class when a new file is uploaded,
			'uploadDir'=>$dirUpload . $modelDok62->id_dokumen . '/',
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
	echo '<h5>' . $modelDok7->nama_dokumen . '<h5>' ;
    $this->widget('ext.coco.CocoWidget'
        ,array(
            'id'=>$modelDok7,
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
    ?>
	</div>
	
	<div class="uploaderblock">
	<?php
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
    ?>
	</div>
	
	<div class="uploaderblock">
	<?php
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
    ?>
	</div>
	
	<div class="uploaderblock">
	<?php
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
    ?>
	</div>
	
	<div class="uploaderblock">
	<?php
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
    ?>
	</div>
	
	<div class="uploaderblock">
	<?php
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
			'uploadDir'=>$dirUpload . $modelDok12->id_dokumen . '/',
			'receptorClassName'=>'application.models.Dokumen',
			'methodName'=>'fileReceptor',
			'userdata'=>$model->primaryKey,
            // controls how many files must be uploaded
            'maxUploads'=>-1, // defaults to -1 (unlimited)
            'maxUploadsReachMessage'=>'No more files allowed', // if empty, no message is shown
            // controls how many files the can select (not upload, for uploads see also: maxUploads)
            'multipleFileSelection'=>true, // true or false, defaults: true
        ));
    ?>
	</div>
	
	<div class="uploaderblock">
	<?php
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
    ?>
	</div>
	</div>
</div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'style'=>'background:url(css/bg.gif)'));  ?></div>
    