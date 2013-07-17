<?php
/* @var $this SiteController */

$category = Yii::app()->getRequest()->getQuery('category');
$chart = Yii::app()->getRequest()->getQuery('chart');
$detail = Yii::app()->getRequest()->getQuery('detail');

$this->pageTitle=Yii::app()->name . ' | Kontrol Anggaran';
?>
<h1 align="center" >Kontrol Anggaran</h1>
<p>
	Pagu Total :  <?php echo $pagutotal; ?>
	RAB Total :  <?php echo $rabtotal; ?> 
	HPS Total :  <?php echo $hpstotal; ?>
	Kontrak Total :  <?php echo $kontraktotal; ?>
	Penghematan Total :  <?php echo $penghematantotal; ?>
	Pesren Total :  <?php echo $persenpenghematantotal; ?> 
</p>
<?php $this->widget('zii.widgets.grid.CGridView', 
	array( 'id'=>'anggaran-grid',
		 'dataProvider'=>$dataanggaran,
		 'htmlOptions'=>array('style'=>'cursor: pointer;'),			
		 // 'selectionChanged'=>"function(id){window.location='" . Yii::app()->createUrl("anggaran/kontrolanggarandivisi", array("id"=>"$dataanggaran->getAttributeLabel(username)")) . "'+ $.fn.yiiGridView.getSelection(id);}",
		 'columns'=>array(
			'nama_divisi',
			'pagu_anggaran',
			'nilai_rab',
			'nilai_hps',
			'nilai_kontrak',
			'penghematan',
			'persen',
			),
		'pager'=>array(
			'class'=>'CLinkPager',
			'header'=>'',
			'nextPageLabel'=>"Selanjutnya",
			'prevPageLabel'=>'Sebelumnya',
		),
		'summaryText' => 'Keterangan : Angka dalam satuan rupiah.',
	));
?>