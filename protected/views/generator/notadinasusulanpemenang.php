<?php
/* @var $this SiteController */

$id = Yii::app()->getRequest()->getQuery('id');
$cpengadaan = Pengadaan::model()->find('id_pengadaan = "' . $id . '"');
$this->pageTitle=Yii::app()->name . ' | '.$cpengadaan->nama_pengadaan;
?>

<div id="pagecontent">
	<div id="sidebar">
		<?php if(!Yii::app()->user->isGuest) $this->widget('MenuPortlet'); ?>
		<script type="text/javascript">
			$('#17').attr('class','onprogress');
		</script>
	</div>

	<div id="maincontent">
	
		<?php 
			if (Yii::app()->user->getState('role') == 'anggota') {
		?>
		
        	<?php if($cpengadaan->metode_pengadaan == 'Penunjukan Langsung') { ?>
        		<div id="menuform">
                    <?php
                        $this->widget('zii.widgets.CMenu', array(
                            'items'=>array(
                                    array('label'=>'ND Usulan', 'url'=>array($NDUP->isNewRecord?'/generator/notadinasusulanpemenang':'/generator/editnotadinasusulanpemenang','id'=>$id)),
                                    array('label'=>'ND Penetapan', 'url'=>array(Pengadaan::model()->findByPk($id)->status=='33'?'/generator/notadinaspenetapanpemenang':(Pengadaan::model()->findByPk($id)->status=='32'?'':'/generator/editnotadinaspenetapanpemenang'),'id'=>$id)),
                                    array('label'=>'Surat Penunjukan Pemenang', 'url'=>array(Pengadaan::model()->findByPk($id)->status=='36'?'/generator/suratpenunjukanpemenang':(Pengadaan::model()->findByPk($id)->status=='33'?'':(Pengadaan::model()->findByPk($id)->status=='32'?'':'/generator/editsuratpenunjukanpemenang')),'id'=>$id)),
                            ),
                        ));
                    ?>
                </div>
        	<?php } else if($cpengadaan->metode_pengadaan == 'Pemilihan Langsung') { ?>
                <div id="menuform">
                    <?php
                        $this->widget('zii.widgets.CMenu', array(
                            'items'=>array(
                                    array('label'=>'ND Usulan', 'url'=>array($NDUP->isNewRecord?'/generator/notadinasusulanpemenang':'/generator/editnotadinasusulanpemenang','id'=>$id)),
                                    array('label'=>'ND Penetapan', 'url'=>array(Pengadaan::model()->findByPk($id)->status=='33'?'/generator/notadinaspenetapanpemenang':(Pengadaan::model()->findByPk($id)->status=='32'?'':'/generator/editnotadinaspenetapanpemenang'),'id'=>$id)),
                                    array('label'=>'ND Pemberitahuan', 'url'=>array(Pengadaan::model()->findByPk($id)->status=='34'?'/generator/notadinaspemberitahuanpemenang':(Pengadaan::model()->findByPk($id)->status=='33'?'':(Pengadaan::model()->findByPk($id)->status=='32'?'':'/generator/editnotadinaspemberitahuanpemenang')),'id'=>$id)),
                                    array('label'=>'Surat Penunjukan Pemenang', 'url'=>array(Pengadaan::model()->findByPk($id)->status=='36'?'/generator/suratpenunjukanpemenang':(Pengadaan::model()->findByPk($id)->status=='34'?'':(Pengadaan::model()->findByPk($id)->status=='33'?'':(Pengadaan::model()->findByPk($id)->status=='32'?'':'/generator/editsuratpenunjukanpemenang'))),'id'=>$id)),
                            ),
                        ));
                    ?>
                </div>
			<?php } else if($cpengadaan->metode_pengadaan == 'Pelelangan') { ?>
				<div id="menuform">
                    <?php
                        $this->widget('zii.widgets.CMenu', array(
                            'items'=>array(
                                    array('label'=>'ND Usulan', 'url'=>array($NDUP->isNewRecord?'/generator/notadinasusulanpemenang':'/generator/editnotadinasusulanpemenang','id'=>$id)),
                                    array('label'=>'ND Penetapan', 'url'=>array(Pengadaan::model()->findByPk($id)->status=='33'?'/generator/notadinaspenetapanpemenang':(Pengadaan::model()->findByPk($id)->status=='32'?'':'/generator/editnotadinaspenetapanpemenang'),'id'=>$id)),
                                    array('label'=>'SP Pemenang', 'url'=>array(Pengadaan::model()->findByPk($id)->status=='35'?'/generator/suratpengumumanpemenang':(Pengadaan::model()->findByPk($id)->status=='33'?'':(Pengadaan::model()->findByPk($id)->status=='32'?'':'/generator/editsuratpengumumanpemenang')),'id'=>$id)),
                                    array('label'=>'Surat Penunjukan Pemenang', 'url'=>array(Pengadaan::model()->findByPk($id)->status=='36'?'/generator/suratpenunjukanpemenang':(Pengadaan::model()->findByPk($id)->status=='35'?'':(Pengadaan::model()->findByPk($id)->status=='33'?'':(Pengadaan::model()->findByPk($id)->status=='32'?'':'/generator/editsuratpenunjukanpemenang'))),'id'=>$id)),
                            ),
                        ));
                    ?>
                </div>
			<?php } ?>
                
                <br/>
                
		<div class="form">

		<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'nota-dinas-usulan-pemenang-form',
		'enableAjaxValidation'=>false,
		)); ?>
		
		<h4><b> Nota Dinas Usulan Pemenang </b></h4>
		<div class="row">
			<?php echo $form->labelEx($NDUP,'nomor'); ?>
			Nomor Berita Acara Negosiasi dan Klarifikasi : <?php echo $BANK->nomor ?> <br/>
			<?php echo $form->textField($NDUP,'nomor',array('size'=>56,'maxlength'=>50)); ?>
			<?php echo $form->error($NDUP,'nomor'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($Dokumen0,'tanggal surat'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$Dokumen0,
					'attribute'=>'tanggal',
					'value'=>$Dokumen0->tanggal,
					'htmlOptions'=>array('size'=>56),
					'options'=>array(
					'dateFormat'=>'dd-mm-yy',
					),
			));?>
			<?php echo $form->error($Dokumen0,'tanggal'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($NDUP,'tanggal Pelaksanaan'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$NDUP,
					'attribute'=>'waktu_pelaksanaan',
					'value'=>$NDUP->waktu_pelaksanaan,
					'htmlOptions'=>array('size'=>56),
					'options'=>array(
					'dateFormat'=>'dd-mm-yy',
					),
			));?>
			<?php echo $form->error($NDUP,'waktu_pelaksanaan'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($NDUP,'tempat Penyerahan'); ?>
			<?php echo $form->textArea($NDUP,'tempat_penyerahan',array('cols'=>43,'rows'=>3, 'maxlength'=>20)); ?>
			<?php echo $form->error($NDUP,'tempat_penyerahan'); ?>
		</div>

		<div class="row">
				<?php 
					$this->widget('application.extensions.appendo.JAppendo',array(
					'id' => 'idpenyedia',        
					'model' => $PP,
					// 'model2' => $PP2,
					'viewName' => 'formperusahaan_usulan_pemenang',
					'labelAdd' => '',
					'labelDel' => '',
					
					)); 
				?>
		</div>	
		
		
		<div class="row buttons">
			<?php echo CHtml::submitButton($NDUP->isNewRecord ? 'Simpan' : 'Perbarui',array('class'=>'sidafbutton')); ?>
		</div>
		
	<?php $this->endWidget(); ?>

	</div><!-- form -->
	
	<?php if($NDUP->isNewRecord) { ?>
		
	<?php } else { ?>
		<br/>
		<div style="border-top:1px solid lightblue">
		<br/>
			<h4><b> Daftar Dokumen </b></h4>
			<ul class="generatedoc">
				<li><?php echo CHtml::link('Nota Dinas Usulan Pemenang', array('docx/download','id'=>$NDUP->id_dokumen)); ?></li>
				<li><?php echo CHtml::link('Pakta Integritas Akhir Panitia/Pejabat', array('docx/download','id'=>$PIP2->id_dokumen)); ?></li>
			</ul>
		</div>
	<?php } ?>
	
<?php	} ?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'style'=>'background:url(css/bg.gif)'));  ?></div>
