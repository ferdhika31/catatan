<?php
namespace Modules\Admin\Controllers;
use Resources, Models;

class Login extends Resources\Controller{

	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2015-12-05 21:40:10
	**/

	function __construct(){
		parent::__construct();
		// $this->pengaturan = new Models\M_pengaturan;
		$this->session = new Resources\Session();
		$this->request = new Resources\Request;
		$this->admin = new Models\M_admin;
	}

	public function index(){
		// Notif
		$data['notif'] = '';

		$data['asset'] = $this->uri->baseUri."assets/admin/";

		if($this->request->post('masuk')){
			$username = $this->request->post('A_username');
			$password = $this->request->post('A_password');

			if(empty($username) || empty($password)){
				$data['notif'] = '
					<div class="alert alert-warning">
						<button type="button" class="close" data-dismiss="alert">×</button>
						<strong>Upps!</strong> Username dan password tidak boleh kosong.
					</div>
				';
			}else{
				$mimin = $this->admin->login($username,$password);

				if(!empty($mimin)){
					$dataSession = array(
						'isAdmin' => true,
						'user_id'	=> $mimin->user_id,
						'username'	=> $mimin->username,
						'nama'		=> $mimin->nama,
						'email'		=> $mimin->email,
						'hak'		=> $mimin->hak
					);
					$this->session->setValue($dataSession);
					$this->redirect('admin');
				}else{
					$data['notif'] = '
						<div class="alert alert-error">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<strong>Upps!</strong> Username atau Password salah.
						</div>
					';
				}
			}
		}

		$this->output('login',$data);
	}

}