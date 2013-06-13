<?php
    $this->pageTitle=Yii::app()->name . ' | Uploader';
	$id = Yii::app()->getRequest()->getQuery('id');
	$objectpengadaan = Pengadaan::model()->find('id_pengadaan = "' . $id. '"');
	$dirUpload = 'uploads/' . $objectpengadaan->nama_pengadaan . '/' ;
	$uploader1 = 'Pakta Integritas I';
	$uploader2 = 'Dokumen Kualifikasi';
	$uploader3 = 'Berita Acara Evaluasi Kualifikas';
	$uploader4 = 'Berita Acara Aanwijzing';
	$uploader5 = 'Berita Acara Pembukaan Dokumen Penawaran';
	$uploader52 = 'Berita Acara Pembukaan Dokumen Penawaran 2';
	$uploader6 = 'Berita Acara Evaluasi Penawaran';
	$uploader62 = 'Berita Acara Evaluasi Penawaran 2';
	$uploader7 = 'Berita Acara Negosiasi dan Klarifikasi';
	$uploader8 = 'Nota Dinas Usulan Pemenang';
	$uploader9 = 'Nota Dinas Penetapan Pemenang';
	$uploader10 = 'Nota Dinas Pemberitahuan Pemenang';
	$uploader11 = 'Pakta Integritas II';
	$uploader12 = 'Kontrak';
	$uploader13 = 'Absensi';
	
	$kadivuploader1 = 'Nota Dinas Perintah Pengadaan';
	
?>

