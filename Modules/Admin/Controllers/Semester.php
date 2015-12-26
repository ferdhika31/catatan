<?php
namespace Modules\Admin\Controllers;
use Resources, Models, Libraries;

class Semester extends Resources\Controller{

	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2015-12-10 09:56:08
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

	public function index(){
		//Asset
		$data['asset'] = $this->uri->baseUri."assets/admin/";

		$data['heading_title'] = "Daftar Semester";
		
		// Notification
		$data['notif'] = $this->session->getValue('notif');
		$this->session->setValue(array('notif'=>''));

		$data['dataSemester'] = $this->m_admin->semuaSemester();
		
		$this->output('header',$data);
		$this->output('semester/list',$data);
		$this->output('footer',$data);
	}

	public function tambah(){
		$data['heading_title'] = 'Tambah semester';
		$data['notif']	= '';

		//proses
		if($this->request->post('oke')){
			$tahun = $this->request->post('tahun');
			$semester = $this->request->post('semester');

			if(!empty($semester)){
				$dataSmt = array(
					'tahun' 	=> $tahun,
					'semester' 	=> $semester
				);
				$smt = $this->m_admin->tambahSemester($dataSmt);
				if($smt){
					$notif['notif'] = '
						<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<strong>Horray!</strong> Berhasil menambah semester.
						</div>
					';
					$this->session->setValue($notif);

					$this->redirect('admin/semester');
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

	public function ubah($id){
		$data['semester'] = $this->m_admin->ambilSatuSemester($id);

		if(empty($data['semester'])){
			$this->redirect('admin/semester');
		}

		$data['heading_title'] = 'Ubah semester "'.$data['semester']->semester.'"';
		$data['notif']	= '';

		//proses
		if($this->request->post('oke')){
			$tahun = $this->request->post('tahun');
			$semester = $this->request->post('semester');

			if(!empty($semester)){
				$dataSmt = array(
					'tahun' 	=> $tahun,
					'semester' 	=> $semester
				);
				$smt = $this->m_admin->ubahSemester($id,$dataSmt);
				if($smt){
					$notif['notif'] = '
						<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<strong>Horray!</strong> Berhasil mengubah '.$dataSmt['semester'].'.
						</div>
					';
					$this->session->setValue($notif);

					$this->redirect('admin/semester');
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

		$cek = $this->m_admin->ambilSatuSemester($id);

		if(!empty($cek)){
			$this->m_admin->hapusSemester($id);
			$notif['notif'] = '
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">×</button>
					<strong>Horray!</strong> Berhasil menghapus semester.
				</div>
			';
			$this->session->setValue($notif);
			$this->redirect('admin/semester');
		}else{
			$notif['notif'] = '
				<div class="alert alert-error">
					<button type="button" class="close" data-dismiss="alert">×</button>
					<strong>Upps!</strong> Gagal menghapus semester.
				</div>
			';
			$this->session->setValue($notif);
			$this->redirect('admin/semester');
		}
	}

	private function form($data=array()){
		// Asset dir
		$data['asset'] = $this->uri->baseUri."assets/admin/";

		$this->output('header',$data);
		$this->output('semester/form',$data);
		$this->output('footer',$data);
	}

}