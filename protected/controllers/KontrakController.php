<?php
	class KontrakController extends Controller{
		
		public function actionDashboardkontrak(){
				// renders the view file 'protected/views/site/history.php'
				// using the default layout 'protected/views/layouts/main.php'
				if (Yii::app()->user->isGuest) {
					$this->redirect(array('site/login'));
				}
				else {
					if (Yii::app()->user->getState('role') == 'kdivmum' || UserKontrak::model()->exists('username = "' . Yii::app()->user->name . '"')) {
						$model=new Pengadaan('search');
						$model->unsetAttributes();  // clear any default values
						if(isset($_GET['Pengadaan'])){
							$model->attributes=$_GET['Pengadaan'];                                       
						}	
						
						$this->render('dashboardkontrak',array(
							'model'=>$model,
						));
						
					}
				}
		}
		
	}
?>