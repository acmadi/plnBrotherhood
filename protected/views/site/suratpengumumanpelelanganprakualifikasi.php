<?php
/* @var $this SiteController */

$id = Yii::app()->getRequest()->getQuery('id');
$cpengadaan = Pengadaan::model()->find('id_pengadaan = "' . $id . '"');
$this->pageTitle=Yii::app()->name . ' | '.$cpengadaan->nama_pengadaan;
?>

<div id="pagecontent">
	<div id="sidebar">
		<?php if(!Yii::app()->user->isGuest) $this->widget('MenuPortlet'); ?>
	</div>

	<div id="maincontent">
	
		<?php 
			if (Yii::app()->user->getState('role') == 'anggota') {
		?>
		      
                <div id="menuform">
                    <?php
                        $this->widget('zii.widgets.CMenu', array(
                            'items'=>array(
                                    array('label'=>'Dokumen Prakualifikasi', 'url'=>array($DPK->isNewRecord?('/site/dokumenprakualifikasi'):('/site/editdokumenprakualifikasi'),'id'=>$id)),
                                    array('label'=>'Surat Undangan Prakualifikasi', 'url'=>array(Pengadaan::model()->findByPk($id)->status=='2'?'/site/suratundanganprakualifikasi':(Pengadaan::model()->findByPk($id)->status=='1'?'':'/site/editsuratundanganprakualifikasi'),'id'=>$id)),
                            ),
                        ));
                    ?>
                </div>
                
                <br/>
                
		<div class="form">

		<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'dokumen-prakualifikasi-form',
		'enableAjaxValidation'=>false,
		)); ?>

		<div class="row buttons">
			<?php echo CHtml::submitButton('Next',array('class'=>'sidafbutton')); ?>
		</div>
		
	<?php $this->endWidget(); ?>

	</div><!-- form -->
	
<?php	} ?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'style'=>'background:url(css/bg.gif)'));  ?></div>
