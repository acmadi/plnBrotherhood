<?php

class AdminController extends Controller
{
	public function actionKontrolanggaran()
	{
		if (Yii::app()->user->getState('role') == 'kdivmum') {
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
}
