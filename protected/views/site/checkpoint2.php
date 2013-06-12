<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' | Generator';
$id = Yii::app()->getRequest()->getQuery('id');
$cpengadaan = Pengadaan::model()->find('id_pengadaan = "' . $id . '"');
?>

<div id="pagecontent">
	<div id="sidebar">
		<?php if(!Yii::app()->user->isGuest) $this->widget('MenuPortlet'); ?>
	</div>

	<div id="maincontent">
		
	<h1> Metode Penawaran :</h1>
	
	<p> &nbsp </p>
	<?php                                   
		echo CHtml::dropDownList('jeniskualifikasi','', 
		array(1=>'Pra Kualifikasi',2=>'Pasca Kualifikasi'),
		array(
			'prompt'=>'Pilih Jenis Kualifikasi :',
			'ajax' => array(
			'type'=>'POST', 
			'url'=>CController::createUrl(''),
			'update'=>'', 
			'data'=>array('jeniskualifikasi'=>'js:this.value'),
			))); 	 
	?>	
	
	<p> &nbsp </p>
	<?php                                   
		echo CHtml::dropDownList('metodepenawaran','', 
		array(1=>'Satu Sampul',2=>'Dua Sampul',3=>'Dua Tahap'),
		array(
			'prompt'=>'Pilih Metode Penawaran :',
			'ajax' => array(
			'type'=>'POST', 
			'url'=>CController::createUrl(''),
			'update'=>'', 
			'data'=>array('metodepenawaran'=>'js:this.value'),
			))); 	 
	?>	

		<?php if (isset($_POST['flag_submit_x']))
			{
					//Code to process the flagged image
			}

			if (!empty($_POST['rate_submit']))
			{
					//Code to process the rated image
			}
		?>
		
	<p>&nbsp</p>
	<p>&nbsp</p>	
	<p><input type='submit' name='pilih' value='Next >>'></p>

	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'style'=>'background:url(css/bg.gif)'));  ?></div>