<div id="pagecontent">
	<div id="sidebar">
		<?php if(!Yii::app()->user->isGuest) $this->widget('MenuPortlet'); ?>
	</div>
	
	<div id="maincontent">
	
	<div class="uploaderblock">
	<?php
	echo '<h5>' . $uploader1 . '<h5>' ;
    $this->widget('CocoWidget'
        ,array(
            'id'=>$uploader1,
            'onCompleted'=>'function(id,filename,jsoninfo){  }',
            'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
            'onMessage'=>'function(m){ alert(m); }',
            //'allowedExtensions'=>array('jpeg','jpg','gif','png'), // server-side mime-type validated
            'sizeLimit'=>2000000, // limit in server-side and in client-side
            // this arguments are used to send a notification
            // on a specific class when a new file is uploaded,
			'uploadDir'=>$dirUpload . $uploader1 . '/',
			'receptorClassName'=>'application.models.User',
			'methodName'=>'myFileReceptor',
			'userdata'=>$model->primaryKey,
            // controls how many files must be uploaded
            'maxUploads'=>1, // defaults to -1 (unlimited)
            'maxUploadsReachMessage'=>'No more files allowed', // if empty, no message is shown
            // controls how many files the can select (not upload, for uploads see also: maxUploads)
            'multipleFileSelection'=>true, // true or false, defaults: true
        ));
    ?>
	</div>
	
	<div class="uploaderblock">
	<?php
	echo '<h5>' . $uploader2 . '<h5>' ;
    $this->widget('CocoWidget'
        ,array(
            'id'=>$uploader2,
            'onCompleted'=>'function(id,filename,jsoninfo){  }',
            'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
            'onMessage'=>'function(m){ alert(m); }',
            //'allowedExtensions'=>array('jpeg','jpg','gif','png'), // server-side mime-type validated
            'sizeLimit'=>2000000, // limit in server-side and in client-side
            // this arguments are used to send a notification
            // on a specific class when a new file is uploaded,
			'uploadDir'=>$dirUpload . $uploader2 . '/',
			'receptorClassName'=>'application.models.User',
			'methodName'=>'myFileReceptor',
			'userdata'=>$model->primaryKey,
            // controls how many files must be uploaded
            'maxUploads'=>1, // defaults to -1 (unlimited)
            'maxUploadsReachMessage'=>'No more files allowed', // if empty, no message is shown
            // controls how many files the can select (not upload, for uploads see also: maxUploads)
            'multipleFileSelection'=>true, // true or false, defaults: true
        ));
    ?>
	</div>
	
	<div class="uploaderblock">
	<?php
	echo '<h5>' . $uploader3 . '<h5>' ;
    $this->widget('CocoWidget'
        ,array(
            'id'=>$uploader3,
            'onCompleted'=>'function(id,filename,jsoninfo){  }',
            'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
            'onMessage'=>'function(m){ alert(m); }',
            //'allowedExtensions'=>array('jpeg','jpg','gif','png'), // server-side mime-type validated
            'sizeLimit'=>2000000, // limit in server-side and in client-side
            // this arguments are used to send a notification
            // on a specific class when a new file is uploaded,
			'uploadDir'=>$dirUpload . $uploader3 . '/',
			'receptorClassName'=>'application.models.User',
			'methodName'=>'myFileReceptor',
			'userdata'=>$model->primaryKey,
            // controls how many files must be uploaded
            'maxUploads'=>1, // defaults to -1 (unlimited)
            'maxUploadsReachMessage'=>'No more files allowed', // if empty, no message is shown
            // controls how many files the can select (not upload, for uploads see also: maxUploads)
            'multipleFileSelection'=>true, // true or false, defaults: true
        ));
    ?>
	</div>
	
	<div class="uploaderblock">
	<?php
	echo '<h5>' . $uploader4 . '<h5>' ;
    $this->widget('CocoWidget'
        ,array(
            'id'=>$uploader4,
            'onCompleted'=>'function(id,filename,jsoninfo){  }',
            'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
            'onMessage'=>'function(m){ alert(m); }',
            //'allowedExtensions'=>array('jpeg','jpg','gif','png'), // server-side mime-type validated
            'sizeLimit'=>2000000, // limit in server-side and in client-side
            // this arguments are used to send a notification
            // on a specific class when a new file is uploaded,
			'uploadDir'=>$dirUpload . $uploader4 . '/',
			'receptorClassName'=>'application.models.User',
			'methodName'=>'myFileReceptor',
			'userdata'=>$model->primaryKey,
            // controls how many files must be uploaded
            'maxUploads'=>1, // defaults to -1 (unlimited)
            'maxUploadsReachMessage'=>'No more files allowed', // if empty, no message is shown
            // controls how many files the can select (not upload, for uploads see also: maxUploads)
            'multipleFileSelection'=>true, // true or false, defaults: true
        ));
    ?>
	</div>
	
	<div class="uploaderblock">
	<?php
	echo '<h5>' . $uploader5 . '<h5>' ;
    $this->widget('CocoWidget'
        ,array(
            'id'=>$uploader5,
            'onCompleted'=>'function(id,filename,jsoninfo){  }',
            'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
            'onMessage'=>'function(m){ alert(m); }',
            //'allowedExtensions'=>array('jpeg','jpg','gif','png'), // server-side mime-type validated
            'sizeLimit'=>2000000, // limit in server-side and in client-side
            // this arguments are used to send a notification
            // on a specific class when a new file is uploaded,
			'uploadDir'=>$dirUpload . $uploader5 . '/',
			'receptorClassName'=>'application.models.User',
			'methodName'=>'myFileReceptor',
			'userdata'=>$model->primaryKey,
            // controls how many files must be uploaded
            'maxUploads'=>1, // defaults to -1 (unlimited)
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
	echo '<h5>' . $uploader52 . '<h5>' ;
    $this->widget('CocoWidget'
        ,array(
            'id'=>$uploader52,
            'onCompleted'=>'function(id,filename,jsoninfo){  }',
            'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
            'onMessage'=>'function(m){ alert(m); }',
            //'allowedExtensions'=>array('jpeg','jpg','gif','png'), // server-side mime-type validated
            'sizeLimit'=>2000000, // limit in server-side and in client-side
            // this arguments are used to send a notification
            // on a specific class when a new file is uploaded,
			'uploadDir'=>$dirUpload . $uploader52 . '/',
			'receptorClassName'=>'application.models.User',
			'methodName'=>'myFileReceptor',
			'userdata'=>$model->primaryKey,
            // controls how many files must be uploaded
            'maxUploads'=>1, // defaults to -1 (unlimited)
            'maxUploadsReachMessage'=>'No more files allowed', // if empty, no message is shown
            // controls how many files the can select (not upload, for uploads see also: maxUploads)
            'multipleFileSelection'=>true, // true or false, defaults: true
        ));
		}
    ?>
	</div>
	
	<div class="uploaderblock">
	<?php
	echo '<h5>' . $uploader6 . '<h5>' ;
    $this->widget('CocoWidget'
        ,array(
            'id'=>$uploader6,
            'onCompleted'=>'function(id,filename,jsoninfo){  }',
            'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
            'onMessage'=>'function(m){ alert(m); }',
            //'allowedExtensions'=>array('jpeg','jpg','gif','png'), // server-side mime-type validated
            'sizeLimit'=>2000000, // limit in server-side and in client-side
            // this arguments are used to send a notification
            // on a specific class when a new file is uploaded,
			'uploadDir'=>$dirUpload . $uploader6 . '/',
			'receptorClassName'=>'application.models.User',
			'methodName'=>'myFileReceptor',
			'userdata'=>$model->primaryKey,
            // controls how many files must be uploaded
            'maxUploads'=>1, // defaults to -1 (unlimited)
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
	echo '<h5>' . $uploader62 . '<h5>' ;
    $this->widget('CocoWidget'
        ,array(
            'id'=>$uploader62,
            'onCompleted'=>'function(id,filename,jsoninfo){  }',
            'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
            'onMessage'=>'function(m){ alert(m); }',
            //'allowedExtensions'=>array('jpeg','jpg','gif','png'), // server-side mime-type validated
            'sizeLimit'=>2000000, // limit in server-side and in client-side
            // this arguments are used to send a notification
            // on a specific class when a new file is uploaded,
			'uploadDir'=>$dirUpload . $uploader62 . '/',
			'receptorClassName'=>'application.models.User',
			'methodName'=>'myFileReceptor',
			'userdata'=>$model->primaryKey,
            // controls how many files must be uploaded
            'maxUploads'=>1, // defaults to -1 (unlimited)
            'maxUploadsReachMessage'=>'No more files allowed', // if empty, no message is shown
            // controls how many files the can select (not upload, for uploads see also: maxUploads)
            'multipleFileSelection'=>true, // true or false, defaults: true
        ));
	}
    ?>
	</div>
	
	<div class="uploaderblock">
	<?php
	echo '<h5>' . $uploader7 . '<h5>' ;
    $this->widget('CocoWidget'
        ,array(
            'id'=>$uploader7,
            'onCompleted'=>'function(id,filename,jsoninfo){  }',
            'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
            'onMessage'=>'function(m){ alert(m); }',
            //'allowedExtensions'=>array('jpeg','jpg','gif','png'), // server-side mime-type validated
            'sizeLimit'=>2000000, // limit in server-side and in client-side
            // this arguments are used to send a notification
            // on a specific class when a new file is uploaded,
			'uploadDir'=>$dirUpload . $uploader7 . '/',
			'receptorClassName'=>'application.models.User',
			'methodName'=>'myFileReceptor',
			'userdata'=>$model->primaryKey,
            // controls how many files must be uploaded
            'maxUploads'=>1, // defaults to -1 (unlimited)
            'maxUploadsReachMessage'=>'No more files allowed', // if empty, no message is shown
            // controls how many files the can select (not upload, for uploads see also: maxUploads)
            'multipleFileSelection'=>true, // true or false, defaults: true
        ));
    ?>
	</div>
	
	<div class="uploaderblock">
	<?php
	echo '<h5>' . $uploader8 . '<h5>' ;
    $this->widget('CocoWidget'
        ,array(
            'id'=>$uploader8,
            'onCompleted'=>'function(id,filename,jsoninfo){  }',
            'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
            'onMessage'=>'function(m){ alert(m); }',
            //'allowedExtensions'=>array('jpeg','jpg','gif','png'), // server-side mime-type validated
            'sizeLimit'=>2000000, // limit in server-side and in client-side
            // this arguments are used to send a notification
            // on a specific class when a new file is uploaded,
			'uploadDir'=>$dirUpload . $uploader8 . '/',
			'receptorClassName'=>'application.models.User',
			'methodName'=>'myFileReceptor',
			'userdata'=>$model->primaryKey,
            // controls how many files must be uploaded
            'maxUploads'=>1, // defaults to -1 (unlimited)
            'maxUploadsReachMessage'=>'No more files allowed', // if empty, no message is shown
            // controls how many files the can select (not upload, for uploads see also: maxUploads)
            'multipleFileSelection'=>true, // true or false, defaults: true
        ));
    ?>
	</div>
	
	<div class="uploaderblock">
	<?php
	echo '<h5>' . $uploader9 . '<h5>' ;
    $this->widget('CocoWidget'
        ,array(
            'id'=>$uploader9,
            'onCompleted'=>'function(id,filename,jsoninfo){  }',
            'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
            'onMessage'=>'function(m){ alert(m); }',
            //'allowedExtensions'=>array('jpeg','jpg','gif','png'), // server-side mime-type validated
            'sizeLimit'=>2000000, // limit in server-side and in client-side
            // this arguments are used to send a notification
            // on a specific class when a new file is uploaded,
			'uploadDir'=>$dirUpload . $uploader9 . '/',
			'receptorClassName'=>'application.models.User',
			'methodName'=>'myFileReceptor',
			'userdata'=>$model->primaryKey,
            // controls how many files must be uploaded
            'maxUploads'=>1, // defaults to -1 (unlimited)
            'maxUploadsReachMessage'=>'No more files allowed', // if empty, no message is shown
            // controls how many files the can select (not upload, for uploads see also: maxUploads)
            'multipleFileSelection'=>true, // true or false, defaults: true
        ));
    ?>
	</div>
	
	<div class="uploaderblock">
	<?php
	echo '<h5>' . $uploader10 . '<h5>' ;
    $this->widget('CocoWidget'
        ,array(
            'id'=>$uploader10,
            'onCompleted'=>'function(id,filename,jsoninfo){  }',
            'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
            'onMessage'=>'function(m){ alert(m); }',
            //'allowedExtensions'=>array('jpeg','jpg','gif','png'), // server-side mime-type validated
            'sizeLimit'=>2000000, // limit in server-side and in client-side
            // this arguments are used to send a notification
            // on a specific class when a new file is uploaded,
			'uploadDir'=>$dirUpload . $uploader10 . '/',
			'receptorClassName'=>'application.models.User',
			'methodName'=>'myFileReceptor',
			'userdata'=>$model->primaryKey,
            // controls how many files must be uploaded
            'maxUploads'=>1, // defaults to -1 (unlimited)
            'maxUploadsReachMessage'=>'No more files allowed', // if empty, no message is shown
            // controls how many files the can select (not upload, for uploads see also: maxUploads)
            'multipleFileSelection'=>true, // true or false, defaults: true
        ));
    ?>
	</div>
	
	<div class="uploaderblock">
	<?php
	echo '<h5>' . $uploader11 . '<h5>' ;
    $this->widget('CocoWidget'
        ,array(
            'id'=>$uploader11,
            'onCompleted'=>'function(id,filename,jsoninfo){  }',
            'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
            'onMessage'=>'function(m){ alert(m); }',
            //'allowedExtensions'=>array('jpeg','jpg','gif','png'), // server-side mime-type validated
            'sizeLimit'=>2000000, // limit in server-side and in client-side
            // this arguments are used to send a notification
            // on a specific class when a new file is uploaded,
			'uploadDir'=>$dirUpload . $uploader11 . '/',
			'receptorClassName'=>'application.models.User',
			'methodName'=>'myFileReceptor',
			'userdata'=>$model->primaryKey,
            // controls how many files must be uploaded
            'maxUploads'=>1, // defaults to -1 (unlimited)
            'maxUploadsReachMessage'=>'No more files allowed', // if empty, no message is shown
            // controls how many files the can select (not upload, for uploads see also: maxUploads)
            'multipleFileSelection'=>true, // true or false, defaults: true
        ));
    ?>
	</div>
	
	<div class="uploaderblock">
	<?php
	echo '<h5>' . $uploader12 . '<h5>' ;
    $this->widget('CocoWidget'
        ,array(
            'id'=>$uploader12,
            'onCompleted'=>'function(id,filename,jsoninfo){  }',
            'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
            'onMessage'=>'function(m){ alert(m); }',
            //'allowedExtensions'=>array('jpeg','jpg','gif','png'), // server-side mime-type validated
            'sizeLimit'=>2000000, // limit in server-side and in client-side
            // this arguments are used to send a notification
            // on a specific class when a new file is uploaded,
			'uploadDir'=>$dirUpload . $uploader12 . '/',
			'receptorClassName'=>'application.models.User',
			'methodName'=>'myFileReceptor',
			'userdata'=>$model->primaryKey,
            // controls how many files must be uploaded
            'maxUploads'=>1, // defaults to -1 (unlimited)
            'maxUploadsReachMessage'=>'No more files allowed', // if empty, no message is shown
            // controls how many files the can select (not upload, for uploads see also: maxUploads)
            'multipleFileSelection'=>true, // true or false, defaults: true
        ));
    ?>
	</div>
	
	<div class="uploaderblock">
	<?php
	echo '<h5>' . $uploader13 . '<h5>' ;
    $this->widget('CocoWidget'
        ,array(
            'id'=>$uploader13,
            'onCompleted'=>'function(id,filename,jsoninfo){  }',
            'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
            'onMessage'=>'function(m){ alert(m); }',
            //'allowedExtensions'=>array('jpeg','jpg','gif','png'), // server-side mime-type validated
            'sizeLimit'=>2000000, // limit in server-side and in client-side
            // this arguments are used to send a notification
            // on a specific class when a new file is uploaded,
			'uploadDir'=>$dirUpload . $uploader13 . '/',
			'receptorClassName'=>'application.models.User',
			'methodName'=>'myFileReceptor',
			'userdata'=>$model->primaryKey,
            // controls how many files must be uploaded
            'maxUploads'=>1, // defaults to -1 (unlimited)
            'maxUploadsReachMessage'=>'No more files allowed', // if empty, no message is shown
            // controls how many files the can select (not upload, for uploads see also: maxUploads)
            'multipleFileSelection'=>true, // true or false, defaults: true
        ));
    ?>
	</div>
	</div>
</div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'style'=>'background:url(css/bg.gif)'));  ?></div>
    