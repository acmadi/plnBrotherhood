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
		
		public function actionSuratkontrak(){
			$id = Yii::app()->getRequest()->getQuery("id");
			if(Yii::app()->user->isGuest){
				$this->redirect(array('site/login'));				
			} else {
				if(Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "Surat Kontrak"') != null){
					$this->redirect(array('editsuratkontrak', 'id'=>$id));		
				}
						
				$newDokumenKontrak= new Dokumen;
				$criteria=new CDbcriteria;
				$criteria->select='max(id_dokumen) AS maxId';
				$row = $newDokumenKontrak->model()->find($criteria);
				$somevariable = $row['maxId'];
				$newDokumenKontrak->id_dokumen=$somevariable + 1;
				$newDokumenKontrak->nama_dokumen="Surat Kontrak";
				date_default_timezone_set("Asia/Jakarta");
				$newDokumenKontrak->tanggal=date('Y-m-d');
				$newDokumenKontrak->tempat="Jakarta";
				$newDokumenKontrak->id_pengadaan=$id;
				$newDokumenKontrak->status_upload="Belum Selesai";
				
				$suratkontrak = new DokumenKontrak;
				$suratkontrak->id_dokumen = $newDokumenKontrak->id_dokumen;
				$suratkontrak->username = Yii::app()->user->name;
				$suratkontrak->tanggal_mulai = date('d-m-Y');
				
				if(isset($_POST['DokumenKontrak'])){
				$suratkontrak->attributes=$_POST['DokumenKontrak'];
				$valid=$suratkontrak->validate();
				$valid=$valid&&$newDokumenKontrak->validate();
				if($valid){
					if($Pengadaan->save(false)){
						if($newDokumenKontrak->save(false)){
							if($suratkontrak->save(false)){
								$this->redirect(array('editsuratkontrak', 'id'=>$id, 'suratkontrak'=>$suratkontrak));											
							}
						}
					}
				}
				}
				$this->render('suratkontrak',array('id'=>$id, 'suratkontrak'=>$suratkontrak));				
			}
		}
		
		public function actionEditsuratkontrak(){
			$id = Yii::app()->getRequest()->getQuery("id");
			$DokumenKontrak = Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "Surat Kontrak"');
			$suratkontrak = DokumenKontrak::model()->findByPk($DokumenKontrak->id_dokumen);
			if(isset($_POST['DokumenKontrak'])){
				$suratkontrak->attributes=$_POST['DokumenKontrak'];
				$suratkontrak->tanggal_mulai = date('Y-m-d', strtotime($suratkontrak->tanggal_mulai));
				$suratkontrak->tanggal_selesai = date('Y-m-d', strtotime($suratkontrak->tanggal_selesai));
				$valid=$suratkontrak->validate();
				$valid=$valid&&$DokumenKontrak->validate();
				if($valid){
					if($DokumenKontrak->save(false)){
						if($suratkontrak->save(false)){
							$this->redirect(array('editsuratkontrak', 'id'=>$id));											
						}
					}					
				}
			}				
				$this->render('suratkontrak',array('id'=>$id, 'suratkontrak'=>$suratkontrak,'dokumenkontrak'=>$DokumenKontrak));	
		}
		
	}
?>