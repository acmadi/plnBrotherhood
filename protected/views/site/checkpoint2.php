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

	<p><b> Pilih metode penawaran yang anda inginkan :</b></p>
	<form name="generator" method="post">
            <p>Satu Sampul<input type="radio" name="metode" value="1sampul" ></p>
            <p>Dua Sampul<input type="radio" name="metode" value="2sampul" ></p>
            <p>Dua Tahap<input type="radio" name="metode" value="2tahap" ></p>
</form>

<p> &nbsp </p>
<p> &nbsp </p>


<p><b>Pilih jenis kualifikasi :</b></p>
<form name="generator" method="post">

            <p>Pra Kualifikasi<input type="radio" name="jeniskualifikasi" value="pra" ></p>
            <p>Pasca Kualifikasi<input type="radio" name="jeniskualifikasi" value="pasca" ></p>
</form>
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
	<p><input type='submit' name='pilih' value='Pilih'></p>

	</div>
</div>

<div>
<?php echo CHtml::button('Kembali', array('submit'=>array('site/dashboard'), 'style'=>'background:url(css/bg.gif)'));  ?></div>
