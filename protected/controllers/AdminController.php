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
			$anggota = Anggota::model()->findAll('id_panitia = ' . $id);
			$panitia->tanggal_sk = Tanggal::getTanggalStrip($panitia->tanggal_sk);
			if (isset($_POST['Panitia'])) {
				$panitia->attributes = $_POST['Panitia'];
				$panitia->tanggal_sk = date('Y-m-d', strtotime($panitia->tanggal_sk));
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

	public function actionAdmin()
	{
		if (Yii::app()->user->getState('role') == 'admin') {
			$query = Admin::model()->findAll();
			$admin = $query[0];
			if (isset($_POST['Admin'])) {
				$admin->attributes = $_POST['Admin'];
				if ($admin->validate()) {
					if ($admin->save(false)) {
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
