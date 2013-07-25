<?php

class StatistikController extends Controller
{
	public function actionIndex() {
		$this->redirect(array('divisi', 'chart'=>'1'));
	}

	public function actionDivisi()
	{
		$chart = Yii::app()->getRequest()->getQuery('chart');
		$detail = Yii::app()->getRequest()->getQuery('detail');
		$data = array();
		$div = Yii::app()->db->createCommand('select id_divisi, nama_singkat from divisi')->queryAll();
		$total = 0;
		foreach ($div as $k1=>$v1) {
			switch ($chart) {
				case '1': {
					$peng = Yii::app()->db->createCommand('select id_pengadaan from pengadaan where divisi_peminta = "' . $v1['id_divisi'] . '" and status != "-1" and status != "100" and status != "99"')->queryAll();
					break;
				}
				case '2': {
					$peng = Yii::app()->db->createCommand('select id_pengadaan from pengadaan where divisi_peminta = "' . $v1['id_divisi'] . '" and status = "100"')->queryAll();
					break;
				}
				case '3': {
					$peng = Yii::app()->db->createCommand('select id_pengadaan from pengadaan where divisi_peminta = "' . $v1['id_divisi'] . '" and status = "99"')->queryAll();
					break;
				}
				case '4': {
					$peng = Yii::app()->db->createCommand('select id_pengadaan from pengadaan where divisi_peminta = "' . $v1['id_divisi'] . '" and status != "-1"')->queryAll();
					break;
				}
			}
			$x = array();
			array_push($x, $v1['nama_singkat']);
			array_push($x, count($peng));
			array_push($data, $x);
			$total += count($peng);
		}
		$this->render('divisi', array(
			'chart'=>$chart,
			'detail'=>$detail,
			'data'=>$data,
			'total'=>$total,
		));
	}

	public function actionPic()
	{
		$chart = Yii::app()->getRequest()->getQuery('chart');
		$detail = Yii::app()->getRequest()->getQuery('detail');
		$data = array();
		$pic = Yii::app()->db->createCommand('select id_panitia from panitia where id_panitia != "-1" and status_panitia = "Aktif"')->queryAll();
		$total = 0;
		foreach ($pic as $k1=>$v1) {
			switch ($chart) {
				case '1': {
					$peng = Yii::app()->db->createCommand('select id_pengadaan from pengadaan where id_panitia = "' . $v1['id_panitia'] . '" and status != "-1" and status != "100" and status != "99"')->queryAll();
					break;
				}
				case '2': {
					$peng = Yii::app()->db->createCommand('select id_pengadaan from pengadaan where id_panitia = "' . $v1['id_panitia'] . '" and status = "100"')->queryAll();
					break;
				}
				case '3': {
					$peng = Yii::app()->db->createCommand('select id_pengadaan from pengadaan where id_panitia = "' . $v1['id_panitia'] . '" and status = "99"')->queryAll();
					break;
				}
				case '4': {
					$peng = Yii::app()->db->createCommand('select id_pengadaan from pengadaan where id_panitia = "' . $v1['id_panitia'] . '" and status != "-1"')->queryAll();
					break;
				}
			}
			$x = array();
			array_push($x, Panitia::model()->findByPk($v1['id_panitia'])->nama_panitia);
			array_push($x, count($peng));
			array_push($data, $x);
			$total += count($peng);
		}
		$this->render('pic', array(
			'chart'=>$chart,
			'detail'=>$detail,
			'data'=>$data,
			'total'=>$total,
		));
	}

	public function actionMetode()
	{
		$chart = Yii::app()->getRequest()->getQuery('chart');
		$detail = Yii::app()->getRequest()->getQuery('detail');
		$data = array();
		$met = Yii::app()->db->createCommand('select metode_pengadaan from pengadaan where metode_pengadaan != "-"')->queryAll();
		$total = 0;
		foreach ($met as $k1=>$v1) {
			if (!$this->in_multiarray($v1['metode_pengadaan'], $data)) {
				switch ($chart) {
					case '1': {
						$peng = Yii::app()->db->createCommand('select id_pengadaan from pengadaan where metode_pengadaan = "' . $v1['metode_pengadaan'] . '" and status != "-1" and status != "100" and status != "99"')->queryAll();
						break;
					}
					case '2': {
						$peng = Yii::app()->db->createCommand('select id_pengadaan from pengadaan where metode_pengadaan = "' . $v1['metode_pengadaan'] . '" and status = "100"')->queryAll();
						break;
					}
					case '3': {
						$peng = Yii::app()->db->createCommand('select id_pengadaan from pengadaan where metode_pengadaan = "' . $v1['metode_pengadaan'] . '" and status = "99"')->queryAll();
						break;
					}
					case '4': {
						$peng = Yii::app()->db->createCommand('select id_pengadaan from pengadaan where metode_pengadaan = "' . $v1['metode_pengadaan'] . '" and status != "-1"')->queryAll();
						break;
					}
				}
				$x = array();
				array_push($x, $v1['metode_pengadaan']);
				array_push($x, count($peng));
				array_push($data, $x);
				$total += count($peng);
			}
		}
		$this->render('metode', array(
			'chart'=>$chart,
			'detail'=>$detail,
			'data'=>$data,
			'total'=>$total,
		));
	}

	private function in_multiarray($needle, $haystack) {
		if(in_array($needle, $haystack)) {
			return true;
		}
		foreach($haystack as $element) {
			if(is_array($element) && $this->in_multiarray($needle, $element))
				return true;
			}
		return false;
	}
}
