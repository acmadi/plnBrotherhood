<?php
	$id = Yii::app()->getRequest()->getQuery('id');
?>

<div id="popup" style="width:96%; background-color:lightgreen; border:3px solid green; padding:10px;">
	<span style="margin-left:20px;"><b>Data Berhasil Disimpan</b></span>
	<!----
	<script>
		setTimeout(function() {
			$('#popup').animate({
				height:'0px',
				opacity:'0.0'
			}, 1000, function() {
				$('#popup').hide();
			});
		}, 2000);
	</script>
	---->	
</div>

<?php /*$this->redirect(array('site/generator', 'id'=>$id));*/ ?>