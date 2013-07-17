<?php

class AdminController extends Controller
{
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
			$panitia->tanggal_sk = Tanggal::getTanggalStrip($panitia->tanggal_sk);
			if (isset($_POST['Panitia']) && isset($_POST['username'])) {
				$success = true;
				$panitia->attributes = $_POST['Panitia'];
				$panitia->tanggal_sk = date('Y-m-d', strtotime($panitia->tanggal_sk));
				$n = count($_POST['username']);
				for ($i=0; $i < $n; $i++) {
					if (isset($_POST['id'])) {
						if ($_POST['status'][$i] == 'Tidak Aktif') {
							$current = Anggota::model()->findByAttributes(array('username'=>$_POST['username'][$i], 'id_panitia'=>$id, 'jabatan'=>$_POST['jabatan'][$i]));
							if ($current != null) {
								$current->status_user = 'Tidak Aktif';
								$current->save(false);
							}
							else {
								$ang = $this->getRecordByUsername($_POST['username'][0]);
								if (empty($ang)) {
									$success = false;
									$gagal = $_POST['username'][$i];
								}
								else {
									$new = new Anggota;
									$new->username = $_POST['username'][$i];
									$new->nama = $ang['nama'];
									$new->email = $ang['email'];
									$new->id_panitia = $id;
									$new->jabatan = $_POST['jabatan'][$i];
									$new->status_user = 'Tidak Aktif';
									$new->save(false);
								}
							}
						}
						else {
							if ($_POST['id'][$i] != -1) {
								$current = Anggota::model()->findByPk($_POST['id'][$i]);
								$current->status_user = 'Tidak Aktif';
								$current->save(false);
							}
							$old = Anggota::model()->findByAttributes(array('username'=>$_POST['username'][$i], 'id_panitia'=>$id));
							if ($old != null) {
								$old->jabatan = $_POST['jabatan'][$i];
								$old->status_user = 'Aktif';
								$old->save(false);
							}
							else {
								$ang = $this->getRecordByUsername($_POST['username'][$i]);
								if (empty($ang)) {
									$success = false;
									$gagal = $_POST['username'][$i];
								}
								else {
									$new = new Anggota;
									$new->username = $_POST['username'][$i];
									$new->nama = $ang['nama'];
									$new->email = $ang['email'];
									$new->id_panitia = $id;
									$new->jabatan = $_POST['jabatan'][$i];
									$new->status_user = 'Aktif';
									$new->save(false);
								}
							}
						}
					}
					else {
						$ang = $this->getRecordByUsername($_POST['username'][$i]);
						if (empty($ang)) {
							$success = false;
							$gagal = $_POST['username'][$i];
						}
						else {
							$new = new Anggota;
							$new->username = $_POST['username'][$i];
							$new->nama = $ang['nama'];
							$new->email = $ang['email'];
							$new->id_panitia = $id;
							$new->jabatan = $_POST['jabatan'][$i];
							$new->status_user = 'Aktif';
							$new->save(false);
						}
					}
				}
				if ($success) {
					if ($panitia->save(false)) {
						Yii::app()->user->setFlash('sukses','Data Telah Disimpan');
					}
				}
				else {
					Yii::app()->user->setFlash('gagal','Nama pengguna "' . $gagal . '" tidak terdaftar dalam basis data pegawai.');
				}
			}
			$anggota = Anggota::model()->findAll('id_panitia = ' . $id . ' and status_user = "Aktif"');
			$this->render('detailpanitia', array(
				'id'=>$id,
				'panitia'=>$panitia,
				'anggota'=>$anggota,
			));
		}
	}

	public function actionTambahpanitia()
	{
		if (Yii::app()->user->getState('role') == 'admin') {
			$panitia = new Panitia;
			if (isset($_POST['Panitia'])) {
				$panitia->attributes = $_POST['Panitia'];
				$panitia->tanggal_sk = date('Y-m-d', strtotime($panitia->tanggal_sk));
				$panitia->status_panitia = 'Aktif';
				$panitia->jenis_panitia = 'Panitia';
				if ($panitia->save(false)) {
					$this->redirect(array('panitia'));
				}
			}
			$this->render('tambahpanitia', array(
				'panitia'=>$panitia,
			));
		}
	}

	public function actionTambahpejabat()
	{
		if (Yii::app()->user->getState('role') == 'admin') {
			$pejabat = new Anggota;
			if (isset($_POST['Anggota'])) {
				$pejabat->attributes = $_POST['Anggota'];
				$person = $this->getRecordByUsername($pejabat->username);
				if (empty($person)) {
					Yii::app()->user->setFlash('gagal','Nama pengguna "' . $pejabat->username . '" tidak terdaftar dalam basis data pegawai.');
				}
				else {
					$pejabat->nama = $person['nama'];
					$pejabat->email = $person['email'];
					$old = Anggota::model()->findByAttributes(array('username'=>$pejabat->username, 'jabatan'=>'Pejabat'));
					if ($old != null) {
						$old->nama = $pejabat->nama;
						$old->email = $pejabat->email;
						$old->status_user = 'Aktif';
						$old->save(false);
						$pan = Panitia::model()->findByPk($old->id_panitia);
						$pan->nama_panitia = $pejabat->nama;
						$pan->status_panitia = 'Aktif';
						$pan->save(false);
						$this->redirect(array('panitia'));
					}
					else {
						$panitia = new Panitia;
						$panitia->nama_panitia = $pejabat->nama;
						$panitia->SK_panitia = '-';
						$panitia->tanggal_sk = '0000-00-00';
						$panitia->status_panitia = 'Aktif';
						$panitia->jenis_panitia = 'Pejabat';
						if ($panitia->save(false)) {
							$pejabat->id_panitia = $panitia->id_panitia;
							$pejabat->jabatan = 'Pejabat';
							$pejabat->status_user = 'Aktif';
							if ($pejabat->save(false)) {
								$this->redirect(array('panitia'));
							}
						}
					}
				}
			}
			$this->render('tambahpejabat', array(
				'pejabat'=>$pejabat,
			));
		}
	}

	public function actionHapuspanitia()
	{
		if (Yii::app()->user->getState('role') == 'admin') {
			$panitia = Panitia::model();
			if (isset($_POST['Panitia'])) {
				foreach ($_POST['Panitia']['id_panitia'] as $item) {
					$cpanitia = $panitia->findByPk($item);
					$cpanitia->status_panitia = 'Tidak Aktif';
					$cpanitia->save(false);
					$anggotas = Anggota::model()->findAllByAttributes(array('id_panitia'=>$item));
					foreach ($anggotas as $anggota) {
						$anggota->status_user = 'Tidak Aktif';
						$anggota->save(false);
					}
				}
				$this->redirect(array('panitia'));
			}
			$this->render('hapuspanitia', array(
				'panitia'=>$panitia,
			));
		}
	}

	public function actionHapuspejabat()
	{
		if (Yii::app()->user->getState('role') == 'admin') {
			$pejabat = Panitia::model();
			if (isset($_POST['Panitia'])) {
				foreach ($_POST['Panitia']['id_panitia'] as $item) {
					$cpejabat = $pejabat->findByPk($item);
					$cpejabat->status_panitia = 'Tidak Aktif';
					$cpejabat->save(false);
					$person = Anggota::model()->findByAttributes(array('id_panitia'=>$item));
					$person->status_user = 'Tidak Aktif';
					$person->save(false);
				}
				$this->redirect(array('panitia'));
			}
			$this->render('hapuspejabat', array(
				'pejabat'=>$pejabat,
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

	public function actionTambahkdiv()
	{
		if (Yii::app()->user->getState('role') == 'admin') {
			$kdiv = new Kdivmum;
			if (isset($_POST['Kdivmum'])) {
				$kdiv->attributes = $_POST['Kdivmum'];
				$person = $this->getRecordByUsername($kdiv->username);
				if (empty($person)) {
					Yii::app()->user->setFlash('gagal','Nama pengguna "' . $kdiv->username . '" tidak terdaftar dalam basis data pegawai.');
				}
				else{
					$old = Kdivmum::model()->findByAttributes(array('username'=>$kdiv->username, 'jabatan'=>$kdiv->jabatan));
					if ($old != null) {
						$old->status_user = 'Aktif';
						$old->save(false);
					}
					else {
						$kdiv->nama = $person['nama'];
						$kdiv->email = $person['email'];
						$kdiv->status_user = 'Aktif';
						$kdiv->save(false);
					}
					$this->redirect(array('kdiv'));
				}
			}
			$this->render('tambahkdiv', array(
				'kdiv'=>$kdiv,
			));
		}
	}

	public function actionHapuskdiv()
	{
		if (Yii::app()->user->getState('role') == 'admin') {
			$kdiv = Kdivmum::model();
			if (isset($_POST['Kdivmum'])) {
				foreach ($_POST['Kdivmum']['username'] as $item) {
					$ckdiv = $kdiv->findByPk($item);
					$ckdiv->status_user = 'Tidak Aktif';
					$ckdiv->save(false);
				}
				$this->redirect(array('kdiv'));
			}
			$this->render('hapuskdiv', array(
				'kdiv'=>$kdiv,
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

	public function actionDetaildivisi()
	{
		if (Yii::app()->user->getState('role') == 'admin') {
			$id = Yii::app()->getRequest()->getQuery('id');
			$divisi = Divisi::model()->findByPk($id);
			$model = new UserDivisi('search');
			$model->unsetAttributes();  // clear any default values
			if(isset($_GET['UserDivisi'])){
				$model->attributes = $_GET['UserDivisi'];
			}
			$this->render('detaildivisi', array(
				'id'=>$id,
				'divisi'=>$divisi,
				'model'=>$model,
			));
		}
	}

	public function actionTambahdivisi()
	{
		if (Yii::app()->user->getState('role') == 'admin') {
			$divisi = new Divisi;
			if (isset($_POST['Divisi'])) {
				$divisi->attributes = $_POST['Divisi'];
				if ($divisi->save(false)) {
					$this->redirect(array('divisi'));
				}
			}
			$this->render('tambahdivisi', array(
				'divisi'=>$divisi,
			));
		}
	}

	public function actionHapusdivisi()
	{
		if (Yii::app()->user->getState('role') == 'admin') {
			$divisi = Divisi::model();
			if (isset($_POST['Divisi'])) {
				foreach ($_POST['Divisi']['username'] as $item) {
					$divisi->deleteByPk($item);
				}
				$this->redirect(array('divisi'));
			}
			$this->render('hapusdivisi', array(
				'divisi'=>$divisi,
			));
		}
	}

	public function actionTambahuserdivisi()
	{
		if (Yii::app()->user->getState('role') == 'admin') {
			$id = Yii::app()->getRequest()->getQuery('id');
			$divisi = Divisi::model()->findByPk($id);
			$user = new UserDivisi;
			if (isset($_POST['UserDivisi'])) {
				$user->attributes = $_POST['UserDivisi'];
				$person = $this->getRecordByUsername($user->username);
				if (empty($person)) {
					Yii::app()->user->setFlash('gagal','Nama pengguna "' . $user->username . '" tidak terdaftar dalam basis data pegawai.');
				}
				else {
					$user->divisi = $id;
					if ($user->save(false)) {
						$this->redirect(array('detaildivisi', 'id'=>$id));
					}
				}
			}
			$this->render('tambahuserdivisi', array(
				'id'=>$id,
				'divisi'=>$divisi,
				'user'=>$user,
			));
		}
	}

	public function actionHapususerdivisi()
	{
		if (Yii::app()->user->getState('role') == 'admin') {
			$id = Yii::app()->getRequest()->getQuery('id');
			$divisi = Divisi::model()->findByPk($id);
			$user = UserDivisi::model();
			if (isset($_POST['UserDivisi'])) {
				foreach ($_POST['UserDivisi']['username'] as $item) {
					$user->deleteByPk($item);
				}
				$this->redirect(array('detaildivisi', 'id'=>$id));
			}
			$this->render('hapususerdivisi', array(
				'id'=>$id,
				'divisi'=>$divisi,
				'user'=>$user,
			));
		}
	}

	public function actionAkun()
	{
		if (Yii::app()->user->getState('role') == 'admin') {
			$admin = Admin::model()->findByPk(Yii::app()->user->name);
			if (isset($_POST['Admin'])) {
				$admin->attributes = $_POST['Admin'];
				if ($admin->validate()) {
					if ($admin->save(false)) {
						Yii::app()->user->name = $admin->username;
						Yii::app()->user->setFlash('sukses','Data Telah Disimpan');
					}
				}
			}
			$this->render('akun', array(
				'admin'=>$admin,
			));
		}
	}
	
	private function getRecordByUsername($username) {
		$ldap = Yii::app()->params['ldap'];
		$conn = ldap_connect($ldap['host']);
		if ($conn) {
			ldap_set_option($conn, LDAP_OPT_PROTOCOL_VERSION, 3);
			ldap_set_option($conn, LDAP_OPT_REFERRALS, 0);
			if (ldap_bind($conn, $ldap['bind_rdn'], $ldap['bind_pwd'])) {
				$result = ldap_search($conn, $ldap['base_dn'], '(samaccountname=' . $username . '*)');
				$data = ldap_get_entries($conn, $result);
				if ($data != null) {
					if ($username == $data[0]['samaccountname'][0]) {
						return array('nama'=>$data[0]['displayname'][0], 'email'=>$data[0]['mail'][0]);
					}
				}
				ldap_close($conn);
			}
		}
		return array();
	}
}
