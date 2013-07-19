<?php

class StatistikController extends Controller
{
	public function actionIndex() {
		$this->redirect(array('divisi', 'chart'=>'1'));
	}

	public function actionStatistik()
	{
		// renders the view file 'protected/views/site/history.php'
		// using the default layout 'protected/views/layouts/main.php'
		$category = Yii::app()->getRequest()->getQuery('category');
		$chart = Yii::app()->getRequest()->getQuery('chart');
		$chartData = array();
		$chartTitle;
		$chartSubtitle;
		switch ($category) {
			case '1' : {
				switch ($chart) {
					case '1' : {
						$div = Yii::app()->db->createCommand('select username from divisi')->queryAll();
						while(list($k1, $v1)=each($div)) {
							$x = array();
							$peng = Yii::app()->db->createCommand('select id_pengadaan from pengadaan where divisi_peminta = "' . $v1['username'] . '" and status != "-1" and status != "100" and status != "99"')->queryAll();
							array_push($x, $v1['username']);
							array_push($x, count($peng));
							array_push($chartData, $x);
						}
						$chartTitle = 'Pengadaan yang sedang berlangsung';
						$chartSubtitle = 'per divisi';
						break;
					}
					case '2' : {
						$div = Yii::app()->db->createCommand('select username from divisi')->queryAll();
						while(list($k1, $v1)=each($div)) {
							$x = array();
							$peng = Yii::app()->db->createCommand('select id_pengadaan from pengadaan where divisi_peminta = "' . $v1['username'] . '" and status = "100"')->queryAll();
							array_push($x, $v1['username']);
							array_push($x, count($peng));
							array_push($chartData, $x);
						}
						$chartTitle = 'Pengadaan yang telah selesai';
						$chartSubtitle = 'per divisi';
						break;
					}
					case '3' : {
						$div = Yii::app()->db->createCommand('select username from divisi')->queryAll();
						while(list($k1, $v1)=each($div)) {
							$x = array();
							$peng = Yii::app()->db->createCommand('select id_pengadaan from pengadaan where divisi_peminta = "' . $v1['username'] . '" and status = "99"')->queryAll();
							array_push($x, $v1['username']);
							array_push($x, count($peng));
							array_push($chartData, $x);
						}
						$chartTitle = 'Pengadaan yang gagal';
						$chartSubtitle = 'per divisi';
						break;
					}
					case '4' : {
						$div = Yii::app()->db->createCommand('select username from divisi')->queryAll();
						while(list($k1, $v1)=each($div)) {
							$x = array();
							$peng = Yii::app()->db->createCommand('select id_pengadaan from pengadaan where divisi_peminta = "' . $v1['username'] . '" and status != "-1"')->queryAll();
							array_push($x, $v1['username']);
							array_push($x, count($peng));
							array_push($chartData, $x);
						}
						$chartTitle = 'Pengadaan total';
						$chartSubtitle = 'per divisi';
						break;
					}
				}
				break;
			}
			case '2' : {
				switch ($chart) {
					case '1' : {
						$div = Yii::app()->db->createCommand('select id_panitia from panitia where id_panitia != "-1" and status_panitia = "Aktif"')->queryAll();
						while(list($k1, $v1)=each($div)) {
							$x = array();
							$peng = Yii::app()->db->createCommand('select id_pengadaan from pengadaan where id_panitia = "' . $v1['id_panitia'] . '" and status != "-1" and status != "100" and status != "99"')->queryAll();
							array_push($x, Panitia::model()->findByPk($v1['id_panitia'])->nama_panitia);
							array_push($x, count($peng));
							array_push($chartData, $x);
						}
						$chartTitle = 'Pengadaan yang sedang berlangsung';
						$chartSubtitle = 'per PIC';
						break;
					}
					case '2' : {
						$div = Yii::app()->db->createCommand('select id_panitia from panitia where id_panitia != "-1" and status_panitia = "Aktif"')->queryAll();
						while(list($k1, $v1)=each($div)) {
							$x = array();
							$peng = Yii::app()->db->createCommand('select id_pengadaan from pengadaan where id_panitia = "' . $v1['id_panitia'] . '" and status = "100"')->queryAll();
							array_push($x, Panitia::model()->findByPk($v1['id_panitia'])->nama_panitia);
							array_push($x, count($peng));
							array_push($chartData, $x);
						}
						$chartTitle = 'Pengadaan yang telah selesai';
						$chartSubtitle = 'per PIC';
						break;
					}
					case '3' : {
						$div = Yii::app()->db->createCommand('select id_panitia from panitia where id_panitia != "-1" and status_panitia = "Aktif"')->queryAll();
						while(list($k1, $v1)=each($div)) {
							$x = array();
							$peng = Yii::app()->db->createCommand('select id_pengadaan from pengadaan where id_panitia = "' . $v1['id_panitia'] . '" and status = "99"')->queryAll();
							array_push($x, Panitia::model()->findByPk($v1['id_panitia'])->nama_panitia);
							array_push($x, count($peng));
							array_push($chartData, $x);
						}
						$chartTitle = 'Pengadaan yang gagal';
						$chartSubtitle = 'per PIC';
						break;
					}
					case '4' : {
						$div = Yii::app()->db->createCommand('select id_panitia from panitia where id_panitia != "-1" and status_panitia = "Aktif"')->queryAll();
						while(list($k1, $v1)=each($div)) {
							$x = array();
							$peng = Yii::app()->db->createCommand('select id_pengadaan from pengadaan where id_panitia = "' . $v1['id_panitia'] . '" and status != "-1"')->queryAll();
							array_push($x, Panitia::model()->findByPk($v1['id_panitia'])->nama_panitia);
							array_push($x, count($peng));
							array_push($chartData, $x);
						}
						$chartTitle = 'Pengadaan total';
						$chartSubtitle = 'per PIC';
						break;
					}
				}
				break;
			}
			case '3' : {
				switch ($chart) {
					case '1' : {
						$met = Yii::app()->db->createCommand('select metode_pengadaan from pengadaan where metode_pengadaan != "-"')->queryAll();
						while(list($k1, $v1)=each($met)) {
							if (!$this->in_multiarray($v1['metode_pengadaan'], $chartData)) {
								$x = array();
								$peng = Yii::app()->db->createCommand('select id_pengadaan from pengadaan where metode_pengadaan = "' . $v1['metode_pengadaan'] . '" and status != "-1" and status != "100" and status != "99"')->queryAll();
								array_push($x, $v1['metode_pengadaan']);
								array_push($x, count($peng));
								array_push($chartData, $x);
							}
						}
						$chartTitle = 'Pengadaan yang sedang berlangsung';
						$chartSubtitle = 'per metode pengadaan';
						break;
					}
					case '2' : {
						$met = Yii::app()->db->createCommand('select metode_pengadaan from pengadaan')->queryAll();
						while(list($k1, $v1)=each($met)) {
							if (!$this->in_multiarray($v1['metode_pengadaan'], $chartData)) {
								$x = array();
								$peng = Yii::app()->db->createCommand('select id_pengadaan from pengadaan where metode_pengadaan = "' . $v1['metode_pengadaan'] . '" and status = "100"')->queryAll();
								array_push($x, $v1['metode_pengadaan']);
								array_push($x, count($peng));
								array_push($chartData, $x);
							}
						}
						$chartTitle = 'Pengadaan yang telah selesai';
						$chartSubtitle = 'per metode pengadaan';
						break;
					}
					case '3' : {
						$met = Yii::app()->db->createCommand('select metode_pengadaan from pengadaan')->queryAll();
						while(list($k1, $v1)=each($met)) {
							if (!$this->in_multiarray($v1['metode_pengadaan'], $chartData)) {
								$x = array();
								$peng = Yii::app()->db->createCommand('select id_pengadaan from pengadaan where metode_pengadaan = "' . $v1['metode_pengadaan'] . '" and status = "99"')->queryAll();
								array_push($x, $v1['metode_pengadaan']);
								array_push($x, count($peng));
								array_push($chartData, $x);
							}
						}
						$chartTitle = 'Pengadaan yang gagal';
						$chartSubtitle = 'per metode pengadaan';
						break;
					}
					case '4' : {
						$met = Yii::app()->db->createCommand('select metode_pengadaan from pengadaan')->queryAll();
						while(list($k1, $v1)=each($met)) {
							if (!$this->in_multiarray($v1['metode_pengadaan'], $chartData)) {
								$x = array();
								$peng = Yii::app()->db->createCommand('select id_pengadaan from pengadaan where metode_pengadaan = "' . $v1['metode_pengadaan'] . '" and status != "-1"')->queryAll();
								array_push($x, $v1['metode_pengadaan']);
								array_push($x, count($peng));
								array_push($chartData, $x);
							}
						}
						$chartTitle = 'Pengadaan total';
						$chartSubtitle = 'per metode pengadaan';
						break;
					}
				}
				break;
			}
		}

		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Yii::app()->user->getState('role') == 'kdivmum') {
				$this->render('statistik', array(
					'chartData'=>$chartData,
					'chartTitle'=>$chartTitle,
					'chartSubtitle'=>$chartSubtitle,
				));
			}
		}
	}

	public function actionDivisi()
	{
		$chart = Yii::app()->getRequest()->getQuery('chart');
		$detail = Yii::app()->getRequest()->getQuery('detail');
		$data = array();
		$div = Yii::app()->db->createCommand('select username from divisi')->queryAll();
		while(list($k1, $v1) = each($div)) {
			$x = array();
			switch ($chart) {
				case '1': {
					$peng = Yii::app()->db->createCommand('select id_pengadaan from pengadaan where divisi_peminta = "' . $v1['username'] . '" and status != "-1" and status != "100" and status != "99"')->queryAll();
					break;
				}
				case '2': {
					$peng = Yii::app()->db->createCommand('select id_pengadaan from pengadaan where divisi_peminta = "' . $v1['username'] . '" and status = "100"')->queryAll();
					break;
				}
				case '3': {
					$peng = Yii::app()->db->createCommand('select id_pengadaan from pengadaan where divisi_peminta = "' . $v1['username'] . '" and status = "99"')->queryAll();
					break;
				}
				case '4': {
					$peng = Yii::app()->db->createCommand('select id_pengadaan from pengadaan where divisi_peminta = "' . $v1['username'] . '" and status != "-1"')->queryAll();
					break;
				}
			}
			$x = array();
			array_push($x, $v1['username']);
			array_push($x, count($peng));
			array_push($data, $x);
		}
		$this->render('divisi', array(
			'chart'=>$chart,
			'detail'=>$detail,
			'data'=>$data,
		));
	}

	public function actionPic()
	{
		$chart = Yii::app()->getRequest()->getQuery('chart');
		$detail = Yii::app()->getRequest()->getQuery('detail');
		$data = array();
		$pic = Yii::app()->db->createCommand('select id_panitia from panitia where id_panitia != "-1" and status_panitia = "Aktif"')->queryAll();
		while(list($k1, $v1) = each($pic)) {
			$x = array();
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
		}
		$this->render('pic', array(
			'chart'=>$chart,
			'detail'=>$detail,
			'data'=>$data,
		));
	}

	public function actionMetode()
	{
		$chart = Yii::app()->getRequest()->getQuery('chart');
		$detail = Yii::app()->getRequest()->getQuery('detail');
		$data = array();
		$met = Yii::app()->db->createCommand('select metode_pengadaan from pengadaan where metode_pengadaan != "-"')->queryAll();
		while(list($k1, $v1) = each($met)) {
			$x = array();
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
		}
		$this->render('metode', array(
			'chart'=>$chart,
			'detail'=>$detail,
			'data'=>$data,
		));
	}
}
