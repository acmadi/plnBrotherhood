<?php
    $this->pageTitle=Yii::app()->name . ' | Uploader';
	$id = Yii::app()->getRequest()->getQuery('id');
	$objectpengadaan = Pengadaan::model()->find('id_pengadaan = "' . $id. '"');
	$dirUpload = 'uploads/' . $objectpengadaan->nama_pengadaan . '/';
?>

<div id="pagecontent">
	<div id="sidebar">
		<?php if(!Yii::app()->user->isGuest) $this->widget('MenuPortlet'); ?>
	</div>
	
	<div id="maincontent">
	<div class="uploaderblock">
	<h5>Berita Acara Aanwijzing</h5>
	<?php
    $this->widget('CocoWidget'
        ,array(
            'id'=>'BeritaAcaraAanwijzing',
            'onCompleted'=>'function(id,filename,jsoninfo){  }',
            'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
            'onMessage'=>'function(m){ alert(m); }',
            //'allowedExtensions'=>array('jpeg','jpg','gif','png'), // server-side mime-type validated
            'sizeLimit'=>2000000, // limit in server-side and in client-side
            // this arguments are used to send a notification
            // on a specific class when a new file is uploaded,
			'uploadDir'=>$dirUpload,
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
    