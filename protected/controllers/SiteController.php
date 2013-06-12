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
		return array(
			'coco'=>array(
				'class'=>'CocoAction',
			),
		);
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
			$model=new Pengadaan('search');
			$model->unsetAttributes();  // clear any default values
			if(isset($_GET['Pengadaan'])){
				$model->attributes=$_GET['Pengadaan'];
			}		
				
			$this->render('dashboard',array(
				'model'=>$model,
			));
		}
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionHistory()
	{
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {		
			$model=new Pengadaan('search');
			$model->unsetAttributes();  // clear any default values
			if(isset($_GET['Pengadaan'])){
				$model->attributes=$_GET['Pengadaan'];
			}		
			
		$this->render('history',array(
				'model'=>$model,
			));
		}
	}
        
        public function actionDokumenhistory(){
		
			if (Yii::app()->user->isGuest) {
				$this->redirect(array('site/login'));
			}
			else {		
				$model=new Pengadaan('search');
				$model->unsetAttributes();  // clear any default values
				if(isset($_GET['Pengadaan'])){
					$model->attributes=$_GET['Pengadaan'];
				}		
					
				$this->render('dokumenhistory',array(
					'model'=>$model,
				));
			}
         
        }
        
        public function actionDokumengenerator(){
			if (Yii::app()->user->isGuest) {
				$this->redirect(array('site/login'));
			}
			else {
				$model=new Dokumen('search');
				$model->unsetAttributes();  // clear any default values
				if(isset($_GET['Dokumen'])){
					$model->attributes=$_GET['Dokumen'];
				}
	            $this->render('dokumengenerator', array(
	            	'model'=>$model,
	            ));		
	        }
        }

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionDetailpengadaan()
	{
		// renders the view file 'protected/views/site/history.php'
		// using the default layout 'protected/views/layouts/main.php'
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Kdivmum::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				$this->render('detailpengadaan');
			}
		}
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionGenerator()
	{	
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				$this->render('generator');
			}
		}
	}
	
	public function actionGenerator_2()
	{	
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Kdivmum::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				$this->render('generator_2');
			}
		}
	}
	
	public function actionCheckpoint2()
	{	
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				$this->render('checkpoint2');
			}
		}
	}
	
	public function actiontordanrab()
	{	
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Kdivmum::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				$this->render('tordanrab');
			}
		}
	}
	
	public function actionnotadinasperintahpengadaan()
	{	
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Kdivmum::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				$this->render('notadinasperintahpengadaan');
			}
		}
	}
	
	public function actionpaktaintegritaspanitia()
	{	
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Kdivmum::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				$this->render('paktaintegritaspanitia');
			}
		}
	}
	
	public function actionCheckpoint5_2()
	{	
		if (Yii::app()->user->name == 'kadiv' || Yii::app()->user->name == 'jo') {
			$this->render('checkpoint5_2');
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
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}
		else {
			if (Anggota::model()->exists('username = "' . Yii::app()->user->name . '"')) {
				$this->render('checkpoint4');
			}
		}
		/*if (Yii::app()->user->name == 'panitia'|| Yii::app()->user->name == 'jo') {
			$this->render('checkpoint4');
		}*/
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
	
	public function actiontambahpengadaan()
	{	
		$this->render('tambahpengadaan');
	}
	
	public function actiontambahpengadaanpejabat()
	{	
		if (Kdivmum::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
			$model=new Pengadaan;
			$model->status="Penunjukan Panitia";

			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);

			if(isset($_POST['Pengadaan']))
			{
				$model->attributes=$_POST['Pengadaan'];
				if($model->save())
					$this->redirect(array('generator_2','id'=>$model->id_pengadaan));
			}

			$this->render('tambahpengadaanpejabat',array(
				'model'=>$model,
			));
		}
	}
	
	public function actiontambahpengadaanpanitia()
	{	
		if (Kdivmum::model()->exists('username = "' . Yii::app()->user->name . '"')) {
			
			$model=new Pengadaan;
			$model->status="Penunjukan Panitia";

			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);

			if(isset($_POST['Pengadaan']))
			{
				$model->attributes=$_POST['Pengadaan'];
				if($model->save())
					$this->redirect(array('generator_2','id'=>$model->id_pengadaan));
			}

			$this->render('tambahpengadaanpanitia',array(
				'model'=>$model,
			));
		}
	}
	
	public function actionUploader()
	{
		$this->render('uploader');
	}
}