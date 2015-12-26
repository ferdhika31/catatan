<?php
namespace Modules\Admin\Controllers;
use Resources, Models, Libraries;

class Minggu extends Resources\Controller{

	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2015-12-10 18:57:09
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
		$total = count($this->m_admin->semuaMinggu());

		$data['asset'] = $this->uri->baseUri."assets/admin/";
		
		// Notification
		$data['notif'] = $this->session->getValue('notif');
		$this->session->setValue(array('notif'=>''));

		$data['heading_title'] = 'Data Minggu';
		$data['hal'] = $hal;
		$data['data'] = $this->m_admin->ambilMingguPer($hal, $limit);
		$data['totalData'] = $total;

		$data['pageLinks'] = $this->pagination->setOption(
			array(
		    	'limit' => $limit,
		    	'base' => $this->location('admin/minggu/index/%#%/'),
		    	'total' => $total,
		    	'current' => $hal,
		    	'nextText' => 'Selanjutnya',
		    	'prevText' => 'Sebelumnya'
			)
	    )->getUrl();
		
		$this->output('header',$data);
		$this->output('minggu/list',$data);
		$this->output('footer',$data);
	}

	public function tambah(){
		$data['heading_title'] = 'Tambah minggu';
		$data['notif']	= '';

		//proses
		if($this->request->post('oke')){
			$minggu = $this->request->post('minggu');

			if(!empty($minggu)){
				$dataMg = array(
					'minggu' 	=> $minggu
				);
				$smt = $this->m_admin->tambahMinggu($dataMg);
				if($smt){
					$notif['notif'] = '
						<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<strong>Horray!</strong> Berhasil menambah minggu.
						</div>
					';
					$this->session->setValue($notif);

					$this->redirect('admin/minggu');
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
		$data['minggu'] = $this->m_admin->ambilSatuMinggu($id);

		if(empty($data['minggu'])){
			$this->redirect('admin/minggu');
		}
	
		$data['heading_title'] = 'Ubah minggu "'.$data['minggu']->minggu.'"';
		$data['notif']	= '';

		//proses
		if($this->request->post('oke')){
			$minggu = $this->request->post('minggu');

			if(!empty($minggu)){
				$dataMg = array(
					'minggu' 	=> $minggu
				);
				$smt = $this->m_admin->ubahMinggu($id,$dataMg);
				if($smt){
					$notif['notif'] = '
						<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<strong>Horray!</strong> Berhasil mengubah minggu.
						</div>
					';
					$this->session->setValue($notif);

					$this->redirect('admin/minggu');
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

		$cek = $this->m_admin->ambilSatuMinggu($id);

		if(!empty($cek)){
			$this->m_admin->hapusMinggu($id);
			$notif['notif'] = '
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">×</button>
					<strong>Horray!</strong> Berhasil menghapus minggu.
				</div>
			';
			$this->session->setValue($notif);
			$this->redirect('admin/minggu');
		}else{
			$notif['notif'] = '
				<div class="alert alert-error">
					<button type="button" class="close" data-dismiss="alert">×</button>
					<strong>Upps!</strong> Gagal menghapus minggu.
				</div>
			';
			$this->session->setValue($notif);
			$this->redirect('admin/minggu');
		}
	}

	private function form($data=array()){
		$data['asset'] = $this->uri->baseUri."assets/admin/";
		$data['notif']	= '';

		$this->output('header',$data);
		$this->output('minggu/form',$data);
		$this->output('footer',$data);
	}

}