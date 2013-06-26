<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' | Generator';
$id = Yii::app()->getRequest()->getQuery('id');
?>

<div id="pagecontent">
	<div id="sidebar">
		<?php if(!Yii::app()->user->isGuest) $this->widget('MenuPortlet'); ?>
	</div>

	<div id="maincontent">
		<?php 
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
		?>
		
			<div id="menuform">
				<?php
				$this->widget('zii.widgets.CMenu', array(
						'items'=>array(
							array('label'=>'Dokumen Kualifikasi', 'url'=>array('/site/pascakualifikasi','id'=>$id)),
						),
					));
				?>
			</div>
			<br/>
			
			<div style="border-top:1px solid lightblue">
			<br/>
				<h4><b> Buat Dokumen </b></h4>
				<ul class="generatedoc">
					<li><?php echo CHtml::link('Pakta Integritas Penyedia', array('docx/download','id'=>$X0->id_dokumen)); ?></li>
					<li><?php echo CHtml::link('Surat Pengantar Penawaran Harga', array('docx/download','id'=>$X1->id_dokumen)); ?></li>
					<li><?php echo CHtml::link('Surat Pernyataan Minat', array('docx/download','id'=>$X2->id_dokumen)); ?></li>
					<li><?php echo CHtml::link('Form Isian Kualifikasi', array('docx/download','id'=>$X3->id_dokumen)); ?></li>
				</ul>
			</div>
	
	<?php } ?>
	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'class'=>'sidafbutton'));  ?></div>
