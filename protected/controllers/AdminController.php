<?php

class AdminController extends Controller
{
	public function actionPengguna()
	{
		if (Yii::app()->user->getState('role') == 'admin') {
			$model = new Anggota('search');
			$model->unsetAttributes();  // clear any default values
			if(isset($_GET['Anggota'])){
				$model->attributes = $_GET['Anggota'];
			}
			$this->render('pengguna', array(
				'model'=>$model,
			));
		}
	}

	public function actionPanitia()
	{
		if (Yii::app()->user->getState('role') == 'admin') {
			$model = new Panitia('search');
			$model->unsetAttributes();  // clear any default values
			if(isset($_GET['Panitia'])){
				$model->attributes = $_GET['Panitia'];
			}
			$this->render('panitia', array(
				'model'=>$model,
			));
		}
	}

	public function actionDetailpanitia()
	{
		if (Yii::app()->user->getState('role') == 'admin') {
			$id = Yii::app()->getRequest()->getQuery('id');
			$panitia = Panitia::model()->findByPk($id);
			$anggota = Anggota::model()->findAll('id_panitia = ' . $id . ' and divisi = "Divisi Umum"');
			$anggotaluar = Anggota::model()->findAll('id_panitia = ' . $id . ' and divisi != "Divisi Umum"');
			$panitia->tanggal_sk = Tanggal::getTanggalStrip($panitia->tanggal_sk);
			if (isset($_POST['Panitia']) && isset($_POST['nama']) && isset($_POST['namaluar'])) {
				$panitia->attributes = $_POST['Panitia'];
				$panitia->tanggal_sk = date('Y-m-d', strtotime($panitia->tanggal_sk));
				$n = count($_POST['nama']);
				for ($i=0; $i < $n; $i++) {
					if (isset($_POST['id'])) {
						$nonaktif = Anggota::model()->findByPk($_POST['id'][$i]);
						$nonaktif->status_user = 'Tidak Aktif';
						$nonaktif->save(false);
					}
					$person = Panitia::model()->findByPk($_POST['nama'][$i]);
					$new = new Anggota;
					$new->username = $person->nama;
				}
				if ($panitia->validate()) {
					if ($panitia->save(false)) {
						Yii::app()->user->setFlash('sukses','Data Telah Disimpan');
					}
				}
			}
			$this->render('detailpanitia', array(
				'id'=>$id,
				'panitia'=>$panitia,
				'anggota'=>$anggota,
				'anggotaluar'=>$anggotaluar,
			));
		}
	}

	public function actionKdiv()
	{
		if (Yii::app()->user->getState('role') == 'admin') {
			$model = new Kdivmum('search');
			$model->unsetAttributes();  // clear any default values
			if(isset($_GET['Kdivmum'])){
				$model->attributes = $_GET['Kdivmum'];
			}
			$this->render('kdiv', array(
				'model'=>$model,
			));
		}
	}

	public function actionTambahkdiv()
	{
		if (Yii::app()->user->getState('role') == 'admin') {
			$kdiv = new Kdivmum;
			if (isset($_POST['Kdivmum'])) {
				$kdiv->attributes = $_POST['Kdivmum'];
				$kdiv->status_user = 'Aktif';
				if ($kdiv->save(false)) {
					$this->redirect(array('kdiv'));
				}
			}
			$this->render('tambahkdiv', array(
				'kdiv'=>$kdiv,
			));
		}
	}

	public function actionHapuskdiv()
	{
		if (Yii::app()->user->getState('role') == 'admin') {
			$kdiv = Kdivmum::model();
			if (isset($_POST['Kdivmum'])) {
				foreach ($_POST['Kdivmum']['username'] as $item) {
					$ckdiv = $kdiv->findByPk($item);
					$ckdiv->status_user = 'Tidak Aktif';
					$ckdiv->save(false);
				}
				$this->redirect(array('kdiv'));
			}
			$this->render('hapuskdiv', array(
				'kdiv'=>$kdiv,
			));
		}
	}

	public function actionDivisi()
	{
		if (Yii::app()->user->getState('role') == 'admin') {
			$model = new Divisi('search');
			$model->unsetAttributes();  // clear any default values
			if(isset($_GET['Divisi'])){
				$model->attributes = $_GET['Divisi'];
			}
			$this->render('divisi', array(
				'model'=>$model,
			));
		}
	}

	public function actionTambahdivisi()
	{
		if (Yii::app()->user->getState('role') == 'admin') {
			$divisi = new Divisi;
			if (isset($_POST['Divisi'])) {
				$divisi->attributes = $_POST['Divisi'];
				$divisi->password = $divisi->username;
				$divisi->oldpass = $divisi->password;
				$divisi->newpass = $divisi->password;
				$divisi->confirmpass = $divisi->password;
				if ($divisi->save(false)) {
					$this->redirect(array('divisi'));
				}
			}
			$this->render('tambahdivisi', array(
				'divisi'=>$divisi,
			));
		}
	}

	public function actionHapusdivisi()
	{
		if (Yii::app()->user->getState('role') == 'admin') {
			$divisi = Divisi::model();
			if (isset($_POST['Divisi'])) {
				foreach ($_POST['Divisi']['username'] as $item) {
					$divisi->deleteByPk($item);
				}
				$this->redirect(array('divisi'));
			}
			$this->render('hapusdivisi', array(
				'divisi'=>$divisi,
			));
		}
	}

	public function actionAdmin()
	{
		if (Yii::app()->user->getState('role') == 'admin') {
			$query = Admin::model()->findAll();
			$admin = $query[0];
			if (isset($_POST['Admin'])) {
				$admin->attributes = $_POST['Admin'];
				if ($admin->validate()) {
					if ($admin->save(false)) {
						Yii::app()->user->name = $admin->username;
						Yii::app()->user->setFlash('sukses','Data Telah Disimpan');
					}
				}
			}
			$this->render('admin', array(
				'admin'=>$admin,
			));
		}
	}
}
