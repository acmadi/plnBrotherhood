<?php

class AdminController extends Controller
{
	public function actionPengguna()
	{
		$model = new Anggota('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Anggota'])){
			$model->attributes = $_GET['Anggota'];
		}
		$this->render('pengguna', array(
			'model'=>$model,
		));
	}

	public function actionPanitia()
	{
		$model = new Panitia('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Panitia'])){
			$model->attributes = $_GET['Panitia'];
		}
		$this->render('panitia', array(
			'model'=>$model,
		));
	}

	public function actionKdiv()
	{
		$model = new Kdivmum('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Kdivmum'])){
			$model->attributes = $_GET['Kdivmum'];
		}
		$this->render('kdiv', array(
			'model'=>$model,
		));
	}

	public function actionDivisi()
	{
		$model = new Divisi('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Divisi'])){
			$model->attributes = $_GET['Divisi'];
		}
		$this->render('divisi', array(
			'model'=>$model,
		));
	}

	public function actionAdmin()
	{
		$admin = Admin::model()->findAll()[0];
		$this->render('admin', array(
			'admin'=>$admin,
		));
	}
}
