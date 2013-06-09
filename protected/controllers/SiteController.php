<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		// return array(
		// 	// captcha action renders the CAPTCHA image displayed on the contact page
		// 	'captcha'=>array(
		// 		'class'=>'CCaptchaAction',
		// 		'backColor'=>0xFFFFFF,
		// 	),
		// 	// page action renders "static" pages stored under 'protected/views/site/pages'
		// 	// They can be accessed via: index.php?r=site/page&view=FileName
		// 	'page'=>array(
		// 		'class'=>'CViewAction',
		// 	),
		// );
	}

	public $defaultAction = 'dashboard';

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionDashboard()
	{
		// renders the view file 'protected/views/site/dashboard.php'
		// using the default layout 'protected/views/layouts/main.php'
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			$this->render('dashboard');
		}
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionUploadexcel()
	{
		// renders the view file 'protected/views/site/dashboard.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('uploadexcel');
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionHistory()
	{
		// renders the view file 'protected/views/site/history.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('history');
	}
        
        public function actionDokumenhistory(){
            $this->render('dokumenhistory');
        }
        
        public function actionDokumengenerator(){
            $this->render('dokumengenerator');
        }

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionDetailpengadaan()
	{
		// renders the view file 'protected/views/site/history.php'
		// using the default layout 'protected/views/layouts/main.php'
		if (Yii::app()->user->name == 'kadiv' || Yii::app()->user->name == 'jo') {
			$this->render('detailpengadaan');
		}
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionGenerator()
	{	
		if (Yii::app()->user->name == 'panitia' || Yii::app()->user->name == 'jo') {
			$this->render('generator');
		}
	}
	
	public function actionCheckpoint2()
	{	
		if (Yii::app()->user->name == 'panitia' || Yii::app()->user->name == 'jo') {
			$this->render('checkpoint2');
		}
	}
	
	public function actionCheckpoint3()
	{	
		if (Yii::app()->user->name == 'panitia'|| Yii::app()->user->name == 'jo') {
			$this->render('checkpoint3');
		}
	}
	
	public function actionCheckpoint4()
	{	
		if (Yii::app()->user->name == 'panitia'|| Yii::app()->user->name == 'jo') {
			$this->render('checkpoint4');
		}
	}
	
	public function actionCheckpoint5()
	{	
		if (Yii::app()->user->name == 'panitia'|| Yii::app()->user->name == 'jo') {
			$this->render('checkpoint5');
		}
	}
	
	public function actionCheckpoint6()
	{	
		if (Yii::app()->user->name == 'panitia'|| Yii::app()->user->name == 'jo') {
			$this->render('checkpoint6');
		}
	}
	
	public function actionCheckpoint7()
	{	
		if (Yii::app()->user->name == 'panitia'|| Yii::app()->user->name == 'jo') {
			$this->render('checkpoint7');
		}
	}
	
	public function actionCheckpoint8()
	{	
		if (Yii::app()->user->name == 'panitia'|| Yii::app()->user->name == 'jo') {
			$this->render('checkpoint8');
		}
	}
	
	public function actionDetilpengadaanhistory()
	{
		$this->render('detilpengadaanhistory');
	}
	

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	// public function actionContact()
	// {
	// 	$model=new ContactForm;
	// 	if(isset($_POST['ContactForm']))
	// 	{
	// 		$model->attributes=$_POST['ContactForm'];
	// 		if($model->validate())
	// 		{
	// 			$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
	// 			$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
	// 			$headers="From: $name <{$model->email}>\r\n".
	// 				"Reply-To: {$model->email}\r\n".
	// 				"MIME-Version: 1.0\r\n".
	// 				"Content-type: text/plain; charset=UTF-8";

	// 			mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
	// 			Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
	// 			$this->refresh();
	// 		}
	// 	}
	// 	$this->render('contact',array('model'=>$model));
	// }

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}