<?php
    $this->pageTitle=Yii::app()->name . ' | Uploader';
?>

<h4> 
    List Dokumen Pengadaan Gedung Baru 
</h4>


<div>
	<?php
	echo '<h5>Berita acara aanwijzing</h5>';
    $this->widget('CocoWidget'
        ,array(
            'id'=>'cocowidget1',
            'onCompleted'=>'function(id,filename,jsoninfo){  }',
            'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
            'onMessage'=>'function(m){ alert(m); }',
            //'allowedExtensions'=>array('jpeg','jpg','gif','png'), // server-side mime-type validated
            'sizeLimit'=>2000000, // limit in server-side and in client-side
            // this arguments are used to send a notification
            // on a specific class when a new file is uploaded,
			'uploadDir'=>'uploads/',
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



<?php echo CHtml::button('Kembali', array('submit'=>array('site/detilpengadaanhistory'), 'style'=>'background:url(css/bg.gif)')); ?>
    