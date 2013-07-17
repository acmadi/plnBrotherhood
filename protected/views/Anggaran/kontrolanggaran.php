<?php
/* @var $this SiteController */

$category = Yii::app()->getRequest()->getQuery('category');
$chart = Yii::app()->getRequest()->getQuery('chart');
$detail = Yii::app()->getRequest()->getQuery('detail');

$this->pageTitle=Yii::app()->name . ' | Kontrol Anggaran';
?>

<div id="sidebar">
	<?php $this->beginWidget('zii.widgets.CPortlet'); ?>
	<ul>
		<li><?php echo CHtml::link('Kontrol Anggaran Total', array('site/statistik', 'category'=>'1', 'chart'=>'1')) ?></li>
		<li><?php echo CHtml::link('Kontrol Anggaran Divisi A', array('site/statistik', 'category'=>'2', 'chart'=>'1')) ?></li>
		<li><?php echo CHtml::link('Kontrol Anggaran Divisi B', array('site/statistik', 'category'=>'2', 'chart'=>'1')) ?></li>
	</ul>
	<?php $this->endWidget(); ?>
</div>

<div id="maincontent">
	<div id="menuform">
		<h1 align="center" >Kontrol Anggaran</h1>
		<?php $this->widget('zii.widgets.grid.CGridView', 
			array( 'id'=>'anggaran-grid',
			 'dataProvider'=>$dataanggaran,
			 'columns'=>array(
			  'Nama_Divisi',
				// array(            // display using an expression
				// 'name'=>'Nama Divisi',				
				// 'value'=>'$data->nama_divisi', 
				// 'filter'=>'',
				// ),
			  'pagu_anggaran',
			  'nilai_rab',
			  'nilai_hps',
			 ),
			));
		?>
	<!-----------
		<table width="656" border="1" cellspacing="0" cellpadding="2">
		<tr>
		  <td width="200">Nama Divisi</td>
		  <td width="100">Pagu Anggaran</td>
		  <td width="100">Nilai RAB</td>
		  <td width="100">Nilai HPS</td>
		  <td width="100">Nilai Kontrak</td>
		  <td width="100">Penghematan</td>
		  <td width="100">Persen Penghematan</td>
		</tr>
		<?php
		// foreach ($anggaran as $item) {
		?>
		<tr>
		  <td><?php //echo $item[pagu_anggaran]; ?></td>
		  <td><?php //echo $item[nilai_rab]; ?></td>
		  <td><?php //echo $item[nilai_hps]; ?></td>
		</tr>
		<?php //} ?>
		</table>
	----->
	</div>
</div>