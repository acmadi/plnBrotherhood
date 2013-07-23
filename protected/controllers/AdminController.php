<?php

class AdminController extends Controller
{
	public function actionDashboard()
	{
		if (Yii::app()->user->getState('isAdmin')) {
			$this->render('dashboard');
		}
	}

	public function actionSwitch()
	{
		$id = Yii::app()->getRequest()->getQuery('id');
		if ($id == '1') {
			Yii::app()->user->setState('asAdmin', true);
		}
		else if ($id == '0') {
			Yii::app()->user->setState('asAdmin', false);
		}
		$this->redirect(array('dashboard'));
	}

	public function actionPejabat()
	{
		if (Yii::app()->user->getState('asAdmin')) {
			$model = new Panitia('search');
			$model->unsetAttributes();  // clear any default values
			if(isset($_GET['Panitia'])){
				$model->attributes = $_GET['Panitia'];
			}
			$this->render('pejabat', array(
				'model'=>$model,
			));
		}
	}

	public function actionDetailpejabat()
	{
		if (Yii::app()->user->getState('asAdmin')) {
			$id = Yii::app()->getRequest()->getQuery('id');
			$pejabat = Anggota::model()->findByAttributes(array('id_panitia'=>$id));
			if (isset($_POST['Anggota'])) {
				$pejabat->attributes = $_POST['Anggota'];
				$ang = $this->getRecordByUsername($pejabat->username);
				if (empty($ang)) {
					Yii::app()->user->setFlash('gagal','Nama pengguna "' . $person->username . '" tidak terdaftar dalam basis data pegawai.');
				}
				else {
					$old = Anggota::model()->findByAttributes(array('username'=>$pejabat->username, 'jabatan'=>'Pejabat'));
					if ($old != null) {
						$old->nama = $pejabat->nama;
						$old->email = $pejabat->email;
						$old->status_user = 'Aktif';
						if ($old->save(false)) {
							$pan = Panitia::model()->findByPk($old->id_panitia);
							$pan->nama_panitia = $pejabat->nama;
							$pan->status_panitia = 'Aktif';
							if ($pan->save(false)) {
								Yii::app()->user->setFlash('sukses','Data Telah Disimpan');
							}
						}
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
								Yii::app()->user->setFlash('sukses','Data Telah Disimpan');
							}
						}
					}
				}
			}
			$this->render('detailpejabat', array(
				'pejabat'=>$pejabat,
			));
		}
	}

	public function actionTambahpejabat()
	{
		if (Yii::app()->user->getState('asAdmin')) {
			$pejabat = new Anggota;
			if (isset($_POST['Anggota'])) {
				$pejabat->attributes = $_POST['Anggota'];
				$person = $this->getRecordByUsername($pejabat->username);
				if (empty($person)) {
					Yii::app()->user->setFlash('gagal','Nama pengguna "' . $pejabat->username . '" tidak terdaftar dalam basis data pegawai.');
				}
				else {
					$old = Anggota::model()->findByAttributes(array('username'=>$pejabat->username, 'jabatan'=>'Pejabat'));
					if ($old != null) {
						$old->nama = $pejabat->nama;
						$old->email = $pejabat->email;
						$old->status_user = 'Aktif';
						if ($old->save(false)) {
							$pan = Panitia::model()->findByPk($old->id_panitia);
							$pan->nama_panitia = $pejabat->nama;
							$pan->status_panitia = 'Aktif';
							if ($pan->save(false)) {
								$this->redirect(array('pejabat'));
							}
						}
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
								$this->redirect(array('pejabat'));
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

	public function actionHapuspejabat()
	{
		if (Yii::app()->user->getState('asAdmin')) {
			$id = Yii::app()->getRequest()->getQuery('id');
			$pejabat = Panitia::model()->findByPk($id);
			$pejabat->status_panitia = 'Tidak Aktif';
			$pejabat->save(false);
			$person = Anggota::model()->findByAttributes(array('id_panitia'=>$id));
			$person->status_user = 'Tidak Aktif';
			$person->save(false);
		}
	}

	public function actionPanitia()
	{
		if (Yii::app()->user->getState('asAdmin')) {
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
		if (Yii::app()->user->getState('asAdmin')) {
			$id = Yii::app()->getRequest()->getQuery('id');
			$panitia = Panitia::model()->findByPk($id);
			$model = new Anggota('search');
			$model->unsetAttributes();  // clear any default values
			if(isset($_GET['Anggota'])){
				$model->attributes = $_GET['Anggota'];
			}
			$this->render('detailpanitia', array(
				'panitia'=>$panitia,
				'model'=>$model,
			));
		}
	}

	public function actionTambahpanitia()
	{
		if (Yii::app()->user->getState('asAdmin')) {
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

	public function actionHapuspanitia()
	{
		if (Yii::app()->user->getState('asAdmin')) {
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

	public function actionTambahanggotapanitia()
	{
		if (Yii::app()->user->getState('asAdmin')) {
			$id = Yii::app()->getRequest()->getQuery('id');
			$panitia = Panitia::model()->findByPk($id);
			$anggota = new Anggota;
			if (isset($_POST['Anggota'])) {
				$anggota->attributes = $_POST['Anggota'];
				$person = $this->getRecordByUsername($anggota->username);
				if (empty($person)) {
					Yii::app()->user->setFlash('gagal','Nama pengguna "' . $anggota->username . '" tidak terdaftar dalam basis data pegawai.');
				}
				else {
					$old = Anggota::model()->findByAttributes(array('username'=>$anggota->username, 'id_panitia'=>$anggota->id_panitia));
					if ($old != null) {
						$old->nama = $anggota->nama;
						$old->email = $anggota->email;
						$old->jabatan = $anggota->jabatan;
						$old->status_user = 'Aktif';
						if ($old->save(false)) {
							$this->redirect(array('detailpanitia', 'id'=>$id));
						}
					}
					$anggota->id_panitia = $id;
					$anggota->status_user = 'Aktif';
					if ($anggota->save(false)) {
						$this->redirect(array('detailpanitia', 'id'=>$id));
					}
				}
			}
			$this->render('tambahanggotapanitia', array(
				'anggota'=>$anggota,
				'panitia'=>$panitia,
			));
		}
	}

	public function actionKdiv()
	{
		if (Yii::app()->user->getState('asAdmin')) {
			$modelJabatan = new Jabatan('search');
			$modelJabatan->unsetAttributes();  // clear any default values
			if(isset($_GET['Jabatan'])){
				$modelJabatan->attributes = $_GET['Jabatan'];
			}
			$modelKdiv = new Kdivmum('search');
			$modelKdiv->unsetAttributes();  // clear any default values
			if(isset($_GET['Kdivmum'])){
				$modelKdiv->attributes = $_GET['Kdivmum'];
			}
			$this->render('kdiv', array(
				'modelJabatan'=>$modelJabatan,
				'modelKdiv'=>$modelKdiv,
			));
		}
	}

	public function actionDetailkdiv()
	{
		if (Yii::app()->user->getState('asAdmin')) {
			$id = Yii::app()->getRequest()->getQuery('id');
			$kdiv = Kdivmum::model()->findByPk($id);
			if (isset($_POST['Kdivmum'])) {
				$kdiv->attributes = $_POST['Kdivmum'];
				$person = $this->getRecordByUsername($kdiv->username);
				if (empty($person)) {
					Yii::app()->user->setFlash('gagal','Nama pengguna "' . $kdiv->username . '" tidak terdaftar dalam basis data pegawai.');
				}
				else {
					$old = Kdivmum::model()->findByPk($kdiv->username);
					if ($old != null) {
						$old->status_user = 'Aktif';
						$old->nama = $kdiv->nama;
						$old->email = $kdiv->email;
						$old->id_jabatan = $kdiv->id_jabatan;
						$old->save(false);
					}
					else {
						$kdiv->status_user = 'Aktif';
						$kdiv->save(false);
					}
					$this->redirect(array('kdiv'));
				}
			}
			$this->render('detailkdiv', array(
				'kdiv'=>$kdiv,
			));
		}
	}

	public function actionTambahkdiv()
	{
		if (Yii::app()->user->getState('asAdmin')) {
			$kdiv = new Kdivmum;
			if (isset($_POST['Kdivmum'])) {
				$kdiv->attributes = $_POST['Kdivmum'];
				$person = $this->getRecordByUsername($kdiv->username);
				if (empty($person)) {
					Yii::app()->user->setFlash('gagal','Nama pengguna "' . $kdiv->username . '" tidak terdaftar dalam basis data pegawai.');
				}
				else{
					$old = Kdivmum::model()->findByPk($kdiv->username);
					if ($old != null) {
						$old->nama = $kdiv->nama;
						$old->email = $kdiv->email;
						$old->id_jabatan = $kdiv->id_jabatan;
						$old->status_user = 'Aktif';
						$old->save(false);
					}
					else {
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
		if (Yii::app()->user->getState('asAdmin')) {
			$id = Yii::app()->getRequest()->getQuery('id');
			$kdiv = Kdivmum::model()->findByPk($id);
			$kdiv->status_user = 'Tidak Aktif';
			$kdiv->save(false);
		}
	}

	public function actionDetailjabatan()
	{
		if (Yii::app()->user->getState('asAdmin')) {
			$id = Yii::app()->getRequest()->getQuery('id');
			$jabatan = Jabatan::model()->findByPk($id);
			if (isset($_POST['Jabatan'])) {
				$jabatan->attributes = $_POST['Jabatan'];
				$jabatan->save(false);
			}
			$this->render('detailjabatan', array(
				'jabatan'=>$jabatan,
			));
		}
	}

	public function actionTambahjabatan()
	{
		if (Yii::app()->user->getState('asAdmin')) {
			$jabatan = new Jabatan;
			if (isset($_POST['Jabatan'])) {
				$jabatan->attributes = $_POST['Jabatan'];
				$old = Jabatan::model()->findByPk($jabatan->id_jabatan);
				if ($old != null) {
					$old->status = 'Aktif';
					$old->save(false);
				}
				else {
					$jabatan->status = 'Aktif';
					if ($jabatan->validate()) {
						$jabatan->save(false);
					}
				}
				$this->redirect(array('kdiv'));
			}
			$this->render('tambahjabatan', array(
				'jabatan'=>$jabatan,
			));
		}
	}

	public function actionHapusjabatan()
	{
		if (Yii::app()->user->getState('asAdmin')) {
			$id = Yii::app()->getRequest()->getQuery('id');
			$kdivs = Kdivmum::model()->findAllByAttributes(array('id_jabatan'=>$id));
			foreach ($kdivs as $kdiv) {
				$kdiv->status_user = 'Tidak Aktif';
				$kdiv->save(false);
			}
			$jabatan = Jabatan::model()->findByPk($id);
			$jabatan->status = 'Tidak Aktif';
			$jabatan->save(false);
		}
	}

	public function actionDivisi()
	{
		if (Yii::app()->user->getState('asAdmin')) {
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
		if (Yii::app()->user->getState('asAdmin')) {
			$id = Yii::app()->getRequest()->getQuery('id');
			$divisi = Divisi::model()->findByPk($id);
			$model = new UserDivisi('search');
			$model->unsetAttributes();  // clear any default values
			if(isset($_GET['UserDivisi'])){
				$model->attributes = $_GET['UserDivisi'];
			}
			if (isset($_POST['Divisi'])) {
				$divisi->attributes = $_POST['Divisi'];
				if ($divisi->save(false)) {
					Yii::app()->user->setFlash('sukses','Data Telah Disimpan');
				}
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
		if (Yii::app()->user->getState('asAdmin')) {
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
		if (Yii::app()->user->getState('asAdmin')) {
			$id = Yii::app()->getRequest()->getQuery('id');
			UserDivisi::model()->deleteAllByAttributes(array('divisi'=>$id));
			Divisi::model()->deleteByPk($id);
		}
	}

	public function actionTambahanggotadivisi()
	{
		if (Yii::app()->user->getState('asAdmin')) {
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
			$this->render('tambahanggotadivisi', array(
				'divisi'=>$divisi,
				'user'=>$user,
			));
		}
	}

	public function actionHapusanggotadivisi()
	{
		if (Yii::app()->user->getState('asAdmin')) {
			$user = UserDivisi::model();
			$id = Yii::app()->getRequest()->getQuery('id');
			$user->deleteByPk($id);
		}
	}
	
	public function actionAutocomplete()
	{
		$autocompletedata = array();
		if (isset($_GET['term'])) {
			$ldap = Yii::app()->params['ldap'];
			$conn = ldap_connect($ldap['host']);
			if ($conn) {
				ldap_set_option($conn, LDAP_OPT_REFERRALS, 0);
				ldap_set_option($conn, LDAP_OPT_PROTOCOL_VERSION, 3);
				if (ldap_bind($conn, $ldap['bind_rdn'], $ldap['bind_pwd'])) {
					$result = ldap_search($conn, $ldap['base_dn'], '(samaccountname=*' . $_GET['term'] . '*)');
					$data = ldap_get_entries($conn, $result);
					if ($data != null) {
						foreach ($data as $item) {
							if ($item['samaccountname'][0] != null) {
								array_push($autocompletedata, $item['samaccountname'][0]);
							}
						}
					}
				}
				ldap_close($conn);
			}
		}
		echo CJSON::encode($autocompletedata);
		Yii::app()->end();
	}
	
	public function actionUserdetail()
	{
		if (Yii::app()->request->isAjaxRequest) {
			$username = Yii::app()->request->getParam('username');
			$detail = $this->getRecordByUsername($username);
			echo CJSON::encode($detail);
			Yii::app()->end();
		}
	}
	
	private function getRecordByUsername($username) {
		$ldap = Yii::app()->params['ldap'];
		$conn = ldap_connect($ldap['host']);
		if ($conn) {
			ldap_set_option($conn, LDAP_OPT_PROTOCOL_VERSION, 3);
			ldap_set_option($conn, LDAP_OPT_REFERRALS, 0);
			if (ldap_bind($conn, $ldap['bind_rdn'], $ldap['bind_pwd'])) {
				$result = ldap_search($conn, $ldap['base_dn'], '(samaccountname=' . $username . ')');
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
