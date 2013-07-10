<?php

class AdminController extends Controller
{
	public function actionPengguna()
	{
		$anggota = Anggota::model()->findAll();
		$dataProvider = new CSqlDataProvider($anggota);
		$this->render('pengguna', array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionPanitia()
	{
		$this->render('panitia');
	}

	public function actionKdiv()
	{
		$this->render('kdiv');
	}
}
