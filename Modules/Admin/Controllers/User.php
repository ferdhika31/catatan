<?php
namespace Modules\Admin\Controllers;
use Resources, Models, Libraries;

class User extends Resources\Controller{

	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2015-12-06 12:33:59
	**/

	function __construct(){
		parent::__construct();
		// Load library
		$this->session = new Resources\Session();
		$this->request = new Resources\Request;

		// Load model
		$this->m_admin = new Models\M_admin;

		// Load konfigurasi website
		$this->konfig = Resources\Config::website();
		
		if(!$this->session->getValue('isAdmin')){
    		$this->redirect('admin/login');	
    	}
    	if($this->session->getValue('hak')!=1){
    		$this->redirect('admin');	
    	}
	}

	public function index($hal=1){
		$this->pagination = new Resources\Pagination();

		$hal = (int)$hal;
		$limit = $this->konfig['jumlah_list'];
		$total = count($this->m_admin->semuaUser());

		$data['notif'] = $this->session->getValue('notif');
		$this->session->setValue(array('notif'=>''));

		$data['asset'] = $this->uri->baseUri."assets/admin/";
		$data['heading_title'] = 'Data User';
		$data['hal'] = $hal;
		$data['data'] = $this->m_admin->ambilUserPer($hal, $limit);
		$data['totalData'] = $total;

		$data['pageLinks'] = $this->pagination->setOption(
			array(
		    	'limit' => $limit,
		    	'base' => $this->location('admin/user/index/%#%/'),
		    	'total' => $total,
		    	'current' => $hal,
		    	'nextText' => 'Selanjutnya',
		    	'prevText' => 'Sebelumnya'
			)
	    )->getUrl();

		$this->output('header',$data);
		$this->output('user/list',$data);
		$this->output('footer',$data);
	}

	public function tambah(){
		$data['heading_title'] = 'Tambah user';
		$data['notif']	= '';

		//proses
		if($this->request->post('oke')){
			$username = $this->request->post('username');
			$password = $this->request->post('password');
			$nama = $this->request->post('nama');
			$email = $this->request->post('email');
			$hak = $this->request->post('hak');

			if(!empty($username) || !empty($password) || !empty($nama) || !empty($email)){
				$cek_username = $this->m_admin->cekAkun(array('username'=>$username));
				$cek_email = $this->m_admin->cekAkun(array('email'=>$email));

				if(!empty($cek_email)){
					$data['notif'] = '
						<div class="alert alert-error">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<strong>Upps!</strong> Email sudah di gunakan oleh username <strong>'.$cek_email->username.'</strong>. 
						</div>
					';
				}elseif(!empty($cek_username)){
					$data['notif'] = '
						<div class="alert alert-error">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<strong>Upps!</strong> Username sudah di gunakan oleh <strong>'.$cek_username->nama.'</strong>. 
						</div>
					';
				}else{
					$dataUser = array(
						'username' 	=> $username,
						'password' 	=> $password,
						'nama' 	=> $nama,
						'email'	=> $email,
						'hak'	=> $hak,
						'date_add' => date('Y-m-d h:i:s')
					);
					$matkul = $this->m_admin->tambahUser($dataUser);
					if($matkul){
						$notif['notif'] = '
							<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert">×</button>
								<strong>Horray!</strong> Berhasil menambah akun.
							</div>
						';
						$this->session->setValue($notif);
						$this->redirect('admin/user');
					}else{
						$data['notif'] = '
							<div class="alert alert-error">
								<button type="button" class="close" data-dismiss="alert">×</button>
								<strong>Upps!</strong> Terjadi kesalahan.
							</div>
						';
					}
				}
			}else{
				$data['notif'] = '
					<div class="alert alert-warning">
						<button type="button" class="close" data-dismiss="alert">×</button>
						<strong>Upps!</strong> Form tidak boleh kosong.
					</div>
				';
			}
		}

		$this->form($data);
	}

	public function ubah($id){
		$data['user'] = $this->m_admin->ambilSatuUser($id);

		if(empty($data['user'])){
			$this->redirect('admin/user');
		}
	
		$data['heading_title'] = 'Ubah user "'.$data['user']->nama.'"';
		$data['notif']	= '';

		//proses
		if($this->request->post('oke')){
			$password = $this->request->post('password');
			$nama = $this->request->post('nama');
			$email = $this->request->post('email');
			$hak = $this->request->post('hak');

			if(!empty($password) || !empty($nama)){

				$dataUser = array(
					'password' 	=> $password,
					'nama' 	=> $nama,
					'email'	=> $email,
					'hak'	=> $hak,
					'date_update' => date('Y-m-d h:i:s')
				);
				$user = $this->m_admin->ubahUser($id,$dataUser);
				if($user){
					$notif['notif'] = '
						<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<strong>Horray!</strong> Berhasil mengubah akun.
						</div>
					';
					$this->session->setValue($notif);

					$this->redirect('admin/user');
				}else{
					$data['notif'] = '
						<div class="alert alert-error">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<strong>Upps!</strong> Terjadi kesalahan.
						</div>
					';
				}
			}else{
				$data['notif'] = '
					<div class="alert alert-warning">
						<button type="button" class="close" data-dismiss="alert">×</button>
						<strong>Upps!</strong> Form tidak boleh kosong.
					</div>
				';
			}
		}

		$this->form($data);
	}

	public function hapus($id=0){
		$id = (int)$id;

		$cek = $this->m_admin->cekAkun(array('id'=>$id));

		if(!empty($cek) && $cek->username != $this->session->getValue('username')){
			$this->m_admin->hapusUser($id);
			$notif['notif'] = '
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">×</button>
					<strong>Horray!</strong> Berhasil menghapus akun.
				</div>
			';
			$this->session->setValue($notif);
			$this->redirect('admin/user');
		}else{
			$notif['notif'] = '
				<div class="alert alert-error">
					<button type="button" class="close" data-dismiss="alert">×</button>
					<strong>Upps!</strong> Gagal menghapus akun.
				</div>
			';
			$this->session->setValue($notif);
			$this->redirect('admin/user');
		}
	}

	private function form($data=array()){
		$data['asset'] = $this->uri->baseUri."assets/admin/";

		$this->output('header',$data);
		$this->output('user/form',$data);
		$this->output('footer',$data);
	}

}