<?php

class KontrolController extends Controller
{
	public function actionKontrolanggaran()
	{
		if (Yii::app()->user->getState('role') == 'kdivmum') {
			$this->render('kontrolanggaran', array(
			));
		}
	}
}
