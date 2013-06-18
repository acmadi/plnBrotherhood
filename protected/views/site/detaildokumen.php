<?php
/* @var $this SiteController */

	$id = Yii::app()->getRequest()->getQuery('id');
	$user = Yii::app()->user->name;
	$dirUpload = $_SERVER["DOCUMENT_ROOT"] . Yii::app()->request->baseUrl . '/uploads/' . Dokumen::model()->find('id_dokumen="' . $id . '"')->id_pengadaan . '/' . $id . '/' ;
	$cdokumen = Dokumen::model()->find('id_dokumen = "' . $id . '"');
	$this->pageTitle=Yii::app()->name . ' | ' . Pengadaan::model()->findByPk($cdokumen->id_pengadaan)->nama_pengadaan . ' : ' . $cdokumen->nama_dokumen;
	$dataProvider = new CActiveDataProvider(LinkDokumen::model(), array(
		'criteria'=>array(
			'condition'=>'id_dokumen = ' . $id,
			'order'=>'nomor_link DESC',
		),
	));
	$clink = LinkDokumen::model()->findAll('id_dokumen = ' . $id);
?>

<br />

<h2><?php echo Pengadaan::model()->findByPk($cdokumen->id_pengadaan)->nama_pengadaan; ?> : <?php echo $cdokumen->nama_dokumen?></h2>
<?php echo CHtml::button('Buat Dokumen', array('submit'=>array('docx/download','id'=>$id),'class'=>'sidafbutton'));  ?>

<?php
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

<?php echo CHtml::button('Kembali', array('submit'=>array('site/dokumengenerator', 'id'=>$cdokumen->id_pengadaan), 'class'=>'sidafbutton'));  ?>