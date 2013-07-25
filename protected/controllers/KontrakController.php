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
				$Pengadaan=Pengadaan::model()->findByPk($id);
				$Pengadaan->status='38';
				
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
				$suratkontrak->tanggal_selesai = date('d-m-Y');
				$suratkontrak->jenis_kontrak = "Barang dan Jasa";
				
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
		
		public function actionNotadinaspengawasan(){
			$id = Yii::app()->getRequest()->getQuery("id");
			if(Yii::app()->user->isGuest){
				$this->redirect(array('site/login'));				
			} else {
				if(Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "Nota Dinas Pengawasan"') != null){
					$this->redirect(array('editnotadinaspengawasan', 'id'=>$id));		
				}
				$Pengadaan=Pengadaan::model()->findByPk($id);
				$Pengadaan->status='39';
				
				$newDokumen= new Dokumen;
				$criteria=new CDbcriteria;
				$criteria->select='max(id_dokumen) AS maxId';
				$row = $newDokumen->model()->find($criteria);
				$somevariable = $row['maxId'];
				$newDokumen->id_dokumen=$somevariable + 1;
				$newDokumen->nama_dokumen="Nota Dinas Pengawasan";
				date_default_timezone_set("Asia/Jakarta");
				$newDokumen->tanggal=date('Y-m-d');
				$newDokumen->tempat="Jakarta";
				$newDokumen->id_pengadaan=$id;
				$newDokumen->status_upload="Belum Selesai";
				
				$notadinaspengawasan = new NotaDinasPengawasan;
				$notadinaspengawasan->id_dokumen = $newDokumen->id_dokumen;
				
				if(isset($_POST['NotaDinasPengawasan'])){
				$notadinaspengawasan->attributes=$_POST['NotaDinasPengawasan'];
				$valid=$notadinaspengawasan->validate();
				$valid=$valid&&$newDokumen->validate();
				if($valid){
					if($Pengadaan->save(false)){
						if($newDokumen->save(false)){
							if($notadinaspengawasan->save(false)){
								$this->redirect(array('editnotadinaspengawasan', 'id'=>$id));											
							}
						}
					}
				}
				}
				$this->render('notadinaspengawasan',array('id'=>$id, 'notadinaspengawasan'=>$notadinaspengawasan));				
			}
		}
		
		public function actionEditnotadinaspengawasan(){
			$id = Yii::app()->getRequest()->getQuery("id");
			$Dokumen = Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "Nota Dinas Pengawasan"');
			$notadinaspengawasan = NotaDinasPengawasan::model()->findByPk($Dokumen->id_dokumen);
			if(isset($_POST['NotaDinasPengawasan'])){
				$notadinaspengawasan->attributes=$_POST['NotaDinasPengawasan'];
				$valid=$notadinaspengawasan->validate();
				$valid=$valid&&$Dokumen->validate();
				if($valid){
					if($Dokumen->save(false)){
						if($notadinaspengawasan->save(false)){
							$this->redirect(array('editnotadinaspengawasan', 'id'=>$id));											
						}
					}					
				}
			}				
				$this->render('notadinaspengawasan',array('id'=>$id, 'notadinaspengawasan'=>$notadinaspengawasan));	
		}
		
	public function actionDetailkontrak() {
			if (Yii::app()->user->isGuest) {
				$this->redirect(array('site/login'));
			}
			else {
				$id = Yii::app()->getRequest()->getQuery("id");
				$DokumenKontrak = Dokumen::model()->find('id_pengadaan = '.$id. ' and nama_dokumen = "Surat Kontrak"');
				$suratkontrak = DokumenKontrak::model()->findByPk($DokumenKontrak->id_dokumen);
				echo $DokumenKontrak->id_dokumen;
				$model=new DokumenKontrak('search');
				$model->unsetAttributes();  
				if(isset($_GET['DokumenKontrak'])){
				$model->attributes=$_GET['DokumenKontrak'];
			}
				if(isset($_POST['suratkontrak'])){
					if($suratkontrak->save(false)){
						$this->redirect(array('detailkontrak','id'=>$id));
					}
				}
				$this->render('detailkontrak', array(
					'suratkontrak'=>$suratkontrak,
				));
			}
		
		}
	}
?>
